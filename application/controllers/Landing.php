<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');

class Landing extends CI_Controller{
    public function index(){
        $data=array();
        $this->load->model("service_model");
        $data['services']=$this->service_model->getAllService();
        $data['content']="landing_page_view";
        $this->load->view('template_view',$data);
    }
}
?>