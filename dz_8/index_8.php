<?php
header('Content-type: text/html; charset=utf-8');
error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE|E_ALL);
ini_set('display_errors', 1);
/*
# Подключение Smarty
// put full path to Smarty.class.php
$project_root = $_SERVER['DOCUMENT_ROOT'];
$smarty_dir = $project_root . '/smarty/';

require('/smarty/libs/Smarty.class.php');
$smarty = new Smarty();
    // Обращаемся к свойствам объекта чтобы выставить конфигурации
$smarty->compile_check = true;  
$smarty->debugging = true;

$smarty->template_dir = $smarty_dir . 'templates';
$smarty->compile_dir =  $smarty_dir . 'templates_c';
$smarty->cache_dir =    $smarty_dir . 'cache';
$smarty->config_dir =   $smarty_dir . 'configs';

$smarty->assign('name', 'Ned');
$smarty->display('index.tpl');
*/



# Аргументы для функций
$adb = 'Ads_data_base_8.php';

# Подключение файла с функциями
require_once 'ads_function_8.php';

# Добавление объявления
if ( isset( $_POST['Button_pressed'] ) && $_POST['Button_pressed'] == 'Add!' ) {
    Adding_Ad( $adb );

# Редактирование объявления    
} elseif ( isset( $_POST['Button_pressed'] ) && $_POST['Button_pressed'] == 'Edit!' ) {   
    Edit_Ad ( $adb );
}    

# Удаление объявления
if ( isset( $_GET ['del_ad'] )) {
    Del_Ad ( $adb );
}

# Вывод данных объявления для редактирования
isset( $_GET[ 'ad_show' ] ) ? $safe = Show_ad_for_edit ( $adb ) : '';

# Подключение файла с формой
require_once 'ads_form_8.php';

?>