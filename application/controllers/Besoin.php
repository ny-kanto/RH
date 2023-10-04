<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');
require_once(APPPATH . 'controllers/Session_controller.php');
class Besoin extends CI_Controller{
    function __construct()
    {
        parent::__construct(); 
        $this->load->model("besoin_model");
    } 
    public function index(){
        $idService=$this->input->get('idService');

        $data=array();
        $data['content'] = "besoin_view";
        $data['experiences'] = $this->besoin_model->getAllExperience();
        $data['diplomes'] = $this->besoin_model->getAllDiplome();
        $data['adresses'] = $this->besoin_model->getAllAdresse();
        $data['postes'] = $this->besoin_model->getPosteByService($idService); /* N O F */
        $data['idService']=$idService;
        if($this->session->flashdata("error")!=null){
            $data['error']=$this->session->flashdata("error");
        }

        $this->load->view('template_view',$data);
    }
    // qui recoit les donnees du fromulaire de creation de l'annonce
    public function insertBesoin(){
        $idService=$this->input->post("idService");
        $idPoste=$this->input->post("poste");
        $volume=$this->input->post("volume");
        $valeur=$this->input->post("valeur");
        $date=$this->input->post("date");

        $idDiplome=$this->input->post("diplome");
        $idExperience= $this->input->post("experience");       
        $idAdresse= $this->input->post("adresse");
        $sexe=$this->input->post("sexe");
        $nationalite=$this->input->post("nationalite");

        if(!empty($valeur) && !empty($date)){
            $this->load->helper("check");
          
            $retour_nb=traitNumber($valeur); 
            if($retour_nb!=$valeur){
                $error=$retour_nb;
                $this->session->set_flashdata("error",$error);
                redirect(site_url("besoin?idService=".$idService));
            }

            $retour_date=traitDate($date);
            //  echo $retour_date;
            if($retour_date != $date){
                $error=$retour_date;
                echo $error;
                $this->session->set_flashdata("error",$error);
                redirect(site_url("besoin?idService=".$idService));
            }

            $nb_personne=$this->getNbPersonne($volume,$valeur,$idPoste); 
            $idAnnonce=$this->besoin_model->insertBesoin($idPoste,$date,$nb_personne); /* N O F*/
            $this->besoin_model->insertCritere_annonce($idAnnonce,$idDiplome,$idAdresse,$idExperience,$sexe,$nationalite);/* N O F*/
            $this->besoin_model->insertQuestionnaire($idAnnonce);
            redirect(site_url("besoin/annonce?idAnnonce=".$idAnnonce));
        }else{
            $error="Tous les champs doivent etre completes".$volume." ".$date." ".$valeur;
            $this->session->set_flashdata("error",$error);
            redirect(site_url("besoin?idService=".$idService));
        }
    }

    //prends le nombre de personne necessaire au poste
    public function getNbPersonne($volume,$valeur,$idPoste){
        $nb=0;
        $taux=$this->besoin_model->getTJM($volume,$idPoste); /*N O F */
       
        $nb = ceil($valeur / $taux);
        return $nb;
    }
    //page qui montre l'annonce
    public function annonce(){
       $id=$this->input->get('idAnnonce');
      
       $data=$this->besoin_model->getAnnonceById($id);
       $data['content']='annonce_view';
       $this->load->view('template_view',$data);
    }
}
?>