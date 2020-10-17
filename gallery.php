<?php

include('./scripts/ses.php');
include('./scripts/header.php');
include('./scripts/session.php');
include('./scripts/config.php');
include('./scripts/functions.php');
include('./scripts/main.php');



$act_query = "UPDATE forum_users set lastactive=now(), where username='$login'";
mysql_query($act_query);

$query = "UPDATE friends set lastactive=now(), where friendname='$login'";
mysql_query($query);


if ($_GET["filter"] != "")
{
$filter = $_GET["filter"];
$infilterator = "AND sex='$filter'";
$showfilter = " $filter";
}



if ($act == "")
{


$helplink = "<br/><small><a href=\"./gallery.php?ses=$ses&amp;act=about\">members gallery help</a></small>";

if (empty($page) || ($page < 1)) $page = 1; $max = 5;  $start = ($page-1) * $max;


$query = "SELECT count(*) from forum_users where avatar!='' AND gallery='yes' $infilterator";
$result =mysql_query($query);
$row2 =mysql_fetch_array($result);
$count = $row2[0];

$query = "SELECT username, avatar from forum_users where avatar!='' AND gallery='yes' $infilterator LIMIT $start, $max";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);






if ($filter == "") $filtopt = "<p class=\"breakforum\" style=\"text-align: center;\">[<a href=\"./gallery.php?filter=male&amp;ses=$ses\">show male only</a>][<a href=\"./gallery.php?filter=female&amp;ses=$ses\"/>show female only</a>]</p>";
elseif ($filter == "male") $filtopt = "<p class=\"breakforum\" style=\"text-align: center;\">[<a href=\"./gallery.php?filter=female&amp;ses=$ses\">show female only</a>][<a href=\"./gallery.php?ses=$ses\"/>show all</a>]</p>";
elseif ($filter == "female") $filtopt = "<p class=\"breakforum\" style=\"text-align: center;\">[<a href=\"./gallery.php?filter=male&amp;ses=$ses\">show male only</a>][<a href=\"./gallery.php?ses=$ses\"/>show all</a>]</p>";


if ($count == 1) $users = "<br/>one$showfilter user is in the gallery";
elseif ($count < 1) $users = "<br/>nobody is in the gallery";
elseif ($count > 1) $users = "<br/>$count$showfilter users are in the gallery";


if ($bwmode == "off") $subtite = "<img src=\"./scripts/phoenix.php?string=Members%20Gallery&amp;login=$login\" alt=\"Member Gallery\"/>";
else $subtite = "<b><big>Members Gallery</big></b>";

echo "<p align=\"center\" class=\"break\">$subtite$users$inboxes$helplink</p>";

///////////////////////////////////////////////////////////////
////////// shortcut block /////////////////////////////////////////
///////////////////////////////////////////////////////////////
$queryd = "SELECT * FROM shortcuts";
$resultd = mysql_query($queryd);
$rowd = mysql_fetch_array($resultd);

echo "<form class=\"breakforum\" style=\"text-align: center;\" action=\"$lback/shortcuts.php?ses=$ses\" method=\"get\">
<fieldset>
<select name=\"shortcut\">";

while ($rowd)
{

$sid = $rowd["id"];
$sname = $rowd["name"];

echo "<option value=\"$sid\">$sname</option>";

$rowd = mysql_fetch_array($resultd);
}

echo "</select>
<input type=\"submit\" value=\"go there\"/>
<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
</fieldset></form>";
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////



echo "$filtopt";





		if ($count > $max) 
		{
		echo  "<p class=\"breakforum\" style=\"text-align: center;\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $max);
		}

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"gallery.php?ses=$ses&amp;filter=$filter&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}









echo  "<table width=\"100%\" style=\"border-width: 0px;\" cellpadding=\"0\" cellspacing=\"0\">";

while ($row)
      	{
       	$name = $row["username"];
	$image = $row["avatar"];
	$id = $row["id"];

       	echo "<tr><td class=\"breakforum\" style=\"text-align: center;\"><b><a href=\"./profile.php?ses=$ses&amp;user=$name\">$name</a></b><br/><img src=\"./imgstor/imgtn.php?imid=$image&amp;res=65\" alt=\"$image\"/></td></tr>";

       	$row = mysql_fetch_array($result);
      	}

echo  "</table>";

		if ($count > $max) 
		{
		echo  "<p class=\"breakforum\" style=\"text-align: center;\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $max);
		}

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"gallery.php?ses=$ses&amp;filter=$filter&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}



echo "<hr/><p align=\"center\" class=\"break\">$hyback <a href=\"./mainmenu.php?ses=$ses\">main menu</a></p></body></html>";

      echo "$shortcuts</p></body></html>";
}

if ($act == "about")
{

echo "<p class=\"break\"><b><big>About Members Gallery</big></b><br/><small><a href=\"./about.php?ses=$ses&amp;act=about\">help menu</a></small></p><hr/>
<p class=\"breakforum\" style=\"text-align: center;\"><b><big>Everything you need to know about the members gallery.</big></b></p>
<p class=\"breakforum\">
<b>What is it?</b> - <i>it's a list of photos of our members.</i><br/><br/>
<b>Who's included?</b> - <i>anyone who chooses to be, all you do is upload a photo into one of your albums and set it as your Profile Pic! it's that easy! to change your gallery pic just change your profile pic.</i><br/><br/>
<b>Who can see it?</b> - <i>all users have access to the member's gallery.</i><br/><br/>
<b>How do i avoid it?</b> - <i>simple, in 'options' there's a <a href=\"./options/options.php?ses=$ses&amp;act=gallerypic\">members gallery</a> setting which allows you to decide if you want to be in the gallery or not. another method is to delete your profile pic.</i><br/><br/>
<b>Why this way, why break tradition?</b> - <i>other sites make you send in a pic to an email address and then make you wait days or even weeks for it to be added, in here it takes seconds, woosh. additionally, some sites provide an upload box right in the gallery, but don't give you the option to remove the pic should you make a mistake and upload a naked one by accident, again, this method is instantly rectifiable!</i><br/><br/>
<b>Extra Help</b> - <i>if you have questions or need help with the message boards, or to request a deletion, feel free to send a message to <a href=\"../mail/index.php?ses=$ses&amp;senduser=$PHNAME&amp;act=presetuser\">$PHNAME</a>.</i>
</p><hr/><p class=\"break\">
    $hyback <a href=\"./gallery.php?ses=$ses\">back</a><br/>
    $hyback <a href=\"./mainmenu.php?ses=$ses\">main menu</a></p></body></html>";


exit;

}

?>
