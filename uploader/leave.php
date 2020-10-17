<?php

include('../scripts/dbconnect.php');



$act = $_GET["act"];


$ses = $_GET["ses"];






if ($act == "")
{

$query = "SELECT * FROM welcome";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

$lback = $row['linkbackaddress'];
$file = $_GET['file'];





$ourl = "$lback/uploader/$file";

header("HTTP/1.1 301 Moved Permanently");
header("Location: $ourl");
exit;

}

if ($act == "shortcuts")
		{

$shortcut = $_GET["shortcut"];

		

		if ($shortcut == "" || $shortcut =="shortcuts") $url = "./files.php?ses=$ses";
		if ($shortcut == "forums") $url = "../forum/forums.php?ses=$ses";
		if ($shortcut == "lounge") $url = "../chat/enter.php?ses=$ses&roomid=1";
		if ($shortcut == "chat") $url = "../chat/index.php?ses=$ses";
		if ($shortcut == "options") $url = "../options/index.php?ses=$ses";
		if ($shortcut == "friends") $url = "../friends/index.php?ses=$ses";
		if ($shortcut == "mailbox") $url = "../mail/index.php?ses=$ses";
		if ($shortcut == "albums") $url = "../imgstor/index.php?ses=$ses";
		if ($shortcut == "online") $url = "../extras/online.php?ses=$ses";


		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}






?>
