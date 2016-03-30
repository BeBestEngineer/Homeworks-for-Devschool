<?php
function Adding_Ad() {
?>
    <h2> Adding ad </h2>   
        <form action = "dz_6_denwer.php" method = "POST">
        <table> 
            <tr>
                <td> Name </td> <td> <input type="text" name ="n" value = 'Alex' /> </td>
            </tr>
            <tr>
                <td> E-mail </td> <td> <input type="text" name ="e" value = 'A_1@mail.ru' /> </td>
            </tr>
            <tr>    
                <td> Phone number &nbsp &nbsp</td> <td> <input type="text" name ="pn" value = '+7-965-' /> </td>
            </tr> 
            <tr>
                <td> City </td>
                    <td>
                        <select name = "city_id" >
                            <?php echo City_select (); ?>
                        </select>
                    </td>
            </tr> 
            <tr>
                <td> Category </td>
                    <td>        
                        <select name = "cat_id" >
                            <?php echo Category_select (); ?>                                                        
                        </select>
                    </td>                    
            </tr> 
            <tr>    
                <td> Title </td> <td> <input type="text" name ="t" value = 'Lumia 640 XL' /> </td>
            </tr>
            <tr>    
                <td> Description </td> <td> <textarea rows="10" cols="45" name ="d" > </textarea> </td>
            </tr>
            <tr>    
                <td> Price </td> <td> <input type="text" name ="p" value = '100$' /> </td>
            </tr>
            <tr>
                <td> <input type="submit" value = "Add!" /> </td> <td>  </td>
            </tr>
        </table>
        </form>
<?php } ?>

<?php        
function Ads_Database() {    
?>    
    <h2> Ads Database </h2>        
        <table> <td> Ad Title &nbsp </td> <td> Price &nbsp </td> <td> Seller's name &nbsp &nbsp </td>
    
        <?php foreach ( $_SESSION['a'] as $key => $value ) { 
                $key_a = $key;
                $value_a = $value;
                    if ( isset($value_a['t']) && $value_a['t'] !== '' ) { ?>
                        <tr>
                            <td> <a href = "?ad_show=<?php echo ''.$value_a['t'].''; ?>&ad_key=<?php echo ''.$key_a.''; ?>"> <?php echo $value_a['t']; ?> </a> </td> <td> <?php echo $value_a['p']; ?> </td> <td> <?php echo $value_a['n']; ?> </td>
                            <td> <a href = "?del_ad=<?php echo ''.$key_a.''; ?>"> Remove ad </a> </td>
                        </tr>

                    <?php }              
        } ?>
        </table>
<?php } ?>

<?php function Ad_Show () {
        $t = $_GET ['ad_show'];
        $k_a = $_GET ['ad_key'];
?>        
        <h2> <?php echo $t ?> </h2>   
        <table> 
            <tr>
                <td> Name </td> <td> <?php echo $_SESSION['a']["$k_a"]['n']; ?> </td>
            </tr>
            <tr>
                <td> E-mail </td> <td> <?php echo $_SESSION['a']["$k_a"]['e']; ?> </td>
            </tr> 
            <tr>
                <td> Phone number &nbsp &nbsp </td> <td> <?php echo $_SESSION['a']["$k_a"]['pn']; ?> </td>
            </tr>
            <tr>
                <td> City </td> <td> <?php echo $_SESSION['a']["$k_a"]['city_id']; ?> </td>
            </tr>
            <tr>
                <td> Category </td> <td> <?php echo $_SESSION['a']["$k_a"]['cat_id']; ?> </td>
            </tr>
            <tr>    
                <td> Title </td> <td> <?php echo $_SESSION['a']["$k_a"]['t']; ?> </td>
            </tr>
            <tr>    
                <td> Description </td> <td width="340"> <?php echo $_SESSION['a']["$k_a"]['d']; ?> </td>
            </tr>
            <tr>
                <td> Price </td> <td> <?php echo $_SESSION['a']["$k_a"]['p']; ?> </td>
            </tr>
        </table>
        <br>
<?php } ?>

       