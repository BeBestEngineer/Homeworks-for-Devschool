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

# Функция записи в файл
function Wr_to_file ( $adb, $array_from_file ) {
    file_put_contents( $adb, serialize( $array_from_file ));
}

# Функция вывода данных для добавления объявления
function Show_ad_for_add () {
    $ad_template = array (
        'n' => 'Name',
        'e' => 'Name@mail.com',
        'pn' => '+7-xxx-xxx-xx-xx',
        'city_id' => '',
        'cat_id' => '',
        't' => 'Title',
        'd' => 'Description',
        'p' => 'Price'
    );
return $ad_template;    
}

# Функция вывода данных для редактирования объявления
function Show_ad_for_edit ( $adb, $array_from_file ) {
    $edit_value =  $array_from_file[ intval( $_GET[ 'ad_key' ]) ];
return $edit_value;
}

?>
