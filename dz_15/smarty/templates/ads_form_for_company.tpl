<input type="hidden" name="seller_type" value = "Company" >
            
<div class="form-group">
    <label class="col-sm-4 control-label"> Company name </label>
    <div class="col-sm-7">
        <input class="form-control" type="text" required pattern="^[a-zA-Z]+$" name ="company_name" placeholder="Name of Company" value = "{$data_of_ad.company_name|default:'DreamWorks'}" >
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label"> Company address </label>
    <div class="col-sm-7">
        <input class="form-control" type="text" pattern="^[a-zA-Z, 0-9.-]+$" name ="company_address" placeholder="Street name, number of building" value = "{$data_of_ad.company_address|default:'Los-Angeles CA'}" >
    </div>
</div>
<div class="form-group">
    <label class="col-sm-4 control-label">  Website </label>
    <div class="col-sm-7">
        <input class="form-control" type="text" pattern="^[a-zA-Z, 0-9.-, / ]+$" name ="website" placeholder="www.domain.domain zone" value = "{$data_of_ad.website}" >
    </div>
</div>