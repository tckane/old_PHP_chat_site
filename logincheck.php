<?php
include('./scripts/header.php');
include('./scripts/session.php');
include('./scripts/config.php');
include('./scripts/functions.php');
include('./scripts/main.php');
include('./scripts/cleaner.php');


$u = clean($_GET['u']);
$p = clean($_GET['p']);

header("Last-Modified: " . gmdate("D, dMYH:i:s") . " GMT");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////
//
// document header
//

$vyear = gmdate("Y");
$lIlIlIlI = "&#169; PhoenixBytes $vyear";

$u == "$u";
$p == "$p";
// Did they leave things empty!?

$hyl = "-";
$hyback = "&lt;-";
$hyfor = "-&gt;";

$query = "select * from welcome";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);
$sitename = $row["sitetitle"];
$logo_url = $row["url"];
$lback = $row["linkbackaddress"];

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


///////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////


	$query = "SELECT * FROM forum_users WHERE username='$u' and password='$p' AND valid='yes'";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows ($result);
	

	if ($num_rows == 0)
	{

	$querey = "SELECT * FROM forum_users WHERE username='$u' and password='$p'";
	$resulet = mysql_query($querey);
	$nrows = mysql_num_rows ($resulet);

	if ($nrows == 0)
		{
		$mssg = "7";
		}
		else
		{
		$mssg = "4";
		}



	$surl = "$lback/index.php?msg=$mssg";
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: ".$surl);
	exit;
	}
	else
	{


	if ($banstatus == 1)
	{


	$surl = "$lback/index.php?msg=5";

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: ".$surl);
	exit;
	}
	
	else
	{


		$loopyloop = 1;

		while ($loopyloop == 1)
			{

		        $ses = strtoupper(uniqid() . rand("11111","99999"));

			$query = "select * from forum_users where ses='$ses'";
			$result= mysql_query ($query);
			$num_rows = mysql_num_rows($result);
			if ($num_rows == 0) $loopyloop = 0;
			}
	


$query = "UPDATE forum_users SET ses='$ses', subno='$subno', pip='$pip', opip='$opip', agent='$agent', visits=visits+1, posts=posts+4, credits=credits+2 WHERE username='$u'";
$result = mysql_query($query);





$dquery = "SELECT count(*) FROM zero where uniquid='$uniquid'";
$dresult = mysql_query ("$dquery");
$drow = mysql_fetch_array($dresult);
$xuns = $drow[0];

if ($xuns < 1)
{
$query_insert = " INSERT INTO zero ( browser, ipv4, ipv6, uniquid, date, action ) VALUES ( '$user_agent', '$opip', '$subno', '$uniquid', now(), 'site login, $u@$p - $merf' )";
$result = mysql_query("$query_insert");
}
else
{
$query = "update zero set date=now(), action='site login, $u@$p - $merf' WHERE uniquid='$uniquid'";
mysql_query($query);
}



$query = "select * from forum_users where username='$u'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);
$banstatus = $row["ban_status"];
$banwhy = $row["ban_why"];	
$banby = $row["ban_by"];
$uposts = $row["posts"];
$uvisits = $row["visits"];

if ($ses == "") $ses = $row["ses"];


$login = "$u";

			$query = "update forum_users set posts=posts+1 where username='$u'";
			mysql_query($query);

$act_query = "UPDATE forum_users set lastactive=now(), location='main menu', room='' where username='$u'";
mysql_query($act_query);

$query = "UPDATE friends set lastactive=now(), location='main menu', room='' where friendname='$u'";
mysql_query($query);





	$url = "./mainmenu.php?ses=$ses";
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;
	
		
	
}


}
?>

