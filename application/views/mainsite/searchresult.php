<?php
    if($this->input->post('searchoption')){
        echo $searchcount ." találat a következőre: ".$this->input->post('searchoption');
        br(1);
        foreach($searchresult as $row){
            
            ?>
        <div class="results">
            <div class="search_img">
                <img height="100" src="<?php echo base_url("img/drinks/$row->link_name.png") ?>" />
            </div>
            <?php
           echo $row->name.br(1);
           ?>
            <p><?php echo "Ár: ".$row->price." Ft"  ?></p>    
           <input class="drinkscount" type="text" value="1" name="db"/>Darab
           <div class="cartbutton"><a href="<?php echo $row->link_name; ?>"  class="add_to_cart"><img src="<?php echo base_url()."/img/cartbutton.png" ;?>" /></a></div>
           <div class="informbuttom"><a href="<?php echo site_url("alcohol/drink/$row->link_name"); ?>"><img src="<?php echo base_url()."/img/moreinform.png" ;?>" /></a></div>
        </div>
<li class="newdrinksline"></li>
           <?php
            
        }
    }
 else {
     echo "Nem állítottál be keresési paramétert!";
}
       
?>