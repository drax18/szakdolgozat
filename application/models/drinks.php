<?php

class Drinks extends CI_Model{
    
    
    function getDrink($name){
        $this->db->where('link_name',$name);
        $query = $this->db->get('drinks');
        return $query->result();
        
    }
    
    
    
    
}
?>