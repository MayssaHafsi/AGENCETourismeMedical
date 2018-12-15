<?php

class Commercial extends CI_Controller {

function __construct() 
{ parent::__construct();
$this->load->model('employe', 'employe', TRUE);
$this->load->model('message', 'message', TRUE);
}
  function index(){

  	session_start() ;
  	$data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	 $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
  	    $this->load->view('header3',$data);
		$this->load->view('sidebarcommercial',$data);
		$this->load->view('profil1');
		$this->load->view('footer3');
  }



 



}




?>