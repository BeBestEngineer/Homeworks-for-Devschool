<?php

#Функция добавления объявления
function Adding_Ad( $adb, $array_from_file ) {
        array_push( $array_from_file, $_POST );
    file_put_contents( $adb, serialize( $array_from_file ));
}

# Функция удаления объявления
function Del_Ad( $adb, $array_from_file ) {
        unset( $array_from_file[ intval( $_GET[ 'del_ad' ]) ] );
    file_put_contents( $adb, serialize( $array_from_file ));
}

# Функция редактирования объявления
function Edit_Ad ( $adb, $array_from_file ) {
        $array_from_file[ intval( $_GET[ 'edit_ad' ]) ] = $_POST;
    file_put_contents( $adb, serialize( $array_from_file ));
}

# Функция вывода данных для редактирования объявления
function Show_ad_for_edit ( $adb, $array_from_file ) {
    $edit_value =  $array_from_file[ intval( $_GET[ 'ad_key' ]) ];
return $edit_value;
}

# Функция установки селектора на название города
function City_select ( $russland, $adding_city_name ) {
    foreach( $russland as $city_array ) {
        foreach( $city_array as $city_code => $city_name ) {
            if ( strval( $city_code ) == strval( $adding_city_name ) ) {
                $put_selected_city = $city_code;
                return $put_selected_city;
            } else {
                $put_selected_city = 'Empty string';
            }
        }
    }
return $put_selected_city;
}    

# Функция установки селектора на название категории
function Category_select ( $categories, $adding_category_name ) {
    foreach( $categories as $categories_array ) {
        foreach( $categories_array as $category_reduction => $category ) {
            if ( strval( $category_reduction ) == strval( $adding_category_name ) ) {
                $put_selected_category = $category_reduction;
                return $put_selected_category;               
            } else {
                $put_selected_category = 'Empty string';
            }
        }    
    }   
return $put_selected_category;
}  
?>
