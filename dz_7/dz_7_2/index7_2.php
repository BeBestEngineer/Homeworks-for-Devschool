<?php
header('Content-type: text/html; charset=utf-8');
error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE|E_ALL);
ini_set('display_errors', 1);

# Подключение файла с функциями
require_once 'ads_function_7_2.php';

# Добавление объявления
if ( isset( $_POST['Button_pressed'] ) && $_POST['Button_pressed'] == 'Add!' ) {
    Adding_Ad();

# Редактирование объявления    
} else if ( isset( $_POST['Button_pressed'] ) && $_POST['Button_pressed'] == 'Edit!' ) {   
    Edit_Ad ();
}    

# Удаление объявления
if ( isset( $_GET ['del_ad'] )) {
    Del_Ad ();
}

# Подключение файла с формой
require_once 'ads_form_7_2.php';

?>