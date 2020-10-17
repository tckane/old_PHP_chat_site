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


$enflag = $_GET['enflag'];

$query = "select * from welcome where id='1'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);
//
//
$lback = $row['linkbackaddress'];



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


$page = $_GET["page"];


$tmax = 20;








if ($ses != "" && $login != "")
{






if (empty($page) || ($page < 1)) $page = 1; $max = $tmax;  $start = ($page-1) * $max;





if ($err != "") $err = "<br/><small><b>$err</b></small>";



$subtite = "<b><big>$title</big></b>";




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
<body><p class=\"headfoot\">$subtite$err</p>";







    	 	$query = "SELECT count(*) from phoenix_wap WHERE type='forumtopic' and sysname='$pagename'";
      	 	$result =mysql_query($query);
      	 	$row =mysql_fetch_array($result);
      	 	$count = $row[0];


  	     	$query = "SELECT * from phoenix_wap WHERE type='forumtopic' and sysname='$pagename' AND sticky=0 ORDER BY date DESC LIMIT $start, $max";
  	     	$result =mysql_query($query);
   	    	$num_rows =mysql_num_rows($result);
    	   	$row = mysql_fetch_array($result);




		if ($count > $max) 
		{
		echo  "<p class=\"chat\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $max);
		}

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"./mod.forum.topics.php?pagename=$pagename&amp;getsite=$getsite&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}








       		$queryas = "SELECT * from phoenix_wap WHERE type='forum' and sysname='$pagename' AND sticky=1 ORDER BY date DESC limit $max";
       		$resultas =mysql_query($queryas);
       		$num_rowsas =mysql_num_rows($resultas);
       		$rowst = mysql_fetch_array($resultas);

     	  	while ($rowst)
		
		{

       	        $tid1 = $rowst["id"];
       	        $author1 = $rowst["title"];
       	        $lock1 = $rowst["locked"];
	        $stuck = $rowst["sticky"];
	        $replies1 = $rowst["hits"];
                         $subject1 = stripslashes(make_wml_compat($rowst["content"]));




                if ($lock1 == "yes") $lo1 = "&nbsp;<small><b><img align=\"middle\" style=\"border: none;\" src=\"../images/topiclocked.gif\" alt=\"[locked]\"/></b></small>";
                else $lo1 = "";

                if ($replies1 >= 1) $posts1 = "$replies1";
                else $posts1 = "";

                if ($stuck >= 1) $stt = "&nbsp;<small><b><img align=\"middle\" style=\"border: none;\" src=\"../images/topicsticky.gif\" alt=\"[sticky]\"/></b></small>";
                else $stt = "";



	if ($replies1 == "") $replies1 = "";
	else $replies1 = "[$replies1]";



		echo "<table class=\"chat\" width=\"100%\"><tr><td>$hyfor <b><a href=\"./mod.forum.threads.php?pagename=$pagename&amp;getsite=$getsite&amp;cat=$cat&amp;tid=$tid1&amp;topage=$page&amp;forum=$forum\">$subject1</a></b><small>$replies1 by <b><a href=\"$lback/profile.php?ses=$ses&amp;cat=$cat&amp;stringy=$stringy&amp;tid=$tid1&amp;user=$author1&amp;f=trd&amp;ref=sfor&amp;topage=$topage\">$author1</a></b>$lo1$stt</small></td></td></tr></table>";



	$rowst = mysql_fetch_array($resultas);
      		}



       	if ($num_rows <1) echo "<p class=\"content\" style=\"text-align: center;\">there are no posts to display.</p>";

       	while ($row)

		{
$tid = $row["id"];
$author = $row["title"];
$lock = $row["locked"];
$replies = $rowst["hits"];
$subject = stripslashes($row["content"]);
	

                if ($lock == "yes") $lo = "&nbsp;<small><b><img align=\"middle\" style=\"border: none;\" src=\"../images/topiclocked.gif\" alt=\"[locked]\"/></b></small>";
                else $lo = "";

                if ($replies >= 1) $posts = "$replies";
                else $posts = "";




	if ($posts == "") $posts = "";
	else $posts = "[$posts]";




echo "<table class=\"chat\" width=\"100%\"><tr><td><b><a href=\"./mod.forum.threads.php?pagename=$pagename&amp;getsite=$getsite&amp;cat=$cat&amp;tid=$tid&amp;topage=$page&amp;forum=$forum\">$subject</a></b><small>$posts by <b><a href=\"$lback/profile.php?ses=$ses&amp;cat=$cat&amp;stringy=$stringy&amp;tid=$tid&amp;user=$author&amp;f=trd&amp;ref=sfor&amp;topage=$topage\">$author</a></b>$lo</small></td></td></tr></table>";


$row = mysql_fetch_array($result);
      	}



		if ($count > $max) 
		{
		echo  "<p class=\"chat\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $max);
		}

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"./mod.forum.topics.php?pagename=$pagename&amp;getsite=$getsite&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}






//////// TEXT FORM!!
////////////////////////////////////////////

// GENERATE FORM KEY!


	$secret=md5(uniqid(rand(), true));
	$_SESSION['FORM_SECRET']=$secret;

	$formkey = $_SESSION['FORM_SECRET'];

if ($enflag != "yes") $enlink = " [<a href=\"./mod.forum.insert.php?pagename=$pagename&amp;getsite=$getsite&amp;pid=$mid&amp;tid=$tid&amp;act=enhancetopic&amp;forum=$forum&amp;page=$page\">go advanced</a>]";
else $enlink = " [<a href=\"./mod.forum.topics.php?pagename=$pagename&amp;getsite=$getsite&amp;pid=$mid&amp;tid=$tid&amp;forum=$forum&amp;page=$page#bottom\">go basic</a>]";


	echo "<p class=\"headfoot\" style=\"text-align: left;\"><b><big>new topic</big>$enlink</b></p>



	<form class=\"chat\" id=\"bottom\" action=\"./mod.forum.insert.php?pagename=$pagename&amp;getsite=$getsite&amp;tid=$tid&amp;forum=$forum&amp;act=topic\" method=\"post\" enctype=\"multipart/form-data\">

	<fieldset style=\"border: none;\">
	<b>subject:</b><br/>
	<input type=\"text\" name=\"subject\"  class=\"textbox\" maxlength=\"50\" format=\"*m\"/><br/>
	<b>message:</b><br/>
	<textarea name=\"message\" rows=\"3\" cols=\"20\"></textarea>";



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


	echo "</select>";


	$query = "SELECT count(*) from phoenix_imagealbums WHERE login='$login'";
	$result = mysql_query($query);
	$hasalbumcount = number_format(mysql_result($result,0,"count(*)"));

	

} // enflag

	echo "<br/><input type=\"hidden\" name=\"ses\" value=\"$ses\"/>


<input type=\"hidden\" name=\"pagename\" value=\"$pagename\"/>
<input type=\"hidden\" name=\"getsite\" value=\"$getsite\"/>

	<input type=\"hidden\" name=\"cat\" value=\"$cat\"/>
	<input type=\"hidden\" name=\"tid\" value=\"$tid\"/>
	<input type=\"hidden\" name=\"forum\" value=\"$forum\"/>
	<input type=\"hidden\" name=\"act\" value=\"topic\"/>
	<input type=\"hidden\" name=\"formkey\" value=\"$formkey\"/>";
	
	echo "<input type=\"submit\" class=\"buttstyle\" value=\"add topic\"/></fieldset>
	</form>";





$mainmenu = "$hyback <a href=\"./index.php?getsite=$getsite\">main menu</a>";







                             echo "<p class=\"headfoot\">$mainmenu</p></body></html>";
                             exit;
       }



else
{



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
<body><p class=\"headfoot\"><img src=\"../scripts/phoenix.php?string=account%20restricted!&amp;login=$login\" alt=\"account%20restricted!\"/></p>
	<p class=\"content\" style=\"text-align: center;\">";

	echo "Sorry, your account appears to be restricted, this may be due to misconduct on your part or an error on our part.<br/><br/>
	During the period of restriction you will be unable to use the Message Boards and some other functions of this site, this is for the protection of other users.<br/><br/>
	If you feel that this is an error and you have done nothing wrong please contact an administrator.";

	echo "</p></p><p class=\"break\">$breaker$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>$shortcuts</p></body></html>";
	exit;




}

?>