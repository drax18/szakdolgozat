<img class="admintitleimage" src="<?php echo base_url("/img/admin/adats.png") ;?>" />
<div class="admintitle">ADATOK</div>
<div class="admingeneraltitle">Általános Információk</div>
<div class="adminline"></div>
<div id="uov">
    <div class="adminusers"><?php print_r($admingetusers); ?></div>
    <div class="adminorders"><?php print_r($ordernumber); ?></div>
    <div class="adminvisitors">sajt</div>
</div>
<div style="clear:both;"></div>
<div id="uovinfo">
    <div class="userscount">Felhasználók</div>
    <div class="userorders">Rendelések</div>
    <div class="uservisitor">Látogatók</div>
</div>
<div style="clear: both;"></div>
<div class="adminline2"></div>
<div class="admingeneraltitle">Készlet ( Alkohol )</div>
<div class="piece">
    <?php
    foreach ($drinkpiece as $row4){
        echo "Alkohol neve: ".$row4->name." Raktáron: ".$row4->piece." darab".br(1);
    }
    ?>
</div>
<div class="adminline2"></div>
<div class="admingeneraltitle">Legújabb regisztrált felhasználók</div>
<div id="newregistereduser">
    <div class="registeredusername">
        <?php
        foreach ($newregistereduser as $row){
            echo "Felhasználónév: ".$row->username.", ";
            echo "Név: ".$row->surname." ";
            echo $row->firstname.br(1);
        }
        ?>
    </div>
</div>
<div class="adminline2"></div>
<div class="admingeneraltitle">Legújabb hozzászólások</div>
<div class="newcomments">
    <?php
        foreach($newcomments as $row2){
            echo "Hol: ".$row2->name.br(1);
            echo "Mikor: ".$row2->date.br(1);
            echo "Hozzászólás ".$row2->comment.br(1);
        }
    ?>
</div>
<div class="adminline2"></div>
<div class="admingeneraltitle">Legjobbra értékelt italok</div>
<div class="bestdrinkscores">
    <?php
        
        $i=1;
        foreach ($bestscores as $row3){
            echo $i.". Alkohol: ".$row3->name." Pont: ".$row3->score.br(1);
            $i++;
            
        }
    
    ?>
</div>
