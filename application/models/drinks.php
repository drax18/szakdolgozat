<?php

class Drinks extends CI_Model{
    
    
    function getDrink($name){
        $this->db->where('link_name',$name);
        $query = $this->db->get('drinks');
        if($query->num_rows() == 0){
            $this->db->where('link_name',$name);
            $query = $this->db->get('newdrinks');

        }
        return $query->result();
        
    }
    function getActiondrinks(){
        $query = $this->db->query("SELECT * FROM drinks WHERE action > 0");
        return $query->result();
    }
    
    
    
}
?>