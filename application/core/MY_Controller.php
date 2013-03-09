<?php

class MY_Controller extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
    }    
    function show_with_all($view_name, $data){
        $data['cart'] = $this->cartdata();
        $data['cartcount'] = $this->cartcount();
        $data['cartprice'] = $this->cartPricedata();
        $data['owndata'] = $this->own_Datas();
        $data['alfavdata'] = $this->alreadyfav();
        $data['admin'] = $this->admincheck();
        $data['fees'] = $this->shippingfees();
        $data['checkadmin'] = $this->adminpagecheck();
        $data['adminuser'] = $this->adminpageusercheck();
        $data['myorders'] = $this->ownorders();
        $data['admingetusers'] = $this->adminGetUsers();
        $data['ordernumber'] = $this->adminGetOrdersmax();
        $data['newregistereduser'] = $this->newregistereduser();
        $data['newcomments'] = $this->newcomments();
        $data['bestscores'] = $this->bestscores();
        $data['drinkpiece'] = $this->getDrinkpiece();
        $this->load->view($view_name,$data);        
    }
    function admincheck(){
        
        $this->load->model('admin');
        $admin = $this->admin->getAdmin();
        if($admin){
            if($this->session->userdata('username') == $admin[0]->username){
               return $adminuser = TRUE;
            }
            else {
                return $adminuser = false;
            }
        }
    }
    function adminpagecheck(){
        $this->load->model('admin');
        return $checkadmin = $this->admin->getAdmin();
    }
    function adminpageusercheck(){
        $this->load->model('admin');
        return $adminuser = $this->session->userdata('username');
    }

    function alreadyfav(){
        $this->load->model('favorites');
        $alreadyfavdata =$this->favorites->alreadyfav();
        return $alreadyfavdata;
    }
    function cartdata(){
        $this->load->model('cart');
        $cartdata = $this->cart->getCart();
        if($this->session->userdata('username')){
            return $cartdata;
        }
        else
            return false;
    }
    function shippingfees(){
        $this->load->model('cart');
        $fees = $this->cart->getFees();
        return $fees;
    }
    function cartcount(){
        $this->load->model('cart');
        $cartcount = $this->cart->owneritemcount();
        if($this->session->userdata('username')){
            return $cartcount;
        }
        else
            return false;
        
    }
    function cartPricedata(){
        $this->load->model('cart');
        $cart_pricedata = $this->cart->getAllprice();
        if($cart_pricedata == ""){
            return $cart_pricedata = 0;
        }
        else
            return $cart_pricedata;
    }
    function own_Datas(){
        
        $this->load->model('users');
        $owndatas = $this->users->ownData();
        return $owndatas;
    }
     public function drink($name){
            $this->load->model('drinks');
            $data['drinks'] = $this->drinks->getDrink($name);
            $this->load->model('comments');
            $data['allcomment'] = $this->comments->allComment($name);
            $data['middle'] = 'alcohol/drink';
            $this->load->model('scores');
            $data['score'] = ($this->scores->getScoreName($name));
            $this->load->model('myorders');
            $data['whoorders'] = $this->myorders->getWhoorders($name);
            $this->show_with_all('mainsite/index', $data);
        }
    public function ownorders(){
         $this->load->model('myorders');
        return $this->myorders->getOwnorders();
    } 
    public function adminGetUsers(){
        $this->load->model('admin');
        return $this->admin->adminGetUsers();
    }
    public function adminGetOrdersmax(){
        $this->load->model('admin');
        return $this->admin->adminGetOrdersmax();
    }
    public function newregistereduser(){
        $this->load->model('admin');
        return $this->admin->newregistereduser();
    }
    public function newcomments(){
        $this->load->model('admin');
        return $this->admin->newcomments();
    }
    public function bestscores(){
        $this->load->model('admin');
        return $this->admin->bestscores();
    }
    public function getDrinkpiece(){
        $this->load->model('admin');
        return $this->admin->getdrinkpiece();
    
    }
}
?>
