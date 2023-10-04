<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Test_model');
    }

    public function index()
    {
        $data=array();
        $data['content'] = 'test/add';
        if($this->input->get("idAnnonce")!=null) {
            $this->session->set_userdata("idannonce",$this->input->get("idAnnonce"));
        }
            if ($this->session->has_userdata('idquestion')) {
                $data['idquestion'] = $this->session->userdata('idquestion');
            }
            // echo $this->session->userdata('idannonce');
            $questionnaire = $this->Test_model->getQuestionnaireByAnnonce($this->session->userdata('idannonce'));
            $data['question'] = $this->Test_model->getQuestionByQuestionnaire($questionnaire->id);
            $data['reponse'] = $this->Test_model->getAllReponse();
        
       
        
        // echo count($data['question']);
       
        
        
        $this->load->view("template_view", $data);
    }

    public function question()
    {
        $questionnaire = $this->Test_model->getQuestionnaireByAnnonce($this->session->userdata("idannonce"));
        $idquestionnaire = $questionnaire->id;
        $texte = $this->input->post('texte');
        $coefficient = $this->input->post('coeff');
        $this->Test_model->insertQuestion($idquestionnaire, $texte, $coefficient);
        $question = $this->Test_model->getLastQuestion();
        $this->session->set_userdata('idquestion', $question->id);
        $data['listereponse'] = $this->Test_model->getReponseByQuestion($this->session->userdata('idquestion'));
        
         $questionnaire = $this->Test_model->getQuestionnaireByAnnonce($this->session->userdata('idannonce'));
         $data['question'] = $this->Test_model->getQuestionByQuestionnaire($questionnaire->id);
         $data['reponse'] = $this->Test_model->getAllReponse();
     
        $data['content']='test/add';
        $this->load->view("template_view", $data);
    }

    public function reponse()
    {
        $texte = $this->input->post('texte');
        $session = $this->session->userdata('idquestion');
        $this->Test_model->insertReponse($session, $texte);
        $data['listereponse'] = $this->Test_model->getReponseByQuestion($session);

          // echo $this->session->userdata('idannonce');
          $questionnaire = $this->Test_model->getQuestionnaireByAnnonce($this->session->userdata('idannonce'));
          $data['question'] = $this->Test_model->getQuestionByQuestionnaire($questionnaire->id);
          $data['reponse'] = $this->Test_model->getAllReponse();
      
        $data['content']='test/add';
        $this->load->view("template_view", $data);
    }

    public function save()
    {
        if (isset($_POST['checkboxes']) && is_array($_POST['checkboxes'])) {
            $checkboxes = $_POST['checkboxes'];

            foreach ($checkboxes as $idreponse) {
                $this->Test_model->setReponse($idreponse);
            }
        }
        $this->session->unset_userdata('idquestion');
        redirect('Test');
    }
    public function all(){
        $idannonce=$this->session->userdata("idannonce");
        $this->session->unset_userdata("idannonce");
        redirect("besoin/annonce?idAnnonce=".$idannonce);

    }

    // public function list()
    // {
    //     $idquestionnaire = 1;
    //     $data['listecandidats'] = $this->Test_model->getResultatTest($idquestionnaire);
    //     $this->load->view('test/list', $data);
    // }

    // public function qcm($idannonce)
    // {
    //     $questionnaire = $this->Test_model->getQuestionnaireByAnnonce($idannonce);
    //     $data['question'] = $this->Test_model->getQuestionByQuestionnaire($questionnaire->id);
    //     $data['reponse'] = $this->Test_model->getAllReponse();
    //     $this->load->view('test/qcm', $data);
    // }
}
