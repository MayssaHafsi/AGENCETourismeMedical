<?php class lignedeservice extends CI_Model{ 
	function __construct() {
	 parent::__construct(); }
	
    function ajouterligne ($data){ 
        
       
   $this->db->insert('ligneservice', $data);

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
   
}
?>