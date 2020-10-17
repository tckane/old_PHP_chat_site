<?php

include('./scripts/header.php');
include('./scripts/session.php');
include('./scripts/config.php');
include('./scripts/functions.php');
include('./scripts/main.php');




$act = $_GET['act'];
if ($act == "")
{
$act = $_POST['act'];
}







$mailsubject = $_POST["mailsubject"];
$mailmessage = $_POST["mailmessage"];
$mailfrom = $_POST["mailfrom"];

if ($act == "")


{




echo "<p class=\"break\"><big>Contact Us</big></p><hr/>";



echo "<form class=\"breakforum\" action=\"sendmail.php?ses=$ses&amp;act=sendmsg\" method=\"post\">

<fieldset>
<b>To:</b><br/>
The Administrator<br/>

<b>Your Email:</b><br/>
<input type=\"text\" name=\"mailfrom\" class=\"textbox\"/><br/>

<b>Subject:</b><br/>
<select name=\"mailsubject\">
<option value=\"Question\">Question</option>
<option value=\"Comment\">Comment</option>
<option value=\"Error Report\">Error Report</option>
<option value=\"Complaint\">Complaint</option>
<option value=\"Linkage Request\">Linkage Request</option>
<option value=\"Content Request\">Content Request</option>
<option value=\"Feature Request\">Feature Request</option>
</select>
<br/>

<b>Message:</b><br/>
<textarea name=\"mailmessage\" class=\"textbox\" rows=\"3\" cols=\"26\"></textarea><br/>
<input type=\"hidden\" name=\"act\" value=\"sendmsg\" class=\"textbox\"/><br/>";


	$firstwords = array("wet", "hot", "fun", "new", "old", "wild", "sore", "tasty", "feeble", "silent", "tired", "aged", "skint", "rich", "filthy", "pretty", "fancy", "stoned", "high", "low", "middle", "cold", "warm", "lucid", "placid", "hidden");
	$firstwords = $firstwords[rand(0,25)];

	$lastwords = array("beef", "pie", "cars", "rats", "mice", "foot", "file", "meat", "pigs", "kane", "hare", "style", "pork", "grass", "test", "stain", "lace", "wall", "floor", "can", "van", "man", "girl", "code", "lips", "fox");
	$lastwords = $lastwords[rand(0,25)];

	// let's attempt to generate a captcha code!
	$coder = "$firstwords $lastwords";

	$string = base64_encode("$coder");



	echo "<b>Please Enter This Code</b><br/>
	<img align=\"middle\" src=\"./scripts/captcha.php?string=$string\" alt=\"$coder\"/>";
	echo "<br/><b>Into This Box</b><br/><input name=\"captcha\" type=\"text\" class=\"textbox\" title=\"code\" maxlength=\"62\" /><br/>";
	
	$formby = base64_encode("$coder");





$mailme = base64_encode("chris@phoenixbytes.com");

echo "<input type=\"submit\" class=\"buttstyle\" value=\"send message\"/>
<input type=\"hidden\" name=\"formkey\" value=\"$formby\"/>
<input type=\"hidden\" name=\"mailto\" value=\"$mailme\"/>
</fieldset>
</form>
<hr/><p class=\"break\">
$hyback  <a href=\"./index.php?ses=$ses\">back</a></p></body></html>";




}






if ($act == "sendmsg")
{

//// capture!!

$captcha = clean($_POST["captcha"]);

$formkey = clean($_POST["formkey"]);

$newkey = base64_decode("$formkey");

$mailto = base64_decode($mailto = $_POST["mailto"]);



	if ($captcha == "$newkey")
	{


	$mailto = strtolower("$mailto");



	echo "<p class=\"break\">Thank You</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	Your message was sent!<br/>We will get back to you shortly.";


	$email_subject = stripslashes("$mailsubject"); // The Subject of the email 
	$email_txt = stripslashes("$mailmessage"); // Message that the email has in it 
	
	$email_to = $mailto; // Who the email is to

	$headers = "From: $mailfrom <$mailfrom>";



	$email_message = "$email_txt\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n------------\n Sent from 'contact us' page by\n$mailfrom"; 


	$ok = mail($email_to, $email_subject, $email_message, $headers); 
	echo "<p class=\"break\">
	$hyback  <a href=\"./index.php?ses=$ses\">back</a></p></body></html>";
	} 
	else
	{

	echo "<p class=\"break\">Error</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	You incorrectly typed the image text, please go back and try that again.";
	echo "<hr/><p class=\"break\">
	$hyback  <a href=\"./index.php?ses=$ses\">back</a></p></body></html>";
	}

}




?>
