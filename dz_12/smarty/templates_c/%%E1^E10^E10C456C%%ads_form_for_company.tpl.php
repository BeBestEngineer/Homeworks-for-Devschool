<?php /* Smarty version 2.6.25-dev, created on 2016-05-06 14:16:30
         compiled from ads_form_for_company.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'ads_form_for_company.tpl', 6, false),)), $this); ?>
<input type="hidden" name="seller_type" value = "Company" >
            
<div class="form-group">
    <label class="col-sm-4 control-label"> Company name </label>
    <div class="col-sm-7">
        <input class="form-control" type="text" required pattern="^[a-zA-Z]+$" name ="company_name" placeholder="Name of Company" value = "<?php echo ((is_array($_tmp=@$this->_tpl_vars['data_of_ad']['company_name'])) ? $this->_run_mod_handler('default', true, $_tmp, 'DreamWorks') : smarty_modifier_default($_tmp, 'DreamWorks')); ?>
" >
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label"> Company address </label>
    <div class="col-sm-7">
        <input class="form-control" type="text" pattern="^[a-zA-Z, 0-9.-]+$" name ="company_address" placeholder="Street name, number of building" value = "<?php echo ((is_array($_tmp=@$this->_tpl_vars['data_of_ad']['company_address'])) ? $this->_run_mod_handler('default', true, $_tmp, 'Los-Angeles CA') : smarty_modifier_default($_tmp, 'Los-Angeles CA')); ?>
" >
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">  Website </label>
    <div class="col-sm-7">
        <input class="form-control" type="text" pattern="^[a-zA-Z, 0-9.-, / ]+$" name ="website" placeholder="www.domain.domain zone" value = "<?php echo $this->_tpl_vars['data_of_ad']['website']; ?>
" >
    </div>
</div>