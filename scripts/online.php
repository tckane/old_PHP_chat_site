<?php




include('dbconnect.php');





$login = $_GET['login'];



$query = "select * from welcome where id='1'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);


$interval = $row["cuntus"];



$query = "SELECT count(*) from forum_users WHERE lastactive > DATE_ADD(NOW(), INTERVAL -$interval MINUTE) and location!='offline'";
$result =mysql_query($query);
$row2 =mysql_fetch_array($result);
$countonline = $row2[0];

if ($login == "") $login = "admin";

$query = "SELECT * from forum_users where username='$login'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

$hextext = $row['my_color'];
$hexback = $row['text_col'];
$themes = $row['mytheme'];


if ($themes == "no")
{
$hexback = "#ffffff";
}


header("Content-type: image/gif");



$redtext = hexdec(substr($hextext, 1, 2)); 
$greentext = hexdec(substr($hextext, 3, 2)); 
$bluetext = hexdec(substr($hextext, 5, 2));

$redback = hexdec(substr($hexback, 1, 2)); 
$greenback = hexdec(substr($hexback, 3, 2)); 
$blueback = hexdec(substr($hexback, 5, 2));


    if(!isset($_GET['size'])) $_GET['size'] = 10;


$countonline = "$countonline";








    $size = imagettfbbox($_GET['size'], 0, "comicbd.ttf", $countonline);
    $xsize = abs($size[0]) + 2 + abs($size[2]);
    $ysize = abs($size[5]) + abs($size[1]);

    $image = imagecreate($xsize, $ysize);
    $blue = imagecolorallocate($image, $redback, $greenback, $blueback);
    $white = ImageColorAllocate($image, $redtext, $greentext, $bluetext);
    imagettftext($image, $_GET['size'], 0, abs($size[0]), 10, $white, "comicbd.ttf", $countonline);
// imagecolortransparent($image, $blue);


    imagepng($image);


    imagedestroy($image);

?>