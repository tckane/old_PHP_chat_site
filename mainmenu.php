<?php

include('./scripts/header.php');
include('./scripts/session.php');
include('./scripts/config.php');
include('./scripts/functions.php');
include('./scripts/main.php');


$login = $row_ses["username"];
$simages = $row_ses["simages"];
$group = $row_ses["userlevel"];
$proviews = $row_ses["profilevisits"];
$posts = $row_ses["posts"];
$tittlea = $row_ses["title"];
$credits = $row_ses["credits"];
$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];


$delinvite = $_GET["delinvite"];
if ($delinvite == "") $delinvite = $_POST["delinvite"];

$invitefrom = $_GET["invitefrom"];
if ($invitefrom == "") $invitefrom = $_POST["invitefrom"];



$roomid = $_GET["roomid"];
if ($roomid == "") $roomid = $_POST["roomid"];

$getcwd = getcwd();

// file count
$path = "$getcwd/uploader/";
$arg=getDirectorySize($path);
$fcounter = $arg['count'];


$querychat = "SELECT * from forum_users where lastactive > DATE_ADD(NOW(), INTERVAL -$interval MINUTE) and location='chat'";
$resultchat = mysql_query($querychat);
$numchat = mysql_num_rows($resultchat);




// birthday greeting anyone?

$mydob = $row_ses["age"];

list($BirthDay,$BirthMonth,$BirthYear) = explode("-", $mydob);


  // Calculate Differences Between Birthday And Now
  // By Subtracting Birthday From Current Date
  $ddiff = date("d") - $BirthDay;
  $mdiff = date("m") - $BirthMonth;



$queryt="select count(*) from phoenix_topics where forum!='adminx1'";
$resultt = mysql_query($queryt);
$forumtopics = number_format(mysql_result($resultt,0,"count(*)"));

$queryp="select count(*) from phoenix_posts";
$resultp = mysql_query($queryp);
$forumposts = number_format(mysql_result($resultp,0,"count(*)"));







if ($ddiff == 0 && $mdiff == 0) $birthdayfodder = "<br/><big>Happy Birthday!<br/>Many happy returns from all at $sitename!</big>";


$query = "SELECT count(*) from forum_users WHERE lastactive > DATE_ADD(NOW(), INTERVAL -$interval MINUTE) and location!='offline'";
$result =mysql_query($query);
$row2 =mysql_fetch_array($result);
$countonline = $row2[0];


$act_query = "UPDATE forum_users set lastactive=now(), location='main menu', room='' where username='$login'";
mysql_query($act_query);
$query = "UPDATE friends set lastactive=now(), location='main menu', room='' where friendname='$login'";
mysql_query($query);

$queryimages = "SELECT * from phoenix_imagestore where login='$login'";
$resultimages = mysql_query("$queryimages");
$countimages = mysql_num_rows($resultimages);



$queryblog = "SELECT * from my_blog where login='$login'";
$resultblog = mysql_query("$queryblog");
$countblog = mysql_num_rows($resultblog);


$queryi="select count(*) from phoenix_mail where userto='$login' and read_state!=1 and bound!='out' and archive='no'";
$resulti = mysql_query($queryi);
$ims = number_format(mysql_result($resulti,0,"count(*)"));
if ($ims == 1) $inboxs = "new msg";
elseif ($ims > 1) $inboxs = "new msgs";
else $inboxs = "messaging";


$query ="select * from phoenix_mail where userto='$login' and read_state!=1 and bound!='out' and archive='no' ORDER BY stamp ASC LIMIT 1";
$result = mysql_query($query);
$qrow = mysql_fetch_array($result);

$mid = $qrow['mid'];


////// NEWS ////////////////////////////////////////////////////////////////////////



$querytopics = "select * from phoenix_topics where author='$login' AND readstate='0' AND lastreplyby!='$login' ORDER BY id DESC LIMIT 1";
$resulttopics = mysql_query($querytopics);
$countntopics = mysql_num_rows($resulttopics);
$commenttopics = mysql_fetch_array($resulttopics);

$tiddle = $commenttopics["id"];
$xforum = $commenttopics["forum"];
$lrepp = $commenttopics["lastreplyby"];
$subbage = stripslashes($commenttopics["subject"]);

if ($countntopics > 0)
{
$topicnews = "<b><a href=\"./profile.php?ses=$ses&amp;user=$lrepp\">$lrepp</a></b> replied to your topic <b>&quot;<a href=\"./forum/threads.php?ses=$ses&amp;tid=$tiddle&amp;forum=$xforum\">$subbage</a>&quot;</b>.<br/>";
}
else
{ }


$querypro = "select * from phoenix_comments where profile='$login' AND type='profile' AND readstate='0' AND username!='$login' ORDER BY id DESC LIMIT 1";
$resultpro = mysql_query($querypro);
$countcompro = mysql_num_rows($resultpro);
$commentpro = mysql_fetch_array($resultpro);

$prouser = $commentpro["username"];

if ($countcompro > 0)
{
$procommentnews = "<b><a href=\"./profile.php?ses=$ses&amp;user=$prouser\">$prouser</a></b> commented on your <b><a href=\"./profile.php?ses=$ses&amp;user=$login\">profile</a></b>.<br/>";
}
else
{ }




$queryblo = "select * from phoenix_comments where profile='$login' AND type='blog' AND readstate='0' AND username!='$login' ORDER BY id DESC LIMIT 1";
$resultblo = mysql_query($queryblo);
$countcomblo = mysql_num_rows($resultblo);
$commentblo = mysql_fetch_array($resultblo);

$blouser = $commentblo["username"];
$blogid = $commentblo["blogid"];

if ($countcomblo > 0)
{
$blocommentnews = "<b><a href=\"./profile.php?ses=$ses&amp;user=$blouser\">$blouser</a></b> commented on your <b><a href=\"./blog/viewer.php?ses=$ses&amp;id=$blogid\">blog</a></b>.<br/>";
}
else
{ }



$querysub = "select * from phoenix_subscriptions where username='$login' AND type='topic' AND readstate='0' AND respondant!='$login' ORDER BY id DESC LIMIT 1";
$resultsub = mysql_query($querysub);
$countcomsub = mysql_num_rows($resultsub);
$commentsub = mysql_fetch_array($resultsub);

$subuser = $commentsub["respondant"];
$topicid = $commentsub["itemid"];

$topicsubject = $commentsub["description"];

if ($countcomsub > 0)
{

$subtopical = "select * from phoenix_topics where id='$topicid' ORDER BY id DESC LIMIT 1";
$resultsub = mysql_query($subtopical);
$fetchtopical = mysql_fetch_array($resultsub);

$subsub = stripslashes($fetchtopical["subject"]);
$subforum = $fetchtopical["itemid"];
$subauthor = $fetchtopical["author"];


$subscriptionews = "<b><a href=\"./profile.php?ses=$ses&amp;user=$subuser\">$subuser</a></b> replied to <b><a href=\"./forum/threads.php?ses=$ses&amp;forum=$subforum&amp;tid=$topicid\">$subsub</a></b> by <b><a href=\"./profile.php?ses=$ses&amp;user=$subauthor\">$subauthor</a></b>.<br/>";
}
else
{ }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




$queryr = "select * from friends where friendname='$login' AND myrequest='1' order by id asc limit 1";
$resultr = mysql_query($queryr);
$frequests = mysql_num_rows($resultr);
$fetchmate = mysql_fetch_array($resultr);

$frequester = $fetchmate["username"];



if ($frequests > 0)
{
$friendnews = "<b><a href=\"./profile.php?ses=$ses&amp;user=$phouser\">$frequester</a></b> wants to add you as a friend! <b><a href=\"./friends/options.php?ses=$ses&amp;act=decide&amp;name=$frequester\">review request</a></b>.<br/>";
}
else
{ }






////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////









$querypho = "select * from phoenix_comments where profile='$login' AND type='photo' AND readstate='0' AND username!='$login' ORDER BY id DESC LIMIT 1";
$resultpho = mysql_query($querypho);
$countcompho = mysql_num_rows($resultpho);
$commentpho = mysql_fetch_array($resultpho);

$phouser = $commentpho["username"];
$imidx = $commentpho["imgid"];
$albimidbx = $commentpho["albumid"];


if ($countcompho > 0)
{
$phocommentnews = "<b><a href=\"./profile.php?ses=$ses&amp;user=$phouser\">$phouser</a></b> commented on your <b><a href=\"./imgstor/index.php?ses=$ses&amp;act=view&amp;imid=$imidx&amp;albumidb=$albimidbx\">photo</a></b>.<br/>";
}
else
{ }




// totalcount

$comtotalcount = ($countcompro + $countcomblo + $countcompho + $countntopics + $countcomsub + $frequests);


//////////////////////////////////////////////////////////////////////////////////////////////


if ($emaildo == "yes")
{
$elogin = $row_ses["emailuser"];
$epass = $row_ses["emailpass"];

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
	$inboxor = "<a href=\"./mail/msg.php?ses=$ses&amp;mid=$mid\">$ims New Message</a>";
	}
	if ($ims > 1)
	{
	$inboxor = "<a  href=\"./mail/inbox.php?ses=$ses\">$ims New Messages</a>";
	}
	if ($ims < 1)
	{
	$inboxor = "<a  href=\"./mail/index.php?ses=$ses\">Mailbox</a>";
	}
}
else
{

	if ($eunread == 1)
	{
	$inboxor = "<a  href=\"./mail/getmail.php?ses=$ses&amp;p=serv_1\">$eunread New Email</a>";
	}
	if ($eunread > 1)
	{
	$inboxor = "<a  href=\"./mail/getmail.php?ses=$ses&amp;p=serv_1\">$eunread New Emails</a>";
	}


}

$query = "select * from welcome";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);
$welcome = $row['logintext'];

$welcome = funk_it_up("$welcome", "$ses");


$query = "select * from phoenix_comments where type='shout' ORDER BY id DESC LIMIT 1";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);
$shout = stripslashes($row["msg"]);
$shid = $row["id"];
$shouter = $row["username"];


$subtite = "<img src=\"./scripts/phoenix.php?login=$login&amp;string=Hello%20$login\" alt=\"\"/>";
$subtite = "$subtite<br/><img src=\"./scripts/phoenix.php?login=$login&amp;string=Welcome%20Back%20to\" alt=\"\"/>";
$subtite = "$subtite<br/><img src=\"./scripts/phoenix.php?login=$login&amp;string=$sitename\" alt=\"\"/>";


$shout = funk_it_up($shout, $ses);
$shout = add_sicn($shout);





echo "<p class=\"break\">$logo<br/>$subtite$birthdayfodder</p><p class=\"breakforum\" style=\"text-align: center;\">$welcome</p>





<p class=\"break\" style=\"text-align: center; border-width: 0px; border-style: none;\"><img src=\"./scripts/phoenix.php?login=$login&amp;string=Shoutbox\" alt=\"\"/></p>



<div class=\"breakforum\">


<p class=\"breakforum\" style=\"text-align: center; border-width: 0px; border-style: none;\"><b>$shout</b><br/>
<small><b>[ by <a href=\"./profile.php?ses=$ses&amp;user=$shouter\">$shouter</a> ]</small></b></p>";


echo "<p class=\"breakforum\" style=\"text-align: center; border-width: 0px;\"><small><a href=\"./history.php?ses=$ses\">old shouts</a></small></p>";



echo "<form class=\"breakforum\" style=\"text-align: center; border-width: 0px;\" action=\"./options/insert.php?ses=$ses\" method=\"post\">
<fieldset>
<input type=\"text\" name=\"msg\" maxlength=\"200\"/>
<input type=\"submit\" value=\"shout!\"/>
<input type=\"hidden\" name=\"act\" value=\"welcome\"/>
</fieldset></form></div>";





if ($group > 3)
{


echo "<p class=\"break\" style=\"text-align: background-color: black; color: red;\"><b><big>ATTENTION!<br/>
YOUR ATTENTION PLEASE!</big></b></p>
<p class=\"break\" style=\"text-align: background-color: black; color: white;\">
<b>Your account is currently restricted, this means that you are unable to use certain features of this site including chat, message boards &amp; the mailbox. <br/>
You are also unable to contact any other users by any means.<br/>
If you do not know why you are restricted or feel it has been wrongly imposed you may <a href=\"./sendmail.php\"/>contact the administrator</a>.</b></p>";






}


if ($comtotalcount > 0) 
{

if ($ismobile == 1)
{

echo "<p class=\"breakforum\"><b>updates:</b><br/>
$procommentnews
$blocommentnews
$subscriptionews
$phocommentnews
$topicnews
$friendnews</p>";
}
else
{

echo "<p class=\"breakforum\"><big><b>updates:</b><br/>
$procommentnews
$blocommentnews
$subscriptionews
$phocommentnews
$topicnews
$friendnews</big></p>";
}

}

if ($countblog > 1) $bloggies = "$countblog";


//////////////////// comments /////////////////////////////////////


$queryphox = "select * from phoenix_comments where profile='$login' AND type='photo'";
$resultphox = mysql_query($queryphox);
$photocomments = mysql_num_rows($resultphox);


if ($photocomments > 0) $photocomstat = "/$photocomments<img src=\"./images/mainmenu/listview/speech_bubble_text.gif\" alt=\" comments \"/>";



$queryblox = "select * from phoenix_comments where profile='$login' AND type='blog'";
$resultblox = mysql_query($queryblox);
$bloggiecomments = mysql_num_rows($resultblox);


if ($countblog > 0)
{

if ($bloggiecomments > 0) $blogcomstat = "/$bloggiecomments<img src=\"./images/mainmenu/listview/speech_bubble_text.gif\" alt=\" comments \"/>";

}


////////////////// friends ///////////////////////////////////////////

$queryf = "SELECT count(*) from friends where lastactive > DATE_ADD(NOW(), INTERVAL -$interval MINUTE) and location!='offline' and myrequest=0 AND username='$login'";
$resultf = mysql_query($queryf);
$buddies = number_format(mysql_result($resultf,0,"count(*)"));

$queryfx = "SELECT count(*) from friends where username='$login' AND myrequest='0'";
$resultfx = mysql_query($queryfx);
$all = number_format(mysql_result($resultfx,0,"count(*)"));



$friendstatus = "$buddies/$all";


if ($countonline == 1) $onco = "one user online";
elseif ($countonline > 1) $onco = "$countonline users online";
else $onco = "nobody's here";

$onco = urlencode("$onco");

//////////////////////////////////////////////////////////////////




//echo "<p class=\"break\" style=\"text-align: center;\">
//<a style=\"text-decoration: none; border-width: 0px; border-style: none;\" href=\"./extras/online.php?ses=$ses\">
//<img src=\"./scripts/phoenix.php?login=$login&amp;string=$onco\" alt=\"$onco\"/></a></p>";


echo "<p class=\"break\" style=\"text-align: center; border-width: 0px; border-style: none;\"><img src=\"./scripts/phoenix.php?login=$login&amp;string=Main%20Menu\" alt=\"\"/></p>";

echo "<p class=\"breakforum\"><img style=\"border-right-style: inset; border-width: 2px;\" align=\"middle\"  src=\"./images/mainmenu/listview/findfriends.gif\"/> <b><big><a  href=\"./search.php?ses=$ses\">Find Friends</a></b></big></p>";

echo "<p class=\"breakforum\"><img style=\"border-right-style: inset; border-width: 2px;\" align=\"middle\"  src=\"./images/mainmenu/listview/forum.gif\"/> <b><big><a   href=\"./forum/forums.php?ses=$ses\">Message Boards</a></big><small> [$forumtopics/$forumposts]</small></b></p>";

echo "<p class=\"breakforum\"><img style=\"border-right-style: inset; border-width: 2px;\" align=\"middle\"  src=\"./images/mainmenu/listview/mailbox.gif\"/> <b><big>$inboxor</big></b></p>";

echo "<p class=\"breakforum\"><img style=\"border-right-style: inset; border-width: 2px;\" align=\"middle\"  src=\"./images/mainmenu/listview/chat.gif\"/> <b><big><a  href=\"./chat/index.php?ses=$ses\">Chat</a></big><small> [$numchat]</small></b></p>";

echo "<p class=\"breakforum\"><img style=\"border-right-style: inset; border-width: 2px;\" align=\"middle\"  src=\"./images/mainmenu/listview/friends.gif\"/> <b><big><a  href=\"./friends/index.php?ses=$ses\">My Friends</a></big><small> [$friendstatus]</small></b></p>";

echo "<p class=\"breakforum\"><img style=\"border-right-style: inset; border-width: 2px;\" align=\"middle\"  src=\"./images/mainmenu/listview/casino.gif\"/> <b><big><a  href=\"./casino/index.php?ses=$ses\">Casino Games</a></big></b></p>";

echo "<p class=\"breakforum\"><img style=\"border-right-style: inset; border-width: 2px;\" align=\"middle\"  src=\"./images/mainmenu/listview/albums.gif\"/> <b><big><a  href=\"./imgstor/index.php?ses=$ses\">My Photo Albums</a></big><small> [$countimages$photocomstat]</small></b></p>";

echo "<p class=\"breakforum\"><img style=\"border-right-style: inset; border-width: 2px;\" align=\"middle\"  src=\"./images/mainmenu/listview/blog.gif\"/> <b><big><a  href=\"./blog/index.php?ses=$ses\">My Blog</a></big><small> [$countblog$blogcomstat]</small></b></p>";

echo "<p class=\"breakforum\"><img style=\"border-right-style: inset; border-width: 2px;\" align=\"middle\"  src=\"./images/mainmenu/listview/filexchange.gif\"/> <b><big><a  href=\"./uploader/files.php?ses=$ses\">File Exchanger</a></big><small> [$fcounter]</small></b></p>";

echo "<p class=\"breakforum\"><img style=\"border-right-style: inset; border-width: 2px;\" align=\"middle\"  src=\"./images/mainmenu/listview/settings.gif\"/> <b><big><a  href=\"./options/index.php?ses=$ses\">Options &amp; Settings</a></big></b></p>";

echo "<p class=\"breakforum\"><img style=\"border-right-style: inset; border-width: 2px;\" align=\"middle\"  src=\"./images/mainmenu/listview/gallery.gif\"/> <b><big><a  href=\"./gallery.php?ses=$ses\">Members Gallery</a></big></b></p>";

echo "<p class=\"breakforum\"><img style=\"border-right-style: inset; border-width: 2px;\" align=\"middle\"  src=\"./images/mainmenu/listview/profile.gif\"/> <b><big><a  href=\"./profile.php?ses=$ses&amp;user=$login\">My Profile</a></big></b></p>";

echo "<p class=\"breakforum\"><img style=\"border-right-style: inset; border-width: 2px;\" align=\"middle\"  src=\"./images/mainmenu/listview/help.gif\"/> <b><big><a  href=\"./about.php?ses=$ses&amp;act=about\">Help</a></big></b></p>";

echo "<p class=\"breakforum\"><img style=\"border-right-style: inset; border-width: 2px;\" align=\"middle\"  src=\"./images/mainmenu/listview/rank.gif\"/> <b><big><a  href=\"./extras/index.php?ses=$ses\">Top Members</a></big></b></p>";


if ($posts != "")
{

if ($posts < $globalposts)
{
$querymt = "SELECT title FROM membertitles WHERE postcount<'$posts' ORDER BY POSTCOUNT DeSC LIMIT 1";
$resultmt = mysql_query("$querymt");
$nummt = mysql_fetch_array($resultmt);
$tittle = $nummt["title"];
}
else
{
$tittle = "$tittlea";
}
}


///////////////////////////////////////



echo "<p class=\"break\"><img src=\"./scripts/phoenix.php?login=$login&amp;string=Your%20Stats\" alt=\"\"/></p>



<table width=\"100%\" class=\"breakforum\">
<tr align=\"center\"><td width=\"33%\"><b>Level</b></td><td width=\"33%\"><b>Score</b></td><td width=\"33%\"><b>Credits</b></td></tr>
<tr align=\"center\"><td width=\"33%\"><i>$tittle</i></td><td width=\"33%\"><i>$posts</i></td><td width=\"33%\"><i>$credits</i></td></tr>
<tr align=\"center\"><td colspan=\"3\"><b><small><a href=\"./about.php?act=currency&amp;ses=$ses\">what's this?</a></small></b></td></tr>
</table>";


echo "<p class=\"break\">";

   $mtime = microtime(); 
   $mtime = explode(" ",$mtime); 
   $mtime = $mtime[1] + $mtime[0]; 
   $endtime = $mtime; 
   $totaltime = ($endtime - $starttime); 


$hits = "<img src=\"./scripts/phoenix.php?login=$login&amp;string=%20$hits%20\"/>";


echo "<b><big><a href=\"$lback/index.php?msg=6&beef=exit\">Log Off</a></big></b><br/>$hits<br/>$lIlIlIlI
<br/>
<b><a href=\"./about.php?act=changelog\"/>changelog</a> - <a href=\"./about.php?act=credits\"/>thanks</a> - <a href=\"./sendmail.php\"/>contact us</a></b><br/>$totaltime</p>";








echo "</body></html>";


?>