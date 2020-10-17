<?php




include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/waawaamp.php');
include('../scripts/functions.php');


$login=$row_ses["username"];
$tmax = $row_ses["tmax"];
$simages = $row_ses["simages"];
$backg = $row_ses["bg_col"];
$myco = $row_ses["my_color"];
$msg = stripslashes($_GET["msg"]);




if ($act == "")
{

$query = "UPDATE forum_users set lastactive=now(), location='friends list' where username='$login'";
mysql_query($query);

$query = "UPDATE friends set lastactive=now(), location='friends list' where friendname='$login'";
mysql_query($query);


if (empty($page) || ($page < 1)) $page = 1; $max = $tmax;  $start = ($page-1) * $max;

#===============

$query = "SELECT count(*) from friends where lastactive > DATE_ADD(NOW(), INTERVAL -$interval MINUTE) and myrequest=0 AND username='$login'";
$result = mysql_query($query);
$buddies = number_format(mysql_result($result,0,"count(*)"));

$query = "SELECT count(*) from friends where myrequest=0 AND username='$login'";
$result = mysql_query($query);
$anymates = number_format(mysql_result($result,0,"count(*)"));

$count = "$buddies";

if ($buddies == 1) $mates = "one of your friends is online.";
elseif ($buddies > 1) $mates = "$buddies of your friends are online.";
elseif ($anymates == 0) $mates = "you don't have any friends.";
else $mates = "none of your friends are online";




if ($bwmode == "off") $subtite = "<img src=\"../scripts/phoenix.php?string=friends&amp;login=$login\" alt=\"friends\" />";
else $subtite = "<b><big>Friends</big></b>";



if ($msg != "") $msg = "<br/><i>$msg</i>";

$helplink = "<br/><small><a href=\"./index.php?ses=$ses&amp;act=about\">friends help</a></small>";

echo "<p class=\"break\">";
echo "$subtite";
echo "$inboxes$helplink</p><hr/>";



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


echo "<p class=\"breakforum\" style=\"text-align: center;\"><big><b>$mates</b></big></p>";




if ($buddies > 0)
{



$query = "select * from friends where lastactive > DATE_ADD(NOW(), INTERVAL -$interval MINUTE) and myrequest=0 and username='$login' and location!='offline' ORDER BY lastactive DESC LIMIT  $start, $max";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);



		if ($count > $max) 
		{
		echo  "<p class=\"breakforum\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $max);
		}

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"./index.php?ses=$ses&amp;by=$by&amp;stringy=$stringy&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}






	while ($row)
           
		{
		$name = $row["friendname"];
		$id = $row["id"];
		$lastactive = nicetime($row["lastactive"]);
		$location = $row["location"];


			$queryo = "select avatar, mystatus from forum_users where username='$name'";
			$resulto = mysql_query($queryo);
			$num_rowso = mysql_num_rows($resulto);
			$rowo = mysql_fetch_array($resulto);
				$mymood = $rowo["mystatus"];
				$avvy = $rowo["avatar"];




	if ($avvy == "") $avvy = "<img align=\"middle\" src=\"../images/nopic_tiny.jpg\" alt=\"\"/> ";
	else $avvy = "<img align=\"middle\" src=\"../imgstor/imgtn.php?imid=$avvy&amp;res=25\" alt=\"\"/> ";


if ($mymood != "") $mood = "$mymood";
else $mood = "";

$mood = funk_it_up($mood, $ses);
$mood = add_sicn($mood);

		echo "<p class=\"breakforum\">$avvy <b><a href=\"./options.php?ses=$ses&amp;act=view&amp;id=$id\">$name</a></b> $mood<br/><small><b>[last seen $location $lastactive]</b></small></p>";
	
           	$row = mysql_fetch_array($result);
           	}



		if ($count > $max) 
		{
		echo  "<p class=\"breakforum\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $max);
		}

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"./index.php?ses=$ses&amp;by=$by&amp;stringy=$stringy&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}

}





	$query = "select mystatus from forum_users where username='$login'";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);
	$curmood = $row["mystatus"];

	echo "<form class=\"breakforum\" action=\"./insert.php?ses=$ses&amp;act=mymood\" method=\"post\">
	<fieldset><b>update status:</b><br/>
	$login <input type=\"text\" name=\"mood\" class=\"textbox\" maxlength=\"160\" title=\"status\" value=\"$curmood\"/><br/>
	<input type=\"submit\" class=\"textbox\" value=\"update status\"/>
	</fieldset>
    	</form>";




echo "<hr/><p class=\"break\">";










if ($anymates >= 1) echo "$hyfor <a href=\"./offline.php?ses=$ses\">view all friends</a>
<br/>$hyfor <a href=\"./options.php?ses=$ses&amp;act=del\">delete all friends</a><br/>";

echo "$hyfor <a href=\"./options.php?ses=$ses&amp;act=add\">add friend</a>";

echo "<br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";


}




if ($act == "about")
{

echo "<p class=\"break\"><b><big>About Friends</big></b><br/><small><a href=\"../about.php?ses=$ses&amp;act=about\">help menu</a></small></p><hr/>
<p class=\"breakforum\" style=\"text-align: center;\"><b><big>Everything you need to know about the friends list.</big></b></p>
<p class=\"breakforum\">
<b>What is it?</b> - <i>it's a list to which you can add your friends, if you have any. the friends list will show you where your friends are, their current status and when they were last seen. there are also quick links to their profiles, blogs or to send them messages.</i><br/><br/>
<b>What do i do?</b> - <i>you can add friends by either typing their name in the <a href=\"./options.php?ses=$ses&amp;act=add\">add friend</a> box or by clicking 'add friend' whilst viewing their profile.</i><br/><br/>
<b>Where is it?</b> - <i>you can access it from the main menu, it's easy enough to find.</i><br/><br/>
<b>Who can see it?</b> - <i>everyone can see it as it appears on your profile, up to 5 of your friends will be chosen at random and displayed on your profile. 
you can restrict access to your friends list in two ways; either remove the <a href=\"../options/options.php?ses=$ses&amp;act=chunks\">friends chunk</a> from your profile so nobody can access it or 
<a href=\"../options/options.php?ses=$ses&amp;act=access\">restrict access</a> to your profile from 'public' to either 'friends' or 'nobody at all'.</i><br/><br/>
<b>Maintaining My List</b> - <i>you can add or remove friends from within your friends list, you can also update your status here, as well as on the main menu.</i><br/><br/>
<b>Extra Help</b> - <i>if you have questions or need help with the friends list, feel free to send a message to <a href=\"../mail/index.php?ses=$ses&amp;senduser=$PHNAME&amp;act=presetuser\">$PHNAME</a>.</i>
</p><hr/><p class=\"break\">
    $hyback <a href=\"./index.php?ses=$ses\">back</a><br/>
    $hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
exit;

}





?>



