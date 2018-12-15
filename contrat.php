<?php class contrat extends CI_Model{ 
	function __construct() {
	 parent::__construct(); }
	function ajouter_contrat ($data){ 
        
       
   $this->db->insert('contrat', $data);

    } 
    function select_contrat()
    {
        $query=$this->db->query("select*from contrat where etat_contrat='non annuler'");
        return $query->result();
    }
    function annuler_contrat($id)
    {
        $query=$this->db->query("update contrat set etat_contrat='annuler' where num_contrat='$id'");
        return $query->result();
    }
    
function count_contrat()
{


   $query= $this->db->query("select count(num_contrat) as nb8 from contrat where etat_contrat='non annuler' ");
   return $query->result();
}
function get_code($id)
{


   $query= $this->db->query("select code_demande_devis as nb from contrat where etat_contrat='non annuler' and num_contrat='$id' ");
   return $query->result();
}
function get_contrat($id)
{


   $query= $this->db->query("select demandededevis.num_demande_devis , demandededevis.date_demande_devis  , contrat.datedeb_contrat , contrat.mt_ttc_contrat,contrat.date_sign_contrat,contrat.mode_paiement,contrat.mt_ht_contrat,contrat.datefin_contrat, contrat.num_contrat , patient.num_pat,patient.nom_pat,patient.pre_pat,patient.tel_pat,patient.email_pat,patient.sexe_pat,patient.pays_pat,patient.civilite_pat , contrat.tva , utilisateur.nom_utilisateur from contrat,demandededevis,patient,utilisateur where patient.etat_pat='activer' and contrat.code_demande_devis=demandededevis.num_demande_devis and patient.num_pat=demandededevis.code_pat and patient.code_utilisateur=utilisateur.num_utilisateur and  demandededevis.etat_demande_devis='non annuler' and contrat.etat_contrat='non annuler' and contrat.num_contrat='$id'
    ");
   return $query->result();
}
function calculer_montant_ht($id)
{


   $query= $this->db->query("select SUM(ligneservice.prix_ligne_service) as nb FROM ligneservice , demandededevis where ligneservice.code_demande_devis=demandededevis.num_demande_devis and demandededevis.num_demande_devis='$id'");
   return $query->result();
}


}
?>
