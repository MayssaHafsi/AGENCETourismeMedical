<?php class patient extends CI_Model{ 
	function __construct() {
	 parent::__construct(); }
	function ajouter_patient ($data){ 
        
       
   $this->db->insert('patient', $data);

    } 
    function count_patient()
{


   $query= $this->db->query("select count(num_pat) as nbr7 from patient  where etat_pat='activer' ");
   return $query->result();
}
    function getemail($email)
    {
        $query=$this->db->query("select*from patient where  etat_pat='activer' and email_pat='$email'");
        return $query->result();
    }
    function get_num($email)
    {
        $query=$this->db->query("select num_pat from patient where  etat_pat='activer' and email_pat='$email'");
        return $query->result();
    }
    function selectpatient()
    {
        $query=$this->db->query("select*from patient where etat_pat='activer'");
        return $query->result();
    }
    function getpatient($id)
    {
        $query=$this->db->query("select*from patient where etat_pat='activer' and num_pat='$id'");
        return $query->result();
    }
    function desactiver_patient($id)
{


    $this->db->query("update  patient set etat_pat='desactiver' where num_pat='$id'");
}

function activer_patient($id)
{


    $this->db->query("update  patient set etat_pat='activer' where num_pat='$id'");
}
function select_trash_patient()
    {

        $query=$this->db->query("select*from patient where etat_pat='desactiver'");
        return $query->result();

    }


function supprimer_patient($id)
{


    $this->db->query("delete   from patient  where num_pat='$id'");
}
function modifier_patient($id,$data)
{
 $this->db->where('num_pat', $id);
  $this->db->update('patient',$data);
}
}
?>
