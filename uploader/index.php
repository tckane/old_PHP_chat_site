<?php



$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];



if ($ses != "")
{
include('../scripts/ses.php');
}

include('../scripts/main.php');

$query = "SELECT * from forum_users where ses='$ses'";
$result = mysql_query ("$query");
$sessio = mysql_num_rows($result);




function make_passage_compat($string)
{
$string = trim($string);
$string = ereg_replace("#","",$string);
$string = trim($string);
return $string; 
}

if ($ses == "")
{
$ses = $_POST['ses'];
}

//

$filena = $_GET['filena'];
//

$ttt = $_GET['ttt'];
//


$ext = $_GET['ext'];


if ($ses == "") $filer = "<a href=\"../index.php?msg=1\">view all files</a>";
else $filer = "<a href=\"./files.php?ses=$ses\">view all files</a>";

echo "<p class=\"break\">$logo<br/>File Exchange</p><hr/>
<p class=\"breakforum\" style=\"text-align: center;\">
<b><big>


$filer

</big><br/>
</b></p>";

echo "<form class=\"breakforum\" style=\"text-align: center;\" action=\"./uploader.php?ses=$ses\" method=\"post\" enctype=\"multipart/form-data\">
<fieldset>
<b>find the file</b><br/>
<input type=\"file\" name=\"file\" />
<br/>
<input type=\"submit\" value=\"upload\" class=\"buttstyle\"/><br/><b><big>
Disclaimer Notice:<br/>
We accept no responsibility for any loss or damage to any person or persons resulting from the use of this uploader.<br/>We provide this service on an &quot;as is&quot; basis with no guarantees or warranties as to it's functionality.<br/>
We will endeavour to remove all illegal files where possible.<br/>
To report files that should not be here please contact the administrator via email to $PHEMAIL.</big></b>
<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
</fieldset>
</form>


<p class=\"breakforum\" style=\"text-align: center;\"><b>* supported file extensions: jpg, jpeg, gif, png, bmp, mp3, wma, aac, wav, amr, mid, wmv, 3gp, mpg, mp4, zip, rar, tar, txt, sis, jad, jar &amp; pdf</b></p><hr/>


<p class=\"break\">";

echo "";

if ($ses != "")
{
echo "$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";
}
else
{
echo "$hyback <a href=\"../index.php?ses=$ses\">main menu</a>";
}


echo "</p></body></html>";





?>



