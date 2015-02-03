<?php namespace indexController; if (!defined ('BASEPATH')) exit ('Direct access is not allowed!');
	
	function index () {
		$HG =& getInstance ();
		$HG -> view ('index');
	}

	
?>