<?php



$ses = $_GET["ses"];


if ($ses != "")
{
include('./scripts/ses.php');
}
include('./scripts/header.php');
include('./scripts/config.php');
include('./scripts/functions.php');
include('./scripts/main.php');




echo "<p class=\"break\" style=\"text-align: center;\"><big><b>Free Advertising Area</b></big></p>



<p class=\"breakforum\" style=\"text-align: center;\">
$hyl <b><big><a href=\"./links/info.php\">Wap Site Directory</a></big></b> $hyl<br/>
$hyl <b><big><a href=\"./banners/index.php\">Banner Exchange Program</a></big></b> $hyl</p>";

echo "<form class=\"breakforum\" style=\"text-align: center;\" action=\"./links/dosearch.php?ses=$ses\" method=\"get\">
<fieldset><span style=\"font-weight: bold; text-decoration: underline;\"><b><big>Search $sitename</big></b></span><br/>
<input type=\"text\" class=\"textbox\" name=\"stringy\" title=\"search string\"  maxlength=\"70\"/><br/>
<input type=\"submit\" value=\"search\" class=\"buttstyle\" size=\"30\"/>
<input type=\"hidden\" name=\"rpp\" value=\"20\"/>
<input type=\"hidden\" name=\"rt\" value=\"full\"/>
</fieldset>
</form>";




echo "<p class=\"break\" style=\"text-align: center;\">";

echo "<big><span style=\"font-weight: bold; text-decoration: underline;\">Top 10 Sites</span></big></p>";





echo "<table style=\"text-align: center; width: 100%;\"><tr>";




$all = 1;

// SQL Query  
$sql = mysql_query("select * from my_links where valid='yes' ORDER BY clicks DESC LIMIT 10");  
$alternate = "2"; // number of alternating rows  
while ($row = mysql_fetch_array($sql)) {  
$linktext = $row["linktext"];
$sid = $row["id"];
$clicks = $row["clicks"];
$desc = $row["comment"];



$comment = add_sicn($comment);
$comment = funk_it_up($comment);

if ($alternate == "1") {  

$mcolour = "$namecolour";
$xcolour = "$bottomright";
$alternate = "2";
}
else {
$mcolour = "$bottomright";
$xcolour = "$namecolour";
$alternate = "1";
}


if ($all == 1)
{
$widdle = "33%";
$tree = "";
}
elseif ($all == 2)
{
$widdle = "33%";
$tree = "";
}
elseif ($all == 3)
{
$widdle = "33%";
$tree = "</tr><tr>";
}
elseif ($all == 4)
{
$widdle = "33%";
$tree = "";
}
elseif ($all == 5)
{
$widdle = "33%";
$tree = "";
}
elseif ($all == 6)
{
$widdle = "33%";
$tree = "</tr><tr>";
}
elseif ($all == 7)
{
$widdle = "33%";
$tree = "";
}
elseif ($all == 8) 
{
$widdle = "33%";
$tree = "";
}
elseif ($all == 9) 
{
$widdle = "33%";







$tree = "</tr></table><table style=\"text-align: center; width: 100%; vertical-align: top; padding: 0px;\"><tr style=\"text-align: center; vertical-align: top; padding: 0px;\"><td class=\"break\" style=\"width: 33%; vertical-align: middle; text-align: center;\">

<b><a href=\"./links/index.php\">View More!</a></b></td>";

}
else
{
$beef = "<td class=\"break\" style=\"width: 33%; vertical-align: middle; text-align: center;\"><b><a href=\"./links/info.php\">Join Them!</a></b></td>";
$tree = "</tr>";
}




$numschtik = "";

$linktext = strtolower("$linktext");


if ($all > 9) $bjk = "0";
else $bjk = "$all";

print ("<td class=\"breakforum\" style=\"width: $widdle; vertical-align: top; text-align: center; padding: 0px;\"><a accesskey=\"$bjk\" href=\"./links/leave.php?sid=$sid&type=site\"><img style=\"border: none;\" src=\"./images/counter/quicklinks.php?site=$sid&number=$all\"/></a>$beef$tree");  

$all++;

}  

echo "</table><hr/>";




//////////////////////////////////////////////////
//////////////////////////////////////////////////


$query = "SELECT * FROM bannerads ORDER BY incoming DESC limit 10";
$result = mysql_query("$query");
$num_rowsu = mysql_num_rows($result);
$details = mysql_fetch_array($result);


echo "<p class=\"break\" style=\"text-align: center;\">";

echo "<big><span style=\"font-weight: bold; text-decoration: underline;\">Top 10 Banners</span></big></p>";


echo "<table style=\"text-align: center; width: 100%;\"><tr>";


$alternate = "2"; // number of alternating rows 
	while ($details)
	{
	$pid = $details["id"];
	$clicksin = $details["incoming"];

	$url = $details["url"];



if ($alternate == "1") {  


$tr = "</tr><tr>";

$alternate = "2";
}
else {


$tr = "";
$alternate = "1";
}


	echo "<td class=\"breakforum\" style=\"width: 50%; vertical-align: top; text-align: center;\"><a href=\"$url\"><img src=\"./banners/yourbanner.php?bid=$pid\"/></a></td>$tr";

	$details = mysql_fetch_array($result);
	}


echo "</tr></table><p class=\"break\" style=\"text-align: center;\"><b><big><a href=\"./banners/index.php\">Join Them!</a></big></b></p>";


echo "<p class=\"break\">$hyback <a href=\"./index.php\">back</a></b></p></body></html>";
?>