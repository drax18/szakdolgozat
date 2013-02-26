<?php

class Myorders extends CI_Model{
    
    function getOwnorders(){
        $username = $this->session->userdata('username');
        $query =  $this->db->query("SELECT drink_name,price,piece,ordernumber,orderdate FROM myorders WHERE owner='$username'");
        return $query->result();
    }
    function getWhoorders($name){
        $this->db->select('owner');
        $this->db->from('myorders');
        $this->db->where('link_name',$name);
        $query = $this->db->get();
        return $query->result();
        
        
    }
    
}
?>
