<?php

class partenaire_ctrl extends CI_Controller {

function __construct() 
{ parent::__construct();
$this->load->model('employe', '', TRUE);
$this->load->model('type', '', TRUE);
$this->load->model('partenaire', 'partenaire', TRUE);
$this->load->model('message', 'message', TRUE);
$this->load->model('demandededevis', 'demandededevis', TRUE);


  }

  function index()
  {
  	session_start() ;
  	$data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
		$data['list']=$this->employe->select_partenaire();
		$data['type']=$this->type->select_type_partenaire();
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('partenaire',$data);
		$this->load->view('footer3');
  }
 function ajout() { 
 	session_start() ;

 
 $data = array( 'nom_utilisateur' => $this->input->post('nom'),

'date_utilisateur' => $this->input->post('date'),
'adr_utilisateur' => $this->input->post('adresse'),
'email_utilisateur' => $this->input->post('email'),
'tel_utilisateur' => $this->input->post('tel'),


'type_partenaire' => $this->input->post('typepartenaire'),
'login_utilisateur' => $this->input->post('login'),
'mot_de_passe_utilisateur' => $this->input->post('password')); 
 //$msg=array('partenaire ajouter avec succées');
 //$this->session->set_flashdata('data','partenaire ajouter avec succés');
 try
 {
 $email =$this->input->post('email');
 $list=$this->partenaire->getpartenaire($email);
 	if ($list==null)
 	{
 		$m=$this->demandededevis->now();
    foreach($m as $row)
{
  $n= $row->now;
  

    $date=$this->input->post('date');

    if ($n < $date )
    {
      echo '<script>alert("Veuillez verifier la date saisie");</script>';
      $data['list']=$this->employe->select_partenaire();
		$data['type']=$this->type->select_type_partenaire();

	 $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
	  $this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('partenaire',$data);
		$this->load->view('footer3');}
      else
      {
 	$this->partenaire->add_partenaire($data);
 	echo '<script>alert("Partenaire ajouté avec succès");</script>';
 	$data['list']=$this->employe->select_partenaire();
		$data['type']=$this->type->select_type_partenaire();

	 $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
	  $this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('partenaire',$data);
		$this->load->view('footer3');}}}
 	else 
 	{
 		 echo '<script>alert("Partenaire existe déja");</script>';
 		  $data['list']=$this->partenaire->getpartenaire($email);

	 $data['list']=$this->partenaire->getpartenaire($email);
	 $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
	  $this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('partenaire',$data);
		$this->load->view('footer3');
 		# code...
 	}}

 
 catch(Exception $e)
 
 	{ var_dump($e->getMessage());
 		echo '<script> alert("oups , erreur!");</script>'; 
   //Loading View
       $data['list']=$this->employe->select_partenaire();
       $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('partenaire',$data);
		$this->load->view('footer3');
	}
}

	
function desactiver_partenaire() 
{
	session_start() ;
	$id=$this->input->post('num');
	try
{	
	$this->employe->desactiver_partenaire($id);
	echo '<script>alert("Partenaire desactivé avec succès");</script>';

   $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
	$data['list']=$this->employe->select_partenaire();
	$data['type']=$this->type->select_type_partenaire();
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('partenaire',$data);
		$this->load->view('footer3');}
catch(Exception $e)
{ var_dump($e->getMessage());
 		echo '<script> alert("oups , erreur!");</script>'; }

	
	  $data['list']=$this->employe->select_partenaire();
	  $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('partenaire',$data);
		$this->load->view('footer3');

}
function select_partenaire() 
{
	session_start() ;
	$id = $this->uri->segment(3);
	

	$data['list']=$this->partenaire->select_partenaire($id);
	$data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
		
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('modifierpartenaire',$data);
		$this->load->view('footer3');

}
function modifier_partenaire() 
	{
		session_start() ;
    $id=$this->input->post('num');
	$data = array( 'nom_utilisateur' => $this->input->post('nom'),'adr_utilisateur' => $this->input->post('adresse'), 'tel_utilisateur' => $this->input->post('tel'),'email_utilisateur' => $this->input->post('email'),'login_utilisateur' => $this->input->post('login'),'mot_de_passe_utilisateur'=>$this->input->post('password') );
	try
	{
	$this->partenaire->modifier_partenaire($id,$data);
	echo '<script>alert("partenaire modifié avec succès");</script>';}

 
 catch(Exception $e)
 
 	{ var_dump($e->getMessage());
 		echo '<script> alert("oups , erreur!");</script>'; }

	
	  $data['list']=$this->employe->select_partenaire();
	  $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('partenaire',$data);
		$this->load->view('footer3');

}
}

?>

