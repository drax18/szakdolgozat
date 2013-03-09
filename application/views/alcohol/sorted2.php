    <?php
     $idcount = 1;
     $tmb = array();
     $tmb2 = array();
     $tmb3 = array();
        foreach ($alfavdata as $data){
            array_push($tmb, $data->drink_id);
        }
        foreach ($score as $scorerow){
            array_push($tmb2, $scorerow->drink_id);
        }
        foreach ($score as $scorerow){
            array_push($tmb3,$scorerow->score);
        }
        foreach ($drinklist as $row)
        {
    ?> 
 <div class="cat_alcohols" id="<?php echo "drink".$idcount; ?>">
    <div class="cat_image" >
        <div class="cat_img_db">
            <img height="270px" src="<?php echo base_url()."img/drinks/$row->link_name.png" ;?>" />
        </div>
    </div>
    <div class="cat_name" >
        <table class="cat_name_table">
            <tr><td><p><a href="<?php echo site_url("alcohol/drink/$row->link_name"); ?>"><h2><?php echo $row->name.br(2); ?></h2></a><p></td></tr>
            <tr><td>                  
                        <div class="score">
                            <?php
                            if(in_array($row->id,$tmb2)){
                                   $tmp = "";
                                   for($i = 0; $i < count($tmb2); $i++){

                                       if($row->id == $tmb2[$i]){
                                           $yourscore = $tmb3[$i];
                                           for($ii = 0;$ii < $yourscore;$ii++){
                                               ?>
                                               <img src="<?php echo base_url()."/img/score2.png" ;?>" />
                                               <?php
                                               $tmp += count($yourscore);


                                           }
                                           for($ia = $tmp; $ia < 10 ;$ia++){
                                               ?>
                                               <img src="<?php echo base_url()."/img/score1.png" ;?>" />
                                               <?php
                                              }
                                              
                                       }
                                       
                                   }

                                }else{
                                    for($i = 0; $i < 10 ;$i++){
                                        ?>
                                        <img src="<?php echo base_url()."/img/score1.png" ;?>" />
                                        <?php
                                              }
                                }
                                ?>
                        </div>
                        
                        <div class="yourscore">
                            <?php
                                if(in_array($row->id,$tmb2)){

                                   for($i = 0; $i < count($tmb2); $i++){

                                       if($row->id == $tmb2[$i]){
                                           $yourscore = $tmb3[$i];
                                           echo "Pontod: ".$yourscore;
                                       }
                                   }

                                }
                                else{
                                    
                                    echo "Pontod: 0";
                                }
                                    
                            ?>
                        </div>
                        <div style="clear: both;"></div>
                        Átlag pont: <?php echo round($row->score,1)." ( ".$row->votes." szavazat )"; ?></td></tr>
            <tr><td class="tdlastbefore"><?php echo "Alkohol tartalom: ".$row->alcohol." % / ".$row->bottle." liter"; ?></td></tr>
            <tr><td class="tdlast"><a style="color:Grey;" href="<?php echo site_url("alcohol/drink/$row->link_name"); ?>"><?php echo word_limiter($row->drink_information, 48); ?></a></td></tr>
        </table>
        
    </div>
    <div class="cat_addtocart" >
       
           <p><?php
           if($row->action){
                $price = $row->price;
              $alcoholaction = "0.".$row->action;
               $finalyaction = $row->price * $alcoholaction;
               $finalprice = $price - $finalyaction;
               echo "Ár: ".floor($finalprice)." Ft".br(1);
               echo "( - ".$row->action.""."% )";
            }else
            echo "Ár: ".$row->price." Ft";
            
            ?></p>
           
           <input class="drinkscount" type="text" value="1" name="db" /><div style="color:black; float:left; padding-bottom: 25px; padding-left: 5px;" class="db">Darab</div>
           <div class="cartbutton" ><a class="add_to_cart" href="<?php echo $row->link_name; ?>"><img src="<?php echo base_url()."/img/cartbutton.png" ;?>" /></a></div>
           <div class="informbuttom"><a href="<?php echo site_url("alcohol/drink/$row->link_name"); ?>"><img src="<?php echo base_url()."/img/moreinform.png" ;?>" /><a/></div>
            <div class="instock">
           <?php
                if($row->piece == 0){
                    echo "Raktáron: nincs";
                }
                else
                echo "Raktáron: "."<i>".$row->piece."</i>"." db";
           ?>
         </div>
           
    </div>
 </div>
<div style="clear:both;"></div>

    <?php
    $idcount++;
       }
    ?>