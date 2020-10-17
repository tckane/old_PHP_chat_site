<?php

include('../scripts/ses.php');
include('../scripts/main.php');
include('../scripts/cleaner.php');

$login = $row_ses["username"];
$backg = $row_ses["bg_col"];
$myco = $row_ses["my_color"];


$stringy = clean($_GET['stringy']);
$by = clean($_GET['by']);
if ($by == "") $by = "newest";




if ($group < 3)
{


$subtite = "<img align=\"middle\" src=\"../scripts/phoenix.php?string=member list&amp;login=$login\" alt=\"members\"/>";

echo "<p class=\"break\">$subtite$inboxes</p>";








if ($by != "")
{


if (empty($page) || ($page < 1)) $page = 1; $max = $tmax;  $start = ($page-1) * $max;






if ($by == "newest") 
{
$searchy = "ORDER BY joindate DESC LIMIT $start, $max";

}
if ($by == "lastactive") 
{
$searchy = "ORDER BY lastactive DESC LIMIT $start, $max";
}
if ($by == "alpha") 
{
$searchy = "ORDER BY username ASC LIMIT $start, $max";
}
if ($by == "inval")
{ 
$searchy = "where valid='no' ORDER BY username ASC LIMIT $start, $max";
$county = "where valid='no'";
}
if ($by == "novis") 
{
$searchy = "where visits='0' ORDER BY username ASC LIMIT $start, $max";
$county = "where visits='0'";
}

$query = "SELECT count(*) from forum_users where visits='0'";
$result =mysql_query($query);
$row2 =mysql_fetch_array($result);
$novis = $row2[0];

$query = "SELECT count(*) from forum_users where valid='no'";
$result =mysql_query($query);
$row2 =mysql_fetch_array($result);
$noval = $row2[0];

$query = "SELECT count(*) from forum_users $county";
$result =mysql_query($query);
$row2 =mysql_fetch_array($result);
$count = $row2[0];


echo "<p class=\"breakforum\" style=\"text-align: center; font-weight: bold;\">";


echo "We currently have $count members, $noval of these have yet to activate their accounts and $novis of our users have never logged on.";



echo "</p>";






echo "<p class=\"breakforum\" style=\"text-align: center; font-weight: bold;\">";

if ($by == "alpha") echo "[<a href=\"./search.php?by=newest&ses=$ses\">Newest First</a>][A to Z][<a href=\"./search.php?by=lastactive&ses=$ses\">Last Active</a>][<a href=\"./search.php?by=inval&ses=$ses\">Not Valid</a>][<a href=\"./search.php?by=novis&ses=$ses\">Zero Visits</a>]";

if ($by == "newest") echo "[Newest First][<a href=\"./search.php?by=alpha&ses=$ses\">A to Z</a>][<a href=\"./search.php?by=lastactive&ses=$ses\">Last Active</a>][<a href=\"./search.php?by=inval&ses=$ses\">Not Valid</a>][<a href=\"./search.php?by=novis&ses=$ses\">Zero Visits</a>]";

if ($by == "lastactive") echo "[<a href=\"./search.php?by=newest&ses=$ses\">Newest First</a>][<a href=\"./search.php?by=alpha&ses=$ses\">A to Z</a>][Last Active][<a href=\"./search.php?by=inval&ses=$ses\">Not Valid</a>][<a href=\"./search.php?by=novis&ses=$ses\">Zero Visits</a>]";

if ($by == "inval") echo "[<a href=\"./search.php?by=newest&ses=$ses\">Newest First</a>][<a href=\"./search.php?by=alpha&ses=$ses\">A to Z</a>][<a href=\"./search.php?by=lastactive&ses=$ses\">Last Active</a>][Not Valid][<a href=\"./search.php?by=novis&ses=$ses\">Zero Visits</a>]";

if ($by == "novis") echo "[<a href=\"./search.php?by=newest&ses=$ses\">Newest First</a>][<a href=\"./search.php?by=alpha&ses=$ses\">A to Z</a>][<a href=\"./search.php?by=lastactive&ses=$ses\">Last Active</a>][<a href=\"./search.php?by=inval&ses=$ses\">Not Valid</a>][Zero Visits]";





echo "</p>";



if ($by == "inval") $count = "$noval";


$query = "SELECT * from forum_users $searchy";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);



if ($count == 1) $rez = "$count result";
elseif ($count < 1) $rez = "no results";
else $rez = "$count results";



		if ($count > $max) 
		{
		echo  "<p class=\"breakforum\" style=\"text-align: center;\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $max);
		}

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"./search.php?ses=$ses&amp;by=$by&amp;stringy=$stringy&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}



if ($count == 0) echo "<p class=\"breakforum\" style=\"text-align: center;\">No members match the specified criteria.</p>";



while ($row)
      	{
       	$name = $row["username"];
	$gro = $row["userlevel"];
	$banstatus = $row["ban_status"];
	$banby = $row["ban_by"];
	$pips = $row["opip"];
	$subbage = $row["subno"];
	$agent = $row["agent"];
	$lastactive = nicetime($row["lastactive"]);

	$viss = $row["visits"];
	$valida = $row["valid"];

	$email = $row["email"];


if ($banstatus == 1) $band = "Banned";
if ($banstatus == 0) $band = "Not Banned";

if ($banstatus == 1) $banby = "<br/>Banned By: $banby";
else  $banby = "";


$bannage = "$band$banby";



       	echo "<p class=\"breakforum\"><b><big><a href=\"../profile.php?ses=$ses&amp;user=$name&amp;f=onl\">$name</a></big></b><br/>
	Last Active: $lastactive<br/>
	Visits: $viss<br/>
	Activated: $valida<br/>
	Ban Status: $bannage<br/>
	Device: $agent<br/>
	IP: $pips<br/>
	IPv6: $subbage<br/>
	Email: $email
	</p>";
			


       	$row = mysql_fetch_array($result);
      	}


		if ($count > $max) 
		{
		echo  "<p class=\"breakforum\" style=\"text-align: center;\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $max);
		}

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"./search.php?ses=$ses&amp;by=$by&amp;stringy=$stringy&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}



}


}
else
{


echo "<p class=\"breakforum\" style=\"text-align: center; font-weight: bold;\">You cannot be here. leave.</p>";


}


echo "<p class=\"break\">$hyback <a href=\"./index.php?ses=$ses\">back to options</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";

      echo "$shortcuts</p></body></html>";




?>
