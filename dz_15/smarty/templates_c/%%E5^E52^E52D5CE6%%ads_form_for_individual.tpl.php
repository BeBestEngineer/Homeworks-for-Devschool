<?php /* Smarty version 2.6.25-dev, created on 2016-05-13 14:48:22
         compiled from ads_form_for_individual.tpl */ ?>
<input type="hidden" name="seller_type" value = "Individual" >            

<div class="form-group">
    <label class="col-sm-4 control-label"> Name </label>
    <div class="col-sm-7">
        <input class="form-control" type="text" required pattern="^[a-zA-Z]+$" name ="seller_name" placeholder="Name" value = "<?php echo $this->_tpl_vars['data_of_ad']['seller_name']; ?>
" >
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label"> Account in SN </label>
    <div class="col-sm-7">
        <input class="form-control" type="text" pattern="^[a-zA-Z, 0-9.-, / ]+$" name ="vk_account" placeholder="Any SN..." value = "<?php echo $this->_tpl_vars['data_of_ad']['vk_account']; ?>
" >
    </div>
</div>