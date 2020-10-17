<?php


include('../scripts/dbcon.php');

header("Last-Modified: " . gmdate("D, dMYH:i:s") . " GMT");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");



$query = "select * from welcome where id='1'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);
//
//
$lback = $row['linkbackaddress'];




$surl = "$lback/register.php";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $surl");
	exit;

?>