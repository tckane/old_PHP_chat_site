<?php


include('../scripts/ses.php');
include('../scripts/main.php');


$theiremail = $_POST["theiremail"];

$myname = $_POST["myname"];

$theirname = $_POST["theirname"];

if ($act == "")
{

echo "<p class=\"break\">Invite Friends</p><hr/>
<p class=\"breakforum\" style=\"text-align: center;\"><big><b>Type in your friend's email address, their name &amp; your name and you'll have them on your friends list in no time!</b></big></p>

	<form class=\"breakforum\" action=\"invite.php?ses=$ses&amp;act=doit\" method=\"post\" enctype=\"multipart/form-data\">
	<fieldset>
	<b>Their Email:</b><br/>
	<input name=\"theiremail\" class=\"textbox\" type=\"text\" maxlength=\"50\"/><br/>
	<b>Your Name:</b><small>(the name they know you by!)</small><br/>
	<input name=\"myname\" class=\"textbox\" type=\"text\" maxlength=\"50\"/><br/>
	<b>Their Name: </b><br/>
	<input name=\"theirname\" class=\"textbox\" type=\"text\" maxlength=\"50\"/>
	<br/>
	<input type=\"submit\" class=\"buttstyle\" value=\"-&gt; send\"/>
	<input type=\"hidden\" name=\"act\" value=\"doit\"/>
	</fieldset>
	</form>

<hr/><p class=\"break\">

$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
}


if ($act == "doit")
{


$sender = "invitations@phoenixbytes.co.uk"; 
$recipient = "$theiremail"; 
$subject = "Invitation to $sitename from $myname"; 



$content = "Hey $theirname.\r\n
	I wanted to tell you about this great new mobile social site i've joined!\n\n
	It's called $sitename and it's the coolest thing i've seen on wap!\n\n
	You HAVE to come!\n\n
	I won't take no for an answer!\n\n
	Click on the link below to go sign up then add me as a friend, my username on there is $login\n\n
	$lback/register.php\r\n
	Thanks, $myname aka $login";


// Additional headers

$headers = 'From: ' . "$ligin <$sender>" . "\r\n";

// Mail it
mail($recipient, $subject, $content, $headers);


echo "<p class=\"break\">Invite Sent</p><hr/>
<p class=\"breakforum\" style=\"text-align: center;\">
Let's hope they got it!</p>

<hr/><p class=\"break\">

$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";


}


?>