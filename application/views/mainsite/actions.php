<?php
   // print_r($actiondrinks);
    echo "<h3>Akciós Termékeink</h3>".br(2);
    foreach ($actiondrinks as $row){

        ?>
        <div class="actiondrinkimg">

            <h3><a style="color:black;" href="<?php echo site_url("alcohol/drink/$row->link_name") ?>"><?php echo $row->name; ?></a></h3><br />
            <img height="300" src="<?php echo base_url("img/drinks/$row->link_name.png") ?>" />
        </div>
        <?php
        echo "Ár: ".$row->price." Ft".br(1);
        echo "Akció: -".$row->action." %".br(1);
        echo "<u>Információ: </u>".br(1);
        ?>
        <a style="color:black" href="<?php echo site_url("alcohol/drink/$row->link_name") ?>"><?php echo $row->drink_information; ?></a><br /><br />
        <?php
    }
?>