<?php

class Log_content extends CI_Model{
    
    function getLog_content(){
        $log_content = $this->db->query('SELECT * FROM log_panel');
        return $log_content->result();
    }
    
}

?>
