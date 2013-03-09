<?php

class Favorites extends CI_Model{
    
    function addtofav($name){
               
        $query = $this->db->query("SELECT * FROM drinks WHERE link_name='$name'");
        $data = $query->result();
        $username = $this->session->userdata('username');
        $user_id = $this->session->userdata('userid');
        foreach ($data as $row){
            $favorites = array("link_name" => $row->link_name,"name"=>$row->name,"owner"=>$username,"drink_id"=>$row->id,"user_id"=>$user_id);
        }
       
            $this->db->insert('favorites',$favorites);
        
        
        
    }
    function boolfav($name){
        $username = $this->session->userdata('username');
        $query = $this->db->query("SELECT id FROM favorites WHERE link_name='$name' AND owner='$username'");
        if($query->num_rows() == 0){
            return true;
        }
        else {
            return false;
        }
    }
    function alreadyfav(){
         $username = $this->session->userdata('username');
         $query = $this->db->query("SELECT drink_id FROM favorites WHERE owner='$username' ");
         return $query->result();
        
    }
    
    function getFavs(){
        $username = $this->session->userdata('username');
        $query =  $this->db->query("SELECT drinks.price,drinks.id,drinks.name,drinks.link_name,drinks.drink_information FROM drinks,favorites WHERE favorites.owner='$username' AND drinks.id=favorites.drink_id");
        return $query->result();
        
       
    }
    function removeFav($id){
        $username = $this->session->userdata('username');
        $this->db->query("DELETE FROM favorites WHERE drink_id=$id AND owner='$username'");
        
        
    }
    
    
}

?>
