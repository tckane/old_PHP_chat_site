<?php


include("../scripts/dbcon.php");

$getsite = $_GET["getsite"];




header("Last-Modified: " . gmdate("D, dMYH:i:s") . " GMT");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

$ses = $_COOKIE["sesh"];

mysql_query("update forum_users set ses='' where ses='$ses'");

setcookie("sesh", "", -360000);

$surl = "./index.php?getsite=$getsite";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $surl");
	exit;



?>