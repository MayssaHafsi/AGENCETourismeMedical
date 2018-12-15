<?php

class print_ctrl extends CI_Controller {

function __construct() 
{ parent::__construct();
	$this->load->model('demandededevis', 'demandededevis', TRUE);
$this->load->model('ligneservice', 'ligneservice', TRUE);

}
  function index(){
    session_start() ;

  	$id = $this->uri->segment(3);
  	$data['list']=$this->demandededevis->getdemandededevis($id);
  	$data['n']=$this->ligneservice->selectligneservice($id);
    
  	    
		$this->load->view('headerprint');
		$this->load->view('ligneservice');
		$this->load->view('footer3');

		
  }
  function print(){
    session_start() ;
   
  	$id = $this->uri->segment(3);
  	$data['list']=$this->demandededevis->getdemandededevis($id);
  	$data['n']=$this->ligneservice->selectligneservicemedical($id);
    $data['m']=$this->ligneservice->selectligneservicehotellerie($id);
    $data['a']=$this->ligneservice->selectligneservicetransport($id);
		$this->load->view('headerprint');
		$this->load->view('sidebarcommercial');

		$this->load->view('print',$data);
		

		
  }

}
  ?>
3