<script>
    document.getElementById("action").style.display="none";
</script>
<?php
$tmb = array();
        foreach ($alfavdata as $data){
            array_push($tmb, $data->drink_id);
        }
    foreach ($drinks as $row){
        ?>

<div class="drink_img">
        <img height="320px" src="<?php echo base_url()."img/drinks/$row->link_name.png" ;?>" />
</div>      
<div class="fulldrink">
        <div class="drink_name">
        <?php echo '<h3>'.$row->name.'</h3>'; ?>
        </div>
    <div class="alcoholpercent">
<?php
        echo "Alkohol tartalom: ".$row->alcohol."%"." / ".$row->bottle."Liter".br(1);
        
        ?>
    </div>
    <table style="width: 475px; padding-top: 10px; padding-bottom: 10px;border-bottom: 1px solid #cccccc">
        <tr>
    <div class="price" >
        <td style="width:245px; padding-bottom: 5px;">
        <?php
            echo "Ár: ".$row->price." Ft";
        ?>
         </td>
    </div>
        <td style="text-align: right; padding-bottom: 5px;">
        <input class="drinkscount" type="text" value="1" name="db"/>Darab
        </td>
        <td style="text-align:right;">
        <a href="<?php echo $row->link_name; ?>" class="add_to_cart"><img src="<?php echo base_url()."/img/cartbutton.png" ;?>" /></a></br>
        </td>
    </tr>
    </table>
    <div class="instock">
           <?php
                if($row->piece == 0){
                    echo "Raktáron: nincs";
                }
                else
                echo "Raktáron: "."<i>".$row->piece."</i>"." darab".br(1);
           ?>
    </div>
           <p>
           <div id="refreshscore">     
           <div class="fulldscore">
                    <div class="dscore">
                       <?php
                        if($this->session->userdata('username')){
                         
                            
                            if($score){
                                $yourscore = $score[0]->score;
                                for($i=0;$i<$yourscore;$i++){
                                    ?>
                                        <img src="<?php echo base_url()."/img/score2.png" ;?>" />
                                    <?php
                                }
                                for($i=$yourscore;$i<10;$i++){
                                    ?>
                                    <img src="<?php echo base_url()."/img/score1.png" ;?>" />
                                    <?php
                                }
                            }else{
                                for($i = 0; $i < 10 ;$i++){
                                        ?>
                                        <img src="<?php echo base_url()."/img/score1.png" ;?>" />
                                        <?php
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
                    <div class="dyourscore">
                        
                        <?php
                            if($this->session->userdata('username')){
                                if($score){
                                    echo "Pontom: ".$score[0]->score; 
                                }
                                else
                                    echo "Pontom: 0";
                            }
                            else
                               echo "Csak bejelentkezve pontozhatsz!";
                        ?>
                        
                        
                    </div>
               
               
           
           <div class="scoreselects">
              <?php
                     if($this->session->userdata('username')){
                    ?>
                    <table>
                        <tr>
                            <td>
                    <select style="font-family:century gothic;" name="score" class="scorevalue">
                        <?php
                        for($i = 1 ; $i<=10;$i++){
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php
                        }
                        ?>
                       </select>
                            </td>
                            <td>
                       <input  type="image" src="<?php echo base_url()."/img/refreshbutton.png" ;?>" class="scoresend" />
                            </td>
                        </tr>
                       </table>
                       <?php
                     }
                       ?>
           </div>
              
           <div style="clear:both"></div>
           <div id="refreshavgsc">
                    <div class="scoreave">
                        Átlag pont: <?php echo $row->score." ( ".$row->votes." szavazat )"; ?>
                    </div>   
           </div>
           </div>
           </div>
           </p>
           <a class="favoradd" style="color:#003399; padding-top: 5px;" href="" data-linkname="<?php echo $row->link_name; ?>">Kedvencekhez +</a></br>
            <div class="alreadyfav" style="display: none; font-size: 15px; color:#8a7adc;" data-<?php echo $row->link_name; ?>="1">
                          <?php
                          if($this->session->userdata('username')){
                              if(in_array($row->id,$tmb)){
                                echo "Már a kedvenced";
                                }else {
                                echo "Kedvenchez adva";
                                  }
                          }else {
                                echo "Be kell lépned!";
                          }                          
                            ?>
           </div>   
           </div>
           <div style="clear:both"></div>
           <div class="drinkinformation">
               <h4>Bővebb Információ:</h4>
               <?php
         
                echo $row->drink_information;

                ?>
           </div>

           <div class="footcomm">
               
               <div class="whobought">
               <h4>Akik már megvették:</h4>

           </div>
           <div class="comments">
               
                   <h4>Kommentek:</h4>
                   <?php
                     
                     foreach ($allcomment as $rows){
                         ?>
                        <div class="membercomments">
                         <?php
                         echo "Írta: "."$rows->owner".br(1);
                         echo "Írva: ".$rows->date.br(1);
                         echo "<h4>".$rows->comment."</h4>".br(1);
                         ?>
                        </div>
                         <?php
                     }
                   ?>
                   </div>
               <div class="commentwrite">
               <?php
                if($this->session->userdata('username')){
                     ?>
                    <textarea rows="10" cols="42" class="commentarea" name="comment"></textarea></br>
                   <input type="image" height="30px" src="<?php echo base_url()."/img/sendbutton.png" ;?>" class="commentsend" data-drinkid="<?php echo $row->id; ?>" value="Elküld" />                  
                   <?php 
                }
                else{
                    echo '<h4>Komment íráshoz be kell jelentkezned!</h4>';
                    ?>
                    <a href="<?php echo site_url("mainsite/login") ?>"><i style="color:grey;">Belépés</i></a>
                    <?php
                }
               ?>
               </div>
           
           
               <div style="clear:both"></div>
           </div>
<?php
    }
?>