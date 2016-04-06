<title>e-Shop. Nice price.</title>
    
<h2> <?php echo ( intval( isset( $_GET[ 'ad_show' ] )) ? 'Edit' : 'Adding' ).' ad'; ?> </h2>   
    <form action = "<?php echo( intval( isset( $_GET[ 'ad_show' ] )) ? 'index.php?edit_ad='.$_GET[ 'ad_key' ].'' : 'index.php' ); ?>" method = "POST">
        <table> 
            <tr>
                <td> Name </td> 
                <td> <input type="text" name ="n" value = <?php echo ( intval( isset( $_GET[ 'ad_show' ] )) ? ''.$_SESSION['a'][ intval( $_GET[ 'ad_key' ]) ]['n'].'' : 'Name' ); ?> > </td>
            </tr>
            <tr>
                <td> E-mail </td> 
                <td> <input type="text" name ="e" value = <?php echo ( intval( isset( $_GET[ 'ad_show' ] )) ? ''.$_SESSION['a'][ intval( $_GET[ 'ad_key' ]) ]['e'].'' : 'E-mail' ); ?> > </td>
            </tr>
            <tr>    
                <td> Phone number &nbsp &nbsp</td> 
                <td> <input type="text" name ="pn" value = <?php echo ( intval( isset( $_GET[ 'ad_show' ] )) ? ''.$_SESSION['a'][ intval( $_GET[ 'ad_key' ]) ]['pn'].'' : 'Phone number' ); ?> > </td>
            </tr> 
            <tr>
                <td> City </td>
                    <td>
                        <select name = "city_id" >
                            <option value = "" > -- Select a City -- </option>
                            <?php isset( $_GET[ 'ad_show' ] ) ? City_select ( $_SESSION['a'][ intval( $_GET[ 'ad_key' ]) ]['city_id'] ) : City_select (); ?>
                        </select>
                    </td>
            </tr> 
            <tr>
                <td> Category </td>
                    <td>        
                        <select name = "cat_id" >
                            <option value = "" > -- Select a Category -- </option>
                            <?php isset( $_GET[ 'ad_show' ] ) ? Category_select ( $_SESSION['a'][ intval( $_GET[ 'ad_key' ]) ]['cat_id'] ) : Category_select (); ?>                                                        
                        </select>
                    </td>                    
            </tr> 
            <tr>    
                <td> Title </td> 
                <td> <input type="text" name ="t" value = <?php echo ( intval( isset( $_GET[ 'ad_show' ] )) ? ''.$_SESSION['a'][ intval( $_GET[ 'ad_key' ]) ]['t'].'' : 'Title' ); ?> > </td>
            </tr>
            <tr>    
                <td> Description </td> 
                <td> <textarea rows="10" cols="45" name ="d" autofocus ><?php echo ( intval( isset( $_GET[ 'ad_show' ] )) ? ''.$_SESSION['a'][ intval( $_GET[ 'ad_key' ]) ]['d'].'' : 'Description' ); ?></textarea> </td>
            </tr>
            <tr>    
                <td> Price </td> 
                <td> <input type="text" name ="p" value = <?php echo ( intval( isset( $_GET[ 'ad_show' ] )) ? ''.$_SESSION['a'][ intval( $_GET[ 'ad_key' ]) ]['p'].'' : 'Price' ); ?> > </td>
            </tr>
            <tr>
                <td> <input type="submit" value = <?php echo ( intval( isset( $_GET[ 'ad_show' ] )) ? 'Edit!' : 'Add!' ); ?> > </td> <td>  </td>
            </tr>
        </table>
        </form>