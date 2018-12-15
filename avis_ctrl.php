<?php

class avis_ctrl extends CI_Controller {

function __construct() 
{ parent::__construct();

$this->load->model('message', 'message', TRUE);
$this->load->model('avis', 'avis', TRUE);
}
  function index(){
    session_start() ;
  	$data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['b']=$this->avis->selectpartenaire();
    $data['c']=$this->avis->selectpatient();
    $data['d']=$this->avis->selectavis();


  	$this->load->view('header3',$data);
		$this->load->view('sidebarcommercial',$data);
		$this->load->view('avis',$data);
		$this->load->view('footer3');
  }
  function consulter(){
    session_start() ;
    $id = $this->uri->segment(3);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['b']=$this->avis->selectpartenaire();
    $data['c']=$this->avis->selectpatient();
    $data['list']=$this->avis->getavis($id);


    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('consulteravis',$data);
    $this->load->view('footer3');
  }

   function ajout() { 
  session_start() ;
$this->load->library('form_validation');
$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

 $this->form_validation->set_rules('desc', 'desc', 'required|min_length[2]|max_length[255]');

if ($this->form_validation->run() == FALSE)
 { 
    $data['d']=$this->avis->selectavis();
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
   
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('avis',$data);
    $this->load->view('footer3');  }
  else {
     $m=$this->avis->now();
     foreach($m as $row)
{
  $n= $row->now;
  
   
 
 $data = array( 'num_utilisateur' => $this->input->post('partenaire'),
'num_pat' => $this->input->post('patient'),
'note' => $this->input->post('note'),
'desc_avis' => $this->input->post('desc'),
'date_avis' => $n); 
 try
 {
  $this->avis->ajouteravis($data);
  echo '<script>alert("Avis ajouté avec succès");</script>';}

 
 catch(Exception $e)
 
  { var_dump($e->getMessage());
    echo '<script> alert("oups , erreur!");</script>'; }
 
   //Loading View
    $data['d']=$this->avis->selectavis();
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
   
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('avis',$data);
    $this->load->view('footer3');
      
       
  }
}

}
}
?>