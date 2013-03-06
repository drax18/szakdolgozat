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
    function adminGetOrdersmax(){
        $owners = array ();
        $query = $this->db->query("SELECT owner FROM myorders");
        
        foreach ($query->result() as $row){
            if(!in_array($row->owner,$owners)){
                $owners[] = $row->owner;
            }
        }
       
        $ordernumber = 0;
        foreach ($owners as $row2){
            $query2 =  $this->db->query("SELECT max(ordernumber) as sajt FROM myorders WHERE owner='$row2'");
           foreach ($query2->result() as $row3){
           
              $ordernumber += $row3->sajt;
           }
           
        }
        return $ordernumber;
        
    }
    function writeMessage($message){
        $username = $this->session->userdata('username');
        $date = date("Y/m/d - H:i");
        $data = array('owner'=>$username,'message'=>$message,'date'=>$date);
        $this->db->insert('admin_email',$data);
    }
    function newregistereduser(){
        $query = $this->db->query("SELECT username,surname,firstname FROM users ORDER BY id DESC LIMIT 3");
        return $query->result();
    }
    function newcomments(){
        $query = $this->db->query("SELECT * FROM comments order by id desc limit 5");
        return $query->result();
    }
}
?>
