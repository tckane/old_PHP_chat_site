<?php






include('dbconnect.php');




if ($login == "") $login = "SYSTEM";

$query = "SELECT * from forum_users where username='$login'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

$hexback = $row['tr_col'];
$hextext = $row['my_color'];


$themes = $row['mytheme'];





header("Content-type: image/gif");

$string = base64_decode($_GET['string']);


$redtext = hexdec(substr($hextext, 1, 2)); 
$greentext = hexdec(substr($hextext, 3, 2)); 
$bluetext = hexdec(substr($hextext, 5, 2));

$redback = hexdec(substr($hexback, 1, 2)); 
$greenback = hexdec(substr($hexback, 3, 2)); 
$blueback = hexdec(substr($hexback, 5, 2));


    if(!isset($_GET['size'])) $_GET['size'] = 16;
    if(!isset($_GET['text'])) $_GET['text'] = "$string";





    $size = imagettfbbox($_GET['size'], 0, "comic.ttf", $_GET['text']);
    $xsize = abs($size[0]) + abs($size[2]);
    $ysize = abs($size[5]) + abs($size[1]);

    $image = imagecreate($xsize + 4, $ysize + 2);
    $blue = imagecolorallocate($image, $redback, $greenback, $blueback);
    $white = ImageColorAllocate($image, $redtext, $greentext, $bluetext);


    imagettftext($image, $_GET['size'], 0, abs($size[0]), abs($size[5]), $white, "comic.ttf", $_GET['text']);




    imagegif($image);


    imagedestroy($image);

?> 