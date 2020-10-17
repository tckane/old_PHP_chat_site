<?php

include('../scripts/ses.php');
include('../scripts/main.php');


$stringy = $_GET['stringy'];
$param = $_GET['param'];

$err = $_GET['err'];


$enflag = $_GET['enflag'];

$topage = $_GET['topage'];

$page = $_GET['page'];

$quote = $_GET['quote'];

$mid = $_GET["mid"];

$topage = $_GET['topage'];

$stringy = strtolower($stringy);



if ($err != "") $err = "<br/><small><b>$err</b></small>";


echo "<p class=\"break\">";
echo "<big><b>edit posting</b></big>$inboxes$err</p><hr/>";



$query = "SELECT * from phoenix_posts WHERE id='$mid'";
$result =mysql_query($query);
$num_rows =mysql_num_rows($result);
$row = mysql_fetch_array($result);


$mid = $row["id"];
$ttid = $row["tid"];

$message = stripslashes($row["message"]);


$queryx = "SELECT subject from phoenix_topics WHERE id='$ttid'";
$resultx =mysql_query($queryx);
$num_rowsx =mysql_num_rows($resultx);
$rowx = mysql_fetch_array($resultx);

$subject = stripslashes($rowx["subject"]);







echo "<form class=\"breakforum\" id=\"bottom\" action=\"./insert.php?ses=$ses&amp;cat=$cat&amp;tid=$tid&amp;forum=$forum&amp;act=edit&amp;mid=$mid&amp;page=$page\" method=\"post\">
	<fieldset>
	<b>Subject:</b><br/>
	<input type=\"text\" readonly=\"yes\" value=\"$subject\"/><br/>
	<b>Message</b><br/>
	<textarea name=\"message\" rows=\"3\" cols=\"20\">$message</textarea>";
	echo "<br/><input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
	<input type=\"hidden\" name=\"cat\" value=\"$cat\"/>
	<input type=\"hidden\" name=\"tid\" value=\"$tid\"/>
	<input type=\"hidden\" name=\"forum\" value=\"$forum\"/>
	<input type=\"hidden\" name=\"act\" value=\"edit\"/>
	<input type=\"hidden\" name=\"page\" value=\"$page\"/>
	<input type=\"hidden\" name=\"mid\" value=\"$mid\"/>";

	echo "<input type=\"submit\" class=\"buttstyle\" value=\"-&gt; edit\"/><br/>
	<i>The subject line is provided for information purposes only and cannot be edited</i>.</fieldset>
	</form>";


       $query = "SELECT * from phoenix_forums WHERE forum='$forum'";
       $result =mysql_query($query);
       $num_rows =mysql_num_rows($result);
       $ro = mysql_fetch_array($result);

	$forumfriendly = $ro['name'];



echo "<p class=\"break\">
$hyback <a href=\"./threads.php?ses=$ses&amp;tid=$tid\">back to topic</a><br/>
$hyback <a href=\"topics.php?ses=$ses&amp;cat=$cat&amp;stringy=$stringy&amp;forum=$forum&amp;page=$topage\">back to &quot;$forumfriendly&quot;</a><br/>
$hyback <a href=\"../forum/forums.php?ses=$ses\">message boards</a><br/>";
if ($stringy != "") echo "$hyback <a href=\"search.php?ses=$ses&amp;forum=$forum&amp;page=$topage&amp;stringy=$stringy&amp;param=$param\">search results</a><br/>";
echo "$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a><br/></p></body></html>";







?>
