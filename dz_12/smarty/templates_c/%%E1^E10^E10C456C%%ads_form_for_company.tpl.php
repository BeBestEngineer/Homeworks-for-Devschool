<?php /* Smarty version 2.6.25-dev, created on 2016-05-05 10:57:55
         compiled from ads_form_for_company.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'ads_form_for_company.tpl', 4, false),)), $this); ?>
                     <input type="hidden" name="seller_type" value = "Company" >
            <tr>                
                <td> Company name </td>                                        
                <td> <input class="wh-field" type="text" required pattern="^[a-zA-Z]+$" name ="company_name" placeholder="Name of Company" value = "<?php echo ((is_array($_tmp=@$this->_tpl_vars['data_of_ad']['company_name'])) ? $this->_run_mod_handler('default', true, $_tmp, 'DreamWorks') : smarty_modifier_default($_tmp, 'DreamWorks')); ?>
" >
                </td>                
            </tr>
            <tr>
                <td> Company address </td>
                <td> <input class="wh-field" type="text" required pattern="^[a-zA-Z, 0-9.-]+$" name ="company_address" placeholder="Street name, number of building" value = "<?php echo ((is_array($_tmp=@$this->_tpl_vars['data_of_ad']['company_address'])) ? $this->_run_mod_handler('default', true, $_tmp, 'Los-Angeles CA') : smarty_modifier_default($_tmp, 'Los-Angeles CA')); ?>
" > </td>
            </tr>            
            <tr>    
                <td> Website </td> 
                <td> <input class="wh-field" type="text" pattern="^[a-zA-Z, 0-9.-]+$" name ="website" placeholder="www.domain.domain zone" value = "<?php echo ((is_array($_tmp=@$this->_tpl_vars['data_of_ad']['website'])) ? $this->_run_mod_handler('default', true, $_tmp, 'www.dreamworksstudios.com') : smarty_modifier_default($_tmp, 'www.dreamworksstudios.com')); ?>
" > </td>
            </tr>