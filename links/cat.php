<?php

include('../scripts/main.php');


$act = $_GET['act'];
$page = $_GET['page'];
$cat = $_GET['cat'];
$id = $_GET['id'];
$type = $_GET['type'];
$page = $_GET['page'];


if (empty($page) || ($page < 1)) $page = 1; $max = 10;  $start = ($page-1) * $max;

if ($cat == "portals") $catshow = "portals &amp; search";
if ($cat == "chat") $catshow = "chat &amp; dating";
if ($cat == "downloads") $catshow = "downloads";
if ($cat == "free") $catshow = "free stuff";
if ($cat == "entertainment") $catshow = "entertainment";
if ($cat == "personal") $catshow = "personal sites";
if ($cat == "special") $catshow = "special interest";
if ($cat == "adult") $catshow = "adult sites";
if ($cat == "amateur") $catshow = "amateur (personal sites)";

$query = "select count(*) from my_links where valid='yes' AND category='$cat'";
$result = mysql_query($query);
$count = number_format(mysql_result($result,0,"count(*)"));

if ($count == 1) $starter = "there is";
else $starter = "there are";

if ($count == 1) $res = "listing";
else $res = "listings";

$query = "select * from my_links where valid='yes' AND category='$cat' ORDER BY linkback DESC LIMIT  $start, $max";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

echo "<p class=\"break\">";


$insert = urlencode("$starter $count $res");


echo "<img src=\"../scripts/phoenix.php?login=SYSTEM&amp;string=$insert\" alt=\"$insert\" align=\"middle\"/></p><hr/>";

echo "<p class=\"breakforum\" style=\"text-align: center;\"><b><big>$catshow</big></b></p>";


if ($count > $max) echo "<p class=\"breakforum\">";

if ($page > 1) echo "$hyback <a href=\"./cat.php?ses=$ses&amp;act=index&amp;cat=$cat&amp;page=" . ($page - 1) . "\">back</a> ";
if ($count > ($page * $max)) echo "<a href=\"./cat.php?ses=$ses&amp;act=index&amp;cat=$cat&amp;page=" . ($page + 1) . "\">next</a> $hyfor";

if ($count > $max) echo "</p>";



	while ($row)

	{

	$name = $row["linktext"];
	$id = $row["id"];
	$user = $row["login"];
	$clicks = $row["clicks"];
	$inout = $row["linkback"];
	$comment = $row["comment"];
	$url = $row["url"];
	$logourl = $row["sitelogo"];

	if ($logourl != "") $logor = "<br/><img src=\"$logourl\" alt=\"$name\"/>";
	else $logor = "";

if (!preg_match ("/http/i", "$url")) $url = "http://$url";



$comment = add_sicn($comment);
$comment = funk_it_up($comment);


	echo "<p class=\"breakforum\"><b><big><a  href=\"./leave.php?type=site&amp;sid=$id\">$name</a></big></b>$logor<br/>
		$comment<br/>
		clicks to: $clicks<br/>
		clicks from $inout<br/>
		<a href=\"./leave.php?type=site&amp;sid=$id\">$url</a></p>";
           	$row = mysql_fetch_array($result);
           	}


if ($count > $max) echo "<p class=\"breakforum\">";

if ($page > 1) echo "$hyback <a href=\"./cat.php?ses=$ses&amp;act=index&amp;cat=$cat&amp;page=" . ($page - 1) . "\">back</a> ";
if ($count > ($page * $max)) echo "<a href=\"./cat.php?ses=$ses&amp;act=index&amp;cat=$cat&amp;page=" . ($page + 1) . "\">next</a> $hyfor";

if ($count > $max) echo "</p>";

echo "<hr/><p class=\"break\">
$hyback <a href=\"./index.php?ses=$ses\">categories</a><br/>
$hyfor <a href=\"./info.php?ses=$ses&amp;act=add\">info &amp; submissions</a><br/>
$hyback <a href=\"../incoming.php\">main menu</a><br/>$lIlIlIlI</p></body></html>";
exit;







?>



