<?php


include('../scripts/dbconnect.php');
include('../scripts/cleaner.php');

$pagename = $_GET["pagename"];
$getsite = $_GET["getsite"];

$ses = $_COOKIE["sesh"];


$query = "SELECT * from forum_users where ses='$ses' and ses!='' LIMIT 1";
$result = mysql_query ("$query");
$rowses = mysql_fetch_array($result);
$session = mysql_num_rows($result);

$login = $rowses['username'];



$sqlbox = mysql_query("SELECT * from phoenix_wap where sysname='$getsite'");

$sqlnumbers = mysql_num_rows($sqlbox);
$sqlopen = mysql_fetch_array($sqlbox);

$pagename = $_GET["pagename"];
$owner = $sqlopen["owner"];


$sqlbox = mysql_query("SELECT * from phoenix_wap where owner='$owner' AND type='module' AND sysname='$pagename' AND content='chat'");
$sqlopen = mysql_fetch_array($sqlbox);
$tittie = $sqlopen["title"];


$query ="INSERT INTO phoenix_wap ( owner, title, sysname, content, date, type ) values ( '$owner', 'System', '$pagename', '(b)$login(/b) left $tittie!', now(), 'chat' )";
mysql_query($query);

$act_query = "UPDATE forum_users set lastactive=now(), location='entering $roomname', room='$roomid' where username='$login'";
mysql_query($act_query);

$act_query = "UPDATE friends set lastactive=now(), location='entering $roomname', room='$roomid' where friendname='$login'";
mysql_query($act_query);


$url = "./index.php?getsite=$getsite";



header("Last-Modified: " . gmdate("D, dMYH:i:s") . " GMT");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

header("HTTP/1.1 301 Moved Permanently");
header("Location: ".$url);
exit;
	


?>
