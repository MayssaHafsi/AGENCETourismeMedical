<?php class type extends CI_Model{ 
	function __construct() {
	 parent::__construct(); }
	function add_type ($data){ 
   $this->db->insert('typepartenaire', $data);
    } 
    function select_type_partenaire()
    {
        $query=$this->db->query("select*from typepartenaire where etat_type='activer'");
        return $query->result();
    }
    function select_trash_type()
    {
        $query=$this->db->query("select*from typepartenaire where etat_type='desactiver'");
        return $query->result();
    }
     function supprimer_type($id)
{


    $this->db->query("delete   from typepartenaire  where id_type_partenaire='$id'");
}
function select_type($id)
{


  $query=  $this->db->query("select * from typepartenaire  where id_type_partenaire='$id'");
    return $query->result();
}
function modifier_type($id,$data)
{


 $this->db->where('id_type_partenaire', $id);
  $this->db->update('typepartenaire',$data);
}

function count_type()
{


   $query= $this->db->query("select count(id_type_partenaire) as nbr3 from typepartenaire ");
   return $query->result();
}
function desactiver_type($id)
{


    $this->db->query("update  typepartenaire set etat_type='desactiver' where id_type_partenaire='$id'");
}
function activer_type($id)
{


    $this->db->query("update  typepartenaire set etat_type='activer' where id_type_partenaire='$id'");
}

    
    
   



}
?>
