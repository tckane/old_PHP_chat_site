<?php


///////////////////////////////////////////////////////
////////////////////////////////////////////////



include("../scripts/dbcon.php");

$getsite = $_GET["getsite"];
$pagename = $_GET["pagename"];

if ($pagename == "") $pagename = $_POST["pagename"];
if ($getsite == "") $getsite = $_POST["getsite"];

$ses = $_COOKIE["sesh"];

$sqlbox = mysql_query("SELECT * from phoenix_wap where sysname='$getsite'");

$sqlnumbers = mysql_num_rows($sqlbox);
$sqlopen = mysql_fetch_array($sqlbox);



$owner = $sqlopen["owner"];


header("Last-Modified: " . gmdate("D, dMYH:i:s") . " GMT");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");


$act = $_GET["act"];
if ($act == "") $act = $_POST["act"];


$iid = $_GET['iid'];
if ($iid == "")
{ $iid = $_POST['iid']; }


///////////////////////////
$query = "SELECT * from forum_users where ses='$ses' and ses!=''";
$result = mysql_query ("$query");
$rowses = mysql_fetch_array($result);
$session = mysql_num_rows($result);

$login = $rowses['username'];
$group = $rowses['group'];



$message = $_GET['message'];
if ($message == "")
{ $message = $_POST['message']; }

$private = $_GET['private'];
if ($private == "")
{ $private = $_POST['private']; }



$message = mysql_real_escape_string("$message");
$private = mysql_real_escape_string("$private");


if ($login != "")
{


if ($act == "")
{



if (empty($message))
   {

$url = "./mod.chat.enter.php?getsite=$getsite&pagename=$pagename&roomid=$roomid";

header("HTTP/1.1 301 Moved Permanently");
header("Location: $url");
exit;
   }

if (isset($message))
    {

if ($private != "")
{
$query ="INSERT INTO phoenix_wap ( owner, title, sysname, date, locked, password, content, type ) values ( '$owner', '$login', '$pagename', now(), 1, '$private', '$message', 'chat' )";
mysql_query($query);
			

}
else
{
$query ="INSERT INTO phoenix_wap ( owner, title, sysname, date, content, type ) values ( '$owner', '$login', '$pagename', now(), '$message', 'chat'  )";
mysql_query($query);


}



$url = "./mod.chat.enter.php?getsite=$getsite&pagename=$pagename";

header("HTTP/1.1 301 Moved Permanently");
header("Location: $url");
exit;
	
}
}



if ($act == "pmopt")
{

$pmsetter = $_GET["pmsetter"];
if ($pmsetter == "") $pmsetter = $_POST["pmsetter"];


mysql_query("update forum_users set chatpms='$pmsetter' where username='$login'");


$url = "./mod.chat.enter.php?getsite=$getsite&pagename=$pagename&roomid=$roomid";

header("HTTP/1.1 301 Moved Permanently");
header("Location: $url");
exit;




}





if ($act == "clean" && $login == "$owner")
{

	mysql_query("delete from phoenix_wap where sysname='$pagename' and type='chat'");

	$query ="INSERT INTO phoenix_wap ( owner, title, sysname, content, date, type ) values ( '$owner', 'System', '$pagename', 'the chatroom was cleaned!', now(), 'chat' )";
	mysql_query($query);



	$url = "./mod.chat.enter.php?getsite=$getsite&pagename=$pagename&roomid=$roomid";
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;

}



if ($act == "bootyx")
{



	if ($group < 3)
	{
	$booted = $_POST["booted"];

	if ($booted != "")
	{
	mysql_query("update forum_users set ses='', room='', location='booted!' where username='$booted'");

	$query ="INSERT INTO chatmsgs ( username , msg , timestamp, roomid ) values ( 'System', '(b)$booted(/b) got =booted by (b)$login(/b)', now(), '$roomid' )";
	mysql_query($query);
	}


	$url = "./mod.chat.enter.php?getsite=$getsite&pagename=$pagename&roomid=$roomid";
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}
	else
	{
	$url = "./mod.chat.enter.php?getsite=$getsite&pagename=$pagename&roomid=$roomid";
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}
}






if ($act == "userboot")
{

$booted = $_POST["booted"];




$query2 = "SELECT * from forum_users where room='$roomid' and username='$booted' and userlevel>1";
$result2 = mysql_query ("$query2");
$count = mysql_num_rows($result2);



	if ($count > 0)
	{

		if ($booted != "")
		{
		mysql_query("update forum_users set ses='', room='', location='booted' where username='$booted'");
	
		$query ="INSERT INTO chatmsgs ( username , msg , timestamp, roomid ) values ( 'System', '(b)$booted(/b) got =booted by (b)$login(/b)', now(), '$roomid' )";
		mysql_query($query);

		$url = "./mod.chat.enter.php?getsite=$getsite&pagename=$pagename&roomid=$roomid";
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}
		else
		{
		$url = "./mod.chat.enter.php?getsite=$getsite&pagename=$pagename&roomid=$roomid";
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}
	}
	else
	{
	$url = "./mod.chat.enter.php?getsite=$getsite&pagename=$pagename&roomid=$roomid";
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}
}









if ($act == "userclean")
{



if ($group < 2)
{
$count = "1";
}
else
{
$query2 = "SELECT * from chatrooms where owner='$login' and id='$roomid'";
$result2 = mysql_query ("$query2");
$count = mysql_num_rows($result2);
}




	if ($count > 0)
	{
	mysql_query("delete from chatmsgs where roomid='$roomid'");



	$query ="INSERT INTO chatmsgs ( username , msg , timestamp, roomid ) values ( 'System', 'the chatroom was cleaned!', now(), '$roomid' )";
	mysql_query($query);


	$url = "./mod.chat.enter.php?getsite=$getsite&pagename=$pagename&roomid=$roomid";
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}
	else
	{
	$url = "./mod.chat.enter.php?getsite=$getsite&pagename=$pagename&roomid=$roomid";
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}


}




if ($act == "sinvite")
{

$user = $_POST["user"];
if ($user == "") $user = $_GET["user"];



$queryuser = "SELECT * from forum_users where username='$user'";
$resultuser = mysql_query ("$queryuser");
$ucount = mysql_num_rows($resultuser);
$ropeuser = mysql_fetch_array($resultuser);

$cinvites = $ropeuser["chatinvites"];



if ($cinvites == "on")

{

$cipoints = "1";

}
elseif ($cinvites == "bud")
{

$queryfriends1 = "SELECT * from friends where friendname='$user' AND username='$login'";
$resultfriends1 = mysql_query ("$queryfriends1");
$friendscount1 = mysql_num_rows($resultfriends1);

$queryfriends2 = "SELECT * from friends where username='$user' AND friendname='$login'";
$resultfriends2 = mysql_query ("$queryfriends2");
$friendscount2 = mysql_num_rows($resultfriends2);

}


$invitescore = ($cipoints + $friendscount1 + $friendscount2);


	if ($invitescore > 0)
	{
	
	$queryign1 = "SELECT * from chatignore where username='$user' AND ignored='$login'";
	$resultign1 = mysql_query ("$queryign1");
	$igncount1 = mysql_num_rows($resultign1);

	$queryign2 = "SELECT * from chatignore where ignored='$user' AND username='$login'";
	$resultign2 = mysql_query ("$queryign2");
	$igncount2 = mysql_num_rows($resultign2);

	$ignorecount = ($igncount1 + $igncount2);


		if ($ignorecount < 1)
		{


			$queryvv = "SELECT * from chatinvites where sender='$login' and recipient='$invitefrom'";
			$resultvv = mysql_query($queryvv);
			$numvv = mysql_num_rows($resultvv);

			if ($numvv < 1)
			{
			$sendinvite ="INSERT INTO chatinvites ( sender, recipient, roomid ) values ( '$login', '$user', '$roomid' )";
			mysql_query($sendinvite);
			}





			if ($chatpass == "")
			{

			$inform ="INSERT INTO chatmsgs ( username , msg , timestamp, roomid, private, userto ) values ( 'System', 'You have invited (b)$user(/b) to come and chat, please be patient as they may not see it right away.', now(), '$roomid', 'yes', '$login' )";
			mysql_query($inform);
			}
			else
			{

			$inform ="INSERT INTO chatmsgs ( username , msg , timestamp, roomid, private, userto ) values ( 'System', 'You have invited (b)$user(/b) to come and chat, please remember that this room is password protected - if you change your password your friend will not be able to use their invite!', now(), '$roomid', 'yes', '$login' )";
			mysql_query($inform);
			}


		$url = "./mod.chat.enter.php?getsite=$getsite&pagename=$pagename&roomid=$roomid";
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");

		}
		else
		{

		$inform ="INSERT INTO chatmsgs ( username , msg , timestamp, roomid, private, userto ) values ( 'System', 'Sorry, but (b)$user(/b) has chosen not to accept invites from you.', now(), '$roomid', 'yes', '$login' )";
		mysql_query($inform);

		$url = "./mod.chat.enter.php?getsite=$getsite&pagename=$pagename&roomid=$roomid";
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");

		}
	}
	else
	{

	$inform ="INSERT INTO chatmsgs ( username , msg , timestamp, roomid, private, userto ) values ( 'System', 'Sorry, but (b)$user(/b) has chosen not to accept invites from anyone.', now(), '$roomid', 'yes', '$login' )";
	mysql_query($inform);


	$url = "./mod.chat.enter.php?getsite=$getsite&pagename=$pagename&roomid=$roomid";
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}

exit;
}










if ($act == "cunblock")
{


$queryuser = "SELECT * from chatignore where id='$iid'";
$resultuser = mysql_query ("$queryuser");
$ucount = mysql_num_rows($resultuser);
$ropeuser = mysql_fetch_array($resultuser);
$user = $ropeuser["ignored"];


	$inform ="INSERT INTO chatmsgs ( username , msg , timestamp, roomid, private, userto ) values ( 'System', 'You have now unblocked (b)$user(/b), you may now recieve invites from this user.', now(), '$roomid', 'yes', '$login' )";
	mysql_query($inform);


	mysql_query("delete from chatignore where id='$iid'");


	$url = "./mod.chat.enter.php?getsite=$getsite&pagename=$pagename&roomid=$roomid";
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;

}

}
else
{
$url = "./mod.chat.enter.php?getsite=$getsite&pagename=$pagename&roomid=$roomid";
header("HTTP/1.1 301 Moved Permanently");
header("Location: $url");
exit;
}


?>
