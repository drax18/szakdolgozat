<?php

if($this->session->userdata('username')){

    if(isset($editsuccess)){
        echo $editsuccess;
    }
    else{
        foreach($owndata as $row){
            echo "<h2>Adataim</h2>";
            br(1);
            echo form_open('/actions/own_data_edit');
            echo '<table>';
            echo '<tr>';
            echo '<td>';
            echo '<i>'.validation_errors().'</i>';
            echo '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>';
            echo "<b>Személyes adatok</b>";
            echo '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>';
            echo "Vezetéknév: ".'<td>'.form_input('surnameedit',$row->surname,"class='inputs'").'</td>';
            echo '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>';
            echo "Keresztnév: ".'<td>'.form_input('firstnameedit',$row->firstname,"class='inputs'").'</td>';
            echo '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>';
            echo "Telefonszám: ".'<td>'.form_input('phonenumberedit','',"class='inputs'").'</td>';
            echo '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>';
            echo "E-mail: ".'<td>'.form_input('emailedit','',"class='inputs'").'</td>';
            echo '</td>';
            echo '</tr>';
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
            echo '<tr>';
            echo '<td>';
            echo "<b>Szállítási adatok</b>";
            echo '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>';
            echo "Utca/házszám: ".'<td>'.form_input('streetaddressedit','',"class='inputs'").'</td>';
            echo '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>';
            echo "Város: ".'<td>'.form_input('cityedit','',"class='inputs'").'</td>';
            echo '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>';
            echo "Irányítószám: ".'<td>'.form_input('zipcodeedit','',"class='inputs'").'</td>';
            echo '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>';
            echo "Ország: ".'<td>'.form_input('countryedit','',"class='inputs'").'</td>';
            echo '</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td>';
            ?>
            <input type="image" src="<?php echo base_url()."/img/modify.png" ; ?>" name="send"/>
            <?php
            echo '</td>';
            echo '</tr>';
            echo '</table>';
            echo form_close();
        }
    }
}
 else {
    echo "<h3>Először be kell jelentkezned!</h3>";
    $this->load->view('mainsite/login');
    
}

?>
