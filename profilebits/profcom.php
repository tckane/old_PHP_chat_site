<?php

include('../scripts/dbconnect.php');




$act = $_GET['act']; // act
$user = $_GET['user']; // user
$commid = $_GET['commid']; // comment id
$addcomment = $_GET['addcomment']; // add comment

function make_wml_compat($string)
{
$string = ltrim($string);

$string = str_replace("©","~copy",$string);
$string = str_replace("®","~reg",$string);
$string = str_replace("\"","&quot;",$string);
$string = str_replace("---","'",$string);
$string = str_replace("-ampersand-","&amp;",$string);
$string = str_replace("-dquote-","\"",$string);
$string = str_replace("-squote-","'",$string);
$string = str_replace("-tilde-","~",$string);
$string = str_replace("-pound-","&#163;",$string);
$string = str_replace("-dollar-","?",$string);
$string = str_replace("Â£","£",$string);
$string = str_replace("<","&lt;",$string);
$string = str_replace(">","&gt;",$string);
$string = str_replace("icon:","=",$string);
$string = str_replace("-drop-","<br/>",$string);
$string = str_replace("¹","-1",$string);
$string = str_replace("²","-2",$string);
$string = str_replace("³","-3",$string);
$string = str_replace("&#8364;","-euro",$string);
$string = str_replace("~copy","&#169;",$string);
$string = str_replace("~reg","&#174;",$string);
$string = str_replace("~club","&#9827;",$string);
$string = str_replace("~spade","&#9824;",$string);
$string = str_replace("~heart","&#9829;",$string);
$string = str_replace("~diamond","&#9830;",$string);
$string = str_replace("~1","&#185;",$string);
$string = str_replace("~2","&#178;",$string);
$string = str_replace("~3","&#179;",$string);
$string = str_replace("~half","&#189;",$string);
$string = str_replace("~quart","&#188;",$string);
$string = str_replace("~euro","&#8364;",$string);
$string = str_replace("~dot","&#8226;",$string);

$curcharlength = strlen($string);
$outstring = $string;
for ($i = 0; $i <= ($curcharlength-1); $i++) {
$curchar = substr ($string,$i,1);
$ochar = ord($curchar);
if ($ochar > 122) {
$new = "&#x" . strtoupper(dechex($ochar)) . ";";
$outstring = str_replace($curchar,$new,$outstring);
}
if ($ochar < 32)
$outstring = str_replace($curchar,"", $outstring);
}

return $outstring;
}


$ddd = date("j");

$mmm = date("n");

$yyy = date("Y");

$ttt = date("G:i");


$msgsandposts = "$ddd/$mmm/$yyy - $ttt";


$ses = $_GET["ses"];
if ($ses == "") $ses = $_POST["ses"];

///////////////////////////
$query = "SELECT * from forum_users where ses='$ses'";
$result = mysql_query ("$query");
$rowses = mysql_fetch_array($result);
$session = mysql_num_rows($result);

$login = $rowses['username'];


if ($ses != "")
{




	if ($act == "comm")

	{


	$addcomment = make_wml_compat(mysql_real_escape_string("$addcomment"));






	$query = "insert into phoenix_comments ( username, msg, timestamp, friendlytime, profile, type, readstate ) values ( '$login', '$addcomment', now(), '$msgsandposts', '$user', 'profile', '0' )";
	$result = mysql_query($query);
	$albumid = mysql_insert_id();


	$url = "../profile.php?ses=$ses&user=$user";



	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	




	}


	if ($act == "delcomm")

	{



	$query = "DELETE from phoenix_comments where id='$commid'";
	$result = mysql_query ("$query");


	$url = "../profile.php?ses=$ses&user=$user";



	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
	




	}

}
else
{
	$url = "../index.php?ses=$ses&msg=1";



	header("HTTP/1.1 301 Moved Permanently");
	header("Location: $url");
}






?>