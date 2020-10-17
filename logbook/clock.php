<?php


$bgcol = "#FFFFFF";

//
/////////////////////////////////////////////////////////////////////////
$momo = date("m");
$dada = date("d");
$yaya = date("y");
$timea = date("G");
$timeb = date("i");
$time = "$timea:$timeb";
$rawdate = "$time $dada/$momo/$yaya";
$hextext = "$bgcol";
$hexback = "#000000";
$fontsize = "10";
// Get new sizes
if ($timea <= 9) 
{
$newwidth = "100"; 
} 
else 
{
$newwidth = "107";
}
$newheight = "12";
// Load
$thumb = imagecreate($newwidth, $newheight);
$redtext = hexdec(substr($hextext, 1, 2)); 
$greentext = hexdec(substr($hextext, 3, 2)); 
$bluetext = hexdec(substr($hextext, 5, 2));
$redback = hexdec(substr($hexback, 1, 2)); 
$greenback = hexdec(substr($hexback, 3, 2)); 
$blueback = hexdec(substr($hexback, 5, 2));
$fontfile = "comicbd.ttf";
$size = imagettfbbox($fontsize, 0, "$fontfile", $rawdate);
$phoenix = ImageColorAllocate($thumb, $redback, $greenback, $blueback);
$white = ImageColorAllocate($thumb, $redtext, $greentext, $bluetext);
// imagecolortransparent($thumb, $phoenix);
$marginone = (0 + abs($size[0]));
$margintwo = (0 + abs($size[5]));
imagettftext($thumb, $fontsize, 0, $marginone, $margintwo, $white, "$fontfile", $rawdate);
// output
header("Content-type: image/png");
imagepng($thumb);
imagedestroy($thumb);
imagedestroy($source);
?>