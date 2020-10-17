<?php

include('./scripts/header.php');
include('./scripts/session.php');
include('./scripts/config.php');
include('./scripts/functions.php');
include('./scripts/main.php');

$ses = $_COOKIE["sesh"];
$login = $_GET["login"];

$query = "select * from welcome";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);
$sitename = $row["sitetitle"];
$logo_url = $row["url"];
$lback = $row["linkbackaddress"];



$query = "UPDATE forum_users set ses='' where username='$login'";
$result = mysql_query("$query");

$query = "UPDATE friends set lastactive=now(), location='forums' where friendname='$login'";
$result = mysql_query("$query");


$surl = "$lback/index.php?msg=6";

header("HTTP/1.1 301 Moved Permanently");
header("Location: ".$surl);
	
?>
