<?php

$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];

if ($ses != "")
{
include('../scripts/ses.php');
}


include('../scripts/main.php');




$login = $row_ses["username"];
$group = $row_ses["userlevel"];


$ucol = $row_ses["my_color"];
$tablecol = $row_ses["tr_col"];
$txt = $row_ses["text_col"];
$bgc = $row_ses["bg_col"];
$simages = $row_ses["simages"];



if ($act == "")
{


if ($group < 4)
{





if ($ses != "")
{

$act_query = "UPDATE forum_users set lastactive=now(), location='message board', room='' where username='$login'";
mysql_query($act_query);

$act_query = "UPDATE friends set lastactive=now(), location='message board', room='' where friendname='$login'";
mysql_query($act_query);
}


if ($bwmode == "off") $subtite = "<img align=\"middle\" src=\"../scripts/phoenix.php?string=Message%20Boards&login=$login\" alt=\"Message Boards\" />";
else $subtite = "<b><big>Message Boards</big></b>";


if ($ses != "")
{
$helplink = "<br/><small><a href=\"./forums.php?ses=$ses&amp;act=about\">message board help</a></small>";
}


echo "<p class=\"break\">";
echo "$subtite$inboxes$helplink</p>




<hr/>";

if ($ses != "")
{
///////////////////////////////////////////////////////////////
////////// shortcut block /////////////////////////////////////////
///////////////////////////////////////////////////////////////
$query = "SELECT * FROM shortcuts";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

echo "<form class=\"breakforum\" style=\"text-align: center;\" action=\"$lback/shortcuts.php?ses=$ses\" method=\"get\">
<fieldset>
<select name=\"shortcut\">";

while ($row)
{

$sid = $row["id"];
$sname = $row["name"];

echo "<option value=\"$sid\">$sname</option>";

$row = mysql_fetch_array($result);
}

echo "</select>
<input type=\"submit\" value=\"go there\"/>
<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
</fieldset></form>";
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
}











$querycat = "select * from phoenix_forums WHERE type='category' ORDER BY id ASC";
$resultcat = mysql_query($querycat);
$num_rowscat = mysql_num_rows($resultcat);
$rowcat = mysql_fetch_array($resultcat);


while ($rowcat)
{

$catego = $rowcat["category"];
$categfriendly = $rowcat["catfriendly"];
$lastpostid = $rowcat["lastpostid"];


	$xxxxx = "select forum from phoenix_forums WHERE category='$catego' AND forum!='adminx1' ORDER BY lastpost DESC limit 1";
	$xxxxx = mysql_query($xxxxx);
	$xxxxx = mysql_fetch_array($xxxxx);
		$realast = $xxxxx["forum"];



			$querybb = "SELECT * from phoenix_topics where forum='$realast' ORDER BY lastreply DESC limit 1";
			$resultcuntbb = mysql_query("$querybb");
			$amountbb = mysql_num_rows ($resultcuntbb);
			$rowforumbb = mysql_fetch_array($resultcuntbb);

   			$lastpost = stripslashes($rowforumbb["subject"]);
   			$lastpostids = $rowforumbb["id"];
   			$lastpostby = $rowforumbb["lastreplyby"];
			if ($lastpostby == "") $lastpostby = $rowforumbb["author"];
   			$lastpostfor = $rowforumbb["forum"];

				$sq = "SELECT * from phoenix_forums WHERE forum='$lastpostfor'";
     				$re =mysql_query($sq);
     				$ro = mysql_fetch_array($re);

				$lastforumfriendly = $ro['name'];

			$lastitem = "</tr><tr><td style=\"text-align: left;\"><small>Last Post: <a href=\"./threads.php?ses=$ses&amp;cat=$catego&amp;forum=$lastpostfor&amp;tid=$lastpostids\">$lastpost</a> by <a href=\"../profile.php?user=$lastpostby&amp;ses=$ses\">$lastpostby</a> in <a href=\"./topics.php?cat=$catego&amp;forum=$lastpostfor&amp;ses=$ses\">$lastforumfriendly</a></small></td>";



echo "<table width=\"100%\" class=\"break\"><tr><td class=\"breakforum\" style=\"text-align: left;\"><big><b><u>$categfriendly</u></b></big></td>$lastitem</tr></table>";




if ($ses != "")
{

	if ($group > 1)
	{
	$queryforum = "select * from phoenix_forums WHERE forum!='adult' AND category='$catego' AND type='forum' AND forum!='adminx1' ORDER BY id ASC";
	$resultforum = mysql_query($queryforum);
	$num_rowsforum = mysql_num_rows($resultforum);
	$rowforum = mysql_fetch_array($resultforum);
	}
	else
	{
	$queryforum = "select * from phoenix_forums WHERE forum!='adult' AND category='$catego' AND type='forum' ORDER BY id ASC";
	$resultforum = mysql_query($queryforum);
	$num_rowsforum = mysql_num_rows($resultforum);
	$rowforum = mysql_fetch_array($resultforum);
	}
}
else
{
	$queryforum = "select * from phoenix_forums WHERE forum!='adult' AND category='$catego' AND type='forum' AND forum!='adminx1' ORDER BY id ASC";
	$resultforum = mysql_query($queryforum);
	$num_rowsforum = mysql_num_rows($resultforum);
	$rowforum = mysql_fetch_array($resultforum);
}







	while ($rowforum)
		{
   		$name = $rowforum["name"];
   		$forum = $rowforum["forum"];



		$query = "SELECT * from phoenix_topics where forum='$forum'";
		$resultcunt = mysql_query("$query");
		$amount = mysql_num_rows ($resultcunt);
		$rowtopics = mysql_fetch_array($resultcunt);
			


$queryp="select count(*) from phoenix_posts where forum='$forum'";
$resultp = mysql_query($queryp);
$forumposts = number_format(mysql_result($resultp,0,"count(*)"));



		if ($amount > 0) $tops = "[ $amount ]";
		else $tops = "";









if ($ses != "")
{

echo "<form class=\"breakforum\" style=\"text-align: left; padding: 0px; border-width: 0px; background: none;\" action=\"./topics.php?ses=$ses&amp;forum=$forum\" method=\"get\">
<fieldset style=\"padding: 0px; border-width: 0px; background: none;\">
<input type=\"submit\" style=\"width: 100%; padding: 1px; text-align: left; font-weight: bold; border-width: 1px; \" value=\"$name $tops\"/>
<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
<input type=\"hidden\" name=\"forum\" value=\"$forum\"/>
</fieldset></form>$lastposted";

}
else
{

echo "<form class=\"breakforum\" style=\"text-align: left; padding: 0px; border-width: 0px; background: none;\" action=\"$lback/category/$forum\" method=\"get\">
<fieldset style=\"padding: 0px; border-width: 0px; background: none;\">
<input type=\"submit\" style=\"width: 100%; padding: 1px; text-align: left; font-weight: bold; border-width: 1px; \" value=\"$name $tops\"/>
<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
<input type=\"hidden\" name=\"forum\" value=\"$forum\"/>
</fieldset></form>$lastposted";

}





           		$rowforum = mysql_fetch_array($resultforum);
           		}







$rowcat = mysql_fetch_array($resultcat);
}
















////////////////////////////////

$query = "SELECT * from phoenix_topics WHERE forum!='adult' AND forum!='adminx1' AND forum!=''";
$resultcunt = mysql_query("$query");
$num_rowscunt = mysql_num_rows ($resultcunt);
$amount = mysql_num_rows ($resultcunt);

echo "<form class=\"breakforum\" style=\"text-align: center; padding: 0px; border-width: 0px; background: none;\" action=\"./search.php?ses=$ses\" method=\"get\">
<fieldset>
<input type=\"submit\" style=\"width: 100%; padding: 1px; text-align: left; font-weight: bold;\" value=\"$hyfor Search [ $amount ]\"/>
<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
</fieldset></form>";




if ($ses != "") $mainmenu = "$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";
else  $mainmenu = "$hyback <a href=\"../index.php\">main menu</a>";







echo "<hr/><p class=\"break\">$mainmenu


</p></body></html>";

}
else
{

echo "<p class=\"break\"><img src=\"../scripts/phoenix.php?string=account%20restricted!&amp;login=$login\" alt=\"account%20restricted!\"/></p><hr/>
<p class=\"breakforum\" style=\"text-align: center;\">";

echo "Sorry, your account appears to be restricted, this may be due to misconduct on your part or an error on our part.<br/><br/>
During the period of restriction you will be unable to use the Message Boards and some other functions of this site, this is for the protection of other users.<br/><br/>
If you feel that this is an error and you have done nothing wrong please contact an administrator.";


echo "</p><hr/><p class=\"break\">$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
exit;

}
}



if ($act == "about")
{

echo "<p class=\"break\"><b><big>About Message Boards</big></b><br/><small><a href=\"../about.php?ses=$ses&amp;act=about\">help menu</a></small></p><hr/>
<p class=\"breakforum\" style=\"text-align: center;\"><b><big>Everything you need to know about message boards.</big></b></p>
<p class=\"breakforum\">
<b>What is it?</b> - <i>it's a threaded discussion board, a member posts a topic and users reply to it. pretty simple really.</i><br/><br/>
<b>Where is it?</b> - <i>you can access it from the main menu, it's easy enough to find.</i><br/><br/>
<b>Who can see it?</b> - <i>all users have access to the message board unless they have been placed on restriction for bad behaviour.</i><br/><br/>
<b>My Topics &amp; Replies</b> - <i>your topics and replies are stored in a mySQL database on our server, this is backed up once a month. 
you are unable to delete your messages, however, if you have embarrassed yourself or inadvertentlyn posted sensitive information you can request the message be deleted by an administrator.</i><br/><br/>
<b>Extra Help</b> - <i>if you have questions or need help with the message boards, or to request a deletion, feel free to send a message to <a href=\"../mail/index.php?ses=$ses&amp;senduser=$PHNAME&amp;act=presetuser\">$PHNAME</a>.</i>
</p><hr/><p class=\"break\">
    $hyback <a href=\"./forums.php?ses=$ses\">back</a><br/>
    $hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
exit;

}
?>
