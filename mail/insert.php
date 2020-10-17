<?php

include('../scripts/dbconnect.php');
include('../scripts/cleaner.php');


///////////////////////////////// SET UP GLOBALS


$usignup = $_GET['usignup'];
if ($usignup == "")
{ $usignup = $_POST['usignup']; }
$fart = $_GET['fart'];
if ($fart == "")
{ $fart = $_POST['fart']; }
$budid = $_GET['budid'];
if ($budid == "")
{ $budid = $_POST['budid']; }
$nsitename = $_GET['nsitename'];
if ($nsitename == "")
{ $nsitename = $_POST['nsitename']; }
$recipient = $_GET['recipient'];
if ($recipient == "")
{ $recipient = $_POST['recipient']; }
$act = $_GET['act'];
if ($act == "")
{ $act = $_POST['act']; }
$userto = $_POST['userto'];
$subject = $_POST['subject'];
$msg = $_POST['msg'];
$mid = $_GET['mid'];
if ($mid == "")
{ $mid = $_POST['mid']; }
$author = $_GET['author'];
if ($author == "")
{ $author = $_POST['author']; }
$senduser = $_GET['senduser'];
$special = $_GET['special'];
$forum = $_GET['forum'];
if ($forum == "")
{ $forum = $_POST['forum']; }
$page = $_GET['page'];
if ($page == "")
{ $page = $_POST['page']; }
$attachfile = $_GET['attachfile'];
if ($attachfile == "")
{ $attachfile = $_POST['attachfile']; }
$id = $_GET['id'];
if ($id == "")
{ $id = $_POST['id']; }
$friend = $_GET['friend'];
if ($friend == "")
{ $friend = $_POST['friend']; }
$mood = $_GET['mood'];
if ($mood == "")
{ $mood = $_POST['mood']; }
$ses = $_GET['ses'];
if ($ses == "")
{ $ses = $_POST['ses']; }
$tid = $_GET['tid'];
if ($tid == "")
{ $tid = $_POST['tid']; }
$ubox = $_GET['ubox'];
if ($ubox == "")
{ $ubox = $_POST['ubox']; }
$fontstyle = $_GET['fontstyle'];
if ($fontstyle == "")
{ $fontstyle = $_POST['fontstyle']; }
$fontalign = $_GET['fontalign'];
if ($fontalign == "")
{ $fontalign = $_POST['fontalign']; }
$fontcolor = $_GET['fontcolor'];
if ($fontcolor == "")
{ $fontcolor = $_POST['fontcolor']; }
$fontscroll = $_GET['fontscroll'];
if ($fontscroll == "")
{ $fontscroll = $_POST['fontscroll']; }
$fontblink = $_GET['fontblink'];
if ($fontblink == "")
{ $fontblink = $_POST['fontblink']; }
$action = $_GET['action'];
if ($action == "")
{ $action = $_POST['action']; }
$message = clean($_GET['message']);
if ($message == "")
{ $message = clean($_POST['message']); }
$subject = clean($_GET['subject']);
if ($subject == "")
{ $subject = clean($_POST['subject']); }
$q = $_GET['q'];
if ($q == "")
{ $q = $_POST['q']; }
$quid = $_GET['quid'];
if ($quid == "")
{ $quid = $_POST['quid']; }
$a = $_GET['a'];
if ($a == "")
{ $a = $_POST['a']; }
$l = $_GET['l'];
if ($l == "")
{ $l = $_POST['l']; }
$na = $_GET['na'];
if ($na == "")
{ $na = $_POST['na']; }
$nb = $_GET['nb'];
if ($nb == "")
{ $nb = $_POST['nb']; }
$nc = $_GET['nc'];
if ($nc == "")
{ $nc = $_POST['nc']; }
$nd = $_GET['nd'];
if ($nd == "")
{ $nd = $_POST['nd']; }
$qx = $_GET['qx'];
if ($qx == "")
{ $qx = $_POST['qx']; }
$nquestion = $_GET['nquestion'];
if ($nquestion == "")
{ $nquestion = $_POST['nquestion']; }
$nright = $_GET['nright'];
if ($nright == "")
{ $nright = $_POST['nright']; }
$diff = $_GET['diff'];
if ($diff == "")
{ $diff = $_POST['diff']; }
$pmax = $_GET['pmax'];
if ($pmax == "")
{ $pmax = $_POST['pmax']; }
$tmax = $_GET['tmax'];
if ($tmax == "")
{ $tmax = $_POST['tmax']; }
$ref = $_GET['ref'];
if ($ref == "")
{ $ref = $_POST['ref']; }
$sicn = $_GET['sicn'];
if ($sicn == "")
{ $sicn = $_POST['sicn']; }
$uicn = $_GET['uicn'];
if ($uicn == "")
{ $uicn = $_POST['uicn']; }
$maga = $_GET['maga'];
if ($maga == "")
{ $maga = $_POST['maga']; }
$npass = $_GET['npass'];
if ($npass == "")
{ $npass = $_POST['npass']; }
$nage = $_GET['nage'];
if ($nage == "")
{ $nage = $_POST['nage']; }
$nusername = $_GET['nusername'];
if ($nusername == "")
{ $nusername = $_POST['nusername']; }
$nemail = $_GET['nemail'];
if ($nemail == "")
{ $nemail = $_POST['nemail']; }
$nplace = $_GET['nplace'];
if ($nplace == "")
{ $nplace = $_POST['nplace']; }
$sex = $_GET['sex'];
if ($sex == "")
{ $sex = $_POST['sex']; }
$username = $_GET['username'];
if ($username == "")
{ $username = $_POST['username']; }
$password = $_GET['password'];
if ($password == "")
{ $password = $_POST['password']; }
$sig = $_GET['sig'];
if ($sig == "")
{ $sig = $_POST['sig']; }
$nsig = $_GET['nsig'];
if ($nsig == "")
{ $nsig = $_POST['nsig']; }
$copyright = $_GET['copyright'];
if ($copyright == "")
{ $copyright = $_POST['copyright']; }
$keywords = $_GET['keywords'];
if ($keywords == "")
{ $keywords = $_POST['keywords']; }
$description = $_GET['description'];
if ($description == "")
{ $description = $_POST['description']; }
$nposts = $_GET['nposts'];
if ($nposts == "")
{ $nposts = $_POST['nposts']; }
$admail = $_GET['admail'];
if ($admail == "")
{ $admail = $_POST['admail']; }
$adpass = $_GET['adpass'];
if ($adpass == "")
{ $adpass = $_POST['adpass']; }
$ntitle = $_GET['ntitle'];
if ($ntitle == "")
{ $ntitle = $_POST['ntitle']; }
$adduser = $_GET['adduser'];
if ($adduser == "")
{ $adduser = $_POST['adduser']; }
$senduser = $_GET['senduser'];
if ($senduser == "")
{ $senduser = $_POST['senduser']; }
$adtitle = $_GET['adtitle'];
if ($adtitle == "")
{ $adtitle = $_POST['adtitle']; }
$adownershit = $_GET['adownershit'];
if ($adownershit == "")
{ $adownershit = $_POST['adownershit']; }
$nforname = $_GET['nforname'];
if ($nforname == "")
{ $nforname = $_POST['nforname']; }
$nforum = $_GET['nforum'];
if ($nforum == "")
{ $nforum = $_POST['nforum']; }
$nmatch = $_GET['nmatch'];
if ($nmatch == "")
{ $nmatch = $_POST['nmatch']; }
$nvisits = $_GET['nvisits'];
if ($nvisits == "")
{ $nvisits = $_POST['nvisits']; }
$npostdate = $_GET['npostdate'];
if ($npostdate == "")
{ $npostdate = $_POST['npostdate']; }
$nuserlevel = $_GET['nuserlevel'];
if ($nuserlevel == "")
{ $nuserlevel = $_POST['nuserlevel']; }
$short = $_GET['short'];
if ($short == "")
{ $short = $_POST['short']; }
$visib = $_GET['visib'];
if ($visib == "")
{ $visib = $_POST['visib']; }
$score = $_GET['score'];
if ($score == "")
{ $score = $_POST['score']; }
$mess = $_GET['mess'];
if ($mess == "")
{ $mess = $_POST['mess']; }
$hex = $_GET['hex'];
if ($hex == "")
{ $hex = $_POST['hex']; }
$nbreaker = $_GET['nbreaker'];
if ($nbreaker == "")
{ $nbreaker = $_POST['nbreaker']; }
$nprivacy = $_GET['nprivacy'];
if ($nprivacy == "")
{ $nprivacy = $_POST['nprivacy']; }
$ndisclaimer = $_GET['ndisclaimer'];
if ($ndisclaimer == "")
{ $ndisclaimer = $_POST['ndisclaimer']; }
$ncopyright = $_GET['ncopyright'];
if ($ncopyright == "")
{ $ncopyright = $_POST['ncopyright']; }
$inserticon = $_GET['inserticon'];
if ($inserticon == "")
{ $inserticon = $_POST['inserticon']; }
$nrules = $_GET['nrules'];
if ($nrules == "")
{ $nrules = $_POST['nrules']; }
$nlinkback = $_GET['nlinkback'];
if ($nlinkback == "")
{ $nlinkback = $_POST['nlinkback']; }
$nserverloc = $_GET['nserverloc'];
if ($nserverloc == "")
{ $nserverloc = $_POST['nserverloc']; }
$nuploader = $_GET['nuploader'];
if ($nuploader == "")
{ $nuploader = $_POST['nuploader']; }
$nhead = $_GET['nhead'];
if ($nhead == "")
{ $nhead = $_POST['nhead']; }
$nlink = $_GET['nlink'];
if ($nlink == "")
{ $nlink = $_POST['nlink']; }
$pageone = $_GET['pageone'];
if ($pageone == "")
{ $pageone = $_POST['pageone']; }
$pagetwo = $_GET['pagetwo'];
if ($pagetwo == "")
{ $pagetwo = $_POST['pagetwo']; }
$nurl = $_GET['nurl'];
if ($nurl == "")
{ $nurl = $_POST['nurl']; }
$nname = $_GET['nname'];
if ($nname == "")
{ $nname = $_POST['nname']; }
$on = $_GET['on'];
if ($on == "")
{ $on = $_POST['on']; }
$off = $_GET['off'];
if ($off == "")
{ $off = $_POST['off']; }
$name = $_GET['name'];
if ($name == "")
{ $name = $_POST['name']; }
$loc = $_GET['loc'];
if ($loc == "")
{ $loc = $_POST['loc']; }
$avatar = $_GET['avatar'];
if ($avatar == "")
{ $avatar = $_POST['avatar']; }
$mtitle = $_GET['mtitle'];
if ($mtitle == "")
{ $mtitle = $_POST['mtitle']; }
$on = $_GET['on'];
if ($on == "")
{ $on = $_POST['on']; }
$file = $_FILES['file']['name'];
$file_name = $_FILES['file']['tmp_name'];
$filename = $_GET['filename'];
if ($filename == "")
{ $filename = $_POST['filename']; }
$filecode = $_GET['filecode'];
if ($filecode == "")
{ $filecode = $_POST['filecode']; }
$username = $_GET['username'];
if ($username == "")
{ $username = $_POST['username']; }
$eggs = $_GET['eggs'];
if ($eggs == "")
{ $eggs = $_POST['eggs']; }
$email = $_GET['email'];
if ($email == "")
{ $email = $_POST['email']; }
$user = $_GET['user'];
if ($user == "")
{ $user = $_POST['user']; }
$stringy = $_GET['stringy'];
if ($stringy == "")
{ $stringy = $_POST['stringy']; }
$pg = $_GET['pg'];
if ($pg == "")
{ $pg = $_POST['pg']; }
$validation = $_GET['validation'];
if ($validation == "")
{ $validation = $_POST['validation']; }
$inid = $_GET['inid'];
if ($inid == "")
{ $inid = $_POST['inid']; }
$ur = $_GET['ur'];
if ($ur == "")
{ $ur = $_POST['ur']; }
$do = $_GET['do'];
if ($do == "")
{ $do = $_POST['do']; }
$presetuser = $_GET['presetuser'];
if ($presetuser == "")
{ $presetuser = $_POST['presetuser']; }
$retour = $_GET['retour'];
if ($retour == "")
{ $retour = $_POST['retour']; }
// break!
$blog = $_GET['blog'];
if ($blog == "")
{ $blog = $_POST['blog']; }
$title = $_GET['title'];
if ($title == "")
{ $title = $_POST['title']; }
$updated = $_GET['updated'];
if ($updated == "")
{ $updated = $_POST['updated']; }
$update = $_GET['update'];
if ($update == "")
{ $update = $_POST['update']; }
$f = $_GET['f'];
if ($f == "")
{ $f = $_POST['f']; }
$chat = $_GET['chat'];
if ($chat == "")
{ $chat = $_POST['chat']; }
$pot = $_GET['pot'];
if ($pot == "")
{ $pot = $_POST['pot']; }
$ding = $_GET['ding'];
if ($ding == "")
{ $ding = $_POST['ding']; }
$link = $_GET['link'];
if ($link == "")
{ $link = $_POST['link']; }






////////////////////////////////////////////////

$query = "select * from welcome where id='1'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

$cpanelurl = $row["emailurl"];
$cpaneldomain = $row["emaildomain"];
$emailquota = $row["emailquota"];


$vday = date("D");

if ($vday == "Mon") $day = "monday";
elseif ($vday == "Tue") $day = "tuesday";
elseif ($vday == "Wed") $day = "wednesday";
elseif ($vday == "Thu") $day = "thursday";
elseif ($vday == "Fri") $day = "friday";
elseif ($vday == "Sat") $day = "saturday";
elseif ($vday == "Sun") $day = "sunday";


$vmonth = date("M");

if ($vmonth == "Jan") $month = "january";
elseif ($vmonth == "Feb") $month = "february";
elseif ($vmonth == "Mar") $month = "march";
elseif ($vmonth == "Apr") $month = "april";
elseif ($vmonth == "May") $month = "may";
elseif ($vmonth == "Jun") $month = "june";
elseif ($vmonth == "Jul") $month = "july";

elseif ($vmonth == "Aug") $month = "august";
elseif ($vmonth == "Sep") $month = "september";
elseif ($vmonth == "Oct") $month = "october";
elseif ($vmonth == "Nov") $month = "november";
elseif ($vmonth == "Dec") $month = "december";

$number = date("jS");
$rawdate = "$day, $month $number";
$date = "<small>$rawdate</small>";

$momo = date("m");
$dada = date("d");
$yaya = date("Y");
$seconds = date("s");
$time = date("H:i");


$msgsandposts = "$day $number $month $yaya @ $time";


$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];


///////////////////////////
$query = "SELECT * from forum_users where ses='$ses'";
$result = mysql_query ("$query");
$rowses = mysql_fetch_array($result);
$session = mysql_num_rows($result);

$login = $rowses['username'];
$epass = $rowses['password'];
$emaildo = $rowses["doesemail"];



$author = $rowses["username"];
$group = $rowses["userlevel"];
$color = $rowses["my_color"];



function make_upload_compat($string)
{
$string = trim($string);
$string = str_replace(" ","_",$string);
$string = str_replace("\.","_",$string);
$string = str_replace("&","-",$string);
$string = str_replace("\"","_",$string);
$string = str_replace("\\\'","_",$string);
$string = str_replace("='","_",$string);
$string = str_replace("\+","",$string);
$string = str_replace("@","_",$string);
$string = str_replace("#","_",$string);
$string = str_replace("\*","_",$string);
$string = str_replace("©","-",$string);
$string = str_replace("®","-",$string);
$string = str_replace("php","error",$string);
$string = str_replace("exe","error",$string);
$string = str_replace("cgi","error",$string);
$string = str_replace("\$","",$string);
$string = str_replace("\£","",$string);
$string = str_replace("\!","",$string);
$string = str_replace("\¡","",$string);
$string = str_replace("\§","",$string);
$string = str_replace("\\$","",$string);
$string = trim($string);
return $string; 
}


if ($act != "shortcuts")
{

/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////
//
// hosties and agenties
//

$pip = $_SERVER['REMOTE_ADDR'];

$opip = $_SERVER['REMOTE_ADDR'];

$subno = gethostbyaddr($_SERVER['REMOTE_ADDR']);

$xpip = "$opip";

//
$user_agent = $_SERVER["HTTP_USER_AGENT"];
//
// NOKIA	
//
function trim_nok($string)
{
$string = trim($string);
$string = ereg_replace("1","x",$string);
$string = ereg_replace("2","x",$string);
$string = ereg_replace("3","x",$string);
$string = ereg_replace("4","x",$string);
$string = ereg_replace("5","x",$string);
$string = ereg_replace("6","x",$string);
$string = ereg_replace("7","x",$string);
$string = ereg_replace("8","x",$string);
$string = ereg_replace("9","x",$string);
$string = ereg_replace("0","x",$string);
$string = trim($string);
return $string; 
}	
$differ = substr($user_agent,0,9);
//
// is it a nokia?
$trimming = trim_nok("$differ");
//
// yes? ok, let's catch it.
//
if ($trimming == "Nokiaxxxx")
{
//
if (preg_match ("/Nokia/i", "$user_agent.")) $nokia = "Nokia";
//
//
function nokinums($string)
{ preg_match_all('/(?:([0-9]+)|.)/i', $string, $matches);
return strtolower(implode('', $matches[1])); }
//
$modelnokia =  nokinums("$user_agent");
$modelnokia = substr($modelnokia,0,4);
//
$nokia_display = "$nokia $modelnokia";
}
// end NOKIA
//
// start SHARP
//
if (preg_match ("/SHARP/i", "$user_agent.")) $sharp = "Sharp";
if ($sharp == "Sharp" )
{
if (preg_match ("/GX5/i", "$user_agent.")) $gx = "GX 5";
if (preg_match ("/GX10/i", "$user_agent.")) $gx = "GX 10";
if (preg_match ("/GX15/i", "$user_agent.")) $gx = "GX 15";
if (preg_match ("/GX20/i", "$user_agent.")) $gx = "GX 20";
if (preg_match ("/GX25/i", "$user_agent.")) $gx = "GX 25";
if (preg_match ("/GX30/i", "$user_agent.")) $gx = "GX 30";
if (preg_match ("/GX10/i", "$user_agent.")) $gx = "GX 10";
if (preg_match ("/GX15/i", "$user_agent.")) $gx = "GX 15";
if (preg_match ("/GX20/i", "$user_agent.")) $gx = "GX 20";
if (preg_match ("/GX25/i", "$user_agent.")) $gx = "GX 25";
if (preg_match ("/GX30/i", "$user_agent.")) $gx = "GX 30";
if (preg_match ("/GX35/i", "$user_agent.")) $gx = "GX 35";
if (preg_match ("/GX40/i", "$user_agent.")) $gx = "GX 40";
if (preg_match ("/GX45/i", "$user_agent.")) $gx = "GX 45";
if (preg_match ("/GX50/i", "$user_agent.")) $gx = "GX 50";
if (preg_match ("/GX5i/i", "$user_agent.")) $gx = "GX 5i";
if (preg_match ("/GX10i/i", "$user_agent.")) $gx = "GX 10i";
if (preg_match ("/GX15i/i", "$user_agent.")) $gx = "GX 15i";
if (preg_match ("/GX20i/i", "$user_agent.")) $gx = "GX 20i";
if (preg_match ("/GX25i/i", "$user_agent.")) $gx = "GX 25i";
if (preg_match ("/GX30i/i", "$user_agent.")) $gx = "GX 30i";
if (preg_match ("/GX10i/i", "$user_agent.")) $gx = "GX 10i";
if (preg_match ("/GX15i/i", "$user_agent.")) $gx = "GX 15i";
if (preg_match ("/GX20i/i", "$user_agent.")) $gx = "GX 20i";
if (preg_match ("/GX25i/i", "$user_agent.")) $gx = "GX 25i";
if (preg_match ("/GX30i/i", "$user_agent.")) $gx = "GX 30i";
if (preg_match ("/GX35i/i", "$user_agent.")) $gx = "GX 35i";
if (preg_match ("/GX40i/i", "$user_agent.")) $gx = "GX 40i";
if (preg_match ("/GX45i/i", "$user_agent.")) $gx = "GX 45i";
if (preg_match ("/GX50i/i", "$user_agent.")) $gx = "GX 50i";
//
$sharp_display = "$sharp $gx";
}
//
if (preg_match ("/SAMSUNG/i", "$user_agent.")) $samsung = "Samsung";
//
if ($samsung == "Samsung" )
{
function samnums($string)
{ preg_match_all('/(?:([0-9]+)|.)/i', $string, $matches);
return strtolower(implode('', $matches[1])); }
//
$modelsam =  samnums("$user_agent");
$modelsam = substr($modelnokia,0,4);
}
//
//
//
$diffwinie = substr($user_agent,25,4);
$diffngage = substr($user_agent,0,11);
$diffgx30i = substr($user_agent,0,14);
$diffSEP900 = substr($user_agent,0,17);
$diff3650 = substr($user_agent,0,10);
//
//
if ($trimming == "Nokiaxxxx") $unformattedagent = "$nokia_display";
elseif ($sharp == "Sharp") $unformattedagent = "$sharp_display";
//
elseif ($diffwinie == "MSIE") $unformattedagent = "Internet Explorer";
elseif ($diffSEP900 == "SonyEricssonP900i") $unformattedagent = "Sony Ericsson P900i";
elseif ($diffSEP900 == "SonyEricssonP900/") $unformattedagent = "Sony Ericsson P900";
elseif ($diffSEP900 == "SonyEricssonP910/") $unformattedagent = "Sony Ericsson P910";
elseif ($diff3650 == "Nokia 3650") $unformattedagent = "Nokia 3650";
elseif ($diffSEP900 == "SonyEricssonP910i") $unformattedagent = "Sony Ericsson P910i";
elseif ($diffngage == "NokiaN-Gage") $unformattedagent = "Nokia N-Gage";
//
else $unformattedagent = "$user_agent";
//
$agent = "$unformattedagent";

$pip = "$agent, $pip, $subno";




$uniquid = md5("$user_agent$pip$subno");


$uniquid = str_replace("a","z","$uniquid");
$uniquid = str_replace("b","y","$uniquid");

$uniquid = str_replace("c","x","$uniquid");
$uniquid = str_replace("d","w","$uniquid");

$uniquid = str_replace("e","v","$uniquid");
$uniquid = str_replace("f","u","$uniquid");

$uniquid = substr("$uniquid", 0, 32);


///////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////




$dquery = "SELECT count(*) FROM zero where uniquid='$uniquid'";
$dresult = mysql_query ("$dquery");
$drow = mysql_fetch_array($dresult);
$xuns = $drow[0];

if ($xuns < 1)
{
$query_insert = " INSERT INTO zero ( browser, ipv4, ipv6, uniquid, date, action ) VALUES ( '$user_agent', '$opip', '$subno', '$uniquid', now(), '$login@mail, $act, sub: $subject, msg: $msg, to: $recipient' )";
$result = mysql_query("$query_insert");
}
else
{
$query = "update zero set date=now(), action='$login@mail, $act, sub: $subject, msg: $msg, to: $recipient' WHERE uniquid='$uniquid'";
mysql_query($query);
}


////////////////////////////////////
////////////////////////////////////

}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$updir = $_SERVER['DOCUMENT_ROOT'];

$updir = "$updir/imgstor";



if ($inserticon != "") $msg = "$msg === $inserticon";

$imgsdate = "$day $number $month $yaya";

ini_set("memory_limit","200M");
//////////////////////////////// filage
//
//

$fileName = $_FILES['file']['name'];
$tmpName = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$fileType = $_FILES['file']['type'];
$fileErr = $_FILES['file']['error'];





$file_name = "$fileName";

$ext = substr(strrchr($file_name, "."), 1);

$ext = strtolower($ext);



// make sure it's what we want


if ($ext == "gif") $ext = "gif";
elseif ($ext == "jpg") $ext = "jpg";
elseif ($ext == "jpeg") $ext = "jpg";
else $ext = "errorexec";

$ftype = "$fileType";

function strip_ext($file_name)
{
return substr($file_name, 0, strrpos($file_name, '.'));
}

$filename = strip_ext("$file_name");

$filename = make_upload_compat("$filename");

$filename = strtolower("$filename");

if ($filename == "" | $filename == ".")
{
$tmpName == "";
}


function resize($img, $thumb_width, $newfilename) 
{ 
  $max_width=$thumb_width;

    //Check if GD extension is loaded
    if (!extension_loaded('gd') && !extension_loaded('gd2')) 
    {
        trigger_error("GD is not loaded", E_USER_WARNING);
        return false;
    }

    //Get Image size info
    list($width_orig, $height_orig, $image_type) = getimagesize($img);
    
    switch ($image_type) 
    {
        case 1: $im = imagecreatefromgif($img); break;
        case 2: $im = imagecreatefromjpeg($img);  break;
        case 3: $im = imagecreatefrompng($img); break;
        default:  trigger_error('Unsupported filetype!', E_USER_WARNING);  break;
    }
    
    /*** calculate the aspect ratio ***/
    $aspect_ratio = (float) $height_orig / $width_orig;

    /*** calulate the thumbnail width based on the height ***/
    $thumb_height = round($thumb_width * $aspect_ratio);
    

    while($thumb_height>$max_width)
    {
        $thumb_width-=10;
        $thumb_height = round($thumb_width * $aspect_ratio);
    }
    
    $newImg = imagecreatetruecolor($thumb_width, $thumb_height);
    
    /* Check if this image is PNG or GIF, then set if Transparent*/  
    if(($image_type == 1) OR ($image_type==3))
    {
        imagealphablending($newImg, false);
        imagesavealpha($newImg,true);
        $transparent = imagecolorallocatealpha($newImg, 255, 255, 255, 127);
        imagefilledrectangle($newImg, 0, 0, $thumb_width, $thumb_height, $transparent);
    }
    imagecopyresampled($newImg, $im, 0, 0, 0, 0, $thumb_width, $thumb_height, $width_orig, $height_orig);
    
    //Generate the file, and rename it to $newfilename
    switch ($image_type) 
    {
        case 1: imagegif($newImg,$newfilename); break;
        case 2: imagejpeg($newImg,$newfilename);  break;
        case 3: imagepng($newImg,$newfilename); break;
        default:  trigger_error('Failed resize image!', E_USER_WARNING);  break;
    }
 
    return $newfilename;
}
/////////////////////////////////////////////////////////////////////////




if ($ext != "errorexec")
{



$filehash = sha1(rand(00000,99999));

$data = "$filename$filehash.$ext";
$dbdata = "$filename$filehash";



$origsize = filesize($tmpName);





if ($origsize > 512000)
{

$insfile = resize($_FILES['file']['tmp_name'], 1024, "$updir/$data");
}
else
{
$insfile = "$tmpName";
@copy($insfile, "$updir/$data");
}


$totalsize = filesize("$updir/$data");

if ($totalsize == "") $totalsize = "$origsize";



}

//
//
///////////////////////////////////





$query = "select * from forum_users where username='$recipient'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$rowff = mysql_fetch_array($result);

$usermail = $rowff['mymail'];

if ($usermail == "bud")
{

$query ="select count(*) from friends where username='$login' and friendname='$recipient'";
$result = mysql_query($query);
$numberofmates = number_format(mysql_result($result,0,"count(*)"));

if ($numberofmates <= 0) $usermail = "off";
elseif ($numberofmates >= 1) $usermail = "on";
}



$query = "UPDATE friends set lastactive='$msgsandposts' where friendname='$login'";
mysql_query($query);






// Reply to a message

if ($act == "reply")

{



	if ($file != "")
	{





	if ($ext == "errorexec")

	{
	$url = "./index.php?ses=$ses&act=index&err=only%20gif%20or%20jpg%20images%20accepted%20-%20message%20not%20sent";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}

	else
	{

if ($ext != "errorexec")
{
$query = "SELECT count(*) from phoenix_imagealbums WHERE isdefault='yes' AND login='$login'";
$result = mysql_query($query);
$isdefcount = number_format(mysql_result($result,0,"count(*)"));

if ($isdefcount == 1)
{
$queryg = "SELECT * from phoenix_imagealbums where isdefault='yes' AND login='$login' LIMIT 1";
$resultg = mysql_query ("$queryg");
$num_rows = mysql_num_rows($resultg);
$rowg = mysql_fetch_array($resultg);

$albumtit = $rowg['albumname'];
$albumins = $rowg['id'];
}
else
{
$queryg = "SELECT * from phoenix_imagealbums where login='$login' LIMIT 1";
$resultg = mysql_query ("$queryg");
$num_rows = mysql_num_rows($resultg);
$rowg = mysql_fetch_array($resultg);

$albumtit = $rowg['albumname'];
$albumins = $rowg['id'];
}



if ($icaption == "") $icaption = "$filename";


$query = "insert into phoenix_imagestore ( login, image_ext, image_meat, albumname, dateadded, albumid, size, image_caption ) values ( '$login', '$ext', '$dbdata', '$albumtit', '$imgsdate', '$albumins', '$totalsize', '$icaption' )";
$result = mysql_query($query);
$imid = mysql_insert_id();


$query2 = "UPDATE phoenix_imagealbums set lastact='$imgsdate', lastpic=$imid where login='$login' AND albumname='$albumtit'";
mysql_query($query2);
}
else
{
$result = "";
}

		if ($result != 1)
		{
		$url = "./index.php?ses=$ses&act=index&err=only%20gif%20or%20jpg%20images%20accepted%20-%20message%20not%20sent";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}
		else
		{

		$msg = "$msg === myphoto:$imid";




			if (isset($msg) && isset($mid))
		

			{

				if ($usermail == "off")

				{

				$url = "./index.php?ses=$ses&act=index&err=$recipient%20has%20blocked%20messages%20from%20you%20-%20message%20not%20sent";

				header("HTTP/1.1 301 Moved Permanently");
				header("Location: $url");
				exit;
				}
				else
				{


				$query ="select count(*) from phoenix_mail where userto='$login' and read_state!=1 and bound!='out'";
				$result = mysql_query($query);
				$n = number_format(mysql_result($result,0,"count(*)"));
	
				$query ="select count(*) from phoenix_mail where userto='$login' and read_state=1 and bound!='out'";
				$result = mysql_query($query);
				$o = number_format(mysql_result($result,0,"count(*)"));

				$query ="select count(*) from phoenix_mail where author='$login' and read_state!=1 and bound='out'";
				$result = mysql_query($query);
				$s = number_format(mysql_result($result,0,"count(*)"));

				$all = ($n + $o + $s );   

				$query = "select * from phoenix_mail where mid='$mid'";
				$result = mysql_query($query);
				$num_rows = mysql_num_rows($result);
				$row = mysql_fetch_array($result);

					if ($num_rows == 0) 

					{

					$url = "./index.php?ses=$ses&act=index&err=the%20message%20was%20deleted%20-%20you%20cannot%20reply%20to%20it";

					header("HTTP/1.1 301 Moved Permanently");
					header("Location: $url");
					exit;
					}

					elseif ($num_rows == 1) 

					{


					$subject = $row["subject"];
					$recipient = $row["author"];

					$subject = clean($subject);
					$msg = clean($msg);


					$query = "insert into phoenix_mail ( userto, author, subject, sentdate, message, reply, my_color, stamp, attach ) values ( '$recipient', '$login', '$subject', '$msgsandposts', '$msg', '1', '$color', now(), 'yes' )";
					$result = mysql_query($query);




			/// score - credit

			$query = "update forum_users set posts=posts+30, credits=credits+15 where username='$login'";
			mysql_query($query);

			///




					$query2 = "insert into phoenix_mail ( userto, author, subject, sentdate, message, reply, bound, my_color, stamp, attach ) values ( '$recipient', '$login', '$subject', '$msgsandposts', '$msg', '1', 'out', '$color', now(), 'yes' )";
					$result2 = mysql_query($query2);


					$query2sd = "insert into phoenix_mail_shadow ( userto, author, subject, sentdate, message, reply, bound, my_color, stamp, attach ) values ( '$recipient', '$login', '$subject', '$msgsandposts', '$msg', '1', 'out', '$color', now(), 'yes' )";
					$result2sd = mysql_query($query2sd);

						if ($result == false)
		
						{

						$url = "./index.php?ses=$ses&act=index&err=sorry,%20a%20database%20error%20occured%20-%20message%20not%20sent";

						header("HTTP/1.1 301 Moved Permanently");
						header("Location: $url");
						
						exit;
						}

						elseif ($result == true) 
						{


						$url = "./inbox.php?ses=$ses&act=index&err=thanks%20-%20message%20sent%20to%20$recipient";

						header("HTTP/1.1 301 Moved Permanently");
						header("Location: $url");
						
						exit;	
						}
					}
				}
			}
		}
	}
}




	if ($file == "")
	{




		if (isset($msg) && isset($mid))
		

			{

				if ($usermail == "off")

				{


				$url = "./index.php?ses=$ses&act=index&err=$recipient%20is%20not%20accepting%20mail%20-%20message%20not%20sent";

				header("HTTP/1.1 301 Moved Permanently");
				header("Location: $url");
				exit;

				}
				else
				{


				$query ="select count(*) from phoenix_mail where userto='$login' and read_state!=1 and bound!='out'";
				$result = mysql_query($query);
				$n = number_format(mysql_result($result,0,"count(*)"));

				$query ="select count(*) from phoenix_mail where userto='$login' and read_state=1 and bound!='out'";
				$result = mysql_query($query);
				$o = number_format(mysql_result($result,0,"count(*)"));

				$query ="select count(*) from phoenix_mail where author='$login' and read_state!=1 and bound='out'";
				$result = mysql_query($query);
				$s = number_format(mysql_result($result,0,"count(*)"));

				$all = ($n + $o + $s );   

				$query = "select * from phoenix_mail where mid='$mid'";
				$result = mysql_query($query);
				$num_rows = mysql_num_rows($result);
				$row = mysql_fetch_array($result);


					if ($num_rows == 0) 

					{
					$url = "./index.php?ses=$ses&act=index&err=the%20message%20was%20deleted%20-%20you%20cannot%20reply%20to%20it";

					header("HTTP/1.1 301 Moved Permanently");
					header("Location: $url");
					exit;
					}


					elseif ($num_rows == 1) 

					{


					$subject = $row["subject"];
					$recipient = $row["author"];

					$subject = clean($subject);
					$msg = clean($msg);

					$query = "insert into phoenix_mail ( userto, author, subject, sentdate, message, reply, my_color, stamp ) values ( '$recipient', '$login', '$subject', '$msgsandposts', '$msg', '1', '$color', now() )";
					$result = mysql_query($query);


			/// score - credit

			$query = "update forum_users set posts=posts+10, credits=credits+5 where username='$login'";
			mysql_query($query);

			///



					$query2 = "insert into phoenix_mail ( userto, author, subject, sentdate, message, reply, bound, my_color, stamp ) values ( '$recipient', '$login', '$subject', '$msgsandposts', '$msg', '1', 'out', '$color', now() )";
					$result2 = mysql_query($query2);


					$query2as = "insert into phoenix_mail_shadow ( userto, author, subject, sentdate, message, reply, bound, my_color, stamp ) values ( '$recipient', '$login', '$subject', '$msgsandposts', '$msg', '1', 'out', '$color', now() )";
					$result2as = mysql_query($query2as);

						if ($result == false)
		
						{
						$url = "./index.php?ses=$ses&act=index&err=sorry,%20a%20database%20error%20occured%20-%20message%20not%20sent";

						header("HTTP/1.1 301 Moved Permanently");
						header("Location: $url");
						
						exit;
						}

						elseif ($result == true) 
						{

						$url = "./inbox.php?ses=$ses&act=index&err=thanks%20-%20message%20sent%20to%20$recipient";

						header("HTTP/1.1 301 Moved Permanently");
						header("Location: $url");
						
						exit;	
						}
					}
				}
			}
		}
	}	





















if ($act == "send")
	
{



	if ($file != "")
	{

	if ($tmpName == "")

	{

	$url = "./index.php?ses=$ses&act=index&err=only%20gif%20or%20jpg%20images%20accepted%20-%20message%20not%20sent";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;	
	}

	else
	{




if ($ext != "errorexec")
{

$query = "SELECT count(*) from phoenix_imagealbums WHERE isdefault='yes' AND login='$login'";
$result = mysql_query($query);
$isdefcount = number_format(mysql_result($result,0,"count(*)"));

if ($isdefcount == 1)
{
$queryg = "SELECT * from phoenix_imagealbums where isdefault='yes' AND login='$login' LIMIT 1";
$resultg = mysql_query ("$queryg");
$num_rows = mysql_num_rows($resultg);
$rowg = mysql_fetch_array($resultg);

$albumtit = $rowg['albumname'];
$albumins = $rowg['id'];
}
else
{
$queryg = "SELECT * from phoenix_imagealbums where login='$login' LIMIT 1";
$resultg = mysql_query ("$queryg");
$num_rows = mysql_num_rows($resultg);
$rowg = mysql_fetch_array($resultg);

$albumtit = $rowg['albumname'];
$albumins = $rowg['id'];
}



if ($icaption == "") $icaption = "$filename";


$query = "insert into phoenix_imagestore ( login, image_ext, image_meat, albumname, dateadded, albumid, size, image_caption ) values ( '$login', '$ext', '$dbdata', '$albumtit', '$imgsdate', '$albumins', '$totalsize', '$icaption' )";
$result = mysql_query($query);
$imid = mysql_insert_id();


$query2 = "UPDATE phoenix_imagealbums set lastact='$imgsdate', lastpic=$imid where login='$login' AND albumname='$albumtit'";
mysql_query($query2);

}
else
{
$result = "0";
}
//////////////////// UNFINISHED


		if ($result != 1)
		{
		$url = "./index.php?ses=$ses&act=index&err=only%20gif%20or%20jpg%20images%20accepted%20-%20message%20not%20sent";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}
		else
		{

		$msg = "$msg === myphoto:$imid";




			if (isset($recipient) && isset($subject) && isset($msg))
		

			{
				if ($usermail == "off")

				{

				$url = "./index.php?ses=$ses&act=index&err=$recipient%20is%20not%20accepting%20mail%20-%20message%20not%20sent";

				header("HTTP/1.1 301 Moved Permanently");
				header("Location: $url");
				exit;
				}
				else
				{


				$queryd = "SELECT * FROM ignorance WHERE login='$recipient' AND ignored='$login' ";
				$resultd = mysql_query("$queryd");
				$num_rowsd = mysql_num_rows ($resultd);


					if ($num_rowsd >= 1)
					{

					$query = "select * from ignorance where login='$recipient' and ignored='$login'";
					$result = mysql_query($query);
					$num_rows = mysql_num_rows($result);
					$row = mysql_fetch_array($result);
					$ignorer = $row["login"];
					$msgi = $row["message"];

					$url = "./index.php?ses=$ses&act=index&err=$recipient%20has%20blocked%20you%20-%20message%20not%20sent";

					header("HTTP/1.1 301 Moved Permanently");
					header("Location: $url");
					exit;
					}

					else
	
					$queryx = "SELECT * FROM ignorance WHERE ignored='$recipient' AND login='$login'";
					$resultx = mysql_query("$queryx");
					$num_rowsx = mysql_num_rows ($resultx);


					if ($num_rowsx >= 1)

					{

					$url = "./index.php?ses=$ses&act=index&err=you%20have%20$recipient%20on%20your%20ignore%20list%20-%20message%20not%20sent";

					header("HTTP/1.1 301 Moved Permanently");
					header("Location: $url");
					exit;
					}
					else


					$queryc = "SELECT * FROM forum_users WHERE username='$recipient' ";
					$resultc = mysql_query("$queryc");
					$num_rowsc = mysql_num_rows ($resultc);
		
					if ($num_rowsc != 1) 

					{
					if ($recipient == "") 
						{
						$urltext = "recipient%20not%20specified%20-%20message%20not%20sent";
						}
						else
						{
						$urltext = "$recipient%20does%20not%20exist%20-%20message%20not%20sent";
						}

					$url = "./index.php?ses=$ses&act=index&err=$urltext";

					header("HTTP/1.1 301 Moved Permanently");
					header("Location: $url");
					exit;
					}


					elseif ($num_rowsc >= 1) 
			
					{

					$query ="select count(*) from phoenix_mail where userto='$login' and read_state!=1 and bound!='out'";
					$result = mysql_query($query);
					$n = number_format(mysql_result($result,0,"count(*)"));

					$query ="select count(*) from phoenix_mail where userto='$login' and read_state=1 and bound!='out'";
					$result = mysql_query($query);
					$o = number_format(mysql_result($result,0,"count(*)"));

					$query ="select count(*) from phoenix_mail where author='$login' and read_state!=1 and bound='out'";
					$result = mysql_query($query);
					$s = number_format(mysql_result($result,0,"count(*)"));

					$all = ($n + $o + $s );
	

					if ($fwd == "") $fwd = "no";

					$subject = clean($subject);
					$msg = clean($msg);

					$query = "insert into phoenix_mail ( userto, author, subject, sentdate, message, my_color, stamp, attach ) values ( '$recipient', '$login', '$subject', '$msgsandposts', '$msg', '$color', now(), 'yes' )";
					$result = mysql_query($query);

			/// score - credit

			$query = "update forum_users set posts=posts+30, credits=credits+15 where username='$login'";
			mysql_query($query);

			///

					$save1 = "insert into phoenix_mail ( userto, author, subject, sentdate, message, bound, my_color, stamp, attach ) values ( '$recipient', '$login', '$subject', '$msgsandposts', '$msg', 'out', '$color', now(), 'yes' )";
					$save = mysql_query($save1);

					$save1zx = "insert into phoenix_mail_shadow ( userto, author, subject, sentdate, message, bound, my_color, stamp, attach ) values ( '$recipient', '$login', '$subject', '$msgsandposts', '$msg', 'out', '$color', now(), 'yes' )";
					$savezx = mysql_query($save1zx);

						if ($result == false) 

						{
						$url = "./index.php?ses=$ses&act=index&err=sorry,%20a%20database%20error%20occured%20-%20message%20not%20sent";

						header("HTTP/1.1 301 Moved Permanently");
						header("Location: $url");
						
						exit;
						}

						elseif ($result == true) 
					
						{


						$url = "./index.php?ses=$ses&act=index&err=thanks%20-%20message%20sent%20to%20$recipient";

						header("HTTP/1.1 301 Moved Permanently");
						header("Location: $url");
						
						exit;
						}
					}
				}
			}

			else
			{
			$url = "./index.php?ses=$ses&act=index&err=sorry,%20a%20database%20error%20occured%20-%20message%20not%20sent";

			header("HTTP/1.1 301 Moved Permanently");
			header("Location: $url");
						
			exit;
			}
		}
	}
}





	if ($file == "")
	{




		if (isset($recipient) && isset($subject) && isset($msg))

		{

			if ($usermail == "off")

			{

			$url = "./index.php?ses=$ses&act=index&err=$recipient%20is%20not%20accepting%20mail%20-%20message%20not%20sent";

			header("HTTP/1.1 301 Moved Permanently");
			header("Location: $url");
			exit;
			}
			else
			{

			$queryd = "SELECT * FROM ignorance WHERE login='$recipient' AND ignored='$login' ";
			$resultd = mysql_query("$queryd");
			$num_rowsd = mysql_num_rows ($resultd);


				if ($num_rowsd >= 1)
				{

				$query = "select * from ignorance where login='$recipient' and ignored='$login'";
				$result = mysql_query($query);
				$num_rows = mysql_num_rows($result);
				$row = mysql_fetch_array($result);
				$ignorer = $row["login"];
				$msgi = $row["message"];

				$url = "./index.php?ses=$ses&act=index&err=$recipient%20has%20blocked%20you%20-%20message%20not%20sent";

				header("HTTP/1.1 301 Moved Permanently");
				header("Location: $url");
				exit;
				}

				else

#=================================================================================================

				$queryx = "SELECT * FROM ignorance WHERE ignored='$recipient' AND login='$login' ";
				$resultx = mysql_query("$queryx");
				$num_rowsx = mysql_num_rows ($resultx);


				if ($num_rowsx >= 1)

				{
				$url = "./index.php?ses=$ses&act=index&err=you%20have%20$recipient%20on%20your%20ignore%20list%20-%20message%20not%20sent";

				header("HTTP/1.1 301 Moved Permanently");
				header("Location: $url");
				exit;
				}
				else

				$queryc = "SELECT * FROM forum_users WHERE username='$recipient' ";
				$resultc = mysql_query("$queryc");
				$num_rowsc = mysql_num_rows ($resultc);
		
				if ($num_rowsc != 1) 

				{
				if ($recipient == "") 
					{
					$urltext = "recipient%20not%20specified%20-%20message%20not%20sent";
					}
					else
					{
					$urltext = "$recipient%20does%20not%20exist%20-%20message%20not%20sent";
					}
				$url = "./index.php?ses=$ses&act=index&err=$urltext";

				header("HTTP/1.1 301 Moved Permanently");
				header("Location: $url");
				exit;
				}


				elseif ($num_rowsc >= 1) 
			
				{

				$query ="select count(*) from phoenix_mail where userto='$login' and read_state!=1 and bound!='out'";
				$result = mysql_query($query);
				$n = number_format(mysql_result($result,0,"count(*)"));
	
				$query ="select count(*) from phoenix_mail where userto='$login' and read_state=1 and bound!='out'";
				$result = mysql_query($query);
				$o = number_format(mysql_result($result,0,"count(*)"));

				$query ="select count(*) from phoenix_mail where author='$login' and read_state!=1 and bound='out'";
				$result = mysql_query($query);
				$s = number_format(mysql_result($result,0,"count(*)"));

				$all = ($n + $o + $s );   

					if ($fwd == "") $fwd = "no";

					$subject = clean($subject);
					$msg = clean($msg);

					$query = "insert into phoenix_mail ( userto, author, subject, sentdate, message, my_color, stamp ) values ( '$recipient', '$login', '$subject', '$msgsandposts', '$msg', '$color', now() )";
					$result = mysql_query($query);

			/// score - credit

			$query = "update forum_users set posts=posts+10, credits=credits+5 where username='$login'";
			mysql_query($query);

			///
	
					$save1 = "insert into phoenix_mail ( userto, author, subject, sentdate, message, bound, my_color, stamp ) values ( '$recipient', '$login', '$subject', '$msgsandposts', '$msg', 'out', '$color', now() )";
					$save = mysql_query($save1);

	
					$save1cv = "insert into phoenix_mail_shadow ( userto, author, subject, sentdate, message, bound, my_color, stamp ) values ( '$recipient', '$login', '$subject', '$msgsandposts', '$msg', 'out', '$color', now() )";
					$savecv = mysql_query($save1cv);

						if ($result == false) 
						{
						$url = "./index.php?ses=$ses&act=index&err=sorry,%20a%20database%20error%20occured%20-%20message%20not%20sent";

						header("HTTP/1.1 301 Moved Permanently");
						header("Location: $url");
						
						exit;
						}

						elseif ($result == true) 
					
						{


						$url = "./index.php?ses=$ses&act=index&err=thanks%20-%20message%20sent%20to%20$recipient";

						header("HTTP/1.1 301 Moved Permanently");
						header("Location: $url");
						
						exit;
						}
					}
				}
			}
		else 
		{
		$url = "./index.php?ses=$ses&act=index&err=sorry,%20a%20database%20error%20occured%20-%20message%20not%20sent";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
						
		exit;
		}
	}
}





















// Delete a message from inbox

if ($act == "del")
	{
	$query = "select * from phoenix_mail where mid=$mid";
	$result = mysql_query($query);
	$num_row = mysql_num_rows($result);
	$row = mysql_fetch_array($result);

	if ($num_row <1)
 
		{

		$url = "./index.php?ses=$ses&act=index&err=message%20deleted";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
						
		exit;
		}
		else
		{
		$query = "delete from phoenix_mail where mid=$mid and userto='$login'";
		$result = mysql_query($query);

		if ($result == false) 

			{
		$url = "./index.php?ses=$ses&act=index&err=sorry,%20a%20database%20error%20occured%20-%20message%20not%20deleted";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
						
		exit;
			}

		if ($result == true) 

			{

		$url = "./index.php?ses=$ses&act=index&err=message%20deleted";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
						
		exit;
			}
		}
	}
	


// Add To Archive

if ($act == "archive")
	{
	$query = "select * from phoenix_mail where mid=$mid";
	$result = mysql_query($query);
	$num_row = mysql_num_rows($result);
	$row = mysql_fetch_array($result);

	if ($num_row <1)
 
		{
		$url = "./index.php?ses=$ses&act=index&err=message%20does%20not%20exist";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
						
		exit;
		}

	else
		{
		$query = "update phoenix_mail set archive='yes' where mid=$mid and userto='$login'";
		$result = mysql_query($query);

		if ($result == false) 

			{
		$url = "./index.php?ses=$ses&act=index&err=database%20error";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
						
		exit;
			}

		if ($result == true) 

			{
		$url = "./index.php?ses=$ses&act=index&err=message%20moved%20to%20archive";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
						
		exit;
			}
		}




	}





// Delete a message from outbox

if ($act == "delo")
	{
	$query = "select * from phoenix_mail where mid=$mid";
	$result = mysql_query($query);
	$num_row = mysql_num_rows($result);
	$row = mysql_fetch_array($result);

	if ($num_row <1)
 
		{
		$url = "./index.php?ses=$ses&act=index&err=message%20does%20not%20exist";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
						
		exit;
		}

	else
		{
		$query = "delete from phoenix_mail where mid=$mid and author='$login' and bound='out'";
		$result = mysql_query($query);

		if ($result == false) 

			{
		$url = "./index.php?ses=$ses&act=index&err=database%20error";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
						
		exit;
			}

		if ($result == true) 

			{
		$url = "./index.php?ses=$ses&act=index&err=message%20deleted";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
						
		exit;
			}
		}
	}




// Delet all read messages

if ($act == "delall")

	{
	$query = "delete from phoenix_mail where read_state=1 and userto='$login' AND archive='no'";
	$result = mysql_query($query);

	if ($result == false) 
	
		{
		$url = "./index.php?ses=$ses&act=index&err=database%20error";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
						
		exit;
		}

	if ($result == true) 

		{
		$url = "./index.php?ses=$ses&act=index&err=inbox%20emptied";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
						
		exit;
		}

	else 
		{
		$url = "./index.php?ses=$ses&act=index&err=database%20error";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
						
		exit;
		}
	}






// Delete Archive

if ($act == "delarc")

	{
	$query = "delete from phoenix_mail where archive='yes' and userto='$login'";
	$result = mysql_query($query);

	if ($result == false) 
	
		{
		$url = "./index.php?ses=$ses&act=index&err=database%20error";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
						
		exit;
		}

	if ($result == true) 

		{
		$url = "./index.php?ses=$ses&act=index&err=archive%20emptied";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
						
		exit;
		}

	else 
		{
		$url = "./index.php?ses=$ses&act=index&err=database%20error";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
						
		exit;
		}
	}





if ($act == "delout")

	{
	$query = "delete from phoenix_mail where bound='out' and author='$login'";
	$result = mysql_query($query);

	if ($result == false) 
		
		{
		$url = "./index.php?ses=$ses&act=index&err=database%20error";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
						
		exit;
		}

	if ($result == true) 
		
		{
		$url = "./index.php?ses=$ses&act=index&err=outbox%20emptied";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
						
		exit;
		}

	else 
		{
		$url = "./index.php?ses=$ses&act=index&err=database%20error";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
						
		exit;
		}
	}








if ($act == "cleaner")

	{
$author = $_GET["author"];

	$query = "delete from phoenix_mail where userto='$login' and author='$author' and archive='no'";
	$result = mysql_query($query);

	$query = "delete from phoenix_mail where userto='$login' and author='$author' and bound='out'";
	$result = mysql_query($query);

	if ($result == false) 
	
		{
		$url = "./index.php?ses=$ses&act=index&err=database%20error";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
						
		exit;
		}

	if ($result == true) 

		{
		$url = "./index.php?ses=$ses&act=index&err=all%20messages%20from%20$author%20were%20deleted";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
						
		exit;
	}
}





if ($act == "emptyer")

	{


	$query = "delete from phoenix_mail where userto='$login' and archive='no' and read_state=1";
	$result = mysql_query($query);

	$query = "delete from phoenix_mail where author='$login' AND bound='out'";
	$result = mysql_query($query);



if ($emaildo == "yes")
{


$elogin = $rowses["emailuser"];
$epass = $rowses["emailpass"];

$mtype = "pop3";
$serverinput = "{mail.phoenixbytes.co.uk/notls}INBOX";
$userinput = "$elogin";
$emailinput = "$elogin";
$passinput = "$epass";

$conn = @imap_open("$serverinput", "$userinput", "$passinput");

@imap_delete($conn,'1:*'); 

@imap_expunge($conn);


$query = "delete from phoenix_email where username='$login' AND type='message'";
$result = mysql_query($query);

}








	if ($result == false) 
	
		{
		$url = "./index.php?ses=$ses&act=index&err=database%20error";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
						
		exit;
		}

	if ($result == true) 

		{
		$url = "./index.php?ses=$ses&act=index&err=all%20read%20messages%20deleted";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
			
		exit;
	}
}








if ($act == "delemail")

	{


	$query = "delete from phoenix_email where username='$login' and id='$mid'";
	$result = mysql_query($query);


	if ($result == false) 
	
		{
		$url = "./esent.php?ses=$ses&act=index&err=database%20error";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
						
		exit;
		}

	if ($result == true) 

		{
		$url = "./esent.php?ses=$ses&act=index&err=message%20deleted";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
			
		exit;
	}
}











if ($act == "doemail")

{


$elogin = strtolower($rowses["username"]);
$epass = $rowses["password"];

$mail_query = "UPDATE forum_users set doesemail='yes', emailuser='$elogin@$cpaneldomain', emailpass='$epass' where username='$login'";
mysql_query($mail_query);



$fx = fopen ("$cpanelurl?email=$elogin&domain=$cpaneldomain&password=$epass&quota=$emailquota", "r");
if (!$fx) {
$msg = urlencode("an error occured");
}
else {
$msg = urlencode("Your email account has now been set up!");
}

  while (!feof ($fx)) {
    $line = fgets ($fx, 1024);
    if (ereg ("already exists", $line, $out)) {
      $msg = "Email account {$euser}@{$edomain} already exists.";
      break;
    }
  }



$url = "./index.php?ses=$ses&act=index&err=$msg";
header("HTTP/1.1 301 Moved Permanently");
header("Location: $url");
@fclose($fx);
exit;

  }





if ($act == "deladdress")

	{


	$query = "delete from phoenix_email where id='$id' AND username='$login'";
	$result = mysql_query($query);


	if ($result == false) 
	
		{
		$url = "./addressbook.php?ses=$ses&err=database%20error";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
						
		exit;
		}

	if ($result == true) 

		{
		$url = "./addressbook.php?ses=$ses&err=contact%20deleted";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
			
		exit;
	}
}




if ($act == "addaddress")

	{

$contactname = $_POST["contactname"];
$contactemail = $_POST["contactemail"];


$contactaddress = strtolower("$contactemail");


	$save = "insert into phoenix_email ( username, address, friendlyaddress, type ) values ( '$login', '$contactaddress', '$contactname', 'address' )";
	$save = mysql_query($save);

			$query = "update forum_users set posts=posts+1 where username='$login'";
			mysql_query($query);


	if ($result == false) 
	
		{
		$url = "./addressbook.php?ses=$ses&err=database%20error";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
						
		exit;
		}

	if ($result == true) 

		{
		$url = "./addressbook.php?ses=$ses&err=new%20contact%20added";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
			
		exit;
	}
}







if ($act == "")
{
		$url = "./index.php?ses=$ses&act=index&err=nice%20try,%20beat%20it.";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
						
		exit;
}


if ($act == "shortcuts")
		{

$shortcut = $_GET["shortcut"];

		

		if ($shortcut == "" || $shortcut =="shortcuts") $url = "./index.php?ses=$ses";
		if ($shortcut == "forums") $url = "../forum/forums.php?ses=$ses";
		if ($shortcut == "lounge") $url = "../chat/enter.php?ses=$ses&roomid=1";
		if ($shortcut == "chat") $url = "../chat/index.php?ses=$ses";
		if ($shortcut == "options") $url = "../options/index.php?ses=$ses";
		if ($shortcut == "friends") $url = "../friends/index.php?ses=$ses";
		if ($shortcut == "uploader") $url = "../uploader/files.php?ses=$ses";
		if ($shortcut == "albums") $url = "../imgstor/index.php?ses=$ses";
		if ($shortcut == "online") $url = "../extras/online.php?ses=$ses";


		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}




//////////////////////// GO ADVANCED!!

if ($act == "enhancenew")
		{

$enflag = "yes";


		$url = "./index.php?ses=$ses&enflag=$enflag#bottom";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}


if ($act == "enhancereply")
		{

$enflag = "yes";
$mid = $_GET["mid"];

		$url = "./msg.php?ses=$ses&enflag=$enflag&mid=$mid#bottom";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}


if ($act == "enhancepreset")
		{

$enflag = "yes";
$senduser = $_GET["senduser"];

		$url = "./index.php?ses=$ses&enflag=$enflag&senduser=$senduser&act=presetuser#bottom";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}







if ($act == "newpop")
{


$query = "SELECT poppers from forum_users where username='$recipient'";
$result = mysql_query ("$query");
$row = mysql_fetch_array($result);

$poppers = $row['poppers'];

if ($poppers == "no")
{
$send = "no";
$error = "$recipient is not accepting pop messages from anyone";
}

if ($poppers == "yes")
{
$send = "yes";
$error = "your pop message was sent to $recipient";
}

if ($poppers == "bud")
{

$query = "SELECT count(*) from friends where username='$login' and friendname='$recipient'";
$result = mysql_query($query);
$number = number_format(mysql_result($result,0,"count(*)"));

	if ($number > 0)
	{
	$send = "yes";
	$error = "your pop message was sent to $recipient";
	}
	else
	{
	$send = "no";
	$error = "$recipient is only accepting pop messages from friends.";
	}

}


$error = urlencode("$error");

if ($send == "yes")
{

$queryvv = "SELECT * from poppers where author='$login' and message='$message'";
$resultvv = mysql_query($queryvv);
$numvv = mysql_num_rows($resultvv);

if ($numvv < 1)
{
$qui = "insert into poppers (userto, author, message, date) values ('$recipient', '$login', '$message', '$msgsandposts')";
$res = mysql_query($qui);


			/// score - credit

			$query = "update forum_users set posts=posts+10, credits=credits+5 where username='$login'";
			mysql_query($query);

			///
}


}

$url = "./index.php?ses=$ses&act=index&err=$error";
header("HTTP/1.1 301 Moved Permanently");
header("Location: $url");
				
exit;

}	


?>


