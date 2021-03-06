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
            $query2 =  $this->db->query("SELECT max(ordernumber) as count FROM myorders WHERE owner='$row2'");
           foreach ($query2->result() as $row3){
           
              $ordernumber += $row3->count;
           }
           
        }
        return $ordernumber;
        
    }
    function writeMessage($message){
        $username = $this->session->userdata('username');
        $user_id = $this->session->userdata('userid');
        $date = date("Y/m/d - H:i");
        $usermessage = $this->db->escape_str($message);
        $data = array('owner'=>$username,'message'=>$usermessage,'date'=>$date,"user_id"=>$user_id);
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
        $query = $this->db->query("SELECT piece,price FROM prizes ");
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
    function getActionswithDrinks(){
        $query = $this->db->query("SELECT id,name FROM drinks");
        return $query->result();
    }
    function updateaction(){
        $drink_id = $this->input->post('drinkid');
        $newaction = array("action"=>$this->input->post('newaction'));
        if($newaction > 0){
            $this->db->where('id',$drink_id);
            $this->db->update('drinks',$newaction);
        }
        
    }
    function deleteusers(){
                 $user_id = $this->input->post('deleteusers');
                 
                foreach ($user_id as $row){
                       $this->db->where('id',$row);
                       $this->db->delete('users');
                       $this->db->where('user_id',$row);
                       $this->db->delete('myorders');
                }
        
    }
    function deletedrinks(){
        $drink_id = $this->input->post('deletedrinks');
        foreach ($drink_id as $row){
            $this->db->where('id',$row);
            $this->db->delete('drinks');
        }
    }
    function getdrinkpiece(){
        $query = $this->db->query("SELECT name,piece FROM drinks");
        return $query->result();
    }
    function updatedrinkscount(){
        $drink_id = $this->input->post('drink_id');
        $count = $this->input->post('updatecount');
        $query = $this->db->query("SELECT piece FROM drinks where id=$drink_id");
        foreach ($query->result() as $row){
                
                    $data = array('piece' => $row->piece + $count);
                    $this->db->where('id',$drink_id);
                    $this->db->update('drinks',$data);
               
        }
    }
    function getallcomments(){
        $query = $this->db->query("SELECT comments.date,comments.owner,comments.id,comments.drink_id,comments.comment, drinks.name FROM comments,drinks WHERE comments.drink_id = drinks.id");
 
        return $query->result();
    }
    function deleteselectedcomments(){
         $comment_id = $this->input->post('deletecomments');
         foreach ($comment_id as $row){
                $this->db->where('id',$row);
                $this->db->delete('comments');
         }
    }
    function getdrinksinform(){
        $query = $this->db->query("SELECT id,name,price,drink_information,drink_title,alcohol,bottle FROM drinks");
        return $query->result();
    }
    function modifydrinks(){
        $drink_id = $this->input->post('modifyvalue');
        if($this->input->post('newname') != ""){
            $this->db->where('id',$drink_id);
            $data = array('name'=>$this->input->post('newname'));
            $this->db->update('drinks',$data);
        }
        if($this->input->post('newprice') != ""){
            $this->db->where('id',$drink_id);
            $data = array('price'=>$this->input->post('newprice'));
            $this->db->update('drinks',$data);
        }
        if($this->input->post('newalcohol') != ""){
            $this->db->where('id',$drink_id);
            $data = array('alcohol'=>$this->input->post('newalcohol'));
            $this->db->update('drinks',$data);
        }
        if($this->input->post('newbottle') != ""){
            $this->db->where('id',$drink_id);
            $data = array('bottle'=>$this->input->post('newbottle'));
            $this->db->update('drinks',$data);
        }
        if($this->input->post('newtitle') != ""){
            $this->db->where('id',$drink_id);
            $data = array('drink_title'=>$this->input->post('newtitle'));
            $this->db->update('drinks',$data);
        }
        if($this->input->post('newinfo') != ""){
            $this->db->where('id',$drink_id);
            $data = array('drink_information'=>$this->input->post('newinfo'));
            $this->db->update('drinks',$data);
        }
    }
}
?>
