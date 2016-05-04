<?php

class Ads {                                                                 
    protected $id;
    protected $e_mail;
    protected $phone_number;
    protected $city_id;
    protected $category_id;
    protected $title;
    protected $description;
    protected $price;    
    
    function __construct( $from_ad ) {
 
            $this -> id           = $from_ad[ 'id' ];        
            $this -> e_mail       = $from_ad[ 'e_mail' ];
            $this -> phone_number = $from_ad[ 'phone_number' ];
            $this -> city_id      = $from_ad[ 'city_id' ];
            $this -> category_id  = $from_ad[ 'category_id' ];
            $this -> title        = $from_ad[ 'title' ];
            $this -> description  = $from_ad[ 'description' ];
            $this -> price        = $from_ad[ 'price' ];        
    }
    
    public function Save_data_from_form() {
        return $vars = get_object_vars( $this );
    }
    
    public function get_Ad_key() {
        return $this -> id;
    }
    
    public function get_Title() {
        return $this -> title;
    }

    public function get_Price() {
        return $this -> price;
    }

    
}

class CompanyAds extends Ads {
    protected $company_name;
    protected $company_address;
    protected $website;
    
    function __construct( $from_ad ) {
        parent::__construct( $from_ad );        
            $this -> company_name    = $from_ad[ 'company_name' ];   
            $this -> company_address = $from_ad[ 'company_address' ];
            $this -> website         = $from_ad[ 'website' ];

            $repository = AdsRepository::instance();
            $repository -> Write_to_db( $this );
    }
    
    public function Save_data_from_form() {
        return  get_object_vars( $this );
    }
    
    public function get_Company_name() {
        return $this -> company_name;
    }

}

/*
class IndividualAds extends Ads {    
    protected $seller_name;
    protected $vk_account;

    function __construct() {
        parent::__construct();
            $this -> seller_name = $_POST[ 's_name' ];
            $this -> vk_account  = $_POST[ 'vk_acc' ];        
    }
    
    public function Read_data_from_form() {
        return get_object_vars( $this );
    }
}
*/

class AdsRepository { 
    private $ads = array();
    private static $instance = NULL;
           
    public static function instance() {
        if ( self::$instance == NULL ) {
             self::$instance = new AdsRepository();
        }
      return self::$instance;
    }
   
    private function add_Ad_to_storage( $ad ) {
        if ( ! ( $this instanceof AdsRepository ) ) {
            die( 'Error in <b> add_Ads_to_storage </b> method\'s - Can not use this method in class conctructor' );    
        }
        $this -> ads[ $ad -> get_Ad_key() ] = $ad;
    }    
    
    private function create_Storage( $db ) {
        $all = $db -> select( 'SELECT * FROM ads_company ORDER BY id ASC' );
        foreach ( $all as $value ) {
            $ad = new CompanyAds( $value );
            self::add_Ad_to_storage( $ad );
        }
    }
        
    private function prepare_Objects_for_Smarty( $smarty ) {
        $row = '';
        foreach ( $this -> ads as $value ) {
            $smarty -> assign( 'ad_object', $value );
            $row .= $smarty -> fetch( 'ad_row.tpl.html' );
        }
            $smarty -> assign( 'ads_rows', $row );
    }
    
    public function Write_to_db( Ads $ad ) {
    global $db;        
        if ( ! ( $ad instanceof CompanyAds ) && ! ( $ad instanceof IndividualAds ) && ! ( $this instanceof AdsRepository ) ) {
            die( 'Can not use this method in class conctructor' );    
        }       
        $vars = $ad -> Save_data_from_form();
        $db -> query( "REPLACE INTO ads_company(?#) VALUES(?a)", array_keys( $vars ), array_values( $vars ));        
    }

    public function Remove_from_db ( $db ) {
        $db -> query( "DELETE FROM ads_company WHERE id = ?d", $_GET[ 'del_ad' ]);
    }    
    
    private function List_of_Ads( $db ) {
        return $db -> select( 'SELECT id AS ARRAY_KEY, company_name, company_address, website, e_mail, phone_number, city_id, category_id, title, description, price FROM ads_company ORDER BY id ASC' );
    }

    private function Sel_of_Cities ( $db ) {
        return $db -> selectCol( 'SELECT city, region AS ARRAY_KEY_1, id_city as ARRAY_KEY_2 FROM russland' );
    }

    private function Sel_of_Categories ( $db ) {    
        return $db -> selectCol( 'SELECT category, section_category AS ARRAY_KEY_1, id_category as ARRAY_KEY_2 FROM categories' );        
    }   
    
    private function get_Count_of_ads() {
        return count( $this -> ads );
    }
    
    public function Output_forms_to_display( $smarty, $db, $data_of_ad  = NULL, $key_of_ad = '' ) {   
            $this -> create_Storage( $db );
            $this -> prepare_Objects_for_Smarty( $smarty );
        
        if ( isset( $_GET[ 'ad_show' ])) {
            $ad_object = $this -> ads[ intval( $_GET[ 'ad_key' ]) ];
            $data_of_ad = $ad_object -> Save_data_from_form();
            $key_of_ad = $data_of_ad[ 'id' ] ;
        }

        # Данные для вывода на экран формы
            $smarty->assign('action_adress', $_SERVER[ 'SCRIPT_NAME' ]);
            $smarty->assign( 'data_of_ad', $data_of_ad );
            $smarty->assign('array_for_city_select', $this -> Sel_of_Cities( $db ) );
            $smarty->assign('array_for_category_select', $this -> Sel_of_Categories( $db ) );
            $smarty->assign( 'key_of_ad', $key_of_ad );
            
        # Данные для вывода на экран списка объявлений            
            $smarty->assign('count_of_ads', $this -> get_Count_of_ads() );

        # Вывод на экран
            $smarty -> display('ads_form_12.tpl');            
    }     
}

?>