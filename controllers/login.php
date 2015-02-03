<?php namespace login; if (!defined ('BASEPATH')) exit ('Direct access is not allowed.');

function loginPage () {
	$HG =& getInstance ();
	$HG -> view ('login');
}

?>