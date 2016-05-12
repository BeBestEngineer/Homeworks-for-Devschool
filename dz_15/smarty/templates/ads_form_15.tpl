
{include file='header.tpl' title = 'e-Bulletin board' title_name = 'Nice price' }

<div class="container">
    <div class="row">
        <div class="col-md-6">        
            <h2> e-Bulletin board </h2>
                <i> Adding ad: <a href = "?seller_type=Company"> For Company </a> or <a href = "?seller_type=Individual"> For Individual </a> </i>
        </div>
    </div>
    <div class="row">        
        <div class="col-lg-6" id="testjquery_disable" onclick="$('#testjquery').hide('slow')">        
            <h3>
                {if ( count( $data_of_ad ) eq 0 ) }
                    Adding ad
                {else}
                    Edit ad
                {/if}    
            </h3>
             
            <form class="form-horizontal" role="form" action = "{$action_adress}" method = "POST">
                <input type="hidden" name="id" value = "{$key_of_ad}" >

                {if $smarty.get.seller_type eq 'Individual' or $smarty.get.ad_show eq 'Individual'}
                    {include file='ads_form_for_individual.tpl'}
                {else}
                    {include file='ads_form_for_company.tpl'}    
                {/if}

                <div class="form-group">
                    <label class="col-sm-4 control-label"> E-mail </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" placeholder="Name@mail.com" pattern="{literal}\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6}{/literal}" name ="e_mail" value = "{$data_of_ad.e_mail}" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label"> Phone number </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" placeholder="+x-xxx-xxx-xx-xx" pattern="^[ /+ 0-9.-]+$" name ="phone_number" value = "{$data_of_ad.phone_number}" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label"> City </label>
                    <div class="col-sm-7">
                        <select class="form-control" name = "city_id" >
                            <option value = "" > Select a City </option>
                            {html_options options=$array_for_city_select selected=$data_of_ad.city_id}
                        </select>          
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label"> Category </label>
                    <div class="col-sm-7">
                        <select class="form-control" name = "category_id" >
                            <option value = "" > Select a Category </option>
                            {html_options options=$array_for_category_select selected=$data_of_ad.category_id}
                        </select>          
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label"> Title </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" required placeholder="Title" pattern="^[a-zA-Z, 0-9.-]+$" name ="title" value = "{$data_of_ad.title|default:'Title'}" >
                    </div>
                </div>    
                <div class="form-group">
                    <label class="col-sm-4 control-label"> Description </label>
                    <div class="col-sm-7">
                      <textarea class="form-control" rows="6" maxlength="300" placeholder="Description" pattern="^[a-zA-Z, 0-9.-]+$" name ="description">{$data_of_ad.description}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label"> Price </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" required pattern ="^[ 0-9]+$" placeholder="Price" name ="price" value = "{$data_of_ad.price|default:'100'}" >
                    </div>
                </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">

                        {if ( count( $data_of_ad ) eq 0 ) }
                            <button class="button" type="submit" name="Button_pressed"> Add! </button>
                        {else}
                            <button class="button" type="submit" name="Button_pressed"> Edit! </button>
                        {/if}        

                        </div>
                    </div>            
            </form>
                    
        </div>                    
        <div class="col-lg-6">
            
            {if ( $count_of_ads gt 0 ) }
                {include file = 'list_of_ads.tpl.html'}
            {/if}
        
        </div>
    </div>
</div>

{include file='footer.tpl'}