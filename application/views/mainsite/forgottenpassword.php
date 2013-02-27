<h3>Elfelejtett Jelszó</h3><br />
<?php
if($this->session->userdata('username')){
?>
<div class="forgotpw">
    Az Email-edre fogunk küldeni egy vissza igazoló levelet<br />
    <a href="<?php echo site_url("actions/sendforgotmail");  ?>"><img height="30" src="<?php echo base_url("img/sendbutton.png") ?>" /></a>
</div>
<?php
}else{
    echo "Az elfelejtett jelszó használatoház először be kell jelentkezned!"." <a href='login'>Belépés</a>";
}
?>