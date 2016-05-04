<?php /* Smarty version 2.6.25-dev, created on 2016-04-29 10:42:57
         compiled from ads_form_11.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'ads_form_11.tpl', 14, false),array('function', 'html_options', 'ads_form_11.tpl', 29, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array('title' => 'e-Shop','title_name' => 'Nice price')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <h2>
        <?php if (( count ( $this->_tpl_vars['data_of_ad'] ) == 0 )): ?>
            Adding ad
        <?php else: ?>
            Edit ad
        <?php endif; ?>    
    </h2>   
    <form action = "<?php echo $this->_tpl_vars['action_adress']; ?>
" method = "POST">
        <table> 
            <tr>
                <td> Name </td>
                <td> <input type="text" required pattern="^[a-zA-Z]+$" name ="n" placeholder="Name" value = "<?php echo ((is_array($_tmp=@$this->_tpl_vars['data_of_ad']['name'])) ? $this->_run_mod_handler('default', true, $_tmp, 'KSANDR') : smarty_modifier_default($_tmp, 'KSANDR')); ?>
" > </td>
            </tr>
            <tr>
                <td> E-mail </td> 
                <td> <input type="text" pattern="<?php echo '\\w+@[a-zA-Z_]+?\\.[a-zA-Z]{2,6}'; ?>
" name ="e" placeholder="Name@mail.com" value = "<?php echo $this->_tpl_vars['data_of_ad']['e_mail']; ?>
" > </td>
            </tr>
            <tr>    
                <td> Phone number &nbsp &nbsp </td> 
                <td> <input type="text" pattern="<?php echo '^((8|\\+7)[\\- ]?)?(\\(?\\d{3}\\)?[\\- ]?)?[\\d\\- ]{7,10}$'; ?>
" name ="pn" placeholder="+7-xxx-xxx-xx-xx" value = "<?php echo ((is_array($_tmp=@$this->_tpl_vars['data_of_ad']['phone_number'])) ? $this->_run_mod_handler('default', true, $_tmp, '+7-000-111-22-44') : smarty_modifier_default($_tmp, '+7-000-111-22-44')); ?>
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
                        <select name = "cat_id" >
                            <option value = "" > -- Select a Category -- </option>
                                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['array_for_category_select'],'selected' => $this->_tpl_vars['data_of_ad']['category']), $this);?>

                        </select>
                    </td>                    
            </tr> 
            <tr>    
                <td> Title </td> 
                <td> <input type="text" required pattern="^[a-zA-Z, 0-9.-]+$" name ="t" placeholder="Title" value = "<?php echo ((is_array($_tmp=@$this->_tpl_vars['data_of_ad']['title'])) ? $this->_run_mod_handler('default', true, $_tmp, 'Toyota') : smarty_modifier_default($_tmp, 'Toyota')); ?>
" > </td>
            </tr>
            <tr>    
                <td> Description </td> 
                <td> <textarea rows="10" cols="45" maxlength="300" placeholder="Description" name ="d"><?php echo $this->_tpl_vars['data_of_ad']['description']; ?>
</textarea> </td>
            </tr>
            <tr>    
                <td> Price </td> 
                <td> <input type="text" required pattern ="^[ 0-9]+$" name ="p" placeholder="Price" value = "<?php echo ((is_array($_tmp=@$this->_tpl_vars['data_of_ad']['price'])) ? $this->_run_mod_handler('default', true, $_tmp, '100') : smarty_modifier_default($_tmp, '100')); ?>
" > </td>
            </tr>
            <tr>
                <td>
                    <?php if (( count ( $this->_tpl_vars['data_of_ad'] ) == 0 )): ?>
                        <input type="submit" name="Button_pressed" value = "Add!" >
                    <?php else: ?>
                        <input type="submit" name="Button_pressed" value = "Edit!" >
                    <?php endif; ?>
                        <input type="hidden" name="ad_key" value = "<?php echo $this->_tpl_vars['key_of_ad']; ?>
" > 
                </td> 
                <td>  </td>
            </tr>
        </table>
        </form>


<?php if (( count ( $this->_tpl_vars['array_of_ads'] ) > 0 )): ?>
    <h2> Ads Database </h2>
        <table>
            <td> Ad Title &nbsp </td> <td> Price &nbsp </td> <td> Seller's name &nbsp &nbsp </td>
        
<?php $_from = $this->_tpl_vars['array_of_ads']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key_aof'] => $this->_tpl_vars['value_aof']):
?>
        <tr>
            <td> <a href = "?ad_show=<?php echo $this->_tpl_vars['value_aof']['title']; ?>
&ad_key=<?php echo $this->_tpl_vars['key_aof']; ?>
"> <?php echo $this->_tpl_vars['value_aof']['title']; ?>
 </a> </td> <td> <?php echo $this->_tpl_vars['value_aof']['price']; ?>
 </td> <td> <?php echo $this->_tpl_vars['value_aof']['name']; ?>
 </td>
            <td> <a href = "?del_ad=<?php echo $this->_tpl_vars['key_aof']; ?>
"> Remove ad </a> </td>
        </tr>
<?php endforeach; endif; unset($_from); ?>
        </table>
<?php endif; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>