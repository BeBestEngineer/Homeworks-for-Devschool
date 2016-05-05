<?php /* Smarty version 2.6.25-dev, created on 2016-05-05 11:07:10
         compiled from ads_form_12.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'ads_form_12.tpl', 38, false),array('modifier', 'default', 'ads_form_12.tpl', 53, false),)), $this); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array('title' => 'e-Bulletin board','title_name' => 'Nice price')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h2> e-Bulletin board </h2>
    <i> Adding ad: <a href = "?seller_type=Company"> For Company </a> or <a href = "?seller_type=Individual"> For Individual </a> </i>

    <h3>
        <?php if (( count ( $this->_tpl_vars['data_of_ad'] ) == 0 )): ?>
            Adding ad
        <?php else: ?>
            Edit ad
        <?php endif; ?>    
    </h3>   
    <form action = "<?php echo $this->_tpl_vars['action_adress']; ?>
" method = "POST">
        <table> 
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
            <tr>
                
                <td> E-mail </td>                 
                <td> <input class="wh-field" type="text" pattern="<?php echo '\\w+@[a-zA-Z_]+?\\.[a-zA-Z]{2,6}'; ?>
" name ="e_mail" placeholder="Name@mail.com" value = "<?php echo $this->_tpl_vars['data_of_ad']['e_mail']; ?>
" > </td>
                
            </tr>
            <tr>    
                <td> Phone number </td> 
                <td> <input class="wh-field" type="text" pattern="<?php echo '^[ /+ 0-9.-]+$'; ?>
" name ="phone_number" placeholder="+x-xxx-xxx-xx-xx" value = "<?php echo $this->_tpl_vars['data_of_ad']['phone_number']; ?>
" > </td>
            </tr>                                                                                                                               
            <tr>
                <td> City </td>
                    <td>
                        <select name = "city_id" >
                            <option value = "" > -- Select a City -- </option>
                                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['array_for_city_select'],'selected' => $this->_tpl_vars['data_of_ad']['city_id']), $this);?>

                        </select>                        
                    </td>
            </tr> 
            <tr>
                <td> Category </td>
                    <td>        
                        <select name = "category_id" >
                            <option value = "" > -- Select a Category -- </option>
                                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['array_for_category_select'],'selected' => $this->_tpl_vars['data_of_ad']['category_id']), $this);?>

                        </select>
                    </td>                    
            </tr> 
            <tr>    
                <td> Title </td> 
                <td> <input class="wh-field" type="text" required pattern="^[a-zA-Z, 0-9.-]+$" name ="title" placeholder="Title" value = "<?php echo ((is_array($_tmp=@$this->_tpl_vars['data_of_ad']['title'])) ? $this->_run_mod_handler('default', true, $_tmp, 'Title') : smarty_modifier_default($_tmp, 'Title')); ?>
" > </td>
            </tr>
            <tr>    
                <td> Description </td> 
                <td> <textarea rows="10" cols="45" maxlength="300" placeholder="Description" name ="description"><?php echo $this->_tpl_vars['data_of_ad']['description']; ?>
</textarea> </td>
            </tr>
            <tr>    
                <td> Price </td> 
                <td> <input class="wh-field" type="text" required pattern ="^[ 0-9]+$" name ="price" placeholder="Price" value = "<?php echo ((is_array($_tmp=@$this->_tpl_vars['data_of_ad']['price'])) ? $this->_run_mod_handler('default', true, $_tmp, '100') : smarty_modifier_default($_tmp, '100')); ?>
" > </td>
            </tr>
            <tr>
                <td>
                    <?php if (( count ( $this->_tpl_vars['data_of_ad'] ) == 0 )): ?>
                        <input class="button" type="submit" name="Button_pressed" value = "Add!" >
                    <?php else: ?>
                        <input class="button" type="submit" name="Button_pressed" value = "Edit!" >
                    <?php endif; ?>

                </td> 
                <td>  </td>
            </tr>
        </table>
        </form>

<?php if (( $this->_tpl_vars['count_of_ads'] > 0 )): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'list_of_ads.tpl.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>