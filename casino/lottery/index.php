<?php



include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/config.php');
include('../scripts/functions.php');
include('../scripts/main.php');

$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];



$submitted = $_POST["submitted"];
if ($submitted == "") $submitted = $_GET["submitted"];



if ($zeros == "") $zeros = $_GET["zeros"];

if ($ones == "") $ones = $_GET["ones"];

if ($twos == "") $twos = $_GET["twos"];

if ($threes == "") $threes = $_GET["threes"];

if ($foursa == "") $foursa = $_GET["foursa"];

if ($foursb == "") $foursb = $_GET["foursb"];




$credits = $row_ses["credits"];
$bet = 100;

$lowlimit = ($bet - 1);

echo "<p class=\"break\"><img src=\"../../scripts/phoenix.php?login=$login&amp;string=Lucky%20Lottery\" alt=\"Lucky Lottery\"/>
</p>";

if ($credits > $lowlimit) 
{





echo "<div style=\"breakforum\">";



if ($submitted == "")
{


echo "<form action=\"./index.php?ses=$ses\" method=\"post\"><fieldset>";

echo "<table border=\"1px\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">";


echo "<tr align=\"center\"><td colspan=\"6\"><img src=\"./images/logo.gif\"/></td></tr>";

echo "<tr align=\"center\"><td colspan=\"6\"><b>Please select your numbers!</b></td></tr>";

echo "<tr align=\"center\">
<td><img src=\"./images/small/1.gif\" align=\"middle\"/></td>
<td><img src=\"./images/small/2.gif\" align=\"middle\"/></td>
<td><img src=\"./images/small/3.gif\" align=\"middle\"/></td>
<td><img src=\"./images/small/4.gif\" align=\"middle\"/></td>
<td><img src=\"./images/small/5.gif\" align=\"middle\"/></td>
<td><img src=\"./images/small/6.gif\" align=\"middle\"/></td>
</tr>";




echo "<tr align=\"center\"><td><select name=\"zeros\">";
for( $i=1; $i<=9; $i++ )
{
echo "<option value=\"$i\">0$i</option>";
}
echo "</select></td>";


echo "<td><select name=\"ones\">";
for( $i=10; $i<=19; $i++ )
{
echo "<option value=\"$i\">$i</option>";
}
echo "</select></td>";


echo "<td><select name=\"twos\">";
for( $i=20; $i<=29; $i++ )
{
echo "<option value=\"$i\">$i</option>";
}
echo "</select></td>";

echo "<td><select name=\"threes\">";
for( $i=30; $i<=39; $i++ )
{
echo "<option value=\"$i\">$i</option>";
}
echo "</select></td>";

echo "<td><select name=\"foursa\">";
for( $i=40; $i<=44; $i++ )
{
echo "<option value=\"$i\">$i</option>";
}
echo "</select></td>";


echo "<td><select name=\"foursb\">";
for( $i=45; $i<=49; $i++ )
{
echo "<option value=\"$i\">$i</option>";
}
echo "</select></td></tr>";


echo "<tr align=\"center\"><td colspan=\"6\">Credits: $credits</td></tr>";

echo "<tr align=\"center\"><td colspan=\"6\">Bet: $bet</td></tr>";


echo "<tr align=\"center\"><td colspan=\"6\"><input type=\"submit\" value=\"release my balls!\"/></td></tr>";

echo "<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
<input type=\"hidden\" name=\"submitted\" value=\"yes\"/>
</fieldset>
</form></table></div>";

}
else
{

// RESULTS

include('./results.php');





$getballs = "SELECT * FROM phoenix_lottery";
$ourballs = mysql_query("$getballs");
$ballies = mysql_fetch_array($ourballs);
$Aball = $ballies["a"];
$Bball = $ballies["b"];
$Cball = $ballies["c"];
$Dball = $ballies["d"];
$Eball = $ballies["e"];
$Fball = $ballies["f"];




$ApicC = "<img src=\"./images/$zeros.gif\" align=\"middle\"/>";
$BpicC = "<img src=\"./images/$ones.gif\" align=\"middle\"/>";
$CpicC = "<img src=\"./images/$twos.gif\" align=\"middle\"/>";
$DpicC = "<img src=\"./images/$threes.gif\" align=\"middle\"/>";
$EpicC = "<img src=\"./images/$foursa.gif\" align=\"middle\"/>";
$FpicC = "<img src=\"./images/$foursb.gif\" align=\"middle\"/>";

if ($Anumber != "") $Apic = "<img src=\"./images/tick.gif\" align=\"middle\"/>";
else $Apic = "<img src=\"./images/cross.gif\" align=\"middle\"/>";

if ($Bnumber != "") $Bpic = "<img src=\"./images/tick.gif\" align=\"middle\"/>";
else $Bpic = "<img src=\"./images/cross.gif\" align=\"middle\"/>";

if ($Cnumber != "") $Cpic = "<img src=\"./images/tick.gif\" align=\"middle\"/>";
else $Cpic = "<img src=\"./images/cross.gif\" align=\"middle\"/>";

if ($Dnumber != "") $Dpic = "<img src=\"./images/tick.gif\" align=\"middle\"/>";
else $Dpic = "<img src=\"./images/cross.gif\" align=\"middle\"/>";

if ($Enumber != "") $Epic = "<img src=\"./images/tick.gif\" align=\"middle\"/>";
else $Epic = "<img src=\"./images/cross.gif\" align=\"middle\"/>";

if ($Fnumber != "") $Fpic = "<img src=\"./images/tick.gif\" align=\"middle\"/>";
else $Fpic = "<img src=\"./images/cross.gif\" align=\"middle\"/>";

if ($Aball != "") $ApicOURS = "<img src=\"./images/$Aball.gif\" align=\"middle\"/>";
if ($Bball != "") $BpicOURS = "<img src=\"./images/$Bball.gif\" align=\"middle\"/>";
if ($Cball != "") $CpicOURS = "<img src=\"./images/$Cball.gif\" align=\"middle\"/>";
if ($Dball != "") $DpicOURS = "<img src=\"./images/$Dball.gif\" align=\"middle\"/>";
if ($Eball != "") $EpicOURS = "<img src=\"./images/$Eball.gif\" align=\"middle\"/>";
if ($Fball != "") $FpicOURS = "<img src=\"./images/$Fball.gif\" align=\"middle\"/>";




echo "<table border=\"1px\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">";


echo "<tr align=\"center\"><td colspan=\"6\"><img src=\"./images/logo.gif\"/></td></tr>";



if ($ballcount == 0) $ballstat = "You matched no balls!";
elseif ($ballcount == 1) $ballstat = "You matched one ball!";
else $ballstat = "You matched $ballcount balls!";


if ($winstatus == "yes")
{
echo "<tr align=\"center\"><td colspan=\"6\"><big><b>WINNER!!!!!</b></big></td></tr>";
echo "<tr align=\"center\"><td colspan=\"6\"><b>$ballstat</b></td></tr>";
}
else
{
echo "<tr align=\"center\"><td colspan=\"6\"><b>$ballstat</b></td></tr>";
echo "<tr align=\"center\"><td colspan=\"6\"><b>Better Luck Next Time!</b></td></tr>";
}


echo "<tr align=\"center\"><td colspan=\"6\"><b><big>Your Balls</big></b></td></tr>";

echo "<tr align=\"center\"><td colspan=\"6\">$ApicC$BpicC$CpicC$DpicC$EpicC$FpicC</td></tr>";

echo "<tr align=\"center\"><td colspan=\"6\">$Apic$Bpic$Cpic$Dpic$Epic$Fpic</td></tr>";


echo "<tr align=\"center\"><td colspan=\"6\"><b><big>House Balls</big></b></td></tr>";

echo "<tr align=\"center\"><td colspan=\"6\">$ApicOURS$BpicOURS$CpicOURS$DpicOURS$EpicOURS$FpicOURS</td></tr>";


echo "<tr align=\"center\"><td colspan=\"6\"><b><big>$prize</big></b></td></tr>";

echo "<tr align=\"center\"><td colspan=\"6\">Credits: $credits</td></tr>";

echo "<tr align=\"center\"><td colspan=\"6\">Bet: $bet</td></tr>";

echo "<tr align=\"center\"><td colspan=\"6\"><b>Play Again?</b></td></tr>";
echo "<tr align=\"center\"><td colspan=\"6\"><a href=\"./index.php?ses=$ses&amp;zeros=$zeros&amp;ones=$ones&amp;twos=$twos&amp;threes=$threes&amp;foursa=$foursa&amp;foursb=$foursb&amp;submitted=yes\">Same Numbers</a></td></tr>";
echo "<tr align=\"center\"><td colspan=\"6\"><a href=\"./index.php?ses=$ses\">New Numbers</a></td></tr>";
echo "</table>";




$query = "DELETE from phoenix_lottery";
$result = mysql_query ("$query");


// new numbers:

$Anew = rand("1","9");
$Bnew = rand("10","19");
$Cnew = rand("20","29");
$Dnew = rand("30","39");
$Enew = rand("40","44");
$Fnew = rand("45","49");


	$query = "insert into phoenix_lottery ( a, b, c, d, e, f ) values ( '$Anew', '$Bnew', '$Cnew', '$Dnew', '$Enew', '$Fnew' )";
	$result = mysql_query($query);
	$albumid = mysql_insert_id();




}

}
else
{
echo "<p class=\"breakforum\" style=\"text-align: center;\">Sorry, you need at least $bet credits to play, you currently only have $credits.</p>

<div class=\"breakforum\">

<table border=\"1px\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">



<tr align=\"center\"><td colspan=\"6\"><img src=\"./images/logo.gif\"/></td>
</tr>

<tr align=\"center\"><td><img src=\"./images/1.gif\" align=\"middle\"/></td>
<td><img src=\"./images/18.gif\" align=\"middle\"/></td>
<td><img src=\"./images/25.gif\" align=\"middle\"/></td>
<td><img src=\"./images/27.gif\" align=\"middle\"/></td>
<td><img src=\"./images/35.gif\" align=\"middle\"/></td>
<td><img src=\"./images/47.gif\" align=\"middle\"/></td>
</tr>


</table></div><p class=\"breakforum\" style=\"text-align: center;\">
Go earn some credits and come back later!<br/>
To find out more about credits and how to earn them, click <a href=\"../../about.php?ses=$ses&amp;act=currency\">here</a>.</p>";
}

echo "<p class=\"break\">How To Play</p>
<p class=\"breakforum\" style=\"text-align: center;\">Very simple, use the form above to select 6 numbers from 1 to 49<br/>
Match 3 or more balls to win!<br/>
To have another go hit &quot;Have another go!&quot; but beware, a new set of numbers is generated every time!<br/>
You have a MUCH bigger chance of winning than with normal lotteries since the numbers are split into 6 groups, this means that you have a 1 in 10 chance of getting a number from each group, except in the case of the 40s, which gives you a 1 in 5 chance.</p>";




$img1 = "<img src=\"./images/small/2.gif\" align=\"middle\"/>";
$img2 = "<img src=\"./images/small/9.gif\" align=\"middle\"/>";
$img3 = "<img src=\"./images/small/14.gif\" align=\"middle\"/>";
$img4 = "<img src=\"./images/small/29.gif\" align=\"middle\"/>";
$img5 = "<img src=\"./images/small/33.gif\" align=\"middle\"/>";
$img6 = "<img src=\"./images/small/42.gif\" align=\"middle\"/>";


echo "<p class=\"break\">Balls &amp; Prizes</p>
<p class=\"breakforum\" style=\"text-align: center;\">Below is a list of winning combinations and prizes.<br/>
<b>You do not need to match your balls in any particular order to win.</b></p>

<table class=\"breakforum\" style=\"width: 100%;\">
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>$img1$img2 - 2 Balls</small></td><td style=\"width: 50%;\"><small>Your Bet Returned</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>$img1$img2$img3 - 3 Balls</small></td><td style=\"width: 50%;\"><small>1000Cr</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>$img1$img2$img3$img4 - 4 Balls</small></td><td style=\"width: 50%;\"><small>5000Cr</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>$img1$img2$img3$img4$img5 - 5 Balls</small></td><td style=\"width: 50%;\"><small>10000Cr</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>$img1$img2$img3$img4$img5$img6 - All 6 Balls</small></td><td style=\"width: 50%;\"><small>50000Cr</small></td></tr>
</table>


<p class=\"break\">$hyback <a href=\"../index.php?ses=$ses\">casino games</a><br/>
$hyback <a href=\"../../mainmenu.php?ses=$ses\">main menu</a></p>";


?>