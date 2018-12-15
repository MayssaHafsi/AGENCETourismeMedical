<?php

class t_patient_ctrl extends CI_Controller {

function __construct() 
{ parent::__construct();
$this->load->model('patient', 'patient', TRUE);
$this->load->model('message', 'message', TRUE);


}
  function index(){
  	session_start();
  	$data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$data['list']=$this->patient->select_trash_patient();
  	$data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebarcommercial',$data);
		$this->load->view('trashpatient',$data);
		$this->load->view('footer3');
  }
function activer_patient() 
{
	session_start();
	$id=$this->input->post('num');
	try
	{
	$this->patient->activer_patient($id);
	echo '<script>alert("Patient activer avec succès");</script>';
	}
	catch(Exception $e)
 
 	{ var_dump($e->getMessage());
 		echo '<script> alert("oups , erreur!");</script>'; }

	  $data['list']=$this->patient->select_trash_patient();
	  $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebarcommercial',$data);
		$this->load->view('trashpatient',$data);
		$this->load->view('footer3');

}
 function supprimer_patient() 
{
	session_start();
	$id=$this->input->post('num');
	
	try
	{
	$this->patient->supprimer_patient($id);
	echo '<script>alert("Patient supprimer avec succès");</script>';
	}
	catch(Exception $e)
 
 	{ var_dump($e->getMessage());
 		echo '<script> alert("oups , erreur!");</script>'; }


	
	  $data['list']=$this->patient->select_trash_patient();
	  $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebarcommercial',$data);
		$this->load->view('trashpatient',$data);
		$this->load->view('footer3');

}


 

}




?>