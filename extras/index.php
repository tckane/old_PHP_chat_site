<?php



include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/config.php');
include('../scripts/functions.php');
include('../scripts/main.php');




$act_query = "UPDATE forum_users set lastactive=now(), location='leaderboard' where username='$login'";
mysql_query($act_query);
$query = "UPDATE friends set lastactive=now(), location='leaderboard' where friendname='$login'";
mysql_query($query);


if ($bwmode == "off") $subtite = "<img src=\"../scripts/phoenix.php?login=$login&amp;string=Top%2020%20Members\" alt=\"$sitename Scoreboard\"/>";
else $subtite = "<b><big>$sitename Scoreboard</big></b>";


echo "<p class=\"break\">$subtite</p><hr/>
<p class=\"breakforum\" style=\"text-align: center;\"><b>Can you top the leader board?</b></p>";


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


if (empty($page) || ($page < 1)) $page = 1; $max = 20;  $start = ($page-1) * $max;




$query = "SELECT count(*) from forum_users WHERE posts>0 AND userlevel>2 ";
$result =mysql_query($query);
$row2 =mysql_fetch_array($result);
$count = $row2[0];

$query = "SELECT * from forum_users WHERE  posts>0 AND userlevel>2 ORDER BY posts DESC LIMIT $max";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);


$rank=1;


while ($row)
      	{
       	$name = $row["username"];
       	$posts = $row["posts"];
       	$credities = $row["credits"];
	$tittlea = $row["title"];

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



       	echo "<p class=\"breakforum\" style=\"text-align: center;\"><b><big>- $rank -</big></b><br/><b><a href=\"../profile.php?ses=$ses&amp;user=$name\">$name</a><br/>$tittle<br/>
<small>Score: $posts - Credits: $credities</small></b></p>";


       	$row = mysql_fetch_array($result);
 	$rank++;
      	}



echo "<p class=\"breakforum\" style=\"text-align: center;\">All you have to do to get on the board is be sociable!<br/>
Administrators are not included in this leage table.</p>
<p class=\"break\">$hyfor <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";





?>