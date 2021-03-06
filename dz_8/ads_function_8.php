<?php

#Функция добавления объявления
function Adding_Ad( $adb, $array_from_file ) {
        $array_from_file[] = $_POST;
            Wr_to_file ( $adb, $array_from_file );      // эту функцию нужно вызвать один раз,
                                                        // когда контроллер будет представлен в виде ветвления
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
    # Проверка состояния файла 
        if ( file_exists( $adb ) ) {
            $array_from_file = unserialize( file_get_contents ( $adb ));    
        } else {
            $array_from_file = array();    
        }
return $array_from_file;
}

# Функция записи в файл
function Wr_to_file ( $adb, $array_from_file ) {
    file_put_contents( $adb, serialize( $array_from_file ));
}

# Функция вывода форм на экран
function Conclusion_of_forms_on_the_screen ( $smarty, $array_from_file, $ads_data_base_string, $form_header, $action_adress, $data_of_ad, $name_of_button ) {
    # Подключение файла с БД городов
    require_once 'cities.php';
    # Подключение файла с БД категорий
    require_once 'categories.php'; 

    # Данные для вывода на экран формы для добавления/редактирования объявлений
    $smarty->assign('form_header', $form_header);
    $smarty->assign('action_adress', $action_adress);
    $smarty->assign( 'data_of_ad', $data_of_ad );
    $smarty->assign('array_for_city_select', $russland);
    $smarty->assign('array_for_category_select', $categories);
    $smarty->assign('name_of_button', $name_of_button);

    # Данные для вывода на экран списка объявлений
    $smarty->assign('ads_data_base', $ads_data_base_string );
    $smarty->assign('aff_to_tpl', Re_to_file( $ads_data_base_string ) );

    # Вывод на экран
    $smarty->display('ads_form_8.tpl');    
}


?>
