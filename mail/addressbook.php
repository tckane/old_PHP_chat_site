<?php


include('../scripts/ses.php');
include('../scripts/main.php');


$theiremail = $_POST["theiremail"];

$myname = $_POST["myname"];

$theirname = $_POST["theirname"];

$err = $_GET["err"];


if ($err != "") $err = "<br/><small><b>$err</b></small>";







if ($act == "")
{

echo "<p class=\"break\">Address Book$err<br/>
<small><a href=\"./addressbook.php?ses=$ses&amp;act=addnew\">add new contact?</a></small></p><hr/>";





if (empty($page) || ($page < 1)) $page = 1; $max = $tmax;  $start = ($page-1) * $max;


$query = "SELECT count(*) from phoenix_email where type='address' AND username='$login'";
$result =mysql_query($query);
$row2 =mysql_fetch_array($result);
$count = $row2[0];

	$query = "SELECT * from phoenix_email where type='address' AND username='$login' ORDER BY id DESC LIMIT $start, $max";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);


if ($count < 1) echo "<p class=\"breakforum\" style=\"text-align: center;\">You have nobody in your address book, aww =o(</p>";
else echo "<p class=\"breakforum\" style=\"text-align: center;\"><b>Click on one of your contacts to do something with them.</b></p><hr/>";


if ($page > 1) echo "<p class=\"breakforum\" style=\"text-align: center;\"><a href=\"addressbook.php?ses=$ses&amp;page=" . ($page - 1) . "\">$hyback$hyback$hyback$hyback</a></p>";

while ($row)
      	{
       	$name = $row["friendlyaddress"];
	$addr = $row["address"];
	$id = $row["id"];

       	echo "<p class=\"breakforum\" style=\"text-align: center;\">
<b>$name<br/><small>($addr)</small></b><br/>
<small>(<a href=\"./attachments/sendmail.php?ses=$ses&amp;mailto=$addr\">send email?</a> - <a href=\"./insert.php?ses=$ses&amp;act=deladdress&amp;id=$id\">delete?</a>)</small>";


       	$row = mysql_fetch_array($result);
      	}

if ($count > ($page * $max)) echo "<p class=\"breakforum\" style=\"text-align: center;\"><a href=\"addressbook.php?ses=$ses&amp;page=" . ($page + 1) . "\">$hyfor$hyfor$hyfor$hyfor</a></p>";




echo "<hr/><p class=\"break\">
$hyback <a href=\"./getmail.php?ses=$ses&amp;p=serv_1\">email</a><br/>
$hyback <a href=\"./index.php?ses=$ses\">mailbox</a><br/>
$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
}










if ($act == "view")
{


$theaddress = $_GET["frommer"];




$query = "SELECT * from phoenix_email where username='$login' AND address='$theaddress' AND type='address'";
$result = mysql_query($query);
$countaddr = mysql_num_rows($result);
$row = mysql_fetch_array($result);



echo "<p class=\"break\">Address Book<br/>
<small><a href=\"./addressbook.php?ses=$ses&amp;act=addnew\">add new contact?</a></small></p><hr/>
<p class=\"breakforum\" style=\"text-align: center;\"><big><b>
$theaddress
</b></big></p>";


if ($countaddr > 0)
{

$name = $row["friendlyaddress"];
$addr = $row["address"];
$id = $row["id"];



echo "<p class=\"breakforum\" style=\"text-align: center;\">
<b>This contact is saved in your address book</b><br/><br/>
<b>$name<br/><small>($addr)</small></b><br/>
<small>(<a href=\"./attachments/sendmail.php?ses=$ses&amp;mailto=$addr\">send email?</a> - <a href=\"./insert.php?ses=$ses&amp;act=deladdress&amp;id=$id\">delete?</a>)</small>";
}
else
{

echo "<p class=\"breakforum\" style=\"text-align: center;\">
<b>$theaddress is not currently saved in your address book, add now?</b></p>
<form action=\"./insert.php?ses=$ses\" class=\"breakforum\" style=\"text-align: center;\" method=\"post\">
<fieldset>
<b>name:</b><br/>
<input type=\"text\" name=\"contactname\" class=\"textbox\" maxlength=\"200\"/><br/>
<b>email address</b><br/>
<input type=\"text\" name=\"contactemail\" class=\"textbox\" value=\"$theaddress\" maxlength=\"200\"/><br/>
<input type=\"submit\" style=\"buttstyle\" value=\"save contact\"/>
<input type=\"hidden\" name=\"act\" value=\"addaddress\"/>
<input type=\"hidden\" name=\"ses\" value=\"ses\"/>
</fieldset>
</form>";



}



echo "<hr/><p class=\"break\">
$hyback <a href=\"./getmail.php?ses=$ses&amp;p=serv_1\">email</a><br/>
$hyback <a href=\"./index.php?ses=$ses\">mailbox</a><br/>
$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
}







if ($act == "addnew")
{


$theaddress = $_GET["frommer"];





echo "<p class=\"break\">Address Book</p><hr/>
<p class=\"breakforum\" style=\"text-align: center;\"><big><b>
Add New Contact
</b></big></p>";


echo "<form action=\"./insert.php?ses=$ses\" class=\"breakforum\" style=\"text-align: center;\" method=\"post\">
<fieldset>
<b>name:</b><br/>
<input type=\"text\" name=\"contactname\" class=\"textbox\" maxlength=\"200\"/><br/>
<b>email address</b><br/>
<input type=\"text\" name=\"contactemail\" class=\"textbox\" value=\"$theaddress\" maxlength=\"200\"/><br/>
<input type=\"submit\" style=\"buttstyle\" value=\"save contact\"/>
<input type=\"hidden\" name=\"act\" value=\"addaddress\"/>
<input type=\"hidden\" name=\"ses\" value=\"ses\"/>
</fieldset>
</form>";


echo "<hr/><p class=\"break\">
$hyback <a href=\"./getmail.php?ses=$ses&amp;p=serv_1\">email</a><br/>
$hyback <a href=\"./index.php?ses=$ses\">mailbox</a><br/>
$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
}




?>