<style>
    #foot1 a{
        line-height: 18px;
    }
</style>
<div id="foot1">
    <?php
    echo "<div id='foot_title'>INFORMÁCIÓK".br(2)."</div>";

        foreach ($footmenu as $row){
        ?>  
        
          <a id="foot_items" href="<?php echo site_url("mainsite/$row->link_tags")?>"><?php echo $row->menu_tags; ?></a><br />
          <?php
        }
    ?>
</div>
<div id="foot1">
     <?php
    echo "<div id='foot_title'>AJÁNLATAINK".br(2)."</div>";
        foreach ($footmenu2 as $row){
        ?>  
        
          <a id="foot_items" href="<?php echo site_url("mainsite/$row->link_tags")?>"><?php echo $row->menu_tags; ?></a><br />
          <?php
        }
    ?>
</div>
<div id="foot1">
    
<?php
echo "<div id='foot_title'>FIÓKOM".br(2)."</div>";
foreach($log_content as $row){
    ?>
    <a id="foot_items" href="<?php echo site_url("mainsite/own_data"); ?>"><?php echo $row->own_data; ?></a><br />
    <a id="foot_items" href="<?php echo site_url("mainsite/own_orders"); ?>"><?php echo $row->own_orders; ?></a><br />
    <a id="foot_items" href="<?php echo site_url("mainsite/favorites"); ?>"><?php echo $row->favorites; ?></a><br />
<?php

}
?>
</div>

<div id="foot1">
    <div id="foot_logo"><img src="<?php echo base_url()."img/minilogo.png" ;?>"/></div><div id="foot_szoveg">© 2013 Powered by Drax</div>
</div>
