<?php



include('./scripts/header.php');
include('./scripts/session.php');
include('./scripts/config.php');
include('./scripts/functions.php');
include('./scripts/main.php');





$query = "SELECT * from etest";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);



while ($row)
      	{
	$setEmailArray = $row['email'];
	$passquach = $row['password'];
	$usermoof = $row['username'];
                  


$message = "hey! we've missed you!
Where have you been? What you been up to? Log into PhoenixBytes and let us know!
In case you forgot, you signed up with us on (*xdate*)
You might have forgotten us but we haven't forgotten you so if ya get a chance, pop in and say hi!
Your login details (in case you forgot!) are:

Username: $usermoof
Password: $passquach

Lots of love and stuff
The PhoenixBytes Team.";





            //    THIS EMAIL IS THE SENDER EMAIL ADDRESS
   $from      = "$PHEMAIL";
   
            //    SET A SUBJECT OF YOUR CHOICE
   $subject    = 'did we win?';
            
            //    SET UP THE EMAIL HEADERS 
    $headers      = "From: $from\r\n";
    $headers   .= "Content-Type: text/plain; charset=iso-8859-1\r\n";
   
            /*    IN-CASE SOMEONE HAS TWO EMAIL ACCOUNTS SETUP ON THE SAME COMPUTER 
               SOME EMAIL PROGRAMS LIKE OUTLOOK
               WILL ONLY SHOW ONE EMAIL AND DISCARD THE OTHER(S)
               SO WE GIVE THE (Message-ID:) A RANDOM NUMBER
            */ 
   $headers   .= "Message-ID: <".time().rand(1,1000)."@".$_SERVER['SERVER_NAME'].">". "\r\n";   
   
   
   //   LETS SEND THE EMAIL
   mail($setEmailArray, $subject, $message, $headers);
   
   //    PRINT ALL THE EMAIL ADDRESS'S
   echo "<p class=\"breakforum\">EMAIL SENT TO : $setEmailArray<BR /></p>";

       	$row = mysql_fetch_array($result);
      	}
?>