<?php
 class Menu extends CI_Model{
        
        function getMenu(){

                $menu = $this->db->query('SELECT * FROM menu');
                return $menu->result();
            }
            
            
            
            function getHeadmenu(){
            $headmenu = $this->db->query('SELECT * FROM headmenu');
            return $headmenu->result();
            } 
            function getFootmenu(){
                $footmenu = $this->db->query('SELECT * FROM footmenu');
                return $footmenu->result();
            }
            function getFootmenu2(){
                $footmenu = $this->db->query('SELECT * FROM footmenu2');
                return $footmenu->result();
            }
            
            
        }
       
    
?>
