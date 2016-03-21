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
#var_dump($bd);

#Получение данных о товарах
$my_buy_1 = $bd['игрушка мягкая мишка белый'];
$my_buy_2 = $bd['одежда детская куртка синяя синтепон'];
$my_buy_3 = $bd['игрушка детская велосипед'];
#print_r (gettype($my_buy_1));
#echo '<br>';
/*
print_r ($my_buy_1);
echo '<br>';
print_r ($my_buy_2);
echo '<br>';
print_r ($my_buy_3);
echo '<br>';
*/

$good_1 = key ( $bd );
#echo (gettype($good_1));
#echo '<br>';
next ( $bd );
$good_2 = key ( $bd );
next ( $bd );
$good_3 = key ( $bd );


#Получение данных о ценах
$price_1 = $my_buy_1['цена'] ;
$price_2 = $my_buy_2['цена'] ;
$price_3 = $my_buy_3['цена'] ;

#Получение данных о количестве товара
$quantity_1 = $my_buy_1['количество заказано'];     //Сделаем из неё глобальную переменную $a = 1;
$quantity_2 = $my_buy_2['количество заказано'];
$quantity_3 = $my_buy_3['количество заказано'];

$quantity_store_1 = $my_buy_1['осталось на складе'];
$quantity_store_2 = $my_buy_2['осталось на складе'];
$quantity_store_3 = $my_buy_3['осталось на складе'];

                  
#Количество товара к оплате
if ($quantity_1 <= $quantity_store_1) {
    $quantity_final_1 = $quantity_1;
    $notification_1 = '';
} else {
    $quantity_final_1 = $quantity_store_1;
    $notification_1 = 'Требуемого количество товара на складе не оказалось';
}

if ($quantity_2 <= $quantity_store_2) {
    $quantity_final_2 = $quantity_2;
    $notification_2 = '';
} else {
    $quantity_final_2 = $quantity_store_2;
    $notification_2 = 'Требуемого количество товара на складе не оказалось';
}

if ($quantity_3 <= $quantity_store_3) {
    $quantity_final_3 = $quantity_3;
    $notification_3 = '';
} else {
    $quantity_final_3 = $quantity_store_3;
    $notification_3 = 'Требуемого количество товара на складе не оказалось';
}


#Получение данных о скидках
$discount_1 = $my_buy_1['diskont'];
$discount_2 = $my_buy_2['diskont'];
$discount_3 = $my_buy_3['diskont'];

#Скидка_1 (через switch)
switch ($discount_1) {
    case 'diskont 1': {
            $discount_1 = substr($discount_1, -1) * 10 . '%';
            break;
        }
    case 'diskont 2': {
            $discount_1 = substr($discount_1, -1) * 10 . '%';
            break;
        }
    default:
        $discount_1 = 'скидок нет';
            break;
}
#Скидки (через if)
if ( $discount_2 !== 'diskont 0' ) {
    $discount_2 = substr($discount_2, -1)*10 .'%';
} 
else {
    $discount_2 = 'скидок нет';
    
}
if ( $discount_3 !== 'diskont 0' ) {
    $discount_3 = substr($discount_3, -1)*10 .'%';
} 
else {
    $discount_3 = 'скидок нет';
    
}

if ( $quantity_3 >= 3 && $quantity_store_3 >= $quantity_3  ) {
    $discount_3 = 30 .'%';
} 

#Сумма покупок в ячейках 'Всего'
if ($discount_1 !== 'скидок нет' || $discount_2 !== 'скидок нет' || $discount_3 !== 'скидок нет' ) {
    $total_1 = $quantity_final_1 * $price_1 * (1 - $discount_1/100);        
    $total_2 = $quantity_final_2 * $price_2 * (1 - $discount_2/100);
    $total_3 = $quantity_final_3 * $price_3 * (1 - $discount_3/100);
}   else {
    $total_1 = $quantity_final_1 * $price_1 * 1;        
    $total_2 = $quantity_final_2 * $price_2 * 1;
    $total_3 = $quantity_final_3 * $price_3 * 1;
}   

#Использование переменных глобал и статик
function Test_g ($quantity_store_1) {
    global $quantity_1;
       if ($quantity_1 > $quantity_store_1) {
        $quantity_1 = $quantity_store_1;
     }
}
Test_g ($quantity_store_1);  
$q = $quantity_1 + $quantity_2 + $quantity_3;       //не забыть бы вывести
$total_total = $total_1 + $total_2 + $total_3;
$c = count($bd);

function Test_s ( $p) {
    static $a = 0;
    $a = $a + $p;
    #echo '<br>';
    #echo 'Сумма покупок', $a;
    return $a;
}
Test_s($total_1);
Test_s($total_2);
$tt = Test_s($total_3);



#Вывод данных
echo '<h3> Корзина </h3>';
echo 'Всего товаров в корзине - '.$c.' товара';
echo '<br>';
echo '<br>';
echo "<table> 
<tr> <td>|Наименование товара|</td> <td>|Цена, руб.|</td> <td>|Кол.|</td> <td>|Кол. на складе|</td> <td>|Скидка на товар|</td> <td>|Всего, руб.|</td> <td>|Уведомления|</td> </tr> 
<tr> <td>$good_1</td> <td>$price_1</td> <td>$quantity_1</td> <td>$quantity_store_1</td> <td>$discount_1</td> <td>$total_1</td> <td>$notification_1</td></tr> 
<tr> <td>$good_2</td> <td>$price_2</td> <td>$quantity_2</td> <td>$quantity_store_2</td> <td>$discount_2</td> <td>$total_2</td> <td>$notification_2</td> </tr> 
<tr> <td>$good_3</td> <td>$price_3</td> <td>$quantity_3</td> <td>$quantity_store_3</td> <td>$discount_3</td> <td>$total_3</td> <td>$notification_3</td> </tr> 
<tr> <td></td> <td></td> <td></td> <td></td> <td>Итого</td> <td>$total_total</td> </tr> 
</table>"; 
echo '<h4> К оплате - '.$tt.' руб. </h4>';
 ?>