<?php

class Ad {                                                                 //Класс - конкретное объявление
    protected $sellers_name;
    protected $sellers_e_mail;
    protected $sellers_phone_number;
    protected $city_of_ad;
    protected $category_of_ad;
    protected $title_of_ad;
    protected $description_of_ad;
    protected $price_of_ad;
    protected $key_of_ad;
    
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
    
    public function Adding_Ad() {
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
        return $row;
    }
    
    public function Edit_Ad() {
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
        return $row;        
    }
}


class AdsRepository {
    
    public function Write_Added( $db, $some_ad ) {
        $row_added = $some_ad -> Adding_Ad();
        $db -> select( "INSERT INTO ads(?#) VALUES(?a)", array_keys( $row_added ), array_values( $row_added ));        
    }

    public function Write_Edited( $db, $some_ad ) {
        $row_edited = $some_ad -> Edit_Ad();
        $db -> select( "UPDATE ads SET ?a WHERE id = ?d", $row_edited, $row_edited[ 'id' ] );        
    }

    public function Remove_Ad ( $db ) {
        $db -> select( "DELETE FROM ads WHERE id = ?d", $_GET[ 'del_ad' ]);
    }    
    
    public function Read_edit_ad ( $db ) {
        return $db -> selectRow( 'SELECT * FROM ads WHERE id = ?d', $_GET[ 'ad_key' ]);
    }
    
    private function List_of_Ads( $db ) {
        $result = $db -> select( 'SELECT id AS ARRAY_KEY, name, e_mail, phone_number, city_id, category, title, description, price FROM ads' );    
        if ( count( $result ) > 0 ) {    
                $array_of_ads = $result ;
            } else {
                $array_of_ads = array();
            }        
    return $array_of_ads;
    }

    private function Sel_of_Cities ( $db ) {
        return $db -> selectCol( 'SELECT city, region AS ARRAY_KEY_1, id_city as ARRAY_KEY_2 FROM russland' );
    }

    private function Sel_of_Categories ( $db ) {    
        return $db -> selectCol( 'SELECT category, section_category AS ARRAY_KEY_1, id_category as ARRAY_KEY_2 FROM categories' );        
    }   
    
    public function Output_forms( $smarty, $db, $data_of_ad  = NULL, $key_of_ad = '' ) {   
        
        # Данные для вывода на экран формы
            $smarty->assign('action_adress', $_SERVER[ 'SCRIPT_NAME' ] );
            $smarty->assign( 'data_of_ad', $data_of_ad );
            $smarty->assign('array_for_city_select', $this -> Sel_of_Cities( $db ) );
            $smarty->assign('array_for_category_select', $this -> Sel_of_Categories( $db ) );
            $smarty->assign( 'key_of_ad', $key_of_ad );        

        # Данные для вывода на экран списка объявлений
            $smarty->assign('array_of_ads', $this -> List_of_Ads( $db ) );

        # Вывод на экран
            $smarty -> display('ads_form_11.tpl');
    }     
}

?>