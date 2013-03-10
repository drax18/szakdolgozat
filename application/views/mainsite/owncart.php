
<?php
if($this->session->userdata('username')){
    echo '<h3>Kosaram</h3>'.br(1);
    ?>
<div id="cartheadtitle">
<ul>
        <a name="hh"></a>
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
            if(isset($row->action)){
                $price = $row->price;
              $alcoholaction = "0.".$row->action;
               $finalyaction = $row->price * $alcoholaction;
               $finalprice = $price - $finalyaction;
               echo "<td>".floor($finalprice)." Ft"."( - ".$row->action.""."% )";
            }else
            echo "<td>".$row->price." Ft"."</td>";

            ?>
            <td><div class="actualcount" style="font-size: 13px;">
            <?php echo "Aktuális: "."<i>".$row->piece."</i>".br(1);  ?>
                </div>
           <input class="drinkscount" type="text" value="1" name="db"/>
           <a href="<?php echo $row->cart_name; ?>"  class="add_to_cart" style="color: black;">+</a>
           <a href="<?php echo $row->cart_name; ?>"  class="delete_to_cart" style="color:black;">-</a>
           </td>
            <?php
            echo "<td>".floor($finalprice * $row->piece)." Ft"."</td>";
            echo '</tr>';    
        }
        
    ?>
    <tr>

        <td colspan="4" style="text-align: right; padding:5px;">Összes termék ára</td>
        <td><?php echo floor($fees['fullprice'])." Ft";  ?></td>
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
    <table>
    <?php
        foreach ($owndata as $mydata){
           echo "<tr><td><h4>Szállítási Adatok</h4></td></tr>";
           echo "<tr><td>Név: </td><td>".$mydata->surname." ".$mydata->firstname."</td></tr>";
           echo "<tr><td>Telefonszám: </td><td>".$mydata->phonenumber."</td></tr>";
           echo "<tr><td>E-mail: </td><td>".$mydata->email."</td></tr>";
           echo "<tr><td>Cím: </td><td>".$mydata->streetaddress."</td></tr>";
           echo "<tr><td>Város: </td><td>".$mydata->city."</td></tr>";
           echo "<tr><td>Irányítószám: </td><td>".$mydata->zipcode."</td></tr>";
        }
    ?>
    <tr><td><a href="<?php echo site_url("mainsite/own_data"); ?>"><input type="image" src="<?php echo base_url("img/modify.png") ; ?>" name="send"/></a></td></tr>
    </table>
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
