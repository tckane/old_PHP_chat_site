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
$query = "SELECT * from forum_users where ses='$ses'";
$result = mysql_query ("$query");
$rowses = mysql_fetch_array($result);
$session = mysql_num_rows($result);

$login = $rowses['username'];





$author = $rowses["username"];
$group = $rowses["userlevel"];
$color = $rowses["my_color"];

$camefrom = $_POST["camefrom"];

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


$query = "select * from forum_users where username='$friend'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$rowff = mysql_fetch_array($result);

$usermates = $rowff['myfriends'];


$str = "$friend";
$str = strtolower($str);


$str2 = "$login";
$str2 = strtolower($str2);

if ( $act == "add") 

{

if (($str) == ($str2))
	{
	$urlmsg = urlencode("you can't add yourself to your own friends list!");
	$url = "./index.php?cat=$cat&forum=$forum&msg=$urlmsg&ses=$ses";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");

	exit;
	}


elseif ($usermates == "off")
	{
	$urlmsg = urlencode("$friend is not accepting friends requests.");
	$url = "./index.php?cat=$cat&forum=$forum&msg=$urlmsg&ses=$ses";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");

	exit;
	}


elseif (empty($str)) $str == "";

if ($str == "")
	{
	$urlmsg = urlencode("you didn't type anything!, please try again.");
	$url = "./index.php?cat=$cat&forum=$forum&msg=$urlmsg&ses=$ses";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");

	exit;
	}

elseif ($str != "")
	{


	// get the info in friends table

	$step1 = "select * from friends where friendname='$str' and username='$login'";
	$step2 = mysql_query($step1);



	// check the number of rows to see if the friend already exists

	$step3 = mysql_num_rows($step2);




	// if there is one added already we show an error

	if ($step3 >= 1)
		{
	$urlmsg = urlencode("you have already sent a request to this user, please check your list and try again.");
	$url = "./index.php?cat=$cat&forum=$forum&msg=$urlmsg&ses=$ses";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}


	// if there is not match, DO IT!! (what ever it is you want to do)

	elseif ($step3 < 1)
		{
	$query_insert = " INSERT INTO friends ( username, friendname, myrequest ) VALUES ( '$login', '$friend', '1' )";
	$result = mysql_query("$query_insert");

	$urlmsg = urlencode("a request was sent to $friend, you'll be able to see each other when $friend accepts your request.");
	$url = "./index.php?cat=$cat&forum=$forum&msg=$urlmsg&ses=$ses";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}

	}
}

#=============================

if ( $act == "accept") 



	{

	$query="UPDATE friends set myrequest=0 WHERE friendname='$login' and username='$name'";
	mysql_query($query);


	$qur = "select * from friends where friendname='$name' and username='$login'";
	$res = mysql_query($qur);
	$do = mysql_num_rows($res);


		if ($do < 1)
		{
		$query_insert ="INSERT INTO friends ( username, friendname, myrequest, my_color ) VALUES ( '$login', '$name', '0', '$color' )";
		$result = mysql_query("$query_insert");
		}

	$urlmsg = urlencode("$name will now appear on your list, they'll see you too.");


	$url = "./index.php?cat=$cat&forum=$forum&msg=$urlmsg&ses=$ses";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");

	exit;
	}


#=============================

if ( $act == "decline") 



	{
	$query="DELETE FROM friends WHERE username='$name' AND friendname='$login'";
	mysql_query($query);

	$query="DELETE FROM friends WHERE username='$login' AND friendname='$name'";
	mysql_query($query);

	$urlmsg = urlencode("$name's request was rejected.");
	$url = "./index.php?cat=$cat&forum=$forum&msg=$urlmsg&ses=$ses";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");

	exit;
	}




if ( $act == "delete") 



	{


	$query="DELETE FROM friends WHERE username='$login' AND friendname='$name'";
	mysql_query($query);

	$query="DELETE FROM friends WHERE username='$name' AND friendname='$login'";
	mysql_query($query);


	$urlmsg = urlencode("you deleted $name.");
	$url = "./index.php?cat=$cat&forum=$forum&msg=$urlmsg&ses=$ses";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");

	exit;
	}


if ( $act == "delall") 



	{


	$query="DELETE FROM friends WHERE username='$login'";
	mysql_query($query);

	$query="DELETE FROM friends WHERE friendname='$login'";
	mysql_query($query);


	$urlmsg = urlencode("you deleted everyone!");
	$url = "./index.php?cat=$cat&forum=$forum&msg=$urlmsg&ses=$ses";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");

	exit;
	}

#=============================

if ( $act == "mymood") 


	{
	$mood = clean("$mood");
	$query = "update forum_users set mystatus='$mood' where username='$login'";
	mysql_query($query);

	$urlmsg = urlencode("your status was updated.");

	if ($camefrom == "mainmenu")
	{
	$url = "../mainmenu.php?ses=$ses";
	}
	else
	{
	$url = "./index.php?cat=$cat&forum=$forum&msg=$urlmsg&ses=$ses";
	}
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}



#=============================

if ( $act == "myprivate") 


	{
	$query = "update friends set privatealbums='yes' where username='$login' AND friendname='$friend'";
	mysql_query($query);

	$query = "update friends set privatealbums='yes' where friendname='$login' AND username='$friend'";
	mysql_query($query);

	$urlmsg = urlencode("Private Photo Album access given to $friend");
	$url = "./index.php?cat=$cat&forum=$forum&msg=$urlmsg&ses=$ses";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}


#=============================

if ( $act == "noprivate") 


	{
	$query = "update friends set privatealbums='no' where username='$login' AND friendname='$friend'";
	mysql_query($query);

	$query = "update friends set privatealbums='no' where friendname='$login' AND username='$friend'";
	mysql_query($query);

	$urlmsg = urlencode("Private Photo Album access removed from $friend");
	$url = "./index.php?cat=$cat&forum=$forum&msg=$urlmsg&ses=$ses";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}





#=============================

if ($act == "shortcuts")
		{

$shortcut = $_GET["shortcut"];

		

		if ($shortcut == "" || $shortcut =="shortcuts") $url = "./index.php?ses=$ses";
		if ($shortcut == "forums") $url = "../forum/forums.php?ses=$ses";
		if ($shortcut == "options") $url = "../options/index.php?ses=$ses";
		if ($shortcut == "lounge") $url = "../chat/enter.php?ses=$ses&roomid=1";
		if ($shortcut == "chat") $url = "../chat/index.php?ses=$ses";
		if ($shortcut == "mailbox") $url = "../mail/index.php?ses=$ses";
		if ($shortcut == "uploader") $url = "../uploader/files.php?ses=$ses";
		if ($shortcut == "albums") $url = "../imgstor/index.php?ses=$ses";
		if ($shortcut == "online") $url = "../extras/online.php?ses=$ses";


		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}
?>

