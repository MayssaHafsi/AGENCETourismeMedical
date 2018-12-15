<?php class employe extends CI_Model{
	function __construct() {
	 parent::__construct(); }
	function add_employe ($data){ 
   $this->db->insert('utilisateur', $data);
    } 
     function select_employe()
    {
        $query=$this->db->query("select*from utilisateur where grade_utilisateur <>'partenaire' and etat_utilisateur='activer'");
        return $query->result();
    }
    function select_employe1()
    {
        $query=$this->db->query("select*from utilisateur where etat_utilisateur='activer'");
        return $query->result();
    }
    function getemploye($email)
    {
        $query=$this->db->query("select*from utilisateur where grade_utilisateur <>'partenaire' and etat_utilisateur='activer' and email_utilisateur='$email'");
        return $query->result();
    }
    function select_trash_employe()
    {

        $query=$this->db->query("select*from utilisateur where grade_utilisateur <>'partenaire' and etat_utilisateur='desactiver'");
        return $query->result();

    }
    function modifieretat($id)
{


    $this->db->query("update  utilisateur set  etat ='onligne' where num_utilisateur='$id'");
}
function deconnecter($id)
{


    $this->db->query("update  utilisateur set  etat ='offligne' where num_utilisateur='$id'");
}

    function select_partenaire()
    {
        $query=$this->db->query("select `num_utilisateur`,`mot_de_passe_utilisateur`,`etat`,`nom_utilisateur`,`adr_utilisateur`,`date_utilisateur`,`email_utilisateur`,`tel_utilisateur`,`grade_utilisateur`,`login_utilisateur`,`etat_utilisateur`,typepartenaire.type_partenaire from utilisateur,typepartenaire where id_type_partenaire=utilisateur.type_partenaire and grade_utilisateur ='partenaire' and etat_utilisateur='activer'");
        return $query->result();
    }




function desactiver_partenaire($id)
{


    $this->db->query("update  utilisateur set etat_utilisateur='desactiver' where num_utilisateur='$id'");
}
function desactiver_employe($id)
{


    $this->db->query("update  utilisateur set etat_utilisateur='desactiver' where num_utilisateur='$id'");
}
function activer_partenaire($id)
{


    $this->db->query("update  utilisateur set etat_utilisateur='activer' where num_utilisateur='$id'");
}
function activer_employe($id)
{


    $this->db->query("update  utilisateur set etat_utilisateur='activer' where num_utilisateur='$id'");
}
function modifier_employe($id,$data)
{


 $this->db->where('num_utilisateur', $id);
  $this->db->update('utilisateur',$data);
}
function modifier_profil($id,$data)
{


 $this->db->where('num_utilisateur', $id);
  $this->db->update('utilisateur',$data);
}
function select_partenaire_activer()
    {
        $query=$this->db->query("select `num_utilisateur`,`mot_de_passe_utilisateur`,`etat`,`nom_utilisateur`,`adr_utilisateur`,`date_utilisateur`,`email_utilisateur`,`tel_utilisateur`,`grade_utilisateur`,`login_utilisateur`,`etat_utilisateur`,typepartenaire.type_partenaire from utilisateur,typepartenaire where id_type_partenaire=utilisateur.type_partenaire and grade_utilisateur ='partenaire' and etat_utilisateur='desactiver'");
        return $query->result();
    }
    function supprimer_employe($id)
{


    $this->db->query("delete   from utilisateur  where num_utilisateur='$id'");
}
 function select_utilisateur($id)
{


  $query=  $this->db->query("select num_utilisateur,nom_utilisateur,pre_utilisateur,adr_utilisateur ,grade_utilisateur,tel_utilisateur,email_utilisateur,login_utilisateur,mot_de_passe_utilisateur from utilisateur  where num_utilisateur='$id'");
    return $query->result();
}
 function identifier($login,$password)
{


  $query=  $this->db->query("select num_utilisateur,nom_utilisateur,pre_utilisateur,adr_utilisateur ,grade_utilisateur,tel_utilisateur,email_utilisateur,login_utilisateur,mot_de_passe_utilisateur from utilisateur  where login_utilisateur='$login' AND mot_de_passe_utilisateur='$password'");
    return $query->result();
}
function count_commercial()
{


   $query= $this->db->query("select count(num_utilisateur) as nbr4 from utilisateur WHERE etat_utilisateur='activer' and grade_utilisateur =' Responsable commercial'");
   return $query->result();
}
function select_user()
{
   $query= $this->db->query("select * from utilisateur WHERE etat_utilisateur='activer'");
   return $query->result();
}
function count_admin()
{


   $query= $this->db->query("select count(num_utilisateur) as nbr10 from utilisateur WHERE etat_utilisateur='activer' and grade_utilisateur ='administrateur'");
   return $query->result();
}
function count_logistique()
{


   $query= $this->db->query("select count(num_utilisateur) as nbr5 from utilisateur  where grade_utilisateur=' Responsable logistique' and etat_utilisateur='activer' ");
   return $query->result();
}


}
?>