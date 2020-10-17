<?php



$ses = $_GET["ses"];


if ($ses != "")
{
include('../scripts/ses.php');
}
include('../scripts/main.php');
//

$detail = $_GET['detail'];
$file = $_GET['file'];

//

$rpp = $_GET['rp'];
//

$page = $_GET['page'];
//

$act = $_GET['act'];
//

$backpage = $_GET['backpage'];

if ($detail == "lumpystew99weedmongtree")
{

if (file_exists($file))
unlink($file);

echo "<p class=\"break\"><b>deleted</b>$inboxes$breaker</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
$file was deleted!</p><hr/><p class=\"break\">";
echo "$hyfor <a href=\"./files.php?type=$ftype&amp;pagego=$pagego&amp;rpp=$rpp&amp;page=$page&amp;act=$act&amp;ses=$ses\">files</a><br/>";


echo "$hyfor <a href=\"./index.php?ses=$ses\">uploader</a><br/>";


echo "$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";

}

else
{

echo "<p class=\"break\"><big><i>nice try, but no.</i></big></p><p class=\"centerize\"><a href=\"../incoming.php\">fuck off</a></p></body></html>";

}


?>
