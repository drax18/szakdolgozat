<?php
if($this->session->userdata('username')){
    if($adminuser == $checkadmin[0]->username){
    ?>
    <html lang="en">
    <head>    
        <meta http-equiv='Content-Type' content='Type=text/html; charset=utf-8'>
        <title></title>
    </head>
    <body>


    <?php
    echo "Üdvözöllek ".$adminuser." !";
    ?>

    </body>
    </html>

    <?php
    }
    else{
        redirect('mainsite/index');
    }
}else
redirect('mainsite/index');
?>