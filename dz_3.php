<?php
   error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE);
    ini_set('display_errors', 1);
 
# Урок 3. Задание
$date = array ( rand(1, time()), rand(1, time()), rand(1, time()), rand(1, time()), rand(1, time()) );
//print_r($date); 

echo "\n";
echo 'Наименьшее число месяца в массиве = ';
$min_day1 = min(date('d', $date[0]), date('d', $date[1]), date('d', $date[2]), date('d', $date[3]), date('d', $date[4]) );
echo $min_day1;

echo "\n";
echo 'Наименьший день недели в массиве = ';
$min_day2 = min(date('l', $date[0]), date('l', $date[1]), date('l', $date[2]), date('l', $date[3]), date('l', $date[4]) );
echo $min_day2;

echo "\n";
echo 'Наибольший месяц в массиве = ';
$min_day2 = min(date('F', $date[0]), date('F', $date[1]), date('F', $date[2]), date('F', $date[3]), date('F', $date[4]) );
echo $min_day2;

echo "\n"; 
array_multisort($date);
//print_r($date);

/*echo "\n"; 
$date_date[] = date ('d.m.Y', $date[0]);
$date_date[] = date ('d.m.Y', $date[1]);
$date_date[] = date ('d.m.Y', $date[2]);
$date_date[] = date ('d.m.Y', $date[3]);
$date_date[] = date ('d.m.Y', $date[4]);
print_r($date_date);*/


$selected = array_pop( $date );
echo "\n"; 

$selected = date( 'd.m.Y H:i:s', $selected );
echo 'Наибольшая дата массива = ',$selected;

echo "\n"; 
echo "\n"; 
echo 'Временная зона сервера до - ', date_default_timezone_get(); 
date_default_timezone_set('America/New_York');
echo "\n"; 
echo 'Временная зона сервера после - ', date_default_timezone_get(); 

?>
