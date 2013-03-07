<?php


class Masteradmin extends MY_Controller {
    
   
    public function adminpanel(){
        $data['middle'] = "masteradmin/adminadats";
        $this->show_with_all('masteradmin/adminpanel',$data);
    }
    public function adminusers(){
        $data['middle'] = "masteradmin/adminusers";
        $this->load->model('admin');
        $data['allusers'] = $this->admin->allusers();       
        $this->show_with_all('masteradmin/adminpanel', $data);
    }
    public function adminadats(){
        $data['middle'] = "masteradmin/adminadats";
        $this->show_with_all('masteradmin/adminpanel', $data);
    }
    public function adminadddrinks(){
        $data['middle'] = "masteradmin/adminadddrinks";
        $this->show_with_all('masteradmin/adminpanel', $data);
    }
    public function adminemails(){
        $data['middle'] = "masteradmin/adminemails";
        
        $this->load->model('admin');
        $data['emails'] = $this->admin->emails();
        
        $this->show_with_all('masteradmin/adminpanel', $data);
    }
    public function adminincome(){
        $data['middle'] = "masteradmin/adminincome";
        
        $this->load->model('admin');
        $data['incomes'] = $this->admin->incomes();
        
        $this->show_with_all('masteradmin/adminpanel', $data);
    }
    public function adminmodify(){
        $data['middle'] = "masteradmin/adminmodify";
        $this->show_with_all('masteradmin/adminpanel', $data);
    }
    public function adminorders(){
        $data['middle'] = "masteradmin/adminorders";
        
        $this->load->model('admin');
        $data['userorders'] = $this->admin->userorders();
        
        $this->show_with_all('masteradmin/adminpanel', $data);
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect('mainsite/index');
    }
    public function writetoadmin(){
        $message = $this->input->post('usermessagetoadmin');
        $this->load->model('admin');
        $this->admin->writeMessage($message);
    }
    
}

?>
