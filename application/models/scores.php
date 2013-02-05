<?php

class Scores extends CI_Model{
    
    
    function getScore($id){
        $username = $this->session->userdata('username');
        $query  = $this->db->query("SELECT score,categories_id,drink_id FROM scores WHERE categories_id=$id AND owner='$username'");
        return $query->result();
    }
    function getScoreName($name){
        $username = $this->session->userdata('username');
        $query = $this->db->query("SELECT id FROM drinks WHERE link_name='$name'");
        $data = $query->result();
        $drinkid = $data[0]->id; 
       
        
        $query2  = $this->db->query("SELECT score FROM scores WHERE drink_id=$drinkid AND owner='$username'");
        return $query2->result();
         
    }
    function scoreUpdate($id,$score){
        
        $username = $this->session->userdata('username');
        $query = $this->db->query("SELECT id FROM scores WHERE drink_id=$id AND owner='$username'");
        
        if($query->num_rows() == 0){
            
            $query2 = $this->db->query("SELECT categories_id FROM drinks WHERE id=$id");
            $data = $query2->result();
            $drinkcatid = $data[0]->categories_id;
            $insertdata = array('owner'=>$username,'categories_id'=>$drinkcatid,'drink_id'=>$id,'score'=>$score);
            $this->db->insert('scores',$insertdata);
            
            
            
            $query3 = $this->db->query("SELECT score FROM scores WHERE drink_id=$id");
            $numrows = $query3->num_rows();
            $this->db->select_sum('score');
            $this->db->where('drink_id',$id);
            $query4 = $this->db->get('scores');
            foreach ($query4->result() as $allscore){
                $score2 = $allscore->score;
                $drinkscore = $score2 / $numrows;
                $updatedrinkscore = array('score'=>$drinkscore);
                $this->db->where('id', $id);
                $this->db->update('drinks',$updatedrinkscore);
            }
            
            $query5 = $this->db->query("SELECT votes FROM drinks WHERE id=$id");
            foreach($query5->result() as $drinkvotes){
                $votes = $drinkvotes->votes;
                $votes++;
                $data = array('votes' =>$votes);
                $this->db->where('id',$id);
                $this->db->update('drinks',$data);
            }
            
            
            
        }
        else {
            $update = array('score'=>$score);
            $this->db->where('drink_id',$id);
            $this->db->where('owner',$username);
            $this->db->update('scores',$update);
            
            $query = $this->db->query("SELECT score FROM scores WHERE drink_id=$id");
            $numrows = $query->num_rows();
            $this->db->select_sum('score');
            $this->db->where('drink_id',$id);
            $query2 = $this->db->get('scores');
            foreach ($query2->result() as $allscore){
                $score = $allscore->score;
                $drinkscore = $score / $numrows;
                $updatedrinkscore = array('score'=>$drinkscore);
                $this->db->where('id', $id);
                $this->db->update('drinks',$updatedrinkscore);
            }
            
            
            
        }
        
        
    }

}


?>
