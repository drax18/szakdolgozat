<?php

class Newitems extends CI_Model{
    
    function getnewitems(){
        $query = $this->db->query("SELECT * FROM drinks group by id desc LIMIT 9");
        return $query->result();
    }
    
    
}
?>
