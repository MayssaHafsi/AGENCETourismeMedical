<?php

class Servicecat_ctrl extends CI_Controller {

function __construct() 
{ parent::__construct();
$this->load->model('categorie', 'categorie', TRUE);
$this->load->model('service_md', 'service_md', TRUE);
$this->load->model('message', 'message', TRUE);

}
  
  function cat(){
    session_start();
    $id = $this->uri->segment(3);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
     $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['list']=$this->categorie->select_categorie();
   $data['ser']=$this->service_md->select_service_cat($id);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('servicecat',$data);
    $this->load->view('footer3');
  }

  function ajoutligne(){
    session_start();
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
     $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
  	
  	$this->load->view('header3',$data);
		$this->load->view('sidebarcommercial',$data);
		$this->load->view('ajoutligne');
		$this->load->view('footer3');
  }








  

}




?>
