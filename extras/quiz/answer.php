<?php



include('../../scripts/header.php');
include('../../scripts/session.php');
include('../../scripts/config.php');
include('../../scripts/functions.php');
include('../../scripts/main.php');


$login=$row_ses["username"];
$tmax = $row_ses["tmax"];

$totalscore = $row_ses["quiz_score"];


$lastaction = $row_ses["last_answer"];


$query = "UPDATE forum_users set lastactive=now(), location='Quiz' where username='$login'";
mysql_query($query);

$query = "UPDATE friends set lastactive=now(), location='Quiz' where friendname='$login'";
mysql_query($query);


/*
#=======================================#

answer the question

tell em if they're right, if they are give them the 'right' page and a link to the next question, 

if they're wrong, show the 'wrong' page and a link back to the previous question

ok?
#=======================================#
*/


$query = "select * from waamp_quiz where quid='$quid'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);


$correct = $row["right_answer"];
		$ga = $row["answer1"];
		$gb = $row["answer2"];
		$gc = $row["answer3"];
		$gd = $row["answer4"];

if ($a == "a") $guess = "$ga";
elseif ($a == "b") $guess = "$gb";
elseif ($a == "c") $guess = "$gc";
elseif ($a == "d") $guess = "$gd";


if ($guess == "$correct")
			{


if ($l == "easy") $plus = "10";
elseif ($l == "med") $plus = "20";
elseif ($l == "hard") $plus = "30";

$next = ($q + 1);



	if ($lastaction != "$guess")
	{
	$query = "update forum_users set quiz_score=quiz_score+$plus where username='$login'";
	mysql_query($query);

	$query = "update forum_users set last_answer='$guess' where username='$login'";
	mysql_query($query);

	$mssss = "you got the right answer, $plus points were added to your score.";
	}
	else
	{
	$query = "update forum_users set quiz_score=quiz_score-$plus where username='$login'";
	mysql_query($query);

	$mssss = "You won, but you already knew that, didn't you?<br/>
	Nice try but that's just cost you the points you won for answering right the first time, further attempts to cheat will each cost you $plus points, is it REALLY worth it?<br/>
	Stop reloading the page wise guy!";

	}


echo "<p class=\"break\">";

echo "<b>Correct!</b>$inboxes$breaker</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">";

echo"<i>$mssss</i><br/>";


if ($q <= 9) 
	{
echo "<br/><a href=\"./$l.php?ses=$ses&amp;q=$next\">go to question $next</a><br/>";
	}

elseif ($q == 10)
	{
	if ($l == "easy")
		{
	$query = "update forum_users set quiz_e_played='yes' where username='$login'";
	mysql_query($query);
		}
	elseif ($l == "med")
		{
	$query = "update forum_users set quiz_m_played='yes' where username='$login'";
	mysql_query($query);
		}
	elseif ($l == "hard")
		{
	$query = "update forum_users set quiz_h_played='yes' where username='$login'";
	mysql_query($query);
		}

echo "<br/>you've completed this round.<br/>
<a href=\"./index.php?ses=$ses&amp;act=play\">select difficulty</a><br/>";
	}

echo "</p><hr/><p class=\"break\">$breaker$hyback<a href=\"../../mainmenu.php?ses=$ses\">main menu</a>$shortcuts</p></body></html>";
exit;
			}


else

			{



if ($l == "easy") $plus = "10";
elseif ($l == "med") $plus = "20";
elseif ($l == "hard") $plus = "30";



	$query = "update forum_users set quiz_score=quiz_score-$plus where username='$login'";
	mysql_query($query);



echo "<p class=\"break\">";



echo "<b>Wrong!!</b>$inboxes$breaker</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">";

echo"<i>your answer was wrong, $plus points were deducted from your score.</i><br/>";


echo "</p><hr/><p class=\"break\">$breaker$hyfor <a href=\"./$l.php?ses=$ses&amp;q=$q\">try question $q again</a><br/>";

echo "$hyback <a href=\"../../mainmenu.php?ses=$ses\">main menu</a>$shortcuts</p></body></html>";
exit;
			}



?>



