<?php


include('./scripts/header.php');
include('./scripts/session.php');
include('./scripts/config.php');
include('./scripts/functions.php');
include('./scripts/main.php');

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

$merf = $_SERVER["HTTP_REFERER"];

$uniquid = md5("$user_agent$pip$subno");


$uniquid = str_replace("a","z","$uniquid");
$uniquid = str_replace("b","y","$uniquid");

$uniquid = str_replace("c","x","$uniquid");
$uniquid = str_replace("d","w","$uniquid");

$uniquid = str_replace("e","v","$uniquid");
$uniquid = str_replace("f","u","$uniquid");

$uniquid = substr("$uniquid", 0, 32);
//////////////////////////////////////////////////////////////////////////


$msg = $_GET['msg'];



$ermsg = $_GET['ermsg'];


if ($msg == 1)
{

$ermsg = "sorry - you must be logged in to use this feature";

}
elseif ($msg == 2)
{

$ermsg = "sorry - account disabled";

}
elseif ($msg == 3)
{

$ermsg = "sorry - account disabled";

}
elseif ($msg == 4)
{

$ermsg = "Sorry, you haven't yet clicked the activation link in the email we sent you.<br/>Didn't get it? - <a href=\"./resend-conf.php\">Get A New Code</a>";

}
elseif ($msg == 5)
{

$ermsg = "sorry - account disabled";

}
elseif ($msg == 6)
{

$ermsg = "You logged out, thanks for visiting - Come Back Soon!";

}
elseif ($msg == 7)
{

$ermsg = "You've entered incorrect login details, please try again or get a <a href=\"./resend-password.php\">Password Reminder</a>!";

}
elseif ($msg == 404)
{

$ermsg = "The requested item could not be found!";

}
else
{
   $str = 0;

   if ($str == 1)
   {
   $ermsg = "sorry - this site is closed for a refit, you are encouraged not to use it for a bit";
   }



}

$theerror = "$ermsg";

if ($ermsg != "" || $msg != "")
{
$ermsg = "<hr/><table width=\"100%\" class=\"breakforum\"><tr><td align=\"center\">
<big><b>$theerror</b></big></td></tr></table>"; 
}





$site = $_GET['site'];
if ($site == "")
{
$site = $_POST['site'];
}

if ($site != "")
{
$query = "update my_links set linkback=linkback+1 where id='$site'";
mysql_query($query);
}




$dquery = "SELECT * FROM zero where uniquid='$uniquid'";
$dresult = mysql_query ($dquery);
$xuns = mysql_num_rows($dresult);

if ($xuns < 1)
{



$query_insert = " INSERT INTO zero ( browser, ipv4, ipv6, uniquid, date, action ) VALUES ( '$user_agent', '$opip', '$subno', '$uniquid', now(), 'index - $merf' )";
$result = mysql_query("$query_insert");


}
else
{

$query = "update zero set date=now(), action='index - $merf', hits=hits+1 WHERE uniquid='$uniquid'";
mysql_query($query); 

}



$query = "update hit_counter set uniquid='$uniquid', hits=hits+1 where username='$sitename' AND wapsiteid='$wapsiteid'";
mysql_query($query);



echo "<p class=\"break\">$logo<br/>
<img src=\"./scripts/phoenix.php?string=Your%20Mobile%20Community\" alt=\"Your Mobile Community\"/></p>$ermsg";


echo "<p class=\"breakforum\" style=\"text-align: center;\"><big>Get Signed In!</big></p>";



echo "<form class=\"breakforum\" style=\"text-align: center;\" action=\"./logincheck.php\" method=\"get\">
<fieldset><b><big>Username</big></b><br/>
<input type=\"text\" name=\"u\" class=\"textbox\" maxlength=\"24\"/>
<br/><b><big>Password</big></b><br/>
<input type=\"text\" name=\"p\" class=\"textbox\" maxlength=\"24\"/>
<br/><input type=\"submit\" class=\"buttstyle\" style=\"font-size: medium; font-weight: bold;\" value=\"Sign In\"/><br/>
</fieldset></form>";






echo "<p class=\"breakforum\" style=\"text-align: center; text-decoration: none;\">
<b><big>$hyl<a href=\"./register.php\">Join Our Community</a>$hyl<br/>
$hyl<a href=\"./about.php?act=features\">About Us</a>$hyl<br/>
$hyl<a href=\"./resend-conf.php\">Activate My Account</a>$hyl<br/>
$hyl<a href=\"./resend-password.php\">Recover My Password</a>$hyl<br/>
$hyl<a href=\"./forum/forums.php\">Message Boards</a>$hyl<br/>
$hyl<a href=\"./uploader/index.php\">File Exchanger</a>$hyl<br/>
$hyl<a href=\"./ads.php\">Wapmaster Tools</a>$hyl</big></b></p><hr/>



<p class=\"break\">
<img src=\"./scripts/phoenix.php?string=%20$hits%20&amp;login=SYSTEM\" alt=\"$hits\"/><br/>
$lIlIlIlI<br/>
<b><a href=\"./about.php?act=changelog\"/>changelog</a> - <a href=\"./about.php?act=credits\"/>thanks</a> - <a href=\"./sendmail.php\"/>contact us</a></b></p>";


include("./upsell/tsohost.co.uk/advert.php");

echo "</body></html>";


?>