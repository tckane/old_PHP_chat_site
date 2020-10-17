<?php


include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/config.php');

$login = $row_ses["username"];
$tmax = $row_ses["tmax"];
$backg = $row_ses["bg_col"];
$myco = $row_ses["my_color"];

$query = "UPDATE forum_users set lastactive=now(), location='friends list' where username='$login'";
mysql_query($query);

$query = "UPDATE friends set lastactive=now(), location='friends list' where friendname='$login'";
mysql_query($query);

$query = "SELECT count(*) from friends where myrequest<1 AND username='$login'";
$result =mysql_query($query);
$row2 =mysql_fetch_array($result);
$count = $row2[0];


if ($count == 1) $friendtot = "you have $count friend";
elseif ($count > 1) $friendtot = "you have $count friends";

if (empty($page) || ($page < 1)) $page = 1; $max = $tmax;  $start = ($page-1) * $max;

echo "<p class=\"break\"><b>$friendtot</b>$inboxes$breaker</p><hr/>";


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



$date = "2009-03-04 17:45";
$result = nicetime($date); // 2 days ago

$query = "select * from friends where myrequest<1 AND username='$login' ORDER BY lastactive DESC LIMIT  $start, $max";
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
		if ($counter != $page) echo "<b><a href=\"./offline.php?ses=$ses&amp;by=$by&amp;stringy=$stringy&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}





	while ($row)
           
		{
		$name = $row["friendname"];
		$lastactive = nicetime($row["lastactive"]);
		$id = $row["id"];
		$col = $row["my_color"];
		$location = $row["location"];





			$queryo = "select avatar, mystatus from forum_users where username='$name'";
			$resulto = mysql_query($queryo);
			$num_rowso = mysql_num_rows($resulto);
			$rowo = mysql_fetch_array($resulto);
				$mymood = $rowo["mystatus"];
				$avvy = $rowo["avatar"];


	if ($avvy == "") $avvy = "<img align=\"middle\" src=\"../images/nopic_tiny.jpg\" alt=\"\"/> ";
	else $avvy = "<img align=\"middle\" src=\"../imgstor/imgtn.php?imid=$avvy&amp;res=25\" alt=\"\"/> ";




if ($mymood != "") $mood = "$mymood";
else $mood = "";

$since = nicetime($lastactive);

$mood = funk_it_up($mood, $ses);
$mood = add_sicn($mood);

		echo "<p class=\"breakforum\">$avvy <b><a href=\"./options.php?ses=$ses&amp;act=view&amp;id=$id\">$name</a></b> $mood<br/><small><b>[last seen $location $lastactive]</b></small></p>";

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
		if ($counter != $page) echo "<b><a href=\"./offline.php?ses=$ses&amp;by=$by&amp;stringy=$stringy&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}





echo "<hr/><p class=\"break\">$breaker$hyback <a href=\"./index.php?ses=$ses\">online friends</a><br/>";

echo "$hyfor <a href=\"./options.php?ses=$ses&amp;act=add\">add friend</a>";

echo "<br/>$hyfor <a href=\"./options.php?ses=$ses&amp;act=del\">delete all friends</a><br/>
$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";
echo "</p></body></html>";








?>