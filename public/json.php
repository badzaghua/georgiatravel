<?
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header ("Pragma: no-cache"); // HTTP/1.0
header("Content-Type: application/json; charset=utf-8");
	

	$phrase = $_GET['phrase'];


echo file_get_contents('http://places.georgia.travel/api/places.php?phrase='.rawurlencode($phrase));