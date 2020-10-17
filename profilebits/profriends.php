<?php


include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/config.php');

$login = $row_ses["username"];
$tmax = $row_ses["tmax"];
$backg = $row_ses["bg_col"];
$myco = $row_ses["my_color"];


$user= $_GET["user"];


$query = "UPDATE forum_users set lastactive=now(), location='friends list' where username='$user'";
mysql_query($query);

$query = "UPDATE friends set lastactive=now(), location='friends list' where friendname='$user'";
mysql_query($query);

$query = "SELECT count(*) from friends where myrequest<1 AND username='$user'";
$result =mysql_query($query);
$row2 =mysql_fetch_array($result);
$count = $row2[0];


if ($count == 1) $friendtot = "$user has $count friend";
elseif ($count > 1) $friendtot = "$user has $count friends";

if (empty($page) || ($page < 1)) $page = 1; $max = $tmax;  $start = ($page-1) * $max;

echo "<p class=\"break\"><b>$friendtot</b>$inboxes$breaker</p><hr/>";



$query = "select * from friends where myrequest<1 AND username='$user' ORDER BY lastactive DESC LIMIT  $start, $max";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);


if ($count > ($page * $max)) echo "<p class=\"breakforum\">";
elseif ($page > 1) echo "<p class=\"breakforum\">";


if ($page > 1) echo "$hyback <a href=\"profriends.php?ses=$ses&amp;by=$by&amp;user=$user&amp;page=" . ($page - 1) . "\">back</a> ";
if ($count > ($page * $max)) echo "<a href=\"profriends.php?ses=$ses&amp;by=$by&amp;user=$user&amp;page=" . ($page + 1) . "\">next </a> $hyfor";

if ($count > ($page * $max)) echo "</p>";
elseif ($page > 1) echo "</p>";


	while ($row)
           
		{
		$name = $row["friendname"];
		$lastactive = nicetime($row["lastactive"]);
		$id = $row["id"];
		$col = $row["my_color"];
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



		echo "<p class=\"breakforum\">$avvy <b><a href=\"../profile.php?user=$name&amp;ses=$ses\">$name</a></b> $mood<br/><small><b>[last seen $location $lastactive]</b></small></p>";

           	$row = mysql_fetch_array($result);
           	}



if ($count > ($page * $max)) echo "<p class=\"breakforum\">";
elseif ($page > 1) echo "<p class=\"breakforum\">";


if ($page > 1) echo "$hyback <a href=\"profriends.php?ses=$ses&amp;by=$by&amp;user=$user&amp;page=" . ($page - 1) . "\">back</a> ";
if ($count > ($page * $max)) echo "<a href=\"profriends.php?ses=$ses&amp;by=$by&amp;user=$user&amp;page=" . ($page + 1) . "\">next </a> $hyfor";


if ($count > ($page * $max)) echo "</p>";
elseif ($page > 1) echo "</p>";



echo "<hr/><p class=\"break\">";

if ($user != "$login") echo "$hyfor <a href=\"../friends/options.php?ses=$ses&amp;act=presetuser&amp;adduser=$user\">add to friends</a><br/>";
echo "$hyback <a href=\"../profile.php?ses=$ses&amp;user=$user\">back to $user's profile</a><br/>";
echo "$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";
echo "</p></body></html>";








?>