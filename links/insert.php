<?php



$ses = $_GET['ses'];


if ($ses != "")
{

include('../scripts/ses.php');

}



include('../scripts/main.php');

$linksubmitout = "$lback";



$act = $_POST['act'];
if ($act == "") $act = $_GET['act'];
$id = $_POST['id'];
if ($id == "") $id = $_GET['id'];



$category = $_POST['category'];
$linktext = $_POST['linktext'];
$url = $_POST['url'];
$comment = $_POST['comment'];
$username = $_POST['username'];
$password = $_POST['password'];
$keywords = $_POST['keywords'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$valid = $_POST['valid'];
$linkback = $_POST['linkback'];
$clicks = $_POST['clicks'];
$stringus = $_POST['stringus'];
$sitelogos = $_POST['sitelogos'];

if ($act == "add")

	{


    	echo "<p class=\"break\">
    	<big><i>submit your site</i></big><br/>please fill out the form below to add your site to our directories, your submission will be reviewed before being added.</p><hr/>
	<form class=\"breakforum\" action=\"insert.php?ses=$ses&amp;act=in\" method=\"post\">
	<fieldset>
	<b>site name*:</b><br/>
    	<input type=\"text\" class=\"textbox\" name=\"linktext\"  title=\"site name\" maxlength=\"24\" />
    	<br/><b>http address*:</b><br/>
    	<input type=\"text\" class=\"textbox\" name=\"url\" title=\"full url\" maxlength=\"50\" />
    	<br/><b>logo url:</b><br/><small>(you can use our onsite <a href=\"../uploader/index.php?\">uploader</a> for these)</small><br/>
    	<input type=\"text\" class=\"textbox\" name=\"sitelogos\" title=\"full url\" maxlength=\"50\" />
    	<br/><b>short description*:</b><br/>
	<input name=\"comment\" class=\"textbox\" type=\"text\" title=\"comment\"/>
    	<br/><b>search keywords*:</b><br/><small>(seperate with comas please)</small><br/>
	<input name=\"keywords\" class=\"textbox\" type=\"text\" title=\"keywords\"/>
	<br/><b>select category:</b><br/>
	<select name=\"category\" value=\"$category\" title=\"category\" class=\"textbox\">
	<option value=\"portals\">portals &amp; search</option>
	<option value=\"chat\">chat &amp; dating</option>
	<option value=\"downloads\">downloads</option>
	<option value=\"free\">free stuff</option>
	<option value=\"adult\">adult sites</option>
	<option value=\"entertainment\">entertainment</option>
	<option value=\"personal\">special interest</option>
	<option value=\"amateur\">amateur (personal sites)</option>
	</select>
    	<br/><b>username*:</b><br/><small>(this is not your $sitename account username)</small><br/>
	<input name=\"username\" class=\"textbox\" type=\"text\" maxlength=\"24\" title=\"username\"/>
    	<br/><b>password*:</b><br/><small>(this is not your $sitename account password)</small><br/>
	<input name=\"password\" class=\"textbox\" type=\"password\" maxlength=\"24\" title=\"password\"/><br/>";

    	echo "<input type=\"submit\" value=\"add your site\" class=\"buttstyle\"/>
	<br/>* star marked items are <b>required!</b>
	</fieldset>
    	</form><hr/><p class=\"break\">

$hyback <a href=\"./index.php?ses=$ses&amp;act=index\">go back</a><br/>
$hyback <a href=\"../index.php\">main menu</a></p></body></html>";
exit;
	}

if ($act == "in") 
	{
$query = "select count(*) from my_links where url='$url'";
$result = mysql_query($query);
$count1 = number_format(mysql_result($result,0,"count(*)"));

$query = "select count(*) from my_links where linktext='$linktext'";
$result = mysql_query($query);
$count2 = number_format(mysql_result($result,0,"count(*)"));

$query = "select count(*) from my_links where login='$username'";
$result = mysql_query($query);
$count3 = number_format(mysql_result($result,0,"count(*)"));


if ($url == "")
	{
	echo "<p class=\"break\">
	<b>error</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	you must provide an address for your link!</p><hr/><p class=\"break\">
	$hyback <a href=\"./insert.php?ses=$ses&amp;act=add\">try again</a><br/>
	$hyback <a href=\"./index.php?ses=$ses&amp;act=index\">link list</a><br/>
	$hyback <a href=\"../index.php\">main menu</a></p></body></html>";
	exit;
	}
elseif ($linktext == "")
	{
	echo "<p class=\"break\">
	<b>error</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	you must provide a name for your link!</p><hr/><p class=\"break\">
	$hyback <a href=\"./insert.php?ses=$ses&amp;act=add\">try again</a><br/>
	$hyback <a href=\"./index.php?ses=$ses&amp;act=index\">link list</a><br/>
	$hyback <a href=\"../index.php\">main menu</a></p></body></html>";
	exit;
	}
elseif ($keywords == "")
	{
	echo "<p class=\"break\">
	<b>error</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	you must provide keywords for your link!</p><hr/><p class=\"break\">
	$hyback <a href=\"./insert.php?ses=$ses&amp;act=add\">try again</a><br/>
	$hyback <a href=\"./index.php?ses=$ses&amp;act=index\">link list</a><br/>
	$hyback <a href=\"../index.php\">main menu</a>$breaker$atmain

	</p></body></html>";
	exit;
	}
elseif ($username == "")
	{
	echo "<p class=\"break\">
	<b>error</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	you must provide a username!</p><hr/><p class=\"break\">
	$hyback <a href=\"./insert.php?ses=$ses&amp;act=add\">try again</a><br/>
	$hyback <a href=\"./index.php?ses=$ses&amp;act=index\">link list</a><br/>
	$hyback <a href=\"../index.php\">main menu</a></p></body></html>";
	exit;
	}
elseif ($password == "")
	{
	echo "<p class=\"break\">
	<b>error</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	you must provide a password!</p><hr/><p class=\"break\">
	$hyback <a href=\"./insert.php?ses=$ses&amp;act=add\">try again</a><br/>
	$hyback <a href=\"./index.php?ses=$ses&amp;act=index\">link list</a><br/>
	$hyback <a href=\"../index.php\">main menu</a></p></body></html>";
	exit;
	}
elseif ($count1 > 0 | $count2 > 0 | $count3 > 0)
	{
	echo "<p class=\"break\">
	<b>error</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	someone has already signed up with<br/>";

	if ($count1 >= 1) echo "<b>URL: $url</b><br/>";
	if ($count2 >= 1) echo "<b>Site Name: $linktext</b><br/>";
	if ($count3 >= 1) echo "<b>Username: $username</b></p>";

	echo "<hr/><p class=\"break\">
	$hyback <a href=\"./insert.php?ses=$ses&amp;act=add\">try again</a><br/>
	$hyback <a href=\"./index.php?ses=$ses&amp;act=index\">link list</a><br/>
	$hyback <a href=\"../index.php\">main menu</a></p></body></html>";
	exit;
	}

else
	{

$db = "INSERT INTO my_links ( login, url, linktext, comment, keywords, category, password, valid, sitelogo ) VALUES ( '$username', '$url', '$linktext', '$comment', '$keywords', '$category', '$password', 'no', '$sitelogos' )";
$result = mysql_query($db);
$tid = mysql_insert_id();
	
	if ($result == "true")
		{
	echo "<p class=\"break\">
	<b>thank you.</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	your site was submitted for review, your site will be re categorized if deemed necessary,<br/>
	your place in the results depend on how well your users support your site.<br/>
	<b>We will personally review your site, if we do not see a link back to us, you will not be approved.</b><br/>
	<b>$linksubmitout</b><b>?site=</b><b>$tid</b><br/><br />
	each click back adds incoming clicks to your account, the more clicks, the higher your link gets.
	</p>
	<hr/><p class=\"break\">
	$hyback <a href=\"./index.php?ses=$ses&amp;act=index\">link list</a><br/>
	$hyback <a href=\"../index.php\">main menu</a>
	</p></body></html>";
		}
	else
		{
	echo "<p class=\"break\">
	<b>error.</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	query error, it didn't happen son. this is a problem for the database administrator.
	</p><hr/><p align=\"center\">
	$hyback <a href=\"./insert.php?ses=$ses&amp;act=add\">try again</a><br/>
	$hyback <a href=\"./index.php?ses=$ses\">back</a><br/>
	$hyback <a href=\"../index.php\">main menu</a></p></body></html>";
		}

	}
}




// AD DELETE: done!

if ($act == "adnamedel") 


	{

$query = "delete from my_links where linktext LIKE '%$stringus%'";
$result = mysql_query("$query");



	echo "<p class=\"break\">
	<b>done</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	all links containing $stringus were deleted!</p>
	<hr/><p class=\"break\">
$hyback <a href=\"./zadmin8.php?act=admin8ptswonkytowelsupport\">back</a><br/>
$hyback <a href=\"../index.php\">main menu</a></p></body></html>";
	exit;
	}



if ($act == "zadmin8") 


	{

$query = "delete from my_links where id='$id'";
$result = mysql_query("$query");



	echo "<p class=\"break\">
	<b>done</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	the link was deleted</p>
	<hr/><p class=\"break\">
$hyback <a href=\"./zadmin8.php?act=admin8ptswonkytowelsupport\">back</a><br/>
$hyback <a href=\"../index.php\">main menu</a></p></body></html>";
	exit;
	}








// AD validate

if ($act == "zadminvalid8") 


	{

$query = "update my_links set valid='yes' where id='$id'";
$result = mysql_query("$query");



	echo "<p class=\"break\">
	<b>done</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	the link was validated</p>
	<hr/><p class=\"break\">
$hyback <a href=\"./zadmin8.php?act=admin8ptswonkytowelsupport\">back</a><br/>
$hyback <a href=\"../index.php\">main menu</a></p></body></html>";
	exit;
	}


if ($act == "valall") 


	{

$query = "update my_links set valid='yes'";
$result = mysql_query("$query");



	echo "<p class=\"break\">
	<b>done</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	all waiting links were validated</p>
	<hr/><p class=\"break\">
$hyback <a href=\"./zadmin8.php?act=admin8ptswonkytowelsupport\">back</a><br/>
$hyback <a href=\"../index.php\">main menu</a></p></body></html>";
	exit;
	}

if ($act == "delall") 


	{

$query = "delete from my_links where valid='no'";
$result = mysql_query("$query");



	echo "<p class=\"break\">
	<b>done</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	all waiting links were deleted</p>
	<hr/><p class=\"break\">
$hyback <a href=\"./zadmin8.php?act=admin8ptswonkytowelsupport\">back</a><br/>
$hyback <a href=\"../index.php\">main menu</a></p></body></html>";
	exit;
	}



if ($act == "zadmin8dit")

	{
	$query = "select * from my_links where id=$id";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);

	$nlinktext = $row["linktext"];
	$nu = $row["login"];
	$nurl = $row["url"];
	$id = $row["id"];
	$ncomment = $row["comment"];
	$nkeywords = $row["keywords"];
	$nusername = $row["username"];
	$npassword = $row["password"];
	$incom = $row["linkback"];
	$nsitelogos = $row["sitelogo"];
	$outgo = $row["clicks"];
	$nval = $row["valid"];
                $nlinktext = make_wml_compat($nlinktext);

    	echo "<p class=\"break\">
    	<big><i>edit a site</i></big></p><hr/>
	<form class=\"breakforum\" action=\"insert.php?ses=$ses&amp;act=zadmin8edin&amp;id=$id\" method=\"post\">
	<fieldset>
	site name:</b><br/>
    	<input type=\"text\" class=\"textbox\" name=\"linktext\" title=\"site name\" value=\"$nlinktext\" maxlength=\"24\" />
    	<br/><b>http address:</b></b><br/>
    	<input type=\"text\" class=\"textbox\" name=\"url\" value=\"$nurl\" title=\"full url\" maxlength=\"50\" />
    	<br/><b>logo address:</b></b><br/>
    	<input type=\"text\" class=\"textbox\" name=\"sitelogos\" value=\"$nsitelogos\" title=\"logo url\" maxlength=\"50\" />
    	<br/><b>short description:</b><br/>
	<input name=\"comment\" class=\"textbox\" type=\"text\"  value=\"$ncomment\" title=\"comment\"/>
    	<br/><b>keywords:</b><br/>
	<input name=\"keywords\" class=\"textbox\" type=\"text\" title=\"keywords\" value=\"$nkeywords\" />
	<br/><b>select category:</b><br/>
	<select name=\"category\" value=\"$ncategory\" title=\"category\" class=\"textbox\">
	<option value=\"portals\">portals &amp; search</option>
	<option value=\"chat\">chat &amp; dating</option>
	<option value=\"downloads\">downloads</option>
	<option value=\"free\">free stuff</option>
	<option value=\"adult\">adult sites</option>
	<option value=\"entertainment\">entertainment</option>
	<option value=\"personal\">special interest</option>
	<option value=\"amateur\">amateur (personal sites)</option>
	</select>
    	<br/><b>username:</b><br/>
	<input name=\"username\" class=\"textbox\" type=\"text\" value=\"$nu\" maxlength=\"24\" title=\"username\"/>
    	<br/><b>password:</b><br/>
	<input name=\"password\" class=\"textbox\" type=\"password\" value=\"$npassword\" maxlength=\"24\" title=\"password\"/>
    	<br/><b>valid:</b><br/>
	<input name=\"valid\" class=\"textbox\" type=\"text\" value=\"$nval\" maxlength=\"3\" title=\"\"/>
    	<br/><b>incoming clicks:</b><br/>
	<input name=\"linkback\" class=\"textbox\" type=\"text\" value=\"$incom\" maxlength=\"99\" title=\"\"/>
    	<br/><b>outgoing clicks:</b><br/>
	<input name=\"clicks\" class=\"textbox\" type=\"text\" value=\"$outgo\" maxlength=\"99\" title=\"\"/>";

    	echo "<br/><input type=\"submit\" value=\"update\" class=\"buttstyle\"/>
	</fieldset>
    	</form><hr/><p class=\"break\">
$hyback <a href=\"./zadmin8.php?act=admin8ptswonkytowelsupport\">back</a><br/>
$hyback <a href=\"../index.php\">main menu</a></p></body></html>";
exit;
	}


if ($act == "zadmin8edin") 

	{
if ($url == "")
	{
	echo "<p class=\"break\">
	<b>error</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	you must provide an address for your link!</p>
	<hr/><p class=\"break\">
	$hyback <a href=\"./insert.php?ses=$ses&amp;act=add\">try again</a><br/>
	$hyback <a href=\"./zadmin8.php?act=admin8ptswonkytowelsupport\">back</a><br/>
	$hyback <a href=\"../index.php\">main menu</a></p></body></html>";
	exit;
	}
elseif ($linktext == "")
	{
	echo "<p class=\"break\">
	<b>error</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	you must provide a name for your link!</p>
	<hr/><p class=\"break\">
	$hyback <a href=\"./insert.php?ses=$ses&amp;act=add\">try again</a><br/>
	$hyback <a href=\"./zadmin8.php?act=admin8ptswonkytowelsupport\">back</a><br/>
	$hyback <a href=\"../index.php\">main menu</a></p></body></html>";
	exit;
	}
elseif ($keywords == "")
	{
	echo "<p class=\"break\">
	<b>error</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	you must provide keywords for your link!</p>
	<hr/><p class=\"break\">
	$hyback <a href=\"./insert.php?ses=$ses&amp;act=add\">try again</a><br/>
	$hyback <a href=\"./zadmin8.php?act=admin8ptswonkytowelsupport\">back</a><br/>
	$hyback <a href=\"../index.php\">main menu</a></p></body></html>";
	exit;
	}
elseif ($username == "")
	{
	echo "<p class=\"break\">
	<b>error</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	you must provide a username!</p>
	<hr/><p class=\"break\">
	$hyback <a href=\"./insert.php?ses=$ses&amp;act=add\">try again</a><br/>
	$hyback <a href=\"./options/index2.php?ses=$ses&amp;act=getgone\">back</a><br/>
	$hyback <a href=\"../index.php\">main menu</a></p></body></html>";
	exit;
	}
elseif ($password == "")
	{
	echo "<p class=\"break\">
	<b>error</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	there's no password!</p>
	<hr/><p class=\"break\">
	$hyback <a href=\"./insert.php?ses=$ses&amp;act=add\">try again</a><br/>
	$hyback <a href=\"./zadmin8.php?act=admin8ptswonkytowelsupport\">back</a><br/>
	$hyback <a href=\"../index.php\">main menu</a></p></body></html>";
	exit;
	}

else
	{

	$query = "update my_links set linktext='$linktext', login='$username', keywords='$keywords', comment='$comment', password='$password', url='$url', category='$category', valid='$valid', linkback='$linkback', clicks='$clicks', sitelogo='$sitelogos' where id='$id'";
	$result = mysql_query($query);

	if ($result == "true")
		{
	echo "<p class=\"break\">
	<b>done.</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	site updated</p>
	<hr/><p class=\"break\">
	$hyback <a href=\"./insert.php?ses=$ses&amp;act=add\">try again</a><br/>
	$hyback <a href=\"./zadmin8.php?act=admin8ptswonkytowelsupport\">back</a><br/>
	$hyback <a href=\"../index.php\">main menu</a></p></body></html>";
		}
	else
		{
	echo "<p class=\"break\">
	<b>error.</b><hr/><p align=\"center\"></p><p class=\"breakforum\" style=\"text-align: center;\">
	query error, it didn't happen son. this is a problem for the database administrator.
	</p>
	<hr/><p class=\"break\">
	$hyback <a href=\"./insert.php?ses=$ses&amp;act=add\">try again</a><br/>
	$hyback <a href=\"./zadmin8.php?act=admin8ptswonkytowelsupport\">back</a><br/>
	$hyback <a href=\"../index.php\">main menu</a></p></body></html>";
		}
	
	}
}







if ($act == "userdit")

	{

echo "<p class=\"break\">edit site entry</p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
<b>please enter the details you submitted when you were here the first time.</b>
</p><hr/>
<form class=\"breakforum\" style=\"text-align: center;\"action=\"insert.php?act=ueditpage\" method=\"post\">
<fieldset>
<b>username*:</b><br/>
<input type=\"text\" name=\"user\" class=\"textbox\" title=\"username\"/><br/>
<b>password*:</b><br/>
<input type=\"password\" name=\"pass\" class=\"textbox\" title=\"password\"/><br/>
<input type=\"submit\" value=\"login\" class=\"buttstyle\"/>
</fieldset>
</form><hr/>
<p class=\"breakforum\" style=\"text-align: center;\">
<small>* these are not your $sitename login details</small>

<p class=\"break\">
$hyback <a href=\"./index.php?ses=$ses&amp;act=index\">back</a><br/>
$hyback <a href=\"../index.php\">main menu</a>
</p></body></html>";
	}


if ($act == "ueditpage")
	{


$query = "select * from my_links where login='$user' AND password='$pass'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);


	if ($num_rows == 0)
	{

	echo "<p class=\"break\">
	<b>error.</b><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	match not found, you entered the wrong details.<br/>
	you may have misspelled something, or you might not have been accepted.</p>
	<hr/><p class=\"break\">
	$hyback <a href=\"./index.php?ses=$ses&amp;act=index\">back</a><br/>
	$hyback <a href=\"../index.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;

	}

	if ($num_rows == 1)
	{
	$nlinktext = $row["linktext"];
	$nu = $row["login"];
	$nurl = $row["url"];
	$id = $row["id"];
	$ncomment = $row["comment"];
	$nkeywords = $row["keywords"];
	$nusername = $row["username"];
	$nlog = $row["sitelogo"];
	$npassword = $row["password"];
                $nlinktext = make_wml_compat($nlinktext);

    	echo "<p class=\"break\">
    	<big><i>edit a site</i></big></p><hr/>
	<form class=\"breakforum\" action=\"insert.php?ses=$ses&amp;act=useredin&amp;id=$id\" method=\"post\">
	<fieldset>
	site name:<br/>
    	<input type=\"text\" class=\"textbox\" name=\"linktext\" value=\"$nlinktext\" title=\"site name\" maxlength=\"24\" />
    	<br/><b>http address</b> <br/>
    	<input type=\"text\" class=\"textbox\" name=\"url\" value=\"$nurl\" title=\"full url\" maxlength=\"50\" />
    	<br/><b>logo url:</b><br/><small>(you can use our onsite <a href=\"../uploader/index.php?\">uploader</a> for these)</small><br/>
    	<input type=\"text\" class=\"textbox\" name=\"sitelogos\" title=\"logo url\" maxlength=\"50\" value=\"$nlog\" />
    	<br/><b>short description:<br/>
	<input name=\"comment\" class=\"textbox\" type=\"text\"  value=\"$ncomment\" title=\"comment\"/>
    	<br/><b>search keywords*:</b><br/><small>(seperate with comas please)</small><br/>
	<input name=\"keywords\" class=\"textbox\" type=\"text\" title=\"keywords\" value=\"$nkeywords\" />
	<br/>select category<br/>
	<select name=\"category\" value=\"$ncategory\" title=\"category\" class=\"textbox\">
	<option value=\"portals\">portals &amp; search</option>
	<option value=\"chat\">chat &amp; dating</option>
	<option value=\"downloads\">downloads</option>
	<option value=\"free\">free stuff</option>
	<option value=\"adult\">adult sites</option>
	<option value=\"entertainment\">entertainment</option>
	<option value=\"personal\">special interest</option>
	<option value=\"amateur\">amateur (personal sites)</option>
	</select>
    	<br/>password:<br/>
	<input name=\"password\" class=\"textbox\" type=\"password\" value=\"$npassword\" maxlength=\"24\" title=\"password\"/>";
    	echo "<br/><input type=\"submit\" value=\"update\" class=\"buttstyle\"/>
	<input type=\"hidden\" name=\"pass\" value=\"$pass\"/>
	<input type=\"hidden\" name=\"user\" value=\"$user\"/>
    	</fieldset>
	</form><hr/><p class=\"breakforum\" style=\"text-align: center;\">the address you should link back to is:<br/>
	<b>$linksubmitout</b><b>?site=</b><b>$id</b><br/>this is optional but will increase your site's chance of being seen by your target audience.</p><hr/>
<p class=\"break\">
$hyback <a href=\"./index.php?ses=$ses&amp;act=index\">go back</a><br/>
$hyback <a href=\"../index.php\">main menu</a></p></body></html>";
exit;
	}

}




if ($act == "useredin") 

	{
$query = "select * from my_links where login='$user' AND password='$pass'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);


	if ($num_rows == 0)
	{

	echo "<p class=\"break\">
	<b>error.</b><hr/><p align=\"center\"></p><p class=\"breakforum\" style=\"text-align: center;\">
	match not found, you entered the wrong details.<br/>
	you may have misspelled something, or you might not have been accepted.</p>
	<hr/><p class=\"break\">
	$hyback <a href=\"./index.php?ses=$ses&amp;act=index\">back</a><br/>
	$hyback <a href=\"../index.php?ses=$ses\">main menu</a>
	</p></body></html>";
	exit;

	}
	else
	{

if ($url == "")
	{
	echo "<p class=\"break\">
	<b>error</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	you must provide an address for your link!</p>
	<hr/><p class=\"break\">
	$hyback <a href=\"./insert.php?ses=$ses&amp;act=add\">try again</a><br/>
	$hyback <a href=\"./index.php?ses=$ses&amp;act=index\">back</a><br/>
	$hyback <a href=\"../index.php\">main menu</a></p></body></html>";
	exit;
	}
elseif ($linktext == "")
	{
	echo "<p class=\"break\">
	<b>error</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	you must provide a name for your link!</p>
	<hr/><p class=\"break\">
	$hyback <a href=\"./insert.php?ses=$ses&amp;act=add\">try again</a><br/>
	$hyback <a href=\"./index.php?ses=$ses&amp;act=index\">back</a><br/>
	$hyback <a href=\"../index.php\">main menu</a></p></body></html>";
	exit;
	}
elseif ($keywords == "")
	{
	echo "<p class=\"break\">
	<b>error</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	you must provide keywords for your link!.</p>
	<hr/><p class=\"break\">
	$hyback <a href=\"./insert.php?ses=$ses&amp;act=add\">try again</a><br/>
	$hyback <a href=\"./index.php?ses=$ses&amp;act=index\">back</a><br/>
	$hyback <a href=\"../index.php\">main menu</a>

	</p></body></html>";
	exit;
	}
elseif ($password == "")
	{
	echo "<p class=\"break\">
	<b>error</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	you must provide a password!</p>
	<hr/><p class=\"break\">
	$hyback <a href=\"./insert.php?ses=$ses&amp;act=add\">try again</a><br/>
	$hyback <a href=\"./index.php?ses=$ses&amp;act=index\">back</a><br/>
	$hyback <a href=\"../index.php\">main menu</a></p></body></html>";
	exit;
	}

else
	{

$query = "select valid from my_links where id=$id";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);
$nval = $row["valid"];

	$query = "update my_links set linktext='$linktext', keywords='$keywords', comment='$comment', password='$password', url='$url', category='$category', valid='$nval', sitelogo='$sitelogos' where id=$id";
	$result = mysql_query($query);

	if ($result == "true")
		{
	echo "<p class=\"break\">
	<b>done.</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	site entry updated</p>
	<hr/><p class=\"break\">
	$hyback <a href=\"./index.php?ses=$ses&amp;act=index\">back</a><br/>
	$hyback <a href=\"../index.php\">main menu</a>
	</p></body></html>";
		}
	else
		{
	echo "<p class=\"break\">
	<b>error.</b></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
	query error, it didn't happen son. this is a problem for the database administrator.</p>
	<hr/><p class=\"break\">
	$hyback <a href=\"./insert.php?ses=$ses&amp;act=add\">try again</a><br/>
	$hyback <a href=\"./options/index2.php?ses=$ses&amp;act=getgone\">back</a><br/>
	$hyback <a href=\"../index.php\">main menu</a></p></body></html>";
		}

	}
}
}




?>