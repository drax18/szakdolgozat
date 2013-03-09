<img class="admintitleimage" src="<?php echo base_url("/img/admin/modify.png") ;?>" />
<div class="admintitle">Módosítások</div>
<div class="admingeneraltitle">Weboldal Módosítások</div>
<div class="adminline"></div>
<div class="admingeneraltitle">Készlet feltöltése</div>
<div class="updatedrinkcount">
    <?php
    if(isset($validerror1)){
        echo $validerror1;
    }
    if(isset($successupdatecount)){
        echo $successupdatecount;
    }
    ?>
    <form action="updatedrinkscount" method="post">
        <table>
            <tr>
            <td>
<select name="drink_id">
    
<?php
foreach ($getaandd as $row5){
    ?>
    
        <option value="<?php echo $row5->id ?>"><?php echo $row5->name; ?></option>
        
    
    <?php
}
?>
</select>
            </td>
            <td>+</td>
<td><input type="text" style="width: 30px;" name="updatecount" /></td><td>Darab</td>
       <td><input type="image" height="20" src="<?php echo base_url("img/modify.png"); ?>" /></td>
        </tr>
        </table>
    </form>
</div>
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
        if(isset($validerror2)){
            echo $validerror2;
        }
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
    <?php
    if(isset($validerror3)){
        echo $validerror3;
    }
    if(isset($successupdatedinfo)){
        echo $successupdatedinfo;
    }
    if(isset($blank)){
        echo $blank;
    }
    ?>
    <form action="modifydrinks" method="post">
    <table>
    <tr>
     <td>
    <select name="modifyvalue">
    <?php
    foreach ($getdrinksinform as $row6){
        ?>
        <option value="<?php echo $row6->id ?>"><?php echo $row6->name ?></option>
        <?php
    }
    ?>   
    </select>
      </td>
        </tr>
    <tr><td>Új Név:</td><td><input type="text" name="newname" /></td></tr>
    <tr><td> Új Ár:</td><td><input style="width: 30px;" type="text" name="newprice" />Ft</td></tr>
    <tr><td> Új Alkohol tartalom:</td><td><input style="width: 30px;" type="text" name="newalcohol" />%</td></tr>
    <tr><td> Új Mennyiség( Liter Pl.: 0,3 ):</td><td><input style="width: 30px;" type="text" name="newbottle" />L</td></tr>
    <tr><td>Új Ital címke:</td><td><textarea name="newtitle" style="resize: none;"></textarea></td></tr>
    <tr><td>Új ital Információ:</td><td><textarea name="newinfo" rows="5" style="resize: none;"></textarea></td></tr>
    <tr><td> <input type="image" src="<?php echo base_url("img/modify.png") ?>" /></td></tr>
        </table>
    </form>
</div>
<div class="adminline"></div>
<div class="admingeneraltitle">Hozzászólások törlése</div>
<div class="deletecomments">
    <?php
    if(isset($sucesscommentdelete)){
        echo $sucesscommentdelete;
    }
    if(isset($problemcommentdelete)){
        echo $problemcommentdelete;
    }
    ?>
    <form action="deletecomments" method="post">
    <?php
    foreach ($allcomments as $row4){
        echo "Írta: ".$row4->owner." ".$row4->name." Alkoholnál"." / ".$row4->date;
        ?>
        <input type="checkbox" name="deletecomments[]" value="<?php echo $row4->id ?>" /><br />
        <?php
        echo "Hozzászólás: ".br(1);
        echo $row4->comment.br(1);
    }
    ?>
        <input type="image" src="<?php echo base_url("img/delete_.png") ?>" />
    </form>
</div>