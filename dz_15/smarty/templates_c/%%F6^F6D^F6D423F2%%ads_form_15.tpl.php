<?php /* Smarty version 2.6.25-dev, created on 2016-05-12 20:16:02
         compiled from ads_form_15.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'ads_form_15.tpl', 47, false),array('modifier', 'default', 'ads_form_15.tpl', 63, false),)), $this); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array('title' => 'e-Bulletin board','title_name' => 'Nice price')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

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
                <?php if (( count ( $this->_tpl_vars['data_of_ad'] ) == 0 )): ?>
                    Adding ad
                <?php else: ?>
                    Edit ad
                <?php endif; ?>    
            </h3>
             
            <form class="form-horizontal" role="form" action = "<?php echo $this->_tpl_vars['action_adress']; ?>
" method = "POST">
                <input type="hidden" name="id" value = "<?php echo $this->_tpl_vars['key_of_ad']; ?>
" >

                <?php if ($_GET['seller_type'] == 'Individual' || $_GET['ad_show'] == 'Individual'): ?>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'ads_form_for_individual.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <?php else: ?>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'ads_form_for_company.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>    
                <?php endif; ?>

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
                            <option value = "" > Select a City </option>
                            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['array_for_city_select'],'selected' => $this->_tpl_vars['data_of_ad']['city_id']), $this);?>

                        </select>          
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label"> Category </label>
                    <div class="col-sm-7">
                        <select class="form-control" name = "category_id" >
                            <option value = "" > Select a Category </option>
                            <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['array_for_category_select'],'selected' => $this->_tpl_vars['data_of_ad']['category_id']), $this);?>

                        </select>          
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label"> Title </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" required placeholder="Title" pattern="^[a-zA-Z, 0-9.-]+$" name ="title" value = "<?php echo ((is_array($_tmp=@$this->_tpl_vars['data_of_ad']['title'])) ? $this->_run_mod_handler('default', true, $_tmp, 'Title') : smarty_modifier_default($_tmp, 'Title')); ?>
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
                      <input type="text" class="form-control" required pattern ="^[ 0-9]+$" placeholder="Price" name ="price" value = "<?php echo ((is_array($_tmp=@$this->_tpl_vars['data_of_ad']['price'])) ? $this->_run_mod_handler('default', true, $_tmp, '100') : smarty_modifier_default($_tmp, '100')); ?>
" >
                    </div>
                </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">

                        <?php if (( count ( $this->_tpl_vars['data_of_ad'] ) == 0 )): ?>
                            <button class="button" type="submit" name="Button_pressed"> Add! </button>
                        <?php else: ?>
                            <button class="button" type="submit" name="Button_pressed"> Edit! </button>
                        <?php endif; ?>        

                        </div>
                    </div>            
            </form>
                    
        </div>                    
        <div class="col-lg-6">
            
            <?php if (( $this->_tpl_vars['count_of_ads'] > 0 )): ?>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'list_of_ads.tpl.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <?php endif; ?>
        
        </div>
    </div>
</div>
            
<div id="storage_for_JQ"></div>            

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>