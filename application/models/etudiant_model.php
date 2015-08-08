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
            
             $data= array(
                        'email' => $info['email'], 
                        //'niveau' => $info['niveau'], 
                        'password'=> $info['password'],
                        'photo'=> $info['photo']['name'],
                        'filiere'=> $info['filiere'],
                        'civilite'=> $info['civilite'],
                        'nationalite'=> $info['nationalite'],
                        'photo'=>$info['cin'].".jpg",
                        'date_naissance'=> $info['date_naissance'],
                        'lieu_naissance'=> $info['lieu_naissance'],
                        'tel'=> $info['tel'],
                        'gsm'=> $info['gsm'],
                        'adresse'=> $info['adresse'],
                        'ville'=> $info['ville'],
                        'profession_pere' =>$info['profession_pere'],
                        'profession_mere'=> $info['profession_mere'],
                        'matricule' =>'1',
                        'isValid'=>1,
                        'created_at'=>date("Y-m-d H:i:s")
                        );

            if($info['who']=="ensa" and $this->isValidUser($info['nom'],$info['prenom'],$info['cin'],$info['cne']))
            {
                   
                     $this->db->where('cin',$info['cin']);
                     $this->db->update($this->table, $data); 

                      copy($info['photo']['tmp_name'], 'assets/img/'.$info['cin'].".jpg");

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
                
                        $this->db->insert($this->table,$data);
                        copy($info['photo']['tmp_name'], 'assets/img/'.$info['cin'].".jpg");

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

                 $this->db->insert($this->table,$data);
                 copy($info['photo']['tmp_name'], 'assets/img/'.$info['cin'].".jpg");
                 
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