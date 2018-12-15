<?php
class modifierligne extends CI_Controller {

function __construct() 
{ parent::__construct();
$this->load->model('demandededevis', 'demandededevis', TRUE);
$this->load->model('ligneservice', 'ligneservice', TRUE);
$this->load->model('message', 'message', TRUE);
}
  function index(){

  	session_start() ;
  	$id = $this->uri->segment(3);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
  	$data['list']=$this->demandededevis->getdemandededevis($id);
  	$data['n']=$this->ligneservice->selectligneservicemedical($id);
    $data['m']=$this->ligneservice->selectligneservicehotellerie($id);
    $data['a1']=$this->ligneservice->selectligneservicetransport($id);
     $data['b']=$this->ligneservice->selectligneservice($id);
  	    $this->load->view('header3',$data);
		$this->load->view('sidebarcommercial',$data);
		$this->load->view('ligneservice',$data);
		$this->load->view('footer3');
  }

function supprimer_ligne_service() 
{
  session_start();
  $id=$this->input->post('num');
  try

  {$this->ligneservice->supprimer_ligne_service($id);
    echo '<script>alert("Ligne de service supprimer avec succès");</script>';
  $id = $this->uri->segment(3);
  $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
 
    $data['list']=$this->demandededevis->getdemandededevis($id);
    $data['n']=$this->ligneservice->selectligneservicemedical($id);
    $data['m']=$this->ligneservice->selectligneservicehotellerie($id);
    $data['a1']=$this->ligneservice->selectligneservicetransport($id);
     $data['b']=$this->ligneservice->selectligneservice($id);
     $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);

    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('ligneservice',$data);
    $this->load->view('footer3');}
  catch(Exception $e)
 {
   var_dump($e->getMessage());
    echo '<script> alert("oups , erreur!");</script>'; 
     $id = $this->uri->segment(3);
     $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
 
    $data['list']=$this->demandededevis->getdemandededevis($id);
    $data['n']=$this->ligneservice->selectligneservicemedical($id);
    $data['m']=$this->ligneservice->selectligneservicehotellerie($id);
    $data['a1']=$this->ligneservice->selectligneservicetransport($id);
     $data['b']=$this->ligneservice->selectligneservice($id);
     $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);

        $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial');
    $this->load->view('ligneservice',$data);
    $this->load->view('footer3');


 }
 function select_ligne_service_transport($id) 
{
  session_start() ;
  $id = $this->uri->segment(3);
  

  $data['list']=$this->ligneservice->select_ligne_service($id);
  $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('modifierlignetransport',$data);
    $this->load->view('footer3');

}
function select_ligne_service_hotel($id) 
{
  session_start() ;
  $id = $this->uri->segment(3);
  

  $data['list']=$this->ligneservice->select_ligne_service($id);
  $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('modifierlignehotel',$data);
    $this->load->view('footer3');

}
function select_ligne_service_medical($id) 
{
  session_start() ;
  $id = $this->uri->segment(3);
  

  $data['list']=$this->ligneservice->select_ligne_service($id);
  $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('patient',$data);
    $this->load->view('footer3');

}


function modifierlignemedical() 
  {
    session_start() ;
    $id=$this->input->post('num');
  $data = array( 'nb_jour' => $this->input->post('quantiter'),
'date_intervention' => $this->input->post('date'),
'observation' => $this->input->post('observation'));
  try
  {
  $this->ligneservice->modifier_ligne_service($id,$data);
  echo '<script>alert("Ligne de service modifier avec succès");</script>';}

 
 catch(Exception $e)
 
  { var_dump($e->getMessage());
    echo '<script> alert("oups , erreur!");</script>'; }

  
   $id = $this->uri->segment(3);
   $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['list']=$this->demandededevis->getdemandededevis($id);
    $data['n']=$this->ligneservice->selectligneservicemedical($id);
    $data['m']=$this->ligneservice->selectligneservicehotellerie($id);
    $data['a1']=$this->ligneservice->selectligneservicetransport($id);
     $data['b']=$this->ligneservice->selectligneservice($id);
     $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
        $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('ligneservice',$data);
    $this->load->view('footer3');

}



}

}
 






?>