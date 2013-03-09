<img class="admintitleimage" src="<?php echo base_url("/img/admin/modify.png") ;?>" />
<div class="admintitle">Módosítások</div>
<div class="admingeneraltitle">Weboldal Módosítások</div>
<div class="adminline"></div>
<div class="admingeneraltitle">Akciók módosítása</div>
<div id="modifyactions">
        <div class="normalactions">
            <u>Módosíthatatlan akciók:</u><br />
            <b>10000 Ft feletti vásárlás esetén:</b><i> 20%</i><br />
            <b>25000 Ft feletti vásárlás esetén:</b><i> Szállítási díj nincsen</i>
            <br />
        </div>
        <?php
        if(isset($successupdateaction)){
            echo $successupdateaction;
        }
        echo  validation_errors();
        ?>
        <form action="actionmodify" method="POST">
            <table>
                <tr>
                    <td>Ital akciók: </td>
                    <td>
        <select name="drinkid">
        <?php
        
            foreach ($getaandd as $row){
                ?>
             <option value="<?php echo $row->id; ?>"><?php echo $row->name ?></option>
             
                <?php
            }
            
        ?>
             </select>
                    </td>
                    <td>Új akció: </td><td> <input style="width: 30px;" type="text" name="newaction" /></td><td>%</td>
           <td><input type="image" height="20" src="<?php echo base_url("img/modify.png");  ?>" name="submitnewaction" /></td>
                  </tr>
            </table>
        </form>
</div>
<div class="adminline"></div>
<div class="admingeneraltitle">Felhasználók törlése</div>
<div id="userdelete">
    <div class="deleteuserform">
        <form action="deleteusers" method="post">
            <table>
        <?php
        if(isset($sucessuserdelete)){
            echo "<tr><td>".$sucessuserdelete."<td></tr>";
        }
        if(isset($problemusersdelete)){
            echo "<tr><td>".$problemusersdelete."<td></tr>";
        }
                foreach ($getusers as $row2){
                    echo "<tr><td>Név: ".$row2->surname." ".$row2->firstname."</td>";
                    ?>
                <td><input type="checkbox" name="deleteusers[]" value="<?php echo $row2->id ?>" /></td></tr>
                    <?php
                }
                
        ?>
        
       <tr><td> <input type="image" src="<?php echo base_url("img/delete_.png") ?>" /></td></tr>
            </table>
        </form>
    </div>
</div>
<div class="adminline"></div>
<div class="admingeneraltitle">Italok törlése</div>
<div class="deletedrinks">
    <form action="deletedrinks" method="post">
    <table>
       
    <?php
    if(isset($sucessdrinkdelete)){
        echo $sucessdrinkdelete;
    }
    if(isset($problemdrinksdelete)){
        echo $problemdrinksdelete;
    }
            foreach ($getaandd as $row3){
                echo "<tr><td>Ital név: ".$row3->name."</td>";
                ?>
                <td><input type="checkbox" name="deletedrinks[]" value="<?php echo $row3->id ?>" /></td></tr>
                <?php
            }
    ?>
    <tr><td><input type="image" src="<?php echo base_url("img/delete_.png") ?>" /></td></tr>
    </table>
    </form>
</div>

<div class="adminline"></div>
<div class="admingeneraltitle">Italok módosítása</div>
<div class="drinksmodify">
    
</div>
