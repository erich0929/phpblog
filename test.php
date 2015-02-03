<?php

$i = 100;
function foo () {
	$i = 10;
	return function () use (&$i) {
		$i++;
		return $i;
	};
}

$bar = foo ();
echo $bar () . '<br />';
echo $bar () . '<br />';

function callee ($callback) {
	return $callback ();
}
/*
echo callee (function () {
	return 'Hello world';
});
 */
$callback = function () { return 'Hello world'; };
echo callee ($callback);

// lambda function cat't return lambda function.
/*
$faa = function () {
	return function () {
		return 'Hello world';
	};
}

$bor = $faa ();
echo $bor ();
*/
?>
