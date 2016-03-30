<?php
function Del_Ad() {
    $key_a = $_GET ['del_ad'];            
    unset ( $_SESSION['a']["$key_a"] );    
} 

function Cleaning_session () {
    foreach ($_SESSION['a'] as $key => $value) {
        $key_a = $key;
        $value_a = $value;
            if ( count($value_a) == 0 ) {
                unset ( $_SESSION['a']["$key_a"] );
            }    
    }
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

