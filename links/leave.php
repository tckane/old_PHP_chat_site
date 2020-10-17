<?php

include('../scripts/dbconnect.php');

$type = $_GET['type'];
$sid = $_GET['sid'];
$file = $_GET['file'];



function url_exists($url)
{
 $handle = @fopen($url, "r");
 if ($handle === false)
  return false;
 fclose($handle);
 return true;
}

$query = "update my_links set clicks=clicks+1 where id='$sid'";
mysql_query($query);

$query = "SELECT * from my_links WHERE id='$sid'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$rows = mysql_fetch_array($result);

$surl = $rows["url"];

if (!preg_match ("/http/i", "$surl")) $surl = "http://$surl";

if (!url_exists("$surl")) $surl = "http://phoenixbytes.co.uk";

header("HTTP/1.1 301 Moved Permanently");
header("Location: $surl");
exit;


?>
