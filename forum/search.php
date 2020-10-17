<?php
include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/config.php');





if ($group < 4)
{



$searchbox = "<form class=\"breakforum\" style=\"text-align: center;\" action=\"./search.php?ses=$ses&amp;stringy=$stringy\" method=\"get\">

	<fieldset>
	Keyword:<br/>
    	<input type=\"text\" class=\"textbox\" name=\"stringy\" value=\"$stringy\" title=\"text string\" maxlength=\"30\"/><br/>
	Search By:<br/><select name=\"param\" class=\"textbox\" title=\"search by\">
	<option value=\"name\">username</option>
	<option value=\"subject\">subject</option>
	</select>
	<input type=\"submit\" value=\"go\" class=\"buttstyle\"/>
	<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
    	</fieldset></form><hr/>";



$stringy = $_GET['stringy'];

$param = $_GET['param'];

$ses = $_GET['ses'];



$query = "UPDATE friends set lastactive=now(), location='searching for $stringy by $param' where friendname='$login'";
mysql_query($query);

$query = "UPDATE forum_users set lastactive=now(), location='searching for $stringy by $param' where username='$login'";
mysql_query($query);

$query = "SELECT * FROM forum_users WHERE ses='$ses' limit 1";
$result = mysql_query($query);
$row_ses = mysql_fetch_array($result);

$filter = $row_ses["filter"];
$login = $row_ses["username"];

$ucol = $row_ses["my_color"];
$tablecol = $row_ses["tr_col"];
$txt = $row_ses["text_col"];
$bgc = $row_ses["bg_col"];
$tmax = $row_ses["pmax"];


if (empty($page) || ($page < 1)) $page = 1; $max = $tmax;  $start = ($page-1) * $max;




	$forum_name = $row["name"];
	$forum = $row["forum"];
	$cat = $row["category"];






      	echo "<p class=\"break\">";
       	echo "<b>search message board</b>$inboxes</p><hr/>$searchbox";




if ($param != "")
{




if ($param == "subject") $sqwert = "WHERE subject LIKE '%$stringy%' AND forum!='adult' AND forum!='adminx1' AND forum!=''";
if ($param == "name") $sqwert = "WHERE author LIKE '%$stringy%' AND forum!='adult' AND forum!='adminx1' AND forum!=''";


       	$query = "SELECT count(*) from phoenix_topics $sqwert";
       	$result =mysql_query($query);
       	$row =mysql_fetch_array($result);
       	$count = $row[0];

       	$query = "SELECT * from phoenix_topics $sqwert ORDER BY id DESC LIMIT $start, $max";
       	$result =mysql_query($query);
       	$num_rows =mysql_num_rows($result);
       	$row = mysql_fetch_array($result);





/////////////////////




		if ($count > $max) 
		{
		echo  "<p class=\"breakforum\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $max);
		}

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"search.php?ses=$ses&amp;forum=$forum&amp;param=$param&amp;stringy=$stringy&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}




	
/////////////////////

       	if ($num_rows <1) echo "<p class=\"breakforum\" style=\"text-align: center;\">sorry, there are no results to display</p>";

       	while ($row)

		{
       	        $tid = $row["id"];
       	        $replies = $row["replies"];
       	        $author = $row["author"];
       	        $lock = $row["locked"];
	        $mcol = $row["my_color"];
                $subject = stripslashes(make_wml_compat($row["subject"]));


                if ($lock == "yes") $lo = "&nbsp;<small><b><img align=\"middle\" src=\"../images/topiclocked.jpg\" alt=\"[topic locked]\"/></b></small>";
                else $lo = "";

                if ($replies >= 1) $posts = "$replies";
                else $posts = "";




	if ($posts == "") $posts = "";
	else $posts = "[$posts]";






echo "<table class=\"breakforum\" width=\"100%\"><tr><td><b><a href=\"./threads.php?ses=$ses&amp;cat=$cat&amp;tid=$tid&amp;topage=$page&amp;forum=$forum\">$subject</a></b><small>$posts posted by <b><a href=\"../profile.php?ses=$ses&amp;cat=$cat&amp;stringy=$stringy&amp;tid=$tid&amp;user=$author&amp;f=trd&amp;ref=sfor&amp;topage=$topage\">$author</a></b>$lo</small></td></td></tr></table>";



$row = mysql_fetch_array($result);
      	}

///////////////////

		if ($count > $max) 
		{
		echo  "<p class=\"breakforum\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $max);
		}

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"search.php?ses=$ses&amp;forum=$forum&amp;param=$param&amp;stringy=$stringy&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}

///////////////////


}

                             echo "<p class=\"break\">";
      
                             echo "$hyback <a href=\"../forum/forums.php?ses=$ses\">message board</a>";

                             echo "<br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>$shortcuts";

                             echo "</p></body></html>";
                             exit;

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
