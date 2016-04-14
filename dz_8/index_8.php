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


# Подключение файла с функциями
require_once 'ads_function_8.php';

# Аргументы для функций
$adb = 'Ads_data_base_8.php';

# Проверка состояния файла 
if ( file_exists( $adb ) ){
    $array_from_file = unserialize( file_get_contents ( $adb ));
} else {
    $array_from_file = array();
}

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

# Вывод данных объявления для редактирования
isset( $_GET[ 'ad_show' ] ) ? $safe = Show_ad_for_edit ( $adb, $array_from_file ) : '';




# Управление выводом в шаблоне
    # Подключение файла с БД городов
    require_once 'cities.php';
    # Подключение файла с БД категорий
    require_once 'categories.php'; 

# Заголовок формы
isset( $_GET[ 'ad_show' ] ) ? $fh = 'Edit'.' ad' : $fh = 'Adding'.' ad'; 
    $smarty->assign('form_header', $fh );
    
# Адрес программы которая обрабатывает данные формы
isset( $_GET[ 'ad_show' ] ) ? $aa = $_SERVER[ 'SCRIPT_NAME' ].'?edit_ad='.intval( $_GET[ 'ad_key' ] ) : $aa = $_SERVER[ 'SCRIPT_NAME' ];
    $smarty->assign('action_adress', $aa );
    
# Элементы формы
# Имя продавца
isset( $_GET[ 'ad_show' ] ) ? $nos = $safe['n'] : $nos = 'Name';
    $smarty->assign('name_of_seller', $nos );

# Электронная почта
isset( $_GET[ 'ad_show' ] ) ? $emos = $safe['e'] : $emos = 'E-mail';
    $smarty->assign('email_of_seller', $emos );

# Номер телефона продавца
isset( $_GET[ 'ad_show' ] ) ? $pnos = $safe['pn'] : $pnos = 'Phone number';
    $smarty->assign('pn_of_seller', $pnos );

# Селектор города
isset( $_GET[ 'ad_show' ] ) ? $cs = City_select ( $russland, $safe[ 'city_id' ] ) : $cs = '';    
    $smarty->assign('array_for_city_select', $russland );
    $smarty->assign( 'the_selected_city', $cs );

# Селектор категории
isset( $_GET[ 'ad_show' ] ) ? $cats = Category_select ( $categories, $safe[ 'cat_id' ] ) : $cats = '';
    $smarty->assign('array_for_category_select', $categories );
    $smarty->assign('the_selected_category', $cats );

# Название объявления
isset( $_GET[ 'ad_show' ] ) ? $toa = $safe['t'] : $toa = 'Title';
    $smarty->assign('title_of_ad', $toa );
    
# Описание объявления
isset( $_GET[ 'ad_show' ] ) ? $doa = $safe['d'] : $doa = 'Description';    
    $smarty->assign('description_of_ad', $doa );
    
#Стоимость продаваемого товара
isset( $_GET[ 'ad_show' ] ) ? $poa = $safe['p'] : $poa = 'Price';
    $smarty->assign('price_of_ad', $poa );
    
# Название кнопки
isset( $_GET[ 'ad_show' ] ) ? $nob = 'Edit!' : $nob = 'Add!';    
    $smarty->assign('name_of_button', $nob );
    

# Вывод объявлений из файла
$smarty->assign('ads_data_base', $adb );
$smarty->assign('aff_to_tpl', unserialize( file_get_contents ( $adb )) );
    
# Вывод на дисплей    
    $smarty->display('ads_form_8.tpl');
?>