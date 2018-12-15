<?php class envoie extends CI_Model{ 
	function __construct() {
	 parent::__construct(); }
	function ajoutermessage ($record){ 
        
       
   $this->db->insert('envoie', $record);

    } 

}
?>