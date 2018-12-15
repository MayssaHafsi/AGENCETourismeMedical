<?php class service_md extends CI_Model{ 
	function __construct() {
	 parent::__construct(); }

	function add_service ($data){ 

   $this->db->insert('service', $data);
    } 

    function selectservice()
    {
        $query=$this->db->query("select `id_service`,`desg_service`,`desc_service`,categorie.cat from service,categorie where categorie. id_cat=service.cat_service and etat_service='activer' and etat_cat='activer'");
        return $query->result();
    }
    function select_trash_service()
    {
        $query=$this->db->query("select `id_service`,`desg_service`,`desc_service`,categorie.cat from service,categorie where categorie. id_cat=service.cat_service and etat_service='desactiver'");
        return $query->result();
    }
     function selectservicecat($id)
    {
        $query=$this->db->query("select `id_service`,`desg_service`,`desc_service`,categorie.cat from service,categorie where categorie. id_cat=service.cat_service and categorie. id_cat='$id'");
        return $query->result();
    }
     function supprimer_service($id)
{


    $this->db->query("delete   from service  where id_service='$id'");
}
function modifier_service($id,$data)
{


 $this->db->where('id_service', $id);
  $this->db->update('service',$data);
}
 function select_service_md($id)
    {
        $query=$this->db->query("select `id_service`,`desg_service`,`desc_service` from service where id_service='$id'");
        return $query->result();
    }
function count_service()

{


   $query= $this->db->query("select count(id_service) as nbr2 from service where etat_service ='activer' ");
   return $query->result();
}

  function desactiver_service($id)
{


    $this->db->query("update service set etat_service='desactiver' where id_service='$id'");
    
    

} 
function activer_service($id)
{


    $this->db->query("update service set etat_service='activer' where id_service='$id'");
    
    

}  
   



}
?>
