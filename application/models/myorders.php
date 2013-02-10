<?php

class Myorders extends CI_Model{
    
    function getOwnorders(){
        $username = $this->session->userdata('username');
       $query =  $this->db->query("SELECT * FROM myorders WHERE owner='$username'");
       return $query->result();
    }
    
    
}
?>
