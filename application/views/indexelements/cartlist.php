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
<div id="shipping" style="padding-top: 10px; padding-bottom: 10px;">
        <?php
        
            if($cart){
            ?>
            <div class="cart_line_img" style=" margin-bottom:5px;"><img src="<?php echo base_url()."/img/cart_line.png" ;?>" /></div>
            <table style=" color:white; font-size:13px; width: 160px; line-height: 20px;">
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
                <tr>
                    <td><a href="<?php echo site_url("mainsite/owncart"); ?>"><img src="<?php echo base_url()."/img/incartbutton.png" ;?>" /></a></td><td style="text-align: right;"><a class="pay" href="<?php echo site_url("mainsite/owncart"); ?>"><img src="<?php echo base_url()."/img/payment.png" ;?>" /></a></td>
                </tr>
            </table>
            <?php
                
            }

           ?>
    </div>
</div>            
<?php
    }
}
?>
