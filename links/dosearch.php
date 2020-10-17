<?php

include('../scripts/main.php');


$webact = $_GET['webact'];
$id = $_GET['id'];
$rpp = $_GET['rpp'];
$page = $_GET['page'];
$rt = $_GET['rt'];
$stringy = $_GET['stringy'];
$trimm = $_GET['trimm'];

if ($rt == "") $rt = "full";
if ($rpp == "") $rpp = "10";





$insert = urlencode("$sitename WapSearch");


echo "<p class=\"break\">";
echo "<img src=\"../scripts/phoenix.php?login=SYSTEM&amp;string=$insert\" alt=\"$sitename WapSearch\" align=\"middle\"/></p><hr/>";


if ($stringy == "") $malteasers = "$trimm";
else $malteasers = "$stringy";

$trimmed = trim($malteasers);

$trimmed_array = explode(" .%20.%2C.%26.%3F.%40",$trimmed); 

foreach ($trimmed_array as $trimm)
{
 
foreach ($trimmed_array as $trimm)
{

if (preg_match ("/\"/i", "$trimm"))
{
$minuser = "2";

$trimm = eregi_replace("\"","",$trimm);

$preparetoslice = strlen("$trimm");

$sliceoffset = ($preparetoslice - $minuser);

$nudger = "1";

$trimm = substr($trimm,$nudger,$sliceoffset);
}



$query = "select count(*) from my_links where keywords LIKE '%$trimm%' AND valid='yes'";
$result = mysql_query($query);
$count = number_format(mysql_result($result,0,"count(*)"));


if ($trimm == "") echo "<p class=\"breakforum\" style=\"text-align: center;\"><b><i>you didn't specify a search string, please try again or<br/><a href=\"index.php?ses=$ses\">browse the categories</a><br/>instead</i></b></p>";
elseif ($count == 0) echo "<p class=\"breakforum\" style=\"text-align: center;\"><b><i>your search didn't return any results, please try a different string or why not<br/><a href=\"index.php?ses=$ses\">browse the categories</a><br/>instead?</i></b></p>";
elseif ($count >= 100) echo "<p class=\"breakforum\" style=\"text-align: center;\"><b><i>your search returned a large number of results for such a small search engine, why not try a longer string or<br/><a href=\"index.php?ses=$ses\">browse the categories</a><br/>instead?</i></b></p>";




if ($trimm != "")
{





if (empty($page) || ($page < 1)) $page = 1; $max = $rpp;  $start = ($page-1) * $max;

if ($count == 1) $ent = "result";
else $ent = "results";



if ($count >= 1)
{
echo "<p class=\"breakforum\" style=\"text-align: center;\"><b><big>$trimm ($ent, $count);</big></b></p><hr/>";




if ($count > $max) echo "<p class=\"breakforum\">";

if ($page > 1) echo "$hyback <a href=\"./dosearch.php?ses=$ses&amp;webact=index&amp;rt=$rt&amp;rpp=$rpp&amp;method=$method&amp;trimm=$trimm&amp;rt=$rt&amp;rpp=$rpp&amp;page=" . ($page - 1) . "\">back</a> ";

if ($count > ($page * $max)) echo "<a href=\"./dosearch.php?ses=$ses&amp;trimm=$trimm&amp;rt=$rt&amp;rpp=$rpp&amp;method=$method&amp;webact=index&amp;page=" . ($page + 1) . "\">next</a> $hyfor";

if ($count > $max) echo "</p>";



$query = "select * from my_links where keywords LIKE '%$trimm%'AND valid='yes' ORDER BY linkback DESC LIMIT $start, $max";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$rowsea = mysql_fetch_array($result);


if ($rt == "full")
		{




while ($rowsea) 

			{


$name = $rowsea["linktext"];
$id = $rowsea["id"];
$user = $rowsea["login"];
$mycol = $rowsea["my_color"];
$clicksy = $rowsea["clicks"];
$clicksf = $rowsea["linkback"];
$comment = $rowsea["comment"];
$url = $rowsea["url"];
$cat = $rowsea["category"];
$logourl = $rowsea["sitelogo"];

if ($logourl != "") $logor = "<br/><img src=\"$logourl\" alt=\"$name\"/>";
else $logor = "";



$comment = funk_it_up($comment);

$name = add_sicn($name);
$comment = add_sicn($comment);

if (!preg_match ("/http/i", "$url")) $url = "http://$url";


if ($cat == "portals") $catshow = "portals &amp; search";
if ($cat == "chat") $catshow = "chat &amp; dating";
if ($cat == "downloads") $catshow = "downloads";
if ($cat == "free") $catshow = "free stuff";
if ($cat == "entertainment") $catshow = "entertainment";
if ($cat == "personal") $catshow = "personal sites";
if ($cat == "special") $catshow = "special interest";
if ($cat == "adult") $catshow = "adult sites";
if ($cat == "amateur") $catshow = "amateur (personal sites)";
$name = make_wml_compat($name);







echo "<p class=\"breakforum\">$hyfor <b><big><a href=\"./leave.php?sid=$id&type=site\">$name</a></big></b>$logor
<br/><b><i>$comment</i></b>
<br/>clicks to: <b>$clicksy</b>
<br/>clicks from: <b>$clicksf</b>
<br/><b><a href=\"../leave.php?type=site&amp;sid=$id\">$url</a></b></p>";



$rowsea = mysql_fetch_array($result);

			}
		}


//////////////////////////////////////////////////////////////////////////////



elseif ($rt == "link")
		{

while ($rowsea)   

   
			{

$name = $rowsea["linktext"];
$id = $rowsea["id"];
$user = $rowsea["login"];
$mycol = $rowsea["my_color"];
$name = make_wml_compat($name);
echo "<p class=\"breakforum\">$hyfor <b><big><a href=\"./leave.php?sid=$id&type=site\">$name</a></big></b></p>";



$rowsea = mysql_fetch_array($result);

			}
		}

if ($count > $max) echo "<p class=\"breakforum\">";

if ($page > 1) echo "$hyback <a href=\"./dosearch.php?ses=$ses&amp;webact=index&amp;rt=$rt&amp;rpp=$rpp&amp;method=$method&amp;trimm=$trimm&amp;rt=$rt&amp;rpp=$rpp&amp;page=" . ($page - 1) . "\">back</a> ";

if ($count > ($page * $max)) echo "<a href=\"./dosearch.php?ses=$ses&amp;trimm=$trimm&amp;rt=$rt&amp;rpp=$rpp&amp;method=$method&amp;webact=index&amp;page=" . ($page + 1) . "\">next</a> $hyfor";

if ($count > $max) echo "</p>";

}
}

echo "<hr/>
<form class=\"breakforum\" style=\"text-align: center;\" action=\"dosearch.php\" method=\"get\">
<fieldset>new search?<br/>
<input type=\"text\" name=\"stringy\" value=\"$trimm\" maxlength=\"2000\" class=\"buttstyle\"/><br/>
<input type=\"hidden\" name=\"rt\" value=\"$rt\"/>
<input type=\"hidden\" name=\"rpp\" value=\"$rpp\"/>
<input type=\"submit\" value=\"search\" class=\"buttstyle\"/>
</fieldset>
</form>";

echo "<hr/><p class=\"break\">
 <a href=\"./index.php?ses=$ses\">categories</a><br/>
 <a href=\"./info.php?ses=$ses&amp;act=add\">info &amp; submissions</a><br/>
 <a href=\"../index.php\">main menu</a>";
echo "<br/>$lIlIlIlI</p></body></html>";
exit;
	}
}




?>



