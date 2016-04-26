<?php

#Функция добавления объявления
function Adding_Ad ( $db ) {
    $row = array (        
        'name' => $_POST[ 'n' ],
        'e_mail' => $_POST[ 'e' ],
        'phone_number' => $_POST[ 'pn' ],
        'city_id' => $_POST[ 'city_id' ],
        'category' => $_POST[ 'cat_id' ],
        'title' => $_POST[ 't' ],
        'description' => $_POST[ 'd' ],
        'price' => $_POST[ 'p' ]        
    );
    $db -> select( "INSERT INTO ads(?#) VALUES(?a)", array_keys( $row ), array_values( $row ));
}

# Функция редактирования объявления
function Edit_Ad ( $db ) {    
    $row = array (
        'id' => $_POST[ 'ad_key' ],
        'name' => $_POST[ 'n' ],
        'e_mail' => $_POST[ 'e' ],
        'phone_number' => $_POST[ 'pn' ],
        'city_id' => $_POST[ 'city_id' ],
        'category' => $_POST[ 'cat_id' ],
        'title' => $_POST[ 't' ],
        'description' => $_POST[ 'd' ],
        'price' => $_POST[ 'p' ]
    );
    $db -> select( "UPDATE ads SET ?a WHERE id = ?d", $row, $_POST[ 'ad_key' ]);
}

# Функция удаления объявления
function Del_Ad ( $db ) {
    $db -> select( "DELETE FROM ads WHERE id = ?d", $_GET[ 'del_ad' ]);
}

# Функция чтения всех объявлений из базы данных
function Read_all_ads ( $db ) {
    $result = $db -> select( 'SELECT id AS ARRAY_KEY, name, e_mail, phone_number, city_id, category, title, description, price FROM ads' );    
    if ( count( $result ) > 0 ) {    
            $array_of_ads = $result ;
        } else {
            $array_of_ads = array();
        }        
return $array_of_ads;
}

# Функция чтения редактируемого объявления из базы данных
function Read_edit_ad ( $db ) {
    $data_of_ad = $db -> selectRow( 'SELECT * FROM ads WHERE id = ?d', $_GET[ 'ad_key' ]);
    
return $data_of_ad;
}

# Создание массива для селектора городов
function Sel_of_Cities ( $db ) {
    $array_of_cities = $db -> selectCol( 'SELECT city, region AS ARRAY_KEY_1, id_city as ARRAY_KEY_2 FROM russland' );
return $array_of_cities;    
}

# Создание массива для селектора категорий
function Sel_of_Categories ( $db ) {    
    $array_of_categories = $db -> selectCol( 'SELECT category, section_category AS ARRAY_KEY_1, id_category as ARRAY_KEY_2 FROM categories' );        
return $array_of_categories;    
}

# Функция вывода форм на экран
function Output_forms ( $smarty, $key_of_ad, $data_of_ad, $db ) {

    # Данные для вывода на экран формы для добавления/редактирования объявлений
    $smarty->assign('action_adress', $_SERVER[ 'SCRIPT_NAME' ] );
    $smarty->assign( 'data_of_ad', $data_of_ad );
        # Селекторы городов и категорий
        $smarty->assign('array_for_city_select', Sel_of_Cities( $db ) );
        $smarty->assign('array_for_category_select', Sel_of_Categories( $db ) );
    
    $smarty->assign( 'key_of_ad', $key_of_ad );        
        
    # Данные для вывода на экран списка объявлений
    $smarty->assign('array_of_ads', Read_all_ads( $db ) );

    # Вывод на экран
    $smarty->display('ads_form_10.tpl');
}

?>