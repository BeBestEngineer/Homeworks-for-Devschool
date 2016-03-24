<?php
function Del_Ad() {
    $key_a = $_GET ['del_ad'];            
    unset ( $_SESSION['a']["$key_a"] );
}     
   
function Main() {
    echo '<h2>e-Shop</h2>';
    echo '<a href = "index.php?adding_ad"> Adding Ad </a> &nbsp &nbsp';
    echo '<a href = "index.php?ads_database"> Ads Database </a>';
}
?>