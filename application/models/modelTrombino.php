<?php if(!defined ('BASEPATH')) exit ('No direct script access allowed');
class ModelTrombino extends CI_Model
{
	private $table = 'etudiant';
	function __construct()
	{
		parent::__construct();

		$this->load->database('ensa_project');
		$this->load->helper('url');
	}

	
//*************************etudiant ensas**************************
	
	 public function TrombinoensasTab($info){
		$type_etud=$info['et'];
		//extraire l'année 
		$AU= explode("-",$info['AU']);

		$choix_fil=$info['choix1'];
	
			$results=array(); 
    
		   $this->db->select('e.photo,e.nom,e.prenom,e.cin,e.tel,e.gsm,e.email,e.ville,e.matricule,s.final_filiere,s.created_at');
			$this->db->from('etudiant e');
			$this->db->join('etudiant_ensa s', 'e.id=s.id_etudiant');
			$this->db->where(array('s.final_filiere' =>$choix_fil,'year(s.created_at)'=>$AU[0]));
			$this->db->order_by('e.nom asc, e.prenom asc'); 
			$query = $this->db->get();
		   
		    $results = $query->result();	
			
		    return $results;
	 }

//*************************etudiant cnc**************************
	 
	public function TrombinocncTab($info){
		$type_etud=$info['et'];
		//extraire l'année 
		$AU= explode("-",$info['AU']);
		$choix_fil=$info['choix1'];
		
		
			$this->db->select('e.photo,e.nom,e.prenom,e.cin,e.tel,e.gsm,e.email,e.ville,e.matricule,e.filiere,f.titre,s.created_at');
			$this->db->from('etudiant e');
			$this->db->join('etudiant_cnc s', 'e.id=s.id_etudiant');
			$this->db->join('filiere f', 'f.id=e.filiere');
			$this->db->where(array('f.titre' =>$choix_fil,'year(s.created_at)'=>$AU[0]));
			$this->db->order_by('e.nom asc, e.prenom asc'); 
			$query = $this->db->get();
		    
			$results = $query->result();	
			
		    return $results;
		
		}
//*************************etudiant concours 3eme/4eme annee **************************

	public function TrombinoConcours3Tab4($info){
		$type_etud=$info['et'];
		if($type_etud=='concours3')
		{
			$niv=3;
		}
		else if($type_etud=='concours4')
		{
			$niv=4;
		}
		//extraire l'année 
		$AU= explode("-",$info['AU']);
		$choix_fil=$info['choix1'];
		
			
			$this->db->select('e.photo,e.nom,e.prenom,e.cin,e.tel,e.gsm,e.email,e.ville,e.matricule,e.filiere,e.niveau,f.titre,s.created_at');
			$this->db->from('etudiant e');
			$this->db->join('etudiant_3eme_4eme s', 'e.id=s.id_etudiant');
			$this->db->join('filiere f','f.id=e.filiere');
			$this->db->where(array('f.titre' =>$choix_fil,'e.niveau'=>$niv,'year(s.created_at)'=>$AU[0]));
			$this->db->order_by('e.nom asc, e.prenom asc'); 
			$query = $this->db->get();
		   
		    $results = $query->result();	
			
		    return $results;
	}//fin fct
	

//**************** ts les etudiants de la 3eme annee (cnc+ensas+concours)

	public function TrombinoTsTab($info){
		$type_etud=$info['et'];
		//extraire l'année 
		$AU= explode("-",$info['AU']);
		$choix_fil=$info['choix1'];
		
			$this->db->select('e.photo,e.nom,e.prenom,e.cin,e.tel,e.gsm,e.email,e.ville,e.matricule,e.filiere,e.niveau,f.titre,e.created_at');
			$this->db->from('etudiant e');
			$this->db->join('filiere f','f.id=e.filiere');
			$this->db->where(array('e.niveau'=>3,'year(e.created_at)'=>$AU[0]));
			$this->db->order_by('e.nom asc, e.prenom asc'); 
			$query = $this->db->get();
		
				$results = $query->result();	
	
		    return $results;
	}//fin fct
}
?>