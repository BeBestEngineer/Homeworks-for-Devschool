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

    
# Вывод формы с данными редактируемого объявления и списка объявлений
if ( isset( $_GET[ 'ad_show' ])) {                            
    $data_of_ad = $some_ad -> Read_edit_ad( $db );
    $some_ad -> AdsBoard( $smarty, $db, $data_of_ad, $data_of_ad[ 'id' ] );    
        
# Вывод формы-шаблона для нового объявления и списка объявлений   
} else {    
# Ядро контроллера
    if ( isset( $_POST[ 'Button_pressed' ])) {
        
        if ( $_POST[ 'Button_pressed' ] == 'Add!' ) {             # Запись нового объявления в базу данных
            $some_ad -> Adding_Ad( $db );
            
        } elseif ( $_POST[ 'Button_pressed' ] == 'Edit!' ) {      # Перезапись отредактированного объявления в базе  данных
            $some_ad -> Edit_Ad( $db );
        }
        
    } elseif ( isset( $_GET [ 'del_ad' ])) {                      # Удаление объявления из базы данных
            $some_ad -> Del_Ad( $db );            
    }
    
    $some_ad -> AdsBoard( $smarty, $db );
}
?>