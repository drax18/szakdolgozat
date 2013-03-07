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
                    echo "Dátum ".$row->orderdate.br(1);
                }
                echo "Alkohol: ".$row->drink_name." Darab: ".$row->piece." Ár: ".$row->price.br(1);

            }
        ?>
    </div>
</div>