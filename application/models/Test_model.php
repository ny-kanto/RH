<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test_model extends CI_Model
{

    public function insertQuestionnaire($idannonce)
    {
        $data = array(
            'idannonce' => $idannonce
        );

        $this->db->insert('questionnaire', $data);
    }

    public function getQuestionnaireByAnnonce($idannonce)
    {
        $this->db->where('idannonce', $idannonce);
        $query = $this->db->get('questionnaire');
        return $query->row();
    }

    public function insertQuestion($idquestionnaire, $texte, $coefficient)
    {
        $data = array(
            'idquestionnaire' => $idquestionnaire,
            'texte' => $texte,
            'coefficient' => $coefficient
        );

        $this->db->insert('question', $data);
    }

    public function insertReponse($idquestion, $texte)
    {
        $data = array(
            'idquestion' => $idquestion,
            'texte' => $texte
        );

        $this->db->insert('reponse', $data);
    }

    public function getQuestionByQuestionnaire($idquestionnaire)
    {
        $this->db->where('idquestionnaire', $idquestionnaire);
        $query = $this->db->get('question');
        return $query->result();
    }

    public function getReponseByQuestion($idquestion)
    {
        $this->db->where('idquestion', $idquestion);
        $query = $this->db->get('reponse');
        return $query->result();
    }

    public function getResultatTest($idquestionnaire)
    {
        $request = "SELECT c.nom, c.prenom, rt.note FROM resultat_test rt JOIN candidat c ON rt.idcandidat = c.id WHERE rt.idquestionnaire = %d ORDER BY rt.note DESC";
        $query = $this->db->query(sprintf($request, $idquestionnaire));
        return $query->result();
    }

    public function getAllReponse()
    {
        $query = $this->db->get('reponse');
        return $query->result();   
    }

    public function setReponse($idreponse)
    {
        $data = array(
            'estvraie' => 1
        );
        $this->db->where('id', $idreponse);
        $this->db->update('reponse', $data);
    }

    public function getLastQuestion()
    {
        $query = $this->db->query("SELECT * FROM question ORDER BY id DESC LIMIT 1");
        return $query->row();
    }
}
