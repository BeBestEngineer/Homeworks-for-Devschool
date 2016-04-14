<?php /* Smarty version 2.6.25-dev, created on 2016-04-14 14:40:49
         compiled from ads_form_8.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'ads_form_8.tpl', 31, false),)), $this); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array('title' => 'e-Shop','title_name' => 'Nice price')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <h2> <?php echo $this->_tpl_vars['form_header']; ?>
 </h2>   
    <form action = "<?php echo $this->_tpl_vars['action_adress']; ?>
" method = "POST">
        <table> 
            <tr>
                <td> Name </td> 
                <td> <input type="text" required name ="n" value = <?php echo $this->_tpl_vars['name_of_seller']; ?>
 > </td>
            </tr>
            <tr>
                <td> E-mail </td> 
                <td> <input type="text" name ="e" value = <?php echo $this->_tpl_vars['email_of_seller']; ?>
 > </td>
            </tr>
            <tr>    
                <td> Phone number &nbsp &nbsp </td> 
                <td> <input type="text" type="hidden" name ="pn" value = <?php echo $this->_tpl_vars['pn_of_seller']; ?>
 > </td>
            </tr> 
            <tr>
                <td> City </td>
                    <td>                        
                        <select name = "city_id" >
                            <option value = "" > -- Select a City -- </option>
                                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['array_for_city_select'],'selected' => $this->_tpl_vars['the_selected_city']), $this);?>

                        </select>                        
                    </td>
            </tr> 
            <tr>
                <td> Category </td>
                    <td>        
                        <select name = "cat_id" >
                            <option value = "" > -- Select a Category -- </option>
                                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['array_for_category_select'],'selected' => $this->_tpl_vars['the_selected_category']), $this);?>

                        </select>
                    </td>                    
            </tr> 
            <tr>    
                <td> Title </td> 
                <td> <input type="text" required name ="t" value = <?php echo $this->_tpl_vars['title_of_ad']; ?>
 > </td>
            </tr>
            <tr>    
                <td> Description </td> 
                <td> <textarea rows="10" cols="45" name ="d" autofocus ><?php echo $this->_tpl_vars['description_of_ad']; ?>
</textarea> </td>
            </tr>
            <tr>    
                <td> Price </td> 
                <td> <input type="text" required name ="p" value = <?php echo $this->_tpl_vars['price_of_ad']; ?>
 > </td>
            </tr>
            <tr>
                <td> <input type="submit" name="Button_pressed" value = <?php echo $this->_tpl_vars['name_of_button']; ?>
 > </td> <td>  </td>
            </tr>
        </table>
        </form>

<?php if (( file_exists ( $this->_tpl_vars['ads_data_base'] ) && strlen ( file_get_contents ( $this->_tpl_vars['ads_data_base'] ) ) > 10 )): ?>            
    <h2> Ads Database </h2>
        <table>
            <td> Ad Title &nbsp </td> <td> Price &nbsp </td> <td> Seller's name &nbsp &nbsp </td>
        
<?php $_from = $this->_tpl_vars['aff_to_tpl']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key_aff'] => $this->_tpl_vars['value_aff']):
?>
        <tr>
            <td> <a href = "?ad_show=<?php echo $this->_tpl_vars['value_aff']['t']; ?>
&ad_key=<?php echo $this->_tpl_vars['key_aff']; ?>
"> <?php echo $this->_tpl_vars['value_aff']['t']; ?>
 </a> </td> <td> <?php echo $this->_tpl_vars['value_aff']['p']; ?>
 </td> <td> <?php echo $this->_tpl_vars['value_aff']['n']; ?>
 </td>
            <td> <a href = "?del_ad=<?php echo $this->_tpl_vars['key_aff']; ?>
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