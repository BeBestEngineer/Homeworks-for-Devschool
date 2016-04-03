<title>e-Shop. Nice price.</title>
<h1>e-Shop</h1>
    <i>&nbsp For adding ad, please fill form 'Adding ad' and press 'Add!'.</i> <br>
    <i>&nbsp &nbsp For show ad, press 'Ad Title' hyperlink.</i> <br>

    <h2> Adding ad </h2>   
    <form method = "POST">
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
                <td> Description </td> <td> <textarea rows="10" cols="45" name ="d" ></textarea> </td>
            </tr>
            <tr>    
                <td> Price </td> <td> <input type="text" name ="p" value = '100$' /> </td>
            </tr>
            <tr>
                <td> <input type="submit" value = "Add!" /> </td> <td>  </td>
            </tr>
        </table>
        </form>
