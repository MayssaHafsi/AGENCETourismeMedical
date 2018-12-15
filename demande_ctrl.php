<?php

class demande_ctrl extends CI_Controller {

function __construct() 
{ parent::__construct();
$this->load->model('demandededevis', '', TRUE);
$this->load->model('message', '', TRUE);

  }

  function index()
  {
  	session_start() ;
  	$data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
		$data['list']=$this->demandededevis->selectdemande();
		 $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
      	$this->load->view('header3',$data);
		$this->load->view('sidebarcommercial',$data);
		$this->load->view('demandededevis',$data);
		$this->load->view('footer3');
  }
 
	
function annulerdemandededevis() 
{
	session_start() ;
	$id=$this->input->post('num');
	try
{	
	$this->demandededevis->annulerdemandededevis($id);
	$data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
	echo '<script>alert("Demande de devis annuler avec succès");</script>';

		$data['list']=$this->demandededevis->selectdemande();
		$data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
  	   $this->load->view('header3',$data);
		$this->load->view('sidebarcommercial',$data);
		$this->load->view('demandededevis',$data);
		$this->load->view('footer3');}
catch(Exception $e)
{ var_dump($e->getMessage());
 		echo '<script> alert("oups , erreur!");</script>'; }

	$data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
	  $data['list']=$this->demandededevis->selectdemande();
	  $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
  	   $this->load->view('header3',$data);
		$this->load->view('sidebarcommercial',$data);
		$this->load->view('demandededevis',$data);
		$this->load->view('footer3');

}

}

?>

