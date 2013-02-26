<h3>Elérhetőségek</h4><br/>
<h4>Név:</h4><br/>
<h4>Cím:</h4><br/>
<h4>Telefonszám:</h4><br/>
<h4>Üzenet az adminnak:</h4>
<?php
if($this->session->userdata('username')){
?>
<div class="sendmessagetoadmin">
    <b>Küldő: </b><i><?php echo $this->session->userdata('username'); ?></i><br />
    <textarea name="usermessagetoadmin" class="sendtoadmin" style=" resize: none;" rows="10" cols="42"></textarea><br />
    <input style="padding-top: 5px" type="image" height="30px" src="<?php echo base_url("img/sendbutton.png"); ?>"  class="sendtoadminbutton" />
</div>
<?php
}else
    echo "Csak regisztrált felhasználó írhat üzenetet!";
?>