<?php



include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/config.php');
include('../scripts/functions.php');
include('../scripts/main.php');


$roomid = $_GET['roomid'];
if ($roomid == "")
{ $roomid = $_POST['roomid']; }

$chatmenu = $_GET['chatmenu'];
if ($chatmenu == "")
{ $chatmenu = $_POST['chatmenu']; }


$ses = $_GET["ses"];


$query = "SELECT * from forum_users where ses='$ses'";
$result = mysql_query ("$query");
$rowses = mysql_fetch_array($result);
$session = mysql_num_rows($result);

$login = $rowses['username'];



$query = "SELECT * from chatrooms where id='$roomid'";
$result = mysql_query ("$query");
$roomcount = mysql_num_rows($result);
$row = mysql_fetch_array($result);
$roomname = clean(strtolower($row["roomname"]));

$act_query = "UPDATE forum_users set lastactive=now(), location='leaving $roomname', room='' where username='$login'";
mysql_query($act_query);

$act_query = "UPDATE friends set lastactive=now(), location='leaving $roomname', room='' where friendname='$login'";
mysql_query($act_query);


$query ="INSERT INTO chatmsgs ( username , msg , timestamp, roomid ) values ( 'System', '(b)$login(/b) left $roomname!', now(), '$roomid' )";
mysql_query($query);





if ($chatmenu == "yes")
{
$url = "./index.php?ses=$ses";
}
else
{
$url = "../mainmenu.php?ses=$ses";
}

header("Last-Modified: " . gmdate("D, dMYH:i:s") . " GMT");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

header("HTTP/1.1 301 Moved Permanently");
header("Location: ".$url);
exit;
	


?>
