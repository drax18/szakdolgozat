<img class="admintitleimage" src="<?php echo base_url("/img/admin/mails.png") ;?>" />
<div class="admintitle">Üzenetek</div>
<div class="admingeneraltitle">Felhasználók Üzenetei</div>
<div class="adminline"></div>
<div id="emails">
    <div class="useremails">
        <?php
        if($emails){
            foreach ($emails as $row){
                echo "Írta: ".$row->owner. " Mikor: ".$row->date.br(1);
                echo "Üzenet: ".br(1);
                echo $row->message.br(1);
            }
        }else{
            echo "Nincs új üzeneted";
        }
            
        ?>
    </div>
</div>