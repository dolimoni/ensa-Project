<?php if(!defined ('BASEPATH')) exit ('No direct script access allowed');
class Filiere_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->database('ensa_project');
		$this->load->helper('url');
	}
	public function getListFiliere()
	{
	$this->db->select('id,titre,abreviation,signification,created_at');
	$this->db->from('filiere');
	$this->db->where("deleted",0);
	$this->db->order_by('titre asc'); 
	$query = $this->db->get();
		   
    $results = $query->result();	
	return $results;
		
	}
	public function getFiliereById($idFil)
	{
	$this->db->select('*');
	$this->db->from('filiere');
	$this->db->where(array('id'=> $idFil,'deleted'=>0));
	$this->db->limit(1);
	$query = $this->db->get();	   
    
	$results = $query->result();	
	//$row = $query->row_array();
	return $results;	
	}
	
	// ça marche 
	public function deleteById($idFiliere)
	{
        $this->db->where('id', $idFiliere);
        $this->db->update('filiere', array("deleted" => 1)); 
   
	}
	
	//modifier filiere
	public function editFiliere($filiere)
	{
	$idFiliere=$filiere['id'];	
	$titre=$filiere['titre'];	
	$abreviation=$filiere['abreviation'];
	$signification=$filiere['signification'];
	//ajouter created_at	
        $this->db->where('id', $idFiliere);
        $this->db->update('filiere', array('titre' => $titre,'abreviation'=>$abreviation,'signification' => $signification,'deleted'=>0)); 
   
	}
	//ajout
	public function addfiliere($filiere)
	{
	$titre=$filiere['titre'];	
	$abreviation=$filiere['abreviation'];
	$signification=$filiere['signification'];
		
		
	$this->db->set(array('titre' => $titre,'abreviation'=>$abreviation,'signification' => $signification,'deleted'=>0))
             ->set('created_at', 'NOW()', false)
             ->insert('filiere');
	}
}
?>