<?php


include("./inclusions/funx.php");
include("../scripts/dbcon.php");
//// MEMBER'S OWN
//// WAP SITES - GO!


$getsite = $_GET["getsite"];

$ses = $_COOKIE["sesh"];


$page = $_GET['page'];

$tid = $_GET['tid'];


$xxxxx = "SELECT * from forum_users where ses='$ses' and ses!=''";
$yyyyy = mysql_query ("$xxxxx");
$loggie = mysql_fetch_array($yyyyy);


$query = "select * from welcome where id='1'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);
//
//
$lback = $row['linkbackaddress'];




$login = $loggie["username"];

$pmax = 20;
$tmax = 20;

$stringy = $_GET['stringy'];
$param = $_GET['param'];

$err = $_GET['err'];


$enflag = $_GET['enflag'];

$topage = $_GET['topage'];

$quote = $_GET['quote'];


$stringy = strtolower($stringy);


//////////////////////////////////////////////////////////////
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


$content = stripslashes(strip_javascript(clean(htmlspecialchars_decode($sqlopen["content"]))));
$counterstrike = urldecode($sqlopen["stylesheet"]);
$id = $sqlopen["id"];


$content = str_replace("~euro","&#8364;",$content);
$content = str_replace(chr(10),"<br/>",$content);
$content = str_replace("===","<br/>",$content);
$content = str_replace("rn","<br/>",$content);


if ($login != "" && $ses != "")
{





// Get topic info

$query = "SELECT title, sysname, content from phoenix_wap where id='$tid' limit 1";
$result = mysql_query($query);
$row = mysql_fetch_array($result);


$forum = $row["sysname"];
$subject = stripslashes($row["content"]);
$author = $row["title"];







if ($err != "") $err = "<br/><small><b>$err</b></small>";


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
<body><p class=\"headfoot\">";
echo "<big><b>$subject</b></big>$err</p>";


// Setting up pagination

$query = "SELECT count(*) from phoenix_wap WHERE filename='$tid' and type='forumpost'";
$result =mysql_query($query);
$row =mysql_fetch_array($result);
$count = $row[0];




if (empty($page) || ($page < 1)) $page = 1; $max = $pmax; if (empty($start)) $start = ($page-1) * $max;



$query = "SELECT * from phoenix_wap WHERE filename='$tid' ORDER BY date ASC LIMIT $start, $max";
$result =mysql_query($query);
$num_rows =mysql_num_rows($result);
$row = mysql_fetch_array($result);



// Compiling top of page navigation.


		


		if ($count > $max) 
		{
		echo  "<p class=\"chat\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $max);
		}

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"./mod.forum.threads.php?pagename=$pagename&amp;getsite=$getsite&amp;cat=$cat&amp;stringy=$stringy&amp;tid=$tid&amp;topage=$topage&amp;page=$counter&amp;forum=$forum\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}





while ($row)
	{
	$mid = $row["id"];
	$weply = $row["hits"];
       	$postdate = $row["post_date"];
       	$author = $row["title"];
       	$postby = $row["title"];
	$message = stripslashes($row["content"]);




#========admin number======&#178;======================




	if ( $weply > 0 ) $cluck = "Reply #$weply";
	else $cluck = "Topic #$tid";



$ad = "$author";
	








	if ($author == "$login")
	{ 

	$dellink = "<br/><small>(<a href=\"./mod.forum.insert.php?pagename=$pagename&amp;getsite=$getsite&amp;pid=$mid&amp;tid=$tid&amp;act=delrep&amp;forum=$forum\">delete</a>-<a href=\"./mod.forum.insert.php?pagename=$pagename&amp;getsite=$getsite&amp;pid=$mid&amp;tid=$tid&amp;act=elquote&amp;forum=$forum&amp;page=$page\">quote</a>-<a href=\"#bottom\">reply</a>-<a href=\"./edit.php?ses=$ses&amp;page=$page&amp;forum=$forum&amp;mid=$mid&amp;tid=$tid\">edit</a>)</small>";
	}
	else
	{
	$dellink = "<br/><small>(<a href=\"./mod.forum.insert.php?pagename=$pagename&amp;getsite=$getsite&amp;pid=$mid&amp;tid=$tid&amp;act=elquote&amp;forum=$forum&amp;page=$page\">quote</a>-<a href=\"#bottom\">reply</a>)</small>";
	}









     echo "<table class=\"chat\" width=\"100%\"><tr><td><small><b>$cluck by </b></small><b><a href=\"$lback/profile.php?ses=$ses&amp;cat=$cat&amp;stringy=$stringy&amp;tid=$tid&amp;user=$author&amp;f=trd&amp;ref=sfor&amp;topage=$topage\">$ad</a></b>$dellink

<br/><small><b>$postdate</b></small>
<br/><br/>$message</td></tr></table>";



         $row = mysql_fetch_array($result);
         }



$query = "SELECT * from phoenix_wap WHERE id='$tid'";
$result =mysql_query($query);
$num_rows =mysql_num_rows($result);
$row = mysql_fetch_array($result);
       	$lock = $row["locked"];


		if ($count > $max) 
		{
		echo  "<p class=\"chat\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $max);
		}

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"./mod.forum.threads.php?pagename=$pagename&amp;getsite=$getsite&amp;cat=$cat&amp;stringy=$stringy&amp;tid=$tid&amp;topage=$topage&amp;page=$counter&amp;forum=$forum\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}



	if ($lock == "0")
	{
		if ($quote != "")
		{
		$quote = "[q] $quote [/q]";
		}
		$secret=md5(uniqid(rand(), true));
		$_SESSION['FORM_SECRET']=$secret;

		$formkey = $_SESSION['FORM_SECRET'];

		$quote = stripslashes("$quote");


if ($enflag != "yes") $enlink = " [<a href=\"./mod.forum.insert.php?pagename=$pagename&amp;getsite=$getsite&amp;pid=$mid&amp;tid=$tid&amp;act=enhance&amp;forum=$forum&amp;page=$page\">go advanced</a>]";
else $enlink = " [<a href=\"./mod.forum.threads.php?pagename=$pagename&amp;getsite=$getsite&amp;pid=$mid&amp;tid=$tid&amp;forum=$forum&amp;page=$page#bottom\">go basic</a>]";

		echo "<p class=\"headfoot\" style=\"text-align: left;\"><b><big>reply</big> $enlink</b></p>";
		echo "<form class=\"chat\" id=\"bottom\" action=\"./mod.forum.insert.php?pagename=$pagename&amp;getsite=$getsite&amp;cat=$cat&amp;tid=$tid&amp;forum=$forum&amp;act=reply\" method=\"post\" enctype=\"multipart/form-data\">
		<fieldset style=\"border: none;\">
		<textarea name=\"message\" rows=\"3\" cols=\"20\">$quote</textarea>";
			if ($enflag == "yes")
			{
			echo "<br/><b>icon:</b><br/><select name=\"inserticon\" title=\"insert icon?\" class=\"textbox\">
			<option value=\"\">no icon</option>";

			$query = "SELECT * from phoenix_icons where typed LIKE '=%' ORDER BY typed ASC";
			$result = mysql_query($query);
			$num_rows = mysql_num_rows($result);
			$rowicons = mysql_fetch_array($result);

				while ($rowicons)
      				{
       				$typed = $rowicons["typed"];
				$typedx = str_replace("=","","$typed");
				$typedx = ucfirst("$typedx");

       				echo "<option value=\"$typed\">$typedx</option>";

       				$rowicons = mysql_fetch_array($result);
      				}

			echo "</select><br/>";



			} // enflag



			echo "<br/>

			<input type=\"hidden\" name=\"pagename\" value=\"$pagename\"/>
			<input type=\"hidden\" name=\"getsite\" value=\"$getsite\"/>

			<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
			<input type=\"hidden\" name=\"cat\" value=\"$cat\"/>
			<input type=\"hidden\" name=\"tid\" value=\"$tid\"/>
			<input type=\"hidden\" name=\"forum\" value=\"$forum\"/>
			<input type=\"hidden\" name=\"act\" value=\"reply\"/>
			<input type=\"hidden\" name=\"page\" value=\"$page\"/>
			<input type=\"hidden\" name=\"formkey\" value=\"$formkey\"/>";

			echo "<input type=\"submit\" name=\"normal\" class=\"buttstyle\" value=\"add reply\"/>";
			echo "</fieldset></form>";
	}
	else
	{
	echo "<p class=\"chat\" style=\"text-align: center;\">Topic Locked - new messages cannot be added.</p>";
	}



// Compiling the bottom of page links.

echo "<p class=\"headfoot\" style=\"text-align: left;\">";


       $query = "SELECT * from phoenix_wap WHERE sysname='$forum'";
       $result =mysql_query($query);
       $num_rows =mysql_num_rows($result);
       $ro = mysql_fetch_array($result);

	$forumfriendly = $ro['title'];



if ( $owner == "$login" )
{
if ($ses != "") echo "$hyfor <a href=\"options.php?ses=$ses&amp;cat=$cat&amp;stringy=$stringy&amp;forum=$forum&amp;tid=$tid&amp;author=$author&amp;topage=$topage\">administration</a><br/>";
}



$mainmenu = "<br/>$hyback <a href=\"./index.php?getsite=$getsite\">main menu</a>";




echo "$subeef$hyback <a href=\"mod.forum.php?getsite=$getsite&amp;pagename=$pagename&amp;stringy=$stringy&amp;forum=$forum&amp;page=$topage\">back to &quot;$forumfriendly&quot;</a>";
echo "$mainmenu</p>








</body></html>";


}
else
{



	echo "<p class=\"headfoot\"><img src=\"../scripts/phoenix.php?string=account%20restricted!&amp;login=$login\" alt=\"account%20restricted!\"/></p><hr/>
	<p class=\"content\" style=\"text-align: center;\">";

	echo "Sorry, your account appears to be restricted, this may be due to misconduct on your part or an error on our part.<br/><br/>
	During the period of restriction you will be unable to use the Message Boards and some other functions of this site, this is for the protection of other users.<br/><br/>
	If you feel that this is an error and you have done nothing wrong please contact an administrator.";

	echo "</p><hr/><p class=\"headfoot\">$breaker$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>$shortcuts</p></body></html>";
	exit;




}






?>
