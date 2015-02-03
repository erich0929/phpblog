<?php namespace staticResourceController; if (! defined ('BASEPATH')) exit ('Direct access is not allowed!');

	function staticResourceHandler () {
		$HG = getInstance ();
		$HG -> resource (join ('/', $HG -> getPathContext ()));
	}