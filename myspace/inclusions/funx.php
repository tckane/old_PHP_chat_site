<?php




///////////////////////////////////////////////////////////
////////STRIP/JAVASCRIPT//////////////////////////////////
///////////////////////////////////////////////////////////
function strip_javascript($sSource, $aAllowedTags = array('<p>', '<a>', '<img>', '<b>', '<br/>', '<i>', '<u>', '<font>', '<span>', '<div>', '<hr/>', '<body>', '<h1>', '<h2>', '<h3>', '<h4>', '<h5>', '<h6>', '<form>', '<input>', '<textarea>', '<select>'),
 $aDisabledAttributes = array('onclick', 'ondblclick', 'onkeydown', 'onkeypress', 'onkeyup', 'onload', 'onmousedown', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onunload'))
    {
        if (empty($aDisabledEvents)) return strip_tags($sSource, implode('', $aAllowedTags));

        return preg_replace('/<(.*?)>/ie', "'<' . preg_replace(array('/javascript:[^\"\']*/i', '/(" . implode('|', $aDisabledAttributes) . ")=[\"\'][^\"\']*[\"\']/i', '/\s+/'), array('', '', ' '), stripslashes('\\1')) . '>'", strip_tags($sSource, implode('', $aAllowedTags)));
    }
    return $filter; 

///////////////////////////////////////////////////////////
//END//STRIP//JAVASCRIPT//////////////////////////////////
///////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////
////////////////////CLEAN/////////////////////////////////
///////////////////////////////////////////////////////////

function clean($string)
{

$string = mysql_real_escape_string($string);

return $string;
}

///////////////////////////////////////////////////////////
////////////////END/CLEAN/////////////////////////////////
///////////////////////////////////////////////////////////
/////////////////////////////////////////////////////
function chattime($date)
{
    if(empty($date)) {
        return "No date provided";
    }
    
    $periods         = array("s", "m", "hr", "d", "w", "m", "y", "dec");
    $lengths         = array("60","60","24","7","4.35","12","10");
    
    $now             = time();
    $unix_date         = strtotime($date);
    
       // check validity of date
    if(empty($unix_date)) {    
        return "Bad date";
    }

    // is it future date or past date
    if($now > $unix_date) {    
        $difference     = $now - $unix_date;
        $tense         = "ago";
        
    } else {
        $difference     = $unix_date - $now;
        $tense         = "ago";
    }
    
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }
    
    $difference = round($difference);
    
    if($difference != 1) {
        $periods[$j].= "";
    }
    
    return "$difference$periods[$j] {$tense}";
}

?>