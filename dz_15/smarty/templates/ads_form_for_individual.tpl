<input type="hidden" name="seller_type" value = "Individual" >            

<div class="form-group">
    <label class="col-sm-4 control-label"> Name </label>
    <div class="col-sm-7">
        <input class="form-control" type="text" required pattern="^[a-zA-Z]+$" name ="seller_name" placeholder="Name" value = "{$data_of_ad.seller_name}" >
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label"> Account in SN </label>
    <div class="col-sm-7">
        <input class="form-control" type="text" pattern="^[a-zA-Z, 0-9.-, / ]+$" name ="vk_account" placeholder="Any SN..." value = "{$data_of_ad.vk_account}" >
    </div>
</div>