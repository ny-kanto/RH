<?php 
if (!defined('BASEPATH')) exit ('No direct script access allowed');
class service_model extends CI_Model{
    public function getAllService(){
        $this->db->select('*');
        $this->db->from('service');
        
        $query = $this->db->get();
        $result=$query->result_array();
        $array=array();
        foreach($result as $row){
            $array[]=$row;
        }
        $this->db->close();
        return $array;
    }
}
?>