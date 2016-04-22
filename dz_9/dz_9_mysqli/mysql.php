<?php

# Подключени к MySQL
# Установка соединения
$db_of_ads = mysqli_connect( 'localhost', 'alek', '123', 'dz9table' ); 

    if ( mysqli_connect_errno() ) {
        printf( "Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    
# Установка кодировки
    if ( !mysqli_set_charset( $db_of_ads, "utf8" )) {
        printf( "Error when loading a set of characters utf8: %s\n", mysqli_error( $db_of_ads ));
    } else {
        mysqli_set_charset( $db_of_ads, "utf8" );        
    }
    
?>