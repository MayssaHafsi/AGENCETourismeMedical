<?php

class service_ctrl extends CI_Controller {

function __construct() 
{ parent::__construct();
$this->load->model('service_md', 'service_md', TRUE);
$this->load->model('categorie', 'categorie', TRUE);
$this->load->model('message', 'message', TRUE);

}
  function index(){
    session_start() ;
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
  	$data['list']=$this->service_md->selectservice();
  	$data['cmb']=$this->categorie->selectcategorie();
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('service',$data);
		$this->load->view('footer3');
  }



 function ajout() { 
  session_start() ;

 
 $data = array( 'desg_service' => $this->input->post('desg'),
'desc_service' => $this->input->post('desc'),
'cat_service' => $this->input->post('categorie')); 
 try
 {
  $this->service_md->add_service($data);
  echo '<script>alert("Service ajouter avec succès");</script>';}

 
 catch(Exception $e)
 
  { var_dump($e->getMessage());
    echo '<script> alert("oups , erreur!");</script>'; }

 
   //Loading View
       $data['list']=$this->service_md->selectservice();
       $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('service',$data);
		$this->load->view('footer3');
	}


 function supprimer_service() 
{
  session_start() ;
  $id = $this->uri->segment(3);
  try

  {$this->service_md->supprimer_service($id);
    echo '<script>alert("Service supprimer avec succès");</script>';
  $data['list']=$this->service_md->selectservice();
    $data['cmb']=$this->categorie->selectcategorie();
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebar3',$data);
    $this->load->view('service',$data);
    $this->load->view('footer3');}
  catch(Exception $e)
 {
   var_dump($e->getMessage());
    echo '<script> alert("oups , erreur!");</script>'; 


 }

  
    $data['list']=$this->service_md->selectservice();
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebar3',$data);
    $this->load->view('service',$data);
    $this->load->view('footer3');

}
function modifier_service() 
  {
    session_start() ;
    $id=$this->input->post('num');
  $data = array( 'desg_service' => $this->input->post('desg'), 'desc_service' => $this->input->post('desc'));
  try
  {
  $this->service_md->modifier_service($id,$data);
  echo '<script>alert("service modifier avec succès");</script>';}

 
 catch(Exception $e)
 
  { var_dump($e->getMessage());
    echo '<script> alert("oups , erreur!");</script>'; }

  
    $data['list']=$this->service_md->selectservice();
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebar3',$data);
    $this->load->view('service',$data);
    $this->load->view('footer3');

}
function select_service() 
{
   session_start() ;
  $id = $this->uri->segment(3);
  

  $data['list']=$this->service_md->select_service_md($id);
  $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    
    $this->load->view('header3',$data);
    $this->load->view('sidebar3',$data);
    $this->load->view('modifierservice',$data);
    $this->load->view('footer3');

}
function desactiver_service() 
{
  session_start() ;
  $id=$this->input->post('num');
  try
{ 
  $this->service_md->desactiver_service($id);
  echo '<script>alert("Service desactiver avec succès");</script>';


    $data['list']=$this->service_md->selectservice();
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebar3',$data);
    $this->load->view('service',$data);
    $this->load->view('footer3');}
catch(Exception $e)
{ var_dump($e->getMessage());
    echo '<script> alert("oups , erreur!");</script>'; }

  
    $data['list']=$this->service_md->selectservice();
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebar3',$data);
    $this->load->view('service',$data);
    $this->load->view('footer3');
   
}

}




?>
