<?php
if(isset($successpwedit)){
 print_r($successpwedit);
}else{
    echo form_open('/actions/pwresetdone');
            echo '<table>';
            echo '<tr>';
            echo '<td>';
            echo "Jelszó: ".'<td>'.form_password('passwordedit','',"class='inputs'").'</td>';
            echo '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>';
            echo "Jelszó újra: ".'<td>'.form_password('cpasswordedit','',"class='inputs'").'</td>';
            echo '</td>';
            echo '</tr>';

            echo '</table>';
            ?>
             <input type="image" src="<?php echo base_url()."/img/modify.png" ; ?>" name="send"/>
            <?php
            echo '<i>'.validation_errors().'</i>';
            echo form_close();
}
?>
