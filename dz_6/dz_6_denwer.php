<?php
header('Content-type: text/html; charset=utf-8');
error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE|E_ALL);
ini_set('display_errors', 1);



session_start();
$_SESSION['a'][] = $_POST;

require_once 'function_denwer.php';
require_once 'form_denwer.php';

$h1 = '<h1>e-Shop</h1>';
$n1 = '<i>&nbsp For adding ad, please fill form \'Adding ad\' and press \'Add!\'.</i> <br>';
$n2 = '<i>&nbsp &nbsp For show ad, press \'Ad Title\' hyperlink.</i> <br>';

#Точка входа
    if ( !isset( $_GET ['del_ad']) ) {
        echo $h1;
        echo $n1;
        echo $n2;
            Adding_Ad();    
            Ads_Database();
            Cleaning_session();
    }

#Просмотр объявления из базы данных
    if ( isset( $_GET ['ad_show'] ) ) {
        Ad_Show ();
        Cleaning_session();
    }
    
#Удаление объявления
    if ( isset( $_GET ['del_ad'] ) ) {
        echo $h1;
        echo $n1;        
        echo $n2;        
            Del_Ad();
            Adding_Ad();    
            Ads_Database();
            Cleaning_session();
    }
?>