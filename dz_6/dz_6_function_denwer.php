<?php

function Ads_Database() {    
    foreach ( $_SESSION['a'] as $key => $value ) { 
                $key_a = $key;
                $value_a = $value;
        if ( isset($value_a['t']) && $value_a['t'] !== '' ) {                                       
            echo '<tr>'
                .'<td> <a href = "?ad_show='.$value_a['t'].'&ad_key='.$key_a.'"> '.$value_a['t'].' </a> </td> <td> '.$value_a['p'].' </td> <td> '.$value_a['n'].' </td>'
                .'<td> <a href = "?del_ad='.$key_a.'"> Remove ad </a> </td>'
            .'</tr>';
        }
    }
}

function Del_Ad() {
    $key_a = $_GET ['del_ad'];            
    unset ( $_SESSION['a']["$key_a"] );   
} 

function Cleaning_session () {
    foreach ( $_SESSION['a'] as $kcl => $vcl ) {
        $key_cl = $kcl;
        $value_cl = $vcl;
            if ( count( $value_cl ) == 0 ) {
                unset ( $_SESSION['a']["$key_cl"] );
            }    
    }
}

function Ss () {
    $ab_ad = array ();
    if ( isset( $_GET ['ad_key'] ) ) {
        foreach ( $_SESSION['a'][ $_GET ['ad_key']] as $k3 => $v3 ) {
            $ab_ad[ "$k3" ] = $v3;                
        }
    }
return $ab_ad;  
}

function City_select () {
    $cities = array(
        '64400' => 'Omsk',
        '641780' => 'Novosibirsk',
        '664000' => 'Irkutsk',
        '649002' => 'Gorno - Altaisk'        
        );
    foreach( $cities as $postcode => $city_name ) {
            static $op_city; 
            $op_city .= '<option value = "'.$city_name.'" > '.$city_name.' </option>';
                       
        }
        return $op_city;        
}

function Category_select () {
    $categories = array(
        'el' => 'Electronics',
        're' => 'Realty',
        'tr' => 'Transport',
        'th' => 'ICE'        
        );
        foreach( $categories as $key_cat => $category_name ) {
            static $op_cat; 
            $op_cat .= '<option value = "'.$category_name.'" > '.$category_name.' </option>';                        
            
        }
        return $op_cat;        
}
?>
