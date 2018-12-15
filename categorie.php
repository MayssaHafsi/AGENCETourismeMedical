<?php class categorie extends CI_Model{ 
	function __construct() {
	 parent::__construct(); }
	function add_categorie ($data){ 
        
       
   $this->db->insert('categorie', $data);

    } 
    function selectcategorie()
    {
        $query=$this->db->query("select*from categorie where etat_cat='activer'");
        return $query->result();
    }
     function select_trash_categorie()
    {
        $query=$this->db->query("select*from categorie where etat_cat='desactiver'");
        return $query->result();
    }
   function supprimer_categorie($id)
{


    $this->db->query("delete   from categorie  where id_cat='$id'");
}
  
  function modifier_categorie($id,$data)
{


 $this->db->where('id_cat', $id);
  $this->db->update('categorie',$data);
} 
function select_cat($id) 
{
  $query=$this->db->query("select*from categorie where id_cat='$id'");
        return $query->result();
 
}
function count_cat()
{


   $query= $this->db->query("select count(id_cat) as nbr6 from categorie ");
   return $query->result();
}
function desactiver_cat($id)
{


    $this->db->query("update  categorie set etat_cat='desactiver' where id_cat='$id'");
}
function activer_cat($id)
{


    $this->db->query("update  categorie set etat_cat='activer' where id_cat='$id'");
}
function supprimer_cat($id)
{


    $this->db->query("delete from categorie where id_cat='$id'");
}


}
?>
