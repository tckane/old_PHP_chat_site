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

echo "<p class=\"break\"><big>Activate My Account</big></p><hr/><p class=\"breakforum\" style=\"text-align: center\">
<b>Please enter your username below, your confirmation email will be sent to the email address you used to register.</b></p><hr/>

<form class=\"breakforum\" style=\"text-align: center;\" action=\"./resend-conf.php\" method=\"get\">
<fieldset>
<b><u>Find my account by</u>...<br/><br/>
<input type=\"radio\" name=\"method\" value=\"username\"/> My Username<br/>
<input type=\"radio\" name=\"method\" value=\"email\"/> My Email Address<br/><br/>
Which is</b><br/><input type=\"text\" name=\"stringy\"/><br/>
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
   $query = "select * from forum_users where username='$stringy' AND valid='no'";
   $result = mysql_query($query);
   $counter = mysql_num_rows($result);
   }
if ($searchby == "email")
   {
   $query = "select * from forum_users where email='$stringy' AND valid='no'";
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

$sender = "registration@phoenixbytes.co.uk"; 
$recipient = "$email"; 
$subject = "$sitename registration"; 



$content = "Thank you for joining $sitename.\r\n
   Here are your account details.\r\n
   Username: $username\n
   Password: $eggs\n\n
   Before you can log into our site you must confirm your account.
   To do that please click the link below or copy and paste it into your browser.\n\n
   $lback/conf.php?code=$valcode\r\n";


// Additional headers
$headers = 'From: ' . "$sitename <$sender>" . "\r\n";

// Mail it
mail($recipient, $subject, $content, $headers);







echo "<p class=\"break\">Reminder Sent</p><hr/><p class=\"breakforum\" style=\"text-align: center\">


The activation link has been emailed to the address you supplied with us<br/><b>$email</b><br/>
You must click on the link supplied in the email to become an active member.</p><hr/><p class=\"break\">";

   echo "$hyl<a href=\"./index.php\">member login</a>$hyl<br/>$hyl<a href=\"./index.php\">exit</a>$hyl";

   echo "</p></body></html>";

   }
else
   {



echo "<p class=\"break\">Activation Not Completed</p><hr/><p class=\"breakforum\" style=\"text-align: center\">
Your account does not appear to be awaiting activation.
</p><hr/><p class=\"break\">";

   echo "$hyl<a href=\"./index.php\">member login</a>$hyl<br/>$hyl<a href=\"./index.php\">exit</a>$hyl";

   echo "</p></body></html>";




   }


}













?>