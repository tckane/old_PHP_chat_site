<?php


include('../../scripts/header.php');
include('../../scripts/session.php');
include('../../scripts/config.php');
include('../../scripts/functions.php');
include('../../scripts/main.php');
$login=$row_ses["username"];
$group = $row_ses["userlevel"];
$myscore=$row_ses["quiz_score"];
$simages = $row_ses["simages"];
$peasy = $row_ses["quiz_e_played"];
$pmed = $row_ses["quiz_m_played"];
$phard = $row_ses["quiz_h_played"];

$query = "UPDATE forum_users set lastactive=now(), location='Quiz' where username='$login'";
mysql_query($query);

$query = "UPDATE friends set lastactive=now(), location='Quiz' where friendname='$login'";
mysql_query($query);



if ($act == "index" | $act == "" )

			{

$query = "SELECT * FROM forum_users WHERE quiz_admin='yes' AND userlevel>1";
$result = mysql_query("$query");
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

		$host = $row["username"];
		$col = $row["my_color"];

echo "<p class=\"break\">";
echo "Welcome To<br/>";
echo "<big><b>Quiz</b></big>";
echo "<br/>$inboxes</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">";



echo "$hy<a href=\"./index.php?act=about&amp;ses=$ses\">what do i do?!</a>$hy<br/>";
echo "$hy<a href=\"./index.php?act=play&amp;ses=$ses\">play now</a>$hy<br/>";
echo "$hy<a href=\"./scores.php?ses=$ses\">top scorers</a>$hy<br/>";




$query = "SELECT count(*) from forum_users where quiz_score<-80";
$result =mysql_query($query);
$row2 =mysql_fetch_array($result);
$count = $row2[0];

if ($count > 0)
{
echo "$hy<a href=\"./losers.php?ses=$ses\">top losers</a>$hy<br/>";
}

$query = "SELECT count(*) from forum_users where quiz_score<0";
$result =mysql_query($query);
$row2 =mysql_fetch_array($result);
$count1 = $row2[0];

$query = "SELECT count(*) from forum_users where quiz_score>0";
$result =mysql_query($query);
$row2 =mysql_fetch_array($result);
$count2 = $row2[0];



$countup = ($count1 + $count2);

echo "<br/>$countup people have taken part in Quiz<br/>";

if ($group < 2) echo "<a href=\"./adminstr8.php?ses=$ses&amp;update=yes\">update questions?</a><br/>";

echo "</p><hr/><p class=\"break\">
$hyback <a href=\"../index.php?ses=$ses\">back to extras</a><br/>
$hyback <a href=\"../../mainmenu.php?ses=$ses\">main menu</a>$shortcuts</p></body></html>";
exit;
			}





/*
#=======================================#
next act, 'act about' it's the 'about' page, i'm taking everything in order so this is first after 'index'

i hope your learning something...
#=======================================#
*/




if ($act == "about")

			{
echo "<p class=\"break\">";
echo "<big><b>Quiz</b></big>";
echo "<br/><b>About Quiz</b>$inboxes</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">";


echo "this is a multiple choice quiz, each question has 4 possible answers.<br/><br/>
for each question you get right, you get points, the points you get depend on the difficulty level you've selected:<br/>
<span style=\"color: blue;\"><b>easy = 10 points</b></span><br/>
<span style=\"color: green;\"><b>medium = 20 points</b></span><br/>
<span style=\"color: red;\"><b>hard = 30 points</b></span><br/>
but, each time you get a question wrong, you lose the 
<span style=\"color: blue;\">10</span>, <span style=\"color: green;\">20</span> or <span style=\"color: red;\">30</span> points depending on the difficulty level you selected, and don't think it stops at zero, oh no, if you get your very first question wrong, you'll need to get the next one right to return to zero.";



echo "</p><hr/><p class=\"break\">$breaker
$hyback <a href=\"./index.php?ses=$ses&amp;act=index\">back</a><br/>
$hyback <a href=\"../index.php?ses=$ses\">back to extras</a><br/>
$hyback <a href=\"../../mainmenu.php?ses=$ses\">main menu</a>$shortcuts</p></body></html>";
exit;
			}




/*
#=======================================#



well, let's not, let's just code the fucker...


this is the second-to-last act in this file index.php.
this lets our wappite select a difficulty setting.
once done, they will be taken to 'questions.php'
where they will see their first question out of a possible 10...



...nervous?
#=======================================#
*/


if ($act == "play")

			{
echo "<p class=\"break\">";
echo "<big><b>Quiz</b></big>";
echo "<br/>please select level of difficulty$inboxes<br/></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">";


if ($peasy == "no") echo "<a style=\"color: blue;\" href=\"./easy.php?ses=$ses&amp;q=1\">easy</a><br/>";
if ($peasy == "yes") echo "<span style=\"color: blue;\"><b>** completed **</b></span><br/>";

if ($pmed == "no") echo "<a style=\"color: green;\" href=\"./med.php?ses=$ses&amp;q=1\">medium</a><br/>";
if ($pmed == "yes") echo "<span style=\"color: green;\"><b>** completed **</b></span><br/>";

if ($phard == "no") echo "<a style=\"color: red;\" href=\"./hard.php?ses=$ses&amp;q=1\">hard</a><br/>";
if ($phard== "yes") echo "<span style=\"color: red;\"><b>** completed **</b></span><br/>";

if ($phard== "yes") if ($peasy == "yes") if ($pmed == "yes")
{
echo "<b>you have answered all the questions for this week, please try again next week!</b><br/>";
}


echo "<br/><b>your current score is $myscore</b><br/>";

echo "</p><hr/><p class=\"break\">$breaker
$hyback <a href=\"./index.php?ses=$ses&amp;act=index\">back</a><br/>
$hyback <a href=\"../index.php?ses=$ses\">back to extras</a><br/>
$hyback <a href=\"../../mainmenu.php?ses=$ses\">main menu</a>";



echo "$shortcuts</p></body></html>";
exit;
			}






?>



