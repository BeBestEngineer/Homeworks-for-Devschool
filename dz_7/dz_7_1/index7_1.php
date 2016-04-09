<?php
header('Content-type: text/html; charset=utf-8');
error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE|E_ALL);
ini_set('display_errors', 1);

# Подключение файла с функциями
require_once 'ads_function_7_1.php';

# Добавление объявления
if ( isset( $_POST['Button_pressed'] ) && $_POST['Button_pressed'] == 'Add!' ) {
    Adding_Ad();
}   

# Редактирование объявления
if ( isset( $_POST['Button_pressed'] ) && $_POST['Button_pressed'] == 'Edit!' ) {
    Edit_Ad ();
}

# Удаление объявления
if ( intval( isset( $_GET ['del_ad'] ))) {
    Del_Ad ();
}

# Удаление всех объявлений
if ( isset( $_POST['Button_del_cookie'] ) && $_POST['Button_del_cookie'] == 'Del Cookie!' ) {
    Del_Ad_All ();        
}

# Подключение файла с формой
require_once 'ads_form_7_1.php';

?>