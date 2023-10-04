<?php 
if (!defined('BASEPATH')) exit ('No direct script access allowed');
class annonce_model extends CI_Model{
    public function getAllAnnonce(){
        $sql="SELECT * FROM V_annonce order by id ASC";
        $query=$this->db->query($sql);
        $result=$query->result_array();
        $array=array();
        foreach($result as $row){
            $array[]=$row;
        }
        $this->db->close();
        return $array;

    }
    public function getAllAnnonce_page($debut,$nb){
        $sql="SELECT * FROM V_annonce order by id ASC limit $nb OFFSET $debut ";
        $query=$this->db->query($sql);
        $result=$query->result_array();
        $array=array();
        foreach($result as $row){
            $array[]=$row;
        }
        $this->db->close();
        return $array;
    }
    public function getAnnonceByService($idservice){
        $sql="SELECT * FROM V_annonce where idservice=$idservice order by id ASC";
        $query=$this->db->query($sql);
        $result=$query->result_array();
        $array=array();
        foreach($result as $row){
            $array[]=$row;
        }
        $this->db->close();
        return $array;

    }
    public function getAnnonceByAdresse($idAdresse){
        $sql="SELECT * FROM V_annonce where idadresse=$idadresse order by id ASC";
        $query=$this->db->query($sql);
        $result=$query->result_array();
        $array=array();
        foreach($result as $row){
            $array[]=$row;
        }
        $this->db->close();
        return $array;
    }
    public function getAnnonceByDiplome($iddiplome){
        $sql="SELECT * FROM V_annonce where iddiplome=$iddiplome order by id ASC";
        $query=$this->db->query($sql);
        $result=$query->result_array();
        $array=array();
        foreach($result as $row){
            $array[]=$row;
        }
        $this->db->close();
        return $array;
    }
}