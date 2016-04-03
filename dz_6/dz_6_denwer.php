<?php
header('Content-type: text/html; charset=utf-8');
error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE|E_ALL);
ini_set('display_errors', 1);

session_start();
$_SESSION['a'][] = $_POST;

# Подключение файла с функциями
include_once 'dz_6_function_denwer.php';

# Очистка сессии от пустых массивов
Cleaning_session();

# Добавление объявления 
if ( !isset( $_GET ['edit_ad'] ) ) {
    include_once 'form_ad.php';
}

# Удаление объявления
if ( isset( $_GET ['del_ad'] ) ) {
    Del_Ad ();    
}

# Редактирование объявления 
if ( isset( $_GET ['edit_ad'] ) ) {
    Edit_Ad ();
    $from_ad = Edit_Ad ();
    include_once 'form_edit_ad.php';
    if (count($_POST) !== 0) {
        Put_corrected_ad ();
    }    
}

# Вывод на экран добавленных объявлений
if ( count( $_SESSION['a'] ) !== 0 ) {
    include_once 'ads_database.php';
}

# Вывод на экран информации из добавленного объявления
if ( isset( $_GET ['ad_show'] ) ) {
    $a_a = Ss ();
    include_once 'about_ad.php';
}

?>