<?php


$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];



if ($ses != "")
{
include("../scripts/ses.php");
}

include("../scripts/waawaamp.php");






$login = $row_ses["username"];
$group = $row_ses["userlevel"];
$bco = $row_ses["bg_col"];
$nam = $row_ses["my_color"];
$act = $_GET["act"];



if ($act == "")
{


$query = "SELECT * from my_blog WHERE id = '$id' ";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

$updated = $row["date"];
$title = $row["title"];
$msg = $row["blog"];
$author = $row["login"];
$id = $row["id"];
$col = $row["my_color"];

if ($col == "$bco") $nco = "$nam";
else $nco = "$col";




if ($author == "$login") 
{
$bloop = "own";
$their = "Your";
}
else
{
$bloop = "$author&#39;s";
$their = "$author&#39;s";
}

	$msg = funk_it_up($msg, $ses);
	$msg = add_sicn($msg, $ses);

$act_query = "UPDATE forum_users set lastactive=now(), location='reading $bloop blog' where username='$login'";
mysql_query($act_query);

$act_query = "UPDATE friends set lastactive=now(), location='reading $bloop blog' where friendname='$login'";
mysql_query($act_query);

echo "<p class=\"break\"><big>$title</big>$inboxes$breaker</p><hr/>";

echo "<p class=\"breakforum\">
<b>By: </b><a href=\"../profile.php?ses=$ses&amp;user=$author&amp;ref=blog\"><span style=\"font-weight: bold;\">$author</span></a><br/>
	<b>date: </b>$updated</p>


<p class=\"breakforum\">$msg<br/>
<iframe align=\"middle\" src=\"http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fphoenixbytes.co.uk%2Fblog%2F$id&amp;layout=button_count&amp;show_faces=false&amp;width=70&amp;action=like&amp;font=tahoma&amp;colorscheme=light&amp;height=20\" scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden; width:70px; height:20px;\" allowTransparency=\"true\"></iframe>
</p>




<hr/>


";



if ($user == "")
{
$user = "$login";

}
$queryx = "SELECT * from phoenix_comments where profile='$user' AND type='blog' AND blogid='$id' ORDER BY id DESC";
$resultx = mysql_query ("$queryx");
$num_rows = mysql_num_rows($resultx);
$comments = mysql_fetch_array($resultx);
$addlink = "<br/><a href=\"#addcomment\">add comment</a><br/>";
if ($num_rows < 1)
{ $commalt = "<p class=\"breakforum\" style=\"text-align: center;\"><b>$user has no comments.</p>"; }

echo "<p class=\"break\"><big><img src=\"../images/mainmenu/listview/speech_bubble_text.gif\" alt=\" comments \"/> <b>Comments</b></big>$addlink</p>$commalt";
while ($comments)	
{ $userperson = $comments["username"];
$comment = $comments["msg"];
$comment = stripslashes("$comment");
$when = $comments["friendlytime"];
$commid = $comments["id"];


$comment = funk_it_up($comment, $ses);
$comment = add_sicn($comment);




if ($user == "$login") 
{
echo "<p class=\"breakforum\"><b><a href=\"../profile.php?ses=$ses&amp;user=$userperson\">$userperson</a> </b> $comment<br/><small><i>($when <a href=\"$hoster/blog/blogcom.php?ses=$ses&amp;user=$user&amp;act=delcomm&amp;commid=$commid&amp;id=$id\">delete?</a>)</i></small></p>";
}
else
{
echo "<p class=\"breakforum\"><b><a href=\"../profile.php?ses=$ses&amp;user=$userperson\">$userperson</a> </b> $comment<br/><small><i>($when)</i></small></p>"; }
$comments = mysql_fetch_array($resultx); 
}



if ($num_rows > 29) 
{ $queryx = "DELETE from phoenix_comments where profile='$user' AND type='blog' ORDER BY id ASC LIMIT 1";
$resultx = mysql_query ("$queryx"); }
echo "<form class=\"breakforum\" style=\"text-align: center;\" action=\"$hoster/blog/blogcom.php?ses=$ses\" method=\"get\">
<fieldset>
<textarea id=\"addcomment\" name=\"addcomment\" rows=\"2\" cols=\"20\"></textarea>
<br/>
<input type=\"hidden\" value=\"$ses\" name=\"ses\"/>
<input type=\"hidden\" value=\"comm\" name=\"act\"/>
<input type=\"hidden\" value=\"$user\" name=\"user\"/>
<input type=\"hidden\" value=\"$id\" name=\"id\"/>
<input type=\"submit\" value=\"add comment\"/></fieldset></form></td></tr></table><hr/>";




if ($ses != "")
{
	if ($login == "$user")
	{
$query = "UPDATE phoenix_comments set readstate='1' where profile='$user' AND type='blog' AND blogid='$id'";
mysql_query($query);
	}
}




echo "<p class=\"break\">";




if ($ses != "")
{
$mainmenu = "$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";
}
else
{
$mainmenu = "$hyback <a href=\"../index.php\">main menu</a>";
}





if ($author == "$login")
   {

	echo "$hyfor <a href=\"./add.php?ses=$ses&amp;act=sortit&amp;id=$id&amp;update=$updated\">edit this</a><br/>";
	echo "$hyfor <a href=\"./insert.php?ses=$ses&amp;act=delete&amp;id=$id\">delete this</a><br/>";
	echo "$hyfor <a href=\"./add.php?ses=$ses&amp;act=add&amp;user=$user\">insert new entry</a><br/>";
   }
	else
	{
	if ($ses != "") echo "$hyfor <a href=\"./index.php?ses=$ses&amp;act=blogs&amp;user=$login\">go to my blog</a><br/>";
	}

echo "$hyback <a href=\"./index.php?ses=$ses&amp;user=$user\">$user's blog</a><br/>
$mainmenu<br/><div style=\"text-align: center;\"><b>Forum Link Code<br/></b><input type=\"text\" readonly=\"yes\" style=\"text-align: center; font-weight: bold;\" value=\"blog:$id\"/>
<br/><small><b><a href=\"./formatting.php?ses=$ses#forumlink\">what's this?</a></b></small></div></p></body></html>";
}




if ($act == "about")
{



echo "<p class=\"break\"><b><big>About Blogs</big></b>
<br/><small><a href=\"../about.php?ses=$ses&amp;act=about\">help menu</a></small></p><hr/>
<p class=\"breakforum\" style=\"text-align: center;\"><b><big>Everything you need to know about your blog.</big></b></p>
<p class=\"breakforum\">
<b>What is it?</b> - <i>it's your personal web log, like an online diary, except instead of locking it up or hiding it under the floorboards, your supposed to share these with the world.</i><br/><br/>
<b>Where is it?</b> - <i>main menu! - also, your last 5 blog entries will appear on your <a href=\"../profile.php?ses=$ses&amp;user=$login\">profile</a>, from there, others can click into your blog and read all the entries contained within.</i><br/><br/>
<b>Who can see it?</b> - <i>everyone can see it unless you choose otherwise. you can restrict access to your blog in two ways; either remove the 
<a href=\"../options/options.php?ses=$ses&amp;act=chunks&amp;camefrom=blog\">blog chunk</a> from your profile so nobody can access it or 
<a href=\"../options/options.php?ses=$ses&amp;act=access&amp;camefrom=blog\">restrict access</a> to your profile from 'public' to either 'friends' or 'nobody at all'.</i><br/><br/>
<b>Maintaining My Blog</b> - <i>you can edit or delete each entry, there isn't much else you need.</i><br/><br/>


<b>Extra Help</b> - <i>if you have questions or need help with your blog, feel free to send a message to <a href=\"../mail/index.php?ses=$ses&amp;senduser=$PHNAME&amp;act=presetuser\">$PHNAME</a>.</i>
</p><hr/><p class=\"break\">
    $hyback <a href=\"index.php?ses=$ses&amp;user=$user\">back</a><br/>
    $hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
exit;




}
?>

