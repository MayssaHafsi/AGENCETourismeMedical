<?php

class utilisateur_ctrl extends CI_Controller {

function __construct() 
{ parent::__construct();
$this->load->model('employe', '', TRUE);
$this->load->model('partenaire', '', TRUE);
$this->load->model('message', '', TRUE);

  }

  function index()
  {
  	session_start();
		$data['list']=$this->employe->select_employe();
		
  	
  	$data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('utilisateur',$data);
		$this->load->view('footer3');
  }
 function ajout() { 
session_start();
 
 $data = array( 'nom_utilisateur' => $this->input->post('nom'),
'pre_utilisateur' => $this->input->post('prenom'),
'date_utilisateur' => $this->input->post('date'),
'adr_utilisateur' => $this->input->post('adresse'),
'email_utilisateur' => $this->input->post('email'),
'tel_utilisateur' => $this->input->post('tel'),
'grade_utilisateur' => $this->input->post('employe'),
'login_utilisateur' => $this->input->post('login'),
'mot_de_passe_utilisateur' => $this->input->post('password')); 
 try
 {
 	$email =$this->input->post('email');
 	$list=$this->employe->getemploye($email);
 	if ($list==null)
 	{
 		$this->employe->add_employe($data);
  echo '<script>alert("Utilisateur ajouter avec succès");</script>';
 	}
else {
	 echo '<script>alert("Utilisateur existe déja");</script>';

	 $data['list']=$this->employe->getemploye($email);
	 $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	
  	$data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
	  $this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('utilisateur',$data);
		$this->load->view('footer3');


}
 }

 
 catch(Exception $e)
 
 	{ var_dump($e->getMessage());
 		echo '<script> alert("oups , erreur!");</script>'; }
 
   //Loading View
       $data['list']=$this->employe->select_employe();
       
  	$data['msg']=$this->message->count_msg($_SESSION['id']);

    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('utilisateur',$data);
		$this->load->view('footer3');
	}
	function desactiver_employe() 
	{
		session_start();

	$id=$this->input->post('num');
	
	try
	{
	$this->employe->desactiver_employe($id);
	echo '<script>alert("utilisateur desactiver avec succès");</script>';}

 
 catch(Exception $e)
 
 	{ var_dump($e->getMessage());
 		echo '<script> alert("oups , erreur!");</script>'; }

	
	  $data['list']=$this->employe->select_employe();
	 
  	$data['msg']=$this->message->count_msg($_SESSION['id']);

    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('utilisateur',$data);
		$this->load->view('footer3');

}
function select_utilisateur() 
{
	session_start();
	$id = $this->uri->segment(3);
	
// if(!isset())
	$data['list']=$this->employe->select_utilisateur($id);
	
  	$data['msg']=$this->message->count_msg($_SESSION['id']);

    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
		/*
session_start();
$_SESSION['login']=


		*/
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('modifieremployer',$data);
		$this->load->view('footer3');

}
function select_identifier() 
{
	session_start();
	$login =$this->input->post('login');
	$password =$this->input->post('password');
	
// if(!isset())
	$data=$this->employe->identifier($login , $password);
		
//session_start();
if($data==null)
{
    echo "erreur";
} 
else 
{            
foreach($data as $row)
                    {


	$_SESSION['id']= $row->num_utilisateur;
//echo $_SESSION['id'];
//echo $row->grade_utilisateur;
               	$_SESSION['grade']= $row->grade_utilisateur;
  if($_SESSION['grade']=='Responsable commercial')
  {
  	 $data['list']=$this->partenaire->count_partenaire();
  	 
  	
  	$data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	//$nb2=$data['nb1'];
//$x=1;
  	    $this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('acceuil',$data);
		$this->load->view('footer3');
		


  }
                  }

              }





		
  	//$this->load->view('header3');
		///$this->load->view('sidebar3');
		///$this->load->view('modifieremployer',$data);
		///$this->load->view('footer3');

}
function modifier_utilisateur() 
	{
		session_start();
    $id=$this->input->post('num');
	$data = array( 'nom_utilisateur' => $this->input->post('nom'), 'pre_utilisateur' => $this->input->post('prenom'), 'adr_utilisateur' => $this->input->post('adresse'), 'tel_utilisateur' => $this->input->post('tel'),'email_utilisateur' => $this->input->post('email'),'login_utilisateur' => $this->input->post('login'),'mot_de_passe_utilisateur'=>$this->input->post('password') );
	try
	{
	$this->employe->modifier_employe($id,$data);
	echo '<script>alert("employer modifier avec succès");</script>';}

 
 catch(Exception $e)
 
 	{ var_dump($e->getMessage());
 		echo '<script> alert("oups , erreur!");</script>'; }

	
	  $data['list']=$this->employe->select_employe();
	  $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('utilisateur',$data);
		$this->load->view('footer3');

}
	


}

?>

