<?php class partenaire extends CI_Model{
	function __construct() {

	 parent::__construct(); }

	function add_partenaire ($data){ 
   $this->db->insert('utilisateur', $data);
    } 
     function select_trash_partenaire()
    {
        $query=$this->db->query("select `num_utilisateur`,`mot_de_passe_utilisateur`,`etat`,`nom_utilisateur`,`adr_utilisateur`,`date_utilisateur`,`email_utilisateur`,`tel_utilisateur`,`grade_utilisateur`,`login_utilisateur`,`etat_utilisateur`,typepartenaire.type_partenaire from utilisateur,typepartenaire where id_type_partenaire=utilisateur.type_partenaire and grade_utilisateur ='partenaire' and etat_utilisateur='desactiver'");
        return $query->result();
    }
    function getpartenaire($email)
    {
        $query=$this->db->query("select `num_utilisateur`,`mot_de_passe_utilisateur`,`etat`,`nom_utilisateur`,`adr_utilisateur`,`date_utilisateur`,`email_utilisateur`,`tel_utilisateur`,`grade_utilisateur`,`login_utilisateur`,`etat_utilisateur`,typepartenaire.type_partenaire from utilisateur,typepartenaire where id_type_partenaire=utilisateur.type_partenaire and grade_utilisateur ='partenaire' and etat_utilisateur='activer' and email_utilisateur='$email'");
        return $query->result();
    }
   
    function activer_partenaire($id)
{


    $this->db->query("update  utilisateur set etat_utilisateur='activer' where num_utilisateur='$id'");
}
 function supprimer_partenaire($id)
{


    $this->db->query("delete   from utilisateur  where num_utilisateur='$id'");
}
function count_partenaire()
{


   $query= $this->db->query("select count(num_utilisateur) as nbr from utilisateur  where grade_utilisateur='partenaire' and etat_utilisateur='activer' ");
   return $query->result();
}
function select_partenaire($id)
{


  $query=  $this->db->query("select num_utilisateur,nom_utilisateur,adr_utilisateur ,tel_utilisateur,email_utilisateur,login_utilisateur,mot_de_passe_utilisateur from utilisateur  where num_utilisateur='$id'");
    return $query->result();
}
function modifier_partenaire($id,$data)
{


 $this->db->where('num_utilisateur', $id);
  $this->db->update('utilisateur',$data);
}

function select_hotel()
{


   $query= $this->db->query("select DISTINCT utilisateur.num_utilisateur as nb FROM utilisateur , typepartenaire where utilisateur.type_partenaire=typepartenaire.id_type_partenaire and typepartenaire.type_partenaire IN ('hotel') and utilisateur.etat_utilisateur='activer' and typepartenaire.etat_type='activer'");
    return $query->result();

}
function select_medical()
{


   $query= $this->db->query("select DISTINCT utilisateur.num_utilisateur as nb FROM utilisateur , typepartenaire where utilisateur.type_partenaire=typepartenaire.id_type_partenaire and typepartenaire.type_partenaire IN ('clinique','polyclinique' , 'hopital' , 'centre imagerie') and utilisateur.etat_utilisateur='activer' and typepartenaire.etat_type='activer'");
    return $query->result();

}
function select_transport()
{


   $query= $this->db->query("select DISTINCT utilisateur.num_utilisateur as nb FROM utilisateur , typepartenaire where utilisateur.type_partenaire=typepartenaire.id_type_partenaire and typepartenaire.type_partenaire IN ('fournisseur de billeterie','agence de voyage') and utilisateur.etat_utilisateur='activer' and typepartenaire.etat_type='activer'");
    return $query->result();

}
function select_autre()
{


   $query= $this->db->query("select  DISTINCT num_utilisateur as nb from utilisateur ,typepartenaire where utilisateur.num_utilisateur=typepartenaire.id_type_partenaire AND typepartenaire.type_partenaire <>'fournisseur de billeterie' AND typepartenaire.type_partenaire <>'hotel' and typepartenaire.type_partenaire <>'clinique' and typepartenaire.type_partenaire <>'polyclinique' and typepartenaire.type_partenaire <>'hopital' and typepartenaire.type_partenaire <>'centre imagerie' and typepartenaire.etat_type='activer' and utilisateur.etat_utilisateur='activer'");
    return $query->result();

}




}
?>