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

    # Подключение файла с методами
    require_once 'classes_11.php';
    
    # Подключение файла с объектами
    require_once 'objects_11.php';
    
# Вывод формы с данными редактируемого объявления и списка объявлений
if ( isset( $_GET[ 'ad_show' ])) {                            
    $data_of_ad = $some_repository -> Read_editable_ad_from_db( $db );
        $some_repository -> Output_forms_to_display( $smarty, $db, $data_of_ad, $data_of_ad[ 'id' ] );    
        
# Вывод формы-шаблона для нового объявления и списка объявлений   
} else {    

    if ( isset( $_POST[ 'Button_pressed' ])) {
        $some_ad = new Ads();
        $some_ad -> Read_data_from_form( $db, $some_repository );
        
    } elseif ( isset( $_GET [ 'del_ad' ])) {                      
        $some_repository -> Remove_from_db( $db );            
    }
    
        $some_repository -> Output_forms_to_display( $smarty, $db );
}

?>