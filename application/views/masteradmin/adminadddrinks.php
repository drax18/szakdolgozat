<img class="admintitleimage" src="<?php echo base_url("/img/admin/newdrinks.png") ;?>" />
<div class="admintitle">Új italok</div>
<div class="admingeneraltitle">Új italok hozzáadása</div>
<div class="adminline"></div>
<div id="newdrinks">
    <div class="addnewdrinks">
        <?php
        if(isset($uploaderror)){
            echo $uploaderror;
        }
        if(isset($imgreq)){
            echo $imgreq;
        }
        if(isset($successadddrink)){
            echo $successadddrink;
        }
        echo validation_errors();
        ?>
        <?php echo form_open_multipart('masteradmin/upload');  ?>
        <table>
            <tr><td>Alkohol neve:</td>

            <td><input type="text" name="alcoholname" /></td>
        </tr>
        <tr>
            <td> Kategória:</td>
           <td> <select name="categoriesid">
                <?php
                foreach ($addcats as $row){
                    ?>
                <option  value="<?php echo $row->id; ?>"><?php echo $row->categories; ?></option>
                    <?php
                }
                ?>
            </select></td>
        </tr>
        <tr><td>
Feltöltendő kép neve:</td>
            <td><input type="text" name="alcohollinkname" /></td></tr>
        <tr>
<td>Ár:</td>
            <td><input type="text" name="alcoholprice" /></td>
        </tr>
        <tr>
<td>Darab:</td>
            <td><input type="text" name="alcoholpiece" /></td>
        </tr>
        <tr>
<td>Alkohol tartalom:</td>
            <td><input type="text" name="alcohol" /></td>
        </tr>
        <tr>
<td>Mennyiség(Literben(Pl.: 0, 7))</td>
            <td><input type="text" name="alcoholbottle" /></td>
        </tr>
        <tr>
<td>Akció(%-ban!(Pl.: 20))</td>
            <td><input type="text" name="alcoholaction" /></td>
        </tr>
        <tr>
<td>Ital cimke</td>
           <td>  <textarea style="resize:none;" name="alcoholtitle" cols="30" rows="2"></textarea></td>
             
        </tr>
        <tr>
<td>Ital Leírás</td>
           <td>  <textarea style="resize:none;" name="alcoholinformation" cols="30" rows="10"></textarea></td>
        </tr>
        <tr>
  <td>  <?php echo form_label('Kép ( Max: 300*700, 1mb )', 'userfile') ?></td>
   <td> <?php echo form_upload('userfile') ?></td>
</tr>
<tr>
     <td><input type="submit" value="Alkohol felvitele" /></td>
        </tr>
        </table>
<?php form_close() ?>
        
        
    </div>
</div>