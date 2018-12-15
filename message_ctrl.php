 <?php

class message_ctrl extends CI_Controller {

function __construct() 
{ parent::__construct();
$this->load->model('message', 'message', TRUE);
$this->load->model('employe', 'employe', TRUE);
$this->load->model('envoie', 'envoie', TRUE);
}
  function index(){
    
  	///$data['list']=$this->categorie->selectcategorie();
  	session_start() ;
  	$data['list']=$this->message->selectmessage($_SESSION['id']);
  	$data['msg']=$this->message->count_msg($_SESSION['id']);
  	$data['a']=$this->message->count_msg2($_SESSION['id']);
  	$data['list1']=$this->employe->select_employe1();
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	
  	    $this->load->view('header3',$data);
		$this->load->view('sidebarcommercial' , $data);
		$this->load->view('message',$data);
		$this->load->view('footer3');
  }
  function ajouter_message() {
  session_start(); 

 $data = array( 'message' => $this->input->post('message'),
'code_utilisateur' => $_SESSION['id']
); 
 try
 {
 	
  $this->message->ajoutermessage($data);
  $msg=$this->message->finalrecord();
  foreach($msg as $row)
{
  $id= $row->nb;}
$data=$this->input->post();
unset ($data['submit']);
foreach ($data['friend_id'] as $friend_id)
{
	$record=array('id_msg'=>$id, 
	'code_utilisateur' => $friend_id);
	 $this->envoie->ajoutermessage($record);

}
echo '<script> alert("Votre message a été envoyé avec succès");</script>'; 
$data['msg']=$this->message->count_msg($_SESSION['id']);
  	$data['a']=$this->message->count_msg2($_SESSION['id']);
  	$data['list1']=$this->employe->select_employe1();
  	$data['list']=$this->message->selectmessage($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	
  	    $this->load->view('header3',$data);
		$this->load->view('sidebarcommercial' ,$data);
		$this->load->view('message',$data);
		$this->load->view('footer3');


} 
catch(Exception $e)
 
 	{ var_dump($e->getMessage());
 		echo '<script> alert("oups , erreur!");</script>'; 
 		$data['msg']=$this->message->count_msg($_SESSION['id']);
  	$data['a']=$this->message->count_msg2($_SESSION['id']);
  	$data['list1']=$this->employe->select_employe1();
  	$data['list']=$this->message->selectmessage($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	    $this->load->view('header3',$data);
		$this->load->view('sidebarcommercial',$data);
		$this->load->view('message',$data);
		$this->load->view('footer3');
 
   
	}
}
function select1(){
    
  	///$data['list']=$this->categorie->selectcategorie();
  	session_start() ;
  	$data['list']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$data['msg']=$this->message->count_msg($_SESSION['id']);
  	$data['a']=$this->message->count_msg2($_SESSION['id']);
  	$data['list1']=$this->employe->select_employe1();
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	
  	    $this->load->view('header3',$data);
		$this->load->view('sidebarcommercial' , $data);
		$this->load->view('message',$data);
		$this->load->view('footer3');
  }
  function modifiervue() 
{
	session_start(); 
	$id = $this->uri->segment(3);
	
	$this->message->modifieretat($id);

  	$data['list']=$this->message->selectmessage($_SESSION['id']);
  	$data['msg']=$this->message->count_msg($_SESSION['id']);
  	$data['a']=$this->message->count_msg2($_SESSION['id']);
  	$data['list1']=$this->employe->select_employe1();
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	
  	    $this->load->view('header3',$data);
		$this->load->view('sidebarcommercial' , $data);
		$this->load->view('message',$data);
		$this->load->view('footer3');
	
}
function admin(){
    
    ///$data['list']=$this->categorie->selectcategorie();
    session_start() ;
    $data['list']=$this->message->selectmessage($_SESSION['id']);
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['list1']=$this->employe->select_employe1();
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    
        $this->load->view('header3',$data);
    $this->load->view('sidebar3' , $data);
    $this->load->view('message',$data);
    $this->load->view('footer3');
  }
  function logistique(){
    
    ///$data['list']=$this->categorie->selectcategorie();
    session_start() ;
    $data['list']=$this->message->selectmessage($_SESSION['id']);
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['list1']=$this->employe->select_employe1();
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    
        $this->load->view('header3',$data);
    $this->load->view('sidebarlogistique' , $data);
    $this->load->view('message',$data);
    $this->load->view('footer3');
  }
  function partenaire(){
    
    ///$data['list']=$this->categorie->selectcategorie();
    session_start() ;
    $data['list']=$this->message->selectmessage($_SESSION['id']);
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['list1']=$this->employe->select_employe1();
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    
        $this->load->view('header3',$data);
    $this->load->view('sidebarpartenaire' , $data);
    $this->load->view('message',$data);
    $this->load->view('footer3');
  }


}



?>