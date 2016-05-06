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
    protected $seller_type;    
    
    function __construct( $from_ad ) {
 
            $this -> id           = $from_ad[ 'id' ];        
            $this -> e_mail       = $from_ad[ 'e_mail' ];
            $this -> phone_number = $from_ad[ 'phone_number' ];
            $this -> city_id      = $from_ad[ 'city_id' ];
            $this -> category_id  = $from_ad[ 'category_id' ];
            $this -> title        = $from_ad[ 'title' ];
            $this -> description  = $from_ad[ 'description' ];
            $this -> price        = $from_ad[ 'price' ];        
            $this -> seller_type  = $from_ad[ 'seller_type' ];        
    }
    
    public function Get_All_Object_Properties() {
        return get_object_vars( $this );
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

    public function get_Seller_type() {
        return $this -> seller_type;
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
    
    public function Get_All_Object_Properties() {
        return  get_object_vars( $this );
    }
    
    public function get_Company_name() {
        return $this -> company_name;
    }

}

class IndividualAds extends Ads {    
    protected $seller_name;
    protected $vk_account;

    function __construct( $from_ad ) {
        parent::__construct( $from_ad );
            $this -> seller_name = $from_ad[ 'seller_name' ];
            $this -> vk_account  = $from_ad[ 'vk_account' ];
            
            $repository = AdsRepository::instance();
            $repository -> Write_to_db( $this );
    }
    
    public function Get_All_Object_Properties() {
        return get_object_vars( $this );
    }
    
    public function get_Seller_name() {
        return $this -> seller_name;
    }
}

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
    
    private function create_Storage() {
        $db = Db::instance();
        $all = $db -> select( 'SELECT * FROM ads ORDER BY id ASC' );
            foreach ( $all as $value ) {            
            
            if ( $value[ 'seller_type' ] == 'Company' ) {
                $ad = new CompanyAds( $value );
                self::add_Ad_to_storage( $ad );
                
            } elseif ( $value[ 'seller_type' ] == 'Individual' ) {
                $ad = new IndividualAds( $value );
                self::add_Ad_to_storage( $ad );                
            } 
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
        if ( ! ( $ad instanceof CompanyAds ) && ! ( $ad instanceof IndividualAds ) && ! ( $this instanceof AdsRepository ) ) {
            die( 'Can not use this method in class conctructor' );    
        }       
        $vars = $ad -> Get_All_Object_Properties();
        $db = Db::instance();
        $db -> query( "REPLACE INTO ads(?#) VALUES(?a)", array_keys( $vars ), array_values( $vars ));        
    }

    public function Remove_from_db () {
        $db = Db::instance();
        $db -> query( "DELETE FROM ads WHERE id = ?d", $_GET[ 'del_ad' ]);
    }    
    
    private function Sel_of_Cities () {
        $db = Db::instance();
        return $db -> selectCol( 'SELECT city, region AS ARRAY_KEY_1, id_city as ARRAY_KEY_2 FROM russland' );
    }

    private function Sel_of_Categories () {    
        $db = Db::instance();
        return $db -> selectCol( 'SELECT category, section_category AS ARRAY_KEY_1, id_category as ARRAY_KEY_2 FROM categories' );        
    }   
    
    private function get_Count_of_ads() {
        return count( $this -> ads );
    }
    
    public function Output_forms_to_display( $smarty, $data_of_ad  = NULL, $key_of_ad = '' ) {   
            $db = Db::instance();
            $this -> create_Storage( $db );
            $this -> prepare_Objects_for_Smarty( $smarty );
            
        if ( isset( $_GET[ 'ad_show' ])) {
            $ad_object = $this -> ads[ intval( $_GET[ 'ad_key' ]) ];
            $data_of_ad = $ad_object -> Get_All_Object_Properties();
            $key_of_ad = $data_of_ad[ 'id' ] ;
        }

        # Данные для вывода на экран формы
            $smarty->assign('action_adress', $_SERVER[ 'SCRIPT_NAME' ]);
            $smarty->assign( 'data_of_ad', $data_of_ad );
            $smarty->assign('array_for_city_select', $this -> Sel_of_Cities() );
            $smarty->assign('array_for_category_select', $this -> Sel_of_Categories() );
            $smarty->assign( 'key_of_ad', $key_of_ad );
            
        # Данные для вывода на экран списка объявлений            
            $smarty->assign('count_of_ads', $this -> get_Count_of_ads() );

        # Вывод на экран
            $smarty -> display('ads_form_12.tpl');            
    }     
}

?>