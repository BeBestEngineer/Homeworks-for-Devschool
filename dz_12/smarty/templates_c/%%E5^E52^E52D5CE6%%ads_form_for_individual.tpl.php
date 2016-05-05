<?php /* Smarty version 2.6.25-dev, created on 2016-05-05 11:08:42
         compiled from ads_form_for_individual.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'ads_form_for_individual.tpl', 4, false),)), $this); ?>
                     <input type="hidden" name="seller_type" value = "Individual" >            
            <tr>                
                <td> Name </td>
                <td> <input type="text" required pattern="^[a-zA-Z]+$" name ="seller_name" placeholder="Name" value = "<?php echo ((is_array($_tmp=@$this->_tpl_vars['data_of_ad']['seller_name'])) ? $this->_run_mod_handler('default', true, $_tmp, 'Name') : smarty_modifier_default($_tmp, 'Name')); ?>
" > </td>
            </tr>
            <tr>
                <td> VK account </td>
                <td> <input type="text" pattern="^[a-zA-Z, 0-9.-]+$" name ="vk_account" placeholder="www.vk.com/id..." value = "<?php echo $this->_tpl_vars['data_of_ad']['vk_account']; ?>
" > </td>
            </tr>