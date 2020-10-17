<?php



include('admob.php');


$admofail = strlen(admob_request($admob_params));





echo "<p style=\"text-align: center; color: white; background-color: black; border-style: solid; border-color: white; border-width: 1px; font-size: xx-small;\">";


if ($admofail > "158")
{
echo admob_request($admob_params);
echo "<br/>";
}

echo "<b>Design by $owner<br/>Created at <a href=\"http://phoenixbytes.com\">PhoenixBytes.com</a></b></p>";

?>