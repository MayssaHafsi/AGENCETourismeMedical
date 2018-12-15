<?php

class deconnecter_ctrl extends CI_Controller {

function __construct() 
{ parent::__construct();

$this->load->model('employe', '', TRUE);
}


  
  function index() 
{
	
session_start();           



	$_SESSION['id']= NULL;
//echo $_SESSION['id'];
//echo $row->grade_utilisateur;
  $_SESSION['grade']= NULL;
  $_SESSION['n']= NULL;
    $_SESSION['pre']= NULL;
    $_SESSION['email']= NULL;
     $_SESSION['tel']= NULL;
    $_SESSION['adr']= NULL;
     $_SESSION['login']= NULL;
     $_SESSION['mot']= NULL;
     
    $this->employe->deconnecter($_SESSION['id']);
    
    session_destroy();
     $this->load->view('login');
  	
       
    
		


  }
  
}
?>






