<?php

class MY_Controller extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
    }    
    function show_with_all($view_name, $data){
        $data['menu'] = $this->menudata();
        $data['headmenu'] = $this->headmenudata();
        $data['footmenu'] = $this->footmenudata();
        $data['footmenu2'] = $this->footmenudata2();
        $data['cart'] = $this->cartdata();
        $data['cartcount'] = $this->cartcount();
        $data['log_content'] = $this->logContentdata();
        $data['cartprice'] = $this->cartPricedata();
        $data['owndata'] = $this->own_Datas();
        $data['alfavdata'] = $this->alreadyfav();
        $data['admin'] = $this->admincheck();
        $data['fees'] = $this->shippingfees();
        $data['checkadmin'] = $this->adminpagecheck();
        $data['adminuser'] = $this->adminpageusercheck();
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
    function menudata(){
        $this->load->model('menu');
        $menudata = $this->menu->getMenu();
        return $menudata;
    }
    function alreadyfav(){
        $this->load->model('favorites');
        $alreadyfavdata =$this->favorites->alreadyfav();
        return $alreadyfavdata;
    }
    function headmenudata(){
        $this->load->model('menu');
        $headmenudata = $this->menu->getHeadmenu();
        return $headmenudata;
    }
    function footmenudata(){
        $this->load->model('menu');
        $footmenu = $this->menu->getFootmenu();
        return $footmenu;
    }
    function footmenudata2(){
        $this->load->model('menu');
        $footmenu2 = $this->menu->getFootmenu2();
        return $footmenu2;
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
    function logContentdata(){
        $this->load->model('log_content');
        $log_content = $this->log_content->getLog_content();
        return $log_content;
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
   
}
?>
