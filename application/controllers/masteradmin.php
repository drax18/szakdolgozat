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
        $this->load->model('admin');
        $data['addcats'] = $this->admin->getCategories();
        
        
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
        $data['allincomes'] = $this->admin->allincomes();
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
    public function upload(){
        $this->load->model('admin');
        $data['addcats'] = $this->admin->getCategories();
        $data['middle'] = 'masteradmin/adminadddrinks';
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('alcoholname','Alkohol neve','required');
        $this->form_validation->set_rules('categoriesid','Kategória','required');
         $this->form_validation->set_rules('alcohollinkname','Feltöltendő kép neve','required');
         $this->form_validation->set_rules('alcoholprice','Ár','required|numeric');
         $this->form_validation->set_rules('alcoholpiece','Darab','required|numeric');
         $this->form_validation->set_rules('alcohol','Alkohol tartalom','required|numeric');
         $this->form_validation->set_rules('alcoholbottle','Mennyiség','required');
         $this->form_validation->set_rules('alcoholaction','Akció','required|numeric');
         $this->form_validation->set_rules('alcoholtitle','Ital címke','required');
         $this->form_validation->set_rules('alcoholinformation','Ital Leírás','required');
         
         if($this->form_validation->run()){
             $this->load->model('admin');
             $this->admin->addnewdrinks();
              $data['successadddrink'] = "Sikeresen Felvitted az új Alkoholt!";
             
         }
          if (!empty($_FILES['userfile']['name'])){
               // Specify configuration for File 1
               $config['upload_path'] = 'img/drinks';
               $config['allowed_types'] = 'gif|jpg|png';
               $config['max_size'] = '1000';
               $config['max_width']  = '300';
               $config['max_height']  = '700';       

               // Initialize config for File 1
               $this->upload->initialize($config);

               // Upload file 1
               if ($this->upload->do_upload('userfile'))
               {
                   $this->upload->data();
                   $data['successadddrink'] = "Sikeresen Felvitted az új Alkoholt!";
               }
               else
               {
                  $data['uploaderror'] =  $this->upload->display_errors();
               }

           }else{
               $data['$imgreq'] = "Kép megadása kötelező!";
           }

        $this->show_with_all('masteradmin/adminpanel', $data);
        
    }
    
}

?>
