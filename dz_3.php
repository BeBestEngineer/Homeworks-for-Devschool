<?php
   error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE);
    ini_set('display_errors', 1);
# Создание массива со случайными юниксовыми метками
$date = array ( rand(1, time()), rand(1, time()), rand(1, time()), rand(1, time()), rand(1, time()) );

echo 'Наименьшее число месяца в массиве = ';
$min_day1 = min(date('d', $date[0]), date('d', $date[1]), date('d', $date[2]), date('d', $date[3]), date('d', $date[4]) );
echo $min_day1;

echo '<br>';
echo 'Наименьший день недели в массиве = ';
$min_day2 = min(date('N', $date[0]), date('N', $date[1]), date('N', $date[2]), date('N', $date[3]), date('N', $date[4]) );
echo $min_day2;

echo '<br>';
echo 'Наибольший месяц в массиве = ';
$min_day2 = max(date('n', $date[0]), date('n', $date[1]), date('n', $date[2]), date('n', $date[3]), date('n', $date[4]) );
echo $min_day2;

array_multisort( $date, SORT_ASC );

$selected = array_pop( $date );

$selected_1 = date( 'd.m.Y H:i:s', $selected );

echo '<br>';
echo 'Наибольшая дата массива = ',$selected_1;

echo '<br>';
echo 'Временная зона сервера до - ', date_default_timezone_get(); 
date_default_timezone_set('America/New_York');
echo '<br>'; 
echo 'Временная зона сервера после - ', date_default_timezone_get(); 

$selected_2 = date( 'd.m.Y H:i:s', $selected );
echo '<br>';
echo 'Наибольшая дата массива = ',$selected_2;
?>