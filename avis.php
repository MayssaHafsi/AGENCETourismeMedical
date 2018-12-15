<?php class avis extends CI_Model{ 
	function __construct() {
	 parent::__construct(); }
	function ajouteravis ($data){ 
        
       
   $this->db->insert('avis', $data);

    } 
    function selectavis()
    {
        $query=$this->db->query("select avis.num_avis, utilisateur.nom_utilisateur,patient.nom_pat, patient.email_pat,avis.desc_avis,avis.note ,avis.date_avis from avis , patient , utilisateur where avis.num_utilisateur=utilisateur.num_utilisateur and avis.num_pat=patient.num_pat");
        return $query->result();
    }
    function avispartenaire($id)
    {
        $query=$this->db->query("select avis.num_avis, utilisateur.nom_utilisateur,patient.nom_pat, patient.email_pat,avis.desc_avis,avis.note ,avis.date_avis from avis , patient , utilisateur where avis.num_utilisateur=utilisateur.num_utilisateur and avis.num_pat=patient.num_pat and avis.num_utilisateur='$id'");
        return $query->result();
    }
    function getavis($id)
    {
        $query=$this->db->query("select avis.num_avis, utilisateur.nom_utilisateur,patient.nom_pat, patient.email_pat,avis.desc_avis,avis.note ,avis.date_avis , utilisateur.email_utilisateur,patient.tel_pat,utilisateur.tel_utilisateur,patient.pays_pat,utilisateur.adr_utilisateur from avis , patient , utilisateur where avis.num_utilisateur=utilisateur.num_utilisateur and avis.num_pat=patient.num_pat and avis.num_avis=$id");
        return $query->result();
    }
    function selectpartenaire()
    {
        $query=$this->db->query("select num_utilisateur,nom_utilisateur,email_utilisateur from utilisateur where etat_utilisateur='activer'  and grade_utilisateur='partenaire' ");
        return $query->result();
    }
    function selectpatient()
    {
        $query=$this->db->query("select num_pat,nom_pat, pre_pat ,email_pat ,etat_pat from patient");
        return $query->result();
    }
    function now()
{


   $query= $this->db->query("select now() as now");
    return $query->result();

}
    }
?>