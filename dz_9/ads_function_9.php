<?php

#Функция добавления объявления
function Adding_Ad () {
    mysql_query( "INSERT INTO `ads` (`name`, `e_mail`, `phone_number`, `city_id`, `category`, `title`, `description`, `price`)
                             VALUES ('$_POST[n]', '$_POST[e]', '$_POST[pn]', '$_POST[city_id]', '$_POST[cat_id]', '$_POST[t]', '$_POST[d]', '$_POST[p]');" ) or die( 'Error - ' . mysql_error() );
}

# Функция редактирования объявления
function Edit_Ad () {
    mysql_query( "UPDATE `ads` SET
                `id` = '$_GET[edit_ad]', 
                `name` = '$_POST[n]',
                `e_mail` = '$_POST[e]',
                `phone_number` = '$_POST[pn]',
                `city_id` = '$_POST[city_id]',
                `category` = '$_POST[cat_id]',
                `title` = '$_POST[t]',
                `description` = '$_POST[d]',
                `price` = '$_POST[p]'
                 WHERE `id` = '$_GET[edit_ad]';" ) or die( 'Error - ' . mysql_error() );            
}

# Функция удаления объявления
function Del_Ad () {
    mysql_query( "DELETE FROM `ads` WHERE ((`id` = '$_GET[del_ad]'));" ) or die( 'Error - ' . mysql_error() );
}

# Функция чтения базы данных
function Wri_Data_Base () {
    $ads_from_db = mysql_query( 'select * from ads' ) or die( 'Error - ' . mysql_error() );
        
    if ( mysql_num_rows( $ads_from_db ) > 0 ) {    
            while ( $row = mysql_fetch_assoc( $ads_from_db )) {
                $array_of_ads[ $row[ 'id' ] ] = $row;
            }
        } else {
            $array_of_ads = array();
        }        
    mysql_free_result( $ads_from_db );    
return $array_of_ads;
}

# Создание массива для селектора городов
function Sel_of_Cities () {
    $russland_from_db = mysql_query( 'select * from russland' ) or die( 'Table is not found' . mysql_error() );

    while ( $russland_from_db_print = mysql_fetch_assoc( $russland_from_db )) {
        $array_of_cities[ $russland_from_db_print[ 'region' ] ][ $russland_from_db_print[ 'id_city' ] ] = $russland_from_db_print[ 'city' ];       
    }
    mysql_free_result( $russland_from_db );
return $array_of_cities;    
}

# Создание массива для селектора категорий
function Sel_of_Categories () {
    $categories_from_db = mysql_query( 'select * from categories' ) or die( 'Table is not found' . mysql_error() );

    while ( $categories_from_db_print = mysql_fetch_assoc( $categories_from_db )) {
        $array_of_cities[ $categories_from_db_print[ 'section_category' ] ][ $categories_from_db_print[ 'id_category' ] ] = $categories_from_db_print[ 'category' ];       
    }
    mysql_free_result( $categories_from_db );
return $array_of_cities;    
}

# Функция вывода форм на экран
function Conclusion_of_forms_on_the_screen ( $smarty, $form_header, $action_adress, $data_of_ad, $name_of_button ) {

    # Данные для вывода на экран формы для добавления/редактирования объявлений
    $smarty->assign('form_header', $form_header);
    $smarty->assign('action_adress', $action_adress);
    $smarty->assign( 'data_of_ad', $data_of_ad );
    $smarty->assign('name_of_button', $name_of_button);
        # Селекторы городов и категорий
        $smarty->assign('array_for_city_select', Sel_of_Cities() );
        $smarty->assign('array_for_category_select', Sel_of_Categories() );

    # Данные для вывода на экран списка объявлений
    $smarty->assign('array_of_ads', Wri_Data_Base() );

    # Вывод на экран
    $smarty->display('ads_form_9.tpl');    
}

?>
