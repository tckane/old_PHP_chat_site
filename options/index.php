<?php




include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/main.php');

$posts=$row_ses["posts"];
$group = $row_ses["userlevel"];
$banstatus=$row_ses["ban_status"];
$banwhy=$row_ses["ban_why"];
$banby=$row_ses["ban_by"];

$login=$row_ses["username"];
$owner=$row_ses["owner"];
$trust=$row_ses["circle_of_trust"];
$quiz=$row_ses["quiz_admin"];
$chatties=$row_ses["chatinvites"];
$login = strtolower("$login");

$fart_query = "UPDATE forum_users set lastactive=now() where username='$login'";
mysql_query($fart_query);
$query = "UPDATE friends set lastactive=now() where friendname='$login'";
mysql_query($query);






/////////////////////////////

$msg = stripslashes($_GET["msg"]);
if ($msg != "") $msg = "<br/><i>$msg</i>";


if ($bwmode == "off") $subtite = "<img align=\"middle\" src=\"../scripts/phoenix.php?string=options&amp;login=$login\" alt=\"Options\"/>";
else $subtite = "<b><big>Options</big></b>";


echo "<p class=\"break\">$subtite$inboxes$msg</p>";


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



//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////




$query = "select profile_access, sex, age, profilevisits, relationship, flag from forum_users where username='$login'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$vizzy = $row["profile_access"];
$vage = $row["age"];
$dage = getage("$vage");
$vsex = $row["sex"];
$vrel = $row["relationship"];
$visitay = $row["profilevisits"];
$dflag = $row["flag"];

$query = "SELECT count(*) from ignorance where login='$login'";
$result = mysql_query ("$query");
$row = mysql_fetch_array($result);
$ignorro = $row[0];

if ($ignorro == 1) $iglet = "one ignored user";
elseif ($ignorro > 1) $iglet = "$ignorro ignored users";
elseif ($ignorro < 1) $iglet = "no ignored users";

$query = "select mymail, inbox, tmax, myfriends, fontsize, gallery, poppers from forum_users where username='$login'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$gall = $row["gallery"];
$uma = $row["mymail"];
$box = $row["inbox"];
$tmax = $row["tmax"];
$mfriends = $row["myfriends"];
$tbig = $row["fontsize"];

$popperc = $row["poppers"];

if ($popperc == "yes") $pop = "allowing all";
if ($popperc == "no") $pop = "blocking all";
if ($popperc == "bud") $pop = "friends only";


if ($uma == "on") $msa = "no filter";
if ($uma == "off") $msa = "mailbox off";
if ($uma == "bud") $msa = "friends only";
if ($box == "1") $box = "on";
if ($box == "0") $box = "off";
if ($gall == "yes") $gall = "included";
if ($gall == "no") $gall = "excluded";
if ($mfriends == "on") $mfriends = "accepting";
if ($mfriends == "off") $mfriends = "ignoring";


$query = "select signup, chat, cuntus from welcome where id='1'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$intern = $row["cuntus"];
$signer = $row["signup"];
$chatty = $row["chat"];

if ($signer == "val") $signer = "email validation";
elseif ($signer == "off") $signer = "signup closed";
else $signer = "signup open";

if ($chatty == "on") $chatter = "chat open";
else $chatter = "chat closed";

$query = "SELECT count(*) from my_links where valid='no'";
$result = mysql_query ("$query");
$row = mysql_fetch_array($result);
$invallo = $row[0];

$query = "SELECT * FROM bannerads";
$result = mysql_query("$query");
$numrowsu = mysql_num_rows($result);



echo "<p class=\"break\" style=\"text-align: left;\"><img src=\"../images/options/listview/profile.gif\" align=\"middle\"/> <big><b>Profile Settings</b></big></p>";


$vage = str_replace("-","&#47;","$vage");


echo "<p class=\"breakforum\"><b><a href=\"./options.php?ses=$ses&amp;act=access\">Access</a></b> <small>[<b>$vizzy</b>]</small><br/>
&nbsp;&nbsp;<small><i>change who can access your profile.</i></small></p>";

echo "<p class=\"breakforum\"><b><a href=\"./options.php?ses=$ses&amp;act=chunks\">Content Chunks</a></b><br/>
&nbsp;&nbsp;<small><i>enable &amp; disable content such as photos or comments.</i></small></p>";

echo "<p class=\"breakforum\"><b><a href=\"./options.php?ses=$ses&amp;act=details\">My Details</a></b><br/>
&nbsp;&nbsp;<small><i>manage details such as your password, name or hometown.</i></small></p>";

echo "<p class=\"breakforum\"><b><a href=\"./options.php?ses=$ses&amp;act=gender\">My Gender</a></b> <small>[<b>$vsex</b>]</small><br/>
&nbsp;&nbsp;<small><i>are you male or female?</i></small></p>";

echo "<p class=\"breakforum\"><b><a href=\"./options.php?ses=$ses&amp;act=partnership\">Relationship</a></b> <small>[<b>$vrel</b>]</small><br/>
&nbsp;&nbsp;<small><i>single or attached?</i></small></p>";

echo "<p class=\"breakforum\"><b><a href=\"./options.php?ses=$ses&amp;act=dateofbirth\">Date Of Birth</a></b> <small>[<b>$dage ($vage)</b>]</small><br/>
&nbsp;&nbsp;<small><i>how old are you?</i></small></p>";

echo "<p class=\"breakforum\"><b><a href=\"../userlocation/flags/files.php?ses=$ses&amp;user=$login\">My Country Flag</a></b> <small><b><img align=\"middle\" src=\"../userlocation/flags/$dflag.gif\"/></b></small><br/>
&nbsp;&nbsp;<small><i>your country flag appears on your ID Card</i></small></p>";


echo "<p class=\"breakforum\" style=\"text-align: center;\"><small><i>All done?<br/>Why not <a href=\"../profile.php?ses=$ses&amp;user=$login\">check it out</a> to see if it looks ok.<br/>
Your profile URL is<br/><a href=\"../profile.php?ses=$ses&amp;user=$login\">http://phoenixbytes.co.uk/$login</a></i></small></p>";


/////////////////////////////////////////////////////////

echo "<p class=\"break\" style=\"text-align: left;\"><img src=\"../images/options/listview/settings.gif\" align=\"middle\"/> <big><b>Account Settings</b></big></p>";


if ( $group < 4 )
{ 
echo "<p class=\"breakforum\"><b><a href=\"./options.php?ses=$ses&amp;act=mailboxoff\">Mail Filter</a></b> <small>[<b>$msa</b>]</small><br/>
&nbsp;&nbsp;<small><i>decide who you want to accept mail messages from.</i></small></p>";

echo "<p class=\"breakforum\"><b><a href=\"./options.php?ses=$ses&amp;act=inbox\">Mail Notification</a></b> <small>[<b>$box</b>]</small><br/>
&nbsp;&nbsp;<small><i>turn page title mail notifications on or off</i></small></p>";
}

echo "<p class=\"breakforum\"><b><a href=\"./options.php?ses=$ses&amp;act=imax\">Max Items Per Page</a></b> <small>[<b>$tmax</b>]</small><br/>
&nbsp;&nbsp;<small><i>choose how many items to display per page in message boards, search results etc</i></small></p>";

echo "<p class=\"breakforum\"><b><a href=\"./options.php?ses=$ses&amp;act=matesoff\">Friends Requests</a></b> <small>[<b>$mfriends</b>]</small><br/>
&nbsp;&nbsp;<small><i>allow users to add you as a friend, or not?</i></small></p>";

echo "<p class=\"breakforum\"><b><a href=\"./options.php?ses=$ses&amp;act=twat\">Ignored Users</a></b> <small>[<b>$iglet</b>]</small><br/>
&nbsp;&nbsp;<small><i>manage your ignore list</i></small></p>";

echo "<p class=\"breakforum\"><b><a href=\"./options.php?ses=$ses&amp;act=poppers\">Pop Msgs</a></b> <small>[<b>$pop</b>]</small><br/>
&nbsp;&nbsp;<small><i>accept or ignore pop messages</i></small></p>";

if ($autorefresh == 2147483647) $autorefreshow = "off";
else $autorefreshow = "$autorefresh seconds";

echo "<p class=\"breakforum\"><b><a href=\"./options.php?ses=$ses&amp;act=autorefresh\">Auto Refresh</a></b> <small>[<b>$autorefreshow</b>]</small><br/>
&nbsp;&nbsp;<small><i>alter or disable the automatic refresh function</i></small></p>";

echo "<p class=\"breakforum\"><b><a href=\"./options.php?ses=$ses&amp;act=chatlines\">Chat Lines</a></b> <small>[<b>$chatlines messages</b>]</small><br/>
&nbsp;&nbsp;<small><i>maximum amount of messages to show in chat</i></small></p>";

if ($chatties == "on") $msg = "accepting invites";
if ($chatties == "off") $msg = "accepting none";
if ($chatties == "bud") $msg = "friends only";

echo "<p class=\"breakforum\"><b><a href=\"./options.php?ses=$ses&amp;act=chatinvites\">Chat Invites</a></b> <small>[<b>$msg</b>]</small><br/>
&nbsp;&nbsp;<small><i>choose whether to accept incoming chat invites or not</i></small></p>";

/////////////////////////////////////////////////////////


echo "<p class=\"break\" style=\"text-align: left;\"><img src=\"../images/options/listview/display.gif\" align=\"middle\"/> <big><b>Display Settings</b></big></p>";

// after xmas

echo "<p class=\"breakforum\"><b><a href=\"./options.php?ses=$ses&amp;act=applytheme\">Change Theme</a></b><br/>
&nbsp;&nbsp;<small><i>change the colour scheme of the site</i></small></p>";

echo "<p class=\"breakforum\"><b><a href=\"./options.php?ses=$ses&amp;act=fontsize\">Text Size</a></b> <small>[<b>$tbig</b>]</small><br/>
&nbsp;&nbsp;<small><i>increase or decrease the size of screen fonts</i></small></p>";




if ($group == 1)
{

echo "<p class=\"break\" style=\"text-align: left;\"><img src=\"../images/options/listview/admin.gif\" align=\"middle\"/> <big><b>Administration</b></big></p>";



echo "<p class=\"breakforum\"><b><a href=\"./options.php?ses=$ses&amp;act=bannedlister\">Banned Users</a></b><br/>";
echo "<b><a href=\"../images/sicn/index.php?ses=$ses\">Add Site Icons</a></b><br/>";
echo "<b><a href=\"../images/sicn/list.php?ses=$ses\">Delete Site Icons</a></b><br/>";
echo "<b><a href=\"./options.php?ses=$ses&amp;act=adbomb\">Mail All Members</a></b><br/>";
echo "<b><a href=\"./search.php?ses=$ses\">Members List</a></b><br/>";
echo "<b><a href=\"./options.php?ses=$ses&amp;act=open2\">Front Page Message</a></b></p>";



if ($owner == "yes")
{


echo "<p class=\"break\" style=\"text-align: left;\"><img src=\"../images/options/listview/owner.gif\" align=\"middle\"/> <big><b>Higher Administration</b></big></p>";



echo "<p class=\"breakforum\">";

echo "<b><a href=\"./options.php?ses=$ses&amp;act=adonoff\">Signup</a></b> <small>[<b>$signer</b>]</small><br/>";
echo "<b><a href=\"./options.php?ses=$ses&amp;act=adintervality\">Interval</a></b> <small>[<b>$intern minutes</b>]</small><br/>";
echo "<b><a href=\"./options.php?ses=$ses&amp;act=superdele\">Delete Users</a></b><br/>";
echo "<b><a href=\"./options.php?ses=$ses&amp;act=changeusername\">Change A Username</a></b><br/>";
echo "<b><a href=\"./options.php?ses=$ses&amp;act=adaddcategory\">Add Forum Categories</a></b><br/>";
echo "<b><a href=\"./options.php?ses=$ses&amp;act=adelcategory\">Delete Forum Categories</a></b><br/>";
echo "<b><a href=\"./options.php?ses=$ses&amp;act=adaddforum\">Add Forums</a></b><br/>";
echo "<b><a href=\"./options.php?ses=$ses&amp;act=adeditforums\">Edit Forums</a></b><br/>";
echo "<b><a href=\"./options.php?ses=$ses&amp;act=adelforums\">Delete Forums</a></b><br/>";
echo "<b><a href=\"./options.php?ses=$ses&amp;act=membertitles\">Add Member Titles</a></b><br/>";
echo "<b><a href=\"./options.php?ses=$ses&amp;act=adtitledel\">Delete Member Titles</a></b><br/>";



if ($login == "$PHNAME")
{


echo "<b><a href=\"./options.php?ses=$ses&amp;act=sitename\">Site Title</a></b> <small>[<b>$sitename</b>]</small><br/>";
echo "<b><a href=\"./options.php?ses=$ses&amp;act=ownershit\">Higher Admin Assignment</a></b><br/>";
echo "<b><a href=\"../links/zadmin8.php?act=admin8ptswonkytowelsupport&amp;ses=$ses\">Directory Admin</a></b> <small>[<b>waiting: $invallo</b>]</small><br/>";
echo "<b><a href=\"../banners/index.php?ses=$ses&amp;act=admin8pts\">Banners Admin</a></b> <small>[<b>total: $numrowsu</b>]</small><br/>";
echo "<b><a href=\"./options.php?ses=$ses&amp;act=addshortcut\">Add Shortcuts</a></b><br/>";
echo "<b><a href=\"./options.php?ses=$ses&amp;act=delshortcut\">Delete Shortcuts</a></b><br/>";
echo "<b><a href=\"./options.php?ses=$ses&amp;act=shipslog\">Site Logbook</a></b><br/>";
echo "<b><a href=\"./options.php?ses=$ses&amp;act=moofmailer\">Moof Mailer</a></b><br/>";
echo "<b><a href=\"./insert.php?ses=$ses&amp;act=repairdb\">Repair Database</a></b><br/>";
echo "<b><a href=\"./insert.php?ses=$ses&amp;act=optimizedb\">Optimize Database</a></b><br/>";
echo "<b><a href=\"./options.php?ses=$ses&amp;act=zippit\">Backup Database</a></b><br/>";
//echo "<b><a href=\"./insert.php?act=bang&amp;ses=$ses\">BANG</a></b>";

}


echo"</p>";
}
}





echo "<p class=\"break\">$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";




?>



