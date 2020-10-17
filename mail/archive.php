<?php

include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/functions.php');
include('../scripts/config.php');

$login = $row_ses["username"];
$group = $row_ses["userlevel"];
$mycol = $row_ses["my_color"];
$tablec = $row_ses["tr_col"];
$bgco = $row_ses["bg_col"];
$tmax = $row_ses["tmax"];

$act_query = "UPDATE forum_users set lastactive=now(), location='browsing message archive' where username='$login'";
mysql_query($act_query);


$query = "UPDATE friends set lastactive=now(), location='browsing message archive' where friendname='$login'";
mysql_query($query);


$helplink = "<br/><small><a href=\"./index.php?ses=$ses&amp;act=about\">mailbox help</a></small>";

if ($group <= 3)

{


if (empty($page) || ($page < 1)) $page = 1; $max = $tmax;  $start = ($page-1) * $max;



$query = "SELECT count(*) from phoenix_mail where userto='$login' and bound!='out' and archive='yes'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$count = number_format(mysql_result($result,0,"count(*)"));


echo "<p class=\"break\">";

if ($bwmode == "off") $subtite = "<img align=\"middle\" src=\"../scripts/phoenix.php?login=$login&amp;string=archive($count);\" alt=\"archive($count);\"/>";
else $subtite = "<b><big>archive($count);</big></b>";


echo "$subtite$helplink</p><hr/>";
///////////////////////////////////////////////////////////////
////////// shortcut block /////////////////////////////////////////
///////////////////////////////////////////////////////////////
$query = "SELECT * FROM shortcuts";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

echo "<form class=\"breakforum\" style=\"text-align: center;\" action=\"$lback/shortcuts.php?ses=$ses\" method=\"get\">
<fieldset>
<select name=\"shortcut\">";

while ($row)
{

$sid = $row["id"];
$sname = $row["name"];

echo "<option value=\"$sid\">$sname</option>";

$row = mysql_fetch_array($result);
}

echo "</select>
<input type=\"submit\" value=\"go there\"/>
<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
</fieldset></form>";
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////


$query = "select * from phoenix_mail where userto='$login' and archive='yes' and bound!='out' ORDER BY read_state, stamp DESC LIMIT $start, $max";
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
		if ($counter != $page) echo "<b><a href=\"./archive.php?ses=$ses&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}





while ($row)

	{
	$mid = $row["mid"];
	$reply = $row["reply"];
	$author = $row["author"];
	$read_state = $row["read_state"];
	$col = $row["my_color"];
	$attachem = $row["attach"];
	$subject = stripslashes($row["subject"]);

	if ($subject == "") $subject = "(no subject)";


		if ($read_state == 0)
		{

		$prefix = "<img src=\"../images/mail/newmsg.gif\" alt=\"&#8226;\"/> ";
		}	
		else
		{
		$prefix = "<img src=\"../images/mail/oldmsg.gif\" alt=\"\"/> ";
		}



	if ($attachem == "yes") $suffix = "<big><b> !</b></big>";
	else $suffix = "";

	echo "<p class=\"breakforum\">$prefix <b><a href=\"./msg.php?ses=$ses&amp;mid=$mid\">$subject</a></b> from <b><a href=\"../profile.php?ses=$ses&amp;user=$author&amp;pot=head\">$author</a></b>$suffix</p>";
	$row = mysql_fetch_array($result);
	}


		if ($count > $max) 
		{
		echo  "<p class=\"breakforum\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $max);
		}

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"./archive.php?ses=$ses&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}


echo "<hr/><p class=\"break\" style=\"text-align: left;\">$breaker$hyfor <a href=\"./index.php?ses=$ses&amp;act=send\">new msg</a><br/>
$hyfor <a href=\"inbox.php?ses=$ses\">inbox</a><br/>
$hyfor <a href=\"outbox.php?ses=$ses\">outbox</a><br/>
$hyfor <a href=\"insert.php?ses=$ses&amp;act=delarc\">empty archive</a><br/>
$hyback <a href=\"./index.php?ses=$ses&amp;act=index\">messaging</a><br/>
$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>$shortcuts</p></body></html>";


}


else
{



	echo "<p class=\"break\"><img src=\"../scripts/phoenix.php?string=account%20restricted!&amp;login=$login\" alt=\"account%20restricted!\"/></p><hr/>
	<p class=\"breakforum\" style=\"text-align: center;\">";

	echo "Sorry, your account appears to be restricted, this may be due to misconduct on your part or an error on our part.<br/><br/>
	During the period of restriction you will be unable to use the Mailbox and some other functions of this site, this is for the protection of other users.<br/><br/>
	If you feel that this is an error and you have done nothing wrong please contact an administrator.";

	echo "</p><hr/><p class=\"break\">$breaker$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>$shortcuts</p></body></html>";
	exit;




}


?>
