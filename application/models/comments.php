<?php

class Comments extends CI_Model{
    

    function allComment($name){
        
        $query = $this->db->query('SELECT * FROM comments WHERE link_name=?',$name);
        return $query->result();
        
        
    }
    function writeComm($data,$id){
        $username = $this->session->userdata('username');
        $query = $this->db->query("SELECT link_name FROM drinks WHERE id=$id");
        $date = date("y-m-d h:i A");
        foreach ($query->result() as $row){
            $link_name = $row->link_name;
        }
        $comment = array('drink_id' => $id,'owner'=>$username,'comment'=>$data,'link_name'=>$link_name,'date'=>$date);
        $this->db->insert('comments',$comment);
        
    }
    
}



?>
