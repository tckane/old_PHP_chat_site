<?php

include("./scripts/main.php");





if ($signupswitch == "on" || $signupswitch == "val")
{


if ($signupswitch == "val") $valmsg = "<br/>Please note that to complete the registration you need to verify your email address by clicking on the link that will be sent to you.";
else $valmsg = "";

if ($signupswitch == "val") $valreminder = "<br/><b><small>Your account can only be verified with a <i>real</i> email address.</small></b>";
else $valreminder = "";

	echo "<p class=\"break\">$logo<br/>
	<a href=\"./about.php\">why become a member?</a></p><hr/>
	<p class=\"breakforum\" style=\"text-align: center;\"><b>Please fill in <u>all</u> fields.$valmsg</b></p>";
	echo "<form class=\"breakforum\" action=\"./insertuser.php\" method=\"post\">
		<fieldset>";

	echo "<b>Username:</b>";
	echo "<br/><input name=\"username\" type=\"text\" class=\"textbox\"  title=\"username\" maxlength=\"24\" /><br/>";

	echo "<b>Real Name:</b>";
	echo "<br/><input name=\"realname\" type=\"text\" class=\"textbox\"  title=\"realname\" maxlength=\"100\" /><br/>";

	echo "<b>Password:</b>";
	echo "<br/><input name=\"eggs\" type=\"text\" class=\"textbox\" title=\"password\" maxlength=\"24\" /><br/>";

	echo "<b>Email Address:</b>
	$valreminder";
	echo "<br/><input name=\"email\" type=\"text\" class=\"textbox\" title=\"email address\" maxlength=\"62\" /><br/>";

	echo "<b>Home Town:</b>";
	echo "<br/><input name=\"town\" type=\"text\" class=\"textbox\"  title=\"town\" maxlength=\"120\" /><br/>";


	echo "<b>Sex:</b>";
    	echo "<br/><select name=\"sex\" title=\"sex\" class=\"textbox\" value=\"male\">
    	<option value=\"male\">male</option>
    	<option value=\"female\">female</option>
    	</select><br/>";

	echo "<b>Date Of Birth:</b><br/>
	<select name=\"ddmy\" class=\"textbox\" title=\"day\" value=\"$brd\">";
	for( $i=1; $i<=31; $i++ )
	{
	echo "<option value=\"$i\">$i</option>";
	}
    	echo "</select>
	<select name=\"mdmy\" class=\"textbox\" title=\"day\" value=\"$brm\">";
	for( $i=1; $i<=12; $i++ )
	{
	echo "<option value=\"$i\">$i</option>";
	}
    	echo "</select>
	
	<select name=\"ydmy\" class=\"textbox\" title=\"day\" value=\"$bry\">";
	$ydmylimit =  (date("Y") - 18);

	for( $i=$ydmylimit; $i>1930; $i-- )
	{
	echo "<option value=\"$i\">$i</option>";
	}


    	echo "</select><br/>";

	echo "<b>A Bit About Me:</b>";
	echo "<br/><textarea rows=\"5\" cols=\"20\" name=\"sig\" title=\"signature\" class=\"textbox\"></textarea><br/>";

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
	

	echo "<input type=\"hidden\" name=\"formkey\" value=\"$formby\"/>
	<input type=\"submit\" class=\"buttstyle\" value=\" register \"/></fieldset></form><hr/><p class=\"break\">";

	echo "$hyl<a href=\"./index.php\">member login</a>$hyl<br/>$hyl<a href=\"./index.php\">exit</a>$hyl";

	echo "</p></body></html>";
	exit;


}
else
{






echo "<p class=\"break\"><big>Registration Closed</big></p><hr/>";



echo "<p class=\"breakforum\"><b><big>
Dear Users,<br/><br/>
Please accept our humble apologies but we are currently accepting no new registrations on our site.<br/>
We are most probably making some big changes or are suffering from a critical error.<br/>
This is most likely a temporary measure so please do try again at another time.<br/><br/>
We apologise for any inconvenience this may cause.<br/><br/>
Regards,<br/>
Chris Kane,<br/>
Administrator,<br/>
$sitename.co.uk
</big></b></p>
<hr/><p class=\"break\">
$hyback  <a href=\"./index.php?ses=$ses\">back</a></p></body></html>";







}






?>
