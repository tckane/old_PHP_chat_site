<?php


include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/config.php');
include('../scripts/functions.php');
include('../scripts/main.php');








$query = "SELECT count(*) from sponsors";
$result =mysql_query($query);
$row2 =mysql_fetch_array($result);
$count = $row2[0];


if ($bwmode == "off") $subtite = "<img src=\"../scripts/phoenix.php?login=$login&amp;string=Friends%20Of%20$sitename\" alt=\"Friends Of $sitename\"/>";
else $subtite = "<b><big>Friends Of $sitename</big></b>";

echo "<p class=\"break\">$subtite</p><hr/>
<p class=\"breakforum\" style=\"text-align: center;\">
We currently link to $count other sites.<br/>
To get your link in here, simply link to us and then tell us you've done it.</p><hr/>";



$query = "SELECT * from sponsors ORDER BY id DESC";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);




while ($row)
      	{
       	$name = $row["name"];
	$url = $row["url"];




       	echo "<p class=\"breakforum\" style=\"text-align: center;\"><a href=\"$url\">$name</a></p>";



       	$row = mysql_fetch_array($result);
      	}






echo "<hr/><p class=\"break\">

$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";



?>