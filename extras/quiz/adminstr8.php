<?php


include('../../scripts/header.php');
include('../../scripts/session.php');
include('../../scripts/config.php');
include('../../scripts/functions.php');
include('../../scripts/main.php');

$login=$row_ses["username"];
$group = $row_ses["userlevel"];
$myscore=$row_ses["quiz_score"];
$simages = $row_ses["simages"];
$peasy = $row_ses["quiz_e_played"];
$pmed = $row_ses["quiz_m_played"];
$phard = $row_ses["quiz_h_played"];



if ($update == "yes")

			{

echo "<p align=\"center\" class=\"break\">";
echo "<big><b>Quiz</b></big>";
echo "<br/>quiz administration$inboxes</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">";
echo "please select the set of questions you wish to edit<br/>";

echo "<a style=\"color: blue;\" href=\"./configurataay.php?ses=$ses&amp;q=1&amp;diff=easy\">easy</a><br/>";
echo "<a style=\"color: green;\" href=\"./configurataay.php?ses=$ses&amp;q=1&amp;diff=med\">medium</a><br/>";
echo "<a style=\"color: red;\" href=\"./configurataay.php?ses=$ses&amp;q=1&amp;diff=hard\">hard</a><br/>";


echo "<br/><a href=\"./index.php?ses=$ses&amp;act=play\">preview</a><br/>";

echo "<i>lastly, you'll want to make sure ALL users can play,<br/>
when a user completes a section, it appears as *complete*, you need to click below, after each update, before turning the quiz back on.</i><br/>";
echo "<br/><a href=\"./insert2.php?ses=$ses&amp;act=unplayed\">reset 'played' status.</a><br/>";

	$query = "select * from waamp_quiz";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);
	$switch = $row["switch"];

if ($switch == "on")
{
echo "<br/><b>Quiz is active<br/><a href=\"./insert2.php?ses=$ses&amp;act=off\">turn it off?</a></b><br/>";
}
else
{
echo "<br/><b>Quiz is not active<br/><a href=\"./insert2.php?ses=$ses&amp;act=on\">turn it on?</a></b><br/>";
}


echo "</p><hr/><p class=\"break\">
$hyback <a href=\"../../options/index.php?ses=$ses&amp;act=index\">back to options</a><br/>
$hyback <a href=\"../../mainmenu.php?ses=$ses\">main menu</a>$shortcuts</p></body></html>";
exit;
			}




?>



