<?php
class ligneservice_ctrl extends CI_Controller {

function __construct() 
{ parent::__construct();
$this->load->model('demandededevis', 'demandededevis', TRUE);
$this->load->model('ligneservice', 'ligneservice', TRUE);
$this->load->model('message', 'message', TRUE);
}
  function index(){

  	session_start() ;
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

function supprimer_ligne_service() 
{
  session_start();
  $id=$this->input->post('num');

  try

  {$this->ligneservice->supprimer_ligne_service($id);
    echo '<script>alert("Ligne de service supprimer avec succès");</script>';
 
 $data= $this->ligneservice->get_code_demande($id);

if ($data==null)
{
  echo $data;
}
else
{
  foreach($data as $row)

{
  $c= $row->code_demande_devis;



    $data['list']=$this->demandededevis->getdemandededevis($c);
    $data['n']=$this->ligneservice->selectligneservicemedical($c);
    $data['m']=$this->ligneservice->selectligneservicehotellerie($c);
    $data['a1']=$this->ligneservice->selectligneservicetransport($c);
     $data['b']=$this->ligneservice->selectligneservice($c);
     $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('ligneservice',$data);
    $this->load->view('footer3');}}}

  catch(Exception $e)
 {
   var_dump($e->getMessage());
    echo '<script> alert("oups , erreur!");</script>'; }
     $data= $this->ligneservice->get_code_demande($id);

if ($data==null)
{
  echo $data;
}
else
{
  foreach($data as $row)

{
  $c= $row->code_demande_devis;



    $data['list']=$this->demandededevis->getdemandededevis($c);
    $data['n']=$this->ligneservice->selectligneservicemedical($c);
    $data['m']=$this->ligneservice->selectligneservicehotellerie($c);
    $data['a1']=$this->ligneservice->selectligneservicetransport($c);
     $data['b']=$this->ligneservice->selectligneservice($c);
     $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('ligneservice',$data);
    $this->load->view('footer3');}}

  }


 
 function select_ligne_service_transport($id) 
{
  session_start() ;
  $id = $this->uri->segment(3);
  

  $data['list']=$this->ligneservice->select_ligne_service_transport($id);
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
  $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  

  $data['list']=$this->ligneservice->select_ligne_service_hotellerie($id);
    
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('modifierlignehotel',$data);
    $this->load->view('footer3');

}
function select_ligne_service_medical($id) 
{
  session_start() ;
  $id = $this->uri->segment(3);
  $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  

  $data['list']=$this->ligneservice->select_ligne_service_medical($id);
    
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('modifierlignemedical',$data);
    $this->load->view('footer3');

}


function modifier_ligne_medical() 
  {
    session_start() ;
    $id=$this->input->post('num');
  $data = array( 'nb_jour' => $this->input->post('quantiter'),
'date_intervention' => $this->input->post('date'),
'observation' => $this->input->post('observation'));
  try
  {
  $this->ligneservice->modifier_ligne_service($id,$data);
  echo '<script>alert("Ligne de service modifier avec succès");</script>';
  

$data= $this->ligneservice->get_code_demande($id);

if ($data==null)
{
  echo $data;
}
else
{
  foreach($data as $row)

{
  $c= $row->code_demande_devis;



    $data['list']=$this->demandededevis->getdemandededevis($c);
    $data['n']=$this->ligneservice->selectligneservicemedical($c);
    $data['m']=$this->ligneservice->selectligneservicehotellerie($c);
    $data['a1']=$this->ligneservice->selectligneservicetransport($c);
     $data['b']=$this->ligneservice->selectligneservice($c);
     $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('ligneservice',$data);
    $this->load->view('footer3');}}}


 catch(Exception $e)
 
  { var_dump($e->getMessage());
    echo '<script> alert("oups , erreur!");</script>'; }

  
   // = $this->uri->segment(3);
   

}
function modifier_ligne_hotel() 
  {
    session_start() ;
    $id=$this->input->post('num');
  $data = array( 'nb_jour' => $this->input->post('quantiter'),
'nb_adulte' => $this->input->post('nb_adulte'),
'nb_enfant' => $this->input->post('nb_enfant'),
'classe_hotel' => $this->input->post('classe'),
'nb_chambre' => $this->input->post('chambre'));
  try
  {
  $this->ligneservice->modifier_ligne_service($id,$data);
  echo '<script>alert("Ligne de service modifier avec succès");</script>';
  

$data= $this->ligneservice->get_code_demande($id);

if ($data==null)
{
  echo $data;
}
else
{
  foreach($data as $row)

{
  $c= $row->code_demande_devis;



    $data['list']=$this->demandededevis->getdemandededevis($c);
    $data['n']=$this->ligneservice->selectligneservicemedical($c);
    $data['m']=$this->ligneservice->selectligneservicehotellerie($c);
    $data['a1']=$this->ligneservice->selectligneservicetransport($c);
     $data['b']=$this->ligneservice->selectligneservice($c);
     $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('ligneservice',$data);
    $this->load->view('footer3');}}}


 catch(Exception $e)
 
  { var_dump($e->getMessage());
    echo '<script> alert("oups , erreur!");</script>'; }

  
   // = $this->uri->segment(3);
   

}
function modifier_ligne_transport() 
  {
    session_start() ;
    $id=$this->input->post('num');
  $data = array( 'billet_transport' => $this->input->post('billet'),
'classe_transport' => $this->input->post('classe'),
'nb_passagers' => $this->input->post('Passagers'),

'observation' => $this->input->post('observation'));
  try
  {
  $this->ligneservice->modifier_ligne_service($id,$data);
  echo '<script>alert("Ligne de service modifier avec succès");</script>';
  

$data= $this->ligneservice->get_code_demande($id);

if ($data==null)
{
  echo $data;
}
else
{
  foreach($data as $row)

{
  $c= $row->code_demande_devis;



    $data['list']=$this->demandededevis->getdemandededevis($c);
    $data['n']=$this->ligneservice->selectligneservicemedical($c);
    $data['m']=$this->ligneservice->selectligneservicehotellerie($c);
    $data['a1']=$this->ligneservice->selectligneservicetransport($c);
     $data['b']=$this->ligneservice->selectligneservice($c);
     $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('ligneservice',$data);
    $this->load->view('footer3');}}}


 catch(Exception $e)
 
  { var_dump($e->getMessage());
    echo '<script> alert("oups , erreur!");</script>'; }

  
   // = $this->uri->segment(3);
   

}





function annuler() 
  {
    session_start() ;
   $id = $this->uri->segment(3);
 

$data= $this->ligneservice->get_code_demande($id);

if ($data==null)
{
  //echo $data;
}
else
{
  foreach($data as $row)

{
  $c= $row->code_demande_devis;



    $data['list']=$this->demandededevis->getdemandededevis($c);
    $data['n']=$this->ligneservice->selectligneservicemedical($c);
    $data['m']=$this->ligneservice->selectligneservicehotellerie($c);
    $data['a1']=$this->ligneservice->selectligneservicetransport($c);
     $data['b']=$this->ligneservice->selectligneservice($c);
     $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('ligneservice',$data);
    $this->load->view('footer3');}}

} 
 
  
   // = $this->uri->segment(3);
   


 





}
?>