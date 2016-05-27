<?php

$project_root = $_SERVER['DOCUMENT_ROOT'];
    
# Подключение DBsimple к базе данных
class Db {
    private static $instance = NULL;
    private $db;   
    
    private function __construct() {
        global $project_root;
        require_once $project_root."/dbsimple/config.php";
        require_once $project_root."/dbsimple/DbSimple/Generic.php";
            $this -> db = @DbSimple_Generic::connect( 'mysqli://alek:123@localhost/dz9table?charset=utf-8' );
    }    
    public static function instance() {
        if ( self::$instance == NULL ) {
             self::$instance = new Db();
        }
        return self::$instance -> db;
    }
}

# Подключаем к базе обработчик ошибок
$db = Db::instance();
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