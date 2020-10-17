<?php



include('../../scripts/header.php');
include('../../scripts/session.php');
include('../../scripts/config.php');
include('../../scripts/functions.php');
include('../../scripts/main.php');

$login = $row_ses["username"];
$group = $row_ses["userlevel"];



#=========================================================================================
if ($act == on) 


	{

	$query="UPDATE waamp_quiz SET switch='on'";
	mysql_query($query);

	echo "<p class=\"break\">
	<b>done!</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	the quiz was activated, now all other users can participate.</p><hr/><p class=\"break\">
	$hyback <a href=\"adminstr8.php?ses=$ses&amp;update=yes\">back to admin</a>
	</p></body></html>";
	exit;
	}
#=========================================================================================

#=========================================================================================
if ($act == off) 


	{

	$query="UPDATE waamp_quiz SET switch='off'";
	mysql_query($query);

	echo "<p class=\"break\">
	<b>done!</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	the quiz was deactivated, the link has disappeared from the main menu.</p><hr/><p class=\"break\">
	$hyback <a href=\"adminstr8.php?ses=$ses&amp;update=yes\">back to admin</a>
	</p></body></html>";
	exit;
	}
#=========================================================================================

#=========================================================================================

if ($act == "unplayed") 


	{

	$query="UPDATE forum_users SET quiz_e_played='no'";
	mysql_query($query);

	$query="UPDATE forum_users SET quiz_m_played='no'";
	mysql_query($query);

	$query="UPDATE forum_users SET quiz_h_played='no'";
	mysql_query($query);

	echo "<p class=\"break\">
	<b>done!</b></p><hr/><p align=\"center\">
	all sections will now appear as unplayed for all users.</p><p class=\"break\">
	$hyback <a href=\"adminstr8.php?ses=$ses&amp;update=yes\">back to admin</a>
	</p></body></html>";
	exit;
	}
#=========================================================================================

#=========================================================================================
?>
