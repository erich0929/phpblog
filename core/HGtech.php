<?php if (!defined ('BASEPATH')) exit ('Direct access is not allowed!');
	//require_once APPPATH . 'config/config.php';

	
	require_once BASEPATH . 'Controller.php';

	
	// Create super object.
	new HG_Controller ();

	function &getInstance () {
		return HG_Controller::getInstance ();
	}

	function pre_index_hook () {
		echo "It' pre hooked0. <br />";
		return TRUE;
	}

	function pre_index_hook1 () {
		echo "It' pre hooked1. <br />";
		return TRUE;
	}

	function post_index_hook () {
		echo "It's post hooked0. <br />";
		return FALSE;
	}

	function post_index_hook1 () {
		echo "It's post hooked1. <br />";
		return TRUE;
	}

	function index () {
		$HG = getInstance ();
		//echo 'index request <br />';
		$HG -> resource ('index.html');
	}

	require_once APPPATH . 'controllers/indexController.php';
	require_once APPPATH . 'controllers/writeController.php';
	require_once APPPATH . 'controllers/staticResourceController.php';
	require_once APPPATH . 'controllers/testController.php';
	require_once APPPATH . 'controllers/login.php';
	require_once APPPATH . 'controllers/adminController.php';
	require_once APPPATH . 'controllers/uploadController.php';
	require_once APPPATH . 'config/config.php';
	require_once APPPATH . 'mappers/TableListMapper.php';
	require_once APPPATH . 'mappers/ArticleMapper.php';
	require_once APPPATH . 'controllers/restApiController.php';
	//
	//echo 'c';
	
	
	$HG =& getInstance ();
	//print_r ($dbParams);
	echo 'a';
	$HG -> database ('mysqli_driver', $dbParams);
	

	
	function testRequest () {
		$HG =& getInstance ();
		$accepts = $HG -> headers ['Accept'];
		echo 'k';
		print_r ($HG -> headers);
	}

	$HG -> setRequestHandler ('testRequest', array ('/^testRequest$/'), 'GET', "testRequest");

	//end test

	$HG -> setRequestHandler ('index', array ('/^main.html$/'), 'GET', "\indexController\index");
	//$HG -> addPreHandlerHook ('index', 'pre_index_hook');
	//$HG -> addPreHandlerHook ('index', 'pre_index_hook1');
	//$HG -> addPostHandlerHook ('index', 'post_index_hook');
	//$HG -> addPostHandlerHook ('index', 'post_index_hook1');
	$HG -> setRequestHandler ('write', array ('/^write$/'), 'GET',"\writeController\write") ;
	$HG -> setRequestHandler ('testAjax', array ('/^testajax$/'), 'GET', '\testController\ajaxTest');
	$HG -> setRequestHandler ('testUpload', array ('/^testUpload$/'), 'GET', '\testController\testUpload');
	$HG -> setRequestHandler ('login', array ('/^login$/'), 'GET', '\login\loginPage');
	$HG -> setRequestHandler ('adminq', array ('/^admin$/'), 'GET', '\adminController\adminPage');
	$HG -> setRequestHandler ('upload', array ('/^upload$/'), 'POST', '\uploadController\upload');

	//Rest API
	$HG -> setRequestHandler ('restApi', array ('/^.+$/'), 'GET', 'restApiHandler');

echo 'x';
	$HG -> route ();
	
?>