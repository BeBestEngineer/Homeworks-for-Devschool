<?php /* Smarty version 2.6.25-dev, created on 2016-05-21 20:14:45
         compiled from ads_form_16.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'ads_form_16.tpl', 48, false),)), $this); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array('title' => 'e-Bulletin board','title_name' => 'Nice price')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">        
            <h2> e-Bulletin board </h2>
                <i> Adding ad: <a id="seller-type-Company" class="btn-seller-type"> For Company </a> or <a id="seller-type-Individual" class="btn-seller-type"> For Individual </a> </i>
        </div>
        <div class="col-md-6 center">        
            <div class="alert alert-warning alert-dismissible message-box-1" style="display:none" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Warning!</strong> Better check yourself, you're not looking too good.
            </div>
        </div>
    </div>
    <div class="row">        
        <div class="col-lg-6" id="testjquery_disable" onclick="$('#testjquery').hide('slow')">        
            <h3>
                    <div id="rowAdd"> Adding ad </div>
                    <div id="rowEdit" style="display:none"> Edit ad </div>
            </h3>
             
            <form id="adsform" class="form-horizontal" role="form" method = "POST">
                <input type="hidden" name="id" value = "<?php echo $this->_tpl_vars['key_of_ad']; ?>
" >
                <input type="hidden" name="seller_type" value = "" >
                
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'ads_form_for_individual.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'ads_form_for_company.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>    

                <div class="form-group">
                    <label class="col-sm-4 control-label"> E-mail </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" placeholder="Name@mail.com" pattern="<?php echo '\\w+@[a-zA-Z_]+?\\.[a-zA-Z]{2,6}'; ?>
" name ="e_mail" value = "<?php echo $this->_tpl_vars['data_of_ad']['e_mail']; ?>
" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label"> Phone number </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" placeholder="+x-xxx-xxx-xx-xx" pattern="^[ /+ 0-9.-]+$" name ="phone_number" value = "<?php echo $this->_tpl_vars['data_of_ad']['phone_number']; ?>
" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label"> City </label>
                    <div class="col-sm-7">
                        <select class="form-control" name = "city_id" >
                            <option value = "empty" > Select a City </option>
                            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['array_for_city_select']), $this);?>

                        </select>          
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label"> Category </label>
                    <div class="col-sm-7">
                        <select class="form-control" name = "category_id" >
                            <option value = "empty" > Select a Category </option>
                            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['array_for_category_select']), $this);?>

                        </select>          
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label"> Title </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" required placeholder="Title" pattern="^[a-zA-Z, 0-9.-]+$" name ="title" value = "<?php echo $this->_tpl_vars['data_of_ad']['title']; ?>
" >
                    </div>
                </div>    
                <div class="form-group">
                    <label class="col-sm-4 control-label"> Description </label>
                    <div class="col-sm-7">
                      <textarea class="form-control" rows="6" maxlength="300" placeholder="Description" pattern="^[a-zA-Z, 0-9.-]+$" name ="description"><?php echo $this->_tpl_vars['data_of_ad']['description']; ?>
</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label"> Price </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" required pattern ="^[ 0-9]+$" placeholder="Price" name ="price" value = "<?php echo $this->_tpl_vars['data_of_ad']['price']; ?>
" >
                    </div>
                </div>
                    <div id="rowAdd" class="form-group">
                        <div class="col-sm-4">
                            <a id="Add" class="btn-add-edit" style="float:right" > Add </a>
                        </div>
                        <div class="col-sm-7">
                        </div>
                    </div>
                    <div id="rowEdit" class="form-group" style="display:none">
                        <div class="col-sm-4">
                            <a id="Edit" class="btn-add-edit" style="float:right" > Edit </a>
                        </div>
                        <div class="col-sm-7">
                        </div>
                    </div>                    
                    <div class="form-group">
                        <div class="col-sm-4">
                            <a class="clear-button" style="float:right" > Clear form </a>
                        </div>
                        <div class="col-sm-7">
                        </div>                        
                    </div>
                                        
                        
            </form>
                    
        </div>                    
        <div class="col-lg-6">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'list_of_ads.tpl.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
    </div>
</div>
            
<div id="storage_for_JQ"></div>            

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>