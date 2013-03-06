<img class="admintitleimage" src="<?php echo base_url("/img/admin/users.png") ;?>" />
<div class="admintitle">Felhasználók</div>
<div class="admingeneraltitle">Felhasználók Információi</div>
<div class="adminline"></div>
<div id="users">
    
        <?php
        $i=0;
            foreach($allusers as $row){
                ?>
                <div class="thefullusers">
                <?php
                echo "Név: ".$row->surname." ".$row->firstname.br(1);
                echo "Telefonszám: ".$row->phonenumber.br(1);
                echo "Cím: ".$row->streetaddress.br(1);
                echo "Email: ".$row->email.br(1);
                echo "Város: ".$row->city.br(1);
                echo "Íriányítószám: ".$row->zipcode.br(1);
                ?>
                </div>
                <?php
                $i++;
                if($i%3==0){
                    ?>
                    <div style="clear:both";
                    <?php
                }
            }
        ?>
    
</div>
