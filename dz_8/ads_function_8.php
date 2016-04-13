<?php

#Функция добавления объявления
function Adding_Ad( $adb ) {
    $array_from_file = unserialize( file_get_contents ( $adb ));
        array_push( $array_from_file, $_POST );
    file_put_contents( $adb, serialize( $array_from_file ));
}

# Функция удаления объявления
function Del_Ad( $adb ) {
    $array_from_file = unserialize( file_get_contents ( $adb ));
        unset( $array_from_file[ intval( $_GET[ 'del_ad' ]) ] );
    file_put_contents( $adb, serialize( $array_from_file ));
}

# Функция редактирования объявления
function Edit_Ad ( $adb ) {
    $array_from_file = unserialize( file_get_contents ( $adb ));
        $array_from_file[ intval( $_GET[ 'edit_ad' ]) ] = $_POST;
    file_put_contents( $adb, serialize( $array_from_file ));
}

# Функция вывода данных для редактирования объявления
function Show_ad_for_edit ( $adb ) {
    $afffed = unserialize( file_get_contents ( $adb ));
    $edit_value =  $afffed[ intval( $_GET[ 'ad_key' ]) ];
return $edit_value;
}

# Функция вывода добавленных объявлений
function Ads_Database( $adb ) {    
    foreach ( unserialize( file_get_contents ( $adb )) as $key => $value) {        
                $key_a = $key;
                $value_a = $value;            
            echo '<tr>'
                .'<td> <a href = "?ad_show='.$value_a['t'].'&ad_key='.$key_a.'"> '.$value_a['t'].' </a> </td> <td> '.$value_a['p'].' </td> <td> '.$value_a['n'].' </td>'
                .'<td> <a href = "?del_ad='.$key_a.'"> Remove ad </a> </td>'
            .'</tr>';        
    }
}

# Селектор города
function City_select ( $adding_city_name='' ) {
    
    # Подключение файла с БД городов
    require_once 'cities.php';
    
        foreach( $russland as $region_name => $city_array ) {
            echo '<optgroup label = "'.$region_name.'" >';
                foreach( $city_array as $city_name ) { 
                    $put_selected_city = ( $city_name == $adding_city_name ) ? 'selected' : '';
                    echo '<option value = "'.$city_name.'" '.$put_selected_city.' > '.$city_name.' </option>';
            }
            echo '</optgroup>';
        }    
}    
  
# Селлектор категории
function Category_select ( $adding_category_name='' ) {
    
    # Подключение файла с БД категорий
    require_once 'categories.php';    
    
            foreach( $categories as $cat_name => $sub_cat_array ) {
            echo '<optgroup label = "'.$cat_name.'" >';
                foreach( $sub_cat_array as $sub_cat ) { 
                    $put_selected_cat = ( $sub_cat == $adding_category_name ) ? 'selected' : '';
                    echo '<option value = "'.$sub_cat.'" '.$put_selected_cat.' > '.$sub_cat.' </option>';
            }
            echo '</optgroup>';
        }    
}
?>
