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



$act_query = "UPDATE forum_users set lastactive=now(), location='viewing online list' where username='$login'";
mysql_query($act_query);

$query = "UPDATE friends set lastactive=now(), location='viewing online list' where friendname='$login'";
mysql_query($query);





if (empty($page) || ($page < 1)) $page = 1; $max = $tmax;  $start = ($page-1) * $max;


$query = "SELECT count(*) from forum_users WHERE lastactive > DATE_ADD(NOW(), INTERVAL -$interval MINUTE) and location!='offline'";
$result =mysql_query($query);
$row2 =mysql_fetch_array($result);
$count = $row2[0];

$query = "SELECT * from forum_users where lastactive > DATE_ADD(NOW(), INTERVAL -$interval MINUTE) and location!='offline' ORDER BY lastactive DESC LIMIT $start, $max";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);


if ($count == 1) $users = "just you, nobody else...";
elseif ($count == 0) $users = "no users online";
elseif ($count >= 2) $users = "$count users online";





$subtite = "<img src=\"../scripts/phoenix.php?string=$users&amp;login=$login\" alt=\"$users\" />";

echo "<p class=\"break\">
$subtite$inboxes</p><hr/>";


///////////////////////////////////////////////////////////////
////////// shortcut block /////////////////////////////////////////
///////////////////////////////////////////////////////////////
$queryv = "SELECT * FROM shortcuts";
$resultv = mysql_query($queryv);
$rowv = mysql_fetch_array($resultv);

echo "<form class=\"breakforum\" style=\"text-align: center;\" action=\"$lback/shortcuts.php?ses=$ses\" method=\"get\">
<fieldset>
<select name=\"shortcut\">";

while ($rowv)
{

$sid = $rowv["id"];
$sname = $rowv["name"];

echo "<option value=\"$sid\">$sname</option>";

$rowv = mysql_fetch_array($resultv);
}

echo "</select>
<input type=\"submit\" value=\"go there\"/>
<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
</fieldset></form>";
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////




		if ($count > $max) 
		{
		echo  "<p class=\"breakforum\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $max);
		}

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"./online.php?ses=$ses&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}









while ($row)
      	{
       	$name = $row["username"];
	$gro = $row["userlevel"];
	$col = $row["my_color"];
	$posts = $row["posts"];
	$location = $row["location"];
	$mymood = $row["mystatus"];
	$avvy = $row["avatar"];

	$lastactive = nicetime($row["lastactive"]);


if ($mymood != "") $mood = "$mymood";
else $mood = "";

$mood = funk_it_up($mood, $ses);
$mood = add_sicn($mood);



	if ($avvy == "") $avvy = "<img align=\"middle\" src=\"../images/nopic_tiny.jpg\" alt=\"\"/> ";
	else $avvy = "<img align=\"middle\" src=\"../imgstor/imgtn.php?imid=$avvy&amp;res=25\" alt=\"\"/> ";



$ad = "$name";

		$query = "SELECT * FROM friends WHERE username='$login' AND friendname='$name' AND myrequest='0'";
		$resultcunt = mysql_query("$query");
		$num_rowscunt = mysql_num_rows ($resultcunt);

		$queryx = "SELECT * FROM ignorance WHERE ignored='$name' AND login='$login' ";
		$resultx = mysql_query("$queryx");
		$num_rowsx = mysql_num_rows ($resultx);

		$queryy = "SELECT * FROM ignorance WHERE ignored='$login' AND login='$name' ";
		$resulty = mysql_query("$queryy");
		$num_rowsy = mysql_num_rows ($resulty);

		if ($num_rowscunt > 0) $mymate = "[F]";
		else $mymate = "";


		if ($num_rowscunt > 0)
				{
       	echo "<p class=\"breakforum\">$avvy <b><a href=\"../profile.php?ses=$ses&amp;user=$name&amp;f=onl\">$ad</a></b>$mymate $mood<br/><small><b>[last seen $location $lastactive]</b></small></p>";
				}
		elseif ($num_rowsx > 0 | $num_rowsy > 0)
				{
       	echo "<p class=\"textrectmenu\">ignored($ad);</p>";
				}		
		else
				{
       	echo "<p class=\"breakforum\">$avvy <b><a href=\"../profile.php?ses=$ses&amp;user=$name&amp;f=onl\">$ad</a></b> $mood<br/><small><b>[last seen $location $lastactive]</b></small></p>";
				}


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
		if ($counter != $page) echo "<b><a href=\"./online.php?ses=$ses&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}


echo "<hr/>

<p class=\"break\">$hyfor <a href=\"../search.php?ses=$ses\">find users</a><br/>
$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";

      echo "$shortcuts</p></body></html>";







?>
