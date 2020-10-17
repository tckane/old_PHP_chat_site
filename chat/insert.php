<?php


///////////////////////////////////////////////////////
////////////////////////////////////////////////

include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/config.php');
include('../scripts/functions.php');
include('../scripts/main.php');
include('../scripts/dbcon.php');
include('../scripts/cleaner.php');

header("Last-Modified: " . gmdate("D, dMYH:i:s") . " GMT");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");


$act = $_GET["act"];
if ($act == "") $act = $_POST["act"];

$chatpass = $_GET["chatpass"];
if ($chatpass == "") $chatpass = $_POST["chatpass"];

$roomid = $_GET['roomid'];
if ($roomid == "")
{ $roomid = $_POST['roomid']; }

$iid = $_GET['iid'];
if ($iid == "")
{ $iid = $_POST['iid']; }

$vday = date("D");

if ($vday == "Mon") $day = "monday";
elseif ($vday == "Tue") $day = "tuesday";
elseif ($vday == "Wed") $day = "wednesday";
elseif ($vday == "Thu") $day = "thursday";
elseif ($vday == "Fri") $day = "friday";
elseif ($vday == "Sat") $day = "saturday";
elseif ($vday == "Sun") $day = "sunday";


$vmonth = date("M");

if ($vmonth == "Jan") $month = "january";
elseif ($vmonth == "Feb") $month = "february";
elseif ($vmonth == "Mar") $month = "march";
elseif ($vmonth == "Apr") $month = "april";
elseif ($vmonth == "May") $month = "may";
elseif ($vmonth == "Jun") $month = "june";
elseif ($vmonth == "Jul") $month = "july";

elseif ($vmonth == "Aug") $month = "august";
elseif ($vmonth == "Sep") $month = "september";
elseif ($vmonth == "Oct") $month = "october";
elseif ($vmonth == "Nov") $month = "november";
elseif ($vmonth == "Dec") $month = "december";

$number = date("jS");
$rawdate = "$day, $month $number";
$date = "<small>$rawdate</small>";

$momo = date("m");
$dada = date("d");
$yaya = date("Y");
$seconds = date("s");
$time = date("H:i");


$msgsandposts = "$day $number $month $yaya @ $time";

$imgsdate = "$day $number $month $yaya";


$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];

///////////////////////////
$query = "SELECT * from forum_users where ses='$ses'";
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



$message = clean("$message");
$private = clean("$private");


if ($login != "")
{


if ($act == "")
{



if (empty($message))
   {

$url = "./chat.php?ses=$ses&chatpass=$chatpass&roomid=$roomid";

header("HTTP/1.1 301 Moved Permanently");
header("Location: $url");
exit;
   }

if (isset($message))
    {

if ($private != "")
{
$query ="INSERT INTO chatmsgs ( username , msg , timestamp, userto, private, roomid ) values ( '$login', '$message', now(), '$private', 'yes', '$roomid' )";
mysql_query($query);
			

}
else
{
$query ="INSERT INTO chatmsgs ( username , msg , timestamp, roomid ) values ( '$login', '$message', now(), '$roomid' )";
mysql_query($query);


}

			/// score - credit

			$query = "update forum_users set posts=posts+10, credits=credits+5 where username='$login'";
			mysql_query($query);

			///


$url = "./chat.php?ses=$ses&chatpass=$chatpass&roomid=$roomid";

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


$url = "./chat.php?ses=$ses&chatpass=$chatpass&roomid=$roomid";

header("HTTP/1.1 301 Moved Permanently");
header("Location: $url");
exit;




}





if ($act == "clean")
{
	if ($group < 2)
	{
	mysql_query("delete from chatmsgs where roomid='$roomid'");



	$query ="INSERT INTO chatmsgs ( username , msg , timestamp, roomid ) values ( 'System', 'the chatroom was cleaned!', now(), '$roomid' )";
	mysql_query($query);


	$url = "./chat.php?ses=$ses&chatpass=$chatpass&roomid=$roomid";
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}
	else
	{
	$url = "./chat.php?ses=$ses&chatpass=$chatpass&roomid=$roomid";
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}
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


	$url = "./chat.php?ses=$ses&chatpass=$chatpass&roomid=$roomid";
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}
	else
	{
	$url = "./chat.php?ses=$ses&chatpass=$chatpass&roomid=$roomid";
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}
}





if ($act == "createroom")
{
// act begin

$croomname = clean($_POST["croomname"]);
$cwelcome = clean($_POST["cwelcome"]);
$cpassword = clean($_POST["cpassword"]);


$query = "SELECT * from chatrooms where owner='$login'";
$result = mysql_query ("$query");
$roomcount = mysql_num_rows($result);


if ($roomcount < 1)
	{
	// amount of rooms user has begin

	$query2 = "SELECT * from chatrooms where roomname='$croomname'";
	$result2 = mysql_query ("$query2");
	$roomcount2 = mysql_num_rows($result2);
	
	if ($roomcount2 < 1)
		{
		// amount of rooms with same name begin

		$query ="INSERT INTO chatrooms ( owner, roomname, welcome, type, password ) values ( '$login', '$croomname', '$cwelcome', 'user', '$cpassword' )";
		mysql_query($query);


			/// score - credit

			$query = "update forum_users set posts=posts+15, credits=credits+7 where username='$login'";
			mysql_query($query);

			///


		$urlmsg = urlencode("Done! Your room has been created, you'll see it on the list below and it will also appear on your profile!");
		$url = "./index.php?ses=$ses&chatpass=$chatpass&err=$urlmsg";
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;

		}
		else
		{
		$urlmsg = urlencode("Sorry, another member has chosen this name, please choose another.");
		$url = "./index.php?ses=$ses&chatpass=$chatpass&err=$urlmsg";
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;

		// amount of rooms with same name begin
		}
	}
	else
	{
	$urlmsg = urlencode("Sorry, you can currently only have one room at a time, please edit the room you already have to get it how you want it or delete it.");
	$url = "./index.php?ses=$ses&chatpass=$chatpass&err=$urlmsg";
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	// amount of rooms user has end
	}
// act end
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

		$url = "./chat.php?ses=$ses&chatpass=$chatpass&roomid=$roomid";
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}
		else
		{
		$url = "./chat.php?ses=$ses&chatpass=$chatpass&roomid=$roomid";
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}
	}
	else
	{
	$url = "./chat.php?ses=$ses&chatpass=$chatpass&roomid=$roomid";
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


	$url = "./chat.php?ses=$ses&chatpass=$chatpass&roomid=$roomid";
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}
	else
	{
	$url = "./chat.php?ses=$ses&chatpass=$chatpass&roomid=$roomid";
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}


}




if ($act == "editroom")
{
// act begin

$croomname = clean($_POST["croomname"]);
$cwelcome = clean($_POST["cwelcome"]);
$cpassword = clean($_POST["cpassword"]);

$query = "SELECT * from chatrooms where owner='$login'";
$result = mysql_query ("$query");
$roomcount = mysql_num_rows($result);


if ($roomcount > 0)
	{
	// amount of rooms user has begin

	$query2 = "SELECT * from chatrooms where roomname='$croomname' and owner!='$login'";
	$result2 = mysql_query ("$query2");
	$roomcount2 = mysql_num_rows($result2);
	
	if ($roomcount2 < 1)
		{
		// amount of rooms with same name begin


		$query = "UPDATE chatrooms set roomname='$croomname', welcome='$cwelcome', password='$cpassword' where owner='$login' and id='$roomid'";
		mysql_query($query);

		$urlmsg = urlencode("Done! The changes have been applied to your room!");
		$url = "./index.php?ses=$ses&chatpass=$chatpass&err=$urlmsg";
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;

		}
		else
		{
		$urlmsg = urlencode("Sorry, another user has selected this room name, edit failure!");
		$url = "./index.php?ses=$ses&chatpass=$chatpass&err=$urlmsg";
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;

		// amount of rooms with same name begin
		}
	}
	else
	{
	$urlmsg = urlencode("Sorry, this is NOT your room!");
	$url = "./index.php?ses=$ses&chatpass=$chatpass&err=$urlmsg";
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	// amount of rooms user has end
	}
// act end
}








if ($act == "delroom")
{

$query = "SELECT * from chatrooms where owner='$login'";
$result = mysql_query ("$query");
$roomcount = mysql_num_rows($result);
$rope = mysql_fetch_array($result);

$cid = $rope["id"];

	if ($roomcount > 0)
	{

	mysql_query("delete from chatrooms where id='$cid'");

	$urlmsg = urlencode("Your chatroom was deleted!");
	$url = "./index.php?ses=$ses&chatpass=$chatpass&err=$urlmsg";
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	}
	else
	{

	$urlmsg = urlencode("Done!");
	$url = "./index.php?ses=$ses&chatpass=$chatpass&err=$urlmsg";
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");

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


		$url = "./chat.php?ses=$ses&chatpass=$chatpass&roomid=$roomid";
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");

		}
		else
		{

		$inform ="INSERT INTO chatmsgs ( username , msg , timestamp, roomid, private, userto ) values ( 'System', 'Sorry, but (b)$user(/b) has chosen not to accept invites from you.', now(), '$roomid', 'yes', '$login' )";
		mysql_query($inform);

		$url = "./chat.php?ses=$ses&chatpass=$chatpass&roomid=$roomid";
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");

		}
	}
	else
	{

	$inform ="INSERT INTO chatmsgs ( username , msg , timestamp, roomid, private, userto ) values ( 'System', 'Sorry, but (b)$user(/b) has chosen not to accept invites from anyone.', now(), '$roomid', 'yes', '$login' )";
	mysql_query($inform);


	$url = "./chat.php?ses=$ses&chatpass=$chatpass&roomid=$roomid";
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


	$url = "./chat.php?ses=$ses&chatpass=$chatpass&roomid=$roomid";
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;

}

}
else
{
$url = "./chat.php?ses=$ses&chatpass=$chatpass&roomid=$roomid";
header("HTTP/1.1 301 Moved Permanently");
header("Location: $url");
exit;
}


?>
