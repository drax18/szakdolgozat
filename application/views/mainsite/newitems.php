<div id="newdrinklist">
    <h4 class="newitems">Új áruk</h4>
    <?php
    $i = 0;
    foreach($newdrinks as $row){
    ?>
    <div id="alcohol" >
        <div id="img">
        <img src="<?php echo base_url()."img/new_drinks/$row->link_name.png" ;?>" height="170" />
        </div>
        
     </div>
    <div id="table">
            <table height="170">
                <tr>
                     <td><h4 style="text-decoration:underline;"><?php echo $row->name ;?></h4></td>
                </tr>
                <tr>
                    <td><?php echo "Ár: ".$row->price." Ft" ;?></td>
                </tr>
                <tr>
                    <td style="font-size:14px;"><a style="color:black;" href="" ><?php echo character_limiter($row->drink_title, 15); ?></a></td>
                </tr>
                <tr>
                    <td><a href=""><img src="<?php echo base_url()."/img/moreinform.png" ;?>" /></a></td>
                </tr>
                <tr>
                    <td><a href="<?php echo $row->link_name; ?>" class="add_to_cart"><img src="<?php echo base_url()."/img/cartbutton.png" ;?>" /></a></td>
                </tr>
            </table>           
        </div>
    <?php    
        $i++;
        if($i%3 == 0){
            ?>                
                <div style="clear: both;"></div>
                <li class="newdrinksline"></li>
            <?php
        }
        
    }
    ?>    
</div>

   
