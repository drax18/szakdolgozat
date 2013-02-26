
<?php
if($this->session->userdata('username')){
    echo '<h3>Kosaram</h3>'.br(1);
    ?>
<div id="cartheadtitle">
<ul>
    <li class="firststep"><span>1.Lépés</span></br><div class="cartheadtitle">Összegzés</div></li>
    <li class="secondstep" style="opacity:0.30;"><span>2.Lépés</span></br><div class="cartheadtitle">Cím</div></br></li>
    <li class="thirdstep" style="opacity:0.30;"><span>3.Lépés</span></br><div class="cartheadtitle">Megrendelés</div></br></li>
</ul>
</div>
<div style="clear:both"></div>
<div id="refrowncartdata">
<div class="owncartdata">    
<table>
    <tbody>
    <tr>
        <td>Termék</td><td>Termék Név</td><td>Ár</td><td>Darab</td><td>Összesen</td>
    </tr>
    
    <?php
        foreach ($cart as $row){
            ?>
            <tr>
            <td><img height="50" src="<?php echo base_url()."img/drinks/$row->cart_name".".png" ;?>" /></td>
            <?php
            echo "<td>".$row->drink."</td>";
            echo "<td>".$row->price." Ft"."</td>";
            ?>
            <td><div class="actualcount" style="font-size: 13px;">
            <?php echo "Aktuális: "."<i>".$row->piece."</i>".br(1);  ?>
                </div>
           <input class="drinkscount" style="width: 25px; text-align: center" type="text" value="1" name="db"/>
           <a href="<?php echo $row->cart_name; ?>"  class="add_to_cart" style="color: black;">+</a>
           <a href="<?php echo $row->cart_name; ?>"  class="delete_to_cart" style="color:black;">-</a>
           </td>
            <?php
            echo "<td>".$row->price * $row->piece." Ft"."</td>";
            echo '</tr>';    
        }
        
    ?>
    <tr>

        <td colspan="4" style="text-align: right; padding:5px;">Összes termék ára</td>
        <td><?php echo $fees['fullprice']." Ft";  ?></td>
    </tr>
    <tr>

        <td colspan="4" style="text-align: right; padding:5px;">Akció</td>
        <td>
            <?php 
                
                 if($fees['action1'] == 20){
                           echo $fees['action1']."%";
                       }else 
                           echo "0%";
                      
               ?>
        </td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: right; padding:5px;">Szállítási díj</td>
        <td>
            
            <?php
                           if($fees['shipfee'] == "Nincsen"){
                            echo $fees['shipfee'];
                           }else
                            echo $fees['shipfee']." Ft";
                        ?>
            
            
        </td>        
    </tr>
    <tr>
        <td colspan="4" style="text-align: right; padding:5px;">Összesen</td>
        <td>
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
    </tbody>
</table>
</div>  
</div>
<div class="owndata" style="display:none;">
    <?php
        foreach ($owndata as $mydata){
           echo "<h4>Szállítási Adatok</h4>".br(1);
           echo "Név: ".$mydata->surname." ".$mydata->firstname.br(1);
           echo "Telefonszám: ".$mydata->phonenumber.br(1);
           echo "E-mail: ".$mydata->email.br(1);
           echo "Cím: ".$mydata->streetaddress.br(1);
           echo "Város: ".$mydata->city.br(1);
           echo "Irányítószám: ".$mydata->zipcode.br(1);
           echo "Ország: ".$mydata->country.br(1);
        }
    ?>
    <a href="<?php echo site_url("mainsite/own_data"); ?>"><input type="image" src="<?php echo base_url()."/img/modify.png" ; ?>" name="send"/></a>
</div>
<div class="refreshshipdata">
<div class="shippingdata" style="display: none;">
    <?php
    if($cart){
    ?>
    <a class="send" href="<?php echo site_url("owncart/ordersend"); ?>">Megrendelés</a>
    <?php
    }else{
        ?>
    <div class="errorsend">
        <img height="30" src="<?php echo base_url("img/errorsend.png"); ?>" />
    <?php
        echo "Üresen nem rendelhetsz alkoholt!";
        ?>
    </div>
        <?php
    }
    ?>
</div>    
</div>   
    
    
    
  <?php  
}else
    redirect("mainsite/index");

?>
