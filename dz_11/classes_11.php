<?php

class Ads {                                                                
    protected $id;
    protected $name;
    protected $e_mail;
    protected $phone_number;
    protected $city_id;
    protected $category;
    protected $title;
    protected $description;
    protected $price;    
    
    function __construct() {
        if ( isset( $_POST[ 'Button_pressed' ]) ) {
            $this -> id           = $_POST[ 'ad_key' ];        
            $this -> name         = $_POST[ 'n' ];
            $this -> e_mail       = $_POST[ 'e' ];
            $this -> phone_number = $_POST[ 'pn' ];
            $this -> city_id      = $_POST[ 'city_id' ];
            $this -> category     = $_POST[ 'cat_id' ];
            $this -> title        = $_POST[ 't' ];
            $this -> description  = $_POST[ 'd' ];
            $this -> price        = $_POST[ 'p' ];            
        }
    }
    
    public function Read_data_from_form( $db, $some_repository ) {
        $vars = get_object_vars( $this );                                 
        $some_repository -> Write_to_db( $db, $vars ); 
    }
}


class AdsRepository {
    
    public function Write_to_db( $db, $vars ) {        
        $db -> query( "REPLACE INTO ads(?#) VALUES(?a)", array_keys( $vars ), array_values( $vars ));        
    }

    public function Remove_from_db ( $db ) {
        $db -> query( "DELETE FROM ads WHERE id = ?d", $_GET[ 'del_ad' ]);
    }    
    
    public function Read_editable_ad_from_db ( $db ) {
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
    
    public function Output_forms_to_display( $smarty, $db, $data_of_ad  = NULL, $key_of_ad = '' ) {   
        
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