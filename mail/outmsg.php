<?php

include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/config.php');
include('../scripts/functions.php');


$login = $row_ses["username"];
$filter = $row_ses["filter"];
$uicn = $row_ses["uicn"];
$sicn = $row_ses["sicn"];
$pmax = $row_ses["pmax"];

$mycol = $row_ses["my_color"];
$bgco = $row_ses["bg_col"];




if ($group < 4)
{




$mail_query = "UPDATE phoenix_mail set readdate=now(), read_state=1 where mid=$mid and userto='$login'";
mysql_query($mail_query);


$query = "select * from phoenix_mail where mid='$mid' and author='$login'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

if ($num_rows <1)

	{
	echo "<p class=\"break\">
	<b>error</b>$breaker</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	this message does not exist.</p><hr/><p class=\"break\">$breaker$hyback <a href=\"inbox.php?ses=$ses\">inbox</a>
	<br/>$hyback <a href=\"index.php?ses=$ses&amp;act=index\">messaging</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
	exit;
	}

if ($result == false)

	{
	echo "<p class=\"break\">
	<b>error</b>$breaker</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	trying to read other people's messages, not on.</p><hr/><p class=\"break\">$breaker
	$hyback <a href=\"inbox.php?ses=$ses\">inbox</a><br/>
	<br/>$hyback <a href=\"index.php?ses=$ses&amp;act=index\">messaging</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</p></body></html>";
	exit;
	}

elseif ($result == true)

	{
	echo "<p class=\"break\">";

	$mid = $row["mid"];
	$sentdate = $row["sentdate"];
	$userto = $row["userto"];
	$col = $row["my_color"];
	$message = $row["message"];
	$subject = stripslashes($row["subject"]);
        
        // add all the links and the img: tag

        $message = funk_it_up($message, $ses);
	
	$message = add_sicn($message);

$query = "UPDATE friends set lastactive=now(), location='reading a message to $userto' where friendname='$login'";
mysql_query($query);

$act_query = "UPDATE forum_users set lastactive=now(), location='reading a message to $userto' where username='$login'";
mysql_query($act_query);

$query = "select * from forum_users where username='$userto'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);



	$frommer = "<b>to: 
	<a href=\"../profile.php?ses=$ses&amp;user=$userto&amp;pot=head\">$userto</a></b>";


if ($subject == "") $dsub = "message";
else $dsub = "$subject";

echo "<big>$dsub</big></p><hr/>";

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


echo "<p class=\"break\" style=\"text-align: left;\">";
echo "$frommer<br/>";
echo "<b>sent: </b>$sentdate</p>
<p class=\"breakforum\">";
echo "<br/>$message</br/>";
	echo "</p><hr/><p class=\"break\" style=\"text-align: left;\">$hyback <a href=\"insert.php?ses=$ses&amp;mid=$mid&amp;act=delo\">delete</a><br/>";
	echo "$hyback <a href=\"outbox.php?ses=$ses\">back to outbox</a><br/>";
	echo "$hyback <a href=\"index.php?ses=$ses\">back to messaging</a>";
	echo "<br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
	exit;
	}

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
