<?php



include('../../scripts/header.php');
include('../../scripts/session.php');
include('../../scripts/config.php');
include('../../scripts/functions.php');
include('../../scripts/main.php');

$login = $row_ses["username"];
$group = $row_ses["userlevel"];


#=========================================================================================


	$query="UPDATE waamp_quiz SET question='$nquestion' where number=$qx AND difficulty='$diff'";
	mysql_query($query);

	$query="UPDATE waamp_quiz SET right_answer='$nright' where number=$qx AND difficulty='$diff'";
	mysql_query($query);

	$query="UPDATE waamp_quiz SET answer1='$na' where number=$qx AND difficulty='$diff'";
	mysql_query($query);
	$query="UPDATE waamp_quiz SET answer2='$nb' where number=$qx AND difficulty='$diff'";
	mysql_query($query);
	$query="UPDATE waamp_quiz SET answer3='$nc' where number=$qx AND difficulty='$diff'";
	mysql_query($query);
	$query="UPDATE waamp_quiz SET answer4='$nd' where number=$qx AND difficulty='$diff'";
	mysql_query($query);


	$next = ($qx + 1);

	if ($next <= 10)
	{
	echo "<p class=\"break\">
	<b>done!</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	question $q was updated, taking you to question $next...<br/>
	<br/>question: $nquestion
	<br/>right answer: $nright<br/>

	<br/>answer 1: $na
	<br/>answer 2: $nb
	<br/>answer 3: $nc
	<br/>answer 4: $nd</p><hr/><p class=\"break\">
	$hyfor <a href=\"./configurataay.php?ses=$ses&amp;q=$next&amp;diff=$diff\">Q $next</a>



	</p></body></html>";
	exit;
	}
else

	{





     	$nquestion = make_wml_compat($nquestion);
     	$nright = make_wml_compat($nright);
     	$na = make_wml_compat($na);
     	$nb = make_wml_compat($nb);
     	$nc = make_wml_compat($nc);
     	$nd = make_wml_compat($nd);

	echo "<p class=\"break\">
	<b>done!</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	that was the last $diff question, go back to quiz admin...<br/>
	<br/>question: $nquestion
	<br/>right answer: $nright<br/>

	<br/>answer 1: $na
	<br/>answer 2: $nb
	<br/>answer 3: $nc
	<br/>answer 4: $nd</p><hr/><p class=\"break\">
	$hyback <a href=\"./adminstr8.php?ses=$ses&amp;update=yes\">back to admin</a>


	</p></body></html>";
	exit;
	}



#=========================================================================================
?>
