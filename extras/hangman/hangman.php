<?php


include('../../scripts/header.php');
include('../../scripts/session.php');
include('../../scripts/config.php');
include('../../scripts/functions.php');
include('../../scripts/main.php');



$Category = "Everything In The World";

# list of words (phrases) to guess below, separated by new line
$list = "CABBAGE
WALL STREET
BISCUITS
VAGRANT
HOMOSAPIEN
FEET
ANIMAL
GIRAFFE
NEBULA
SUPER NOVA
QUANTUM LEAP
ANKLE
ELBOW
SPOON
ORANGE
BANANA
UGANDA
CHERNOBYL
SCOOBY DOO
DICK DASTARDLY
MUTLEY
CASPER
SPONGEBOB SQUAREPANTS
COMPUTER
HANGMAN
PHOENIX BYTES
PETER KAY
RUSSELL BRAND
KATY PERRY
LOOSE WOMEN
AVAILABILITY
GREAT BARRIER REEF
PENCIL CASE
BIRO
WET SOCKS
FISH PIE
WET DOG SMELL
BANK APPLICATION
WELLINGTON BOOTS
STERLING SILVER
LOGIN FAILED
BAD PASSWORD
ADMINISTRATOR
CUDDLY FLUMP
THIS IS NOT FAIR
FAIRY CAKES
AVATAR
SATURDAY
CHAIR
BUCKET AND SPADE
JACOBS CREAM CRACKERS
SINGLE WHITE FEMALE
SHAWSHANK
PRISON BREAK
PASTA BAKE
BROKEN ARROW
BIOSHOCK
HALF LIFE
EPISODIC
STALKER
GALAXY
CARAMEL
THE FIRM
KILLSWITCH ENGAGE
LADY GAGA
HINDER
DEXTER
PRISONER
LOST
LIFE ON MARS
AMERICA
SPAIN
CITY SLICKERS
HORSE SHOE
RABBITS FOOT
BUGS BUNNY
BUGSY MALONE
CHICAGO
TONY SOPRANO
HARRY BELAFONTE
CHIGWELL
CHINGFORD
BELFAST
BIRKENHEAD
BRADFORD
PAKISTAN
AFGHANISTAN
TALIBAN
SEPTEMBER
TOWER SEVEN
AL GORE
MICHAEL MOORE
COLUMBINE
THE MATRIX
TRINITY
HOLY CROSS
SCHOOL
SPORTS DAY
SKIPPING ROPE
NOOSE
CAPITAL PUNISHMENT
ELECTRIC CHAIR
TEXAS
HOME FURNISHINGS
WOMAN";


# make sure that any characters to be used in $list are in either
#   $alpha OR $additional_letters, but not in both.  It may not work if you change fonts.
#   You can use either upper OR lower case of each, but not both cases of the same letter.

# below ($alpha) is the alphabet letters to guess from.
#   you can add international (non-English) letters, in any order, such as in:
#   $alpha = "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÑÒÓÔÕÖØÙÚÛÜÝŸABCDEFGHIJKLMNOPQRSTUVWXYZ";
$alpha = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

# below ($additional_letters) are extra characters given in words; '?' does not work
#   these characters are automatically filled in if in the word/phrase to guess
$additional_letters = " -.,;!?%&0123456789";


echo "
<p class=\"break\">";


$len_alpha = strlen($alpha);

if(isset($_GET["n"])) $n=$_GET["n"];
if(isset($_GET["letters"])) $letters=$_GET["letters"];
if(!isset($letters)) $letters="";


$ses = $_GET["ses"];

if(isset($PHP_SELF)) $self=$PHP_SELF;
else $self=$_SERVER["PHP_SELF"];



$max=6;					# maximum number of wrong
# error_reporting(0);
$list = strtoupper($list);
$words = explode("\n",$list);
srand ((double)microtime()*1000000);
$all_letters=$letters.$additional_letters;
$wrong = 0;

echo "<b>Hangman</b><br/>Category: $Category</p><hr/>";

if (!isset($n)) { $n = rand(1,count($words)) - 1; }
$word_line="";
$word = trim($words[$n]);
$done = 1;
for ($x=0; $x < strlen($word); $x++)
{
  if (strstr($all_letters, $word[$x]))
  {
    if ($word[$x]==" ") $word_line.="&nbsp; "; else $word_line.=$word[$x];
  } 
  else { $word_line.="_<font size=1>&nbsp;</font>"; $done = 0; }
}

if (!$done)
{

  for ($c=0; $c<$len_alpha; $c++)
  {
    if (strstr($letters, $alpha[$c]))
    {
      if (strstr($words[$n], $alpha[$c])) {$links .= "\n<B>$alpha[$c]</B> "; }
      else { $links .= "\n<FONT color=\"red\">$alpha[$c] </font>"; $wrong++; }
    }
    else
    { $links .= "\n<A HREF=\"$self?letters=$alpha[$c]$letters&ses=$ses&n=$n\">$alpha[$c]</A> "; }
  }
  $nwrong=$wrong; if ($nwrong>6) $nwrong=6;
  echo "\n<p class=\"breakforum\" style=\"text-align: center;\">\n<IMG SRC=\"hangman_$nwrong.gif\" ALIGN=\"MIDDLE\" BORDER=0 WIDTH=100 HEIGHT=100 ALT=\"Wrong: $wrong out of $max\">\n";

  if ($wrong >= $max)
  {
    $n++;
    if ($n>(count($words)-1)) $n=0;
    echo "<BR><BR><big><b>\n$word_line</b></big>\n";
    echo "</p><hr/><P class=\"breakforum\" style=\"text-align: center;\"><BIG>You suck at life, try again!</BIG><BR><BR>";
    if (strstr($word, " ")) $term="phrase"; else $term="word";
    echo "The $term was \"<B>$word</B>\"<BR><BR>\n";
    echo "<A HREF=$self?ses=$ses&amp;n=$n>Play again.</A>\n\n";
  }
  else
  {
    echo " <br/>Guesses Left: <B>".($max-$wrong)."</B><BR>\n";
    echo "<big><b>\n$word_line</b></big>\n";
    echo "</p><hr/><P class=\"breakforum\" style=\"text-align: center;\"><BR>Choose a letter:<BR><BR>\n";
    echo "$links\n";
  }
}
else
{

$lastaction = $row_ses["last_answer"];




	$plus = "100";

	if ($lastaction != "$word_line")
	{
	$query = "update forum_users set quiz_score=quiz_score+$plus where username='$login'";
	mysql_query($query);

	$query = "update forum_users set last_answer='$word_line' where username='$login'";
	mysql_query($query);

	$mssss = "<B>Congratulations!!! &nbsp;You win!!!</B><BR>You got $plus points added to your overall score!";
	}
	else
	{
	$query = "update forum_users set quiz_score=quiz_score-$plus where username='$login'";
	mysql_query($query);

	$mssss = "You won, but you already knew that, didn't you?<br/>
	Nice try but that's just cost you the points you won for answering right the first time, further attempts to cheat will each cost you $plus points, is it REALLY worth it?<br/>
	Stop reloading the page wise guy!";

	}


  $n++;	# get next word
  if ($n>(count($words)-1)) $n=0;
  echo "<P class=\"breakforum\" style=\"text-align: center;\"><big><b>\n$word_line</b></big>\n";
  echo "</p><hr/><P class=\"breakforum\" style=\"text-align: center;\">$mssss<br/>";
  echo "<br/><A HREF=$self?ses=$ses&amp;n=$n>Play again</A>\n\n";


}

echo "</p><hr/><p class=\"break\">$hyback <a href=\"../index.php?ses=$ses\">back to extras</a><br/>
$hyback <a href=\"../../mainmenu.php?ses=$ses\">main menu</a></p></BODY></HTML>

";
?>
