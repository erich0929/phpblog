<?php namespace writeController; if (! defined ('BASEPATH')) exit ('Direct access is not allowed!');

	// write Controller handler.

	function write () {
		$HG = getInstance ();
		$HG -> view ('write');
	}

?>