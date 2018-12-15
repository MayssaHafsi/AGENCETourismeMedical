<?php

class t_employe_ctrl extends CI_Controller {

function __construct() 
{ parent::__construct();
$this->load->model('employe', 'employe', TRUE);
$this->load->model('message', 'message', TRUE);


}
  function index(){
  	session_start();
  	$data['list']=$this->employe->select_trash_employe();
  	 $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('trashemploye',$data);
		$this->load->view('footer3');
  }
function activer_employe() 
{
	session_start();
	$id=$this->input->post('num');
	try
	{
	$this->employe->activer_employe($id);
	echo '<script>alert("Employer activer avec succès");</script>';
	}
	catch(Exception $e)
 
 	{ var_dump($e->getMessage());
 		echo '<script> alert("oups , erreur!");</script>'; }

	  $data['list']=$this->employe->select_trash_employe();
	   $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('trashemploye',$data);
		$this->load->view('footer3');

}
 function supprimer_employe() 
{
	session_start();
	$id=$this->input->post('num');
	try
	{
	$this->employe->supprimer_employe($id);
	echo '<script>alert("Employer supprimer avec succès");</script>';
	}

	catch(Exception $e)
 
 	{ var_dump($e->getMessage());
 		echo '<script> alert("oups , erreur!");</script>'; }


	
	  $data['list']=$this->employe->select_trash_employe();
	   $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('trashemploye',$data);
		$this->load->view('footer3');

}


 

}




?>
