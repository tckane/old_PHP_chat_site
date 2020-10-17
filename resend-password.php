<?php


include('./scripts/header.php');
include('./scripts/session.php');
include('./scripts/config.php');
include('./scripts/functions.php');
include('./scripts/main.php');
include('./scripts/cleaner.php');


$action = $_GET["action"];




if ($action == "")
{

echo "<p class=\"break\"><big>Find My Password!</big></p><hr/><p class=\"breakforum\" style=\"text-align: center\">
<b>Please enter your username below, your account details will be sent to the email address you used to register.</b></p><hr/>

<form class=\"breakforum\" style=\"text-align: center;\" action=\"./resend-password.php\" method=\"get\">
<fieldset>
<b><u>Find my account by</u>...<br/><br/>
<input type=\"radio\" name=\"method\" value=\"username\"/>My Username<br/>
<input type=\"radio\" name=\"method\" value=\"email\"/>My Email Address<br/>
<br/>Which is</b><br/><input type=\"text\" name=\"stringy\"/><br/>
<input type=\"submit\" value=\"do it\"/>
<input type=\"hidden\" name=\"action\" value=\"do\"/>


</fieldset>
</form>
<hr/><p class=\"break\">";

echo "$hyl<a href=\"./index.php\">member login</a>$hyl<br/>$hyl<a href=\"./index.php\">exit</a>$hyl";

echo "</p></body></html>";

}






if ($action == "do")
{


$stringy = clean($_GET["stringy"]);
$searchby = $_GET["method"];


if ($searchby == "username")
	{
	$query = "select * from forum_users where username='$stringy'";
	$result = mysql_query($query);
	$counter = mysql_num_rows($result);
	}
if ($searchby == "email")
	{
	$query = "select * from forum_users where email='$stringy'";
	$result = mysql_query($query);
	$counter = mysql_num_rows($result);
	}


if ($counter > 0)
	{



	$rowhh = mysql_fetch_array($result);
	$email = $rowhh["email"];
	$valcode = $rowhh["validby"];
	$username = $rowhh["username"];
	$eggs = $rowhh["password"];

$sender = "reminder@phoenixbytes.co.uk"; 
$recipient = "$email"; 
$subject = "Password Reminder for $sitename"; 



$content = "Here are the account details you requested.\r\n
	Username: $username\n
	Password: $eggs\n\n
	If you did not request this email, please ignore it, no changes have been made to your account.\r\n";


// Additional headers
$headers = 'From: ' . "$sitename <$sender>" . "\r\n";

// Mail it
mail($recipient, $subject, $content, $headers);







echo "<p class=\"break\">Reminder Sent</p><hr/><p class=\"breakforum\" style=\"text-align: center\">


Your account details have been emailed to the address you supplied with us<br/><b>$email</b></p><hr/><p class=\"break\">";

	echo "$hyl<a href=\"./index.php\">member login</a>$hyl<br/>$hyl<a href=\"./index.php\">exit</a>$hyl";

	echo "</p></body></html>";

	}
else
	{



echo "<p class=\"break\">Account Not Found</p><hr/><p class=\"breakforum\" style=\"text-align: center\">
A match for <b>$stringy</b> was not found, it's possible the account was removed due to abuse or inactivity.
</p><hr/><p class=\"break\">";

	echo "$hyl<a href=\"./index.php\">member login</a>$hyl<br/>$hyl<a href=\"./index.php\">exit</a>$hyl";

	echo "</p></body></html>";




	}


}













?>