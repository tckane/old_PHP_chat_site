<?php


// PhoenixBytes SITE BEGIN
   $mtime = microtime(); 
   $mtime = explode(" ",$mtime); 
   $mtime = $mtime[1] + $mtime[0]; 
   $starttime = $mtime;
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
////
////	yonSite //
////
////
include('dbconnect.inc');
include('mobile_device_detect.php');
//
$css = "on";
//
$wapsiteid = $_GET["wapsiteid"];
//
if ($wapsiteid == "") 
{ $wapsiteid = "1"; }
//////////////////////////////////////////////
//////////////////////////////////////////////
// current file
//
$currentFile = $_SERVER["SCRIPT_NAME"]; 
$parts = Explode('/', $currentFile); 
$currentFile = $parts[count($parts) - 1];


////////////////////////////////////////////
//
// PhoenixSites v0.4 
// 
// date started:		16/10/2004
// final update		06/11/2005
//
// and what about the velcome message?
$query = "select * from welcome where id='1'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);
//
//
$logo_url = $row["logourl"];
$sitename = $row["snames"];
$cpyright = $row["pagecopy"];
$upl = $row["uploaderlinks"];
$stuffaddress = $row["stufflinks"];
$worknotice = $row["worknotice"];
$safe = $row["safeaddress"];
$lback = $row['linkbackaddress'];
$signupswitch = $row["signup"];
$chatrooms = $row["chat"];
$serverlocat = $row["serverlocation"];
$interval = $row["cuntus"];
$PHEMAIL = $row["reqemail"];
$PHNAME = $row["requser"];
$globalposts = $row["membermaxposts"];
//
//
//
$query = "select hits from hit_counter where username='$sitename' AND wapsiteid='$wapsiteid'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);
$hits = $row["hits"];


$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];


if ($ses != "")
{
$serverlocation = "$serverlocat";
}
else
{
$serverlocation = "$serverlocat";
}




$vyear = gmdate("Y");


///
$p = $_GET['p'];
if ($p == "")
{ $p = $_POST['p']; }
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
$popflag = $_GET['popflag'];
if ($popflag == "")
{ $popflag = $_POST['popflag']; }
$popmessage = $_GET['popmessage'];
if ($popmessage == "")
{ $popmessage = $_POST['popmessage']; }
$popid = $_GET['popid'];
if ($popid == "")
{ $popid = $_POST['popid']; }
$sendto = $_GET['sendto'];
if ($sendto == "")
{ $sendto = $_POST['sendto']; }
$activity = $_GET['activity'];
if ($activity == "")
{ $activity = $_POST['activity']; }
$albumid = $_GET['albumid'];
if ($albumid == "")
{ $albumid = $_POST['albumid']; }
$albumidb = $_GET['albumidb'];
if ($albumidb == "")
{ $albumidb = $_POST['albumidb']; }
$imid = $_GET['imid'];
if ($imid == "")
{ $imid = $_POST['imid']; }

$letters = $_GET['letters'];
if ($letters == "")
{ $letters = $_POST['letters']; }

$thatfile = $_GET['thatfile'];
if ($thatfile == "")
{ $thatfile = $_POST['thatfile']; }
$type = $_GET['type'];
if ($type == "")
{ $type = $_POST['type']; }
//
//
//
//
//
//
//
//
//
//
////////////////////////////////////////////
//
if ($u != "") $login = "$u";
elseif ($login != "") $login = "$login";
else $login = "$PHNAME";
////////////////////////////////////////////
//// we select some from the ses and some from a static row.
////

$query = "select * from forum_users where username='$login'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$rowcc = mysql_fetch_array($result);


$poppers = $rowcc["poppers"]; // 
$autorefresh = $rowcc["autorefresh"]; //
$chatlines = $rowcc["chatlines"]; //
//
//
//
// POP MESSAGE INSERT
//////////////////


$locomo = getcwd();


if (preg_match("/casino/i","$locomo"))
{
$poppers = "no";
}
elseif (preg_match("/options/i","$locomo"))
{
$poppers = "no";
}
else
{
$poppers = "$poppers";
}


if ($ses != "")
{

if ($poppers == "yes")
{

if ($popflag == "yes")
{
$_GET["popflag"] = "$popflag";
$_GET["act"] = "$act";
$_GET["popmessage"] = "$popmessage";
$_GET["popid"] = "$popid";
$_GET["ses"] = "$ses";
$_GET["sendto"] = "$sendto";
$_GET["activity"] = "$activity";
$_GET["tid"] = "$tid";
$_GET["page"] = "$page";
$_GET["pagego"] = "$pagego";
$_GET["forum"] = "$forum";
$_GET["cat"] = "$cat";
$_GET["pid"] = "$pid";
$_GET["mid"] = "$mid";
$_GET["id"] = "$id";
$_GET["senduser"] = "$senduser";
$_GET["stringy"] = "$stringy";
$_GET["p"] = "$p";
$_GET["albumid"] = "$albumid";
$_GET["albumidb"] = "$albumidb";
$_GET["imid"] = "$imid";
$_GET["user"] = "$user";
$_GET["update"] = "$user";
$_GET["type"] = "$type";
$_GET["thatfile"] = "$thatfile";
$_GET["letters"] = "$letters";
$_GET["a"] = "$a";
$_GET["l"] = "$l";
$_GET["quid"] = "$quid";
$_GET["q"] = "$q";
$_GET["diff"] = "$diff";

include("popinsert.php");

}


}

}



////////////////////////////////////////////
header("Content-type: text/html; charset=utf-8");
header("Last-Modified: " . gmdate("D, dMYH:i:s") . " GMT");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");






$querychat = "SELECT * from chatinvites where recipient='$login'";
$resultchat = mysql_query($querychat);
$chatcounter = mysql_num_rows($resultchat);

$querypop = "SELECT * from poppers where userto='$login'";
$resultpop = mysql_query($querypop);
$popcounter = mysql_num_rows($resultpop);


$dualcounter = ($chatcounter + $popcounter);


if ($dualcounter < 1)
{

if ($currentFile == "inbox.php")
{
header("refresh: $autorefresh; url=$lback/mail/redir.php?ses=$ses");
}
if ($currentFile == "chat.php")
{
$roomid = $_GET["roomid"];
if ($roomid == "") $roomid = $_POST["roomid"];

$chatpass = $_GET["chatpass"];
if ($chatpass == "") $chatpass = $_POST["chatpass"];

header("refresh: $autorefresh; url=$lback/chat/refresh.php?ses=$ses&roomid=$roomid&chatpass=$chatpass");
}
if ($currentFile == "online.php")
{
header("refresh: $autorefresh");
}
}
/////////////////////////////////////////////
//
//
//
//
$avatar = $row_ses["avatar"];
////////////////////////////////////////////
// MOVED TO HTML 5, NO DOCTYPE DEFINITION REQUIRED, YAY!
////////////////////////////////////////////
//
//
echo "<?xml version='1.0'?>
<!DOCTYPE html PUBLIC \"-//WAPFORUM//DTD XHTML Mobile 1.0//EN\" \"http://www.wapforum.org/DTD/xhtml-mobile10.dtd\"><html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' ><head>";
//////////////////////
//
//
//// switches
//
$inbb = $rowcc["inbox"]; // inbox message pop up notification switch
$simages = "on"; // site images switch i.e. logos or buttons.
$sicn = "on"; // site icon switch
$mytheme = "on"; // theme switch
////////////////////////////////////////////
//// colour settings - to keep the site running smoothly, we must query these rather than taking them from the session.
//// but we only want them for css users.

if ($ses != "")
{
$bgcolo = $rowcc["bg_col"]; // background colour
$bgc = $rowcc["bg_col"]; // same as $bgcolo but a different variable name to cater for older pages
$textcolour = $rowcc["text_col"]; // text colour
$txt = $rowcc["text_col"]; // same as $textcolour but a different variable name to cater for older pages
$namecolour = $rowcc["my_color"]; // name colour
$cocol = $rowcc["my_color"]; // same as $namecolour but a different variable name to cater for older pages
$tr_col = $rowcc["tr_col"]; // table row colour [tables removed but still used!]
$tablecol = $rowcc["tr_col"]; // same as $tr_col but a different variable name to cater for older pages
$trdc = $rowcc["tr_col"]; // same as $tr_col but a different variable name to cater for older pages
$schnarf = $rowcc['schnarf_col']; // we needed a fifth colour!
}
else
{
$query_colors = "SELECT * FROM phoenix_themes where id='78'";
$result_colors = mysql_query("$query_colors");
$num_rowscolors = mysql_num_rows($result_colors);
$colours = mysql_fetch_array($result_colors);

$bgcolo = $colours["bg_col"]; // background colour
$bgc = $colours["bg_col"]; // same as $bgcolo but a different variable name to cater for older pages
$textcolour = $colours["text_col"]; // text colour
$txt = $colours["text_col"]; // same as $textcolour but a different variable name to cater for older pages
$namecolour = $colours["my_color"]; // name colour
$cocol = $colours["my_color"]; // same as $namecolour but a different variable name to cater for older pages
$tr_col = $colours["tr_col"]; // table row colour [tables removed but still used!]
$tablecol = $colours["tr_col"]; // same as $tr_col but a different variable name to cater for older pages
$trdc = $colours["tr_col"]; // same as $tr_col but a different variable name to cater for older pages
$schnarf = $colours['schnarf_col']; // we needed a fifth colour!
}




$txtsize = $rowcc['fontsize']; // screen font size
$adblock = $rowcc['adblock']; // screen font size
////////////////////////////////////////////
//// 
//// forum settings
$pmax = $row_ses["pmax"]; // maximum replies per page in forums
if ($pmax == "") $pmax = "20";
$tmax = $row_ses["tmax"]; // maximum posts per page in forums
if ($tmax == "") $tmax = "20";
////////////////////////////////////////////
//// 
//// visits and posts etc
$visits = $row_ses["visits"]; // amount of times a user has visited
$posts = $row_ses["visits"]; // amount of times a user has posted
$mystatus = $row_ses["mystatus"];


////////////////////////////////////////////
//// 
//// admin stuff
$group = $row_ses["userlevel"]; // user group. 1-admin 2-moderator 3-user
$trust = $row_ses["circle_of_trust"]; // circle of trust status
$owner = $row_ses["circle_of_trust"]; // site ownership status // Global means, set this to YES, all users are owners!
$bwmode = "off"; // 
/////////
///////////////////////////////////////////
$bottomright = "$namecolour";
$topleft = "$tr_col";
$bg2 = "$txt";
$fontfamily = "verdana";
////////////////////////////////////////////
////////////////////////////////////////////
$ismobile = mobile_device_detect($_SERVER["HTTP_USER_AGENT"]);


if ($ismobile == 1) $hwidth =  "auto;";
else $hwidth =  "1024px;";


if (preg_match("/Maemo/i",$_SERVER["HTTP_USER_AGENT"]))
{

$hwidth = "800px";

}



echo "<style type=\"text/css\">
<!--
hr {
color: $bgc;
background-color: $bgc;
padding: 0px;
height: 0px;
}

body{
background-color: $bgc;
font-size: $txtsize;
color: $bottomright;
font-family: $fontfamily; 
text-align:center; 
margin:0 auto; 
padding: 0px;
}

fieldset {
padding: 0px;
margin: 0px;
border-style: none;
}

a:link { color: $namecolour;}
a:visited { color: $namecolour; }
a:hover {color: $namecolour; }

hr {
padding: 0px;
line-height:0px;
height: 0px;
margin: 0px !important;
}

img {
border-style: none;
}

input, textarea, select
{
color: $bottomright;
border-style: solid;
border-width: 1pt;
border-color: $bottomright;
background: $topleft;
padding: 2pt;
}

.refresh {
color: $bottomright;
background: $topleft;
padding: 2px;
border-style: solid;
border-width: 1px;
: 1px;text-decoration: none;
}

.breakmenu {
background-color: $bg2;
padding: 1px;
margin: 0px;
color: $bgcolo;
font-family: $fontfamily; }

.break {
background-color: $bg2;
text-align: center;
padding: 1px;
margin: 0px;
color: $bottomright;
font-weight: bold;
font-family: $fontfamily; }

.forum {
background-color: $txt;
text-align: left;
color: $bgcolo;
font-family: $fontfamily;
padding: 0px;
margin: 0px;
text-align: left; }

div {
background-color: $topleft;
}

.breakforum {
background-color: $topleft;
border-style: inset;
border-width: 1px;
text-align: left;
font-weight: normal;
padding: 1px;
margin: 0px;
color: $bottomright;
font-family: $fontfamily; }

.lidisp {
    display: inline;
    float: left;
    width: 30%;
    height: 75px;
}
.beef {
    display: block;
    float: left;
    width: 32%;
    height: 100px;

}
.ligallery {
    display: inline;
    float: left;
    width: 32%;
}

.wrapper { 
text-align:left; /* reset text alignment */ 
vertical-align: top;
margin:0 auto; /* for the rest */ 
}

#Layer1 {
	width:$hwidth;
	z-index:1;
	left: 0px;
vertical-align: top;
	top: 0px;
	background-image: url('$lback/images/backgrounds/bglite.gif');
	background-color: #ffffff;
}
-->
</style>";


//
// let's make the welcome message scroll across the screen and assign a variable
//
//
// raw welcome message
$welcome = "$wwmsg";
//

$logo = "<img src=\"$logo_url\" alt=\"$sitename\"/>";

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

$rawerdate = "$time $dada/$momo/$yaya";
////////////////////////////////////////////
// decide what the page title should be...
//



if (preg_match("/threads/i",$_SERVER["SCRIPT_NAME"]))
{

$query = "SELECT author, subject from phoenix_topics WHERE id='$tid'";
$result =mysql_query($query);
$num_rows =mysql_num_rows($result);
$row = mysql_fetch_array($result);
	$aukx = $row["author"];
	$subx = $row["subject"];


echo "<title>Forum Topic - $subx by $aukx</title>";

}
elseif (preg_match("/viewer/i",$_SERVER["SCRIPT_NAME"]))
{
$query = "SELECT login, title from my_blog WHERE id='$id'";
$result =mysql_query($query);
$num_rows =mysql_num_rows($result);
$row = mysql_fetch_array($result);
	$aukx = $row["login"];
	$subx = $row["title"];


echo "<title>Blog Entry - $subx by $aukx</title>";

}
elseif (preg_match("/profile/i",$_SERVER["SCRIPT_NAME"]))
{
echo "<title>$user's profile</title>";

}
elseif (preg_match("/view/i",$_SERVER["SCRIPT_NAME"]))
{


$thatfile = base64_decode("$thatfile");


$exten = substr(strrchr($thatfile, "."), 1);
$exten = strtolower($exten);
$name = strtolower($thatfile);
$name = trim_ext($name);
$name = substr($name,0,25);
$name = trim_digits($name);
$name = str_replace("_"," ","$name");




if ($exten == "mp3")
{
$getID3 = new getID3; 

$ThisFileInfo = $getID3->analyze("$thatfile"); 

getid3_lib::CopyTagsToComments($ThisFileInfo); 


$sartist = @$ThisFileInfo['comments_html']['artist'][0];
$stitle = @$ThisFileInfo['tags']['id3v2']['title'][0];


echo "<title>Download - $sartist - $stitle</title>";
}
else
{
echo "<title>Download - $thatfile</title>";
}

}
else
{

echo "<title>$sitename</title>";

}




////////////////////////////////////////////

$msgsandposts = "$day $number $month $yaya @ $time";
$imgsdate = "$day $number $month $yaya";

// copyright info, to show who did all the work
//
$cp = "<small>$cpyright</small>";
////////////////////////////////////////////
// now we're getting the link addresses, again, nothing needs to be edited here!
//
////////////////////////////////////////////
// this seperates pages but only if css is off!
$breaker = "";
////////////////////////////////////////////
// hyfor, hyback and hyl are made to go on hyperlinks in the following format:
//
// forward/next link = $hyfor <a href=\"\"></a>
//
// back/previous/to the top link = $hyback <a href=\"\"></a>
//
// all other links = $hyl<a href=\"\"></a>$hyl
//
$hyl = "-";
$hyback = "&#171;";
$hyfor = "&#187;";



// the inbox link will appear on the page if a user has notification turned on and has one or more new messages
//
if ($group <= 3)
{

$query ="select count(*) from phoenix_mail where userto='$login' and read_state!=1 and bound!='out' and archive='no'";
$result = mysql_query($query);
$ims = number_format(mysql_result($result,0,"count(*)"));

$query ="select * from phoenix_mail where userto='$login' and read_state!=1 and bound!='out' and archive='no' ORDER BY stamp ASC LIMIT 1";
$result = mysql_query($query);
$qryow = mysql_fetch_array($result);


$miiid = $qryow['mid'];



if ($ses != "")
{

if ($inbb > 0)
{


$emaildo = $row_ses["doesemail"];

if ($emaildo == "yes")
{


$elogin = strtolower($row_ses["emailuser"]);
$epass = strtolower($row_ses["emailpass"]);

$mtype = "pop3";
$serverinput = "{mail.phoenixbytes.co.uk/notls}INBOX";
$userinput = "$elogin";
$emailinput = "$elogin";
$passinput = "$epass";

$conn = @imap_open("$serverinput", "$userinput", "$passinput");



$status = @imap_status($conn, $serverinput, SA_ALL); 
if ($status) 
{ 
$eall = "$status->messages"; 
$eunread = "$status->unseen"; 
}
}
else
{

}


if ($eunread < 1)
{
	if ($ims == 1)
	{
	$inboxes = "<br/><a accesskey=\"-\" href=\"$lback/mail/msg.php?ses=$ses&amp;mid=$miiid\"><img src=\"$lback/scripts/phoenix.php?login=$login&amp;string=$ims%20new%20message\" alt=\"$ims new msg\"/></a>";
	}
	if ($ims > 1)
	{
	$inboxes = "<br/><a accesskey=\"-\" href=\"$lback/mail/inbox.php?ses=$ses\"><img src=\"$lback/scripts/phoenix.php?login=$login&amp;string=$ims%20new%20messages\" alt=\"$ims new msgs\"/></a>";
	}
	if ($ims < 1)
	{
	$inboxes = "";
	}
}
else
{
	if ($eunread == 1)
	{
	$inboxes = "<br/><a accesskey=\"-\" href=\"$lback/mail/getmail.php?ses=$ses&amp;p=serv_1\"><img src=\"$lback/scripts/phoenix.php?login=$login&amp;string=$eunread%20new%20email\" alt=\"$eunread new email\"/></a>";
	}
	if ($eunread > 1)
	{
	$inboxes = "<br/><a accesskey=\"-\" href=\"$lback/mail/getmail.php?ses=$ses&amp;p=serv_1\"><img src=\"$lback/scripts/phoenix.php?login=$login&amp;string=$eunread%20new%20emails\" alt=\"$eunread new emails\"/></a>";
	}
}
}
}
}

// Now, we set our FUNCTIONS,
// because they don't occur naturally in php, we have to make them exist, let's go...
//




//
function make_wml_compat($string)
{
$string = ltrim($string);

$string = str_replace("©","~copy",$string);
$string = str_replace("®","~reg",$string);
$string = str_replace("\"","&quot;",$string);
$string = str_replace("---","'",$string);
$string = str_replace("-ampersand-","&amp;",$string);
$string = str_replace("-dquote-","\"",$string);
$string = str_replace("-squote-","'",$string);
$string = str_replace("-tilde-","~",$string);
$string = str_replace("-pound-","&#163;",$string);
$string = str_replace("-dollar-","?",$string);
$string = str_replace("Â£","£",$string);
$string = str_replace("icon:","=",$string);
$string = str_replace("-drop-","<br/>",$string);
$string = str_replace("¹","-1",$string);
$string = str_replace("²","-2",$string);
$string = str_replace("³","-3",$string);
$string = str_replace("&#8364;","-euro",$string);
$string = str_replace("~copy","&#169;",$string);
$string = str_replace("~reg","&#174;",$string);
$string = str_replace("~club","&#9827;",$string);
$string = str_replace("~spade","&#9824;",$string);
$string = str_replace("~heart","&#9829;",$string);
$string = str_replace("~diamond","&#9830;",$string);
$string = str_replace("~1","&#185;",$string);
$string = str_replace("~2","&#178;",$string);
$string = str_replace("~3","&#179;",$string);
$string = str_replace("~half","&#189;",$string);
$string = str_replace("~quart","&#188;",$string);
$string = str_replace("~euro","&#8364;",$string);
$string = str_replace("~dot","&#8226;",$string);

$curcharlength = strlen($string);
$outstring = $string;
for ($i = 0; $i <= ($curcharlength-1); $i++) {
$curchar = substr ($string,$i,1);
$ochar = ord($curchar);
if ($ochar > 122) {
$new = "&#x" . strtoupper(dechex($ochar)) . ";";
$outstring = str_replace($curchar,$new,$outstring);
}
if ($ochar < 32)
$outstring = str_replace($curchar,"", $outstring);
}

return $outstring;
}


function funk_it_up($string)
{
//
$ses = $_GET["ses"];


$xxxxx = "SELECT * from forum_users where ses='$ses'";
$yyyyy = mysql_query ("$xxxxx");
$loggie = mysql_fetch_array($yyyyy);
$login = $loggie["username"];

//


$string = str_replace("<","&lt;",$string);
$string = str_replace(">","&gt;",$string);


$query = "SELECT typed, image FROM phoenix_icons";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
while ($row)
{

$text = $row["typed"];
$icon = $row["image"];
$string = str_replace("icon:","=","$string");



$string = preg_replace( "#$text#", " <img align=\"middle\" style=\"border: none;\" src=\"$lback/images/sicn/$icon.gif\" alt=\"$icon\"/> ", $string );


$row = mysql_fetch_array($result);
}



$query = "SELECT id, login, title FROM my_blog";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
while ($row)
{

$myblogid = $row["id"];
$title = $row["title"];
$bowner = $row["login"];

$string = preg_replace( "#blog:$myblogid#is", "<a href=\"$lback/blog/viewer.php?ses=$ses&amp;user=$bowner&amp;id=$myblogid\">$title</a>", $string );

$row = mysql_fetch_array($result);
}





$query = "SELECT id, forum, author, subject FROM phoenix_topics";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
while ($row)
{

$tiddy = $row["id"];
$subjectus = $row["subject"];
$forumus = $row["forum"];
$authorus = $row["author"];


$string = preg_replace( "#topic:$tiddy#is", "<a href=\"$lback/forum/threads.php?ses=$ses&amp;forum=$forumus&amp;tid=$tiddy\">$subjectus by $authorus</a>", $string );

$row = mysql_fetch_array($result);
}

$string = str_replace("~euro","&#8364;",$string);
//$string = str_replace(chr(13),"<br/>",$string);
$string = str_replace(chr(10),"<br/>",$string);
$string = str_replace("===","<br/>",$string);

$string = str_replace("Sent on a phone using T9space.com","",$string);

//$string = str_replace("&#xB6;","<br/>",$string);
//$string = str_replace("&#xB5;","&nbsp;",$string);
//$string = " " . $string . " ";
//$string = str_replace("\n","<br/>",$string);
//$string = str_replace("\r","<br/>",$string);


// forum code

$string = preg_replace( "#id:([^<>[:space:]]+[[:alnum:]/])#is", "<img style=\"border: none;\" src=\"$lback/imgstor/imgcard.php?user=\\1\" alt=\"\\1's ID Card\"/>", $string);
$string = preg_replace( "#mail:([^<>[:space:]]+[[:alnum:]/])#is", "<a href=\"$lback/mail/index.php?ses=$ses&amp;senduser=\\1#bottom\">mail \\1</a>", $string );
$string = preg_replace( "#inbox:([^<>[:space:]]+[[:alnum:]/])#is", "<a href=\"$lback/mail/index.php?ses=$ses&amp;senduser=\\1#bottom\">mail \\1</a>", $string );
$string = preg_replace( "#myphoto:([^<>[:space:]]+[[:alnum:]/])#is", "<a href=\"$lback/imgstor/imgdisp.php?imid=\\1\"><img src=\"$lback/imgstor/imgtn.php?res=60&amp;imid=\\1\" alt=\"\\1\"/></a>", $string);
$string = preg_replace( "#phoenix:help#is", "<a href=\"$lback/about.php?ses=$ses&amp;act=about\">Help</a>", $string );
$string = preg_replace( "#call:([^<>[:space:]]+[[:alnum:]/])#is", "<a href=\"wtai://wp/mc;\\1\">Call \\1</a>", $string );
$string = preg_replace( "#pbook:([^<>[:space:]]+[[:alnum:]/])#is", "<a href=\"wtai://wp/ap;\\1;\">Save \\1</a>", $string );
$string = preg_replace( "#((Http|http|https|link|rtsp)://[^<>[:space:]]+[[:alnum:]/])#is", "<a href=\"$lback/getgone.php?ses=$ses&amp;outbound=\\1&amp;login=$login\">\\1</a>", $string );
$string = preg_replace( "#link:([^<>[:space:]]+[[:alnum:]/])#is", "<a href=\"$lback/getgone.php?ses=$ses&amp;outbound=\\1\">\\1</a>", $string );
$string = preg_replace( "#profile:([^<>[:space:]]+[[:alnum:]/])#is", "<a href=\"$lback/profile.php?user=\\1&amp;ses=$ses\">\\1</a>", $string );


// bbcode basics

$string = preg_replace( "#\[b\](.+?)\[/b\]#is", "<b>\\1</b>", $string );
$string = preg_replace( "#\(b\)(.+?)\(/b\)#is", "<b>\\1</b>", $string );
$string = preg_replace( "#\[br\](.+?)#is", "<br/>", $string );
$string = preg_replace( "#\(br\)(.+?)#is", "<br/>", $string );
$string = preg_replace( "#\[cp\](.+?)\[/cp\]#is", "<br/><small><b>C &amp; P:</b></small><br/><textarea rows=\"3\" cols=\"20\">\\1</textarea><br/>", $string );
$string = preg_replace( "#\[copy\](.+?)\[/copy\]#is", "<br/><small><b>C &amp; P:</b></small><br/><textarea rows=\"3\" cols=\"20\">\\1</textarea><br/>", $string );
$string = preg_replace( "#\[code\](.+?)\[/code\]#is", "<br/><small><b>[code]</b></small><br/><textarea rows=\"3\" cols=\"20\">\\1</textarea><br/><small><b>[/code]</b></small><br/>", $string );
$string = preg_replace( "#\[php\](.+?)\[/php\]#is", "<br/><small><b>&lt;?php</b></small><br/><textarea rows=\"3\" cols=\"20\">\\1</textarea><br/><small><b>?&gt;</b></small><br/>", $string );
$string = preg_replace( "#\[html\](.+?)\[/html\]#is", "<br/><small><b>&lt;html&gt;</b></small><br/><textarea rows=\"3\" cols=\"20\">\\1</textarea><br/><small><b>&lt;/html&gt;</b></small><br/>", $string );
$string = preg_replace( "#\[i\](.+?)\[/i\]#is", "<i>\\1</i>", $string );
$string = preg_replace( "#\[u\](.+?)\[/u\]#is", "<span style=\"text-decoration: underline;\">\\1</span>", $string );
$string = preg_replace( "#\[big\](.+?)\[/big\]#is", "<big><b>\\1</b></big>", $string );
$string = preg_replace( "#\[l\](.+?)\[/l\]#is", "<big>\\1</big>", $string );
$string = preg_replace( "#\[s\](.+?)\[/s\]#is", "<small>\\1</small>", $string );
$string = preg_replace( "#\[q\](.+?)\[/q\]#is", "<i>&#34;...\\1...&#34;</i>", $string );


// text colours

$string = preg_replace( "#\[red\](.+?)\[/red\]#is", "<span style=\"color: #FF0000;\">\\1</span>", $string );
$string = preg_replace( "#\[green\](.+?)\[/green\]#is", "<span style=\"color: #008000;\">\\1</span>", $string );
$string = preg_replace( "#\[yellow\](.+?)\[/yellow\]#is", "<span style=\"color: #FFFF00;\">\\1</span>", $string );
$string = preg_replace( "#\[orange\](.+?)\[/orange\]#is", "<span style=\"color: #FF9900;\">\\1</span>", $string );
$string = preg_replace( "#\[pink\](.+?)\[/pink\]#is", "<span style=\"color: #FF1493;\">\\1</span>", $string );
$string = preg_replace( "#\[blue\](.+?)\[/blue\]#is", "<span style=\"color: #0000FF;\">\\1</span>", $string );
$string = preg_replace( "#\[black\](.+?)\[/black\]#is", "<span style=\"color: #000000;\">\\1</span>", $string );
$string = preg_replace( "#\[white\](.+?)\[/white\]#is", "<span style=\"color: #FFFFFF;\">\\1</span>", $string );
$string = preg_replace( "#\[grey\](.+?)\[/grey\]#is", "<span style=\"color: #CCCCCC;\">\\1</span>", $string );
$string = preg_replace( "#\[cyan\](.+?)\[/cyan\]#is", "<span style=\"color: #00FFFF;\">\\1</span>", $string );
$string = preg_replace( "#\[purple\](.+?)\[/purple\]#is", "<span style=\"color: #800080;\">\\1</span>", $string );
$string = preg_replace( "#\[aqua\](.+?)\[/aqua\]#is", "<span style=\"color: #05E9FF;\">\\1</span>", $string );
$string = preg_replace( "#\[skyblue\](.+?)\[/skyblue\]#is", "<span style=\"color: #87CEEB;\">\\1</span>", $string );
$string = preg_replace( "#\[silver\](.+?)\[/silver\]#is", "<span style=\"color: #C0C0C0;\">\\1</span>", $string );
$string = preg_replace( "#\[greenyellow\](.+?)\[/greenyellow\]#is", "<span style=\"color: #ADFF2F;\">\\1</span>", $string );
$string = preg_replace( "#\[orchid\](.+?)\[/orchid\]#is", "<span style=\"color: #DA70D6;\">\\1</span>", $string );
$string = preg_replace( "#\[gold\](.+?)\[/gold\]#is", "<span style=\"color: #FFD700;\">\\1</span>", $string );
$string = preg_replace( "#\[goldenrod\](.+?)\[/goldenrod\]#is", "<span style=\"color: #DAA520;\">\\1</span>", $string );
$string = preg_replace( "#\[khaki\](.+?)\[/khaki\]#is", "<span style=\"color: #F0E68C;\">\\1</span>", $string );
$string = preg_replace( "#\[magenta\](.+?)\[/magenta\]#is", "<span style=\"color: #FF00FF;\">\\1</span>", $string );
$string = preg_replace( "#\[crimson\](.+?)\[/crimson\]#is", "<span style=\"color: #DC143C;\">\\1</span>", $string );
$string = preg_replace( "#\[sienna\](.+?)\[/sienna\]#is", "<span style=\"color: #A0522D;\">\\1</span>", $string );
$string = preg_replace( "#\[brown\](.+?)\[/brown\]#is", "<span style=\"color: #A52A2A;\">\\1</span>", $string );
$string = preg_replace( "#\[midnight\](.+?)\[/midnight\]#is", "<span style=\"color: #191970;\">\\1</span>", $string );
$string = preg_replace( "#\[lime\](.+?)\[/lime\]#is", "<span style=\"color: #00FF00;\">\\1</span>", $string );


// scrolling text

$string = preg_replace( "#\[scr\](.+?)\[/scr\]#is", "<marquee loop=\"800\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl\](.+?)\[/scl\]#is", "<marquee loop=\"800\" direction=\"left\">\\1</marquee>", $string );


// scrolling with colour right

$string = preg_replace( "#\[scr:purple\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#800080\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:red\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#FF0000\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:green\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#008000\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:yellow\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#FFFF00\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:blue\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#0000FF\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:orange\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#FF9900\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:pink\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#FF1493\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:white\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#FFFFFF\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:grey\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#CCCCCC\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:black\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#000000\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:cyan\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#00FFFF\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:aqua\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#05E9FF\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:skyblue\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#87CEEB\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:silver\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#C0C0C0\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:greenyellow\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#ADFF2F\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:orchid\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#DA70D6\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:gold\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#FFD700\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:goldenrod\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#DAA520\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:khaki\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#F0E68C\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:magenta\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#FF00FF\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:crimson\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#DC143C\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:sienna\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#A0522D\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:brown\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#A52A2A\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:midnight\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#191970\" direction=\"right\">\\1</marquee>", $string );
$string = preg_replace( "#\[scr:lime\](.+?)\[/scr\]#is", "<marquee loop=\"800\" bgcolor=\"#00FF00\" direction=\"right\">\\1</marquee>", $string );

// scrolling with colour left

$string = preg_replace( "#\[scl:purple\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#800080\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:red\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#FF0000\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:green\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#008000\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:yellow\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#FFFF00\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:blue\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#0000FF\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:orange\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#FF9900\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:pink\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#FF1493\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:white\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#FFFFFF\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:grey\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#CCCCCC\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:black\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#000000\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:cyan\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#00FFFF\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:aqua\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#05E9FF\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:skyblue\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#87CEEB\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:silver\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#C0C0C0\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:greenyellow\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#ADFF2F\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:orchid\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#DA70D6\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:gold\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#FFD700\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:goldenrod\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#DAA520\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:khaki\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#F0E68C\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:magenta\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#FF00FF\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:crimson\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#DC143C\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:sienna\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#A0522D\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:brown\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#A52A2A\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:midnight\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#191970\" direction=\"left\">\\1</marquee>", $string );
$string = preg_replace( "#\[scl:lime\](.+?)\[/scl\]#is", "<marquee loop=\"800\" bgcolor=\"#00FF00\" direction=\"left\">\\1</marquee>", $string );



// flashing text

$string = preg_replace( "#\[blink\](.+?)\[/blink\]#is", "<span style=\"text-decoration: blink;\">\\1</span>", $string );
$string = preg_replace( "#\[flash\](.+?)\[/flash\]#is", "<span style=\"text-decoration: blink;\">\\1</span>", $string );
$string = str_replace("<br/><br/><img","<br/><img",$string);
$string = trim($string);
return $string; 
}

////////////////////////
//
// strip bad stuff
//
function trim_ext($string)
{
$string = trim($string);
$string = str_replace(".gif","",$string);
$string = str_replace(".jpg","",$string);
$string = str_replace(".jpeg","",$string);
$string = str_replace(".mp3","",$string);
$string = str_replace(".wav","",$string);
$string = str_replace(".sis","",$string);
$string = str_replace(".zip","",$string);
$string = str_replace(".bmp","",$string);
$string = str_replace(".png","",$string);
$string = str_replace(".mid","",$string);
$string = str_replace(".amr","",$string);
$string = str_replace(".mp4","",$string);
$string = str_replace(".mpg","",$string);
$string = str_replace(".mpeg","",$string);
$string = str_replace(".txt","",$string);
$string = str_replace(".pdf","",$string);
$string = str_replace(".aac","",$string);
$string = str_replace(".wma","",$string);
$string = str_replace(".wmv","",$string);
$string = str_replace(".rar","",$string);
$string = str_replace(".tar","",$string);
$string = str_replace(".pdf","",$string);
$string = str_replace(".3gp","",$string);
$string = str_replace(".jar","",$string);
$string = str_replace(".jad","",$string);
$string = str_replace(".nok","",$string);
$string = trim($string);
return $string; 
}
/////////////////////////////////////
function mime_artist($string)
{
$string = trim($string);
$string = str_replace("gif","image",$string);
$string = str_replace("jpg","image",$string);
$string = str_replace("jpeg","image",$string);
$string = str_replace("mp3","audio",$string);
$string = str_replace("wav","audio",$string);
$string = str_replace("sis","symbian",$string);
$string = str_replace("zip","archive",$string);
$string = str_replace("mid","polytone",$string);
$string = str_replace("amr","audio",$string);
$string = str_replace("jar","java app",$string);
$string = str_replace("jad","java app",$string);
$string = str_replace("mp4","video",$string);
$string = str_replace("mpg","video",$string);
$string = str_replace("mpeg","video",$string);
$string = str_replace("txt","text file",$string);
$string = str_replace("pdf","adobe file",$string);
$string = str_replace("aac","audio",$string);
$string = str_replace("wma","audio",$string);
$string = str_replace("wmv","video",$string);
$string = str_replace("rar","archive",$string);
$string = str_replace("tar","archive",$string);
$string = str_replace("3gp","video",$string);
$string = str_replace("htm","web page",$string);
$string = str_replace("html","web page",$string);
$string = str_replace("wml","wap page",$string);
$string = str_replace("nok","nokia logo",$string);
$string = trim($string);
return $string; 
}
////////////////////////////
function trim_digits($string)
{
$string = trim($string);
$string = str_replace("1","",$string);
$string = str_replace("2","",$string);
$string = str_replace("3","",$string);
$string = str_replace("4","",$string);
$string = str_replace("5","",$string);
$string = str_replace("6","",$string);
$string = str_replace("7","",$string);
$string = str_replace("8","",$string);
$string = str_replace("9","",$string);
$string = str_replace("0","",$string);
$string = trim($string);
return $string; 
}
//////////////////////////////////
function make_upload_compat($string)
{
$string = trim($string);
$string = str_replace(" ","_",$string);
$string = str_replace("\.","_",$string);
$string = str_replace("&","-",$string);
$string = str_replace("\"","_",$string);
$string = str_replace("\\\"","",$string);
$string = str_replace("\\'","_",$string);
$string = str_replace("='","_",$string);
$string = str_replace("\+","",$string);
$string = str_replace("<","&lt;",$string);
$string = str_replace(">","&gt;",$string);
$string = str_replace("@","_",$string);
$string = str_replace("#","_",$string);
$string = str_replace("\*","_",$string);
$string = str_replace("©","-",$string);
$string = str_replace("®","-",$string);
$string = str_replace(".php",".error",$string);
$string = str_replace(".exe",".error",$string);
$string = str_replace(".cgi",".error",$string);
$string = str_replace(".html",".error",$string);
$string = str_replace(".js",".error",$string);
$string = str_replace(".jsp",".error",$string);
$string = str_replace(".htaccess",".error",$string);
$string = str_replace("\$","",$string);
$string = str_replace("\£","",$string);
$string = str_replace("\!","",$string);
$string = str_replace("\¡","",$string);
$string = str_replace("\§","",$string);
$string = str_replace("\\$","",$string);
$string = trim($string);
return $string; 
}
//////////////////////////////
function make_url_compat($string)
{
$string = ltrim($string);
$string = str_replace(" ","%20",$string);
$string = str_replace("&","%26;",$string);
$string = str_replace("\(","%28",$string);
$string = str_replace("\)","%29",$string);
$string = str_replace("<","%3C",$string);
$string = str_replace(">","%3E",$string);

$curcharlength = strlen($string);
$outstring = $string;
for ($i = 0; $i <= ($curcharlength-1); $i++) {
$curchar = substr ($string,$i,1);
$ochar = ord($curchar);
if ($ochar > 122) {
$new = "&#x" . strtoupper(dechex($ochar)) . ";";
$outstring = str_replace($curchar,$new,$outstring);
}
if ($ochar < 32)
$outstring = str_replace($curchar,"", $outstring);
}

return $outstring;
}


function numberinwords($number) 
{ 
    if (($number < 0) || ($number > 999999999)) 
    { throw new Exception("Number is out of range"); } 
    $Gn = floor($number / 1000000);  /* Millions (giga) */ 
    $number -= $Gn * 1000000; 
    $kn = floor($number / 1000);     /* Thousands (kilo) */ 
    $number -= $kn * 1000; 
    $Hn = floor($number / 100);      /* Hundreds (hecto) */ 
    $number -= $Hn * 100; 
    $Dn = floor($number / 10);       /* Tens (deca) */ 
    $n = $number % 10;               /* Ones */ 
    $res = ""; 
    if ($Gn) 
    { $res .= numberinwords($Gn) . " million"; } 
    if ($kn) 
    { $res .= (empty($res) ? "" : " ") . 
            numberinwords($kn) . " thousand"; } 
   if ($Hn) 
    { $res .= (empty($res) ? "" : " ") . 
            numberinwords($Hn) . " hundred"; } 
    $ones = array("", "one", "two", "three", "four", "five", "six", 
        "seven", "eight", "nine", "ten", "eleven", "twelve", "thirteen", 
        "fourteen", "fifteen", "sixteen", "seventeen", "eighteen", 
        "nineteen"); 
    $tens = array("", "", "twenty", "thirty", "forty", "fifty", "sixty", 
        "seventy", "eigthy", "ninety"); 
    if ($Dn || $n) 
    { if (!empty($res)) 
        { $res .= " and "; } 
        if ($Dn < 2) { $res .= $ones[$Dn * 10 + $n]; } else { $res .= $tens[$Dn]; 
  if ($n) { $res .= " " . $ones[$n]; } } }
    if (empty($res)) 
    { $res = "zero"; } 
 return $res; } 
//
/////////////////////////////////////////////////////
function chattime($date)
{
    if(empty($date)) {
        return "No date provided";
    }
    
    $periods         = array("s", "m", "hr", "d", "w", "m", "y", "dec");
    $lengths         = array("60","60","24","7","4.35","12","10");
    
    $now             = time();
    $unix_date         = strtotime($date);
    
       // check validity of date
    if(empty($unix_date)) {    
        return "Bad date";
    }

    // is it future date or past date
    if($now > $unix_date) {    
        $difference     = $now - $unix_date;
        $tense         = "ago";
        
    } else {
        $difference     = $unix_date - $now;
        $tense         = "ago";
    }
    
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }
    
    $difference = round($difference);
    
    if($difference != 1) {
        $periods[$j].= "";
    }
    
    return "$difference$periods[$j] {$tense}";
}
/////////////////////////////////////////////////////
function nicetime($date)
{
    if(empty($date)) {
        return "No date provided";
    }
    
    $periods         = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths         = array("60","60","24","7","4.35","12","10");
    
    $now             = time();
    $unix_date         = strtotime($date);
    
       // check validity of date
    if(empty($unix_date)) {    
        return "Bad date";
    }

    // is it future date or past date
    if($now > $unix_date) {    
        $difference     = $now - $unix_date;
        $tense         = "ago";
        
    } else {
        $difference     = $unix_date - $now;
        $tense         = "ago";
    }
    
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }
    
    $difference = round($difference);
    
    if($difference != 1) {
        $periods[$j].= "s";
    }
    
    return "$difference $periods[$j] {$tense}";
}
/////////////////////////////////////////////////////
// stats
//
//
function show_it_up($string)
{
//
$string = str_replace("<br/><br/><img","<br/><img",$string);
//
$string = trim($string);
return $string; 
}
//////////////
// site icons
//
//
function add_sicn($string)
{
$query = "SELECT name, forum, category FROM phoenix_forums";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
while ($row)
{

$forummy = $row["forum"];
$nammy = $row["name"];
$catty = $row["category"];

$string = str_replace("forum:$forummy", "<a href=\"$lback/forum/topics.php?forum=$forummy&amp;ses=$ses&amp;cat=$catty\">$nammy</a>", $string);
$row = mysql_fetch_array($result);
}


return $string;
}


function getsign($date){
     list($day,$month,$year)=explode("-",$date);
     if(($month==1 && $day>20)||($month==2 && $day<20)){
          return "aquarius"; // yes

     }else if(($month==2 && $day>19 )||($month==3 && $day<21)){
          return "pisces"; // yes

     }else if(($month==3 && $day>20)||($month==4 && $day<21)){
          return "aries"; // yes 

     }else if(($month==4 && $day>20)||($month==5 && $day<22)){
          return "taurus"; // yes 

     }else if(($month==5 && $day>21)||($month==6 && $day<22)){
          return "gemini"; // yes

     }else if(($month==6 && $day>21)||($month==7 && $day<24)){
          return "cancer"; // yes

     }else if(($month==7 && $day>23)||($month==8 && $day<24)){
          return "leo"; // yes 

     }else if(($month==8 && $day>23)||($month==9 && $day<24)){
          return "virgo"; // yes 

     }else if(($month==9 && $day>23)||($month==10 && $day<24)){
          return "libra"; // yes

     }else if(($month==10 && $day>23)||($month==11 && $day<23)){
          return "scorpio"; // yes 

     }else if(($month==11 && $day>22)||($month==12 && $day<22)){
          return "sagittarius"; // yes 

     }else if(($month==12 && $day>21)||($month==1 && $day<21)){
          return "capricorn"; // yes
     }
}






function getage($Birthdate)
{


        list($BirthDay,$BirthMonth,$BirthYear) = explode("-", $Birthdate);


  // Calculate Differences Between Birthday And Now
  // By Subtracting Birthday From Current Date
  $ddiff = date("d") - $BirthDay;
  $mdiff = date("m") - $BirthMonth;
  $ydiff = date("Y") - $BirthYear;

  // Check If Birthday Month Has Been Reached
  if ($mdiff < 0)
  {
    // Birthday Month Not Reached
    // Subtract 1 Year From Age
    $ydiff--;
  } elseif ($mdiff==0)
  {
    // Birthday Month Currently
    // Check If BirthdayDay Passed
    if ($ddiff < 0)
    {
      //Birthday Not Reached
      // Subtract 1 Year From Age
      $ydiff--;
    }
  }
  return $ydiff;
}



function getDirectorySize($path)
{
  $totalsize = 0;
  $totalcount = 0;
  $dircount = 0;
  if ($handle = opendir ($path))
  {
    while (false !== ($file = readdir($handle)))
    {
      $nextpath = $path . '/' . $file;
      if ($file != '.' && $file != '..' && !is_link ($nextpath))
      {
        if (is_dir ($nextpath))
        {
          $dircount++;
          $result = getDirectorySize($nextpath);
          $totalsize += $result['size'];
          $totalcount += $result['count'];
          $dircount += $result['dircount'];
        }
        elseif (is_file ($nextpath))
        {
          $totalsize += filesize ($nextpath);
          $totalcount++;
        }
      }
    }
  }
  closedir ($handle);
  $total['size'] = $totalsize;
  $total['count'] = $totalcount;
  $total['dircount'] = $dircount;
  return $total;
}

function sizeFormat($size)
{
    if($size<1024)
    {
        return $size."bytes";
    }
    else if($size<(1024*1024))
    {
        $size=round($size/1024,1);
        return $size."KB";
    }
    else if($size<(1024*1024*1024))
    {
        $size=round($size/(1024*1024),1);
        return $size."MB";
    }
    else
    {
        $size=round($size/(1024*1024*1024),1);
        return $size."GB";
    }

} 

///////////////////////////////////////////////////
//
$vyear = gmdate("Y");

$lIlIlIlI = "<a href=\"$lback/about.php?act=features\"><img align=\"middle\" src=\"$lback/images/phoenixbytes.gif\" alt=\"$sitename\"/></a>";
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
echo "</head><body id=\"Layer1\" class=\"wrapper\">";


if ($worknotice != "")
{
$worknotice = funk_it_up("$worknotice");
echo "<hr/><p class=\"breakforum\">$worknotice</p>";

}
else
{

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////// POPPERS!!!!!!!!!!!!!!!! ///////////////////////////////////////////////////////////////////////////////////

if ($currentFile != "options.php")
{
if ($poppers == "yes")
{
if ($ses != "")
{
include("popmsgx.php");
}
}
}


?>
