<?php

class Alcohol extends MY_Controller{
    
    public function drink($name){
            $this->load->model('drinks');
            $data['drinks'] = $this->drinks->getDrink($name);
            $this->load->model('comments');
            $data['allcomment'] = $this->comments->allComment($name);
            $data['middle'] = 'alcohol/drink';
            $this->load->model('scores');
            $data['score'] = ($this->scores->getScoreName($name));
            $this->show_with_all('mainsite/index', $data);
        }
        
     public function catlist($id){
          
          $data['middle'] = 'alcohol/catlist';  
          $this->load->model('categories');          
          $data['catname'] = $this->categories->getCat($id);
          $data['countdrinks'] = $this->categories->sumCat($id);
          $data['drinklist'] = $this->catdrinks($id);
          $this->load->model('scores');
          $data['score'] = $this->scores->getScore($id);
          $this->show_with_all('mainsite/index',$data);
        }
         public function catdrinks($id){
          $this->input->post('sortdata');
          $sort = $this->input->post('sortdata');
          $this->load->model('categories');
          return $this->categories->getList($id,$sort);          
        }
        
        public function catdrinksrefresh($id){
            $data['drinklist'] = $this->catdrinks($id);           
            $this->load->model('scores');
            $data['score'] = $this->scores->getScore($id);
            $this->load->model('favorites');
            $data['alfavdata'] = $this->favorites->alreadyfav();
            
            $this->load->library('parser');
            return $this->parser->parse('alcohol/drinklist',$data);
        }    
}


?>
