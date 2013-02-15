<?php
if($this->session->userdata('username')){
   // print_r($myorders);
    $data = array();
   foreach ($myorders as $row){
       if(!in_array($row->ordernumber, $data)){
           $data[] = $row->ordernumber;
           echo "Rendelés: ".$row->ordernumber.br(1);
           
           
       }
       
   }
    
    
}
 else {
    redirect("mainsite/index");
}
?>
