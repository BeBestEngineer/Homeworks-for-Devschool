<?php

require_once 'DBsimple.php';

switch( $_GET[ 'action' ] ) {
        case 'delete':
            $db = Db::instance();
            $db -> query( "DELETE FROM ads WHERE id = ?d", $_GET[ 'del_id' ]);
            break;
        
        default:
            break;
}
?>