<?php 
if (!defined('BASEPATH')) exit ('No direct script access allowed');
class besoin_model extends CI_Model{
    //prends poste par service
    public function getPosteByService($idService){
        $sql="SELECT * FROM poste where idservice=".$idService;
        $query=$this->db->query($sql);
        $result=$query->result_array();
        $array=array();
        foreach($result as $row){
            $array[]=$row;
        }
        $this->db->close();
        return $result;

    }
    //prends tous les experiences
    public function getAllExperience(){
        $this->db->select('*');
        $this->db->from('experience');
        $query = $this->db->get();
        $result=$query->result_array();
        $array = array();
        foreach($result as $row){
         $array[]=$row;
         }
        $this->db->close();
        return $array;
        
    }
    //prends tous les diplomes
    public function getAllDiplome(){
        $this->db->select('*');
        $this->db->from('diplome');
        $query = $this->db->get();
        $result=$query->result_array();
        $array = array();
        foreach($result as $row){
         $array[]=$row;
         }
        $this->db->close();
        return $array;
    }
    //prends tous les adresses
    public function getAllAdresse(){
        $this->db->select('*');
        $this->db->from('adresse');
        $query = $this->db->get();
        $result=$query->result_array();
        $array = array();
        foreach($result as $row){
         $array[]=$row;
         }
        $this->db->close();
        return $array;
    }
    //prends le TJM par poste et volume
    public function getTJM($volume,$idPoste){
        $colonne="heure"; //heure 0
        if($volume == 1){
            $colonne="tache";
        }
        $this->db->select($colonne);
        $this->db->from("tjm");
        $this->db->where("idposte",$idPoste);
        
        $query = $this->db->get();
        $result=$query->row_array();

        $this->db->close();
        return $result[$colonne];

    }
    //insert la defintion de besoin
    public function insertBesoin($idPoste,$date,$nb_personne){
        $sql="INSERT INTO annonce(idposte,datelimite,nbpersonne) values($idPoste,'$date',$nb_personne)";
        $this->db->query($sql);
        
        $last_insert_id = $this->getLastId();
        $this->db->close();
        return $last_insert_id ;
    }
    public function getLastId(){
        $this->db->select('MAX(id)');
        $this->db->from('annonce');
        $query=$this->db->get();
        $result=$query->row_array();
       
        return $result['max'];
    }
    //insert les critere de l'annonce 
    public function insertCritere_annonce($idAnnonce,$idDiplome,$idAdresse,$idExperience,$sexe,$nationalite){
        $sql="INSERT INTO critere_annonce(idannonce,iddiplome,idexperience,idadresse,nationalite,sexe) values
        ($idAnnonce,$idDiplome,$idExperience,$idAdresse,$nationalite,$sexe)";
         $this->db->query($sql);
        $this->db->close();
    }
     //insert les critere de l'annonce 
     public function insertQuestionnaire($idAnnonce){
        $sql="INSERT INTO questionnaire(idannonce) values($idAnnonce)";
         $this->db->query($sql);
        $this->db->close();
    }
    //prends annonce par id
    public function getAnnonceById($idAnnonce){
        $sql="SELECT * FROM V_annonce WHERE id=$idAnnonce";
        $query=$this->db->query($sql);
        $result=$query->row_array();
        return $result;
    }

}