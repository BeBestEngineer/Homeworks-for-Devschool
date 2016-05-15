<?php /* Smarty version 2.6.25-dev, created on 2016-05-14 12:40:38
         compiled from list_of_ads.tpl.html */ ?>
<div class="form-group">
<div class="col-sm-4">
    <div class="text-left"> <h3> List of Ads </h3> </div>
</div>
<div class="col-sm-8">
    <div class="text-right"> <a class="btn-del-all"> Remove all ads </a> </div>
</div>
</div>
    <table class="table table-hover" >
            <thead>
                <th class="table-header" > Ad Title </th> <th class="table-header" > Price </th> <th class="table-header" > Company name </th> <th class="table-header" > Seller name </th> <th class="table-header-action" > Action </th>
            </thead>
            <tbody>
                <?php echo $this->_tpl_vars['ads_rows']; ?>

                 <tr id="for-empty-table" class="for-empty-table" style="" > <td colspan="5"> No ads from database </td> </tr>
            </tbody>    
    </table>