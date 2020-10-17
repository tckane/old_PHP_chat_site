<?php

$fileContent = $_GET['xpic'];

$fileType = $_GET['ext'];



    header("Content-type: $fileType"); 

    // get originalsize of image 
	if ($fileType == "gif")
	{ $im = imagecreatefromgif("$fileContent"); }
	elseif ($fileType == "jpg")
	{ $im = imagecreatefromjpeg("$fileContent"); }
	elseif ($fileType == "jpeg")
	{ $im = imagecreatefromjpeg("$fileContent"); }
	elseif ($fileType == "png")
	{ $im = imagecreatefrompng("$fileContent"); }

    $width  = imagesx($im); 
    $height = imagesy($im); 




    // Set thumbnail-width to 100 pixel 
    $imgw = 100; 

    // calculate thumbnail-height from given width to maintain aspect ratio 
    $imgh = $height / $width * $imgw; 

    // create new image using thumbnail-size 
    $thumb=ImageCreateTrueColor($imgw,$imgh); 

    // copy original image to thumbnail 
    ImageCopyResized($thumb,$im,0,0,0,0,$imgw,$imgh,ImageSX($im),ImageSY($im)); 

    // show thumbnail on screen 
    $out = Imagejpeg($thumb, null, 100); 
    print($out); 
    
    // clean memory 
    imagedestroy ($im); 
    imagedestroy ($thumb); 


?>
