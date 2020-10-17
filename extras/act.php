<?php


include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/config.php');
include('../scripts/functions.php');
include('../scripts/main.php');

$act = $_GET["act"];
$ses = $_GET["ses"];

if ($act == "shortcuts")
		{

$shortcut = $_GET["shortcut"];

		

		if ($shortcut == "" || $shortcut =="shortcuts") $url = "./online.php?ses=$ses";
		if ($shortcut == "forums") $url = "../forum/forums.php?ses=$ses";
		if ($shortcut == "options") $url = "../options/index.php?ses=$ses";
		if ($shortcut == "friends") $url = "../friends/index.php?ses=$ses";
		if ($shortcut == "uploader") $url = "../uploader/files.php?ses=$ses";
		if ($shortcut == "albums") $url = "../imgstor/index.php?ses=$ses";
		if ($shortcut == "mailbox") $url = "../mail/index.php?ses=$ses";


		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}




?>