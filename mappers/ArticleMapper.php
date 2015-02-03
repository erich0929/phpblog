<?php if (! defined ('BASEPATH')) exit ('Direct access is not allowed!');

class ArticleMapper {
	
	static $schema = array ("tableName", "author", "title", "content", "date");
	//var $db_driver;
	function __construct ($db_driver) {
		$this -> db_driver = $db_driver;
	}

	function getArticles ($limit) {
		if (!isset ($limit)) $limit = 10;
		$result_id = $this -> db_driver -> query ('SELECT * FROM `Articles` ORDER BY `articleId` DESC LIMIT ' . $limit);
		$articles = array ();

		while ($record = $this -> db_driver -> fetch_assoc ($result_id)) {
			// remove the html tag
			$record ['content'] = preg_replace ('/<.*?>/', ' ', $record ['content']);
			// remove first empty strings
			$record ['content'] = preg_replace ('/^\s*/', '', $record ['content']);
			// extract summary.
			preg_match ('/.{0,200}\s?|$/', $record ['content'], $summary);
			$record ['content'] = $summary [0];
			array_push ($articles, $record);
		}
		return $articles;
	}

	function insertArticle ($params) {
		foreach (ArticleMapper::$schema as $key) {
			if (!array_key_exists($key, $params)) {
				if ($key == "date") {
					$params [$key] = "unix_timestamp(now())";
				} else {
					$params [$key] = '';
				}
			}
		}
		$statement = "INSERT INTO Articles (tableName, author, title, content, date) VALUES " . 
					"('{$params['tableName']}', '{$params['author']}', '{$params['title']}', " . 
					"'{$params['content']}', {$params['date']})"; 
					
	//	console_log ('[INSERT TEST] QUERY : ' . $statement, __FILE__, __LINE__, FALSE);
	//	$this -> db_driver -> trans_start ();
		$this -> db_driver -> query ($statement);
	//	$this -> db_driver -> trans_complete ();
		
	}

} 

?>