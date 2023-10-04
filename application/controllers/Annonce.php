<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');
require_once(APPPATH . 'controllers/Session_controller.php');
class Annonce extends CI_Controller{
    function __construct()
    {
        parent::__construct(); 
        $this->load->model("annonce_model");
    } 
    public function index(){
        $data=array();
        $data['content']="annonce_liste_view";
        $debut=0;
        if($this->input->get('debut')!=null){
            $debut=$this->input->get('debut');
        }
        $data['annonces']=$this->annonce_model->getAllAnnonce_page($debut,9);
        $this->load->view('template_view',$data);
    }
    public function getAnnonceByService(){
        $data=array();
        $data['content']="annonce_liste_view";
        $idservice=$this->input->get('idService');
        $data['annonces']=$this->annonce_model->getAnnonceByService($idservice);
        $this->load->view('template_view',$data);

    }
    public function getAnnonceByAdresse(){
        $data=array();
        $data['content']="annonce_liste_view";
        $idAdresse=$this->input->get('idAdresse');
        $data['annonces']=$this->annonce_model->getAnnonceByAdresse($idAdresse);
        $this->load->view('template_view',$data);
    }
    public function getAnnonceByDiplome($iddiplome){
        $data=array();
        $data['content']="annonce_liste_view";
        $idAdresse=$this->input->get('iddiplome');
        $data['annonces']=$this->annonce_model->getAnnonceByDiplome($iddiplome);
        $this->load->view('template_view',$data);
    }
}
?>