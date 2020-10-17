<?php




include('../scripts/dbconnect.php');
ini_set("memory_limit","200M");


$query = "SELECT count(*) from zero where date > DATE_ADD(NOW(), INTERVAL -999 MINUTE)";
$result = mysql_query($query);
$amountonline = number_format(mysql_result($result,0,"count(*)"));


$query = "select hits from hit_counter where username='phoenixbytes'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);
$hits = $row["hits"];




header("Content-type: image/gif"); 



$fileContent = "$number.gif";


$middle = "#FF9900";

$texty = "#FFFFFF";

$linky = "#ffffff";

$linkyb = "#0000bb";

$redm = hexdec(substr($middle, 1, 2)); 
$greenm = hexdec(substr($middle, 3, 2)); 
$bluem = hexdec(substr($middle, 5, 2));

$redt = hexdec(substr($texty, 1, 2)); 
$greent = hexdec(substr($texty, 3, 2)); 
$bluet = hexdec(substr($texty, 5, 2));

$redl = hexdec(substr($linky, 1, 2)); 
$greenl = hexdec(substr($linky, 3, 2)); 
$bluel = hexdec(substr($linky, 5, 2));

$redlb = hexdec(substr($linkyb, 1, 2)); 
$greenlb = hexdec(substr($linkyb, 3, 2)); 
$bluelb = hexdec(substr($linkyb, 5, 2));


$imgh = "24";
$imgw = "16";

    // stamp size
	$stampheight = "40";
	$stampwidth = "70";


    $thumb=ImageCreateTrueColor($stampwidth,$stampheight); 

    // copy original image to thumbnail 



// background
$bgcolorallocate = ImageColorAllocate($thumb, $redm, $greenm, $bluem);


ImageFilledRectangle($thumb, 0, 0, $stampwidth, $stampheight, $bgcolorallocate);

// background


$textcolorallocate = ImageColorAllocate($thumb, $redt, $greent, $bluet);


$linkcolorallocate = ImageColorAllocate($thumb, $redl, $greenl, $bluel);
$bglinkcolorallocate = ImageColorAllocate($thumb, $redlb, $greenlb, $bluelb);


$hitslength = strlen("$hits");

if ($hitslength == 1) $hitsmargin = 30;
if ($hitslength == 2) $hitsmargin = 27;
if ($hitslength == 3) $hitsmargin = 23;

if ($hitslength == 4) $hitsmargin = 18;
if ($hitslength == 5) $hitsmargin = 13;
if ($hitslength == 6) $hitsmargin = 8;
if ($hitslength == 7) $hitsmargin = 4;
if ($hitslength == 8) $hitsmargin = 0;






imagestring($thumb, 5, $hitsmargin+1, 1, "$hits", $bglinkcolorallocate);
imagestring($thumb, 5, $hitsmargin, 0, "$hits", $textcolorallocate);

imagerectangle($thumb, 0, 0, 69, 15, $linkcolorallocate);



imagestring($thumb, 3, 5, 16, "$amountonline online", $bglinkcolorallocate);
imagestring($thumb, 3, 4, 15, "$amountonline online", $textcolorallocate);

imagerectangle($thumb, 0, 0, 69, 28, $linkcolorallocate);

imagestring($thumb, 1, 6, 30, "PhoenixBytes", $bglinkcolorallocate);
imagestring($thumb, 1, 5, 29, "PhoenixBytes", $textcolorallocate);







imagerectangle($thumb, 1, 1, 68, 38, $bglinkcolorallocate);
imagerectangle($thumb, 0, 0, 69, 39, $linkcolorallocate);


    // show thumbnail on screen 
    $out = Imagegif($thumb); 
    print($out); 
    
    // clean memory 
    imagedestroy($im); 
    imagedestroy($out);
    imagedestroy($thumb); 






?>