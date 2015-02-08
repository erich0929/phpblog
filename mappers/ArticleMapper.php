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

	function getArticlesByTableName ($tableName) {
		$resultId = $this -> db_driver 
						-> query ("SELECT * FROM `Articles` WHERE `tableName` = '{$tableName}' ORDER BY `articleId` DESC");
		$articles = array ();
		return $this -> simplePushArray (&$resultId, &$articles);
	}

	function getArticlesByDateWithTableName ($tableName, $date) {
		$count = count ($date);
		$prefixSqlTemplate = "SELECT * FROM `Articles` WHERE `tableName` = '{$tableName}'";
		$suffixSqlTemplate = "ORDER BY `articleId` DESC";
		$articles = array ();
		if ($count == 1) {
			$year = $date [0];
			$startTime = mktime (0,0,0,1,1,$year);
			$endTime = strtotime ('+1 year', mktime (0,0,0,1,1,$year));
			$sql = $prefixSqlTemplate . " AND `date` >= {$startTime} AND `date` < {$endTime} " .
					$suffixSqlTemplate;
			$resultId = $this -> db_driver -> query ($sql);

			return $this -> simplePushArray ($resultId, $articles);
		} else if ($count == 2) {
			$year = $date [0];
			$month = $date [1];
			//echo "{$year}, {$month}\n";
			$startTime = mktime (0,0,0,$month,1,$year);
			$endTime = strtotime ('+1 month', mktime (0,0,0,$month,1,$year));
			$sql = $prefixSqlTemplate . " AND `date` >= {$startTime} AND `date` < {$endTime} " .
					$suffixSqlTemplate;
			$resultId = $this -> db_driver -> query ($sql);
			return $this -> simplePushArray ($resultId, $articles);
		} else if ($count == 3) {    
			$year = $date [0];
			$month = $date [1];
			$day = $date [2];
			//echo "{$year}, {$month}\n";
			$startTime = mktime (0,0,0,$month,$day,$year);
			$endTime = strtotime ('+1 day', mktime (0,0,0,$month,$day,$year));
			$sql = $prefixSqlTemplate . " AND `date` >= {$startTime} AND `date` < {$endTime} " .
					$suffixSqlTemplate;
			$resultId = $this -> db_driver -> query ($sql);
			return $this -> simplePushArray ($resultId, $articles);
		}
	}

	function getArticleByAritcleIdWithTableNameAndDate ($tableName, $date, $articleId) {
		$prefixSqlTemplate = "SELECT * FROM `Articles` WHERE `tableName` = '{$tableName}' AND `articleId` = {$articleId}";
		
		$articles = array ();
		$year = $date [0];
		$month = $date [1];
		$day = $date [2];
			//echo "{$year}, {$month}\n";
		$startTime = mktime (0,0,0,$month,$day,$year);
		$endTime = strtotime ('+1 day', mktime (0,0,0,$month,$day,$year));
		$sql = $prefixSqlTemplate . " AND `date` >= {$startTime} AND `date` < {$endTime} ";
		$resultId = $this -> db_driver -> query ($sql);
		return $this -> db_driver -> fetch_assoc ($resultId);
	}

	function simplePushArray (&$resultId, &$arr) {
		while ($record = $this -> db_driver -> fetch_assoc ($resultId)) {
			array_push ($arr, $record);
		}
		return $arr;
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
