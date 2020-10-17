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

$forumto = $_GET['forumto'];
if ($forumto == "")
{ $forumto = $_POST['forumto']; }


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

$imgsdate = "$day $number $month $yaya";

///////////////////////////

$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];


$query = "SELECT * from forum_users where ses='$ses'";
$result = mysql_query ("$query");
$rowses = mysql_fetch_array($result);
$session = mysql_num_rows($result);

$login = $rowses['username'];





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





if ($session == 1)
{





if ($inserticon != "") $message = "$message === $inserticon";

/////////



$updir = $_SERVER['DOCUMENT_ROOT'];

$updir = "$updir/imgstor";




if ($inserticon != "") $msg = "$msg === $inserticon";



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

$updir = $_SERVER['DOCUMENT_ROOT'];

$updir = "$updir/imgstor";




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




$message = clean($message);

$subject = clean($subject);








//
//
///////////////////////////////////




if ($act == "topic")
	{	


if ($file != "")
{

if ($ext == "errorexec")

{
	$url = "./topics.php?ses=$ses&cat=$cat&forum=$forum&err=only%20gif%20or%20jpg%20images%20accepted%20-%20message%20not%20posted";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
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


if ($result != 1)
{
$url = "./topics.php?ses=$ses&cat=$cat&forum=$forum&err=only%20gif%20or%20jpg%20images%20accepted%20-%20message%20not%20posted";

header("HTTP/1.1 301 Moved Permanently");
header("Location: $url");
}
else
{


$message = "$message === myphoto:$imid";




	$query = "UPDATE forum_users set lastactive=now(), location='message board, posting a topic' where username='$author'";
        mysql_query($query);


	$query = "select * from phoenix_topics where subject='$message' AND author='$author'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$twooo = mysql_num_rows($result);
	if ($twooo >= 1) $hehe = "yes"; 


	$query = "select * from phoenix_posts where message='$message' AND author='$author'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$anyone = mysql_num_rows($result);
	if ($anyone >= 1) $hehe = "yes"; 


	$query = "select * from phoenix_topics where formkey='$formkey' AND author='$author'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$any = mysql_num_rows($result);
	if ($any >= 1) $hehe = "yes"; 


	if ($hehe == "yes") $message = "";

	if (empty($subject)) $subject = "[none]";
	if (empty($message)) $message = "";
	if ($message == "")
		{



		$url = "./topics.php?ses=$ses&cat=$cat&forum=$forum&err=sorry,%20you%20cannot%20post%20blank%20or%20duplicate%20messages.";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}

	if (isset($message) && isset($subject))
		{


		$query = "insert into phoenix_topics ( postdate, forum, author, subject, lastreply, my_color, formkey ) values ( '$msgsandposts', '$forum', '$author', '$subject', now(), '$color', '$formkey' )";
		$result = mysql_query($query);
		$tid = mysql_insert_id();
		if ($result == false)
		{
		$url = "./topics.php?ses=$ses&cat=$cat&forum=$forum&err=a%20database%20error%20has%20occured%20-%20message%20not%20posted";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}
		elseif ($result == true)
			{
			$query = "update phoenix_topics set readstate='1' where id=$tid AND author='$author'";
			mysql_query($query);


			$query = "insert into phoenix_posts ( postdate, tid, author, message, ugroup, my_color, stamp ) values ( '$msgsandposts', '$tid', '$author', '$message', '$group', '$color', now() )";
			$result = mysql_query($query);




			/// score - credit

			$query = "update forum_users set posts=posts+30, credits=credits+15 where username='$author'";
			mysql_query($query);

			///



$query = "UPDATE phoenix_forums set lastpost=now() where forum='$forum' AND type='forum'";
mysql_query($query);


				{

				$url = "./topics.php?ses=$ses&cat=$cat&forum=$forum&err=thanks%20-%20your%20topic%20has%20been%20added.";

				header("HTTP/1.1 301 Moved Permanently");
				header("Location: $url");
				exit;
				}
			}
		}
}

}



}






if ($file == "")
{




	$query = "UPDATE forum_users set lastactive=now(), location='Forums, Posting a topic' where username='$author'";
        mysql_query($query);

	$query = "select * from phoenix_topics where subject='$message' AND author='$author'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$twooo = mysql_num_rows($result);
	if ($twooo >= 1) $hehe = "yes"; 


	$query = "select * from phoenix_posts where message='$message' AND author='$author'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$anyone = mysql_num_rows($result);
	if ($anyone >= 1) $hehe = "yes"; 


	$query = "select * from phoenix_topics where formkey='$formkey' AND author='$author'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$any = mysql_num_rows($result);
	if ($any >= 1) $hehe = "yes"; 


	if ($hehe == "yes") $message = "";



	if (empty($subject)) $subject = "[none]";
	if (empty($message)) $message = "";
	if ($message == "")
		{
		$url = "./topics.php?ses=$ses&cat=$cat&forum=$forum&err=sorry,%20you%20cannot%20post%20blank%20or%20duplicate%20messages.";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}

	if (isset($message) && isset($subject))
		{


		$query = "insert into phoenix_topics ( postdate, forum, author, subject, lastreply, my_color, formkey ) values ( '$msgsandposts', '$forum', '$author', '$subject', now(), '$color', '$formkey' )";
		$result = mysql_query($query);
		$tid = mysql_insert_id();
		if ($result == false)
		{
		$url = "./topics.php?ses=$ses&cat=$cat&forum=$forum&err=a%20database%20error%20has%20occured%20-%20message%20not%20posted";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
			exit;
			}
			elseif ($result == true)
			{
			$query = "update phoenix_topics set readstate='1' where id=$tid AND author='$author'";
			mysql_query($query);





$query = "UPDATE phoenix_forums set lastpost=now() where forum='$forum' AND type='forum'";
mysql_query($query);


			$query = "insert into phoenix_posts ( postdate, tid, author, message, ugroup, my_color, stamp ) values ( '$msgsandposts', '$tid', '$author', '$message', '$group', '$color', now() )";
			$result = mysql_query($query);
			/// score - credit

			$query = "update forum_users set posts=posts+10, credits=credits+5 where username='$author'";
			mysql_query($query);

			///

				{

				$url = "./topics.php?ses=$ses&cat=$cat&forum=$forum&err=thanks%20-%20your%20topic%20has%20been%20added.";

				header("HTTP/1.1 301 Moved Permanently");
				header("Location: $url");
				exit;
				}
			}
		}
}
}



///////////////////////////////////////////////////////////////////////////////////////






if ($act == "newpoll")
{
$subject = clean($_POST["subjectpoll"]);
$message = clean($_POST["messagepoll"]);

$question1 = clean($_POST["question1"]);
$question2 = clean($_POST["question2"]);
$question3 = clean($_POST["question3"]);
$question4 = clean($_POST["question4"]);
$question5 = clean($_POST["question5"]);
$question6 = clean($_POST["question6"]);
$question7 = clean($_POST["question7"]);
$question8 = clean($_POST["question8"]);
$question9 = clean($_POST["question9"]);
$question0 = clean($_POST["question0"]);

$forum = $_POST["forum"];
$cat = $_POST["cat"];


$query = "select * from phoenix_topics where subject='$message' AND author='$author'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$twooo = mysql_num_rows($result);
if ($twooo >= 1) $hehe = "yes"; 


$query = "select * from phoenix_posts where message='$message' AND author='$author'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$anyone = mysql_num_rows($result);
if ($anyone >= 1) $hehe = "yes"; 


if ($subject == "") $hehe = "yes";
if ($message == "") $hehe = "yes";
if ($question1 == "") $hehe = "yes";
if ($question2 == "") $hehe = "yes";



if ($hehe != "yes")
{

//// poll subject inserted

$query3 = "insert into phoenix_polls ( login, title, meat, type ) values ( '$login', '$title', '$message', 'poll' )";
$result3 = mysql_query($query3);
$pollid = mysql_insert_id();


$query = "insert into phoenix_topics ( postdate, forum, author, subject, lastreply, my_color, formkey, type, pollid ) values ( '$msgsandposts', '$forum', '$author', '$subject', now(), '$color', '$formkey', 'poll', '$pollid' )";
$result = mysql_query($query);
$tid = mysql_insert_id();

			/// score - credit

			$query = "update forum_users set posts=posts+10, credits=credits+5 where username='$author'";
			mysql_query($query);

			///



$queryfvf = "update phoenix_topics set replies=1, lastreply=now(), lastreplyby='$login', readstate='0' where id=$tid limit 1";
$resultfvf = mysql_query($queryfvf);


$query = "update phoenix_topics set readstate='1' where id=$tid AND author='$author'";
mysql_query($query);

$query = "update forum_users set posts=posts+1 where username='$author'";
mysql_query($query);


$query = "UPDATE phoenix_forums set lastpost=now() where forum='$forum' AND type='forum'";
mysql_query($query);

if ($question1 != "")
{
$querya = "insert into phoenix_polls ( login, title, type, pollid) values ( '$login', '$question1', 'answer', '$pollid')";
$resulta = mysql_query("$querya");
}

if ($question2 != "")
{
$queryb = "insert into phoenix_polls ( login, title, type, pollid) values ( '$login', '$question2', 'answer', '$pollid')";
$resultb = mysql_query("$queryb");
}

if ($question3 != "")
{
$queryc = "insert into phoenix_polls ( login, title, type, pollid) values ( '$login', '$question3', 'answer', '$pollid')";
$resultc = mysql_query("$queryc");
}

if ($question4 != "")
{
$queryd = "insert into phoenix_polls ( login, title, type, pollid) values ( '$login', '$question4', 'answer', '$pollid')";
$resultd = mysql_query($queryd);
}


if ($question5 != "")
{
$querye = "insert into phoenix_polls ( login, title, type, pollid) values ( '$login', '$question5', 'answer', '$pollid')";
$resulte = mysql_query("$querye");
}

if ($question6 != "")
{
$queryf = "insert into phoenix_polls ( login, title, type, pollid) values ( '$login', '$question6', 'answer', '$pollid')";
$resultf = mysql_query("$queryf");
}

if ($question7 != "")
{
$queryg = "insert into phoenix_polls ( login, title, type, pollid) values ( '$login', '$question7', 'answer', '$pollid')";
$resultg = mysql_query("$queryg");
}

if ($question8 != "")
{
$queryh = "insert into phoenix_polls ( login, title, type, pollid) values ( '$login', '$question8', 'answer', '$pollid')";
$resulth = mysql_query("$queryh");
}

if ($question9 != "")
{
$queryi = "insert into phoenix_polls ( login, title, type, pollid) values ( '$login', '$question9', 'answer', '$pollid')";
$resulti = mysql_query("$queryi");
}

if ($question0 != "")
{
$queryj = "insert into phoenix_polls ( login, title, type, pollid) values ( '$login', '$question0', 'answer', '$pollid')";
$resultj = mysql_query("$queryj");
}



$url = "./topics.php?ses=$ses&cat=$cat&forum=$forum&err=thanks%20-%20your%20poll%20has%20been%20added.";

header("HTTP/1.1 301 Moved Permanently");
header("Location: $url");
exit;
}
else
{

$url = "./topics.php?ses=$ses&cat=$cat&forum=$forum&err=sorry,%20you%20cannot%20post%20blank%20or%20duplicate%20messages.";

header("HTTP/1.1 301 Moved Permanently");
header("Location: $url");
exit;

}
}







if ($act == "reply")
	{


if ($file != "")
{


if ($ext == "errorexec")

{

$url = "./threads.php?ses=$ses&page=$page&cat=$cat&forum=$forum&tid=$tid&err=only%20gif%20or%20jpg%20images%20accepted%20-%20message%20not%20posted";

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


$query = "insert into phoenix_imagestore ( login, image_ext, image_meat, albumname, dateadded, albumid, size, image_caption ) values ( '$login', '$ext', '$dbdata', '$albumtit', '$imgsdate', '$albumins', '$totalsize', '$icaption')";
$result = mysql_query($query);
$imid = mysql_insert_id();


$query2 = "UPDATE phoenix_imagealbums set lastact='$imgsdate', lastpic=$imid where login='$login' AND albumname='$albumtit'";
mysql_query($query2);


}
else
{
$result = "0";
}



if ($result != 1)
{
$url = "./threads.php?ses=$ses&page=$page&cat=$cat&forum=$forum&tid=$tid&err=only%20gif%20or%20jpg%20images%20accepted%20-%20message%20not%20posted";

header("HTTP/1.1 301 Moved Permanently");
header("Location: $url");
exit;
}
else
{


$message = "$message === myphoto:$imid";



        $query = "update forum_users set lastactive=now(), location='message board, posting a reply' where username='$author'";
        mysql_query($query);



	$query = "select * from phoenix_posts where message='$message' AND author='$author'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$beefour = mysql_num_rows($result);

	if ($beefour >= 1) $message = "";

	$query = "select * from phoenix_posts where formkey='$formkey' AND author='$author'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$beefee = mysql_num_rows($result);

	if ($beefee >= 1) $message = "";

	$query = "select * from phoenix_topics where id=$tid";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$hehe = $row["locked"];



	if ($hehe == "yes") $message = "";




	if (empty($message)) $message = "";
	if ($message == "")
		{

		$url = "./threads.php?ses=$ses&page=$page&cat=$cat&forum=$forum&tid=$tid&err=sorry,%20you%20cannot%20post%20blank%20or%20duplicate%20messages.";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");

		exit;
		}             
	if (isset($message))
		{




		$query = "select * from phoenix_topics where id=$tid";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		$weply = $row["replies"];
		$wubject = $row["subject"];
        		$reply = $weply+1;
		$query = "insert into phoenix_posts ( postdate, tid, reply, author, message, ugroup, my_color, stamp, formkey ) values ( '$msgsandposts', '$tid', '$reply', '$author', '$message', '$group', '$color', now(), '$formkey' )";
		$result = mysql_query($query);



		$query = "UPDATE phoenix_forums set lastpost=now() where forum='$forum' AND type='forum'";
		mysql_query($query);




			{

			$query = "update phoenix_topics set replies=replies+1, lastreply=now(), lastreplyby='$login', readstate='0' where id=$tid limit 1";
			$result = mysql_query($query);

			/// score - credit

			$query = "update forum_users set posts=posts+15, credits=credits+8 where username='$author'";
			mysql_query($query);

			///

			$query = "update phoenix_subscriptions set readstate='0', respondant='$author' where itemid=$tid";
			mysql_query($query);


			$url = "./threads.php?ses=$ses&page=$page&cat=$cat&forum=$forum&tid=$tid&err=thanks%20-%20your%20reply%20has%20been%20added.";

			header("HTTP/1.1 301 Moved Permanently");
			header("Location: $url");


			exit;
			}
		}
}

}



}






if ($file == "")
{




        $query = "update forum_users set lastactive=now(), location='message board, posting a reply' where username='$author'";
        mysql_query($query);

	$query = "select * from phoenix_posts where message='$message' AND author='$author'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$beefour = mysql_num_rows($result);

	if ($beefour >= 1) $message = "";

	$query = "select * from phoenix_posts where formkey='$formkey' AND author='$author'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$beefee = mysql_num_rows($result);

	if ($beefee >= 1) $message = "";

	$query = "select * from phoenix_topics where id=$tid";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$hehe = $row["locked"];




	if (empty($message)) $message = "";
	if ($message == "")
		{
		$url = "./threads.php?ses=$ses&page=$page&cat=$cat&forum=$forum&tid=$tid&err=sorry,%20you%20cannot%20post%20blank%20or%20duplicate%20messages.";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}             
	if (isset($message))
		{

		$query = "select * from phoenix_topics where id=$tid";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		$weply = $row["replies"];
		$wubject = $row["subject"];
        		$reply = $weply+1;
		$query = "insert into phoenix_posts ( postdate, tid, reply, author, message, ugroup, my_color, stamp, formkey ) values ( '$msgsandposts', '$tid', '$reply', '$author', '$message', '$group', '$color', now(), '$formkey' )";
		$result = mysql_query($query);

		$query = "UPDATE phoenix_forums set lastpost=now() where forum='$forum' AND type='forum'";
		mysql_query($query);

			{

			$query = "update phoenix_topics set replies=replies+1, lastreply=now(), lastreplyby='$login', readstate='0' where id=$tid limit 1";
			$result = mysql_query($query);
			/// score - credit

			$query = "update forum_users set posts=posts+5, credits=credits+3 where username='$author'";
			mysql_query($query);

			///
			$query = "update phoenix_subscriptions set readstate='0', respondant='$author' where itemid=$tid";
			mysql_query($query);


			$url = "./threads.php?ses=$ses&page=$page&cat=$cat&forum=$forum&tid=$tid&err=thanks%20-%20your%20reply%20has%20been%20added.";

			header("HTTP/1.1 301 Moved Permanently");
			header("Location: $url");
			exit;
			}
		}
}






}



///////////////////////////////////////////////////////////////////////////////////////




if ($act == "delrep")
		{

$pid = $_GET["pid"];
$tid = $_GET["tid"];
$forum = $_GET["forum"];




		if ($group < 2)
		{

		$query2= "DELETE FROM phoenix_posts WHERE id='$pid'";
		$result = mysql_query($query2);
		}
		else
		{

		$query2= "DELETE FROM phoenix_posts WHERE id='$pid' AND author='$login'";
		$result = mysql_query($query2);
		}


		if ($result > 0)
		{
		$query= "update phoenix_topics set replies=replies-1 WHERE id='$tid'";
		mysql_query($query);
		}


		$url = "./topics.php?ses=$ses&forum=$forum&err=reply%20$pid%20was%20deleted.";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}





if ($act == "elquote")
		{

$pid = $_GET["pid"];
$tid = $_GET["tid"];
$page = $_GET["page"];

$query = "SELECT * from phoenix_posts WHERE id='$pid'";
$result =mysql_query($query);
$num_rows =mysql_num_rows($result);
$row = mysql_fetch_array($result);
	
$msg = stripslashes($row["message"]);


		$quote = urlencode("$msg");
		$url = "./threads.php?ses=$ses&forum=$forum&tid=$tid&page=$page&quote=$quote";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}





if ($act == "enhance")
		{

$pid = $_GET["pid"];
$tid = $_GET["tid"];
$page = $_GET["page"];

$query = "SELECT * from phoenix_posts WHERE id='$pid'";
$result =mysql_query($query);
$num_rows =mysql_num_rows($result);
$row = mysql_fetch_array($result);
	
$enflag = "yes";


		$url = "./threads.php?ses=$ses&forum=$forum&tid=$tid&page=$page&enflag=$enflag#bottom";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}



if ($act == "enhancetopic")
		{

$pid = $_GET["pid"];
$tid = $_GET["tid"];
$page = $_GET["page"];

$query = "SELECT * from phoenix_posts WHERE id='$pid'";
$result =mysql_query($query);
$num_rows =mysql_num_rows($result);
$row = mysql_fetch_array($result);
	
$enflag = "yes";


		$url = "./topics.php?ses=$ses&forum=$forum&tid=$tid&page=$page&enflag=$enflag#bottom";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}


if ($act == "edit")
		{

$mid = $_GET["mid"];
if ($mid == "") $mid = $_POST["$mid"];

$tid = $_GET["tid"];
if ($tid == "") $tid = $_POST["$tid"];

$page = $_GET["page"];
if ($page == "") $page = $_POST["$page"];

$forum = $_GET["forum"];
if ($forum == "") $forum = $_POST["$forum"];




		if ($group < 2)
		{

		$query= "update phoenix_posts set message='$message' WHERE id='$mid'";
		mysql_query($query);
		}
		else
		{	
		$query= "update phoenix_posts set message='$message' WHERE id='$mid' AND author='$login'";
		mysql_query($query);
		}

		$url = "./threads.php?ses=$ses&forum=$forum&tid=$tid&page=$page&err=message%20edited";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}










if ($act == "subscribe")
		{
$query = "insert into phoenix_subscriptions ( username, itemid, readstate, type ) values ( '$login', '$tid', '1', 'topic' )";
$result = mysql_query($query);
		

		$url = "./topics.php?ses=$ses&forum=$forum&err=you%20are%20now%20subscribed%20to%20this%20topic.";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}


if ($act == "unsubscribe")
		{

		$queru= "DELETE FROM phoenix_subscriptions WHERE itemid='$tid'";
		mysql_query($queru);
		

		$url = "./topics.php?ses=$ses&forum=$forum&err=you%20are%20no%20longer%20subscribed%20to%20this%20topic.";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}





if ($group < 2)
{


if ($act == "close")
		{
		$query= "update phoenix_topics set locked='yes' WHERE id='$tid'";
		mysql_query($query);
		

		$url = "./topics.php?ses=$ses&forum=$forum&err=topic%20$tid%20was%20locked.";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}


if ($act == "unlock")
		{
		$query= "update phoenix_topics set locked='no' WHERE id='$tid'";
		mysql_query($query);

		
		$url = "./topics.php?ses=$ses&forum=$forum&err=topic%20$tid%20was%20unlocked.";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}

if ($act == "movepost")
		{
		$query= "update phoenix_topics set forum='$forumto' WHERE id='$tid'";
		mysql_query($query);

		
		$url = "./topics.php?ses=$ses&forum=$forum&err=topic%20$tid%20was%20moved.";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}


if ($act == "stickify")
		{
		$query= "update phoenix_topics set sticky=1 WHERE id='$tid'";
		mysql_query($query);

		
		$url = "./topics.php?ses=$ses&forum=$forum&err=topic%20$tid%20was%20made%20sticky.";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}


if ($act == "release")
		{
		$query= "update phoenix_topics set sticky=0 WHERE id='$tid'";
		mysql_query($query);

		

		$url = "./topics.php?ses=$ses&forum=$forum&err=topic%20$tid%20is%20no%20longer%20sticky.";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}



if ($act == "del")
		{



		$query = "SELECT count(*) from phoenix_forums where lastpostid=$tid";
		$result = mysql_query($query);
		$countofids = number_format(mysql_result($result,0,"count(*)"));

		if ($countofids > 0)
		{

		$query = "SELECT * from phoenix_forums where lastpostid='$tid'";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		$forage = $row['forum'];


		$query = "UPDATE phoenix_forums set lastpost='' where forum='$forage'";
       		mysql_query($query);
		$query = "UPDATE phoenix_forums set lastpostby='' where forum='$forage'";
       		mysql_query($query);
		$query = "UPDATE phoenix_forums set lastpostid='' where forum='$forage'";
       		mysql_query($query);
		}

		$queryggg = "SELECT * from phoenix_topics WHERE id='$tid'";
		$resultggg =mysql_query($queryggg);
		$rowggg = mysql_fetch_array($resultggg);
		$pollid = $rowggg["pollid"];
		$type = $rowggg["type"];

		if ($type == "poll")
		{
		$queryr= "DELETE FROM phoenix_polls WHERE id='$pollid'";
		mysql_query($queryr);

		$queryt= "DELETE FROM phoenix_polls WHERE pollid='$pollid'";
		mysql_query($queryt);

		$queru= "DELETE FROM phoenix_polls_voters WHERE pollid='$pollid'";
		mysql_query($queru);
		}

		$query= "DELETE FROM phoenix_topics WHERE id='$tid'";
		mysql_query($query);

		$query2= "DELETE FROM phoenix_posts WHERE tid='$tid'";
		mysql_query($query2);






		$url = "./topics.php?ses=$ses&forum=$forum&err=topic%20$tid%20was%20deleted.";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}
}
else
{

		$url = "./topics.php?ses=$ses&forum=$forum&err=error%20-%20you%20are%20not%20admin";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;

}




}
else
{
	$url = "../index.php?ses=$ses&msg=1";



	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
}




?>
