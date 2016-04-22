<?php
header('Content-type: text/html; charset=utf-8');
error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE|E_ALL);
ini_set('display_errors', 1);
    
    # Подключени к базе данных
    require_once 'mysql.php';

    # Подключение шаблонизатора
    require_once 'smarty.php';

    # Подключение файла с функциями
    require_once 'ads_function_9.php';


    # Вывод формы с данными редактируемого объявления и списка объявлений
if (isset($_GET['ad_show'])) {                            
    # Чтение базы данных в массив
        $array_of_ads = Wri_Data_Base( $db_of_ads );
    Conclusion_of_forms_on_the_screen($smarty, 'Edit' . ' ad', $_SERVER['SCRIPT_NAME'] . '?edit_ad=' . intval($_GET['ad_key']), $array_of_ads[intval($_GET['ad_key'])], 'Edit!', $db_of_ads );
    
    # Отключение от БД
    mysqli_close( $db_of_ads );
    
    # Вывод формы-шаблона для нового объявления и списка объявлений   
} else {    
    
    # Ядро контроллера
if (isset($_POST['Button_pressed'])) {
    if ($_POST['Button_pressed'] == 'Add!') {             # Запись нового объявления в базу данных
        Adding_Ad( $db_of_ads );
    } elseif ($_POST['Button_pressed'] == 'Edit!') {      # Перезапись отредактированного объявления в базе  данных
        Edit_Ad( $db_of_ads );
    }
} elseif (isset($_GET ['del_ad'])) {                      # Удаление объявления из базы данных
        Del_Ad( $db_of_ads );
}

    Conclusion_of_forms_on_the_screen($smarty, 'Adding' . ' ad', $_SERVER['SCRIPT_NAME'], array(), 'Add!', $db_of_ads );
    
    # Отключение от БД
    mysqli_close( $db_of_ads );
}

?>