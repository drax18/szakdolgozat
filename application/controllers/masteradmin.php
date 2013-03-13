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
        
        $this->load->model('admin');
           $data['allcomments'] = $this->admin->getallcomments();
        $data['getaandd'] = $this->admin->getActionswithDrinks();
        $data['getdrinksinform'] = $this->admin->getdrinksinform();
        $this->load->model('users');
        $data['getusers'] = $this->users->getAllusers();
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
               $config['allowed_types'] = 'png';
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
    public function actionmodify(){
        $this->load->library('form_validation');
        $data['middle'] = 'masteradmin/adminmodify';
         $this->load->model('admin');
         $data['allcomments'] = $this->admin->getallcomments();
        $data['getaandd'] = $this->admin->getActionswithDrinks();
        $data['getdrinksinform'] = $this->admin->getdrinksinform();
        $this->load->model('users');
        $data['getusers'] = $this->users->getAllusers();
        $this->form_validation->set_rules('newaction','Akció','required|numeric');
        if($this->form_validation->run()){
            $this->admin->updateaction();
            $data['successupdateaction'] = 'Sikeresennek frissítetted a kiválaszott alkohol akcióját!';
             
         }else{
             $data['validerror2'] = validation_errors();
         }
        
        $this->show_with_all('masteradmin/adminpanel', $data);
    }
    public function deleteusers(){
      
        $data['middle'] = 'masteradmin/adminmodify';
         $this->load->model('admin');
        $data['getaandd'] = $this->admin->getActionswithDrinks();
        $data['allcomments'] = $this->admin->getallcomments();
        $data['getdrinksinform'] = $this->admin->getdrinksinform();
        if($this->input->post('deleteusers')){
            $data['sucessuserdelete'] = 'Sikeresen törölted a kiválaszott Felhasználókat/Felhasználót';
       $this->admin->deleteusers();
        }else{
            $data['problemusersdelete'] = 'Nem válaszottál ki törlendő felhasználót!';
        }
       
         $this->load->model('users');
        $data['getusers'] = $this->users->getAllusers();
       $this->show_with_all('masteradmin/adminpanel', $data);
    }
    public function deletedrinks(){
        $data['middle'] = 'masteradmin/adminmodify';
          $this->load->model('admin');
        $this->load->model('users');
        $data['allcomments'] = $this->admin->getallcomments();
        $data['getusers'] = $this->users->getAllusers();
        $data['getdrinksinform'] = $this->admin->getdrinksinform();
        if($this->input->post('deletedrinks')){
            $data['sucessdrinkdelete'] = 'Sikeresen törölted a kiválaszott Italokat/Italt!';
         $this->admin->deletedrinks();
        }else{
            $data['problemdrinksdelete'] = 'Nem válaszottál ki törlendő alkoholt!';
        }
        
       
        $data['getaandd'] = $this->admin->getActionswithDrinks();
        
        
       $this->show_with_all('masteradmin/adminpanel', $data);
    }
    public function updatedrinkscount(){
        $this->load->library('form_validation');
        $data['middle'] = 'masteradmin/adminmodify';
         $this->load->model('admin');
        $this->load->model('users');
        $data['getusers'] = $this->users->getAllusers();
         $data['getaandd'] = $this->admin->getActionswithDrinks();
         $data['allcomments'] = $this->admin->getallcomments();
         $data['getdrinksinform'] = $this->admin->getdrinksinform();
          $this->form_validation->set_rules('updatecount','Darab','required|numeric');
         
          if($this->form_validation->run()){
              $this->admin->updatedrinkscount();
            $data['successupdatecount'] = 'Sikeresennek frissítetted a kiválaszott alkohol darabszámát !';
          }
          else{
              $data['validerror1'] = validation_errors();
          }
         
         
         
         
         
        $this->show_with_all('masteradmin/adminpanel', $data);
    }
    public function deletecomments(){

        $data['middle'] = 'masteradmin/adminmodify';
         $this->load->model('admin');
        $this->load->model('users');
        $data['getusers'] = $this->users->getAllusers();
         $data['getaandd'] = $this->admin->getActionswithDrinks();
         $data['getdrinksinform'] = $this->admin->getdrinksinform();
         
          if($this->input->post('deletecomments')){
            $data['sucesscommentdelete'] = 'Sikeresen törölted a kiválaszott Hozzászólásokat/Hozzászólást !';
         $this->admin->deleteselectedcomments();
        }else{
            $data['problemcommentdelete'] = 'Nem válaszottál ki törlendő hozzászólást !';
        }
         $data['allcomments'] = $this->admin->getallcomments();
         $this->show_with_all('masteradmin/adminpanel', $data);
    }
    public function modifydrinks(){
         $this->load->library('form_validation');
        $data['middle'] = 'masteradmin/adminmodify';
         $this->load->model('admin');
        $this->load->model('users');
        $data['getusers'] = $this->users->getAllusers();
         $data['getaandd'] = $this->admin->getActionswithDrinks();
         $data['allcomments'] = $this->admin->getallcomments();
         
          
          $this->form_validation->set_rules('newname','Új név');
          $this->form_validation->set_rules('newprice','Új ár','numeric');
          $this->form_validation->set_rules('newalcohol','Új alkohol tartalom','numeric');
          $this->form_validation->set_rules('newbottle','Új mennyiség');
          $this->form_validation->set_rules('newtitle','Új Ital címke');
          $this->form_validation->set_rules('newinfo','Új Ital információ');
          if($this->form_validation->run()){
              if(!$this->input->post('newname') && !$this->input->post('newprice') && !$this->input->post('newalcohol') && !$this->input->post('newbottle') && !$this->input->post('newtitle') && !$this->input->post('newinfo')){
                  $data['blank'] = "Nem adtad meg változtatni kívánt adatokat!";
              }else{
                $this->admin->modifydrinks();
                $data['successupdatedinfo'] = "Sikeresen módosítottad a kiválasztott Alkohol adatait!";
              }
            }else {
                $data['validerror3'] = validation_errors();
            }
         
         
         $data['getdrinksinform'] = $this->admin->getdrinksinform();
         
         
         $this->show_with_all('masteradmin/adminpanel', $data);
    }
    
}

?>
