<?php

#Функция добавления объявления
function Adding_Ad() {
    $adb = 'Ads_data_base_7_2.php';
    $POST_to_serialize_str = serialize( $_POST ) . "\n";
    
    file_put_contents( $adb, $POST_to_serialize_str, FILE_APPEND | LOCK_EX );
}

# Функция удаления объявления
function Del_Ad() {
    $adb = 'Ads_data_base_7_2.php';
    
    $array_from_file = file( 'Ads_data_base_7_2.php' );
    unset( $array_from_file[ intval( $_GET[ 'del_ad' ]) ] );
        
    file_put_contents( $adb, '' ); 
    
    foreach ( $array_from_file as $value ) {
        file_put_contents( $adb, $value, FILE_APPEND );
    }   
}

# Функция редактирования объявления
function Edit_Ad () {
    $adb = 'Ads_data_base_7_2.php';
    
    $array_from_file = file( 'Ads_data_base_7_2.php' );
    $array_from_file[ intval( $_GET[ 'edit_ad' ]) ] = serialize( $_POST );
        #print_r ( $array_from_file );
    
    file_put_contents( $adb, '' );
    
    foreach ( $array_from_file as $value ) {
        file_put_contents( $adb, $value, FILE_APPEND );
    }
    
    /*$handle = fopen( $adb, 'r+' );
        foreach ( $array_from_file as $strig_after_edit ) {
            fwrite( $handle, $strig_after_edit . "\n" );
        }
    fclose( $handle );*/
        
}

# Функция вывода данных для редактирования объявления
function Show_ad_for_edit () {
    $afffed = file( 'Ads_data_base_7_2.php' );

    $edit_value = unserialize( $afffed[ intval( $_GET[ 'ad_key' ]) ] );
return $edit_value;
}

# Функция вывода добавленных объявлений
function Ads_Database() {    
    foreach ( file( 'Ads_data_base_7_2.php' ) as $key => $value) {
        if ( strlen( $value ) > 0 ) {
                $key_a = $key;
                $value_a = unserialize( $value );            
            echo '<tr>'
                .'<td> <a href = "?ad_show='.$value_a['t'].'&ad_key='.$key_a.'"> '.$value_a['t'].' </a> </td> <td> '.$value_a['p'].' </td> <td> '.$value_a['n'].' </td>'
                .'<td> <a href = "?del_ad='.$key_a.'"> Remove ad </a> </td>'
            .'</tr>';            
        }
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
