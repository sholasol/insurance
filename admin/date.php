<?php
/*
$startDate= date('Y-m-d');

  $days = 364 ;


    $dayStr = $days == 1 ? 'day' : 'days';
    
    echo date('Y-m-d', strtotime('+ '.$days. ' '.$dayStr, strtotime($startDate )));
    
    */

$time = strtotime('12/11/2018');
 
$newformat = date('M',$time);

//echo $newformat;
$year=date('M');

//echo $year;
echo $newformat;
?>