
{include file='header.tpl' title = 'e-Bulletin board' title_name = 'Nice price' }

<h2> e-Bulletin board </h2>
    <i> Adding ad: <a href = "?seller_type=Individual"> For Individual </a> or <a href = "?seller_type=Company"> For Company </a> </i>

    <h3>
        {if ( count( $data_of_ad ) eq 0 ) }
            Adding ad
        {else}
            Edit ad
        {/if}    
    </h3>   
    <form action = "{$action_adress}" method = "POST">
        <table> 
                     <input type="hidden" name="id" value = "{$key_of_ad}" >

{if $smarty.get.seller_type eq 'Individual' }
    {include file='ads_form_for_individual.tpl'}
{else}
    {include file='ads_form_for_company.tpl'}    
{/if}
            <tr>
                
                <td> E-mail </td>                 
                <td> <input class="wh-field" type="text" pattern="{literal}\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6}{/literal}" name ="e_mail" placeholder="Name@mail.com" value = "{$data_of_ad.e_mail}" > </td>
                
            </tr>
            <tr>    
                <td> Phone number </td> 
                <td> <input class="wh-field" type="text" pattern="{literal}^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}${/literal}" name ="phone_number" placeholder="+7-xxx-xxx-xx-xx" value = "{$data_of_ad.phone_number|default:'+7-000-111-22-44'}" > </td>
            </tr>                                                                                                                               
            <tr>
                <td> City </td>
                    <td>
                        <select name = "city_id" >
                            <option value = "" > -- Select a City -- </option>
                                    {html_options options=$array_for_city_select selected=$data_of_ad.city_id}
                        </select>                        
                    </td>
            </tr> 
            <tr>
                <td> Category </td>
                    <td>        
                        <select name = "category_id" >
                            <option value = "" > -- Select a Category -- </option>
                                    {html_options options=$array_for_category_select selected=$data_of_ad.category_id}
                        </select>
                    </td>                    
            </tr> 
            <tr>    
                <td> Title </td> 
                <td> <input class="wh-field" type="text" required pattern="^[a-zA-Z, 0-9.-]+$" name ="title" placeholder="Title" value = "{$data_of_ad.title|default:'GTX 1090'}" > </td>
            </tr>
            <tr>    
                <td> Description </td> 
                <td> <textarea rows="10" cols="45" maxlength="300" placeholder="Description" name ="description">{$data_of_ad.description}</textarea> </td>
            </tr>
            <tr>    
                <td> Price </td> 
                <td> <input class="wh-field" type="text" required pattern ="^[ 0-9]+$" name ="price" placeholder="Price" value = "{$data_of_ad.price|default:'100'}" > </td>
            </tr>
            <tr>
                <td>
                    {if ( count( $data_of_ad ) eq 0 ) }
                        <input class="button" type="submit" name="Button_pressed" value = "Add!" >
                    {else}
                        <input class="button" type="submit" name="Button_pressed" value = "Edit!" >
                    {/if}

                </td> 
                <td>  </td>
            </tr>
        </table>
        </form>

{if ( $count_of_ads gt 0 ) }
    {include file = 'list_of_ads.tpl.html'}
{/if}

{include file='footer.tpl'}

