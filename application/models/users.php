<?php

class Users extends CI_Model{
    function getuser(){
        $username = $this->input->post('username');
        $query = $this->db->query("SELECT id FROM users where username='$username'");
        foreach ($query->result() as $row){
            $userid = $row->id;
        }
        return $userid;
    }
    function getUserdata(){
        $username = $this->session->userdata('username');
        $query = $this->db->query("SELECT id,surname,firstname,phonenumber,streetaddress,city,zipcode,country FROM users WHERE username='$username'");
        return $query->result();
    }
    function getAllusers(){
        $query = $this->db->query("SELECT id,username,surname,firstname FROM users");
        return $query->result();
    }
    function can_login(){
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', md5($this->input->post('password')));
        $query = $this->db->get('users');
        if($query->num_rows == 1){
            return true;
        }
        else{
            $this->db->where('username', $this->input->post('username'));
            $this->db->where('password', md5($this->input->post('password')));
            $query2 = $this->db->get('admin');
            if($query2->num_rows != 0){
                return true;
            }
            else {
                return false;
            }
            
        }
        }
        function add_User(){
            $data = array(
                'username' =>  $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'surname' => $this->input->post('surname'),
                'firstname' => $this->input->post('firstname'),
                'phonenumber' => $this->input->post('phonenumber'),
                'email' => $this->input->post('email'),
                'streetaddress' => $this->input->post('streetaddress'),
                'city' => $this->input->post('city'),
                'zipcode' => $this->input->post('zipcode'),
      
                );
            $this->db->insert('users',$data);
        }
        function ownData(){
            
            $username = $this->session->userdata('username');
            $this->db->where('username',$username);
            $query = $this->db->get('users');
            return $query->result(); 
            
            
        }
        function ownDataEdit(){
            $username = $this->session->userdata('username');
            
            if($this->input->post('surnameedit') != ""){
                $this->db->where('username',$username);
                $data = array('surname'=>$this->input->post('surnameedit'));
                $this->db->update('users', $data);
            }
            if($this->input->post('firstnameedit') != ""){
                $this->db->where('username',$username);
                $data = array('firstname'=>$this->input->post('firstnameedit'));
                $this->db->update('users', $data);
            }
            if($this->input->post('phonenumberedit') != ""){
                $this->db->where('username',$username);
                $data = array('phonenumber'=>$this->input->post('phonenumberedit'));
                $this->db->update('users', $data);
            }
            if($this->input->post('emailedit') != ""){
                $this->db->where('username',$username);
                $data = array('email'=>$this->input->post('emailedit'));
                $this->db->update('users', $data);
            }
            if($this->input->post('passwordedit') != ""){
                $this->db->where('username',$username);
                $data = array('password'=>md5($this->input->post('passwordedit')));
                $this->db->update('users', $data);
            }
            if($this->input->post('streetaddressedit') != ""){
                $this->db->where('username',$username);
                $data = array('streetaddress'=>$this->input->post('streetaddressedit'));
                $this->db->update('users', $data);
            }
            if($this->input->post('cityedit') != ""){
                $this->db->where('username',$username);
                $data = array('city'=>$this->input->post('cityedit'));
                $this->db->update('users', $data);
            }
            
            if($this->input->post('countryedit') != ""){
                $this->db->where('username',$username);
                $data = array('country'=>$this->input->post('countryedit'));
                $this->db->update('users', $data);
            }
            if($this->input->post('zipcodeedit') != ""){
                $this->db->where('username',$username);
                $data = array('zipcode'=>$this->input->post('zipcodeedit'));
                $this->db->update('users', $data);
            }
           
            
            
        }
        function addOwnorders(){
            $username = $this->session->userdata('username');
            $user_id = $this->session->userdata('userid');
            
            
            $data = array();
            $query = $this->db->query("SELECT * FROM cart WHERE owner='$username'");
            $query2 = $this->db->query("SELECT ordernumber FROM myorders WHERE owner='$username' ORDER BY ordernumber DESC LIMIT 1");
            if($query2->num_rows() == 0){
                $i = 1;
            }
            else{
                $i = 1;
                foreach($query2->result() as $row2){
                    $number = $row2->ordernumber;
                }
                $tmp = $i;
                $i = $number + $tmp;
            }

            
            $date = date("Y/m/d - H:i");
            $date2 = date('Y/m/d');
            foreach($query->result() as $row){
                $data = array("owner" => $row->owner,"price"=>$row->price,"piece"=>$row->piece,"link_name"=>$row->cart_name,"drink_name"=>$row->drink,"orderdate"=>$date, "ordernumber"=>$i,"user_id"=>$user_id,"drink_id"=>$row->drink_id);
                $this->db->insert('myorders',$data);
                if($row->action){
                    $price = $row->price;
                $alcoholaction = "0.".$row->action;
                 $finalyaction = $row->price * $alcoholaction;
                 $finalprice = $price - $finalyaction;
                    
                    $data2 = array("price"=>$finalprice,"drink_name"=>$row->drink,"piece"=>$row->piece,"orderdate"=>$date2,"drink_id"=>$row->drink_id);
                }else{
                $data2 = array("price"=>$row->price,"drink_name"=>$row->drink,"piece"=>$row->piece,"orderdate"=>$date2,"drink_id"=>$row->drink_id);
                }
                $this->db->insert('prizes',$data2);
                
            }

        }
        function forgotpw($code){
            $username = $this->session->userdata('username');
            $user_id = $this->session->userdata('userid');
            $data = array('owner'=>$username,'code'=>$code,"user_id"=>$user_id);
            $this->db->insert('user_forgotpw',$data);
        }
        
       function alreadysendpw(){
            $username = $this->session->userdata('username');
             $query = $this->db->query("SELECT id FROM user_forgotpw WHERE owner='$username'");
             if($query->num_rows() == 1){
                 return false;
             }
             else{
                 return true;
             }
        }
        function checkpass($newpass){
            $username = $this->session->userdata('username');
            $this->db->where('owner',$username);
            $this->db->where('code',$newpass);
            $query = $this->db->get('user_forgotpw');
            if($query->num_rows() == 1){
             
             

                return true;
            }else

                $this->db->where('owner',$username);
                $this->db->delete('user_forgotpw');
                
                return false;
        }
        function passwordupdate(){
            $password = $this->input->post('passwordedit');
            $username = $this->session->userdata('username');
            $data = array('password'=>md5($password));
            $this->db->where('username',$username);
            $this->db->update('users',  $data);
               
               $this->db->where('owner',$username);
                $this->db->delete('user_forgotpw');
        }
}
?>
