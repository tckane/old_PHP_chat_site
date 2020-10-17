<?php


include("./inclusions/funx.php");
include("../scripts/dbcon.php");
//// MEMBER'S OWN
//// WAP SITES - GO!


$getsite = $_GET["getsite"];

$ses = $_COOKIE["sesh"];


$sqlbox = mysql_query("SELECT * from forum_users where ses='$ses' and ses!=''");

$sessers = mysql_num_rows($sqlbox);

if ($sessers < 1) $sessi = "bad";
elseif ($sessers > 1) $sessi = "bad";
else $sessi = "good";







// get site name

$sqlbox = mysql_query("SELECT * from phoenix_wap where sysname='$getsite'");

$sqlnumbers = mysql_num_rows($sqlbox);
$sqlopen = mysql_fetch_array($sqlbox);



if ($sqlnumbers > 0)
{

$owner = $sqlopen["owner"];
$logo = $sqlopen["filename"];


$pagename = $_GET["pagename"];

$sqlbox = mysql_query("SELECT * from phoenix_wap where owner='$owner' AND type='module' AND sysname='$pagename' AND content='login'");
$sqlopen = mysql_fetch_array($sqlbox);

$title = $sqlopen["title"];
$content = stripslashes(strip_javascript(clean(htmlspecialchars_decode($sqlopen["content"]))));
$owner = $sqlopen["filename"];
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

header("Content-type: text/html; charset=utf-8");
header("Last-Modified: " . gmdate("D, dMYH:i:s") . " GMT");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");


if ($sessi != "good")
{

echo "<?xml version='1.0'?>
<!DOCTYPE html PUBLIC \"-//WAPFORUM//DTD XHTML Mobile 1.0//EN\" 
\"http://www.wapforum.org/DTD/xhtml-mobile10.dtd\">
<html>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>$counterstrike<title>$title</title></head>
<body><p class=\"headfoot\"><img src=\"./images/$logo\" alt=\"logo\"/><br/>$title</p>
<p class=\"content\">Please log in below to continue</p>";

echo "<form style=\"text-align: center;\" method=\"GET\" action=\"./mod.logcheck.php\"/>
<fieldset style=\"padding: 0px; margin: 0px; border-style: none;\">
<b>Login Name</a><br/>
<input type=\"text\" name=\"u\" maxlength=\"24\"/><br/>
<b>Password</a><br/>
<input type=\"text\" name=\"p\" maxlength=\"24\"/><br/>
<input type=\"hidden\" name=\"getsite\" value=\"$getsite\"/>
<input type=\"submit\" value=\"login\"/>
</fieldset></form>

<p class=\"content\">if you do not have a PhoenixBytes login click <a href=\"../register.php\">here</a></p>
<p class=\"headfoot\"><a href=\"./index.php?getsite=$getsite\">go back</a></p>";
}
else
{


echo "<?xml version='1.0'?>
<!DOCTYPE html PUBLIC \"-//WAPFORUM//DTD XHTML Mobile 1.0//EN\" 
\"http://www.wapforum.org/DTD/xhtml-mobile10.dtd\">
<html>
<head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>
$counterstrike
<title>
$title
</title>
</head>
<body>
<p class=\"headfoot\"><img src=\"./images/$logo\" alt=\"logo\"/><br/>$title</p>
<p class=\"content\">You Are Already Logged In</p><p class=\"content\">There is no need to login again<br/>do you want to <a href=\"./logoff.php?getsite=$getsite\">log off?</a></p>
<p class=\"headfoot\"><a href=\"./index.php?getsite=$getsite\">go back</a></p>";

}

include("./inclusions/footer.php");

echo "</body></html>";







exit;
}


?>