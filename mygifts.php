<?php

include('./scripts/ses.php');
include('./scripts/header.php');
include('./scripts/session.php');
include('./scripts/config.php');
include('./scripts/functions.php');
include('./scripts/main.php');



$user = $_GET["user"];

$page = $_GET["page"];


$act_query = "UPDATE forum_users set lastactive=now(), location='gift shop' where username='$login'";
mysql_query($act_query);
$query = "UPDATE friends set lastactive=now(), location='gift shop' where friendname='$login'";
mysql_query($query);

$spesh = urlencode("$user's Gifts");


$subtite = "<img src=\"../scripts/phoenix.php?login=$login&amp;string=$spesh\" alt=\"$user's Gifts\"/>";


echo "<p class=\"break\">$subtite</p><hr/>
<p class=\"breakforum\" style=\"text-align: center;\"><b>Here are all the gifts $user has received.</b></p>";


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


if (empty($page) || ($page < 1)) $page = 1; $max = $tmax;  $start = ($page-1) * $max;




$query = "SELECT count(*) from phoenix_gifts where username='$user'";
$result =mysql_query($query);
$row2 =mysql_fetch_array($result);
$count = $row2[0];



$query = "SELECT * from phoenix_gifts where username='$user' ORDER BY id ASC LIMIT $start, $max";
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
		if ($counter != $page) echo "<b><a href=\"./mygifts.php?ses=$ses&amp;user=$user&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}



echo "<table width=\"100%\">
<tr align=\"center\"><td width=\"20%\"><b>Gift</b></td><td width=\"60%\"><b>Gift Name</b></td><td width=\"20%\"><b>From</b></td></tr>";



while ($row)
      	{
       	$gid = $row["gift"];
	$gfrom = $row["sender"];

$querye = "select * from phoenix_giftshop where id='$gid' ORDER BY gift ASC";
$resulte = mysql_query($querye);
$rowe = mysql_fetch_array($resulte);

$gname = $rowe["gift"];
$gurl = $rowe["url"];




       	echo "<tr align=\"center\"><td width=\"20%\"><img src=\"./giftshop/$gurl\"/></td><td width=\"60%\"><b><small>$gname</small></b></td><td width=\"20%\"><b><a href=\"./profile.php?ses=$ses&amp;user=$gfrom\">$gfrom</a></b></td></tr>";


       	$row = mysql_fetch_array($result);
      	}

echo "</table>";

		if ($count > $max) 
		{
		echo  "<p class=\"breakforum\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $max);
		}

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"./mygifts.php?ses=$ses&amp;user=$user&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}




if ($login == "$user") 
echo "<p class=\"breakforum\" style=\"text-align: center;\"><b>For every 10 gifts you receive, you'll also get a bonus of free credits, to find out more <a href=\"./about.php?ses=$ses&amp;act=currency\">click here</a>!</b></p>";
echo "<p class=\"break\">";

if ($user != "$login") echo "$hyfor <a href=\"./giftshop/index.php?ses=$ses&amp;user=$user\">send gifts to $user</a><br/>";

if ($user != "$login") echo "$hyback <a href=\"./profile.php?ses=$ses&amp;user=$user\">back to $user's profile</a><br/>";

echo "$hyback <a href=\"./profile.php?ses=$ses&amp;user=$login\">my profile</a><br/>";

echo "$hyback <a href=\"./mainmenu.php?ses=$ses\">main menu</a></p></body></html>";



?>
