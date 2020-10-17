<?php



include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/main.php');


if ($user == "") $user = $_GET["user"];


function make_passage_compat($string)
{
$string = trim($string);
$string = ereg_replace("#","",$string);
$string = trim($string);
return $string; 
}

if ($ses == "")
{
$ses = $_POST['ses'];
}

if ($albumid == "")
{
$albumid = $_POST['albumid'];
}
if ($albumid == "") $albumid = $_GET["albumid"];

if ($renalbum == "") $renalbum = $_GET["renalbum"];


if ($imid == "")
{
$imid = $_POST['imid'];
}

if ($imid == "")
{
$imid = $_GET['imid'];
}


$albumidb = $_GET['albumidb'];

if ($albumidb == "")
{
$albumidb = $_POST['albumidb'];
}

if ($killalbum == "")
{
$killalbum = $_POST['killalbum'];
}

$msgs = $_GET["msgs"];


$user = $_GET['user'];

if ($user == "")
{
$user = $_POST['user'];
}





/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$act = $_GET['act'];

if ($act == "")
{


$query = "UPDATE friends set lastactive=now(), location='viewing $user's photo albums' where friendname='$login'";
mysql_query($query);



$query = "UPDATE forum_users set lastactive=now(), location='viewing $user's photo albums' where username='$login'";
mysql_query($query);





	$squery = "SELECT SUM(size) FROM phoenix_imagestore WHERE login='$user'";
	$sresult = mysql_query ("$squery");
	$srow = mysql_fetch_array($sresult);
	$totalbytes = $srow[0];

  

	$dquery = "SELECT count(*) from  phoenix_imagestore where login='$user'";
	$dresult = mysql_query ("$dquery");
	$drow = mysql_fetch_array($dresult);
	$xphotos = $drow[0];



if ($xphotos == 1) $yphotos = "$user has $xphotos photograph.";
if ($xphotos > 1) $yphotos = "$user has $xphotos photographs.";
if ($xphotos < 1) $yphotos = "$user has no photographs.";


echo "<p class=\"break\">";


if ($bwmode == "off")
{
$tresk = urlencode("$user's photo albums");
$subtite = "<img src=\"../scripts/phoenix.php?login=$login&amp;string=$tresk\" alt=\"$user's photo albums\"/>";
}
else
{
$subtite = "<b><big>$user's photo albums</big></b>";
}


echo "$subtite</p>
<hr/><p class=\"breakforum\" style=\"text-align: center;\">
<b><big>$yphotos</big></b></p>";

//////////////////////////


		$pquery = "SELECT count(*) from friends where username='$user' AND friendname='$login' AND privatealbums='yes'";
		$presult = mysql_query ("$pquery");
		$prow = mysql_fetch_array($presult);
		$pcount = $prow[0];


if ($pcount > 0)
	{

$query = "SELECT count(*) from phoenix_imagealbums where login='$user'";
$result = mysql_query ("$query");
$row = mysql_fetch_array($result);
$count = $row[0];

if (empty($page) || ($page < 1)) $page = 1;
$max = 3;
$start = ($page-1) * $max;

if ($count < 1) echo "<p class=\"breakforum\" style=\"text-align: center;\">$user has no photo albums.</p>";





if ($count > $max) echo "<p class=\"breakforum\" style=\"text-align: center;\">";


if ($page > 1) echo "$hyback <a href=\"./prophotos.php?ses=$ses&amp;user=$user&amp;page=" . ($page - 1) . "\">back</a> ";
if ($count > ($page * $max)) echo "<a href=\"./prophotos.php?ses=$ses&amp;user=$user&amp;page=" . ($page + 1) . "\">next</a> $hyfor";


if ($count > $max) echo "</p>";



echo  "<table class=\"breakforum\" width=\"100%\"><tr>";





$query = "SELECT * from phoenix_imagealbums where login='$user' ORDER BY albumname ASC LIMIT $start, $max";
$result = mysql_query ("$query");
$totalalbums = mysql_num_rows($result);
$row = mysql_fetch_array($result);

while ($row)
	
{
$album = $row["albumname"];
$albumid = $row["id"];
$lastid = $row["lastpic"];


	$iquery = "SELECT count(*) from  phoenix_imagestore where albumid='$albumid' AND login='$user'";
	$iresult = mysql_query ("$iquery");
	$irow = mysql_fetch_array($iresult);
	$icount = $irow[0];
	
	if ($icount == 0) $countstat = "no photos";
	if ($icount == 1) $countstat = "one photo";
	if ($icount > 1) $countstat = "$icount photos";
	

	$albumname = substr("$album","0","8");

	$query4 = "SELECT * from phoenix_imagestore where albumid='$albumid' ORDER BY id DESC LIMIT 1";
	$result4 = mysql_query ("$query4");
	$num_rows4 = mysql_num_rows($result4);
	$row4 = mysql_fetch_array($result4);
	$img = $row4['id'];

		if($img != "")
		{
		$imgprev = "<a href=\"./prophotos.php?ses=$ses&amp;act=albums&amp;albumid=$albumid&amp;user=$user\"><img src=\"../imgstor/imgtn.php?imid=$img&amp;res=40\"/></a><br/>";
		}
		else
		{
		$imgprev = "";
		}
	

echo "<td style=\"text-align: center;\">$imgprev<a href=\"./prophotos.php?ses=$ses&amp;act=albums&amp;albumid=$albumid&amp;user=$user\">$albumname</a><br/><i>$countstat</i></td>";


$row = mysql_fetch_array($result);
}

echo  "</tr></table>";


if ($count > $max) echo "<p class=\"breakforum\" style=\"text-align: center;\">";


if ($page > 1) echo "$hyback <a href=\"./prophotos.php?ses=$ses&amp;user=$user&amp;page=" . ($page - 1) . "\">back</a> ";
if ($count > ($page * $max)) echo "<a href=\"./prophotos.php?ses=$ses&amp;user=$user&amp;page=" . ($page + 1) . "\">next</a> $hyfor";


if ($count > $max) echo "</p>";

}

else
{



	$wquery = "SELECT count(*) from  phoenix_imagealbums where availability='private' AND login='$user'";
	$wresult = mysql_query ("$wquery");
	$wrow = mysql_fetch_array($wresult);
	$wcount = $wrow[0];

		if ($wcount > 0) $privvy = "<p class=\"breakforum\" style=\"text-align: center;\"><b><big>$user has private albums, why not ask if you can have a look?</big></b></p>";






$query = "SELECT count(*) from phoenix_imagealbums where login='$user' AND availability!='private'";
$result = mysql_query ("$query");
$row = mysql_fetch_array($result);
$count = $row[0];

if (empty($page) || ($page < 1)) $page = 1;
$max = 3;
$start = ($page-1) * $max;

echo "$privvy";

if ($count < 1) echo "<p class=\"breakforum\" style=\"text-align: center;\">$user has no photo albums.</p>";


if ($count > $max) echo "<p class=\"breakforum\" style=\"text-align: center;\">";


if ($page > 1) echo "$hyback <a href=\"./prophotos.php?ses=$ses&amp;user=$user&amp;page=" . ($page - 1) . "\">back</a> ";
if ($count > ($page * $max)) echo "<a href=\"./prophotos.php?ses=$ses&amp;user=$user&amp;page=" . ($page + 1) . "\">next</a> $hyfor";


if ($count > $max) echo "</p>";

echo  "<table class=\"breakforum\" width=\"100%\"><tr>";





$query = "SELECT * from phoenix_imagealbums where login='$user' AND availability!='private' ORDER BY albumname ASC LIMIT $start, $max";
$result = mysql_query ("$query");
$totalalbums = mysql_num_rows($result);
$row = mysql_fetch_array($result);

while ($row)
	
{
$album = $row["albumname"];
$albumid = $row["id"];
$lastid = $row["lastpic"];


	$iquery = "SELECT count(*) from  phoenix_imagestore where albumid='$albumid' AND login='$user'";
	$iresult = mysql_query ("$iquery");
	$irow = mysql_fetch_array($iresult);
	$icount = $irow[0];
	
	if ($icount == 0) $countstat = "no photos";
	if ($icount == 1) $countstat = "one photo";
	if ($icount > 1) $countstat = "$icount photos";
	

	$albumname = substr("$album","0","8");


	$query4 = "SELECT * from phoenix_imagestore where albumid='$albumid' ORDER BY id DESC LIMIT 1";
	$result4 = mysql_query ("$query4");
	$num_rows4 = mysql_num_rows($result4);
	$row4 = mysql_fetch_array($result4);
	$img = $row4['id'];

		if($img != "")
		{
		$imgprev = "<a href=\"./prophotos.php?ses=$ses&amp;act=albums&amp;albumid=$albumid&amp;user=$user\"><img src=\"../imgstor/imgtn.php?imid=$img&amp;res=40\"/><br/></a>";
		}
		else
		{
		$imgprev = "";
		}
	

echo "<td style=\"text-align: center;\">$imgprev<a href=\"./prophotos.php?ses=$ses&amp;act=albums&amp;albumid=$albumid&amp;user=$user\">$albumname</a><br/><i>$countstat</i></td>";


$row = mysql_fetch_array($result);
}



echo  "</tr></table>";

if ($count > $max) echo "<p class=\"breakforum\" style=\"text-align: center;\">";


if ($page > 1) echo "$hyback <a href=\"./prophotos.php?ses=$ses&amp;user=$user&amp;page=" . ($page - 1) . "\">back</a> ";
if ($count > ($page * $max)) echo "<a href=\"./prophotos.php?ses=$ses&amp;user=$user&amp;page=" . ($page + 1) . "\">next</a> $hyfor";


if ($count > $max) echo "</p>";


}


//////////////////////////


echo "<hr/><p class=\"break\">";

if ($group < 4) echo "

$hyback <a href=\"../profile.php?ses=$ses&amp;user=$user\">back to $user's profile</a><br/>";

echo "$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";

echo "</p></body></html>";


}



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



if ($act == "albums")
{


$query = "UPDATE friends set lastactive=now(), location='viewing $user's photos' where friendname='$login'";
mysql_query($query);



$query = "UPDATE forum_users set lastactive=now(), location='viewing $user's photos' where username='$login'";
mysql_query($query);


if (empty($page) || ($page < 1)) $page = 1;
$max = 5;
$start = ($page-1) * $max;


$query = "SELECT * from phoenix_imagealbums where login='$user' AND id=$albumid";
$result = mysql_query ("$query");
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

$namea = $row['albumname'];
$susx = $row['availability'];


echo "<p class=\"break\">";
echo "<big>Album: $namea</big><br/>[availability: $susx]$isdef</p>
<hr/>";



$query2 = "SELECT * from phoenix_imagestore where albumid=$albumid ORDER BY id DESC LIMIT $start, $max";
$result2 = mysql_query ("$query2");
$num_rowsp = mysql_num_rows($result2);
$row2 = mysql_fetch_array($result2);


	$iquery = "SELECT count(*) from  phoenix_imagestore where albumid=$albumid";
	$iresult = mysql_query ("$iquery");
	$irow = mysql_fetch_array($iresult);
	$icount = $irow[0];

$count = "$icount";

		if ($count > $max) 
		{
		echo  "<p class=\"breakforum\" style=\"text-align: center;\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $max);
		}

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"./prophotos.php?ses=$ses&amp;act=albums&amp;albumid=$albumid&amp;user=$user&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}


if ($num_rowsp == "") echo "<p class=\"breakforum\" style=\"text-align: center;\">$user has no photos in this album</p>";




echo  "<table width=\"100%\" class=\"breakforum\"><tr><td align=\"center\">";



echo  "<table>";


while ($row2)	
{
	$album = $row2["albumname"];
	$img = $row2["id"];



	echo "<tr><td><a href=\"./prophotos.php?ses=$ses&amp;act=view&amp;imid=$img&amp;albumidb=$albumid&amp;user=$user\"><img src=\"../imgstor/imgtn.php?imid=$img&amp;res=60\"/></a></td></tr>";
	$row2 = mysql_fetch_array($result2);
}

echo  "</table></td></tr></table>";




		if ($count > $max) 
		{
		echo  "<p class=\"breakforum\" style=\"text-align: center;\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $max);
		}

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"./prophotos.php?ses=$ses&amp;act=albums&amp;albumid=$albumid&amp;user=$user&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}

		if ($count > $max) echo  "</p>";
		}









echo "<hr/><p class=\"break\">";


echo "$hyback <a href=\"./prophotos.php?ses=$ses&amp;user=$user\">$user's photo albums</a><br/>

$hyback <a href=\"../profile.php?ses=$ses&amp;user=$user\">back to $user's profile</a><br/>

$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";

echo "</p></body></html>";
}




/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($act == "view")
{






echo "<p class=\"break\">";
echo "<big>View Photo</big></p>
<hr/>";



$query = "SELECT * from phoenix_imagestore where id='$imid'";
$result = mysql_query ("$query");
$num_rowsp = mysql_num_rows($result);
$row = mysql_fetch_array($result);

$albumn = $row['albumname'];
$imgs = $row['id'];
$text = $row['image_caption'];
$addedon = $row['dateadded'];
$totalbytes = $row['size'];

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




if ($text != "") $text = "<i>&quot;...$text...&quot;</i><br/>added on: $addedon<br/>size: $totalsize";
else $text = "added on: $addedon<br/>size: $totalsize";

echo "<p class=\"breakforum\" style=\"text-align: center;\"><a href=\"../imgstor/imgdisp.php?imid=$imid\"><img src=\"../imgstor/imgtn.php?imid=$imid&amp;res=200\"/></a><br/>
<b>$text</b></p>";






echo "<p class=\"breakforum\" style=\"text-align: center;\"><b>
<a href=\"../imgstor/imgdisp.php?imid=$imid\">download</a></b> | 
<iframe align=\"middle\" src=\"http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fphoenixbytes.co.uk%2Fphoto%2F$imid&amp;layout=button_count&amp;show_faces=false&amp;width=70&amp;action=like&amp;font=tahoma&amp;colorscheme=light&amp;height=20\" scrolling=\"no\" frameborder=\"0\" style=\"border:none; overflow:hidden; width:70px; height:20px;\" allowTransparency=\"true\"></iframe>
</p>";







/////////////////////////////////////////////////////



if ($group < 4) 
{
echo "<p class=\"break\"><big>Comments</big></p>";





$queryx = "SELECT * from phoenix_comments where imgid='$imid' ORDER BY id DESC";
$resultx = mysql_query ("$queryx");
$num_rows = mysql_num_rows($resultx);
$comments = mysql_fetch_array($resultx);

if ($num_rows < 1) echo "<p class=\"breakforum\" style=\"text-align: center;\">There are no comments on this photo</p>";


while ($comments)	
{
$userperson = $comments["username"];
$comment = $comments["msg"];
$comment = stripslashes("$comment");
$when = $comments["friendlytime"];
$commid = $comments["id"];


$comment = funk_it_up($comment, $ses);
$comment = add_sicn($comment);



echo "<p class=\"breakforum\"><b><a href=\"../profile.php?ses=$ses&amp;user=$userperson\">$userperson</a> </b> $comment<br/><small><i>($when)</i></small></p>";

$comments = mysql_fetch_array($resultx);
}


if ($num_rows > 19) 
{


$queryx = "DELETE from phoenix_comments where imgid='$imid' ORDER BY id ASC LIMIT 1";
$resultx = mysql_query ("$queryx");

}



if ($ses != "")
{
	if ($login == "$user")
	{
$query = "UPDATE phoenix_comments set readstate='0' where imgid='$imid'";
mysql_query($query);
	}
}



echo "<form class=\"breakforum\" style=\"text-align: center;\" action=\"./prophotopts.php?ses=$ses\" method=\"get\">
<fieldset>


<textarea id=\"addcomment\" name=\"addcomment\" rows=\"2\" cols=\"20\"></textarea>
<br/>
<input type=\"hidden\" value=\"$ses\" name=\"ses\"/>
<input type=\"hidden\" value=\"comm\" name=\"act\"/>
<input type=\"hidden\" value=\"$imid\" name=\"imid\"/>
<input type=\"hidden\" value=\"$albumidb\" name=\"albumidx\"/>
<input type=\"hidden\" value=\"$user\" name=\"user\"/>
<input type=\"submit\" value=\"add comment\"/></fieldset></form>";

}

echo "
<p class=\"break\"><big>Link To This Photo</big></p>
<form class=\"breakforum\" style=\"text-align: center;\"><fieldset><b>Forum Link Code</b><br/><input type=\"text\" readonly=\"yes\" style=\"text-align: center; font-weight: bold;\" value=\"myphoto:$imgs\"/><br/><small><b><a href=\"../forum/formatting.php?ses=$ses#forumlink\">what's this?</a></b></small><br/>
<b>External Link</b><br/><input type=\"text\" style=\"text-align: center; font-weight: bold;\" readonly=\"yes\" value=\"$lback/imgstor/imgdisp.php?imid=$imid\"/></fieldset></form>




<hr/><p class=\"break\">";


echo "$hyback <a href=\"./prophotos.php?ses=$ses&amp;act=albums&amp;albumid=$albumidb&amp;user=$user\">back to album $albumn</a><br/>
$hyback <a href=\"./prophotos.php?ses=$ses&amp;user=$user\">$user's photos albums</a><br/>
$hyback <a href=\"../profile.php?ses=$ses&amp;user=$user\">back to $user's profile</a><br/>
$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>";

echo "</p></body></html>";

}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



?>



