<?php

require_once 'DBsimple.php';
require_once 'classes_15.php';

switch( $_GET[ 'action' ] ) {
        case 'delete':
            $repository = AdsRepository::instance();
            $repository -> Remove_ad_from_db ();
            break;
        case 'delete_all':
            $repository = AdsRepository::instance();
            $repository -> Remove_all_ads_from_db ();
            break;

        default:
            break;
}
?>