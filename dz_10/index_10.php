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

    # Подключение файла с функциями
    require_once 'ads_function_10.php';

        
    # Вывод формы с данными редактируемого объявления и списка объявлений
if ( isset( $_GET[ 'ad_show' ])) {                            
    # Чтение базы данных в массив
        $data_of_ad = Read_edit_ad( $db );
    Output_forms( $smarty, $db, $data_of_ad, $data_of_ad[ 'id' ] );
        
    # Вывод формы-шаблона для нового объявления и списка объявлений   
} else {    

        # Ядро контроллера
    if ( isset( $_POST[ 'Button_pressed' ])) {
        if ( $_POST[ 'Button_pressed' ] == 'Add!' ) {             # Запись нового объявления в базу данных
            Adding_Ad( $db );
            
        } elseif ( $_POST[ 'Button_pressed' ] == 'Edit!' ) {      # Перезапись отредактированного объявления в базе  данных
            Edit_Ad( $db );
        }
    } elseif ( isset( $_GET [ 'del_ad' ])) {                      # Удаление объявления из базы данных
            Del_Ad( $db );
    }

    Output_forms( $smarty, $db );    
}
?>