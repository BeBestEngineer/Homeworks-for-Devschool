<?php
function Adding_Ad() {
        echo '<h2>Adding ad</h2>'   
        .'<form action = "index.php" method = "POST">'
        .'<table>' 
            .'<tr> '
                .'<td> Name </td> <td> <input type="text" name ="n" value = \'Alex\' /> </td>'
            .'</tr> '
            .'<tr>'
                .'<td> E-mail </td> <td> <input type="text" name ="e" value = \'A_1@mail.ru\' /> </td>'
            .'</tr>' 
            .'<tr>'    
                .'<td> Phone number &nbsp &nbsp</td> <td> <input type="text" name ="pn" value = \'+7-965-\' /> </td>'
            .'</tr>' 
            .'<tr>'
                .'<td> City </td> <td> <input type="text" name ="c" value = \'Omsk\' /> </td>'
            .'</tr>' 
            .'<tr>'
                .'<td> Category </td> <td> <input type="text" name ="cat" value = \'Phones\' /> </td>'
            .'</tr>' 
            .'<tr>'    
                .'<td> Title </td> <td> <input type="text" name ="t" value = \'Lumia 640 XL\' /> </td>'
            .'</tr>' 
            .'<tr>'    
                .'<td> Description </td> <td> <textarea rows="10" cols="45" name ="d" value = \'Good & Nice\' > </textarea> </td>'
            .'</tr>'
            .'<tr>'    
                .'<td> Price </td> <td> <input type="text" name ="p" value = \'100$\' /> </td>'
            .'</tr>'
            .'<tr>'    
                .'<td> <input type="submit" value = "Add!" /> </td> <td>  </td>' 
            .'</tr>'
        .'</table>'
        .'</form>';
echo '<br>';        
echo '<a href = "index.php?main_page"> Main Page </a> &nbsp &nbsp';
echo '<a href = "index.php?ads_database"> Ads Database </a>';
}    

function Ads_Database() {    
echo '<h2>Ads Database</h2>';        
        echo '<table> <td> Ad Title &nbsp </td> <td> Price &nbsp </td> <td> Seller\'s name &nbsp &nbsp </td>';
    if ( count( $_SESSION['a']) > 1  ) {
        foreach ($_SESSION['a'] as $key => $value) {
                $key_a = $key;
                $value_a = $value;
                    if ( count($value_a) > 1 ) {
                        echo '<tr>'
                            . '<td> <a href = "index.php?ad_show='.$value_a['t'].'&ad_key='.$key_a.'"> '.$value_a['t'].' </a> </td> <td> '.$value_a['p'].' </td> <td> '.$value_a['n'].' </td>'
                            . '<td> <a href = "index.php?del_ad='.$key_a.'"> Remove ad </a> </td>'
                        . '</tr>';
                    
                    }              
        }
    }
        echo '</table>';
echo '<br>';        
echo '<a href = "index.php?main_page"> Main Page </a> &nbsp &nbsp';
}    
       
function Ad_Show () {
        $t = $_GET ['ad_show'];
        $k_a = $_GET ['ad_key'];
        echo '<h2>'.$t.'</h2>'   
        .'<table>' 
            .'<tr> '
                .'<td> Name </td> <td> '.$_SESSION['a']["$k_a"]['n'].' </td>'
            .'</tr> '
            .'<tr>'
                .'<td> E-mail </td> <td> '.$_SESSION['a']["$k_a"]['e'].' </td>'
            .'</tr>' 
            .'<tr>'    
                .'<td> Phone number &nbsp &nbsp</td> <td> '.$_SESSION['a']["$k_a"]['pn'].' </td>'
            .'</tr>' 
            .'<tr>'
                .'<td> City </td> <td> '.$_SESSION['a']["$k_a"]['c'].' </td>'
            .'</tr>' 
            .'<tr>'
                .'<td> Category </td> <td> '.$_SESSION['a']["$k_a"]['cat'].' </td>'
            .'</tr>' 
            .'<tr>'    
                .'<td> Title </td> <td> '.$_SESSION['a']["$k_a"]['t'].' </td>'
            .'</tr>' 
            .'<tr>'    
                .'<td> Description </td> <td width="340"> '.$_SESSION['a']["$k_a"]['d'].' </td>'
            .'</tr>'
            .'<tr>'    
                .'<td> Price </td> <td> '.$_SESSION['a']["$k_a"]['p'].' </td>'
            .'</tr>'
        .'</table>';
        echo '<br>';
        echo '<a href = "index.php?main_page"> Main Page </a> &nbsp &nbsp';
        echo '<a href = "index.php?ads_database"> Ads Database </a>';
}
?>