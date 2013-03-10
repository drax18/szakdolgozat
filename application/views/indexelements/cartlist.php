<?php
if($this->session->userdata('username')){
    if($cart){
?>
<div class="content_011">
<?php

            
        foreach ($cart as $row){
            echo $row -> piece." x ";
            echo $row -> drink.br(1);
            if($row->action){
                $price = $row->price;
              $alcoholaction = "0.".$row->action;
               $finalyaction = $row->price * $alcoholaction;
               $finalprice = $price - $finalyaction;
               echo floor($finalprice). "Ft"."( - ".$row->action.""."% )";
            }
               else{
            echo $row -> price * $row->piece." Ft";
               }
            ?>
            <a href="<?php echo $row -> cart_name; ?>" class="delete_all_cart_item"><img src="<?php echo base_url()."/img/delete.gif" ;?>" /></a>
            <br />
            <?php            
        }

?>
<div id="shipping" >
        <?php
        
            if($cart){
            ?>
            <div class="cart_line_img" ><img src="<?php echo base_url()."/img/cart_line.png" ;?>" /></div>
            <table class="under_cart_line_img" >
                <tr>
                    <td>Akció:</td><td style="text-align: right;">
                     <?php
                        
                       if($fees['action1'] == 20){
                           echo $fees['action1']."%";
                       }else 
                           echo "0%";
                       
                        
                     ?>
                    </td>
                </tr>
                <tr>
                    <td>Szállítási díj:</td><td  style="text-align: right;">
                        <?php
                           if($fees['shipfee'] == "Nincsen"){
                            echo $fees['shipfee'];
                           }else
                            echo $fees['shipfee']." Ft";
                        ?>
                        
                    </td>
                </tr>
                <tr>
                    <td>Összesen:</td><td  style="text-align: right;">
                        <?php 
                        
                            $tmp = $fees['fullprice']; 
                            $tmp2 = $tmp + $fees['shipfee'];
                            if($fees['action1'] == 20){
                                $tmp3 = $tmp2 * 0.20;
                                $tmp4 = $tmp2 - $tmp3;
                                echo floor($tmp4)." Ft";
                            }
                            else
                            echo $tmp2." Ft";
                        
                        
                        ?>
                    </td>
                </tr>
            </table>
            <div style="padding-left: 47.5px;" class="tocartbutton">
            <a href="<?php echo site_url("mainsite/owncart"); ?>"><img src="<?php echo base_url()."/img/incartbutton.png" ;?>" /></a>
            </div>
            <?php
                
            }

           ?>
    </div>
</div>            
<?php
    }
}
?>
