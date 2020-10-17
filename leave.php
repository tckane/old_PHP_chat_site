<?php



$login = $_GET["login"];


include('./scripts/header.php');
include('./scripts/session.php');
include('./scripts/config.php');
include('./scripts/functions.php');
include('./scripts/main.php');


$surly = $_GET["surly"];

$reefer = $_SERVER["HTTP_REFERER"];

echo "<p class=\"break\">External Link</p><hr/>
<p class=\"breakforum\" style=\"text-align: center;\">
You are about to leave $sitename and go to<br/>
<b><a href=\"$surly\">$surly</a></b><br/>
$sitename is not responsible for the contents of the site you are about to visit.</p>
<hr/><p class=\"break\">$hyback <a href=\"$reefer\">go back</a></p></body></html>";




?>
