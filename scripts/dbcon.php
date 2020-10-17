<?php

// This should be stored outside HTML root!
// But on shared hosting in 2006, this is not so easy ;)
///////////////////////////////////////////////////////////////

$server = "localhost";
$user = "phoenix_admin";
$pass = "1010111000104#uu";
$db = "phoenix_phoenixdb";
//
mysql_connect($server, $user, $pass);
mysql_select_db($db);
//////////////////////////////////////////////////////////////
//

?>