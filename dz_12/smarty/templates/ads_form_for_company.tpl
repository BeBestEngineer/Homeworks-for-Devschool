                     <input type="hidden" name="seller_type" value = "Company" >
            <tr>                
                <td> Company name </td>                                        
                <td> <input class="wh-field" type="text" required pattern="^[a-zA-Z]+$" name ="company_name" placeholder="Name of Company" value = "{$data_of_ad.company_name|default:'DreamWorks'}" >
                </td>                
            </tr>
            <tr>
                <td> Company address </td>
                <td> <input class="wh-field" type="text" required pattern="^[a-zA-Z, 0-9.-]+$" name ="company_address" placeholder="Street name, number of building" value = "{$data_of_ad.company_address|default:'Los-Angeles CA'}" > </td>
            </tr>            
            <tr>    
                <td> Website </td> 
                <td> <input class="wh-field" type="text" pattern="^[a-zA-Z, 0-9.-]+$" name ="website" placeholder="www.domain.domain zone" value = "{$data_of_ad.website|default:'www.dreamworksstudios.com'}" > </td>
            </tr>