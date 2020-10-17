<?php


include('../scripts/main.php');
//// MEMBER'S OWN
//// WAP SITES - ADMINISTRATION AREA!


$login = "chris";

$owner = "$login";

$msg = $_GET["msg"];
if ($msg != "") $msg = "<br/><small><b><i>$msg</i></b></small>";


$pagid = $_GET["pagid"];
if ($pagid == "") $pagid = $_POST["pagid"];

$modid = $_GET["modid"];
if ($modid == "") $modid = $_POST["modid"];

$act2 = $_GET["act2"];
if ($act2 == "") $act2 = $_POST["act2"]; 

//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
////HEADER END

////MENU START
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////




if ($act == "")
{

$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='site'";
$result = mysql_query($query);
$selection = mysql_fetch_array($result);

$shits = $selection["hits"];
$surl = $selection["url"];


echo "<p class=\"break\"><img src=\"../scripts/phoenix.php?login=$login&amp;string=Mobile%20Web%20Creator\"/>$msg</p>
<p class=\"breakforum\" style=\"text-align: center;\"><b>This is the main control area for administering your mobile web site.<br/>
If you need help, please consult the tutorial pages.</b></p>


<p class=\"breakforum\"><b>
$hyfor <a href=\"./pigmin.php?ses=$ses&amp;act=managepages\">Manage Pages</a> [!]<br/>


$hyfor <a href=\"./pigmin.php?ses=$ses&act=managemodules\">Manage Page Modules</a><br/>
$hyfor <a>Manage Style Sheets</a><br/>
$hyfor <a>Manage Images</a><br/>
$hyfor <a>Manage Other Files</a><br/>
$hyfor <a>Advertising Options</a><br/>
<br/>
$hyfor <a href=\"$surl\">Preview My Site</a><br/>
$hyfor <a>Publish My Site</a><br/>
</b></p><p class=\"breakforum\" style=\"text-align: center;\">
<b>My Address<br/>
<small><input type=\"text\" readonly=\"yes\" value=\"$surl\" style=\"text-align: center;\"/></small></b><br/>
<b>Visits So Far: $shits</b>
</p>
<p class=\"break\">$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p>";



}


//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
////MENU END

////NEWPAGE START
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////






if ($act == "managepages")
{



echo "<p class=\"break\"><img src=\"../scripts/phoenix.php?login=$login&amp;string=Manage%20Pages\"/></p>
<p class=\"breakforum\" style=\"text-align: center;\"><b>These are the main pages of your site, where everything you create will live.</b></p>


<p class=\"breakforum\" style=\"text-align: center;\"><b>

<a href=\"./pigmin.php?ses=$ses&amp;act=newpage\">Create New Page</a><br/>
---<br/>
<a href=\"./pigmin.php?ses=$ses&amp;act=editpages\">Modify Existing Pages</a><br/>
---<br/>
<a href=\"./pigmin.php?ses=$ses&amp;act=delpages\">Delete Pages</a>

</b></p>


<p class=\"break\">
$hyback <a href=\"./pigmin.php?ses=$ses\">Mobile Web Creator</a><br/>
$hyback <a href=\"../mainmenu.php?ses=$ses\">Main Menu</a></p></body></html>";



}














if ($act == "newpage")
{


// has user got pages?

$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='page'";
$result = mysql_query($query);
$totalpages = mysql_num_rows($result);


$linkiname = ($totalpages + 1);
$linkiname = "page$linkiname";


echo "<p class=\"break\"><img src=\"../scripts/phoenix.php?login=$login&amp;string=Create%20New%20Page\"/></p>
<p class=\"breakforum\" style=\"text-align: center;\"><b>You can create a new page here; if you need things like message boards and login areas, check out Manage Modules.</p>

<form class=\"breakforum\" action=\"pigminsert.php?ses=$ses&amp;act=createpage\" method=\"post\">
<fieldset>
<b>Select Style Sheet</b><br/>";

$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='css'";
$result = mysql_query($query);
$styles = mysql_num_rows($result);

if ($styles > 0)
{
echo "<small>Style Sheets are what gives your site colours etc, you can create these in <a href=\"./pigmin.php?ses=$ses&amp;act=managestyles\">Manage Style Sheets</a>, please select a style sheet to use with this page.</small><br/>";

$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='css'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

echo "<select name=\"stylesheet\">";

while ($row)
{

$ssid = $row["id"];
$sstitle = $row["title"];

echo "<option value=\"$ssid\">$sstitle</option>";

$row = mysql_fetch_array($result);
}
echo "</select><br/><br/>";
}
else
{

echo "<small>You currently have no style sheets, you can create some in <a href=\"./pigmin.php?ses=$ses&amp;act=managestyles\">Manage Style Sheets</a> but you don't have to do that now if you don't want to, as the system will set the default style and you can change it you get around to it.</small><br/><br/>";

}






echo "<b>Page Title</b><br/>
<small>This appears in the Title Bar (the very, very top) of your browser. If you link to this page from other pages, this will be the link text.</small><br/>
<input type=\"text\" name=\"pagetitle\" maxlength=\"44\"/><br/><br/>

<b>Linking Name</b><br/>
<small>this is how YOU will know your page, memorise it, this will be used when linking back to this page from other pages.<br/>
You will type <u>page:$linkiname</u> where you want the link to appear.</small><br/>
<input type=\"text\" name=\"sysname\" value=\"$linkiname\" readonly=\"yes\" maxlength=\"44\"/><br/><br/>




<input type=\"submit\" value=\"create new page\"/>

<input type=\"hidden\" name=\"act\" value=\"createpage\"/>
<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>


</fieldset></form>";





echo "<p class=\"break\">
$hyback <a href=\"./pigmin.php?ses=$ses&amp;act=managepages\">Manage Pages</a><br/>
$hyback <a href=\"./pigmin.php?ses=$ses\">Mobile Web Creator</a><br/>
$hyback <a href=\"../mainmenu.php?ses=$ses\">Main Menu</a></p></body></html>";



}


//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
////NEWPAGE END

////EDIT PAGES START
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////


if ($act == "editpages")
{


	if ($act2 == "")
	{
	echo "<p class=\"break\"><img src=\"../scripts/phoenix.php?login=$login&amp;string=Modify%20Existing%20Pages\"/></p>
	<p class=\"breakforum\" style=\"text-align: center;\"><b>Please select a page to edit.</b></p>
	<p class=\"breakforum\">";
		



	$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='page'";
	$result = mysql_query($query);
	$pages = mysql_num_rows($result);

		if ($pages > 0)
		{
		$row = mysql_fetch_array($result);

			while ($row)
			{

			$pid = $row["id"];
			$ptitle = $row["title"];
			$psys = $row["sysname"];
	
			echo "<b>$hyfor <a href=\"./pigmin.php?ses=$ses&amp;act=editpages&amp;act2=gotpage&amp;pagid=$pid\">page:$psys ($ptitle)</a></b><br/>";



			$row = mysql_fetch_array($result);
			}

			
	echo "</p><p class=\"break\">
$hyback <a href=\"./pigmin.php?ses=$ses&amp;act=managepages\">Manage Pages</a><br/>
$hyback <a href=\"./pigmin.php?ses=$ses\">Mobile Web Creator</a><br/>
	$hyback <a href=\"../mainmenu.php?ses=$ses\">Main Menu</a></p></body></html>";
	
		}

	}

	if ($act2 == "gotpage")
	{
	// edit pages!

	$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='page' and id='$pagid'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);

			$pid = $row["id"];
			$ptitle = $row["title"];
			$psys = $row["sysname"];
			$pcontent = $row["content"];

	$imtxt = urlencode("Modify: $psys");
	echo "<p class=\"break\"><img src=\"../scripts/phoenix.php?login=$login&amp;string=$imtxt\"/></p>
	<p class=\"breakforum\" style=\"text-align: center;\"><b>Page Selected: $psys.</b><br/>
	Currently Editing: Main Content.<br/>
	Switch To: <a href=\"./pigmin.php?ses=$ses&amp;pagid=$pagid&amp;act=editpages&amp;act2=pagesettings\">Page Settings</a>.</p>";
		
	echo "<form class=\"breakforum\" style=\"text-align: center;\" action=\"./pigminsert.php?ses=$ses&amp;act=editpage\" method=\"post\"><fieldset>
	<textarea style=\"height: 300px; width: 99%;\" name=\"fullcontent\">$pcontent</textarea><br/>
	
	<input type=\"hidden\" name=\"pagid\" value=\"$pagid\"/>
	<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
	<input type=\"hidden\" name=\"act\" value=\"editpage\"/>


	<input type=\"submit\" style=\"width: 100%;\" value=\"submit changes\"/></fieldset></form>";


	echo "<p class=\"break\">




	$hyback <a href=\"./pigmin.php?ses=$ses&amp;act=managepages\">Manage Pages</a><br/>
	$hyback <a href=\"./pigmin.php?ses=$ses\">Mobile Web Creator</a><br/>
	$hyback <a href=\"../mainmenu.php?ses=$ses\">Main Menu</a></p></body></html>";

	}




	if ($act2 == "pagesettings")
	{
	// edit pages!

	$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='page' and id='$pagid'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);

			$pid = $row["id"];
			$ptitle = $row["title"];
			$psys = $row["sysname"];
			$pcss = urldecode($row["stylesheet"]);




	$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='css' and content='$pcss'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$ctitle = $row["title"];

	$imtxt = urlencode("Modify: $psys");
	echo "<p class=\"break\"><img src=\"../scripts/phoenix.php?login=$login&amp;string=$imtxt\"/></p>
	<p class=\"breakforum\" style=\"text-align: center;\"><b>Page Selected: $psys.</b><br/>
	Currently Editing: Page Settings.<br/>
	Switch To: <a href=\"./pigmin.php?ses=$ses&amp;pagid=$pagid&amp;act=editpages&amp;act2=gotpage\">Main Content</a>.</p>";
		
	echo "<form class=\"breakforum\" action=\"./pigminsert.php?ses=$ses&amp;act=editpagesettings\" method=\"post\"><fieldset>
	<b>Select Style Sheet</b><br/>";

	$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='css'";
	$result = mysql_query($query);
	$styles = mysql_num_rows($result);

	if ($styles > 0)
	{
	echo "<small>Style Sheets are what gives your site colours etc, you can create these in <a href=\"./pigmin.php?ses=$ses&amp;act=managestyles\">Manage Style Sheets</a>, please select a style sheet to use with this page.</small><br/>";

	$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='css'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);

	echo "<select name=\"stylesheet\">";

	while ($row)
	{

	$ssid = $row["id"];
	$sstitle = $row["title"];

	echo "<option value=\"$ssid\">$sstitle</option>";

	$row = mysql_fetch_array($result);
	}
	echo "</select><br/><b><small>Current Style: $ctitle</small></b><br/>";
	}
	else
	{

	echo "<small>You currently have no style sheets, you can create some in <a href=\"./pigmin.php?ses=$ses&amp;act=managestyles\">Manage Style Sheets</a> but you don't have to do that now if you don't want to, as the system will set the default style and you can change it you get around to it.</small><br/><br/>";

	}
	

	echo "<b>Page Title</b><br/>
	<small>This appears in the Title Bar (the very, very top) of your browser. If you link to this page from other pages, this will be the link text.</small><br/>
	<input type=\"text\" name=\"pagetitle\" maxlength=\"44\" value=\"$ptitle\"/><br/><br/>

	<b>Linking Name</b><br/>
	<small>this is how YOU will know your page, memorise it, this will be used when linking back to this page from other pages.<br/>
	You will type <u>page:$psys</u> where you want the link to appear.</small><br/>
	<input type=\"text\" name=\"sysname\" value=\"$psys\" readonly=\"yes\" maxlength=\"44\"/><br/><br/>






	<input type=\"hidden\" name=\"pagid\" value=\"$pagid\"/>
	<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
	<input type=\"hidden\" name=\"act\" value=\"editpagesettings\"/>


	<input type=\"submit\" style=\"width: 100%;\" value=\"submit changes\"/></fieldset></form>";


	echo "<p class=\"break\">



	
	$hyback <a href=\"./pigmin.php?ses=$ses&amp;act=managepages\">Manage Pages</a><br/>
	$hyback <a href=\"./pigmin.php?ses=$ses\">Mobile Web Creator</a><br/>
	$hyback <a href=\"../mainmenu.php?ses=$ses\">Main Menu</a></p></body></html>";

	}
}





///////////////////////////////////////////////





if ($act == "delpages")
{


	if ($act2 == "")
	{
	echo "<p class=\"break\"><img src=\"../scripts/phoenix.php?login=$login&amp;string=Delete%20Pages\"/></p>
	<p class=\"breakforum\" style=\"text-align: center;\"><b>Please select a page to delete.</b></p>
	<p class=\"breakforum\">";
		



	$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='page'";
	$result = mysql_query($query);
	$pages = mysql_num_rows($result);

		if ($pages > 0)
		{
		$row = mysql_fetch_array($result);

			while ($row)
			{

			$pid = $row["id"];
			$ptitle = $row["title"];
			$psys = $row["sysname"];
	
			echo "<b>$hyfor <a href=\"./pigmin.php?ses=$ses&amp;act=delpages&amp;act2=gotpage&amp;pagid=$pid\">page:$psys ($ptitle)</a></b><br/>";



			$row = mysql_fetch_array($result);
			}

			
	echo "</p><p class=\"break\">
$hyback <a href=\"./pigmin.php?ses=$ses&amp;act=managepages\">Manage Pages</a><br/>
$hyback <a href=\"./pigmin.php?ses=$ses\">Mobile Web Creator</a><br/>
	$hyback <a href=\"../mainmenu.php?ses=$ses\">Main Menu</a></p></body></html>";
	
		}

	}

	if ($act2 == "gotpage")
	{
	// edit pages!

	$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='page' and id='$pagid'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);

			$pid = $row["id"];
			$ptitle = $row["title"];
			$psys = $row["sysname"];

	$imtxt = urlencode("Really Delete $psys?");
	echo "<p class=\"break\"><img src=\"../scripts/phoenix.php?login=$login&amp;string=$imtxt\"/></p>
	<p class=\"breakforum\" style=\"text-align: center;\"><b>Page Selected: $psys.</b></p>";




	echo "<p class=\"breakforum\" style=\"text-align: center;\"><b>Are you SURE you want to delete this page??<br/>
	---<br/>
	<a href=\"./pigminsert.php?ses=$ses&amp;act=delpage&amp;pagid=$pagid\">YES! - Delete it now!</a><br/>
	<a href=\"./pigmin.php?ses=$ses&amp;act=delpages\">NO! - Let me think about it!</p>";



	echo "<p class=\"break\">$hyback <a href=\"./pigmin.php?ses=$ses&amp;act=managepages\">Manage Pages</a><br/>
	$hyback <a href=\"./pigmin.php?ses=$ses\">Mobile Web Creator</a><br/>
	$hyback <a href=\"../mainmenu.php?ses=$ses\">Main Menu</a></p></body></html>";

	}
}








//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
////EDITPAGES END

////MODULES START
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////

if ($act == "managemodules")
{



echo "<p class=\"break\"><img src=\"../scripts/phoenix.php?login=$login&amp;string=Manage%20Page%20Modules\"/></p>
<p class=\"breakforum\" style=\"text-align: center;\"><b>Page Modules add dynamic features to your site, such as Message Boards, Chatrooms, Polls, File Managers and Photo Galleries.</b></p>


<p class=\"breakforum\" style=\"text-align: center;\"><b>

<a href=\"./pigmin.php?ses=$ses&amp;act=newmodule\">Create New Module</a><br/>
---<br/>
<a href=\"./pigmin.php?ses=$ses&amp;act=editmodule\">Modify Existing Modules</a><br/>
---<br/>
<a href=\"./pigmin.php?ses=$ses&amp;act=deletemod\">Delete Modules</a>

</b></p>


<p class=\"break\">
$hyback <a href=\"./pigmin.php?ses=$ses\">Mobile Web Creator</a><br/>
$hyback <a href=\"../mainmenu.php?ses=$ses\">Main Menu</a></p></body></html>";



}





if ($act == "newmodule")
{

// does user have LOGIN module?
$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='module' and content='login'";
$result = mysql_query($query);
$modlog = mysql_num_rows($result);



// has user got pages?

$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='module'";
$result = mysql_query($query);
$totalpages = mysql_num_rows($result);




$linkiname = ($totalpages + 1);
$linkiname = "module$linkiname";


echo "<p class=\"break\"><img src=\"../scripts/phoenix.php?login=$login&amp;string=Create%20New%20Module\"/></p>
<p class=\"breakforum\" style=\"text-align: center;\"><b>Select the Module you wish to install along with some basic settings for it.<br/>
Please Note: if you wish to use Chat, Forums or other 'social' modules, you must FIRST install the Login Module!</b></p>

<form class=\"breakforum\" action=\"pigminsert.php?ses=$ses&amp;act=createmodule\" method=\"post\">
<fieldset>
<b>Select Module</b><br/>


<select name=\"module\">";

if ($modlog < 1) echo "<option value=\"login\">The Login Module</option>";

if ($modlog > 0) echo "<option value=\"chat\">Chatroom Module</option>";

echo "</select><br/><br/>


<b>Select Style Sheet</b><br/>";

$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='css'";
$result = mysql_query($query);
$styles = mysql_num_rows($result);

if ($styles > 0)
{
echo "<small>Style Sheets are what gives your site colours etc, you can create these in <a href=\"./pigmin.php?ses=$ses&amp;act=managestyles\">Manage Style Sheets</a>, please select a style sheet to use with this page.</small><br/>";

$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='css'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

echo "<select name=\"stylesheet\">";

while ($row)
{

$ssid = $row["id"];
$sstitle = $row["title"];

echo "<option value=\"$ssid\">$sstitle</option>";

$row = mysql_fetch_array($result);
}
echo "</select><br/><br/>";
}
else
{

echo "<small>You currently have no style sheets, you can create some in <a href=\"./pigmin.php?ses=$ses&amp;act=managestyles\">Manage Style Sheets</a> but you don't have to do that now if you don't want to, as the system will set the default style and you can change it you get around to it.</small><br/><br/>";

}



echo "<b>Page Title</b><br/>
<small>This appears in the Title Bar (the very, very top) of your browser. If you link to this page from other pages, this will be the link text.</small><br/>
<input type=\"text\" name=\"pagetitle\" maxlength=\"44\"/><br/><br/>

<b>Linking Name</b><br/>
<small>Once created, place the linking code anywhere on the page of your choice to display the module. very easy.<br/>
You will type <u>link:$linkiname</u> where you want the module to appear.</small><br/>
<input type=\"text\" name=\"sysname\" value=\"$linkiname\" readonly=\"yes\" maxlength=\"44\"/><br/><br/>




<input type=\"submit\" value=\"create new module\"/>

<input type=\"hidden\" name=\"act\" value=\"createmodule\"/>
<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>


</fieldset></form>";


echo "<p class=\"breakforum\">
Remember: You can create many of the same module and 'stack' them, for example, if you wanted a whole suite of chatrooms for different categories (over 18s, flirt etc) you can do so easilly.</p>
<p class=\"break\">$hyback <a href=\"./pigmin.php?ses=$ses&amp;act=managemodules\">Manage Modules</a><br/>
$hyback <a href=\"./pigmin.php?ses=$ses\">Mobile Web Creator</a><br/>
$hyback <a href=\"../mainmenu.php?ses=$ses\">Main Menu</a></p></body></html>";



}





if ($act == "editmodule")
{


	if ($act2 == "")
	{
	echo "<p class=\"break\"><img src=\"../scripts/phoenix.php?login=$login&amp;string=Modify%20Existing%20Modules\"/></p>
	<p class=\"breakforum\" style=\"text-align: center;\"><b>Please select a module to edit.</b></p>
	<p class=\"breakforum\">";
		



	$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='module'";
	$result = mysql_query($query);
	$pages = mysql_num_rows($result);

		if ($pages > 0)
		{
		$row = mysql_fetch_array($result);

			while ($row)
			{

			$mid = $row["id"];
			$ptitle = $row["title"];
			$psys = $row["sysname"];
	
			echo "<b>$hyfor <a href=\"./pigmin.php?ses=$ses&amp;act=editmodule&amp;act2=gotmod&amp;modid=$mid\">module:$psys ($ptitle)</a></b><br/>";



			$row = mysql_fetch_array($result);
			}

			
	echo "</p><p class=\"break\">$hyback <a href=\"./pigmin.php?ses=$ses&amp;act=managemodules\">Manage Modules</a><br/>
	$hyback <a href=\"./pigmin.php?ses=$ses\">Mobile Web Creator</a><br/>
	$hyback <a href=\"../mainmenu.php?ses=$ses\">Main Menu</a></p></body></html>";
	
		}

	}

	if ($act2 == "gotmod")
	{
	// edit pages!

	$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='module' and id='$modid'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);

			$pid = $row["id"];
			$ptitle = $row["title"];
			$psys = $row["sysname"];
			$pcontent = $row["content"];
			$pcss = urldecode($row["stylesheet"]);

	$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='css' and content='$pcss'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$ctitle = $row["title"];

	$imtxt = urlencode("Modify: $psys");
	echo "<p class=\"break\"><img src=\"../scripts/phoenix.php?login=$login&amp;string=$imtxt\"/></p>
	<p class=\"breakforum\" style=\"text-align: center;\"><b>Mod Selected: $psys.</b></p>";
		
	echo "<form class=\"breakforum\" action=\"./pigminsert.php?ses=$ses&amp;act=editmodule\" method=\"post\"><fieldset>
	<b>Select Style Sheet</b><br/>";

	$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='css'";
	$result = mysql_query($query);
	$styles = mysql_num_rows($result);

	if ($styles > 0)
	{
	echo "<small>Style Sheets are what gives your site colours etc, you can create these in <a href=\"./pigmin.php?ses=$ses&amp;act=managestyles\">Manage Style Sheets</a>, please select a style sheet to use with this page.</small><br/>";

	$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='css'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);

	echo "<select name=\"stylesheet\">";

	while ($row)
	{

	$ssid = $row["id"];
	$sstitle = $row["title"];

	echo "<option value=\"$ssid\">$sstitle</option>";

	$row = mysql_fetch_array($result);
	}
	echo "</select><br/><b><small>Current Style: $ctitle</small></b><br/>";
	}
	else
	{

	echo "<small>You currently have no style sheets, you can create some in <a href=\"./pigmin.php?ses=$ses&amp;act=managestyles\">Manage Style Sheets</a> but you don't have to do that now if you don't want to, as the system will set the default style and you can change it you get around to it.</small><br/><br/>";

	}


	echo "<b>Page Title</b><br/>
	<small>This appears in the Title Bar (the very, very top) of your browser. If you link to this page from other pages, this will be the link text.</small><br/>
	<input type=\"text\" name=\"pagetitle\" maxlength=\"44\" value=\"$ptitle\"/><br/><br/>

	<b>Linking Name</b><br/>
	<small>this is how YOU will know your page, memorise it, this will be used when linking back to this page from other pages.<br/>
	You will type <u>module:$psys</u> where you want the link to appear.</small><br/>
	<input type=\"text\" name=\"sysname\" value=\"$psys\" readonly=\"yes\" maxlength=\"44\"/><br/><br/>






	<input type=\"hidden\" name=\"modid\" value=\"$modid\"/>
	<input type=\"hidden\" name=\"ses\" value=\"$ses\"/>
	<input type=\"hidden\" name=\"act\" value=\"editmodule\"/>


	<input type=\"submit\" style=\"width: 100%;\" value=\"submit changes\"/></fieldset></form>";


	echo "<p class=\"break\">


	$hyback <a href=\"./pigmin.php?ses=$ses&amp;act=managemodules\">Manage Modules</a><br/>
	$hyback <a href=\"./pigmin.php?ses=$ses\">Mobile Web Creator</a><br/>
	$hyback <a href=\"../mainmenu.php?ses=$ses\">Main Menu</a></p></body></html>";

	}
}





if ($act == "deletemod")
{


	if ($act2 == "")
	{
	echo "<p class=\"break\"><img src=\"../scripts/phoenix.php?login=$login&amp;string=Delete%20Modules\"/></p>
	<p class=\"breakforum\" style=\"text-align: center;\"><b>Please select a module to delete.<br/>
	You MUST delete ALL OTHER modules before deleting the Login Module, or you will break your site!!!</b></p>
	<p class=\"breakforum\">";


// does user have LOGIN module?
$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='module'";
$result = mysql_query($query);
$modlog = mysql_num_rows($result);

if ($modlog > 1)
{
$squint = " and content!='login'";
}
else
{
}


	$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='module'$squint";
	$result = mysql_query($query);
	$pages = mysql_num_rows($result);

		if ($pages > 0)
		{
		$row = mysql_fetch_array($result);

			while ($row)
			{

			$mid = $row["id"];
			$ptitle = $row["title"];
			$psys = $row["sysname"];
	
			echo "<b>$hyfor <a href=\"./pigmin.php?ses=$ses&amp;act=deletemod&amp;act2=gotmod&amp;modid=$mid\">module:$psys ($ptitle)</a></b><br/>";



			$row = mysql_fetch_array($result);
			}

			
	echo "</p><p class=\"break\">$hyback <a href=\"./pigmin.php?ses=$ses&amp;act=managemodules\">Manage Modules</a><br/>
	$hyback <a href=\"./pigmin.php?ses=$ses\">Mobile Web Creator</a><br/>
	$hyback <a href=\"../mainmenu.php?ses=$ses\">Main Menu</a></p></body></html>";
	
		}

	}

	if ($act2 == "gotmod")
	{
	// edit pages!

	$query = "SELECT * FROM phoenix_wap where owner='$owner' and type='module' and id='$modid'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);

			$pid = $row["id"];
			$ptitle = $row["title"];
			$psys = $row["sysname"];
			$pcontent = $row["content"];
			$pcss = urldecode($row["stylesheet"]);


	$imtxt = urlencode("Really Delete $psys?");
	echo "<p class=\"break\"><img src=\"../scripts/phoenix.php?login=$login&amp;string=$imtxt\"/></p>
	<p class=\"breakforum\" style=\"text-align: center;\"><b>Mod Selected: $psys.</b></p>";
		
	echo "<p class=\"breakforum\" style=\"text-align: center;\"><b>Are you SURE you want to delete this module??<br/>
	---<br/>
	<a href=\"./pigminsert.php?ses=$ses&amp;act=delmod&amp;modid=$modid\">YES! - Delete it now!</a><br/>
	<a href=\"./pigmin.php?ses=$ses&amp;act=deletemod\">NO! - Let me think about it!</p>";


	echo "<p class=\"break\">


	$hyback <a href=\"./pigmin.php?ses=$ses&amp;act=managemodules\">Manage Modules</a><br/>
	$hyback <a href=\"./pigmin.php?ses=$ses\">Mobile Web Creator</a><br/>
	$hyback <a href=\"../mainmenu.php?ses=$ses\">Main Menu</a></p></body></html>";

	}
}

?>