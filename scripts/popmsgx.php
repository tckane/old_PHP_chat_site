<?php



$querypop = "SELECT * from poppers where userto='$login' order by id desc limit 1";
$resultpop = mysql_query($querypop);
$popcounter = mysql_num_rows($resultpop);

$querychat = "SELECT * from chatinvites where recipient='$login' order by id desc limit 1";
$resultchat = mysql_query($querychat);
$chatcounter = mysql_num_rows($resultchat);

$counter = ($chatcounter + $popcounter);


if ($counter > 0)
{



$chatpass = $_GET["chatpass"];
if ($chatpass == "") $chatpass = $_POST["chatpass"];

$tid = $_GET["tid"];
if ($tid == "") $tid = $_POST["tid"];
$page = $_GET["page"];
if ($page == "") $page = $_POST["page"];

$pagego = $_GET["pagego"];
if ($pagego == "") $pagego = $_POST["pagego"];

$forum = $_GET["forum"];
if ($forum == "") $forum = $_POST["forum"];

$cat = $_GET["cat"];
if ($cat == "") $cat = $_POST["cat"];


$roomid = $_POST["roomid"];
if ($roomid == "") $roomid = $_GET["roomid"];

$pid = $_GET["pid"];
if ($pid == "") $pid = $_POST["pid"];

$mid = $_GET["mid"];
if ($mid == "") $mid = $_POST["mid"];

$act = $_GET["act"];
if ($act == "") $act = $_POST["act"];

$blog = $_GET["blog"];
if ($blog == "") $blog = $_POST["blog"];

$id = $_GET["id"];
if ($id == "") $id = $_POST["id"];

$senduser = $_GET["senduser"];
if ($senduser == "") $senduser = $_POST["senduser"];

$stringy = $_GET["stringy"];
if ($stringy == "") $stringy = $_POST["stringy"];

$p = $_GET["p"];
if ($p == "") $p = $_POST["p"];

$albumidb = $_GET["albumidb"];
if ($albumidb == "") $albumidb = $_POST["albumidb"];

$albumid = $_GET["albumid"];
if ($albumid == "") $albumid = $_POST["albumid"];

$imid = $_GET["imid"];
if ($imid == "") $imid = $_POST["imid"];

$user = $_GET["user"];
if ($user == "") $user = $_POST["user"];

$update = $_GET["update"];
if ($update == "") $update = $_POST["update"];

$type = $_GET["type"];
if ($type == "") $type = $_POST["type"];

$thatfile = $_GET["thatfile"];
if ($thatfile == "") $thatfile = $_POST["thatfile"];

$letters = $_GET["letters"];
if ($letters == "") $letters = $_POST["letters"];

$a = $_GET["a"];
if ($a == "") $a = $_POST["a"];

$l = $_GET["l"];
if ($l == "") $l = $_POST["l"];

$quid = $_GET["quid"];
if ($quid == "") $quid = $_POST["quid"];

$q = $_GET["q"];
if ($q == "") $q = $_POST["q"];

$diff = $_GET["diff"];
if ($diff == "") $diff = $_POST["diff"];




if ($popcounter < 1)
{

$chatarray = mysql_fetch_array($resultchat);
$chatid = $chatarray["id"];
$chatsender = $chatarray["sender"];
$chatrecipient = $chatarray["recipient"];
$chatroomid = $chatarray["roomid"];


$querychatroom = "SELECT * from chatrooms where id='$chatroomid' LIMIT 1";
$resultchatroom = mysql_query ("$querychatroom");
$ropechatroom = mysql_fetch_array($resultchatroom);

$roomname = $ropechatroom["roomname"];
$roompassword = $ropechatroom["password"];
$roomid = $ropechatroom["id"];


$query = "UPDATE forum_users set lastactive=now(), location='reading a chat invite from $chatsender' where username='$login'";
mysql_query($query);

$query = "UPDATE friends set lastactive=now(), location='reading a chat invite from $chatsender' where friendname='$login'";
mysql_query($query);



$moof = $_SERVER["PHP_SELF"];


echo "<p class=\"break\"><i><big>New Chat Invite<br/>
From $chatsender!</big></i>$ermsg</p>";

echo "<p class=\"breakforum\" style=\"text-align: center;\">
<b>$chatsender is invited you to come for a chat in &quot;$roomname&quot;!</b></p>


<p class=\"break\" style=\"padding: 3px;\">





<a class=\"refresh\" style=\"font-weight: normal;\" href=\"http://phoenixbytes.co.uk/chat/enter.php?ses=$ses&amp;chatpass=$roompassword&amp;tid=$tid&amp;cat=$cat&amp;roomid=$roomid&amp;delinvite=$chatid&amp;forum=$forum&amp;pid=$pid&amp;page=$page&amp;pagego=$pagego&amp;mid=$mid&amp;act=$act&amp;id=$id&amp;senduser=$senduser&amp;stringy=$stringy&amp;p=$p&amp;albumid=$albumid&amp;imid=$imid&amp;user=$user&amp;albumidb=$albumidb&amp;update=$update&amp;type=$type&amp;thatfile=$thatfile&amp;letters=$letters&amp;l=$l&amp;a=$a&amp;quid=$quid&amp;q=$q&amp;diff=$diff&amp;blog=$blog\">accept &amp; chat</a>

<a class=\"refresh\" style=\"font-weight: normal;\" href=\"$moof?activity=chatdecline&amp;chatsender=$chatsender&amp;chatid=$chatid&amp;popid=$popid&amp;popflag=yes&amp;chatpass=$chatpass&amp;ses=$ses&amp;roomid=$roomid&amp;tid=$tid&amp;cat=$cat&amp;forum=$forum&amp;pid=$pid&amp;page=$page&amp;pagego=$pagego&amp;mid=$mid&amp;act=$act&amp;id=$id&amp;senduser=$senduser&amp;stringy=$stringy&amp;p=$p&amp;imid=$imid&amp;user=$user&amp;albumid=$albumid&amp;albumidb=$albumidb&amp;update=$update&amp;type=$type&amp;thatfile=$thatfile&amp;letters=$letters&amp;quid=$quid&amp;a=$a&amp;l=$l&amp;q=$q&amp;diff=$diff&amp;blog=$blog\">decline</a>

<a class=\"refresh\" style=\"font-weight: normal;\" href=\"$moof?activity=chatblock&amp;chatsender=$chatsender&amp;chatid=$chatid&amp;popid=$popid&amp;popflag=yes&amp;chatpass=$chatpass&amp;ses=$ses&amp;roomid=$roomid&amp;tid=$tid&amp;cat=$cat&amp;forum=$forum&amp;pid=$pid&amp;page=$page&amp;pagego=$pagego&amp;mid=$mid&amp;act=$act&amp;id=$id&amp;senduser=$senduser&amp;stringy=$stringy&amp;p=$p&amp;imid=$imid&amp;user=$user&amp;albumid=$albumid&amp;albumidb=$albumidb&amp;update=$update&amp;type=$type&amp;thatfile=$thatfile&amp;letters=$letters&amp;quid=$quid&amp;a=$a&amp;l=$l&amp;q=$q&amp;diff=$diff&amp;blog=$blog\">decline &amp; block</a>

</p></body></html>";


exit;
}


$querypop = "SELECT * from poppers where userto='$login' order by id desc limit 1";
$resultpop = mysql_query($querypop);
$popcounter = mysql_num_rows($resultpop);

$poparray = mysql_fetch_array($resultpop);

$popid = $poparray["id"];



$popdate = $poparray["date"];
$popmessage = stripslashes($poparray["message"]);
$popfrom = $poparray["author"];


$query = "UPDATE forum_users set lastactive=now(), location='reading a pop message from $popfrom' where username='$login'";
mysql_query($query);

$query = "UPDATE friends set lastactive=now(), location='reading a pop message from $popfrom' where friendname='$login'";
mysql_query($query);



$moof = $_SERVER["PHP_SELF"];


echo "<p class=\"break\"><i><big>New Pop Message<br/>
From $popfrom!</big></i>$ermsg</p>";


$popmessage = funk_it_up($popmessage, $ses);
$popmessage = add_sicn($popmessage);

echo "<hr/>
<p class=\"breakforum\" style=\"text-align: center;\"><small><b>
$popdate</b></small><br/><b>$popmessage</b></p>


<form class=\"breakforum\" style=\"text-align: center;\" action=\"$moof\" method=\"get\">

<b>reply:</b><br/>
<input type=\"text\" name=\"popmessage\" title=\"Reply\"/>

<br/><input type=\"submit\" class=\"refresh\" value=\"Reply\" class=\"buttstyle\"/>
<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
<input type=\"hidden\" name=\"activity\" value=\"reply\"/>
<input type=\"hidden\" name=\"sendto\" value=\"$popfrom\"/>
<input type=\"hidden\" name=\"popflag\" value=\"yes\"/>
<input type=\"hidden\" name=\"popid\" value=\"$popid\"/>
<input type=\"hidden\" name=\"chatpass\" value=\"$chatpass\"/>
<input type=\"hidden\" name=\"roomid\" value=\"$roomid\"/>
<input type=\"hidden\" name=\"cat\" value=\"$cat\"/>
<input type=\"hidden\" name=\"tid\" value=\"$tid\"/>
<input type=\"hidden\" name=\"page\" value=\"$page\"/>
<input type=\"hidden\" name=\"pagego\" value=\"$pagego\"/>
<input type=\"hidden\" name=\"forum\" value=\"$forum\"/>
<input type=\"hidden\" name=\"pid\" value=\"$pid\"/>
<input type=\"hidden\" name=\"mid\" value=\"$mid\"/>
<input type=\"hidden\" name=\"id\" value=\"$id\"/>
<input type=\"hidden\" name=\"act\" value=\"$act\"/>
<input type=\"hidden\" name=\"senduser\" value=\"$senduser\"/>
<input type=\"hidden\" name=\"stringy\" value=\"$stringy\"/>
<input type=\"hidden\" name=\"p\" value=\"$p\"/>
<input type=\"hidden\" name=\"user\" value=\"$user\"/>
<input type=\"hidden\" name=\"imid\" value=\"$imid\"/>
<input type=\"hidden\" name=\"albumid\" value=\"$albumid\"/>
<input type=\"hidden\" name=\"albumidb\" value=\"$albumidb\"/>
<input type=\"hidden\" name=\"update\" value=\"$update\"/>
<input type=\"hidden\" name=\"type\" value=\"$type\"/>
<input type=\"hidden\" name=\"thatfile\" value=\"$thatfile\"/>
<input type=\"hidden\" name=\"letters\" value=\"$letters\"/>
<input type=\"hidden\" name=\"a\" value=\"$a\"/>
<input type=\"hidden\" name=\"l\" value=\"$l\"/>
<input type=\"hidden\" name=\"quid\" value=\"$quid\"/>
<input type=\"hidden\" name=\"q\" value=\"$q\"/>
<input type=\"hidden\" name=\"diff\" value=\"$diff\"/>
<input type=\"hidden\" name=\"blog\" value=\"$blog\"/>

</fieldset>
</form>
<p class=\"break\" style=\"padding: 3px;\"><a class=\"refresh\" style=\"font-weight: normal;\" href=\"$moof?activity=discard&amp;chatpass=$chatpass&amp;roomid=$roomid&amp;popid=$popid&amp;popflag=yes&amp;ses=$ses&amp;tid=$tid&amp;cat=$cat&amp;forum=$forum&amp;pid=$pid&amp;page=$page&amp;pagego=$pagego&amp;mid=$mid&amp;act=$act&amp;id=$id&amp;senduser=$senduser&amp;stringy=$stringy&amp;p=$p&amp;imid=$imid&amp;user=$user&amp;albumid=$albumid&amp;albumidb=$albumidb&amp;update=$update&amp;type=$type&amp;thatfile=$thatfile&amp;letters=$letters&amp;quid=$quid&amp;a=$a&amp;l=$l&amp;q=$q&amp;diff=$diff&amp;blog=$blog\">throw away</a>

<a class=\"refresh\" style=\"font-weight: normal;\" href=\"$moof?activity=save&amp;popid=$popid&amp;popflag=yes&amp;chatpass=$chatpass&amp;ses=$ses&amp;roomid=$roomid&amp;tid=$tid&amp;cat=$cat&amp;forum=$forum&amp;pid=$pid&amp;page=$page&amp;pagego=$pagego&amp;mid=$mid&amp;act=$act&amp;id=$id&amp;senduser=$senduser&amp;stringy=$stringy&amp;p=$p&amp;imid=$imid&amp;user=$user&amp;albumid=$albumid&amp;albumidb=$albumidb&amp;update=$update&amp;type=$type&amp;thatfile=$thatfile&amp;letters=$letters&amp;quid=$quid&amp;a=$a&amp;l=$l&amp;q=$q&amp;diff=$diff&amp;blog=$blog\">archive it</a></p></body></html>";
exit;
}

?>