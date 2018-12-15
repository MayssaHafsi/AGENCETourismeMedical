<?php class ligneservice extends CI_Model{ 
	function __construct() {
	 parent::__construct(); }
	
    function ajouterligne ($data){ 
        
       
   $this->db->insert('ligneservice', $data);

    }
    
    
    function getligne($id,$demande)
    {
        $query=$this->db->query("select*from ligneservice where  etat_ligne_service='non affecter' and code_service='$id' and code_demande_devis='$demande'");
        return $query->result();
    }
    function selectligneservicemedical($id)
    {
        $query=$this->db->query("select id_ligne_service,service.desg_service,nb_jour,date_intervention,observation,
 utilisateur.nom_utilisateur,categorie.cat,prix_ligne_service from categorie,service,ligneservice,utilisateur where 
 categorie.id_cat=service.cat_service and ligneservice.code_utilisateur=utilisateur.num_utilisateur and ligneservice.code_service=service.id_service and categorie.cat IN('esthetique','chirugie','medical') and code_demande_devis='$id'");
        return $query->result();
    }
     function select_ligne_service_medical($id)
    {
        $query=$this->db->query("select id_ligne_service,service.desg_service,nb_jour,date_intervention,observation,
 utilisateur.nom_utilisateur,categorie.cat,prix_ligne_service from categorie,service,ligneservice,utilisateur where 
 categorie.id_cat=service.cat_service and ligneservice.code_utilisateur=utilisateur.num_utilisateur and ligneservice.code_service=service.id_service and categorie.cat IN('esthetique','chirugie','medical') and id_ligne_service='$id'");
        return $query->result();
    }
    
    function selectligneservicehotellerie($id)
    {
        $query=$this->db->query(" select id_ligne_service,service.desg_service,nb_chambre,observation,nb_jour,
 utilisateur.nom_utilisateur,categorie.cat,prix_ligne_service,nb_adulte,nb_enfant,
 classe_hotel from categorie,service,ligneservice,utilisateur where 
 categorie.id_cat=service.cat_service and ligneservice.code_utilisateur=utilisateur.num_utilisateur and ligneservice.code_service=service.id_service and categorie.cat ='hottelerie' and code_demande_devis='$id'");
        return $query->result();
    }
    function select_ligne_service_hotellerie($id)
    {
        $query=$this->db->query(" select id_ligne_service,service.desg_service,nb_chambre,observation,nb_jour,
 utilisateur.nom_utilisateur,categorie.cat,prix_ligne_service,nb_adulte,nb_enfant,
 classe_hotel from categorie,service,ligneservice,utilisateur where 
 categorie.id_cat=service.cat_service and ligneservice.code_utilisateur=utilisateur.num_utilisateur and ligneservice.code_service=service.id_service and categorie.cat ='hottelerie' and id_ligne_service='$id'");
        return $query->result();
    }
    function selectligneservicetransport($id)
    {
        $query=$this->db->query(" select id_ligne_service,service.desg_service,nb_passagers,observation,
 utilisateur.nom_utilisateur,categorie.cat,prix_ligne_service,classe_transport,
 billet_transport from categorie,service,ligneservice,utilisateur where 
 categorie.id_cat=service.cat_service and ligneservice.code_utilisateur=utilisateur.num_utilisateur and ligneservice.code_service=service.id_service and categorie.cat like 'transport' and code_demande_devis='$id'");
        return $query->result();
    }
    function select_ligne_service_transport($id)
    {
        $query=$this->db->query(" select id_ligne_service,service.desg_service,nb_passagers,observation,
 utilisateur.nom_utilisateur,categorie.cat,prix_ligne_service,classe_transport,
 billet_transport from categorie,service,ligneservice,utilisateur where 
 categorie.id_cat=service.cat_service and ligneservice.code_utilisateur=utilisateur.num_utilisateur and ligneservice.code_service=service.id_service  and id_ligne_service='$id'");
        return $query->result();
    }
    function selectligneservice($id)
    {
        $query=$this->db->query("select id_ligne_service,service.desg_service,nb_jour,observation,
 utilisateur.nom_utilisateur,categorie.cat,prix_ligne_service from categorie,service,ligneservice,utilisateur where 
 categorie.id_cat=service.cat_service and ligneservice.code_utilisateur=utilisateur.num_utilisateur and ligneservice.code_service=service.id_service and categorie.cat not like 'esthetique' and categorie.cat not like 'chirugie' and categorie.cat not like 'medical'and categorie.cat not like 'transport' and  categorie.cat not like 'hottelerie' and   code_demande_devis='$id' ");
        return $query->result();
    }
    
    function annulerdemandededevis($id)
{


    $this->db->query("update  demandededevis set etat_demande_devis='annuler' where num_demande_devis='$id'");
}
function modifierprix($id ,$prix)
{


    $this->db->query("update  ligneservice set prix_ligne_service='$prix' where id_ligne_service='$id'");
}
function supprimer_ligne_service($id)
{


    $this->db->query("delete   from ligneservice  where id_ligne_service='$id'");
}
function modifier_ligne_service($id,$data)
{


 $this->db->where('id_ligne_service', $id);
  $this->db->update('ligneservice',$data);
}
function get_code_demande($id) 
{

$query= $this->db->query("select code_demande_devis,service.desg_service,nb_jour,observation,
 utilisateur.nom_utilisateur,categorie.cat,prix_ligne_service from categorie,service,ligneservice,utilisateur where 
 categorie.id_cat=service.cat_service and ligneservice.code_utilisateur=utilisateur.num_utilisateur and ligneservice.code_service=service.id_service and id_ligne_service='$id' ");
 return $query->result();
} 
function getlignedeservice($id) 
{

$query= $this->db->query("select ligneservice.id_ligne_service, ligneservice.nb_jour,ligneservice.date_intervention,ligneservice.observation,ligneservice.prix_ligne_service ,utilisateur.email_utilisateur,service.desg_service,utilisateur.nom_utilisateur ,utilisateur.tel_utilisateur from service,utilisateur,ligneservice where code_service=service.id_service and code_utilisateur=utilisateur.num_utilisateur and id_ligne_service=$id");
 return $query->result();
}
function getlignedeservicetransport($id) 
{

$query= $this->db->query("select ligneservice.id_ligne_service, ligneservice.billet_transport,ligneservice.nb_passagers,ligneservice.classe_transport,ligneservice.observation ,ligneservice.prix_ligne_service ,utilisateur.email_utilisateur,service.desg_service,utilisateur.nom_utilisateur ,utilisateur.tel_utilisateur from service,utilisateur,ligneservice where code_service=service.id_service and code_utilisateur=utilisateur.num_utilisateur and id_ligne_service=$id");
 return $query->result();
}
function getautreligne($id) 
{

$query= $this->db->query("select ligneservice.id_ligne_service, ligneservice.nb_jour,ligneservice.observation,ligneservice.prix_ligne_service ,utilisateur.email_utilisateur,service.desg_service,utilisateur.nom_utilisateur ,utilisateur.tel_utilisateur from service,utilisateur,ligneservice where code_service=service.id_service and code_utilisateur=utilisateur.num_utilisateur and id_ligne_service=$id");
 return $query->result();
}
function getlignedeservicehotel($id) 
{

$query= $this->db->query("select ligneservice.id_ligne_service, ligneservice.nb_chambre,ligneservice.nb_enfant,ligneservice.nb_adulte,ligneservice.observation ,ligneservice.prix_ligne_service , ligneservice.classe_hotel,utilisateur.email_utilisateur,service.desg_service,utilisateur.nom_utilisateur ,utilisateur.tel_utilisateur , ligneservice.nb_jour from service,utilisateur,ligneservice where code_service=service.id_service and code_utilisateur=utilisateur.num_utilisateur and id_ligne_service=$id");
 return $query->result();
}



}
?>