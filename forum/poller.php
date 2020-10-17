<?php





$tolink = $_SERVER["PHP_SELF"];

$docroot = $_SERVER["DOCUMENT_ROOT"];

$pollid = $_GLOBALS["pollid"];

$vote = $_GET["vote"];
if ($vote == "") $vote = $_POST["vote"];
$pollid = $_GET["pollid"];
if ($pollid == "") $pollid = $_POST["pollid"];
$answer = $_GET["answer"];
if ($answer == "") $answer = $_POST["answer"];
$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];
$cat = $_GET["cat"];
if ($cat == "") $cat = $_POST["cat"];
$tid = $_GET["tid"];
if ($tid == "") $tid = $_POST["tid"];
$topage = $_GET["topage"];
if ($topage == "") $topage = $_POST["topage"];
$forum = $_GET["forum"];
if ($forum == "") $forum = $_POST["forum"];





if ($vote == "")
{
$qx = "select * from phoenix_polls_voters where login='$login' AND pollid='$id'";
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
}




if ($vote == "")
{



$xxquery = "select * from phoenix_polls where id='$pollid' limit 1";
$xxresult = mysql_query($xxquery);
$xxrow = mysql_fetch_array($xxresult);


$xxmeat = $xxrow["meat"];
$xxuserby = $xxrow["login"];
$xxtitle = $xxrow["title"];
$xxid = $xxrow["id"];
$xxallvotes = $xxrow["votes"];


	$xxmeat = funk_it_up($xxmeat, $ses);
	$xxmeat = add_sicn($xxmeat);

echo "<p class=\"break\" style=\"text-align: center;\"><b>$xxmeat</b></p>";



$vvquerys = "select * from phoenix_polls where pollid='$xxid' order by id asc";
$vvresult = mysql_query($vvquerys);
$vvrow = mysql_fetch_array($vvresult);

$all = 1;
		while($vvrow)
		{
		$xxanswer = stripslashes($vvrow["title"]);
		$xxanswerid = $vvrow["id"];

		



		echo "<form class=\"breakforum\" action=\"$tolink?ses=$ses&amp;vote=insert\" method=\"post\">
		<fieldset><b>$all: $xxanswer</b><br/><input type=\"submit\" style=\"font-weight: bold; font-size: medium;\" value=\"Vote #$all\"/>
		<input type=\"hidden\" name=\"answer\" value=\"$xxanswerid\"/>
		<input type=\"hidden\" name=\"pollid\" value=\"$xxid\"/>
		<input type=\"hidden\" name=\"vote\" value=\"insert\"/>
		<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>	
		<input type=\"hidden\" name=\"cat\" value=\"$cat\"/>
		<input type=\"hidden\" name=\"tid\" value=\"$tid\"/>
		<input type=\"hidden\" name=\"topage\" value=\"$topage\"/>
		<input type=\"hidden\" name=\"forum\" value=\"$forum\"/>	
		</fieldset></form>";
		$all++;
		$vvrow = mysql_fetch_array($vvresult);
		}

echo "<p class=\"breakforum\" style=\"text-align: center;\"><b>$xxallvotes votes cast</b></p>
<p class=\"break\">Poll By <a href=\"../profile.php?ses=$ses&amp;user=$xxuserby\">$xxuserby</a></p>";

}


if ($vote == "cast")
{


$msg = $_GET["msg"];


$msg = "<br/><small><b>$msg</b></small>";

$xxquery = "select * from phoenix_polls where id='$pollid' limit 1";
$xxresult = mysql_query($xxquery);
$xxrow = mysql_fetch_array($xxresult);


$xxmeat = $xxrow["meat"];
$xxuserby = $xxrow["login"];
$xxtitle = $xxrow["title"];
$xxid = $xxrow["id"];
$xxallvotes = $xxrow["votes"];

	$xxmeat = funk_it_up($xxmeat, $ses);
	$xxmeat = add_sicn($xxmeat);


echo "<p class=\"break\" style=\"text-align: center;\"><b>$xxmeat</b></p>";


$vvquerys = "select * from phoenix_polls where pollid=$xxid order by votes desc";
$vvresult = mysql_query($vvquerys);
$vvrow = mysql_fetch_array($vvresult);


		while($vvrow)
		{
		$xxanswer = $vvrow["title"];
		$xxvotes = $vvrow["votes"];
		
		$mcvotes = substr((100 * $xxvotes / $xxallvotes),"0","4");

		if ($xxvotes < 1) $tellvotes = "[no votes]";
		else $tellvotes = "[$mcvotes% of votes]";

		echo "<p class=\"breakforum\"><b>$xxanswer<br/><small>$tellvotes</small></b></p>";
		$vvrow = mysql_fetch_array($vvresult);
		}

echo "<p class=\"breakforum\" style=\"text-align: center;\"><b>$xxallvotes votes cast</b></p>
<p class=\"break\">Poll By <a href=\"../profile.php?ses=$ses&amp;user=$xxuserby\">$xxuserby</a></p>";
}


if ($vote == "insert")
{



$qtx = "select * from phoenix_polls_voters where login='$login' AND pollid='$pollid'";
$rtx = mysql_query($qtx);
$xtcount = mysql_num_rows($rtx);

$xxquery = "select * from phoenix_polls where id=$pollid";
$xxresult = mysql_query($xxquery);
$xxrow = mysql_fetch_array($xxresult);
$xxuserby = $xxrow["login"];

if ($xtcount < 1)
{

$query = "update phoenix_polls set votes=votes+1 where id=$answer AND pollid=$pollid";
$result = mysql_query($query);

$query2 = "update phoenix_polls set votes=votes+1 where id=$pollid";
$result2 = mysql_query($query2);


			/// score - credit

			$query = "update forum_users set posts=posts+5, credits=credits+3 where username='$author'";
			mysql_query($query);

			///

$aaquery = "select title from phoenix_polls where id='$answer'";
$aaresult = mysql_query($aaquery);
$aarow = mysql_fetch_array($aaresult);
$aaanswer = mysql_real_escape_string($aarow["title"]);



mysql_query("insert into phoenix_polls_voters ( login, pollid, answer ) values ( '$login', '$pollid', '$aaanswer' )");

$queryfvf = "update phoenix_topics set lastreply=now() where id=$tid limit 1";
$resultfvf = mysql_query($queryfvf);


echo "<p class=\"break\"><big>Thank You</big>$msg</p>
<p class=\"breakforum\" style=\"text-align: center;\"><b>Your Vote Was Counted</b></p>";

echo "<p class=\"breakforum\" style=\"text-align: center;\"><a href=\"$tolink?ses=$ses&amp;vote=cast&amp;cat=$cat&amp;tid=$tid&amp;topage=$topage&amp;forum=$forum\">See Results</a></p>
<p class=\"break\">Poll By $xxuserby</p>";

}
else
{

echo "<p class=\"break\"><big>Sorry</big>$msg</p>
<p class=\"breakforum\" style=\"text-align: center;\"><b>Your Vote Was Already Counted</b></p>";

echo "<p class=\"breakforum\" style=\"text-align: center;\"><a href=\"$tolink?ses=$ses&amp;vote=cast&amp;cat=$cat&amp;tid=$tid&amp;topage=$topage&amp;forum=$forum\">See Results</a></p>
<p class=\"break\">Poll By $xxuserby</p>";

}

}
?>