<?php
    foreach ($menu as $row){
?>
    <li><a href="<?php echo site_url("mainsite/$row->link_tags")?>"><?php echo $row->menu_tags?></a></li>
 <!--   <img src="<?php echo base_url();?>img/menuline.png" /> -->
<?php
 }
?>
