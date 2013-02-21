<?php

class Admin extends CI_Model{
    
    function getAdmin(){
        $adminuser = $this->session->userdata('username');
        $query = $this->db->query("SELECT username FROM admin WHERE username='$adminuser'");
        return $query->result();
    }
    function adminGetUsers(){
        $query = $this->db->query("SELECT id FROM users");
        return $query->num_rows();
        
    }
    
}
?>
