<title>e-Shop. Nice price.</title>

<?php isset( $_COOKIE['ads']) ? $uns_to_show = unserialize( $_COOKIE['ads']) : array(); ?>

<h2> <?php echo ( intval( isset( $_GET[ 'ad_show' ] )) ? 'Edit' : 'Adding' ).' ad'; ?> </h2>   
    <form action = "<?php echo( intval( isset( $_GET[ 'ad_show' ] )) ? 'index7_1.php?edit_ad='.$_GET[ 'ad_key' ].'' : 'index7_1.php' ); ?>" method = "POST">
        <table> 
            <tr>
                <td> Name </td> 
                <td> <input type="text" required name ="n" value = <?php echo ( intval( isset( $_GET[ 'ad_show' ] )) ? ''.$uns_to_show[ intval( $_GET[ 'ad_key' ]) ]['n'].'' : 'Name' ); ?> > </td>
            </tr>
            <tr>
                <td> E-mail </td> 
                <td> <input type="text" name ="e" value = <?php echo ( intval( isset( $_GET[ 'ad_show' ] )) ? ''.$uns_to_show[ intval( $_GET[ 'ad_key' ]) ]['e'].'' : 'E-mail' ); ?> > </td>
            </tr>
            <tr>    
                <td> Phone number &nbsp &nbsp</td> 
                <td> <input type="text" type="hidden" name ="pn" value = <?php echo ( intval( isset( $_GET[ 'ad_show' ] )) ? ''.$uns_to_show[ intval( $_GET[ 'ad_key' ]) ]['pn'].'' : 'Phone number' ); ?> > </td>
            </tr> 
            <tr>
                <td> City </td>
                    <td>
                        <select name = "city_id" >
                            <option value = "" > -- Select a City -- </option>
                            <?php isset( $_GET[ 'ad_show' ] ) ? City_select ( $uns_to_show[ intval( $_GET[ 'ad_key' ]) ]['city_id'] ) : City_select (); ?>
                        </select>
                    </td>
            </tr> 
            <tr>
                <td> Category </td>
                    <td>        
                        <select name = "cat_id" >
                            <option value = "" > -- Select a Category -- </option>
                            <?php isset( $_GET[ 'ad_show' ] ) ? Category_select ( $uns_to_show[ intval( $_GET[ 'ad_key' ]) ]['cat_id'] ) : Category_select (); ?>                                                        
                        </select>
                    </td>                    
            </tr> 
            <tr>    
                <td> Title </td> 
                <td> <input type="text" required name ="t" value = <?php echo ( intval( isset( $_GET[ 'ad_show' ] )) ? ''.$uns_to_show[ intval( $_GET[ 'ad_key' ]) ]['t'].'' : 'Title' ); ?> > </td>
            </tr>
            <tr>    
                <td> Description </td> 
                <td> <textarea rows="10" cols="45" name ="d" autofocus ><?php echo ( intval( isset( $_GET[ 'ad_show' ] )) ? ''.$uns_to_show[ intval( $_GET[ 'ad_key' ]) ]['d'].'' : 'Description' ); ?></textarea> </td>
            </tr>
            <tr>    
                <td> Price </td> 
                <td> <input type="text" required name ="p" value = <?php echo ( intval( isset( $_GET[ 'ad_show' ] )) ? ''.$uns_to_show[ intval( $_GET[ 'ad_key' ]) ]['p'].'' : 'Price' ); ?> > </td>
            </tr>
            <tr>
                <td> <input type="submit" name="Button_pressed" value = <?php echo ( intval( isset( $_GET[ 'ad_show' ] )) ? 'Edit!' : 'Add!' ); ?> > </td> <td>  </td>
            </tr>
            <tr>
                <td> <input type="submit" name="Button_del_cookie" value = 'Del Cookie!' > </td> <td>  </td>
            </tr>
        </table>
        </form>


<?php if ( isset( $_COOKIE['ads'] ) && count( unserialize( $_COOKIE['ads'] ) ) !== 0 ): ?>
    
    <h2> Ads Database </h2>        
        <table> 
            <td> Ad Title &nbsp </td> <td> Price &nbsp </td> <td> Seller's name &nbsp &nbsp </td>
                <?php Ads_Database(); ?>
        </table>
    
<?php endif; ?>

    
<?php
/*
$emp = 'Massive is empty';

echo '<hr>';
echo ' -- COOKIE Massive -- <br>';
    print_r ( isset( $_COOKIE['ads'] ) ? unserialize( $_COOKIE['ads'] ) : $emp  );
echo '<hr>';
echo ' -- POST Massive -- <br>';
    print_r ( $_POST );
echo '<hr>';
echo ' -- GET Massive -- <br>';
    print_r ( $_GET );
echo '<hr>';
*/
?>