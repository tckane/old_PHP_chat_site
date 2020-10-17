<?php




include("../scripts/dbcon.php");
//// MEMBER'S OWN
//// WAP SITES - GO!
//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////



$getsite = $_GET["getsite"];
$mg = $_GET["mg"];

$pagename = $_GET["pagename"];
if ($pagename == "") $pagename = $_POST["pagename"];
if ($pagename == "") $pagename = "page1";


// get site name

$sqlbox = mysql_query("SELECT * from phoenix_wap where sysname='$getsite'");

$sqlnumbers = mysql_num_rows($sqlbox);
$sqlopen = mysql_fetch_array($sqlbox);









if ($sqlnumbers > 0)
{
include("./inclusions/funx.php");
$owner = $sqlopen["owner"];

////////////////////////////////////////////////////////////////////////////////////////////////
function incoming_modules($string, $owner, $getsite)
{

$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='module'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
while ($row)
{
$module = $row["sysname"];
$title = $row["title"];
$filename = $row["content"];

$string = preg_replace( "#link:$module#is", "<a href=\"./mod.$filename.php?getsite=$getsite&amp;pagename=$module\">$title</a>", $string );

$row = mysql_fetch_array($result);
}
return $string; 
}
/////////////////////////////////////////////////////////////////////////////////////////////////
function addenv($string, $owner, $getsite)
{

$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='site'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
while ($row)
{
$filename = $row["filename"];

$string = preg_replace( "#site:logo#is", "<img src=\"./images/$filename\" alt=\"logo\"/>", $string );

$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='page' and sysname='$pagename'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$ptitle = $row["filename"];

$string = preg_replace( "#site:title#is", "$ptitle", $string );

$row = mysql_fetch_array($result);
}
return $string; 
}/////////////////////////////////////////////////////////////////////////////////////////////////
function addpages($string, $owner, $getsite)
{

$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='page' order by sysname desc";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
while ($row)
{
$page = $row["sysname"];
$title = $row["title"];


if (preg_match("#page:$page#","$string"))
{
$string = str_replace("page:$page","<a href=\"./index.php?getsite=$getsite&amp;pagename=$page\">$title</a>", "$string" );

}
else
{
}


$row = mysql_fetch_array($result);
}
return $string; 
}
/////////////////////////////////////////////////////////////////////////////////////////////////

$sqlbox = mysql_query("SELECT * from phoenix_wap where owner='$owner' AND type='page' AND sysname='$pagename'");
$sqlopen = mysql_fetch_array($sqlbox);

$title = $sqlopen["title"];
$content = addpages(addenv(incoming_modules(stripslashes(strip_javascript(clean(htmlspecialchars_decode($sqlopen["content"])))), "$owner", "$getsite"), "$owner", "$getsite"), "$owner", "$getsite");
$owner = $sqlopen["owner"];
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


if ($mg != "")
{ $mg = "<p style=\"color: red; font-weight: bold; font-size: medium; background-color: black; text-align: center; padding: 1px; margin: 0px;\">$mg</p>"; }



header("Content-type: text/html; charset=utf-8");
header("Last-Modified: " . gmdate("D, dMYH:i:s") . " GMT");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

echo "<?xml version='1.0'?>
<!DOCTYPE html PUBLIC \"-//WAPFORUM//DTD XHTML Mobile 1.0//EN\" 
\"http://www.wapforum.org/DTD/xhtml-mobile10.dtd\">
<html>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>
$counterstrike
<title>
$title
</title>
</head>
<body>
$mg
$content";
echo "<hr/>";
include("./inclusions/footer.php");
echo "</body>
</html>";


exit;
}
else
{

include("../scripts/waawaamp.php");

$host = $_SERVER["HTTP_HOST"];

echo "<p class=\"break\"><img src=\"./inclusions/phoenix.php?login=SYSTEM&amp;string=Error%20404\" alt=\"404\"/></p><hr/>
<p class=\"breakforum\" style=\"text-align: center;\"><b>Sorry, the page you requested was not found!</b><br/>
The address <u>$host/$getsite</u> does not exist!<br/>
= do welcome page for blank /url =</p>";





echo "<hr/><p class=\"break\">$hyback <a href=\"../index.php?ses=$ses\">main menu</a>$dellink</p></body></html>";


}

?>