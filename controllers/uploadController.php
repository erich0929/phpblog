<?php namespace uploadController; if (!defined ('BASEPATH')) exit ('Direct access is not allowed!');
	
	function upload () {
		$elementName = 'filename';
		$uploadedFile = FILEPATH . $_FILES [$elementName]['name'];
		if (!move_uploaded_file($_FILES[$elementName]['tmp_name'], $uploadedFile)) {
			exit ('Upload Failed.');
		} else {
			echo 'http://blog.erich0929.com/public/files/' . $_FILES [$elementName]['name'];	
		}
		
	}


?>