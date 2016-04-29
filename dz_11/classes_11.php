<?php

class Ad {                                                                 //Класс - конкретное объявление
    public $sellers_name;
    public $sellers_e_mail;
    public $sellers_phone_number;
    public $city_of_ad;
    public $category_of_ad;
    public $title_of_ad;
    public $description_of_ad;
    public $price_of_ad;
    public $key_of_ad;
    
    function __construct() {
        if ( isset( $_POST[ 'Button_pressed' ]) ) {
            $this -> sellers_name         = $_POST[ 'n' ];
            $this -> sellers_e_mail       = $_POST[ 'e' ];
            $this -> sellers_phone_number = $_POST[ 'pn' ];
            $this -> city_of_ad           = $_POST[ 'city_id' ];
            $this -> category_of_ad       = $_POST[ 'cat_id' ];
            $this -> title_of_ad          = $_POST[ 't' ];
            $this -> description_of_ad    = $_POST[ 'd' ];
            $this -> price_of_ad          = $_POST[ 'p' ];
            $this -> key_of_ad            = $_POST[ 'ad_key' ];        
        }
    }
    
    public function Adding_Ad( $db ) {
        $row = array (        
            'name'         => $this -> sellers_name,
            'e_mail'       => $this -> sellers_e_mail,
            'phone_number' => $this -> sellers_phone_number,
            'city_id'      => $this -> city_of_ad,
            'category'     => $this -> category_of_ad,
            'title'        => $this -> title_of_ad,
            'description'  => $this -> description_of_ad,
            'price'        => $this -> price_of_ad        
        );
        $db -> select( "INSERT INTO ads(?#) VALUES(?a)", array_keys( $row ), array_values( $row ));
    }
    
    public function Edit_Ad( $db ) {
        $row = array (
            'id'           => $this -> key_of_ad,
            'name'         => $this -> sellers_name,
            'e_mail'       => $this -> sellers_e_mail,
            'phone_number' => $this -> sellers_phone_number,
            'city_id'      => $this -> city_of_ad,
            'category'     => $this -> category_of_ad,
            'title'        => $this -> title_of_ad,
            'description'  => $this -> description_of_ad,
            'price'        => $this -> price_of_ad        
        );
        $db -> select( "UPDATE ads SET ?a WHERE id = ?d", $row, $this -> key_of_ad );
    }    
    
    public function Del_Ad ( $db ) {
        $db -> select( "DELETE FROM ads WHERE id = ?d", $_GET[ 'del_ad' ]);
    }
        
    public function Read_all_ads( $db ) {
        $result = $db -> select( 'SELECT id AS ARRAY_KEY, name, e_mail, phone_number, city_id, category, title, description, price FROM ads' );    
        if ( count( $result ) > 0 ) {    
                $array_of_ads = $result ;
            } else {
                $array_of_ads = array();
            }        
    return $array_of_ads;
    }
    
    public function Read_edit_ad ( $db ) {
        return $db -> selectRow( 'SELECT * FROM ads WHERE id = ?d', $_GET[ 'ad_key' ]);
    }

    public function Sel_of_Cities ( $db ) {
        return $db -> selectCol( 'SELECT city, region AS ARRAY_KEY_1, id_city as ARRAY_KEY_2 FROM russland' );
    }

    public function Sel_of_Categories ( $db ) {    
        return $db -> selectCol( 'SELECT category, section_category AS ARRAY_KEY_1, id_category as ARRAY_KEY_2 FROM categories' );        
    }
    
    
    public function AdsBoard( $smarty, $db, $data_of_ad  = NULL, $key_of_ad = '' ) {        
        # Данные для вывода на экран формы для добавления/редактирования объявлений
            $smarty->assign('action_adress', $_SERVER[ 'SCRIPT_NAME' ] );
            $smarty->assign( 'data_of_ad', $data_of_ad );
        # Селекторы городов и категорий
            $smarty->assign('array_for_city_select', $this -> Sel_of_Cities( $db ) );
            $smarty->assign('array_for_category_select', $this -> Sel_of_Categories( $db ) );
    
            $smarty->assign( 'key_of_ad', $key_of_ad );        

        # Данные для вывода на экран списка объявлений
            $smarty->assign('array_of_ads', $this -> Read_all_ads( $db ) );

        # Вывод на экран
            $smarty -> display('ads_form_11.tpl');
    }    
}




# Создание объекта
$some_ad = new Ad();







#var_dump( $_POST  );

#$some_ad_1 -> title_of_ad = 'Old\'s-Mobile Toronado'; //изменяем одно из свойств
#$some_ad_1 -> test = 'OJ';                            //Добавляем новое свойство

#var_dump( $some_ad_1 );

#echo $some_ad_1 -> title_of_ad.'<br>';                //Выводим свойства на экран
                                                       //Также можно вывести в переменную
                                                      
#$a = $some_ad_1 -> title_of_ad . '<br>';               //Присваиваем переменной одно из свойств
#echo $a;

#$b = $some_ad_1 -> functionTitle() . '<br>';           //Вызываем метод который принимает значение из POST
#echo $b;



?>