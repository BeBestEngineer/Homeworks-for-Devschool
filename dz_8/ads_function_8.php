<?php

#Функция добавления объявления
function Adding_Ad( $adb, $array_from_file ) {
        $array_from_file[] = $_POST;
            Wr_to_file ( $adb, $array_from_file );
}

# Функция удаления объявления
function Del_Ad( $adb, $array_from_file ) {
        unset( $array_from_file[ intval( $_GET[ 'del_ad' ]) ] );
            Wr_to_file ( $adb, $array_from_file );
}

# Функция редактирования объявления
function Edit_Ad ( $adb, $array_from_file ) {
        $array_from_file[ intval( $_GET[ 'edit_ad' ]) ] = $_POST;
            Wr_to_file ( $adb, $array_from_file );
}

# Функция чтения файла
function Re_to_file( $adb ) {
    $array_from_file = unserialize( file_get_contents ( $adb ));
    return $array_from_file;
}

# Функция записи в файл
function Wr_to_file ( $adb, $array_from_file ) {
    file_put_contents( $adb, serialize( $array_from_file ));
}

# Функция вывода данных формы
function Show_ad ( $array_from_file = '' ) {
    if ( is_array( $array_from_file ) ) {
        $ad_unive =  $array_from_file[ intval( $_GET[ 'ad_key' ]) ];
    } else {
        $ad_unive = array ();
    }
    return $ad_unive;
}
?>
