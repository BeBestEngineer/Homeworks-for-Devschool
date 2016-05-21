<?php /* Smarty version 2.6.25-dev, created on 2016-05-21 20:14:45
         compiled from ads_form_for_company.tpl */ ?>
<div id="Company-fields">
<div class="form-group">
    <label class="col-sm-4 control-label"> Company name </label>
    <div class="col-sm-7">
        <input class="form-control" type="text" required pattern="^[a-zA-Z]+$" name ="company_name" placeholder="Name of Company" value = "<?php echo $this->_tpl_vars['data_of_ad']['company_name']; ?>
" >
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label"> Company address </label>
    <div class="col-sm-7">
        <input class="form-control" type="text" pattern="^[a-zA-Z, 0-9.-]+$" name ="company_address" placeholder="Street name, number of building" value = "<?php echo $this->_tpl_vars['data_of_ad']['company_address']; ?>
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
</div>    