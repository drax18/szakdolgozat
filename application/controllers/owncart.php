<?php


class Owncart extends MY_Controller {
    //rendelés feladása
        public function ordersend(){
            $drinks = "";
            $adats = "";
            $this->load->model('cart');
            $userdrinks = $this->cart->getCart();
            foreach($userdrinks as $row){
             $drinks.="<b>".$row->drink."</b>"." ";
             $drinks.="Darab: ".$row->piece;
             $drinks.=" Ár: ".$row->price." Ft"."<br />";
             
            }
            
            $this->load->model('users');
            $userdata = $this->users->getUserdata();
            foreach ($userdata as $row2){
                $adats.="<b>"."Név: ".$row2->surname." ";
                $adats.=$row2->firstname."<br />";
                $adats.="Telefonszám: ".$row2->phonenumber."<br />";
                $adats.="Cím: ".$row2->streetaddress."<br />";
                $adats.="Város: ".$row2->city."<br />";
                $adats.="Irányítószám: ".$row2->zipcode."<br />";
                $adats.="Ország: ".$row2->country."</b>"."<br /><br />";
            }            
           $data['middle'] = 'mainsite/own_orders';
           $final = $adats.=$drinks;
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
            $cart['cartdatas'] = $this->getcartdatas();
            $this->email->subject('Rendelés');
            
            
            
            
            $this->email->message($final);  
            $result = $this->email->send();
            
            $this->load->model('users');
            $this->users->addOwnorders();
            
            $this->load->model('cart');
            $this->cart->orderSend();
            
                    
           $this->show_with_all('mainsite/index', $data); 
        
                  
         }
         // kosárból lekérés
         public function getcartdatas(){
             $this->load->model('cart');
             $cartdatas = $this->cart->getCart();
             return $cartdatas;
         }
    //kosárba tétel
        
       public function addtocart($id,$count){
            $this->load->model('cart');
            $this->cart->addtocart($id,$count);
        }    
    //kosárból elvétel
        
        public function deletetocart($id,$count){
            $this->load->model('cart');
            $this->cart->deletetocart($id,$count);
        }
        public function alldeleteitem($id){
            $this->load->model('cart');
            $this->cart->deleteallitem($id);
        }
}

?>
