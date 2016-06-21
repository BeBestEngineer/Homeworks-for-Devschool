<?php

require_once 'DBsimple.php';
require_once 'classes_17.php';

$repository = AdsRepository::instance();

switch( $_GET[ 'action' ] ) {
        case 'delete':
            echo $repository -> Remove_ad_from_db( intval( $_GET[ 'del_id' ]));
        break;
        case 'delete_all':
            echo $repository -> Remove_all_ads_from_db ();
        break;
        case 'add':
            if ( $_POST[ 'seller_type' ] == 'Company' ) {
                $ad = new CompanyAds( $_POST );
            }
            elseif ( $_POST[ 'seller_type' ] == 'Individual' ) {
                $ad = new IndividualAds( $_POST );
            }
            echo $repository -> Write_ad_to_db( $ad );
        break;
        case 'edit':
            echo $repository -> get_ad_from_db_for_Edit( intval( $_GET[ 'edit_id' ]));
        break;
        default:
        break;
}    

?>