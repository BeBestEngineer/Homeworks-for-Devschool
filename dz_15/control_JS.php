<?php

require_once 'DBsimple.php';

switch( $_GET[ 'action' ] ) {
        case 'delete':
            $db -> query( "DELETE FROM ads WHERE id = ?d", $_GET[ 'del_id' ]);
            break;
        case 'delete_all':
            $db -> query( "DELETE FROM ads WHERE 1 = 1" );
            break;

        default:
            break;
}
?>