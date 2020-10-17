<?php

include('./scripts/header.php');
include('./scripts/session.php');
include('./scripts/config.php');
include('./scripts/functions.php');
include('./scripts/main.php');

$outbound = $_GET["outbound"];


$login = $_GET["login"];

if (preg_match("/http/i", "$outbound")) {
    // this is ok
} else {
$prepend = "http://";
}



//if (preg_match("/phoenixbytes.co.uk/i", "$outbound"))
//{
//$surl = "$outbound";
//}
//else
//{
$surl = "./leave.php?login=$login&surly=$prepend$outbound";
//}

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $surl");
	exit;

?>