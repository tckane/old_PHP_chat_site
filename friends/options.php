<?php






include('../scripts/session.php');
include('../scripts/config.php');
include('../scripts/functions.php');

$login = $row_ses["username"];
$password = $row_ses["password"];
$pmax = $row_ses["pmax"];
$tmax = $row_ses["tmax"];
$group = $row_ses["userlevel"];
$backg = $row_ses["bg_col"];
$myco = $row_ses["my_color"];


if ($act=="add")

   	{
    	echo "<p class=\"break\">
	<b>add a friend</b>$inboxes<br/>
	$breaker</p><hr/>
	<form style=\"text-align: center;\" class=\"breakforum\" action=\"./insert.php?ses=$ses&amp;act=add\" method=\"post\">
	<fieldset>
	Once your friend has accepted your requests they will appear on your list.<br/>Don't know their name? <a href=\"../search.php?ses=$ses\">Find Friends</a>!<br/>
	<b>username:</b><br/>
    	<input type=\"text\" class=\"textbox\" name=\"friend\" value=\"$adduser\"  maxlength=\"14\" /><br/>";


    	echo "<input type=\"submit\" value=\"add friend\" class=\"buttstyle\" />
	</fieldset>
    	</form><hr/><p class=\"break\">$breaker";

    	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
	</p></body></html>";
    	exit;
   	}

if ($act=="decide")

   	{

		$query = "SELECT mystatus, avatar from forum_users where username='$name'";
		$resultcunt = mysql_query("$query");
		$num_rowscunt = mysql_num_rows ($resultcunt);
		$row = mysql_fetch_array($resultcunt);
		$myst = $row["mystatus"];
		$avvy = $row["avatar"];



    	echo "<p  class=\"break\">
    	<b>$name's request</b>$inboxes</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">

	<img src=\"../imgstor/imgcard.php?user=$name\" alt=\"$name\"/><br/>
	



	<b>$hyfor <a href=\"./insert.php?act=accept&amp;ses=$ses&amp;name=$name&amp;budid=$budid\">accept?</a>
	<br/>$hyback <a href=\"./insert.php?act=decline&amp;ses=$ses&amp;name=$name&amp;budid=$budid\">decline?</a>
	<br/><a href=\"../profile.php?ses=$ses&amp;user=$name&amp;ref=buds\">view profile first?</a></b>
	</p>

	<hr/><p class=\"break\">$hyback <a href=\"./index.php?ses=$ses\">online friends</a>
	<br/>$hyback <a href=\"./offline.php?ses=$ses\">view all friends</a>
	<br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></body></html>";
    	exit;
   	}


#==================================



if ($act=="del")

   	{
    	echo "<p  class=\"break\">
    	<b>delete all friends</b>$inboxes$breaker</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">";
    	echo "are you sure you wish to delete everyone from your list?<br/>
	this will also remove you from everyone else's lists.
	<br/>$hyfor <a href=\"./insert.php?act=delall&amp;ses=$ses\">yes?</a>
	<br/>$hyback <a href=\"./index.php?ses=$ses\">no?</a>
	</p><hr/><p align=\"center\" class=\"break\">$breaker$hyback <a href=\"./index.php?ses=$ses\">online friends</a>
	<br/>$hyback <a href=\"./offline.php?ses=$ses\">view all friends</a>
	<br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></body></html>";

 	exit;
}



#====================================================

if ($act=="delete")

   	{
	echo "<p  class=\"break\">";

$str = "$name";
$str = strtolower($str);

    	echo "<b>delete a friend</b>$inboxes$breaker</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	are you sure you wish to delete $str?
	<br/>$hyfor <a href=\"./insert.php?act=delete&amp;ses=$ses&amp;name=$name&amp;budid=$budid\">yes</a>
	<br/>$hyback <a href=\"./index.php?ses=$ses\">no</a>
	</p><hr/><p align=\"center\" class=\"break\">$breaker$hyback <a href=\"./index.php?ses=$ses\">online friends</a>
	<br/>$hyback <a href=\"./offline.php?ses=$ses\">view all friends</a>
	<br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></body></html>";
    	exit;
   	}


#=======================================================================================



if ($act=="view")

   	{


	$query = "select * from friends where id='$id'";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);

	$user = $row["friendname"];
	$location = $row["location"];
	$last = nicetime($row["lastactive"]);
	$priv = $row["privatealbums"];







	$queryx = "SELECT poppers from forum_users where username='$user'";
	$resultcunt = mysql_query("$queryx");
	$rowx = mysql_fetch_array($resultcunt);
	$poppers = $rowx["poppers"];

if ($bwmode == "off") $subtite = "<img src=\"../scripts/phoenix.php?string=$user&amp;login=$login\" alt=\"$user\" />";
else $subtite = "<b><big>$user</big></b>";


if ($poppers == "yes" || $poppers == "bud")
{
$poplink = "<a href=\"../mail/index.php?ses=$ses&amp;act=newpop&amp;sendto=$user\">send pop message</a><br/>";
}


    	echo "<p  class=\"break\">
    	$subtite$inboxes$breaker</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	<b><big>$user's was last seen $location $last</big></b></p><p class=\"breakforum\" style=\"text-align: center;\">
	<b><big>friend options</big></b><br/><img src=\"../imgstor/imgcard.php?user=$user\" alt=\"$user\"/><br/>";




	echo "<b>$poplink<a href=\"../profile.php?ses=$ses&amp;user=$user&amp;ref=buds\">view $user's profile?</a>";
	if ($group <= 3) echo "<br/><a href=\"../mail/index.php?ses=$ses&amp;senduser=$user#bottom\">mail $user?</a>";

	$query = "select * from phoenix_imagealbums where login='$login' AND availability='private'";
	$result = mysql_query($query);
	$nus = mysql_num_rows($result);
	if ($nus > 0)
	{

	if ($priv == "no")
		{
		echo "<br/><a href=\"./insert.php?ses=$ses&amp;friend=$user&amp;act=myprivate\">give access to private albums?</a>";
		}
		else
		{
		echo "<br/><a href=\"./insert.php?ses=$ses&amp;friend=$user&amp;act=noprivate\">remove access to private albums?</a>";
		}

	}


	echo "<br/>
	<a href=\"./options.php?ses=$ses&amp;act=delete&amp;name=$user&amp;budid=$id\">delete $user?</a></b></p><hr/><p align=\"center\" class=\"break\">$breaker$hyback <a href=\"./index.php?ses=$ses\">online friends</a>
	<br/>$hyback <a href=\"./offline.php?ses=$ses\">view all friends</a>
	<br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></body></html>";
    	exit;
   	}




#======================================================================================




if ($act=="presetuser")

   	{
    	echo "<p  class=\"break\">
    	<b>add a friend</b>$inboxes$breaker</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
    	<b>Send friend request to $adduser?</b><br/><br/>";
    	echo "$hyfor <a href=\"./insert.php?ses=$ses&amp;act=add&amp;friend=$adduser\">yes</a>
	<br/>$hyback <a href=\"./index.php?ses=$ses\">no</a>
	</p><hr/><p align=\"center\" class=\"break\">$breaker$hyback <a href=\"./index.php?ses=$ses\">online friends</a>
	<br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></body></html>";
    	exit;
   	}


?>