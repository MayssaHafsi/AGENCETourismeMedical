<?php

class t_service_ctrl extends CI_Controller {

function __construct() 
{ parent::__construct();
$this->load->model('service_md', 'service_md', TRUE);
$this->load->model('message', 'message', TRUE);

}
  function index(){
    session_start() ;
  	$data['list']=$this->service_md->select_trash_service();
  	 $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('trashservice',$data);
		$this->load->view('footer3');
  }
  function activer_service() 
{
	session_start();
	$id=$this->input->post('num');
	try
	{


	$this->service_md->activer_service($id);
echo '<script>alert("Service activer avec succès");</script>';
$data['list']=$this->service_md->select_trash_service();
 $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	    $this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('trashservice',$data);
		$this->load->view('footer3');}
	catch(Exception $e)
 {
 	 var_dump($e->getMessage());
 		echo '<script> alert("oups , erreur!");</script>'; 


 }
	
	  $data['list']=$this->service_md->select_trash_service();
	   $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('trashservice',$data);
		$this->load->view('footer3');

}
 function supprimer_service() 
{
	session_start();
	$id=$this->input->post('num');
	try

	{$this->service_md->supprimer_service($id);
		echo '<script>alert("service supprimer avec succès");</script>';}
	catch(Exception $e)
 {
 	 var_dump($e->getMessage());
 		echo '<script> alert("oups , erreur!");</script>'; 


 }

	  $data['list']=$this->service_md->select_trash_service();
	   $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('trashservice',$data);
		$this->load->view('footer3');

}



 

}




?>
