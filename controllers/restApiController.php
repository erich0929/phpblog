<?php //namespace restApiController;	if (!defined ('BASEPATH')) exit ('Direct access is not allowed!'); 
	
	function restApiHandler () {
		echo 'u';
		$HG =& getInstance ();
		echo 'k';
		//isset ($HG -> db) echo 'a';
		//print_r ($HG -> db);
		$tableListMapper = new TableListMapper ($HG -> db);
		
		
		$tableList = $tableListMapper -> getTableList ();

		//accept header
		$accepts = split (',' , $HG -> headers ['Accept']);
		$accept = $accepts [0]; 
		
		$pathContext = $HG -> getPathContext ();
		echo 'f';
		$count = count ($pathContext);
		echo $count;
		
		$dateArr = array ();

		for ($i = 1; $i < $count ; $i++) {
			array_push ($dateArr, $pathContext [i]);
		}

		$tableName = $pathContext [0];
		echo $tableName;
		if (! inTableList ($tableName)) exit ('table Page was not found.');
		$articleMapper = new ArticleMapper ($HG -> db);
		if ($count == 1) {
			$articles = $articleMapper -> getArticlesByTableName ($tableName);
			echoByAccept ('boardByTableName', $articles);
			return;
		} else if ($count > 1 AND $count < 5) {
			$articles = $articleMapper -> getArticlesByDateWithTableName ($tableName, $dateArr);
			echoByAccept ('boardByDateWithTableName', $articles);
			reutrn;
		} else if ($count == 5) {
			$articleId = $pathContext [4];
		 	$article = $articleMapper -> getArticleByAritcleIdWithTableNameAndDate ($tableName, $dateArr, $articleId);
		 	echoByAccept ('articleView', $article);
		 	return;
		}

		exit ('Page was not found.');
	}

	function echoByAccept ($view, $data) {
		if ($accept == 'text/html') {
			$HG -> view ($view);
			return;
		} else if ($accept == 'text/json') {
			echo json_encode ($data);
			return;
		}
	}

	function inTableList ($tableName) {
		return in_array ($tableName, $tableList);
	}
?>