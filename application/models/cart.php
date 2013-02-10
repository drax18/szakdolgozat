<?php

class Cart extends CI_Model{
    
     function getCart(){
        $this->db->where('owner',$this->session->userdata('username'));
        $cartlist = $this->db->get('cart');           
        return $cartlist->result();
    }
    function getFees(){
        
        $action1 = 10000;
        $freeship = 25000;
        
        $username = $this->session->userdata('username');
        $query = $this->db->query("SELECT price,piece FROM cart WHERE owner='$username'");
        $cartall = "";
        foreach ($query->result() as $row){
           $cartall = $cartall + ($row->price * $row->piece);
        }
        if($cartall > $freeship){
            $ownerfeeship = "Nincsen";
           
        }else
            $ownerfeeship = 1000;
        
        if($cartall > $action1){
             $owneraction1 = 20;
             
            }
            else
            $owneraction1 = 0;
        
        $data = array ("shipfee"=>$ownerfeeship,"action1"=>$owneraction1,"fullprice"=>$cartall);
        return $data;
        
    }
    
    function owneritemcount(){
        if($this->session->userdata('username')){
            $username = $this->session->userdata('username');
            $this->db->select_sum('piece');
            $this->db->where('owner',$username);
            $query = $this->db->get('cart');

            return $query->result();
            
        }
    }
    function addtocart($id,$count){
        if($this->session->userdata('username')){
        
        $query = $this->db->query("SELECT * FROM drinks WHERE link_name='$id'");
        if($query->num_rows == 0){
            $query = $this->db->query("SELECT * FROM newdrinks WHERE link_name='$id'");
        }
        $queryke = $query->result();
        $i = 1;
        foreach($queryke as $row){
            $data = array ('piece'=>$i,'cart_name'=>$row->link_name,'drink' =>$row->name,'owner'=> $this->session->userdata('username'),'price'=>$row->price); 
        }
        $this->db->where('cart_name',$id);
        $this->db->where('owner',  $this->session->userdata('username'));
        $query2 = $this->db->get('cart');
           
       if($query2->num_rows() > 0){
           $query3 = $query2->result();
           foreach ($query3 as $row){
                $updatedata = array('piece'=>$row->piece+$count);
                $this->db->where('cart_name',$id);
                $this->db->where('owner',  $this->session->userdata('username'));
                $this->db->update('cart', $updatedata);     
                
           }
      /*     foreach($queryke as $rowos){
               $asd = $rowos->piece -1 ;
               echo $asd;
               $this->db->query("UPDATE drinks SET piece=$asd WHERE link_name='$id'");
           }
       * 
       */
      /*    foreach ($queryke as $row2){
                    $count = $row2->piece - 1;
                    $drinksupdate = array('piece'=>$count);
                    $this->db->where('link_name', $id);
                    $this->db->update('drinks', $drinksupdate); 

                }
           */
       }
       else
          $this->db->insert('cart',$data);
     
       }
       else
           redirect ('mainsite/catlist/1');
    }  
    function deletetocart($id){
        if($this->session->userdata('username')){
                
        $i = 1;
        
        $this->db->where('cart_name',$id);
        $this->db->where('owner',  $this->session->userdata('username'));
        $query2 = $this->db->get('cart');           
       
           $query3 = $query2->result();
           foreach ($query3 as $row){
               if($row->piece > $i ){
                $updatedata = array('piece'=>$row->piece-1);
                $this->db->where('cart_name',$id);
                $this->db->where('owner',  $this->session->userdata('username'));
                $this->db->update('cart', $updatedata);
               }           
                else{

                $this->db->where('cart_name',$id);
                $this->db->where('owner',  $this->session->userdata('username'));
                $this->db->delete('cart');

                  }
           }
       
     
       }
       else
           redirect ('mainsite/catlist/1');
    }  
    
    function getAllprice(){
        $username = $this->session->userdata('username');
        $query = $this->db->query("SELECT price,piece FROM cart WHERE owner='$username'");
        $cartall = "";
        foreach ($query->result() as $row){
           $cartall = $cartall + ($row->price * $row->piece);
        }
        return $cartall;
       
    }
    function orderSend(){
        $username = $this->session->userdata('username');
        $this->db->where('owner',$username);
        $this->db->delete('cart');
    }
    
}

?>
