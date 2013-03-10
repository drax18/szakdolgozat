
<?php echo form_open('mainsite/searchresult'); ?>
<input type="text" id="input" name="searchoption" class="searchvalue" />
<div id="searchbtn">
<a class="searchsend" href="<?php echo site_url('mainsite/searchresult');  ?>"><input type="image" src="<?php echo base_url()."/img/searchbutton.png" ;?>" /></a>
</div>
<?php echo form_close();   ?>

<div style="clear:both;"></div>