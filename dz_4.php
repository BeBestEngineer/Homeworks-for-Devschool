<?php
   error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE);
    ini_set('display_errors', 1);

    $ini_string='
[игрушка мягкая мишка белый] 
цена = '.  mt_rand(1, 10).';
количество заказано = '.  mt_rand(1, 10).';
осталось на складе = '.  mt_rand(0, 10).';
diskont = diskont '.  mt_rand(0, 2).';
    
[одежда детская куртка синяя синтепон]
цена = '.  mt_rand(1, 10).';
количество заказано = '.  mt_rand(1, 10).';
осталось на складе = '.  mt_rand(0, 10).';
diskont = diskont '.  mt_rand(0, 2).';
    
[игрушка детская велосипед]
цена = '.  mt_rand(1, 10).';
количество заказано = '.  mt_rand(1, 10).';
осталось на складе = '.  mt_rand(0, 10).';
diskont = diskont '.  mt_rand(0, 2).';
';
$bd=  parse_ini_string($ini_string, true);

$quantity_goods = count ( $bd );

#Вывод корзины
Basket ( $quantity_goods );

function Basket ( $ng ) {
    global $bd;
            
    echo '<h2> Корзина </h2>';
        echo '<i> Количество товаров с корзине - '.$ng.' товара </i>';
            echo'<br>';
            echo'<br>';
    echo '<table>'; 
    echo '<tr> '
            .'<td> <b>Наименование</b> &nbsp </td> <td> <b>Цена</b> &nbsp </td> <td> <b>Количество заказано</b> &nbsp </td> <td> <b>Количество на складе</b> &nbsp </td> <td> <b>Скидка на товар</b> &nbsp </td> <td> <b>Всего</b> &nbsp </td> <td> <b>Уведомления</b> &nbsp </td>'
         .'</tr> ';

        foreach ($bd as $key1 => $value1) {
                           
            # Расчёт скидок
                $d = substr( $value1['diskont'], -1 ) * 10;
                if ( $key1 == 'игрушка детская велосипед' && $value1['количество заказано'] >= 3 && $value1['количество заказано'] <= $value1['осталось на складе'] ) {
                    $d = 30;
                }
                
            #Вывод уведомлений
                if ( $value1['количество заказано'] > $value1['осталось на складе'] ) {
                    $not = 'Требуемого количества товара на складе не оказалось';
                }
                else {
                    $not = '';
                }
                
            # Расчёт стоимости одной позиции корзины
                if ( $value1['количество заказано'] > $value1['осталось на складе'] ) {
                    $t = $value1['осталось на складе'] * ( $value1['цена'] * ( 1 - $d/100) );
                }
                else {
                    $t = $value1['количество заказано'] * ( $value1['цена'] * ( 1 - $d/100) );
                }
                                
            echo '<tr> '
                    .'<td> '.$key1.' &nbsp </td> <td> '.$value1['цена'].' &nbsp </td> <td> '.$value1['количество заказано'].' &nbsp </td> <td> '.$value1['осталось на складе'].' &nbsp </td> <td> '.$d.'% &nbsp </td> <td> '.$t.' &nbsp </td> <td> '.$not.' &nbsp </td>'
                 .'</tr>';
            
            #Расчёт общей суммы покупок
                static $to_pay = 0;
                $to_pay = $to_pay + $t;
                
        }
    echo '</table>';
    
            #Вывод общей суммы покупок
                echo '<h3> К оплате - '.$to_pay.' </h3>';
}
?>