<?php


if ($ses == "") $ses = $_POST["ses"];




if ($zeros == "") $zeros = $_POST["zeros"];

if ($ones == "") $ones = $_POST["ones"];

if ($twos == "") $twos = $_POST["twos"];

if ($threes == "") $threes = $_POST["threes"];

if ($foursa == "") $foursa = $_POST["foursa"];

if ($foursb == "") $foursb = $_POST["foursb"];




$Aquery = "SELECT * FROM phoenix_lottery where a=$zeros";
$Aresult = mysql_query("$Aquery");
$Acount = mysql_num_rows($Aresult);

if ($Acount > 0)
{
$Agrab = mysql_fetch_array($Aresult);
$Anumber = $Agrab["a"];
}

$Bquery = "SELECT * FROM phoenix_lottery where b=$ones";
$Bresult = mysql_query("$Bquery");
$Bcount = mysql_num_rows($Bresult);

if ($Bcount > 0)
{
$Bgrab = mysql_fetch_array($Bresult);
$Bnumber = $Bgrab["b"];
}




$Cquery = "SELECT * FROM phoenix_lottery where c=$twos";
$Cresult = mysql_query("$Cquery");
$Ccount = mysql_num_rows($Cresult);

if ($Ccount > 0)
{
$Cgrab = mysql_fetch_array($Cresult);
$Cnumber = $Cgrab["c"];
}





$Dquery = "SELECT * FROM phoenix_lottery where d=$threes";
$Dresult = mysql_query("$Dquery");
$Dcount = mysql_num_rows($Dresult);

if ($Dcount > 0)
{
$Dgrab = mysql_fetch_array($Dresult);
$Dnumber = $Dgrab["d"];
}


$Equery = "SELECT * FROM phoenix_lottery where e=$foursa";
$Eresult = mysql_query("$Equery");
$Ecount = mysql_num_rows($Eresult);

if ($Ecount > 0)
{
$Egrab = mysql_fetch_array($Eresult);
$Enumber = $Egrab["e"];
}




$Fquery = "SELECT * FROM phoenix_lottery where f=$foursb";
$Fresult = mysql_query("$Fquery");
$Fcount = mysql_num_rows($Fresult);


if ($Fcount > 0)
{
$Fgrab = mysql_fetch_array($Fresult);
$Fnumber = $Fgrab["f"];
}


$ballcount = ($Acount + $Bcount + $Ccount + $Dcount + $Ecount + $Fcount);

if ($ballcount > 1) $winstatus = "yes";
else $winstatus = "no";

if ($ballcount < 2)
{
$query = "update forum_users set credits=credits-$bet where username='$login'";
mysql_query($query);
$prize = "You lost your bet!";
}
elseif ($ballcount == 2)
{
$prize = "You won back your bet!";
}
elseif ($ballcount == 3)
{
$query = "update forum_users set credits=credits+1000 where username='$login'";
mysql_query($query);
$prize = "You won 1000 Credits!";
}
elseif ($ballcount == 4)
{
$query = "update forum_users set credits=credits+1000 where username='$login'";
mysql_query($query);
$prize = "You won 5000 Credits!";
}
elseif ($ballcount == 5)
{
$query = "update forum_users set credits=credits+5000 where username='$login'";
mysql_query($query);
$prize = "You won 10000 Credits!";
}
elseif ($ballcount == 6)
{
$query = "update forum_users set credits=credits+10000 where username='$login'";
mysql_query($query);
$prize = "You won 50000 Credits!";
}

?>