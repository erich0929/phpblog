<?php namespace adminController; if (!defined ('BASEPATH')) exit ('Direct access is not allowed!');

function adminPage () {
	$HG =& getInstance ();
	$HG -> view ('admin');
}

?>