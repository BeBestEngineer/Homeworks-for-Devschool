<?php /* Smarty version 2.6.25-dev, created on 2016-05-15 12:06:51
         compiled from ad_row.tpl.html */ ?>
<tr class="ad">    
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
    <td class="remove-button"> <a class="btn-del"> Remove ad </a> </td>   
    <td style="display:none"><?php echo $this->_tpl_vars['ad_object']->get_Ad_key(); ?>
 </td>
</tr>