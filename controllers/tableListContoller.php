<?php namespace tableListController; if (!defined ('BASEPATH')) exit ('Direct access is not allowed!');

	function getTableList () {
		$HG =& getInstance ();
		$tableListMapper = new TableListMapper ($HG -> db);
		return $tableListMapper -> getTableList ();
	}

?>