                     <input type="hidden" name="seller_type" value = "Company" >
            <tr>                
                <td> Company name </td>
                    <div <div class="form-group has-success has-feedback" >                    
                <td> <input class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" type="text" required pattern="^[a-zA-Z]+$" name ="company_name" placeholder="Name of Company" value = "{$data_of_ad.company_name|default:'NIX'}" >
                </td>
                </div>
            </tr>
            <tr>
                <td> Company address </td>
                <td> <input class="wh-field" type="text" required pattern="^[a-zA-Z, 0-9.-]+$" name ="company_address" placeholder="Street name, number of building" value = "{$data_of_ad.company_address|default:'somewhere in SP'}" > </td>
            </tr>            
            <tr>    
                <td> Website </td> 
                <td> <input class="wh-field" type="text" pattern="^[a-zA-Z, 0-9.-]+$" name ="website" placeholder="www.domain.domain zone" value = "{$data_of_ad.website}" > </td>
            </tr>