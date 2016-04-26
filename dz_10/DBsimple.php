<?php

$project_root = $_SERVER['DOCUMENT_ROOT'];

# Подключение DBsimple
require_once $project_root."/dbsimple/config.php";
require_once $project_root."/dbsimple/DbSimple/Generic.php";
    
# Подключение DBsimple к базе данных
$db = DbSimple_Generic::connect( 'mysqli://alek:123@localhost/dz9table?charset=UTF8' );

        // Как проверить удалось подключить кодирвоку или нет ???

# Подключаем к базе обработчик ошибок
$db -> setErrorHandler( 'databaseErrorHandler' );

# Обработчик ошибок при выполнении  SQL запросов
function databaseErrorHandler( $message, $info ) {
    if ( !error_reporting() ) return;
 
    echo "SQL Error: $message <br><pre>"; 
    print_r( $info );
    echo "</pre>";
    exit();
}

?>