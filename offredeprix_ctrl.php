<?php

class offredeprix_ctrl extends CI_Controller {

function __construct() 
{ parent::__construct();
$this->load->model('employe', 'employe', TRUE);
$this->load->model('message', 'message', TRUE);
$this->load->model('offredeprix', 'offredeprix', TRUE);
$this->load->model('ligneservice', 'ligneservice', TRUE);
}
  function index(){

  	session_start() ;
  	 $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['type']=$this->offredeprix->selecttypepartenaire($_SESSION['id']);
     $data['list']=$this->offredeprix->selectoffredeprix($_SESSION['id']);
     $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);

  	    $this->load->view('header3',$data);
		$this->load->view('sidebarpartenaire',$data);
		$this->load->view('offredeprix',$data);
		$this->load->view('footer3');
  }
  function proposer_offre_de_prix(){

    
    session_start();
    try {

    $id=$this->input->post('id_ligne_service');
    
    $num=$_SESSION['id'];
    $prix=$this->input->post('prix');

  
  $this->offredeprix->proposer_offre_de_prix($id,$prix,$num);
  $this->offredeprix->modifier_etat_offre_prix($id,$num);
  echo '<script>alert(" offre de prix proposée avec succès");</script>';
}

 
 catch(Exception $e)
 
  { var_dump($e->getMessage());
    echo '<script> alert("oups , erreur!");</script>'; }

  
   $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['type']=$this->offredeprix->selecttypepartenaire($_SESSION['id']);
     $data['list']=$this->offredeprix->selectoffredeprix($_SESSION['id']);
     $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);

        $this->load->view('header3',$data);
    $this->load->view('sidebarpartenaire',$data);
    $this->load->view('offredeprix',$data);
    $this->load->view('footer3');
}
  function getlignehotellerie(){

    session_start() ;
    $id = $this->uri->segment(3);
     $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['list']=$this->ligneservice->getlignedeservicehotel($id);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
        $this->load->view('header3',$data);
    $this->load->view('sidebarpartenaire',$data);
    $this->load->view('ajouteroffre',$data);
    $this->load->view('footer3');
  }
  function getlignemedical(){

    session_start() ;
    $id = $this->uri->segment(3);
     $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['list']=$this->ligneservice->getlignedeservice($id);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
        $this->load->view('header3',$data);
    $this->load->view('sidebarpartenaire',$data);
    $this->load->view('offremedical',$data);
    $this->load->view('footer3');
  }
  function getlignetransport(){

    session_start() ;
    $id = $this->uri->segment(3);
     $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['list']=$this->ligneservice->getlignedeservicetransport($id);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
        $this->load->view('header3',$data);
    $this->load->view('sidebarpartenaire',$data);
    $this->load->view('offretransport',$data);
    $this->load->view('footer3');
  }
  function getautreligne(){

    session_start() ;
    $id = $this->uri->segment(3);
     $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['list']=$this->ligneservice->getautreligne($id);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
        $this->load->view('header3',$data);
    $this->load->view('sidebarpartenaire',$data);
    $this->load->view('autreoffre',$data);
    $this->load->view('footer3');
  }




 



}




?>