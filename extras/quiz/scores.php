<?php


include('../../scripts/header.php');
include('../../scripts/session.php');
include('../../scripts/config.php');

$login=$row_ses["username"];
$tmax = $row_ses["tmax"];


$query = "UPDATE forum_users set lastactive=now(), location='Quiz' where username='$login'";
mysql_query($query);

$query = "UPDATE friends set lastactive=now(), location='Quiz' where friendname='$login'";
mysql_query($query);




echo "<p class=\"break\">";


$query = "SELECT count(*) from forum_users where quiz_score>160";
$result =mysql_query($query);
$row2 =mysql_fetch_array($result);
$count = $row2[0];

echo "<b>$count players made the leaderboard</b>$inboxes$breaker</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">";



if (empty($page) || ($page < 1)) $page = 1; $max = 5;  $start = ($page-1) * $max;

$query = "SELECT * from forum_users where quiz_score>160 ORDER BY quiz_score DESC LIMIT $start, $max";
$result = mysql_query("$query");
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);






if ($count > ($page * $max))
   	{
   	$number = ceil($count / $max);
   	}
if ($page > 1) echo "$hyback <a href=\"./scores.php?ses=$ses&amp;page=" . ($page - 1) . "\">back</a><br/><br/>";



	while ($row)
           
		{
		$user = $row["username"];
		$score = $row["quiz_score"];






		echo "<i><big>$user</big></i><br/><b>$score</b><br/>";
           	$row = mysql_fetch_array($result);
           	}




if ($count > ($page * $max)) 	echo "<br/><a href=\"./scores.php?ses=$ses&amp;page=" . ($page + 1) . "\">next</a> $hyfor<br/>";














echo "</p><hr/><p class=\"break\">$hyback <a href=\"./index.php?ses=$ses&amp;act=index\">wankety wank</a><br/>
$hyback <a href=\"../../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";








?>



