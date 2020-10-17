<?php

include('../scripts/main.php');


$query = "select count(*) from my_links where valid='yes'";
$result = mysql_query($query);
$count = number_format(mysql_result($result,0,"count(*)"));




echo "<p class=\"break\"><img src=\"../scripts/phoenix.php?login=SYSTEM&amp;string=Wap%20Directory\" alt=\"Wap Directory\" align=\"middle\"/>";
echo "<br/>
<small><i>searching $count high quality wap sites (so far!)</i><br/>
<b><a href=\"./info.php\">add your site now!</a></b></small></p>
<form class=\"breakforum\" style=\"text-align: center;\" action=\"./dosearch.php?ses=$ses\" method=\"get\" sendreferer=\"true\">
<fieldset><b>Search Now</b><br/>
<input type=\"text\" class=\"textbox\" name=\"stringy\" title=\"search string\"  maxlength=\"70\"/><br/>
<b>results per page</b><br/>
<select name=\"rpp\" class=\"textbox\" title=\"results per page\">";
for( $i=5; $i<=30; $i++ )
{
echo "<option value=\"$i\">$i</option>";
}
    echo "</select><br/>
<b>show</b><br/>
<select name=\"rt\" class=\"textbox\" value=\"$rt\">
<option value=\"link\">link only</option>
<option value=\"full\">full details</option>
</select><br/>
<input type=\"submit\" accesskey=\"0\" value=\"search\" class=\"buttstyle\" size=\"30\"/>
</fieldset>
</form>
<hr/><p class=\"break\"><b><big>Browse Categories</big></b></p>";



$image = "<img align=\"middle\" src=\"../images/pointer.gif\" alt=\"\"/> ";


$query = "select count(*) from my_links where valid='yes' AND category='portals'";
$result = mysql_query($query);
$port = number_format(mysql_result($result,0,"count(*)"));
echo "<p class=\"breakforum\">$image<big><b><a href=\"./cat.php?cat=portals\">portals</a></b>($port)</big></p>";


$query = "select count(*) from my_links where valid='yes' AND category='chat'";
$result = mysql_query($query);
$chat = number_format(mysql_result($result,0,"count(*)"));
echo "<p class=\"breakforum\">$image<big><b><a href=\"./cat.php?cat=chat\">chat &amp; dating</a></b>($chat)</big></p>";


$query = "select count(*) from my_links where valid='yes' AND category='downloads'";
$result = mysql_query($query);
$downloads = number_format(mysql_result($result,0,"count(*)"));
echo "<p class=\"breakforum\">$image<big><b><a href=\"./cat.php?cat=downloads\">downloads</a></b>($downloads)</big></p>";


$query = "select count(*) from my_links where valid='yes' AND category='free'";
$result = mysql_query($query);
$free = number_format(mysql_result($result,0,"count(*)"));
echo "<p class=\"breakforum\">$image<big><b><a href=\"./cat.php?cat=free\">free stuff</a></b>($free)</big></p>";



$query = "select count(*) from my_links where valid='yes' AND category='entertainment'";
$result = mysql_query($query);
$entertainment = number_format(mysql_result($result,0,"count(*)"));
echo "<p class=\"breakforum\">$image<big><b><a href=\"./cat.php?cat=entertainment\">entertainment</a></b>($entertainment)</big></p>";


$query = "select count(*) from my_links where valid='yes' AND category='special'";
$result = mysql_query($query);
$special = number_format(mysql_result($result,0,"count(*)"));
echo "<p class=\"breakforum\">$image<big><b><a href=\"./cat.php?cat=special\">special interest</a></b>($special)</big></p>";


$query = "select count(*) from my_links where valid='yes' AND category='adult'";
$result = mysql_query($query);
$adult = number_format(mysql_result($result,0,"count(*)"));
echo "<p class=\"breakforum\">$image<big><b><a href=\"./cat.php?cat=adult\">adult sites</a></b>($adult)</big></p>";


$query = "select count(*) from my_links where valid='yes' AND category='amateur'";
$result = mysql_query($query);
$amateur = number_format(mysql_result($result,0,"count(*)"));
echo "<p class=\"breakforum\">$image<big><b><a href=\"./cat.php?cat=amateur\">amateur (personal sites)</a></b>($amateur)</big></p>";






echo "<hr/><p class=\"break\">";
echo "$hyfor <a href=\"./info.php\">add your site</a><br/>";
echo "$hyfor <a href=\"./insert.php?ses=$ses&amp;act=userdit\">edit site entry</a><br/>";
echo "$hyback <a href=\"../index.php\">main menu</a><br/>$lIlIlIlI</p></body></html>";


?>