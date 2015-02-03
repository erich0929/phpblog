<?php namespace testController;if (! defined ('BASEPATH')) exit ('Direct access is not allowed!'); 

function ajaxTest () {
	$HG =& getInstance ();
	$HG -> view ('ajaxTest');
}

function testUpload () {
	$HG =& getInstance ();
	echo '<script>alert ("'.$_POST ['test'].'");</script>';
}

?>