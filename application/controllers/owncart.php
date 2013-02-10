<?php


class Owncart extends MY_Controller {
    //rendelés feladása
        public function ordersend(){                       
           $data['middle'] = 'mainsite/own_orders';
           
           
           
           
           
           
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
