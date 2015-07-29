<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Etudiant_model extends CI_Model
{
	protected $table = 'etudiant';
	
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