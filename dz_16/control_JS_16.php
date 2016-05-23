<?php

require_once 'DBsimple.php';
require_once 'classes_16.php';

$repository = AdsRepository::instance();

switch( $_GET[ 'action' ] ) {
        case 'delete':
            echo $repository -> Remove_ad_from_db ();
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
            $resp = array();
                $resp['st'] = $repository -> get_status_after_write_Ad_to_db();
                $resp['ad'] = $repository -> get_ad_from_db();
            echo json_encode( $resp );
        break;
        case 'edit':
            echo json_encode( $repository -> get_ad_from_db_for_Edit() );
        break;
        default:
        break;
}    

?>