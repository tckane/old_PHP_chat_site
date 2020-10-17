<?php


include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/config.php');
include('../scripts/functions.php');
include('../scripts/main.php');

$login = $row_ses["username"];
$backg = $row_ses["bg_col"];
$myco = $row_ses["my_color"];
$tmax = $row_ses["tmax"];
$moof = $_GET["moof"];


$roomid = $_GET['roomid'];
if ($roomid == "")
{ $roomid = $_POST['roomid']; }


$chatpass = $_GET["chatpass"];

$letter = $_GET["letter"];



$act_query = "UPDATE forum_users set lastactive=now(), location='viewing icon list', room='' where username='$login'";
mysql_query($act_query);

$query = "UPDATE friends set lastactive=now(), location='viewing icon list', room='' where friendname='$login'";
mysql_query($query);




if (empty($page) || ($page < 1)) $page = 1; $max = $tmax;  $start = ($page-1) * $max;






if ($letter != "")
{
$quasi = "SELECT count(*) from phoenix_icons where typed LIKE'=$letter%'";
$modo = "SELECT * from phoenix_icons where typed LIKE '=$letter%' ORDER BY typed ASC LIMIT $start, $max";
$lettershow = strtoupper("$letter");
$addon = " that begin with the letter $lettershow";
}
else
{
$quasi = "SELECT count(*) from phoenix_icons where typed LIKE'=%'";
$modo = "SELECT * from phoenix_icons where typed LIKE '=%' ORDER BY typed ASC LIMIT $start, $max";
$addon = " in total";
}



$query = "$quasi";
$result =mysql_query($query);
$row2 =mysql_fetch_array($result);
$count = $row2[0];


	$query = "$modo";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);





echo "<p class=\"break\">
There Are $count icons$addon$inboxes<br/><small><a href=\"../about.php?ses=$ses&amp;act=about\">help menu</a></small></p>
<p class=\"breakforum\" style=\"text-align: center; font-weight: bold;\">These are the icons you use in message boards, mail messages, blogs, comments on profiles etc.<br/>
Typed the codes below and the corresponding icon will appear in your writing. 'Wapoc' style icon codes (i.e. icon:clap) are also supported.</p>";


echo "<form action=\"./sicn.php\" class=\"break\" method=\"get\">
<fieldset>
Filter By <select name=\"letter\">

<option value=\"a\">Letter A</option>
<option value=\"b\">Letter B</option>
<option value=\"c\">Letter C</option>
<option value=\"d\">Letter D</option>
<option value=\"e\">Letter E</option>
<option value=\"f\">Letter F</option>
<option value=\"g\">Letter G</option>
<option value=\"h\">Letter H</option>
<option value=\"i\">Letter I</option>
<option value=\"j\">Letter J</option>
<option value=\"k\">Letter K</option>
<option value=\"l\">Letter L</option>
<option value=\"m\">Letter M</option>
<option value=\"n\">Letter N</option>
<option value=\"o\">Letter O</option>
<option value=\"p\">Letter P</option>
<option value=\"q\">Letter Q</option>
<option value=\"r\">Letter R</option>
<option value=\"s\">Letter S</option>
<option value=\"t\">Letter T</option>
<option value=\"u\">Letter U</option>
<option value=\"v\">Letter V</option>
<option value=\"w\">Letter W</option>
<option value=\"x\">Letter X</option>
<option value=\"y\">Letter Y</option>
<option value=\"z\">Letter Z</option>

<option value=\"0\">Number 0</option>
<option value=\"1\">Number 1</option>
<option value=\"2\">Number 2</option>
<option value=\"3\">Number 3</option>
<option value=\"4\">Number 4</option>
<option value=\"5\">Number 5</option>
<option value=\"6\">Number 6</option>
<option value=\"7\">Number 7</option>
<option value=\"8\">Number 8</option>
<option value=\"9\">Number 9</option>
<option value=\"\">Clear Filter</option>

</select>
<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
<input type=\"hidden\" name=\"moof\" value=\"$moof\"/>
<input type=\"hidden\" name=\"roomid\" value=\"$roomid\"/>
<input type=\"hidden\" name=\"chatpass\" value=\"$chatpass\"/>
<input type=\"submit\" name=\"go\" value=\"go\">
</fieldset></form>";



if ($count > $max) 
{
echo  "<p class=\"breakforum\"><b>Page:</b> ";

if ( $count > $max ) 
{ 
$number = ceil($count / $max);
}

for ( $counter=1; $counter <= $number; $counter++ )
{
if ($counter != $page) echo "<b><a href=\"sicn.php?ses=$ses&amp;moof=$moof&amp;letter=$letter&amp;page=$counter&amp;moof=$moof&amp;roomid=$roomid&amp;chatpass=$chatpass\">$counter</a></b> ";
else  echo "<b>$counter</b> ";
}

if ($count > $max) echo  "</p>";
}



echo "<table width=\"100%\" class=\"breakforum\">";

echo "<tr class=\"break\" style=\"text-decoration: underline; text-align: left;\"><td style=\"width: 40%;\"><b><big>Type</big></b></td><td align=\"center\"><b><big>To Get</big></b></td></tr>";

while ($row)
      	{
       	$name = $row["image"];
	$typed = $row["typed"];


       	echo "<tr><td align=\"left\" style=\"width: 40%;\"><b>$typed</b></td><td align=\"center\"><img align=\"middle\" src=\"../images/sicn/$name.gif\"></td></tr>";


       	$row = mysql_fetch_array($result);
      	}



echo "</table>";

if ($count > $max) 
{
echo  "<p class=\"breakforum\"><b>Page:</b> ";

if ( $count > $max ) 
{ 
$number = ceil($count / $max);
}

for ( $counter=1; $counter <= $number; $counter++ )
{
if ($counter != $page) echo "<b><a href=\"sicn.php?ses=$ses&amp;moof=$moof&amp;letter=$letter&amp;page=$counter&amp;moof=$moof&amp;roomid=$roomid&amp;chatpass=$chatpass\">$counter</a></b> ";
else  echo "<b>$counter</b> ";
}

if ($count > $max) echo  "</p>";
}






echo "</table><p class=\"break\">";

if ($moof == "yes") echo"$hyback <a href=\"../chat/chat.php?ses=$ses&amp;roomid=$roomid&amp;chatpass=$chatpass\">chat</a><br/>";

echo "$hyback <a href=\"../about.php?ses=$ses&amp;act=about\">back to help</a><br/>
$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";

      echo "$shortcuts</p></body></html>";







?>
