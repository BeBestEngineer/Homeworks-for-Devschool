<?php /* Smarty version 2.6.25-dev, created on 2016-05-05 11:07:10
         compiled from list_of_ads.tpl.html */ ?>
<h3> List of Ads </h3>
    
    <table class="table table-hover" >
        <td class="table-header" > Ad Title </td> <td class="table-header" > Price </td> <td class="table-header" > Company name </td> <td class="table-header" > Seller name </td> <td class="table-header" > Action </td>
            <tbody>
                <?php echo $this->_tpl_vars['ads_rows']; ?>

            </tbody>    
    </table>