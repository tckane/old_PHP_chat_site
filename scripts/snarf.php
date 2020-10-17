<?php



include('../scripts/dbconnect.php');





$snarf = $_SERVER["HTTP_REFERER"];


if ($snarf != "")
{


$query = "INSERT into snarf ( snarf ) values ( '$snarf' )";
$result = mysql_query("$query");

}







$fileContent = "snarf.gif";


    header("Content-type: $fileType"); 

$im = @imagecreatefromgif("$fileContent");



    $width  = @imagesx($im); 
    $height = @imagesy($im); 

if ($width != "")
{



    // calculate thumbnail-height from given width to maintain aspect ratio 


    // create new image using thumbnail-size 
    $thumb=ImageCreateTrueColor($width,$height); 

    // copy original image to thumbnail 
    ImageCopyResized($thumb,$im,0,0,0,0,$width,$height,$width,$height); 

    // show thumbnail on screen 
    $out = Imagejpeg($thumb, null, 100); 
    print($out); 
    
    // clean memory 
    imagedestroy ($im); 
    imagedestroy ($thumb); 
}



?>