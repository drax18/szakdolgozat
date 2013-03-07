<img class="admintitleimage" src="<?php echo base_url("/img/admin/newdrinks.png") ;?>" />
<div class="admintitle">Új italok</div>
<div class="admingeneraltitle">Új italok hozzáadása</div>
<div class="adminline"></div>
<div id="newdrinks">
    <div class="addnewdrinks">
        
        <?php echo form_open_multipart('upload');  ?>
<p>
    <?php echo form_label('File 1', 'userfile') ?>
    <?php echo form_upload('userfile') ?>
</p>
<p>
    <?php echo form_label('File 2', 'userfile1') ?>
    <?php echo form_upload('userfile1') ?>
</p>
<p><?php echo form_submit('submit', 'Upload them files!') ?></p>
<?php form_close() ?>
        
        
    </div>
</div>