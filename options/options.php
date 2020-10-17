<?php

include('../scripts/session.php');
include('../scripts/main.php');



$login = $row_ses["username"];
$mypass = $row_ses["password"];

$viz = $row_ses["visibility"];

$pmax = $row_ses["pmax"];
$tmax = $row_ses["tmax"];
$filter = $row_ses["filter"];
$sicn = $row_ses["sicn"];
$uicn = $row_ses["uicn"];
$tmax = $row_ses["tmax"];
$email = $row_ses["email"];
$place = $row_ses["place"];
$age = $row_ses["age"];
$sex = $row_ses["sex"];
$box = $row_ses["inbox"];
$cursig = $row_ses["sig"];
$curtag = $row_ses["title"];
$rship = $row_ses["relationship"];
$rname = $row_ses["realname"];
$bogc = $row_ses["bg_col"];
$trcol = $row_ses["tr_col"];
$poppers = $row_ses["poppers"];
$autorefresh = $row_ses["autorefresh"];
$txtco = $row_ses["text_col"];
$meco = $row_ses["my_color"];
$schnarf = $row_ses["schnarf_col"];
$scut = $row_ses["shortcuts"];
$myalerts = $row_ses["alerts"];
$simages = $row_ses["simages"];
$mymail = $row_ses["mymail"];
$myfriends = $row_ses["myfriends"];
$ownerstuff = $row_ses["owner"];
$chatlines = $row_ses["chatlines"];
$chatties = $row_ses["chatinvites"];

$hrone = $_POST["hrone"];
$hrtwo = $_POST["hrtwo"];

$hgone = $_POST["hgone"];
$hgtwo = $_POST["hgtwo"];	

$hbone = $_POST["hbone"];
$hbtwo = $_POST["hbtwo"];

$newcolname = $_POST["newcolname"];










function backup_tables($host,$user,$pass,$name,$tables = '*') 

{ 


  $link = mysql_connect($host,$user,$pass);

  mysql_select_db($name,$link);

  //get all of the tables 

  if($tables == '*') 

  { 

    $tables = array();

    $result = mysql_query('SHOW TABLES');

    while($row = mysql_fetch_row($result)) 
    { 
      $tables[] = $row[0];
    } 
  } 
  else 
  { 

    $tables = is_array($tables) ? $tables : explode(',',$tables);

  } 

  

  //cycle through 

  foreach($tables as $table) 

  { 

    $result = mysql_query('SELECT * FROM '.$table);

    $num_fields = mysql_num_fields($result);

    

    $return.= 'DROP TABLE '.$table.';';

    $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));

    $return.= "\n\n".$row2[1].";\n\n";

    

    for ($i = 0; $i < $num_fields; $i++) 

    { 

      while($row = mysql_fetch_row($result)) 

      { 

        $return.= 'INSERT INTO '.$table.' VALUES(';

        for($j=0; $j<$num_fields; $j++) 

        { 

          $row[$j] = addslashes($row[$j]);

          $row[$j] = ereg_replace("\n","\\n",$row[$j]);

          if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; } 

          if ($j<($num_fields-1)) { $return.= ','; } 

        } 

        $return.= ");\n";

      } 

    } 

    $return.="\n\n\n";

  } 

  
$getcwd = getcwd();


$d = date("d");
$m = date("m");
$y = date("Y");



$zipFileName = "db-backup[$d-$m-$y].zip";
$name = "db-backup[$d-$m-$y].sql";


$zip = new ZipArchive();
$opened = $zip->open( $zipFileName, ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE );
    if( $opened !== true ){
        die("cannot open {$zipFileName} for writing.");
    }
    $zip->addFromString( "$name", "$return" );
    $zip->close();

}




//################# PROFILE OPTIONS #####################################

if ($act == "access")
   	{


$query = "select profile_access from forum_users where username='$login'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$vizzy = $row["profile_access"];

if ($vizzy == "none") $vizlink = "[$vizzy] [<a href=\"./insert.php?ses=$ses&amp;act=profaccess&amp;setter=friends\">friends</a>] [<a href=\"./insert.php?ses=$ses&amp;act=profaccess&amp;setter=public\">public</a>]";
elseif ($vizzy == "friends") $vizlink = "[<a href=\"./insert.php?ses=$ses&amp;act=profaccess&amp;setter=none\">none</a>] [$vizzy] [<a href=\"./insert.php?ses=$ses&amp;act=profaccess&amp;setter=public\">public</a>]";
else $vizlink = "[<a href=\"./insert.php?ses=$ses&amp;act=profaccess&amp;setter=none\">none</a>] [<a href=\"./insert.php?ses=$ses&amp;act=profaccess&amp;setter=friends\">friends</a>] [$vizzy]";


    	echo "<p class=\"break\">
    		
    	<b>profile access</b>$inboxes</p>


	<p class=\"breakforum\" style=\"text-align: center;\">
	<b>Which level of access do you want to set for your profile?</b><br/><br/>
	$vizlink</p>
	<p class=\"break\">";

    	echo "$hyback <a href=\"./index.php?ses=$ses\">cancel</a><br/>
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}

//###################################################################

if ($act == "gallerypic")
   	{


$query = "select gallery from forum_users where username='$login'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$vizzy = $row["gallery"];



if ($vizzy == "no") $vizlink = "[leave me out] [<a href=\"./insert.php?ses=$ses&amp;act=gallerypic&amp;setter=yes\">include me</a>]";
else $vizlink = "[<a href=\"./insert.php?ses=$ses&amp;act=gallerypic&amp;setter=no\">leave me out</a>] [include me]";


    	echo "<p class=\"break\">
    		
    	<b>Members Gallery</b>$inboxes</p>


	<p class=\"breakforum\" style=\"text-align: center;\"><b>
	The members gallery is available in the main menu; all our members who have a photo &amp; wish to be included are listed there.<br/>
	If you are included in the gallery, whichever photo is set as your Profile Photo will be displayed.<br/>
	All users can choose whether or not they'd like to be included, you can make your choice below.</b><br/><br/>
	$vizlink</p>
	<p class=\"break\">";

    	echo "$hyback <a href=\"./index.php?ses=$ses\">cancel</a><br/>
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}


//###################################################################

if ($act == "mainmenu")
   	{


$query = "select menustyle from forum_users where username='$login'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$vizzy = $row["menustyle"];



if ($vizzy == "list") $vizlink = "[list style] [<a href=\"./insert.php?ses=$ses&amp;act=mainmenu&amp;setter=grid\">grid style</a>]";
else $vizlink = "[<a href=\"./insert.php?ses=$ses&amp;act=mainmenu&amp;setter=list\">list style</a>] [grid style]";


    	echo "<p class=\"break\">
    		
    	<b>Menu Layout</b>$inboxes</p>


	<p class=\"breakforum\" style=\"text-align: center;\"><b>
	Choose either a list or grid style menu.</b><br/><br/>
	$vizlink</p>
	<p class=\"break\">";

    	echo "$hyback <a href=\"./index.php?ses=$ses\">cancel</a><br/>
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}


//###################################################################




if ($act == "chunks")
   	{

    	echo "<p class=\"break\">
    		
    	<b>profile content chunks</b>$inboxes</p>
	<p class=\"breakforum\" style=\"text-align: center;\">
	<b>Your profile is made up of &quot;chunks&quot; which can be enabled or disabled so you decide what to share with your friends.<br/>
	Please select what chunks to include on your profile.</b>
	</p>

	
	<form class=\"breakforum\" style=\"text-align: center;\" action=\"insert.php?ses=$ses&amp;act=chunks\" method=\"post\">
	<fieldset>

    	<b>Comments</b><br/><select name=\"profile_comments\" class=\"textbox\" title=\"comments\">
    	<option value=\"on\">on</option>
    	<option value=\"off\">off</option>
    	</select><br/><br/>

    	<b>My Friends</b><br/><select name=\"profile_friends\" class=\"textbox\" title=\"friends\">
    	<option value=\"on\">on</option>
    	<option value=\"off\">off</option>
    	</select><br/><br/>

    	<b>My Photos</b><br/><select name=\"profile_photos\" class=\"textbox\" title=\"photos\">
    	<option value=\"on\">on</option>
    	<option value=\"off\">off</option>
    	</select><br/><br/>

    	<b>My Last 5 Topics</b><br/><select name=\"profile_lastforum\" class=\"textbox\" title=\"last 5 topics\">
    	<option value=\"on\">on</option>
    	<option value=\"off\">off</option>
    	</select><br/><br/>

    	<b>My Last 5 Blog Entries</b><br/><select name=\"profile_blog\" class=\"textbox\" title=\"last 5 blogs\">
    	<option value=\"on\">on</option>
    	<option value=\"off\">off</option>
    	</select><br/><br/>


	<input type=\"submit\" value=\"update\" class=\"buttstyle\"/>
	<input type=\"hidden\" value=\"$ses\" name=\"ses\"/></fieldset>
    	</form>
	<p class=\"break\">";

    	echo "$hyback <a href=\"./index.php?ses=$ses\">cancel</a><br/>
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}





//###################################################################









if ($act == "details")

   	{

    	echo "<p class=\"break\">My Details</b>$inboxes</p><p class=\"breakforum\" style=\"text-align: center;\"><b>
    	These details will appear on your profile, if you do not want others to see these, you can restrict or even block access to your profile.</b></p>

	<form class=\"breakforum\" action=\"insert.php?ses=$ses&amp;act=myinfo\" method=\"post\">
	<fieldset>
    	<b>Name:</b><br/>
    	<input type=\"text\" name=\"nrealname\"  class=\"textbox\" title=\"real name\" maxlength=\"100\" value=\"$rname\" /><br/>

    	<br/><b>Location:</b><br/>
    	<input type=\"text\" name=\"nplace\"  class=\"textbox\" title=\"location\" maxlength=\"150\" value=\"$place\" /><br/>";

	$query = "select posts from forum_users where username='$login'";
	$result = mysql_query($query);
	$numy = mysql_num_rows($result);
	$nur = mysql_fetch_array($result);
	$nummy = $nur["posts"];

	if ($nummy > 999)
	{
    	echo "<br/><b>My Tagline: </b>(short &amp; to the point)<br/>
    	<input type=\"text\" name=\"ntagline\"  class=\"textbox\" title=\"tag line\" maxlength=\"150\" value=\"$curtag\" /><br/>";
	}

    	echo "<br/><b>A Bit About Me: </b>(spill guts)<br/>
    	<textarea name=\"nsig\" rows=\"3\" cols=\"20\">$cursig</textarea><br/>
	
    	<br/><b>Email address: </b><small>(will not appear on your profile)</small><br/>
      	<input type=\"text\" name=\"nemail\" class=\"textbox\" title=\"email address\" maxlength=\"40\" value=\"$email\" />
    	<br/><b>Password: </b><small>(will not appear on your profile)</small><br/>
    	<input type=\"text\" name=\"npass\" class=\"textbox\" title=\"password\" maxlength=\"30\" value=\"$mypass\" /><br/>";



	echo "<input type=\"submit\" value=\"update\" class=\"buttstyle\"/>
    	</fieldset>
    	</form><p class=\"break\">";

    	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}
//###################################################################


if ($act == "gender")
   	{


    	echo "<p class=\"break\">
    	<b>select your gender</b>$inboxes</p>

	<form class=\"breakforum\" style=\"text-align: center;\" action=\"insert.php?ses=$ses&amp;fart=gender\" method=\"post\">
	<fieldset>i am <select name=\"sex\" class=\"textbox\" title=\"sex\" value=\"$sex\">
    	<option value=\"male\">male</option>
    	<option value=\"female\">female</option>
    	</select><input type=\"submit\" value=\"update\" class=\"buttstyle\"/>
    	</fieldset>
    	</form><p class=\"break\">";

	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}



//###################################################################


if ($act == "autorefresh")
   	{


if ($autorefresh == 2147483647) $autorefreshow = "turned off";
else $autorefreshow = "set to $autorefresh seconds";

    	echo "<p class=\"break\">
    	<b>auto refresh</b>$inboxes</p><p class=\"breakforum\" style=\"text-align: center;\"><b>
	Some parts of this site are refreshed automatically for your convenience, these are the Chat, Inbox &amp; The Online Users List.<br/>
	If auto refresh is set too slowly or quickly for you, it can be changed here.<br/>
	The default is 30 Seconds, you currently have it $autorefreshow.</b></p>

	<form class=\"breakforum\" style=\"text-align: center;\" action=\"insert.php?ses=$ses&amp;fart=autorefresher\" method=\"post\">
	<fieldset><select name=\"refreshrate\" class=\"textbox\" title=\"Auto Refresh\" value=\"$autorefresh\">
    	<option value=\"5\">5 Seconds</option>
    	<option value=\"10\">10 Seconds</option>
    	<option value=\"15\">15 Seconds</option>
    	<option value=\"20\">20 Seconds</option>
    	<option value=\"25\">25 Seconds</option>
    	<option value=\"30\">30 Seconds</option>
    	<option value=\"35\">35 Seconds</option>
    	<option value=\"40\">40 Seconds</option>
    	<option value=\"45\">45 Seconds</option>
    	<option value=\"50\">50 Seconds</option>
    	<option value=\"55\">55 Seconds</option>
    	<option value=\"60\">60 Seconds</option>
    	<option value=\"2147483647\">Disable Auto Refresh</option>
    	</select><input type=\"submit\" value=\"update\" class=\"buttstyle\"/>
    	</fieldset>
    	</form><p class=\"break\">";

	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}



//###################################################################


if ($act == "chatlines")
   	{

    	echo "<p class=\"break\">
    	<b>chat lines</b>$inboxes</p><p class=\"breakforum\" style=\"text-align: center;\"><b>
	You can choose how many messages you want to show in the chat, this is to allow quicker users a quicker loading chat or to stop slower users missing messages.<br/>
	The default is 40 lines, you currently have it $chatlines.</b></p>

	<form class=\"breakforum\" style=\"text-align: center;\" action=\"insert.php?ses=$ses&amp;fart=chatlines\" method=\"post\">
	<fieldset><select name=\"chatlimit\" class=\"textbox\" title=\"Chat Lines\" value=\"$chatlines\">
    	<option value=\"10\">10 Lines</option>
    	<option value=\"20\">20 Lines</option>
    	<option value=\"30\">30 Lines</option>
	<option value=\"40\">40 Lines</option>
    	<option value=\"50\">50 Lines</option>
    	<option value=\"60\">60 Lines</option>
    	<option value=\"70\">70 Lines</option>
    	<option value=\"80\">80 Lines</option>
	<option value=\"90\">90 Lines</option>
    	<option value=\"100\">100 Lines</option>
    	</select><input type=\"submit\" value=\"update\" class=\"buttstyle\"/>
    	</fieldset>
    	</form><p class=\"break\">";

	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}

//###################################################################


if ($act == "dateofbirth")
   	{


    	echo "<p class=\"break\">
    	<b>set your date of birth</b>$inboxes</p><p class=\"breakforum\" style=\"text-align: center;\"><b>
	Your date of birth is used only to determine your age in years and to work out what day your birthday is on, it will never be disclosed and cannot be seen by any other user.</b></p>

	<form class=\"breakforum\" style=\"text-align: center;\" action=\"insert.php?ses=$ses&amp;fart=dateofbirth\" method=\"post\">
	<fieldset><select name=\"ddmy\" class=\"textbox\" title=\"day\" value=\"$brd\">";
	for( $i=1; $i<=31; $i++ )
	{
	echo "<option value=\"$i\">$i</option>";
	}
    	echo "</select>
	<select name=\"mdmy\" class=\"textbox\" title=\"day\" value=\"$brm\">";
	for( $i=1; $i<=12; $i++ )
	{
	echo "<option value=\"$i\">$i</option>";
	}
    	echo "</select>
	
	<select name=\"ydmy\" class=\"textbox\" title=\"day\" value=\"$bry\">";
	$ydmylimit =  (date("Y") - 18);

	for( $i=$ydmylimit; $i>1930; $i-- )
	{
	echo "<option value=\"$i\">$i</option>";
	}


    	echo "</select><br/><input type=\"submit\" value=\"update\" class=\"buttstyle\"/>
    	</fieldset>
    	</form><p class=\"break\">";

	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}
//###################################################################


if ($act == "partnership")
   	{


    	echo "<p class=\"break\">
    	<b>update your relationship status</b>$inboxes</p>

	<form class=\"breakforum\" style=\"text-align: center;\" action=\"insert.php?ses=$ses&amp;fart=partnership\" method=\"post\">
	<fieldset>i am <select name=\"nrelationship\" class=\"textbox\" title=\"relationship status\">
    	<option value=\"single\">single</option>
    	<option value=\"attached\">attached</option>
    	</select><input type=\"submit\" value=\"update\" class=\"buttstyle\"/>
    	</fieldset>
    	</form><p class=\"break\">";

	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}
//###################################################################


if ($act == "fontsize")
   	{


    	echo "<p class=\"break\">
    	<b>change size of screen fonts</b>$inboxes</p>

	<form class=\"breakforum\" style=\"text-align: center;\" action=\"insert.php?ses=$ses&amp;fart=fontsize\" method=\"post\">
	<fieldset><b>You can change the size of text on the screen, for example if you are on a pc or laptop you might prefer <big>larger</big> text, or if you are on your phone you might want to have <small>smaller</small> text.<br/><br/>
	<b>Font Size</b><br/><select name=\"fsize\" class=\"textbox\" title=\"relationship status\">
    	<option value=\"small\">small</option>
    	<option value=\"normal\">normal</option>
    	<option value=\"large\">large</option>
    	</select><br/><input type=\"submit\" value=\"update\" class=\"buttstyle\"/>
    	</fieldset>
    	</form><p class=\"break\">";

	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}


//###################################################################


if ($act == "mailboxoff")
   	{



if ($mymail == "on") $msg = "all messages";
if ($mymail == "off") $msg = "no messages";
if ($mymail == "bud") $msg = "only messages from friends";



    	echo "<p class=\"break\">
    	<b>mailbox filter</b>$inboxes</p><p class=\"breakforum\" style=\"text-align: center;\">
	<b>choose whether to accept or reject messages.<br/>
	<i>you are currently accepting $msg</i></b>

	<form class=\"breakforum\" style=\"text-align: center;\" action=\"insert.php?ses=$ses&amp;fart=mailboxoff\" method=\"post\">
	<fieldset>
    	Accept From 
	<select name=\"ubox\" title=\"mailbox filter\" class=\"textbox\" value=\"$mymail\">
    	<option value=\"on\">everyone</option>
    	<option value=\"bud\">friends only</option>
    	<option value=\"off\">nobody</option>";

    	echo "</select> <input type=\"submit\" value=\"update\" class=\"buttstyle\"/>
    	</fieldset>
    	</form><p class=\"break\">";

	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}


//###################################################################


if ($act == "poppers")
   	{



if ($poppers == "yes") $msg = "all pop messages";
if ($poppers == "no") $msg = "no pop messages";
if ($poppers == "bud") $msg = "only pop messages from friends";



    	echo "<p class=\"break\">
    	<b>pop messages</b>$inboxes</p><p class=\"breakforum\" style=\"text-align: center;\">
	<b>Pop messages are a convenient way to have a quick conversation, however, we know that they could get annoying, that's why you have the option to stop receiving them altogether or only allow your friends to send you pops.<br/>
	<i>you are currently accepting $msg</i></b>

	<form class=\"breakforum\" style=\"text-align: center;\" action=\"insert.php?ses=$ses&amp;fart=poppers\" method=\"post\">
	<fieldset>
    	Accept From 
	<select name=\"setter\" title=\"mailbox filter\" class=\"textbox\" value=\"$mymail\">
    	<option value=\"yes\">everyone</option>
    	<option value=\"bud\">friends only</option>
    	<option value=\"no\">nobody</option>";

    	echo "</select> <input type=\"submit\" value=\"update\" class=\"buttstyle\"/>
    	</fieldset>
    	</form><p class=\"break\">";

	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}

//###################################################################


if ($act == "inbox")
	{

    	echo "<p class=\"break\">";


    	echo "<b>new message notification</b>$inboxes</p><p class=\"breakforum\" style=\"text-align: center;\">";

if ($box == "1") echo "<b>message notification active</b><br/><a href=\"./insert.php?ses=$ses&amp;off=yes&amp;fart=inboxes\" title=\"go\">turn it off?</a><br/>";

if ($box == "0") echo "<b>message notification inacttive</b><br/><a href=\"./insert.php?ses=$ses&amp;on=yes&amp;fart=inboxes\" title=\"go\">turn it on?</a><br/>";


    	echo "</p><p class=\"break\">$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}



//###################################################################


if ($act == "chatinvites")
   	{


if ($chatties == "on") $msg = "all chat invites";
if ($chatties == "off") $msg = "no chat invites";
if ($chatties == "bud") $msg = "only chat invites sent by friends";


    	echo "<p class=\"break\">
	
    	<b>Invites to Chatrooms</b>$inboxes</p>
    	<p class=\"breakforum\" style=\"text-align: center;\"><b>Decide if you want to recieve invites to chat from other users.<br/>
	You currently accept $msg</b></p>

	<form class=\"breakforum\" style=\"text-align: center;\" action=\"insert.php?ses=$ses&amp;act=chatinvites\" method=\"post\">
	<fieldset>

	<select name=\"inviteset\" class=\"textbox\" title=\"max per page\">";

	echo "<option value=\"on\">Accept All</option>";
	echo "<option value=\"bud\">Friends Only</option>";
	echo "<option value=\"off\">Accept None</option>";

    	echo "</select><br/>";

    	echo "<input type=\"submit\" value=\"update\" class=\"buttstyle\"/>
	<input type=\"hidden\" name=\"act\" value=\"chatinvites\"/>
    	
    	</fieldset></form><p class=\"break\">";

    	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}




//###################################################################

if ($act == "matesoff")
   	{



if ($myfriends == "on") $msg = "accepting requests";
if ($myfriends == "off") $msg = "not accepting requests";



    	echo "<p class=\"break\">
    	<b>friends list</b>$inboxes</p><p class=\"breakforum\" style=\"text-align: center;\">
	<b>decide whether you want to recieve friends requests or not.<br/><br/>
	<i>you are currently $msg</i></b>


	<form class=\"breakforum\" style=\"text-align: center;\" action=\"insert.php?ses=$ses&amp;act=matesoff\" method=\"post\">
	<fieldset>
    	<b>Accept Requests?</b><br/>
	<select name=\"ubox\" title=\"friends list\" class=\"textbox\" value=\"$myfriends\">
    	<option value=\"on\">yes</option>
    	<option value=\"off\">no</option>";

    	echo "</select><br/><input type=\"submit\" value=\"update\" class=\"buttstyle\"/>
    	</fieldset>
    	</form><p class=\"break\">";

	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}




//###################################################################


if ($act == "twat")

   	{
    	echo "<p class=\"break\">";


    	echo "<b>Ignore</b>$inboxes</p><p class=\"breakforum\" style=\"text-align: center;\">
	<b>You can type in the name of someone you wish to ignore on this page, however, an easier option would be to click on the user's profile instead.<br/><br/>
	An ignored user will be blocked from talking to you, you will be unable to see their topics or their profile, they'll be unable to see you either.</b></p>

	<form class=\"breakforum\" style=\"text-align: center;\" action=\"./insert.php?ses=$ses&amp;act=twat\" method=\"post\">
	<fieldset>
    	<b>username </b>
    	<input type=\"text\" name=\"nusername\" maxlength=\"50\" class=\"textbox\" title=\"username\" /> ";

    	echo "<input type=\"submit\" value=\"ignore\" class=\"buttstyle\"/>
    	</fieldset>

    	</form>
	<p class=\"breakforum\" style=\"text-align: center;\"><b>Click <a href=\"./options.php?ses=$ses&amp;act=gimplister\">here</a> to view a list of people you are currently ignoring.</b><p class=\"break\">";
    	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}



//###################################################################


if ($act == "gimplister")
{




echo "<p class=\"break\">";

$query = "SELECT count(*) from ignorance where login='$login'";
$result = mysql_query ("$query");
$row = mysql_fetch_array($result);
$count = $row[0];

if ($count < 1) $meefer = "<b>You aren't currently ignoring anyone!</b></p>";
else $meefer = "<b>You can review blocked users here, it might be a boon to check their profile first.</b></p>";

echo "<b>ignore list</b>$inboxes</p><p class=\"breakforum\" style=\"text-align: center;\">";



echo "$meefer";

	$query = "select * from ignorance where login='$login'";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);




	while ($row)
           
		{
		$name = $row["ignored"];
		echo "<p class=\"breakforum\" style=\"text-align: center;\">
		<a href=\"../profile.php?ses=$ses&amp;user=$name\">$name</a><br/><a href=\"insert.php?ses=$ses&amp;act=notwat&amp;nusername=$name\">remove from list?</a></p>";
           		$row = mysql_fetch_array($result);
           		}
echo "<p class=\"break\">$hyback <a href=\"./options.php?ses=$ses&amp;sad=twat\">back</a>";
echo "<br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
exit;

}


//###################################################################




if ($act=="twatpreset")

   	{
    	echo "<p class=\"break\">";


    	echo "<b>Ignore</b>$inboxes</p><p class=\"breakforum\" style=\"text-align: center;\">ignore $nusername?</p>
	<p class=\"breakforum\" style=\"text-align: center;\">
	Please confirm that you wish to block $nusername</p>
	<p class=\"breakforum\" style=\"text-align: center;\">

<a href=\"./insert.php?ses=$ses&amp;act=twat&amp;nusername=$nusername\">do it</a><br/>---<br/>
<a href=\"../profile.php?ses=$ses&amp;user=$nusername\">no, go back</a></p><p class=\"break\">";


    	echo "$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}



//###################################################################
if ($act == "applytheme")
{

echo "<p class=\"break\">";


echo "<b>change theme</b>$inboxes</p>
<p class=\"breakforum\" style=\"text-align: center;\"><b>
select a different colour scheme for the site to appear in.<br/>
To return to the default colours (like it was when you signed up) please select the theme called &quot;Standard&quot;.</b></p>";

$query = "select * from phoenix_themes order by my_color asc";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);



while ($row)
	{
	$naa = $row["title"];
	$id = $row["id"];
	$hex = $row["bg_col"];
	$bogc = $row["bg_col"];
	$trcol = $row["tr_col"];
	$txtco = $row["text_col"];
	$meco = $row["my_color"];
	$schnarf = $row["schnarf_col"];

	$naa = ucfirst("$naa");	

echo "<p style=\"border-style: solid;
padding: 0px;
margin: 2px;
color: $bogc;
border-width: 2px;
background-color: $txtco;
border-top-color: $schnarf;
border-left-color: $schnarf;
border-right-color: $trcol;
border-bottom-color: $trcol;
text-align: center;
font-family: $fontfamily;
font-weight: bold;\"><a style=\"color: $meco; line-height: 150%;\" href=\"./insert.php?ses=$ses&amp;act=setheme&amp;id=$id\">$naa</a></p>";


           $row = mysql_fetch_array($result);
           }


echo "
<p class=\"break\">$hyback <a href=\"./index.php?ses=$ses\">cancel</a><br/>
$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";

exit;

}


//###################################################################


if ($act == "open")

   	{


	$query = "select * from welcome";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);
	$msg = $row["msg"];
	$msg = make_wml_compat($msg);

    	echo "<p class=\"break\">
    	<b>welcome message$inboxes</b></p><p class=\"breakforum\" style=\"text-align: center;\">
	This is the welcome message that appears on the front page.<br/>
	Please be careful not to add too many animations as this may cause users to be unable to log in.</p>
	<form class=\"breakforum\" style=\"text-align: center;\" action=\"./insert.php?ses=$ses&amp;act=welcome\" method=\"post\">
	<fieldset>welcome message:<br/>
	<textarea name=\"msg\" rows=\"3\" cols=\"20\">$msg</textarea><br/>";

    	echo "<input type=\"submit\" value=\"update\" class=\"buttstyle\"/>
    	</fieldset>
    	</form><p class=\"break\">";

    	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}
///////##################################################################################################################
///////			END USER OPTIONS
///////			BEGIN ADMIN OPTIONS
///////##################################################################################################################


if ($group < 2)
{


	if ($act == "bannedlister")
	{

	if (empty($page) || ($page < 1)) $page = 1; $max = 8;  $start = ($page-1) * $max;



	$query = "SELECT count(*) from forum_users WHERE ban_status=1";
	$result =mysql_query($query);
	$row2 =mysql_fetch_array($result);
	$count = $row2[0];

	$query = "SELECT * from forum_users where ban_status=1 LIMIT $start, $max";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);


	if ($count == 1) $users = "just one banned user";
	elseif ($count == 0) $users = "no banned users";
	elseif ($count >= 2) $users = "$count banned users";

echo "<p class=\"break\">
<b>banned users</b>$inboxes</p><p class=\"breakforum\" style=\"text-align: center;\">
$users</p>";

if ($count > 0) echo "";

while ($row)
      	{
       	$name = $row["username"];
       	echo "<p class=\"breakforum\" style=\"text-align: center;\">$name<br/>";
	if ($group < 3) echo "<a href=\"./options.php?ses=$ses&amp;act=lookatban&amp;name=$name\">[view details]</a></p>";

       	$row = mysql_fetch_array($result);
      	}



echo "<p class=\"break\">
$hyback <a href=\"./index.php?ses=$ses\">back</a><br/>
$hyback <a href=\"../../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
exit;


}




//###################################################################



if ($act == "lookatban")

   	{
	$query = "select * from forum_users where username='$name'";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);
	$name = $row["username"];
	$email = $row["email"];
	$agent = $row["agent"];
	$subno = $row["subno"];
	$killer = $row["ban_by"];

	echo "<p class=\"break\">$name<br/>$inboxes</p><p class=\"breakforum\" style=\"text-align: center;\">
	<b>email address:</b><br/>$email
	<br/><b>phone/browser:</b><br/>$agent
	<br/><b>I.P. address or host name:</b><br/>$subno
	<br/><b>banned by:</b><br/>$killer<br/>";
    	echo "<br/>";



	echo "<b>$hyl <a href=\"./insert.php?ses=$ses&amp;act=unbanhuman&amp;name=$name\">lift the ban?</a> $hyl</b>";

	echo "</p><p class=\"break\">";

	echo "$hyback <a href=\"./options.php?ses=$ses&amp;act=bannedlister\">ban list</a><br/>
	$hyback <a href=\"./index.php?ses=$ses\">options</a><br/>
	$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}




//###################################################################

if ($act == "adbomb")

   	{

    	echo "<p class=\"break\">";

	
    	echo "<b>mail bomb</b>$inboxes</p>
    	<p class=\"breakforum\" style=\"text-align: center;\">send a message to all valid users</p>

	<form class=\"breakforum\" action=\"insert.php?ses=$ses&amp;act=adbomb\" method=\"post\">
	<fieldset>
	subject:<br/>
    	<input type=\"text\" name=\"subject\" class=\"textbox\" />
	<br/>message:<br/>
    	<textarea name=\"msg\" rows=\"3\" cols=\"20\"></textarea><br/>

	<input type=\"submit\" value=\"send\" class=\"buttstyle\"/>
    	</fieldset>
    	</form><p class=\"break\">";

    	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}


//###################################################################


if ($act == "open2")

   	{


	$query = "select * from welcome";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);
	$msg = $row["logintext"];



    	echo "<p class=\"break\">
    	<b>alter the welcome message$inboxes</b></p><p class=\"breakforum\" style=\"text-align: center;\">
	<b>This is the very first thing a user sees when they log in.<br/><br/>Please always try to include a line similar to the following:<br/><i>&quot;bookmark this page for easy login&quot;</i><br/>Finally, i'd like to ask that spelling and punctuation be top notch, i need excellent grammar, no short words &amp; no letter substitutions.</b></p>
	<form class=\"breakforum\" style=\"text-align: center;\" action=\"./insert.php?ses=$ses&amp;act=welcome2\" method=\"post\">
	<fieldset>welcome message:<br/>
    	<textarea name=\"msg\" rows=\"3\" cols=\"20\">$msg</textarea><br/>";

    	echo "<input type=\"submit\" value=\"update\" class=\"buttstyle\"/>
    	</fieldset>
    	</form><p class=\"break\">";

    	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}
//###################################################################

if ($act == "adtopics")

   	{
    	echo "<p class=\"break\">
    	<b>delete a user's posts</b>$inboxes</p><p class=\"breakforum\" style=\"text-align: center;\">
	this will delete posts and replies by the specified user and users with the same name prefix, i.e. typing guest will delete guest-user etc but not special-guest.</p>

	<form class=\"breakforum\" style=\"text-align: center;\" action=\"insert.php?ses=$ses&amp;act=adtopics\" method=\"post\">
    	username:<br/>
	<fieldset>
    	<input type=\"text\" name=\"nusername\" class=\"textbox\" title=\"username\" maxlength=\"50\" /><br/>";

    	echo "<input type=\"submit\" value=\"update\" class=\"buttstyle\"/>
    	</fieldset>
    	</form><p class=\"break\">";


    	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}

}
else
{


    	echo "<p class=\"break\">";

	
    	echo "<b>Sorry!</b>$inboxes</p>
    	<p class=\"breakforum\" style=\"text-align: center;\"><b>You aren't supposed to be in here.<br/>
	This is the admin options section.<br/>You know i log everything, right?<br/><br/>
	You can go now, but don't let me catch you fucking around in here again ok? unless of course you are admin, in which case you might want to send me a message about it quoting Line 934, thanks!</b></p><p class=\"break\">";

    	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   
}


///////##################################################################################################################
///////			END ADMIN OPTIONS
///////			BEGIN OWNER OPTIONS
///////##################################################################################################################


if ($group < 2 && $ownerstuff == "yes")
{


if ($act == "ownershit")

   	{
    	echo "<p class=\"break\">";


    	echo "<b>site ownership</b>$inboxes</p><p class=\"breakforum\" style=\"text-align: center;\">
	Assign full site ownership to a user.</p>
	<form class=\"breakforum\" style=\"text-align: center;\" action=\"./insert.php?ses=$ses&amp;act=ownershit\" method=\"post\">
    	<b>username<br/></b>
	<fieldset>
    	<input type=\"text\" name=\"nusername\" maxlength=\"50\" class=\"textbox\" title=\"username\"/><br/>
	<select name=\"adownershit\" class=\"textbox\" title=\"ownership status\" value=\"$adownershit\">
    	<option value=\"yes\">yes</option>
    	<option value=\"no\">no</option>
    	</select><br/>";
    	echo "<input type=\"submit\" value=\"update\" class=\"buttstyle\"/>
    	</fieldset>
    	</form><p class=\"break\">";
    	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}




//###################################################################







if ($act == "sitename")
   	{
	$query = "select * from welcome";
	$result = mysql_query($query);
	$num_rows = mysql_num_rows($result);
	$row = mysql_fetch_array($result);
	$curr = $row["snames"];

	$curr = make_wml_compat("$curr");


    	echo "<p class=\"break\">

    	<big>site name</big>$inboxes</p><p class=\"breakforum\" style=\"text-align: center;\">
	Set the name of the site as it appears on pagetop titles and other places around the site</p>
	<form class=\"breakforum\" style=\"text-align: center;\" action=\"insert.php?ses=$ses&amp;act=sitename\" method=\"post\">
    	<fieldset>
	<input type=\"text\" name=\"nsitename\" class=\"textbox\" title=\"site name\" value=\"$curr\" maxlength=\"35\" /><br/>";

    	echo "<input type=\"submit\" value=\"update\" class=\"buttstyle\"/>
    	</fieldset>
    	</form><p class=\"break\">";

    	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}




//###################################################################



if ($act == "adonoff")
   	{

$query = "select * from welcome";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);
$usi = $row["signup"];


if ($usi == "on") $msg = "you are currently allowing all users to gain entry.";
if ($usi == "off") $msg = "you are currently accepting no new signups.";
if ($usi == "val") $msg = "you are currently allowing users to gain entry once validated by email.";

    	echo "<p class=\"break\">
    	<b>signup switch</b>$inboxes</p><p class=\"breakforum\" style=\"text-align: center;\">
	<i>$msg</i>

	<form class=\"breakforum\" style=\"text-align: center;\" action=\"insert.php?ses=$ses&amp;act=adonoff\" method=\"post\">
	<fieldset>
    	<select name=\"usignup\" title=\"user signup\" class=\"textbox\" value=\"$usi\">
    	<option value=\"on\">open signup</option>
    	<option value=\"val\">validation</option>
    	<option value=\"off\">closed</option>";

    	echo "</select><br/><input type=\"submit\" value=\"update\" class=\"buttstyle\"/>
    	</fieldset>
    	</form><p class=\"break\">";

	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}



//###################################################################



if ($act == "chatonoff")
   	{

$query = "select * from welcome";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);
$usi = $row["chat"];


if ($usi == "on") $msg = "chat is currently active.";
if ($usi == "off") $msg = "chat is currently inactive.";

    	echo "<p class=\"break\">
    	<b>chat switch</b>$inboxes</p><p class=\"breakforum\" style=\"text-align: center;\">
	<i>$msg</i>

	<form class=\"breakforum\" style=\"text-align: center;\" action=\"insert.php?ses=$ses&amp;act=chatonoff\" method=\"post\">
	<fieldset>
    	<select name=\"uchat\" title=\"chat switch\" class=\"textbox\" value=\"$usi\">
    	<option value=\"on\">turn chat on</option>
    	<option value=\"off\">turn chat off</option>";

    	echo "</select><br/><input type=\"submit\" value=\"update\" class=\"buttstyle\"/>
    	</fieldset>
    	</form><p class=\"break\">";

	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}



//###################################################################



if ($act == "adintervality")

   	{
    	echo "<p class=\"break\">
    	<b>set online interval</b>$inboxes</p>
	<form class=\"breakforum\" style=\"text-align: center;\" action=\"./insert.php?ses=$ses&amp;act=adintervality\" method=\"post\">
	<fieldset>
    	users will appear online until they have been idle for<br/><input type=\"text\" name=\"interv\" class=\"textbox\" value=\"$interval\" title=\"interval\" maxlength=\"3\" /><br/>minutes";

    	echo "<br/><input type=\"submit\" value=\"ok!\" class=\"buttstyle\"/><br/>";
    	echo "</fieldset></form><p class=\"break\">";
    	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}





//###################################################################

if ($act == "adaddforum")

   	{
    	echo "<p class=\"break\">";
    	echo "<b>add new forums</b>$inboxes</p>

	<form class=\"breakforum\"  action=\"./insert.php?ses=$ses&amp;act=adaddforum\" method=\"post\">
	<fieldset>

    	<b>Forum Friendly Name:</b><br/>this appears on links to forums, spaces are allowed but Character Entities must be used for symbols to keep it web-safe.<br/>
    	<input type=\"text\" name=\"nforname\" class=\"textbox\" title=\"forum name\" /><br/>
   	<b>Category:</b><br/>
	<select name=\"getcat\">";



$queryc = "select * from phoenix_forums where type='category'";
$resultc = mysql_query($queryc);
$num_rowsc = mysql_num_rows($resultc);
$rowc = mysql_fetch_array($resultc);


while ($rowc)
	{
$catty = $rowc["category"];	
$fcatty = $rowc["catfriendly"];	
	
echo "<option value=\"$catty\">$fcatty</option>";


           $rowc = mysql_fetch_array($resultc);
           }


    	echo "</select><br/>

    	<b>Forum System Name:</b><br/>this cannot contain spaces or symbols!<br/>
    	<input type=\"text\" name=\"nforum\" maxlength=\"50\" class=\"textbox\" title=\"system name\" /><br/>";

    	echo "<input type=\"submit\" value=\"add\" class=\"buttstyle\"/>
    	</fieldset>
    	</form><p class=\"break\">";
    	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}

//###################################################################

if ($act == "adaddcategory")

   	{
    	echo "<p class=\"break\">";
    	echo "<b>add new forum category</b>$inboxes</p>

	<form class=\"breakforum\"  action=\"./insert.php?ses=$ses&amp;act=adaddcategory\" method=\"post\">
	<fieldset>
    	<b>Category Friendly Name:</b><br/>this appears on links to forums, spaces are allowed but Character Entities must be used for symbols to keep it web-safe.<br/>
    	<input type=\"text\" name=\"catfriendlyn\" class=\"textbox\" title=\"forum name\" /><br/>

    	<b>Category System Name:</b><br/>this cannot contain spaces or symbols!<br/>
    	<input type=\"text\" name=\"catsystemn\" maxlength=\"50\" class=\"textbox\" title=\"system name\" /><br/>

    	<input type=\"submit\" value=\"add\" class=\"buttstyle\"/>
    	</fieldset>
    	</form><p class=\"break\">";
    	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}

//###################################################################







if ($act == "adeditforums")
{

echo "<p class=\"break\">";


echo "<b>edit forums</b>$inboxes</p>";

$query = "select * from phoenix_forums where type='forum' AND forum!='adminx1' ORDER BY category ASC";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);


while ($row)
	{
$name = $row["name"];
$id = $row["id"];	
$catr = $row["catfriendly"];		
echo "<p class=\"breakforum\" style=\"text-align: center;\"><a href=\"./options.php?ses=$ses&amp;act=editforum&amp;id=$id\">$name</a><small><b>(cat: $catr)</b></small></p>";


           $row = mysql_fetch_array($result);
           }

    	echo "<p class=\"break\">$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
}







//###################################################################

if ($act == "editforum")

   	{

$id = $_GET["id"];


$query = "select * from phoenix_forums where id='$id'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

$sname = $row["forum"];
$sxname = $row["forum"];
$fname = $row["name"];
$fid = $row["id"];

    	echo "<p class=\"break\">";
    	echo "<b>edit a forum</b>$inboxes</p>

	<form class=\"breakforum\"  action=\"./insert.php?ses=$ses&amp;act=changeforum\" method=\"post\">
	<fieldset>
    	<b>Friendly Name:</b><br/>
    	<input type=\"text\" name=\"forumfriendlyname\" maxlength=\"100\" class=\"textbox\" value=\"$fname\" /><br/>
   	<b>Category:</b><br/>
	<select name=\"forumcategory\">";



$queryc = "select * from phoenix_forums where type='category'";
$resultc = mysql_query($queryc);
$num_rowsc = mysql_num_rows($resultc);
$rowc = mysql_fetch_array($resultc);


while ($rowc)
	{
$catty = $rowc["category"];	
$fcatty = $rowc["catfriendly"];	
	
echo "<option value=\"$catty\">$fcatty</option>";


           $rowc = mysql_fetch_array($resultc);
           }


    	echo "</select><br/>
	<b>Forum System Name:</b><br/>
    	<input type=\"text\" name=\"forumsystemname\" class=\"textbox\" value=\"$sname\"/><br/>
    	<input type=\"hidden\" name=\"fid\" value=\"$fid\"/>
    	<input type=\"hidden\" name=\"old\" value=\"$sxname\"/>
    	<input type=\"submit\" value=\"change it\" class=\"buttstyle\"/>
    	</fieldset>
    	</form><p class=\"break\">";
    	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}


//###################################################################

if ($act == "changeusername")

   	{
    	echo "<p class=\"break\">";
    	echo "<b>change a username</b>$inboxes</p>

	<form class=\"breakforum\"  action=\"./insert.php?ses=$ses&amp;act=changeusername\" method=\"post\">
	<fieldset>
    	<b>Old Name:</b><br/>
    	<input type=\"text\" name=\"oldname\" maxlength=\"50\" class=\"textbox\" /><br/>

    	<b>New Name:</b><br/>
    	<input type=\"text\" name=\"newname\" class=\"textbox\" /><br/>";

    	echo "<input type=\"submit\" value=\"change it\" class=\"buttstyle\"/>
    	</fieldset>
    	</form><p class=\"break\">";
    	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}
//###################################################################







if ($act == "adelforums")
{

echo "<p class=\"break\">";


echo "<b>delete forums</b>$inboxes</p>";

$query = "select * from phoenix_forums where required='no' AND type='forum'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);


while ($row)
	{
$name = $row["name"];
$id = $row["id"];	
$catr = $row["catfriendly"];	
echo "<p class=\"breakforum\" style=\"text-align: center;\"><a href=\"./insert.php?ses=$ses&amp;act=adelforum&amp;id=$id\">$name</a><small><b>(cat: $catr)</b></small></p>";


           $row = mysql_fetch_array($result);
           }

    	echo "<p class=\"break\">$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
}


//###################################################################







if ($act == "adelcategory")
{

echo "<p class=\"break\">";


echo "<b>delete forum categories</b>$inboxes</p>";

$query = "select * from phoenix_forums where type='category'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);


while ($row)
	{
   $name = $row["catfriendly"];
$id = $row["id"];		
echo "<p class=\"breakforum\" style=\"text-align: center;\"><a href=\"./insert.php?ses=$ses&amp;act=adelcategory&amp;id=$id\">$name</a></p>";


           $row = mysql_fetch_array($result);
           }

    	echo "<p class=\"break\">$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
}


//###################################################################



if ($act == "adsponsordel")
{

echo "<p class=\"break\">";


echo "<b>delete sponsored links</b>$inboxes</p>";

$query = "select * from sponsors";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);


while ($row)
	{
   $name = $row["name"];
   $id = $row["id"];
			
echo "<p class=\"breakforum\" style=\"text-align: center;\"><a href=\"./insert.php?ses=$ses&amp;act=adsponsordel&amp;id=$id\">$name</a></p>";


           $row = mysql_fetch_array($result);
           }

    	echo "<p class=\"break\">$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
}

//###################################################################



if ($act == "adsponsordel2")
{

echo "<p class=\"break\">";


echo "<b>delete toplist links</b>$inboxes</p>";

$query = "select * from toplists";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);


while ($row)
	{
   $name = $row["name"];
   $id = $row["id"];
			
echo "<p class=\"breakforum\" style=\"text-align: center;\"><a href=\"./insert.php?ses=$ses&amp;act=adsponsordel2&amp;id=$id\">$name</a></p>";


           $row = mysql_fetch_array($result);
           }

    	echo "<p class=\"break\">$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
}


//###################################################################



if ($act == "adtitledel")
{

echo "<p class=\"break\">";


echo "<b>delete member titles</b>$inboxes</p>";

$query = "select * from membertitles";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);


while ($row)
	{
   $titty = $row["title"];
   $possy = $row["postcount"];
   $id = $row["id"];
			
echo "<p class=\"breakforum\" style=\"text-align: center;\"><a href=\"./insert.php?ses=$ses&amp;act=adtitledel&amp;id=$id\">$titty</a><small>[Score Required: $possy]</small></p>";


           $row = mysql_fetch_array($result);
           }

    	echo "<p class=\"break\">$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
}





//###################################################################



if ($act == "adsponsorshit")

   	{

    	echo "<p class=\"break\">";

	
    	echo "<b>add sponsored links</b>$inboxes</p>
    	<p class=\"breakforum\" style=\"text-align: center;\">Sponsors are people who link to us, this is how we link back to them. These are displayed on the main page.</p>

	<form class=\"breakforum\" action=\"insert.php?ses=$ses&amp;act=adsponsorshit\" method=\"post\">
	<fieldset>
	link title:<br/>
    	<input type=\"text\" name=\"nname\" class=\"textbox\" title=\"link name\" value=\"$nkeywords\" maxlength=\"255\" />
	<br/>address:<br/>
    	<input type=\"text\" name=\"nurl\" class=\"textbox\" title=\"url\" value=\"$ndescription\" maxlength=\"255\" />

	<input type=\"submit\" value=\"update\" class=\"buttstyle\"/>
    	</fieldset>
    	</form><p class=\"break\">";

    	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}

//###################################################################



if ($act == "adsponsorshit2")

   	{

    	echo "<p class=\"break\">";

	
    	echo "<b>add toplist links</b>$inboxes</p>
    	<p class=\"breakforum\" style=\"text-align: center;\">Toplist sites are shitty sites i sign up with and have to place their link on my site, i entertain it to get hits. These are displayed on the main page.</p>

	<form class=\"breakforum\" action=\"insert.php?ses=$ses&amp;act=adsponsorshit2\" method=\"post\">
	<fieldset>
	link title:<br/>
    	<input type=\"text\" name=\"nname\" class=\"textbox\" title=\"link name\" value=\"$nkeywords\" maxlength=\"255\" />
	<br/>address:<br/>
    	<input type=\"text\" name=\"nurl\" class=\"textbox\" title=\"url\" value=\"$ndescription\" maxlength=\"255\" />

	<input type=\"submit\" value=\"update\" class=\"buttstyle\"/>
    	</fieldset>
    	</form><p class=\"break\">";

    	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}

//###################################################################

if ($act == "membertitles")

   	{

    	echo "<p class=\"break\">";

	
    	echo "<b>add member titles</b>$inboxes</p>
    	<p class=\"breakforum\" style=\"text-align: center;\">member titles are attained when a user reaches a certain score.</p>

	<form class=\"breakforum\" action=\"insert.php?ses=$ses&amp;act=admembertitles\" method=\"post\">
	<fieldset>
	title:<br/>
    	<input type=\"text\" name=\"ntit\" class=\"textbox\" maxlength=\"255\" />
	<br/>required score:<br/>
    	<input type=\"text\" name=\"npos\" class=\"textbox\" maxlength=\"255\" />

	<br/><input type=\"submit\" value=\"update\" class=\"buttstyle\"/>
    	</fieldset>
    	</form><p class=\"break\">";

    	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}



//###################################################################


if ($act == "addshortcut")

   	{

    	echo "<p class=\"break\">";

	
    	echo "<b>add shortcuts</b>$inboxes</p>
    	<p class=\"breakforum\" style=\"text-align: center;\"><b>you must link to the path of the shortcut relative to the site root, so if you wanted to link to</b><br/>
<i>phoenixbytes.co.uk/chat/index.php</i>
<br/><b>then your shortcut url will be</b><br/><i>chat/index.php</i><br/>
<b>before creating a shortcut, bookmark the desired page, test bookmark when done.</b>
<br/><b>also, NO query string is allowed, so </b>&quot;chat/chat.php<b>?room=33</b>&quot;<b> will not work.</b></p>

	<form class=\"breakforum\" action=\"insert.php?ses=$ses&amp;act=addshortcut\" method=\"post\">
	<fieldset>
	Title:<br/>
    	<input type=\"text\" name=\"nname\" class=\"textbox\" maxlength=\"255\" />
	<br/>URL:<br/>
    	<input type=\"text\" name=\"nurl\" class=\"textbox\" maxlength=\"255\" />

	<br/><input type=\"submit\" value=\"add shortcut\" class=\"buttstyle\"/>
    	</fieldset>
    	</form><p class=\"break\">";

    	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}

//###################################################################



if ($act == "delshortcut")
{

echo "<p class=\"break\">";


echo "<b>delete shortcuts</b>$inboxes</p>";

$query = "select * from shortcuts";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);


while ($row)
	{
   $titty = $row["name"];
   $possy = $row["url"];
   $id = $row["id"];
			
echo "<p class=\"breakforum\" style=\"text-align: center;\"><a href=\"./insert.php?ses=$ses&amp;act=delshortcut&amp;id=$id\">[$titty]</a><small>[$possy]</small></p>";


           $row = mysql_fetch_array($result);
           }

    	echo "<p class=\"break\">$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
}

//###################################################################




if ($act == "superdele")


{
$query = "SELECT count(*) from forum_users WHERE userlevel>2";
$result =mysql_query("$query");
$row =mysql_fetch_array($result);
$count = $row[0];


echo "<p class=\"break\"><b>Delete By List</b>$inboxes</p><p class=\"breakforum\" style=\"text-align: center;\">
You can use this tool if you need to remove a lot of users consecutively.<br/>
Administrators and moderators will not appear on this list, the other $count users will.";


if (empty($page) || ($page < 1)) $page = 1; $max = $tmax;  $start = ($page-1) * $max;

$query = "SELECT * from forum_users WHERE userlevel>2 ORDER BY id DESC LIMIT $start, $max";
$result = mysql_query("$query");
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);



echo "</p>";

	if ($count > $max)
	{
		if ($count > $max) echo  "<p class=\"breakforum\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $pmax);
		}

		echo "$firstage";

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"./options.php?ses=$ses&amp;act=superdele&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}
		if ($count > $max) echo  "</p>";
	}

	while ($row)
           
		{
		$name = $row["username"];
		$gro = $row["userlevel"];
		$mefonesonsilent = $row["agent"];
		$meipis = $row["opip"];
		$meip6 = $row["subno"];
		$uniquid = $row["uniquid"];
		$memsince = nicetime($row["joindate"]);
		$visits = $row["visits"];
		$posts = $row["posts"];



$ad = "$name";


       	echo "<p class=\"breakforum\">
	<b>username:</b> $ad<br/>
	<b>phone:</b> $mefonesonsilent<br/>
	<b>ipv4:</b> $meipis<br/>
	<b>ipv6:</b> $meip6<br/>
	<b>joined:</b> $memsince<br/>
	<b>visits:</b> $visits<br/>
	<b>posts:</b> $posts<br/>
	$uniquid<br/>
<a href=\"./insert.php?ses=$ses&amp;nusername=$name&amp;act=adele\">remove this person.</a></p>";




           	$row = mysql_fetch_array($result);
           	}


echo "";

	if ($count > $max)
	{
		if ($count > $max) echo  "<p class=\"breakforum\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $pmax);
		}

		echo "$firstage";

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"./options.php?ses=$ses&amp;act=superdele&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}
		if ($count > $max) echo  "</p>";
	}

echo "</p><p class=\"break\">
$hyback <a href=\"index.php?ses=$ses\">options</a><br/>

$hyback<a href=\"../mainmenu.php?ses=$ses\">main menu</a>$shortcuts</p></body></html>";
exit;
}






// owner options!!
//###################################################################


if ($act == "zippit")
{


include('../scripts/dbcon.php');
$d = date("d");
$m = date("m");
$y = date("Y");



backup_tables("$server","$user","$pass","$db");


$dbfilename = "db-backup[$d-$m-$y].zip";

echo "<p class=\"break\"><b>Backup Created</b>$inboxes</p>
<p class=\"breakforum\" style=\"text-align: center;\">
<b>Download the backup archive then delete it from the remote server.</b></p>
<p class=\"breakforum\" style=\"text-align: center;\"><b>
<a href=\"./db-backup[$d-$m-$y].zip\"><big>Download It!</big><br/>[$d-$m-$y]</a><br/>----------<br/>
Got it? Good<br/>
<a href=\"./insert.php?ses=$ses&amp;act=delback&amp;dbfilename=$dbfilename\"><big>Now Delete It!</big></a>";

echo "</b></p><p class=\"break\">
$hyback <a href=\"index.php?ses=$ses\">options</a><br/>

$hyback<a href=\"../mainmenu.php?ses=$ses\">main menu</a>$shortcuts</p></body></html>";
exit;


}



//###################################################################


if ($act == "moofmailer")

   	{


    	echo "<p class=\"break\">
    	<b>The Moof Mailer$inboxes</b></p><p class=\"breakforum\" style=\"text-align: center;\">
	<b>This will send an email message to every single member of the site, please be aware that it is quite slow so do not hit cancel or refresh, if it times out, just cancel, chances are the messages (or most of them) got sent.<br/>
	The content of the email will look like this:</b></p>
	<form class=\"breakforum\" action=\"./insert.php?ses=$ses&amp;act=moofmailer\" method=\"post\">
	<fieldset>
	Hello &#36;username!<br/><br/>
	Custom Message:<br/>
    	<textarea name=\"varmessage\" rows=\"3\" cols=\"20\">$msg</textarea><br/><br/>
	Your login details (in case you forgot!) are:<br/><br/>

	Username: &#36;usermoof<br/>
	Password: &#36;passquach<br/><br/>

	Thank You,<br/>
	The PhoenixBytes Team";

    	echo "<br/><br/>
	So please bear in mind what is already contained within the outgoing message, our member does not need to be told hello and goodbye TWICE.<br/>
	If you are happy with your message, <input type=\"submit\" value=\"send it\" class=\"buttstyle\"/>
    	</fieldset>
    	</form><p class=\"break\">";

    	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   	}

//###################################################################



if ($act == "shipslog")


{
echo "<p class=\"break\"><b>Site Logbook</b>$inboxes</p>
<p class=\"breakforum\" style=\"text-align: center;\">
Each visitor is logged here, the random letters and numbers at the bottom of each entry make up a user's Unique ID, which is divised based on their ip addresses, browser and any other info we can get about each user, 
this unique id is meant to cut down on duplicate entries into this database.</p>";

$query = "SELECT count(*) from zero";
$result =mysql_query("$query");
$row =mysql_fetch_array($result);
$count = $row[0];

if (empty($page) || ($page < 1)) $page = 1; $max = $tmax;  $start = ($page-1) * $max;

$query = "SELECT * from zero ORDER BY date DESC LIMIT $start, $max";
$result = mysql_query("$query");
$row = mysql_fetch_array($result);


$limit = 500;


	if ($count > $max)
	{
		if ($count > $max) echo  "<p class=\"breakforum\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $pmax);
		}

		echo "$firstage";

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"./options.php?ses=$ses&amp;act=shipslog&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}
		if ($count > $max) echo  "</p>";
	}



	while ($row)
           
		{
		$device = $row["browser"];
		$ipv4 = $row["ipv4"];
		$ipv6 = $row["ipv6"];

		$uniquid = $row["uniquid"];
		$date = nicetime($row["date"]);
		$action = $row["action"];


       	echo "<p class=\"breakforum\"><b>Device:</b> $device<br/><b>IPv4:</b> $ipv4<br/><b>IPv6:</b> $ipv6<br/><b>Date:</b> $date<br/><b>Action:</b> $action<br/>$uniquid</p>";




           	$row = mysql_fetch_array($result);
           	}



$difference = ($count - $limit);


if ($count > $limit) 
{
$queryx = "DELETE from zero ORDER BY id ASC LIMIT $difference";
$resultx = mysql_query ("$queryx");
}




echo "";

	if ($count > $max)
	{
		if ($count > $max) echo  "<p class=\"breakforum\"><b>Page:</b> ";

		if ( $count > $max ) 
		{ 
		$number = ceil($count / $pmax);
		}

		echo "$firstage";

       		for ( $counter=1; $counter <= $number; $counter++ )
		{
		if ($counter != $page) echo "<b><a href=\"./options.php?ses=$ses&amp;act=shipslog&amp;page=$counter\">$counter</a></b> ";
		else  echo "<b>$counter</b> ";
		}
		if ($count > $max) echo  "</p>";
	}

echo "<p class=\"break\">
$hyback <a href=\"index.php?ses=$ses\">options</a><br/>
$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a>$shortcuts</p></body></html>";
}

}
else
{


    	echo "<p class=\"break\">";

	
    	echo "<b>Sorry!</b>$inboxes</p>
    	<p class=\"breakforum\" style=\"text-align: center;\"><b>You aren't supposed to be in here.<br/>
	This is the owner options section.<br/>You know i log everything, right?<br/><br/>
	You can go now, but don't let me catch you fucking around in here again ok? unless of course you are an owner, in which case you might want to send me a message about it quoting Line 1976, thanks!</b></p><p class=\"break\">";

    	echo "$hyback <a href=\"index.php?ses=$ses\">cancel</a><br/>$hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
    	exit;
   
}

//############END!!!!!!!!!!!!!!!!!!!!!!!!########################################

?>