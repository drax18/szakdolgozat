
<?php
if($this->session->userdata('username')){
    redirect("mainsite/index");
}else{
?>
<div id="loginform">
                <h4>Belépés</h4>

<?php
            echo '<table>';
            echo form_open('/actions/login_validation');
            echo '<tr>';
            echo "<td>"."Felhasználónév: "."</td>"."<td>".form_input('username',$this->input->post('username'),"class='inputs'")."</td>";
            echo '</tr>';
            echo '<tr>';
            echo "<td>"."Jelszó: "."</td>"."<td>".form_password('password','',"class='inputs'")."</td>";
            echo '</tr>';
            echo '<tr>';
            echo '<td>';
            ?>
            <br/>
            <input type="image" src="<?php echo base_url()."/img/login_button2.png" ;?>" name="send"/>
            <?php
            echo '</td>';
            echo '</tr>';
            echo form_close();           
            echo '<i>'.validation_errors().'</i>';
            echo '<tr>';
            echo '<td>';
            ?>
            <a href="<?php echo base_url()."mainsite/register" ;?>"><img src="<?php echo base_url()."/img/register_button.png" ;?>" /></a>
            <?php
            echo '</td>';
            echo '<td>';
            ?>
            <a id="login_reg_forget_pw" href="<?php echo site_url("mainsite/forgottenpassword"); ?>"><img src="<?php echo base_url()."/img/forgotpw.png" ;?>" /></a>
            <?php
            echo '</td>';
            echo '</tr>';
            echo '</table>';
?>
</div>
<?php
}
?>