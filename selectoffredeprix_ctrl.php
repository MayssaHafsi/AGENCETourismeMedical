<?php

class selectoffredeprix_ctrl extends CI_Controller {

function __construct() 
{ parent::__construct();

$this->load->model('message', 'message', TRUE);
$this->load->model('avis', 'avis', TRUE);
$this->load->model('offredeprix', 'offredeprix', TRUE);
$this->load->model('demandededevis', 'demandededevis', TRUE);
$this->load->model('ligneservice', 'ligneservice', TRUE);
}
  function index(){
    session_start() ;
  	$data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $data['list']=$this->demandededevis->selectdemande();
     $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
        $this->load->view('header3',$data);
    $this->load->view('sidebarlogistique',$data);
    $this->load->view('devisoffre',$data);
    
    $this->load->view('footer3');
  }
  function prete(){
    session_start() ;
    $id = $this->uri->segment(3);

    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $data['list']=$this->demandededevis->selectdemande();
     $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $this->demandededevis->modifier_etat_demande_de_devis($id);
    echo '<script>alert("Demande de devis prete","Acceptation","success");</script>';
    $this->load->view('header3',$data);
    $this->load->view('sidebarlogistique',$data);
    $this->load->view('devisoffre',$data);
    $this->load->view('footer3');
  }
  function ligneservice(){
    session_start() ;
    $id = $this->uri->segment(3);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $data['list']=$this->demandededevis->getdemandededevis($id);
    $data['n']=$this->ligneservice->selectligneservicemedical($id);
    $data['m']=$this->ligneservice->selectligneservicehotellerie($id);
    $data['a1']=$this->ligneservice->selectligneservicetransport($id);
     $data['b']=$this->ligneservice->selectligneservice($id);
     $data['msg']=$this->message->count_msg($_SESSION['id']);
     $data['a']=$this->message->count_msg2($_SESSION['id']);
     
    $this->load->view('header3',$data);
    $this->load->view('sidebarlogistique',$data);
    $this->load->view('ligneserviceoffre',$data);
    $this->load->view('footer3');
  }
  function offreprix(){
    session_start() ;
    $id = $this->uri->segment(3);
    $data['list']=$this->offredeprix->selectoffre($id);
    $data['a']=$this->message->count_msg2($_SESSION['id']);

     $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
     $data['msg']=$this->message->count_msg($_SESSION['id']);
        $this->load->view('header3',$data);
    $this->load->view('sidebarlogistique',$data);
    $this->load->view('selectionneroffre',$data);
    $this->load->view('footer3');
  }
  function accepterprix(){
    session_start() ;
    $id = $this->uri->segment(3); 
    $num = $this->uri->segment(4);

    $prix = $this->uri->segment(5);
   


    $this->offredeprix->accepteroffre($id,$num);
    $this->ligneservice->modifierprix($id,$prix);
    echo '<script>alert("Offre acceptée avec succés","Acceptation","success");</script>';
     $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
     $data['list']=$this->offredeprix->selectoffre($id);
     $data['msg']=$this->message->count_msg($_SESSION['id']);
     $data['a']=$this->message->count_msg2($_SESSION['id']);

        $this->load->view('header3',$data);
    $this->load->view('sidebarlogistique',$data);
    $this->load->view('selectionneroffre',$data);
    $this->load->view('footer3');
  }
  function avispartenaire(){
    session_start() ;
    $id = $this->uri->segment(3); 
  
   $data['list']=$this->avis->avispartenaire($id);
   $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
     $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarlogistique',$data);
    $this->load->view('avispartenaire',$data);
    $this->load->view('footer3');
  }
  function Min(){
    session_start() ;
    $id = $this->uri->segment(3); 
  
   $data=$this->offredeprix->selectmin($id);
 
   foreach($data as $row)
{
  $a=$row->min;
}
  $data['list']=$this->offredeprix->utilisateur($a , $id);

   $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
     $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarlogistique',$data);
    $this->load->view('selectionneroffre',$data);
    $this->load->view('footer3');
  }
  function Max(){
    session_start() ;
    $id = $this->uri->segment(3); 
  $data=$this->offredeprix->selectmax($id);
   
   foreach($data as $row)
{
  $a=$row->max;
  $data['list']=$this->offredeprix->utilisateur($a , $id);
}
  
   $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
     $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarlogistique',$data);
    $this->load->view('selectionneroffre',$data);
    $this->load->view('footer3');
  }
  
}
?>