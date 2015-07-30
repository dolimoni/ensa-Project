<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Etudiant_model extends CI_Model
{
	protected $table = 'achats';
	
	/**
	 *	check if user is valid
     *  return true if valid , else return false
	 */
    private function isValidUser($nom,$prenom,$cin,$cne){
        if($nom == "" || $prenom == "" || $cin == "" || $cne == ""){
            return false;
        }
        
        $query = $this->db->select("id")
                    ->from($this->table)
                    ->where('nom',strtolower($nom))
                    ->where('prenom',strtolower($prenom))
                    ->where('cin',strtolower($cin))
                    ->where('cne',strtolower($cne))
                    ->get();
        
        if ( $query->num_rows() > 0 )
        {
            return true;
        }else{
            return false;
        }
    }
    
    /**
    * add a new etudiant if isValidUser() return true
    * return true if inscription succeded
    *
    *$info array contains all the informations given by the user
    */
    public function inscription($info){
        if(isValidUser($info['nom'],$info['prenom'],$info['cin'],$info['cne'])){


           
            $this->db->set('email',$info['email']);
            $this->db->set('password',$info['password']);
            $this->db->set('niveau',$info['niveau']);
            $this->db->set('filiere',$info['filiere']);
            $this->db->set('civilite',$info['civilite']);
            $this->db->set('nationalite',$info['nationalite']);
            $this->db->set('photo',$info['photo']);
            $this->db->set('date_naissance',$info['date_naissance']);
            $this->db->set('lieu_naissance',$info['lieu_naissance']);
            $this->db->set('tel',$info['tel']);
            $this->db->set('gsm',$info['gsm']);
            $this->db->set('adresse',$info['adresse']);
            $this->db->set('ville',$info['ville']);
            $this->db->set('profession_pere',$info['profession_pere']);
            $this->db->set('profession_mere',$info['profession_mere']);
            $this->db->set('matricule',$info['matricule']);
            $this->db->set('created_at','NOW()',false);
            $this->db->set('isValid',1);
            
            $this->db->where('cin',$info['cin'])
            $this->db->update( $this->table) ;
            return true;
        }
        return false;
    }
    /**
	 *	check if cne and cin and password are corrcts
     *  return true if valid , else return false
	 */
    public function login($cin,$cne,$password){
        if($password == "" || $cin == "" || $cne == ""){
            return false;
        }
        
        $query = $this->db->select("id")
                    ->from($this->table)
                    ->where('password',$password)
                    ->where('cin',strtolower($cin))
                    ->where('cne',strtolower($cne))
                    ->get();
        
        if ( $query->num_rows() > 0 )
        {
            return true;
        }else{
            return false;
        }
    }
	
}