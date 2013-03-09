<div id="loggedon">
<?php
if($this->session->userdata('username')){
        ?>
        <a href="<?php echo site_url("mainsite/own_data"); ?>"><?php echo "Üdv ".$this->session->userdata('username')."!";?></a>
       <a id="logout" href="<?php echo site_url("actions/logout"); ?>">Kilépés</a>   
       <?php

   if($admin){
       redirect("masteradmin/adminpanel");
       ?>
       
       <!-- <a class="adminbutton" href="<?php echo site_url("masteradmin/adminpanel"); ?>"><i>Admin Felület</i></a -->
       <?php
       
   }
}
?>
</div>