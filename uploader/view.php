<?php


$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];


if ($ses != "")
{
include('../scripts/ses.php');
}

$query = "SELECT * from forum_users where ses='$ses'";
$result = mysql_query ("$query");
$sessio = mysql_num_rows($result);


include('./getid3/getid3.php');
include('../scripts/waawaamp.php');


$thatfile = $_GET["thatfile"];
if ($thatfile == "") $thatfile = $_POST["thatfile"];
//

$thatfile = base64_decode("$thatfile");

$fbfile = base64_encode("$thatfile");


$type = $_GET['type'];
//

$rpp = $_GET['rp'];
//

$page = $_GET['page'];
//

$backpage = $_GET['backpage'];
//

$act = $_GET['act'];


#==================================



$thatfile = str_replace(";","","$thatfile");

$totalbytes = filesize("$thatfile");



if ($totalbytes < pow(2,10)){
	$totalsize = "$totalbytes B";
}
if ($totalbytes >= pow(2,10) && $totalbytes < pow(2,20)) {
	$totalsize = round($totalbytes / pow(2,10), 2)."KB";
}
if ($totalbytes >= pow(2,20) && $totalbytes < pow(2,30)) {
	$totalsize = round($totalbytes / pow(2,20), 2)."MB";
}







echo "<p class=\"break\"><b>$thatfile</b></p>";


///////////////////////////////////////////////////////////////
////////// shortcut block /////////////////////////////////////////
///////////////////////////////////////////////////////////////
$queryd = "SELECT * FROM shortcuts";
$resultd = mysql_query($queryd);
$rowd = mysql_fetch_array($resultd);

echo "<form class=\"breakforum\" style=\"text-align: center;\" action=\"$lback/shortcuts.php?ses=$ses\" method=\"get\">
<fieldset>
<select name=\"shortcut\">";

while ($rowd)
{

$sid = $rowd["id"];
$sname = $rowd["name"];

echo "<option value=\"$sid\">$sname</option>";

$rowd = mysql_fetch_array($resultd);
}

echo "</select>
<input type=\"submit\" value=\"go there\"/>
<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
</fieldset></form>";
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////



if ($type == "image")
{
$esize = getimagesize("$thatfile");



$thisfile = "$thatfile";

$exten = substr(strrchr($thatfile, "."), 1);
$exten = strtolower($exten);
$name = strtolower($thatfile);
$name = trim_ext($name);
$name = substr($name,0,25);
$name = trim_digits($name);
$name = str_replace("_"," ","$name");

$name = make_wml_compat($name);
$tidyfiles = make_url_compat($thisfile);
$ftype = mime_artist("$exten");





if ($exten != "png")
{

echo "<p class=\"breakforum\" style=\"text-align: center;\"><img src=\"./thumbnailer.php?xpic=$thisfile&amp;ext=$exten\" alt=\"$thatfile\"/></p>";
}


if ($sessio > 0)
	{ echo "<p class=\"breakforum\"><b><a href=\"./leave.php?file=$thatfile\">download?</a></b></p>"; }
else
	{ echo "<p class=\"breakforum\"><b><a href=\"../register.php\">Become A Member</a> to download this file.</b></p>"; }


echo "<p class=\"breakforum\">
<b>Size: </b>$totalsize<br/>
<b>Width: </b>$esize[0]<br/>
<b>Height: </b>$esize[1]<br/>
<b>Type: </b>$type</p>";

if ($sessio > 0)
{

echo "<form class=\"breakforum\"><fieldset>Link: <input type=\"text\" readonly=\"yes\" value=\"$lback/uploader/$thatfile\"/></fieldset></form>";

}

}

else

{



$exten = substr(strrchr($thatfile, "."), 1);
$exten = strtolower($exten);


if ($exten == "mp3")
{
$getID3 = new getID3; 
// Analyze file and store returned data in $ThisFileInfo 
$ThisFileInfo = $getID3->analyze("$thatfile"); 

// Optional: copies data from all subarrays of [tags] into [comments] so 
// metadata is all available in one location for all tag formats 
// metainformation is always available under [tags] even if this is not called 
getid3_lib::CopyTagsToComments($ThisFileInfo); 

$picture = @$ThisFileInfo['id3v2']['APIC'][0]['data'];




$artist = @$ThisFileInfo['comments_html']['artist'][0]; // artist from any/all available tag formats 
$title = @$ThisFileInfo['tags']['id3v2']['title'][0]; // title from ID3v2 
$quality = @$ThisFileInfo['audio']['bitrate']; // audio bitrate 
$timespan = @$ThisFileInfo['playtime_string']; // playtime in minutes:seconds, formatted string



if ($quality < 120000) $quguide = "(low)";
if ($quality > 120000) $quguide = "(medium)";
if ($quality > 200000) $quguide = "(high)";
if ($quality > 300000) $quguide = "(highest)";

if ($quality != "")
{
if ($quality < pow(2,10))
{ $quality = "$quality<small>Bps</small>"; }
if ($quality >= pow(2,10))
{ $quality = round($quality / pow(2,10), 0)."<small>Kbps</small>"; }
elseif ($quality >= pow(2,15))
{ $quality = round($quality / pow(2,20), 0)."<small>Mbps</small>"; }
}



if ($picture != "")
{
$mpic = urlencode("$thatfile");

echo "<p class=\"breakforum\" style=\"text-align: center;\"><img src=\"$lback/uploader/viewimg.php?mp3=$mpic\"/></p><p class=\"breakforum\">"; 
}
else
{
echo "<p class=\"breakforum\">";


}




if ($exten == "mp3")
{

if ($artist != "") echo "<b>Artist:</b> $artist<br/>";
if ($title != "") echo "<b>Track Title:</b> $title<br/>";
if ($quality != "") echo "<b>Quality:</b> $quality$quguide<br/>";
if ($timespan != "") echo "<b>Play Time:</b> $timespan<br/>";
$filedisplayname = "$artist - $title";
echo "<iframe align=\"middle\" src=\"http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fphoenixbytes.co.uk%2Ffiles%2F$fbfile&amp;layout=button_count&amp;show_faces=false&amp;width=70&amp;action=like&amp;font=tahoma&amp;colorscheme=light&amp;height=20\" scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden; width:70px; height:20px;\" allowTransparency=\"true\"></iframe>
</p>";
}


}

if ($artist != "") $filedisplayname = "$filedisplayname";
else $filedisplayname = "$thatfile";

$outfra = str_replace(" ","%20","$thatfile");



if ($sessio > 0)
{

echo "<p class=\"breakforum\"><b>Download <a href=\"$outfra\">$filedisplayname</a></b></p>";

}
else
{

echo "<p class=\"breakforum\"><b><a href=\"../register.php\">Become A Member</a> to download this file.</b></p>";

}



echo "<p class=\"breakforum\">
<b>Size: </b>$totalsize<br/>
<b>Type: </b>$type/$exten</p>";


if ($sessio > 0)
{

echo "<form class=\"breakforum\"><fieldset>Link: <input type=\"text\" readonly=\"yes\" value=\"$lback/uploader/$outfra\"/></fieldset></form>";

}


}
if ($ses != "")
{

if ($group < 2)
{
echo "<p class=\"breakforum\" style=\"text-align: center;\">$hyfor <a href=\"./zadeletify.php?ses=$ses&amp;file=$thatfile&amp;detail=lumpystew99weedmongtree\">delete</a></p>";
}
}

echo "<p class=\"break\">$hyfor <a href=\"./files.php?ses=$ses&amp;stringy=$stringy&amp;rpp=$rpp&amp;page=$page&amp;act=$act\">files</a><br/>";
echo "$hyfor <a href=\"./index.php?ses=$ses&amp;location=index\">uploader</a><br/>";

if ($ses != "")
{
echo "$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";
}
else
{
echo "$hyback <a href=\"../index.php?ses=$ses\">main menu</a>";
}




echo "</p></body></html>";



?>
