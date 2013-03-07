<img class="admintitleimage" src="<?php echo base_url("/img/admin/orders.png") ;?>" />
<div class="admintitle">Rendelések</div>
<div class="admingeneraltitle">Felhasználók Rendelései</div>
<div class="adminline"></div>
<div id="orders">
    <div class="usersorders">
        
        
        <?php
        $data = array();
        $data2 = array();
        $data3 = array();
            foreach ($userorders as $row){
                if(!in_array($row->owner, $data2)){

                    $data2[] = $row->owner;
                    echo "Felhasználó: ".$row->owner.br(1);
                }
              if(!in_array($row->orderdate, $data)){

                    $data[] = $row->orderdate;
                    echo "Dátum ".$row->orderdate.br(1);
                }
                
                echo "Alkohol: ".$row->drink_name." ".$row->piece." Darab".br(1);
                
            }
        ?>
    </div>
</div>