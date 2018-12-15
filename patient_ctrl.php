<?php

class patient_ctrl extends CI_Controller {

function __construct() 
{ parent::__construct();
$this->load->model('patient', '', TRUE);
$this->load->model('message', '', TRUE);

  }

  function index()
  {
  	session_start();
  	$data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
		$data['list']=$this->patient->selectpatient();
		$data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	    $this->load->view('header3',$data);
		$this->load->view('sidebarcommercial',$data);
		$this->load->view('patient',$data);
		$this->load->view('footer3');
  }
  function ajouter_patient() {
  session_start(); 

 $data = array( 'nom_pat' => $this->input->post('nom'),
'pre_pat' => $this->input->post('prenom'),
'tel_pat' => $this->input->post('tel'),
'email_pat' => $this->input->post('email'),
'sexe_pat' => $this->input->post('sexe'),
'pays_pat' => $this->input->post('pays'),
'civilite_pat' => $this->input->post('civilite'),
'langue_pat' => $this->input->post('langue'),
'code_utilisateur'=>$_SESSION['id'],
); 
 try
 {
 	$email =$this->input->post('email');
 	$list=$this->patient->getemail($email);
 	if ($list==null)
 	{
  $this->patient->ajouter_patient($data);
  echo '<script>alert("Patient ajouter avec succès","Mise a jour","success");</script>';
$data['list']=$this->patient->selectpatient();
$data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	    $this->load->view('header3',$data);
		$this->load->view('sidebarcommercial',$data);
		$this->load->view('patient',$data);
		$this->load->view('footer3');}

else
{
echo '<script>alert("Patient existe dèja");</script>';
$data['list']=$this->patient->getemail($email);
$data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
	  $this->load->view('header3',$data);
		$this->load->view('sidebarcommercial',$data);
		$this->load->view('patient',$data);
		$this->load->view('footer3');	
}}
 
catch(Exception $e)
 
 	{ var_dump($e->getMessage());
 		echo '<script> alert("oups , erreur!");</script>'; 
 
   //Loading View
       $data['list']=$this->patient->selectpatient();
       $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebarcommercial',$data);
		$this->load->view('patient',$data);
		$this->load->view('footer3');
	}
}
	function desactiver_patient() 
{
	session_start(); 
	$id=$this->input->post('num');
	try
{	
	$this->patient->desactiver_patient($id);
	echo '<script>alert("Patient desactiver avec succès");</script>';
	$data['list']=$this->patient->selectpatient();
	$data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	    $this->load->view('header3',$data);
		$this->load->view('sidebarcommercial',$data);
		$this->load->view('patient',$data);
		$this->load->view('footer3');
}
catch(Exception $e)
{ var_dump($e->getMessage());
 		echo '<script> alert("oups , erreur!");</script>'; 

	
	  $data['list']=$this->patient->selectpatient();
	  $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebarcommercial',$data);
		$this->load->view('patient',$data);
		$this->load->view('footer3');
	}

}
function get_patient() 
{
	session_start(); 
	$id = $this->uri->segment(3);
	
// if(!isset())
	$data['list']=$this->patient->getpatient($id);
	$data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
		/*
session_start();
$_SESSION['login']=


		*/
  	$this->load->view('header3',$data);
		$this->load->view('sidebarcommercial',$data);
		$this->load->view('modifierpatient',$data);
		$this->load->view('footer3');

}
function modifier_patient() 
	{
		session_start();
		try {

    $id=$this->input->post('num');
    

	$data = array( 'nom_pat' => $this->input->post('nom'), 'pre_pat' => $this->input->post('prenom'), 'tel_pat' => $this->input->post('tel'),'email_pat' => $this->input->post('email'),'pays_pat' => $this->input->post('pays'),'langue_pat'=>$this->input->post('langue') );
	
	$this->patient->modifier_patient($id,$data);
	echo '<script>alert(" patient modifier avec succès");</script>';
}

 
 catch(Exception $e)
 
 	{ var_dump($e->getMessage());
 		echo '<script> alert("oups , erreur!");</script>'; }

	
	  $data['list']=$this->patient->selectpatient();
	  $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebarcommercial',$data);
		$this->load->view('patient',$data);
		$this->load->view('footer3');

}
}


?>
