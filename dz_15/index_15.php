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
    
    # Запись данных нового или отредактированного объявления в базу данных и создание хранилища
    if ( !isset( $_GET[ 'ad_show' ])) {                                 
        
        if ( isset( $_POST[ 'Button_pressed' ])) {
            if ( $_POST[ 'seller_type' ] == 'Company' ) {
                $ad = new CompanyAds( $_POST );
            }
            elseif ( $_POST[ 'seller_type' ] == 'Individual' ) {
                $ad = new IndividualAds( $_POST );
            }
        }
        $repository -> create_Storage();
        $data_of_ad = NULL;
    
    # Чтение данных редактируемого объявления из хранилища
    } else {
        $data_of_ad = $repository -> Get_data_of_ad_from_storage();
    }
    
    $repository -> Output_forms_to_display( $smarty, $data_of_ad, $data_of_ad[ 'id' ] );
    
?>