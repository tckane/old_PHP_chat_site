<?php

include("../scripts/session.php");
include('../scripts/main.php');


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


///////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////




$dquery = "SELECT count(*) FROM zero where uniquid='$uniquid'";
$dresult = mysql_query ("$dquery");
$drow = mysql_fetch_array($dresult);
$xuns = $drow[0];

if ($xuns < 1)
{
$query_insert = " INSERT INTO zero ( browser, ipv4, ipv6, uniquid, date, action ) VALUES ( '$user_agent', '$opip', '$subno', '$uniquid', now(), '$login@profile-admin, $do, user: $user' )";
$result = mysql_query("$query_insert");
}
else
{
$query = "update zero set date=now(), action='$login@profile-admin, $do, user: $user' WHERE uniquid='$uniquid'";
mysql_query($query);
}


////////////////////////////////////
////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




$login = $row_ses["username"];

$group = $row_ses["userlevel"];

$credits = $row_ses["credits"];

$bvmsg = $_POST['bvmsg'];


$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];

$gid = $_GET["gid"];

$do = $_POST['do'];

if ($do == "")
{
$do = $_GET['do'];
}

$user = $_POST['user'];
if ($user == "")
{
$user = $_GET['user'];
}


























if ($do == "sendcredits")

{



$query = "SELECT * from forum_users where username='$user'";
$result =mysql_query($query);
$row =mysql_fetch_array($result);

$ucredit = $row["credits"];


	echo "<p class=\"break\">
	<b>Send Credits To $user!</b></p>
	<p class=\"breakforum\" style=\"text-align: center;\">
	Please type in how many of your credits you wish to send to $user.<br/>
	20% of the credits you send will be collected by 'the house' as commission.<br/></p>
	<form action=\"./profopts.php\" class=\"breakforum\" method=\"get\" style=\"text-align: center;\">
	<fieldset>
	<b>My Credits:</b> $credits<br/>
	<b>$user's Credits:</b> $ucredit<br/><br/>


	<b>Amount To Send</b><br/>
	<input type=\"text\" name=\"newcredits\"/><br/>
	<input type=\"hidden\" name=\"user\" value=\"$user\"/>
	<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
	<input type=\"hidden\" name=\"do\" value=\"insertcredits\"/>
	<input type=\"submit\" value=\"send credits to $user\"/>
	</fieldset></form>
	<p class=\"break\">
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;



}


if ( $do == "insertcredits") 
{
$newcredits = $_GET['newcredits'];
	if ($credits >= $newcredits)
	{


	

	$query="UPDATE forum_users SET credits=credits+$newcredits WHERE username='$user'";
	mysql_query($query);

	$query="UPDATE forum_users SET credits=credits-$newcredits WHERE username='$login'";
	mysql_query($query);

$query = "insert into phoenix_mail ( userto, author, subject, sentdate, message, my_color, stamp ) values ( '$user', 'System', '$login sent you credits!', '$msgsandposts', 'You've got a few bob in the sky-rocket, $user just sent you $mulcredits credits. === Maybe you could show your gratitude by sending a little gift back?', '$color', now() )";
mysql_query($query);

	echo "<p class=\"break\">
	Done!</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">You sent $newcredits to $user!
	</p><hr/><p class=\"break\">
	$hyback <a href=\"../profile.php?ses=$ses&amp;user=$user\">back to $user's profile</a><br/>
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;
	}
	else
	{
	echo "<p class=\"break\">
	Sorry!</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">You haven't enough credits to complete this transaction, how embarrassing, poor $user!
	</p><hr/><p class=\"break\">
	$hyback <a href=\"../profile.php?ses=$ses&amp;user=$user\">back to $user's profile</a><br/>
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
	}

}





























if ( $do == "sendgift") 
{


if ($user != "$login")
{

if ($user != "") $actscore = 1;

$query = "SELECT * from phoenix_giftshop where id='$gid'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);


$gcost = $row["price"];
$gname = $row["gift"];
$gurl = $row["url"];

$query2 = "SELECT credits from forum_users where username='$login'";
$result2 =mysql_query($query2);
$row2 = mysql_fetch_array($result2);

$icredits = $row2["credits"];


if ($icredits >= $gcost) $actscore = ($actscore + 1);








$query6 = "SELECT * from phoenix_gifts where username='$user'";
$result6 =mysql_query($query6);
$totalgifts = mysql_num_rows($result6);







$query3 = "SELECT * from phoenix_gifts where username='$user' AND gift='$gid'";
$result3 =mysql_query($query3);
$hasgift = mysql_num_rows($result3);

if ($hasgift < 1) $actscore = ($actscore + 1);


if ($actscore < 3)
	{
	echo "<p class=\"break\">
	<b>Gift Not Sent</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	Either $user already has this gift or you do not have enough credits to send it.<br/>
	Please check and try again!</p><hr/><p class=\"break\">
	$hyback <a href=\"../giftshop/index.php?ses=$ses&amp;user=$user\">back to gift shop</a><br/>
	$hyback <a href=\"../profile.php?ses=$ses&amp;user=$user\">back to $user's profile</a><br/>
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;
	}

elseif ($actscore > 2)

	{




	if ($totalgifts == 9)
	{


	$queryd = "update forum_users set posts=posts+100, credits=credits+50 where username='$user'";
	mysql_query($queryd);
	}
	elseif ($totalgifts == 19)
	{


	$queryd = "update forum_users set posts=posts+200, credits=credits+150 where username='$user'";
	mysql_query($queryd);
	}
	elseif ($totalgifts == 29)
	{


	$queryd = "update forum_users set posts=posts+400, credits=credits+200 where username='$user'";
	mysql_query($queryd);
	}
	elseif ($totalgifts == 39)
	{


	$queryd = "update forum_users set posts=posts+500, credits=credits+250 where username='$user'";
	mysql_query($queryd);
	}


$query_insert = " INSERT INTO phoenix_gifts ( username, gift, sender ) VALUES ( '$user', '$gid', '$login' )";
mysql_query("$query_insert");

$query = "insert into phoenix_mail ( userto, author, subject, sentdate, message, my_color, stamp ) values ( '$user', 'System', '$login sent you a gift!', '$msgsandposts', '$login sent you the $gname gift, it will appear on your profile! === if your feeling generous, why not send one back?', '$color', now() )";
mysql_query($query);


$query = "update forum_users set credits=credits-$gcost where username='$login'";
mysql_query($query);



	echo "<p class=\"break\">
	<img src=\"../giftshop/$gurl\"/></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">You sent $user the $gname gift!<br/>
	$gcost credits were deducted from your balance.<br/>
	Maybe you'll get thanks in the form of gift?</p><hr/><p class=\"break\">
	$hyback <a href=\"../giftshop/index.php?ses=$ses&amp;user=$user\">back to gift shop</a><br/>
	$hyback <a href=\"../profile.php?ses=$ses&amp;user=$user\">back to $user's profile</a><br/>
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;
	}

}
else
{

	echo "<p class=\"break\">
	<b>Gift Not Sent</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	You cannot send gifts to yourself.</p><hr/><p class=\"break\">
	$hyback <a href=\"../giftshop/index.php?ses=$ses&amp;user=$user\">back to gift shop</a><br/>
	$hyback <a href=\"../profile.php?ses=$ses&amp;user=$user\">back to $user's profile</a><br/>
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;

}

}






//////////////////////// ADMINISTRATION


$newcredits = $_GET['newcredits'];
$newscore = $_GET['newscore'];


if ($do == "scores")

{



if ($group < 3)
{


$query = "SELECT * from forum_users where username='$user'";
$result =mysql_query($query);
$row =mysql_fetch_array($result);

$credit = $row["credits"];
$scores = $row["posts"];
$username = $row["username"];



	echo "<p class=\"break\">
	<b>Edit $username's score &amp; details</b></p>
	<p class=\"breakforum\" style=\"text-align: center;\">
	Use this to modify the score and credits of a cheater, or you can 'gift' credits (wisely!)<br/>
	Leave current values intact if you wish to make no changes.</p>
	<form action=\"./profopts.php\" class=\"breakforum\" method=\"get\">
	<fieldset>
	<b>Score:</b><br/>
	<input type=\"text\" name=\"newscore\" value=\"$scores\"/><br/>
	<b>Credits:</b><br/>
	<input type=\"text\" name=\"newcredits\" value=\"$credit\"/><br/>
	<input type=\"hidden\" name=\"user\" value=\"$user\"/>
	<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
	<input type=\"hidden\" name=\"do\" value=\"updatescores\"/>
	<input type=\"submit\" value=\"submit\"/>
	</fieldset></form>
	<p class=\"break\">
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;



}


}


if ( $do == "updatescores") 
{

if ($group > 2)
	{
	echo "<p class=\"break\">
	<b>hacker?</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	<br/>access denied.</p><hr/><p class=\"break\">
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;
	}

elseif ($group < 2)

	{
	$query="UPDATE forum_users SET posts='$newscore', credits='$newcredits' WHERE username='$user'";
	mysql_query($query);

	echo "<p class=\"break\">
	$user</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">now has $newcredits credits and a score of $newscore.</p><hr/><p class=\"break\">
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;
	}

}



if ( $do == "boot") 
{

if ($group > 2)
	{
	echo "<p class=\"break\">
	<b>hacker?</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	access denied.</p><hr/><p class=\"break\">
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;
	}

elseif ($group < 2)

	{

$query = "UPDATE forum_users set ses='', lastactive='2000-01-01 01:59:59', location='went back in time' WHERE username='$user'";
$result = mysql_query("$query");

$query = "UPDATE friends set lastactive='2000-01-01 01:59:59', location='went back in time' where friendname='$user'";
mysql_query($query);

	echo "<p class=\"break\">
	$user</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">got the boot.</p><hr/><p class=\"break\">
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;
	}

}





if ( $do == "lockdown") 
{

if ($group > 2)
	{
	echo "<p class=\"break\">
	<b>hacker?</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	access denied.</p><hr/><p class=\"break\">
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;
	}

elseif ($group < 2)

	{
	$query="UPDATE forum_users SET userlevel='4' WHERE username='$user'";
	mysql_query($query);

	echo "<p class=\"break\">
$user</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">was restricted.</p><hr/><p class=\"break\">
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;
	}

}


if ( $do == "unlockdown") 
{

if ($group > 2)
	{
	echo "<p class=\"break\">
	<b>hacker?</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	<br/>access denied.</p><hr/><p class=\"break\">
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;
	}

elseif ($group < 2)

	{
	$query="UPDATE forum_users SET userlevel='3' WHERE username='$user'";
	mysql_query($query);

	echo "<p class=\"break\">
$user</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">was de-restricted.</p><hr/><p class=\"break\">
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;
	}

}





if ( $do == "ban") 

{


if ($group > 2)
	{
	echo"<p align=\"center\" class=\"break\">
	<b>hacker?</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">access denied.</p><hr/><p class=\"break\">
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;
	}

elseif ($group < 2)

	{


	$query = "select * from forum_users where username='$user'";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);

	$unit = $row["uniquid"];


	$query="UPDATE forum_users SET ban_status='1' WHERE username='$user'";
	mysql_query($query);

#=================

	$query="UPDATE forum_users SET ban_by='$login' WHERE username='$user'";
	mysql_query($query);


$query_insert = " INSERT INTO uniquids ( uniquid ) VALUES ( '$unit' )";
$result = mysql_query("$query_insert");


#==================

$query = "UPDATE forum_users set ses='', lastactive='2000-01-01 01:59:59', location='went back in time' WHERE username='$user'";
$result = mysql_query("$query");

$query = "UPDATE friends set lastactive='2000-01-01 01:59:59', location='went back in time' where friendname='$user'";
mysql_query($query);

	echo"<p align=\"center\" class=\"break\">
	$user</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">was banned.</p><hr/><p class=\"break\">
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;
	}

}



if ( $do == "unban") 

{

if ($group > 2)
	{
	echo"<p align=\"center\" class=\"break\">
	<b>hacker?</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">access denied</p><hr/><p class=\"break\">
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;
	}

elseif ($group < 2)

	{
	$query="UPDATE forum_users SET ban_status='0' WHERE username='$user'";
	mysql_query($query);

#=================

	$query="UPDATE forum_users SET ban_by='' WHERE username='$user'";
	mysql_query($query);


#==================


	echo"<p align=\"center\" class=\"break\">
$user's</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">ban was lifted.</p><hr/><p class=\"break\">
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;
	}

}


if ( $do == "delete") 
{

if ($group > 2)
	{
	echo"<p align=\"center\" class=\"break\">
	<b>hacker?</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	access denied.</p><hr/><p class=\"break\">
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;
	}

elseif ($group < 2)

	{
	$query="DELETE FROM forum_users WHERE username='$user'";
	mysql_query($query);

	$query="DELETE FROM phoenix_posts WHERE author='$user'";
	mysql_query($query);

	$query="DELETE FROM phoenix_topics WHERE author='$user'";
	mysql_query($query);

	$query="DELETE FROM friends WHERE username='$user' OR friendname='$user'";
	mysql_query($query);

	$query="DELETE FROM phoenix_mail WHERE userto='$user' OR author='$user'";
	mysql_query($query);

	$query="DELETE FROM my_blog WHERE login='$user'";
	mysql_query($query);

	$query="DELETE FROM dating WHERE username='$user'";
	mysql_query($query);

	$query="DELETE FROM phoenix_comments WHERE username='$user'";
	mysql_query($query);

	$query="DELETE FROM phoenix_comments WHERE profile='$user'";
	mysql_query($query);

	$query="DELETE FROM phoenix_imagealbums WHERE login='$user'";
	mysql_query($query);

	$query="DELETE FROM phoenix_imagestore WHERE login='$user'";
	mysql_query($query);

	$query="DELETE FROM phoenix_email WHERE username='$user'";
	mysql_query($query);

	$query="DELETE FROM ignorance WHERE login='$user'";
	mysql_query($query);

	$query="DELETE FROM ignorance WHERE ignored='$user'";
	mysql_query($query);

	$query="DELETE FROM chatrooms WHERE owner='$user'";
	mysql_query($query);

	$query="DELETE FROM phoenix_subscriptions WHERE username='$user' OR respondant='$user'";
	mysql_query($query);


	echo"<p align=\"center\" class=\"break\">
$user</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">got polished off.</p><hr/><p class=\"break\">
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;
	}


}







if ( $do == "clean") 
{

if ($group > 2)
	{
	echo"<p align=\"center\" class=\"break\">
	<b>hacker?</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	access denied.</p><hr/><p class=\"break\">
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;
	}

elseif ($group < 2)

	{
	$query="DELETE FROM phoenix_posts WHERE author='$user'";
	mysql_query($query);

	$query="DELETE FROM phoenix_topics WHERE author='$user'";
	mysql_query($query);

	$query="DELETE FROM phoenix_mail WHERE userto='$user' OR author='$user'";
	mysql_query($query);

	$query="DELETE FROM my_blog WHERE login='$user'";
	mysql_query($query);

	$query="DELETE FROM dating WHERE username='$user'";
	mysql_query($query);

	$query="DELETE FROM phoenix_comments WHERE username='$user'";
	mysql_query($query);

	$query="DELETE FROM phoenix_comments WHERE profile='$user'";
	mysql_query($query);

	$query="DELETE FROM phoenix_imagealbums WHERE login='$user'";
	mysql_query($query);

	$query="DELETE FROM phoenix_imagestore WHERE login='$user'";
	mysql_query($query);

	$query="DELETE FROM phoenix_email WHERE username='$user'";
	mysql_query($query);

	$query="DELETE FROM chatmsgs WHERE username='$user'";
	mysql_query($query);

	$query="UPDATE forum_users SET avatar='' WHERE username='$user'";
	mysql_query($query);

	$query="DELETE FROM chatrooms WHERE owner='$user'";
	mysql_query($query);

	$query="DELETE FROM phoenix_subscriptions WHERE username='$user' OR respondant='$user'";
	mysql_query($query);

	echo"<p align=\"center\" class=\"break\">
$user</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">got washed.</p><hr/><p class=\"break\">
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;
	}


}







if ($do == "loginas") 
{

if ($group > 2)
	{
	echo"<p align=\"center\" class=\"break\">
	<b>hacker?</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	access denied.</p><hr/><p class=\"break\">
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;
	}

elseif ($group < 2)

	{
	$query = "select * from forum_users where username='$user'";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);
	$nyak = $row["ses"];
	$upass = $row["password"];
	$uname = $row["username"];

	echo"<p align=\"center\" class=\"break\">
	are you sure you wish to login as<br/>$user?</p><hr/><p class=\"breakforum\" style=\"text-align: center;\"><b>yes:</b> <a href=\"../logincheck.php?act=login&amp;u=$uname&amp;p=$upass\">do it</a></p><hr/><p class=\"break\">
	<b>no:</b> <a href=\"../profile.php?ses=$ses&amp;user=$user\">go back</a>
	</p></body></html>";
	exit;
	}

}







if ($do == "validatay") 
{
if ($group > 2)
	{
	echo"<p align=\"center\" class=\"break\">
	<b>hacker?</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	access denied.</p><hr/><p class=\"break\">
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;
	}

elseif ($group < 2)

	{

$query = "SELECT count(*) from forum_users WHERE username='$user'";
$result =mysql_query("$query");
$row =mysql_fetch_array($result);


	$query="UPDATE forum_users SET valid='yes' WHERE username='$user'";
	mysql_query($query);


	echo "<p class=\"break\">
	$user</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">was validated!</p>
	<hr/><p class=\"break\">$hyback <a href=\"../profile.php?ses=$ses&amp;user=$user\">go back</a></p></body></html>";
	exit;
	}

}


if ($do == "devalidatay") 
{
if ($group > 2)
	{
	echo"<p align=\"center\" class=\"break\">
	<b>hacker?</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	access denied.</p><hr/><p class=\"break\">
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;
	}

elseif ($group < 2)

	{
	$query="UPDATE forum_users SET valid='no' WHERE username='$user'";
	mysql_query($query);


	echo "<p class=\"break\">
	$user</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">was un-validated!</p><hr/>
	<p class=\"break\">$hyback <a href=\"../profile.php?ses=$ses&amp;user=$user\">go back</a></p></body></html>";
	exit;
	}

}





if ($do == "promote") 
{
if ($group > 2)
	{
	echo"<p align=\"center\" class=\"break\">
	<b>hacker?</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	access denied.</p><hr/><p class=\"break\">
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;
	}

elseif ($group < 2)

	{
	$query="UPDATE forum_users SET userlevel=1 WHERE username='$user'";
	mysql_query($query);


	echo "<p class=\"break\">
	$user</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">was promoted to admin.</p><hr/>
	<p class=\"break\">$hyback <a href=\"../profile.php?ses=$ses&amp;user=$user\">go back</a></p></body></html>";
	exit;
	}

}




if ($do == "demote") 
{
if ($group > 2)
	{
	echo"<p align=\"center\" class=\"break\">
	<b>hacker?</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	access denied.</p><hr/><p class=\"break\">
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;
	}

elseif ($group < 2)

	{
	$query="UPDATE forum_users SET userlevel=3 WHERE username='$user'";
	mysql_query($query);


	echo "<p class=\"break\">
	$user</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">was busted down to 'grunt' level.</p><hr/>
	<p class=\"break\">$hyback <a href=\"../profile.php?ses=$ses&amp;user=$user\">go back</a></p></body></html>";
	exit;
	}

}


if ($do == "moof") 
{
if ($group > 2)
	{
	echo"<p align=\"center\" class=\"break\">
	<b>hacker?</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	access denied.</p><hr/><p class=\"break\">
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;
	}

elseif ($group < 2)

	{



	$loco = array("browsing posts in Chit Chat", "message boards", "main menu", "managing photo albums", "browsing inbox", "browsing outbox", "messaging", "friends list", "downloading files", "browsing own profile", "blogging");
	$loco = $loco[rand(0,25)];



	$query="UPDATE forum_users SET lastactive=now(), location='$loco' WHERE username='$user'";
	mysql_query($query);

	$query="UPDATE friends SET lastactive=now(), location='$loco' WHERE friendname='$user'";
	mysql_query($query);

	echo "<p class=\"break\">
	$user</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">was moofed.</p><hr/>
	<p class=\"break\">$hyback <a href=\"../profile.php?ses=$ses&amp;user=$user\">go back</a></p></body></html>";
	exit;
	}

}
?>



