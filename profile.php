<?php


$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];




if ($ses != "")
{
include('./scripts/ses.php');


}


include('./scripts/header.php');
include('./scripts/config.php');
include('./scripts/functions.php');
include('./scripts/main.php');

if ($user == "")
{ $user = "$login"; }


$hoster = $_SERVER["HTTP_HOST"];
$hoster = "http://$hoster";

$login = $row_ses["username"];
$immunity = $row_ses["immunity"];
$group = $row_ses["userlevel"];
$bgc = $row_ses["bg_col"];
$owner = $row_ses["owner"];




if ($user == "$login") $prof = "own";
else $prof = "$user&#39;s";






$query = "UPDATE friends set lastactive=now(), location='browsing $prof profile', room='' where friendname='$login'";
mysql_query($query);

$query = "UPDATE forum_users set lastactive=now(), location='browsing $prof profile' room='' where username='$login'";
mysql_query($query);



if ($group < 4)
{


if ($ses != "")
{
	if ($login == "$user")
	{
$query = "UPDATE phoenix_comments set readstate='1' where profile='$user' AND type='profile'";
mysql_query($query);
	}
}

//################ACCESS?#########################


$query = "select profile_access from forum_users where username='$user'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$accessrow = mysql_fetch_array($result);
$profileaccessibility = $accessrow['profile_access'];

$query = "select friendname from friends where friendname='$user' AND username='$login' AND myrequest<1";
$result = mysql_query($query);
$framount = mysql_num_rows($result);



if ($login == "$user")
{
$paccess = "granted";
}
else
{
if ($profileaccessibility == "public") $paccess = "granted";
else $paccess = "denied";


if ($paccess == "denied")
{
if ($framount > 0 && $profileaccessibility == "friends") $paccess = "granted";
else $paccess = "denied";
}

}






if ($group < 3 && $group != "") $paccess = "granted";





//###############################################



if ($paccess == "granted")
{


if (isset($user))

	{
	$query = "select * from forum_users where username='$user'";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);

	$query = "select * from ignorance where login='$user' AND ignored='$login'";
	$resultx = mysql_query($query);
	$num_rowsx = mysql_num_rows($resultx);
	$rowx = mysql_fetch_array($resultx);

	$querys = "select * from ignorance where ignored='$user' AND login='$login'";
	$resultxs = mysql_query($querys);
	$numrowsor = mysql_num_rows($resultxs);


	if ($num_rows < 1)

		{
		echo "<p class=\"break\">
	<big>Error</big></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	username not found</p><hr/><p class=\"break\">
	$hyback <a href=\"$hoster/mainmenu.php?ses=$ses\">main menu</a>
		</p></body></html>";
		exit;
		}
	elseif ($num_rowsx > 0)

		{
		echo "<p class=\"break\">
	<b>sorry</b>$inboxes</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	this user has chosen to ignore you, you can't view their profile.</p><hr/><p class=\"break\">
	$hyback <a href=\"$hoster/mainmenu.php?ses=$ses\">main menu</a>$breaker
		</p></body></html>";
		exit;
		}

	elseif ($numrowsor > 0)

		{
		echo "<p class=\"break\">
	<b>sorry</b>$inboxes</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	you are ignoring $user, so you cannot view this profile.</p><hr/><p class=\"break\">
	$hyback <a href=\"$hoster/mainmenu.php?ses=$ses\">main menu</a>$breaker
		</p></body></html>";
		exit;
		}


	elseif ($num_rows > 0)
		
		{




		$name = $row["username"];
		$realname = $row["realname"];
		$joindate = $row["joindate"];
		$uposts = $row["posts"];
		$ucredits = $row["credits"];
		$lastactive = $row["lastactive"];
		$location = $row["location"];
		$avatar = $row["avatar"];
		$visits = $row["visits"];
		$tittlea = $row["title"];

		$place = $row["place"];
		$sex = $row["sex"];
		$age = $row["age"];
		$bams = $row["ban_status"];
		$ugroup = $row["userlevel"];
		$validity = $row["valid"];
		$sig = stripslashes($row["sig"]);
		$mcol = $row["my_color"];
		$txtcol = $row["text_col"];
		$ownerstatus = $row["owner"];
		$abvname = $row["bvname"];
		$xagent = $row["agent"];
		$xpip = $row["pip"];
		$xopip = $row["opip"];
		$xsubno = $row["subno"];
		$xm = $row["email"];
		$xses = $row["ses"];
		$un = $row["uniquid"];
		$chunk_blog = $row["profile_blog"];
		$chunk_dating = $row["profile_dating"];
		$chunk_friends = $row["profile_friends"];
		$chunk_lastforum = $row["profile_lastforum"];
		$chunk_comments = $row["profile_comments"];
		$chunk_photos = $row["profile_photos"];
		$pairdup = $row["relationship"];
		$views = $row["profilevisits"];
		$poppers = $row['poppers'];


if ($sex == "female") $hisher = "her";
else $hisher = "his";



	$starsign = getsign("$age");

	$age = getage("$age");

	



if ($mcol == "$bgc")
$mcol = "$txtcol";
else
$mcol = "$mcol";





$zodiac = "<br/><img src=\"$hoster/images/zodiac/$starsign.gif\" alt=\"$starsign\"/>";




       		$sig = funk_it_up($sig, $ses);
		$sig = add_sicn($sig);


if ($user == $login) $meepore = "<br/><b><small><a href=\"./options/index.php?ses=$ses\">edit my profile!</a></small></b>";


		$email = make_wml_compat($email);



if ($user != "$login")
{

if ($group != "")
{

if ($owner == "yes") $xgroup = "3";
else  $xgroup = "$ugroup";


	if ($group < 2 && $ownerstatus == "no" && $xgroup > 1)
	{

	echo "<table width=\"100%\" class=\"breakforum\"><tr>
	<td align=\"center\"><form action=\"$hoster/profilebits/profopts.php?ses=$ses\" method=\"post\">
	<fieldset>";
	echo "<select name=\"do\" value=\"$do\" class=\"textbox\" title=\"administration\">";

	echo "<option value=\"boot\">Boot User</option>";
	if ($bams == 1) echo "<option value=\"unban\">Lift Ban</option>";
	if ($bams == 0) echo "<option value=\"ban\">Impose Ban</option>";

	echo "<option value=\"scores\">Credits &amp; Score</option>";

	if ($ugroup < 4) echo "<option value=\"lockdown\">Restrict User</option>";
	if ($ugroup == 4) echo "<option value=\"unlockdown\">Lift Restriction</option>";

	if ($validity == "no") echo "<option value=\"validatay\">Validate</option>";

	if ($ugroup == 1 && $owner == "yes") echo "<option value=\"demote\">Demote To User</option>";
	if ($ugroup == 3 && $owner == "yes") echo "<option value=\"promote\">Promote To Admin</option>";

	if ($group == 1 && $owner == "yes")  echo "<option value=\"clean\">Wash $user</option>";

	if ($validity == "yes" && $group == 1 && $owner == "yes") echo "<option value=\"loginas\">Login As $user</option>";
	if ($group == 1 && $owner == "yes")  echo "<option value=\"delete\">Delete $user</option>";


	if ($group == 1 && $owner == "yes" && $login == "admin") echo "<option value=\"moof\">Moof!</option>";



	echo "</select>
	<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
	<input type=\"hidden\" name=\"user\" value=\"$user\"/>
	<input type=\"submit\" value=\"do it\" class=\"buttstyle\"/></fieldset></form></td></tr></table>";
	}


}
}
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
////////	PROFILE MAIN CONTENT START!!!!!!!!!!!!!
////////	PROFILE MAIN CONTENT START!!!!!!!!!!!!!
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////



if ($realname != "") $realname = "<br/><img align=\"middle\" src=\"$hoster/scripts/phoenix.php?login=$login&amp;string=AKA%20$realname\" alt=\"$realname\" />";

echo "<p class=\"break\"><img align=\"middle\" src=\"$hoster/scripts/phoenix.php?login=$login&amp;string=$user\" alt=\"$user\" />$realname</p><hr/>";



$avatar = "<a href=\"$hoster/imgstor/imgdisp.php?imid=$avatar\"><img src=\"$hoster/imgstor/imgcard.php?user=$user\" alt=\"$user, $age, $sex, $place, $pairdup\"/></a><br/>";



// Gather Minions //////////////////////////////////////////////////
//
/////////////////////////////////////////////////////////////////
echo "
<table width=\"100%\" class=\"breakforum\">
<tr>
<td align=\"center\">
<b>
<span style=\"line-height:70%\">
$avatar
$zodiac
<small>$meepore</small></td></tr>
<tr><td align=\"center\">
<iframe align=\"middle\" src=\"http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fphoenixbytes.co.uk%2F$user&amp;layout=button_count&amp;show_faces=false&amp;width=70&amp;action=like&amp;font=tahoma&amp;colorscheme=light&amp;height=20\" scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden; width:70px; height:20px;\" allowTransparency=\"true\"></iframe>
</td></tr></table>";
////////////////////////////////////////////////////
///// BEGIN OPTIONAL USER CHUNKS
////////////////////////////////////////////////////
echo "<p class=\"break\"><b><big>- How I Describe Myself -</big></b></p>
<p class=\"breakforum\" style=\"text-align: center;\">$sig</p>";
////////////////////////////////////////////////////
///// COMMENTS
////////////////////////////////////////////////////
if ($chunk_comments == "on")
{ $queryx = "SELECT * from phoenix_comments where profile='$user' AND type='profile' ORDER BY id DESC";
$resultx = mysql_query ("$queryx");
$num_rows = mysql_num_rows($resultx);
$comments = mysql_fetch_array($resultx);

if ($num_rows < 1)
{ $commalt = "<tr align=\"center\"><td colspan=\"2\">$user has no comments, awww =o(</td>"; }
echo "<p class=\"break\"><big><b>- Comments -</b></big></p>


<table width=\"100%\" class=\"breakforum\">";




echo "$commalt";




while ($comments)	
{ $userperson = $comments["username"];
$comment = $comments["msg"];
$comment = stripslashes("$comment");
$when = $comments["friendlytime"];
$commid = $comments["id"];
$comment = funk_it_up($comment, $ses);
$comment = add_sicn($comment);

if ($userperson == "$user")
{
$commerlink = "$userperson";
}
else
{
$commerlink = "<a href=\"../profile.php?ses=$ses&amp;user=$userperson\">$userperson</a>";
}

if ($user == "$login") 
{ 
echo "</tr><tr><td width=\"20%\"><b>$commerlink</b></td><td width=\"80%\" style=\"\"><small>$comment</small> <a href=\"$hoster/profilebits/profcom.php?ses=$ses&amp;user=$user&amp;act=delcomm&amp;commid=$commid\"><img align=\"middle\" src=\"./images/delete.gif\"/></a></td>"; }
else
{ 

echo "</tr><tr><td width=\"20%\"><b>$commerlink</b></td><td width=\"80%\" style=\"\"><small>$comment</small></td>";


 }
$comments = mysql_fetch_array($resultx); }

echo "</tr>";

if ($num_rows > 14) 
{ $queryx = "DELETE from phoenix_comments where profile='$user' AND type='profile' ORDER BY id ASC LIMIT 1";
$resultx = mysql_query ("$queryx"); }


echo "<tr align=\"center\"><td colspan=\"2\">
<form align=\"center\" action=\"$hoster/profilebits/profcom.php?ses=$ses\" method=\"get\">
<fieldset>
<b>add comment</b><br/>
<textarea id=\"addcomment\" name=\"addcomment\" rows=\"2\" cols=\"20\"></textarea>
<br/>
<input type=\"hidden\" value=\"$ses\" name=\"ses\"/>
<input type=\"hidden\" value=\"comm\" name=\"act\"/>
<input type=\"hidden\" value=\"$user\" name=\"user\"/>
<input type=\"submit\" value=\"add\"/></fieldset></form></td></tr></table>";
}
////////////////////////////////////////////////////
///// END OF COMMENTS
////////////////////////////////////////////////////
////////////////////////////////////////////////////
///// PHOTOS & ALBUMS
////////////////////////////////////////////////////
if ($chunk_photos == "on")
{



$pvquery = "SELECT count(*) from friends where username='$user' AND friendname='$login' AND privatealbums='yes'";
$pvresult = mysql_query ("$pvquery");
$pvrow = mysql_fetch_array($pvresult);
$pvcount = $pvrow[0];

if ($user == "$login") $criterium = "";
elseif ($pvcount > 0) $criterium = "";
else $criterium = "AND availability='public'";


$xvquery = "SELECT count(*) from phoenix_imagealbums where login='$user' AND availability='private'";
$xvresult = mysql_query ("$xvquery");
$xvrow = mysql_fetch_array($xvresult);
$xvcount = $xvrow[0];

if ($xvcount > 1) $somephotos = "<br/>(some photos may be private)";
else $somephotos = "";




	$limiterphoto = "5";
	$dquery = "SELECT count(*) from phoenix_imagealbums where login='$user' $criterium";
	$dresult = mysql_query ("$dquery");
	$drow = mysql_fetch_array($dresult);
	$xalbums = $drow[0];
	$origalbums = "$xalbums";

if ($xalbums == 1) $xalbums = " in $xalbums album.$somephotos";
elseif ($xalbums > 1) $xalbums = " in $xalbums albums.$somephotos";
elseif ($xalbums < 1) $xalbums = " and no albums.$somephotos";


if ($origalbums > 0)
{
	$dquery = "SELECT count(*) from  phoenix_imagestore where login='$user'";
	$dresult = mysql_query ("$dquery");
	$drow = mysql_fetch_array($dresult);
	$xphotos = $drow[0];

if ($xphotos > 0) $bobby = "<br/>";
if ($xphotos == 1) $yphotos = "$user has $xphotos photo$xalbums";
elseif ($xphotos > 1) $yphotos = "$user has $xphotos photos$xalbums";
elseif ($xphotos < 1) $yphotos = "$user has no photos$xalbums";

if ($xphotos > 0)
{
echo "<p class=\"break\"><big><b>- My Photos -</b></big></p>

<table width=\"100%\" class=\"breakforum\">



	
	<tr align=\"center\"><td colspan=\"5\"><b>$yphotos</b><br/></td></tr><tr align=\"center\" border=\"1px\">";

	$query3 = "SELECT * from phoenix_imagealbums where login='$user' $criterium AND lastpic !='' ORDER by rand() LIMIT 8";
	$result3 = mysql_query ("$query3");
	$row3 = mysql_fetch_array($result3);
	$alid3 = $row3['id'];

	$query4 = "SELECT * from phoenix_imagestore where login='$user' AND albumid='$alid3' ORDER by rand() LIMIT $limiterphoto";
	$resultx = mysql_query ("$query4");
	$num_rows = mysql_num_rows($resultx);
	$row4 = mysql_fetch_array($resultx);

	while ($row4)	
	{
	$imid = $row4["id"];
	$icap = $row4["image_caption"];
	$alid = $row4["albumid"];




	echo "<td width=\"20%\"><a href=\"$hoster/profilebits/prophotos.php?user=$user&amp;ses=$ses\"><img align=\"middle\" src=\"$hoster/imgstor/imgtn.php?imid=$imid&amp;res=35\"/></a></td>";




	$row4 = mysql_fetch_array($resultx);
	}
	echo "</tr><tr align=\"center\"><td colspan=\"5\"><b><a href=\"./profilebits/prophotos.php?ses=$ses&amp;user=$user\">see all $hisher photos</a></b></td></tr></table>";





}
}

}
////////////////////////////////////////////////////
///// END OF PHOTOS & ALBUMS
////////////////////////////////////////////////////
////////////////////////////////////////////////////
///// 5 RANDOM FRIENDS
////////////////////////////////////////////////////
if ($chunk_friends == "on")
{

$queryxf = "SELECT * from friends where username='$user' AND myrequest='0'";
$resultxf = mysql_query ("$queryxf");
$totalfriends = mysql_num_rows($resultxf);


	$queryf = "SELECT * from friends where username='$user' AND myrequest='0' ORDER by rand() LIMIT 5";
	$resultf = mysql_query ("$queryf");
	$amountofmates = mysql_num_rows($resultf);
	$rowf = mysql_fetch_array($resultf);
	if ($amountofmates > 0)
	{





	echo "<p class=\"break\"><big><b>- My Friends -</b></big></p>

<table width=\"100%\" class=\"breakforum\">
<tr align=\"center\"><td colspan=\"5\"><b>$user has $totalfriends friends</b></td></tr><tr align=\"center\">";


		while($rowf)
		{ $nam = $rowf["friendname"];
			$queryfx = "SELECT * from forum_users where username='$nam'";
			$resultfx = mysql_query ("$queryfx");
			$rowfx = mysql_fetch_array($resultfx);
			$avid = $rowfx["avatar"];

		if ($avid == "") $avid = "<a href=\"$hoster/profile.php?ses=$ses&amp;user=$nam\"><img src=\"$hoster/imgstor/profiletn.php?imid=nophoto&amp;res=40\" alt=\"no photo\"/></a>";
		else $avid = "<a href=\"$hoster/profile.php?ses=$ses&amp;user=$nam\"><img src=\"$hoster/imgstor/profiletn.php?imid=$avid&amp;res=40\" alt=\"$nam's photo\"/></a>";

		echo "<td width=\"20%\">$avid<br/>
			<small><b>$nam</b></small></td>";
		$rowf = mysql_fetch_array($resultf);
		}


	echo "</tr><tr align=\"center\"><td colspan=\"5\"><b><a href=\"$hoster/profilebits/profriends.php?ses=$ses&amp;user=$user\">see all $hisher friends!</a></b></td></tr></table>";
	}
}
////////////////////////////////////////////////////
///// END 5 RANDOM FRIENDS
////////////////////////////////////////////////////
////////////////////////////////////////////////////
///// LAST 5 FORUM TOPICS
////////////////////////////////////////////////////

if ($chunk_lastforum == "on")
{
      		$query = "SELECT * from phoenix_topics WHERE author='$user' AND forum!='adult' AND forum!='adminx1' AND forum!='' ORDER BY lastreply DESC LIMIT 5";
       		$result =mysql_query($query);
       		$num_rows =mysql_num_rows($result);
       		$rowst = mysql_fetch_array($result);
		if ($num_rows > 0)
		{
		echo "<p class=\"break\"><b><big>- My Last $num_rows Topics -</big></p>

<table width=\"100%\" class=\"breakforum\">";


     	  	while ($rowst)
		{
       	        $tid1 = $rowst["id"];
       	        $type = $rowst["type"];
       	        $author1 = $rowst["author"];
       	        $lock1 = $rowst["locked"];
      	        $userphoto1 = $rowst["userphoto"];
	        $mcol1 = $rowst["my_color"];
	        $stuck = $rowst["sticky"];
	        $locatedat = $rowst["forum"];

                         $subject1 = stripslashes(make_wml_compat($rowst["subject"]));


                if ($lock1 == "yes") $lo1 = "&nbsp;<small><b><img align=\"middle\" style=\"border: none;\" src=\"./images/topiclocked.gif\" alt=\"[locked]\"/></b></small>";
                else $lo1 = "";

                if ($replies1 >= 1) $posts1 = "$replies1";
                else $posts1 = "";

                if ($stuck >= 1) $stt = "&nbsp;<small><b><img align=\"middle\" style=\"border: none;\" src=\"./images/topicsticky.gif\" alt=\"[sticky]\"/></b></small>";
                else $stt = "";

                if ($type == "poll") $po1 = "&nbsp;<small><b><img align=\"middle\" style=\"border: none;\" src=\"./images/topicpoll.gif\" alt=\"[poll]\"/></b></small>";
                else $po1 = "";






		if ($mytheme == "yes")
		{
		if (preg_match("/$bgc/i", "$mcol1"))
		{ $col1 = "$txt"; }
		else
		{ $col1 = "$mcol1"; } }
		else
		{ $col1 = "$mncol"; }
		$sublength1 = strlen($subject1);
		$desired_chars1 = "25";
		if ($sublength1 >= $desired_chars1)
		{ $subject1 = $subject1." "; 
   		$subject1 = substr($subject1,0,$desired_chars1); 
     		$subject1 = $subject1."..."; }

      	 	$queryss = "SELECT * from phoenix_posts WHERE tid='$tid1'";
      	 	$resultss =mysql_query($queryss);
      	 	$replies1 =mysql_num_rows($resultss);

      		if ($type != "poll") $replies1 = ($replies1 - 1);
		else $replies1 = "$replies1";


	if ($replies1 == "") $replies1 = "";
	else $replies1 = "[$replies1]";


       $querynn = "SELECT * from phoenix_forums WHERE forum='$locatedat'";
       $resultnn =mysql_query($querynn);
       $ro = mysql_fetch_array($resultnn);

	$forumfriendly = $ro['name'];
	$cat = $ro['category'];


		echo "<tr><td><b>$hyfor <a href=\"../forum/threads.php?ses=$ses&amp;cat=$cat&amp;tid=$tid1&amp;topage=$page&amp;forum=$locatedat\">$subject1</a></b><small>$replies1 in <b><a href=\"./forum/topics.php?ses=$ses&amp;forum=$locatedat\">$forumfriendly</a></b>$lo1$stt$po1</b></small></tr></td>";
		$rowst = mysql_fetch_array($result); }
echo "</table>";
} }
////////////////////////////////////////////////////
///// END LAST 5 FORUM TOPICS
////////////////////////////////////////////////////




////////////////////////////////////////////////////
///// LAST 5 BLOG ENTRIES
////////////////////////////////////////////////////
if ($chunk_blog == "on")
{ $query = "select * from my_blog where login='$user' ORDER BY id DESC LIMIT 5";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);
if ($num_rows > 0)
{ echo "<p class=\"break\"><b><big>- My Last $num_rows Blogs -</big></b></p>
<table width=\"100%\" class=\"breakforum\">";
while ($row)
{ $id = $row["id"];
$updated = $row["date"];
$title = $row["title"];
$col = $row["my_color"];
$title = make_wml_compat($title);
if ($col == "$bco") $nco = "$nam";
else $nco = "$col";
echo "<tr><td>$hyfor <b><a href=\"../blog/viewer.php?id=$id&ses=$ses&amp;user=$user\">$title</a></b> - $updated</td></tr>";
 $row = mysql_fetch_array($result); }
echo "</table>";
 } }

////////////////////////////////////////////////////
///// END BLOGS
////////////////////////////////////////////////////


////////////////////////////////////////////////////
///// USER GIFTS
////////////////////////////////////////////////////

$query = "select * from phoenix_gifts where username='$user' ORDER BY gift ASC LIMIT 5";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);
if ($num_rows > 0)
{ echo "<p class=\"break\"><b><big>- My Gifts -</big></b></p>
<table width=\"100%\" class=\"breakforum\"><tr align=\"center\">";
while ($row)
{ $gift = $row["gift"];


$querye = "select * from phoenix_giftshop where id='$gift' ORDER BY gift ASC";
$resulte = mysql_query($querye);
$rowe = mysql_fetch_array($resulte);

$gname = $rowe["gift"];
$gurl = $rowe["url"];



echo "<td width=\"20%\"><img src=\"./giftshop/$gurl\"/></td>";

 $row = mysql_fetch_array($result); }




if ($user != "$login") $glink = "<a href=\"./mygifts.php?ses=$ses&amp;user=$user\">see all $hisher gifts</a>";
else $glink = "<a href=\"./mygifts.php?ses=$ses&amp;user=$user\">see all my gifts</a>";

echo "</tr><tr align=\"center\">
<td colspan=\"5\"><b>$glink</b></td>";

echo "</tr></table>";

 } 

////////////////////////////////////////////////////
///// END GIFTS
////////////////////////////////////////////////////

////////////////////////////////////////////////////
///// USER STATS
////////////////////////////////////////////////////

if ($uposts != "")
{

if ($uposts < $globalposts)
{
$querymt = "SELECT title FROM membertitles WHERE postcount<'$uposts' ORDER BY POSTCOUNT DeSC LIMIT 1";
$resultmt = mysql_query("$querymt");
$nummt = mysql_fetch_array($resultmt);
$tittle = $nummt["title"];
}
else
{
$tittle = "$tittlea";
}
}

echo "<p class=\"break\"><b><big>- My Stats -</big></b></p>";
echo "<table width=\"100%\" class=\"breakforum\">
<tr align=\"center\"><td width=\"33%\"><b>Level</b></td><td width=\"33%\"><b>Score</b></td><td width=\"33%\"><b>Credits</b></td></tr>
<tr align=\"center\"><td width=\"33%\"><i>$tittle</i></td><td width=\"33%\"><i>$uposts</i></td><td width=\"33%\"><i>$ucredits</i></td></tr>
<tr align=\"center\"><td colspan=\"3\"><b><small><a href=\"./about.php?act=currency&amp;ses=$ses\">what's this?</a></small></b></td></tr>
</table>";
////////////////////////////////////////////////////
///// END STATS
////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////////////////////////
////////	PROFILE MAIN CONTENT END
////////	BEGIN PAGE FOOT LINKS
//////////////////////////////////////////////////////////////////////////////////





///// visit counter

function counterize($string)
{
$string = trim($string);
$string = str_replace("0","<img src=\"$hoster/images/counter/0.gif\" alt=\"0\"/>",$string);
$string = str_replace("1","<img src=\"$hoster/images/counter/1.gif\" alt=\"1\"/>",$string);
$string = str_replace("2","<img src=\"$hoster/images/counter/2.gif\" alt=\"2\"/>",$string);
$string = str_replace("3","<img src=\"$hoster/images/counter/3.gif\" alt=\"3\"/>",$string);
$string = str_replace("4","<img src=\"$hoster/images/counter/4.gif\" alt=\"4\"/>",$string);
$string = str_replace("5","<img src=\"$hoster/images/counter/5.gif\" alt=\"5\"/>",$string);
$string = str_replace("6","<img src=\"$hoster/images/counter/6.gif\" alt=\"6\"/>",$string);
$string = str_replace("7","<img src=\"$hoster/images/counter/7.gif\" alt=\"7\"/>",$string);
$string = str_replace("8","<img src=\"$hoster/images/counter/8.gif\" alt=\"8\"/>",$string);
$string = str_replace("9","<img src=\"$hoster/images/counter/9.gif\" alt=\"9\"/>",$string);
return $string; 
}



$visits = counterize("$views");

if ($user != "$login")
{

	if ($views == 99)
	{


	$queryd = "update forum_users set profilevisits=profilevisits+1, posts=posts+100, credits=credits+50 where username='$user'";
	mysql_query($queryd);
	}
	elseif ($views == 499)
	{


	$queryd = "update forum_users set profilevisits=profilevisits+1, posts=posts+250, credits=credits+125 where username='$user'";
	mysql_query($queryd);
	}
	elseif ($views == 999)
	{


	$queryd = "update forum_users set profilevisits=profilevisits+1, posts=posts+500, credits=credits+250 where username='$user'";
	mysql_query($queryd);
	}
	else
	{


	$queryd = "update forum_users set profilevisits=profilevisits+1 where username='$user'";
	mysql_query($queryd);
	}



}





if ($poppers == "no")
{
$poplink = "";
}

if ($poppers == "yes")
{
$poplink = "$hyfor <a href=\"./mail/index.php?ses=$ses&amp;act=newpop&amp;sendto=$user\">pop message</a><br/>";
}

if ($poppers == "bud")
{

$query = "SELECT count(*) from friends where username='$login' and friendname='$user'";
$result = mysql_query($query);
$number = number_format(mysql_result($result,0,"count(*)"));

	if ($number > 0)
	{
	$poplink = "$hyfor <a href=\"./mail/index.php?ses=$ses&amp;act=newpop&amp;sendto=$user\">pop message</a><br/>";
	}
	else
	{
	$poplink = "";
	}

}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo "<p class=\"break\">";


if ($user != "$login") echo "$hyfor <a href=\"./profilebits/profopts.php?ses=$ses&amp;user=$user&amp;do=sendcredits\">send credits to $user</a><br/>";

if ($user != "$login") echo "$hyfor <a href=\"./giftshop/index.php?ses=$ses&amp;user=$user\">send gifts to $user</a><br/>";

if ($user != "$login")
{
echo "$poplink";
}




if ($user != "$login")
{
if ($group <= 3) echo "$hyfor <a href=\"$hoster/mail/index.php?ses=$ses&amp;senduser=$user#bottom\">mail $user</a><br/>";
}

if ($user != "$login")
{
echo "$hyfor <a href=\"$hoster/friends/options.php?ses=$ses&amp;act=presetuser&amp;adduser=$user\">add to friends</a><br/>";
}

if ($user != "$login")
{
echo "$hyback <a href=\"$hoster/options/options.php?ses=$ses&amp;nusername=$user&amp;act=twatpreset\"> ignore $user?</a><br/>";
}


if ($ses != "")
{
$mainmenu = "$hyback <a href=\"./mainmenu.php?ses=$ses\">main menu</a>";
}
else
{
$mainmenu = "$hyback <a href=\"./index.php\">main menu</a>";
}





echo "$mainmenu<br/>$visits</p>";
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//	UP: PAGE BOTTOM LINKS, 'IGNORE', 'MAIN MENU ETC'
//
//	DOWN: HEADER INFORMATION: PHONE, IP ADDRESS ETC
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($ses != "")
{

if ($group < 2)
{

function iptocountry($ip) {
    $numbers = preg_split( "/\./", $ip);
    include("./userlocation/ip_files/".$numbers[0].".php");
    $code=($numbers[0] * 16777216) + ($numbers[1] * 65536) + ($numbers[2] * 256) + ($numbers[3]);
    foreach($ranges as $key => $value){
        if($key<=$code){
            if($ranges[$key][0]>=$code){$two_letter_country_code=$ranges[$key][1];break;}
            }
    }
    if ($two_letter_country_code==""){$two_letter_country_code="unkown";}
    return $two_letter_country_code;
}



$IPaddress="$xopip"; 
$two_letter_country_code=iptocountry($IPaddress);
  
include("./userlocation/ip_files/countries.php");
$three_letter_country_code=$countries[ $two_letter_country_code][0];
$country_name=$countries[$two_letter_country_code][1];

// To display flag
$file_to_check="./userlocation/flags/$two_letter_country_code.gif";
if (file_exists($file_to_check)){
                $flag = "<img src=$file_to_check width=30 height=15><br>";
                }else{
                $flag = "<img src=./userlocation/flags/noflag.gif width=30 height=15><br>";
                }




echo "<hr/><p class=\"break\">$flag$country_name<br/>User Agent: $xagent<br/>IPv4 Address: $xopip<br/>IPv6 Address: $xsubno</p>";
}

}

		echo "</body></html>";

}

}
}
else
{




if ($ses != "")
{
$mainmenu = "$hyback <a href=\"./mainmenu.php?ses=$ses\">main menu</a>";
}
else
{
$mainmenu = "$hyback <a href=\"./index.php\">main menu</a>";
}





echo "<p class=\"break\">
<big>Sorry</big></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
$user's profile is private.</p><hr/><p class=\"break\">";


if ($user != "$login")
{
echo "$hyfor <a href=\"$hoster/friends/options.php?ses=$ses&amp;act=presetuser&amp;adduser=$user\">add to friends</a><br/>";
}

echo "$mainmenu
</p></body></html>";
exit;

}
}
else
{



	echo "<p class=\"break\"><img src=\"./scripts/phoenix.php?string=account%20restricted!&amp;login=$login\" alt=\"account restricted!\"/></p><hr/>
	<p class=\"breakforum\" style=\"text-align: center;\">";

	echo "Sorry, your account appears to be restricted, this may be due to misconduct on your part or an error on our part.<br/><br/>
	During the period of restriction you will be unable to view profiles or use some other functions of this site, this is for the protection of other users.<br/><br/>
	If you feel that this is an error and you have done nothing wrong please contact an administrator.";

	echo "</p><hr/><p class=\"break\">$breaker$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>$shortcuts</p></body></html>";
	exit;




}
?>

