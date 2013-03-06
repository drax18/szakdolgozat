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
<div id="newcomments">
    <?php
        foreach($newcomments as $row2){
            echo "Mikor: ".$row2->date.br(1);
            echo "Hozzászólás ".$row2->comment.br(1);
        }
    ?>
</div>
<div class="adminline2"></div>
<div class="admingeneraltitle">Legjobbra értékelt italok</div>
<div class="bestdrinkscores">
    Legjobbra értékelt italok
</div>
