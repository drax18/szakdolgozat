<?php
    class Mainsite extends MY_Controller{
        
        //Oldalak
                
        public function index(){
            $this->newitems();
        }
        public function login(){
           $data['middle'] = 'mainsite/login';
           $this->show_with_all('mainsite/index',$data); 
        }
        public function newitems(){
            $this->load->model('newitems');
            $data['newdrinks'] = $this->newitems->getnewitems();
            $data['middle'] = 'mainsite/newitems';
            $this->show_with_all('mainsite/index',$data);
        }
        public function speciality(){
            $data['middle'] = 'mainsite/speciality';
            $this->show_with_all('mainsite/index',$data);
        }
        public function aboutus(){
            $data['middle'] = 'mainsite/aboutus';
            $this->show_with_all('mainsite/index',$data);
        }
        public function register(){    
            $data['middle'] = 'mainsite/register';
            $this->show_with_all('mainsite/index',$data);
        }

        public function actions(){
            $data['middle'] = 'mainsite/actions';
            $this->show_with_all('mainsite/index',$data);
        }

        public function contact(){
            $data['middle'] = 'mainsite/contact';
            $this->show_with_all('mainsite/index',$data);
        }

        public function orderterms(){
            $data['middle'] = 'mainsite/orderterms';
            $this->show_with_all('mainsite/index',$data);
        }
         public function owncart(){
            $data['middle'] = 'mainsite/owncart';
            $this->show_with_all('mainsite/index', $data);
        }
         public function favorites(){
            $data['middle'] = 'mainsite/favorites';
            $this->load->model('favorites');
            $data['favorites']= $this->favorites->getFavs();
            $this->show_with_all('mainsite/index', $data);
        }
        public function own_data(){
            $data['middle'] = 'mainsite/own_data';
            $this->show_with_all('mainsite/index', $data);
        }
        public function own_orders(){
            $data['middle'] = 'mainsite/own_orders';
            $this->show_with_all('mainsite/index', $data);
        }
        
        public function searchresult(){
           $searchopt = $this->input->post('searchoption');
           $data['middle'] = 'mainsite/searchresult';
           $this->load->model('search');           
           $data['searchresult'] = $this->search->getSearch($searchopt);
           $data['searchcount'] = $this->search->getSearchCount($searchopt);
           
           if(sizeof($data['searchresult']) == 1){
               foreach ($data['searchresult'] as $row){
                     
                   $this->drink($row->link_name);
                   
               }
           }
           else{             
           
            $this->show_with_all('mainsite/index', $data);
           }
        }
  
}