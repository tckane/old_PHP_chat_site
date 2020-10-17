<?php

include('./scripts/header.php');
include('./scripts/session.php');
include('./scripts/config.php');
include('./scripts/functions.php');
include('./scripts/main.php');


$code = $_GET["code"];







	$query = "select * from forum_users where validby='$code'";
	$result = mysql_query($query);
	$counter = mysql_num_rows($result);

if ($counter > 0)
	{



	$rowhh = mysql_fetch_array($result);
		$userna = $rowhh["username"];
		$passwo = $rowhh["password"];

	$query="UPDATE forum_users set valid='yes', validby='Validated By Email' WHERE username='$userna' AND validby='$code'";
	mysql_query($query);






echo "<p class=\"break\">Account Activated</p><hr/><p class=\"breakforum\" style=\"text-align: center\">


Thank you for confirming your account, you may now<br/>
<a href=\"logincheck.php?u=$userna&amp;p=$passwo\"><b>Log In</b></a><br/>Have fun!




</p><hr/><p class=\"break\">";

	echo "$hyl<a href=\"./index.php\">member login</a>$hyl<br/>$hyl<a href=\"./index.php\">exit</a>$hyl";

	echo "</p></body></html>";

}
else
{



echo "<p class=\"break\">Something Went Awry</p><hr/><p class=\"breakforum\" style=\"text-align: center\">


It appears this code is not valid.<br/>
The case may be that you already confirmed your account.<br/>
Please try logging in.
</p><hr/><p class=\"break\">";

	echo "$hyl<a href=\"./index.php\">member login</a>$hyl<br/>$hyl<a href=\"./index.php\">exit</a>$hyl";

	echo "</p></body></html>";




}

?>