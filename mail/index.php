<?php

include('../scripts/ses.php');
include('../scripts/main.php');


$login = $row_ses["username"];
$tablec = $row_ses["tr_col"];
$simages = $row_ses["simages"];
$group = $row_ses["userlevel"];
$emaildo = $row_ses["doesemail"];
$epass = $row_ses["password"];

$err = $_GET['err'];
$enflag = $_GET['enflag'];

$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];

/////////////////////////////////////////////////////////////////////////////////


$act_query = "UPDATE forum_users set lastactive=now(), location='messaging' where username='$login'";
mysql_query($act_query);

$act_query = "UPDATE friends set lastactive=now(), location='messaging' where friendname='$login'";
mysql_query($act_query);

$helplink = "<br/><small><a href=\"./index.php?ses=$ses&amp;act=about\">mailbox help</a></small>";


if ($group < 4)
{






if ($act == "" | $act == "index" | $act == "presetuser" | $act == "send") 

	{
	$query ="select count(*) from phoenix_mail where userto='$login' and read_state!=1 and bound!='out' and archive='no'";
	$result = mysql_query($query);
	$n = number_format(mysql_result($result,0,"count(*)"));

	$query ="select count(*) from phoenix_mail where userto='$login' and read_state=1 and bound!='out' and archive='no'";
	$result = mysql_query($query);
	$o = number_format(mysql_result($result,0,"count(*)"));

	$query ="select count(*) from phoenix_mail where author='$login' and read_state!=1 and bound='out' and archive='no'";
	$result = mysql_query($query);
	$s = number_format(mysql_result($result,0,"count(*)"));

	$query ="select count(*) from phoenix_mail where userto='$login' and read_state!=1 and bound!='out' and archive='yes'";
	$result = mysql_query($query);
	$aa = number_format(mysql_result($result,0,"count(*)"));

	$query ="select count(*) from phoenix_mail where userto='$login' and read_state=1 and bound!='out' and archive='yes'";
	$result = mysql_query($query);
	$ab = number_format(mysql_result($result,0,"count(*)"));

	$query ="select count(*) from phoenix_mail where userto='$login' and archive='yes'";
	$result = mysql_query($query);
	$accc = number_format(mysql_result($result,0,"count(*)"));

	$query ="select count(*) from phoenix_email where username='$login' and type='message'";
	$result = mysql_query($query);
	$aeb = number_format(mysql_result($result,0,"count(*)"));


	$all = ($n + $o + $s + $eall + $accc + $aeb);
if ($err != "") $err = "<br/><small><b>$err</b></small>";

	echo "<p class=\"break\">";


if ($bwmode == "off") $subtite = "<img src=\"../scripts/phoenix.php?string=mailbox&amp;login=$login\" alt=\"\"/>";
else $subtite = "<b><big>Mailbox</big></b>";



echo "$subtite$helplink";


if ($all == 1) $msayer = "$all message.";
elseif ($all > 1) $msayer = "$all messages.";
else $msayer = "no messages.";

echo "$err</p><hr/>";


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



echo "<p class=\"break\" style=\"text-align: center;\"><big>You have $msayer</big></p>";



echo "<p class=\"breakforum\"><img src=\"../images/mail/listview/inbox.gif\" alt=\"\" align=\"middle\"/> <b><big><a href=\"./inbox.php?ses=$ses\">Inbox</a></big> ($n/$o)</b></p>
<p class=\"breakforum\"><img src=\"../images/mail/listview/outbox.gif\" alt=\"\" align=\"middle\"/> <b><big><a href=\"./outbox.php?ses=$ses\">Outbox</a></big> ($s)</b></p>
<p class=\"breakforum\"><img src=\"../images/mail/listview/archive.gif\" alt=\"\" align=\"middle\"/> <b><big><a href=\"./archive.php?ses=$ses\">Archive</a></big> ($aa/$ab)</b></p>";


if ($emaildo == "yes")
{

$emsi = "($eunread/$eall)";
$emsj = "($aeb)";
echo "<p class=\"breakforum\"><img src=\"../images/mail/listview/newemail.gif\" alt=\"\" align=\"middle\"/> <b><big><a href=\"./attachments/sendmail.php?ses=$ses\">Send Email</a></big></b></p>";
echo "<p class=\"breakforum\"><img src=\"../images/mail/listview/emailinbox.gif\" alt=\"\" align=\"middle\"/> <b><big><a href=\"./getmail.php?ses=$ses&amp;p=serv_1\">Email Inbox</a></big> $emsi</b></p>";
echo "<p class=\"breakforum\"><img src=\"../images/mail/listview/emailsent.gif\" alt=\"\" align=\"middle\"/> <b><big><a href=\"./esent.php?ses=$ses\">Sent Email</a></big> $emsj</b></p>";
}
else
{
echo "<p class=\"breakforum\"><img src=\"../images/mail/listview/emailinbox.gif\" alt=\"\" align=\"middle\"/> <b><big><a href=\"./index.php?ses=$ses&amp;act=doemail\">Email</a></big> (not yet set up)</b></p>";
}


echo "<p class=\"breakforum\"><img src=\"../images/mail/listview/deleteall.gif\" alt=\"\" align=\"middle\"/> <b><big><a href=\"./insert.php?ses=$ses&amp;act=emptyer\">Empty Mail</a></big></b><br/>
<small><b>(all mail will be deleted except archived messages)</b></small></p>";




echo "<hr/>";



if ($senduser == "")
{
$placer = "<input name=\"recipient\" class=\"textbox\" type=\"text\" value=\"$senduser\" maxlength=\"50\"/>";
$also = "<input type=\"hidden\" name=\"act\" value=\"send\"/>";
$subj = "<input name=\"subject\" class=\"textbox\" type=\"text\" maxlength=\"50\"/>";
$cancellerm = "<a href=\"./index.php?ses=$ses&amp;act=index\">cancel</a>";
}
else
{
$placer = "$senduser<br/>";
$sendtoh = "<input type=\"hidden\" name=\"recipient\" value=\"$senduser\"/>";
$also = "<input type=\"hidden\" name=\"act\" value=\"send\"/>";
$subj = "<input name=\"subject\" class=\"textbox\" type=\"text\" maxlength=\"50\"/>";
$cancellerm = "<a href=\"../profile.php?ses=$ses&amp;user=$senduser\">cancel</a>";
}



if ($enflag != "yes") $enlink = "<br/><small>(<a href=\"./insert.php?ses=$ses&amp;act=enhancenew\">go advanced</a>)</small>";
else $enlink = "";




	echo "<p class=\"break\" style=\"text-align: left;\">";
	if ($group <= 3) echo "<b><big>send new message</big>$enlink</b></p>

	<form class=\"breakforum\" id=\"bottom\" action=\"insert.php?ses=$ses\" method=\"post\" enctype=\"multipart/form-data\">
	<fieldset>

	<b>To:</b><br/>
	$placer<br/>

	<b>Subject:</b><br/>
	$subj<br/>

	<b>Message:</b><br/>
	<textarea name=\"msg\" rows=\"3\" cols=\"20\"></textarea>";


if ($enflag == "yes")
{

	echo "<br/>
	<b>icon:</b><br/><select name=\"inserticon\" title=\"insert icon?\" class=\"textbox\">
	<option value=\"\">no icon</option>";

	$query = "SELECT * from phoenix_icons where typed LIKE '=%' ORDER BY typed ASC";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$rowicons = mysql_fetch_array($result);


	while ($rowicons)
      	{
       	$typed = $rowicons["typed"];

	$typedx = str_replace("=","","$typed");
	$typedx = ucfirst("$typedx");

       	echo "<option value=\"$typed\">$typedx</option>";



       	$rowicons = mysql_fetch_array($result);
      	}



	echo "</select>";

	$query = "SELECT count(*) from phoenix_imagealbums WHERE login='$login'";
	$result = mysql_query($query);
	$hasalbumcount = number_format(mysql_result($result,0,"count(*)"));


	if ($hasalbumcount > 0)
	{


	echo "<br/><b>attach a photo?</b><small>(gif or jpg)</small><br/>
	<input type=\"file\" name=\"file\"/>";
	}
} // enflag!
	echo "<br/>
	<input type=\"submit\" class=\"buttstyle\" value=\"-&gt; send\"/>
	$sendtoh$messid$also$elsub
	</fieldset>
	</form>";





echo "<hr/><p class=\"break\">$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
	exit;
	}




if ($act == "delall") 
	
	{
	echo "<p class=\"break\">
	<b>empty inbox</b>$helplink</p><hr/><p class=\"centerize\">
	you wish to delete all the read messages in your inbox?</p><hr/><p class=\"break\">$breaker
	$hyfor <a href=\"./insert.php?ses=$ses&amp;act=delall\">yes, delete 'em!</a>
	<br/>$hyback <a href=\"./inbox.php?ses=$ses\">no, keep 'em.</a>$shortcuts</p></body></html>";
	exit;
	}



if ($act == "delout") 
	
	{
	echo "<p class=\"break\">
	<b>empty outbox</b>$helplink</p><hr/><p class=\"centerize\">
	you wish to delete all the messages you sent?, they won't delete from the user to's inbox ya know...</p><hr/><p class=\"break\">$breaker
	<br/>$hyfor <a href=\"./insert.php?ses=$ses&amp;act=delout\">yes, delete 'em!</a>
	<br/>$hyback <a href=\"./inbox.php?ses=$ses\">no, keep 'em.</a>$shortcuts

	$atmsgs</p></body></html>";
	exit;
	}


#===========THE EXPERIMENT================================================





if ($act == "about")
{

echo "<p class=\"break\"><b><big>About Mailbox</big></b><br/><small><a href=\"../about.php?ses=$ses&amp;act=about\">help menu</a></small></p><hr/>
<p class=\"breakforum\" style=\"text-align: center;\"><b><big>Everything you need to know about the internal mail system.</big></b></p>
<p class=\"breakforum\">";

if ($emaildo == "yes") echo "<b>Can i use my email account anywhere else?</b> - <i>YES, using pop3 you can access email from a number of different clients, please use <a href=\"./index.php?ses=$ses&amp;act=epopper\">these settings</a>.</i><br/><br/>";

echo "<b>What is it?</b> - <i>it's how you send messages from one user to another.</i><br/><br/>
<b>What do i do?</b> - <i> you can either send a message from a user's profile or your friends list, or you can specify the named individual in the <b>to:</b> box. you can use photos, icons and <a href=\"../forum/formatting.php?ses=$ses\">BB Code</a> in your messages.</i><br/><br/>
<b>Where is it?</b> - <i>you can access it from the main menu, it's easy enough to find.</i><br/><br/>
<b>Who can see it?</b> - <i>nobody. all your messages are stored safely and privately in our database. nobody can read them except you.</i><br/><br/>

<b>Pop Messages</b> - <i>A pop message can be sent to other members from their profile, these messages will appear before that member's very eyes as they browse the site, please note that to avoid annoyance, pop messages can only be a maximum of 160 characters in length and members posess the option to turn them off or restrict them to friends only.</i><br/><br/>

<b>Archived Messages</b> - <i>you can store messages in your archive to prevent them from being deleted during 'spring cleaning' of the site, you should place important messages here</i><br/><br/>

<b>Anti-Flood</b> - <i>this option will appear within a message, if you click this, all messages sent to you by the sender of the current message will be deleted unless you have Archived them, this is to deter 'mailbox flooding/bombing' by idiots.</i><br/><br/>


<b>Harassment</b> - <i>here at $sitename we take a dim view of harassment, quite simply it will not be tolerated. if someone is harassing you by sending you messages you do not want, use the <b>ignore</b> function. if the user persists by signing up new usernames to bypass the ignore function, please forward an example of the offending messages to <b>$PHNAME</b> and this user will be dealt with.</i><br/><br/>

<b>Maintaining My Messages</b> - <i>you can send, recieve, delete and move messages. messages that arrive with the following symbol </i><big><b>( ! )</b></big><i> contain attached photos. if a user floods your inbox (sends you many copies of the same message) you can use the <b>flood control</b> function, however, this will obliterate <b>all</b> messages from your mailbox except those stored in the archive.</i><br/><br/>
<b>Extra Help</b> - <i>if you have questions or need help with the mail system, feel free to send a message to <a href=\"../mail/index.php?ses=$ses&amp;senduser=$PHNAME&amp;act=presetuser\">$PHNAME</a>.</i>
</p><hr/><p class=\"break\">
    $hyback <a href=\"./index.php?ses=$ses\">back</a><br/>
    $hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
exit;

}



if ($act == "epopper")
{

echo "<p class=\"break\"><b><big>Phoenix POP</big></b><br/><small><a href=\"../about.php?ses=$ses&amp;act=about\">help menu</a></small></p><hr/>
<p class=\"breakforum\" style=\"text-align: center;\"><b>PhoenixMail POP3 Email Settings<br/>
These settings will allow the use of your PhoenixMail email account from an external application such as Outlook Express, Opera Browser's mail retriever and even your pop3 enabled mobile phone.</b></p>
<p class=\"breakforum\">

<b>Incoming Mail Server<br/>
<small>(aka pop server)</small></b><br/>
mail.phoenixbytes.co.uk<br/><br/>
<b>Outgoing Mail Server<br/>
<small>(aka smtp server)</small></b><br/>
mail.phoenixbytes.co.uk<br/><br/>
<b>Username</b><br/>
$login@phoenixbytes.co.uk<br/><br/>
<b>Password</b><br/>
$epass<br/><br/>
Ports are to be left as the default that your application selects, if they're blank use the following ports:<br/>
<b>Incoming:</b> Port 110<br/>
<b>Outgoing:</b> Port 25</p>
<p class=\"breakforum\" style=\"text-align: center;\">That's it, you should now be set up. Send yourself a message to check that both your incoming and outgoing mail settings are correct and enjoy!
</p><hr/><p class=\"break\">
    $hyback <a href=\"./index.php?ses=$ses&amp;act=about\">back</a><br/>
   $hyback <a href=\"./index.php?ses=$ses\">back to mailbox</a><br/>
    $hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
exit;

}




if ($act == "doemail")
{





echo "<p class=\"break\"><b><big>Email Setup</big></b></p><hr/>

<p class=\"breakforum\" style=\"text-align: center;\"><b>$login@phoenixbytes.co.uk</b></p><hr/>
<p class=\"breakforum\" style=\"text-align: center;\">


Ok so here's the deal, we can supply you with an email address and the means to send and recieve messages (with attachments) from our wee site, but there's a but.<br/><br/>
The amount of email addresses we can supply has a limit - 500 - and i'm already using 2 of those, that's why email accounts are not given on signup but rather users have to go through this page to get them set up.<br/><br/>
You will only see the page once, after that, this will become your inbox.<hr/>
<p class=\"breakforum\" style=\"text-align: center;\">
So, do you want to get emails here?</p>


<form style=\"text-align: center;\" action=\"./insert.php?ses=$ses&amp;act=doemail\" class=\"breakforum\" method=\"get\">
<fieldset>
<input type=\"submit\" style=\"padding: 1px; text-align: left; font-weight: bold;\" value=\"Yes\"/>
<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
<input type=\"hidden\" name=\"act\" value=\"doemail\"/>
</fieldset></form>";


echo "<form style=\"text-align: center;\" action=\"./index.php?ses=$ses\" class=\"breakforum\" method=\"get\">
<fieldset>
<input type=\"submit\" style=\"padding: 1px; text-align: left; font-weight: bold;\" value=\"No\"/>
<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
</fieldset></form>


<hr/><p class=\"break\">
    $hyback <a href=\"./index.php?ses=$ses\">back</a><br/>
    $hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
exit;

}


if ($act == "newpop")
{
$sendto = $_GET["sendto"];



$query = "UPDATE forum_users set lastactive=now(), location='sending a pop message to $sendto' where username='$login'";
mysql_query($query);

$query = "UPDATE friends set lastactive=now(), location='sending a pop message to $sendto' where friendname='$login'";
mysql_query($query);



echo "<p class=\"break\"><b><big>New Pop<br/>Message</big></b></p><hr/>
<form class=\"breakforum\" action=\"insert.php?ses=$ses&amp;act=newpop\" method=\"post\">
<fieldset>
<b>To:</b> $sendto<br/>
<b>Message</b><br/>
<input type=\"text\" name=\"message\"/><br/>
<input type=\"submit\" value=\"send\"/>
<input type=\"hidden\" name=\"act\" value=\"newpop\"/>
<input type=\"hidden\" name=\"recipient\" value=\"$sendto\"/>
</fieldset>
</form>
<hr/>
<p class=\"break\">
$hyback <a href=\"./index.php?ses=$ses\">go back</a><br/>
$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";


}











	


if ($act == "retour") 

	{





$act_query = "UPDATE forum_users set lastactive=now(), location='forwarding $author&#39;s message' where username='$login'";
mysql_query($act_query);

$act_query = "UPDATE friends set lastactive=now(), location='forwarding $author&#39;s message' where friendname='$login'";
mysql_query($act_query);




	echo "<p class=\"break\">";
$query = "SELECT * FROM phoenix_mail where mid=$mid";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

$text = $row["message"];
$writer = $row["author"];
$userto = $row["userto"];
$dater = $row["sentdate"];
$subject = $row["subject"];

	$text = make_wml_compat($text);





$newsub = "[FWD] $subject";

$newsub = make_wml_compat("$newsub");

	$msg = "$text<br/>$breakstick<br/><b>author:</b><br/>$writer";

	$input = "$text===original author: $writer===message ID: $mid";

	echo "<big>forward message</big></p><hr/>";



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



$view = funk_it_up($text, $ses);


	// add the icons and Profanity filter
$view = add_sicn($view);



	echo "<p class=\"break\" style=\"text-align: left;\">






	<b>from:</b> $writer<br/>
	<b>to:</b> $userto<br/>
	<b>subject:</b> $subject<br/>
	<b>date:</b> $dater</p>
	<p class=\"breakforum\">
	$view</p>";



	echo "<form class=\"break\" style=\"text-align: left\" action=\"./insert.php?ses=$ses&amp;act=send\" method=\"post\">
	<fieldset>";
	echo "<b>send this to who?</b><br/>
	<input type=\"hidden\" name=\"msg\" value=\"$input\"/>
	<input type=\"hidden\" name=\"subject\" value=\"$newsub\"/>
	<input type=\"text\" name=\"recipient\" class=\"textbox\" value=\"\" maxlength=\"12\"/>
	<br/><input type=\"submit\" class=\"buttstyle\" value=\"send\"/>
	</fieldset>
	</form>";

	echo "<hr/><p class=\"break\">$hyback <a href=\"./inbox.php?ses=$ses\">cancel</a>$shortcuts</p></body></html>";
	exit;
		}


}
else
{



	echo "<p class=\"break\"><img src=\"../scripts/phoenix.php?string=account%20restricted!&amp;login=$login\" alt=\"account%20restricted!\"/></p><hr/>
	<p class=\"breakforum\" style=\"text-align: center;\">";

	echo "Sorry, your account appears to be restricted, this may be due to misconduct on your part or an error on our part.<br/><br/>
	During the period of restriction you will be unable to use the Mailbox and some other functions of this site, this is for the protection of other users.<br/><br/>
	If you feel that this is an error and you have done nothing wrong please contact an administrator.";

	echo "</p><hr/><p class=\"break\">$breaker$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>$shortcuts</p></body></html>";
	exit;




}
?>


