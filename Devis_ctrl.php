<?php

class Devis_ctrl extends CI_Controller {

function __construct() 
{ parent::__construct();
$this->load->model('categorie', 'categorie', TRUE);
$this->load->model('service_md', 'service_md', TRUE);
$this->load->model('patient', 'patient', TRUE);
$this->load->model('demandededevis', 'demandededevis', TRUE);
$this->load->model('lignedeservice', 'lignedeservice', TRUE);
$this->load->model('partenaire', 'partenaire', TRUE);
$this->load->model('offredeprix', 'offredeprix', TRUE);
$this->load->model('message', 'message', TRUE);


}
  function index(){
    session_start();
    $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
  	$data['list1']=$this->categorie->selectcategorie();
   $data['ser']=$this->service_md->selectservice();
   $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
  	$this->load->view('header3',$data);
		$this->load->view('sidebarcommercial',$data);
		$this->load->view('devis',$data);
		$this->load->view('footer3');
  }
  function ajout(){
    session_start();
    $m=$this->demandededevis->now();
    foreach($m as $row)
{
  $n= $row->now;
  

    $date=$this->input->post('date');

    if ($n < $date )
    {
      echo '<script>alert("Veuillez verifier date de la demande de devis");</script>';
       $data['list1']=$this->categorie->selectcategorie();
       $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
   $data['ser']=$this->service_md->selectservice();
   $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('devis',$data);
    $this->load->view('footer3');

    }
    else
    {
   $data = array( 'date_demande_devis' => $this->input->post('date'),
'code_pat' => $this->input->post('num')); 
 try
 {
  $num =$this->input->post('num');
  $date =$this->input->post('date');
  
  $list=$this->demandededevis->verifierdemande($num,$date);
  if ($list==null)
  {
  
  $this->demandededevis->ajouterdemandededevis($data);
  echo '<script>alert(" Demande de devis enregistré avec succès");</script>';
   $data['list1']=$this->categorie->selectcategorie();
   $data['ser']=$this->service_md->selectservice();
   $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('devis',$data);
    $this->load->view('footer3');
    
  }
  else
  {
    echo '<script>alert("Demande dèja effectuer par ce patient dans se date");</script>';
     $data['list1']=$this->categorie->selectcategorie();
   $data['ser']=$this->service_md->selectservice();
   $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('devis',$data);
    $this->load->view('footer3');

  }


  }

catch(Exception $e)
 
  { var_dump($e->getMessage());
    echo '<script> alert("oups , erreur!");</script>';    
    $data['list1']=$this->categorie->selectcategorie();
   $data['ser']=$this->service_md->selectservice();
   $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('devis',$data);
    $this->load->view('footer3');
 
}
}
}

    
  }
  function cat(){
    session_start();
   $id= $this->input->post('cat');
    $data['list1']=$this->categorie->selectcategorie();
   $data['ser']=$this->service_md->selectservicecat($id);
   $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('devis',$data);
    $this->load->view('footer3');
  }

  function Nouveaulignemedical(){
    session_start();
     $id = $this->uri->segment(3);
     $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    
  	$this->load->view('header3',$data);
		$this->load->view('sidebarcommercial',$data);
		$this->load->view('ajoutligne',$id);
		$this->load->view('footer3');
  }
  function Nouveaulignetransport(){
    session_start();
     $id = $this->uri->segment(3);
     $data['n']=$this->demandededevis->selectdemande();
     $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('lignetransport',$data,$id);
    $this->load->view('footer3');
  }
  function Nouveaulignehotellerie(){
    session_start();
     $id = $this->uri->segment(3);
     $data['n']=$this->demandededevis->selectdemande();
     $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('lignehotellerie',$data,$id);
    $this->load->view('footer3');
  }
  function Nouveauligne(){
    session_start();
     $id = $this->uri->segment(3);
     $data['n']=$this->demandededevis->selectdemande();
     $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('autreligne',$data,$id);
    $this->load->view('footer3');
  }
  function ajouterlignemedical(){
    session_start();
    $m=$this->demandededevis->now();
    foreach($m as $row)
{
  $n= $row->now;}
  

    $date=$this->input->post('date');

    if ($n > $date )
    {
      echo '<script>alert("Veuillez verifier date de la ligne de service");</script>';
      $id = $this->uri->segment(3);
      $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
       $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('ajoutligne',$id);
    $this->load->view('footer3');

    }
    else
    {
    $id = $this->uri->segment(3);

    $n=$this->demandededevis->finalrecord();
     foreach($n as $row)
{
  $m= $row->nb;}
  


   
   $data = array( 'nb_jour' => $this->input->post('quantiter'),
'observation' => $this->input->post('observation'),'date_intervention' => $this->input->post('date'),'code_utilisateur' => $_SESSION['id'],
'code_service' => $this->input->post('num'),'code_demande_devis' =>$m); 
 try
 {
  $id=$this->input->post('num');
  //$demande =$this->input->post('demande');
  
  $n=$this->lignedeservice->getligne($id,$m);

  if ($n==null)
  {
    $this->lignedeservice->ajouterligne($data);
  echo '<script>alert("Ligne de service ajouté avec succès");</script>';
  $p=$this->lignedeservice->finalrecord();
  foreach($p as $row)
{
  $id= $row->nb;

  $l=$this->partenaire->select_medical();}
   foreach($l as $row)
{
  $m= $row->nb;
  $data = array( 'num_utilisateur' => $m,
'id_ligne_service' => $id); 

$this->offredeprix->affecterligne($data);}
$data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);

   $data['list1']=$this->categorie->selectcategorie();
   $data['ser']=$this->service_md->selectservice();
   $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('devis',$data);
    $this->load->view('footer3');
    
  }
  else
  {
   echo '<script>alert("Ligne de service déja demandeè");</script>';
     $data['list1']=$this->categorie->selectcategorie();
   $data['ser']=$this->service_md->selectservice();
   $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('devis',$data);
    $this->load->view('footer3');

    
  }
  
    
  


  }

catch(Exception $e)
 
  { var_dump($e->getMessage());
    echo '<script> alert("oups , erreur!");</script>';    
    $data['list1']=$this->categorie->selectcategorie();
   $data['ser']=$this->service_md->selectservice();
   $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('devis',$data);
    $this->load->view('footer3');
  }
 }


}
  
  
  function ajouterligne(){
    session_start();
    $id = $this->uri->segment(3);
    $n=$this->demandededevis->finalrecord();
     foreach($n as $row)
{
  $m= $row->nb;
   
   $data = array( 'nb_jour' => $this->input->post('quantiter'),
'observation' => $this->input->post('observation'),'code_utilisateur' => $_SESSION['id'],
'code_service' => $this->input->post('num'),'code_demande_devis' =>$m); 
 try
 {
  $id=$this->input->post('num');
  //$demande =$this->input->post('demande');
  
  $n=$this->lignedeservice->getligne($id,$m);

  if ($n==null)
  {
    $this->lignedeservice->ajouterligne($data);
  echo '<script>alert("Ligne de service ajouté avec succés");</script>';
  $p=$this->lignedeservice->finalrecord();
  foreach($p as $row)
{
  $id= $row->nb;}

  $l=$this->partenaire->select_autre();
   foreach($l as $row)
{
  $m= $row->nb;
  $data = array( 'num_utilisateur' => $m,
'id_ligne_service' => $id); 

$this->offredeprix->affecterligne($data);}
$data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);

   $data['list1']=$this->categorie->selectcategorie();
   $data['ser']=$this->service_md->selectservice();
   $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('devis',$data);
    $this->load->view('footer3');
    
  }
  else
  {
   echo '<script>alert("Ligne de service déja demandeé");</script>';
     $data['list1']=$this->categorie->selectcategorie();
   $data['ser']=$this->service_md->selectservice();
   $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('devis',$data);
    $this->load->view('footer3');

    
  }
  
    
  


  }

catch(Exception $e)
 
  { var_dump($e->getMessage());
    echo '<script> alert("oups , erreur!");</script>';    
    $data['list1']=$this->categorie->selectcategorie();
   $data['ser']=$this->service_md->selectservice();
   $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('devis',$data);
    $this->load->view('footer3');
 
}

    }
  }
  function ajouterlignehotel(){
    session_start();
    $id = $this->uri->segment(3);
    $n=$this->demandededevis->finalrecord();
     foreach($n as $row)
{
  $m= $row->nb;
  

   
   $data = array( 'nb_jour' => $this->input->post('quantiter'),
'observation' => $this->input->post('observation'),'nb_chambre' => $this->input->post('chambre'),'code_utilisateur' => $_SESSION['id'],'nb_adulte' => $this->input->post('adulte'),'classe_hotel' => $this->input->post('classe'),'nb_enfant'=>$this->input->post('enfant'),
'code_service' => $this->input->post('num'),'code_demande_devis' =>$m); 
 try
 {
   $id=$this->input->post('num');
  //$demande =$this->input->post('demande');
  $list=$this->lignedeservice->getligne($id,$m);
  if ($list==null)
  {
  
  $this->lignedeservice->ajouterligne($data);
  echo '<script>alert("Ligne de service ajouté avec succés");</script>';
  $p=$this->lignedeservice->finalrecord();
  foreach($p as $row)
{
  $id= $row->nb;

  $l=$this->partenaire->select_hotel();}
   foreach($l as $row)
{
  $m= $row->nb;
  $data = array( 'num_utilisateur' => $m,
'id_ligne_service' => $id); 

$this->offredeprix->affecterligne($data);}
$data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);

   $data['list1']=$this->categorie->selectcategorie();
   $data['ser']=$this->service_md->selectservice();
   $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('devis',$data);
    $this->load->view('footer3');
  
}

  else
  {
    echo '<script>alert("Ligne de service déja demandeé");</script>';
     $data['list1']=$this->categorie->selectcategorie();
   $data['ser']=$this->service_md->selectservice();
   $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('devis',$data);
    $this->load->view('footer3');

  }


  }

catch(Exception $e)
 
  { var_dump($e->getMessage());
    echo '<script> alert("oups , erreur!");</script>';    
    $data['list1']=$this->categorie->selectcategorie();
   $data['ser']=$this->service_md->selectservice();
   $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('devis',$data);
    $this->load->view('footer3');
 
}
}
}
    
  
function ajouterlignetransport(){
    session_start();
    $id = $this->uri->segment(3);
    $n=$this->demandededevis->finalrecord();
     foreach($n as $row)
{
  $m= $row->nb;
  

   
   $data = array( 'classe_transport' => $this->input->post('classe'),
'observation' => $this->input->post('observation'),'nb_passagers' => $this->input->post('passagers'),'code_utilisateur' => $_SESSION['id'],
'code_service' => $this->input->post('num'),'code_demande_devis' =>$m ,'billet_transport' => $this->input->post('billet')); 
 try
 {
   $id=$this->input->post('num');
  
  $list=$this->lignedeservice->getligne($id,$m);


  if ($list==null)
  {
    
  
  $this->lignedeservice->ajouterligne($data);
  echo '<script>alert("Ligne de service ajouté avec succés");</script>';
  $p=$this->lignedeservice->finalrecord();
  foreach($p as $row)
{
  $id= $row->nb;

  $l=$this->partenaire->select_transport();}
   foreach($l as $row)
{
  $m= $row->nb;
  $data = array( 'num_utilisateur' => $m,
'id_ligne_service' => $id); 

$this->offredeprix->affecterligne($data);}

   $data['list1']=$this->categorie->selectcategorie();
   $data['ser']=$this->service_md->selectservice();
   $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('devis',$data);
    $this->load->view('footer3');
  }
  
  else
  {
    echo '<script>alert("Ligne de service déja demandeé");</script>';
     $data['list1']=$this->categorie->selectcategorie();
   $data['ser']=$this->service_md->selectservice();
   $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('devis',$data);
    $this->load->view('footer3');

  }



  }

catch(Exception $e)
 
  { var_dump($e->getMessage());
    echo '<script> alert("oups , erreur!");</script>';    
    $data['list1']=$this->categorie->selectcategorie();
   $data['ser']=$this->service_md->selectservice();
   $data['msg']=$this->message->count_msg($_SESSION['id']);
    $data['a']=$this->message->count_msg2($_SESSION['id']);
    $data['hh']=$this->message->selectmessagenonvue($_SESSION['id']);
    $this->load->view('header3',$data);
    $this->load->view('sidebarcommercial',$data);
    $this->load->view('devis',$data);
    $this->load->view('footer3');
 
}
}
    
  }






}

  






?>
