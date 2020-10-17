<?php


$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];

if ($ses != "")
{
include("../scripts/ses.php");
}


include('../scripts/header.php');
include('../scripts/config.php');
include('../scripts/functions.php');
include('../scripts/main.php');





$login = $row_ses["username"];
$group = $row_ses["userlevel"];
$bco = $row_ses["bg_col"];
$nam = $row_ses["my_color"];


if ($user == "") $user = "$login";


if ($user == "$login") 
{
$bloop = "own";
$their = "Your";
}
else
{
$bloop = "$user&#39;s";
$their = "$user&#39;s";
}


if ($err != "") $err = "<br/><small><b>$err</b></small>";



$act_query = "UPDATE forum_users set lastactive=now(), location='reading $bloop blog' where username='$login'";
mysql_query($act_query);

$act_query = "UPDATE friends set lastactive=now(), location='reading $bloop blog' where friendname='$login'";
mysql_query($act_query);



if ($user == "$login")
{
$helplink = "<br/><small><a href=\"./viewer.php?ses=$ses&amp;act=about\">blog help</a></small>";
}



$query = "SELECT count(*) from my_blog where login='$user'";
$result =mysql_query($query);
$row2 =mysql_fetch_array($result);
$count = $row2[0];

if ($count == 1) $blogs = "<table class=\"breakforum\" width=\"100%\"><tr><td align=\"center\"><b><big>$their blog has one entry.</big></b></td></tr></table>";
elseif ($count > 1) $blogs = "<table class=\"breakforum\" width=\"100%\"><tr><td align=\"center\"><b><big>$their blog has $count entries.</big></b></td></tr></table>";
else $blogs = "<table class=\"breakforum\" width=\"100%\"><tr><td align=\"center\"><b><big>$their blog has no entries.</big></b></td></tr></table>";







if (empty($page) || ($page < 1)) $page = 1; $max = $tmax;  $start = ($page-1) * $max;


if ($bwmode == "off")
{
$tresk = urlencode("$user's blog");
$subtite = "<img src=\"../scripts/phoenix.php?login=$login&amp;string=$tresk\" alt=\"$user's blog\"/>";
}
else
{
$subtite = "<b><big>$user's blog</big></b>";
}


echo "<p class=\"break\">$subtite$err$inboxes$helplink</p><hr/>";


if ($ses != "")
{

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

}



echo "$blogs";

if ($count > 0)

{





	$query = "select * from my_blog where login='$user' ORDER BY id DESC LIMIT $start, $max";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);




		if ($count > $max) 
		{
		echo  "<p class=\"breakforum\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $max);
		}

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"./index.php?ses=$ses&amp;user=$user&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}



	while ($row)
		{
   		$id = $row["id"];
		$updated = $row["date"];
 		$title = $row["title"];
 		$col = $row["my_color"];
		$title = make_wml_compat($title);
		if ($title == "") $title = "no title";
if ($col == "$bco") $nco = "$nam";
else $nco = "$col";


$queryblox = "select * from phoenix_comments where blogid='$id'";
$resultblox = mysql_query($queryblox);
$bloggiecomments = mysql_num_rows($resultblox);



if ($bloggiecomments  > 0)
{
$blogcom = "<br/><img src=\"../images/mainmenu/listview/speech_bubble_text.gif\" alt=\" comments \"/> $bloggiecomments</b>";
}
else
{
$blogcom = "";
}



     echo "<p class=\"breakforum\"><big>&#8226; <b><a href=\"./viewer.php?id=$id&ses=$ses&amp;user=$user\">$title</a></b> &#172;</big><br/><i>$updated$blogcom</i></p>";



           		$row = mysql_fetch_array($result);
           		}



		if ($count > $max) 
		{
		echo  "<p class=\"breakforum\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $max);
		}

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"./index.php?ses=$ses&amp;user=$user&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}




echo "<hr/>"; 

}




if ($ses != "")
{
$mainmenu = "$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";
}
else
{
$mainmenu = "$hyback <a href=\"../index.php\">main menu</a>";
}




echo "<p class=\"break\">";

if ($user == "$login")
   {
    echo "$hyfor <a href=\"./add.php?ses=$ses&amp;act=add&amp;user=$user\">insert new entry</a><br/>";
   }
else
   {
if ($ses != "") echo "$hyfor <a href=\"./index.php?ses=$ses&amp;act=blogs&amp;user=$login\">my blog</a><br/>";
    }
echo "$mainmenu






$atblog</p></body></html>";

?>
