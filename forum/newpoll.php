<?php


include("../scripts/ses.php");
include("../scripts/waawaamp.php");



$forum = $_GET["forum"];
$cat = $_GET["cat"];



$query = "UPDATE friends set lastactive=now(), location='creating a poll' where friendname='$login'";
mysql_query($query);

$query = "UPDATE forum_users set lastactive=now(), location='creating a poll' where username='$login'";
mysql_query($query);


echo "<p class=\"break\"><big>New Poll</big></p><hr/>
<p class=\"breakforum\" style=\"text-align: center;\"><b>You can create a poll with up to 10 possible answers, it will then appear in the forum like a normal post, to which any user can reply.<br/>
Only one vote per registered user will be counted.</b></p>";


echo "<form class=\"breakforum\" action=\"insert.php?ses=$ses&amp;act=newpoll\" method=\"post\"/>
<fieldset>
<b>Subject</b><br/>
<input type=\"text\" name=\"subjectpoll\" maxlength=\"90\"/><br/><br/>
<b>Your Question</b><br/>
<textarea name=\"messagepoll\" rows=\"3\" cols=\"20\"></textarea><br/><br/>
<b>Now, select up to 10 answers</b><br/>
<small><b>(unused boxes will be ignored)</b></small><br/>

<b>Question 1</b><br/>
<input type=\"text\" name=\"question1\" maxlength=\"2000\"/><br/>

<b>Question 2</b><br/>
<input type=\"text\" name=\"question2\" maxlength=\"2000\"/><br/>

<b>Question 3</b><br/>
<input type=\"text\" name=\"question3\" maxlength=\"2000\"/><br/>

<b>Question 4</b><br/>
<input type=\"text\" name=\"question4\" maxlength=\"2000\"/><br/>

<b>Question 5</b><br/>
<input type=\"text\" name=\"question5\" maxlength=\"2000\"/><br/>

<b>Question 6</b><br/>
<input type=\"text\" name=\"question6\" maxlength=\"2000\"/><br/>

<b>Question 7</b><br/>
<input type=\"text\" name=\"question7\" maxlength=\"2000\"/><br/>

<b>Question 8</b><br/>
<input type=\"text\" name=\"question8\" maxlength=\"2000\"/><br/>

<b>Question 9</b><br/>
<input type=\"text\" name=\"question9\" maxlength=\"2000\"/><br/>

<b>Question 10</b><br/>
<input type=\"text\" name=\"question0\" maxlength=\"2000\"/><br/>



<input type=\"submit\" value=\"post poll\"/>
<input type=\"hidden\" name=\"act\" value=\"newpoll\"/>
<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
<input type=\"hidden\" name=\"cat\" value=\"$cat\"/>
<input type=\"hidden\" name=\"forum\" value=\"$forum\"/>

</fieldset></form>";



                             echo "<hr/><p class=\"break\">$hyback <a href=\"../forum/forums.php?ses=$ses\">message boards</a>";

                             echo "<br/><a href=\"../mainmenu.php?ses=$ses\">main menu</a>";

                             echo "</p></body></html>";
                             exit;




?>