<?php


include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/config.php');
include('../scripts/functions.php');
include('../scripts/main.php');

$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];


$credits = $row_ses["credits"];
$bet = 50;



$lowlimit = ($bet - 1);

echo "<p class=\"break\"><img src=\"../../scripts/phoenix.php?login=$login&amp;string=5%20Card%20Draw\" alt=\"5 Card Draw\"/>
</p>";

if ($credits > $lowlimit) 
{


// Environment
$debug = 0;// Enables Debugging Messages
$test = 0; // Enables Testing of winning hands
$init = 1; // Controls win or loose state
$random_flag = 1;// Controls if new deck is generated

//Deck Names are part of card image file names. All files are PNG format.
$d1 = "spades";
$d2 = "hearts";
$d3 = "diamonds";
$d4 = "clubs";  
$c_ext = ".gif";

$c_path = "./75/";
$c_size = "-75";
$c_color = "back-blue";
$c_style = "1";


//Pack Array pack(card, deck)
//Cards are numbered as array elements 1 to 13 and decks are numbered as array elements 1 to 4 
//Pack Array stores card image references with image folder path
$pack = array(
 1 => array(1 => $c_path . $d1 ."-a" . $c_size . $c_ext , 
2 => $c_path . $d2 ."-a" . $c_size . $c_ext , 
3 => $c_path . $d3 ."-a" . $c_size . $c_ext , 
4 => $c_path . $d4 ."-a" . $c_size . $c_ext ),
 2 => array(1 => $c_path . $d1 ."-2" . $c_size . $c_ext , 
2 => $c_path . $d2 ."-2" . $c_size . $c_ext , 
3 => $c_path . $d3 ."-2" . $c_size . $c_ext , 
4 => $c_path . $d4 ."-2" . $c_size . $c_ext ),
 3 => array(1 => $c_path . $d1 ."-3" . $c_size . $c_ext , 
2 => $c_path . $d2 ."-3" . $c_size . $c_ext , 
3 => $c_path . $d3 ."-3" . $c_size . $c_ext , 
4 => $c_path . $d4 ."-3" . $c_size . $c_ext ),
 4 => array(1 => $c_path . $d1 ."-4" . $c_size . $c_ext , 
2 => $c_path . $d2 ."-4" . $c_size . $c_ext , 
3 => $c_path . $d3 ."-4" . $c_size . $c_ext , 
4 => $c_path . $d4 ."-4" . $c_size . $c_ext ),
 5 => array(1 => $c_path . $d1 ."-5" . $c_size . $c_ext , 
2 => $c_path . $d2 ."-5" . $c_size . $c_ext , 
3 => $c_path . $d3 ."-5" . $c_size . $c_ext , 
4 => $c_path . $d4 ."-5" . $c_size . $c_ext ),
 6 => array(1 => $c_path . $d1 ."-6" . $c_size . $c_ext , 
2 => $c_path . $d2 ."-6" . $c_size . $c_ext , 
3 => $c_path . $d3 ."-6" . $c_size . $c_ext , 
4 => $c_path . $d4 ."-6" . $c_size . $c_ext ),
 7 => array(1 => $c_path . $d1 ."-7" . $c_size . $c_ext , 
2 => $c_path . $d2 ."-7" . $c_size . $c_ext , 
3 => $c_path . $d3 ."-7" . $c_size . $c_ext , 
4 => $c_path . $d4 ."-7" . $c_size . $c_ext ),
 8 => array(1 => $c_path . $d1 ."-8" . $c_size . $c_ext , 
2 => $c_path . $d2 ."-8" . $c_size . $c_ext , 
3 => $c_path . $d3 ."-8" . $c_size . $c_ext , 
4 => $c_path . $d4 ."-8" . $c_size . $c_ext ),
 9 => array(1 => $c_path . $d1 ."-9" . $c_size . $c_ext , 
2 => $c_path . $d2 ."-9" . $c_size . $c_ext , 
3 => $c_path . $d3 ."-9" . $c_size . $c_ext , 
4 => $c_path . $d4 ."-9" . $c_size . $c_ext ),
 10 => array(1 => $c_path . $d1 ."-10" . $c_size . $c_ext , 
2 => $c_path . $d2 ."-10" . $c_size . $c_ext , 
3 => $c_path . $d3 ."-10" . $c_size . $c_ext , 
4 => $c_path . $d4 ."-10" . $c_size . $c_ext ),
 11 => array(1 => $c_path . $d1 ."-j" . $c_size . $c_ext , 
2 => $c_path . $d2 ."-j" . $c_size . $c_ext , 
3 => $c_path . $d3 ."-j" . $c_size . $c_ext , 
4 => $c_path . $d4 ."-j" . $c_size . $c_ext ),
 12 => array(1 => $c_path . $d1 ."-q" . $c_size . $c_ext , 
2 => $c_path . $d2 ."-q" . $c_size . $c_ext , 
3 => $c_path . $d3 ."-q" . $c_size . $c_ext , 
4 => $c_path . $d4 ."-q" . $c_size . $c_ext ),
 13 => array(1 => $c_path . $d1 ."-k" . $c_size . $c_ext , 
2 => $c_path . $d2 ."-k" . $c_size . $c_ext , 
3 => $c_path . $d3 ."-k" . $c_size . $c_ext , 
4 => $c_path . $d4 ."-k" . $c_size . $c_ext ),
 14 => array(1 => $c_path . $d1 ."-a" . $c_size . $c_ext , 
2 => $c_path . $d2 ."-a" . $c_size . $c_ext , 
3 => $c_path . $d3 ."-a" . $c_size . $c_ext , 
4 => $c_path . $d4 ."-a" . $c_size . $c_ext )
); 


//This is a startup call; Initialize the game
if (empty($_POST[step])) { 
$step = 0;
$random_flag = 1;
$init = 0;
$balance = $credits;
$bet= 50;
$msg = "<br>";
} else { // Game is already initialized; here is some User's action
//First of all; check if User wants to save preferences
//If User wants to save prefernces, set cookies; else discard preferences and do nothing


//Now see where are we and what is the Account Status
$step = $_POST[step];
$init = $_POST[init];
$ses = $_POST[ses];
$balance = $credits;
$bet = 50;

//If User Action is a deal, act based on current stage
//If User has selected cards in random pack, evaluate win and show results
//Else we pick a random hand and hold it for display 
if (!empty($_POST["btn_deal"])) {
//Mode = 00 ==> first call> randomize + selection
if ($step == 0) {
$random_flag = 0;
} else {
// Mode = 10 ==> evaluate> retain + evaluate + no selection
if ($init == 0) {
// Mode = 10 ==> evaluate> retain + evaluate + no selection
// Rebuilding Pack Array
// What cards were displayed in last hand; and what cards did User picked 
$c1c = (empty($_POST[cb_card][1])) ? SelectCard() :$_POST[c1c] ;
$c1d = (empty($_POST[cb_card][1])) ? SelectDeck() :$_POST[c1d] ;
$c1f = (empty($_POST[cb_card][1])) ? 0 :1 ;
$c2c = (empty($_POST[cb_card][2])) ? SelectCard() :$_POST[c2c] ;
$c2d = (empty($_POST[cb_card][2])) ? SelectDeck() :$_POST[c2d] ;
$c2f = (empty($_POST[cb_card][2])) ? 0 :1 ;
$c3c = (empty($_POST[cb_card][3])) ? SelectCard() :$_POST[c3c] ;
$c3d = (empty($_POST[cb_card][3])) ? SelectDeck() :$_POST[c3d] ;
$c3f = (empty($_POST[cb_card][3])) ? 0 :1 ;
$c4c = (empty($_POST[cb_card][4])) ? SelectCard() :$_POST[c4c] ;
$c4d = (empty($_POST[cb_card][4])) ? SelectDeck() :$_POST[c4d] ;
$c4f = (empty($_POST[cb_card][4])) ? 0 :1 ;
$c5c = (empty($_POST[cb_card][5])) ? SelectCard() :$_POST[c5c] ;
$c5d = (empty($_POST[cb_card][5])) ? SelectDeck() :$_POST[c5d] ;
$c5f = (empty($_POST[cb_card][5])) ? 0 :1 ;

$cards = array (
1 => array( 1 => $c1c,
2 => $c1d,
3 => $c1f,
4 => 0),
2 => array( 1 => $c2c,
2 => $c2d,
3 => $c2f,
4 => 0),
3 => array( 1 => $c3c,
2 => $c3d,
3 => $c3f,
4 => 0),
4 => array( 1 => $c4c,
2 => $c4d,
3 => $c4f,
4 => 0),
5 => array( 1 => $c5c,
2 => $c5d,
3 => $c5f,
4 => 0)
);
//Mark and replace duplicate cards in random hand
$d = 0;
$d = mark_duplicate();
debug("Check after Deal.");
debug("Duplicates Before Replacement: $d");
while ($d > 1):
replace_duplicate();
$d = 0;
$d = mark_duplicate();
debug("Duplicates After Replacement: $d");
endwhile;
$d = 0;
$d = mark_duplicate();
debug("Duplicates After Loop: $d");

// Evaluate win

if ($alreadyplayed != "yes")
{

$result = get_result();
switch ($result) {
case 1:
//Mera number kub aayega??
$msg =   "ROYAL FLUSH !!!!";
$query = "update forum_users set credits=credits+4950 where username='$login'";
mysql_query($query);
break;
case 2:
$msg =   "STRAIGHT FLUSH";
$query = "update forum_users set credits=credits+1950 where username='$login'";
mysql_query($query);
break;
case 3:
$msg =   "FOUR OF A KIND";
$query = "update forum_users set credits=credits+950 where username='$login'";
mysql_query($query);
break;
case 4:
$msg =   "FULL HOUSE";
$query = "update forum_users set credits=credits+550 where username='$login'";
mysql_query($query);
break;
case 5:
$msg =   "FLUSH";
$query = "update forum_users set credits=credits+350 where username='$login'";
mysql_query($query);
break;
case 6:
$msg =   "STRAIGHT";
$query = "update forum_users set credits=credits+250 where username='$login'";
mysql_query($query);
break;
case 7:
$msg =   "THREE OF A KIND";
$query = "update forum_users set credits=credits+200 where username='$login'";
mysql_query($query);
break;
case 8:
$msg =   "TWO PAIRS";
$query = "update forum_users set credits=credits+150 where username='$login'";
mysql_query($query);
break;
case 9:
$msg =   "ONE PAIR";
$query = "update forum_users set credits=credits+100 where username='$login'";
mysql_query($query);
break;
default:
//If its a lost deal, adjust balance for next bet
$msg =   "You Lost!";

$query = "update forum_users set credits=credits-50 where username='$login'";
mysql_query($query);
}
$alreadyplayed = "yes";

}
$random_flag = 0;
} else {
// Mode = 11 ==> continue> randomize + selection

$random_flag = 1;
$step = 0;
}
}


} 
}
//If Random Flag is set, a new hand is selected; duplicate check and replace is done
//Random flag is set, if
//- Its altogether new game is started
//- User hits New button and game is re-initialized
//- After deal is evaluated, next deal is a random hand for fresh hand 
if ($random_flag) {
$msg .= "Choose cards to <b>keep</b>";

$cards = array (
1 => array( 1 => SelectCard(),
2 => SelectDeck(), 
3 => 0,
4 => 0),
2 => array( 1 => SelectCard(),
2 => SelectDeck(), 
3 => 0,
4 => 0),
3 => array( 1 => SelectCard(),
2 => SelectDeck(), 
3 => 0,
4 => 0),
4 => array( 1 => SelectCard(),
2 => SelectDeck(), 
3 => 0),
5 => array( 1 => SelectCard(),
2 => SelectDeck(),
3 => 0,
4 => 0)
);


$d = 0;
$d = mark_duplicate();
debug("Check during New Hand.");
debug("Duplicates Before Replacement: $d");
while ($d > 1):
replace_duplicate();
$d = 0;
$d = mark_duplicate();
debug("Duplicates After Replacement: $d");
endwhile;
$d = 0;
$d = mark_duplicate();
debug("Duplicates After Loop: $d");
}



echo "<div style=\"breakforum\">";


switch ($step) {
case 0:
// Present and fresh hand and enable card selection check boxes
//We are - Before Deal
$card_1 = card_img($cards[1][1],$cards[1][2]);
$card_2 = card_img($cards[2][1],$cards[2][2]);
$card_3 = card_img($cards[3][1],$cards[3][2]);
$card_4 = card_img($cards[4][1],$cards[4][2]);
$card_5 = card_img($cards[5][1],$cards[5][2]);
$cb_1 = "<br><input type='checkbox' name='cb_card[1]' value=$card_1  ></td>";
$cb_2 = "<br><input type='checkbox' name='cb_card[2]' value=$card_2  ></td>";
$cb_3 = "<br><input type='checkbox' name='cb_card[3]' value=$card_3  ></td>";
$cb_4 = "<br><input type='checkbox' name='cb_card[4]' value=$card_4  ></td>";
$cb_5 = "<br><input type='checkbox' name='cb_card[5]' value=$card_5  ></td>";

echo " $page_header
<body>
<form name=\"post\" action=\"./index.php?ses=$ses\" method=\"POST\">
<table border=1px cellspacing=0 cellpadding=0 align=center>
<tr align=\"center\"><td colspan=\"5\"><img src=\"./logo.gif\"/></td></tr> 

<tr ALIGN=CENTER >
<td> <IMG SRC=" . $card_1 .  " ALT=Card1 >  $cb_1 
<td> <IMG SRC=" . $card_2 .  " ALT=Card2 >  $cb_2
<td> <IMG SRC=" . $card_3 .  " ALT=Card3 >  $cb_3
<td> <IMG SRC=" . $card_4 .  " ALT=Card4 >  $cb_4
<td> <IMG SRC=" . $card_5 .  " ALT=Card5 >  $cb_5 </tr>
<tr><td colspan=5 align=center >$msg</td></tr>

<tr>
<td colspan=2 align=right>Credits </td>
<td colspan=1 align=center>:</td>
<td colspan=2 align=left> " . number_format($balance,0,'.',',') . "</td> </tr> 
<tr>
<td colspan=2 align=right>Bet </td>
<td colspan=1 align=center>:</td>
<td colspan=2 align=left> " . number_format($bet,0,'.',',') . "</td> </tr>

<tr><td colspan=5 align=center ><input type=\"submit\" name= \"btn_deal\" value=\"Deal\">
<input type=\"hidden\" name=\"step\" value=1>
<input type=\"hidden\" name=\"init\" value=0>
<input type=\"hidden\" name=\"c1c\" value= " . $cards[1][1] . ">
<input type=\"hidden\" name=\"c1d\" value= " . $cards[1][2] . ">
<input type=\"hidden\" name=\"c2c\" value= " . $cards[2][1] . ">
<input type=\"hidden\" name=\"c2d\" value= " . $cards[2][2] . ">
<input type=\"hidden\" name=\"c3c\" value= " . $cards[3][1] . ">
<input type=\"hidden\" name=\"c3d\" value= " . $cards[3][2] . ">
<input type=\"hidden\" name=\"c4c\" value= " . $cards[4][1] . ">
<input type=\"hidden\" name=\"c4d\" value= " . $cards[4][2] . ">
<input type=\"hidden\" name=\"c5c\" value= " . $cards[5][1] . ">
<input type=\"hidden\" name=\"c5d\" value= " . $cards[5][2] . ">
<input type=\"hidden\" name=\"ses\" value= \"$ses\">

</td></tr>
</table>
</form>
</body>";
break;

case 1:
// Present and final hand with results. Card selection check boxes are replaced by indicators
//We are - After Deal
$card_1 = card_img($cards[1][1],$cards[1][2]);
$card_2 = card_img($cards[2][1],$cards[2][2]);
$card_3 = card_img($cards[3][1],$cards[3][2]);
$card_4 = card_img($cards[4][1],$cards[4][2]);
$card_5 = card_img($cards[5][1],$cards[5][2]);

$c1_tag = ($cards[1][3]) ? "<IMG SRC=./75/keep.gif ALT=kept >" : "<IMG SRC=./75/lose.gif ALT=replaced >";
$c2_tag = ($cards[2][3]) ? "<IMG SRC=./75/keep.gif ALT=kept >" : "<IMG SRC=./75/lose.gif ALT=replaced >";
$c3_tag = ($cards[3][3]) ? "<IMG SRC=./75/keep.gif ALT=kept >" : "<IMG SRC=./75/lose.gif ALT=replaced >";
$c4_tag = ($cards[4][3]) ? "<IMG SRC=./75/keep.gif ALT=kept >" : "<IMG SRC=./75/lose.gif ALT=replaced >";
$c5_tag = ($cards[5][3]) ? "<IMG SRC=./75/keep.gif ALT=kept >" : "<IMG SRC=./75/lose.gif ALT=replaced >";

$cb_1 = "<br>" . $c1_tag .   "</td>";
$cb_2 = "<br>" . $c2_tag .   "</td>";
$cb_3 = "<br>" . $c3_tag .   "</td>";
$cb_4 = "<br>" . $c4_tag .   "</td>";
$cb_5 = "<br>" . $c5_tag .   "</td>";
if ($balance == 0 and $bet == 0) {
$msg .= "<br>something here.";
}
echo "$page_header
<form name=\"post\" action=\"./index.php?ses=$ses\" method=\"POST\">

<table border=1px cellspacing=0 cellpadding=0 align=center>
<tr align=\"center\"><td colspan=\"5\"><img src=\"./logo.gif\"/></td></tr> 
<tr ALIGN=CENTER >
<td> <IMG SRC=" . $card_1 .  " ALT=Card1 >  $cb_1 
<td> <IMG SRC=" . $card_2 .  " ALT=Card2 >  $cb_2
<td> <IMG SRC=" . $card_3 .  " ALT=Card3 >  $cb_3
<td> <IMG SRC=" . $card_4 .  " ALT=Card4 >  $cb_4
<td> <IMG SRC=" . $card_5 .  " ALT=Card5 >  $cb_5
</tr>
<tr><td colspan=5 align=center>$msg</td></tr>

<tr>
<td colspan=2 align=right>Credits </td>
<td colspan=1 align=center>:</td>
<td colspan=2 align=left> " . number_format($balance,0,'.',',') . "</td> </tr> 
<tr>
<td colspan=2 align=right>Bet </td>
<td colspan=1 align=center>:</td>
<td colspan=2 align=left> " . number_format($bet,0,'.',',') . "</td> </tr>
<tr align=center>
<tr><td colspan=5 align=center ><input type=\"submit\" name= \"btn_deal\" value=\"Deal\"></td>
<input type=\"hidden\" name=\"step\" value=1>
<input type=\"hidden\" name=\"init\" value=1>
<input type=\"hidden\" name=\"c1c\" value= " . $cards[1][1] . ">
<input type=\"hidden\" name=\"c1d\" value= " . $cards[1][2] . ">
<input type=\"hidden\" name=\"c2c\" value= " . $cards[2][1] . ">
<input type=\"hidden\" name=\"c2d\" value= " . $cards[2][2] . ">
<input type=\"hidden\" name=\"c3c\" value= " . $cards[3][1] . ">
<input type=\"hidden\" name=\"c3d\" value= " . $cards[3][2] . ">
<input type=\"hidden\" name=\"c4c\" value= " . $cards[4][1] . ">
<input type=\"hidden\" name=\"c4d\" value= " . $cards[4][2] . ">
<input type=\"hidden\" name=\"c5c\" value= " . $cards[5][1] . ">
<input type=\"hidden\" name=\"c5d\" value= " . $cards[5][2] . ">
<input type=\"hidden\" name=\"ses\" value= \"$ses\">
</td></tr>
</table>
</form>
</body>
";
break;
}
echo "</div>";

}
else
{
echo "<p class=\"breakforum\" style=\"text-align: center;\">Sorry, you need at least $bet credits to play, you currently only have $credits.</p>

<div class=\"breakforum\">

<table border=\"1px\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">


<tr align=\"center\"><td colspan=\"5\"><img src=\"./logo.gif\"/></td></tr>
<tr align=\"center\"><td><img src=\"./75/spades-10-75.gif\" align=\"middle\"/></td>
<td><img src=\"./75/spades-j-75.gif\" align=\"middle\"/></td>
<td><img src=\"./75/spades-q-75.gif\" align=\"middle\"/></td>
<td><img src=\"./75/spades-k-75.gif\" align=\"middle\"/></td>
<td><img src=\"./75/spades-a-75.gif\" align=\"middle\"/></td></tr>


</table></div><p class=\"breakforum\" style=\"text-align: center;\">
Go earn some credits and come back later!<br/>
To find out more about credits and how to earn them, click <a href=\"../../about.php?ses=$ses&amp;act=currency\">here</a>.</p>";
}

echo "<p class=\"break\">How To Play</p>
<p class=\"breakforum\" style=\"text-align: center;\">The name of the game is Five Card Draw.<br/>
You start with 5 cards, check the boxes to tell the machine which cards you want to <b>keep</b> and then hit deal, the unchecked or &quot;thrown away&quot; cards are replaced by other cards.<br/>
You get a hand of a pair of face cards or better, you win a prize.<br/>Each hand costs 50Cr</p>


<p class=\"break\">Hands &amp; Prizes</p>
<p class=\"breakforum\" style=\"text-align: center;\">Below is a list of possible hands and what they are worth to you in credits.</p>

<table class=\"breakforum\" style=\"width: 100%;\">
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>Pair (face cards)</small></td><td style=\"width: 50%;\"><small>150Cr</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>Two Pair</small></td><td style=\"width: 50%;\"><small>200Cr</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>Three Of A Kind</small></td><td style=\"width: 50%;\"><small>250Cr</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>Straight</small></td><td style=\"width: 50%;\"><small>300Cr</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>Flush</small></td><td style=\"width: 50%;\"><small>400Cr</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>Full House</small></td><td style=\"width: 50%;\"><small>600Cr</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>Four Of A Kind</small></td><td style=\"width: 50%;\"><small>1000Cr</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>Straight Flush</small></td><td style=\"width: 50%;\"><small>2000Cr</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small>Royal Flush</small></td><td style=\"width: 50%;\"><small>5000Cr</small></td></tr>
</table>


<p class=\"break\">$hyback <a href=\"../index.php?ses=$ses\">casino games</a><br/>
$hyback <a href=\"../../mainmenu.php?ses=$ses\">main menu</a></p>";









/*=============================================================================
Functions 
=============================================================================*/
function mark_duplicate() {
global $cards;
if (($cards[1][1] == $cards[2][1]) and ($cards[1][2] == $cards[2][2])) { $cards[1][4] = 1; $cards[2][4] = 1; }
if (($cards[1][1] == $cards[3][1]) and ($cards[1][2] == $cards[3][2])) { $cards[1][4] = 1; $cards[3][4] = 1; }
if (($cards[1][1] == $cards[4][1]) and ($cards[1][2] == $cards[4][2])) { $cards[1][4] = 1; $cards[4][4] = 1; }
if (($cards[1][1] == $cards[5][1]) and ($cards[1][2] == $cards[5][2])) { $cards[1][4] = 1; $cards[5][4] = 1; }

if (($cards[2][1] == $cards[3][1]) and ($cards[2][2] == $cards[3][2])) { $cards[2][4] = 1; $cards[3][4] = 1; }
if (($cards[2][1] == $cards[4][1]) and ($cards[2][2] == $cards[4][2])) { $cards[2][4] = 1; $cards[4][4] = 1; }
if (($cards[2][1] == $cards[5][1]) and ($cards[2][2] == $cards[5][2])) { $cards[2][4] = 1; $cards[5][4] = 1; }

if (($cards[3][1] == $cards[4][1]) and ($cards[3][2] == $cards[4][2])) { $cards[3][4] = 1; $cards[4][4] = 1; }
if (($cards[3][1] == $cards[5][1]) and ($cards[3][2] == $cards[5][2])) { $cards[3][4] = 1; $cards[5][4] = 1; }

if (($cards[4][1] == $cards[5][1]) and ($cards[4][2] == $cards[5][2])) { $cards[4][4] = 1; $cards[5][4] = 1; }

$d = 0;
for ($i = 1; $i <= 5; $i++ ) {
$d += $cards[$i][4];
}
return $d;
}

function replace_duplicate() { 
global $cards;
if (($cards[1][3] == 0) and ($cards[1][4] == 1 )) {
$cards[1][1] = SelectCard();
$cards[1][2] = SelectDeck();
$cards[1][4] = 0; 
}
if (($cards[2][3] == 0) and ($cards[2][4] == 1 )) {
$cards[2][1] = SelectCard();
$cards[2][2] = SelectDeck();
$cards[2][4] = 0; 
}
if (($cards[3][3] == 0) and ($cards[3][4] == 1 )) {
$cards[3][1] = SelectCard();
$cards[3][2] = SelectDeck();
$cards[3][4] = 0; 
}
if (($cards[4][3] == 0) and ($cards[4][4] == 1 )) {
$cards[4][1] = SelectCard();
$cards[4][2] = SelectDeck();
$cards[4][4] = 0; 
}
if (($cards[5][3] == 0) and ($cards[5][4] == 1 )) {
$cards[5][1] = SelectCard();
$cards[5][2] = SelectDeck();
$cards[5][4] = 0; 
}
return 1;
}

function get_result() {
global $cards, $test;
if ($test) {
test_winning_hand(6);
}
// Counting Cards
$count_of_2  = 0;
$count_of_3  = 0;
$count_of_4  = 0;
$count_of_5  = 0;
$count_of_6  = 0;
$count_of_7  = 0;
$count_of_8  = 0;
$count_of_9  = 0;
$count_of_10 = 0;
$count_of_j  = 0;
$count_of_q  = 0;
$count_of_k  = 0;
$count_of_a  = 0;

for ($i=1; $i<=5; $i++ ) {
if ($cards[$i][1] == 11) { $count_of_j++; }
elseif ($cards[$i][1] == 12) { $count_of_q++; }
elseif ($cards[$i][1] == 13) { $count_of_k++; }
elseif ($cards[$i][1] == 1 ) { $count_of_a++; }
elseif ($cards[$i][1] == 2 ) { $count_of_2++; }
elseif ($cards[$i][1] == 3 ) { $count_of_3++; }
elseif ($cards[$i][1] == 4 ) { $count_of_4++; }
elseif ($cards[$i][1] == 5 ) { $count_of_5++; }
elseif ($cards[$i][1] == 6 ) { $count_of_6++; }
elseif ($cards[$i][1] == 7 ) { $count_of_7++; }
elseif ($cards[$i][1] == 8 ) { $count_of_8++; }
elseif ($cards[$i][1] == 9 ) { $count_of_9++; }
elseif ($cards[$i][1] == 10) { $count_of_10++;}
}
/* echo "<p>Card Counts | J:$count_of_j"; 
echo " | q:$count_of_q"; 
echo " | k:$count_of_k"; 
echo " | a:$count_of_a"; 
echo " | 2:$count_of_2"; 
echo " | 3:$count_of_3"; 
echo " | 4:$count_of_4"; 
echo " | 5:$count_of_5"; 
echo " | 6:$count_of_6"; 
echo " | 7:$count_of_7"; 
echo " | 8:$count_of_8"; 
echo " | 9:$count_of_9"; 
echo " | 10:$count_of_10"; */

// Counting Decks
$count_of_d1 = 0;
$count_of_d2 = 0;
$count_of_d3 = 0;
$count_of_d4 = 0;

for ($i=1; $i<=5; $i++ ) {
if ($cards[$i][2] == 1) { $count_of_d1++; }
elseif ($cards[$i][2] == 2) { $count_of_d2++; }
elseif ($cards[$i][2] == 3) { $count_of_d3++; }
elseif ($cards[$i][2] == 4) { $count_of_d4++; }
}

/*echo "<p>Deck Counts | d1:$count_of_d1"; 
echo " | d2:$count_of_d2"; 
echo " | d3:$count_of_d3"; 
echo " | d4:$count_of_d4"; */

// Copy of Array, sorted
$cards_copy = array (
1 => $cards[1][1],
2 => $cards[2][1],
3 => $cards[3][1],
4 => $cards[4][1],
5 => $cards[5][1]
);
array_multisort($cards_copy, SORT_ASC);
$result = 0;
// 1 Royal Flush 100
if (($count_of_a == 1) and
($count_of_k == 1) and
($count_of_q == 1) and
($count_of_j == 1) and
($count_of_10 == 1) ) { 
if (($count_of_d1 == 5) or 
($count_of_d2 == 5) or
($count_of_d3 == 5) or
($count_of_d4 == 5)) {
$result = 1;
} 
} 

if ( $result == 0 ) { // 2 Straight Flush 50
if (($cards_copy[0]+1 == $cards_copy[1]) and 
($cards_copy[1]+1 == $cards_copy[2]) and 
($cards_copy[2]+1 == $cards_copy[3]) and 
($cards_copy[3]+1 == $cards_copy[4]) ) {
if (($count_of_d1 == 5) or 
($count_of_d2 == 5) or
($count_of_d3 == 5) or
($count_of_d4 == 5)) {
$result = 2;
} 
} 
} 
if ($result == 0) { // ==>3 Four of a kind 40
if (($count_of_a   == 4) or 
($count_of_k   == 4)or
($count_of_q   == 4)or
($count_of_j   == 4)or
($count_of_10  == 4)or
($count_of_9   == 4)or
($count_of_8   == 4)or
($count_of_7   == 4)or
($count_of_6   == 4)or
($count_of_5   == 4)or
($count_of_4   == 4)or
($count_of_3   == 4)or
($count_of_2   == 4)) {
$result = 3;
}  
}


if ($result == 0) { // 4 Full House 25
if ($count_of_a   == 3) {
if (($count_of_k  == 2) or ($count_of_q  == 2) or ($count_of_j  == 2) or
($count_of_10 == 2) or ($count_of_9  == 2) or ($count_of_8  == 2) or
($count_of_7  == 2) or ($count_of_6  == 2) or ($count_of_5  == 2) or
($count_of_4  == 2) or ($count_of_3  == 2) or ($count_of_2  == 2) 
) {
$result = 4;
}
}
if ($count_of_k   == 3) {
if (($count_of_a  == 2) or ($count_of_q  == 2) or ($count_of_j  == 2) or
($count_of_10 == 2) or ($count_of_9  == 2) or ($count_of_8  == 2) or
($count_of_7  == 2) or ($count_of_6  == 2) or ($count_of_5  == 2) or
($count_of_4  == 2) or ($count_of_3  == 2) or ($count_of_2  == 2) 
) {
$result = 4;
}
}
if ($count_of_q   == 3) {
if (($count_of_k  == 2) or ($count_of_a  == 2) or ($count_of_j  == 2) or
($count_of_10 == 2) or ($count_of_9  == 2) or ($count_of_8  == 2) or
($count_of_7  == 2) or ($count_of_6  == 2) or ($count_of_5  == 2) or
($count_of_4  == 2) or ($count_of_3  == 2) or ($count_of_2  == 2) 
) {
$result = 4;
}
}
if ($count_of_j   == 3) {
if (($count_of_k  == 2) or ($count_of_q  == 2) or ($count_of_a  == 2) or
($count_of_10 == 2) or ($count_of_9  == 2) or ($count_of_8  == 2) or
($count_of_7  == 2) or ($count_of_6  == 2) or ($count_of_5  == 2) or
($count_of_4  == 2) or ($count_of_3  == 2) or ($count_of_2  == 2) 
) {
$result = 4;
}
}
if ($count_of_10   == 3) {
if (($count_of_k  == 2) or ($count_of_q  == 2) or ($count_of_j  == 2) or
($count_of_a == 2) or ($count_of_9  == 2) or ($count_of_8  == 2) or
($count_of_7  == 2) or ($count_of_6  == 2) or ($count_of_5  == 2) or
($count_of_4  == 2) or ($count_of_3  == 2) or ($count_of_2  == 2) 
) {
$result = 4;
}
}
if ($count_of_9   == 3) {
if (($count_of_k  == 2) or ($count_of_q  == 2) or ($count_of_j  == 2) or
($count_of_10 == 2) or ($count_of_a  == 2) or ($count_of_8  == 2) or
($count_of_7  == 2) or ($count_of_6  == 2) or ($count_of_5  == 2) or
($count_of_4  == 2) or ($count_of_3  == 2) or ($count_of_2  == 2) 
) {
$result = 4;
}
}
if ($count_of_8   == 3) {
if (($count_of_k  == 2) or ($count_of_q  == 2) or ($count_of_j  == 2) or
($count_of_10 == 2) or ($count_of_9  == 2) or ($count_of_a  == 2) or
($count_of_7  == 2) or ($count_of_6  == 2) or ($count_of_5  == 2) or
($count_of_4  == 2) or ($count_of_3  == 2) or ($count_of_2  == 2) 
) {
$result = 4;
}
}
if ($count_of_7   == 3) {
if (($count_of_k  == 2) or ($count_of_q  == 2) or ($count_of_j  == 2) or
($count_of_10 == 2) or ($count_of_9  == 2) or ($count_of_8  == 2) or
($count_of_a  == 2) or ($count_of_6  == 2) or ($count_of_5  == 2) or
($count_of_4  == 2) or ($count_of_3  == 2) or ($count_of_2  == 2) 
) {
$result = 4;
}
}
if ($count_of_6   == 3) {
if (($count_of_k  == 2) or ($count_of_q  == 2) or ($count_of_j  == 2) or
($count_of_10 == 2) or ($count_of_9  == 2) or ($count_of_8  == 2) or
($count_of_7  == 2) or ($count_of_a  == 2) or ($count_of_5  == 2) or
($count_of_4  == 2) or ($count_of_3  == 2) or ($count_of_2  == 2) 
) {
$result = 4;
}
}
if ($count_of_5   == 3) {
if (($count_of_k  == 2) or ($count_of_q  == 2) or ($count_of_j  == 2) or
($count_of_10 == 2) or ($count_of_9  == 2) or ($count_of_8  == 2) or
($count_of_7  == 2) or ($count_of_6  == 2) or ($count_of_a  == 2) or
($count_of_4  == 2) or ($count_of_3  == 2) or ($count_of_2  == 2) 
) {
$result = 4;
}
}
if ($count_of_4   == 3) {
if (($count_of_k  == 2) or ($count_of_q  == 2) or ($count_of_j  == 2) or
($count_of_10 == 2) or ($count_of_9  == 2) or ($count_of_8  == 2) or
($count_of_7  == 2) or ($count_of_6  == 2) or ($count_of_5  == 2) or
($count_of_a  == 2) or ($count_of_3  == 2) or ($count_of_2  == 2) 
) {
$result = 4;
}
}
if ($count_of_3   == 3) {
if (($count_of_k  == 2) or ($count_of_q  == 2) or ($count_of_j  == 2) or
($count_of_10 == 2) or ($count_of_9  == 2) or ($count_of_8  == 2) or
($count_of_7  == 2) or ($count_of_6  == 2) or ($count_of_5  == 2) or
($count_of_4  == 2) or ($count_of_a  == 2) or ($count_of_2  == 2) 
) {
$result = 4;
}
}
if ($count_of_2   == 3) {
if (($count_of_k  == 2) or ($count_of_q  == 2) or ($count_of_j  == 2) or
($count_of_10 == 2) or ($count_of_9  == 2) or ($count_of_8  == 2) or
($count_of_7  == 2) or ($count_of_6  == 2) or ($count_of_5  == 2) or
($count_of_4  == 2) or ($count_of_3  == 2) or ($count_of_a  == 2) 
) {
$result = 4;
}
}

}


if ($result == 0) { // 5 Flush 20
if (($count_of_d1   == 5) or 
($count_of_d2   == 5) or
($count_of_d3   == 5) or
($count_of_d4   == 5)) {
$result = 5;
}  
}


if ( $result == 0 ) { // ==>6 Straight 10
if (($cards_copy[0]+1 == $cards_copy[1]) and 
($cards_copy[1]+1 == $cards_copy[2]) and 
($cards_copy[2]+1 == $cards_copy[3]) and 
($cards_copy[3]+1 == $cards_copy[4]) ) {
$result = 6;
} 
} 


if ($result == 0) { // ==>7 Three of a kind 6
if (($count_of_a   == 3) or 
($count_of_k   == 3) or
($count_of_q   == 3) or
($count_of_j   == 3) or
($count_of_10  == 3) or
($count_of_9   == 3) or
($count_of_8   == 3) or
($count_of_7   == 3) or
($count_of_6   == 3) or
($count_of_5   == 3) or
($count_of_4   == 3) or
($count_of_3   == 3) or
($count_of_2   == 3)) {
$result = 7;
}  
}

if ($result == 0) { // ==>8 Two Pair 4
if ($count_of_a   == 2) {
if (($count_of_k  == 2) or ($count_of_q  == 2) or ($count_of_j  == 2) or
($count_of_10 == 2) or ($count_of_9  == 2) or ($count_of_8  == 2) or
($count_of_7  == 2) or ($count_of_6  == 2) or ($count_of_5  == 2) or
($count_of_4  == 2) or ($count_of_3  == 2) or ($count_of_2  == 2) 
) {
$result = 8;
}
}
if ($count_of_k   == 2) {
if (($count_of_a  == 2) or ($count_of_q  == 2) or ($count_of_j  == 2) or
($count_of_10 == 2) or ($count_of_9  == 2) or ($count_of_8  == 2) or
($count_of_7  == 2) or ($count_of_6  == 2) or ($count_of_5  == 2) or
($count_of_4  == 2) or ($count_of_3  == 2) or ($count_of_2  == 2) 
) {
$result = 8;
}
}
if ($count_of_q   == 2) {
if (($count_of_k  == 2) or ($count_of_a  == 2) or ($count_of_j  == 2) or
($count_of_10 == 2) or ($count_of_9  == 2) or ($count_of_8  == 2) or
($count_of_7  == 2) or ($count_of_6  == 2) or ($count_of_5  == 2) or
($count_of_4  == 2) or ($count_of_3  == 2) or ($count_of_2  == 2) 
) {
$result = 8;
}
}
if ($count_of_j   == 2) {
if (($count_of_k  == 2) or ($count_of_q  == 2) or ($count_of_a  == 2) or
($count_of_10 == 2) or ($count_of_9  == 2) or ($count_of_8  == 2) or
($count_of_7  == 2) or ($count_of_6  == 2) or ($count_of_5  == 2) or
($count_of_4  == 2) or ($count_of_3  == 2) or ($count_of_2  == 2) 
) {
$result = 8;
}
}
if ($count_of_10   == 2) {
if (($count_of_k  == 2) or ($count_of_q  == 2) or ($count_of_j  == 2) or
($count_of_a == 2) or ($count_of_9  == 2) or ($count_of_8  == 2) or
($count_of_7  == 2) or ($count_of_6  == 2) or ($count_of_5  == 2) or
($count_of_4  == 2) or ($count_of_3  == 2) or ($count_of_2  == 2) 
) {
$result = 8;
}
}
if ($count_of_9   == 2) {
if (($count_of_k  == 2) or ($count_of_q  == 2) or ($count_of_j  == 2) or
($count_of_10 == 2) or ($count_of_a  == 2) or ($count_of_8  == 2) or
($count_of_7  == 2) or ($count_of_6  == 2) or ($count_of_5  == 2) or
($count_of_4  == 2) or ($count_of_3  == 2) or ($count_of_2  == 2) 
) {
$result = 8;
}
}
if ($count_of_8   == 2) {
if (($count_of_k  == 2) or ($count_of_q  == 2) or ($count_of_j  == 2) or
($count_of_10 == 2) or ($count_of_9  == 2) or ($count_of_a  == 2) or
($count_of_7  == 2) or ($count_of_6  == 2) or ($count_of_5  == 2) or
($count_of_4  == 2) or ($count_of_3  == 2) or ($count_of_2  == 2) 
) {
$result = 8;
}
}
if ($count_of_7   == 2) {
if (($count_of_k  == 2) or ($count_of_q  == 2) or ($count_of_j  == 2) or
($count_of_10 == 2) or ($count_of_9  == 2) or ($count_of_8  == 2) or
($count_of_a  == 2) or ($count_of_6  == 2) or ($count_of_5  == 2) or
($count_of_4  == 2) or ($count_of_3  == 2) or ($count_of_2  == 2) 
) {
$result = 8;
}
}
if ($count_of_6   == 2) {
if (($count_of_k  == 2) or ($count_of_q  == 2) or ($count_of_j  == 2) or
($count_of_10 == 2) or ($count_of_9  == 2) or ($count_of_8  == 2) or
($count_of_7  == 2) or ($count_of_a  == 2) or ($count_of_5  == 2) or
($count_of_4  == 2) or ($count_of_3  == 2) or ($count_of_2  == 2) 
) {
$result = 8;
}
}
if ($count_of_5   == 2) {
if (($count_of_k  == 2) or ($count_of_q  == 2) or ($count_of_j  == 2) or
($count_of_10 == 2) or ($count_of_9  == 2) or ($count_of_8  == 2) or
($count_of_7  == 2) or ($count_of_6  == 2) or ($count_of_a  == 2) or
($count_of_4  == 2) or ($count_of_3  == 2) or ($count_of_2  == 2) 
) {
$result = 8;
}
}
if ($count_of_4   == 2) {
if (($count_of_k  == 2) or ($count_of_q  == 2) or ($count_of_j  == 2) or
($count_of_10 == 2) or ($count_of_9  == 2) or ($count_of_8  == 2) or
($count_of_7  == 2) or ($count_of_6  == 2) or ($count_of_5  == 2) or
($count_of_a  == 2) or ($count_of_3  == 2) or ($count_of_2  == 2) 
) {
$result = 8;
}
}
if ($count_of_3   == 2) {
if (($count_of_k  == 2) or ($count_of_q  == 2) or ($count_of_j  == 2) or
($count_of_10 == 2) or ($count_of_9  == 2) or ($count_of_8  == 2) or
($count_of_7  == 2) or ($count_of_6  == 2) or ($count_of_5  == 2) or
($count_of_4  == 2) or ($count_of_a  == 2) or ($count_of_2  == 2) 
) {
$result = 8;
}
}
if ($count_of_2   == 2) {
if (($count_of_k  == 2) or ($count_of_q  == 2) or ($count_of_j  == 2) or
($count_of_10 == 2) or ($count_of_9  == 2) or ($count_of_8  == 2) or
($count_of_7  == 2) or ($count_of_6  == 2) or ($count_of_5  == 2) or
($count_of_4  == 2) or ($count_of_3  == 2) or ($count_of_a  == 2) 
) {
$result = 8;
}
}

}


if ($result == 0) { // ==>9 Pair J+ 2
if (($count_of_a   == 2) or 
($count_of_k   == 2) or
($count_of_q   == 2) or
($count_of_j   == 2) /*or
($count_of_10  == 2) or
($count_of_9   == 2) or
($count_of_8   == 2) or
($count_of_7   == 2) or
($count_of_6   == 2) or
($count_of_5   == 2) or
($count_of_4   == 2) or
($count_of_3   == 2) or
($count_of_2   == 2)*/ ) {
$result = 9;
}  
}
return $result;
}

function test_winning_hand($rank) {
global $cards;
switch ($rank) {
case 1; //royal flush
$cards[1][1] = 1;
$cards[2][1] = 13;
$cards[3][1] = 12;
$cards[4][1] = 11;
$cards[5][1] = 10;
$cards[1][2] = 1;
$cards[2][2] = 1;
$cards[3][2] = 1;
$cards[4][2] = 1;
$cards[5][2] = 1;
$result = 1;
echo "<p>Evaluating Royal Flush...$result";
break;
case 2; //Straight Flush
$cards[1][1] = 2;
$cards[2][1] = 3;
$cards[3][1] = 4;
$cards[4][1] = 5;
$cards[5][1] = 6;
$cards[1][2] = 2;
$cards[2][2] = 2;
$cards[3][2] = 2;
$cards[4][2] = 2;
$cards[5][2] = 2;
$result = 2;
echo "<p>Evaluating Straight Flush...$result";
break;
case 3; //Four of a kind
$cards[1][1] = 5;
$cards[2][1] = 5;
$cards[3][1] = 5;
$cards[4][1] = 5;
$cards[5][1] = 2;
$cards[1][2] = 1;
$cards[2][2] = 2;
$cards[3][2] = 3;
$cards[4][2] = 4;
$cards[5][2] = 1;
$result = 3;
echo "<p>Evaluating Four of a kind...$result";
break;
case 4; //Full House
$cards[1][1] = 13;
$cards[2][1] = 12;
$cards[3][1] = 13;
$cards[4][1] = 12;
$cards[5][1] = 13;
$cards[1][2] = 1;
$cards[2][2] = 2;
$cards[3][2] = 3;
$cards[4][2] = 4;
$cards[5][2] = 2;
$result = 4;
echo "<p>Evaluating Full House...$result";
break;
case 5; //Flush
$cards[1][1] = 2;
$cards[2][1] = 3;
$cards[3][1] = 9;
$cards[4][1] = 12;
$cards[5][1] = 7;
$cards[1][2] = 4;
$cards[2][2] = 4;
$cards[3][2] = 4;
$cards[4][2] = 4;
$cards[5][2] = 4;
$result = 5;
echo "<p>Evaluating Flush...$result";
break;
case 6; //Straight
$cards[1][1] = 1;
$cards[2][1] = 2;
$cards[3][1] = 3;
$cards[4][1] = 4;
$cards[5][1] = 5;
$cards[1][2] = 1;
$cards[2][2] = 2;
$cards[3][2] = 3;
$cards[4][2] = 4;
$cards[5][2] = 4;
$result = 6;
echo "<p>Evaluating Straight...$result";
break;
case 7; //Three of a kind
$cards[1][1] = 2;
$cards[2][1] = 2;
$cards[3][1] = 2;
$cards[4][1] = 5;
$cards[5][1] = 6;
$cards[1][2] = 1;
$cards[2][2] = 2;
$cards[3][2] = 3;
$cards[4][2] = 4;
$cards[5][2] = 4;
$result = 7;
echo "<p>Evaluating Three of a kind...$result";
break;
case 8; //Two Pairs
$cards[1][1] = 2;
$cards[2][1] = 2;
$cards[3][1] = 9;
$cards[4][1] = 9;
$cards[5][1] = 12;
$cards[1][2] = 1;
$cards[2][2] = 2;
$cards[3][2] = 3;
$cards[4][2] = 4;
$cards[5][2] = 4;
$result = 8;
echo "<p>Evaluating Two Pairs...$result";
break;
case 9; //Pair
$cards[1][1] = 12;
$cards[2][1] = 12;
$cards[3][1] = 5;
$cards[4][1] = 9;
$cards[5][1] = 2;
$cards[1][2] = 1;
$cards[2][2] = 2;
$cards[3][2] = 3;
$cards[4][2] = 4;
$cards[5][2] = 4;
$result = 9;
echo "<p>Evaluating Pair...$result";
break;

}
return $result;
}


function SelectCard()
{
// Return a number between 1 and 13 for card  
srand();
$random = (rand()%13)+1;
return $random;
}

function SelectDeck()
{
// Return a number between 1 and 4 for deck
srand();
$random = (rand()%4)+1;
return $random;
}


function random_card_img() 
{
global $pack;
$j = SelectCard();
$k = SelectDeck();
return $pack[$j][$k];
}

function card_img($j, $k) 
{
global $pack;
return $pack[$j][$k];
}

function display_all_cards() {
global $c_path, $c_color, $c_size, $c_style , $c_ext ;
echo "<table border=1 align=center>";
for ($j = 1; $j <= 13; $j++) {
echo "<tr><td> <IMG SRC=" . $c_path . $c_color . $c_size . "-" . $c_style .  $c_ext . " ALT=card > </td> ";

for ($k = 1; $k <=4; $k++) {
echo "<td>";
echo "<IMG SRC=" . card_img($j, $k) .  " ALT=\"card\" >";
echo "</td>";
}
echo "<td> <IMG SRC=" . $c_path . $c_color . $c_size . "-" . $c_style .  $c_ext . " ALT=card > </td></tr> ";
}
echo "</table>";

}

function debug($msg) {
global $debug;
if ($debug) {echo "<br>DEBUG: $msg";}
return 0;
}
?>