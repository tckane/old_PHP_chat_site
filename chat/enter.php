<?php



include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/config.php');
include('../scripts/functions.php');
include('../scripts/main.php');

$roomid = $_GET['roomid'];
if ($roomid == "")
{ $roomid = $_POST['roomid']; }

$ses = $_GET["ses"];
if ($ses == "")
{ $ses = $_POST['ses']; }



$delinvite = $_GET["delinvite"];
if ($delinvite == "") $delinvite = $_POST["delinvite"];

if ($delinvite != "")
{
mysql_query("delete from chatinvites where id='$delinvite'");
}




$man = $_GET["man"];
if ($man == "")
{ $man = $_POST['man']; }


$rowner = $_GET["rowner"];
if ($rowner == "")
{ $rowner = $_POST['rowner']; }

$chatpass = $_GET["chatpass"];
if ($chatpass == "") $chatpass = $_POST["chatpass"];

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
$passcheck = $row["password"];



if ($passcheck != "")
{


	if ($chatpass == "$passcheck")
	{
	$go = "yes";
	}
	else
	{
	$go = "no";
	if ($chatpass != "") $error = urlencode("You have entered an incorrect password, please try again!");
	}


}
else
{
$go = "yes";
$error = "";
}






if ($go == "yes")
{


$query ="INSERT INTO chatmsgs ( username , msg , timestamp, roomid ) values ( 'System', '(b)$login(/b) entered $roomname!', now(), '$roomid' )";
mysql_query($query);

$act_query = "UPDATE forum_users set lastactive=now(), location='entering $roomname', room='$roomid' where username='$login'";
mysql_query($act_query);

$act_query = "UPDATE friends set lastactive=now(), location='entering $roomname', room='$roomid' where friendname='$login'";
mysql_query($act_query);


$url = "./chat.php?ses=$ses&roomid=$roomid&chatpass=$chatpass";

}

else
{



$url = "./passcheck.php?ses=$ses&roomid=$roomid&chatpass=$chatpass&err=$error";


}


header("Last-Modified: " . gmdate("D, dMYH:i:s") . " GMT");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

header("HTTP/1.1 301 Moved Permanently");
header("Location: ".$url);
exit;
	


?>
