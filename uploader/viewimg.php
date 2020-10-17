<? 


include('./getid3/getid3.php'); 

$mp3 = stripslashes($_GET["mp3"]);
$res = $_GET["res"];

$getID3 = new getID3; 
#$getID3->option_tag_id3v2 = true; # Don't know what this does yet 
$getID3->analyze("$mp3"); 
if (isset($getID3->info['id3v2']['APIC'][0]['data'])) { 
$cover = $getID3->info['id3v2']['APIC'][0]['data']; 
} elseif (isset($getID3->info['id3v2']['PIC'][0]['data'])) { 
$cover = $getID3->info['id3v2']['PIC'][0]['data']; 
} else { 
$cover = null; 
} 



$im = @imagecreatefromstring("$cover"); 


    $width  = @imagesx($im); 
    $height = @imagesy($im); 

if ($width != "")
{


if ($res == "") $imgw = 120; 
else $imgw = $res; 


    // calculate thumbnail-height from given width to maintain aspect ratio 
    $imgh = $height / $width * $imgw; 

    // create new image using thumbnail-size 
    $thumb=ImageCreatetruecolor($imgw,$imgw); 

    // copy original image to thumbnail 
    ImageCopyResized($thumb,$im,0,0,0,0,$imgw,$imgw,$width,$height); 


    $mimetype = 'image/jpeg';

header("Content-Type: " . $mimetype); 


    // show thumbnail on screen 
    $out = Imagejpeg($thumb, null, 70); 
    print($out); 


    // clean memory 
    imagedestroy ($im); 
    imagedestroy ($thumb); 
}


?>