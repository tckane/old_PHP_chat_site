<?php

include('./inclusions/funx.php');
include("../scripts/dbcon.php");

//// MEMBER'S OWN
//// WAP SITES - ADMINISTRATION AREA!




$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];


$query = "SELECT * from forum_users where ses='$ses'";
$result = mysql_query ("$query");
$rowses = mysql_fetch_array($result);
$session = mysql_num_rows($result);

$owner = $rowses["username"];




////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////


$act = $_POST["act"];
if ($act == "") $act = $_GET["act"];
$stylesheet = $_POST["stylesheet"];
$pagetitle = clean($_POST["pagetitle"]);
$sysname = $_POST["sysname"];
$pagid = $_POST["pagid"];
if ($pagid == "") $pagid = $_GET["pagid"];
$modid = $_POST["modid"];
if ($modid == "") $modid = $_GET["modid"];
$fullcontent = htmlspecialchars($_POST["fullcontent"]);
$module = $_POST["module"];

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////



if ($act == "")
{
$msg = stripslashes(urlencode("Sorry, something has gone awry."));
$url = "./pigmin.php?ses=$ses&msg=$msg";
header("HTTP/1.1 301 Moved Permanently");
header("Location: $url");
}






if ($act == "createpage")
{

$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='css' and id='$stylesheet'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

$sscontent = $row["content"];


$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='page' and sysname='$sysname'";
$result = mysql_query($query);
$totalpages = mysql_num_rows($result);

if ($totalpages < 1)
{
$query = "insert into phoenix_wap ( owner, title, sysname, date, stylesheet, type ) values ( '$owner', '$pagetitle', '$sysname', now(), '$sscontent', 'page' )";
mysql_query($query);
$msg = urlencode("Your new page was created.");
}
else
{
$msg = stripslashes(urlencode("There's already a page with that name, you must refresh the Create Page form."));
}

$url = "./pigmin.php?ses=$ses&msg=$msg";
header("HTTP/1.1 301 Moved Permanently");
header("Location: $url");
}







if ($act == "editpage")
{

$query = mysql_query("update phoenix_wap set content='$fullcontent' where id='$pagid' and owner='$owner'");




$msg = stripslashes(urlencode("Page saved."));


$url = "./pigmin.php?ses=$ses&msg=$msg&act=editpages";
header("HTTP/1.1 301 Moved Permanently");
header("Location: $url");
}






if ($act == "editpagesettings")
{
$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='css' and id='$stylesheet'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

$sscontent = urlencode($row["content"]);


$query = mysql_query("update phoenix_wap set stylesheet='$sscontent', title='$pagetitle' where id='$pagid' and owner='$owner'");


$msg = stripslashes(urlencode("Page saved."));


$url = "./pigmin.php?ses=$ses&msg=$msg&act=editpages";
header("HTTP/1.1 301 Moved Permanently");
header("Location: $url");
}


if ($act == "delpage")
{


mysql_query("delete from phoenix_wap where id='$pagid' and owner='$owner'");

$msg = stripslashes(urlencode("Page deleted."));


$url = "./pigmin.php?ses=$ses&msg=$msg";
header("HTTP/1.1 301 Moved Permanently");
header("Location: $url");
}

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

if ($act == "createmodule")
{

$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='css' and id='$stylesheet'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

$sscontent = $row["content"];


$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='module' and sysname='$sysname'";
$result = mysql_query($query);
$totalpages = mysql_num_rows($result);

if ($totalpages < 1)
{
$query = "insert into phoenix_wap ( owner, title, sysname, date, stylesheet, type, content ) values ( '$owner', '$pagetitle', '$sysname', now(), '$sscontent', 'module', '$module' )";
mysql_query($query);
$msg = urlencode("Your new module was created.");
}
else
{
$msg = stripslashes(urlencode("There's already a module with that name, you must refresh the Create Page form."));
}

$url = "./pigmin.php?ses=$ses&msg=$msg";
header("HTTP/1.1 301 Moved Permanently");
header("Location: $url");
}


if ($act == "editmodule")
{
$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='css' and id='$stylesheet'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

$sscontent = urlencode($row["content"]);


$query = mysql_query("update phoenix_wap set stylesheet='$sscontent', title='$pagetitle' where id='$modid' and owner='$owner'");


$msg = stripslashes(urlencode("Module saved."));


$url = "./pigmin.php?ses=$ses&msg=$msg&act=editmodule";
header("HTTP/1.1 301 Moved Permanently");
header("Location: $url");
}


if ($act == "delmod")
{

$query = "SELECT * FROM phoenix_wap where owner='$owner' and id='$modid'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

$ssysname = $row["sysname"];


mysql_query("delete from phoenix_wap where id='$modid' and owner='$owner'");
mysql_query("delete from phoenix_wap where sysname='$ssysname' and owner='$owner'");

$msg = stripslashes(urlencode("Module deleted."));


$url = "./pigmin.php?ses=$ses&msg=$msg";
header("HTTP/1.1 301 Moved Permanently");
header("Location: $url");
}
?>