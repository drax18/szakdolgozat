<div class="adminlogout">
    <a href="<?php echo site_url("masteradmin/logout"); ?>"><b>KILÉPÉS</b></a>
</div>
<div class="adminusername">
    <table>
       <tr>
         <td>
    <img src="<?php echo base_url("img/admin/adminavatar.png") ?>" />
         </td>
          <td>
<?php
echo $adminuser;
?>
         </td>
       </tr>
    </table>
</div>
