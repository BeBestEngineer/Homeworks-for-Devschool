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
    require_once 'classes_15.php';
    
    
    $repository = AdsRepository::instance();
    
    # Добавление, редактирование объявления компании или частного лица
    if ( isset( $_POST[ 'Button_pressed' ])) {                                 
        
        if ( $_POST[ 'seller_type' ] == 'Company' ) {
            $ad = new CompanyAds( $_POST );
        }
        elseif ( $_POST[ 'seller_type' ] == 'Individual' ) {
            $ad = new IndividualAds( $_POST );
        }
        
    # Удаление объявления    
    } elseif ( isset( $_GET [ 'del_id' ])) {                                   
        $repository -> Remove_from_db();            
    }
    
    $repository -> Output_forms_to_display( $smarty );

?>