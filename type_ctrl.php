<?php

class type_ctrl extends CI_Controller {

function __construct() 
{ parent::__construct();
$this->load->model('type', 'type', TRUE);
$this->load->model('message', 'message', TRUE);
}
  function index(){
     session_start() ;
     $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$data['list']=$this->type->select_type_partenaire();
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('typepartenaire',$data);
		$this->load->view('footer3');
  }



 function ajout() { 
   session_start() ;
$this->load->library('form_validation');
$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

 $this->form_validation->set_rules('typepartenaire', 'Type Partenaire', 'required|min_length[4]|max_length[50]');

if ($this->form_validation->run() == FALSE)
 {     $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  $this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('typepartenaire');
		$this->load->view('footer3'); }
  else {
 
 $data = array( 'type_partenaire' => $this->input->post('typepartenaire')); 
 try
 {
  $this->type->add_type($data);
  echo '<script>alert("Type Partenaire ajouter avec succès");</script>';}

 
 catch(Exception $e)
 
 	{ var_dump($e->getMessage());
 		echo '<script> alert("oups , erreur!");</script>'; }
 
   //Loading View
       $data['list']=$this->type->select_type_partenaire();
       $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('typepartenaire',$data);
		$this->load->view('footer3');
	}

}
function supprimer_type() 
{
   session_start() ;
  $id = $this->uri->segment(3);
  try

  {$this->type->supprimer_type($id);
    echo '<script>alert("Type partenaire supprimer avec succès");</script>';}
  catch(Exception $e)
 {
   var_dump($e->getMessage());
    echo '<script> alert("oups , erreur!");</script>'; 


 }

  
    $data['list']=$this->type->select_type_partenaire();
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebar3',$data);
    $this->load->view('typepartenaire',$data);
    $this->load->view('footer3');

}
function modifier_type() 
  {
     session_start() ;
    $id=$this->input->post('num');
  $data = array( 'type_partenaire' => $this->input->post('type'));
  try
  {
  $this->type->modifier_type($id,$data);
  echo '<script>alert("type modifier avec succès");</script>';}

 
 catch(Exception $e)
 
  { var_dump($e->getMessage());
    echo '<script> alert("oups , erreur!");</script>'; }

  
    $data['list']=$this->type->select_type_partenaire();
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebar3',$data);
    $this->load->view('typepartenaire',$data);
    $this->load->view('footer3');

}
function select_type() 
{
   session_start() ;
  $id = $this->uri->segment(3);
  

  $data['list']=$this->type->select_type($id);
  $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    
    $this->load->view('header3',$data);
    $this->load->view('sidebar3',$data);
    $this->load->view('modifiertype',$data);
    $this->load->view('footer3');

}
function desactiver_type() 
{
   session_start() ;
  $id=$this->input->post('num');
  try
{ 
  $this->type->desactiver_type($id);
  echo '<script>alert("Type desactiver avec succès");</script>';}
catch(Exception $e)
{ var_dump($e->getMessage());
    echo '<script> alert("oups , erreur!");</script>'; }

  
   
    $data['list']=$this->type->select_type_partenaire();
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebar3',$data);
    $this->load->view('typepartenaire',$data);
    $this->load->view('footer3');
   
}


}




?>




