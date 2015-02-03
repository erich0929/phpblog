<?php 

class TableListMapper {

	var $driver;

	public function __construct ($driver) {
		$this -> driver = $driver;
	}

	public function getTableList () {
		$tables = array ();
		$resultId = $this -> driver -> query ('SELECT * FROM TableList;');
		while ($record = $this -> driver -> fetch_assoc ($resultId)) {
			array_push ($tables, $record ['name']);
		}
		return $tables;
	}

}

?>