<?php

$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];


if ($ses != "")
{
include('../scripts/ses.php');
}

include('./getid3/getid3.php');
include('../scripts/main.php');




$act = $_GET['act'];
//
$rpp = $_GET['rpp'];
//
$page = $_GET['page'];
//
$backpage = $_GET['backpage'];
//
$pagego = $_GET['pagego'];



$so = $_GET["so"];
if ($so == "") $so = "Alphabetical";


$query = "UPDATE friends set lastactive=now(), location='downloading files' where friendname='$login'";
mysql_query($query);



$query = "UPDATE forum_users set lastactive=now(), location='downloading files' where username='$login'";
mysql_query($query);

#==================================

echo "<p class=\"break\"><big><i>$sitename<br/>file exchange</i></big></p><hr/>";


if ($ses != "")
{

///////////////////////////////////////////////////////////////
////////// shortcut block /////////////////////////////////////////
///////////////////////////////////////////////////////////////
$query = "SELECT * FROM shortcuts";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

echo "<form class=\"breakforum\" style=\"text-align: center;\" action=\"$lback/shortcuts.php?ses=$ses\" method=\"get\">
<fieldset>
<select name=\"shortcut\">";

while ($row)
{

$sid = $row["id"];
$sname = $row["name"];

echo "<option value=\"$sid\">$sname</option>";

$row = mysql_fetch_array($result);
}

echo "</select>
<input type=\"submit\" value=\"go there\"/>
<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
</fieldset></form>";
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
}



echo "

<p class=\"breakforum\" style=\"text-align: center;\" >
<big><a style=\"font-weight: bold;\" href=\"./index.php?location=index&amp;ses=$ses\">upload your files</a></big></p>




<form class=\"breakforum\" style=\"text-align: center;\" action=\"./global.php?ses=$ses\">
<fieldset>
<b>Search For Files</b><br/>
<input type=\"text\" name=\"stringy\"/><br/>
<input type=\"submit\" value=\"search\"/>
<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
<input type=\"hidden\" name=\"showpage\" value=\"1\"/>
</fieldset></form>";


if ((!$sortorder1) && (!$sortorder2)){
	$sortorder = "Alphabetical";
	$so = "&so=Alphabetical";
}

# Get current page to be displayed.
#----------------------------------
if ($pagego == "")
{
$currentpage = $_GET["page"];
if ($currentpage < 1 | $currentpage == "")
{
$currentpage = 1;
}
}
else
{
$currentpage = "$pagego";
}


# If no records per page is selected, set the default.
#-----------------------------------------------------

if ($rpp == "") $rpp = "$tmax";

if ((!$rpp1) && (!$rpp2)){
	$records_per_page = $rpp;
	$rpp3 = "&rpp=$records_per_page";
}

$max = "$rpp";







# Read current directory.
#------------------------
$d = dir(".");
while (false !== ($file = $d->read())) {
	# Get all the file attributes.
	#-----------------------------
	$size = filesize($file);
      	$type = filetype($file);
      	$ext = strrchr($file,'.');
	$modified = stat("$file");
	$displayname = str_replace (strrchr ($file, "."), "", $file);
	if ($act == "" ) $display_list = " gif torrent GIF Gif jpg jpeg JPG JPEG BMP Bmp bmp PNG Png png mp3 MP3 Mp3 WAV Wav wav MID Mid mid WMA Wma wma AMR Amr amr aac Aac AAC mpg mpeg MPG MPEG 3gp 3GP wmv Wmv wmv mp4 Mp4 MP4 zip txt Zip Txt TXT ZIP Rar rar RAR tar Tar TAR sis Sis SIS pdf PDF Pdf jar JAR jad JAD ";
	if ($act == "misc") $display_list = " zip txt Zip ZIP Rar rar RAR tar Tar jar JAR jad JAD TAR sis Sis SIS pdf PDF torrent Pdf ";
	if ($act == "music") $display_list = " mp3 MP3 Mp3 WAV Wav wav MID Mid mid WMA Wma wma AMR Amr amr aac Aac AAC ";
	if ($act == "image") $display_list = " gif GIF Gif jpg jpeg JPG JPEG PNG Png png ";
	if ($act == "video") $display_list = " mpg mpeg MPG MPEG 3gp 3GP wmv Wmv wmv mp4 Mp4 MP4 ";

	if (($type == file) && (preg_match ("/$ext/i", $display_list))) {
		# Format the Dispayed filename.. replace underscore with a space
		# and Change each word to start with an upper case letter.
		#---------------------------------------------------------------
		$displayname = str_replace("_"," ",$displayname);
		$displayname = strtolower($displayname);
		$displayname = ucwords($displayname);
		$filedate = date("m-d-y",$modified[9]);

		# Format the output depending on sort order and search criteria.
		#---------------------------------------------------------------
		if ((!$search) && ($sortorder == "Alphabetical")){
			$filename[$totalfiles] = "$displayname|$displayname|$file|$ext|$size|$filedate|$content|$upload_date";
		}

		
		$totalbytes = $totalbytes + $size;
		$totalfiles++;

if ($totalbytes < pow(2,10)){
	$totalsize = "$totalbytes<small>B</small>";
}
if ($totalbytes > pow(2,10) && $totalbytes < pow(2,20)) {
	$totalsize = round($totalbytes / pow(2,10), 0)."<small>KB</small>";
}
if ($totalbytes > pow(2,20) && $totalbytes < pow(2,30)) {
	$totalsize = round($totalbytes / pow(2,20), 0)."<small>MB</small>";
}

if ($totalbytes > pow(2,30) && $totalbytes < pow(2,40)) {
	$totalsize = round($totalbytes / pow(2,30), 0)."<small>GB</small>";
}
	}
}





# Sort by filename.
#------------------
if (($filename) && ($sortorder == "Alphabetical")){
	sort ($filename,SORT_REGULAR);
	reset ($filename);
	$select1 = "selected";
	$select2 = "";
	$select3 = "";
	$select4 = "";
	$match = 1;
}


# Pagination Start.
#------------------
if ($records_per_page < 1){
	$records_per_page = $totalfiles + 1;
}
If ($totalfiles > $records_per_page){
	$totalpages = ceil($totalfiles/$records_per_page);
	$flag = 0;
	if ($currentpage > $totalpages){
		$currentpage = 1;
	}
}ELSE{
	$flag = 1;
}
# Print out the top of the form and search criteria boxes.
#---------------------------------------------------------
?>

<?
# Start main loop.
#-----------------


if ($page == "") $page = "1";


# End main loop.
# Generate page number links.
#----------------------------
if ($flag == 0){


$count = "$totalfiles";


if ($count > $max) 
{
echo  "<p class=\"breakforum\"><b>Page:</b> ";

if ( $count > $max ) 
{ 
$number = ceil($count / $max);
}

for ( $counter=1; $counter <= $number; $counter++ )
{
if ($counter != $page) echo "<b><a href=\"./files.php?ses=$ses&amp;rpp=$rpp&amp;so=$so&amp;act=$act&amp;stringy=$stringy&amp;page=$counter\">$counter</a></b> ";
else  echo "<b>$counter</b> ";
}

if ($count > $max) echo  "</p>";
}
}






if ($match > 0){
   while (list ($key, $val) = each ($filename)) {
	if ($key >= ($records_per_page-$records_per_page)+(($currentpage-1)*$records_per_page) && $key <= ($records_per_page-1)+(($currentpage-1)*$records_per_page)){
		$fileattr = explode("|", $val);
		# Fix and format Byte Length
		#---------------------------
		if ($fileattr[4] < pow(2,10)){
			$fsize = "$fileattr[4]B";
		}
		if ($fileattr[4] >= pow(2,10) && $fileattr[4] < pow(2,20)) {
			$fsize = round($fileattr[4] / pow(2,10), 2)."KB";
		}
		if ($fileattr[4] >= pow(2,20) && $fileattr[4] < pow(2,30)) {
			$fsize = round($fileattr[4] / pow(2,20), 2)."MB";
		}
		if ($fileattr[3] > pow(2,30)) {
			$fsize = round($fileattr[4] / pow(2,30), 2)."GB";
		}




$thisfile = "$fileattr[2]";

$exten = substr(strrchr($fileattr[2], "."), 1);
$exten = strtolower($exten);
$name = strtolower($fileattr[2]);
$name = trim_ext($name);
$name = substr($name,0,25);
$name = str_replace("_"," ","$name");

$name = make_wml_compat($name);
$ftype = mime_artist("$exten");


$tidyfiles = base64_encode("$thisfile");


////////////////////////////
///////////////////////////
///
/// MP3 tags are being pulled here for use on music files
/// Images and other files are not being affected.
///
///////////////////////
//////////////////////




if ($ftype == "image")
{

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
$ThisFileInfo = $getID3->analyze("$fileattr[2]"); 

// Optional: copies data from all subarrays of [tags] into [comments] so 
// metadata is all available in one location for all tag formats 
// metainformation is always available under [tags] even if this is not called 
getid3_lib::CopyTagsToComments($ThisFileInfo); 


$artist = @$ThisFileInfo['comments_html']['artist'][0]; // artist from any/all available tag formats 
$title = @$ThisFileInfo['tags']['id3v2']['title'][0]; // title from ID3v2 

$filedisplayname = "$artist - $title";


$picture = @$ThisFileInfo['id3v2']['APIC'][0]['data'];

$mpic = urlencode("$fileattr[2]");

if ($picture != "") $pictorial = "<img style=\"float: left; border: none;\" src=\"./viewimg.php?res=30&amp;mp3=$mpic\"/>";
else $pictorial = "";


}
if ($artist != "") $filedisplayname = "$filedisplayname";
else $filedisplayname = "$name.$exten";


echo "<p class=\"breakforum\">
$pictorial<a style=\"clear:both; font-weight: bold;\" href=\"./view.php?ses=$ses&amp;thatfile=$tidyfiles&amp;type=$ftype&amp;backrpp=$rpp&amp;backpage=$page&amp;act=$act&amp;backpagego=$pagego\">$filedisplayname</a>
<br/>size($fsize); type($ftype);</p>";




}

	}
   }
}
#-------------------------------------------------------------------------------------
# End main loop.
# Generate page number links.
#----------------------------
if ($flag == 0){


$count = "$totalfiles";


if ($count > $max) 
{
echo  "<p class=\"breakforum\"><b>Page:</b> ";

if ( $count > $max ) 
{ 
$number = ceil($count / $max);
}

for ( $counter=1; $counter <= $number; $counter++ )
{
if ($counter != $page) echo "<b><a href=\"./files.php?ses=$ses&amp;rpp=$rpp&amp;so=$so&amp;act=$act&amp;stringy=$stringy&amp;page=$counter\">$counter</a></b> ";
else  echo "<b>$counter</b> ";
}

if ($count > $max) echo  "</p>";
}
}




////////////


$manypages = "$number";



if ($manypages == "") $manypages = "1";


if ($totalfiles == 1) $filenum = "file";
else $filenum = "files";





echo "


<form class=\"breakforum\" style=\"text-align: center;\" action=\"./files.php?ses=$ses\" method=\"get\">
<fieldset><select name=\"act\" class=\"textbox\" style=\"width: 80;\" title=\"file type\">";
if ($act != "") echo "<option value=\"\">no filter</option>";
if ($act != "image") echo "<option value=\"image\">images</option>";
if ($act != "video") echo "<option value=\"video\">videos</option>";
if ($act != "music") echo "<option value=\"music\">sounds</option>";
if ($act != "misc") echo "<option value=\"misc\">exotic files</option>";
echo "</select>
<br/>
<input type=\"submit\" class=\"buttstyle\" value=\"filter\"/>
<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
</fieldset>
</form>";




$getcwd = getcwd();

$path = "$getcwd/";

$arg=getDirectorySize($path);

$scounter = sizeFormat($arg['size']);
$fcounter = $arg['count'];


echo "<p class=\"breakforum\" style=\"text-align: center;\"><b>page $currentpage of $manypages<br/>$fcounter $act $filenum listed.<br/>total size: $scounter</b></p><hr/>";
echo "<p class=\"break\">
$hyfor <a href=\"./index.php?ses=$ses\">back</a><br/>";

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

