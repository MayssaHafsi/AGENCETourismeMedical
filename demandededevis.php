<?php class demandededevis extends CI_Model{ 
	function __construct() {
	 parent::__construct(); }
	function ajouterdemandededevis ($data){ 
        
       
   $this->db->insert('demandededevis', $data);

    } 
    function ajouterligne ($data){ 
        
       
   $this->db->insert('ligneservice', $data);

    }
    
    
    function verifierdemande($num,$date)
    {
        $query=$this->db->query("select*from demandededevis where  etat_demande_devis='non annuler' and code_pat='$num' and date_demande_devis='$date'");
        return $query->result();
    }
     function getdemandededevis($id)
    {
        $query=$this->db->query("select num_demande_devis ,date_demande_devis,patient.nom_pat,patient.pre_pat,patient.tel_pat,patient.email_pat,patient.pays_pat ,patient.sexe_pat,patient.civilite_pat from demandededevis ,patient where  etat_demande_devis='non annuler' and code_pat= num_pat and num_demande_devis='$id'");
        return $query->result();
    }
    function getligne($id,$demande)
    {
        $query=$this->db->query("select*from ligneservice where  etat_ligne_service='non affecter' and code_service='$id' and code_demande_devis='$demande'");
        return $query->result();
    }
    function selectdemande()
    {
        $query=$this->db->query("select num_demande_devis,date_demande_devis,email_pat ,nom_pat ,pre_pat,pays_pat,tel_pat,civilite_pat,sexe_pat from patient , demandededevis where etat_pat='activer' and etat_demande_devis='non annuler' and code_pat=num_pat and etat='non prete'");
        return $query->result();
    }
    function select_prete()
    {
        $query=$this->db->query("select num_demande_devis,date_demande_devis,email_pat ,nom_pat ,pre_pat,pays_pat,tel_pat,civilite_pat,sexe_pat from patient , demandededevis where etat_pat='activer' and etat_demande_devis='non annuler' and code_pat=num_pat and etat='prete'");
        return $query->result();
    }
    function annulerdemandededevis($id)
{


    $this->db->query("update  demandededevis set etat_demande_devis='annuler' where num_demande_devis='$id'");
}
function modifier_etat_demande_de_devis($id)
{


    $this->db->query("update  demandededevis set etat='prete' where num_demande_devis='$id'");
}
function now()
{


   $query= $this->db->query("select now() as now");
    return $query->result();

}

function finalrecord()
{


   $query= $this->db->query("select num_demande_devis as nb from demandededevis ORDER By date_demande_devis DESC limit 1 ");
    return $query->result();

}
function count_demande()
{


   $query= $this->db->query("select count(num_demande_devis) as nb9 from demandededevis where etat_demande_devis='non annuler' ");
   return $query->result();
}
}
?>