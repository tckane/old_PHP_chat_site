<?php

include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/main.php');
include('../scripts/functions.php');
$login = $row_ses["username"];
$group = $row_ses["userlevel"];


echo "<p class=\"break\">
<b>Administration Options<br/>For Topic #$tid</b></p><hr/><p class=\"breakforum\"><b>";



$query = "select * from phoenix_topics where id=$tid";
$result =mysql_query($query);
$num_rows =mysql_num_rows($result);
$row = mysql_fetch_array($result);
$dele = $row["author"];
$lock = $row["locked"];
$stuck = $row["sticky"];

if ($group < 2) if ($lock =="no") echo "$hyfor <a href=\"./insert.php?ses=$ses&amp;act=close&amp;cat=$cat&amp;forum=$forum&amp;tid=$tid\">Lock Topic</a><br/>";
if ($group < 2) if ($lock =="yes") echo "$hyfor <a href=\"./insert.php?ses=$ses&amp;act=unlock&amp;cat=$cat&amp;forum=$forum&amp;tid=$tid\">Unlock Topic</a><br/>";

if ($group < 2) if ($stuck == 0) echo "$hyfor <a href=\"./insert.php?ses=$ses&amp;act=stickify&amp;cat=$cat&amp;forum=$forum&amp;tid=$tid\">Sticky Topic</a><br/>";
if ($group < 2) if ($stuck == 1) echo "$hyfor <a href=\"./insert.php?ses=$ses&amp;act=release&amp;cat=$cat&amp;forum=$forum&amp;tid=$tid\">Unstick Topic</a><br/>";

if ($group < 2) echo "$hyfor <a href=\"./insert.php?ses=$ses&amp;act=del&amp;cat=$cat&amp;forum=$forum&amp;tid=$tid\">Delete Topic</a></b></p>";


$query = "select * from phoenix_forums where type='forum' ORDER BY name ASC";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);



echo "<form class=\"breakforum\" action=\"insert.php?ses=$ses&amp;act=movepost\" method=\"get\">
<fieldset>
<b>Move Topic</b><br/>
<select name=\"forumto\">";

while ($row)
	{
	$xname = $row["name"];
	$xforum = $row["forum"];	
	echo "<option value=\"$xforum\">$xname</option>";
           	$row = mysql_fetch_array($result);
	}

echo "</select><br/>
<input type=\"submit\" value=\"move it\"/>
<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
<input type=\"hidden\" name=\"act\" value=\"movepost\"/>
<input type=\"hidden\" name=\"cat\" value=\"$cat\"/>
<input type=\"hidden\" name=\"forum\" value=\"$forum\"/>
<input type=\"hidden\" name=\"tid\" value=\"$tid\"/>
</fieldset></form>";


echo "<hr/><p class=\"break\">$hyback <a href=\"./topics.php?ses=$ses&amp;cat=$cat&amp;forum=$forum&amp;page=$topage\">back to board</a><br/>
$hyback <a href=\"../forum/forums.php?ses=$ses\">message board</a><br/>
$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";
echo "</p></body></html>";



?>



