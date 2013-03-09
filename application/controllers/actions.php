<?php

class Actions extends MY_Controller{
         //favhoz adás
       function favadd($name){
            if($this->session->userdata('username')){
                $this->load->model('favorites');
                $bool = $this->favorites->boolfav($name);
                if($bool){
                    $this->favorites->addtofav($name);
                }                 

            }
        }
        //saját adatok editelése
        public function own_data_edit(){
            $data['middle'] = 'mainsite/own_data';
            $this->load->library('form_validation');
            $this->form_validation->set_rules('passwordedit','Jelszó','required|trim|min_length[5]');
            $this->form_validation->set_rules('cpasswordedit','Jelszó megerősítő','required|trim|matches[passwordedit]');
            $this->form_validation->set_rules('surnameedit','Vezetéknév','trim');
            $this->form_validation->set_rules('firstnameedit','Keresztnév','trim');
            $this->form_validation->set_rules('phonenumberedit','Telefonszám','trim|numeric');
            $this->form_validation->set_rules('emailedit','E-mail','trim|valid_email');
            $this->form_validation->set_rules('streetaddressedit','Utca/házszám','trim');
            $this->form_validation->set_rules('cityedit','Város','trim');
            $this->form_validation->set_rules('zipcodeedit','Irányítószám','trim|numeric');            
            $this->form_validation->set_rules('countryedit','Ország','trim'); 
            if($this->form_validation->run()){
                $this->load->model('users');
                $this->users->ownDataEdit();
                $data['editsuccess'] = $this->Data_edit_success();
                $this->show_with_all('mainsite/index', $data);
            }
            else
            $this->show_with_all('mainsite/index',$data);
        }
        public function Data_edit_success(){
            $editsuccess = "Sikeresen megváltoztattad az adatokat/adatot!";
            return $editsuccess;
        }
        //reg validátor
         public function register_validation(){
            $data['middle'] = 'mainsite/register';
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('username','Felhasználónév','required|trim|min_length[4]|max_length[10]|is_unique[users.username]');
            $this->form_validation->set_rules('password','Jelszó','required|trim|min_length[5]');
            $this->form_validation->set_rules('cpassword','Jelszó megerősítő','required|trim|matches[password]');
            $this->form_validation->set_rules('surname','Vezetéknév','required|trim');
            $this->form_validation->set_rules('firstname','Keresztnév','required|trim');
            $this->form_validation->set_rules('phonenumber','Telefonszám','required|trim|numeric');
            $this->form_validation->set_rules('email','E-mail','required|trim|valid_email');
            $this->form_validation->set_rules('streetaddress','Utca/házszám','required|trim');
            $this->form_validation->set_rules('city','Város','required|trim');
            $this->form_validation->set_rules('zipcode','Irányítószám','required|trim|numeric');            
            $this->form_validation->set_rules('country','Ország','required|trim');            
            $this->form_validation->set_rules('orderterms','Szolgáltatási feltételeket','required|trim');
            
            if($this->form_validation->run()){
                $this->load->model('users');
                $this->users->add_User();
                $data['success'] = $this->Register_success();
                $this->show_with_all('mainsite/index', $data);
                
            }
            else
                $this->show_with_all('mainsite/index', $data);  
        }
        
        public function Register_success(){
            $success = "Gratulálok! Sikeres regisztráció!";
            return $success;
        }
        
        //login validátor
        public function login_validation(){
            $data['middle'] = 'mainsite/login';            
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username','Felhasználónév','required|trim|xss_clean|callback_validate_credentials');
            $this->form_validation->set_rules('password','Jelszó','required|md5|trim');
            if($this->form_validation->run()){
             
                $session['username'] = $this->input->post('username');
                $newdata = array('username'=> $session['username']);
                $this->session->set_userdata($newdata);
                 $this->load->model('users');
                $userid = $this->users->getuser();
                $session['userid'] = $userid;
                $newdata2 = array('userid'=>$session['userid']);
                $this->session->set_userdata($newdata2);
                
                redirect('mainsite/index');
            }
            else{
                $this->show_with_all('mainsite/index', $data);
            }           
        }
        public function validate_credentials(){
            $this->load->model('users');
            if($this->users->can_login()){
                return true;
            }
            else{
                $this->form_validation->set_message('validate_credentials','Hibás Felhasználónév vagy jelszó!');
                return false;
            }
        }
        //kilépés
        public function logout(){
            $this->session->sess_destroy();
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        //komment írása
         public function writeComm($id){
            $data = $this->input->post('comment');
            echo $data;
            $this->load->model('comments');
            $this->comments->writeComm($data,$id);
        }
        
        //pontozása adása és módosítása
        public function scoreupdate($id,$score){
            $this->load->model('scores');

            $this->scores->scoreUpdate($id,$score);
        }
        //elvétel kedvencekből
        
        public function removefav($id){
            $this->load->model('favorites');
            $this->favorites->removeFav($id);
        }
        public function sendforgotmail(){
            $data['middle'] = 'mainsite/sendforgotmail';
            
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            for ($i = 0; $i < 20; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }
            $this->load->model('users');
            $bool = $this->users->alreadysendpw();
            if($bool == true){
                
                
                
            $this->users->forgotpw($randomString);
            $link = "";
            $link .= "A linkre kattinva tudod megváltoztatni a jelszavad!"."<br />";
            $link .= "<a href='http://localhost/szakdoga_igniter/actions/passwordreset/$randomString'>itt a link</a>";
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'baderitalkozert@gmail.com',
                'smtp_pass' => 'qsefth5511r',
                'mailtype'  => 'html',
                'charset' => 'utf-8'
            );
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");

            
            $this->email->from('baderitalkozert@gmail.com', 'Báder László');
            $this->email->to('kisunuszi@gmail.com'); 
            $this->email->subject('Jelszó változtatás');
            
            
            
            
            $this->email->message($link);  
            $result = $this->email->send();
            
            
            
            }
            else{
                $data['pwhiba'] = "Még függőven van egy jelszó kérésed";
            }
            
            
            $this->show_with_all('mainsite/index', $data);
        }
        public function passwordreset($newpass){
            
           $data['middle'] = 'mainsite/passwordreset';
           $this->load->model('users');
           $bool = $this->users->checkpass($newpass);
           if($bool){
               $data['bool'] = true;
           }
           $this->show_with_all('mainsite/index', $data);
           
        }
        public function pwresetdone(){
            $data['middle'] = 'mainsite/pwresetdone';
             $this->load->library('form_validation');
            $this->form_validation->set_rules('passwordedit','Jelszó','required|trim|min_length[5]');
            $this->form_validation->set_rules('cpasswordedit','Jelszó megerősítő','required|trim|matches[passwordedit]');
            if($this->form_validation->run()){
                $this->load->model('users');
                $this->users->passwordupdate();
                $data['successpwedit'] = "Sikeresen megváltoztattad a jelszavad!";
            }
            $this->show_with_all('mainsite/index', $data);
        }
}

?>
