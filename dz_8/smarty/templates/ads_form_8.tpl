{include file='header.tpl' title = 'e-Shop' title_name = 'Nice price' }

    <h2> {$form_header} </h2>   
    <form action = "{$action_adress}" method = "POST">
        <table> 
            <tr>
                <td> Name </td>
                <td> <input type="text" required pattern="^[a-zA-Z]+$" name ="n" value = "{$data_of_ad.n|default:'Name'}" > </td>
                <td> <input type="hidden" name ="df" value ="df" > </td>                
            </tr>
            <tr>
                <td> E-mail </td> 
                <td> <input type="text" pattern="{literal}\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6}{/literal}" name ="e" value = "{$data_of_ad.e|default:'Name@mail.com'}" > </td>
            </tr>
            <tr>    
                <td> Phone number &nbsp &nbsp </td> 
                <td> <input type="text" pattern="{literal}^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}${/literal}" name ="pn" value = "{$data_of_ad.pn|default:'+7-xxx-xxx-xx-xx'}" > </td>
            </tr> 
            <tr>
                <td> City </td>
                    <td>
                        <select name = "city_id" >
                            <option value = "" > -- Select a City -- </option>
                                    {html_options options=$array_for_city_select selected=$the_selected_city}
                        </select>                        
                    </td>
            </tr> 
            <tr>
                <td> Category </td>
                    <td>        
                        <select name = "cat_id" >
                            <option value = "" > -- Select a Category -- </option>
                                    {html_options options=$array_for_category_select selected=$the_selected_category}
                        </select>
                    </td>                    
            </tr> 
            <tr>    
                <td> Title </td> 
                <td> <input type="text" required pattern="^[a-zA-Z]+$" name ="t" value = "{$data_of_ad.t|default:'Title'}" > </td>
            </tr>
            <tr>    
                <td> Description </td> 
                <td> <textarea rows="10" cols="45" maxlength="300" placeholder="Description" name ="d">{$data_of_ad.d}</textarea> </td>
            </tr>
            <tr>    
                <td> Price </td> 
                <td> <input type="text" required pattern ="^[ 0-9]+$" name ="p" value = "{$data_of_ad.p|default:'Price'}" > </td>
            </tr>
            <tr>
                <td> <input type="submit" name="Button_pressed" value = "{$name_of_button}" > </td> <td>  </td>
            </tr>
        </table>
        </form>

{if ( file_exists( $ads_data_base ) && strlen( file_get_contents ( $ads_data_base )) gt 10 ) }            
    <h2> Ads Database </h2>
        <table>
            <td> Ad Title &nbsp </td> <td> Price &nbsp </td> <td> Seller's name &nbsp &nbsp </td>
        
{foreach from=$aff_to_tpl key=key_aff item=value_aff}
        <tr>
            <td> <a href = "?ad_show={$value_aff.t}&ad_key={$key_aff}"> {$value_aff.t} </a> </td> <td> {$value_aff.p} </td> <td> {$value_aff.n} </td>
            <td> <a href = "?del_ad={$key_aff}"> Remove ad </a> </td>
        </tr>
{/foreach}
        </table>
{/if}

{include file='footer.tpl'}