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
    *
    * add a new etudiant if isValidUser() return true
    * return true if inscription succeded
    *
    * $info array contains all the informations given by the user
    *
    **/
    public function inscription($info){
            
             $data= array(
                        'email' => $info['email'], 
                        //'niveau' => $info['niveau'], 
                        'password'=> $info['password'],
                        'photo'=> $info['photo']['name'],
                       // 'filiere'=> $info['filiere'],
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

              // adding chosen filiere to filiere_choix
               $this->db->set('choix1',$info['choix1'])
                               ->set('choix2',$info['choix2'])
                               ->set('choix3',$info['choix3'])
                               ->insert('filiere_choix');  


                     $insert=$this->db->insert_id();//getting the id of the last query
                     $data['id_choix']=$insert;
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
                
                $this->sendEmailtoUser($info['email'],"Inscription réussie","Votre compte est bien activé avec le mot de passe suivant «".$info['password']." », voilà vos 3choix à propos de filière : Choix1 : ".$info['choix1'].", choix2 : ".$info['choix2']." choix3 : ".$info['choix3'].".");
                                        
            }
            else if($info['who']=="cnc")
            {
                // adding chosen filiere to filiere_choix
               $this->db->set('choix1',$info['filiere'])//in cnc controller we recieve chosen filiere in "filiere" not in "choix1"
                               ->set('choix2',"NONE")
                               ->set('choix3',"NONE")
                               ->insert('filiere_choix');

                               $insert=$this->db->insert_id();   //getting the id of the last query   
                               $data['id_choix']=$insert;
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
                $this->db->set('choix1',$info['filiere'])//in the3and4Year controller we recieve chosen filiere in "filiere" not in "choix1"
                               ->set('choix2',"NONE")
                               ->set('choix3',"NONE")
                               ->insert('filiere_choix');

                 $insert=$this->db->insert_id();   //getting the id of the last query   
                               $data['id_choix']=$insert;
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
    
    
    /* By Essaidi : this function sends email */
    private function sendEmailtoUser($to,$subject,$message){
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'modisoft1@gmail.com',// Change this to admin Email
            'smtp_pass' => 'casamoha',// Change this to admin pass
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->from('modisoft1@gmail.com', 'myname');
        $this->email->to($to); 

        $this->email->subject($subject);
        $this->email->message($message);  

        $result = $this->email->send();
    }
    
    /*
    *   return the id of a given cin
    */
    public function getId($cin)
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
                    ->where('isValid',"1")
                    ->get();
        if ( $query->num_rows() > 0 )
        {
            return true;
        }else{
            return false;
        }
    }
    
    /* By Essaidi : This fct returns the type of the Etudiant (ensa,cnc...) */
    public function getEtudiantWho($id){
        if((int) $this->db->where("id_etudiant",$id)->count_all_results("etudiant_ensa") > 0){
            return "ensa";
        }else if((int) $this->db->where("id_etudiant",$id)->count_all_results("etudiant_cnc") > 0){
            return "cnc"; // edit by Essalhi =D (kanti dayr ensa :p)
        }else if((int) $this->db->where("id_etudiant",$id)->count_all_results("etudiant_3eme_4eme") > 0){
            return "3and4Year";
        }
    }
    
    /* By Essaidi : Returns an array with etudiant's info */
    /*wach nta khayfna lanchefrok !!!!*/
    public function getProfile($id){
        $query = $this->db->select("*")
                    ->from($this->table)
                    ->where('id',$id)
                    ->limit( 1)
                    ->get();
                    
        $row = $query->row_array();
        if((int) $this->db->where("id_etudiant",$id)->count_all_results("etudiant_ensa") > 0){
            $row["who"]= "ensa";
            
            $query2 = $this->db->select("*")
                    ->from("etudiant_ensa")
                    ->where('id_etudiant',$id)
                    ->limit( 1)
                    ->get();
                    
            $row2 = $query2->row_array();
            
            $row["type_bac"] = $row2["type_bac"];
            $row["note_bac"] = $row2["note_bac"];
            $row["note_1er_annee"] = $row2["note_1er_annee"];
            $row["classement_1er_annee"] = $row2["classement_1er_annee"];
            $row["note_2eme_annee"] = $row2["note_2eme_annee"];
            
            $query3 = $this->db->select("*")
                    ->from("filiere_choix")
                    ->where('id',$row["id_choix"])
                    ->limit(1)
                    ->get();
                    
            $row3 = $query3->row_array();
            
            $row["choix1"] = $row3["choix1"];
            $row["choix2"] = $row3["choix2"];
            $row["choix3"] = $row3["choix3"];
            
        }else if((int) $this->db->where("id_etudiant",$id)->count_all_results("etudiant_cnc") > 0){
            $row["who"]= "cnc";
            
            $query2 = $this->db->select("*")
                    ->from("etudiant_cnc")
                    ->where('id_etudiant',$id)
                    ->limit( 1)
                    ->get();
                    
            $row2 = $query2->row_array();
            
            $row["type_bac"] = $row2["type_bac"];
            $row["note_bac"] = $row2["note_bac"];
            $row["filiere_cp"] = $row2["filiere_cp"];
            $row["etablissement_cp"] = $row2["etablissement_cp"];
            $row["ville_cp"] = $row2["ville_cp"];
            $row["range_cnc"] = $row2["range_cnc"];
            
            // A faire : Add the filiere
        }else if((int) $this->db->where("id_etudiant",$id)->count_all_results("etudiant_3eme_4eme") > 0){
            $row["who"]= "3and4Year";
            
            $query2 = $this->db->select("*")
                    ->from("etudiant_3eme_4eme")
                    ->where('id_etudiant',$id)
                    ->limit( 1)
                    ->get();
                    
            $row2 = $query2->row_array();
            
            $row["type_diplome"] = $row2["type_diplome"];
            $row["etablissement_diplome"] = $row2["etablissement_diplome"];
            
            // A faire : Add the filiere
        }
        
        return $row;
    }

    
    /* Retourne la liste des etudiants selon le type */
    public function getListEtudiants(){
        $etudiants = $this->db->select("*")
                    ->from($this->table)
                    ->where("deleted",0)
                    ->where("isValid",1)
                    ->get()
                    ->result();
        $rows = array("etudiants" => array());
        foreach($etudiants as $etudiant){
            $rows["etudiants"][$etudiant->id] = array(
                "id" => $etudiant->id,
                "email" => $etudiant->email,
                "nom" => $etudiant->nom,
                "prenom" => $etudiant->prenom,
                "cne" => $etudiant->cne,
                "cin" => $etudiant->cin,
                "niveau" => $etudiant->niveau,
                "filiere" => $etudiant->filiere,
                "civilite" => $etudiant->civilite,
                "nationalite" => $etudiant->nationalite,
                "photo" => $etudiant->photo,
                "date_naissance" => $etudiant->date_naissance,
                "lieu_naissance" => $etudiant->lieu_naissance,
                "tel" => $etudiant->tel,
                "gsm" => $etudiant->gsm,
                "adresse" => $etudiant->adresse,
                "ville" => $etudiant->ville,
                "profession_pere" => $etudiant->profession_pere,
                "profession_mere" => $etudiant->profession_mere,
                "matricule" => $etudiant->matricule,
                "created_at" => $etudiant->created_at,
                "id_choix" => $etudiant->id_choix
            );
            if((int) $this->db->where("id_etudiant",$etudiant->id)->count_all_results("etudiant_ensa") > 0){
                $rows["etudiants"][$etudiant->id]["who"]= "ensa";

                $query2 = $this->db->select("*")
                        ->from("etudiant_ensa")
                        ->where('id_etudiant',$etudiant->id)
                        ->limit( 1)
                        ->get();

                $row2 = $query2->row_array();

                $rows["etudiants"][$etudiant->id]["type_bac"] = $row2["type_bac"];
                $rows["etudiants"][$etudiant->id]["note_bac"] = $row2["note_bac"];
                $rows["etudiants"][$etudiant->id]["note_1er_annee"] = $row2["note_1er_annee"];
                $rows["etudiants"][$etudiant->id]["classement_1er_annee"] = $row2["classement_1er_annee"];
                $rows["etudiants"][$etudiant->id]["note_2eme_annee"] = $row2["note_2eme_annee"];

                $query3 = $this->db->select("*")
                        ->from("filiere_choix")
                        ->where('id',$rows["etudiants"][$etudiant->id]["id_choix"])
                        ->limit(1)
                        ->get();

                $row3 = $query3->row_array();

                $rows["etudiants"][$etudiant->id]["choix1"] = $row3["choix1"];
                $rows["etudiants"][$etudiant->id]["choix2"] = $row3["choix2"];
                $rows["etudiants"][$etudiant->id]["choix3"] = $row3["choix3"];

            }else if((int) $this->db->where("id_etudiant",$id)->count_all_results("etudiant_cnc") > 0){
                $rows["etudiants"][$etudiant->id]["who"]= "cnc";

                $query2 = $this->db->select("*")
                        ->from("etudiant_cnc")
                        ->where('id_etudiant',$id)
                        ->limit( 1)
                        ->get();

                $row2 = $query2->row_array();

                $rows["etudiants"][$etudiant->id]["type_bac"] = $row2["type_bac"];
                $rows["etudiants"][$etudiant->id]["note_bac"] = $row2["note_bac"];
                $rows["etudiants"][$etudiant->id]["filiere_cp"] = $row2["filiere_cp"];
                $rows["etudiants"][$etudiant->id]["etablissement_cp"] = $row2["etablissement_cp"];
                $rows["etudiants"][$etudiant->id]["ville_cp"] = $row2["ville_cp"];
                $rows["etudiants"][$etudiant->id]["range_cnc"] = $row2["range_cnc"];

                $query3 = $this->db->select("*")
                        ->from("filiere_choix")
                        ->where('id',$row["id_choix"])
                        ->limit(1)
                        ->get();

                $row3 = $query3->row_array();

                $rows["etudiants"][$etudiant->id]["choix1"] = $row3["choix1"];
                $rows["etudiants"][$etudiant->id]["choix2"] = $row3["choix2"];
                $rows["etudiants"][$etudiant->id]["choix3"] = $row3["choix3"];
            }else if((int) $this->db->where("id_etudiant",$id)->count_all_results("etudiant_3eme_4eme") > 0){
                $rows["etudiants"][$etudiant->id]["who"]= "3and4Year";

                $query2 = $this->db->select("*")
                        ->from("etudiant_3eme_4eme")
                        ->where('id_etudiant',$id)
                        ->limit( 1)
                        ->get();

                $row2 = $query2->row_array();

                $rows["etudiants"][$etudiant->id]["type_diplome"] = $row2["type_diplome"];
                $rows["etudiants"][$etudiant->id]["etablissement_diplome"] = $row2["etablissement_diplome"];

                $query3 = $this->db->select("*")
                        ->from("filiere_choix")
                        ->where('id',$row["id_choix"])
                        ->limit(1)
                        ->get();

                $row3 = $query3->row_array();

                $rows["etudiants"][$etudiant->id]["choix1"] = $row3["choix1"];
                $rows["etudiants"][$etudiant->id]["choix2"] = $row3["choix2"];
                $rows["etudiants"][$etudiant->id]["choix3"] = $row3["choix3"];
            }
        }
        return $rows;
    }
    
    public function delete($idEtudiant){
        $this->db->where('id', $idEtudiant);
        $this->db->update($this->table, array("deleted" => 1)); 
    }
	
}