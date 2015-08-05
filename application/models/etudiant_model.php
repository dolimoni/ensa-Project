<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Etudiant_model extends CI_Model
{
	protected $table = 'etudiant';
	
	/**
	 *	check if user is valid
     *  return true if valid , else return false
	 */
    public function isValidUser($nom,$prenom,$cin,$cne){
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
      

            if($info['who']=="ensa" and $this->isValidUser($info['nom'],$info['prenom'],$info['cin'],$info['cne']))
            {
                //updating etudiant table
                $this->db->set('email',$info['email'])
                     ->set('password',$info['password'])
                    // ->set('niveau',$info['niveau'])
                     ->set('photo',$info['photo']['name']) 
                     ->set('filiere',$info['filiere'])
                     ->set('civilite',$info['civilite'])
                     ->set('nationalite',$info['nationalite'])
                     ->set('date_naissance',$info['date_naissance'])
                     ->set('lieu_naissance',$info['lieu_naissance'])
                     ->set('tel',$info['tel'])
                     ->set('gsm',$info['gsm'])
                     ->set('adresse',$info['adresse'])
                     ->set('ville',$info['ville'])
                     ->set('profession_pere',$info['profession_pere'])
                     ->set('profession_mere',$info['profession_mere'])
                     ->set('matricule',$info['matricule'])
                     ->set('created_at','NOW()',false)
                     ->set('isValid',1)
                     ->where('cin',$info['cin'])
                     ->update( $this->table) ;

                      copy($info['photo']['tmp_name'], 'assets/img'.$info['photo']['name']);

                    // adding new student to etudiant_ensa
                    $this->db->set('id_etudiant',$this->getId($info['cin']))
                             ->set('type_bac',$info['type_bac'])
                             ->set('note_bac',$info['note_bac'])
                             ->set('note_1er_annee',$info['note_1er_annee'])
                   //  $this->db->set('note_2eme_annee',$this->getId($info['note_2eme_annee']));
                             ->set('created_at','NOW()',false)
                             ->insert('etudiant_ensa') ;
            }
            else if($info['who']=="cnc")
            {
                 //updating etudiant table
                $this->db->set('nom',$info['nom'])
                        ->set('prenom',$info['prenom'])
                        ->set('cin',$info['cin'])
                        ->set('cne',$info['cne'])
                        ->set('email',$info['email'])
                        ->set('password',$info['password'])
                        ->set('photo',$info['photo']['name']) 
                       // ->set('niveau',$info['niveau'])
                        ->set('filiere',$info['filiere'])
                        ->set('civilite',$info['civilite'])
                        ->set('nationalite',$info['nationalite'])
                        ->set('date_naissance',$info['date_naissance'])
                        ->set('lieu_naissance',$info['lieu_naissance'])
                        ->set('tel',$info['tel'])
                        ->set('gsm',$info['gsm'])
                        ->set('adresse',$info['adresse'])
                        ->set('ville',$info['ville'])
                        ->set('profession_pere',$info['profession_pere'])
                        ->set('profession_mere',$info['profession_mere'])
                        ->set('matricule','1')
                        ->set('created_at','NOW()',false)
                        ->set('isValid',1)
                        ->insert( $this->table) ;

                 $this->db->set('id_etudiant',$this->getId($info['cin']))
                          ->set('type_bac',$info['type_bac'])
                          ->set('note_bac',$info['note_bac'])
                          ->set('filiere_cp',$info['filiere_cp'])
                          ->set('etablissement_cp',$info['etablissement_cp'])
                          ->set('ville_cp',$info['ville_cp'])
                          ->set('range_cnc',$info['range_cnc'])
                         // ->set('filiere',$info['filiere'])
                          ->set('created_at','NOW()',false)
                          ->insert('etudiant_cnc') ;
            }
            else if($info['who']=="3and4Year")
            {
                $this->db->set('nom',$info['nom'])
                         ->set('prenom',$info['prenom'])
                         ->set('cin',$info['cin'])
                         ->set('cne',$info['cne'])
                         ->set('email',$info['email'])
                         ->set('password',$info['password'])
                         ->set('photo',$info['photo']['name']) 
                       //  ->set('niveau',$info['niveau'])
                         ->set('filiere',$info['filiere'])
                         ->set('civilite',$info['civilite'])
                         ->set('nationalite',$info['nationalite'])
                         ->set('date_naissance',$info['date_naissance'])
                         ->set('lieu_naissance',$info['lieu_naissance'])
                         ->set('tel',$info['tel'])
                         ->set('gsm',$info['gsm'])
                         ->set('adresse',$info['adresse'])
                         ->set('ville',$info['ville'])
                         ->set('profession_pere',$info['profession_pere'])
                         ->set('profession_mere',$info['profession_mere'])
                         ->set('matricule','1')
                         ->set('created_at','NOW()',false)
                         ->set('isValid',1)
                         ->insert( $this->table) ;

                 $this->db->set('id_etudiant',$info['cin'])
                          ->set('type_diplome',$info['type_diplome'])
                          ->set('etablissement_diplome',$info['etablissement_diplome'])
                          ->set('created_at','NOW()',false)
                          ->insert('etudiant_3eme_4eme') ;
                          
            }
            else
                return false;
              
            return true;
    }
    /*
    *   return the id of a given cin
    */
    private function getId($cin)
    {
        $query = $this->db->select("*")
                    ->from($this->table)
                    ->where('cin',$cin)
                    ->limit( 1)
                    ->get();
                    $row = $query->row_array();
                   
        return $row['id'];
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