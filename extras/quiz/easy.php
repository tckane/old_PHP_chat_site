<?php

include('../../scripts/header.php');
include('../../scripts/session.php');
include('../../scripts/config.php');
include('../../scripts/functions.php');
include('../../scripts/main.php');

$login=$row_ses["username"];









$blu = "<span style=\"font-style: italic; font-weight: bold;\">";
$n = "</span>";



$query = "UPDATE forum_users set lastactive=now(), location='Quiz' where username='$login'";
mysql_query($query);

$query = "UPDATE friends set lastactive=now(), location='Quiz' where friendname='$login'";
mysql_query($query);


/*
#=======================================#
here we are, the questions...

notice how 'question q1' works as well as 'act index'? thats what i was talking about in my speech in the first file...


lets serve the user with a question shall we...


...but first, we gotta add the MySQL queries to get our questions from the database!
#=======================================#
*/


if ($q==1)

{


echo "<p class=\"break\">";


$query = "SELECT * FROM waamp_quiz WHERE difficulty='easy' AND number=1";
$result = mysql_query("$query");
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

while ($row)
	
	{
		$question = $row["question"];
		$a = $row["answer1"];
		$b = $row["answer2"];
		$c = $row["answer3"];
		$d = $row["answer4"];

		$q = $row["number"];
		$quid = $row["quid"];
		$l = $row["difficulty"];




echo "<b>Question $q</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">";


echo "<b>$question</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=a&amp;quid=$quid&amp;l=$l\">$blu$a$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=b&amp;quid=$quid&amp;l=$l\">$blu$b$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=c&amp;quid=$quid&amp;l=$l\">$blu$c$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=d&amp;quid=$quid&amp;l=$l\">$blu$d$n</a><br/>";

	$row = mysql_fetch_array($result);
	}


echo "</p><hr/><p class=\"break\">$hyback  <a href=\"./index.php?ses=$ses&amp;act=index\">back</a><br/>
$hyback <a href=\"../../mainmenu.php?ses=$ses\">main menu</a>";



echo "</p></body></html>";
exit;
			}



#===============question 2================================


if ($q==2)

{


echo "<p class=\"break\">";


$query = "SELECT * FROM waamp_quiz WHERE difficulty='easy' AND number=2";
$result = mysql_query("$query");
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

while ($row)
	
	{
		$question = $row["question"];
		$a = $row["answer1"];
		$b = $row["answer2"];
		$c = $row["answer3"];
		$d = $row["answer4"];

		$q = $row["number"];
		$quid = $row["quid"];
		$l = $row["difficulty"];



     	$a = make_wml_compat($row["answer1"]);
     	$b = make_wml_compat($row["answer2"]);
     	$c = make_wml_compat($row["answer3"]);
     	$d = make_wml_compat($row["answer4"]);

echo "<b>Question $q</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">";


echo "<b>$question</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=a&amp;quid=$quid&amp;l=$l\">$blu$a$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=b&amp;quid=$quid&amp;l=$l\">$blu$b$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=c&amp;quid=$quid&amp;l=$l\">$blu$c$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=d&amp;quid=$quid&amp;l=$l\">$blu$d$n</a><br/>";

	$row = mysql_fetch_array($result);
	}


echo "</p><hr/><p class=\"break\">$hyback  <a href=\"./index.php?ses=$ses&amp;act=index\">back</a><br/>
$hyback <a href=\"../../mainmenu.php?ses=$ses\">main menu</a>";




echo "</p></body></html>";
exit;
			}

#===============question 3================================


if ($q==3)

{


echo "<p class=\"break\">";


$query = "SELECT * FROM waamp_quiz WHERE difficulty='easy' AND number=3";
$result = mysql_query("$query");
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

while ($row)
	
	{
		$question = $row["question"];
		$a = $row["answer1"];
		$b = $row["answer2"];
		$c = $row["answer3"];
		$d = $row["answer4"];

		$q = $row["number"];
		$quid = $row["quid"];
		$l = $row["difficulty"];



     	$a = make_wml_compat($row["answer1"]);
     	$b = make_wml_compat($row["answer2"]);
     	$c = make_wml_compat($row["answer3"]);
     	$d = make_wml_compat($row["answer4"]);

echo "<b>Question $q</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">";


echo "<b>$question</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">";
echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=a&amp;quid=$quid&amp;l=$l\">$blu$a$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=b&amp;quid=$quid&amp;l=$l\">$blu$b$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=c&amp;quid=$quid&amp;l=$l\">$blu$c$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=d&amp;quid=$quid&amp;l=$l\">$blu$d$n</a><br/>";

	$row = mysql_fetch_array($result);
	}


echo "</p><hr/><p class=\"break\">$hyback  <a href=\"./index.php?ses=$ses&amp;act=index\">back</a><br/>
$hyback <a href=\"../../mainmenu.php?ses=$ses\">main menu</a>";





echo "</p></body></html>";
exit;
			}




#===============question 4================================


if ($q==4)

{


echo "<p class=\"break\">";


$query = "SELECT * FROM waamp_quiz WHERE difficulty='easy' AND number=4";
$result = mysql_query("$query");
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

while ($row)
	
	{
		$question = $row["question"];
		$a = $row["answer1"];
		$b = $row["answer2"];
		$c = $row["answer3"];
		$d = $row["answer4"];

		$q = $row["number"];
		$quid = $row["quid"];
		$l = $row["difficulty"];



     	$a = make_wml_compat($row["answer1"]);
     	$b = make_wml_compat($row["answer2"]);
     	$c = make_wml_compat($row["answer3"]);
     	$d = make_wml_compat($row["answer4"]);

echo "<b>Question $q</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">";


echo "<b>$question</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">";
echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=a&amp;quid=$quid&amp;l=$l\">$blu$a$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=b&amp;quid=$quid&amp;l=$l\">$blu$b$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=c&amp;quid=$quid&amp;l=$l\">$blu$c$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=d&amp;quid=$quid&amp;l=$l\">$blu$d$n</a><br/>";

	$row = mysql_fetch_array($result);
	}


echo "</p><hr/><p class=\"break\">$hyback  <a href=\"./index.php?ses=$ses&amp;act=index\">back</a><br/>
$hyback <a href=\"../../mainmenu.php?ses=$ses\">main menu</a>";





echo "</p></body></html>";
exit;
			}




#===============question 5================================



if ($q==5)

{


echo "<p class=\"break\">";


$query = "SELECT * FROM waamp_quiz WHERE difficulty='easy' AND number=5";
$result = mysql_query("$query");
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

while ($row)
	
	{
		$question = $row["question"];
		$a = $row["answer1"];
		$b = $row["answer2"];
		$c = $row["answer3"];
		$d = $row["answer4"];

		$q = $row["number"];
		$quid = $row["quid"];
		$l = $row["difficulty"];



     	$a = make_wml_compat($row["answer1"]);
     	$b = make_wml_compat($row["answer2"]);
     	$c = make_wml_compat($row["answer3"]);
     	$d = make_wml_compat($row["answer4"]);

echo "<b>Question $q</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">";


echo "<b>$question</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=a&amp;quid=$quid&amp;l=$l\">$blu$a$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=b&amp;quid=$quid&amp;l=$l\">$blu$b$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=c&amp;quid=$quid&amp;l=$l\">$blu$c$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=d&amp;quid=$quid&amp;l=$l\">$blu$d$n</a><br/>";

	$row = mysql_fetch_array($result);
	}


echo "</p><hr/><p class=\"break\">$hyback  <a href=\"./index.php?ses=$ses&amp;act=index\">back</a><br/>
$hyback <a href=\"../../mainmenu.php?ses=$ses\">main menu</a>";



echo "</p></body></html>";
exit;
			}



#===============question 6================================


if ($q==6)

{


echo "<p class=\"break\">";


$query = "SELECT * FROM waamp_quiz WHERE difficulty='easy' AND number=6";
$result = mysql_query("$query");
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

while ($row)
	
	{
		$question = $row["question"];
		$a = $row["answer1"];
		$b = $row["answer2"];
		$c = $row["answer3"];
		$d = $row["answer4"];

		$q = $row["number"];
		$quid = $row["quid"];
		$l = $row["difficulty"];


     	$a = make_wml_compat($row["answer1"]);
     	$b = make_wml_compat($row["answer2"]);
     	$c = make_wml_compat($row["answer3"]);
     	$d = make_wml_compat($row["answer4"]);



echo "<b>Question $q</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">";


echo "<b>$question</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=a&amp;quid=$quid&amp;l=$l\">$blu$a$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=b&amp;quid=$quid&amp;l=$l\">$blu$b$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=c&amp;quid=$quid&amp;l=$l\">$blu$c$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=d&amp;quid=$quid&amp;l=$l\">$blu$d$n</a><br/>";

	$row = mysql_fetch_array($result);
	}


echo "</p><hr/><p class=\"break\">$hyback  <a href=\"./index.php?ses=$ses&amp;act=index\">back</a><br/>
$hyback <a href=\"../../mainmenu.php?ses=$ses\">main menu</a>";



echo "</p></body></html>";
exit;
			}

#===============question 7================================


if ($q==7)

{


echo "<p class=\"break\">";


$query = "SELECT * FROM waamp_quiz WHERE difficulty='easy' AND number=7";
$result = mysql_query("$query");
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

while ($row)
	
	{
		$question = $row["question"];
		$a = $row["answer1"];
		$b = $row["answer2"];
		$c = $row["answer3"];
		$d = $row["answer4"];

		$q = $row["number"];
		$quid = $row["quid"];
		$l = $row["difficulty"];


     	$a = make_wml_compat($row["answer1"]);
     	$b = make_wml_compat($row["answer2"]);
     	$c = make_wml_compat($row["answer3"]);
     	$d = make_wml_compat($row["answer4"]);



echo "<b>Question $q</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">";


echo "<b>$question</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=a&amp;quid=$quid&amp;l=$l\">$blu$a$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=b&amp;quid=$quid&amp;l=$l\">$blu$b$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=c&amp;quid=$quid&amp;l=$l\">$blu$c$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=d&amp;quid=$quid&amp;l=$l\">$blu$d$n</a><br/>";

	$row = mysql_fetch_array($result);
	}


echo "</p><hr/><p class=\"break\">$hyback  <a href=\"./index.php?ses=$ses&amp;act=index\">back</a><br/>
$hyback <a href=\"../../mainmenu.php?ses=$ses\">main menu</a>";





echo "</p></body></html>";
exit;
			}




#===============question 8================================


if ($q==8)

{


echo "<p class=\"break\">";


$query = "SELECT * FROM waamp_quiz WHERE difficulty='easy' AND number=8";
$result = mysql_query("$query");
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

while ($row)
	
	{
		$question = $row["question"];
		$a = $row["answer1"];
		$b = $row["answer2"];
		$c = $row["answer3"];
		$d = $row["answer4"];

		$q = $row["number"];
		$quid = $row["quid"];
		$l = $row["difficulty"];



     	$a = make_wml_compat($row["answer1"]);
     	$b = make_wml_compat($row["answer2"]);
     	$c = make_wml_compat($row["answer3"]);
     	$d = make_wml_compat($row["answer4"]);



echo "<b>Question $q</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">";


echo "<b>$question</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=a&amp;quid=$quid&amp;l=$l\">$blu$a$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=b&amp;quid=$quid&amp;l=$l\">$blu$b$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=c&amp;quid=$quid&amp;l=$l\">$blu$c$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=d&amp;quid=$quid&amp;l=$l\">$blu$d$n</a><br/>";

	$row = mysql_fetch_array($result);
	}


echo "</p><hr/><p class=\"break\">$hyback  <a href=\"./index.php?ses=$ses&amp;act=index\">back</a><br/>
$hyback <a href=\"../../mainmenu.php?ses=$ses\">main menu</a>";


echo "</p></body></html>";
exit;
			}


#===============question 9================================


if ($q==9)

{


echo "<p class=\"break\">";


$query = "SELECT * FROM waamp_quiz WHERE difficulty='easy' AND number=9";
$result = mysql_query("$query");
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

while ($row)
	
	{
		$question = $row["question"];
		$a = $row["answer1"];
		$b = $row["answer2"];
		$c = $row["answer3"];
		$d = $row["answer4"];

		$q = $row["number"];
		$quid = $row["quid"];
		$l = $row["difficulty"];


     	$a = make_wml_compat($row["answer1"]);
     	$b = make_wml_compat($row["answer2"]);
     	$c = make_wml_compat($row["answer3"]);
     	$d = make_wml_compat($row["answer4"]);




echo "<b>Question $q</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">";


echo "<b>$question</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=a&amp;quid=$quid&amp;l=$l\">$blu$a$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=b&amp;quid=$quid&amp;l=$l\">$blu$b$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=c&amp;quid=$quid&amp;l=$l\">$blu$c$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=d&amp;quid=$quid&amp;l=$l\">$blu$d$n</a><br/>";

	$row = mysql_fetch_array($result);
	}


echo "</p><hr/><p class=\"break\">$hyback  <a href=\"./index.php?ses=$ses&amp;act=index\">back</a><br/>
$hyback <a href=\"../../mainmenu.php?ses=$ses\">main menu</a>";




echo "</p></body></html>";
exit;
			}




#===============question 10================================


if ($q==10)

{


echo "<p class=\"break\">";


$query = "SELECT * FROM waamp_quiz WHERE difficulty='easy' AND number=10";
$result = mysql_query("$query");
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

while ($row)
	
	{
		$question = $row["question"];
		$a = $row["answer1"];
		$b = $row["answer2"];
		$c = $row["answer3"];
		$d = $row["answer4"];

		$q = $row["number"];
		$quid = $row["quid"];
		$l = $row["difficulty"];


     	$a = make_wml_compat($row["answer1"]);
     	$b = make_wml_compat($row["answer2"]);
     	$c = make_wml_compat($row["answer3"]);
     	$d = make_wml_compat($row["answer4"]);



echo "<b>Question $q</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">";


echo "<b>$question</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=a&amp;quid=$quid&amp;l=$l\">$blu$a$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=b&amp;quid=$quid&amp;l=$l\">$blu$b$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=c&amp;quid=$quid&amp;l=$l\">$blu$c$n</a><br/>";

echo"<a href=\"./answer.php?ses=$ses&amp;q=$q&amp;a=d&amp;quid=$quid&amp;l=$l\">$blu$d$n</a><br/>";

	$row = mysql_fetch_array($result);
	}


echo "</p><hr/><p class=\"break\">$hyback  <a href=\"./index.php?ses=$ses&amp;act=index\">back</a><br/>
$hyback <a href=\"../../mainmenu.php?ses=$ses\">main menu</a>";

echo "</p></body></html>";
exit;
			}


?>



