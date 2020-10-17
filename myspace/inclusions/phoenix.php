<?php



include("../../scripts/dbcon.php");





// $login = $_GET['login'];
$string = $_GET['string'];


$string = stripslashes("$string");

$login = "SYSTEM";

$query = "SELECT * from forum_users where username='$login'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

$hextext = $row['my_color'];
$hexback = $row['text_col'];
$themes = $row['mytheme'];


$hexback = "#ffffff";



header("Content-type: image/gif");



$redtext = hexdec(substr($hextext, 1, 2)); 
$greentext = hexdec(substr($hextext, 3, 2)); 
$bluetext = hexdec(substr($hextext, 5, 2));

$redback = hexdec(substr($hexback, 1, 2)); 
$greenback = hexdec(substr($hexback, 3, 2)); 
$blueback = hexdec(substr($hexback, 5, 2));


    if(!isset($_GET['size'])) $_GET['size'] = 15;
    if(!isset($_GET['text'])) $_GET['text'] = "$string";




$font = "comicbd.ttf";




    $size = imagettfbbox($_GET['size'], 0, "$font", $_GET['text']);
    $xsize = abs($size[0]) + 2 + abs($size[2]);
    $ysize = abs($size[5]) + abs($size[1]);

    $image = imagecreate($xsize, $ysize);
    $blue = imagecolorallocate($image, $redback, $greenback, $blueback);
    $white = ImageColorAllocate($image, $redtext, $greentext, $bluetext);
    imagettftext($image, $_GET['size'], 0, abs($size[0]), abs($size[5]), $white, "$font", $_GET['text']);
 imagecolortransparent($image, $blue);


    imagepng($image);


    imagedestroy($image);

?> 