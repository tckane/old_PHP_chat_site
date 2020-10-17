<?php



include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/config.php');
include('../scripts/functions.php');
include('../scripts/main.php');
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





$title = clean("$title");

$blog = clean("$blog");









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









////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($inserticon != "") $blog = "$blog === $inserticon";

///////////////////////////////////////////////////////////////////////
///// PULL IN UPLOADER!
///////////////////////////////////////////////////////////////////////

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



///////////////////////////////////////////////////////////////////////
///// PULL IN UPLOADER!
///////////////////////////////////////////////////////////////////////







if ($act == "insert") 
	{




if ($file != "")
{



if ($ext == "errorexec")

{

	$url = "./index.php?ses=$ses&act=index&user=$user&err=only%20gif%20or%20jpg%20images%20accepted%20-%20blog%20update%20failed";

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
	$url = "./index.php?ses=$ses&act=index&user=$user&err=only%20gif%20or%20jpg%20images%20accepted%20-%20blog%20update%20failed";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
}
else
{


$blog = "$blog === myphoto:$imid";



    if (isset($updated) && isset($title) && isset($blog))
	{
        $query="INSERT INTO my_blog ( date, title, blog, login, my_color ) values ( '$updated', '$title', '$blog', '$login', '$color' )";
        mysql_query($query);
        

			/// score - credit

			$query = "update forum_users set posts=posts+30, credits=credits+15 where username='$login'";
			mysql_query($query);

			///

	$url = "./index.php?ses=$ses&act=index&user=$user&err=thanks%20-%20your%20blog%20was%20updated";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}
}

}



}



if ($file == "")
{



    if (isset($updated) && isset($title) && isset($blog))
	{




        $query="INSERT INTO my_blog ( date, title, blog, login ) values ( '$updated', '$title', '$blog', '$login' )";
        mysql_query($query);
        

			/// score - credit

			$query = "update forum_users set posts=posts+10, credits=credits+5 where username='$login'";
			mysql_query($query);

			///


	$url = "./index.php?ses=$ses&act=index&user=$user&err=thanks%20-%20your%20blog%20was%20updated";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	}


}
}

if ($act == "delete") 

		{
		$query= "DELETE FROM my_blog WHERE id='$id' AND login='$login'";
		mysql_query($query);

		$query= "DELETE FROM phoenix_comments WHERE blogid='$id'";
		mysql_query($query);
		
	$url = "./index.php?ses=$ses&act=index&user=$user&err=blog%20entry%20deleted";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
		}


#========================================================================


if ($act == "update") 

	{


if ($file != "")
{



if ($ext == "errorexec")

{

	$url = "./index.php?ses=$ses&act=index&user=$user&err=only%20gif%20or%20jpg%20images%20accepted%20-%20blog%20update%20failed";

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
	$url = "./index.php?ses=$ses&act=index&user=$user&err=only%20gif%20or%20jpg%20images%20accepted%20-%20blog%20update%20failed";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
}
else
{


$blog = "$blog === myphoto:$imid";



        $query="update my_blog set blog='$blog', title='$title' where id=$id";
        mysql_query($query);

	$url = "./index.php?ses=$ses&act=index&user=$user&err=thanks%20-%20your%20blog%20was%20updated";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
}

}



}






if ($file == "")
{



        $query="update my_blog set blog='$blog', title='$title' where id=$id";
        mysql_query($query);

	$url = "./index.php?ses=$ses&act=index&user=$user&err=thanks%20-%20your%20blog%20was%20updated";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;


}


}



if ($act == "enhancenew")
		{

$enflag = "yes";



		$url = "./add.php?ses=$ses&enflag=$enflag&id=$id&act=add&user=$login#bottom";

		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}




if ($act == "enhanceedit")
		{

$enflag = "yes";

$id = $_GET["id"];

$update = $_GET["update"];


		$url = "./add.php?ses=$ses&enflag=$enflag&id=$id&act=sortit&update=$update#bottom";

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
