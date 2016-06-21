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
    }
    
    public function Get_All_Object_Properties() {
        return get_object_vars( $this );
    }
    
    public function get_Seller_name() {
        return $this -> seller_name;
    }
}

class AdsRepository { 
    private $response_for_js = array();
    private $ads = array();
    private static $instance = NULL;
    private $db;
    
    function __construct() {
        $this -> db = Db::instance();
    }
           
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
        
        $all = $this -> db -> select( 'SELECT * FROM ads ORDER BY id ASC' );
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

    public function Write_ad_to_db( Ads $ad ) {
        if ( ! ( $ad instanceof CompanyAds ) && ! ( $ad instanceof IndividualAds ) && ! ( $this instanceof AdsRepository ) ) {
            die( 'Can not use this method in class conctructor' );    
        }       
        $vars = $ad -> Get_All_Object_Properties();
        
        if ( $_POST['id'] == false ) {
            $result = $this -> db -> query( "INSERT INTO ads(?#) VALUES(?a)", array_keys( $vars ), array_values( $vars )); //возвращает ид объявления или false
        } else {
            $result = $this -> db -> query( 'UPDATE ads SET ?a WHERE id = ?d', $vars, $vars['id'] );                       //возвращает количество обновлённых строк или 0
        }
        $this -> response_for_js['write'] = $result;
        $this -> response_for_js['get_write'] = $this -> get_ad_from_db();
        
        return json_encode( $this -> response_for_js );
    }
    
    public function Remove_ad_from_db( $del_id ) {
        return json_encode( $this -> db -> query( "DELETE FROM ads WHERE id = ?d", $del_id ));         
    }

    public function Remove_all_ads_from_db () {
        return json_encode( $this -> db -> query( "DELETE FROM ads" ) );
    }    
    
    private function Sel_of_Cities () {
        return $this -> db -> selectCol( 'SELECT city, region AS ARRAY_KEY_1, id_city as ARRAY_KEY_2 FROM russland' );
    }

    private function Sel_of_Categories () {    
        return $this -> db -> selectCol( 'SELECT category, section_category AS ARRAY_KEY_1, id_category as ARRAY_KEY_2 FROM categories' );        
    }   

    public function get_ad_from_db() {
        if( $_POST['id'] == '' ) {
            $result = $this -> db -> selectRow( 'SELECT * FROM ads WHERE id=LAST_INSERT_ID()' );
        } else {
            $result = $this -> db -> selectRow( 'SELECT * FROM ads WHERE id = ?d', $_POST[ 'id' ]);
        }
        return $result;
    }
    
    public function get_ad_from_db_for_Edit( $edit_id ) {
        if ( $edit_id ) {
            return json_encode( $this -> db -> selectRow( "SELECT * FROM ads WHERE id = ?d", $edit_id ));
        }
    }   
    
    public function Output_forms_to_display( $smarty ) {   
        # Данные для селекторов формы
            $smarty->assign('array_for_city_select', $this -> Sel_of_Cities() );
            $smarty->assign('array_for_category_select', $this -> Sel_of_Categories() );
            
        # Данные для вывода на экран списка объявлений            
            $this -> create_Storage();
            $this -> prepare_Objects_for_Smarty( $smarty );

        # Вывод на экран
            $smarty -> display('ads_form_17.tpl');
    }     
}

?>