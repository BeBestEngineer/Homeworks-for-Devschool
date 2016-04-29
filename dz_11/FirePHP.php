<?php

# Подключение firePHP
    require_once $project_root."/firePHP/FirePHP.class.php";
    $firePHP = FirePHP::getInstance( true );
    $firePHP -> setEnabled( true );
   
// Устанавливаем логер
$db -> setLogger( 'myLogger' );

function myLogger( $db, $sql, $caller ) {
    global $firePHP;
    
    if ( isset( $caller['file'] ) ) {
        $firePHP->group( "at ".@$caller['file'].' line '.@$caller['line'] );
    }
        $firePHP->log( $sql );
    if ( isset( $caller['file'] ) ) {
        $firePHP->groupEnd();
    }
}

?>