<?php
header('Content-type: text/html; charset=utf-8');
error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE|E_ALL);
ini_set('display_errors', 1);

# Подключение файла с функциями
require_once 'ads_function.php';

session_start();

# Добавление объявления
if ( isset( $_POST['Button_pressed'] ) && $_POST['Button_pressed'] == 'Add!' ) {
    $_SESSION['a'][] = $_POST;
}

# Редактирование объявления
if ( isset( $_POST['Button_pressed'] ) && $_POST['Button_pressed'] == 'Edit!' ) {
    $_SESSION['a'][] = $_POST;
    Edit_Ad ();    
}

# Удаление объявления
if ( intval( isset( $_GET ['del_ad'] ))) {
    Del_Ad ();
}

# Подключение файла с формой
require_once 'ads_form.php';

?>