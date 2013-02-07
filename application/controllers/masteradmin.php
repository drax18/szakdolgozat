<?php


class Masteradmin extends MY_Controller {
    
   
   
    public function adminpanel(){
        $data['middle'] = "masteradmin/adminadats";
        $this->show_with_all('masteradmin/adminpanel',$data);
    }
    

    public function logout(){
        $this->session->sess_destroy();
        redirect('mainsite/index');
    }
    
}

?>
