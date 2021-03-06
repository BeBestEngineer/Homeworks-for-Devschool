<?php

#Функция добавления объявления
function Adding_Ad ( $db_of_ads ) {
    mysqli_query( $db_of_ads, "INSERT INTO `ads` (`name`, `e_mail`, `phone_number`, `city_id`, `category`, `title`, `description`, `price`)
                             VALUES ('$_POST[n]', '$_POST[e]', '$_POST[pn]', '$_POST[city_id]', '$_POST[cat_id]', '$_POST[t]', '$_POST[d]', '$_POST[p]');" ) or die( 'Error 1 - ' . mysqli_error( $db_of_ads ));
}

# Функция редактирования объявления
function Edit_Ad ( $db_of_ads ) {
    mysqli_query( $db_of_ads, "UPDATE `ads` SET
                `id` = '$_POST[ad_key]', 
                `name` = '$_POST[n]',
                `e_mail` = '$_POST[e]',
                `phone_number` = '$_POST[pn]',
                `city_id` = '$_POST[city_id]',
                `category` = '$_POST[cat_id]',
                `title` = '$_POST[t]',
                `description` = '$_POST[d]',
                `price` = '$_POST[p]'
                 WHERE `id` = '$_POST[ad_key]';" ) or die( 'Error 2 - ' . mysqli_error( $db_of_ads ));            
}

# Функция удаления объявления
function Del_Ad ( $db_of_ads ) {
    mysqli_query( $db_of_ads, "DELETE FROM `ads` WHERE ((`id` = ".intval( $_GET[ 'del_ad' ])."));" ) or die( 'Error 3 - ' . mysqli_error( $db_of_ads ));
}

# Функция чтения всех объявлений из базы данных
function Read_all_ads ( $db_of_ads ) {
    $ads_from_db = mysqli_query( $db_of_ads, 'select * from ads' ) or die( 'Error 4 - ' . mysqli_error( $db_of_ads ));
        
    if ( mysqli_num_rows( $ads_from_db ) > 0 ) {    
            while ( $row = mysqli_fetch_assoc( $ads_from_db )) {
                $array_of_ads[ $row[ 'id' ] ] = $row;
            }                        
        } else {
            $array_of_ads = array();
        }        
        mysqli_free_result( $ads_from_db );
return $array_of_ads;
}

# Функция чтения редактируемого объявления из базы данных
function Read_edit_ad ( $db_of_ads ) {
    $ad_from_db = mysqli_query( $db_of_ads, 'select * from ads where id ='.intval( $_GET[ 'ad_key' ])) or die( 'Error 4 - ' . mysqli_error( $db_of_ads ));
        $data_of_ad = mysqli_fetch_assoc( $ad_from_db );
      
        mysqli_free_result( $ad_from_db );
return $data_of_ad;
}

# Создание массива для селектора городов
function Sel_of_Cities ( $db_of_ads ) {
    $russland_from_db = mysqli_query( $db_of_ads, 'select * from russland' ) or die( 'Error 5 - ' . mysqli_error( $db_of_ads ));
    
    while ( $russland_from_db_print = mysqli_fetch_assoc( $russland_from_db )) {
        $array_of_cities[ $russland_from_db_print[ 'region' ] ][ $russland_from_db_print[ 'id_city' ] ] = $russland_from_db_print[ 'city' ];       
    }
   
    mysqli_free_result( $russland_from_db );
return $array_of_cities;    
}

# Создание массива для селектора категорий
function Sel_of_Categories ( $db_of_ads ) {
    $categories_from_db = mysqli_query( $db_of_ads, 'select * from categories' ) or die( 'Error 6 - ' . mysqli_error( $db_of_ads ));

    while ( $categories_from_db_print = mysqli_fetch_assoc( $categories_from_db )) {
        $array_of_categories[ $categories_from_db_print[ 'section_category' ] ][ $categories_from_db_print[ 'id_category' ] ] = $categories_from_db_print[ 'category' ];       
    }
    mysqli_free_result( $categories_from_db );
return $array_of_categories;    
}

# Функция вывода форм на экран
function Output_forms ( $smarty, $key_of_ad, $data_of_ad, $db_of_ads ) {

    # Данные для вывода на экран формы для добавления/редактирования объявлений
    $smarty->assign('action_adress', $_SERVER[ 'SCRIPT_NAME' ] );
    $smarty->assign( 'data_of_ad', $data_of_ad );
        # Селекторы городов и категорий
        $smarty->assign('array_for_city_select', Sel_of_Cities( $db_of_ads ) );
        $smarty->assign('array_for_category_select', Sel_of_Categories( $db_of_ads ) );
    
    $smarty->assign( 'key_of_ad', $key_of_ad );        
        
    # Данные для вывода на экран списка объявлений
    $smarty->assign('array_of_ads', Read_all_ads( $db_of_ads ) );

    # Вывод на экран
    $smarty->display('ads_form_9.tpl');
}

?>