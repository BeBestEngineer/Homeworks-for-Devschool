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
$min_day2 = min(date('l', $date[0]), date('l', $date[1]), date('l', $date[2]), date('l', $date[3]), date('l', $date[4]) );
echo $min_day2;

echo '<br>';
echo 'Наибольший месяц в массиве = ';
$min_day2 = min(date('F', $date[0]), date('F', $date[1]), date('F', $date[2]), date('F', $date[3]), date('F', $date[4]) );
echo $min_day2;

echo '<br>'; 


#var_dump( $date );

array_multisort( $date, SORT_ASC );

/*$date_date[] = date ('d.m.Y', $date[0]);
$date_date[] = date ('d.m.Y', $date[1]);
$date_date[] = date ('d.m.Y', $date[2]);
$date_date[] = date ('d.m.Y', $date[3]);
$date_date[] = date ('d.m.Y', $date[4]);*/

#var_dump( $date );
#var_dump( $date_date );

$selected = array_pop( $date );

$selected = date( 'd.m.Y H:i:s', $selected );
echo 'Наибольшая дата массива = ',$selected;

echo '<br>';
echo 'Временная зона сервера до - ', date_default_timezone_get(); 
date_default_timezone_set('America/New_York');
echo '<br>'; 
echo 'Временная зона сервера после - ', date_default_timezone_get(); 
echo '<br>';
echo 'Наибольшая дата массива = ',$selected;

?>