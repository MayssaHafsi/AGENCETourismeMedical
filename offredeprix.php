<?php class offredeprix extends CI_Model{ 
	function __construct() {
	 parent::__construct(); }
	
    function affecterligne ($data){ 
        
       
   $this->db->insert('offredeprix', $data);

    }
    
    
    function getligne($id,$demande)
    {
        $query=$this->db->query("select*from ligneservice where code_service='$id'and code_demande_devis='$demande'");
        return $query->result();
    }
    function finalrecord()
{


   $query= $this->db->query("select id_ligne_service as nb from ligneservice ORDER By id_ligne_service DESC limit 1 ");
    return $query->result();

}
 function selectoffredeprix($id)
{


   $query= $this->db->query("select offredeprix.id_ligne_service , service.desg_service , utilisateur.email_utilisateur,utilisateur.nom_utilisateur,utilisateur.tel_utilisateur,ligneservice.nb_jour,ligneservice.nb_chambre,ligneservice.nb_adulte,ligneservice.nb_enfant,ligneservice.classe_hotel , offredeprix.prix ,ligneservice.observation,ligneservice.billet_transport,ligneservice.nb_passagers,ligneservice.classe_transport,ligneservice.date_intervention from offredeprix ,utilisateur ,service ,ligneservice WHERE offredeprix.id_ligne_service=ligneservice.id_ligne_service and ligneservice.code_utilisateur=utilisateur.num_utilisateur and ligneservice.code_service=service.id_service and offredeprix.num_utilisateur='$id' and offredeprix.etat_offre ='non traitèe'");
    return $query->result();

}
function selecttypepartenaire($id)
    {
        $query=$this->db->query("select typepartenaire.type_partenaire from typepartenaire , utilisateur where utilisateur.type_partenaire=typepartenaire.id_type_partenaire and utilisateur.num_utilisateur='$id'");
        return $query->result();
    }
    function selectoffre($id)
    {
        $query=$this->db->query("select offredeprix.id_ligne_service ,utilisateur.num_utilisateur,utilisateur.nom_utilisateur,utilisateur.email_utilisateur,utilisateur.tel_utilisateur,offredeprix.prix from utilisateur,offredeprix WHERE utilisateur.num_utilisateur=offredeprix.num_utilisateur and offredeprix.etat_offre='traitée' and offredeprix.id_ligne_service='$id'");
        return $query->result();
    }
     function proposer_offre_de_prix($id,$prix,$num)
{


    $this->db->query("update  offredeprix set prix=$prix where num_utilisateur=$num and id_ligne_service=$id ");
}
function modifier_etat_offre_prix($id,$p)
{


    $this->db->query("update  offredeprix set etat_offre='traitèe' where id_ligne_service='$id' and num_utilisateur='$p'");
}
function accepteroffre($id,$p)
{


    $this->db->query("update offredeprix set etat_offre_prix='acceptée' where id_ligne_service='$id' and num_utilisateur='$p'");
}
function count_offre()
{


   $query= $this->db->query("select count(num_utilisateur) as nbr20 from offredeprix where etat_offre='traitèe'");
   return $query->result();
}
function selectmin($id)
{


   $query= $this->db->query("select MIN(offredeprix.prix ) as min from offredeprix where offredeprix.id_ligne_service='$id'");
   return $query->result();
}
function getprix($id , $num)
{


   $query= $this->db->query("select offredeprix.prix  as prix from offredeprix where offredeprix.id_ligne_service='$id' and offredeprix.num_utilisateur='$num'");
   return $query->result();
}
function selectmax($id)
{


   $query= $this->db->query("select MAX(offredeprix.prix ) as max from offredeprix where offredeprix.id_ligne_service='$id'");
   return $query->result();
}
function utilisateur($a , $id)
{


   $query= $this->db->query("select utilisateur.num_utilisateur,utilisateur.nom_utilisateur,utilisateur.tel_utilisateur,utilisateur.email_utilisateur,ligneservice.id_ligne_service , offredeprix.prix from offredeprix ,utilisateur,ligneservice where
utilisateur.num_utilisateur=offredeprix.num_utilisateur and ligneservice.id_ligne_service=offredeprix.id_ligne_service and offredeprix.id_ligne_service='$id' and offredeprix.prix='$a'");
   return $query->result();
}



   
}
?>