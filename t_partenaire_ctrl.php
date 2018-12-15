<?php

class t_partenaire_ctrl extends CI_Controller {

function __construct() 
{ parent::__construct();
$this->load->model('partenaire', 'partenaire', TRUE);
$this->load->model('message', 'message', TRUE);

}
  function index(){
  	session_start();
  	$data['list']=$this->partenaire->select_trash_partenaire();
  	$data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('trashpartenaire',$data);
		$this->load->view('footer3');
  }
  function activer_partenaire() 
{
	session_start();
	
	$id=$this->input->post('num');
	try
	{


	$this->partenaire->activer_partenaire($id);
echo '<script>alert("Partenaire activé avec succès");</script>';}
	catch(Exception $e)
 {
 	 var_dump($e->getMessage());
 		echo '<script> alert("oups , erreur!");</script>'; 


 }
	
	  $data['list']=$this->partenaire->select_trash_partenaire();
	  $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('trashpartenaire',$data);
		$this->load->view('footer3');

}
 function supprimer_partenaire() 
{
	session_start();
	$id=$this->input->post('num');
	try

	{$this->partenaire->supprimer_partenaire($id);
		echo '<script>alert("Partenaire supprimé avec succès");</script>';}
	catch(Exception $e)
 {
 	 var_dump($e->getMessage());
 		echo '<script> alert("oups , erreur!");</script>'; 


 }

	  $data['list']=$this->partenaire->select_trash_partenaire();
	  $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('trashpartenaire',$data);
		$this->load->view('footer3');

}



 

}




?>
