<?php
header('Content-type: text/html; charset=utf-8');
error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE|E_ALL);
ini_set('display_errors', 1);

session_start();
$_SESSION['a'][] = $_POST;

# Подключение файла с функциями
include_once 'dz_6_function_denwer.php';

# Подключение файла с формой добавления объявления 
include_once 'form_adding_ad.php';

# Очистка сессии от пустых массивов
Cleaning_session();

# Удаление объявления
if ( isset( $_GET ['del_ad'] ) ) {
    Del_Ad ();    
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