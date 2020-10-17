<?php

include("./inclusions/funx.php");
include("../scripts/dbcon.php");
//// MEMBER'S OWN
//// WAP SITES - GO!

$login = $row_ses["username"];
$backg = $row_ses["bg_col"];
$myco = $row_ses["my_color"];
$tmax = $row_ses["tmax"];
$chat = $_GET["chat"];
$act = $_GET["act"];

$query = "select * from welcome where id='1'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);
//
//
$lback = $row['linkbackaddress'];

$getsite = $_GET["getsite"];
$ses = $_COOKIE["sesh"];
$letter = $_GET["letter"];

$page = $_GET["page"];

//////////////////////////////////////////////////////////////
// get site name

$sqlbox = mysql_query("SELECT * from phoenix_wap where sysname='$getsite'");

$sqlnumbers = mysql_num_rows($sqlbox);
$sqlopen = mysql_fetch_array($sqlbox);


$tmax = 20;

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


if ($act == "")
{
if ($ses != "")
{
header("content-type: text/html; charset=utf-8");
header("Last-Modified: " . gmdate("D, dMYH:i:s") . " GMT");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");



$act_query = "UPDATE forum_users set lastactive=now(), location='viewing icon list', room='' where username='$login'";
mysql_query($act_query);

$query = "UPDATE friends set lastactive=now(), location='viewing icon list', room='' where friendname='$login'";
mysql_query($query);




if (empty($page) || ($page < 1)) $page = 1; $max = $tmax;  $start = ($page-1) * $max;






if ($letter != "")
{
$quasi = "SELECT count(*) from phoenix_icons where typed LIKE'=$letter%'";
$modo = "SELECT * from phoenix_icons where typed LIKE '=$letter%' ORDER BY typed ASC LIMIT $start, $max";
$lettershow = strtoupper("$letter");
$addon = " that begin with the letter $lettershow";
}
else
{
$quasi = "SELECT count(*) from phoenix_icons where typed LIKE'=%'";
$modo = "SELECT * from phoenix_icons where typed LIKE '=%' ORDER BY typed ASC LIMIT $start, $max";
$addon = " in total";
}



$query = "$quasi";
$result =mysql_query($query);
$row2 =mysql_fetch_array($result);
$count = $row2[0];


	$query = "$modo";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);




echo "<?xml version='1.0'?>
<!DOCTYPE html PUBLIC \"-//WAPFORUM//DTD XHTML Mobile 1.0//EN\" 
\"http://www.wapforum.org/DTD/xhtml-mobile10.dtd\">
<html>
<head>
<meta http-equiv=\"content-Type\" content=\"text/html; charset=utf-8\"/>$counterstrike<title>$title</title></head>
<body><p class=\"headfoot\">
There Are $count icons$addon$inboxes</p>
<p class=\"content\" style=\"text-align: center; font-weight: bold;\">These are the icons you use in message boards, mail messages, blogs, comments on profiles etc.<br/>
Typed the codes below and the corresponding icon will appear in your writing. 'Wapoc' style icon codes (i.e. icon:clap) are also supported.</p>";


echo "<form action=\"./sicn.php\" class=\"headfoot\" method=\"get\">
<fieldset style=\"border: none;\">
Filter By <select name=\"letter\">

<option value=\"a\">Letter A</option>
<option value=\"b\">Letter B</option>
<option value=\"c\">Letter C</option>
<option value=\"d\">Letter D</option>
<option value=\"e\">Letter E</option>
<option value=\"f\">Letter F</option>
<option value=\"g\">Letter G</option>
<option value=\"h\">Letter H</option>
<option value=\"i\">Letter I</option>
<option value=\"j\">Letter J</option>
<option value=\"k\">Letter K</option>
<option value=\"l\">Letter L</option>
<option value=\"m\">Letter M</option>
<option value=\"n\">Letter N</option>
<option value=\"o\">Letter O</option>
<option value=\"p\">Letter P</option>
<option value=\"q\">Letter Q</option>
<option value=\"r\">Letter R</option>
<option value=\"s\">Letter S</option>
<option value=\"t\">Letter T</option>
<option value=\"u\">Letter U</option>
<option value=\"v\">Letter V</option>
<option value=\"w\">Letter W</option>
<option value=\"x\">Letter X</option>
<option value=\"y\">Letter Y</option>
<option value=\"z\">Letter Z</option>

<option value=\"0\">Number 0</option>
<option value=\"1\">Number 1</option>
<option value=\"2\">Number 2</option>
<option value=\"3\">Number 3</option>
<option value=\"4\">Number 4</option>
<option value=\"5\">Number 5</option>
<option value=\"6\">Number 6</option>
<option value=\"7\">Number 7</option>
<option value=\"8\">Number 8</option>
<option value=\"9\">Number 9</option>
<option value=\"\">Clear Filter</option>

</select>
<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
<input type=\"hidden\" name=\"moof\" value=\"$moof\"/>
<input type=\"hidden\" name=\"roomid\" value=\"$roomid\"/>
<input type=\"hidden\" name=\"chatpass\" value=\"$chatpass\"/>
<input type=\"submit\" name=\"go\" value=\"go\">
</fieldset></form>";



if ($count > $max) 
{
echo  "<p class=\"headfoot\"><b>Page:</b> ";

if ( $count > $max ) 
{ 
$number = ceil($count / $max);
}

for ( $counter=1; $counter <= $number; $counter++ )
{
if ($counter != $page) echo "<b><a href=\"mod.chat.icons.php?pagename=$pagename&amp;moof=$moof&amp;letter=$letter&amp;page=$counter&amp;getsite=$getsite\">$counter</a></b> ";
else  echo "<b>$counter</b> ";
}

if ($count > $max) echo  "</p>";
}



echo "<table width=\"100%\" class=\"chat\">";

echo "<tr class=\"headfoot\" style=\"text-decoration: underline; text-align: left;\"><td style=\"width: 40%;\"><b><big>Type</big></b></td><td align=\"center\"><b><big>To Get</big></b></td></tr>";

while ($row)
      	{
       	$name = $row["image"];
	$typed = $row["typed"];


       	echo "<tr><td align=\"left\" style=\"width: 40%;\"><b>$typed</b></td><td align=\"center\"><img align=\"middle\" src=\"$lback/images/sicn/$name.gif\"></td></tr>";


       	$row = mysql_fetch_array($result);
      	}



echo "</table>";

if ($count > $max) 
{
echo  "<p class=\"headfoot\"><b>Page:</b> ";

if ( $count > $max ) 
{ 
$number = ceil($count / $max);
}

for ( $counter=1; $counter <= $number; $counter++ )
{
if ($counter != $page) echo "<b><a href=\"mod.chat.icons.php?pagename=$pagename&amp;moof=$moof&amp;letter=$letter&amp;page=$counter&amp;getsite=$getsite\">$counter</a></b> ";
else  echo "<b>$counter</b> ";
}

if ($count > $max) echo  "</p>";
}






echo "</table><p class=\"headfoot\">";

if ($chat == "yes")
{

echo"$hyback <a href=\"./mod.chat.enter.php?pagename=$pagename&amp;getsite=$getsite\">back to chat</a><br/>";
echo "$hyback <a href=\"./index.php?getsite=$getsite\">leave chat</a>";
}




      echo "</p></body></html>";

}
else
{

$mg = urlencode("You are not logged in, please log in and try again!");
	$url = "./index.php?getsite=$getsite&mg=$mg";
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;	


}
}

if ($act == "formatting")
{
if ($ses != "")
{



$subtite = "<b>BB Codes</b>";





echo "<?xml version='1.0'?>
<!DOCTYPE html PUBLIC \"-//WAPFORUM//DTD XHTML Mobile 1.0//EN\" 
\"http://www.wapforum.org/DTD/xhtml-mobile10.dtd\">
<html>
<head>
<meta http-equiv=\"content-Type\" content=\"text/html; charset=utf-8\"/>$counterstrike<title>$title</title></head>
<body>
<p class=\"headfoot\">$subtite$inboxes$headfooter</p>


<p class=\"chat\" style=\"text-align: center;\"><b>These codes can be typed into forum messages, comments, mail messages and blog entries to alter the way text is rendered onscreen, you can do bold, underlined, italic, scrolling text etc.<br/>
Please use the Test Forum if you want to play about with these.</b></p>


<p class=\"headfoot\">
<b>Basic Formatting</b></p>

<p class=\"chat\">
<b>bold text</b><br/><b>[b]</b>bold text<b>[/b]</b></p>

<p class=\"chat\">
<i>italic text</i><br/><b>[i]</b>italic text<b>[/i]</b></p>

<p class=\"chat\">
<u>underlined text</u><br/><b>[u]</b>underlined text<b>[/u]</b></p>

<p class=\"chat\">
<big>large text</big><br/><b>[l]</b>large text<b>[/l]</b></p>

<p class=\"chat\">
<small>small text</small><br/><b>[s]</b>small text<b>[/s]</b></p>

<p class=\"chat\">
<b>[br]</b> creates a carriage return (drop a line)<br/>
<i>a space must be placed before and after this tag!</i></p>

<p class=\"chat\">
<i>&quot;...quoted text...&quot;</i><br/><b>[q]</b>quoted text<b>[/q]</b></p>

<p class=\"chat\">
<blink>blinking text</blink><br/><b>[blink]</b>flashing text<b>[/blink]</b> or <b>[flash]</b>flashing text<b>[/flash]</b></p>



<p class=\"headfoot\">
<b>Coloured Text</b></p>

<p class=\"chat\"><b>
[red]<span style=\"color: #FF0000;\">&#8226;&#8226;&#8226;&#8226;</span>[/red]<br/>
[green]<span style=\"color: #008000;\">&#8226;&#8226;&#8226;&#8226;</span>[/green]<br/>
[yellow]<span style=\"color: #FFFF00;\">&#8226;&#8226;&#8226;&#8226;</span>[/yellow]<br/>
[orange]<span style=\"color: #FF9900;\">&#8226;&#8226;&#8226;&#8226;</span>[/orange]<br/>
[pink]<span style=\"color: #FF1493;\">&#8226;&#8226;&#8226;&#8226;</span>[/pink]<br/>
[blue]<span style=\"color: #0000FF;\">&#8226;&#8226;&#8226;&#8226;</span>[/blue]<br/>
[black]<span style=\"color: #000000;\">&#8226;&#8226;&#8226;&#8226;</span>[/black]<br/>
[white]<span style=\"color: #FFFFFF;\">&#8226;&#8226;&#8226;&#8226;</span>[/white]<br/>
[grey]<span style=\"color: #CCCCCC;\">&#8226;&#8226;&#8226;&#8226;</span>[/grey]<br/>
[cyan]<span style=\"color: #00FFFF;\">&#8226;&#8226;&#8226;&#8226;</span>[/cyan]<br/>
[purple]<span style=\"color: #800080;\">&#8226;&#8226;&#8226;&#8226;</span>[/purple]<br/>
[aqua]<span style=\"color: #05E9FF;\">&#8226;&#8226;&#8226;&#8226;</span>[/aqua]<br/>
[skyblue]<span style=\"color: #87CEEB;\">&#8226;&#8226;&#8226;&#8226;</span>[/skyblue]<br/>
[silver]<span style=\"color: #C0C0C0;\">&#8226;&#8226;&#8226;&#8226;</span>[/silver]<br/>
[greenyellow]<span style=\"color: #ADFF2F;\">&#8226;&#8226;&#8226;&#8226;</span>[/greenyellow]<br/>
[orchid]<span style=\"color: #DA70D6;\">&#8226;&#8226;&#8226;&#8226;</span>[/orchid]<br/>
[gold]<span style=\"color: #FFD700;\">&#8226;&#8226;&#8226;&#8226;</span>[/gold]<br/>
[goldenrod]<span style=\"color: #DAA520;\">&#8226;&#8226;&#8226;&#8226;</span>[/goldenrod]<br/>
[khaki]<span style=\"color: #F0E68C;\">&#8226;&#8226;&#8226;&#8226;</span>[/khaki]<br/>
[magenta]<span style=\"color: #FF00FF;\">&#8226;&#8226;&#8226;&#8226;</span>[/magenta]<br/>
[crimson]<span style=\"color: #DC143C;\">&#8226;&#8226;&#8226;&#8226;</span>[/crimson]<br/>
[sienna]<span style=\"color: #A0522D;\">&#8226;&#8226;&#8226;&#8226;</span>[/sienna]<br/>
[brown]<span style=\"color: #A52A2A;\">&#8226;&#8226;&#8226;&#8226;</span>[/brown]<br/>
[midnight]<span style=\"color: #191970;\">&#8226;&#8226;&#8226;&#8226;</span>[/midnight]<br/>
[lime]<span style=\"color: #00FF00;\">&#8226;&#8226;&#8226;&#8226;</span>[/lime]</b>
</p>



<p class=\"headfoot\">
<b>Scrolling Effects</b></p>




<p class=\"chat\">
<marquee loop=\"800\" direction=\"left\">scroll right to left</marquee><br/><b>[scl]</b> scroll right to left <b>[/scl]</b></p>


<p class=\"chat\">
<marquee loop=\"800\" bgcolor=\"#FF0000\" direction=\"left\">scroll right to left with coloured background.</marquee><br/><b>[scl:red]</b> scroll right to left with coloured background. <b>[/scl]</b></p>

<p class=\"chat\">
<marquee loop=\"800\" direction=\"right\">scroll left to right</marquee><br/><b>[scr]</b> scroll left to right <b>[/scr]</b></p>

<p class=\"chat\">
<marquee loop=\"800\" bgcolor=\"#FF9900\" direction=\"right\">scroll left to right with coloured background.</marquee><br/><b>[scr:orange]</b> scroll left to right with coloured background. <b>[/scr]</b></p>

<p class=\"chat\" style=\"text-align: center;\">
<i><b>when using scrolling effects, remember to leave a space either side of your scrolling content or it will fail!</i></b></p>
<p class=\"chat\">
<b>Colours Available:<br/><br/>
[scl:red] <span style=\"color: #FF0000;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:green] <span style=\"color: #008000;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:yellow] <span style=\"color: #FFFF00;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:orange] <span style=\"color: #FF9900;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:pink] <span style=\"color: #FF1493;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:blue] <span style=\"color: #0000FF;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:black] <span style=\"color: #000000;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:white] <span style=\"color: #FFFFFF;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:grey] <span style=\"color: #CCCCCC;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:cyan] <span style=\"color: #00FFFF;\">&#8226;&#8226;&#8226;&#8226;</span>  [/scl]<br/>
[scl:aqua] <span style=\"color: #05E9FF;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:skyblue] <span style=\"color: #87CEEB;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:silver] <span style=\"color: #C0C0C0;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:greenyellow] <span style=\"color: #ADFF2F;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:orchid] <span style=\"color: #DA70D6;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:gold] <span style=\"color: #FFD700;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:goldenrod] <span style=\"color: #DAA520;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:khaki] <span style=\"color: #F0E68C;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:magenta] <span style=\"color: #FF00FF;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:crimson] <span style=\"color: #DC143C;\">&#8226;&#8226;&#8226;&#8226;</span>  [/scl]<br/>
[scl:sienna] <span style=\"color: #A0522D;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:brown] <span style=\"color: #A52A2A;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:midnight] <span style=\"color: #191970;\">&#8226;&#8226;&#8226;&#8226;</span>  [/scl]<br/>
[scl:lime] <span style=\"color: #00FF00;\">&#8226;&#8226;&#8226;&#8226;</span>  [/scl]<br/>
</b></p>



<p class=\"headfoot\" id=\"forumlink\">
<b>Forum Link Codes</b></p>




<p class=\"chat\">
<b>myphoto:1696</b><br/>link to a photo, codes are available when you view a photo in your albums.</p>

<p class=\"chat\">
<b>blog:1696</b><br/>link to a blog entry, codes are shown at the bottom of each entry in your blog.</p>

<p class=\"chat\">
<b>topic:1696</b><br/>link to a forum topic, codes are shown at the bottom of each topic below the reply box.</p>

<p class=\"chat\">
<b>link:$sitename.co.uk</b><br/>create a clickable web link (no http:// required).</p>


<p class=\"chat\">
<b>mail:$PHNAME</b><br/>create link to pre addressed mail message to specified user.</p>

<p class=\"chat\">
<b>profile:$PHNAME</b><br/>create link to a user's profile.</p>

<p class=\"chat\">
<b>id:$PHNAME</b><br/>create link to a user's Membership ID Card.</p>

<p class=\"chat\">
<b>call:07947566690</b><br/>add a Call Number link.</p>


<p class=\"chat\">
<b>pbook:07947566690</b><br/>add a Save Number To Phone Contacts link.</p>




<p class=\"headfoot\">
<b>Copy &amp; Paste</b></p>

<p class=\"chat\">
<b>[copy]</b> text <b>[/copy]</b><br/>
Creates a text box containing the specified text, this allows for easier copying and pasting, as some phones (i.e. nokia) only support C&amp;P in text boxes.</p>

<p class=\"chat\">
<b>[cp]</b> text <b>[/cp]</b><br/>
Creates a text box containing the specified text, a shorthand alternative to <b>[copy]</b>.</p>

<p class=\"chat\">
<b>[php]</b> text <b>[/php]</b><br/>
Creates a text box to enable easy Copying and Pasting of PHP code.</p>


<p class=\"chat\">
<b>[html]</b> text <b>[/html]</b><br/>
Creates a text box to enable easy Copying and Pasting of HTML, WML or XML code.</p>



<p class=\"chat\">
<b>[code]</b> text <b>[/code]</b><br/>
Creates a text box to enable easy Copying and Pasting of other code such as Javascript, mySQL or Python.</p>



<p class=\"headfoot\">
<b>Things To Remember</b></p>

<p class=\"chat\">
You can 'nest' BBCode tags like this:<br/>
<b>[u][l]</b>big &amp; underlined<b>[/l][/u]</b></p>


<p class=\"chat\">
If you close the tags the wrong way around, like this <b>[u][b]</b>bold &amp; underlined?<b>[/u][/b]</b> it will fail.</p>


<p class=\"chat\">
Never put tags before <b>scrolling effects</b>, otherwise it won't scroll, put them inside it instead.</p>

<p class=\"chat\">
Allowing spaces between the Codes and the content you are applying to is good practice and will ensure 100% success, for example:<br/>
<b>[b]</b> this <b>[/b]</b> is better than <b>[b]</b>this<b>[/b]</b>.</p>

<p class=\"chat\">
All BBCode must be in lower case, UPPER CASE or MiXeD CAsE codes will not work.</p>";

echo "<p class=\"headfoot\">";


if ($chat == "yes")
{

echo"$hyback <a href=\"./mod.chat.enter.php?pagename=$pagename&amp;getsite=$getsite\">back to chat</a><br/>";
echo "$hyback <a href=\"./index.php?getsite=$getsite\">leave chat</a>";
}
echo "</p></body></html>";





}
else
{

$mg = urlencode("You are not logged in, please log in and try again!");
	$url = "./index.php?getsite=$getsite&mg=$mg";
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;	


}
}



?>
