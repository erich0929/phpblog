<?php if (! defined ('BASEPATH')) exit ('Direct access is not allowed!');

class HG_Controller {
	
	private static $instance;
	private $handlerTable;// = array ();
	private $pathContext;// = array_slice (split ('/', trim ($_SERVER ['REQUEST_URI'], '/')), 1);
	public $headers;
						   
	public function __construct () {
		self::$instance =& $this;
		$this -> handlerIndexTable = array ();
		$this -> handlerTable = array ();
		$this -> pathContext = array_slice (split ('/', urldecode (trim ($_SERVER ['REQUEST_URI'], '/'))), 1);
		print_r ($this -> pathContext);
		//headers
	
		$this -> headers = getallheaders(); 
	}

	public static function &getInstance () {
		return self::$instance;
	}

	public function getPathContext () {
		return $this -> pathContext;
	}

	public function setRequestHandler ($id, $rules, $method, $handler) {
		$path = array ('rules' => $rules, 'handler' => $handler, 'method' => $method, 'pre_handler' => array (), 'post_handler' => array ());
		//$handlerIndex = $path;
		$this -> handlerIndexTable [$id] =& $path;
		array_push ($this -> handlerTable, &$path);
	}

	public function addPreHandlerHook ($id, $hook) {
		$path =& $this -> handlerIndexTable [$id];

		array_push ($path ['pre_handler'], $hook);
	//	print_r ($path);
	}

	public function addPostHandlerHook ($id, $hook) {
		$path =& $this -> handlerIndexTable [$id];
		array_push ($path ['post_handler'], $hook);
	}

	// database loader.
	public function database ($driverName, $config) {
		echo 'q';
		require_once BASEPATH . 'database/DB_driver.php';
		
		require_once BASEPATH . 'database/drivers/' . $driverName . '.php';
		
		if (!$this -> db) {
			$driver = 'HG_' . $driverName;
			$this -> db = new $driver ($config);
			$this -> db -> initialize ();
		}
	}

	public function route () {
		$accept = FALSE;
		$found = FALSE;
		$pathLength = count ($this -> pathContext);
		foreach ($this -> handlerTable as $path) {
			$rules = $path ['rules'];
			$count = count ($rules);
			if ($_SERVER ['REQUEST_METHOD'] == $path ['method']) {
				if ($count == $pathLength) {
					for ($i = 0; $i < $count; $i++) {
						$accept = preg_match ($rules [$i], $this -> pathContext [$i]);
						if (!$accept) break;
					}
				}
			}
			if ($accept) {
				$found = TRUE;
				$next = TRUE;
				//print_r ($path);
				//call pre_handler.
				foreach ($path ['pre_handler'] as $pre) {
					//console_log ($pre, __FILE__, __LINE__);
					//print_r ($pre);
					if (FALSE == ($next = $pre ())) break;
				}

				//call request handler Only if $next is TRUE.
				if ($next == TRUE) $path ['handler'] ();

				//call post_handler.
				if ($next == TRUE) {
					foreach ($path ['post_handler'] as $post) {
						if (FALSE == ($next = $post ())) break;
					}
				}
				break;
			}
		}
		if (!$found) {
			// static resource process.
			//echo join ('/', $this -> pathContext);
			if (preg_match ('/\.(html|js|css|png)$/', $this -> pathContext [$pathLength - 1])) {		
				require (APPPATH . 'public/' . join ('/', $this -> pathContext));
			} else {
				echo "404 Page Not Found.";
			}
		}  
	}

	public function view ($viewfile, $sufix = '.php') {
		require (APPPATH.'views/'.$viewfile.$sufix);
	}

	public function resource ($resourceFile) {
		require (APPPATH.'public/'.$resourceFile);
	}
}

?>