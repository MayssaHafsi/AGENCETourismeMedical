<?php

class profil_ctrl extends CI_Controller {

function __construct() 
{ parent::__construct();
$this->load->model('employe', 'employe', TRUE);
$this->load->model('message', 'message', TRUE);
}
  function index(){

  	session_start() ;
  	$data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
  	    $this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('profil1');
		$this->load->view('footer3');
  }
function modifier_profil() 
  {
    session_start();
    try {

    $id=$this->input->post('num');
    

  $data = array( 'nom_utilisateur' => $this->input->post('nom'), 'pre_utilisateur' => $this->input->post('prenom'), 'tel_utilisateur' => $this->input->post('tel'),'login_utilisateur' => $this->input->post('login'),'mot_de_passe_utilisateur' => $this->input->post('mot'));
  
  $this->employe->modifier_profil($id,$data);
  echo '<script>alert(" utilisateur modifier avec succès");</script>';
}

 
 catch(Exception $e)
 
  { var_dump($e->getMessage());
    echo '<script> alert("oups , erreur!");</script>'; }

  
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
        $this->load->view('header3',$data);
    $this->load->view('sidebar3',$data);
    $this->load->view('profil1');
    $this->load->view('footer3');

}


 

}






?>