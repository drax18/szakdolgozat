<?php


class Owncart extends MY_Controller {
    //rendelés feladása
        public function ordersend(){                       
           $data['middle'] = 'mainsite/own_orders';
           
           $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'baderitalkozert@gmail.com',
                'smtp_pass' => 'qsefth5511r',
                'mailtype'  => 'html'
            );
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");

            
            $this->email->from('baderitalkozert@gmail.com', 'Báder László');
            $this->email->to('kisunuszi@gmail.com'); 

            $this->email->subject('Email Test');
            $this->email->message('Testing the email class.');  
            $result = $this->email->send();
            
            $this->load->model('users');
            $this->users->addOwnorders();
            
            $this->load->model('cart');
            $this->cart->orderSend();
            
                    
           $this->show_with_all('mainsite/index', $data);            
         }
    //kosárba tétel
        
       public function addtocart($id,$count){
            $this->load->model('cart');
            $this->cart->addtocart($id,$count);
        }    
    //kosárból elvétel
        
        public function deletetocart($id){
            $this->load->model('cart');
            $this->cart->deletetocart($id);
        }
    
}

?>
