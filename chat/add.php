<?php



include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/config.php');
include('../scripts/functions.php');
include('../scripts/main.php');

$login = $row_ses["username"];
$pmsetter = $row_ses["chatpms"];
$group = $row_ses["userlevel"];


$owner = $row_ses["owner"];

$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];

$chatpass = $_GET["chatpass"];
if ($chatpass == "") $chatpass = $_POST["chatpass"];


$roomid = $_GET["roomid"];
if ($roomid == "") $ses = $_POST["roomid"];

$act_query = "UPDATE forum_users set lastactive=now(), location='chat' where username='$login'";
mysql_query($act_query);

$act_query = "UPDATE friends set lastactive=now(), location='chat' where friendname='$login'";
mysql_query($act_query);

echo "<p class=\"break\"><b>add message</b>$inboxes$breaker</p>";

echo "<form class=\"breakforum\" action=\"./insert.php\" method=\"post\">
<fieldset>
<b>Message:</b><br/>
<textarea name=\"message\" rows=\"3\" cols=\"20\"></textarea>
<br/>
<b>Send Privately?</b><br/>
<select name=\"private\">
<option value=\"\">Not This Time</option>";


$query = "SELECT * from forum_users where lastactive > DATE_ADD(NOW(), INTERVAL -$interval MINUTE) and location='chat' and username!='$login' and chatpms='yes' and room='$roomid' ORDER BY lastactive DESC";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

while ($row)
      	{
       	$name = $row["username"];
	$userid = $row["id"];


	echo "<option value=\"$name\">Yes, To: $name</option>";

       	$row = mysql_fetch_array($result);
      	}


echo "</select><br/><input type=\"submit\" class=\"textbox\" value=\"-&gt; write\"/>
<input type=\"hidden\" value=\"$id\" name=\"id\"/>
<input type=\"hidden\" value=\"$login\" name=\"login\"/>
<input type=\"hidden\" value=\"$ses\" name=\"ses\"/>
<input type=\"hidden\" value=\"$roomid\" name=\"roomid\"/>
<input type=\"hidden\" value=\"$chatpass\" name=\"chatpass\"/>
</fieldset></form>";





echo "<p class=\"break\">Chat Options</p><p class=\"breakforum\"><b>";



if ($pmsetter == "yes") echo "$hyfor <a href=\"./insert.php?ses=$ses&amp;act=pmopt&amp;pmsetter=no&amp;roomid=$roomid&amp;chatpass=$chatpass\">block private messages</a>";
else echo "$hyfor <a href=\"./insert.php?ses=$ses&amp;act=pmopt&amp;pmsetter=yes&amp;roomid=$roomid&amp;chatpass=$chatpass\">allow private messages</a>";
echo "</b></p>";




echo "<form class=\"breakforum\" action=\"./insert.php\" method=\"post\">
<fieldset>
<b>Invite Someone To Chat?</b><br/>
<select name=\"user\">
<option value=\"\">Select Member</option>";

$query = "SELECT * from forum_users where lastactive > DATE_ADD(NOW(), INTERVAL -$interval MINUTE)  and chatinvites!='off' and username!='$login' and room!='$roomid' ORDER BY lastactive DESC";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

while ($row)
      	{
       	$name = $row["username"];
	$userid = $row["id"];


	echo "<option value=\"$name\">Invite $name</option>";

       	$row = mysql_fetch_array($result);
      	}


echo "</select><br/>
<input type=\"submit\" value=\"send invite\"/>
<input type=\"hidden\" value=\"$id\" name=\"id\"/>
<input type=\"hidden\" value=\"sinvite\" name=\"act\"/>
<input type=\"hidden\" value=\"$login\" name=\"login\"/>
<input type=\"hidden\" value=\"$ses\" name=\"ses\"/>
<input type=\"hidden\" value=\"$roomid\" name=\"roomid\"/>
<input type=\"hidden\" value=\"$chatpass\" name=\"chatpass\"/>
</fieldset></form>";













$query = "SELECT * from chatignore where username='$login'";
$result = mysql_query($query);
$numblock = mysql_num_rows($result);

if ($numblock > 0)
{

echo "<form class=\"breakforum\" action=\"./insert.php\" method=\"post\">
<fieldset>
<b>Blocked Invites</b><br/>
<i>Select from the list of users below and then click 'unblock' to allow invites to be exchanged between you</i><br/>
<select name=\"iid\">
<option value=\"\">Select Member</option>";

$query = "SELECT * from chatignore where username='$login'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

while ($row)
      	{
       	$name = $row["ignored"];
	$userid = $row["id"];


	echo "<option value=\"$userid\">$name</option>";

       	$row = mysql_fetch_array($result);
      	}


echo "</select><br/>
<input type=\"submit\" value=\"unblock\"/>
<input type=\"hidden\" value=\"$id\" name=\"id\"/>
<input type=\"hidden\" value=\"cunblock\" name=\"act\"/>
<input type=\"hidden\" value=\"$login\" name=\"login\"/>
<input type=\"hidden\" value=\"$ses\" name=\"ses\"/>
<input type=\"hidden\" value=\"$roomid\" name=\"roomid\"/>
<input type=\"hidden\" value=\"$chatpass\" name=\"chatpass\"/>
</fieldset></form>";

}







// ADMIN BELOW












## //////////////////////////////////////////////////////////////////////
## /////////// GLOBAL ADMIN OPTIONS: BOOT, CLEAN ROOM - START
## //////////////////////////////////////////////////////////////////////


$query = "SELECT * from chatrooms where id='$roomid'";
$result = mysql_query ("$query");
$roomcount = mysql_num_rows($result);
$rope = mysql_fetch_array($result);
$roomname = $rope["roomname"];
$roomowner = $rope["owner"];
$roomtype = $rope["type"];





if ($group < 2 && $roomtype != "user")

{


echo "<p class=\"break\">Administration</p>";

echo "<form class=\"breakforum\" action=\"./insert.php\" method=\"post\">
<fieldset>

<select name=\"booted\">
<option value=\"\">Boot User</option>";


if ($owner == "yes")
{
$query = "SELECT * from forum_users where lastactive > DATE_ADD(NOW(), INTERVAL -$interval MINUTE) and location='chat' and username!='$login' and username!='admin' and room='$roomid' ORDER BY lastactive DESC";
}
else
{
$query = "SELECT * from forum_users where lastactive > DATE_ADD(NOW(), INTERVAL -$interval MINUTE) and location='chat' and username!='$login' and userlevel>1 and username!='admin' and room='$roomid' ORDER BY lastactive DESC";
}



$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

while ($row)
      	{
       	$name = $row["username"];
	$userid = $row["id"];


	echo "<option value=\"$name\">$name</option>";

       	$row = mysql_fetch_array($result);
      	}


echo "</select><input type=\"submit\" class=\"textbox\" value=\"boot\"/>

<input type=\"hidden\" value=\"bootyx\" name=\"act\"/>
<input type=\"hidden\" value=\"$roomid\" name=\"roomid\"/>
<input type=\"hidden\" value=\"$chatpass\" name=\"chatpass\"/>
<input type=\"hidden\" value=\"$ses\" name=\"ses\"/></fieldset></form>";

echo "<p class=\"breakforum\"><b><a href=\"./insert.php?ses=$ses&amp;act=clean&amp;roomid=$roomid&amp;chatpass=$chatpass\">clean chat</a></b></p>";

}



## //////////////////////////////////////////////////////////////////////
## /////////// GLOBAL ADMIN OPTIONS: BOOT, CLEAN ROOM - END
## //////////////////////////////////////////////////////////////////////



## //////////////////////////////////////////////////////////////////////
## /////////// USER ROOM ADMIN OPTIONS: BOOT, CLEAN ROOM, EDIT LINK - BEGIN
## //////////////////////////////////////////////////////////////////////


if ($roomtype != "system")
{

if ($roomowner == "$login" || $group < 2)
{



echo "<p class=\"break\">Chat Administration</p>";

echo "<form class=\"breakforum\" action=\"./insert.php\" method=\"post\">
<fieldset>

<select name=\"booted\">
<option value=\"\">Boot User</option>";


if ($owner == "yes")
{
$query = "SELECT * from forum_users where lastactive > DATE_ADD(NOW(), INTERVAL -$interval MINUTE) and location='chat' and username!='$login' and username!='admin' and room='$roomid' ORDER BY lastactive DESC";
}
else
{
$query = "SELECT * from forum_users where lastactive > DATE_ADD(NOW(), INTERVAL -$interval MINUTE) and location='chat' and username!='$login' and userlevel>1 and username!='admin' and room='$roomid ORDER BY lastactive DESC";
}



$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

while ($row)
      	{
       	$name = $row["username"];
	$userid = $row["id"];


	echo "<option value=\"$name\">$name</option>";

       	$row = mysql_fetch_array($result);
      	}


echo "</select><input type=\"submit\" class=\"textbox\" value=\"boot\"/>

<input type=\"hidden\" value=\"userboot\" name=\"act\"/>
<input type=\"hidden\" value=\"$roomid\" name=\"roomid\"/>
<input type=\"hidden\" value=\"$chatpass\" name=\"chatpass\"/>
<input type=\"hidden\" value=\"$ses\" name=\"ses\"/></fieldset></form>";

echo "<p class=\"breakforum\"><b>
<a href=\"./edit.php?ses=$ses\">edit my room</a><br/>

<a href=\"./insert.php?ses=$ses&amp;act=userclean&amp;roomid=$roomid&amp;chatpass=$chatpass\">clean chat</a></b></p>";


}
}

## //////////////////////////////////////////////////////////////////////
## /////////// USER ROOM ADMIN OPTIONS: BOOT, CLEAN ROOM, EDIT LINK - END
## //////////////////////////////////////////////////////////////////////


echo "<p class=\"break\"><a href=\"./chat.php?ses=$ses&amp;roomid=$roomid&amp;chatpass=$chatpass\">cancel</a><br/>
<a href=\"./leave.php?ses=$ses&amp;roomid=$roomid&amp;chatmenu=yes&amp;chatpass=$chatpass\">chat menu</a><br/>
<a href=\"./leave.php?ses=$ses&amp;roomid=$roomid&amp;chatpass=$chatpass\">main menu</a>";



echo "</p></body></html>";

		


?>

