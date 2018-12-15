<?php class message extends CI_Model{ 
	function __construct() {
	 parent::__construct(); }
	function ajoutermessage ($data){ 
        
       
   $this->db->insert('message', $data);

    } 
    function finalrecord()
{


   $query= $this->db->query("select id_message as nb from message ORDER By date_msg DESC limit 1 ");
    return $query->result();

}
    function selectmessage($id)
    {
        $query=$this->db->query("select message.id_message, utilisateur.email_utilisateur,message.message,message.date_msg ,utilisateur.email_utilisateur , utilisateur.nom_utilisateur from envoie, message,utilisateur where utilisateur.num_utilisateur=message.code_utilisateur and envoie.id_msg=message.id_message and envoie.code_utilisateur='$id'");
      
        return $query->result();
    }
    function selectmessagenonvue($id)
    {
        $query=$this->db->query("select message.id_message, utilisateur.email_utilisateur,message.message,message.date_msg ,utilisateur.email_utilisateur , utilisateur.nom_utilisateur from envoie, message,utilisateur where utilisateur.num_utilisateur=message.code_utilisateur and envoie.id_msg=message.id_message and envoie.code_utilisateur='$id' and message.etat_msg='non vue'");
        return $query->result();
    }
    function selectmessagevue($id)
    {
        $query=$this->db->query("select message.id_message, utilisateur.email_utilisateur,message.message,message.date_msg ,utilisateur.email_utilisateur , utilisateur.nom_utilisateur from envoie, message,utilisateur where utilisateur.num_utilisateur=message.code_utilisateur and envoie.id_msg=message.id_message and envoie.code_utilisateur=21 and message.etat_msg='vue'");
        return $query->result();
    }
     function select_trash_categorie()
    {
        $query=$this->db->query("select*from categorie where etat_cat='desactiver'");
        return $query->result();
    }
   function supprimer_categorie($id)
{


    $this->db->query("delete   from categorie  where id_cat='$id'");
}
  
  
function select_cat($id) 
{
  $query=$this->db->query("select*from categorie where id_cat='$id'");
        return $query->result();
 
}
function count_msg($id)
{


   $query= $this->db->query("select count(id_message) as nbr11 from message , envoie where etat_msg='non vue' and message.id_message=envoie.id_msg and envoie.code_utilisateur='$id'");
   return $query->result();
}

function count_msg2($id)
{


   $query= $this->db->query("select count(id_message) as nbr2 from message  ,envoie where etat_msg='vue' and message.id_message=envoie.id_msg and envoie.code_utilisateur='$id' ");
   return $query->result();
}
function modifieretat($id)
{


    $this->db->query("update  message set etat_msg='vue' where id_message='$id'");
}
function activer_cat($id)
{


    $this->db->query("update  categorie set etat_cat='activer' where id_cat='$id'");
}
function supprimer_cat($id)
{


    $this->db->query("delete from categorie where id_cat='$id'");
}


}
?>
