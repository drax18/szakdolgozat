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
    <table class="fulldrinktable">
        <tr>
   
        <td style="width:245px; ">
             <div class="price" >
        <?php
            if($row->action){
                $price = $row->price;
              $alcoholaction = "0.".$row->action;
               $finalyaction = $row->price * $alcoholaction;
               $finalprice = $price - $finalyaction;
               echo "<div class='orignalprice'>Eredeti ár: ".$row->price." Ft"."</div>";
               echo "Akciós: ".floor($finalprice)." Ft"."( - ".$row->action.""."% )";
            }else
            echo "Ár: ".$row->price." Ft";
        ?>
             </div>
         </td>

        <td>
        <input class="drinkscount" type="text" value="1" name="db"/></td><td>Darab</td>
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
                       <input type="image" src="<?php echo base_url()."/img/refreshbutton.png" ;?>" class="scoresend" />
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
            <?php
            if($this->session->userdata('username')){
            ?>
            <a class="favoradd" style="float:left;" href="" data-linkname="<?php echo $row->link_name; ?>"><img style="padding-top:10px;" src="<?php echo base_url("img/tofav.png"); ?>" /></a> 
            <div class="favrerf">
            <div class="alreadyfav">
                          <?php
                          
                              if(in_array($row->id,$tmb)){
                                echo "Már a kedvenced";
                                
                                }else {
                                echo "Még nem a kedvenced";
                                  }
                                             
                            ?>
           </div> 
           </div>
           <?php
            }else
                echo "Kedvencekhez adáshoz, először be kell jelentkezned!";
           ?>
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
               <div class="whoboughtname">
               <?php
               $tmp = array();
               foreach ($whoorders as $whobought){
                   if(!in_array($whobought->owner,$tmp)){
                       $tmp[] = $whobought->owner;
                       echo $whobought->owner.br(1);
                   }
                   
               }
               
               ?>
               </div>
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
                    <textarea style="resize: none;" rows="10" cols="42" class="commentarea" name="comment"></textarea></br>
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