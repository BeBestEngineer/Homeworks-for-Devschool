<title>e-Shop. Nice price.</title>
<h1>e-Shop</h1>
    <i>&nbsp For adding ad, please fill form 'Adding ad' and press 'Add!'.</i> <br>
    <i>&nbsp &nbsp For show ad, press 'Ad Title' hyperlink.</i> <br>

    <h2> Edit ad </h2>   
    <form method = "POST">
        <table> 
            <tr>
                <td> Name </td> <td> <input type="text" name ="n" value ="<?php echo ''.$from_ad['n'].''; ?>"> </td>
            </tr>
            <tr>
                <td> E-mail </td> <td> <input type="text" name ="e" value ="<?php echo ''.$from_ad['e'].''; ?>"> </td>
            </tr>
            <tr>    
                <td> Phone number &nbsp &nbsp</td> <td> <input type="text" name ="pn" value ="<?php echo ''.$from_ad['pn'].''; ?>"> </td>
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
                <td> Title </td> <td> <input type="text" name ="t" value ="<?php echo ''.$from_ad['t'].''; ?>"> </td>
            </tr>
            <tr>    
                <td> Description </td> <td> <textarea rows="10" cols="45" name ="d" ><?php echo ''.$from_ad['d'].''; ?> </textarea> </td>
            </tr>
            <tr>    
                <td> Price </td> <td> <input type="text" name ="p" value ="<?php echo ''.$from_ad['p'].''; ?>"> </td>
            </tr>
            <tr>
                <td> <input type="submit" value = "Edit!" /> </td> <td>  </td>
            </tr>
        </table>
        </form>
    