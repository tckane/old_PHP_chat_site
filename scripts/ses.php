<?php

include('dbconnect.php');



//////////// PHOENIX PASSWORD //////////
//	ALTER THE DEFAULT USERNAMES HERE. YOU MUST ALSO REFLECT THESE IN THE DATABASE.
//
//

$query = "select * from welcome";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

$logo_url = $row["logourl"];
$sitename = $row["snames"];
$logo = "<img src=\"$logo_url\" alt=\"$sitename\"/>";
$breakstick = $row["breaker"];

$PHNAME = $row["requser"];
$PHPASS = $row["reqpass"];




$fontfamily = "comic sans ms";

$u = $_GET['u'];

$p = $_GET['p'];

$login = $_GET['login'];

$ses = $_GET['ses'];

$validity = $_GET['validity'];
///////////////////////////////////////////////////////////////////////////
/////////Welcome to the session file.
/////////sessions are sensitive, the slightest site-wide change could cause the thing to fuck
/////////it might not even be an obvious fault, who notices a blank username?
/////////everything has to be done in here the same as the config file, but i'm off for a joint, you can go it alone from here..
///////////////////////////////////////////////////////////////////////////



$hyl = "-";
$hyback = "&lt;-";
$hyfor = "-&gt;";


// let's bring in the session!


$query = "SELECT * FROM forum_users WHERE ses='$ses' limit 1";
$result = mysql_query($query);
$row_ses = mysql_fetch_array($result);

$login = $row_ses["username"];
$email = $row_ses["email"];
$group = $row_ses["userlevel"];
$compare = $row_ses["ses"];
$validity = $row_ses["valid"];

if ($ses != "$compare") $ses = "";


// check the site for damage.

$query = "SELECT count(*) from forum_users WHERE username='$PHNAME' and userlevel='1' and password='$PHPASS' and ban_status='0'";
$result = mysql_query($query);
$count = number_format(mysql_result($result,0,"count(*)"));



$query = "select * from welcome";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);
$lback = $row["linkbackaddress"];
$wwmsg = $row["msg"];

$breakstick = $row["breaker"];




if ($login == "") $login = "$u";

$query = "select * from forum_users where username='$login'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);
$bann = $row["ban_status"];




$query = "select * from forum_users where username='$PHNAME'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

$bgcolo = $row["bg_col"]; // background colour
$bgc = $row["bg_col"]; // same as $bgcolo but a different variable name to cater for older pages
$textcolour = $row["text_col"]; // text colour
$txt = $row["text_col"]; // same as $textcolour but a different variable name to cater for older pages
$namecolour = $row["my_color"]; // name colour
$cocol = $row["my_color"]; // same as $namecolour but a different variable name to cater for older pages
$tr_col = $row["tr_col"]; // table row colour [tables removed but still used!]
$tablecol = $row["tr_col"]; // same as $tr_col but a different variable name to cater for older pages
$trdc = $row["tr_col"]; // same as $tr_col but a different variable name to cater for older pages



$vyear = gmdate("Y");



if ($ses == "")

   {



$surl = "$lback";

header("HTTP/1.1 301 Moved Permanently");
header("Location: ".$surl);
exit;
   }

elseif ($bann == 1)
{


$cookieflour = "banned";

$surl = "$lback/?msg=2";


setcookie("special", $cookieflour);
header("HTTP/1.1 301 Moved Permanently");
header("Location: ".$surl);
exit;
}

elseif ($validity == "no")
   		
		{





$query = "select * from forum_users where username='$PHNAME'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

$bgcolo = $row["bg_col"]; // background colour
$bgc = $row["bg_col"]; // same as $bgcolo but a different variable name to cater for older pages
$textcolour = $row["text_col"]; // text colour
$txt = $row["text_col"]; // same as $textcolour but a different variable name to cater for older pages
$namecolour = $row["my_color"]; // name colour
$cocol = $row["my_color"]; // same as $namecolour but a different variable name to cater for older pages
$tr_col = $row["tr_col"]; // table row colour [tables removed but still used!]
$tablecol = $row["tr_col"]; // same as $tr_col but a different variable name to cater for older pages
$trdc = $row["tr_col"]; // same as $tr_col but a different variable name to cater for older pages


$topleft = "$tr_col";
$bottomright = "$namecolour";
$bg2 = "$txt";


echo "<!DOCTYPE html
PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\"
\"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html>
<head><title>$sitename</title>
<style type=\"text/css\">
<!--

fieldset {
border-style: solid;
padding: 0px;
border-width: 0px;
border-top-color: $bgc;
border-left-color: $bgc;
border-right-color: $bottomright;
border-bottom-color: $bottomright;
}

-->
</style>
<style type=\"text/css\">
<!--


a { text-decoration: none;  }
-->
</style>
<style type=\"text/css\">

<!--

a:link { color: $namecolour; text-decoration: none;}
a:visited { color: $namecolour; text-decoration: none;}
a:hover {color: $namecolour; text-decoration: none;}
-->
</style>
<style type=\"text/css\">
<!--
body {
color: $bottomright;
background-color: $bgc;
font-family: $fontfamily;
text-align: none;
text-decoration: none; }
-->
</style>
<style type=\"text/css\">

<!--
.buttstyle {
border-style: solid;
padding: 2px;
border-width: 1px;
border-top-color: $topleft;
border-left-color: $topleft;
border-right-color: $bottomright;
border-bottom-color: $bottomright;
text-align: center;
font-family: $fontfamily;
font-weight: bold; }
-->
</style>

<style type=\"text/css\">

<!--
.breakmenu {
background-color: $bg2;
border-style: solid;
padding: 1px;
border-width: 1px;
border-top-color: $topleft;
border-left-color: $topleft;
border-right-color: $bottomright;
border-bottom-color: $bottomright;
color: $bgcolo;
font-family: $fontfamily; }
-->
</style>

<style type=\"text/css\">

<!--
.break {
background-color: $bg2;
text-align: center;
border-style: solid;
padding: 1px;
border-width: 1px;
border-top-color: $topleft;
border-left-color: $topleft;
border-right-color: $bottomright;
border-bottom-color: $bottomright;
color: $bottomright;
font-family: $fontfamily; }
-->
</style>
<style type=\"text/css\">

<!--
.forum {
background-color: $txt;
text-align: left;
color: $bgcolo;
font-family: $fontfamily;
text-align: left; }
-->
</style><style type=\"text/css\">

<!--
.breakforum {
background-color: $topleft;
text-align: left;
font-weight: normal;
border-style: solid;
padding: 1px;
border-width: 1px;
border-top-color: $topleft;
border-left-color: $topleft;
border-right-color: $bottomright;
border-bottom-color: $bottomright;
color: $bottomright;
font-family: $fontfamily; }
-->
</style>

<style type=\"text/css\">

<!--
.centerize {
text-align: center;
}
-->
</style>
<style type=\"text/css\">

<!--
.textbox {
border-style: solid;
padding: 2px;
border-width: 1px;
border-top-color: $topleft;
border-left-color: $topleft;
border-right-color: $bottomright;
border-bottom-color: $bottomright;
font-family: $fontfamily;
font-weight: bold;
text-align: left;
}
-->
</style>
<style type=\"text/css\">
<!--
.textrectforum {
border-style: solid;
padding: 1px;
text-align: left;
border-width: 1px;
border-top-color: $bgc;
border-left-color: $bgc;
border-right-color: $bottomright;
border-bottom-color: $bottomright;
font-family: $fontfamily;
}
-->
</style>

<style type=\"text/css\">
<!--
.textrectmenu {
border-style: solid;
padding: 1px;
text-align: left;
color: $bottomright;
border-width: 1px;
background-color: $bgc;
border-top-color: $bgc;
border-bottom-color: $bottomright;
border-left-color: $bgc;
border-right-color: $bottomright;
font-family: $fontfamily;
}
-->
</style>

<style type=\"text/css\">
<!--
.textrect {
border-style: solid;
padding: 1px;
text-align: center;
color: $bottomright;
border-width: 1px;
background-color: $bgc;
border-top-color: $bgc;
border-bottom-color: $bottomright;
border-left-color: $bgc;
border-right-color: $bottomright;
font-family: $fontfamily;
}
-->
</style>
</head>
<body bgcolor=\"$bgc\" text=\"$txt\">";
echo "<p class=\"break\">
    <big>$logo<br/>Error 2</big></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
your account is not yet active, please try later
    </p><hr/><p align=\"center\" class=\"break\">$breaker
    $hyl<a href=\"$lback\">exit</a>$hyl
    </p></body></html>";
    		exit;
   		}



elseif ($num_rows == 0)
   		
		{



$query = "select * from forum_users where username='$PHNAME'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);




$bgcolo = $row["bg_col"]; // background colour
$bgc = $row["bg_col"]; // same as $bgcolo but a different variable name to cater for older pages
$textcolour = $row["text_col"]; // text colour
$txt = $row["text_col"]; // same as $textcolour but a different variable name to cater for older pages
$namecolour = $row["my_color"]; // name colour
$cocol = $row["my_color"]; // same as $namecolour but a different variable name to cater for older pages
$tr_col = $row["tr_col"]; // table row colour [tables removed but still used!]
$tablecol = $row["tr_col"]; // same as $tr_col but a different variable name to cater for older pages
$trdc = $row["tr_col"]; // same as $tr_col but a different variable name to cater for older pages

$topleft = "$tr_col";
$bottomright = "$namecolour";
$bg2 = "$txt";

echo "<!DOCTYPE html
PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\"
\"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html>
<head><title>$sitename</title>
<style type=\"text/css\">
<!--

fieldset {
border-style: solid;
padding: 0px;
border-width: 0px;
border-top-color: $bgc;
border-left-color: $bgc;
border-right-color: $bottomright;
border-bottom-color: $bottomright;
}

-->
</style>
<style type=\"text/css\">
<!--


a { text-decoration: none;  }
-->
</style>
<style type=\"text/css\">

<!--

a:link { color: $namecolour; text-decoration: none;}
a:visited { color: $namecolour; text-decoration: none;}
a:hover {color: $namecolour; text-decoration: none;}
-->
</style>
<style type=\"text/css\">
<!--
body {
color: $bottomright;
background-color: $bgc;
font-family: $fontfamily;
text-align: none;
text-decoration: none; }
-->
</style>
<style type=\"text/css\">

<!--
.buttstyle {
border-style: solid;
padding: 2px;
border-width: 1px;
border-top-color: $topleft;
border-left-color: $topleft;
border-right-color: $bottomright;
border-bottom-color: $bottomright;
text-align: center;
font-family: $fontfamily;
font-weight: bold; }
-->
</style>

<style type=\"text/css\">

<!--
.breakmenu {
background-color: $bg2;
border-style: solid;
padding: 1px;
border-width: 1px;
border-top-color: $topleft;
border-left-color: $topleft;
border-right-color: $bottomright;
border-bottom-color: $bottomright;
color: $bgcolo;
font-family: $fontfamily; }
-->
</style>

<style type=\"text/css\">

<!--
.break {
background-color: $bg2;
text-align: center;
border-style: solid;
padding: 1px;
border-width: 1px;
border-top-color: $topleft;
border-left-color: $topleft;
border-right-color: $bottomright;
border-bottom-color: $bottomright;
color: $bottomright;
font-family: $fontfamily; }
-->
</style>
<style type=\"text/css\">

<!--
.forum {
background-color: $txt;
text-align: left;
color: $bgcolo;
font-family: $fontfamily;
text-align: left; }
-->
</style><style type=\"text/css\">

<!--
.breakforum {
background-color: $topleft;
text-align: left;
font-weight: normal;
border-style: solid;
padding: 1px;
border-width: 1px;
border-top-color: $topleft;
border-left-color: $topleft;
border-right-color: $bottomright;
border-bottom-color: $bottomright;
color: $bottomright;
font-family: $fontfamily; }
-->
</style>

<style type=\"text/css\">

<!--
.centerize {
text-align: center;
}
-->
</style>
<style type=\"text/css\">

<!--
.textbox {
border-style: solid;
padding: 2px;
border-width: 1px;
border-top-color: $topleft;
border-left-color: $topleft;
border-right-color: $bottomright;
border-bottom-color: $bottomright;
font-family: $fontfamily;
font-weight: bold;
text-align: left;
}
-->
</style>
<style type=\"text/css\">
<!--
.textrectforum {
border-style: solid;
padding: 1px;
text-align: left;
border-width: 1px;
border-top-color: $bgc;
border-left-color: $bgc;
border-right-color: $bottomright;
border-bottom-color: $bottomright;
font-family: $fontfamily;
}
-->
</style>

<style type=\"text/css\">
<!--
.textrectmenu {
border-style: solid;
padding: 1px;
text-align: left;
color: $bottomright;
border-width: 1px;
background-color: $bgc;
border-top-color: $bgc;
border-bottom-color: $bottomright;
border-left-color: $bgc;
border-right-color: $bottomright;
font-family: $fontfamily;
}
-->
</style>

<style type=\"text/css\">
<!--
.textrect {
border-style: solid;
padding: 1px;
text-align: center;
color: $bottomright;
border-width: 1px;
background-color: $bgc;
border-top-color: $bgc;
border-bottom-color: $bottomright;
border-left-color: $bgc;
border-right-color: $bottomright;
font-family: $fontfamily;
}
-->
</style>
</head>
<body bgcolor=\"$bgc\" text=\"$txt\">";
echo "<p class=\"break\">
    <big>$logo<br/>Error 3</big></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
an error has occured, you've been deleted.
    </p><hr/><p class=\"break\">$breaker
    <br/>$hyl<a href=\"$lback\">exit</a>$hyl
    </p></body></html>";
    		exit;
   		}


elseif ($count == 0)
{



$query = "select * from forum_users where username='$PHNAME'";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

$bgcolo = $row["bg_col"]; // background colour
$bgc = $row["bg_col"]; // same as $bgcolo but a different variable name to cater for older pages
$textcolour = $row["text_col"]; // text colour
$txt = $row["text_col"]; // same as $textcolour but a different variable name to cater for older pages
$namecolour = $row["my_color"]; // name colour
$cocol = $row["my_color"]; // same as $namecolour but a different variable name to cater for older pages
$tr_col = $row["tr_col"]; // table row colour [tables removed but still used!]
$tablecol = $row["tr_col"]; // same as $tr_col but a different variable name to cater for older pages
$trdc = $row["tr_col"]; // same as $tr_col but a different variable name to cater for older pages

$topleft = "$tr_col";
$bottomright = "$namecolour";
$bg2 = "$txt";


echo "<!DOCTYPE html
PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\"
\"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html>
<head><title>$sitename</title>
<style type=\"text/css\">
<!--

fieldset {
border-style: solid;
padding: 0px;
border-width: 0px;
border-top-color: $bgc;
border-left-color: $bgc;
border-right-color: $bottomright;
border-bottom-color: $bottomright;
}

-->
</style>
<style type=\"text/css\">
<!--


a { text-decoration: none;  }
-->
</style>
<style type=\"text/css\">

<!--

a:link { color: $namecolour; text-decoration: none;}
a:visited { color: $namecolour; text-decoration: none;}
a:hover {color: $namecolour; text-decoration: none;}
-->
</style>
<style type=\"text/css\">
<!--
body {
color: $bottomright;
background-color: $bgc;
font-family: $fontfamily;
text-align: none;
text-decoration: none; }
-->
</style>
<style type=\"text/css\">

<!--
.buttstyle {
border-style: solid;
padding: 2px;
border-width: 1px;
border-top-color: $topleft;
border-left-color: $topleft;
border-right-color: $bottomright;
border-bottom-color: $bottomright;
text-align: center;
font-family: $fontfamily;
font-weight: bold; }
-->
</style>

<style type=\"text/css\">

<!--
.breakmenu {
background-color: $bg2;
border-style: solid;
padding: 1px;
border-width: 1px;
border-top-color: $topleft;
border-left-color: $topleft;
border-right-color: $bottomright;
border-bottom-color: $bottomright;
color: $bgcolo;
font-family: $fontfamily; }
-->
</style>

<style type=\"text/css\">

<!--
.break {
background-color: $bg2;
text-align: center;
border-style: solid;
padding: 1px;
border-width: 1px;
border-top-color: $topleft;
border-left-color: $topleft;
border-right-color: $bottomright;
border-bottom-color: $bottomright;
color: $bottomright;
font-family: $fontfamily; }
-->
</style>
<style type=\"text/css\">

<!--
.forum {
background-color: $txt;
text-align: left;
color: $bgcolo;
font-family: $fontfamily;
text-align: left; }
-->
</style><style type=\"text/css\">

<!--
.breakforum {
background-color: $topleft;
text-align: left;
font-weight: normal;
border-style: solid;
padding: 1px;
border-width: 1px;
border-top-color: $topleft;
border-left-color: $topleft;
border-right-color: $bottomright;
border-bottom-color: $bottomright;
color: $bottomright;
font-family: $fontfamily; }
-->
</style>

<style type=\"text/css\">

<!--
.centerize {
text-align: center;
}
-->
</style>
<style type=\"text/css\">

<!--
.textbox {
border-style: solid;
padding: 2px;
border-width: 1px;
border-top-color: $topleft;
border-left-color: $topleft;
border-right-color: $bottomright;
border-bottom-color: $bottomright;
font-family: $fontfamily;
font-weight: bold;
text-align: left;
}
-->
</style>
<style type=\"text/css\">
<!--
.textrectforum {
border-style: solid;
padding: 1px;
text-align: left;
border-width: 1px;
border-top-color: $bgc;
border-left-color: $bgc;
border-right-color: $bottomright;
border-bottom-color: $bottomright;
font-family: $fontfamily;
}
-->
</style>

<style type=\"text/css\">
<!--
.textrectmenu {
border-style: solid;
padding: 1px;
text-align: left;
color: $bottomright;
border-width: 1px;
background-color: $bgc;
border-top-color: $bgc;
border-bottom-color: $bottomright;
border-left-color: $bgc;
border-right-color: $bottomright;
font-family: $fontfamily;
}
-->
</style>

<style type=\"text/css\">
<!--
.textrect {
border-style: solid;
padding: 1px;
text-align: center;
color: $bottomright;
border-width: 1px;
background-color: $bgc;
border-top-color: $bgc;
border-bottom-color: $bottomright;
border-left-color: $bgc;
border-right-color: $bottomright;
font-family: $fontfamily;
}
-->
</style>
</head>
<body bgcolor=\"$bgc\" text=\"$txt\">";
echo "<p class=\"break\">
    <big>$logo<br/>Error 4</big></p><hr/><p class=\"breakforum\" style=\"text-align: center;\">
    there was an error connecting to the database.<br/>
    <br/>a required username, such as '$PHNAME', may have been deleted or had it's password changed, please restore this name.
    <br/>if you continue to recive this message, there may be greater evils at work...
    </p><hr/><p class=\"break\">$breaker
    $hyl<a href=\"$lback\">exit</a>$hyl
    </p></body></html>";
		exit;

}




?>
