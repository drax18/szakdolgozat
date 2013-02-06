<div id="loggedon">
<?php
if($this->session->userdata('username')){
        ?>
        <a href="<?php echo site_url("mainsite/own_data"); ?>"><?php echo "Üdv ".$this->session->userdata('username')."!";?></a>
       <?php
        foreach($log_content as $row){
            ?>
    
       <a id="logout" href="<?php echo site_url("actions/logout"); ?>"><?php echo $row->logout; ?></a>
    
       <?php
   }
   if($admin){
       ?>
       <a class="adminbutton" href="<?php echo site_url("masteradmin/adminpanel"); ?>"><i>Admin Felület</i></a>
       <?php
       
   }
}
?>
</div>