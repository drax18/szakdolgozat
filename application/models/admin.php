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
        $query = $this->db->query("SELECT drinks.name,comments.comment,comments.owner,comments.date FROM drinks,comments WHERE comments.drink_id=drinks.id order by comments.id desc limit 5");
        return $query->result();
    }
    function bestscores(){
        $query = $this->db->query("SELECT drinks.name,scores.owner,scores.score FROM drinks,scores WHERE scores.drink_id=drinks.id ORDER BY scores.score DESC LIMIT 3");
        return $query->result();
    }
    function allusers(){
        $query = $this->db->query("SELECT * FROM users");
        return $query->result();
    }
    function incomes(){
        $query = $this->db->query("SELECT drink_name,price,piece,orderdate FROM prizes"); 
        return $query->result();
    }
    function userorders(){
        $query = $this->db->query("SELECT * FROM myorders");
        return $query->result();
    }
    function emails(){
        $query = $this->db->query("SELECT * FROM admin_email");
        return $query->result();
    }
    function getCategories(){
        $query = $this->db->query("SELECT * FROM categories");
        return $query->result();
    }
    function allincomes(){
        $query = $this->db->query("SELECT piece,price,orderdate FROM prizes ");
        return $query->result();
    }
    function addnewdrinks(){
        $alcoholname = $this->input->post("alcoholname");
        $categoriesid = $this->input->post("categoriesid");
        $alcohollinkname = $this->input->post("alcohollinkname");
        $alcoholprice = $this->input->post("alcoholprice");
        $alcoholpiece = $this->input->post("alcoholpiece");
        $alcohol = $this->input->post("alcohol");
        $alcoholbottle = $this->input->post("alcoholbottle");
        $alcoholaction = $this->input->post("alcoholaction");
        $alcoholtitle = $this->input->post("alcoholtitle");
        $alcoholinformation = $this->input->post("alcoholinformation");
        $data = array("name"=>$alcoholname,"categories_id"=>$categoriesid,"price"=>$alcoholprice,"piece"=>$alcoholpiece,"drink_information"=>$alcoholinformation,"drink_title"=>$alcoholtitle,"alcohol"=>$alcohol,"bottle"=>$alcoholbottle,"action"=>$alcoholaction,"link_name"=>$alcohollinkname);
        $this->db->insert("drinks",$data);
    }
}
?>
