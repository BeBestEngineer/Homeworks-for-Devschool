                     <input type="hidden" name="seller_type" value = "Individual" >            
            <tr>                
                <td> Name </td>
                <td> <input type="text" required pattern="^[a-zA-Z]+$" name ="seller_name" placeholder="Name" value = "{$data_of_ad.seller_name|default:'Name'}" > </td>
            </tr>
            <tr>
                <td> VK account </td>
                <td> <input type="text" pattern="^[a-zA-Z, 0-9.-]+$" name ="vk_account" placeholder="www.vk.com/id..." value = "{$data_of_ad.vk_account}" > </td>
            </tr>