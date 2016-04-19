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

# Добавление объявления
if ( isset( $_POST['Button_pressed'] ) && $_POST['Button_pressed'] == 'Add!' ) {
    Adding_Ad( $ads_data_base_string, $array_from_file );

# Редактирование объявления    
} elseif ( isset( $_POST['Button_pressed'] ) && $_POST['Button_pressed'] == 'Edit!' ) {   
    Edit_Ad ( $ads_data_base_string, $array_from_file );
}    

# Удаление объявления
if ( isset( $_GET ['del_ad'] )) {
    Del_Ad ( $ads_data_base_string, $array_from_file );
}

if ( isset($_GET['ad_show']) ) {
    $form_header = 'Edit' . ' ad';
    $action_adress = $_SERVER['SCRIPT_NAME'] . '?edit_ad=' . intval($_GET['ad_key']);
    $data_of_ad = $array_from_file[intval($_GET['ad_key'])];
    $name_of_button = 'Edit!';
} else {
    $form_header = 'Adding' . ' ad';
    $action_adress = $_SERVER['SCRIPT_NAME'];
    $data_of_ad = array();     // - убрать, сделать вывод об ошибке, если объявления не существует, сделать проверку на существования массива объявления isset($array_from_file( intval( $_GET[ 'ad_key' ] ) ) ) (key в двумерном массиве объявлений)
    $name_of_button = 'Add!';
}

# Функция вывода форм на экран
Conclusion_of_forms_on_the_screen ( $smarty, $array_from_file, $ads_data_base_string, $form_header, $action_adress, $data_of_ad, $name_of_button );

?>