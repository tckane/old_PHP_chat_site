<?php




include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/config.php');
include('../scripts/functions.php');
include('../scripts/main.php');

$credits = $row_ses["credits"];


echo "<p class=\"break\"><img src=\"../scripts/phoenix.php?login=$login&amp;string=Casino%20Games\"/></p><hr/>
<p class=\"breakforum\" style=\"text-align: center;\"><b>Here are some casino style games, you can use these to try and earn some more credits, more will be added soon.<br/>
Please be sure to read the &quot;How To Play&quot; instructions before spending your hard earned Cr.</p>";



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







echo "<table width=\"100%\" class=\"breakforum\">

<tr align=\"center\"><td width=\"50\"><b><img src=\"../scripts/bytes.php?login=$login&amp;string=Craps\"/><br/>
<a href=\"./craps/index.php?ses=$ses\"><img src=\"./craps.gif\" alt=\"Craps\"/></a><br/>10Cr Per Throw</b></td></tr>


<tr align=\"center\"><td width=\"50\"><b><img src=\"../scripts/bytes.php?login=$login&amp;string=Phoenix%20Fruits\"/><br/>
<a href=\"./fruity/index.php?ses=$ses\"><img src=\"./fruity.gif\" alt=\"Fruit Machine\"/></a><br/>20Cr Per Spin</b></td></tr>

<tr align=\"center\"><td width=\"50\"><b><img src=\"../scripts/bytes.php?login=$login&amp;string=5%20Card%20Draw\"/><br/>
<a href=\"./poker/index.php?ses=$ses\"><img src=\"./poker.gif\" alt=\"5 Card Draw\"/></a><br/>50Cr Per Hand</b></td></tr>


<tr align=\"center\"><td width=\"50\"><b><img src=\"../scripts/bytes.php?login=$login&amp;string=Lucky%20Lotto\"/><br/>
<a href=\"./lottery/index.php?ses=$ses\"><img src=\"./lottery.gif\" alt=\"Lucky Lotto\"/></a><br/>100Cr Per Line</b></td></tr>





<tr align=\"center\"><td colspan=\"2\"><b>You have $credits credits.</b></td></tr>

</table>


<p class=\"break\">
$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";
echo "</p></body></html>";





?>



