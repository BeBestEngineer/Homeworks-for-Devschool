<?php /* Smarty version 2.6.25-dev, created on 2016-05-21 13:23:04
         compiled from list_of_ads.tpl.html */ ?>
<div class="form-group">
<div class="col-sm-4">
    <div class="text-left"> <h3> List of Ads </h3> </div>
</div>
<div class="col-sm-8">
    <div class="text-right"> <a class="btn-del-all"> Remove all ads </a> </div>
</div>
</div>
    <table id="list-of-ads" class="table table-hover" >
            <thead>
                <th class="table-header" > Ad Title </th> <th class="table-header" > Price </th> <th class="table-header" > Company name </th> <th class="table-header" > Seller name </th> <th class="table-header-action" > Action </th>
            </thead>
            <tbody id="tbody-id">
                <tr class="for-clone" style="display:none">    
                    <td> <a class="btn-show"></a> </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="remove-button"> <a class="btn-del"> Remove ad </a> </td>
                    <td style="display:none"></td>
                </tr> 
                <?php echo $this->_tpl_vars['ads_rows']; ?>

            </tbody>    
    </table>

    <div style="display:none" id="for-empty-table" class="alert alert-warning alert-dismissible message-box-2" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong> No ads from database </strong>
    </div>