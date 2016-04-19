<?php

header('Content-type: text/html; charset=utf-8');
error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE|E_ALL);
ini_set('display_errors', 1);

    # Подключение шаблонизатора
    require_once 'smarty.php';

    # Подключение файла с функциями
    require_once 'ads_function_8.php';

    # Аргументы для передачи функциям
    $ads_data_base_string = 'Ads_data_base_8.php';

    # Массив объявлений для передачи функциям
    $array_from_file = Re_to_file( $ads_data_base_string );


if ( isset( $_POST['Button_pressed']) ) {
    
    if ( $_POST['Button_pressed'] == 'Add!' ) {
        Adding_Ad( $ads_data_base_string, $array_from_file );
        Wr_to_file ( $ads_data_base_string, $array_from_file );
        
    }elseif ( $_POST['Button_pressed'] == 'Edit!' ) {
        Edit_Ad ( $ads_data_base_string, $array_from_file );
        Wr_to_file ( $ads_data_base_string, $array_from_file );
    }
    
} elseif ( isset( $_GET ['del_ad']) ) {
    Del_Ad ( $ads_data_base_string, $array_from_file );
    Wr_to_file ( $ads_data_base_string, $array_from_file );
    
} elseif ( isset( $_GET ['ad_show']) ) {
    $form_header = 'Edit' . ' ad';
    $action_adress = $_SERVER['SCRIPT_NAME'] . '?edit_ad=' . intval($_GET['ad_key']);
    $data_of_ad = $array_from_file[intval($_GET['ad_key'])];
    $name_of_button = 'Edit!';
        Conclusion_of_form_on_the_screen ( $smarty, $array_from_file, $ads_data_base_string, $form_header, $action_adress, $data_of_ad, $name_of_button );
} else {
    $form_header = 'Adding' . ' ad';
    $action_adress = $_SERVER['SCRIPT_NAME'];
    $data_of_ad = array();     // - убрать, сделать вывод об ошибке, если объявления не существует, сделать проверку на существования массива объявления isset($array_from_file( intval( $_GET[ 'ad_key' ] ) ) ) (key в двумерном массиве объявлений)
    $name_of_button = 'Add!';
        Conclusion_of_form_on_the_screen ( $smarty, $array_from_file, $ads_data_base_string, $form_header, $action_adress, $data_of_ad, $name_of_button );
}
    
# Данные для вывода на экран списка объявлений
$smarty->assign('ads_data_base', $ads_data_base_string);
$smarty->assign('aff_to_tpl', Re_to_file($ads_data_base_string));

# Вывод на экран
$smarty->display('ads_form_8.tpl');

?>