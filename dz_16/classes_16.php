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
    private $response_DbSimple = array();
    private $ad_key_private;
    private $response_for_js = array();
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

    public function Write_ad_to_db( Ads $ad ) {
        if ( ! ( $ad instanceof CompanyAds ) && ! ( $ad instanceof IndividualAds ) && ! ( $this instanceof AdsRepository ) ) {
            die( 'Can not use this method in class conctructor' );    
        }       
        $vars = $ad -> Get_All_Object_Properties();
        $db = Db::instance();

        if ( $_GET['id'] == false ) {
                $response_DbSimple = $db -> query( "INSERT INTO ads(?#) VALUES(?a)", array_keys( $vars ), array_values( $vars )); //возвращает ид объявления или false
            $this -> response_DbSimple['val'] = $response_DbSimple;
            $this -> response_DbSimple['procedure'] = 'insert';
            
            
        } else {
            $this -> ad_key_private = $vars['id'];
                $response_DbSimple = $db -> query( 'UPDATE ads SET ?a WHERE id = ?d', $vars, $vars['id'] );                       //возвращает количество обновлённых строк или 0
            $this -> response_DbSimple['val'] = $response_DbSimple;
            $this -> response_DbSimple['procedure'] = 'update';            
        }
        $this -> get_status_after_write_Ad_to_db();
        $this -> get_ad_from_db();
        return json_encode( $this -> response_for_js );
    }

    public function get_status_after_write_Ad_to_db() {
        switch( $this -> response_DbSimple['procedure'] ) {
            case 'insert':
                if ( $this -> response_DbSimple['val'] ) {
                    $result[ 'status' ] = 'success';
                    $result[ 'message' ] = 'Ad no. '.$this -> response_DbSimple['val'].' was insert to database';                    
                } else {
                    $result[ 'status' ] = 'error';
                    $result[ 'message' ] = 'Ad was not insert to database';                    
                }
            break;
            case 'update':
                if ( $this -> response_DbSimple['val'] ) {
                    $result[ 'status' ] = 'success';
                    $result[ 'message' ] = 'Ad no. '.$this -> ad_key_private.' was update to database';
                } else {
                    $result[ 'status' ] = 'error';
                    $result[ 'message' ] = 'Ad was not update to database or data are not changed';
                }                
            break;
            default:
            break;
        }
        //return $result;
        $this -> response_for_js['st'] = $result;
    }
    
    
    public function Remove_ad_from_db () {
        $db = Db::instance();
        if ( $db -> query( "DELETE FROM ads WHERE id = ?d", $_GET[ 'del_id' ]) ) {
            $result[ 'status' ] = 'success';
            $result[ 'message' ] = 'Ad no '.intval( $_GET[ 'del_id' ] ).' have been removed';
        } else {
            $result[ 'status' ] = 'error';
            $result[ 'message' ] = 'Ad no '.intval( $_GET[ 'del_id' ] ).' has not been removed';
        }
        $result_encode = json_encode( $result );
        return $result_encode;
    }

    public function Remove_all_ads_from_db () {
        $db = Db::instance();
        if ( $db -> query( "DELETE FROM ads" ) ) {
            $result[ 'status' ] = 'success';
            $result[ 'message' ] = 'Base has been cleared';
        } else {
            $result[ 'status' ] = 'error';
            $result[ 'message' ] = 'Base was not cleared';
        }
        $result_encode = json_encode( $result );
        return $result_encode;        
    }    
    
    private function Sel_of_Cities () {
        $db = Db::instance();
        return $db -> selectCol( 'SELECT city, region AS ARRAY_KEY_1, id_city as ARRAY_KEY_2 FROM russland' );
    }

    private function Sel_of_Categories () {    
        $db = Db::instance();
        return $db -> selectCol( 'SELECT category, section_category AS ARRAY_KEY_1, id_category as ARRAY_KEY_2 FROM categories' );        
    }   

    public function get_ad_from_db() {
        $db = Db::instance();
        if( $_GET['id'] == '' ) {
            $result = $db -> selectRow( 'SELECT * FROM ads WHERE id=LAST_INSERT_ID()' );
        } else {
            $result = $db -> selectRow( 'SELECT * FROM ads WHERE id = ?d', $_GET[ 'id' ]);
        }
        $this -> response_for_js['ad'] = $result;
    }
    
    public function get_ad_from_db_for_Edit() {
        $db = Db::instance();
        if ( $_GET[ 'edit_id' ] ) {
            return json_encode( $db -> selectRow( "SELECT * FROM ads WHERE id = ?d", $_GET[ 'edit_id' ]) );
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
            $smarty -> display('ads_form_16.tpl');
    }     
}

?>