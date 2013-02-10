<?php
class Search extends CI_Model{
    
    
    function getSearch($search){
        $this->db->select('*');
       $this->db->from('drinks');
       $this->db->like('name', $search);
       $query = $this->db->get();
       return $query->result();
    }
    function getSearchCount($search){
         $this->db->select('*');
       $this->db->from('drinks');
       $this->db->like('name', $search);
       $query = $this->db->get();
       return $query->num_rows();
    }
    
}
?>
