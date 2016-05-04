<?php /* Smarty version 2.6.25-dev, created on 2016-05-04 10:28:54
         compiled from ad_row.tpl.html */ ?>
<tr>    
    <td> <a href = "?ad_show&ad_key=<?php echo $this->_tpl_vars['ad_object']->get_Ad_key(); ?>
"> <?php echo $this->_tpl_vars['ad_object']->get_Title(); ?>
 </a> </td>   
    <td> <?php echo $this->_tpl_vars['ad_object']->get_Price(); ?>
 </td>
    <td> <?php echo $this->_tpl_vars['ad_object']->get_Company_name(); ?>
 </td>   
    <td> <a href = "?del_ad=<?php echo $this->_tpl_vars['ad_object']->get_Ad_key(); ?>
"> Remove ad </a> </td>   
    <td> </td>   
</tr>