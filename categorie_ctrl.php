  <?php

class categorie_ctrl extends CI_Controller {

function __construct() 
{ parent::__construct();
$this->load->model('categorie', 'categorie', TRUE);
$this->load->model('message', 'message', TRUE);
}
  function index(){
    session_start() ;
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$data['list']=$this->categorie->selectcategorie();
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);

  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('categorie',$data);
		$this->load->view('footer3');
  }



 function ajout() { 
  session_start() ;
$this->load->library('form_validation');
$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

 $this->form_validation->set_rules('categorie', 'categorie', 'required|min_length[4]|max_length[50]');

if ($this->form_validation->run() == FALSE)
 {    $data['list']=$this->categorie->selectcategorie();
$data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('categorie',$data);
		$this->load->view('footer3');  }
  else {
 
 $data = array( 'cat' => $this->input->post('categorie')); 
 try
 {
  $this->categorie->add_categorie($data);
  echo '<script>alert("Categorie ajouter avec succès");</script>';}

 
 catch(Exception $e)
 
 	{ var_dump($e->getMessage());
 		echo '<script> alert("oups , erreur!");</script>'; }
 
   //Loading View
       $data['list']=$this->categorie->selectcategorie();
       $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebar3',$data);
		$this->load->view('categorie',$data);
		$this->load->view('footer3');
	}

}

function modifier_categorie() 
  {
    session_start() ;
    $id=$this->input->post('num');
  $data = array( 'cat' => $this->input->post('cat'));
  try
  {
  $this->categorie->modifier_categorie($id,$data);
  echo '<script>alert("Categorie modifier avec succès");</script>';}

 
 catch(Exception $e)
 
  { var_dump($e->getMessage());
    echo '<script> alert("oups , erreur!");</script>'; }

  $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $data['list']=$this->categorie->selectcategorie();
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebar3',$data);
    $this->load->view('categorie',$data);
    $this->load->view('footer3');

}
function select_cat($id) 
{
  session_start() ;
  $id = $this->uri->segment(3);
  
$data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  $data['list']=$this->categorie->select_cat($id);
  $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    
    $this->load->view('header3',$data);
    $this->load->view('sidebar3',$data);
    $this->load->view('modifiercategorie',$data);
    $this->load->view('footer3');

}
function desactiver_cat() 
{
  session_start() ;
  $id=$this->input->post('num');
  try
{ 
  $this->categorie->desactiver_cat($id);
  echo '<script>alert("Categorie desactiver avec succès");</script>';

    $data['list']=$this->categorie->selectcategorie();
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebar3',$data);
    $this->load->view('categorie',$data);
    $this->load->view('footer3');}
catch(Exception $e)
{ var_dump($e->getMessage());
    echo '<script> alert("oups , erreur!");</script>'; }

  $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $data['list']=$this->categorie->selectcategorie();
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebar3',$data);
    $this->load->view('categorie',$data);
    $this->load->view('footer3');
   
}



  

}




?>
