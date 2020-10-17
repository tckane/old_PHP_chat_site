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


///////////////////////////////////////////////////////////////////////////////////////
function funk_it_up($string)
{
//
$ses = $_GET["ses"];

$query = "select * from welcome where id='1'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);
//
//
$lback = $row['linkbackaddress'];

$xxxxx = "SELECT * from forum_users where ses='$ses' and ses!=''";
$yyyyy = mysql_query ("$xxxxx");
$loggie = mysql_fetch_array($yyyyy);


$login = $loggie["username"];







//


$string = str_replace("<","&lt;",$string);
$string = str_replace(">","&gt;",$string);


$query = "SELECT typed, image FROM phoenix_icons";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
while ($row)
{

$text = $row["typed"];
$icon = $row["image"];
$string = str_replace("icon:","=","$string");



$string = preg_replace( "#$text#", " <img align=\"middle\" style=\"border: none;\" src=\"$lback/images/sicn/$icon.gif\" alt=\"$icon\"/> ", $string );


$row = mysql_fetch_array($result);
}


$string = str_replace("~euro","&#8364;",$string);
//$string = str_replace(chr(13),"<br/>",$string);
$string = str_replace(chr(10),"<br/>",$string);
$string = str_replace("===","<br/>",$string);
//$string = str_replace("&#xB6;","<br/>",$string);
//$string = str_replace("&#xB5;","&nbsp;",$string);
//$string = " " . $string . " ";
//$string = str_replace("\n","<br/>",$string);
//$string = str_replace("\r","<br/>",$string);


// bbcode basics

$string = preg_replace( "#\[b\](.+?)\[/b\]#is", "<b>\\1</b>", $string );
$string = preg_replace( "#\(b\)(.+?)\(/b\)#is", "<b>\\1</b>", $string );
$string = preg_replace( "#\[br\](.+?)#is", "<br/>", $string );
$string = preg_replace( "#\(br\)(.+?)#is", "<br/>", $string );
$string = preg_replace( "#\[cp\](.+?)\[/cp\]#is", "<br/><small><b>C &amp; P:</b></small><br/><textarea rows=\"3\" cols=\"20\">\\1</textarea><br/>", $string );
$string = preg_replace( "#\[copy\](.+?)\[/copy\]#is", "<br/><small><b>C &amp; P:</b></small><br/><textarea rows=\"3\" cols=\"20\">\\1</textarea><br/>", $string );
$string = preg_replace( "#\[code\](.+?)\[/code\]#is", "<br/><small><b>[code]</b></small><br/><textarea rows=\"3\" cols=\"20\">\\1</textarea><br/><small><b>[/code]</b></small><br/>", $string );
$string = preg_replace( "#\[php\](.+?)\[/php\]#is", "<br/><small><b>&lt;?php</b></small><br/><textarea rows=\"3\" cols=\"20\">\\1</textarea><br/><small><b>?&gt;</b></small><br/>", $string );
$string = preg_replace( "#\[html\](.+?)\[/html\]#is", "<br/><small><b>&lt;html&gt;</b></small><br/><textarea rows=\"3\" cols=\"20\">\\1</textarea><br/><small><b>&lt;/html&gt;</b></small><br/>", $string );
$string = preg_replace( "#\[i\](.+?)\[/i\]#is", "<i>\\1</i>", $string );
$string = preg_replace( "#\[u\](.+?)\[/u\]#is", "<span style=\"text-decoration: underline;\">\\1</span>", $string );
$string = preg_replace( "#\[big\](.+?)\[/big\]#is", "<big><b>\\1</b></big>", $string );
$string = preg_replace( "#\[l\](.+?)\[/l\]#is", "<big>\\1</big>", $string );
$string = preg_replace( "#\[s\](.+?)\[/s\]#is", "<small>\\1</small>", $string );
$string = preg_replace( "#\[q\](.+?)\[/q\]#is", "<i>&#34;...\\1...&#34;</i>", $string );


// text colours

$string = preg_replace( "#\[red\](.+?)\[/red\]#is", "<span style=\"color: #FF0000;\">\\1</span>", $string );
$string = preg_replace( "#\[green\](.+?)\[/green\]#is", "<span style=\"color: #008000;\">\\1</span>", $string );
$string = preg_replace( "#\[yellow\](.+?)\[/yellow\]#is", "<span style=\"color: #FFFF00;\">\\1</span>", $string );
$string = preg_replace( "#\[orange\](.+?)\[/orange\]#is", "<span style=\"color: #FF9900;\">\\1</span>", $string );
$string = preg_replace( "#\[pink\](.+?)\[/pink\]#is", "<span style=\"color: #FF1493;\">\\1</span>", $string );
$string = preg_replace( "#\[blue\](.+?)\[/blue\]#is", "<span style=\"color: #0000FF;\">\\1</span>", $string );
$string = preg_replace( "#\[black\](.+?)\[/black\]#is", "<span style=\"color: #000000;\">\\1</span>", $string );
$string = preg_replace( "#\[white\](.+?)\[/white\]#is", "<span style=\"color: #FFFFFF;\">\\1</span>", $string );
$string = preg_replace( "#\[grey\](.+?)\[/grey\]#is", "<span style=\"color: #CCCCCC;\">\\1</span>", $string );
$string = preg_replace( "#\[cyan\](.+?)\[/cyan\]#is", "<span style=\"color: #00FFFF;\">\\1</span>", $string );
$string = preg_replace( "#\[purple\](.+?)\[/purple\]#is", "<span style=\"color: #800080;\">\\1</span>", $string );
$string = preg_replace( "#\[aqua\](.+?)\[/aqua\]#is", "<span style=\"color: #05E9FF;\">\\1</span>", $string );
$string = preg_replace( "#\[skyblue\](.+?)\[/skyblue\]#is", "<span style=\"color: #87CEEB;\">\\1</span>", $string );
$string = preg_replace( "#\[silver\](.+?)\[/silver\]#is", "<span style=\"color: #C0C0C0;\">\\1</span>", $string );
$string = preg_replace( "#\[greenyellow\](.+?)\[/greenyellow\]#is", "<span style=\"color: #ADFF2F;\">\\1</span>", $string );
$string = preg_replace( "#\[orchid\](.+?)\[/orchid\]#is", "<span style=\"color: #DA70D6;\">\\1</span>", $string );
$string = preg_replace( "#\[gold\](.+?)\[/gold\]#is", "<span style=\"color: #FFD700;\">\\1</span>", $string );
$string = preg_replace( "#\[goldenrod\](.+?)\[/goldenrod\]#is", "<span style=\"color: #DAA520;\">\\1</span>", $string );
$string = preg_replace( "#\[khaki\](.+?)\[/khaki\]#is", "<span style=\"color: #F0E68C;\">\\1</span>", $string );
$string = preg_replace( "#\[magenta\](.+?)\[/magenta\]#is", "<span style=\"color: #FF00FF;\">\\1</span>", $string );
$string = preg_replace( "#\[crimson\](.+?)\[/crimson\]#is", "<span style=\"color: #DC143C;\">\\1</span>", $string );
$string = preg_replace( "#\[sienna\](.+?)\[/sienna\]#is", "<span style=\"color: #A0522D;\">\\1</span>", $string );
$string = preg_replace( "#\[brown\](.+?)\[/brown\]#is", "<span style=\"color: #A52A2A;\">\\1</span>", $string );
$string = preg_replace( "#\[midnight\](.+?)\[/midnight\]#is", "<span style=\"color: #191970;\">\\1</span>", $string );
$string = preg_replace( "#\[lime\](.+?)\[/lime\]#is", "<span style=\"color: #00FF00;\">\\1</span>", $string );


// scrolling text

$string = preg_replace( "#\[scr\](.+?)\[/scr\]#is", "<marquee loop=\"800\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl\](.+?)\[/scl\]#is", "<marquee loop=\"800\" direction=\"left\">\\1</marquee>", $string );


// scrolling with colour right

$string = preg_replace( "#\[scr:purple\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#800080\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:red\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#FF0000\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:green\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#008000\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:yellow\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#FFFF00\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:blue\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#0000FF\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:orange\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#FF9900\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:pink\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#FF1493\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:white\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#FFFFFF\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:grey\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#CCCCCC\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:black\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#000000\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:cyan\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#00FFFF\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:aqua\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#05E9FF\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:skyblue\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#87CEEB\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:silver\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#C0C0C0\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:greenyellow\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#ADFF2F\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:orchid\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#DA70D6\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:gold\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#FFD700\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:goldenrod\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#DAA520\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:khaki\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#F0E68C\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:magenta\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#FF00FF\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:crimson\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#DC143C\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:sienna\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#A0522D\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:brown\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#A52A2A\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:midnight\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#191970\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:lime\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#00FF00\" direction=\"right\">\\1</marquee>", $string );

// scrolling with colour left

$string = preg_replace( "#\[scl:purple\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#800080\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:red\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#FF0000\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:green\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#008000\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:yellow\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#FFFF00\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:blue\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#0000FF\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:orange\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#FF9900\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:pink\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#FF1493\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:white\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#FFFFFF\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:grey\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#CCCCCC\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:black\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#000000\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:cyan\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#00FFFF\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:aqua\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#05E9FF\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:skyblue\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#87CEEB\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:silver\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#C0C0C0\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:greenyellow\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#ADFF2F\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:orchid\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#DA70D6\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:gold\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#FFD700\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:goldenrod\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#DAA520\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:khaki\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#F0E68C\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:magenta\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#FF00FF\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:crimson\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#DC143C\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:sienna\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#A0522D\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:brown\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#A52A2A\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:midnight\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#191970\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:lime\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#00FF00\" direction=\"left\">\\1</marquee>", $string );



// flashing text

$string = preg_replace( "#\[blink\](.+?)\[/blink\]#is", "<span style=\"text-decoration: blink;\">\\1</span>", $string );
$string = preg_replace( "#\[flash\](.+?)\[/flash\]#is", "<span style=\"text-decoration: blink;\">\\1</span>", $string );
$string = str_replace("<br/><br/><img","<br/><img",$string);
$string = trim($string);
return $string; 
}
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


/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
// CREATE AND EXPOSE WEB PAGES
//
/////////////////////////////////////////////////////////////////




if ($ses != "")
{


$query = "UPDATE friends set lastactive=now(), location='chat', room='$pagename' where friendname='$login'";
mysql_query($query);


$act_query = "UPDATE forum_users set lastactive=now(), location='chat', room='$pagename' where username='$login'";
mysql_query($act_query);


$querychat = "SELECT * from forum_users where lastactive > DATE_ADD(NOW(), INTERVAL -15 MINUTE) and room='$pagename'";
$resultchat = mysql_query($querychat);
$numchat = mysql_num_rows($resultchat);


if ($numchat > 1) $chatting = "$numchat users chatting";
elseif ($numchat == 1) $chatting = "only you here";
else $chatting = "chat empty";





header("content-type: text/html; charset=utf-8");
header("Last-Modified: " . gmdate("D, dMYH:i:s") . " GMT");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache, must-revalidate");
header("refresh: 25; url=mod.chat.refresh.php?pagename=$pagename&getsite=$getsite");
header("Pragma: no-cache");

echo "<?xml version='1.0'?>
<!DOCTYPE html PUBLIC \"-//WAPFORUM//DTD XHTML Mobile 1.0//EN\" 
\"http://www.wapforum.org/DTD/xhtml-mobile10.dtd\">
<html>
<head>
<meta http-equiv=\"content-Type\" content=\"text/html; charset=utf-8\"/>$counterstrike<title>$title</title></head>
<body><p class=\"headfoot\"><img src=\"./images/$logo\" alt=\"logo\"/><br/><big>$title</big><br/>$chatting</p>

<p class=\"headfoot\" style=\"text-align: center;\"><b>
<a style=\"text-decoration: none;\" href=\"./mod.chat.add.php?getsite=$getsite&amp;pagename=$pagename\">write</a> 
| <a style=\"text-decoration: none;\" href=\"./mod.chat.refresh.php?pagename=$pagename&amp;getsite=$getsite\">refresh</a> | 
<a style=\"text-decoration: none;\" href=\"./mod.chat.icons.php?pagename=$pagename&amp;getsite=$getsite&amp;chat=yes\">icons</a> | 
<a style=\"text-decoration: none;\" href=\"./mod.chat.icons.php?pagename=$pagename&amp;getsite=$getsite&amp;act=formatting&amp;chat=yes\">bb code</a></b></p>";
# Gathering all chat info from the database.




$query = "SELECT * from phoenix_wap where type='chat' AND sysname='$pagename' AND owner='$owner' ORDER BY date DESC LIMIT 30";
$result = mysql_query ("$query");
$totaltexts = mysql_num_rows($result);
$row = mysql_fetch_array($result);
# Displaying chat messages
while ($row)
      {
       $user = $row["title"];
       $message = $row["content"];
       $private = $row["locked"];
       $userto = $row["password"];
       $when = chattime($row["date"]);


       $queryg = "SELECT * FROM forum_users WHERE username='$user'";
       $resultg=mysql_query($queryg);
       $rowg = mysql_fetch_array($resultg);
       $group = $rowg["userlevel"];
       $owner = $rowg["owner"];


       # Setting the name prefix for members and admin.

if ($group == 1 && $owner == "yes") $prefix = "&#176;";
elseif ($group == 1 && $owner != "yes") $prefix = "&#170;";
       else $prefix = "";
       #as the function suggests, we are making the message wml compatable.

       $message = funk_it_up($message);


	if ($user == "System")

	{

	if ($private == 1)
		{
		if ($userto == "$login" || $user == "$login") 
			{
			echo "<p class=\"chat\" style=\"border-width: 1px; border-style: solid; line-height: 90%;\"><small><span style=\"font-weight: normal;\">(private)</span></small><b>$user:</b>&nbsp;<span style=\"font-weight: normal;\">$message</span><br/><small><small>($when)</small></small></p>";
			}
			else
			{ }
		}
		else
		{
		echo "<p class=\"chat\" style=\"border-width: 1px; border-style: solid; line-height: 90%;\"><b>$user:</b>&nbsp;<span style=\"font-weight: normal;\">$message</span><br/><small><small>($when)</small></small></p>";
		}

	}

	else
	{
	if ($private == 1)
		{
		if ($userto == "$login" || $user == "$login") 
			{
			echo "<p class=\"chat\" style=\"border-width: 1px; border-style: solid; line-height: 90%;\"><small><span style=\"font-weight: normal;\">(private)</span></small><b><a style=\"text-decoration: none;\" href=\"$lback/profile.php?ses=$ses&amp;user=$user\"><small>$prefix</small>$user:</a></b>&nbsp;<span style=\"font-weight: normal;\">$message</span><br/><small><small>($when)</small></small></p>";
			}
			else
			{ }
		}
		else
		{
		echo "<p class=\"chat\" style=\"border-width: 1px; border-style: solid; line-height: 90%;\"><b><a style=\"text-decoration: none;\" href=\"$lback/profile.php?ses=$ses&amp;user=$user\"><small>$prefix</small>$user:</a></b>&nbsp;<span style=\"font-weight: normal;\">$message</span><br/><small><small>($when)</small></small></p>";
		}
	}




	$row = mysql_fetch_array($result);
      }


$limit = "31";

$difference = ($totaltexts - $limit);


if ($totaltexts > $limit) 
{
$queryx = "DELETE from chatmsgs where roomid='$roomid' ORDER BY id ASC LIMIT $difference";
$resultx = mysql_query ("$queryx");
}


echo "<p class=\"headfoot\" style=\"text-align: center;\"><b>
<a style=\"text-decoration: none;\" href=\"./mod.chat.add.php?getsite=$getsite&amp;pagename=$pagename\">write</a> 
| <a style=\"text-decoration: none;\" href=\"./mod.chat.refresh.php?pagename=$pagename&amp;getsite=$getsite\">refresh</a> | 
<a style=\"text-decoration: none;\" href=\"./mod.chat.icons.php?pagename=$pagename&amp;getsite=$getsite&amp;chat=yes\">icons</a> | 
<a style=\"text-decoration: none;\" href=\"./mod.chat.icons.php?pagename=$pagename&amp;getsite=$getsite&amp;act=formatting&amp;chat=yes\">bb code</a></b><br/>
<b><a href=\"./mod.chat.leave.php?getsite=$getsite&amp;pagename=$pagename\">leave chat</a></b></p>";
}
else
{
$mg = urlencode("You are not logged in, please log in and try again!");
	$url = "./index.php?getsite=$getsite&mg=$mg";
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;	
}

?>
