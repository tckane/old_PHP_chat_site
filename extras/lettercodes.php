<?php


include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/config.php');
include('../scripts/functions.php');
include('../scripts/main.php');

$login = $row_ses["username"];
$backg = $row_ses["bg_col"];
$myco = $row_ses["my_color"];
$tmax = $row_ses["tmax"];



$act_query = "UPDATE forum_users set lastactive=now(), location='viewing icon list' where username='$login'";
mysql_query($act_query);

$query = "UPDATE friends set lastactive=now(), location='viewing icon list' where friendname='$login'";
mysql_query($query);




if (empty($page) || ($page < 1)) $page = 1; $max = 26;  $start = ($page-1) * $max;


$query = "SELECT count(*) from phoenix_icons where typed LIKE'%:%'";
$result =mysql_query($query);
$row2 =mysql_fetch_array($result);
$count = $row2[0];

	$query = "SELECT * from phoenix_icons where typed LIKE '%:%' ORDER BY typed ASC LIMIT $start, $max";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);





echo "<p class=\"break\">
There Are $count icons$inboxes<br/><small><a href=\"../about.php?ses=$ses&amp;act=about\">help menu</a></small></p><hr/>
<p class=\"breakforum\" style=\"text-align: center; font-weight: bold;\">these are letterballs, smiley faces with letters on em, to display these you wrap each letter of your word in colons, for example, :c: :o: :o: :l: would give you 
<img src=\"../images/sicn/c.gif\"/><img src=\"../images/sicn/o.gif\"/><img src=\"../images/sicn/o.gif\"/><img src=\"../images/sicn/l.gif\"/>.</p>

<div class=\"breakforum\"><table width=\"50%\">";


echo "<tr style=\"text-decoration: underline;\"><td><b><big>Type</big></b></td><td align=\"center\"><b><big>To Get</big></b></td></tr>";

if ($page > 1) echo "<tr><td>$hyback <a href=\"lettercodes.php?ses=$ses&amp;page=" . ($page - 1) . "\">back</a></td></tr>";

while ($row)
      	{
       	$name = $row["image"];
	$typed = $row["typed"];


       	echo "<tr><td align=\"left\"><b>$typed</b></td><td align=\"center\"><img align=\"middle\" src=\"../images/sicn/$name.gif\"></td></tr>";


       	$row = mysql_fetch_array($result);
      	}

if ($count > ($page * $max)) echo "<tr><td><a href=\"lettercodes.php?ses=$ses&amp;page=" . ($page + 1) . "\">next</a> $hyfor</td></tr>";


echo "</table></div><hr/>

<p class=\"break\">$hyback <a href=\"../about.php?ses=$ses&amp;act=about\">back to help</a><br/>
$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";

      echo "$shortcuts</p></body></html>";







?>
