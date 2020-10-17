<?php


$ses = $_GET['ses'];


if ($ses != "")
{

include('../scripts/ses.php');

}


include('../scripts/main.php');

$act = $_GET['act'];

$id = $_GET['id'];

$page = $_GET['page'];



if ($act == "admin8ptswonkytowelsupport" )

	{


if (empty($page) || ($page < 1)) $page = 1; $max = 15;  $start = ($page-1) * $max;

echo "<p class=\"break\">";
echo "<big><i>WapSearch Admin</i></big>";
echo "<br/><a href=\"./insert.php?ses=$ses&amp;act=delall\">delete all waiting</a><br/>
<a href=\"./insert.php?ses=$ses&amp;act=valall\">validate all waiting</a><br/>
<a href=\"./zadmin8.php?act=delname\">[match &amp; delete]</a></p><hr/>";


$query = "select count(*) from my_links";
$result = mysql_query($query);
$count = number_format(mysql_result($result,0,"count(*)"));


	$query = "select * from my_links ORDER BY id DESC LIMIT  $start, $max";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);




if ($page > 1) echo "<p class=\"breakforum\">$hyback <a href=\"./zadmin8.php?ses=$ses&amp;act=admin8ptswonkytowelsupport&amp;page=" . ($page - 1) . "\">back</a></p>";



	while ($row)
           
		{
		$name = $row["linktext"];
		$id = $row["id"];
		$user = $row["login"];
		$mycol = $row["my_color"];
		$vv = $row["valid"];

		$lb = $row["linkback"];
		$ob = $row["clicks"];

                	$name = make_wml_compat($name);

if ($vv == "yes") $valink = "";
elseif ($vv == "no" | $vv == "") $valink = "-<a href=\"./insert.php?ses=$ses&amp;act=zadminvalid8&amp;id=$id\">validate?</a>";


echo "<p class=\"breakforum\"><b><a href=\"./zadmin8.php?ses=$ses&amp;act=zadview&amp;id=$id\">$name</a></b><br/>(in: $lb - out: $ob)<br/>
(<a href=\"./insert.php?ses=$ses&amp;act=zadmin8&amp;id=$id\">delete?</a>$valink)</p>";
           	$row = mysql_fetch_array($result);
           	}


if ($count > ($page * $max)) echo "<p class=\"breakforum\"><a href=\"./zadmin8.php?ses=$ses&amp;act=admin8ptswonkytowelsupport&amp;page=" . ($page + 1) . "\">next</a> $hyfor</p>";

echo "<hr/><p class=\"break\">
$hyback <a href=\"./zadmin8.php?act=admin8ptswonkytowelsupport\">back</a><br/>
$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
exit;
	}





if ($act == "zadview")

	{

	$query = "select * from my_links where id=$id";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);

		$linktext = $row["linktext"];
		$us = $row["login"];
		$pw = $row["password"];
		$url = $row["url"];
		$id = $row["id"];
		$comment = $row["comment"];
		$clicks = $row["clicks"];
		$clickins = $row["linkback"];
		$mycol = $row["my_color"];
		$kws = $row["keywords"];
		$v = $row["valid"];

                	$linktext = make_wml_compat($linktext);
                	$kws = make_wml_compat($kws);
                	$comment = make_wml_compat($comment);



if (!preg_match ("/http/i", "$url")) $url = "http://$url";


echo "<p class=\"break\">";

echo "<b><a href=\"./leave.php?type=site&amp;sid=$id\">$linktext</a></b>$inboxes$breaker";
echo "</p><hr/><p class=\"breakforum\">
<i>added by:</i>&nbsp;<b>$us</b><br/>
<i>clicks to:</i>&nbsp;<b>$clicks</b><br/>
<i>clicks from:</i>&nbsp;<b>$clickins</b><br/>
<i>location:</i>&nbsp;<b><a href=\"./leave.php?type=site&amp;sid=$id\">$url</a></b><br/>
<i>about:</i>&nbsp;<b>$comment</b><br/>
<i>keywords:</i>&nbsp;<b>$kws</b><br/>
<i>password:</i>&nbsp;<b>$pw</b><br/>
<i>valid:</i>&nbsp;<b>$v</b><br/>

</p><hr/><p class=\"break\">";
echo "$hyfor <a href=\"./insert.php?ses=$ses&amp;act=zadmin8dit&amp;id=$id\">edit link</a><br/>";
echo "$hyfor <a href=\"./insert.php?ses=$ses&amp;act=zadmin8&amp;id=$id\">delete link</a><br/>";
echo "$hyfor <a href=\"./insert.php?ses=$ses&amp;act=zadminvalid8&amp;id=$id\">validate link</a><br/>";
echo "$hyback <a href=\"./zadmin8.php?ses=$ses&amp;act=admin8ptswonkytowelsupport\">back</a><br/>
$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
exit;
	}





if ($act == "delname")
{

echo "<p align=\"center\" class=\"break\">";
echo "<big><i>WapSearch Admin</i></big></p><hr/>

<form class=\"breakforum\" style=\"text-align: center;\" action=\"./insert.php?act=adnamedel\" method=\"get\">
<fieldset>
Insert String:<br/>
<input type=\"text\" class=\"textbox\" name=\"stringus\"/><br/>
<input type=\"submit\" class=\"buttstyle\" value=\"delete all matches\"/>
</fieldset>
</form>";

echo "<hr/><p class=\"break\">
$hyback <a href=\"./zadmin8.php?act=admin8ptswonkytowelsupport\">back</a><br/>
$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
exit;

}



?>



