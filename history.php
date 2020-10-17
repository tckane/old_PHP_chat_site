<?php

include('./scripts/ses.php');
include('./scripts/header.php');
include('./scripts/session.php');
include('./scripts/config.php');
include('./scripts/functions.php');
include('./scripts/main.php');



$queryx = "SELECT * from phoenix_comments where type='shout' ORDER BY id DESC";
$resultx = mysql_query ("$queryx");
$num_rows = mysql_num_rows($resultx);
$comments = mysql_fetch_array($resultx);


$limit = "30";

echo "<p class=\"break\"><b><big>Shout history</b></big></p><hr/>
<p class=\"breakforum\" style=\"text-align: center;\"><b>The last 30 shouts are stored here.</b></p>";




///////////////////////////////////////////////////////////////
////////// shortcut block /////////////////////////////////////////
///////////////////////////////////////////////////////////////
$queryd = "SELECT * FROM shortcuts";
$resultd = mysql_query($queryd);
$rowd = mysql_fetch_array($resultd);

echo "<form class=\"breakforum\" style=\"text-align: center;\" action=\"$lback/shortcuts.php?ses=$ses\" method=\"get\">
<fieldset>
<select name=\"shortcut\">";

while ($rowd)
{

$sid = $rowd["id"];
$sname = $rowd["name"];

echo "<option value=\"$sid\">$sname</option>";

$rowd = mysql_fetch_array($resultd);
}

echo "</select>
<input type=\"submit\" value=\"go there\"/>
<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
</fieldset></form>";
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////













while ($comments)	
{ 

$userperson = $comments["username"];
$comment = $comments["msg"];
$comment = stripslashes("$comment");
$when = $comments["friendlytime"];


$comment = funk_it_up($comment, $ses);
$comment = add_sicn($comment);


echo "<p class=\"breakforum\"><b><a href=\"./profile.php?ses=$ses&amp;user=$userperson\">$userperson</a>:</b> $comment</p>";


$comments = mysql_fetch_array($resultx);
}


$difference = ($num_rows - $limit);


if ($num_rows > $limit) 
{
$queryx = "DELETE from phoenix_comments where type='shout' ORDER BY id ASC LIMIT $difference";
$resultx = mysql_query ("$queryx");
}


if ($group < 2) $dellink = "<br/>Would you like to clean the shoutbox?<br/>$hyfor <a href=\"./options/insert.php?ses=$ses&amp;act=cleanshout\">Yes, Clean It!</a>";



echo "<hr/><p class=\"break\">$hyback <a href=\"./mainmenu.php?ses=$ses\">main menu</a>$dellink</p></body></html>";



?>