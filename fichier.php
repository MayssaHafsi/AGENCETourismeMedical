<?php class fichier extends CI_Model{ 
	function __construct() {
	 parent::__construct(); }

	function ajouterfichier ($data){ 
        
       
   $this->db->insert('fichier', $data);

    }
    function selectfichier($id)
    {
        $query=$this->db->query("select demandededevis.num_demande_devis ,date_demande_devis,patient.nom_pat,patient.pre_pat,patient.tel_pat,patient.email_pat,patient.pays_pat ,patient.sexe_pat,patient.civilite_pat,fichier.url_fichier from demandededevis ,patient,fichier where  etat_demande_devis='non annuler' and code_pat= num_pat and fichier.num_demande_devis=demandededevis.num_demande_devis and demandededevis.num_demande_devis=$id");
        return $query->result();
    }
}
    ?>