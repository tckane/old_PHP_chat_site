<?php


if ($act == "")
{
$pagename = $_GET["pagename"];

$getsite = $_GET["getsite"];


$url = "./mod.chat.enter.php?pagename=$pagename&getsite=$getsite";


header("Last-Modified: " . gmdate("D, dMYH:i:s") . " GMT");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

header("HTTP/1.1 301 Moved Permanently");
header("Location: ".$url);
exit;
}	


?>
