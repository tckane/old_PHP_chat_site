<?php



include('./scripts/header.php');
include('./scripts/session.php');
include('./scripts/config.php');
include('./scripts/functions.php');
include('./scripts/main.php');







$subtite = "$logo<br/><img src=\"./scripts/phoenix.php?string=Most%20Popular&amp;login=$login\" alt=\"Most Popular\"/>";

echo "<p class=\"break\">$subtite$inboxes</p><hr/>
<p class=\"breakforum\" style=\"text-align: center;\"><b><big>Our Top 10 Most Popular Members</big><br/>
Click on a member's ID Card to view their profile.</b><br/>
<small><b>Why don't ya <a href=\"./register.php\">Join Them</a>?</b></small></p>";








if (empty($page) || ($page < 1)) $page = 1; $max = 10;  $start = ($page-1) * $max;




$query = "SELECT count(*) from forum_users WHERE avatar!='' AND profile_access='public'";
$result =mysql_query($query);
$row2 =mysql_fetch_array($result);
$count = $row2[0];

$query = "SELECT * from forum_users WHERE  avatar!='' AND profile_access='public' ORDER BY profilevisits DESC LIMIT $max";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);





while ($row)
      	{
       	$name = $row["username"];



       	echo "<p class=\"breakforum\" style=\"text-align: center;\"><a href=\"$lback/$name\"><img src=\"./imgstor/imgcard.php?user=$name\" alt=\"$name\"/></a></p>";


       	$row = mysql_fetch_array($result);
      	}


echo "<hr/><p class=\"break\">$hyback <a href=\"./index.php?ses=$ses\">main menu</a>";

      echo "$shortcuts</p></body></html>";




?>
