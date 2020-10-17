<?php


include('../scripts/main.php');




$insert = urlencode("Add Your Site");






echo "<p class=\"break\"><img src=\"../scripts/phoenix.php?login=SYSTEM&amp;string=$insert\" alt=\"Add Your Site\" align=\"middle\"/>";
echo "</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
$sitename is NOT a 'toplist' site, we are a mobile community using a 'toplist' style wap directory to try and grow our numbers.<br/>
We're different, we don't like poorly planned out sites full of spam and links that lead you around in circles but ultimately go nowhere, this is not what the internet is for.<br/>
So here's what we do, we review <b>every</b> site submitted <b>by hand</b>.<br/>
We will look at your site and see what it's all about, we'll edit your description to pull out spelling mistakes and innacuracies or even add things you might have missed.<br/>
We'll also look for <b>our link</b> which you'll be given when you submit your site. <b>if we don't see our link, you will not be accepted, even if your site is fabulous</b>.<br/><br/>
<b><big>Please remember, we submit <i>all</i> sites listed here to google in our sitemap, so please be as accurate with your descriptions as possible!!!!</big></b></p>
<hr/>
<p class=\"breakforum\" style=\"text-align: center;\">

<b><big>guidelines</big></b></p>
<p class=\"breakforum\">
&#8226; Your site url or web address must be no more than 50 characters long, you do not need to specify 'http://' but your link does need to work.<br/><br/>
&#8226; Please don't link to dopey search and spam sites, you know who you are!<br/><br/>
&#8226; Only submit sites that your not going to close in a huff.<br/><br/>
&#8226; Write some keywords and a decent description, remember, you want the world at your site, reel 'em in.<br/><br/>
&#8226; We do not need your email address, alls we needs is links see, good ones.</p>
<hr/><p class=\"break\">
$hyfor <a href=\"./insert.php?ses=$ses&amp;act=add\">submit your site</a><br/>
$hyfor <a href=\"./insert.php?ses=$ses&amp;act=userdit\">edit site entry</a><br/>
$hyback <a href=\"../index.php\">main menu</a><br/>$lIlIlIlI</p></body></html>";
exit;

?>