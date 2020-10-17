<?php



include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/config.php');
include('../scripts/functions.php');
include('../scripts/main.php');
include('../scripts/cleaner.php');

$chatpass = $_GET["chatpass"];
if ($chatpass == "") $chatpass = $_POST["chatpass"];

$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];

$roomid = $_GET["roomid"];
if ($roomid == "") $ses = $_POST["roomid"];

$query = "SELECT * from chatrooms where id='$roomid'";
$result = mysql_query ("$query");
$rope = mysql_fetch_array($result);
$roomname = $rope["roomname"];
$passwordcompare = $rope["password"];


# Fetching member info from the session.
$login = $row_ses["username"];
$reload = $row_ses["creload"];
$max = $row_ses["cmax"];
$filter = $row_ses["filter"];
$sicn = $row_ses["sicn"];
$pmsetter = $row_ses["chatpms"];





if ($group < 4)
{










if ($passwordcompare != "")
{

if ($chatpass != $passwordcompare) $roomid = "";

}


$query = "SELECT * from chatrooms where id='$roomid'";
$result = mysql_query ("$query");
$roomcount = mysql_num_rows($result);

$query = "UPDATE friends set lastactive=now(), location='chat', room='$roomid' where friendname='$login'";
mysql_query($query);


$act_query = "UPDATE forum_users set lastactive=now(), location='chat', room='$roomid'  where username='$login'";
mysql_query($act_query);


$querychat = "SELECT * from forum_users where lastactive > DATE_ADD(NOW(), INTERVAL -$interval MINUTE) and room='$roomid'";
$resultchat = mysql_query($querychat);
$numchat = mysql_num_rows($resultchat);


if ($numchat > 1) $chatting = "$numchat users chatting";
elseif ($numchat == 1) $chatting = "only you here";
else $chatting = "chat empty";


if ($roomcount > 0)
{

#========================================================================================
#========================================================================================




echo "<p class=\"break\">";
echo "<big>$roomname</big>$inboxes<br/><small>$chatting</small></p>

<p class=\"breakforum\" style=\"text-align: center;\"><b>
<a style=\"text-decoration: none;\" href=\"./add.php?ses=$ses&amp;roomid=$roomid&amp;chatpass=$chatpass\">write</a>|<a style=\"text-decoration: none;\" href=\"./refresh.php?ses=$ses&amp;roomid=$roomid&amp;chatpass=$chatpass\">refresh</a>|<a style=\"text-decoration: none;\" href=\"../extras/sicn.php?ses=$ses&amp;moof=yes&amp;roomid=$roomid&amp;chatpass=$chatpass\">icons</a>|<a style=\"text-decoration: none;\" href=\"../forum/formatting.php?ses=$ses&amp;moof=yes&amp;roomid=$roomid&amp;chatpass=$chatpass\">bb code</a></b></p>";
# Gathering all chat info from the database.




$query = "SELECT * from chatmsgs where roomid='$roomid' ORDER BY timestamp DESC LIMIT $chatlines";
$result = mysql_query ("$query");
$totaltexts = mysql_num_rows($result);
$row = mysql_fetch_array($result);
# Displaying chat messages
while ($row)
      {
       $user = $row["username"];
       $message = $row["msg"];
       $private = $row["private"];
       $userto = $row["userto"];
       $when = chattime($row["timestamp"]);


       $queryg = "SELECT * FROM forum_users WHERE username='$user'";
       $resultg=mysql_query($queryg);
       $rowg = mysql_fetch_array($resultg);
       $group = $rowg["userlevel"];
       $owner = $rowg["owner"];


       # Setting the name prefix for members and admin.

if ($group == 1 && $owner == "yes") $prefix = "&#176;";
elseif ($group == 1 && $owner != "yes") $prefix = "&#170;";
       else $prefix = "";
       #as the function suggests, we are making the message wml compatable.

       $message = funk_it_up($message);
       $message = add_sicn($message);


	if ($user == "System")

	{

	if ($private == "yes")
		{
		if ($userto == "$login" || $user == "$login") 
			{
			echo "<p class=\"breakforum\" style=\"border-width: 1px; border-style: solid; line-height: 90%;\"><small><span style=\"font-weight: normal;\">(private)</span></small><b>$user:</b>&nbsp;<span style=\"font-weight: normal;\">$message</span><br/><small><small>($when)</small></small></p>";
			}
			else
			{ }
		}
		else
		{
		echo "<p class=\"breakforum\" style=\"border-width: 1px; border-style: solid; line-height: 90%;\"><b>$user:</b>&nbsp;<span style=\"font-weight: normal;\">$message</span><br/><small><small>($when)</small></small></p>";
		}

	}

	else
	{
	if ($private == "yes")
		{
		if ($userto == "$login" || $user == "$login") 
			{
			echo "<p class=\"breakforum\" style=\"border-width: 1px; border-style: solid; line-height: 90%;\"><small><span style=\"font-weight: normal;\">(private)</span></small><b><a style=\"text-decoration: none;\" href=\"../profile.php?ses=$ses&amp;user=$user\"><small>$prefix</small>$user:</a></b>&nbsp;<span style=\"font-weight: normal;\">$message</span><br/><small><small>($when)</small></small></p>";
			}
			else
			{ }
		}
		else
		{
		echo "<p class=\"breakforum\" style=\"border-width: 1px; border-style: solid; line-height: 90%;\"><b><a style=\"text-decoration: none;\" href=\"../profile.php?ses=$ses&amp;user=$user\"><small>$prefix</small>$user:</a></b>&nbsp;<span style=\"font-weight: normal;\">$message</span><br/><small><small>($when)</small></small></p>";
		}
	}




	$row = mysql_fetch_array($result);
      }


$limit = "160";

$difference = ($totaltexts - $limit);


if ($totaltexts > $limit) 
{
$queryx = "DELETE from chatmsgs where roomid='$roomid' ORDER BY id ASC LIMIT $difference";
$resultx = mysql_query ("$queryx");
}


echo "<p class=\"breakforum\" style=\"text-align: center;\">

<b><a style=\"text-decoration: none;\" href=\"./add.php?ses=$ses&amp;roomid=$roomid&amp;chatpass=$chatpass\">write</a>|<a style=\"text-decoration: none;\" href=\"./refresh.php?ses=$ses&amp;roomid=$roomid&amp;chatpass=$chatpass\">refresh</a>|<a style=\"text-decoration: none;\" href=\"../extras/sicn.php?ses=$ses&amp;moof=yes&amp;roomid=$roomid&amp;chatpass=$chatpass\">icons</a>|<a style=\"text-decoration: none;\" href=\"../forum/formatting.php?ses=$ses&amp;moof=yes&amp;roomid=$roomid&amp;chatpass=$chatpass\">bb code</a></b></p>";


}
#========================================================================================
else
#========================================================================================
{

echo "<p class=\"break\">Error</p>

<p class=\"breakforum\" style=\"text-align: center;\"><b>
There was a problem, one of the following might have happened:<br/>
You were kicked from the room.<br/>
The Room Password was changed whilst you were in there.<br/>
Or the room you requested was deleted or never existed in the first place.<br/>
In any case, please <a href=\"./index.php?ses=$ses\">go back</a> to the chat menu and try again!</b></p>";
}




echo "<p class=\"break\"><a href=\"./leave.php?ses=$ses&amp;roomid=$roomid&amp;chatmenu=yes&amp;chatpass=$chatpass\">chat menu</a><br/>
<a href=\"./leave.php?ses=$ses&amp;roomid=$roomid&amp;chatpass=$chatpass\">main menu</a></p></body></html>";







}
else
{



	echo "<p class=\"break\"><img src=\"../scripts/phoenix.php?string=account%20restricted!&amp;login=$login\" alt=\"account restricted!\"/></p><hr/>
	<p class=\"breakforum\" style=\"text-align: center;\">";

	echo "Sorry, your account appears to be restricted, this may be due to misconduct on your part or an error on our part.<br/><br/>
	During the period of restriction you will be unable to use chat or some other functions of this site, this is for the protection of other users.<br/><br/>
	If you feel that this is an error and you have done nothing wrong please contact an administrator.";

	echo "</p><hr/><p class=\"break\">$breaker$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>$shortcuts</p></body></html>";
	exit;




}

?>
