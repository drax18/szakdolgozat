<div id="newdrinklist">
           <?php
           $i = 0;
          
           foreach($drinklist as $row){
            ?>
           
           <div id="alcohol" >
               <div id="img">
               <img src="<?php echo base_url()."img/drinks/$row->link_name.png" ;?>" height="140" />
               </div>

            </div>
           <div id="table">
                   <table height="140">
                       <tr>
                            <td><h4 style="text-decoration:underline;"><a style="color:black;" href="<?php echo site_url("alcohol/drink/$row->link_name"); ?>"><?php echo character_limiter($row->name, 7); ?></a></h4></td>
                       </tr>
                       <tr>
                           <td><?php echo "Ár: ".$row->price." Ft" ;?></td>
                       </tr>
                       <tr>
                           <td style="font-size:14px;"><a style="color:black;" href="<?php echo site_url("alcohol/drink/$row->link_name"); ?>" ><?php echo character_limiter($row->drink_title, 10); ?></a></td>
                       </tr>
                       <tr>
                           <td><a href="<?php echo site_url("alcohol/drink/$row->link_name"); ?>"><img src="<?php echo base_url()."/img/moreinform.png" ;?>" /></a></td>
                       </tr>                      
                      
                       <tr>
                           <input class="drinkscount"  type="hidden" value="1" name="db"/>
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