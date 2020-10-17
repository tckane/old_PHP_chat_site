<?php




include("../scripts/dbcon.php");

header("Last-Modified: " . gmdate("D, dMYH:i:s") . " GMT");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

$getsite = $_GET["getsite"];

$u = mysql_real_escape_string($_GET['u']);
$p = mysql_real_escape_string($_GET['p']);

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


$mg = urlencode("You did not provide a correct username & password. Please try again.");
	$url = "./index.php?getsite=$getsite&mg=$mg";
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;	
	}
	else
	{


	if ($banstatus == 1)
	{


$mg = urlencode("You are banned.");
	$surl = "$lback/index.php?mg=$mg";

	$url = "./index.php?getsite=$getsite";
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
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



$domain = $_SERVER["HTTP_HOST"];


setcookie("sesh", "$ses", time() + 36000, "/", ".$domain");

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




$mg = urlencode("You are now signed in.");
$url = "./index.php?getsite=$getsite&mg=$mg";
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	exit;	
}
}









?>

