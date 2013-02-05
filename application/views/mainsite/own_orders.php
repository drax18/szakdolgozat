<?php
if($this->session->userdata('username')){
    echo "own orders";
}
 else {
    redirect("mainsite/index");
}
?>
