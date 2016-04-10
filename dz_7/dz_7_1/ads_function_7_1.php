<?php

#Функция добавления объявления
function Adding_Ad() {
    if ( isset( $_COOKIE['ads'] ) ) {
    $from_cookie = unserialize( $_COOKIE['ads'] );
    } else {
        $from_cookie = array();
    }
        array_push( $from_cookie, $_POST );
            $time = time() + 60*60*24*7;                    //Время существования cookie в браузере
        $from_cookie = serialize( $from_cookie );
        setcookie( 'ads', $from_cookie, $time );
        header("Location: http://dz_7_1.loc/index7_1.php");
    exit;
        
}

# Функция удаления объявления
function Del_Ad() {
    $uns_COOKIE = unserialize( $_COOKIE['ads'] );
    unset ( $uns_COOKIE[ intval( $_GET['del_ad'] ) ] );
    $from_cookie = serialize( $uns_COOKIE );
        $time = time() + 60*60*24*7;                        //Время существования cookie в браузере
    setcookie( 'ads', $from_cookie, $time );
    header("Location: http://dz_7_1.loc/index7_1.php");
    exit;    
}

# Функция удаления всех объявлений
function Del_Ad_All () {
    setcookie( 'ads', '', time() -10 );
    header("Location: http://dz_7_1.loc/index7_1.php");
    exit;
}

# Функция редактирования объявления
function Edit_Ad () {
    $uns_COOKIE = unserialize( $_COOKIE['ads'] );          
    $uns_COOKIE[ intval( $_GET['edit_ad']) ] = $_POST;
    $from_cookie = serialize( $uns_COOKIE );
        $time = time() + 60*60*24*7;                        //Время существования cookie в браузере
    setcookie( 'ads', $from_cookie, $time );
    header("Location: http://dz_7_1.loc/index7_1.php");
    exit;    
}

# Функция вывода добавленных объявлений
function Ads_Database() {    
    foreach ( unserialize( $_COOKIE['ads'] ) as $key => $value ) {     
                $key_a = $key;
                $value_a = $value;
        if ( isset($value_a['t']) && $value_a['t'] !== '' ) {                                       
            echo '<tr>'
                .'<td> <a href = "?ad_show='.$value_a['t'].'&ad_key='.$key_a.'"> '.$value_a['t'].' </a> </td> <td> '.$value_a['p'].' </td> <td> '.$value_a['n'].' </td>'
                .'<td> <a href = "?del_ad='.$key_a.'"> Remove ad </a> </td>'                
            .'</tr>';
        }
    }
}

# Селектор города
function City_select ( $adding_city_name='' ) {
    
    # Подключение файла с БД городов
    require_once 'cities.php';
    
        foreach( $russland as $region_name => $city_array ) {
            echo '<optgroup label = "'.$region_name.'" >';
                foreach( $city_array as $city_name ) { 
                    $put_selected_city = ( $city_name == $adding_city_name ) ? 'selected' : '';
                    echo '<option value = "'.$city_name.'" '.$put_selected_city.' > '.$city_name.' </option>';
            }
            echo '</optgroup>';
        }    
}    
  
# Селлектор категории
function Category_select ( $adding_category_name='' ) {
    
    # Подключение файла с БД категорий
    require_once 'categories.php';    
    
            foreach( $categories as $cat_name => $sub_cat_array ) {
            echo '<optgroup label = "'.$cat_name.'" >';
                foreach( $sub_cat_array as $sub_cat ) { 
                    $put_selected_cat = ( $sub_cat == $adding_category_name ) ? 'selected' : '';
                    echo '<option value = "'.$sub_cat.'" '.$put_selected_cat.' > '.$sub_cat.' </option>';
            }
            echo '</optgroup>';
        }    
}
?>
