<?php

class Comments extends CI_Model{
    

    function allComment($name){
        
        $query = $this->db->query('SELECT * FROM comments WHERE link_name=?',$name);
        return $query->result();
        
        
    }
    function writeComm($data,$id){
        $username = $this->session->userdata('username');
        $user_id=$this->session->userdata('userid');
        $query = $this->db->query("SELECT link_name FROM drinks WHERE id=$id");
        $date = date("Y-m-d H:i:s");
        $userscomment = $this->db->escape_str($data);
        foreach ($query->result() as $row){
            $link_name = $row->link_name;
        }
        $comment = array('drink_id' => $id,'owner'=>$username,'comment'=>$userscomment,'link_name'=>$link_name,'date'=>$date,"user_id"=>$user_id);
        $this->db->insert('comments',$comment);
        
    }
    
}



?>
