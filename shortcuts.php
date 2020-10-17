<?php


include('./scripts/header.php');
include('./scripts/session.php');
include('./scripts/config.php');
include('./scripts/functions.php');
include('./scripts/main.php');


header("Last-Modified: " . gmdate("D, dMYH:i:s") . " GMT");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");





$ses = $_GET["ses"];
$shortcut = $_GET["shortcut"];


$query = "select * from welcome where id='1'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

$lback = $row['linkbackaddress'];

		
$query = "SELECT url FROM shortcuts where id=$shortcut limit 1";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

$spath = $row["url"];


$url = "$lback/$spath?ses=$ses";


header("HTTP/1.1 301 Moved Permanently");
header("Location: $url");
exit;


?>
