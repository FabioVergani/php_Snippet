<?php
/*
echo "Today is " . date("Y/m/d") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l");
*/
$DateYmd=date('Y-m-d');
$WeekNumber=date('W',strtotime($DateYmd));
echo 'DateYmd: ',$DateYmd,PHP_EOL,'WeekNumber: ',$WeekNumber;
?>    
