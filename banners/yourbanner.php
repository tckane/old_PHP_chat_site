<?php


include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/config.php');
include('../scripts/functions.php');
include('../scripts/main.php');



// find a random banner and bang it out

$bid = $_GET['bid'];


$query = "SELECT * from bannerads WHERE id=$bid";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$rows = mysql_fetch_array($result);

$lid = $rows["id"];

$banner = $rows["banner"];

$ext = substr(strrchr($banner, "."), 1);

$ext = strtolower($ext);




// set link id holder


$ttxx = $rows["site"];


$banner = $rows["banner"];



$ext = substr(strrchr($banner, "."), 1);

$ext = strtolower($ext);




$hextext = "#FFFFFF";

$redtext = hexdec(substr($hextext, 1, 2)); 
$greentext = hexdec(substr($hextext, 3, 2)); 
$bluetext = hexdec(substr($hextext, 5, 2));




list($width, $height) = getimagesize($banner);


$newwidth = 95;



$newheight = 40;


$thumb = imagecreatetruecolor($newwidth, $newheight);

if ($ext == "jpg" | "jpeg")
{
$source = imagecreatefromjpeg($banner);
}

if ($ext == "gif") 
{
$source = imagecreatefromgif($banner);
}

if ($ext == "png") 
{

$source = imagecreatefrompng($banner);
}


$white = ImageColorAllocate($source, $redtext, $greentext, $bluetext);
imagecolortransparent($source, $white);




imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight-13, $width, $height);



$hexback = "#000000";



$hextext = "#ffffff";

$hextext2 = "#0000ff";



$redback = hexdec(substr($hexback, 1, 2)); 

$greenback = hexdec(substr($hexback, 3, 2)); 

$blueback = hexdec(substr($hexback, 5, 2));


$redtext2 = hexdec(substr($hextext2, 1, 2)); 

$greentext2 = hexdec(substr($hextext2, 3, 2)); 

$bluetext2 = hexdec(substr($hextext2, 5, 2));

$redtext = hexdec(substr($hextext, 1, 2)); 

$greentext = hexdec(substr($hextext, 3, 2)); 

$bluetext = hexdec(substr($hextext, 5, 2));

$txtcol = ImageColorAllocate($thumb, $redtext, $greentext, $bluetext);

$txtcol2 = ImageColorAllocate($thumb, $redtext2, $greentext2, $bluetext2);

$bckcol = ImageColorAllocate($thumb, $redback, $greenback, $blueback);

imagefilledrectangle($thumb, 100, 40, 0, 29, $bckcol);

$margintop = "28";


$textlength = strlen("$ttxx");


if ($textlength == "14") $marginleft = "-1";
if ($textlength == "13") $marginleft = "3";
if ($textlength == "12") $marginleft = "6";
if ($textlength == "11") $marginleft = "10";
if ($textlength == "10") $marginleft = "14";
if ($textlength == "9") $marginleft = "17";
if ($textlength == "8") $marginleft = "20";
if ($textlength == "7") $marginleft = "24";
if ($textlength == "6") $marginleft = "28";
if ($textlength == "5") $marginleft = "32";
if ($textlength == "4") $marginleft = "36";
if ($textlength == "3") $marginleft = "41";
if ($textlength == "2") $marginleft = "43";
if ($textlength == "1") $marginleft = "44";

$ttxx = str_replace("-"," ","$ttxx");
$ttxx = strtolower("$ttxx");
$ttxx = ucwords("$ttxx");



imagestring($thumb, 3, $marginleft, $margintop-1, "$ttxx", $txtcol2);

imagestring($thumb, 3, $marginleft-1, $margintop-2, "$ttxx", $txtcol);





header("Content-type: image/gif");


imagegif($thumb);



imagedestroy($thumb);
imagedestroy($source);
?>