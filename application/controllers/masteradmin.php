<?php


class Masteradmin extends MY_Controller {
    
    public function adminpanel(){
        $data['middle'] = 'masteradmin/adminadats';
        $this->show_with_all('masteradmin/adminpanel', $data);
    }
    public function adminusers(){
        $data['middle'] = 'masteradmin/adminusers';
        $this->show_with_all('masteradmin/adminpanel', $data);
    }
     public function adminadats(){
        $data['middle'] = 'masteradmin/adminadats';
        $this->show_with_all('masteradmin/adminpanel', $data);
    }
    
}

?>
