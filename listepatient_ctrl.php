<?php

class listepatient_ctrl extends CI_Controller {

function __construct() 
{ parent::__construct();
$this->load->model('patient', 'patient', TRUE);
$this->load->model('categorie', 'categorie', TRUE);
$this->load->model('service_md', 'service_md', TRUE);
$this->load->model('message', 'message', TRUE);
}
  function index(){
    session_start() ;
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['list1']=$this->categorie->selectcategorie();
   $data['ser']=$this->service_md->selectservice();
  	$data['list']=$this->patient->selectpatient();
  	$this->load->view('header3',$data);
		$this->load->view('sidebarcommercial',$data);
		$this->load->view('listepatient',$data);
		$this->load->view('footer3');
  }
  function select_patient_liste(){
    session_start() ;
    $id = $this->uri->segment(3);
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['list1']=$this->categorie->selectcategorie();
   $data['ser']=$this->service_md->selectservice();
    $data['list']=$this->patient->getpatient($id);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('fichepatient',$data);
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
  echo '<script>alert("Patient ajouter avec succès");</script>';
$data['list']=$this->patient->selectpatient();
$data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
        $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('listepatient',$data);
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
    $this->load->view('listepatient',$data);
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
    $this->load->view('listepatient',$data);
    $this->load->view('footer3');
  }
}



 





  

}




?>
