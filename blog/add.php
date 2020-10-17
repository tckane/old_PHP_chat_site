<?php


include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/config.php');
include('../scripts/functions.php');
include('../scripts/main.php');

$login = $row_ses["username"];
$group = $row_ses["userlevel"];

$queryi = "SELECT * from phoenix_icons where typed LIKE '=%' ORDER BY typed ASC";
$resulti = mysql_query($queryi);
$num_rows = mysql_num_rows($resulti);
$rowicons = mysql_fetch_array($resulti);



$enflag = $_GET["enflag"];


if ($act == "add")
	{



$act_query = "UPDATE forum_users set lastactive=now(), location='writing a blog' where username='$login'";
mysql_query($act_query);

$act_query = "UPDATE friends set lastactive=now(), location='writing a blog' where friendname='$login'";
mysql_query($act_query);




if ($enflag != "yes") $enlink = "<br/><small>(<a href=\"./insert.php?ses=$ses&amp;act=enhancenew&amp;id=$id&amp;update=$update\">go advanced</a>)</small>";
else $enlink = "";



echo "<p class=\"break\"><b><big>add blog</big>$enlink</b>$inboxes</p><hr/>";

echo "<form class=\"breakforum\" action=\"insert.php?ses=$ses&amp;user=$user&amp;act=insert\" method=\"post\" enctype=\"multipart/form-data\">";

echo "<fieldset><b>date:</b><br/>
<input name=\"updated\" class=\"textbox\" type=\"text\" maxlength=\"60\" value=\"$msgsandposts\" /><br/>

<b>title:</b><br/>
<input name=\"title\" class=\"textbox\" maxlength=\"70\" type=\"text\" /><br/>

<b>blog:</b><br/>
<textarea name=\"blog\" rows=\"3\" cols=\"20\"></textarea><br/>";


if ($enflag == "yes")
{

echo "<b>icon:</b><br/><select name=\"inserticon\" title=\"insert icon?\" class=\"textbox\">
<option value=\"\">no icon</option>";


while ($rowicons)
      	{
       	$typed = $rowicons["typed"];

	$typedx = str_replace("=","","$typed");
	$typedx = ucfirst("$typedx");


       	echo "<option value=\"$typed\">$typedx</option>";



       	$rowicons = mysql_fetch_array($resulti);
      	}



	echo "</select><br/>";

	$query = "SELECT count(*) from phoenix_imagealbums WHERE login='$login'";
	$result = mysql_query($query);
	$hasalbumcount = number_format(mysql_result($result,0,"count(*)"));


	if ($hasalbumcount > 0)
	{


	echo "<b>attach a photo?</b><small>(gif or jpg)</small><br/>
	<input type=\"file\" name=\"file\"/><br/>";
	}

} //enflag

	echo "<input type=\"submit\" class=\"buttstyle\" value=\"-&gt; insert\"/>
    </fieldset>
    </form><hr/><p class=\"break\">
    $hyback <a href=\"index.php?ses=$ses&amp;user=$user\">cancel</a><br/>
    $hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
exit;

}




////////////////////////////////////////////////////////////////////////////////////////
///// EDIT BLOG
////////////////////////////////////////////////////////////////////////////////////////







if ($act == "sortit")
	{



$act_query = "UPDATE forum_users set lastactive=now(), location='editing a blog' where username='$login'";
mysql_query($act_query);

$act_query = "UPDATE friends set lastactive=now(), location='editing a blog' where friendname='$login'";
mysql_query($act_query);

$query ="SELECT * from my_blog WHERE id=$id and date='$update' and login='$login'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);



if ($enflag != "yes") $enlink = "<br/><small>(<a href=\"./insert.php?ses=$ses&amp;act=enhanceedit&amp;id=$id&amp;update=$update\">go advanced</a>)</small>";
else $enlink = "";




$msg = $row["blog"];
$titles = $row["title"];

    echo "<p class=\"break\"><b><big>edit blog</big>$enlink</b>$inboxes</p><hr/>";

	echo "<form class=\"breakforum\" action=\"insert.php?ses=$ses&amp;act=update&amp;id=$id\" method=\"post\" enctype=\"multipart/form-data\">";

    echo "<fieldset>

<b>title:</b><br/>
    <input name=\"title\" type=\"text\" maxlength=\"2000\" class=\"textbox\" value=\"$titles\" /><br/>


<b>blog:</b><br/>
<textarea name=\"blog\" rows=\"3\" cols=\"30\">$msg</textarea><br/>";


if ($enflag == "yes")
{

echo "<b>icon:</b><br/><select name=\"inserticon\" title=\"insert icon?\" class=\"textbox\">
<option value=\"\">no icon</option>";


while ($rowicons)
      	{
       	$typed = $rowicons["typed"];




       	echo "<option value=\"$typed\">$typed</option>";



       	$rowicons = mysql_fetch_array($resulti);
      	}

	echo "</select><br/>";



	$query = "SELECT count(*) from phoenix_imagealbums WHERE login='$login'";
	$result = mysql_query($query);
	$hasalbumcount = number_format(mysql_result($result,0,"count(*)"));


	if ($hasalbumcount > 0)
	{


	echo "<b>attach a photo?</b><small>(gif or jpg)</small><br/>
	<input type=\"file\" name=\"file\"/><br/>";
	}

} // enflag

echo "<input type=\"submit\" class=\"buttstyle\" value=\"-&gt; insert\"/>
    </fieldset>
    </form><hr/><p class=\"break\">
$hyback <a href=\"index.php?ses=$ses&amp;user=$login\">cancel</a><br/>
$hyback  <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
exit;
}

?>
