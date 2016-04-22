<?php

# Подключени к MySQL
# Установка соединения
$db_of_ads = mysql_connect( 'localhost', 'alek', '123' ) or die( 'Server is not available' . mysql_error() );

# Выбор базы данных
mysql_select_db( 'dz9table', $db_of_ads ) or die( 'Database is not found' . mysql_error() );

# Установка кодировки
mysql_query( "SET NAMES 'utf8'" );


?>