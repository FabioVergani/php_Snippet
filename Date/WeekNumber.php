<?php
/*
echo "Today is " . date("Y/m/d") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l");
*/
$DateYmd=date('Y-m-d');
$Time=strtotime($DateYmd);
$Year=date('Y',$Time);
$WeekNumber=date('W',$Time);

echo '<table><tbody>';
echo '<tr><td>Time:</td><td>',$Time,'</td></tr>';
echo '<tr><td>Day:</td><td>',$DateYmd,'</td></tr>';
echo '<tr><td>Year:</td><td>',$Year,'</td></tr>';
echo '<tr><td>Week:</td><td>',$WeekNumber,'</td></tr>';
echo '</tbody></table>';
?>    
