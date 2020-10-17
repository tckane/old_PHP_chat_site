<?php
$ses = $_GET["ses"];

if ($ses == "")
{
$ses = $_POST['ses'];
}

if ($ses != "")
{
include('../scripts/ses.php');
}

include("../scripts/main.php");
include('./getid3/getid3.php');


$stringy = strtolower($_GET["stringy"]);
$origstringy = "$stringy";


$getcwd = getcwd();
$max = $tmax;




////////////////////////////////////////////////////////
//
// Search for the files
//
//
$stringy=explode(' ', "$stringy");
$patternmatch='/.*'.$stringy[0].'.*'.$stringy[1].'.*/';
$getcwd = getcwd(); 

$directory = opendir($getcwd);
while (false !== ($filefound = readdir($directory))) {

if(preg_match("$patternmatch",strtolower($filefound))){
$files[] = $filefound;
}
}
////////////////////////////////////////////////////////




////////////////////////////////////////////////////////
//
// Split array into chunks
//
//
$pages = @array_chunk($files, $max);
////////////////////////////////////////////////////////



////////////////////////////////////////////////////////
// Work out number of pages
//
//
$pgkey = (int)$_GET['showpage']; 
$pages[$pgkey];
$moof = count($files);
////////////////////////////////////////////////////////


echo "<p class=\"break\"><b><big>PhoenixBytes<br/>File Search</big></b></p><hr/>
<p class=\"breakforum\" style=\"text-align: center; font-weight: bold;\">your search for &quot;$origstringy&quot; pulled up $moof results.</p>";


if ($moof > 0)
{


////////////////////////////////////////////////////////
// pagination station!
//
if ($moof > $max)
{
echo "<p class=\"breakforum\"><b>Page: ";

for($i=1; $i< count($pages)+1; $i++):

     echo "<a href=\"global.php?showpage=$i&amp;ses=$ses&amp;stringy=$origstringy\">$i</a> ";

endfor;

echo "</b></p>";
}
////////////////////////////////////////////////////////




////////////////////////////////////////////////////////
// Meat and potatoes - list the files
// 
//
foreach($pages[$pgkey-1] as $file)
{
$currentfile = "$file"; 
$parts = Explode('/', $currentfile); 
$currentfile = $parts[count($parts) - 1];
$mcfiler = urlencode("$currentfile");


$thisfile = "$currentfile";

$exten = substr(strrchr($thisfile, "."), 1);
$exten = strtolower($exten);

if ($exten == "php")
{ }
else
{


$name = strtolower($thisfile);
$name = trim_ext($name);
$name = substr($name,0,25);
$name = str_replace("_"," ","$name");
$totalbytes = filesize($thisfile);
$name = make_wml_compat($name);
$tidyfiles = make_url_compat($thisfile);
$ftype = mime_artist("$exten");



if ($totalbytes < pow(2,10)){
	$fsize = "$totalbytes<small>B</small>";
}
if ($totalbytes > pow(2,10) && $totalbytes < pow(2,20)) {
	$fsize = round($totalbytes / pow(2,10), 0)."<small>KB</small>";
}
if ($totalbytes > pow(2,20) && $totalbytes < pow(2,30)) {
	$fsize = round($totalbytes / pow(2,20), 0)."<small>MB</small>";
}

if ($totalbytes > pow(2,30) && $totalbytes < pow(2,40)) {
	$fsize = round($totalbytes / pow(2,30), 0)."<small>GB</small>";
}




if ($ftype == "image")
{

$tidyfiles = base64_encode("$tidyfiles");

echo "<p class=\"breakforum\">
<a href=\"./view.php?ses=$ses&amp;thatfile=$tidyfiles&amp;type=$ftype&amp;backrpp=$rpp&amp;backpage=$page&amp;act=$act&amp;backpagego=$pagego\">
<img src=\"thumbnailer.php?xpic=$thisfile&amp;ext=$exten\" alt=\"$name.$exten\" align=\"middle\"/></a>
<br/>$name.$exten
<br/>size(<span style=\"color: $cocol;\">$fsize</span>);
<br/>type(<span style=\"color: $cocol;\">$ftype</span>);</p>";
}
else
{


if ($exten == "mp3")
{
$getID3 = new getID3; 
// Analyze file and store returned data in $ThisFileInfo 
$ThisFileInfo = $getID3->analyze("$thisfile"); 

// Optional: copies data from all subarrays of [tags] into [comments] so 
// metadata is all available in one location for all tag formats 
// metainformation is always available under [tags] even if this is not called 
getid3_lib::CopyTagsToComments($ThisFileInfo); 


$artist = @$ThisFileInfo['comments_html']['artist'][0]; // artist from any/all available tag formats 
$title = @$ThisFileInfo['tags']['id3v2']['title'][0]; // title from ID3v2 

$filedisplayname = "$artist - $title";


$picture = @$ThisFileInfo['id3v2']['APIC'][0]['data'];

$mpic = urlencode("$thisfile");

if ($picture != "") $pictorial = "<img style=\"float: left; border: none;\" src=\"./viewimg.php?res=30&amp;mp3=$mpic\"/>";
else $pictorial = "";


}
if ($artist != "") $filedisplayname = "$filedisplayname";
else $filedisplayname = "$name.$exten";

$tidyfiles = base64_encode("$tidyfiles");

echo "<p class=\"breakforum\">
$pictorial<a style=\"clear:both; font-weight: bold;\" href=\"./view.php?ses=$ses&amp;thatfile=$tidyfiles&amp;type=$ftype&amp;backrpp=$rpp&amp;backpage=$page&amp;act=$act&amp;backpagego=$pagego\">$filedisplayname</a>
<br/>size($fsize); type($ftype);</p>";

}


}
}
////////////////////////////////////////////////////////


////////////////////////////////////////////////////////
// pagination station!
//
if ($moof > $max)
{
echo "<p class=\"breakforum\"><b>Page: ";

for($i=1; $i< count($pages)+1; $i++):

     echo "<a href=\"global.php?showpage=$i&amp;ses=$ses&amp;stringy=$origstringy\">$i</a> ";

endfor;

echo "</b></p>";
}
////////////////////////////////////////////////////////


}

if ($ses != "")
{
$mainmenu = "$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";
}
else
{
$mainmenu = "$hyback <a href=\"../index.php?ses=$ses\">main menu</a>";
}



echo "<hr/><p class=\"break\">$hyfor <a href=\"./files.php?ses=$ses\">files</a><br/>$mainmenu</p></body></html>";

?>