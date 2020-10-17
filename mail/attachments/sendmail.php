<?php



include('../../scripts/ses.php');
include('../../scripts/main.php');



$mailfrom = $row_ses['emailuser'];

$login = $row_ses['username'];


$realname = $row_ses['realname'];

$act = $_GET['act'];
if ($act == "")
{
$act = $_POST['act'];
}


$ses = $_GET['ses'];
if ($ses == "")
{
$ses = $_POST['ses'];
}


$subjectfilled = $_GET["subber"];

$filename = $_GET['filename'];
$back = $_GET['back'];
$type = $_GET['type'];

$mailto = $_POST['mailto'];
if ($mailto == "")
{
$mailto = $_GET['mailto'];
}



if ($realname != "")
{
$fromheader = "From: $realname <$mailfrom>";
}
else
{
$fromheader = "From: $login <$mailfrom>";
}




$mailsubject = $_POST['mailsubject'];
$mailmessage = $_POST['mailmessage'];

$filename = $_FILES['file']['name'];
$tmpname = $_FILES['file']['tmp_name'];
$filesize = $_FILES['file']['size'];
$filetype = $_FILES['file']['type'];
$filerror = $_FILES['file']['error'];
$origfname = $_FILES['file']['name'];







if ($act == "")


{


if ($mailto != "")
{
$placer = "$mailto";
$also = "<input type=\"hidden\" name=\"mailto\" value=\"$mailto\"/>";
}
else
{
$placer = "<input name=\"mailto\" class=\"textbox\" type=\"text\" value=\"\" maxlength=\"150\"/><br/>
<small><a href=\"../addressbook.php?ses=$ses\">open address book?</a></small>";
}

echo "

<p class=\"break\">send email</p><hr/>";


echo "<form class=\"breakforum\" style=\"text-align: center;\" action=\"../insert.php?ses=$ses&amp;act=shortcuts\" method=\"get\">
<fieldset>
<select name=\"shortcut\">
<option>shortcuts</option>
<option value=\"forums\">forums</option>
<option value=\"options\">options</option>
<option value=\"friends\">friends</option>
<option value=\"uploader\">file exchanger</option>
<option value=\"albums\">albums</option>
<option value=\"online\">who's online</option>
</select><input type=\"submit\" value=\"go\"/>
<input type=\"hidden\" name=\"act\" value=\"shortcuts\"/>
<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
</fieldset></form>";


echo "<form class=\"breakforum\" action=\"sendmail.php?ses=$ses\" method=\"post\" enctype=\"multipart/form-data\">

<fieldset>
<b>To:</b><br/>
$placer<br/>
<b>From:</b><br/>
$mailfrom<br/>
<b>Subject:</b><br/>
<input type=\"text\" name=\"mailsubject\" class=\"textbox\" value=\"$subjectfilled\"/><br/>
<b>Message:</b><br/>
<textarea name=\"mailmessage\" class=\"textbox\" rows=\"3\" cols=\"26\"></textarea><br/>
<b>Attachment:</b><br/>
<input type=\"file\" name=\"file\"/><br/>
<input type=\"hidden\" name=\"mailfrom\" value=\"$mailfrom\" class=\"textbox\"/>
<input type=\"hidden\" name=\"ses\" value=\"$ses\" class=\"textbox\"/>
<input type=\"hidden\" name=\"act\" value=\"sendmsg\" class=\"textbox\"/><br/>
<input type=\"submit\" class=\"buttstyle\" value=\"send email\"/>
$also
</fieldset>
</form>
<hr/><p class=\"break\">
$hyback <a href=\"../getmail.php?ses=$ses&amp;p=serv_1&amp;p=serv_1\">email</a><br/>
$hyback <a href=\"../index.php?ses=$ses&amp;act=index\">mailbox</a><br/>
$hyback  <a href=\"../../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";




}






if ($act == "sendmsg")
{




	if ($file != "")
	{


$mailto = strtolower("$mailto");


if (preg_match("/^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,6}$/i", $mailto))
{
	$bad = array('none');
	foreach($bad as $baddies);

	if (preg_match("/$baddies/i", $mailto))
	{
	$addrmail = "false";
	}
	else
	{
	$addrmail = "true";
	}



}
else
{
$addrmail = "false";
}


		if ($addrmail == "true")
		{

		
		ini_set("memory_limit","200M");




		$totalbytes = "$filesize";

		$file_name = "$filename";







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
		if (preg_match("/ext/i", "$ext")) $ext = "errorexec";
		if ($ext == "") $ext = "errorexec";


		$ftype = "$filetype";

		function strip_ext($file_name)
		{
		return substr($file_name, 0, strrpos($file_name, '.'));
		}

		$filename = strip_ext("$file_name");

		$filename = make_upload_compat("$filename");

		$filename = strtolower("$filename");

		if ($filename == "" | $filename == ".")
		{
		$ext = "errorexec";
		}


		$fullname = "$filename$totalbytes.$ext";


		if ($ext == "errorexec")

		{

		echo "<p class=\"break\"><b>attachment error</b>$inboxes</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
		the file supplied was<br/><b>$origfname</b><br/>
		a problem occured while attaching the file, please try another file or rename the file you just used. if you get an image from google images on their xhtml site, you may find that the filename has no extension, 'image.gif' becomes just 'image', we can't take those, to get around this on a Nokia phone, use the image editor then save the file, it comes out as a gif.<br/><br/>
		if you hit 'back' on your browser instead of the links below, your message should still be in the box, good luck.</p><hr/><p class=\"break\">";
		echo "$hyback <a href=\"../getmail.php?ses=$ses&amp;p=serv_1\">email</a><br/>
		$hyback <a href=\"../index.php?ses=$ses&amp;act=index\">mailbox</a><br/>
		$hyback  <a href=\"../../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";

		}

		else
		{
		$filepath = "$filename$totalbytes.$ext";




			if (!copy ("$tmpname", "$filepath"))
			{
			echo "<p class=\"break\"><b>attachment error</b>$inboxes</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
			the file supplied was<br/><b>$origfname</b><br/>
			a problem occured while attaching the file, you may have specified an incorrect filepath or your using a nokia 6230 and have sent lots of attachments already, if this is the case, turn your phone off and then on again.<br/><br/>
			if you hit 'back' on your browser instead of the links below, your message should still be in the box, good luck.</p><hr/><p class=\"break\">";
			echo "$hyback <a href=\"../getmail.php?ses=$ses&amp;p=serv_1\">email</a><br/>
			$hyback <a href=\"../index.php?ses=$ses&amp;act=index\">mailbox</a><br/>
			$hyback  <a href=\"../../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
			}
			else
			{



			echo "<p class=\"break\">mail sent</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
			your email message was sent to $mailto with $fullname as an attachment";







			$attachment = "$fullname";

			$to = "$mailto";

			$subject = "$mailsubject";

			$from = "$mailfrom";

			$message = "$mailmessage";


			$fileatt = $attachment; // Path to the file                  
			$fileatt_type = "application/octet-stream"; // File Type 
    			$start = strrpos($attachment, '/') == 0 ? strrpos($attachment, '//') : strrpos($attachment, '/')+1;
			$fileatt_name = substr($attachment, $start, strlen($attachment)); // Filename that will be used for the file as the 	attachment 

			$email_from = "$from"; // Who the email is from 
			$email_subject =  $subject; // The Subject of the email 
			$email_txt = "$message"; // Message that the email has in it 
		
			$email_to = $to; // Who the email is to

			$headers = "$fromheader";

			$file = fopen($fileatt,'rb'); 
			$data = fread($file,filesize($fileatt)); 
			fclose($file); 
			$msg_txt="\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n------------\nsent by $login at\r\n$sitename - the only wap portal you need to be on!\r\n\r\n";

			$semi_rand = md5(time()); 
			$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
    	
			$headers .= "\nMIME-Version: 1.0\n" . 
			"Content-Type: multipart/mixed;\n" . 
			" boundary=\"{$mime_boundary}\""; 

			$email_txt .= $msg_txt;
	
			$email_message .= "This is a multi-part message in MIME format.\n\n" . 
			"--{$mime_boundary}\n" . 
			"Content-Type:text/plain; charset=\"ISO-8859-1\"\n" . 
			"Content-Transfer-Encoding: 7bit\n\n" . 
			$email_txt . "\n\n"; 

			$data = chunk_split(base64_encode($data)); 

			$email_message .= "--{$mime_boundary}\n" . 
			"Content-Type: {$fileatt_type};\n" . 
			" name=\"{$fileatt_name}\"\n" . 
			"Content-Disposition: attachment;\n" . 
			" filename=\"{$fileatt_name}\"\n" . 
			"Content-Transfer-Encoding: base64\n\n" . 
			$data . "\n\n" . 
			"--{$mime_boundary}--\n"; 


			$ok = @mail($email_to, $email_subject, $email_message, $headers); 

			if($ok)
			{ 

			/// score - credit

			$query = "update forum_users set posts=posts+15, credits=credits+7 where username='$login'";
			mysql_query($query);

			///

			$query = "insert into phoenix_email ( username, address, subject, message, attached, date, type ) values ( '$login', '$mailto', '$mailsubject', '$mailmessage', '$fullname', '$msgsandposts', 'message' )";
			$result = mysql_query($query);
			}
			else
			{ 
			die("Sorry but the email could not be sent. Please go back and try again!"); 
			} 

			unlink($filepath); 



			echo "</p><hr/><p class=\"break\">

			$hyback <a href=\"../getmail.php?ses=$ses&amp;p=serv_1\">email</a><br/>
			$hyback <a href=\"../index.php?ses=$ses&amp;act=index\">mailbox</a><br/>
			$hyback  <a href=\"../../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";

			}
		}
	}
}
if ($file == "")
{


$mailto = strtolower("$mailto");


if (preg_match("/^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,6}$/i", $mailto))
{
	$bad = array('none');
	foreach($bad as $baddies);

	if (preg_match("/$baddies/i", $mailto))
	{
	$addrmail = "false";
	}
	else
	{
	$addrmail = "true";
	}



}
else
{
$addrmail = "false";
}
	if ($addrmail == "true")
	{

		echo "<p class=\"break\">mail sent</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
		your email message was sent to $mailto";


	$email_from = $mailfrom; // Who the email is from 
	$email_subject = stripslashes("$mailsubject"); // The Subject of the email 
	$email_txt = stripslashes("$mailmessage"); // Message that the email has in it 
	
	$email_to = $mailto; // Who the email is to

	$headers = "$fromheader";



	$email_message = "$email_txt\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n------------\nsent by $login at\r\n$sitename - the only wap portal you need to be on!\r\n\r\n"; 


	$ok = mail($email_to, $email_subject, $email_message, $headers); 

	if($ok)
	{

			/// score - credit

			$query = "update forum_users set posts=posts+15, credits=credits+7 where username='$login'";
			mysql_query($query);

			///
	$query = "insert into phoenix_email ( username, address, subject, message, date, type ) values ( '$login', '$mailto', '$mailsubject', '$mailmessage', '$msgsandposts', 'message' )";
	$result = mysql_query($query);
	} 
	else
	{ 
	die("Sorry but the email could not be sent. Please go back and try again!"); 
	} 




		echo "</p><hr/><p class=\"break\">

		$hyback <a href=\"../getmail.php?ses=$ses&amp;p=serv_1\">email</a><br/>
		$hyback <a href=\"../index.php?ses=$ses&amp;act=index\">mailbox</a><br/>
		$hyback  <a href=\"../../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";

		}
		else
		{

		echo "<p class=\"break\">Error</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
		You did not supply a valid email address, please try again.
		</p><hr/>";

		echo "<p class=\"break\">


		$hyback <a href=\"../getmail.php?ses=$ses&amp;p=serv_1\">email</a><br/>
		$hyback <a href=\"../index.php?ses=$ses&amp;act=index\">mailbox</a><br/>
		$hyback  <a href=\"../../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";

		}
	}
}



?>
