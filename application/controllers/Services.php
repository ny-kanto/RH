<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');
require_once(APPPATH . 'controllers/Session_controller.php');
class Services extends CI_Controller{
    function __construct()
    {
        parent::__construct(); 
        $this->load->model("service_model");
    } 
    public function index(){
        $data=array();
        $data['content']="services_view";
        $data['services']=$this->service_model->getAllService();/*N O F */
        $this->load->view('template_view',$data);
    }
}
?>