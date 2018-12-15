<?php

class contrat_ctrl extends CI_Controller {

function __construct() 
{ parent::__construct();

$this->load->model('message', 'message', TRUE);
$this->load->model('contrat', 'contrat', TRUE);
$this->load->model('ligneservice', 'ligneservice', TRUE);
$this->load->model('demandededevis', 'demandededevis', TRUE);
}
  function index(){
    session_start() ;
  	$data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
     $data['list']=$this->contrat->select_contrat();
   


  	$this->load->view('header3',$data);
		$this->load->view('sidebarcommercial',$data);
		$this->load->view('contrat',$data);
		$this->load->view('footer3');
  }
  function annuler(){
    session_start() ;
    $id = $this->uri->segment(3);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    
    $this->contrat->annuler_contrat($id);
     echo '<script>alert("contrat annulé avec succès");</script>';
    $data['list']=$this->contrat->select_contrat();

    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('contrat',$data);
    $this->load->view('footer3');
  }
  function fiche(){
    session_start() ;
    $id = $this->uri->segment(3);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    
    $b= $this->contrat->calculer_montant_ht($id);
     foreach($b as $ht)
{
    $htt=$ht->nb;
    
    
}



    
   
    
    
    


    $data['b']= $this->contrat->calculer_montant_ht($id);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('fichecontrat',$data);
    $this->load->view('footer3');
  }
function ajoutercontrat() {
  session_start(); 

 $data = array( 'datedeb_contrat' => $this->input->post('datedeb'),
'datefin_contrat' => $this->input->post('datefin'),
'date_sign_contrat' => $this->input->post('datesign'),
'code_demande_devis' => $this->input->post('num'),
'mt_ht_contrat' => $this->input->post('mt_ht'),
'mt_ttc_contrat' => $this->input->post('mt_ttc'),
'mode_paiement' => $this->input->post('mode'),

); 
 try
 {
  $m=$this->demandededevis->now();
    foreach($m as $row)
{
  $n= $row->now;
  

    $date=$this->input->post('datedeb');
    $datefin=$this->input->post('datefin');
    $datesign=$this->input->post('datesign');

    if ($n > $date )
    {
      echo '<script>alert("Veuillez verifier la date de dèbut de contrat");</script>';
      $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
     $data['list']=$this->contrat->select_contrat();
   


    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('contrat',$data);
    $this->load->view('footer3');
  }
elseif ($n>$datefin)
{
  echo '<script>alert("Veuillez verifier la date de fin de contrat");</script>';
      $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
     $data['list']=$this->contrat->select_contrat();
   


    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('contrat',$data);
    $this->load->view('footer3');
}

elseif ($n >$datesign)
{
  echo '<script>alert("Veuillez verifier la date de signature de contrat");</script>';
      $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
     $data['list']=$this->contrat->select_contrat();
   


    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('contrat',$data);
    $this->load->view('footer3');
}
else
{
  $this->contrat->ajouter_contrat($data);
  echo '<script>alert("Contrat ajoutè avec succès","Mise a jour","success");</script>';
$data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
     $data['list']=$this->contrat->select_contrat();
   


    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('contrat',$data);
    $this->load->view('footer3');

 } }}
 
catch(Exception $e)
 
  { var_dump($e->getMessage());
    echo '<script> alert("oups , erreur!");</script>'; 
 
   //Loading View
       $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
     $data['list']=$this->contrat->select_contrat();
   


    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('contrat',$data);
    $this->load->view('footer3');
  }
}
function affichercontrat(){
    session_start() ;
    $id = $this->uri->segment(3);
   // $code = $this->uri->segment(4);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
     $data['list']=$this->contrat->get_contrat($id);
     $code=$this->contrat->get_code($id);
      foreach($code as $ln)
{
  $c= $ln->nb;
}
   
    
    


     $data['n']=$this->ligneservice->selectligneservicemedical($c);
    $data['m']=$this->ligneservice->selectligneservicehotellerie($c);
    $data['a1']=$this->ligneservice->selectligneservicetransport($c);
     $data['b']=$this->ligneservice->selectligneservice($c);
   


    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('imprimercontrat',$data);
    $this->load->view('footer3');
  }

   

}
?>