<?php
header('Content-type: text/html; charset=utf-8');
error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE|E_ALL);
ini_set('display_errors', 1);

    # Подключение DBsimple
    require_once 'DBsimple.php';

    # Подключение FirePHP
    require_once 'FirePHP.php';

    # Подключение шаблонизатора
    require_once 'smarty.php';

    # Подключение файла с классами
    require_once 'classes_16.php';
    
$repository = AdsRepository::instance();
$repository -> Output_forms_to_display( $smarty );
    
?>