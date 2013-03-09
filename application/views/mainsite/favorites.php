<?php
if($this->session->userdata('username')){
    
    echo "<h4>Kedvenceim</h4>";
    ?>
    <div class="favorites">
        <div class="allremovefav">
              <ul>
            <?php
            if($favorites){
                foreach ($favorites as $row){
                    ?>
                   <div class="favimg">
                        <img height="90px" src="<?php echo base_url()."img/drinks/".$row->link_name.".png" ;?>" />
                </div>
                    <div class="favinfos">
                        <div class="favname">
                            <?php
                                echo "<h4>".$row->name."</h4>";
                            ?>
                        </div>
                        <div class="favinfo">
                            <?php echo "Információ: ".character_limiter($row->drink_information, 35); ?>
                        </div>
                        <div class="favprice">
                            <?php echo "Ár: ".$row->price; ?>
                        </div>
                        <div class="favremove">
                            <a style="color:grey;" class="favorremove" href="" data-favid="<?php echo $row->id;  ?>">Kedvencek -</a>
                        </div>
                        <li></li>
                    </div>
                  
                    <?php
                }
            }else{
                echo "Nincs kedvenc alkoholod! ";
            }
             ?>
                  </ul>
         </div>
    </div>  
<?php
}
 else {
    redirect("mainsite/index");
}
?>
