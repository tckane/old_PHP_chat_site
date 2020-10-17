<?php
$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];




if ($ses != "")
{
include('../scripts/ses.php');
}

include('../scripts/main.php');


//$query = "SELECT * FROM forum_users WHERE ses='$ses' limit 1";
//$result = mysql_query($query);
//$row_ses = mysql_fetch_array($result);

//$filter = $row_ses["filter"];
//$login = $row_ses["username"];
//$err = $_GET['err'];
//$ucol = $row_ses["my_color"];
//$tablecol = $row_ses["tr_col"];
//$txt = $row_ses["text_col"];
//$bgc = $row_ses["bg_col"];
//$tmax = $row_ses["pmax"];


$enflag = $_GET['enflag'];




if ($group < 4)
{






if (empty($page) || ($page < 1)) $page = 1; $max = $tmax;  $start = ($page-1) * $max;

$query = "SELECT * from phoenix_forums where forum='$forum'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$num = mysql_num_rows($result);



if ( $num == 0 )

	{
       	echo "<p class=\"break\">
        <big>Error!</big></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
        This board doesn't exist.<br/>
	Please go back and select another.</p><hr/><p class=\"break\">
        $hyback <a href=\"../forum/forums.php?ses=$ses\">message boards</a><br/>
      $hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>
        </p></body></html>";
        exit;
        }
          



elseif ( $num >= 1 )

	{


	$forum_name = $row["name"];
	$forum = $row["forum"];
	$cat = $row["category"];


if ($ses != "")
{
if ($forum != "adminx1")
{

$query = "UPDATE friends set lastactive=now(), location='browsing posts in $forum_name' where friendname='$login'";
mysql_query($query);

$query = "UPDATE forum_users set lastactive=now(), location='browsing posts in $forum_name' where username='$login'";
mysql_query($query);
}
}


if ($err != "") $err = "<br/><small><b>$err</b></small>";


if ($bwmode == "off")
{
$forumXname = urlencode("$forum_name");
$subtite = "<img align=\"middle\" src=\"../scripts/phoenix.php?string=$forumXname&amp;login=$login\" alt=\"$forum_name\"/>";
}
else 
{
$subtite = "<b><big>$forum_name</big></b>";
}



     	echo "<p class=\"break\">$subtite$inboxes$err</p><hr/>";



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







    	 	$query = "SELECT count(*) from phoenix_topics WHERE forum='$forum'";
      	 	$result =mysql_query($query);
      	 	$row =mysql_fetch_array($result);
      	 	$count = $row[0];


  	     	$query = "SELECT * from phoenix_topics WHERE forum='$forum' AND sticky=0 ORDER BY lastreply DESC LIMIT $start, $max";
  	     	$result =mysql_query($query);
   	    	$num_rows =mysql_num_rows($result);
    	   	$row = mysql_fetch_array($result);




		if ($count > $max) 
		{
		echo  "<p class=\"breakforum\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $max);
		}

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"./topics.php?ses=$ses&amp;forum=$forum&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}








       		$queryas = "SELECT * from phoenix_topics WHERE forum='$forum' AND sticky=1 ORDER BY lastreply DESC limit $max";
       		$resultas =mysql_query($queryas);
       		$num_rowsas =mysql_num_rows($resultas);
       		$rowst = mysql_fetch_array($resultas);

     	  	while ($rowst)
		
		{

       	        $tid1 = $rowst["id"];
       	        $author1 = $rowst["author"];
       	        $lock1 = $rowst["locked"];
      	        $userphoto1 = $rowst["userphoto"];
	        $mcol1 = $rowst["my_color"];
	        $stuck = $rowst["sticky"];
	        $type1 = $rowst["type"];
                         $subject1 = stripslashes(make_wml_compat($rowst["subject"]));

      	 	$querysg = "SELECT * from phoenix_posts WHERE tid='$tid1'";
      	 	$resultsg =mysql_query($querysg);
      	 	$replies1 =mysql_num_rows($resultsg);


      		if ($type1 != "poll") $replies1 = ($replies1 - 1);
		else $replies1 = "$replies1";

                if ($lock1 == "yes") $lo1 = "&nbsp;<small><b><img align=\"middle\" style=\"border: none;\" src=\"../images/topiclocked.gif\" alt=\"[locked]\"/></b></small>";
                else $lo1 = "";

                if ($replies1 >= 1) $posts1 = "$replies1";
                else $posts1 = "";

                if ($stuck >= 1) $stt = "&nbsp;<small><b><img align=\"middle\" style=\"border: none;\" src=\"../images/topicsticky.gif\" alt=\"[sticky]\"/></b></small>";
                else $stt = "";

                if ($type1 == "poll") $po1 = "<small><b><img align=\"middle\" style=\"border: none;\" src=\"../images/topicpoll.gif\" alt=\"[poll]\"/></b></small>";
                else $po1 = "";


	if ($replies1 == "") $replies1 = "";
	else $replies1 = "[$replies1]";



		if ($ses != "")
		{
		echo "<table class=\"breakforum\" width=\"100%\"><tr><td><b><a style=\"text-decoration: none;\" href=\"./threads.php?ses=$ses&amp;cat=$cat&amp;tid=$tid1&amp;topage=$page&amp;forum=$forum\">$subject1</a></b><small>$replies1 by <b><a style=\"text-decoration: none;\" href=\"../profile.php?ses=$ses&amp;cat=$cat&amp;stringy=$stringy&amp;tid=$tid1&amp;user=$author1&amp;f=trd&amp;ref=sfor&amp;topage=$topage\">$author1</a></b>$lo1$stt$po1</small></td></td></tr></table>";
		}
		else
		{
		echo "<table class=\"breakforum\" width=\"100%\"><tr><td><b><a style=\"text-decoration: none;\" href=\"$lback/forum/$tid1\">$subject1</a></b><small>$replies1 by <b><a style=\"text-decoration: none;\" href=\"../profile.php?ses=$ses&amp;cat=$cat&amp;stringy=$stringy&amp;tid=$tid1&amp;user=$author1&amp;f=trd&amp;ref=sfor&amp;topage=$topage\">$author1</a></b>$lo1$stt$po1</small></td></td></tr></table>";
		}


	$rowst = mysql_fetch_array($resultas);
      		}








  






       	if ($num_rows <1) echo "<p class=\"breakforum\" style=\"text-align: center;\">there are no posts to display.</p>";

       	while ($row)

		{





       	        $tid = $row["id"];
       	        $author = $row["author"];
       	        $lock = $row["locked"];
       	        $userphoto = $row["userphoto"];
	        $type = $row["type"];
                $subject = stripslashes(make_wml_compat($row["subject"]));

      	 	$queryss = "SELECT * from phoenix_posts WHERE tid='$tid'";
      	 	$resultss =mysql_query($queryss);
      	 	$replies =mysql_num_rows($resultss);

      		if ($type != "poll") $replies = ($replies - 1);
		else $replies = "$replies";


	

                if ($lock == "yes") $lo = "&nbsp;<small><b><img align=\"middle\" style=\"border: none;\" src=\"../images/topiclocked.gif\" alt=\"[locked]\"/></b></small>";
                else $lo = "";

                if ($type == "poll") $po = "<small><b><img align=\"middle\" style=\"border: none;\" src=\"../images/topicpoll.gif\" alt=\"[poll]\"/></b></small>";
                else $po = "";

                if ($replies >= 1) $posts = "$replies";
                else $posts = "";




	if ($posts == "") $posts = "";
	else $posts = "[$posts]";





if ($ses != "")
{
echo "<table class=\"breakforum\" width=\"100%\"><tr><td><b><a style=\"text-decoration: none;\" href=\"./threads.php?ses=$ses&amp;cat=$cat&amp;tid=$tid&amp;topage=$page&amp;forum=$forum\">$subject</a></b><small>$posts by <b><a style=\"text-decoration: none;\" href=\"../profile.php?ses=$ses&amp;cat=$cat&amp;stringy=$stringy&amp;tid=$tid&amp;user=$author&amp;f=trd&amp;ref=sfor&amp;topage=$topage\">$author</a></b>$lo$po</small></td></td></tr></table>";
}
else
{
echo "<table class=\"breakforum\" width=\"100%\"><tr><td><b><a style=\"text-decoration: none;\" href=\"$lback/forum/$tid\">$subject</a></b><small>$posts by <b><a style=\"text-decoration: none;\" href=\"../profile.php?ses=$ses&amp;cat=$cat&amp;stringy=$stringy&amp;tid=$tid&amp;user=$author&amp;f=trd&amp;ref=sfor&amp;topage=$topage\">$author</a></b>$lo$po</small></td></td></tr></table>";
}


$row = mysql_fetch_array($result);
      	}



		if ($count > $max) 
		{
		echo  "<p class=\"breakforum\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $max);
		}

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"./topics.php?ses=$ses&amp;forum=$forum&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}






//////// TEXT FORM!!
////////////////////////////////////////////

if ($ses != "")
{

// GENERATE FORM KEY!


	$secret=md5(uniqid(rand(), true));
	$_SESSION['FORM_SECRET']=$secret;

	$formkey = $_SESSION['FORM_SECRET'];

if ($enflag != "yes") $enlink = " [<a href=\"./insert.php?ses=$ses&amp;pid=$mid&amp;tid=$tid&amp;act=enhancetopic&amp;forum=$forum&amp;page=$page\">go advanced</a>]";
else $enlink = " [<a href=\"./topics.php?ses=$ses&amp;pid=$mid&amp;tid=$tid&amp;forum=$forum&amp;page=$page#bottom\">go basic</a>]";


	echo "<p class=\"break\" style=\"text-align: left;\"><b><big>new topic</big>$enlink</b></p>



	<form class=\"breakforum\" id=\"bottom\" action=\"./insert.php?ses=$ses&amp;cat=$cat&amp;tid=$tid&amp;forum=$forum&amp;act=topic\" method=\"post\" enctype=\"multipart/form-data\">

	<fieldset>
	<b>subject:</b><br/>
	<input type=\"text\" name=\"subject\"  class=\"textbox\" maxlength=\"50\" format=\"*m\"/><br/>
	<b>message:</b><br/>
	<textarea name=\"message\" rows=\"3\" cols=\"20\"></textarea>";



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


	echo "</select>";


	$query = "SELECT count(*) from phoenix_imagealbums WHERE login='$login'";
	$result = mysql_query($query);
	$hasalbumcount = number_format(mysql_result($result,0,"count(*)"));


	if ($hasalbumcount > 0)
	{

	echo "<br/>
	<b>attach a photo?</b><small>(gif or jpg)</small><br/>
	<input type=\"file\" name=\"file\"/>";
	}
	

} // enflag

	echo "<br/><input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
	<input type=\"hidden\" name=\"cat\" value=\"$cat\"/>
	<input type=\"hidden\" name=\"tid\" value=\"$tid\"/>
	<input type=\"hidden\" name=\"forum\" value=\"$forum\"/>
	<input type=\"hidden\" name=\"act\" value=\"topic\"/>
	<input type=\"hidden\" name=\"formkey\" value=\"$formkey\"/>";
	
	echo "<input type=\"submit\" class=\"buttstyle\" value=\"add topic\"/></fieldset>
	</form>";

}
else
{
echo "<p class=\"breakforum\" style=\"text-align: center;\"><b><big>Please <a href=\"../register.php\">sign up</a> to post on this forum!</big></b></p>";
}







if ($ses != "")
{
$mainmenu = "$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";
}
else
{
$mainmenu = "$hyback <a href=\"../index.php\">main menu</a>";
}






                             echo "<hr/><p class=\"break\">$hyfor <a href=\"./newpoll.php?ses=$ses&amp;cat=$cat&amp;forum=$forum\">create poll</a><br/>
$hyback <a href=\"../forum/forums.php?ses=$ses\">message boards</a>";

                             echo "<br/>$mainmenu";

                             echo "</p></body></html>";
                             exit;
       }


}
else
{



	echo "<p class=\"break\"><img src=\"../scripts/phoenix.php?string=account%20restricted!&amp;login=$login\" alt=\"account%20restricted!\"/></p><hr/>
	<p class=\"breakforum\" style=\"text-align: center;\">";

	echo "Sorry, your account appears to be restricted, this may be due to misconduct on your part or an error on our part.<br/><br/>
	During the period of restriction you will be unable to use the Message Boards and some other functions of this site, this is for the protection of other users.<br/><br/>
	If you feel that this is an error and you have done nothing wrong please contact an administrator.";

	echo "</p><hr/></p><p class=\"break\">$breaker$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>$shortcuts</p></body></html>";
	exit;




}

?>