<?php



include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/config.php');
include('../scripts/functions.php');
include('../scripts/main.php');


$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];

# Fetching member info from the session.
$login = $row_ses["username"];
$reload = $row_ses["creload"];
$max = $row_ses["cmax"];
$filter = $row_ses["filter"];
$sicn = $row_ses["sicn"];
$pmsetter = $row_ses["chatpms"];

$query = "SELECT * from chatrooms where owner='$login'";
$result = mysql_query ("$query");
$roomcount = mysql_num_rows($result);
$rope = mysql_fetch_array($result);

$croomname = $rope["roomname"];
$cwelcome = $rope["welcome"];
$cpassword = $rope["password"];
$cid = $rope["id"];
$cicona = $rope["roomicona"];
$ciconb = $rope["roomiconb"];


$query = "UPDATE friends set lastactive=now(), location='editing chat room', room='' where friendname='$login'";
mysql_query($query);


$act_query = "UPDATE forum_users set lastactive=now(), location='editing chat room', room='' where username='$login'";
mysql_query($act_query);



if ($bwmode == "off") $subtite = "<img align=\"middle\" src=\"../scripts/phoenix.php?string=Chat%20Rooms&login=$login\" alt=\"Chat Rooms\" />";
else $subtite = "<b><big>Create Room</big></b>";

echo "<p class=\"break\">$subtite</p>
<p class=\"breakforum\" style=\"text-align: center;\">
<b>Please fill in the form below to create a room!</b></p>";




echo "<form class=\"breakforum\" action=\"./insert.php\" method=\"post\"/>
<fieldset>
<b>Room Name:</b><br/>
<i><small>Please give your room a short, snappy name. you may change this later.</small></i><br/>
<input type=\"text\" name=\"croomname\" maxlength=\"40\" value=\"$croomname\"/><br/>
<b>Welcome Text:</b><br/>
<i><small>Now type a Welcome Message. This is shown below your Room Name on the list, use it to entice people to your room but keep it short.<br/>
You can use BBcode & icons but don't go over the top!</small></i><br/>
<textarea name=\"cwelcome\" rows=\"3\" cols=\"20\">$cwelcome</textarea>
<br/>


<b>Room Password:</b><br/>
<i><small>This will make your room private, you'll see a padlock icon <imgsrc=\"../images/topiclocked.gif\"/> beside it in the menu.<br/>
Users looking for your room with either need an Invite or the Room Name to type it in manually!<br/>
Delete password from the box to disable it and make your room public again.</small></i><br/>
<input type=\"text\" name=\"cpassword\" maxlength=\"40\" value=\"$cpassword\"/><br/>


<input type=\"submit\" value=\"apply changes\"/>
<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
<input type=\"hidden\" name=\"roomid\" value=\"$cid\"/>
<input type=\"hidden\" name=\"act\" value=\"editroom\"/>
</fieldset></form>";

echo "<p class=\"breakforum\" style=\"text-align: center;\">
<i><b>Please note, there is no coming back from a deleted room, clicking Delete My Room will remove your room without confirmation<br/>
<a href=\"./insert.php?ses=$ses&amp;act=delroom\">Delete My Room</a></b></i></p>";
echo "<p class=\"break\"><a href=\"./index.php?ses=$ses\">chat menu</a><br/>
<a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
?>
