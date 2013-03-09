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
        $query = $this->db->query("SELECT price,piece,action FROM cart WHERE owner='$username'");
        $cartall = "";
        foreach ($query->result() as $row){
            if($row->action){
                $price = $row->price;
              $alcoholaction = "0.".$row->action;
               $finalyaction = $row->price * $alcoholaction;
               $finalprice = $price - $finalyaction;
               $cartall = $cartall + ($finalprice * $row->piece);
            }else
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
        $queryke = $query->result();
        $i = 1;
        foreach($queryke as $row){
            $data = array ('piece'=>$i,'cart_name'=>$row->link_name,'drink' =>$row->name,'owner'=> $this->session->userdata('username'),'price'=>$row->price,'action'=>$row->action,"user_id"=>  $this->session->userdata('userid'),"drink_id"=>$row->id); 
        }
        $this->db->where('cart_name',$id);
        $this->db->where('owner',  $this->session->userdata('username'));
        $query2 = $this->db->get('cart');
        foreach ($query->result() as $countvalid){
            $whatineed = array('piece'=>$countvalid->piece);
        }   
       if($query2->num_rows() > 0){
           foreach ($query2->result() as $row){
               if($whatineed['piece'] - $count >= 0){
                   $updapiece = array("piece"=>$whatineed['piece'] - $count);
                   $this->db->where('link_name',$id);
                   $this->db->update('drinks',$updapiece);
                    $updatedata = array('piece'=>$row->piece+$count);
                $this->db->where('cart_name',$id);
                $this->db->where('owner',  $this->session->userdata('username'));
                $this->db->update('cart', $updatedata);    
               }
                
                
           }
       }
       else{
           
               
               if($whatineed['piece'] - $i >= 0){
                   $this->db->insert('cart',$data);
                   $updapiece = array("piece"=>$whatineed['piece'] - $i);
                   $this->db->where('link_name',$id);
                   $this->db->update('drinks',$updapiece);
               }
                
          
          
          
       }
     
       }
       else
           redirect ('mainsite/catlist/1');
    }  
    function deletetocart($id,$count){
        
                
        $i = 1;
         $query = $this->db->query("SELECT * FROM drinks WHERE link_name='$id'");
        foreach ($query->result() as $row2){
            $piece = $row2->piece;
        }   
        $this->db->where('cart_name',$id);
        $this->db->where('owner',  $this->session->userdata('username'));
        $query2 = $this->db->get('cart');           
       
           foreach ($query2->result() as $row){
               if($row->piece > $i ){
                $updatedata = array('piece'=>$row->piece-$count);
                $this->db->where('cart_name',$id);
                $this->db->where('owner',  $this->session->userdata('username'));
                $this->db->update('cart', $updatedata);
                $data = array('piece'=>$piece + $count);
                $this->db->where('link_name',$id);
                $this->db->update('drinks',$data);
                if($row->piece - $count == 0){
                     $this->db->where('cart_name',$id);
                    $this->db->where('owner',  $this->session->userdata('username'));
                    $this->db->delete('cart');
                }
                
               }           
                else{
                $data = array('piece'=>$piece + $i);
                $this->db->where('link_name',$id);
                $this->db->update('drinks',$data);
                $this->db->where('cart_name',$id);
                $this->db->where('owner',  $this->session->userdata('username'));
                $this->db->delete('cart');
                

                  }
           }
       
     
      
    }  
    
    function getAllprice(){
        $username = $this->session->userdata('username');
        $query = $this->db->query("SELECT price,piece,action FROM cart WHERE owner='$username'");
        $cartall = "";
        foreach ($query->result() as $row){
           if($row->action){
                $price = $row->price;
              $alcoholaction = "0.".$row->action;
               $finalyaction = $row->price * $alcoholaction;
               $finalprice = $price - $finalyaction;
               $cartall = $cartall + ($finalprice * $row->piece);
            }else
           $cartall = $cartall + ($row->price * $row->piece);
        }
        return $cartall;
       
    }
    function orderSend(){
        $username = $this->session->userdata('username');
        $this->db->where('owner',$username);
        $this->db->delete('cart');
    }
    function deleteallitem($id){
        $username = $this->session->userdata('username');
        
        $query = $this->db->query("SELECT piece FROM drinks WHERE link_name='$id'");
        foreach ($query->result() as $row){
            $piece = $row->piece;
        }
        $query2 = $this->db->query("SELECT piece FROM cart WHERE cart_name='$id' and owner='$username'");
        foreach ($query2->result() as $row2){
            $updatepiece = $piece + $row2->piece;
            $data = array('piece'=>$updatepiece);
            $this->db->where('link_name',$id);

            $this->db->update('drinks',$data);
        }
        $this->db->where('cart_name',$id);
        $this->db->where('owner',$username);
        $this->db->delete('cart');
    }
    
}

?>
