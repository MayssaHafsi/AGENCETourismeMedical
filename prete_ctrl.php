<?php

class prete_ctrl extends CI_Controller {

function __construct() 
{ parent::__construct();

$this->load->model('message', 'message', TRUE);
$this->load->model('demandededevis', 'demandededevis', TRUE);

}
  function index(){
    session_start() ;
  	$data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['list']=$this->demandededevis->select_prete();
    

  	$this->load->view('header3',$data);
		$this->load->view('sidebarcommercial',$data);
		$this->load->view('demandededevisprete',$data);
		$this->load->view('footer3');
  }
  

   


}

?>