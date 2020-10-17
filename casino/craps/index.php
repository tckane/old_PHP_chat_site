<?php




include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/config.php');
include('../scripts/functions.php');
include('../scripts/main.php');

$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];


$credits = $row_ses["credits"];


$yesplay = $_POST["yesplay"];


$bet = "10";

$lowlimit = ($bet - 1);



$img1 = "<img src=\"./images/small/die1.gif\"/>";
$img2 = "<img src=\"./images/small/die2.gif\"/>";
$img3 = "<img src=\"./images/small/die3.gif\"/>";
$img4 = "<img src=\"./images/small/die4.gif\"/>";
$img5 = "<img src=\"./images/small/die5.gif\"/>";
$img6 = "<img src=\"./images/small/die6.gif\"/>";


echo "<p class=\"break\"><img src=\"../../scripts/phoenix.php?login=$login&amp;string=The%20Craps%20Table\" alt=\"The Craps Table\"/>
</p>";



if ($credits > $lowlimit)
{


echo "<div class=\"breakforum\">";

$housediea = rand("1","6");
$housedieb = rand("1","6");

$housediec = ($housediea + $housedieb);


$mydiea = rand("1","6");
$mydieb = rand("1","6");

$mydiec = ($mydiea + $mydieb);




if ($housediea == 6 && $housedieb == 6) $housefullset = "Midnight!";
if ($housediea == 5 && $housedieb == 5) $housefullset = "Hard Ten!";
if ($housediea == 4 && $housedieb == 4) $housefullset = "Hard Eight!";
if ($housediea == 3 && $housedieb == 3) $housefullset = "Hard Six!";
if ($housediea == 2 && $housedieb == 2) $housefullset = "Hard Four!";
if ($housediea == 1 && $housedieb == 1) $housefullset = "Snake Eyes!";




if ($mydiea == 6 && $mydieb == 6) $myfullset = "Midnight!";
if ($mydiea == 5 && $mydieb == 5) $myfullset = "Hard Ten!";
if ($mydiea == 4 && $mydieb == 4) $myfullset = "Hard Eight!";
if ($mydiea == 3 && $mydieb == 3) $myfullset = "Hard Six!";
if ($mydiea == 2 && $mydieb == 2) $myfullset = "Hard Four!";
if ($mydiea == 1 && $mydieb == 1) $myfullset = "Snake Eyes!";



$imghousea = "<img src=\"./images/die$housediea.gif\"/>";

$imghouseb = "<img src=\"./images/die$housedieb.gif\"/>";

$imgmya = "<img src=\"./images/die$mydiea.gif\"/>";

$imgmyb = "<img src=\"./images/die$mydieb.gif\"/>";



$diediff = ($mydiec - $housediec);



if ($yesplay == "go")
{


if ($housediec < $mydiec)
{


	if ($diediff > 0)
	{
		if ($myfullset != "")
		{
		$myprize = ($mydiec * $diediff);

		$query = "update forum_users set credits=credits+$myprize where username='$login'";
		mysql_query($query);
		$query = "update forum_users set credits=credits-$bet where username='$login'";
		mysql_query($query);

		}
		else
		{
		$myprize = "$diediff";
		$query = "update forum_users set credits=credits+$myprize where username='$login'";
		mysql_query($query);
		$query = "update forum_users set credits=credits-$bet where username='$login'";
		mysql_query($query);
		}

	}
	else
	{
	$myprize = ($mydiec);
	$query = "update forum_users set credits=credits+$myprize where username='$login'";
	mysql_query($query);
	$query = "update forum_users set credits=credits-$bet where username='$login'";
	mysql_query($query);
	}

}
else
{
$query = "update forum_users set credits=credits-$bet where username='$login'";
mysql_query($query);
}


}



$loginass = ucfirst(strtolower("$login"));


echo "<table border=\"1px\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">";

echo "<tr align=\"center\"><td colspan=\"4\"><img src=\"./logo.gif\"/></td></tr>";


echo "<tr align=\"center\"><td colspan=\"2\"><i><b>House</b></i></td><td colspan=\"2\"><i><b>$loginass</b></i></td></tr>";
echo "<tr align=\"center\"><td>$imghousea</td><td>$imghouseb</td><td>$imgmya</td><td>$imgmyb</td></tr>";



if ($housefullset != "" && $myfullset == "")
{
echo "<tr align=\"center\"><td colspan=\"2\"><b>$housefullset</b></td><td colspan=\"2\"><b>$mydiec points</b></td></tr>";
}
elseif ($housefullset == "" && $myfullset != "")
{
echo "<tr align=\"center\"><td colspan=\"2\"><b>$housediec points</b></td><td colspan=\"2\"><b>$myfullset</b></td></tr>";
}
elseif ($housefullset != "" && $myfullset != "")
{
echo "<tr align=\"center\"><td colspan=\"2\"><b>$housediec points</b></td><td colspan=\"2\"><b>$myfullset</b></td></tr>";
}
else
{
echo "<tr align=\"center\"><td colspan=\"2\"><b>$housediec points</b></td><td colspan=\"2\"><b>$mydiec points</b></td></tr>";
}


if ($yesplay == "go")
{
if ($myprize > 0 ) 
	{ echo "<tr><td colspan=\"4\" align=\"center\"><b>You Won $myprize Credits!</b></td></tr>"; }
	else
	{ echo "<tr><td colspan=\"4\" align=\"center\"><b>Unlucky, try again!</b></td></tr>"; }
}
else
{
echo "<tr><td colspan=\"4\" align=\"center\"><b>Good Luck!</b></td></tr>";
}


echo "<tr><td colspan=\"4\" align=\"center\">Credits: $credits</td></tr>";


echo "<tr><td colspan=\"4\" align=\"center\">Bet: $bet</td></tr>";

echo "<tr><td colspan=\"4\" align=\"center\"><form method=\"post\">
<input type=\"hidden\" name=\"ses\" value=\"$ses\" />
<input type=\"hidden\" name=\"yesplay\" value=\"go\" />
<input type=\"submit\" value=\"throw the dice!\" />
</form></td></tr></table></div>";


}
else
{

echo "<p class=\"breakforum\" style=\"text-align: center;\">Sorry, you need at least $bet credits to play, you currently only have $credits.</p>

<div class=\"breakforum\">

<table border=\"1px\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">

<tr align=\"center\"><td colspan=\"4\"><img src=\"./logo.gif\"/></td></tr>

<tr align=\"center\"><td><img src=\"./images/die1.gif\" align=\"middle\"/></td><td><img src=\"./images/die6.gif\" align=\"middle\"/></td><td><img src=\"./images/die3.gif\" align=\"middle\"/></td><td><img src=\"./images/die2.gif\" align=\"middle\"/></td></tr>
</table></div><p class=\"breakforum\" style=\"text-align: center;\">
Go earn some credits and come back later!<br/>
To find out more about credits and how to earn them, click <a href=\"../../about.php?ses=$ses&amp;act=currency\">here</a>.</p>";



}










echo "<p class=\"break\">How To Play</p>
<p class=\"breakforum\" style=\"text-align: center;\">Just throw the dice!<br/>
A throw costs you 10Cr but it's brilliant value as there's several ways of winning and the jackpot is a 120Cr.<br/>
This version of Craps is slightly different to normal craps, the betting &amp; payout format has been simplified for mobile 'on-the-go' style use. Read all about it below.</p>


<p class=\"break\">Prizes &amp; Win Conditions</p>
<p class=\"breakforum\" style=\"text-align: center;\">Winning is simple, simply roll a higher die score than the house and you get the difference back in credits.<br/>
The difference is measured by removing the house score from your score, so if you roll a 10 and the house rolls snake eyes (2) you get 8 credits, if you both roll the same score, you get nothing, the house wins and collects your bet (thanks!) and that's it! - Or is it?<br/>
No, that's not it. Below is a list of matching pairs from 4 to 12 (you can't win with snake eyes), hit one of these and you win that prize multiplied by the difference, so if you score a pair of 6s and the computer gets 8 then you get 12 multiplied by 4 giving you 40 credits.</p>



<table class=\"breakforum\" style=\"width: 100%;\">


<tr style=\"text-align: left;\"><td style=\"width: 33%;\"><small>$img2$img2</small></td><td style=\"width: 33%;\"><small>Hard Four</small></td><td style=\"width: 33%;\"><small>4Cr<b>&#215;</b>Diff</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 33%;\"><small>$img3$img3</small></td><td style=\"width: 33%;\"><small>Hard Six</small></td><td style=\"width: 33%;\"><small>6Cr<b>&#215;</b>Diff</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 33%;\"><small>$img4$img4</small></td><td style=\"width: 33%;\"><small>Hard Eight</small></td><td style=\"width: 33%;\"><small>8Cr<b>&#215;</b>Diff</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 33%;\"><small>$img5$img5</small></td><td style=\"width: 33%;\"><small>Hard Ten</small></td><td style=\"width: 33%;\"><small>10Cr<b>&#215;</b>Diff</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 33%;\"><small>$img6$img6</small></td><td style=\"width: 33%;\"><small>Midnight</small></td><td style=\"width: 33%;\"><small>12Cr<b>&#215;</b>Diff</small></td></tr>


</table>







<p class=\"break\">$hyback <a href=\"../index.php?ses=$ses\">casino games</a><br/>
$hyback <a href=\"../../mainmenu.php?ses=$ses\">main menu</a></p>";




?>






