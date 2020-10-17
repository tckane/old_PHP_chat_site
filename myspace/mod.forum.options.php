<?php

include("./inclusions/funx.php");
include("../scripts/dbcon.php");
//// MEMBER'S OWN
//// WAP SITES - GO!


$getsite = $_GET["getsite"];

$ses = $_COOKIE["sesh"];



$xxxxx = "SELECT * from forum_users where ses='$ses' and ses!=''";
$yyyyy = mysql_query ("$xxxxx");
$loggie = mysql_fetch_array($yyyyy);


$login = $loggie["username"];

$tid = $_GET["tid"];

// get site name

$sqlbox = mysql_query("SELECT * from phoenix_wap where sysname='$getsite'");

$sqlnumbers = mysql_num_rows($sqlbox);
$sqlopen = mysql_fetch_array($sqlbox);




$owner = $sqlopen["owner"];
$logo = $sqlopen["filename"];

$pagename = $_GET["pagename"];

$sqlbox = mysql_query("SELECT * from phoenix_wap where owner='$owner' AND type='module' AND sysname='$pagename' AND content='forum'");
$sqlopen = mysql_fetch_array($sqlbox);

$title = $sqlopen["title"];

$query = "select * from phoenix_topics where id=$tid";
$result =mysql_query($query);
$num_rows =mysql_num_rows($result);
$row = mysql_fetch_array($result);
$dele = $row["author"];
$lock = $row["locked"];
$stuck = $row["sticky"];







header("content-type: text/html; charset=utf-8");
header("Last-Modified: " . gmdate("D, dMYH:i:s") . " GMT");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

echo "<?xml version='1.0'?>
<!DOCTYPE html PUBLIC \"-//WAPFORUM//DTD XHTML Mobile 1.0//EN\" 
\"http://www.wapforum.org/DTD/xhtml-mobile10.dtd\">
<html>
<head>
<meta http-equiv=\"content-Type\" content=\"text/html; charset=utf-8\"/>$counterstrike<title>$title</title></head>
<body><p class=\"headfoot\">
<b>Administration Options<br/>For Topic #$tid</b></p><hr/><p class=\"chat\"><b>";





if ($group < 2) if ($lock =="no") echo "$hyfor <a href=\"./insert.php?ses=$ses&amp;act=close&amp;cat=$cat&amp;forum=$forum&amp;tid=$tid\">Lock Topic</a><br/>";
if ($group < 2) if ($lock =="yes") echo "$hyfor <a href=\"./insert.php?ses=$ses&amp;act=unlock&amp;cat=$cat&amp;forum=$forum&amp;tid=$tid\">Unlock Topic</a><br/>";

if ($group < 2) if ($stuck == 0) echo "$hyfor <a href=\"./insert.php?ses=$ses&amp;act=stickify&amp;cat=$cat&amp;forum=$forum&amp;tid=$tid\">Sticky Topic</a><br/>";
if ($group < 2) if ($stuck == 1) echo "$hyfor <a href=\"./insert.php?ses=$ses&amp;act=release&amp;cat=$cat&amp;forum=$forum&amp;tid=$tid\">Unstick Topic</a><br/>";

if ($group < 2) echo "$hyfor <a href=\"./insert.php?ses=$ses&amp;act=del&amp;cat=$cat&amp;forum=$forum&amp;tid=$tid\">Delete Topic</a></b></p>";


$query = "select * from phoenix_forums where type='forum' ORDER BY name ASC";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);



echo "<form class=\"chat\" action=\"insert.php?ses=$ses&amp;act=movepost\" method=\"get\">
<fieldset>
<b>Move Topic</b><br/>
<select name=\"forumto\">";

while ($row)
	{
	$name = $row["name"];
	$forum = $row["forum"];	
	echo "<option value=\"$forum\">$name</option>";
           	$row = mysql_fetch_array($result);
	}

echo "</select><br/>
<input type=\"submit\" value=\"move it\"/>
<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
<input type=\"hidden\" name=\"act\" value=\"movepost\"/>
<input type=\"hidden\" name=\"cat\" value=\"$cat\"/>
<input type=\"hidden\" name=\"forum\" value=\"$forum\"/>
<input type=\"hidden\" name=\"tid\" value=\"$tid\"/>
</fieldset></form>";


echo "<hr/><p class=\"headfoot\">$hyback <a href=\"./topics.php?ses=$ses&amp;cat=$cat&amp;forum=$forum&amp;page=$topage\">back to board</a><br/>
$hyback <a href=\"../forum/forums.php?ses=$ses\">message board</a><br/>
$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";
echo "</p></body></html>";



?>



