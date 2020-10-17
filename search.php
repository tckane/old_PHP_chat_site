<?php

include('./scripts/header.php');
include('./scripts/session.php');
include('./scripts/config.php');
include('./scripts/functions.php');
include('./scripts/main.php');
include('./scripts/cleaner.php');

$login = $row_ses["username"];
$backg = $row_ses["bg_col"];
$myco = $row_ses["my_color"];


$stringy = clean($_GET['stringy']);
$by = clean($_GET['by']);

$act_query = "UPDATE forum_users set lastactive=now(), location='user search, string: $stringy' where username='$login'";
mysql_query($act_query);

$query = "UPDATE friends set lastactive=now(), location='user search, string: $stringy' where friendname='$login'";
mysql_query($query);










if ($stringy != "")
{
if ($bwmode == "off") $subtite = "<img src=\"./scripts/phoenix.php?string=search%20for%20$stringy&amp;login=$login\" alt=\"search for $stringy\"/>";
else $subtite = "<b><big>search for $stringy</big></b>";

echo "<p class=\"break\">$subtite$inboxes</p><hr/>";
}
else
{

if ($bwmode == "off") $subtite = "<img src=\"./scripts/phoenix.php?string=find%20friends&amp;login=$login\" alt=\"find friends\"/>";
else $subtite = "<b><big>find friends</big></b>";

echo "<p class=\"break\">$subtite$inboxes</p><hr/>";
}






echo "<form class=\"breakforum\" style=\"text-align: center;\" action=\"./search.php?ses=$ses&amp;stringy=$stringy\" method=\"get\">
	<fieldset>
	<b>Keyword:</b><br/>
    	<input type=\"text\" class=\"textbox\" name=\"stringy\" title=\"search by all or part of a username\" maxlength=\"30\"/><br/>";
	echo "
	<b>Search By:</b><br/><select name=\"by\" class=\"textbox\" title=\"search by\">
	<option value=\"name\">username</option>
	<option value=\"realname\">real name</option>
	<option value=\"town\">town/city</option>
	<option value=\"email\">email address</option>
	<option value=\"sig\">about me</option>
	</select>
	<input type=\"submit\" value=\"go\" class=\"buttstyle\"/>
	<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>";
    	echo "</fieldset></form>";




if ($by != "")
{


if (empty($page) || ($page < 1)) $page = 1; $max = $tmax;  $start = ($page-1) * $max;



if ($by == "name") $searchy = "username LIKE '%$stringy%'";
if ($by == "realname") $searchy = "realname LIKE '%$stringy%'";

if ($by == "town") $searchy = "place LIKE '%$stringy%'";
if ($by == "email") $searchy = "email LIKE '%$stringy%'";

if ($by == "sig") $searchy = "sig LIKE '%$stringy%'";


$query = "SELECT count(*) from forum_users WHERE $searchy";
$result =mysql_query($query);
$row2 =mysql_fetch_array($result);
$count = $row2[0];

$query = "SELECT * from forum_users WHERE $searchy ORDER BY lastactive DESC LIMIT $start, $max";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);



if ($count == 1) $rez = "$count result";
elseif ($count < 1) $rez = "no results";
else $rez = "$count results";



		if ($count > $max) 
		{
		echo  "<p class=\"breakforum\" style=\"text-align: center;\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $max);
		}

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"./search.php?ses=$ses&amp;by=$by&amp;stringy=$stringy&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}



if ($count == 0) echo "<p class=\"breakforum\" style=\"text-align: center;\">Your search returned no results, please try again.</p>";



while ($row)
      	{
       	$name = $row["username"];
	$gro = $row["userlevel"];
	$mystatus = $row["mystatus"];
	$towner = $row["place"];
	$avvy = $row["avatar"];
	$age = $row["age"];
	$age = getage("$age");
	if ($avvy == "") $avvy = "<img align=\"middle\" src=\"./images/nopic_tiny.jpg\" alt=\"\"/> ";
	else $avvy = "<img align=\"middle\" src=\"./imgstor/imgtn.php?imid=$avvy&amp;res=25\" alt=\"\"/> ";


		$query = "SELECT * FROM friends WHERE username='$login' AND friendname='$name' AND myrequest='0'";
		$resultcunt = mysql_query("$query");
		$num_rowscunt = mysql_num_rows ($resultcunt);

		$queryx = "SELECT * FROM ignorance WHERE ignored='$name' AND login='$login' ";
		$resultx = mysql_query("$queryx");
		$num_rowsx = mysql_num_rows ($resultx);

		$queryy = "SELECT * FROM ignorance WHERE ignored='$login' AND login='$name' ";
		$resulty = mysql_query("$queryy");
		$num_rowsy = mysql_num_rows ($resulty);

		if ($num_rowscunt >= 1) $mymate = "[F]";
		else $mymate = "";


$mystatus = funk_it_up($mystatus, $ses);
$mystatus = add_sicn($mystatus);



		if ($num_rowsx >= 1 | $num_rowsy >= 1)
				{
       	echo "<p class=\"breakforum\">ignored($name);</p>";
				}		
		else
				{
       	echo "<p class=\"breakforum\">$avvy <a href=\"./profile.php?ses=$ses&amp;user=$name&amp;f=onl\">$name</a>$mymate $ref $mystatus<br/>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;from: $towner<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;age: $age</p>";
				}


       	$row = mysql_fetch_array($result);
      	}


		if ($count > $max) 
		{
		echo  "<p class=\"breakforum\" style=\"text-align: center;\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $max);
		}

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"./search.php?ses=$ses&amp;by=$by&amp;stringy=$stringy&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}



}






echo "<p class=\"breakforum\" style=\"text-align: center;\"><b><big>Can't find your friends here? never worry, you can <a href=\"./mail/invite.php?ses=$ses\">invite some</a>.</big></b></p>




<hr/><p class=\"break\">$hyback <a href=\"./mainmenu.php?ses=$ses\">main menu</a>";

      echo "$shortcuts</p></body></html>";




?>
