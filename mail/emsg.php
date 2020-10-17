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

$ucol = $row_ses["my_color"];
$txt = $row_ses["text_col"];
$bgc = $row_ses["bg_col"];


$act_query = "UPDATE forum_users set lastactive=now(), location='browsing sent email' where username='$login'";
mysql_query($act_query);


$query = "UPDATE friends set lastactive=now(), location='browsing sent email' where friendname='$login'";
mysql_query($query);


if ($group < 4)
{




///// end formatting options template /////
///////////////////////////////////////////


$query = "select * from phoenix_email where id='$mid' AND username='$login'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

if ($num_rows < 1)
	{
	echo "<p class=\"break\">
	<b>error</b>$breaker</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	this message does not exist.</p><hr/><p class=\"break\">$hyback <a href=\"index.php?ses=$ses&amp;act=index\">messaging</a>$shortcuts</p></body></html>";
	exit;
	}


elseif ($num_rows >= 1)

	{
	echo "<p class=\"break\">";

	$mid = $row["id"];
	$sentdate = $row["date"];
	$author = $row["address"];
	$subject = $row["subject"];
	$attached = $row["attached"];
	$message = $row["message"];

        
$query = "select * from phoenix_email where username='$login' AND address='$author' AND type='address'";
$result = mysql_query($query);
$countfrom = mysql_num_rows($result);

if ($countfrom > 0)
{
$rowfrom = mysql_fetch_array($result);

$friendlysender = $rowfrom["friendlyaddress"];
}
else
{
$friendlysender = "$author";
}

	$frommer = "<b>to: 
	<a href=\"./addressbook.php?ses=$ses&amp;frommer=$author&amp;act=view\">$friendlysender</a></b> ";

	


if ($attached != "")
{
$attached = "<br/><small><b>attached: $attached</b></small>";
}
else
{
$attached = "";
}


if ($subject == "") $dsub = "message";
else $dsub = "$subject";

echo "<big>$dsub</big></p><hr/>
<p class=\"breakforum\">";
echo "$frommer<br/>";
echo "<b>sent: </b>$sentdate</p><hr/>
<p class=\"breakforum\">";





echo "$message$attached</p><hr/>";


echo "<form class=\"breakforum\" style=\"text-align: center;\" action=\"insert.php?ses=$ses&amp;act=shortcuts\" method=\"get\">
<fieldset>
<select name=\"shortcut\">
<option>shortcuts</option>
<option value=\"forums\">forums</option>
<option value=\"lounge\">the lounge</option>
<option value=\"chat\">chat</option>
<option value=\"options\">options</option>
<option value=\"friends\">friends</option>
<option value=\"uploader\">file exchanger</option>
<option value=\"albums\">albums</option>
<option value=\"online\">who's online</option>
</select><input type=\"submit\" value=\"go\"/>
<input type=\"hidden\" name=\"act\" value=\"shortcuts\"/>
<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
</fieldset></form>";

echo "<p class=\"break\" style=\"text-align: left;\">";

echo "$hyfor <a href=\"./insert.php?ses=$ses&amp;mid=$mid&amp;act=delemail\">delete</a><br/>";
echo "$hyback <a href=\"./esent.php?ses=$ses\">back to sent items</a><br/>";
echo "$hyfor <a href=\"./getmail.php?ses=$ses&amp;p=serv_1\">email inbox</a><br/>";
echo "$hyfor <a href=\"./attachments/sendmail.php?ses=$ses\">new email</a><br/>";
echo "$hyfor <a href=\"./addressbook.php?ses=$ses\">address book</a><br/>";
echo "$hyback <a href=\"./index.php?ses=$ses\">mailbox</a><br/>";
echo "$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p>";


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
