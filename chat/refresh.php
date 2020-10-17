<?php


$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];


$roomid = $_GET['roomid'];
if ($roomid == "")
{ $roomid = $_POST['roomid']; }

$chatpass = $_GET["chatpass"];
if ($chatpass == "") $chatpass = $_POST["chatpass"];

$url = "./chat.php?ses=$ses&roomid=$roomid&chatpass=$chatpass";


header("Last-Modified: " . gmdate("D, dMYH:i:s") . " GMT");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

header("HTTP/1.1 301 Moved Permanently");
header("Location: ".$url);
exit;
	


?>
