<?php

include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/config.php');
include('../scripts/functions.php');

$login = $row_ses["username"];
$filter = $row_ses["filter"];
$uicn = $row_ses["uicn"];
$sicn = $row_ses["sicn"];
$pmax = $row_ses["pmax"];

$ucol = $row_ses["my_color"];
$txt = $row_ses["text_col"];
$bgc = $row_ses["bg_col"];


$enflag = $_GET['enflag'];



if ($group < 4)
{




///// end formatting options template /////
///////////////////////////////////////////




$query = "select read_state from phoenix_mail where mid='$mid' AND userto='$login'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);
$rstate = $row["read_state"];


	if ($rstate == 0)
			{
			/// score - credit

			$query = "update forum_users set posts=posts+4, credits=credits+2 where username='$login'";
			mysql_query($query);

			///
			}









$mail_query = "UPDATE phoenix_mail set readdate='$msgsandposts', read_state=1 where mid=$mid and userto='$login'";
mysql_query($mail_query);

$mail_query = "delete from phoenix_mail where mid=$mid+1";
mysql_query($mail_query);




$query = "select * from phoenix_mail where mid='$mid' AND userto='$login'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

if ($num_rows < 1)
	{
	echo "<p class=\"break\">
	<b>error</b>$breaker</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	this message does not exist.</p><hr/><p class=\"break\">$breaker$hyback <a href=\"inbox.php?ses=$ses\">inbox</a>
	<br/>$hyback <a href=\"index.php?ses=$ses&amp;act=index\">messaging</a>$shortcuts</p></body></html>";
	exit;
	}


elseif ($num_rows >= 1)

	{
	echo "<p class=\"break\">";

	$mid = $row["mid"];
	$sentdate = $row["sentdate"];
	$author = $row["author"];
	$subject = stripslashes($row["subject"]);
	$arch = $row["archive"];
	$userto = $row["userto"];
	$message = $row["message"];

        



$query = "UPDATE friends set lastactive=now(), location='reading a message from $author' where friendname='$login'";
mysql_query($query);

$act_query = "UPDATE forum_users set lastactive=now(), location='reading a message from $author' where username='$login'";
mysql_query($act_query);






	$frommer = "from: 
	<a href=\"../profile.php?ses=$ses&amp;user=$author&amp;pot=head\">$author</a> ";

	




if ($subject == "") $dsub = "message";
else $dsub = "$subject";


        // add all the links and the img: tag

        $message = funk_it_up($message, $ses);


	// add the icons and Profanity filter
	$message = add_sicn($message);

echo "<big>$dsub</big></p><hr/>";


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


echo "<p class=\"break\" style=\"text-align: left;\">";
echo "$frommer<br/>";
echo "sent: $sentdate</p>
<p class=\"breakforum\">";




echo "<br/>$message<br/>&nbsp;</p>";



$query = "select * from forum_users where username='$author' AND username!='System'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);


if ($num_rows >= 1)
{

if ($enflag != "yes") $enlink = "<br/><small>(<a href=\"./insert.php?ses=$ses&amp;act=enhancereply&amp;mid=$mid\">go advanced</a>)</small>";
else $enlink = "<br/>";




	echo "<hr/><p class=\"break\" style=\"text-align: left;\"><b><big>send reply</big>$enlink</b>";
	echo "</p>

	<form class=\"breakforum\" action=\"insert.php?ses=$ses\" method=\"post\" enctype=\"multipart/form-data\">
	<fieldset>

	<b>To:</b>
	$author<br/><br/>

	<b>Subject:</b>
	$subject<br/><br/>

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
	<input type=\"file\" name=\"file\"/><br/>";
	}

} // enflag


	echo "<br/>
	<input type=\"submit\" class=\"buttstyle\" value=\"-&gt; send\"/>
	<input type=\"hidden\" name=\"recipient\" value=\"$author\"/>
	<input type=\"hidden\" name=\"mid\" value=\"$mid\"/>
	<input type=\"hidden\" name=\"act\" value=\"reply\"/>
	<input type=\"hidden\" name=\"subject\" value=\"$subject\"/>
	</fieldset>
	</form>";






}



echo "$addrmail";




echo "$addrlink";

if (empty($page) || ($page < 1)) $page = 1; $max = $tmax;  $start = ($page-1) * $max;

$query1 = "SELECT count(*) from phoenix_mail where userto='$login' and author='$author' and bound!='out' and archive='no' and read_state='1' and mid!=$mid";
$result1 = mysql_query($query1);
$row1 = mysql_fetch_array($result1);
$count = $row1[0];

if ($count > 0)
{
echo "<hr/><p class=\"break\"><big>Conversation History</big></p>";

$query = "select * from phoenix_mail where userto='$login' and author='$author'  and bound!='out' and archive='no' and read_state='1' and mid!=$mid ORDER BY read_state, stamp DESC LIMIT $start, $max";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);



		if ($count > $max) 
		{
		echo  "<p class=\"breakforum\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $max);
		}

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"./msg.php?ses=$ses&amp;page=$counter&amp;mid=$mid\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}



while ($row)

	{
	$xmid = $row["mid"];
	$author = $row["author"];
	$message = $row["message"];
	$dated = $row["sentdate"];
	$subject = stripslashes($row["subject"]);


        $message = funk_it_up($message, $ses);


	// add the icons and Profanity filter
	$message = add_sicn($message);

	if ($subject == "") $subject = "[no subject]";

	echo "<p class=\"breakforum\"><b><a href=\"../profile.php?ses=$ses&amp;user=$author&amp;pot=head\">$author</a><br/>
	<small>Re: $subject</small></b><br/><small><b>$dated</b></small><br/>$message</p>";
	$row = mysql_fetch_array($result);


	}


		if ($count > $max) 
		{
		echo  "<p class=\"breakforum\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $max);
		}

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"./msg.php?ses=$ses&amp;page=$counter&amp;mid=$mid\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}


}




echo "<hr/><p class=\"break\" style=\"text-align: left;\">";

if ($special == "") echo "$hyfor <a href=\"./index.php?ses=$ses&amp;mid=$mid&amp;act=retour\">forward</a><br/>";
if ($special == "") echo "$hyfor <a href=\"./insert.php?ses=$ses&amp;mid=$mid&amp;act=del\">delete</a><br/>";
if ($special == "") echo "$hyfor <a href=\"./insert.php?ses=$ses&amp;author=$author&amp;act=cleaner\">anti-flood</a><br/>";
if ($special == "") if ($arch == "no") echo "$hyfor <a href=\"./insert.php?ses=$ses&amp;mid=$mid&amp;act=archive\">save to archive</a><br/>";


if ($special == "")
	{

	if ($arch == "yes") echo "$hyback <a href=\"./archive.php?ses=$ses\">back to archive</a><br/>
	$hyback <a href=\"./index.php?ses=$ses\">back to messaging</a><br/>
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";
	else echo "$hyback <a href=\"./inbox.php?ses=$ses\">back to inbox</a><br/>
	$hyback <a href=\"./index.php?ses=$ses\">back to messaging</a><br/>
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";
	}

if ($special != "") echo "$hyback <a href=\"../forum/threads.php?ses=$ses&amp;tid=$tid\">back to topic #$tid</a><br/>
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";

	echo "$shortcuts</p></body></html>";
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
