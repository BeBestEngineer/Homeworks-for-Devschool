<?php
error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE);
ini_set('display_errors', 1);

require_once 'functions.php';
require_once 'form.php';

session_start();
$_SESSION['a'][] = $_POST;

#Главная страница
    if ( !isset( $_GET ['main'] ) && !isset( $_GET ['adding_ad'] ) && !isset( $_GET ['ads_database'] ) && !isset( $_GET ['ad_show'] ) ) {
        Main();
    }

#Страница добавления нового объявления
    if ( isset( $_GET ['adding_ad'] ) ) {
        Adding_Ad();
    }

#Страница базы данных объявлений
     if ( isset( $_GET ['ads_database'] ) ) {
        Ads_Database();
    }
    
#Страница объявления из базы данных
    if ( isset( $_GET ['ad_show'] ) ) {
        Ad_Show ();
    }
    
#Удаление объявления
    if ( isset( $_GET ['del_ad'] ) ) {
        Del_Ad();
    }
?>