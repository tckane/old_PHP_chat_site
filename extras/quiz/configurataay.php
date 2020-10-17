<?php


include('../../scripts/header.php');
include('../../scripts/session.php');
include('../../scripts/config.php');
include('../../scripts/functions.php');
include('../../scripts/main.php');

$login = $row_ses["username"];
$password = $row_ses["password"];



if ($q == 1)
   	{

	$query = "select * from waamp_quiz where difficulty='$diff' AND number=1";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);

		$question = $row["question"];
		$correct = $row["right_answer"];
		$a = $row["answer1"];
		$b = $row["answer2"];
		$c = $row["answer3"];
		$d = $row["answer4"];
		$id = $row["quid"];

     	$question = make_wml_compat($row["question"]);
     	$correct = make_wml_compat($row["right_answer"]);
     	$a = make_wml_compat($row["answer1"]);
     	$b = make_wml_compat($row["answer2"]);
     	$c = make_wml_compat($row["answer3"]);
     	$d = make_wml_compat($row["answer4"]);

    	echo "<p class=\"break\">

	
    	<b>edit question $q<br/>[difficulty: $diff]</b></p><hr/>

	<form class=\"breakforum\" action=\"./insert.php?ses=$ses&amp;id=$id&amp;qx=1&amp;diff=$diff\" method=\"post\">
	<fieldset>
    	<br/>question:<br/>
    	<input type=\"text\" name=\"nquestion\" class=\"textbox\" value=\"$question\" maxlength=\"100\" />
    	<br/>correct answer:<br/>
    	<input type=\"text\" name=\"nright\" value=\"$correct\" class=\"textbox\" maxlength=\"100\" /><br/>
	<br/>one of the answers below must be the same case and spelling as the correct answer
    	<br/>answer 1:<br/>
    	<input type=\"text\" name=\"na\" value=\"$a\" class=\"textbox\"  maxlength=\"100\" />
    	<br/>answer 2:<br/>
    	<input type=\"text\" name=\"nb\" value=\"$b\" class=\"textbox\"  maxlength=\"100\" />
    	<br/>answer 3:<br/>
    	<input type=\"text\" name=\"nc\" value=\"$c\" class=\"textbox\"  maxlength=\"100\" />
    	<br/>answer 4:<br/>
    	<input type=\"text\" name=\"nd\" value=\"$d\" class=\"textbox\"  maxlength=\"100\" /><br/>";


    	echo "<input type=\"submit\" class=\"buttstyle\" value=\"update\" />


    	</fieldset>
    	</form><hr/><p class=\"break\">";

    	echo "$hyback <a href=\"./adminstr8.php?ses=$ses&amp;update=yes\">go back</a>
	</p></body></html>";
    	exit;
   	}



if ($q == 2)
   	{

	$query = "select * from waamp_quiz where difficulty='$diff' AND number=2";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);

		$question = $row["question"];
		$correct = $row["right_answer"];
		$a = $row["answer1"];
		$b = $row["answer2"];
		$c = $row["answer3"];
		$d = $row["answer4"];
		$id = $row["quid"];

     	$question = make_wml_compat($row["question"]);
     	$correct = make_wml_compat($row["right_answer"]);
     	$a = make_wml_compat($row["answer1"]);
     	$b = make_wml_compat($row["answer2"]);
     	$c = make_wml_compat($row["answer3"]);
     	$d = make_wml_compat($row["answer4"]);

    	echo "<p class=\"break\">


	
    	<b>edit question $q<br/>[difficulty: $diff]</b></p><hr/>

	<form class=\"breakforum\" action=\"./insert.php?ses=$ses&amp;id=$id&amp;qx=2&amp;diff=$diff\" method=\"post\">
	<fieldset>
    	<br/>question:<br/>
    	<input type=\"text\" name=\"nquestion\" class=\"textbox\" value=\"$question\" maxlength=\"100\" />
    	<br/>correct answer:<br/>
    	<input type=\"text\" name=\"nright\"  class=\"textbox\" value=\"$correct\" maxlength=\"100\" /><br/>
	<br/>one of the answers below must be the same case and spelling as the correct answer
    	<br/>answer 1:<br/>
    	<input type=\"text\" name=\"na\" value=\"$a\"  class=\"textbox\" maxlength=\"100\" />
    	<br/>answer 2:<br/>
    	<input type=\"text\" name=\"nb\" value=\"$b\" class=\"textbox\"  maxlength=\"100\" />
    	<br/>answer 3:<br/>
    	<input type=\"text\" name=\"nc\" value=\"$c\" class=\"textbox\"  maxlength=\"100\" />
    	<br/>answer 4:<br/>
    	<input type=\"text\" name=\"nd\" value=\"$d\" class=\"textbox\"  maxlength=\"100\" /><br/>";


    	echo "<input type=\"submit\" class=\"buttstyle\" value=\"update\" />


    	</fieldset>
    	</form><hr/><p class=\"break\">";

    	echo "$hyback <a href=\"./adminstr8.php?ses=$ses&amp;update=yes\">go back</a>
	</p></body></html>";
    	exit;
   	}

if ($q == 3)
   	{

	$query = "select * from waamp_quiz where difficulty='$diff' AND number=3";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);

		$question = $row["question"];
		$correct = $row["right_answer"];
		$a = $row["answer1"];
		$b = $row["answer2"];
		$c = $row["answer3"];
		$d = $row["answer4"];
		$id = $row["quid"];

     	$question = make_wml_compat($row["question"]);
     	$correct = make_wml_compat($row["right_answer"]);
     	$a = make_wml_compat($row["answer1"]);
     	$b = make_wml_compat($row["answer2"]);
     	$c = make_wml_compat($row["answer3"]);
     	$d = make_wml_compat($row["answer4"]);

    	echo "<p class=\"break\">

	
    	<b>edit question $q<br/>[difficulty: $diff]</b></p><hr/>

	<form class=\"breakforum\" action=\"./insert.php?ses=$ses&amp;id=$id&amp;qx=3&amp;diff=$diff\" method=\"post\">
	<fieldset>
    	<br/>question:<br/>
    	<input type=\"text\" name=\"nquestion\" value=\"$question\" class=\"textbox\" maxlength=\"100\" />
    	<br/>correct answer:<br/>
    	<input type=\"text\" name=\"nright\" value=\"$correct\" class=\"textbox\"  maxlength=\"100\" /><br/>
	<br/>one of the answers below must be the same case and spelling as the correct answer
    	<br/>answer 1:<br/>
    	<input type=\"text\" name=\"na\" value=\"$a\"  class=\"textbox\" maxlength=\"100\" />
    	<br/>answer 2:<br/>
    	<input type=\"text\" name=\"nb\" value=\"$b\"  class=\"textbox\" maxlength=\"100\" />
    	<br/>answer 3:<br/>
    	<input type=\"text\" name=\"nc\" value=\"$c\"  class=\"textbox\" maxlength=\"100\" />
    	<br/>answer 4:<br/>
    	<input type=\"text\" name=\"nd\" value=\"$d\"  class=\"textbox\" maxlength=\"100\" /><br/>";


    	echo "<input type=\"submit\" class=\"buttstyle\" value=\"update\" />


    	</fieldset>
    	</form><hr/><p class=\"break\">";

    	echo "$hyback <a href=\"./adminstr8.php?ses=$ses&amp;update=yes\">go back</a>
	</p></body></html>";
    	exit;
   	}


if ($q == 4)
   	{

	$query = "select * from waamp_quiz where difficulty='$diff' AND number=4";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);

		$question = $row["question"];
		$correct = $row["right_answer"];
		$a = $row["answer1"];
		$b = $row["answer2"];
		$c = $row["answer3"];
		$d = $row["answer4"];
		$id = $row["quid"];

     	$question = make_wml_compat($row["question"]);
     	$correct = make_wml_compat($row["right_answer"]);
     	$a = make_wml_compat($row["answer1"]);
     	$b = make_wml_compat($row["answer2"]);
     	$c = make_wml_compat($row["answer3"]);
     	$d = make_wml_compat($row["answer4"]);

    	echo "<p class=\"break\">



	
    	<b>edit question $q<br/>[difficulty: $diff]</b></p><hr/>

	<form class=\"breakforum\" action=\"./insert.php?ses=$ses&amp;id=$id&amp;qx=4&amp;diff=$diff\" method=\"post\">
	<fieldset>
    	<br/>question:<br/>
    	<input type=\"text\" name=\"nquestion\" value=\"$question\"  class=\"textbox\" maxlength=\"100\" />
    	<br/>correct answer:<br/>
    	<input type=\"text\" name=\"nright\" value=\"$correct\" class=\"textbox\"  maxlength=\"100\" /><br/>
	<br/>one of the answers below must be the same case and spelling as the correct answer
    	<br/>answer 1:<br/>
    	<input type=\"text\" name=\"na\" value=\"$a\"  class=\"textbox\" maxlength=\"100\" />
    	<br/>answer 2:<br/>
    	<input type=\"text\" name=\"nb\" value=\"$b\" class=\"textbox\"  maxlength=\"100\" />
    	<br/>answer 3:<br/>
    	<input type=\"text\" name=\"nc\" value=\"$c\" class=\"textbox\"  maxlength=\"100\" />
    	<br/>answer 4:<br/>
    	<input type=\"text\" name=\"nd\" value=\"$d\" class=\"textbox\"  maxlength=\"100\" /><br/>";


    	echo "<input type=\"submit\" class=\"buttstyle\" value=\"update\" />


    	</fieldset>
    	</form><hr/><p class=\"break\">";

    	echo "$hyback <a href=\"./adminstr8.php?ses=$ses&amp;update=yes\">go back</a>
	</p></body></html>";
    	exit;
   	}





if ($q == 5)
   	{

	$query = "select * from waamp_quiz where difficulty='$diff' AND number=5";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);

		$question = $row["question"];
		$correct = $row["right_answer"];
		$a = $row["answer1"];
		$b = $row["answer2"];
		$c = $row["answer3"];
		$d = $row["answer4"];
		$id = $row["quid"];

     	$question = make_wml_compat($row["question"]);
     	$correct = make_wml_compat($row["right_answer"]);
     	$a = make_wml_compat($row["answer1"]);
     	$b = make_wml_compat($row["answer2"]);
     	$c = make_wml_compat($row["answer3"]);
     	$d = make_wml_compat($row["answer4"]);

    	echo "<p class=\"break\">



	
    	<b>edit question $q<br/>[difficulty: $diff]</b></p><hr/>

	<form class=\"breakforum\" action=\"./insert.php?ses=$ses&amp;id=$id&amp;qx=5&amp;diff=$diff\" method=\"post\">
	<fieldset>
    	<br/>question:<br/>
    	<input type=\"text\" name=\"nquestion\" value=\"$question\"  class=\"textbox\" maxlength=\"100\" />
    	<br/>correct answer:<br/>
    	<input type=\"text\" name=\"nright\" value=\"$correct\"  class=\"textbox\" maxlength=\"100\" /><br/>
	<br/>one of the answers below must be the same case and spelling as the correct answer
    	<br/>answer 1:<br/>
    	<input type=\"text\" name=\"na\" value=\"$a\"  class=\"textbox\" maxlength=\"100\" />
    	<br/>answer 2:<br/>
    	<input type=\"text\" name=\"nb\" value=\"$b\" class=\"textbox\"  maxlength=\"100\" />
    	<br/>answer 3:<br/>
    	<input type=\"text\" name=\"nc\" value=\"$c\"  class=\"textbox\" maxlength=\"100\" />
    	<br/>answer 4:<br/>
    	<input type=\"text\" name=\"nd\" value=\"$d\"  class=\"textbox\" maxlength=\"100\" /><br/>";


    	echo "<input type=\"submit\" class=\"buttstyle\" value=\"update\" />


    	</fieldset>
    	</form><hr/><p class=\"break\">";

    	echo "$hyback <a href=\"./adminstr8.php?ses=$ses&amp;update=yes\">go back</a>
	</p></body></html>";
    	exit;
   	}




if ($q == 6)
   	{



	$query = "select * from waamp_quiz where difficulty='$diff' AND number=6";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);

		$question = $row["question"];
		$correct = $row["right_answer"];
		$a = $row["answer1"];
		$b = $row["answer2"];
		$c = $row["answer3"];
		$d = $row["answer4"];
		$id = $row["quid"];

     	$question = make_wml_compat($row["question"]);
     	$correct = make_wml_compat($row["right_answer"]);
     	$a = make_wml_compat($row["answer1"]);
     	$b = make_wml_compat($row["answer2"]);
     	$c = make_wml_compat($row["answer3"]);
     	$d = make_wml_compat($row["answer4"]);

    	echo "<p class=\"break\">


	
    	<b>edit question $q<br/>[difficulty: $diff]</b></p><hr/>

	<form class=\"breakforum\" action=\"./insert.php?ses=$ses&amp;id=$id&amp;qx=6&amp;diff=$diff\" method=\"post\">
	<fieldset>
    	<br/>question:<br/>
    	<input type=\"text\" name=\"nquestion\" value=\"$question\" class=\"textbox\"  maxlength=\"100\" />
    	<br/>correct answer:<br/>
    	<input type=\"text\" name=\"nright\" value=\"$correct\"  class=\"textbox\" maxlength=\"100\" /><br/>
	<br/>one of the answers below must be the same case and spelling as the correct answer
    	<br/>answer 1:<br/>
    	<input type=\"text\" name=\"na\" value=\"$a\"  class=\"textbox\" maxlength=\"100\" />
    	<br/>answer 2:<br/>
    	<input type=\"text\" name=\"nb\" value=\"$b\"  class=\"textbox\" maxlength=\"100\" />
    	<br/>answer 3:<br/>
    	<input type=\"text\" name=\"nc\" value=\"$c\" class=\"textbox\"  maxlength=\"100\" />
    	<br/>answer 4:<br/>
    	<input type=\"text\" name=\"nd\" value=\"$d\" class=\"textbox\"  maxlength=\"100\" /><br/>";


    	echo "<input type=\"submit\" class=\"buttstyle\" value=\"update\" />


    	</fieldset>
    	</form><hr/><p class=\"break\">";

    	echo "$hyback <a href=\"./adminstr8.php?ses=$ses&amp;update=yes\">go back</a>
	</p></body></html>";
    	exit;
   	}



if ($q == 7)
   	{

	$query = "select * from waamp_quiz where difficulty='$diff' AND number=7";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);

		$question = $row["question"];
		$correct = $row["right_answer"];
		$a = $row["answer1"];
		$b = $row["answer2"];
		$c = $row["answer3"];
		$d = $row["answer4"];
		$id = $row["quid"];

     	$question = make_wml_compat($row["question"]);
     	$correct = make_wml_compat($row["right_answer"]);
     	$a = make_wml_compat($row["answer1"]);
     	$b = make_wml_compat($row["answer2"]);
     	$c = make_wml_compat($row["answer3"]);
     	$d = make_wml_compat($row["answer4"]);

    	echo "<p class=\"break\">



	
    	<b>edit question $q<br/>[difficulty: $diff]</b></p><hr/>

	<form class=\"breakforum\" action=\"./insert.php?ses=$ses&amp;id=$id&amp;qx=7&amp;diff=$diff\" method=\"post\">
	<fieldset>
    	<br/>question:<br/>
    	<input type=\"text\" name=\"nquestion\" value=\"$question\"  class=\"textbox\" maxlength=\"100\" />
    	<br/>correct answer:<br/>
    	<input type=\"text\" name=\"nright\" value=\"$correct\"  class=\"textbox\" maxlength=\"100\" /><br/>
	<br/>one of the answers below must be the same case and spelling as the correct answer
    	<br/>answer 1:<br/>
    	<input type=\"text\" name=\"na\" value=\"$a\"  class=\"textbox\" maxlength=\"100\" />
    	<br/>answer 2:<br/>
    	<input type=\"text\" name=\"nb\" value=\"$b\"  class=\"textbox\" maxlength=\"100\" />
    	<br/>answer 3:<br/>
    	<input type=\"text\" name=\"nc\" value=\"$c\"  class=\"textbox\" maxlength=\"100\" />
    	<br/>answer 4:<br/>
    	<input type=\"text\" name=\"nd\" value=\"$d\"  class=\"textbox\" maxlength=\"100\" /><br/>";


    	echo "<input type=\"submit\" class=\"buttstyle\" value=\"update\" />


    	</fieldset>
    	</form><hr/><p class=\"break\">";

    	echo "$hyback <a href=\"./adminstr8.php?ses=$ses&amp;update=yes\">go back</a>
	</p></body></html>";
    	exit;
   	}

if ($q == 8)
   	{

	$query = "select * from waamp_quiz where difficulty='$diff' AND number=8";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);

		$question = $row["question"];
		$correct = $row["right_answer"];
		$a = $row["answer1"];
		$b = $row["answer2"];
		$c = $row["answer3"];
		$d = $row["answer4"];
		$id = $row["quid"];

     	$question = make_wml_compat($row["question"]);
     	$correct = make_wml_compat($row["right_answer"]);
     	$a = make_wml_compat($row["answer1"]);
     	$b = make_wml_compat($row["answer2"]);
     	$c = make_wml_compat($row["answer3"]);
     	$d = make_wml_compat($row["answer4"]);

    	echo "<p class=\"break\">



	
    	<b>edit question $q<br/>[difficulty: $diff]</b></p><hr/>

	<form class=\"breakforum\" action=\"./insert.php?ses=$ses&amp;id=$id&amp;qx=8&amp;diff=$diff\" method=\"post\">
	<fieldset>
    	<br/>question:<br/>
    	<input type=\"text\" name=\"nquestion\" value=\"$question\"  class=\"textbox\" maxlength=\"100\" />
    	<br/>correct answer:<br/>
    	<input type=\"text\" name=\"nright\" value=\"$correct\"  class=\"textbox\" maxlength=\"100\" /><br/>
	<br/>one of the answers below must be the same case and spelling as the correct answer
    	<br/>answer 1:<br/>
    	<input type=\"text\" name=\"na\" value=\"$a\"  class=\"textbox\" maxlength=\"100\" />
    	<br/>answer 2:<br/>
    	<input type=\"text\" name=\"nb\" value=\"$b\"  class=\"textbox\" maxlength=\"100\" />
    	<br/>answer 3:<br/>
    	<input type=\"text\" name=\"nc\" value=\"$c\" class=\"textbox\" maxlength=\"100\" />
    	<br/>answer 4:<br/>
    	<input type=\"text\" name=\"nd\" value=\"$d\" class=\"textbox\"  maxlength=\"100\" /><br/>";


    	echo "<input type=\"submit\" class=\"buttstyle\" value=\"update\" />


    	</fieldset>
    	</form><hr/><p class=\"break\">";

    	echo "$hyback <a href=\"./adminstr8.php?ses=$ses&amp;update=yes\">go back</a>
	$atmain</p></body></html>";
    	exit;
   	}


if ($q == 9)
   	{

	$query = "select * from waamp_quiz where difficulty='$diff' AND number=9";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);

		$question = $row["question"];
		$correct = $row["right_answer"];
		$a = $row["answer1"];
		$b = $row["answer2"];
		$c = $row["answer3"];
		$d = $row["answer4"];
		$id = $row["quid"];

     	$question = make_wml_compat($row["question"]);
     	$correct = make_wml_compat($row["right_answer"]);
     	$a = make_wml_compat($row["answer1"]);
     	$b = make_wml_compat($row["answer2"]);
     	$c = make_wml_compat($row["answer3"]);
     	$d = make_wml_compat($row["answer4"]);

    	echo "<p class=\"break\">



	
    	<b>edit question $q<br/>[difficulty: $diff]</b></p><hr/>

	<form class=\"breakforum\" action=\"./insert.php?ses=$ses&amp;id=$id&amp;qx=9&amp;diff=$diff\" method=\"post\">
	<fieldset>
    	<br/>question:<br/>
    	<input type=\"text\" name=\"nquestion\" value=\"$question\" class=\"textbox\" maxlength=\"100\" />
    	<br/>correct answer:<br/>
    	<input type=\"text\" name=\"nright\" value=\"$correct\" maxlength=\"100\" /><br/>
	<br/>one of the answers below must be the same case and spelling as the correct answer
    	<br/>answer 1:<br/>
    	<input type=\"text\" name=\"na\" value=\"$a\" class=\"textbox\" maxlength=\"100\" />
    	<br/>answer 2:<br/>
    	<input type=\"text\" name=\"nb\" value=\"$b\" class=\"textbox\" maxlength=\"100\" />
    	<br/>answer 3:<br/>
    	<input type=\"text\" name=\"nc\" value=\"$c\" class=\"textbox\" maxlength=\"100\" />
    	<br/>answer 4:<br/>
    	<input type=\"text\" name=\"nd\" value=\"$d\" class=\"textbox\" maxlength=\"100\" /><br/>";


    	echo "<input type=\"submit\" class=\"buttstyle\" value=\"update\" />


    	</fieldset>
    	</form><hr/><p class=\"break\">";

    	echo "$hyback <a href=\"./adminstr8.php?ses=$ses&amp;update=yes\">go back</a>
	</p></body></html>";
    	exit;
   	}





if ($q == 10)
   	{

	$query = "select * from waamp_quiz where difficulty='$diff' AND number=10";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);

		$question = $row["question"];
		$correct = $row["right_answer"];
		$a = $row["answer1"];
		$b = $row["answer2"];
		$c = $row["answer3"];
		$d = $row["answer4"];
		$id = $row["quid"];

     	$question = make_wml_compat($row["question"]);
     	$correct = make_wml_compat($row["right_answer"]);
     	$a = make_wml_compat($row["answer1"]);
     	$b = make_wml_compat($row["answer2"]);
     	$c = make_wml_compat($row["answer3"]);
     	$d = make_wml_compat($row["answer4"]);

    	echo "<p class=\"break\">


	
    	<b>edit question $q<br/>[difficulty: $diff]</b></p><hr/>

	<form class=\"breakforum\" action=\"./insert.php?ses=$ses&amp;id=$id&amp;qx=10&amp;diff=$diff\" method=\"post\">
	<fieldset>
    	<br/>question:<br/>
    	<input type=\"text\" name=\"nquestion\" value=\"$question\" class=\"textbox\" maxlength=\"100\" />
    	<br/>correct answer:<br/>
    	<input type=\"text\" name=\"nright\" value=\"$correct\" class=\"textbox\"  maxlength=\"100\" /><br/>
	<br/>one of the answers below must be the same case and spelling as the correct answer
    	<br/>answer 1:<br/>
    	<input type=\"text\" name=\"na\" value=\"$a\"  class=\"textbox\" maxlength=\"100\" />
    	<br/>answer 2:<br/>
    	<input type=\"text\" name=\"nb\" value=\"$b\" class=\"textbox\"  maxlength=\"100\" />
    	<br/>answer 3:<br/>
    	<input type=\"text\" name=\"nc\" value=\"$c\"  class=\"textbox\" maxlength=\"100\" />
    	<br/>answer 4:<br/>
    	<input type=\"text\" name=\"nd\" value=\"$d\"  class=\"textbox\" maxlength=\"100\" /><br/>";


    	echo "<input type=\"submit\" class=\"buttstyle\" value=\"update\" />


    	</fieldset>
    	</form><hr/><p class=\"break\">";

    	echo "$hyback <a href=\"./adminstr8.php?ses=$ses&amp;update=yes\">go back</a>
	</p></body></html>";
    	exit;
   	}



?>



