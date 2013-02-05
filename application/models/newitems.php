<?php

class Newitems extends CI_Model{
    
    function getnewitems(){
        $query = $this->db->query("SELECT * FROM newdrinks");
        return $query->result();
    }
    
    
}
?>
