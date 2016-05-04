<?php /* Smarty version 2.6.25-dev, created on 2016-05-04 19:42:18
         compiled from ads_form_for_company.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'ads_form_for_company.tpl', 5, false),)), $this); ?>
                     <input type="hidden" name="seller_type" value = "Company" >
            <tr>                
                <td> Company name </td>
                    <div <div class="form-group has-success has-feedback" >                    
                <td> <input class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" type="text" required pattern="^[a-zA-Z]+$" name ="company_name" placeholder="Name of Company" value = "<?php echo ((is_array($_tmp=@$this->_tpl_vars['data_of_ad']['company_name'])) ? $this->_run_mod_handler('default', true, $_tmp, 'NIX') : smarty_modifier_default($_tmp, 'NIX')); ?>
" >
                </td>
                </div>
            </tr>
            <tr>
                <td> Company address </td>
                <td> <input class="wh-field" type="text" required pattern="^[a-zA-Z, 0-9.-]+$" name ="company_address" placeholder="Street name, number of building" value = "<?php echo ((is_array($_tmp=@$this->_tpl_vars['data_of_ad']['company_address'])) ? $this->_run_mod_handler('default', true, $_tmp, 'somewhere in SP') : smarty_modifier_default($_tmp, 'somewhere in SP')); ?>
" > </td>
            </tr>            
            <tr>    
                <td> Website </td> 
                <td> <input class="wh-field" type="text" pattern="^[a-zA-Z, 0-9.-]+$" name ="website" placeholder="www.domain.domain zone" value = "<?php echo $this->_tpl_vars['data_of_ad']['website']; ?>
" > </td>
            </tr>