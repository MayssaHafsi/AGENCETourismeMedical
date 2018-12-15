<?php

class t_type_ctrl extends CI_Controller {

function __construct() 
{ parent::__construct();
$this->load->model('type', 'type', TRUE);
$this->load->model('message', 'message', TRUE);

}
  function index(){
  	 session_start() ;
  	 $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$data['list']=$this->type->select_trash_type();
  	$data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('trashtype',$data);
		$this->load->view('footer3');
  }
  function activer_type() 
{
	 session_start() ;
	
	$id=$this->input->post('num');
	try
	{


	$this->type->activer_type($id);
echo '<script>alert("Type activer avec succès");</script>';}
	catch(Exception $e)
 {
 	 var_dump($e->getMessage());
 		echo '<script> alert("oups , erreur!");</script>'; 


 }
	
	  $data['list']=$this->type->select_trash_type();
	  $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('trashtype',$data);
		$this->load->view('footer3');

}
 function supprimer_type() 
{
	 session_start() ;
	$id=$this->input->post('num');
	try

	{$this->type->supprimer_type($id);
		echo '<script>alert("Type supprimer avec succès");</script>';}
	catch(Exception $e)
 {
 	 var_dump($e->getMessage());
 		echo '<script> alert("oups , erreur!");</script>'; 


 }

	  $data['list']=$this->type->select_trash_type();
	  $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('trashtype',$data);
		$this->load->view('footer3');

}



 

}




?>
