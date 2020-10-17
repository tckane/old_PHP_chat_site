<?php



include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/config.php');
include('../scripts/functions.php');
include('../scripts/main.php');


$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];

$err = $_GET["err"];


# Fetching member info from the session.
$login = $row_ses["username"];
$reload = $row_ses["creload"];
$max = $row_ses["cmax"];
$filter = $row_ses["filter"];
$sicn = $row_ses["sicn"];
$pmsetter = $row_ses["chatpms"];

$query = "UPDATE friends set lastactive=now(), location='chat', room='' where friendname='$login'";
mysql_query($query);


$act_query = "UPDATE forum_users set lastactive=now(), location='chat', room='' where username='$login'";
mysql_query($act_query);




if ($act == "")
{
if ($group < 4)
{


$helplink = "<br/><small><a href=\"./index.php?ses=$ses&amp;act=about\">chat help</a></small>";



if ($err != "") $front = "$err";
else $front = "Choose a room - or create your own!";


if ($bwmode == "off") $subtite = "<img align=\"middle\" src=\"../scripts/phoenix.php?string=Chat%20Rooms&login=$login\" alt=\"Chat Rooms\" />";
else $subtite = "<b><big>Chat Rooms</big></b>";

echo "<p class=\"break\">$subtite$inboxes$helplink</p>
<p class=\"breakforum\" style=\"text-align: center;\">
<b>$front</b></p>
<p class=\"break\"><big>Main Rooms</big></p>";




##/////////////////////////////
## /////// SYSTEM CHATROOMS
##/////////////////////////////


$query = "SELECT * from chatrooms where type='system' ORDER BY id ASC";
$result = mysql_query ("$query");
$totaltexts = mysql_num_rows($result);


$query = "SELECT * from chatrooms where type='system' ORDER BY id ASC";
$result = mysql_query ("$query");
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);
# Displaying chat messages
while ($row)
      {
       $roomname = $row["roomname"];
       $id = $row["id"];

       $welch = $row["welcome"];

       $welch = funk_it_up($welch);
       $welch = add_sicn($welch);

$querychat = "SELECT * from forum_users where lastactive > DATE_ADD(NOW(), INTERVAL -$interval MINUTE) and room='$id'";
$resultchat = mysql_query($querychat);
$numchat = mysql_num_rows($resultchat);

if ($numchat > 1) $chatting = "[$numchat]";
elseif ($numchat == 1) $chatting = "[1]";
else $chatting = "";

echo "<p class=\"breakforum\" style=\"text-align: center;\"><b><big><a href=\"./enter.php?ses=$ses&amp;roomid=$id\">$roomname$chatting</a></big></b><br/>
<b><small><i>$welch</i></small></b></b></p>";


	$row = mysql_fetch_array($result);
      }







##/////////////////////////////
## /////// MEMBER'S CHATROOMS
##/////////////////////////////



$query = "SELECT * from chatrooms where type='user' ORDER BY id ASC";
$result = mysql_query ("$query");
$totalrooms = mysql_num_rows($result);




echo "<p class=\"break\"><big>Member's Rooms</big></p>";

if ($totalrooms == 1) $allrooms = "There is one user created room.";
elseif ($totalrooms > 1) $allrooms = "There are $totalrooms user created rooms.";
else $allrooms = "There are no user created rooms.";

echo "<p class=\"breakforum\" style=\"text-align: center\"><b><i>$allrooms</i></b></p>";

$query = "SELECT * from chatrooms where type='user' ORDER BY id ASC";
$result = mysql_query ("$query");
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);
# Displaying chat messages
while ($row)
      {
       $roomname = $row["roomname"];
       $rid = $row["id"];
       $rowner = $row["owner"];
       $welch = $row["welcome"];


       $welch = funk_it_up($welch);
       $welch = add_sicn($welch);


$pizazz = $row["password"];
if ($pizazz != "") $passlogo = "<img align=\"middle\" src=\"../images/topiclocked.gif\" alt=\"password required\"/>";
else $passlogo = "";


$querychat = "SELECT * from forum_users where lastactive > DATE_ADD(NOW(), INTERVAL -$interval MINUTE) and room='$rid'";
$resultchat = mysql_query($querychat);
$numchat = mysql_num_rows($resultchat);

if ($numchat > 1) $chatting = "[$numchat]";
elseif ($numchat == 1) $chatting = "[1]";
else $chatting = "";


echo "<p class=\"breakforum\" style=\"text-align: center;\"><b><big><a href=\"./enter.php?ses=$ses&amp;roomid=$rid\">$roomname$chatting</a></big>$passlogo</b><br/>
<b><small><i>$welch</i></small></b></p>";


	$row = mysql_fetch_array($result);
      }




$query = "SELECT * from chatrooms where owner='$login'";
$result = mysql_query ("$query");
$roomcount = mysql_num_rows($result);
$rolo = mysql_fetch_array($result);
$roomid = $rolo["id"];

if ($roomcount > 0)
{
$clink = "$hyfor <a href=\"./enter.php?ses=$ses&amp;roomid=$roomid\">enter my chatroom</a><br/>
$hyfor <a href=\"./edit.php?ses=$ses\">edit my chatroom</a><br/>";
}
else
{
$clink = "$hyfor <a href=\"./create.php?ses=$ses\">create a chatroom</a><br/>";
}




echo "<p class=\"break\">$clink
$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";





}
else
{



	echo "<p class=\"break\"><img src=\"../scripts/phoenix.php?string=account%20restricted!&amp;login=$login\" alt=\"account restricted!\"/></p><hr/>
	<p class=\"breakforum\" style=\"text-align: center;\">";

	echo "Sorry, your account appears to be restricted, this may be due to misconduct on your part or an error on our part.<br/><br/>
	During the period of restriction you will be unable to use chat or some other functions of this site, this is for the protection of other users.<br/><br/>
	If you feel that this is an error and you have done nothing wrong please contact an administrator.";

	echo "</p><hr/><p class=\"break\">$breaker$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>$shortcuts</p></body></html>";
	exit;




}







}




if ($act == "about")
{

echo "<p class=\"break\"><b><big>About Chat</big></b>
<br/><small><a href=\"../about.php?ses=$ses&amp;act=about\">help menu</a></small></p><hr/>
<p class=\"breakforum\" style=\"text-align: center;\"><b><big>Everything you need to know about the chat system.</big></b></p>
<p class=\"breakforum\">
<b>What is it?</b> - <i>it is a place where you can join or start a chat session.</i><br/><br/>
<b>Where is it?</b> - <i>main menu! - you can also access it from the Shortcuts list.</i><br/><br/>
<b>Where can i get privacy?</b> - <i>you can create your own room and lock it with a password, you can then click WRITE from within your room and send invites to users which are delivered via the POP Message system.</i><br/><br/>
<b>How do i keep bad people out of my room?</b> - <i>If a user starts 'trolling' your room or is generally disrupting the flow of chat, you can BOOT this user from the WRITE menu. this will end that user's session on $sitename and they will have to login again.</i><br/><br/>


<b>Extra Help</b> - <i>if you have questions or need help with chat, feel free to send a message to <a href=\"../mail/index.php?ses=$ses&amp;senduser=$PHNAME&amp;act=presetuser\">$PHNAME</a>.</i>
</p><hr/><p class=\"break\">
    $hyback <a href=\"index.php?ses=$ses\">back</a><br/>
    $hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
exit;


}











?>
