<?php


include('../scripts/header.php');
include('../scripts/session.php');
include('../scripts/config.php');
include('../scripts/functions.php');
include('../scripts/main.php');






if ($bwmode == "off") $subtite = "<img src=\"../scripts/phoenix.php?login=$login&amp;string=$sitename%20Statistics\" alt=\"$sitename Statistics\"/>";
else $subtite = "<b><big>$sitename Statistics</big></b>";


$queryonline = "SELECT count(*) from forum_users WHERE lastactive > DATE_ADD(NOW(), INTERVAL -$interval MINUTE) and location!='offline'";
$resultonline =mysql_query($queryonline);
$rowonline =mysql_fetch_array($resultonline);
$countonline = $rowonline[0];

$wordonline = numberinwords("$countonline");

if ($countonline == 1) $online = "there is currently $wordonline <a href=\"./online.php?ses=$ses\">user online</a>.";
elseif ($countonline == 0) $online = "there are currently $wordonline <a href=\"./online.php?ses=$ses\">users online</a>.";
else $online = "there are currently $wordonline <a href=\"./online.php?ses=$ses\">users online</a>.";
///////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////
$queryboard = "SELECT count(*) from phoenix_topics";
$resultboard =mysql_query($queryboard);
$rowboard =mysql_fetch_array($resultboard);
$countboard = $rowboard[0];

$wordboard = numberinwords("$countboard");

if ($countboard == 1) $countboard = "there is currently $wordboard topic";
elseif ($countboard == 0) $countboard = "there are currently $wordboard topics";
else $countboard = "there are currently $wordboard topics";

$queryboard2 = "SELECT count(*) from phoenix_posts";
$resultboard2 =mysql_query($queryboard2);
$rowboard2 =mysql_fetch_array($resultboard2);
$countboard2 = $rowboard2[0];

$wordboard2 = numberinwords("$countboard2");

if ($countboard2 == 1) $countboard2 = "and $wordboard2 reply on the message board";
elseif ($countboard2 == 0) $countboard2 = "and $wordboard2 replies on the message board";
else $countboard2 = "and $wordboard2 replies on the message board";


$queryboard3 = "SELECT count(*) from phoenix_posts where author='$login'";
$resultboard3 =mysql_query($queryboard3);
$rowboard3 =mysql_fetch_array($resultboard3);
$countboard3 = $rowboard3[0];

$queryboard4 = "SELECT count(*) from phoenix_topics where author='$login'";
$resultboard4 =mysql_query($queryboard4);
$rowboard4 =mysql_fetch_array($resultboard4);
$countboard4 = $rowboard4[0];

$countboard5 = ($countboard3 + $countboard4);

$wordboard3 = numberinwords("$countboard5");


if ($countboard5 == 1) $countboard3 = "$wordboard3 was made by you.";
elseif ($countboard5 == 0) $countboard3 = "$wordboard3 were made by you.";
else $countboard3 = "$wordboard3 were made by you.";
///////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

$querymail = "SELECT count(*) from phoenix_mail";
$resultmail =mysql_query($querymail);
$rowmail =mysql_fetch_array($resultmail);
$countmail = $rowmail[0];

$wordmail = numberinwords("$countmail");

if ($countmail == 1) $countmail = "the messaging system contains $wordmail message";
elseif ($countmail == 0) $countmail = "the messaging system contains $wordmail messages";
else $countmail = "the messaging system contains $wordmail messages";

$querymail2 = "SELECT count(*) from phoenix_mail where read_state=0";
$resultmail2 =mysql_query($querymail2);
$rowmail2 =mysql_fetch_array($resultmail2);
$countmail2 = $rowmail2[0];

$wordmail2 = numberinwords("$countmail2");

if ($countmail2 == 1) $countmail2 = "$wordmail2 of these is still waiting to be read";
elseif ($countmail2 == 0) $countmail2 = "$wordmail2 of these are still waiting to be read";
else $countmail2 = "$wordmail2 of these are still waiting to be read";


$querymail3 = "SELECT count(*) from phoenix_mail where userto='$login'";
$resultmail3 =mysql_query($querymail3);
$rowmail3 =mysql_fetch_array($resultmail3);
$countmail3 = $rowmail3[0];

$wordmail3 = numberinwords("$countmail3");

if ($countmail3 == 1) $countmail3 = "$wordmail3 of these was sent to you";
elseif ($countmail3 == 0) $countmail3 = "$wordmail3 of these were sent to you";
else $countmail3 = "$wordmail3 of these were sent to you";


$querymail4 = "SELECT count(*) from phoenix_mail where author='$login'";
$resultmail4 =mysql_query($querymail4);
$rowmail4 =mysql_fetch_array($resultmail4);
$countmail4 = $rowmail4[0];

$wordmail4 = numberinwords("$countmail4");

if ($countmail4 == 1) $countmail4 = "$wordmail4 was sent by you.";
elseif ($countmail4 == 0) $countmail4 = "$wordmail3 were sent by you.";
else $countmail4 = "$wordmail4 were sent by you.";
///////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////

$querypics = "SELECT count(*) from phoenix_imagestore";
$resultpics =mysql_query($querypics);
$rowpics =mysql_fetch_array($resultpics);
$countpics = $rowpics[0];

$wordpics = numberinwords("$countpics");

if ($countpics == 1) $countpics = "$wordpics photo has been uploaded";
elseif ($countpics == 0) $countpics = "$wordpics photos have been uploaded";
else $countpics = "$wordpics photos have been uploaded";

$querypics2 = "SELECT count(*) from phoenix_imagealbums";
$resultpics2 =mysql_query($querypics2);
$rowpics2 =mysql_fetch_array($resultpics2);
$countpics2 = $rowpics2[0];

$wordpics2 = numberinwords("$countpics2");

if ($countpics2 == 1) $countpics2 = "into $wordpics2 album";
elseif ($countpics2 == 0) $countpics2 = "into $wordpics2 albums";
else $countpics2 = "into $wordpics2 albums";

$querypics3 = "SELECT count(*) from phoenix_imagestore where login='$login'";
$resultpics3 =mysql_query($querypics3);
$rowpics3 =mysql_fetch_array($resultpics3);
$countpics3 = $rowpics3[0];

$wordpics3 = numberinwords("$countpics3");

if ($countpics3 == 1) $countpics3 = "$wordpics3 was uploaded by you.";
elseif ($countpics3 == 0) $countpics3 = "$wordpics3 were uploaded by you.";
else $countpics3 = "$wordpics3 were uploaded by you.";





///////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////
echo "<p class=\"break\">$subtite</p><hr/>
<p class=\"breakforum\">
$online<br/><br/>
$countboard $countboard2, $countboard3<br/><br/>
$countmail, $countmail2, $countmail3 &amp; $countmail4<br/><br/>
$countpics $countpics2, $countpics3


<hr/><p class=\"break\">$hyfor <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";






?>