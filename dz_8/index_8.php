<?php
header('Content-type: text/html; charset=utf-8');
error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE|E_ALL);
ini_set('display_errors', 1);

# Подключение Smarty
    // put full path to Smarty.class.php
$project_root = $_SERVER['DOCUMENT_ROOT'];
$smarty_dir = $project_root . '/smarty/';

require( $smarty_dir . 'libs/Smarty.class.php');
$smarty = new Smarty();
    // Обращаемся к свойствам объекта чтобы выставить конфигурации
$smarty->compile_check = true;  
$smarty->debugging = false;

$smarty->template_dir = $smarty_dir . 'templates';
$smarty->compile_dir =  $smarty_dir . 'templates_c';
$smarty->cache_dir =    $smarty_dir . 'cache';
$smarty->config_dir =   $smarty_dir . 'configs';


# Аргументы для функций
$adb = 'Ads_data_base_8.php';

# Проверка состояния файла 
if ( file_exists( $adb ) ) {
    $array_from_file = unserialize( file_get_contents ( $adb ));    
} else {
    $array_from_file = array();    
}

# Подключение файла с функциями
require_once 'ads_function_8.php';

# Добавление объявления
if ( isset( $_POST['Button_pressed'] ) && $_POST['Button_pressed'] == 'Add!' ) {
    Adding_Ad( $adb, $array_from_file );

# Редактирование объявления    
} elseif ( isset( $_POST['Button_pressed'] ) && $_POST['Button_pressed'] == 'Edit!' ) {   
    Edit_Ad ( $adb, $array_from_file );
}    

# Удаление объявления
if ( isset( $_GET ['del_ad'] )) {
    Del_Ad ( $adb, $array_from_file );
}

# Управление выводом в шаблоне
    # Подключение файла с БД городов
    require_once 'cities.php';
    # Подключение файла с БД категорий
    require_once 'categories.php'; 

if ( isset( $_GET[ 'ad_show' ]) ) {
    $fh = 'Edit'.' ad';
    $aa = $_SERVER[ 'SCRIPT_NAME' ].'?edit_ad='.intval( $_GET[ 'ad_key' ] );
    $safe = Show_ad ( $array_from_file );
        $cs = $safe[ 'city_id' ];
        $cats = $safe[ 'cat_id' ];        
    $nob = 'Edit!';
} else {
    $fh = 'Adding'.' ad';
    $aa = $_SERVER[ 'SCRIPT_NAME' ];
    $safe = Show_ad ();
        $cs = '';
        $cats = '';
    $nob = 'Add!';
}    

$smarty->assign('form_header', $fh);
$smarty->assign('action_adress', $aa);
$smarty->assign( 'data_of_ad', $safe );
    $smarty->assign('array_for_city_select', $russland);
    $smarty->assign( 'the_selected_city', $cs );
    $smarty->assign('array_for_category_select', $categories);
    $smarty->assign('the_selected_category', $cats );
$smarty->assign('name_of_button', $nob);


# Вывод списка объявлений из файла
$smarty->assign('ads_data_base', $adb );
$smarty->assign('aff_to_tpl', unserialize( file_get_contents ( $adb )) );
    
# Вывод на дисплей    
$smarty->display('ads_form_8.tpl');
?>