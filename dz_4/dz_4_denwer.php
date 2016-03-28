<?php
    header('Content-type: text/html; charset=utf-8');
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
        
    echo '<table>'; 
    echo '<tr> '
            .'<td> <b>Наименование</b> &nbsp </td> <td> <b>Цена</b> &nbsp </td> <td> <b>Количество заказано</b> &nbsp </td> <td> <b>Количество на складе</b> &nbsp </td> <td> <b>Скидка на товар</b> &nbsp </td> <td> <b>Всего</b> &nbsp </td> <td> <b>Уведомления</b> &nbsp </td>'
         .'</tr> ';

        foreach ($bd as $key1 => $value1) {

            # Расчёт скидок
                $d = substr( $value1['diskont'], -1 ) * 10;
                if ( $key1 == 'игрушка детская велосипед' && $value1['количество заказано'] >= 3 && $value1['осталось на складе'] >= 3 ) {
                    $d = 30;
                }
                
            #Вывод уведомлений о количестве товара
                if ( $value1['количество заказано'] > $value1['осталось на складе'] ) {
                    $not = 'Требуемого количества товара на складе не оказалось';
                }
                else {
                    $not = '';
                }
                
            #Вывод уведомлений о скидках
                switch ( $d ) {
                    case 0: 
                        $not_d = '';
                        break;
                    case 10: 
                        $not_d = '';
                        break;
                    case 20: 
                        $not_d = '';
                        break;
                    case 30: 
                        $not_d = '<i> Специальная скидка составляет - 30% </i>';
                        break;
                }
                               
            # Расчёт стоимости одного наименования корзины (через переменную функцию)
                if ( !function_exists('Total_price') ) {
                    function Total_price ( $v1o, $v1s, $v1p, $dis ) {
                        if ( $v1o > $v1s ) {
                            $tp = $v1s * ( $v1p * ( 1 - $dis/100) );
                        }
                        else {
                            $tp = $v1o * ( $v1p * ( 1 - $dis/100) );                    
                        }
                        return $tp;
                    }
                }
                                
                $func = 'Total_price';
                $t = $func( $value1['количество заказано'], $value1['осталось на складе'], $value1['цена'], $d );
                
            echo '<tr> '
                    .'<td> '.$key1.' &nbsp </td> <td> '.$value1['цена'].' &nbsp </td> <td> '.$value1['количество заказано'].' &nbsp </td> <td> '.$value1['осталось на складе'].' &nbsp </td> <td> '.$d.'% &nbsp </td> <td> '.$t.' &nbsp </td> <td> '.$not.' <br>'.$not_d.' &nbsp </td>'
                 .'</tr>';

        #Расчёт общеего количество товара (заказанного)
                static $qo = 0;
                $qo = $qo + $value1['количество заказано'];

        #Расчёт общеего количество товара (на складе)
                static $qs = 0;
                $qs = $qs + $value1['осталось на складе'];

        #Расчёт общей суммы покупок
                static $to_pay = 0;
                $to_pay = $to_pay + $t;
                
        }
    echo '<tr> '
            .'<td> <b>Итого</b> &nbsp </td> <td></td> <td> <b>'.$qo.'</b> &nbsp </td> <td> <b>'.$qs.'</b> &nbsp </td> <td> <b></b> &nbsp </td> <td> <b>'.$to_pay.'</b> &nbsp </td> <td> <b>наименований заказано - '.$ng.'</b> &nbsp </td>'
         .'</tr> ';        
    echo '</table>';

            #Вывод общей суммы покупок
                echo '<h3> К оплате - '.$to_pay.' </h3>';
}
?>