<?php


include('../scripts/ses.php');
include('../scripts/main.php');



$user = $_GET["user"];

$page = $_GET["page"];


$act_query = "UPDATE forum_users set lastactive=now(), location='gift shop' where username='$login'";
mysql_query($act_query);
$query = "UPDATE friends set lastactive=now(), location='gift shop' where friendname='$login'";
mysql_query($query);


$subtite = "<img src=\"../scripts/phoenix.php?login=$login&amp;string=Send%20Gifts\" alt=\"Send Gifts\"/>";


echo "<p class=\"break\">$subtite</p><hr/>
<p class=\"breakforum\" style=\"text-align: center;\"><b>Choose a gift to send to $user</b></p>";


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




$query = "SELECT count(*) from phoenix_giftshop";
$result =mysql_query($query);
$row2 =mysql_fetch_array($result);
$count = $row2[0];

$query = "SELECT * from phoenix_giftshop ORDER BY gift ASC LIMIT $start, $max";
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
		if ($counter != $page) echo "<b><a href=\"./index.php?ses=$ses&amp;user=$user&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}



echo "<table border=\"1px\" cellspacing=\"0\" cellpadding=\"0\" align=\"left\" width=\"100%\" class=\"breakforum\">";

echo "<tr align=\"center\"><td width=\"20%\"><b>Preview</b></td><td width=\"60%\"><b>Gift Name</b></td><td width=\"20%\"><b>Price</b></td></tr>";




while ($row)
      	{
       	$name = $row["gift"];
       	$url = $row["url"];
       	$gid = $row["id"];
       	$price = $row["price"];



       	echo "<tr align=\"center\"><td width=\"20%\"><img src=\"./$url\"/></td><td width=\"60%\"><b><small><a href=\"../profilebits/profopts.php?ses=$ses&amp;user=$user&amp;gid=$gid&amp;do=sendgift\">$name</a></small></b></td><td width=\"20%\"><b>$price</b>Cr</td></tr>";


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
		if ($counter != $page) echo "<b><a href=\"./index.php?ses=$ses&amp;user=$user&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}

echo "<p class=\"breakforum\" style=\"text-align: center;\"></p>
<p class=\"break\">";



if ($user != "$login") echo "$hyback <a href=\"../mygifts.php?ses=$ses&amp;user=$user\">see $user's gifts</a><br/>";
if ($user != "$login")  echo "$hyback <a href=\"../profile.php?ses=$ses&amp;user=$user\">back to $user's profile</a><br/>";
echo "$hyback <a href=\"../mygifts.php?ses=$ses&amp;user=$login\">see my gifts</a><br/>";
echo "$hyback <a href=\"../profile.php?ses=$ses&amp;user=$login\">my profile</a><br/>";



echo "$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";





?>