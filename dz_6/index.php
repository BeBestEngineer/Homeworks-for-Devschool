<?php
header('Content-type: text/html; charset=utf-8');
error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE|E_ALL);
ini_set('display_errors', 1);

# Подключение файла с функциями
require_once 'ads_function.php';

session_start();

if ( count( $_POST ) !==0 ) {
    $_SESSION['a'][] = $_POST;
}

# Подключение файла с формой
require_once 'ads_form.php';

# Удаление объявления
if ( intval( isset( $_GET ['del_ad'] ))) {
    Del_Ad ();
}

# Редактирование объявления
if ( intval( isset( $_GET ['edit_ad'] ))) {
    Edit_Ad ();    
}

# Вывод списка объявлений
if ( isset( $_SESSION['a'] ) && count( $_SESSION['a'] ) !== 0 ) {
    require_once 'ads_database.php';
}

?>