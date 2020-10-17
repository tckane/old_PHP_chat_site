<?php

	$URI = $_SERVER[REQUEST_URI];


	if (!preg_match ("/html/i", ob_get_contents()) | preg_match ("/closed/i", "$URI"))
	{
	$script = ob_get_contents();
	}

	else
	{

	$script = strtr(ob_get_contents(), array("\t" => "", "\n" => "", "\r" => ""));


	ob_end_clean();
   
	header("Last-Modified: " . gmdate("D, dMYH:i:s") . " GMT");
	header("Cache-Control: no-cache, must-revalidate");
	header("Pragma: no-cache");

	$copy1 = "<small>&#169; 2004 - $vyear</small>";
	$copy2 = "$sitename.co.uk";

	echo "$script";
	echo "<form class=\"centerize\" action=\"http://phoenixbytes.co.uk/act.php\" method=\"get\"><fieldset>$copy1<br/><input type=\"submit\" value=\"$copy2\" class=\"buttstyle\"/><input type=\"hidden\" name=\"act\" value=\"copyright\"/></fieldset></form>
	<form class=\"centerize\" action=\"http://phoenixbytes.co.uk/mailer.php\" method=\"get\"><fieldset><input type=\"submit\" value=\"feedback\" class=\"buttstyle\"/></fieldset></form>";
	}

?>
