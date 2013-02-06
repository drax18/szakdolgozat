<div id="headmenu">
<?php
foreach ($headmenu as $row){
    ?>
        <a id=headitem href="<?php echo site_url("mainsite/$row->link_tags")?>"><?php echo $row->menu_tags?></a>
    <?php
}
?>
</div>