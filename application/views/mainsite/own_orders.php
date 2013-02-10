<?php
if($this->session->userdata('username')){
    print_r($myorders);
}
 else {
    redirect("mainsite/index");
}
?>
