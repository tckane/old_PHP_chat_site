<?php

include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/functions.php');
include('../scripts/config.php');

$login = $row_ses["username"];
$tablec = $row_ses["tr_col"];
$group = $row_ses["userlevel"];
$mycol = $row_ses["my_color"];
$bgco = $row_ses["bg_col"];


$err = $_GET['err'];

$act_query = "UPDATE forum_users set lastactive=now(), location='browsing sent email' where username='$login'";
mysql_query($act_query);


$query = "UPDATE friends set lastactive=now(), location='browsing sent email' where friendname='$login'";
mysql_query($query);


$helplink = "<br/><small><a href=\"./index.php?ses=$ses&amp;act=about\">mailbox help</a></small>";

if ($group <= 3)




{

if ($err != "") $err = "<br/><small><b>$err</b></small>";

if (empty($page) || ($page < 1)) $page = 1; $max = $tmax;  $start = ($page-1) * $max;

$query1 = "SELECT count(*) from phoenix_email where username='$login' and type='message'";
$result1 = mysql_query($query1);
$row1 = mysql_fetch_array($result1);
$count = $row1[0];

echo "<p class=\"break\">";


if ($bwmode == "off") $subtite = "<img align=\"middle\" src=\"../scripts/phoenix.php?login=$login&amp;string=sent%20email($count);\" alt=\"sent email($count);\"/>";
else $subtite = "<b><big>sent email($count);</big></b>";


echo "$subtite$err$helplink</p><hr/>";


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
$query = "select * from phoenix_email where username='$login' and type='message' ORDER BY id DESC LIMIT $start, $max";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);


		if ($count > $max) 
		{
		echo  "<p class=\"breakforum\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $pmax);
		}

		echo "$firstage";

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"./esent.php?ses=$ses&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}


if ($num_rows < 1) echo "<p class=\"breakforum\" style=\"text-align: center;\"><b>there are no messages to display</b></p>";



while ($row)

	{
	$mid = $row["id"];
	$author = $row["address"];
	$subject = make_wml_compat($row["subject"]);
	if ($subject == "") $subject = "[no subject]";



$querybee = "select * from phoenix_email where username='$login' AND address='$author' AND type='address'";
$resultbee = mysql_query($querybee);
$countfrom = mysql_num_rows($resultbee);

if ($countfrom > 0)
{
$rowfrom = mysql_fetch_array($result);

$friendlysender = $rowfrom["friendlyaddress"];
}
else
{
$friendlysender = "$author";
}

	echo "<p class=\"breakforum\"><img src=\"../images/mail/email.gif\" alt=\"\"/> <b><a href=\"./emsg.php?ses=$ses&amp;mid=$mid\">$subject</a></b> to <b><a href=\"./addressbook.php?ses=$ses&amp;frommer=$author&amp;act=view\">$friendlysender</a></b></p>";
	$row = mysql_fetch_array($result);


	}


		if ($count > $max) 
		{
		echo  "<p class=\"breakforum\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $pmax);
		}

		echo "$firstage";

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"./esent.php?ses=$ses&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}


echo "<hr/><p class=\"break\" style=\"text-align: left;\">$breaker$hyfor <a href=\"./attachments/sendmail.php?ses=$ses\">new email</a><br/>
$hyfor <a href=\"./getmail.php?ses=$ses&amp;p=serv_1\">email inbox</a><br/>
$hyfor <a href=\"./addressbook.php?ses=$ses\">address book</a><br/>
$hyback <a href=\"./index.php?ses=$ses&amp;act=index\">mailbox</a><br/>
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
