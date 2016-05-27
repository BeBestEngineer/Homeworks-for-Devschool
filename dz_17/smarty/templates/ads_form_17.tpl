
{include file='header.tpl' title = 'e-Bulletin board' title_name = 'Nice price' }

<div class="container">
    <div class="row row-height-1">
        <div class="col-md-6">        
            <h2> e-Bulletin board </h2>
                <div id="seller-type-links"><i> Adding ad: <a id="seller-type-Company" class="btn-seller-type"> For Company </a> or <a id="seller-type-Individual" class="btn-seller-type"> For Individual </a> </i></div>
        </div>
        <div class="col-md-6 center">        
            <div id="message-box-1" class="alert alert-warning alert-dismissible" role="alert" style="display:none">
                <button id="mb1b" type="button" class="close"><span aria-hidden="true">&times;</span></button>
                <strong><div id="message-box-1-text-header"></div></strong>
                    <div id="message-box-1-text" ></div>
            </div>
            <div id="message-box-2"></div>
        </div>
    </div>
    <div class="row">        
        <div class="col-lg-6">        
            <div class="row-height-2">        
                <h3>
                    <div id="rowAdd"> Adding ad </div>
                    <div id="rowEdit" style="display:none"> Edit ad </div>
                </h3>
            </div> 
            <form id="adsform" class="form-horizontal" role="form" method = "POST">
                <input type="hidden" name="id" value = "" >
                <input type="hidden" name="seller_type" value = "" >
                
                    {include file='ads_form_for_individual.tpl'}
                    {include file='ads_form_for_company.tpl'}    

                <div class="form-group">
                    <label class="col-sm-4 control-label"> E-mail </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name ="e_mail" placeholder="Name@mail.com" data-validation="email" data-validation-error-msg="Enter the correct e-mail adress">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label"> Phone number </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name ="phone_number" placeholder="+x-xxx-xxx-xx-xx" data-validation="custom" data-validation-regexp="^[ /+ 0-9.-]+$" data-validation-error-msg="Enter the correct phone number">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label"> City </label>
                    <div class="col-sm-7">
                        <select class="form-control selectpicker" name = "city_id" >
                            <option value = "empty" > Select a City </option>
                            {html_options options=$array_for_city_select}
                        </select>          
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label"> Category </label>
                    <div class="col-sm-7">
                        <select class="form-control selectpicker" name = "category_id" >
                            <option value = "empty" > Select a Category </option>
                            {html_options options=$array_for_category_select}
                        </select>          
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label"> Title </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name ="title" placeholder="Title" data-validation="custom" data-validation-regexp="^[a-zA-Z, 0-9.-]+$" data-validation-error-msg="Write here the name of the ad">
                    </div>
                </div>    
                <div class="form-group">
                    <label class="col-sm-4 control-label"> Description </label>
                    <div class="col-sm-7">
                      <textarea class="form-control" rows="6" maxlength="300" name ="description" placeholder="Description" data-validation="custom" data-validation-regexp="^[a-zA-Z, 0-9.-]+$" data-validation-error-msg="Write a few sentences or characteristics of the good"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label"> Price </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name ="price" placeholder="Price" data-validation="custom" data-validation-regexp="^[ 0-9]+$" data-validation-error-msg="Enter price of good here">
                    </div>
                </div>
                    <div class="row-height-3">
                        <div id="rowAdd" class="form-group">
                            <div class="col-sm-4">
                                <button id="Add_b" class="btn-add-edit" type="submit" style="float:right"> Add </button>
                            </div>
                            <div class="col-sm-7">
                            </div>
                        </div>
                        <div id="rowEdit" class="form-group" style="display:none">
                            <div class="col-sm-4">
                                <button id="Edit_b" class="btn-add-edit" type="submit" style="float:right"> Edit </button>
                            </div>
                            <div class="col-sm-7">
                            </div>
                        </div>
                        <div class="form-group marg">
                            <div class="col-sm-4">
                                <a class="clear-button" style="float:right" > Clear form </a>
                            </div>
                            <div class="col-sm-7">
                            </div>                        
                        </div>
                    </div>                    
            </form>
                    
        </div>                    
        <div class="col-lg-6">
            {include file = 'list_of_ads.tpl.html'}
        </div>
    </div>
</div>
            
{include file='footer.tpl'}