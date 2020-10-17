<?php




$faces = array ('Cherry', '1', '2', '3', 'Diamond', 'Seven');








$payouts = array (
    '1|1|1' => '5',
    '2|2|2' => '10',
    '3|3|3' => '15',
    'Cherry|Cherry|Cherry' => '20',
    'Seven|Seven|Seven' => '70',
    'Diamond|Diamond|Diamond' => '100',
);



$wheel1 = array();

foreach ($faces as $face) {
   
 
$wheel1[] = $face;
}
$wheel2 = array_reverse($wheel1);
$wheel3 = $wheel1;


if (isset($_POST['payline']))
{

list($start1, $start2, $start3) = unserialize($_POST['payline']);

}
else {

list($start1, $start2, $start3) = array(0,0,0);
}

$stop1 = rand(count($wheel1)+$start1, 10*count($wheel1)) % count($wheel1);

$stop2 = rand(count($wheel1)+$start2, 10*count($wheel1)) % count($wheel1);
$stop3 = rand(count($wheel1)+$start3, 10*count($wheel1)) % count($wheel1);




$result1 = $wheel1[$stop1];


$result2 = $wheel2[$stop2];

$result3 = $wheel3[$stop3];




if (isset($payouts[$result1.'|'.$result2.'|'.$result3]))
{



// give the payout
    
$wsg = "You won : " . $payouts[$result1.'|'.$result2.'|'.$result3];


}




$result1 = str_replace("Diamond","<img align=\"middle\" src=\"./images/diamond.gif\"/>","$result1");
$result1 = str_replace("Cherry","<img align=\"middle\" src=\"./images/cherry.gif\"/>","$result1");
$result1 = str_replace("Seven","<img align=\"middle\" src=\"./images/7.gif\"/>","$result1");
$result1 = str_replace("1","<img align=\"middle\" src=\"./images/bar1.gif\"/>","$result1");
$result1 = str_replace("2","<img align=\"middle\" src=\"./images/bar2.gif\"/>","$result1");
$result1 = str_replace("3","<img align=\"middle\" src=\"./images/bar3.gif\"/>","$result1");

$result2 = str_replace("Diamond","<img align=\"middle\" src=\"./images/diamond.gif\"/>","$result2");
$result2 = str_replace("Cherry","<img align=\"middle\" src=\"./images/cherry.gif\"/>","$result2");
$result2 = str_replace("Seven","<img align=\"middle\" src=\"./images/7.gif\"/>","$result2");
$result2 = str_replace("1","<img align=\"middle\" src=\"./images/bar1.gif\"/>","$result2");
$result2 = str_replace("2","<img align=\"middle\" src=\"./images/bar2.gif\"/>","$result2");
$result2 = str_replace("3","<img align=\"middle\" src=\"./images/bar3.gif\"/>","$result2");

$result3 = str_replace("Diamond","<img align=\"middle\" src=\"./images/diamond.gif\"/>","$result3");
$result3 = str_replace("Cherry","<img align=\"middle\" src=\"./images/cherry.gif\"/>","$result3");
$result3 = str_replace("Seven","<img align=\"middle\" src=\"./images/7.gif\"/>","$result3");
$result3 = str_replace("1","<img align=\"middle\" src=\"./images/bar1.gif\"/>","$result3");
$result3 = str_replace("2","<img align=\"middle\" src=\"./images/bar2.gif\"/>","$result3");
$result3 = str_replace("3","<img align=\"middle\" src=\"./images/bar3.gif\"/>","$result3");

echo "" . $result1 . '-' . $result2 . '-' . $result3 . "<br />";

echo "$wsg";



?>

<br />

<form method='post'>
<input type='hidden' name='payline' value='<?php echo serialize(array($stop1, $stop2, $stop3)) ?>' />

<input type='submit' value='spin' />
</form>



