<?php
    
        foreach($searchresult as $row){
            
            ?>
        <div class="results">
            <?php
           echo $row->name.br(1);
           ?>
            <p><?php echo "Ár: ".$row->price." Ft"  ?></p>    
           <input class="drinkscount" type="text" value="1" name="db"/>Darab
           <div class="cartbutton"><a href="<?php echo $row->link_name; ?>"  class="add_to_cart"><img src="<?php echo base_url()."/img/cartbutton.png" ;?>" /></a></div>
           <div class="informbuttom"><a href="<?php echo site_url("mainsite/drinks/$row->link_name"); ?>"><img src="<?php echo base_url()."/img/moreinform.png" ;?>" /></a></div>
        </div>
           <?php
            
        }
   
       
?>