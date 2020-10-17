<?php


include("./inclusions/funx.php");
include("../scripts/dbcon.php");
//// MEMBER'S OWN
//// WAP SITES - GO!


$getsite = $_GET["getsite"];


$ses = $_COOKIE["sesh"];

$query = "SELECT * from forum_users where ses='$ses'";
$result = mysql_query ("$query");
$rowses = mysql_fetch_array($result);
$session = mysql_num_rows($result);

$login = $rowses['username'];
$group = $rowses['group'];
$pmsetter = $rowses['chatpms'];

$query = "UPDATE friends set lastactive=now(), location='chat', room='$roomid' where friendname='$login'";
mysql_query($query);


$act_query = "UPDATE forum_users set lastactive=now(), location='chat', room='$roomid'  where username='$login'";
mysql_query($act_query);


//////////////////////////////////////////////////////////////
// get site name

$sqlbox = mysql_query("SELECT * from phoenix_wap where sysname='$getsite'");

$sqlnumbers = mysql_num_rows($sqlbox);
$sqlopen = mysql_fetch_array($sqlbox);




$owner = $sqlopen["owner"];
$logo = $sqlopen["filename"];

$pagename = $_GET["pagename"];

$sqlbox = mysql_query("SELECT * from phoenix_wap where owner='$owner' AND type='module' AND sysname='$pagename' AND content='chat'");
$sqlopen = mysql_fetch_array($sqlbox);

$title = $sqlopen["title"];
$content = stripslashes(strip_javascript(clean(htmlspecialchars_decode($sqlopen["content"]))));
$counterstrike = urldecode($sqlopen["stylesheet"]);
$id = $sqlopen["id"];


$content = str_replace("~euro","&#8364;",$content);
$content = str_replace(chr(10),"<br/>",$content);
$content = str_replace("===","<br/>",$content);
$content = str_replace("rn","<br/>",$content);




echo "<?xml version='1.0'?>
<!DOCTYPE html PUBLIC \"-//WAPFORUM//DTD XHTML Mobile 1.0//EN\" 
\"http://www.wapforum.org/DTD/xhtml-mobile10.dtd\">
<html>
<head>
<meta http-equiv=\"content-Type\" content=\"text/html; charset=utf-8\"/>$counterstrike<title>$title</title></head>
<body><p class=\"headfoot\"><b>add message</b>$inboxes$breaker</p>";

echo "<form class=\"chat\" action=\"./mod.chat.insert.php\" method=\"post\">
<fieldset style=\"border: none;\">
<b>Message:</b><br/>
<textarea name=\"message\" rows=\"3\" cols=\"20\"></textarea>
<br/>
<b>Send Privately?</b><br/>
<select name=\"private\">
<option value=\"\">Not This Time</option>";


$query = "SELECT * from forum_users where lastactive > DATE_ADD(NOW(), INTERVAL -$interval MINUTE) and location='chat' and username!='$login' and chatpms='yes' and room='$pagename' ORDER BY lastactive DESC";
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
<input type=\"hidden\" value=\"$getsite\" name=\"getsite\"/>
<input type=\"hidden\" value=\"$pagename\" name=\"pagename\"/>
</fieldset></form>";





echo "<p class=\"headfoot\"><b>Chat Options</b></p><p class=\"chat\"><b>";



if ($pmsetter == "yes") echo "$hyfor <a href=\"./mod.chat.insert.php?pagename=$pagename&amp;getsite=$getsite&amp;act=pmopt&amp;pmsetter=no\">block private messages</a>";
else echo "$hyfor <a href=\"./mod.chat.insert.php?pagename=$pagename&amp;getsite=$getsite&amp;act=pmopt&amp;pmsetter=yes\">allow private messages</a>";



if ($login == "$owner") echo "<br/><a href=\"./mod.chat.insert.php?pagename=$pagename&amp;getsite=$getsite&amp;act=clean\">clean chat</a>";

echo "</b></p>";


echo "<p class=\"headfoot\"><a href=\"./mod.chat.enter.php?pagename=$pagename&amp;getsite=$getsite\">cancel</a><br/>
<a href=\"./mod.chat.leave.php?getsite=$getsite&amp;pagename=$pagename\">leave chat</a>";



echo "</p></body></html>";

		


?>

