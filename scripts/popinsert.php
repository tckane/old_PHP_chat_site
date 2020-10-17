<?php



$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];




$chatpass = $_GET["chatpass"];
if ($chatpass == "") $chatpass = $_POST["chatpass"];

$chatid = $_GET["chatid"];
if ($chatid == "") $chatid = $_POST["chatid"];



$chatsender = $_GET["chatsender"];
if ($chatsender == "") $chatsender = $_POST["chatsender"];


$popflag = $_POST["popflag"];
if ($popflag == "") $popflag = $_GET["popflag"];

$popid= $_POST["popid"];
if ($popid == "") $popid = $_GET["popid"];

$popmessage = mysql_real_escape_string($_POST["popmessage"]);
if ($popmessage == "") $popmessage = mysql_real_escape_string($_GET["popmessage"]);


$act = $_POST["act"];
if ($act == "") $act = $_GET["act"];


$sendto = $_POST["sendto"];
if ($sendto == "") $sendto = $_GET["sendto"];

$roomid = $_POST["roomid"];
if ($roomid == "") $roomid = $_GET["roomid"];

$activity = $_POST["activity"];
if ($activity == "") $activity = $_GET["activity"];

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

$pid = $_GET["pid"];
if ($pid == "") $pid = $_POST["pid"];

$mid = $_GET["mid"];
if ($mid == "") $mid = $_POST["mid"];
$blog = $_GET["blog"];
if ($blog == "") $blog = $_POST["blog"];

$act = $_GET["act"];
if ($act == "") $act = $_POST["act"];

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


$moof = $_SERVER["PHP_SELF"];

$vday = date("D");

if ($vday == "Mon") $day = "monday";
elseif ($vday == "Tue") $day = "tuesday";
elseif ($vday == "Wed") $day = "wednesday";
elseif ($vday == "Thu") $day = "thursday";
elseif ($vday == "Fri") $day = "friday";
elseif ($vday == "Sat") $day = "saturday";
elseif ($vday == "Sun") $day = "sunday";


$vmonth = date("M");

if ($vmonth == "Jan") $month = "january";
elseif ($vmonth == "Feb") $month = "february";
elseif ($vmonth == "Mar") $month = "march";
elseif ($vmonth == "Apr") $month = "april";
elseif ($vmonth == "May") $month = "may";
elseif ($vmonth == "Jun") $month = "june";
elseif ($vmonth == "Jul") $month = "july";

elseif ($vmonth == "Aug") $month = "august";
elseif ($vmonth == "Sep") $month = "september";
elseif ($vmonth == "Oct") $month = "october";
elseif ($vmonth == "Nov") $month = "november";
elseif ($vmonth == "Dec") $month = "december";

$number = date("jS");
$rawdate = "$day, $month $number";
$date = "<small>$rawdate</small>";

$momo = date("m");
$dada = date("d");
$yaya = date("Y");
$seconds = date("s");
$time = date("H:i");


$msgsandposts = "$day $number $month $yaya @ $time";

$imgsdate = "$day $number $month $yaya";



///////////////////////////
$query = "SELECT * from forum_users where ses='$ses'";
$result = mysql_query ("$query");
$rowses = mysql_fetch_array($result);
$session = mysql_num_rows($result);

$login = $rowses['username'];
$group = $rowses['group'];



if ($popflag == "yes")
{
/////////////////////////////////////////////////////////////////////////////

	if ($activity == "reply")
	{
	if ($popmessage != "")
		{

		$queryvv = "SELECT * from poppers where userto='$sendto' and message='$popmessage'";
		$resultvv = mysql_query($queryvv);
		$numvv = mysql_num_rows($resultvv);

		if ($numvv < 1)
		{
		$qui = "insert into poppers (userto, author, message, date) values ('$sendto', '$login', '$popmessage', '$msgsandposts')";
		$res = mysql_query($qui);

			/// score - credit

			$query = "update forum_users set posts=posts+10, credits=credits+5 where username='$login'";
			mysql_query($query);

			///
		}



		if ($res > 0)
			{
			mysql_query("delete from poppers where id='$popid' and userto='$login'");
			}



		$url = "$moof?ses=$ses&blog=$blog&chatpass=$chatpass&tid=$tid&roomid=$roomid&cat=$cat&forum=$forum&pid=$pid&page=$page&pagego=$pagego&mid=$mid&act=$act&id=$id&senduser=$senduser&stringy=$stringy&p=$p&albumid=$albumid&imid=$imid&user=$user&albumidb=$albumidb&update=$update&type=$type&thatfile=$thatfile&letters=$letters&l=$l&a=$a&quid=$quid&q=$q&diff=$diff";
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}
		else
		{
		$url = "$moof?ses=$ses&blog=$blog&chatpass=$chatpass&tid=$tid&roomid=$roomid&cat=$cat&forum=$forum&pid=$pid&page=$page&pagego=$pagego&mid=$mid&act=$act&id=$id&senduser=$senduser&stringy=$stringy&p=$p&albumid=$albumid&imid=$imid&user=$user&albumidb=$albumidb&update=$update&type=$type&thatfile=$thatfile&letters=$letters&l=$l&a=$a&quid=$quid&q=$q&diff=$diff";
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		}
	}




	if ($activity == "save")
	{

		$querychat = "SELECT * from poppers where id='$popid'";
		$resultchat = mysql_query($querychat);
		$fetcharray = mysql_fetch_array($resultchat);
		$popmessage = $fetcharray["message"];
		$popfrom = $fetcharray["author"];


		$qui = "insert into phoenix_mail (userto, author, message, sentdate, subject, archive) values ('$login', '$popfrom', '$popmessage', '$msgsandposts', 'Saved Pop Message', 'yes')";
		$res = mysql_query($qui);
		
		
		mysql_query("delete from poppers where id=$popid and userto='$login'");
		



		$url = "$moof?ses=$ses&blog=$blog&chatpass=$chatpass&tid=$tid&cat=$cat&roomid=$roomid&forum=$forum&pid=$pid&page=$page&pagego=$pagego&mid=$mid&act=$act&id=$id&senduser=$senduser&stringy=$stringy&p=$p&albumid=$albumid&imid=$imid&user=$user&albumidb=$albumidb&update=$update&type=$type&thatfile=$thatfile&letters=$letters&l=$l&a=$a&quid=$quid&q=$q&diff=$diff";
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		
	}




	if ($activity == "discard")
	{

		
		mysql_query("delete from poppers where id=$popid and userto='$login'");
		



		$url = "$moof?ses=$ses&blog=$blog&chatpass=$chatpass&tid=$tid&cat=$cat&roomid=$roomid&forum=$forum&pid=$pid&page=$page&pagego=$pagego&mid=$mid&act=$act&id=$id&senduser=$senduser&stringy=$stringy&p=$p&albumid=$albumid&imid=$imid&user=$user&albumidb=$albumidb&update=$update&type=$type&thatfile=$thatfile&letters=$letters&l=$l&a=$a&quid=$quid&q=$q&diff=$diff";
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		
	}





	if ($activity == "chataccept")
	{

		mysql_query("delete from chatinvites where id='$chatid'");

		$querychatroom = "SELECT * from chatrooms where id='$roomid' LIMIT 1";
		$resultchatroom = mysql_query ("$querychatroom");
		$ropechatroom = mysql_fetch_array($resultchatroom);


		$roomname = $ropechatroom["roomname"];

		$queryx ="INSERT INTO chatmsgs ( username , msg , timestamp, roomid ) values ( 'System', '(b)$login(/b) entered $roomname!', now(), '$roomid' )";
		mysql_query($queryx);


		$xurl = "http://phoenixbytes.co.uk/chat/chat.php?ses=$ses&blog=$blog&chatpass=$chatpass&tid=$tid&cat=$cat&roomid=$roomid&chatid=$chatid&forum=$forum&pid=$pid&page=$page&pagego=$pagego&mid=$mid&act=$act&id=$id&senduser=$senduser&stringy=$stringy&p=$p&albumid=$albumid&imid=$imid&user=$user&albumidb=$albumidb&update=$update&type=$type&thatfile=$thatfile&letters=$letters&l=$l&a=$a&quid=$quid&q=$q&diff=$diff";
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $xurl");
		exit;
		
	}



	if ($activity == "chatdecline")
	{

		
		mysql_query("delete from chatinvites where id='$chatid'");


		$declinedmessage ="INSERT INTO chatmsgs ( username , msg , timestamp, roomid, private, userto ) values ( 'System', 'Sorry, but (b)$login(/b) has turned down your chat invitation.', now(), '$roomid', 'yes', '$chatsender' )";
		mysql_query($declinedmessage);



		$url = "$moof?ses=$ses&blog=$blog&chatpass=$chatpass&tid=$tid&cat=$cat&roomid=$roomid&forum=$forum&pid=$pid&page=$page&pagego=$pagego&mid=$mid&act=$act&id=$id&senduser=$senduser&stringy=$stringy&p=$p&albumid=$albumid&imid=$imid&user=$user&albumidb=$albumidb&update=$update&type=$type&thatfile=$thatfile&letters=$letters&l=$l&a=$a&quid=$quid&q=$q&diff=$diff";
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		
	}



////////////////////////////////////////////////////////////////////////////



	if ($activity == "chatblock")
	{

		
		mysql_query("delete from chatinvites where id='$chatid'");


		$queryvv = "SELECT * from chatignore where username='$login' and ignored='$chatsender'";
		$resultvv = mysql_query($queryvv);
		$numvv = mysql_num_rows($resultvv);

			if ($numvv < 1)
			{
			$chatblockinsert ="INSERT INTO chatignore ( username, ignored ) values ( '$login', '$chatsender' )";
			mysql_query($chatblockinsert);
			}
		


		$declinedmessage ="INSERT INTO chatmsgs ( username , msg , timestamp, roomid, private, userto ) values ( 'System', 'Sorry, but (b)$login(/b) has turned down your chat invitation and has (b)blocked(/b) all future invites from you, sorry about that.', now(), '$roomid', 'yes', '$chatsender' )";
		mysql_query($declinedmessage);



		$url = "$moof?ses=$ses&blog=$blog&chatpass=$chatpass&tid=$tid&cat=$cat&roomid=$roomid&forum=$forum&pid=$pid&page=$page&pagego=$pagego&mid=$mid&act=$act&id=$id&senduser=$senduser&stringy=$stringy&p=$p&albumid=$albumid&imid=$imid&user=$user&albumidb=$albumidb&update=$update&type=$type&thatfile=$thatfile&letters=$letters&l=$l&a=$a&quid=$quid&q=$q&diff=$diff";
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url");
		exit;
		
	}






}
?>