<?php
    class Categories extends CI_Model{
        
        function getCat($id){

                $categories = $this->db->query("SELECT categories FROM categories WHERE id='$id'");
                return $categories->result();
            }
            function sumCat($id){
             $query = $this->db->query('SELECT count(*) AS numrows FROM drinks WHERE categories_id=?', $id);
             
                return $query->result();
           
                
            }
            function getList( $id , $sort ){
                
            if( $sort == "" ){
                $sortid = "id";
                $list = $this->db->query("SELECT * FROM drinks WHERE categories_id=".$id." ORDER BY ".$sortid);
            
            }
            else{
                
                $list = $this->db->query("SELECT * FROM drinks WHERE categories_id=".$id." ORDER BY ".$sort);
            }

            if ( $list->num_rows() > 0 ){
                
                return $list->result();
                
            }
            
        }
        
    }
?>
