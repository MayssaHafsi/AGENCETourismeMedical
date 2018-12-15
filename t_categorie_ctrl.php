<?php

class t_categorie_ctrl extends CI_Controller {

function __construct() 
{ parent::__construct();
$this->load->model('categorie', 'categorie', TRUE);
$this->load->model('message', 'message', TRUE);

}
  function index(){
  	session_start();
  	$data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$data['list']=$this->categorie->select_trash_categorie();
  	$data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('trashcategorie',$data);
		$this->load->view('footer3');
  }
  function activer_categorie() 
{
	session_start();
	$id=$this->input->post('num');
	try
	{


	$this->categorie->activer_cat($id);
echo '<script>alert("Categorie activer avec succès");</script>';}
	catch(Exception $e)
 {
 	 var_dump($e->getMessage());
 		echo '<script> alert("oups , erreur!");</script>'; 


 }
	
	  $data['list']=$this->categorie->select_trash_categorie();
	  $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('trashcategorie',$data);
		$this->load->view('footer3');

}
 function supprimer_categorie() 
{
	session_start();
	$id=$this->input->post('num');
	try

	{$this->categorie->supprimer_cat($id);
		echo '<script>alert("Categorie supprimer avec succès");</script>';}
	catch(Exception $e)
 {
 	 var_dump($e->getMessage());
 		echo '<script> alert("oups , erreur!");</script>'; 


 }

	  $data['list']=$this->categorie->select_trash_categorie();
	  $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('trashcategorie',$data);
		$this->load->view('footer3');

}



 

}




?>
