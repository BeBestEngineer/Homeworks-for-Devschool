{* Комментарии *}
{* Структура шаблона
    1. Шаблон состоит из двух таблиц:
        - первая таблица содержит форму для добавления или редактирования объявления
        - вторая таблица содержит форму для вывода объявлений из файла
    2. Первая таблица всегда отображается, но внутри содержимое меняется в зависимости от нажатых кнопок
    3. Вторая таблица отображается когда в файле записано больше одного объявления *}

{include file='header.tpl' title = 'e-Shop' title_name = 'Nice price' }

    <h2> {$form_header} </h2>   
    <form action = "{$action_adress}" method = "POST">
        <table> 
            <tr>
                <td> Name </td> 
                <td> <input type="text" required name ="{$input_names_of_form.0}" value = {$data_of_ad.n} > </td>
            </tr>
            <tr>
                <td> E-mail </td> 
                <td> <input type="text" name ="{$input_names_of_form.1}" value = {$data_of_ad.e} > </td>
            </tr>
            <tr>    
                <td> Phone number &nbsp &nbsp </td> 
                <td> <input type="text" type="hidden" name ="{$input_names_of_form.2}" value = {$data_of_ad.pn} > </td>
            </tr> 
            <tr>
                <td> City </td>
                    <td>                        
                        <select name = "{$input_names_of_form.3}" >
                            <option value = "" > -- Select a City -- </option>
                                    {html_options options=$array_for_city_select selected=$the_selected_city}
                        </select>                        
                    </td>
            </tr> 
            <tr>
                <td> Category </td>
                    <td>        
                        <select name = "{$input_names_of_form.4}" >
                            <option value = "" > -- Select a Category -- </option>
                                    {html_options options=$array_for_category_select selected=$the_selected_category}
                        </select>
                    </td>                    
            </tr> 
            <tr>    
                <td> Title </td> 
                <td> <input type="text" required name ="{$input_names_of_form.5}" value = {$data_of_ad.t} > </td>
            </tr>
            <tr>    
                <td> Description </td> 
                <td> <textarea rows="10" cols="45" name ="{$input_names_of_form.6}" autofocus >{$data_of_ad.d}</textarea> </td>
            </tr>
            <tr>    
                <td> Price </td> 
                <td> <input type="text" required name ="{$input_names_of_form.7}" value = {$data_of_ad.p} > </td>
            </tr>
            <tr>
                <td> <input type="submit" name="Button_pressed" value = {$name_of_button} > </td> <td>  </td>
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