<?php if (!defined ('BASEPATH')) exit ('Direct access is not allowed!');

function console_log ($string, $FILENAME, $LINENUM, $mode=TRUE) {
	if (defined ('DEBUG_MODE')) {
		if ($mode) {
			exit ( $string ." <- ".$FILENAME." on Line ".$LINENUM."\n");
		} else {
			echo $string ." <- ".$FILENAME." on Line ".$LINENUM."\n";
		}
	}

}

?>