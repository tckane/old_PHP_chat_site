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



$bet = "20";

$lowlimit = ($bet - 1);

$img1 = "<img src=\"./images/small/bar1.gif\"/>";
$img2 = "<img src=\"./images/small/bar2.gif\"/>";
$img3 = "<img src=\"./images/small/bar3.gif\"/>";
$imgcherry = "<img src=\"./images/small/cherry.gif\"/>";
$imgdiamond = "<img src=\"./images/small/diamond.gif\"/>";
$imgphoenix = "<img src=\"./images/small/phoenix.gif\"/>";
$imgany = "<img src=\"./images/small/any.gif\"/>";


echo "<p class=\"break\"><img src=\"../../scripts/phoenix.php?login=$login&amp;string=Phoenix%20Fruits\" alt=\"Phoenix Fruits\"/>
</p>";






if ($credits > $lowlimit)
{

echo "<div class=\"breakforum\">";





$faces = array ('Cherry', '1', '2', '3', 'Diamond', 'Phoenix');



$payouts = array (

    '1|1|1' => '10',
    '1|1|2' => '5',
    '1|1|3' => '5',
    '1|1|Cherry' => '5',
    '1|1|Phoenix' => '5',
    '1|1|Diamond' => '5',
    '2|1|1' => '5',
    '3|1|1' => '5',
    'Cherry|1|1' => '5',
    'Diamond|1|1' => '5',
    'Phoenix|1|1' => '5',


    '2|2|2' => '20',
    '2|2|1' => '5',
    '2|2|3' => '5',
    '2|2|Phoenix' => '5',
    '2|2|Cherry' => '5',
    '2|2|Diamond' => '5',
    '1|2|2' => '5',
    '3|2|2' => '5',
    'Phoenix|2|2' => '5',
    'Cherry|2|2' => '5',
    'Diamond|2|2' => '5',



    '3|3|3' => '30',
    '3|3|1' => '5',
    '3|3|2' => '5',
    '3|3|Cherry' => '5',
    '3|3|Diamond' => '5',
    '3|3|Phoenix' => '5',
    '1|3|3' => '5',
    '2|3|3' => '5',
    'Cherry|3|3' => '5',
    'Diamond|3|3' => '5',
    'Phoenix|3|3' => '5',


    'Cherry|Cherry|Cherry' => '50',
    'Cherry|Cherry|1' => '10',
    'Cherry|Cherry|2' => '10',
    'Cherry|Cherry|3' => '10',
    'Cherry|Cherry|Diamond' => '10',
    'Cherry|Cherry|Phoenix' => '10',
    '1|Cherry|Cherry' => '10',
    '2|Cherry|Cherry' => '10',
    '3|Cherry|Cherry' => '10',
    'Diamond|Cherry|Cherry' => '10',
    'Phoenix|Cherry|Cherry' => '10',

    'Diamond|Diamond|Diamond' => '100',
    'Diamond|Diamond|1' => '15',
    'Diamond|Diamond|2' => '15',
    'Diamond|Diamond|3' => '15',
    'Diamond|Diamond|Cherry' => '15',
    'Diamond|Diamond|Phoenix' => '15',

    '1|Diamond|Diamond' => '15',
    '2|Diamond|Diamond' => '15',
    '3|Diamond|Diamond' => '15',
    'Cherry|Diamond|Diamond' => '15',
    'Phoenix|Diamond|Diamond' => '15',



    'Phoenix|Phoenix|Phoenix' => '150',
    'Phoenix|Phoenix|1' => '20',
    'Phoenix|Phoenix|2' => '20',
    'Phoenix|Phoenix|3' => '20',
    'Phoenix|Phoenix|Cherry' => '20',
    'Phoenix|Phoenix|Diamond' => '20',

    '1|Phoenix|Phoenix' => '20',
    '2|Phoenix|Phoenix' => '20',
    '3|Phoenix|Phoenix' => '20',
    'Cherry|Phoenix|Phoenix' => '20',
    'Diamond|Phoenix|Phoenix' => '20',

);



$wheel1 = array();

foreach ($faces as $face) {
   
 
$wheel1[] = $face;
}
$wheel2 = array_reverse($wheel1);
$wheel3 = $wheel1;


if (isset($_POST['payline']))
{

list($start1, $start2, $start3) = unserialize($_POST['payline']);

}
else {

list($start1, $start2, $start3) = array(0,0,0);
}

$stop1 = rand(count($wheel1)+$start1, 10*count($wheel1)) % count($wheel1);

$stop2 = rand(count($wheel1)+$start2, 10*count($wheel1)) % count($wheel1);
$stop3 = rand(count($wheel1)+$start3, 10*count($wheel1)) % count($wheel1);




$result1 = $wheel1[$stop1];
$result2 = $wheel2[$stop2];
$result3 = $wheel3[$stop3];



if ($yesplay == "go")
{

if (isset($payouts[$result1.'|'.$result2.'|'.$result3]))
{
    
$payee = $payouts[$result1.'|'.$result2.'|'.$result3];

$wsg = "You won $payee Credits";


$query = "update forum_users set credits=credits+$payee where username='$login'";
mysql_query($query);

}
else
{


$query = "update forum_users set credits=credits-$bet where username='$login'";
mysql_query($query);

$wsg = "<small>better luck next time!</small>";
}
}
else
{
$wsg = "<small>welcome! good luck!</small>";
}


$result1 = str_replace("Diamond","<img align=\"middle\" src=\"./images/diamond.gif\"/>","$result1");
$result1 = str_replace("Cherry","<img align=\"middle\" src=\"./images/cherry.gif\"/>","$result1");
$result1 = str_replace("Phoenix","<img align=\"middle\" src=\"./images/phoenix.gif\"/>","$result1");
$result1 = str_replace("1","<img align=\"middle\" src=\"./images/bar1.gif\"/>","$result1");
$result1 = str_replace("2","<img align=\"middle\" src=\"./images/bar2.gif\"/>","$result1");
$result1 = str_replace("3","<img align=\"middle\" src=\"./images/bar3.gif\"/>","$result1");

$result2 = str_replace("Diamond","<img align=\"middle\" src=\"./images/diamond.gif\"/>","$result2");
$result2 = str_replace("Cherry","<img align=\"middle\" src=\"./images/cherry.gif\"/>","$result2");
$result2 = str_replace("Phoenix","<img align=\"middle\" src=\"./images/phoenix.gif\"/>","$result2");
$result2 = str_replace("1","<img align=\"middle\" src=\"./images/bar1.gif\"/>","$result2");
$result2 = str_replace("2","<img align=\"middle\" src=\"./images/bar2.gif\"/>","$result2");
$result2 = str_replace("3","<img align=\"middle\" src=\"./images/bar3.gif\"/>","$result2");

$result3 = str_replace("Diamond","<img align=\"middle\" src=\"./images/diamond.gif\"/>","$result3");
$result3 = str_replace("Cherry","<img align=\"middle\" src=\"./images/cherry.gif\"/>","$result3");
$result3 = str_replace("Phoenix","<img align=\"middle\" src=\"./images/phoenix.gif\"/>","$result3");
$result3 = str_replace("1","<img align=\"middle\" src=\"./images/bar1.gif\"/>","$result3");
$result3 = str_replace("2","<img align=\"middle\" src=\"./images/bar2.gif\"/>","$result3");
$result3 = str_replace("3","<img align=\"middle\" src=\"./images/bar3.gif\"/>","$result3");





echo "<table border=\"1px\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">";


echo "<tr align=\"center\"><td colspan=\"3\"><img align=\"middle\" src=\"./logo.gif\"/></td></tr>";


echo "<tr align=\"center\"><td>$result1</td><td>$result2</td><td>$result3</td></tr>";






echo "<tr><td colspan=\"3\" align=\"center\">$wsg</td></tr>";


echo "<tr><td colspan=\"3\" align=\"center\">Credits: $credits</td></tr>";


echo "<tr><td colspan=\"3\" align=\"center\">Bet: $bet</td></tr>";

echo "<tr><td colspan=\"3\" align=\"center\"><form method=\"post\">
<input type=\"hidden\" name=\"payline\" value=\"serialize(array($stop1, $stop2, $stop3))\" />
<input type=\"hidden\" name=\"ses\" value=\"$ses\" />
<input type=\"hidden\" name=\"yesplay\" value=\"go\" />
<input type=\"submit\" value=\"spin\" />
</form></td></tr></table></div>";

}
else
{

echo "<p class=\"breakforum\" style=\"text-align: center;\">Sorry, you need at least $bet credits to play, you currently only have $credits.</p>

<div class=\"breakforum\">

<table border=\"1px\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
<tr align=\"center\"><td colspan=\"3\"><img align=\"middle\" src=\"./logo.gif\"/></td></tr>

<tr align=\"center\"><td><img src=\"./images/phoenix.gif\" align=\"middle\"/></td><td><img src=\"./images/phoenix.gif\" align=\"middle\"/></td><td><img src=\"./images/phoenix.gif\" align=\"middle\"/></td></tr>
</table></div><p class=\"breakforum\" style=\"text-align: center;\">
Go earn some credits and come back later!<br/>
To find out more about credits and how to earn them, click <a href=\"../../about.php?ses=$ses&amp;act=currency\">here</a>.</p>";

}






echo "<p class=\"break\">How To Play</p>
<p class=\"breakforum\" style=\"text-align: center;\">This is easy, just hit Spin!<br/>
Each spin costs you 20Cr, match two or more identical symbols in a row to win a prize</p>


<p class=\"break\">Combinations &amp; Prizes</p>
<p class=\"breakforum\" style=\"text-align: center;\">Below is a list of possible spins and what they are worth to you in credits.<br/>
If it's not listed, you get nothing for it!</p>

<table class=\"breakforum\" style=\"width: 100%;\">


<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>$img1$img1$img1</small></td><td style=\"width: 50%;\"><small>10Cr</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>$img2$img2$img2</small></td><td style=\"width: 50%;\"><small>20Cr</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>$img3$img3$img3</small></td><td style=\"width: 50%;\"><small>30Cr</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>$imgcherry$imgcherry$imgcherry</small></td><td style=\"width: 50%;\"><small>50Cr</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>$imgdiamond$imgdiamond$imgdiamond</small></td><td style=\"width: 50%;\"><small>100Cr</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>$imgphoenix$imgphoenix$imgphoenix</small></td><td style=\"width: 50%;\"><small>200Cr</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>$img1$img1$imgany</small></td><td style=\"width: 50%;\"><small>5Cr</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>$img2$img2$imgany</small></td><td style=\"width: 50%;\"><small>5Cr</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>$img3$img3$imgany</small></td><td style=\"width: 50%;\"><small>5Cr</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>$imgany$img1$img1</small></td><td style=\"width: 50%;\"><small>5Cr</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>$imgany$img2$img2</small></td><td style=\"width: 50%;\"><small>5Cr</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>$imgany$img3$img3</small></td><td style=\"width: 50%;\"><small>5Cr</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>$imgcherry$imgcherry$imgany</small></td><td style=\"width: 50%;\"><small>10Cr</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>$imgany$imgcherry$imgcherry</small></td><td style=\"width: 50%;\"><small>10Cr</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>$imgdiamond$imgdiamond$imgany</small></td><td style=\"width: 50%;\"><small>15Cr</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>$imgany$imgdiamond$imgdiamond</small></td><td style=\"width: 50%;\"><small>15Cr</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>$imgphoenix$imgphoenix$imgany</small></td><td style=\"width: 50%;\"><small>20Cr</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>$imgany$imgphoenix$imgphoenix</small></td><td style=\"width: 50%;\"><small>20Cr</small></td></tr>




</table>


<p class=\"break\">$hyback <a href=\"../index.php?ses=$ses\">casino games</a><br/>
$hyback <a href=\"../../mainmenu.php?ses=$ses\">main menu</a></p>";






?>






