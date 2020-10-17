<?php


$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];

if ($ses != "")
{
include('../scripts/ses.php');
}

include('../scripts/main.php');




$stringy = $_GET['stringy'];
$param = $_GET['param'];

$err = $_GET['err'];


$enflag = $_GET['enflag'];

$topage = $_GET['topage'];

$quote = $_GET['quote'];


$stringy = strtolower($stringy);


if ($group < 4)
{





// Get topic info

$query = "SELECT subject, forum, author from phoenix_topics where id='$tid' limit 1";
$result = mysql_query($query);
$row = mysql_fetch_array($result);


$forum = $row["forum"];
$subject = stripslashes($row["subject"]);
$owners = $row["author"];



$query = "SELECT * from phoenix_topics WHERE id='$tid'";
$result =mysql_query($query);
$num_rows =mysql_num_rows($result);
$row = mysql_fetch_array($result);
	$author = $row["author"];
	$seen = $row["views"];
	$type = $row["type"];
	$pollid = $row["pollid"];



if ($login == "$author")
{		
$query = "update phoenix_topics set readstate='1' where id=$tid AND author='$login'";
mysql_query($query);
}

$query = "update phoenix_subscriptions set readstate='1' where itemid=$tid AND username='$login'";
mysql_query($query);


	if ($param == "subject")
	{
	$subject = strtolower($subject);
	$subject = str_replace( "$stringy", "$stringy", $subject );
	$subject = funk_it_up($subject, $ses);
	}








if ($err != "") $err = "<br/><small><b>$err</b></small>";


echo "<p class=\"break\">";
echo "<big><b>$subject</b></big>$inboxes$err</p><hr/>";


if ($ses != "")
{

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

}








if ($type == "poll")
{
$qx = "select * from phoenix_polls_voters where login='$login' AND pollid='$pollid'";
$rx = mysql_query($qx);
$xcount = mysql_num_rows($rx);

if ($xcount > 0)
{
$vote = "cast";
}
else
{
$vote = "";
}

$_GET["pollid"] = "$pollid";
$_GET["vote"] = "$vote";
include("poller.php");
}








if ($ses != "")
{
if ($forum != "adminx1")
{

$query = "UPDATE friends set lastactive=now(), location='reading $subject by $author' where friendname='$login'";
mysql_query($query);

$query = "UPDATE forum_users set lastactive=now(), location='reading $subject by $author' where username='$login'";
mysql_query($query);

}
}
// Setting up pagination

$query = "SELECT count(*) from phoenix_posts WHERE tid='$tid'";
$result =mysql_query($query);
$row =mysql_fetch_array($result);
$count = $row[0];

if ($page == "")
{
$query = "update phoenix_topics set views=views+1";
mysql_query($query);
}





if (empty($page) || ($page < 1)) $page = 1; $max = $pmax; if (empty($start)) $start = ($page-1) * $max;



$query = "SELECT * from phoenix_posts WHERE tid='$tid' ORDER BY stamp ASC LIMIT $start, $max";
$result =mysql_query($query);
$num_rows =mysql_num_rows($result);
$row = mysql_fetch_array($result);



// Compiling top of page navigation.


		


		if ($count > $max) 
		{
		echo  "<p class=\"breakforum\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $max);
		}

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"./threads.php?ses=$ses&amp;cat=$cat&amp;stringy=$stringy&amp;tid=$tid&amp;topage=$topage&amp;page=$counter&amp;forum=$forum\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}





while ($row)
	{
	$mid = $row["id"];
	$weply = $row["reply"];
       	$postdate = $row["postdate"];
       	$author = $row["author"];
       	$postby = $row["author"];
	$message = stripslashes($row["message"]);
       	$gro = $row["ugroup"];
       	$mcol = $row["my_color"];




#========admin number======&#178;======================


	if ($param == "message")
	{
	$message = strtolower($message);
	}




	$message = funk_it_up($message, $ses);

	$message = add_sicn($message);





	if ( $weply > 0 ) $cluck = "Reply #$weply";
	else $cluck = "Topic #$tid";



$ad = "$author";
	


	

		$queryx = "SELECT title, posts, userlevel FROM forum_users WHERE username='$author' ";
		$resultx = mysql_query("$queryx");
		$numx = mysql_fetch_array($resultx);
		$tittlea = $numx["title"];
		$posts = $numx["posts"];
		$userlevel = $numx["userlevel"];




					if ($posts < $globalposts)
					{
					$querymt = "SELECT title FROM membertitles WHERE postcount<'$posts' ORDER BY POSTCOUNT DeSC LIMIT 1";
					$resultmt = mysql_query("$querymt");
					$nummt = mysql_fetch_array($resultmt);
					$tittle = $nummt["title"];
					}
					else
					{
					$tittle = "$tittlea";
					}






if ($group > 1)
{
	if ($author == "$login")
	{ 
	$dellink = "<br/><small>(<a href=\"./insert.php?ses=$ses&amp;pid=$mid&amp;tid=$tid&amp;act=delrep&amp;forum=$forum\">delete</a>-<a href=\"./insert.php?ses=$ses&amp;pid=$mid&amp;tid=$tid&amp;act=elquote&amp;forum=$forum&amp;page=$page\">quote</a>-<a href=\"#bottom\">reply</a>-<a href=\"./edit.php?ses=$ses&amp;page=$page&amp;forum=$forum&amp;mid=$mid&amp;tid=$tid\">edit</a>)</small>";
	}
	else
	{
	$dellink = "<br/><small>(<a href=\"./insert.php?ses=$ses&amp;pid=$mid&amp;tid=$tid&amp;act=elquote&amp;forum=$forum&amp;page=$page\">quote</a>-<a href=\"#bottom\">reply</a>)</small>";
	}
}
else
{
	if ($author == "$login")
	{ 

	$dellink = "<br/><small>(<a href=\"./insert.php?ses=$ses&amp;pid=$mid&amp;tid=$tid&amp;act=delrep&amp;forum=$forum\">delete</a>-<a href=\"./insert.php?ses=$ses&amp;pid=$mid&amp;tid=$tid&amp;act=elquote&amp;forum=$forum&amp;page=$page\">quote</a>-<a href=\"#bottom\">reply</a>-<a href=\"./edit.php?ses=$ses&amp;page=$page&amp;forum=$forum&amp;mid=$mid&amp;tid=$tid\">edit</a>)</small>";

	}

	else
	{
		if ($userlevel < 2)
		{


		$dellink = "<br/><small>(<a href=\"./insert.php?ses=$ses&amp;pid=$mid&amp;tid=$tid&amp;act=elquote&amp;forum=$forum&amp;page=$page\">quote</a>-<a href=\"#bottom\">reply</a>)</small>";

		}
		else
		{

		$dellink = "<br/><small>(<a href=\"./insert.php?ses=$ses&amp;pid=$mid&amp;tid=$tid&amp;act=delrep&amp;forum=$forum\">delete</a>-<a href=\"./insert.php?ses=$ses&amp;pid=$mid&amp;tid=$tid&amp;act=elquote&amp;forum=$forum&amp;page=$page\">quote</a>-<a href=\"#bottom\">reply</a>-<a href=\"./edit.php?ses=$ses&amp;page=$page&amp;forum=$forum&amp;mid=$mid&amp;tid=$tid\">edit</a>)</small>";

		}

	}
}









     echo "<table class=\"breakforum\" width=\"100%\"><tr><td><small><b>$cluck by </b></small><b><a href=\"../profile.php?ses=$ses&amp;cat=$cat&amp;stringy=$stringy&amp;tid=$tid&amp;user=$author&amp;f=trd&amp;ref=sfor&amp;topage=$topage\">$ad</a></b>$dellink

<br/><small><i>$tittle - Score: $posts</i></small><br/><small><b>$postdate</b></small>";


		$query = "SELECT * FROM ignorance WHERE login='$login' AND ignored='$author' ";
		$resultcunt = mysql_query("$query");
		$num_rowscunt = mysql_num_rows ($resultcunt);





		if ($group == 1) $num_rowscunt = "0";

		if ($num_rowscunt >= 1)
				{
    			    echo "<br/><br/>msg(ignored);</td></tr></table>";
				}
		else
				{


    			    echo "<br/><br/>$message</td></tr></table>";
				}


         $row = mysql_fetch_array($result);
         }



$query = "SELECT * from phoenix_topics WHERE id='$tid'";
$result =mysql_query($query);
$num_rows =mysql_num_rows($result);
$row = mysql_fetch_array($result);
       	$lock = $row["locked"];


		if ($count > $max) 
		{
		echo  "<p class=\"breakforum\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $max);
		}

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"./threads.php?ses=$ses&amp;cat=$cat&amp;stringy=$stringy&amp;tid=$tid&amp;topage=$topage&amp;page=$counter&amp;forum=$forum\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}




if ($ses != "")
{
	if ($lock == "no")
	{
		if ($quote != "")
		{
		$quote = "[q] $quote [/q]";
		}
		$secret=md5(uniqid(rand(), true));
		$_SESSION['FORM_SECRET']=$secret;

		$formkey = $_SESSION['FORM_SECRET'];

		$quote = stripslashes("$quote");


if ($enflag != "yes") $enlink = " [<a href=\"./insert.php?ses=$ses&amp;pid=$mid&amp;tid=$tid&amp;act=enhance&amp;forum=$forum&amp;page=$page\">go advanced</a>]";
else $enlink = " [<a href=\"./threads.php?ses=$ses&amp;pid=$mid&amp;tid=$tid&amp;forum=$forum&amp;page=$page#bottom\">go basic</a>]";

		echo "<p class=\"break\" style=\"text-align: left;\"><b><big>reply</big> $enlink</b></p>";
		echo "<form class=\"breakforum\" id=\"bottom\" action=\"./insert.php?ses=$ses&amp;cat=$cat&amp;tid=$tid&amp;forum=$forum&amp;act=reply\" method=\"post\" enctype=\"multipart/form-data\">
		<fieldset>
		<textarea name=\"message\" rows=\"3\" cols=\"20\">$quote</textarea>";
			if ($enflag == "yes")
			{
			echo "<br/><b>icon:</b><br/><select name=\"inserticon\" title=\"insert icon?\" class=\"textbox\">
			<option value=\"\">no icon</option>";

			$query = "SELECT * from phoenix_icons where typed LIKE '=%' ORDER BY typed ASC";
			$result = mysql_query($query);
			$num_rows = mysql_num_rows($result);
			$rowicons = mysql_fetch_array($result);

				while ($rowicons)
      				{
       				$typed = $rowicons["typed"];
				$typedx = str_replace("=","","$typed");
				$typedx = ucfirst("$typedx");

       				echo "<option value=\"$typed\">$typedx</option>";

       				$rowicons = mysql_fetch_array($result);
      				}

			echo "</select><br/>";


			$query = "SELECT count(*) from phoenix_imagealbums WHERE login='$login'";
			$result = mysql_query($query);
			$hasalbumcount = number_format(mysql_result($result,0,"count(*)"));

				if ($hasalbumcount > 0)
				{
				echo "<b>attach a photo?</b><small>(gif or jpg)</small><br/>
				<input type=\"file\" name=\"file\"/>";
				}

			} // enflag



			echo "<br/><input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
			<input type=\"hidden\" name=\"cat\" value=\"$cat\"/>
			<input type=\"hidden\" name=\"tid\" value=\"$tid\"/>
			<input type=\"hidden\" name=\"forum\" value=\"$forum\"/>
			<input type=\"hidden\" name=\"act\" value=\"reply\"/>
			<input type=\"hidden\" name=\"page\" value=\"$page\"/>
			<input type=\"hidden\" name=\"formkey\" value=\"$formkey\"/>";

			echo "<input type=\"submit\" name=\"normal\" class=\"buttstyle\" value=\"add reply\"/>";
			echo "</fieldset></form>";
	}
	else
	{
	echo "<p class=\"breakforum\" style=\"text-align: center;\">Topic Locked - new messages cannot be added.</p>";
	}

}
else
{
echo "<p class=\"breakforum\" style=\"text-align: center;\"><b><big>Please <a href=\"../register.php\">sign up</a> to take part in this conversation!</big></b></p>";
}








// Compiling the bottom of page links.

echo "<p class=\"break\" style=\"text-align: left;\">";


               
               




       $query = "SELECT * from phoenix_forums WHERE forum='$forum'";
       $result =mysql_query($query);
       $num_rows =mysql_num_rows($result);
       $ro = mysql_fetch_array($result);

	$forumfriendly = $ro['name'];



echo "<iframe src=\"http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fphoenixbytes.co.uk%2Fforum%2F$tid&amp;layout=button_count&amp;show_faces=false&amp;width=90&amp;action=like&amp;font=tahoma&amp;colorscheme=light&amp;height=20\" scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden; width:90px; height:20px;\" allowTransparency=\"true\"></iframe><br/>";



if ( $group < 2 )
{
if ($ses != "") echo "$hyfor <a href=\"options.php?ses=$ses&amp;cat=$cat&amp;stringy=$stringy&amp;forum=$forum&amp;tid=$tid&amp;author=$author&amp;topage=$topage\">administration</a><br/>";
}



if ($ses != "") $mainmenu = "$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";
else  $mainmenu = "$hyback <a href=\"../index.php\">main menu</a>";








       $querybeef = "SELECT * from phoenix_subscriptions where username='$login' AND itemid='$tid'";
       $resultbeef =mysql_query($querybeef);
       $beefrows =mysql_num_rows($resultbeef);



if ($login != "$owners")
{

if ($beefrows > 0) $subeef = "$hyfor <a href=\"./insert.php?ses=$ses&amp;act=unsubscribe&amp;tid=$tid&amp;cat=$cat&amp;forum=$forum\">stop updates</a><br/>";
else $subeef = "$hyfor <a href=\"./insert.php?ses=$ses&amp;act=subscribe&amp;tid=$tid&amp;cat=$cat&amp;forum=$forum\">get updates</a><br/>";

}




echo "$subeef$hyback <a href=\"topics.php?ses=$ses&amp;cat=$cat&amp;stringy=$stringy&amp;forum=$forum&amp;page=$topage\">back to &quot;$forumfriendly&quot;</a><br/>
$hyback <a href=\"../forum/forums.php?ses=$ses\">message boards</a><br/>";
echo "$mainmenu<br/><div style=\"text-align: center;\"><b>Forum Link Code<br/></b><input type=\"text\" readonly=\"yes\" style=\"text-align: center; font-weight: bold;\" value=\"topic:$tid\"/>
<br/><small><b><a href=\"./formatting.php?ses=$ses#forumlink\">what's this?</a></b></small></div></p>








</body></html>";


}
else
{



	echo "<p class=\"break\"><img src=\"../scripts/phoenix.php?string=account%20restricted!&amp;login=$login\" alt=\"account%20restricted!\"/></p><hr/>
	<p class=\"breakforum\" style=\"text-align: center;\">";

	echo "Sorry, your account appears to be restricted, this may be due to misconduct on your part or an error on our part.<br/><br/>
	During the period of restriction you will be unable to use the Message Boards and some other functions of this site, this is for the protection of other users.<br/><br/>
	If you feel that this is an error and you have done nothing wrong please contact an administrator.";

	echo "</p><hr/><p class=\"break\">$breaker$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>$shortcuts</p></body></html>";
	exit;




}






?>
