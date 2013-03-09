<style>
    #foot1 a{
        line-height: 18px;
    }
</style>
<div id="foot1">
    <?php
    echo "<div id='foot_title'>INFORMÁCIÓK".br(2)."</div>";

        ?>  
        
          <a id="foot_items" href="<?php echo site_url("mainsite/aboutus")?>">Rólunk</a><br />
          <a id="foot_items" href="<?php echo site_url("mainsite/contact")?>">Elérhetőségek</a><br />
          <a id="foot_items" href="<?php echo site_url("mainsite/orderterms")?>">Rendelési feltételek</a><br />

</div>
<div id="foot1">
     <?php
    echo "<div id='foot_title'>AJÁNLATAINK".br(2)."</div>";
    ?>
        
          <a id="foot_items" href="<?php echo site_url("mainsite/speciality")?>">Különlegességek</a><br />
          <a id="foot_items" href="<?php echo site_url("mainsite/actions")?>">Akciók</a><br />
          <a id="foot_items" href="<?php echo site_url("mainsite/newitems")?>">Új áruk</a><br />

</div>
<div id="foot1">
    
<?php
echo "<div id='foot_title'>FIÓKOM".br(2)."</div>";
    ?>
    <a id="foot_items" href="<?php echo site_url("mainsite/own_data"); ?>">Adataim</a><br />
    <a id="foot_items" href="<?php echo site_url("mainsite/own_orders"); ?>">Rendeléseim</a><br />
    <a id="foot_items" href="<?php echo site_url("mainsite/favorites"); ?>">Kedvenceim</a><br />

</div>

<div id="foot1">
    <div id="foot_logo"><img src="<?php echo base_url()."img/minilogo.png" ;?>"/></div><div id="foot_szoveg">© 2013 Powered by Drax</div>
</div>
