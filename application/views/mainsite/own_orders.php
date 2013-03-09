<?php
if($this->session->userdata('username')){
   $data = array();
   foreach ($myorders as $row){
     if(!in_array($row->ordernumber, $data)){
           
           $data[] = $row->ordernumber;
           echo "Rendelés: ".$row->ordernumber.".".br(1);
           echo "Dátum: ".$row->orderdate.br(1);
       }
       
       echo "Alkohol: ".$row->drink_name." Darab:".$row->piece.br(1);
       
   }
    
    
}
 else {
    redirect("mainsite/index");
}
?>
