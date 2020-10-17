<?php


$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];




if ($ses != "")
{
include('../scripts/ses.php');
}



include('../scripts/main.php');

$fileName = $_FILES['file']['name'];
$tmpName = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$fileType = $_FILES['file']['type'];
$fileErr = $_FILES['file']['error'];



$totalbytes = "$fileSize";

$file_name = "$fileName";








if ($totalbytes < pow(2,10))
{
	$totalsize = "$totalbytes<small>B</small>";
}
elseif ($totalbytes >= pow(2,10))
{
	$totalsize = round($totalbytes / pow(2,10), 0)."<small>KB</small>";
}
elseif ($totalbytes >= pow(2,19))
{
	$totalsize = round($totalbytes / pow(2,20), 0)."<small>MB</small>";
}




$ext = substr(strrchr($file_name, "."), 1);

$ext = strtolower($ext);



// make sure it's what we want


if (preg_match("/php/i", "$ext")) $ext = "errorexec";		
if (preg_match("/exe/i", "$ext")) $ext = "errorexec";
if (preg_match("/cgi/i", "$ext")) $ext = "errorexec";
if (preg_match("/wml/i", "$ext")) $ext = "errorexec";
if (preg_match("/wmls/i", "$ext")) $ext = "errorexec";
if (preg_match("/htm/i", "$ext")) $ext = "errorexec";
if (preg_match("/html/i", "$ext")) $ext = "errorexec";
if (preg_match("/php3/i", "$ext")) $ext = "errorexec";
if (preg_match("/php4/i", "$ext")) $ext = "errorexec";
if (preg_match("/php5/i", "$ext")) $ext = "errorexec";
if (preg_match("/php6/i", "$ext")) $ext = "errorexec";
if (preg_match("/txt/i", "$ext")) $ext = "errorexec";
if (preg_match("/ext/i", "$ext")) $ext = "errorexec";
if (preg_match("/asp/i", "$ext")) $ext = "errorexec";
if (preg_match("/db/i", "$ext")) $ext = "errorexec";
if (preg_match("/ini/i", "$ext")) $ext = "errorexec";
if (preg_match("/reg/i", "$ext")) $ext = "errorexec";

$ftype = "$fileType";

function strip_ext($file_name)
{
return substr($file_name, 0, strrpos($file_name, '.'));
}

$filename = strip_ext("$file_name");

$filename = make_upload_compat("$filename");

$filename = strtolower("$filename");

if ($filename == "" | $filename == ".")
{
$tmpName == "";
}


if (preg_match("/errorexec/i", "$ext"))

{

echo "<p class=\"break\"><b>upload failed!</b>$inboxes$breaker</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
<b>invalid file type, no such luck.</b></p><hr/><p class=\"break\">";

echo "$hyfor <a href=\"./files.php?ses=$ses&amp;action=index\">files</a><br/>";

if ($ses != "")
{
echo "$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";
}
else
{
echo "$hyback <a href=\"../index.php?ses=$ses\">main menu</a>";
}

echo "</p></body></html>";

}
else
{
if ($tmpName == "")
{
echo "<p class=\"break\"><b>upload failed!</b>$inboxes$breaker</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
<b>you didn't enter a file you clampet, try again!</b></p><hr/><p class=\"break\">";
echo "$hyfor <a href=\"./files.php?ses=$ses&amp;action=index\">files</a><br/>";

if ($ses != "")
{
echo "$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";
}
else
{
echo "$hyback <a href=\"../index.php?ses=$ses\">main menu</a>";
}

echo "</p></body></html>";

}
else
{





copy ("$tmpName", "$filename$totalbytes.$ext");

if ($ses != "")
{

			/// score - credit

			$query = "update forum_users set posts=posts+20, credits=credits+10 where username='$login'";
			mysql_query($query);

			///

}

echo "<p class=\"break\"><b>you uploaded<br/>$filename$totalbytes.$ext</b>$inboxes$breaker</p><hr/><form class=\"breakforum\"><fieldset>Link: <input type=\"text\" readonly=\"yes\" value=\"$lback/uploader/$filename$totalbytes.$ext\"/></fieldset></form>
<p class=\"breakforum\">
<b>Size:</b> $totalsize<br/>";


if (preg_match("/image/i", "$ftype"))

{
$esize = getimagesize("$tmpName");

echo "<b>Width:</b>&nbsp;$esize[0]<br/>
<b>Height:</b>&nbsp;$esize[1]<br/>";



}

$fullname = "$filename$totalbytes.$ext";

echo "<b>Type:</b> $ftype<br/>
the filename is case sensitive.</p>";
if (preg_match("/image/i", "$ftype")) echo "<hr/><p class=\"breakforum\" style=\"text-align: center;\"><b>image preview</b><br/>
<img src=\"$filename$totalbytes.$ext\" alt=\"$fullname\"/></p>";



echo "<hr/><form class=\"breakforum\" action=\"./uploader.php?ses=$ses\" method=\"post\" enctype=\"multipart/form-data\">
<fieldset>
upload another?<br/>
<input type=\"file\" name=\"file\" /><br/>
<input type=\"submit\" value=\"upload\" class=\"buttstyle\"/>
<input type=\"hidden\" name=\"ses\" value=\"$ses\">
</fieldset>
</form><hr/><p class=\"breakforum\" style=\"text-align: center;\">
supported file extensions: jpg, jpeg, gif, png, bmp, mp3, wma, aac, wav, amr, mid, wmv, 3gp, mpg, mp4, zip, rar, tar, txt, sis &amp; pdf</p><p class=\"break\">";


echo "$hyfor <a href=\"./files.php?ses=$ses&amp;action=index\">files</a><br/>";

if ($ses != "")
{
echo "$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";
}
else
{
echo "$hyback <a href=\"../index.php?ses=$ses\">main menu</a>";
}

echo "</p></body></html>";


}
}









?>