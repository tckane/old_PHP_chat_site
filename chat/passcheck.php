<?php



include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/config.php');
include('../scripts/functions.php');
include('../scripts/main.php');


$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];

$err = $_GET["err"];


$roomid = $_GET["roomid"];
if ($roomid == "") $ses = $_POST["roomid"];

$query = "SELECT * from chatrooms where id='$roomid' ORDER BY id ASC";
$result = mysql_query ("$query");
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);
$roomname = $row["roomname"];
$roomowner = $row["owner"];

echo "<p class=\"break\">Private Room!</p>
<p class=\"breakforum\" style=\"text-align: center;\">
<b><i>A password is required for this room, please enter it below!</i></b></p>
<p class=\"break\"><b>$roomname<br/>
<small>(Owner: $roomowner)</small></b></p>";


if ($err != "") $err = "<i>$err</i><br/>";


echo "<form action=\"./enter.php\" class=\"breakforum\" style=\"text-align: center;\" method=\"get\">
<fieldset>
<b>Enter Password</b><br/>$err
<input type=\"text\" name=\"chatpass\" maxlength=\"40\"/><br/>
<input type=\"submit\" value=\"enter room!\"/>
<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
<input type=\"hidden\" name=\"roomid\" value=\"$roomid\"/>
</fieldset></form>";




echo "<p class=\"break\"><a href=\"./index.php?ses=$ses\">chat menu</a><br/>
<a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
?>
