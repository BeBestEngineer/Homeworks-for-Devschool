<?php

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

?>