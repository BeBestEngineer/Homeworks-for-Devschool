<?php /* Smarty version 2.6.25-dev, created on 2016-05-05 10:37:16
         compiled from ad_row.tpl.html */ ?>
<tr>    
    <td> <a href = "?ad_show=<?php echo $this->_tpl_vars['ad_object']->get_Seller_type(); ?>
&ad_key=<?php echo $this->_tpl_vars['ad_object']->get_Ad_key(); ?>
"> <?php echo $this->_tpl_vars['ad_object']->get_Title(); ?>
 </a> </td>   
    <td> <?php echo $this->_tpl_vars['ad_object']->get_Price(); ?>
 </td>
    <td>
        <?php if ($this->_tpl_vars['ad_object'] instanceof CompanyAds): ?>
            <?php echo $this->_tpl_vars['ad_object']->get_Company_name(); ?>

        <?php endif; ?>
    </td>
    <td>
        <?php if ($this->_tpl_vars['ad_object'] instanceof IndividualAds): ?>
            <?php echo $this->_tpl_vars['ad_object']->get_Seller_name(); ?>

        <?php endif; ?>
    </td>
    <td> <a href = "?del_ad=<?php echo $this->_tpl_vars['ad_object']->get_Ad_key(); ?>
"> Remove ad </a> </td>   
    <td> </td>   
</tr>