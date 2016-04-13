<title>Add your Ad</title>

<h2> <?php echo ( isset( $_GET[ 'ad_show' ] ) ? 'Edit' : 'Adding' ).' ad'; ?> </h2>   
    <form action = "<?php echo( isset( $_GET[ 'ad_show' ] ) ? $_SERVER[ 'SCRIPT_NAME' ].'?edit_ad='.intval( $_GET[ 'ad_key' ] ) : $_SERVER[ 'SCRIPT_NAME' ] ); ?>" method = "POST">
        <table> 
            <tr>
                <td> Name </td> 
                <td> <input type="text" required name ="n" value = <?php echo ( isset( $_GET[ 'ad_show' ] ) ? $safe['n'] : 'Name' ); ?> > </td>
            </tr>
            <tr>
                <td> E-mail </td> 
                <td> <input type="text" name ="e" value = <?php echo ( isset( $_GET[ 'ad_show' ] ) ? $safe['e'] : 'E-mail' ); ?> > </td>
            </tr>
            <tr>    
                <td> Phone number &nbsp &nbsp</td> 
                <td> <input type="text" type="hidden" name ="pn" value = <?php echo ( isset( $_GET[ 'ad_show' ] ) ? $safe['pn'] : 'Phone number' ); ?> > </td>
            </tr> 
            <tr>
                <td> City </td>
                    <td>
                        <select name = "city_id" >
                            <option value = "" > -- Select a City -- </option>
                            <?php isset( $_GET[ 'ad_show' ] ) ? City_select ( $safe[ 'city_id' ]) : City_select (); ?>
                        </select>
                    </td>
            </tr> 
            <tr>
                <td> Category </td>
                    <td>        
                        <select name = "cat_id" >
                            <option value = "" > -- Select a Category -- </option>
                            <?php isset( $_GET[ 'ad_show' ] ) ? Category_select ( $safe[ 'cat_id' ]) : Category_select (); ?>                                                        
                        </select>
                    </td>                    
            </tr> 
            <tr>    
                <td> Title </td> 
                <td> <input type="text" required name ="t" value = <?php echo (  isset( $_GET[ 'ad_show' ] ) ? $safe['t'] : 'Title' ); ?> > </td>
            </tr>
            <tr>    
                <td> Description </td> 
                <td> <textarea rows="10" cols="45" name ="d" autofocus ><?php echo ( isset( $_GET[ 'ad_show' ] ) ? $safe['d'] : 'Description' ); ?></textarea> </td>
            </tr>
            <tr>    
                <td> Price </td> 
                <td> <input type="text" required name ="p" value = <?php echo ( isset( $_GET[ 'ad_show' ] ) ? $safe['p'] : 'Price' ); ?> > </td>
            </tr>
            <tr>
                <td> <input type="submit" name="Button_pressed" value = <?php echo ( isset( $_GET[ 'ad_show' ] ) ? 'Edit!' : 'Add!' ); ?> > </td> <td>  </td>
            </tr>
        </table>
        </form>


<?php if ( filesize( $adb ) > 10 ): ?>
    
    <h2> Ads Database </h2>        
        <table> 
            <td> Ad Title &nbsp </td> <td> Price &nbsp </td> <td> Seller's name &nbsp &nbsp </td>
                <?php Ads_Database( $adb ); ?>
        </table>
    
<?php endif; ?>