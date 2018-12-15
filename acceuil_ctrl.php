<?php

class acceuil_ctrl extends CI_Controller {

function __construct() 
{ parent::__construct();


$this->load->model('partenaire', 'partenaire', TRUE);
$this->load->model('service_md', '', TRUE);
$this->load->model('employe', '', TRUE);
$this->load->model('type', '', TRUE);
$this->load->model('categorie', '', TRUE);
$this->load->model('patient', '', TRUE);
$this->load->model('contrat', '', TRUE);
$this->load->model('demandededevis', '', TRUE);
$this->load->model('message', '', TRUE);
$this->load->model('offredeprix', 'offredeprix', TRUE);}


  
  function index() 
{
	$login =$this->input->post('login');
	$password =$this->input->post('password');
	
// if(!isset())
	$data=$this->employe->identifier($login , $password);
		
//session_start();
if($data==null)
{
    echo "les données sont èronnès";

    
} 
else 

{ 
  
session_start();           
foreach($data as $row)
{


	$_SESSION['id']= $row->num_utilisateur;
//echo $_SESSION['id'];
//echo $row->grade_utilisateur;
  $_SESSION['grade']= $row->grade_utilisateur;
  $_SESSION['n']= $row->nom_utilisateur;
    $_SESSION['pre']= $row->pre_utilisateur;
    $_SESSION['email']= $row->email_utilisateur;
     $_SESSION['tel']= $row->tel_utilisateur;
    $_SESSION['adr']= $row->adr_utilisateur;
     $_SESSION['login']= $row->login_utilisateur;
     $_SESSION['mot']= $row->mot_de_passe_utilisateur;
     //echo $_SESSION['n'];
  //echo $_SESSION['grade'];
  if ($_SESSION['grade']=="administrateur")
  {
       
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
   // echo $_SESSION['grade'];
    $this->employe->modifieretat($_SESSION['id']);
  	 $data['list']=$this->partenaire->count_partenaire();
  	 $data['nb2']=$this->service_md->count_service();
  	 $data['nb3']=$this->type->count_type();
  	 $data['nb4']=$this->employe->count_commercial();
  	 $data['nb5']=$this->employe->count_logistique();
  	  $data['nb6']=$this->categorie->count_cat();
      $data['nb7']=$this->patient->count_patient();
       $data['nb8']=$this->contrat->count_contrat();
       $data['nb9']=$this->demandededevis->count_demande();
       $data['nb10']=$this->employe->count_admin();
        $data['offre']=$this->offredeprix->count_offre();
       $data['n']=$this->employe->select_user();
       //$data['msg1']=$this->message->count_msg($_SESSION['id']);
  	//$nb2=$data['nb1'];
//$x=1;
       $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
  	    $this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('acceuil',$data);
		$this->load->view('footer3');
    
		


  }
  elseif ($_SESSION['grade']==" Responsable commercial") {
     $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->employe->modifieretat($_SESSION['id']);
     $data['list']=$this->partenaire->count_partenaire();
     $data['nb2']=$this->service_md->count_service();
     $data['nb3']=$this->type->count_type();
     $data['nb4']=$this->employe->count_commercial();
     $data['nb5']=$this->employe->count_logistique();
      $data['nb6']=$this->categorie->count_cat();
      $data['nb7']=$this->patient->count_patient();
       $data['nb8']=$this->contrat->count_contrat();
        $data['nb9']=$this->demandededevis->count_demande();
        $data['nb10']=$this->employe->count_admin();
         $data['n']=$this->employe->select_user();
         $data['offre']=$this->offredeprix->count_offre();
         //$data['msg1']=$this->message->count_msg($_SESSION['id']);
         $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);

      
      $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('acceuil',$data);
    $this->load->view('footer3');

    # code...
  }
  elseif ($_SESSION['grade']=="partenaire") {
     $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->employe->modifieretat($_SESSION['id']);
     $data['list']=$this->partenaire->count_partenaire();
     $data['nb2']=$this->service_md->count_service();
     $data['nb3']=$this->type->count_type();
     $data['nb4']=$this->employe->count_commercial();
     $data['nb5']=$this->employe->count_logistique();
      $data['nb6']=$this->categorie->count_cat();
      $data['nb7']=$this->patient->count_patient();
       $data['nb8']=$this->contrat->count_contrat();
        $data['nb9']=$this->demandededevis->count_demande();
        $data['nb10']=$this->employe->count_admin();
         $data['n']=$this->employe->select_user();
         $data['offre']=$this->offredeprix->count_offre();
         //$data['msg1']=$this->message->count_msg($_SESSION['id']);
         $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);

      
      $this->load->view('header3',$data);
    $this->load->view('sidebarpartenaire',$data);
    $this->load->view('acceuil',$data);
    $this->load->view('footer3');
  
}
elseif($_SESSION['grade']==" Responsable logistique")
{
     //$data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
   
     $this->employe->modifieretat($_SESSION['id']);
     $data['list']=$this->partenaire->count_partenaire();
     $data['nb2']=$this->service_md->count_service();
     $data['nb3']=$this->type->count_type();
     $data['nb4']=$this->employe->count_commercial();
     $data['nb5']=$this->employe->count_logistique();
      $data['nb6']=$this->categorie->count_cat();
      $data['nb7']=$this->patient->count_patient();
       $data['nb8']=$this->contrat->count_contrat();
        $data['nb9']=$this->demandededevis->count_demande();
        $data['nb10']=$this->employe->count_admin();
         $data['n']=$this->employe->select_user();
         $data['offre']=$this->offredeprix->count_offre();
         //$data['msg1']=$this->message->count_msg($_SESSION['id']);
         $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);

      
      $this->load->view('header3',$data);
    $this->load->view('sidebarlogistique',$data);
    $this->load->view('acceuil',$data);
    $this->load->view('footer3');


  

}
}
}
}                  

              





 
 function tableau(){
    session_start() ;
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $data['list']=$this->partenaire->count_partenaire();
     $data['nb2']=$this->service_md->count_service();
     $data['nb3']=$this->type->count_type();
     $data['nb4']=$this->employe->count_commercial();
     $data['nb7']=$this->patient->count_patient();
     $data['nb5']=$this->employe->count_logistique();
      $data['nb6']=$this->categorie->count_cat();
      $data['nb8']=$this->contrat->count_contrat();
      $data['nb9']=$this->demandededevis->count_demande();
      $data['nb10']=$this->employe->count_admin();
       $data['n']=$this->employe->select_user();
       $data['msg']=$this->message->count_msg($_SESSION['id']);
       $data['a']=$this->message->count_msg2($_SESSION['id']);
       $data['offre']=$this->offredeprix->count_offre();



     $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('acceuil',$data);
    $this->load->view('footer3');
  }
  function tableau1(){
    session_start() ;
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $data['list']=$this->partenaire->count_partenaire();
     $data['nb2']=$this->service_md->count_service();
     $data['nb3']=$this->type->count_type();
     $data['nb4']=$this->employe->count_commercial();
     $data['nb7']=$this->patient->count_patient();
     $data['nb5']=$this->employe->count_logistique();
      $data['nb6']=$this->categorie->count_cat();
      $data['nb8']=$this->contrat->count_contrat();
       $data['nb9']=$this->demandededevis->count_demande();
        $data['nb10']=$this->employe->count_admin();
         $data['n']=$this->employe->select_user();
         $data['msg']=$this->message->count_msg($_SESSION['id']);
         $data['a']=$this->message->count_msg2($_SESSION['id']);
         $data['offre']=$this->offredeprix->count_offre();

     $this->load->view('header3',$data);
    $this->load->view('sidebar3',$data);
    $this->load->view('acceuil',$data);
    $this->load->view('footer3');
  }
  function tableau2(){
    session_start() ;
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $data['list']=$this->partenaire->count_partenaire();
     $data['nb2']=$this->service_md->count_service();
     $data['nb3']=$this->type->count_type();
     $data['nb4']=$this->employe->count_commercial();
     $data['nb7']=$this->patient->count_patient();
     $data['nb5']=$this->employe->count_logistique();
      $data['nb6']=$this->categorie->count_cat();
      $data['nb8']=$this->contrat->count_contrat();
       $data['nb9']=$this->demandededevis->count_demande();
        $data['nb10']=$this->employe->count_admin();
         $data['n']=$this->employe->select_user();
         $data['msg']=$this->message->count_msg($_SESSION['id']);
         $data['a']=$this->message->count_msg2($_SESSION['id']);
         $data['offre']=$this->offredeprix->count_offre();

     $this->load->view('header3',$data);
    $this->load->view('sidebarpartenaire',$data);
    $this->load->view('acceuil',$data);
    $this->load->view('footer3');
  }
  function tableau3(){
    session_start() ;
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $data['list']=$this->partenaire->count_partenaire();
     $data['nb2']=$this->service_md->count_service();
     $data['nb3']=$this->type->count_type();
     $data['nb4']=$this->employe->count_commercial();
     $data['nb7']=$this->patient->count_patient();
     $data['nb5']=$this->employe->count_logistique();
      $data['nb6']=$this->categorie->count_cat();
      $data['nb8']=$this->contrat->count_contrat();
       $data['nb9']=$this->demandededevis->count_demande();
        $data['nb10']=$this->employe->count_admin();
         $data['n']=$this->employe->select_user();
         $data['msg']=$this->message->count_msg($_SESSION['id']);
         $data['a']=$this->message->count_msg2($_SESSION['id']);
         $data['offre']=$this->offredeprix->count_offre();

     $this->load->view('header3',$data);
    $this->load->view('sidebarlogistique',$data);
    $this->load->view('acceuil',$data);
    $this->load->view('footer3');
  }








}
?>






