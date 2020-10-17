<?php

include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/main.php');

$moof = $_GET["moof"];


$chatpass = $_GET["chatpass"];



$roomid = $_GET['roomid'];
if ($roomid == "")
{ $roomid = $_POST['roomid']; }

if ($bwmode == "off") $subtite = "<img src=\"../scripts/phoenix.php?login=$login&amp;string=BB%20Codes\" alt=\"BB Codes\" align=\"middle\"/>";
else $subtite = "<b><big>BB Codes</big></b>";



$act_query = "UPDATE forum_users set lastactive=now(), location='help', room='' where username='$login'";
mysql_query($act_query);

$act_query = "UPDATE friends set lastactive=now(), location='help', room='' where friendname='$login'";
mysql_query($act_query);



echo "<p class=\"break\">$subtite$inboxes$breaker<br/><small><a href=\"../about.php?ses=$ses&amp;act=about\">help menu</a></small></p><hr/>


<p class=\"breakforum\" style=\"text-align: center;\"><b>These codes can be typed into forum messages, comments, mail messages and blog entries to alter the way text is rendered onscreen, you can do bold, underlined, italic, scrolling text etc.<br/>
Please use the Test Forum if you want to play about with these.</b></p>


<p class=\"break\">
<b>Basic Formatting</b></p>

<p class=\"breakforum\">
<b>bold text</b><br/><b>[b]</b>bold text<b>[/b]</b></p>

<p class=\"breakforum\">
<i>italic text</i><br/><b>[i]</b>italic text<b>[/i]</b></p>

<p class=\"breakforum\">
<u>underlined text</u><br/><b>[u]</b>underlined text<b>[/u]</b></p>

<p class=\"breakforum\">
<big>large text</big><br/><b>[l]</b>large text<b>[/l]</b></p>

<p class=\"breakforum\">
<small>small text</small><br/><b>[s]</b>small text<b>[/s]</b></p>

<p class=\"breakforum\">
<b>[br]</b> creates a carriage return (drop a line)<br/>
<i>a space must be placed before and after this tag!</i></p>

<p class=\"breakforum\">
<i>&quot;...quoted text...&quot;</i><br/><b>[q]</b>quoted text<b>[/q]</b></p>

<p class=\"breakforum\">
<blink>blinking text</blink><br/><b>[blink]</b>flashing text<b>[/blink]</b> or <b>[flash]</b>flashing text<b>[/flash]</b></p>



<p class=\"break\">
<b>Coloured Text</b></p>

<p class=\"breakforum\"><b>
[red]<span style=\"color: #FF0000;\">&#8226;&#8226;&#8226;&#8226;</span>[/red]<br/>
[green]<span style=\"color: #008000;\">&#8226;&#8226;&#8226;&#8226;</span>[/green]<br/>
[yellow]<span style=\"color: #FFFF00;\">&#8226;&#8226;&#8226;&#8226;</span>[/yellow]<br/>
[orange]<span style=\"color: #FF9900;\">&#8226;&#8226;&#8226;&#8226;</span>[/orange]<br/>
[pink]<span style=\"color: #FF1493;\">&#8226;&#8226;&#8226;&#8226;</span>[/pink]<br/>
[blue]<span style=\"color: #0000FF;\">&#8226;&#8226;&#8226;&#8226;</span>[/blue]<br/>
[black]<span style=\"color: #000000;\">&#8226;&#8226;&#8226;&#8226;</span>[/black]<br/>
[white]<span style=\"color: #FFFFFF;\">&#8226;&#8226;&#8226;&#8226;</span>[/white]<br/>
[grey]<span style=\"color: #CCCCCC;\">&#8226;&#8226;&#8226;&#8226;</span>[/grey]<br/>
[cyan]<span style=\"color: #00FFFF;\">&#8226;&#8226;&#8226;&#8226;</span>[/cyan]<br/>
[purple]<span style=\"color: #800080;\">&#8226;&#8226;&#8226;&#8226;</span>[/purple]<br/>
[aqua]<span style=\"color: #05E9FF;\">&#8226;&#8226;&#8226;&#8226;</span>[/aqua]<br/>
[skyblue]<span style=\"color: #87CEEB;\">&#8226;&#8226;&#8226;&#8226;</span>[/skyblue]<br/>
[silver]<span style=\"color: #C0C0C0;\">&#8226;&#8226;&#8226;&#8226;</span>[/silver]<br/>
[greenyellow]<span style=\"color: #ADFF2F;\">&#8226;&#8226;&#8226;&#8226;</span>[/greenyellow]<br/>
[orchid]<span style=\"color: #DA70D6;\">&#8226;&#8226;&#8226;&#8226;</span>[/orchid]<br/>
[gold]<span style=\"color: #FFD700;\">&#8226;&#8226;&#8226;&#8226;</span>[/gold]<br/>
[goldenrod]<span style=\"color: #DAA520;\">&#8226;&#8226;&#8226;&#8226;</span>[/goldenrod]<br/>
[khaki]<span style=\"color: #F0E68C;\">&#8226;&#8226;&#8226;&#8226;</span>[/khaki]<br/>
[magenta]<span style=\"color: #FF00FF;\">&#8226;&#8226;&#8226;&#8226;</span>[/magenta]<br/>
[crimson]<span style=\"color: #DC143C;\">&#8226;&#8226;&#8226;&#8226;</span>[/crimson]<br/>
[sienna]<span style=\"color: #A0522D;\">&#8226;&#8226;&#8226;&#8226;</span>[/sienna]<br/>
[brown]<span style=\"color: #A52A2A;\">&#8226;&#8226;&#8226;&#8226;</span>[/brown]<br/>
[midnight]<span style=\"color: #191970;\">&#8226;&#8226;&#8226;&#8226;</span>[/midnight]<br/>
[lime]<span style=\"color: #00FF00;\">&#8226;&#8226;&#8226;&#8226;</span>[/lime]</b>
</p>



<p class=\"break\">
<b>Scrolling Effects</b></p>




<p class=\"breakforum\">
<marquee loop=\"800\" direction=\"left\">scroll right to left</marquee><br/><b>[scl]</b> scroll right to left <b>[/scl]</b></p>


<p class=\"breakforum\">
<marquee loop=\"800\" bgcolor=\"#FF0000\" direction=\"left\">scroll right to left with coloured background.</marquee><br/><b>[scl:red]</b> scroll right to left with coloured background. <b>[/scl]</b></p>

<p class=\"breakforum\">
<marquee loop=\"800\" direction=\"right\">scroll left to right</marquee><br/><b>[scr]</b> scroll left to right <b>[/scr]</b></p>

<p class=\"breakforum\">
<marquee loop=\"800\" bgcolor=\"#FF9900\" direction=\"right\">scroll left to right with coloured background.</marquee><br/><b>[scr:orange]</b> scroll left to right with coloured background. <b>[/scr]</b></p>

<p class=\"breakforum\" style=\"text-align: center;\">
<i><b>when using scrolling effects, remember to leave a space either side of your scrolling content or it will fail!</i></b></p>
<p class=\"breakforum\">
<b>Colours Available:<br/><br/>
[scl:red] <span style=\"color: #FF0000;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:green] <span style=\"color: #008000;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:yellow] <span style=\"color: #FFFF00;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:orange] <span style=\"color: #FF9900;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:pink] <span style=\"color: #FF1493;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:blue] <span style=\"color: #0000FF;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:black] <span style=\"color: #000000;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:white] <span style=\"color: #FFFFFF;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:grey] <span style=\"color: #CCCCCC;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:cyan] <span style=\"color: #00FFFF;\">&#8226;&#8226;&#8226;&#8226;</span>  [/scl]<br/>
[scl:aqua] <span style=\"color: #05E9FF;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:skyblue] <span style=\"color: #87CEEB;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:silver] <span style=\"color: #C0C0C0;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:greenyellow] <span style=\"color: #ADFF2F;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:orchid] <span style=\"color: #DA70D6;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:gold] <span style=\"color: #FFD700;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:goldenrod] <span style=\"color: #DAA520;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:khaki] <span style=\"color: #F0E68C;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:magenta] <span style=\"color: #FF00FF;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:crimson] <span style=\"color: #DC143C;\">&#8226;&#8226;&#8226;&#8226;</span>  [/scl]<br/>
[scl:sienna] <span style=\"color: #A0522D;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:brown] <span style=\"color: #A52A2A;\">&#8226;&#8226;&#8226;&#8226;</span> [/scl]<br/>
[scl:midnight] <span style=\"color: #191970;\">&#8226;&#8226;&#8226;&#8226;</span>  [/scl]<br/>
[scl:lime] <span style=\"color: #00FF00;\">&#8226;&#8226;&#8226;&#8226;</span>  [/scl]<br/>
</b></p>



<p class=\"break\" id=\"forumlink\">
<b>Forum Link Codes</b></p>




<p class=\"breakforum\">
<b>myphoto:1696</b><br/>link to a photo, codes are available when you view a photo in your albums.</p>

<p class=\"breakforum\">
<b>blog:1696</b><br/>link to a blog entry, codes are shown at the bottom of each entry in your blog.</p>

<p class=\"breakforum\">
<b>topic:1696</b><br/>link to a forum topic, codes are shown at the bottom of each topic below the reply box.</p>

<p class=\"breakforum\">
<b>link:$sitename.co.uk</b><br/>create a clickable web link (no http:// required).</p>


<p class=\"breakforum\">
<b>mail:$PHNAME</b><br/>create link to pre addressed mail message to specified user.</p>

<p class=\"breakforum\">
<b>profile:$PHNAME</b><br/>create link to a user's profile.</p>

<p class=\"breakforum\">
<b>id:$PHNAME</b><br/>create link to a user's Membership ID Card.</p>

<p class=\"breakforum\">
<b>call:07947566690</b><br/>add a Call Number link.</p>


<p class=\"breakforum\">
<b>pbook:07947566690</b><br/>add a Save Number To Phone Contacts link.</p>




<p class=\"break\">
<b>Copy &amp; Paste</b></p>

<p class=\"breakforum\">
<b>[copy]</b> text <b>[/copy]</b><br/>
Creates a text box containing the specified text, this allows for easier copying and pasting, as some phones (i.e. nokia) only support C&amp;P in text boxes.</p>

<p class=\"breakforum\">
<b>[cp]</b> text <b>[/cp]</b><br/>
Creates a text box containing the specified text, a shorthand alternative to <b>[copy]</b>.</p>

<p class=\"breakforum\">
<b>[php]</b> text <b>[/php]</b><br/>
Creates a text box to enable easy Copying and Pasting of PHP code.</p>


<p class=\"breakforum\">
<b>[html]</b> text <b>[/html]</b><br/>
Creates a text box to enable easy Copying and Pasting of HTML, WML or XML code.</p>



<p class=\"breakforum\">
<b>[code]</b> text <b>[/code]</b><br/>
Creates a text box to enable easy Copying and Pasting of other code such as Javascript, mySQL or Python.</p>



<p class=\"break\">
<b>Things To Remember</b></p>

<p class=\"breakforum\">
You can 'nest' BBCode tags like this:<br/>
<b>[u][l]</b>big &amp; underlined<b>[/l][/u]</b></p>


<p class=\"breakforum\">
If you close the tags the wrong way around, like this <b>[u][b]</b>bold &amp; underlined?<b>[/u][/b]</b> it will fail.</p>


<p class=\"breakforum\">
Never put tags before <b>scrolling effects</b>, otherwise it won't scroll, put them inside it instead.</p>

<p class=\"breakforum\">
Allowing spaces between the Codes and the content you are applying to is good practice and will ensure 100% success, for example:<br/>
<b>[b]</b> this <b>[/b]</b> is better than <b>[b]</b>this<b>[/b]</b>.</p>

<p class=\"breakforum\">
All BBCode must be in lower case, UPPER CASE or MiXeD CAsE codes will not work.</p>";

echo "<p class=\"break\">";


if ($moof == "yes")
{
echo"$hyback <a href=\"../chat/chat.php?ses=$ses&amp;roomid=$roomid&amp;chatpass=$chatpass\">chat</a><br/>";
}
else
{
echo "$hyback <a href=\"../about.php?ses=$ses&amp;act=about\">back</a><br/>";
}

echo "$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";
echo "</p></body></html>";







?>

