<?php

include('./scripts/header.php');
include('./scripts/session.php');
include('./scripts/config.php');
include('./scripts/functions.php');
include('./scripts/main.php');
include('./scripts/cleaner.php');





// this gets sent as a mail message to new users!

$welcomemessage = "(b)Thanks for joining $sitename, great to have you here! ======Please have a look around, check out the File Exchanger for some music, try out sending Pop Messages, let people get to know you by uploading some photos and filling in your profile. You can also have a $username@phoenixbytes.co.uk email address, change the themes, spice up your chat with BB Code & icons and if you get stuck you can have a look at the phoenix:help section or speak to one of our friendly admins.======If you do only one thing at $sitename, make sure you have fun!======Thanks, $PHNAME(/b) icon:smile";

///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
//
//
// PULLING IN THE VARIABLES, DEEP FILLED.
//
//
//


$username = clean($_POST["username"]);

$realname = clean($_POST["realname"]);

$town = clean($_POST["town"]);

$sex = clean($_POST["sex"]);

$ddmy = clean($_POST["ddmy"]);

$mdmy = clean($_POST["mdmy"]);

$ydmy = clean($_POST["ydmy"]);

$eggs = clean($_POST["eggs"]);

$email = clean($_POST["email"]);

$sig = clean($_POST["sig"]);






//// capture!!

$captcha = clean($_POST["captcha"]);

$formkey = clean($_POST["formkey"]);

$newkey = base64_decode("$formkey");


$age = "$ddmy-$mdmy-$ydmy";



if ($realname == "") $username = "";
if ($town == "") $username = "";
if ($sig == "") $username = "";




if ($captcha == "$newkey")
{


/// if it's ok, process the form, else, don't!



/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////
//
// hosties and agenties
//

$pip = $_SERVER['REMOTE_ADDR'];

$opip = $_SERVER['REMOTE_ADDR'];

$subno = gethostbyaddr($_SERVER['REMOTE_ADDR']);

$xpip = "$opip";

//
$user_agent = $_SERVER["HTTP_USER_AGENT"];
//
// NOKIA	
//
function trim_nok($string)
{
$string = trim($string);
$string = ereg_replace("1","x",$string);
$string = ereg_replace("2","x",$string);
$string = ereg_replace("3","x",$string);
$string = ereg_replace("4","x",$string);
$string = ereg_replace("5","x",$string);
$string = ereg_replace("6","x",$string);
$string = ereg_replace("7","x",$string);
$string = ereg_replace("8","x",$string);
$string = ereg_replace("9","x",$string);
$string = ereg_replace("0","x",$string);
$string = trim($string);
return $string; 
}	
$differ = substr($user_agent,0,9);
//
// is it a nokia?
$trimming = trim_nok("$differ");
//
// yes? ok, let's catch it.
//
if ($trimming == "Nokiaxxxx")
{
//
if (preg_match ("/Nokia/i", "$user_agent.")) $nokia = "Nokia";
//
//
function nokinums($string)
{ preg_match_all('/(?:([0-9]+)|.)/i', $string, $matches);
return strtolower(implode('', $matches[1])); }
//
$modelnokia =  nokinums("$user_agent");
$modelnokia = substr($modelnokia,0,4);
//
$nokia_display = "$nokia $modelnokia";
}
// end NOKIA
//
// start SHARP
//
if (preg_match ("/SHARP/i", "$user_agent.")) $sharp = "Sharp";
if ($sharp == "Sharp" )
{
if (preg_match ("/GX5/i", "$user_agent.")) $gx = "GX 5";
if (preg_match ("/GX10/i", "$user_agent.")) $gx = "GX 10";
if (preg_match ("/GX15/i", "$user_agent.")) $gx = "GX 15";
if (preg_match ("/GX20/i", "$user_agent.")) $gx = "GX 20";
if (preg_match ("/GX25/i", "$user_agent.")) $gx = "GX 25";
if (preg_match ("/GX30/i", "$user_agent.")) $gx = "GX 30";
if (preg_match ("/GX10/i", "$user_agent.")) $gx = "GX 10";
if (preg_match ("/GX15/i", "$user_agent.")) $gx = "GX 15";
if (preg_match ("/GX20/i", "$user_agent.")) $gx = "GX 20";
if (preg_match ("/GX25/i", "$user_agent.")) $gx = "GX 25";
if (preg_match ("/GX30/i", "$user_agent.")) $gx = "GX 30";
if (preg_match ("/GX35/i", "$user_agent.")) $gx = "GX 35";
if (preg_match ("/GX40/i", "$user_agent.")) $gx = "GX 40";
if (preg_match ("/GX45/i", "$user_agent.")) $gx = "GX 45";
if (preg_match ("/GX50/i", "$user_agent.")) $gx = "GX 50";
if (preg_match ("/GX5i/i", "$user_agent.")) $gx = "GX 5i";
if (preg_match ("/GX10i/i", "$user_agent.")) $gx = "GX 10i";
if (preg_match ("/GX15i/i", "$user_agent.")) $gx = "GX 15i";
if (preg_match ("/GX20i/i", "$user_agent.")) $gx = "GX 20i";
if (preg_match ("/GX25i/i", "$user_agent.")) $gx = "GX 25i";
if (preg_match ("/GX30i/i", "$user_agent.")) $gx = "GX 30i";
if (preg_match ("/GX10i/i", "$user_agent.")) $gx = "GX 10i";
if (preg_match ("/GX15i/i", "$user_agent.")) $gx = "GX 15i";
if (preg_match ("/GX20i/i", "$user_agent.")) $gx = "GX 20i";
if (preg_match ("/GX25i/i", "$user_agent.")) $gx = "GX 25i";
if (preg_match ("/GX30i/i", "$user_agent.")) $gx = "GX 30i";
if (preg_match ("/GX35i/i", "$user_agent.")) $gx = "GX 35i";
if (preg_match ("/GX40i/i", "$user_agent.")) $gx = "GX 40i";
if (preg_match ("/GX45i/i", "$user_agent.")) $gx = "GX 45i";
if (preg_match ("/GX50i/i", "$user_agent.")) $gx = "GX 50i";
//
$sharp_display = "$sharp $gx";
}
//
if (preg_match ("/SAMSUNG/i", "$user_agent.")) $samsung = "Samsung";
//
if ($samsung == "Samsung" )
{
function samnums($string)
{ preg_match_all('/(?:([0-9]+)|.)/i', $string, $matches);
return strtolower(implode('', $matches[1])); }
//
$modelsam =  samnums("$user_agent");
$modelsam = substr($modelnokia,0,4);
}
//
//
//
$diffwinie = substr($user_agent,25,4);
$diffngage = substr($user_agent,0,11);
$diffgx30i = substr($user_agent,0,14);
$diffSEP900 = substr($user_agent,0,17);
$diff3650 = substr($user_agent,0,10);
//
//
if ($trimming == "Nokiaxxxx") $unformattedagent = "$nokia_display";
elseif ($sharp == "Sharp") $unformattedagent = "$sharp_display";
//
elseif ($diffwinie == "MSIE") $unformattedagent = "Internet Explorer";
elseif ($diffSEP900 == "SonyEricssonP900i") $unformattedagent = "Sony Ericsson P900i";
elseif ($diffSEP900 == "SonyEricssonP900/") $unformattedagent = "Sony Ericsson P900";
elseif ($diffSEP900 == "SonyEricssonP910/") $unformattedagent = "Sony Ericsson P910";
elseif ($diff3650 == "Nokia 3650") $unformattedagent = "Nokia 3650";
elseif ($diffSEP900 == "SonyEricssonP910i") $unformattedagent = "Sony Ericsson P910i";
elseif ($diffngage == "NokiaN-Gage") $unformattedagent = "Nokia N-Gage";
//
else $unformattedagent = "$user_agent";
//
$agent = "$unformattedagent";

$pip = "$agent, $pip, $subno";



$uniquid = md5("$user_agent$pip$subno");


$uniquid = str_replace("a","z","$uniquid");
$uniquid = str_replace("b","y","$uniquid");

$uniquid = str_replace("c","x","$uniquid");
$uniquid = str_replace("d","w","$uniquid");

$uniquid = str_replace("e","v","$uniquid");
$uniquid = str_replace("f","u","$uniquid");

$uniquid = substr("$uniquid", 0, 32);




$queryverify = "SELECT * FROM uniquids WHERE uniquid='$uniquid'";
$result = mysql_query("$queryverify");
$numrows = mysql_num_rows($result);


if ($numrows >= 1)

{

echo "<p class=\"break\"><big>error</big></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
something happened. it was not good.</p><hr/><p class=\"break\">
$hyl<a href=\"./index.php\">exit</a>$hyl";

}
else
{












///////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////




function strip_name($string)
	{
	$string = ltrim($string);

$string = preg_replace("/[^a-zA-Z0-9]/", "", $string);

	return $string; 
	}



// Assigns the info to a more memorable (and shorter) name



// now getting info thats been past on from the last page (im pretty sure that this is not needed
// but lets leave it just in case)




// let's use our strip_name() function to remove said shit from usernames

$username = strip_name("$username");


// This checks that the user has entered all reqired info

if ($username != "" )
	{



	// Checks the requested username against those already in the database.

	$query_u = "SELECT * FROM forum_users WHERE username='$username'";
	$result_u = mysql_query("$query_u");
	$num_rowsu = mysql_num_rows($result_u);

	$query_x = "SELECT * FROM forum_users WHERE email='$email'";
	$result_x = mysql_query("$query_x");
	$num_rowsx = mysql_num_rows($result_x);



$email = strtolower("$email");


   if (preg_match("/mytrashmail.com/i", $email)) {
       $addrmail = "true"; }
   else { $addrmail = "false"; }

   if (preg_match("/mymail.ro/i", $email)) {
       $addrmail = "true"; }
   else { $addrmail = "false"; }

   if (preg_match("/gala.net/i", $email)) {
       $addrmail = "true"; }
   else { $addrmail = "false"; }

   if (preg_match("/^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,6}$/i", $email)) {
       $addrmail = "true"; }
   else { $addrmail = "false"; }


	// NO NO NO!! you cant have that name! someone already has it!




	if ($num_rowsu >= 1)
		{


		echo "<p class=\"break\"><big>Error</big></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
		this user already exists.
		</p><hr/><p class=\"break\">$hyl<a href=\"./register.php\">try again</a>$hyl<br/>
		$hyl<a href=\"./index.php\">exit</a>$hyl";

		}


	elseif ($num_rowsx >= 1)
		{


		echo "<p class=\"break\"><big>Error</big></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
		this email address has already been used, or is invalid.
		</p><hr/><p class=\"break\">$hyl<a href=\"./register.php\">try again</a>$hyl<br/>
		$hyl<a href=\"./index.php\">exit</a>$hyl";

		}

	elseif ($addrmail == "false")
		{


		echo "<p class=\"break\"><big>Error</big></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
		this email address is false.
		</p><hr/><p class=\"break\">$hyl<a href=\"./register.php\">try again</a>$hyl<br/>
		$hyl<a href=\"./index.php\">exit</a>$hyl";

		}

		elseif ($num_rowsx == 0 && $num_rowse == 0 && $num_rowsu == 0 && $addrmail =="true")
		{


	$query = "select requser from welcome";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$rowhh = mysql_fetch_array($result);

	$PHNAME = $rowhh["requser"];


	$query_colors = "SELECT * FROM phoenix_themes where id='78'";
	$result_colors = mysql_query("$query_colors");
	$num_rowscolors = mysql_num_rows($result_colors);
	$colours = mysql_fetch_array($result_colors);


$inbg = $colours["bg_col"];
$intext = $colours["text_col"];
$incol = $colours["my_color"];
$intr = $colours["tr_col"];



		if ($signupswitch == "val")
		{



		$valcode = rand("00000","99999");

		$query_insert = " INSERT INTO forum_users ( username, password, place, email, subno, pip, opip, agent, sex, joindate, valid, validby, sig, bg_col, text_col, my_color, tr_col, schnarf_col, uniquid, age, realname, flag ) VALUES ( '$username', '$eggs', '$town', '$email', '$subno', '$pip', '$opip', '$agent', '$sex', now(), 'no', '$valcode', '$sig', '$inbg', '$intext', '$incol', '$intr', '$schnarf', '$uniquid', '$age', '$realname', 'GB' )";
		$result = mysql_query("$query_insert");


		$query_insert = " INSERT INTO friends ( username, friendname, myrequest ) VALUES ( '$username', '$PHNAME', '0' )";
		$result = mysql_query("$query_insert");

		$query_insert = " INSERT INTO friends ( username, friendname, myrequest ) VALUES ( '$PHNAME', '$username', '0' )";
		$result = mysql_query("$query_insert");

		$query = "insert into phoenix_mail ( userto, author, subject, sentdate, message, reply, my_color, stamp ) values ( '$username', '$PHNAME', 'Hey $username', '$msgsandposts', '$welcomemessage', '1', '$color', now() )";
		$result = mysql_query($query);


			/// score - credit

			$query = "update forum_users set posts=posts+40, credits=credits+20 where username='$username'";
			mysql_query($query);

			///


		}

		elseif ($signupswitch == "on")
		{

		$query_insert = " INSERT INTO forum_users ( username, password, place, email, subno, pip, opip, agent, sex, joindate, valid, validby, sig, bg_col, text_col, my_color, tr_col, schnarf_col, uniquid, age, realname, flag ) VALUES ( '$username', '$eggs', '$town', '$email', '$subno', '$pip', '$opip', '$agent', '$sex', now(), 'yes', 'AutoValidatay', '$sig', '$inbg', '$intext', '$incol', '$intr', '$schnarf', '$uniquid', '$age', '$realname', 'GB' )";
		$result = mysql_query("$query_insert");

		$query_insert = " INSERT INTO friends ( username, friendname, myrequest ) VALUES ( '$username', '$PHNAME', '0' )";
		$result = mysql_query("$query_insert");

		$query_insert = " INSERT INTO friends ( username, friendname, myrequest ) VALUES ( '$PHNAME', '$username', '0' )";
		$result = mysql_query("$query_insert");

		$query = "insert into phoenix_mail ( userto, author, subject, sentdate, message, reply, my_color, stamp ) values ( '$username', '$PHNAME', 'Hey $username', '$msgsandposts', '$welcomemessage', '1', '$color', now() )";
		$result = mysql_query($query);



			/// score - credit

			$query = "update forum_users set posts=posts+40, credits=credits+20 where username='$username'";
			mysql_query($query);

			///
		}


		// All went well?, GIVE THEM THE GOOD NEWS!!








		if ($signupswitch == "val")
		{

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






		echo "<p class=\"break\"><big>Registration Complete</big></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
		<b><big>Welcome $username!<br/>Your user account was successfully created!</big></b><br/>
		<b>You will recieve an email containing a confirmation link, this must be clicked in order to activate your account.<br/>
		If you fail to recieve this email please check your spam folder.<br/>
		The email will also contain your account username and password so please archive this for safekeeping.</b></p><hr/><p class=\"break\">
		$hyl<a href=\"./index.php\">exit</a>$hyl";
		}

		elseif ($signupswitch == "on")
		{
		echo "<p class=\"break\"><big>Registration Complete</big></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
		Your user account was successfully created!<br/>";
		echo "your username is: $username<br/>your password is: $eggs<br/>
		you may <a href=\"./logincheck.php?u=$username&amp;p=$eggs\">login now</a> if you wish.<br/><br/>
		bookmark the next page to avoid typing your details every time.</p><hr/><p class=\"break\">
		$hyl<a href=\"./index.php\">exit</a>$hyl";
		}

		else
		{
		echo "<p class=\"break\"><big>Registration Incomplete</big></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
		sorry, registration is offline while we carry out essential maintenance.</p><hr/><p class=\"break\">
		$hyl<a href=\"./index.php\">exit</a>$hyl";
		}

		}
	}

	// Oh, somethings went wrong  before it all even started...

	else
	{
	echo "<p class=\"break\"><big>Error</big></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	Sorry, you need to complete all fields, tap your browser's back button as you might find all the stuff you already typed is still there, nobody likes filling in web forms but it needs to be done, after all, how do you expect to make friends if your giving nothing away?
	</p><hr/><p class=\"break\">$hyl<a href=\"./register.php\">try again</a>$hyl<br/>
	$hyl<a href=\"./index.php\">exit</a>$hyl";
	}

echo "</p></body></html>";

//FINI!


}
}
else
{



	echo "<p class=\"break\"><big>Error</big></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	You did not copy the numbers in the image into the text box.<br/>
	Please do that next time.
	</p><hr/><p class=\"break\">$hyl<a href=\"./register.php\">try again</a>$hyl<br/>
	$hyl<a href=\"./index.php\">exit</a>$hyl";




}

?>
