<img class="admintitleimage" src="<?php echo base_url("/img/admin/income.png") ;?>" />
<div class="admintitle">Bevétel</div>
<div class="admingeneraltitle">Bevétel Információk</div>
<div class="adminline"></div>
<div id="incomes">
    <div class="incomeslist">
        <p>Napi bontás:</p>
        <?php
            $data = array();
            foreach ($incomes as $row){
              if(!in_array($row->orderdate, $data)){

                    $data[] = $row->orderdate;
                    echo "<h4>Dátum ".$row->orderdate."</h4>".br(1);
                }

                echo "Alkohol: ".$row->drink_name." Darab: ".$row->piece." Ár: ".$row->price." Ft".br(1);

            }
            
        ?>
        <h4>Összesen:</h4>
            <?php 
            $tmp= 0;
        foreach ($allincomes as $row2){
            
            $tmp = $tmp+($row2->piece*$row2->price);
        }
        echo $tmp." Ft";
            
            ?>
    </div>
</div>