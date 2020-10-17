<?php



include('../scripts/dbconnect.php');
include('../scripts/cleaner.php');

header("Last-Modified: " . gmdate("D, dMYH:i:s") . " GMT");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

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
$message = $_GET['message'];
if ($message == "")
{ $message = $_POST['message']; }
$subject = $_GET['subject'];
if ($subject == "")
{ $subject = $_POST['subject']; }
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
$formkey = $_GET['formkey'];
if ($formkey == "")
{ $formkey = $_POST['formkey']; }
$uchat = $_GET['uchat'];
if ($uchat == "")
{ $uchat = $_POST['uchat']; }


////////////////////////////////////////////////


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
$query = "SELECT * from forum_users where ses='$ses' limit 1";
$result = mysql_query ("$query");
$row_ses = mysql_fetch_array($result);
$session = mysql_num_rows($result);

$login = $row_ses["username"];

if ($login != "")
{



////////////////////////////////////////////////

$query = "select * from welcome where id='1'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

$emailchangepass = $row["emailchangepass"];
$cpaneldomain = $row["emaildomain"];
$emailquota = $row["emailquota"];
$requiredusername = $row["requser"];

$author = $row_ses["username"];
$group = $row_ses["userlevel"];
$color = $row_ses["my_color"];
$postcount = $row_ses["posts"];
$doesemail = $row_ses["doesemail"];


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
















if ($inserticon != "") $message = "$message === $inserticon";

/////////
$nusername = strtolower($nusername);

$bgc = $row_ses["bg_col"]; // background colour
$textc = $row_ses["text_col"]; // text colour
$namec = $row_ses["my_color"]; // name colour
$trc = $row_ses["tr_col"]; // table row colour [tables removed but still used!]
$schnarf = $row_ses["schnarf_col"]; // same as $tr_col but a different variable name to cater for older pages

$hrone = $_POST["hrone"];
$hrtwo = $_POST["hrtwo"];

$hgone = $_POST["hgone"];
$hgtwo = $_POST["hgtwo"];	

$hbone = $_POST["hbone"];
$hbtwo = $_POST["hbtwo"];

$xhex = $_GET["xhex"];
$newcolname = $_POST["newcolname"];

$ses = $_GET['ses'];
if ($ses == "")
{
$ses = $_POST['ses'];
}
$theme = $_GET['theme'];
if ($theme == "")
{
$theme = $_POST['theme'];
}

$interv = $_GET['interv'];
if ($interv == "")
{
$interv = $_POST['interv'];
}

$nuserlevel = $_GET['nuserlevel'];
if ($nuserlevel == "")
{
$nuserlevel = $_POST['nuserlevel'];
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
$query_insert = " INSERT INTO zero ( browser, ipv4, ipv6, uniquid, date, action ) VALUES ( '$user_agent', '$opip', '$subno', '$uniquid', now(), '$login@options, $act' )";
$result = mysql_query("$query_insert");
}
else
{
$query = "update zero set date=now(), action='$login@options, $act' WHERE uniquid='$uniquid'";
mysql_query($query);
}


////////////////////////////////////
////////////////////////////////////



}



//################# SHORTCUTS HERE #####################################



if ($act == "shortcuts")
		{

$shortcut = $_GET["shortcut"];

		

		if ($shortcut == "" || $shortcut =="shortcuts") $url = "./index.php?ses=$ses";
		if ($shortcut == "forums") $url = "../forum/forums.php?ses=$ses";
		if ($shortcut == "mailbox") $url = "../mail/index.php?ses=$ses";
		if ($shortcut == "lounge") $url = "../chat/enter.php?ses=$ses&roomid=1";
		if ($shortcut == "chat") $url = "../chat/index.php?ses=$ses";
		if ($shortcut == "friends") $url = "../friends/index.php?ses=$ses";
		if ($shortcut == "uploader") $url = "../uploader/files.php?ses=$ses";
		if ($shortcut == "albums") $url = "../imgstor/index.php?ses=$ses";
		if ($shortcut == "online") $url = "../extras/online.php?ses=$ses";


		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}
//################# PROFILE OPTIONS #####################################


if ($act == "profaccess")
{
	$setter = $_GET['setter'];

	$query = "UPDATE forum_users SET profile_access='$setter' WHERE username='$login'";
	mysql_query($query);

	$urlmsg = urlencode("You profile visibility has been set to $setter");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
}

//################# PROFILE OPTIONS #####################################


if ($fart == "poppers")
{
	$setter = $_POST['setter'];

	$query = "UPDATE forum_users SET poppers='$setter' WHERE username='$login'";
	mysql_query($query);

	$urlmsg = urlencode("Pop Messages set to $setter");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
}








//###################################################################

if ($act == "gallerypic")
{
	$setter = $_GET['setter'];

	$query = "UPDATE forum_users SET gallery='$setter' WHERE username='$login'";
	mysql_query($query);

	$urlmsg = urlencode("Gallery inclusion setting: $setter");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
}

//###################################################################

if ($act == "mainmenu")
{
	$setter = $_GET['setter'];

	$query = "UPDATE forum_users SET menustyle='$setter' WHERE username='$login'";
	mysql_query($query);

	$urlmsg = urlencode("Main menu view: $setter");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
}






//###################################################################

$profile_comments = $_GET['profile_comments'];
if ($profile_comments == "")
{
$profile_comments = $_POST['profile_comments'];
}

$profile_friends = $_GET['profile_friends'];
if ($profile_friends == "")
{
$profile_friends = $_POST['profile_friends'];
}

$profile_photos = $_GET['profile_photos'];
if ($profile_photos == "")
{
$profile_photos = $_POST['profile_photos'];
}

$profile_lastforum = $_GET['profile_lastforum'];
if ($profile_lastforum == "")
{
$profile_lastforum = $_POST['profile_lastforum'];
}

$profile_blog = $_GET['profile_blog'];
if ($profile_blog == "")
{
$profile_blog = $_POST['profile_blog'];
}


if ($act == "chunks")

{


	$query = "UPDATE forum_users SET profile_comments='$profile_comments', profile_friends='$profile_friends', profile_photos='$profile_photos', profile_lastforum='$profile_lastforum', profile_blog='$profile_blog' WHERE username='$login'";
	mysql_query($query);


	$urlmsg = urlencode("Your profile content chunk settings were updated.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;



}






//###################################################################








if ( $act == "myinfo") 

{


$nrealname = clean($_POST['nrealname']); // 1 //
$nplace = clean($_POST['nplace']); // 6 //
$ntagline = clean($_POST['ntagline']); // 7 //
$nsig = clean($_POST['nsig']); // 8 //
$nemail = clean($_POST['nemail']); // 10 //
$npass = clean(strtolower($_POST['npass'])); // 11 //
$elogin = strtolower($row_ses["emailuser"]); // email username


if ($npass == "")
	{
	$urlmsg = urlencode("You didn't enter a password, your details were not updated, please try again.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;

	}

elseif ($npass != "")

	{
	$query="UPDATE forum_users SET password='$npass', email='$nemail', place='$nplace', title='$ntagline', realname='$nrealname', emailpass='$npass' WHERE username='$login'";
	mysql_query($query);

	$query="UPDATE forum_users SET sig='$nsig' WHERE username='$login'";
	mysql_query($query);

	if ($doesemail == "yes")
	{


$username = "phoenixb";
$password = "$emailchangepass";
$domain = "phoenixbytes.co.uk";


//DO NOT MODIFY BELOW!
$theme = "x3";
if (isset($elogin)) {
$postfields = "email=" . $elogin . "&domain=" . $domain . "&password=" . $npass . '&quota=1';
$popPost = curl_init();
$url = "http://" . $username . ":" . $password . "@" . $domain . ":2082/frontend/" . $theme . "/mail/dopasswdpop.html?" . $postfields;
curl_setopt($popPost, CURLOPT_URL, $url);
curl_setopt($popPost, CURLOPT_POST, 1);
curl_setopt($popPost, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($popPost, CURLOPT_TIMEOUT, 15);
$popPost_result = curl_exec ($popPost);
curl_close ($popPost);

$start = strpos($popPost_result, '<b>Account');
$end = strpos($popPost_result, '<!-- pre tag ended here -->');
$responce = substr($popPost_result, $start, $end-$start);
}
	
	}


	if ($login == "$requiredusername")
	{

	$querys="UPDATE welcome SET reqpass='$npass' WHERE requser='$login'";
	mysql_query($querys);

	}

	$urlmsg = urlencode("Your details have been updated$msge");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");


	exit;
	}
}












//###################################################################


if ($fart == "gender")

	{



$sex = $_POST['sex']; // 5 //


	$query="UPDATE forum_users SET sex='$sex' where username='$login'";
	mysql_query($query);


	$urlmsg = urlencode("Your gender was updated.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}
//###################################################################


if ($fart == "dateofbirth")

	{

$ddmy = $_POST['ddmy']; // 2

$mdmy = $_POST['mdmy']; // 3

$ydmy = $_POST['ydmy']; // 4

$nage = "$ddmy-$mdmy-$ydmy"; //


	$query="UPDATE forum_users SET age='$nage' where username='$login'";
	mysql_query($query);


	$urlmsg = urlencode("Your date of birth was updated.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}


//###################################################################


if ($fart == "partnership")

	{

$nrelationship = $_POST['nrelationship']; // 9 //


	$query="UPDATE forum_users SET relationship='$nrelationship' where username='$login'";
	mysql_query($query);


	$urlmsg = urlencode("Your relationship status was updated.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}
//###################################################################


if ($fart == "fontsize")

	{

$fsize = $_POST['fsize']; // 9 //


	$query="UPDATE forum_users SET fontsize='$fsize' where username='$login'";
	mysql_query($query);


	$urlmsg = urlencode("font size altered.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}












//###################################################################


if ($fart == "autorefresher")

	{

$refreshrate = $_POST['refreshrate']; // 9 //


	$query="UPDATE forum_users SET autorefresh='$refreshrate' where username='$login'";
	mysql_query($query);



	if ($refreshrate == 2147483647) $reftell = "auto refresh turned off";
	else $reftell = "auto refresh set to $refreshrate";


	$urlmsg = urlencode("$reftell.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}






//###################################################################


if ($fart == "chatlines")

	{

$chatlimit = $_POST['chatlimit']; // 9 //


	$query="UPDATE forum_users SET chatlines='$chatlimit' where username='$login'";
	mysql_query($query);


	$urlmsg = urlencode("Maximum chat lines set to $chatlimit.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}




//###################################################################


if ($fart == "mailboxoff")

	{

if ($ubox == "on") $msg = "all messages";
if ($ubox == "off") $msg = "no messages";
if ($ubox == "bud") $msg = "only messages from friends";

	$query="UPDATE forum_users SET mymail='$ubox' where username='$login'";
	mysql_query($query);


	$urlmsg = urlencode("You are now accepting $msg");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}



//###################################################################



if ($fart == "inboxes")
{

if ($on == "yes")

	{
	$query="UPDATE forum_users SET inbox='1' WHERE username='$login'";
	mysql_query($query);


	$urlmsg = urlencode("New message notification activated!");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}



if ($off == "yes")

	{
	$query="UPDATE forum_users SET inbox='0' WHERE username='$login'";
	mysql_query($query);


	$urlmsg = urlencode("New message notification deactivated!");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}
}


//###################################################################




if ($act == "tmax")

{



$ntmax = $_POST['ntmax'];



	$query = "UPDATE forum_users SET pmax=$ntmax, tmax=$ntmax WHERE username='$login'";
	mysql_query($query);

	$urlmsg = urlencode("Maximum items per page set to $ntmax.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;




}
//###################################################################




if ($act == "chatinvites")

{



$inviteset = $_POST['inviteset'];



	$query = "UPDATE forum_users SET chatinvites='$inviteset' WHERE username='$login'";
	mysql_query($query);

	if ($inviteset == "on") $msg = "accepting chat invites";
	if ($inviteset == "off") $msg = "not accepting chat invites";
	if ($inviteset == "bud") $msg = "accepting chat invites only from friends";

	$urlmsg = urlencode("You are now $msg.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;




}
//###################################################################

if ($act == "matesoff")

	{

if ($ubox == "on") $msg = "accepting requests";
if ($ubox == "off") $msg = "not accepting requests";

	$query="UPDATE forum_users SET myfriends='$ubox' where username='$login'";
	mysql_query($query);


	$urlmsg = urlencode("You are now $msg.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}


//###################################################################


if ($act == "twat") 
{

$nusername = clean($_POST["nusername"]);
if ($nusername == "") $nusername = $_GET["nusername"];



$query = "SELECT count(*) from ignorance where login='$login' AND ignored='$nusername'";
$result = mysql_query ("$query");
$row = mysql_fetch_array($result);
$count = $row[0];

if ($count > 0) $nusername = "";


$query = "SELECT userlevel from forum_users where username='$nusername'";
$result = mysql_query ("$query");
$row = mysql_fetch_array($result);
$ulev = $row["userlevel"];


if ($ulev < 3) $nusername = "";





if ($nusername == "" || $nusername == "$login")
	{
	$urlmsg = urlencode("You cannot ignore this user, The user may have already been blocked, or the user may be a moderator.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}





elseif ($nusername != "")
	{

	$query = "insert into ignorance ( login, ignored, message ) values ( '$login', '$nusername', '$mess' )";
	$result = mysql_query($query);

	$urlmsg = urlencode("$nusername is now blocked from talking to you.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}
}


//###################################################################


if ($act == "notwat") 


	{
	$query="DELETE FROM ignorance WHERE login='$login' and ignored='$nusername'";
	mysql_query($query);

	$urlmsg = urlencode("$nusername is no longer being ignored.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;

	}

//###################################################################

if ($act == "setheme")

	{

$id = $_GET["id"];


$query = "select * from phoenix_themes where id='$id'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$rowz = mysql_fetch_array($result);

$bgco = $rowz["bg_col"]; // background colour
$textco = $rowz["text_col"]; // text colour
$nameco = $rowz["my_color"]; // name colour
$trco = $rowz["tr_col"]; // table row colour [tables removed but still used!]
$schnarfo = $rowz["schnarf_col"]; // same as $tr_col but a different variable name to cater for older pages
$bggp = $rowz["bgpic"]; 
$tit = $rowz["title"];
$tbpic = $rowz["topbottompic"];
$mpic = $rowz["middlepic"];

	$query="UPDATE forum_users SET bg_col='$bgco', text_col='$textco', my_color='$nameco', tr_col='$trco', schnarf_col='$schnarfo' where username='$login'";
	$result = mysql_query($query);


	$query="UPDATE forum_users SET bgpic='$bggp', topbottompic='$tbpic', middlepic='$mpic', mytheme='yes' where username='$login'";
	$result = mysql_query($query);


	$urlmsg = urlencode("Theme '$tit' was applied.");


	
	
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}


//###################################################################




if ( $act == "adtopics") 
{

if ($group > 2)
	{
	$urlmsg = urlencode("access denied.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}

elseif ($group < 2)
{

if ($nusername == "")
	{
	$urlmsg = urlencode("username empty.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}

elseif ($nusername != "")

	{
	$query="DELETE FROM phoenix_topics WHERE author LIKE '$nusername%'";
	mysql_query($query);


	$query="DELETE FROM phoenix_posts WHERE author LIKE '$nusername%'";
	mysql_query($query);


	$urlmsg = urlencode("all posts/replies by $nusername were deleted.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}
}
}



//###################################################################



if ( $act == "ownershit") 

{

if ($group > 2)
	{

	$urlmsg = urlencode("access denied.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}

elseif ($group < 2)
{

if ($nusername == "")
	{
	$urlmsg = urlencode("username empty.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}

elseif ($nusername != "")
	{


	$query="UPDATE forum_users SET owner='$adownershit' where username='$nusername'";
	mysql_query($query);


	$urlmsg = urlencode("$nusername's ownership status was set to: $adownershit.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}
	
}


}


//###################################################################


if ($act == "sitename") 


	{
		if ($group < 2)
		{
	$query="update welcome set snames='$nsitename'";
	mysql_query($query);


	$urlmsg = urlencode("The name of the site is $nsitename, this will appear in the Title bar and in various other locations around the site.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
		else
		{
		
	$urlmsg = urlencode("you fucking tard hahahahahaha");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
	}




//###################################################################


if ( $act == "welcome2") 
{


$msg = clean($_POST["msg"]);

if ($group > 2)
	{
	$urlmsg = urlencode("access denied.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}

elseif ($group < 2)


{

if ($msg == "")
	{
	$urlmsg = urlencode("you didn't type anything.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}

elseif ($msg != "")

	{
	$query="UPDATE welcome SET logintext='$msg'";
	mysql_query($query);
	$urlmsg = urlencode("Login message updated.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}

}


}


//###################################################################


if ($act == "adonoff")

	{
		if ($group < 2)
		{
if ($usignup == "on") $msg = "you are now allowing all users to gain entry.";
if ($usignup == "off") $msg = "you are now accepting no new signups.";
if ($usignup == "val") $msg = "you are now allowing users to gain entry once they've confirmed their email address.";

	$query="UPDATE welcome SET signup='$usignup'";
	mysql_query($query);

	$urlmsg = urlencode("$msg.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
		else
		{
		
	$urlmsg = urlencode("you fucking tard hahahahahaha");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
	}

//###################################################################


if ($act == "chatonoff")

	{
		if ($group < 2)
		{
if ($uchat == "on") $msg = "chatroom active.";
if ($uchat == "off") $msg = "chatroom disabled.";

	$query="UPDATE welcome SET chat='$uchat'";
	mysql_query($query);

	$urlmsg = urlencode("$msg");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
		else
		{
		
	$urlmsg = urlencode("you fucking tard hahahahahaha");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
	}

//###################################################################


if ( $act == "welcome") 
{


if ($group < 4)
{


$msg = clean("$msg");


if ($msg == "")
	{
	$url = "../mainmenu.php?ses=$ses";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}

elseif ($msg != "")

	{

	$query = "insert into phoenix_comments ( username, msg, timestamp, friendlytime, type, readstate ) values ( '$login', '$msg', now(), '$msgsandposts', 'shout', '1' )";
	$result = mysql_query($query);

			$query = "update forum_users set posts=posts+1 where username='$login'";
			mysql_query($query);

	$url = "../mainmenu.php?ses=$ses";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}

}

else
{
	$url = "../mainmenu.php?ses=$ses";
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;

}

}


//###################################################################




if ($act == "adintervality")
	{
		if (group < 2)
		{
	$query="update welcome set cuntus='$interv'";
	mysql_query($query);

	$urlmsg = urlencode("online interval set to $interv.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
		else
		{
		
	$urlmsg = urlencode("you fucking tard hahahahahaha");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
	}


//###################################################################




if ($act == "changeusername")
	{



		if ($group < 2)
		{
$newname = clean($_POST["newname"]);
$oldname = clean($_POST["oldname"]);



	$query="update forum_users set username='$newname' where username='$oldname'";
	mysql_query($query);


	$query="update friends set username='$newname' where username='$oldname'";
	mysql_query($query);

	$query="update friends set friendname='$newname' where friendname='$oldname'";
	mysql_query($query);


	$query="update dating set username='$newname' where username='$oldname'";
	mysql_query($query);


	$query="update my_blog set login='$newname' where login='$oldname'";
	mysql_query($query);


	$query="update phoenix_imagealbums set login='$newname' where login='$oldname'";
	mysql_query($query);

	$query="update phoenix_imagestore set login='$newname' where login='$oldname'";
	mysql_query($query);


	$query="update phoenix_posts set author='$newname' where author='$oldname'";
	mysql_query($query);

	$query="update phoenix_topics set author='$newname' where author='$oldname'";
	mysql_query($query);


	$query="update phoenix_comments set username='$newname' where username='$oldname'";
	mysql_query($query);

	$query="update phoenix_comments set profile='$newname' where profile='$oldname'";
	mysql_query($query);


	$query="update ignorance set login='$newname' where login='$oldname'";
	mysql_query($query);

	$query="update ignorance set ignored='$newname' where ignored='$oldname'";
	mysql_query($query);


	$query="update phoenix_mail set userto='$newname' where userto='$oldname'";
	mysql_query($query);

	$query="update phoenix_mail set author='$newname' where author='$oldname'";
	mysql_query($query);




	$urlmsg = urlencode("username changed!");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
		else
		{
		
	$urlmsg = urlencode("you fucking tard hahahahahaha");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
	}





///////////////////










if ($act == "adele")
	{
		if ($group < 2)
		{
$user = $_GET["nusername"];


	$query="DELETE FROM forum_users WHERE username='$user'";
	mysql_query($query);

	$query="DELETE FROM phoenix_posts WHERE author='$user'";
	mysql_query($query);

	$query="DELETE FROM phoenix_topics WHERE author='$user'";
	mysql_query($query);

	$query="DELETE FROM friends WHERE username='$user' OR friendname='$user'";
	mysql_query($query);

	$query="DELETE FROM phoenix_mail WHERE userto='$user' OR author='$user'";
	mysql_query($query);

	$query="DELETE FROM my_blog WHERE login='$user'";
	mysql_query($query);

	$query="DELETE FROM dating WHERE username='$user'";
	mysql_query($query);

	$query="DELETE FROM phoenix_comments WHERE username='$user'";
	mysql_query($query);

	$query="DELETE FROM phoenix_comments WHERE profile='$user'";
	mysql_query($query);

	$query="DELETE FROM phoenix_imagealbums WHERE login='$user'";
	mysql_query($query);

	$query="DELETE FROM phoenix_imagestore WHERE login='$user'";
	mysql_query($query);

	$query="DELETE FROM phoenix_email WHERE username='$user'";
	mysql_query($query);

	$query="DELETE FROM ignorance WHERE login='$user'";
	mysql_query($query);

	$query="DELETE FROM ignorance WHERE ignored='$user'";
	mysql_query($query);



	$urlmsg = urlencode("user deleted!");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
		else
		{
		
	$urlmsg = urlencode("you fucking tard hahahahahaha");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
	}



//###################################################################


if ( $act == "adaddforum") 


{

	


if ($nforname != "" && $nforum != "" && $group < 2)
{

$getcat = $_POST["getcat"];


$query = "insert into phoenix_forums ( name,  forum, category, type ) values ( '$nforname', '$nforum', '$getcat', 'forum' )";
$result = mysql_query($query);

if ($result == "true")
	{
	$urlmsg = urlencode("$nforum was added with link text title: $nforname.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}
		else
	{
	$urlmsg = urlencode("something went wrong, the result is false, try again.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}
}

else
{
	$urlmsg = urlencode("type something, dick 'ed!");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
}

}
//###################################################################
//###################################################################


if ( $act == "adaddcategory") 


{


$catfriendlyn = $_POST["catfriendlyn"];
$catsystemn = $_POST["catsystemn"];


if ($catsystemn != "" && $catfriendlyn != "" && $group < 2)
{

$query = "insert into phoenix_forums ( category, catfriendly, type ) values ( '$catsystemn', '$catfriendlyn', 'category' )";
$result = mysql_query($query);

if ($result == "true")
	{
	$urlmsg = urlencode("new forum category $catfriendlyn added.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}
		else
	{
	$urlmsg = urlencode("something went wrong, the result is false, try again.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}
}

else
{
	$urlmsg = urlencode("type something, dick 'ed!");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
}

}
//###################################################################



if ( $act == "adelforum") 


	{
		if ($group < 2)
		{
	$query="DELETE from phoenix_forums WHERE id=$id";
	mysql_query($query);

	$urlmsg = urlencode("forum deleted.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
		else
		{
		
	$urlmsg = urlencode("you fucking tard hahahahahaha");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
	}
//###################################################################



if ( $act == "adelcategory") 


	{
		if ($group < 2)
		{
	$query="DELETE from phoenix_forums WHERE id=$id";
	mysql_query($query);

	$urlmsg = urlencode("forum category deleted.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
		else
		{
		
	$urlmsg = urlencode("you fucking tard hahahahahaha");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
	}
//###################################################################



if ( $act == "adelcategory") 


	{
		if ($group < 2)
		{
	$query="DELETE from phoenix_forums WHERE id=$id";
	mysql_query($query);

	$urlmsg = urlencode("forum category deleted.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
		else
		{
		
	$urlmsg = urlencode("not, you fucking tard hahahahahaha");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
	}






//###################################################################





if ($act == "adsponsorshit")
	{

		if ($group < 2)
		{
$query= " INSERT INTO sponsors ( url, name ) VALUES ( '$nurl', '$nname' )";
$result = mysql_query($query);

	$urlmsg = urlencode("sponsor added.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
		else
		{
		
	$urlmsg = urlencode("you fucking tard hahahahahaha");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
	}


//###################################################################

if ($act == "adsponsordel")
	{

		if ($group < 2)
		{
	$query="DELETE from sponsors WHERE id='$id'";
	mysql_query($query);

	$urlmsg = urlencode("sponsored link deleted.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
		else
		{
		
	$urlmsg = urlencode("you fucking tard hahahahahaha");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
	}
//###################################################################






if ($act == "adsponsorshit2")
	{
		if ($group < 2)
		{
$query= " INSERT INTO toplists ( url, name ) VALUES ( '$nurl', '$nname' )";
$result = mysql_query($query);

	$urlmsg = urlencode("topsite added.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
		else
		{
		
	$urlmsg = urlencode("you fucking tard hahahahahaha");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
	}


//###################################################################

if ($act == "adsponsordel2")
	{
		if ($group < 2)
		{
	$query="DELETE from toplists WHERE id='$id'";
	mysql_query($query);

	$urlmsg = urlencode("toplist site link deleted.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
		else
		{
		
	$urlmsg = urlencode("you fucking tard hahahahahaha");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
	}

//###################################################################

if ($act == "admembertitles")
	{

		if ($group < 2)
		{

$npos = $_POST["npos"];
$ntit = $_POST["ntit"];	

$query= " INSERT INTO membertitles ( title, postcount ) VALUES ( '$ntit', '$npos' )";
$result = mysql_query($query);


	$urlmsg = urlencode("member title added.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
		else
		{
		
	$urlmsg = urlencode("you fucking tard hahahahahaha");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
	}











//###################################################################

if ($act == "addshortcut")
	{

		if ($group < 2)
		{

$nname = $_POST["nname"];
$nurl = $_POST["nurl"];	

$query= " INSERT INTO shortcuts ( name, url ) VALUES ( '$nname', '$nurl' )";
$result = mysql_query($query);


	$urlmsg = urlencode("new shortcut added.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
		else
		{
		
	$urlmsg = urlencode("you fucking tard hahahahahaha");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
	}



//###################################################################

if ($act == "delshortcut")
	{

		if ($group < 2)
		{
	$query="DELETE from shortcuts WHERE id='$id'";
	mysql_query($query);

	$urlmsg = urlencode("shortcut deleted.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
		else
		{
		
	$urlmsg = urlencode("you fucking tard hahahahahaha");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
	}


//###################################################################

if ($act == "adtitledel")
	{

		if ($group < 2)
		{
	$query="DELETE from membertitles WHERE id='$id'";
	mysql_query($query);

	$urlmsg = urlencode("member title deleted.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
		else
		{
		
	$urlmsg = urlencode("you fucking tard hahahahahaha");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
	}

//###################################################################

if ($act == "cleanshout")
	{

		if ($group < 2)
		{
	$query="DELETE from phoenix_comments WHERE type='shout'";
	mysql_query($query);


	$query = "insert into phoenix_comments ( username, msg, timestamp, friendlytime, type, readstate ) values ( 'System', 'The shoutbox was cleaned!', now(), '$msgsandposts', 'shout', '1' )";
	$result = mysql_query($query);

	$url = "../mainmenu.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
		else
		{
		
	$urlmsg = urlencode("you fucking tard hahahahahaha");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
	}

//###################################################################

if ($act == "repairdb")

	{


		if ($group < 2)
		{

$tables = mysql_list_tables($db); 

while (list($table_name) = mysql_fetch_array($tables)) { 
   $sql = "REPAIR TABLE $table_name"; 
   mysql_query($sql) or exit(mysql_error()); 
} 


	$urlmsg = urlencode("the site's database was repaired, all overheaded data was dropped.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
		else
		{
		
	$urlmsg = urlencode("you fucking tard hahahahahaha");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
	}



//###################################################################



if ($act == "optimizedb")

	{
		if ($group < 2)
		{

$tables = mysql_list_tables($db); 

while (list($table_name) = mysql_fetch_array($tables)) { 
   $sql = "OPTIMIZE TABLE $table_name";
   mysql_query($sql) or exit(mysql_error());
} 


	$urlmsg = urlencode("the site's database was optimized, all overheaded and unecessary data vanished.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
		else
		{
		
	$urlmsg = urlencode("you fucking tard hahahahahaha");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
	}



//###################################################################

if ($act == "adbomb")
{


	if ($group < 2)
	{

$subject = $_POST["subject"];
$msg = $_POST["msg"];

$query = "select username from forum_users where valid='yes'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

while ($row)
	{
	$recipient = $row["username"];

	$queryx = "insert into phoenix_mail ( userto, author, subject, sentdate, message, reply, my_color, stamp ) values ( '$recipient', '$login', '$subject', '$msgsandposts', '$msg', '1', '$color', now() )";
	$resultx = mysql_query($queryx);

	$row = mysql_fetch_array($result);
	}


	$urlmsg = urlencode("the message was sent to all users.");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
		else
		{
		
	$urlmsg = urlencode("you fucking tard hahahahahaha");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
}



//###################################################################




if ($act == "changeforum")
	{


	if ($group < 2)
	{

$fid = $_POST["fid"];
$forumfriendlyname = $_POST["forumfriendlyname"];
$forumcategory = $_POST["forumcategory"];
$forumsystemname = $_POST["forumsystemname"];
$old = $_POST["old"];


$queryc = "select * from phoenix_forums where category='$forumcategory' AND type='category'";
$resultc = mysql_query($queryc);
$num_rowsc = mysql_num_rows($resultc);
$rowc = mysql_fetch_array($resultc);
$xfcatty = $rowc["catfriendly"];



	$query="update phoenix_forums set name='$forumfriendlyname', forum='$forumsystemname', category='$forumcategory', catfriendly='$xfcatty' where id='$fid'";
	mysql_query($query);

	$query="update phoenix_topics set forum='$forumsystemname' where forum='$old'";
	mysql_query($query);


	$urlmsg = urlencode("forum edited!");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
		else
		{
		
	$urlmsg = urlencode("you fucking tard hahahahahaha");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
	}



//###################################################################




if ( $act == "unbanhuman") 


	{

		if ($group < 2)
		{
	$query="UPDATE forum_users SET ban_status=0 WHERE username='$name'";
	mysql_query($query);

	$urlmsg = urlencode("$name's ban was lifted!");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
		else
		{
		
	$urlmsg = urlencode("you fucking tard hahahahahaha");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}


	}
//###################################################################


if ($act == "delback")
	{
		if ($group < 2)
		{


	$dbfilename = $_GET["dbfilename"];
	@unlink("$dbfilename");


	$urlmsg = urlencode("Database Backup Complete!");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
		else
		{
		
	$urlmsg = urlencode("you fucking tard hahahahahaha");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
	}

//###################################################################


if ($act == "bang")
	{
		if ($group < 2)
		{

	$query="update forum_users set lastactive=now()";
	mysql_query($query);

	$query="update friends set lastactive=now()";
	mysql_query($query);

	$urlmsg = urlencode("all users banged!");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
		else
		{
		
	$urlmsg = urlencode("you fucking tard hahahahahaha");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
	}





//###################################################################


if ($act == "moofmailer")
	{


$varmessage = $_POST["varmessage"];



		if ($group < 2)
		{


$query = "SELECT email, username, password from forum_users where subscribed='yes'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);



while ($row)
      	{
	$setEmailArray = $row['email'];
	$passquach = $row['password'];
	$usermoof = $row['username'];
                  
$message = "Hello $usermoof!

$varmessage

Your login details (in case you forgot!) are:

Username: $usermoof
Password: $passquach

Thank You,
The PhoenixBytes Team.";


            //    THIS EMAIL IS THE SENDER EMAIL ADDRESS
   $from      = "$PHEMAIL";
   
            //    SET A SUBJECT OF YOUR CHOICE
   $subject    = "Hello $usermoof!";
            
            //    SET UP THE EMAIL HEADERS 
    $headers      = "From: admin@phoenixbytes.co.uk\r\n";
    $headers   .= "Content-Type: text/plain; charset=iso-8859-1\r\n";
   
            /*    IN-CASE SOMEONE HAS TWO EMAIL ACCOUNTS SETUP ON THE SAME COMPUTER 
               SOME EMAIL PROGRAMS LIKE OUTLOOK
               WILL ONLY SHOW ONE EMAIL AND DISCARD THE OTHER(S)
               SO WE GIVE THE (Message-ID:) A RANDOM NUMBER
            */ 
   $headers   .= "Message-ID: <".time().rand(1,1000)."@".$_SERVER['SERVER_NAME'].">". "\r\n";   
   
   
   //   LETS SEND THE EMAIL
   mail($setEmailArray, $subject, $message, $headers);
   

       	$row = mysql_fetch_array($result);
      	}


	$urlmsg = urlencode("all users were moof-mailed!");
	$url = "./index.php?ses=$ses&msg=$urlmsg";
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
		else
		{
		
	$urlmsg = urlencode("you fucking tard hahahahahaha");
	$url = "./index.php?ses=$ses&msg=$urlmsg";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}
	}



///////##################################################################################################################
///////			THE
///////			END!!!!!!!!!!!!!!!!!!!!!!!!!!!
///////##################################################################################################################

}

?>
