<?php
if($this->session->userdata('username')){
   $data = array();
   foreach ($myorders as $row){
     if(!in_array($row->ordernumber, $data)){
           
           $data[] = $row->ordernumber;
           echo "<b>Rendelés: </b>".$row->ordernumber.".".br(1);
           echo "<u>Dátum:</u> ".$row->orderdate.br(1);
       }
       
       echo "<i>Alkohol:</i> ".$row->drink_name." <i>Darab:</i>".$row->piece.br(1);
       
   }
    
    
}
 else {
    redirect("mainsite/index");
}
?>
