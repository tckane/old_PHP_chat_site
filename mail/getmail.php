<?php
////////////////////////////////////////////
//Phoenix POP v2.0 (BETA)
////////////////////////////////////////////
include('../scripts/ses.php');
include('../scripts/main.php');
////////////////////////////////////////////

if ($p == "")
{
$p = "serv_1";
}

$bwmode = $GLOBALS["bwmode"];

$login = $GLOBALS["login"];

set_time_limit(30);


$query = "select * from forum_users where username='$login'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

$act_query = "UPDATE forum_users set lastactive=now(), location='checking emails' where username='$login'";
mysql_query($act_query);


$query = "UPDATE friends set lastactive=now(), location='checking emails' where friendname='$login'";
mysql_query($query);



function handle_em($string)
{
$string = eregi_replace("http:([^<>[:space:]]+[[:alnum:]/])","<a href=\"http:\\1\">http:\\1</a>", $string);
return $string; 
}

$ses = $_GET["ses"];
$elogin = $row_ses["emailuser"];
$epass = $row_ses["emailpass"];





$mtype = "pop3";
$serverinput = "{mail.phoenixbytes.co.uk/notls}INBOX";
$userinput = "$elogin";
$emailinput = "$elogin";
$passinput = "$epass";


if ($p == "")
{
$p = "serv_1";
}

$num = $tmax;

$max_chars = 99999999999;

$number_of_arrays = 1; // you must never change this!!!


 $serv_1 = array(
  "server" => "$serverinput",
  "nickname" => "$userinput",
  "emailaddress" => "$emailinput",
  "name" => "$userinput",
  "password" => "$passinput"
 );


$num = ($num - 1);







function mes_del()
{

if ($p == "")
{
$p = "serv_1";
}

  global $HTTP_GET_VARS, $prov, $conn, $ses, $p;

  $status_old = imap_status($conn , $prov["server"] , SA_MESSAGES);
  $msg_ini_count = $status_old -> messages;

  list($del_msgno , $del_date) = split(";" , $HTTP_GET_VARS["d"]);

  $del_headers = @imap_header($conn , $del_msgno);
  if(md5($del_headers -> date) == $del_date)
  {
imap_delete($conn , $del_msgno);
imap_expunge($conn);
  }

  $status_new = imap_status($conn , $prov["server"] , SA_MESSAGES);
  $msg_final_count = $status_new -> messages;

  if($msg_ini_count > $msg_final_count)
  {
echo "<p class=\"break\">Message Deleted</p>";
  }

  if($del_msgno == $HTTP_GET_VARS["c"]) $HTTP_GET_VARS["c"] -= 1;
  if($msg_final_count <= 0) unset($HTTP_GET_VARS["c"]);
}








function del_all()
{



if ($p == "")
{
$p = "serv_1";
}

  global $HTTP_GET_VARS, $prov, $conn, $ses, $p;

  $status_old = imap_status($conn , $prov["server"] , SA_MESSAGES);
  $msg_ini_count = $status_old -> messages;

   @imap_delete($conn,'1:*'); 

imap_expunge($conn);

  $status_new = imap_status($conn , $prov["server"] , SA_MESSAGES);
  $msg_final_count = $status_new -> messages;

  if($msg_ini_count > $msg_final_count)
  {
echo "<p class=\"break\">All Messages Deleted!</p>";
  }


  if($del_msgno == $HTTP_GET_VARS["c"]) $HTTP_GET_VARS["c"] -= 1;
  if($msg_final_count <= 0) unset($HTTP_GET_VARS["c"]);
}




function mes_prop($action , $id)
{

if ($p == "")
{
$p = "serv_1";
}

  global $conn, $ses;
  
  $headers = imap_header($conn , $id);

  $structure = imap_fetchstructure($conn , $id);

  switch($action)
  {
case "sender":
  $sender = "";
  $from = $headers -> from;

  if ($from)
  {
  $sender = $from[0] -> mailbox . "@" . $from[0] -> host;
  }
  return $sender;

case "date":
  $date = "date: not found";
  if($headers -> date)
  {
$date = $headers -> date;
  }
  else
  {
$alt_headers = strtolower(imap_fetchheader($conn , $id));
$date_set = strstr($alt_headers, "delivery-date");
if($date_set)
{
  $end_pos = strpos($alt_headers , "\r\n" , $date_set);
  $date = trim(substr($date_set, 15, $end_pos-4));
  $date = ucwords($date);
}
  }
  return $date;

case "subject":
  $subject = "No subject";
  if($headers -> subject) $subject = parse_preg($headers -> subject);  // function parse_preg() is located elsewhere
  return $subject;
   
case "size":
  $size = "?";
  if($headers -> Size) $size = round(($headers -> Size / 1024 ), 1);
  return $size;

case "message":
  $message = "<empty>";
  return $message;
 
case "mailfrom":
 $mailfrom = $from[0] -> mailbox . "@" . $from[0] -> host;

$return_path = strstr($alt_headers , "reply-to");
$end_pos = strpos($alt_headers , "\r\n" , $return_path);
$mailfrom = trim(substr($return_path , 12 , $end_pos-13));
$mailfrom = preg_replace("/<|>/" , "" , $mailfrom);

  return $mailfrom;
case "number":
  $message_n = trim($headers -> Msgno);
  return $message_n;
case "attachments":


$query = "select * from welcome";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$chickensoup = mysql_fetch_array($result);


$attachments = array();
if(isset($structure->parts) && count($structure->parts)) {

	for($i = 0; $i < count($structure->parts); $i++) {

		$attachments[$i] = array(
			'is_attachment' => false,
			'filename' => '',
			'name' => '',
			'attachment' => ''
		);
		
		if($structure->parts[$i]->ifdparameters) {
			foreach($structure->parts[$i]->dparameters as $object) {
				if(strtolower($object->attribute) == 'filename') {
					$attachments[$i]['is_attachment'] = true;
					$attachments[$i]['filename'] = $object->value;
				}
			}
		}
		
		if($structure->parts[$i]->ifparameters) {
			foreach($structure->parts[$i]->parameters as $object) {
				if(strtolower($object->attribute) == 'name') {
					$attachments[$i]['is_attachment'] = true;
					$attachments[$i]['name'] = $object->value;
				}
			}
		}
		
			if($attachments[$i]['is_attachment']) {
				$attachments[$i]['attachment'] = imap_fetchbody($conn , $id, $i+1);
			if($structure->parts[$i]->encoding == 3) { // 3 = BASE64
				$attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']);
			}
			elseif($structure->parts[$i]->encoding == 4) { // 4 = QUOTED-PRINTABLE
			$attachments[$i]['attachment'] = quoted_printable_decode($attachments[$i]['attachment']);
			}
		}
	}
}

$si = ($i - 1);
$silimit = "$si";

	for( $si=1; $si<=$silimit; $si++ )
	{


$login = $GLOBALS["login"];



  $file = make_upload_compat($attachments[$si][filename]);

  $size = round($structure -> parts[$si] -> bytes / 1024 , 1);
  $attached = $file . "&nbsp;(" . $size . "KB)\n";
  $n_attachments += 1;

$uppy = getcwd();

$attachmentrequester = imap_fetchbody($conn, $id, "2");

$tofu = $attachments[$si][attachment];


$bytes = $structure -> parts[$si] -> bytes;


$updest = "$uppy/attachments/$login$bytes$file";

$linkbackaddr = $chickensoup['linkbackaddress'];
$attachaddr = "$linkbackaddr/mail/attachments/";

if (!file_exists($updest))
{
$attfile = fopen($updest,"xb");
  fwrite($attfile, $tofu); 
 fclose($attfile);
}

if ($size > 3)
{

$linkfile = "$login$bytes$file";

$attachment_info .= "<a href=\"$attachaddr$linkfile\">$linkfile</a>($size<small>KB</small>)<br/>";
$filler = "<br/>You have attachments<br/>$attachment_info";
}

	}
$attachment_info = "$filler";

  return $attachment_info;
  }
}






function disp_inbox()
{


if ($p == "")
{
$p = "serv_1";
}

  global $HTTP_GET_VARS, $HTTP_SERVER_VARS, $session_urls, $num, $conn, $number_of_arrays, $ses;
 
  $check = imap_check($conn);
  if($check) $Nmsgs = $check -> Nmsgs;
  if(!ISSET($HTTP_GET_VARS["c"]) || $HTTP_GET_VARS["c"] > $Nmsgs || $HTTP_GET_VARS["c"] < 1) $HTTP_GET_VARS["c"] = $Nmsgs;
  $end = $HTTP_GET_VARS["c"] - $num; // $num is set at the beginning of this script
  if($end < 1) $end = 1;
  $nav_url = "";
  $nav_frm = "";

  if ($HTTP_GET_VARS["c"] != $Nmsgs)
  {
$prev = ($HTTP_GET_VARS["c"] + $num + 1);
if ($prev > $Nmsgs) $prev = $Nmsgs;
$href = $HTTP_SERVER_VARS['PHP_SELF'] . "?p=" . $HTTP_GET_VARS["p"] . "&amp;ses=$ses&amp;c=" . $prev;
$nav_url .= "$hyback  <a href=\"" . $href . "\">back</a><br/>";

  }
  if($end != 1)
  {
$next = ($HTTP_GET_VARS["c"] - ($num + 1));
if ($next < 1) $next = 1;
$href = $HTTP_SERVER_VARS['PHP_SELF'] . "?p=" . $HTTP_GET_VARS["p"] . "&amp;ses=$ses&amp;c=" . $next;
$nav_url .= "$hyfor  <a href=\"" . $href . "\">next</a><br/>";
  }

  $href_delall = $HTTP_SERVER_VARS['PHP_SELF']
. "?p=" . $HTTP_GET_VARS["p"]
. "&amp;ses=$ses&amp;c=" . $HTTP_GET_VARS["c"]
. "&amp;x=x";

  if($Nmsgs != 0)
  {


$hyback = "&#171;";
$hyfor = "&#187;";

if ($err != "") $err = "<br/><small><b>$err</b></small>";


$bwmode = $GLOBALS["bwmode"];
$login = $GLOBALS["login"];

if ($bwmode == "off") $subtite = "<img align=\"middle\" src=\"../scripts/phoenix.php?login=$login&amp;string=email($Nmsgs);\" alt=\"email($Nmsgs);\"/>";
else $subtite = "<b><big>email($Nmsgs);</big></b>";


echo "<p class=\"break\">$subtite$err</p><hr/>";



///////////////////////////////////////////////////////////////
////////// shortcut block /////////////////////////////////////////
///////////////////////////////////////////////////////////////
$query = "SELECT * FROM shortcuts";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

echo "<form class=\"breakforum\" style=\"text-align: center;\" action=\"$lback/shortcuts.php?ses=$ses\" method=\"get\">
<fieldset>
<select name=\"shortcut\">";

while ($row)
{

$sid = $row["id"];
$sname = $row["name"];

echo "<option value=\"$sid\">$sname</option>";

$row = mysql_fetch_array($result);
}

echo "</select>
<input type=\"submit\" value=\"go there\"/>
<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
</fieldset></form>";
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////


// display messages
for ($i = $HTTP_GET_VARS["c"] ; $i >= $end ; $i--)
{
  $sender  = mes_prop("sender" , $i);
  $subject = mes_prop("subject" , $i);
  $date = mes_prop("date" , $i);
  $number  = mes_prop("number" , $i);
  $size = mes_prop("size" , $i);
   

$login = $GLOBALS["login"];

$asender = strtolower(mes_prop("sender" , $i));

$query = "select * from phoenix_email where username='$login' AND address='$asender' AND type='address'";
$result = mysql_query($query);
$countfrom = mysql_num_rows($result);

if ($countfrom > 0)
{
$rowfrom = mysql_fetch_array($result);

$friendlysender = $rowfrom["friendlyaddress"];
}
else
{
$friendlysender = "$asender";
}



  $output  = "<a style=\"font-weight: bold;\" href=\"". $HTTP_SERVER_VARS["PHP_SELF"];
  $output .= "?p=" . $HTTP_GET_VARS["p"] . "&amp;fromail=$sender&amp;ses=$ses&amp;m=" . $number;
  $output .= "&amp;c=" . $HTTP_GET_VARS["c"] . "\">" . $friendlysender . "</a><br />";
  $output .= $date . "<br />";
  $output .= $subject . "&nbsp;(Size: " . $size . "KB)";
   
  echo "<p class=\"breakforum\">$output</p>";
}

echo "<hr/><p class=\"break\" style=\"text-align: left;\">";
echo $nav_url;
echo $nav_frm;
echo "
$hyfor <a href=\"./attachments/sendmail.php?ses=$ses\">write new</a><br/>
$hyfor <a href=\"./addressbook.php?ses=$ses\">address book</a><br/>
$hyfor <a href=\"./esent.php?ses=$ses\">sent items</a><br/>
$hyback <a href=\"./index.php?ses=$ses&amp;act=index\">mailbox</a><br/>
$hyback  <a href=\"../mainmenu.php?ses=$ses\">main menu</a><br/>
$hyfor <a href=\"$href_delall;\">delete everything</a></p>";
  }
  else
  {
echo "<p class=\"break\">mailbox empty</p><hr/>";


///////////////////////////////////////////////////////////////
////////// shortcut block /////////////////////////////////////////
///////////////////////////////////////////////////////////////
$query = "SELECT * FROM shortcuts";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

echo "<form class=\"breakforum\" style=\"text-align: center;\" action=\"$lback/shortcuts.php?ses=$ses\" method=\"get\">
<fieldset>
<select name=\"shortcut\">";

while ($row)
{

$sid = $row["id"];
$sname = $row["name"];

echo "<option value=\"$sid\">$sname</option>";

$row = mysql_fetch_array($result);
}

echo "</select>
<input type=\"submit\" value=\"go there\"/>
<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
</fieldset></form>";
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////


echo "<p class=\"breakforum\" style=\"text-align: center;\">you haven't got any mail, aww...</p>
<hr/><p class=\"break\" style=\"text-align: left;\">";

echo $nav_url;
echo $nav_frm;
echo "$hyfor <a href=\"./attachments/sendmail.php?ses=$ses\">write new</a><br/>
$hyfor <a href=\"./addressbook.php?ses=$ses\">address book</a><br/>
$hyfor <a href=\"./esent.php?ses=$ses\">sent items</a><br/>
$hyback <a href=\"./index.php?ses=$ses&amp;act=index\">mailbox</a><br/>
$hyback  <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";
  }
}






function disp_mes()
{
  global $HTTP_GET_VARS, $HTTP_SERVER_VARS, $session_urls, $Nmsgs, $conn, $max_chars, $ses;
  $nav_url = "";
  $nav_frm = "";
  $fromail = $_GET['fromail'];





$fromail = mes_prop("sender", $HTTP_GET_VARS["m"]);
  if($HTTP_GET_VARS["m"] <= $Nmsgs && $HTTP_GET_VARS["m"] >= 1)
  {

$login = $GLOBALS["login"];

$asender = strtolower(mes_prop("sender", $HTTP_GET_VARS["m"]));



$query = "select * from phoenix_email where username='$login' AND address='$asender' AND type='address'";
$result = mysql_query($query);
$countfrom = mysql_num_rows($result);

if ($countfrom > 0)
{
$rowfrom = mysql_fetch_array($result);

$friendlysender = $rowfrom["friendlyaddress"];
}
else
{
$friendlysender = "$asender";
}



$friendlysender = "<a href=\"./addressbook.php?ses=$ses&amp;act=view&amp;frommer=$fromail\">$friendlysender</a>";



$from_var = "<p class=\"break\" style=\"text-align: left;\"><b>from:</b> $friendlysender<br/>
	<b>subject:</b> " . mes_prop("subject", $HTTP_GET_VARS["m"]) . "<br/>
	<b>date: </b>" . substr(mes_prop("date", $HTTP_GET_VARS["m"]),0,25) . "</p><hr/><p class=\"breakforum\">";
$structure = imap_fetchstructure($conn , $HTTP_GET_VARS["m"]);
$part = 1;
if($structure -> type == 1)
{
  $part = "1.1";
  if($structure -> parts[0] -> type == 1) $part = "1.1.1";
}
if(imap_fetchbody($conn , $HTTP_GET_VARS["m"] , $part) == "") $part = 1;
$text = imap_fetchbody($conn , $HTTP_GET_VARS["m"] , $part);
$base64 = false;
$headers = strtolower(imap_fetchheader($conn, $HTTP_GET_VARS["m"]));
if(strstr($headers, "content-transfer-encoding: base64")) $base64 = true;
if($base64) $text = base64_decode($text);
$text = parse_preg($text);
$text_length = strlen($text);
if($text_length > $max_chars)
{
  if(!ISSET($HTTP_GET_VARS["f"]))
  {
$HTTP_GET_VARS["f"] = 0;
  }
  $length = $max_chars;
  if(($HTTP_GET_VARS["f"] + $max_chars) > $text_length) $length = ($text_length - $HTTP_GET_VARS["f"]);
  $text = substr($text , $HTTP_GET_VARS["f"] , $length);
  $offset = 0;
  $line_end = ".";
  if(!strpos($text , "." , $offset)) $line_end = "<br/>";
  if(strpos($text , $line_end , $offset))
  {
while(strpos($text , $line_end , $offset))
{
  $pos = strpos($text , $line_end , $offset);
  $offset = $pos + strlen($line_end);
}
  }
  else
  {
$offset = $max_char;
  }

  // get adjusted part of part of message
  $text = substr($text , 0 , $offset);

}
$attachments = mes_prop("attachments" , $HTTP_GET_VARS["m"]);




if($attachments) $text .= $attachments;

$href = $HTTP_SERVER_VARS['PHP_SELF'] . "?p=" . $HTTP_GET_VARS["p"] . "&amp;ses=$ses&amp;c=" . $HTTP_GET_VARS["c"];




  global $conn, $HTTP_SERVER_VARS, $HTTP_GET_VARS, $ses;
  
  $del_headers = imap_header($conn , $HTTP_GET_VARS["m"]);
  

  $href_del = $HTTP_SERVER_VARS['PHP_SELF']
. "?p=" . $HTTP_GET_VARS["p"]
. "&amp;ses=$ses&amp;c=" . $HTTP_GET_VARS["c"]
. "&amp;lat=$filex&amp;d=" . $HTTP_GET_VARS["m"]
. ";" . md5($del_headers -> date);

if(($HTTP_GET_VARS["f"] + $max_chars) < $text_length)
{



  $offset = $offset + $HTTP_GET_VARS["f"];
  $href = $HTTP_SERVER_VARS["PHP_SELF"]
. "?p=" . $HTTP_GET_VARS["p"]
. "&amp;ses=$ses&amp;m=" . $HTTP_GET_VARS["m"]
. "&amp;c=" . $HTTP_GET_VARS["c"]
. "&amp;f=" . $offset;
  $nav_url .= "<a href=\"$href\">Rest of message</a>\n";
}

$text = $from_var . $text;

$text = str_replace("Content-Type: text/html; charset=utf-8","","$text");
$text = str_replace("Content-Transfer-Encoding: quoted-printable","","$text");

$text = str_replace("=0A","","$text");

$text = str_replace("=09","","$text");

$text = str_replace("=20","","$text");

$text = str_replace("=A3","&#163;","$text");

$text = str_replace("=3D","&#61;","$text");

$text = str_replace("=3F","'","$text");

$text = str_replace("=0D","<br/>","$text");

$text = str_replace("=C2=A0","&nbsp;","$text");

$text = str_replace("=C2","","$text");





$text = str_replace("=AC","&#172;","$text");
$text = str_replace("=A6","&#166;","$text");










$text = str_replace("Content-Type: text/plain; charset=utf-8","","$text");

echo utf8_encode($text);
echo $nav_url;



$subber = urlencode(mes_prop("subject", $HTTP_GET_VARS["m"]));


echo "</p><hr/><p class=\"break\" style=\"text-align: left;\">
$hyfor  <a href=\"$href_del;\">delete</a><br />
$hyfor <a href=\"./attachments/sendmail.php?ses=$ses&amp;mailto=$fromail&amp;subber=$subber\">reply</a><br/>
$hyfor <a href=\"./attachments/sendmail.php?ses=$ses\">write new</a><br/>
$hyback  <a href=\"" . $href . "\">inbox</a><br/>
$hyfor <a href=\"./addressbook.php?ses=$ses\">address book</a><br/>
$hyfor <a href=\"./esent.php?ses=$ses\">sent items</a><br/>
$hyback <a href=\"./index.php?ses=$ses&amp;act=index\">mailbox</a><br/>
$hyback  <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";
  }
  else
  {
echo "Message is not on server<br/>It may have been deleted, did you log in somewhere else?";
echo "</p><hr/><p class=\"break\" style=\"text-align: left;\">

$hyfor <a href=\"./attachments/sendmail.php?ses=$ses\">write new</a><br/>
$hyback  <a href=\"" . $HTTP_SERVER_VARS['PHP_SELF'] . "\">inbox</a><br/>
$hyfor <a href=\"./addressbook.php?ses=$ses\">address book</a><br/>
$hyfor <a href=\"./esent.php?ses=$ses\">sent items</a><br/>
$hyback <a href=\"./index.php?ses=$ses&amp;act=index\">mailbox</a><br/>
$hyback  <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";
  }
}






function parse_preg($text)
{


if ($p == "")
{
$p = "serv_1";
}

  $tags_and_content_to_strip = Array("head" , "title" , "style" , "script");
  foreach ($tags_and_content_to_strip as $tag)
  {
$text = preg_replace("/<" . $tag . "(.|\s)*?>(.|\s)*?<\/" . $tag . ">/i" , "" , $text);
  }

  $text = preg_replace("/<br\/?>/i" , "\r\n" , $text);
  $text = preg_replace("/&nbsp;/i" , "=20" , $text);
  $text = str_replace("&" , "&amp;" , $text);

  $text = strip_tags($text);

  $text = htmlspecialchars($text , ENT_COMPAT , "ISO-8859-1");

  // modify output to comply to xml standard and compact output (rids output of unnecessary <br />'s)
  $find = array(
0 => "/=\r(\n)?/",
1 => "/\r(\n)?/",
2 => "/((\s|&#32;|&nbsp;)*<br(\s)*\/?>(\r)?(\n)?){3,}/i",
  );
  $replace = array(
0 => "",
1 => "<br />\r\n",
2 => "<br />\r\n<br />\r\n",
  );
  ksort($find);
  ksort($replace);
  $text = preg_replace($find , $replace , $text);
  $text = str_replace("&amp;amp;" , "&amp;" , $text);

$text = handle_em($text);
  return $text;
}



function parse_hexdec($matches)
  {
$hex = $matches[2];
return "&#" . hexdec($hex) . ";";
  }
 


function parse_dollar($matches)
  {
$amount = $matches[2];
return $amount . " dollar";
  }



if (!function_exists("imap_open"))
{
  //build_html();
  echo "Error:<br /><br />\r\n"
     . "imap failed!\r\n";
  echo "</p>";
  echo "</body>";
  echo "</html>";
  return;
}

// redirect users that have only one e-mail account directly to that inbox (don't display provider list)


// display provider list or inbox/message
if(!ISSET($HTTP_GET_VARS["p"]))
{
  // check to see whether user wants to send an e-mail
  if (ISSET($HTTP_GET_VARS["w"]))
  {
   // build_html();
  }
}
else
{
  // get connection data
  $prov = $$HTTP_GET_VARS["p"];

  // check connection data
  if ($prov["name"] == "" || $prov["password"] == "")
  {
echo "<p class=\"break\">PhoenixMail</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
an error occured.</p><hr/><p class=\"break\">
$hyfor <a href=\"./addressbook.php?ses=$ses\">address book</a><br/>
$hyfor <a href=\"./esent.php?ses=$ses\">sent items</a><br/>
$hyback <a href=\"./index.php?ses=$ses&amp;act=index\">mailbox</a><br/>
$hyback  <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";
  }

  // connect to server if required arguments are set
  if ($prov["name"] != "" && $prov["password"] != "")
  {
    // connect to server
    $conn = @imap_open ($prov["server"] , $prov["name"] , $prov["password"]);

    if ($conn)
    {
      // build wml page
     // build_html();

      // delete message from server if $d is set
      if(ISSET($HTTP_GET_VARS["d"]) && $HTTP_SERVER_VARS['HTTP_REFERER'] = $HTTP_SERVER_VARS['PHP_SELF'])
      {
        mes_del();
      }
      elseif (ISSET($HTTP_GET_VARS["d"]) && $HTTP_SERVER_VARS['HTTP_REFERER'] != $HTTP_SERVER_VARS['PHP_SELF'])
      {
        echo "Error: The page that you are coming from is either "
           . "not visible to us (due perhaps to firewall software) "
           . "or not a page generated by us. Because this is a "
           . "possible security thread, the message was not deleted.<br />\n";
      }


      // delete ALL messages from server if $d is set
      if(ISSET($HTTP_GET_VARS["x"]) && $HTTP_SERVER_VARS['HTTP_REFERER'] = $HTTP_SERVER_VARS['PHP_SELF'])
      {
        del_all();
      }
      elseif (ISSET($HTTP_GET_VARS["x"]) && $HTTP_SERVER_VARS['HTTP_REFERER'] != $HTTP_SERVER_VARS['PHP_SELF'])
      {
        echo "Error: The page that you are coming from is either "
           . "not visible to us (due perhaps to firewall software) "
           . "or not a page generated by us. Because this is a "
           . "possible security thread, the message was not deleted.<br />\n";
      }





      // check inbox and get number of messages
      $check = imap_check($conn);
      if($check) $Nmsgs = $check -> Nmsgs;

      // check for user input
      if (!ISSET($HTTP_GET_VARS["m"]))
      {
        // display inbox
        disp_inbox();
      }
      else
      {
        if (!ISSET($HTTP_GET_VARS["w"]))
        {
          // display message
          disp_mes();
        }

      }
    }
    else
    {
echo "<p class=\"break\">PhoenixMail</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
an error occured.</p><hr/><p class=\"break\">
$hyfor <a href=\"./addressbook.php?ses=$ses\">address book</a><br/>
$hyfor <a href=\"./esent.php?ses=$ses\">sent items</a><br/>
$hyback <a href=\"./index.php?ses=$ses&amp;act=index\">mailbox</a><br/>
$hyback  <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";
    }
  }
}

if ($conn) imap_close($conn);
?>
</p>
</body>
</html>