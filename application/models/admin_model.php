<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Admin_model extends CI_model{
    protected $filiere_number = 4;

    /*

    retrun array of numbers
    example $choix['informatique']=3 : 3 students choosed informatique as first choice

    */

    public function statistics(){
        $choix = array();

        $choix['total']=$this->count(array('choix2 !=' =>'NONE'));// total number of chosen filiere
        $choix['industriel'] = $this->count($arrayName = array('choix1' => 'D','choix2 !=' =>'NONE'));
        $choix['informatique'] = $this->count($arrayName = array('choix1' => 'I','choix2 !=' =>'NONE'));

        $choix['GTR'] = $this->count($arrayName = array('choix1' => 'T','choix2 !=' =>'NONE'));
        $choix['GPMC'] = $this->count($arrayName = array('choix1' => 'P','choix2 !=' =>'NONE'));
        
        arsort($choix);
        $place_number=$this->place_number($choix);
        $choix['p_industriel']=$place_number['industriel'];
        $choix['p_informatique']=$place_number['informatique'];
        $choix['p_GTR']=$place_number['GTR'];
        $choix['p_GPMC']=$place_number['GPMC'];
        return $choix;
    }
    
    public function count($where=array())
    {
            return (int) $this->db->where($where)->count_all_results("filiere_choix");
    }

    # this function makes changes in the database, it will update "final_filiere" in the table "etudiant_ensa"

    public function attribution($order)
    {
        $place_number=array() ;
        $data=$this->statistics();
        arsort($data);
        $place_number=$this->place_number($data);//using place_number() that find for each filiere how much place are available

        $query = $this->db->order_by("moyen","desc")->get('notes'); // getting student's name ordred by thier marks



        foreach ($query->result() as $row)// for each student : row->nom, row->prenom etc
        {

            $query1=$this->db->select('id_choix,id')->where('cin',$row->cin)->where('nom',$row->nom)->where('prenom',$row->prenom)->where('isValid',"1")->get('etudiant');
            $result = $query1->row_array();//result may be $result['id'] which is the id of a student or $result['id_choix'] of filiere choices

            $chosen_filere=$this->db->where('id',$result['id_choix'])->get('filiere_choix');

            foreach ($chosen_filere->result() as $filiere_choix) {
                 // $filiere_choix->choix1 can be "GTR", which mean : if there is more available places in GTR

                $tranlation = array( 'I' => "informatique", 
                                     'D' => "industriel", 
                                     'P' => "GPMC", 
                                     'T' => "GTR");

                if($place_number[$tranlation[$filiere_choix->choix1]]>0)
                {
                        $this->db->set('final_filiere',$filiere_choix->choix1)->where('id_etudiant',$result['id'])->update('etudiant_ensa');
                        $place_number[$tranlation[$filiere_choix->choix1]]=$place_number[$tranlation[$filiere_choix->choix1]]-1;


                }elseif ($place_number[$tranlation[$filiere_choix->choix2]]>0) {
                        $this->db->set('final_filiere',$filiere_choix->choix2)->where('id_etudiant',$result['id'])->update('etudiant_ensa');
                        $place_number[$tranlation[$filiere_choix->choix2]]=$place_number[$tranlation[$filiere_choix->choix2]]-1;



                }elseif ($place_number[$tranlation[$filiere_choix->choix3]]>0) {
                        $this->db->set('final_filiere',$filiere_choix->choix3)->where('id_etudiant',$result['id'])->update('etudiant_ensa');
                        $place_number[$tranlation[$filiere_choix->choix3]]=$place_number[$tranlation[$filiere_choix->choix3]]-1;




                }else{
                        foreach ($place_number as $key => $value) {
                                if($value>0)
                                {
                                        $this->db->set('final_filiere',array_search($key,$tranlation))->where('id_etudiant',$result['id'])->update('etudiant_ensa');
                                        $place_number[$key]=$place_number[$key]-1;

                                }
                        }
                }

                $this->noChoise(); // pour les étudiants qui n'ont pas fait l'inscription
             }
        }

        /*----------------------------------end of the algorithme---------------------------------------------------------*/


        # recuperation of data that will be shown in the view page
        if($order=="nom")
        $query=$this->db->select('nom,prenom,moyen')->order_by('nom','asc')->get('notes');
        else
        $query=$this->db->select('nom,prenom,moyen')->order_by('moyen','desc')->get('notes');



        $data['information'] = array();//array that contains the informations that will be shown in the view

        $i=0;
        foreach ($query->result() as $value) {



                $n_info=$this->db->select('id_choix,id')->where('nom', $value->nom)->where('prenom', $value->prenom)->get('etudiant');
                $info = $n_info->row_array();

                 $n_filiere = $this->db->where('id',$info['id_choix'])->get('filiere_choix');
                 $filiere = $n_filiere->row_array();


                 $n_final_filiere = $this->db->where('id_etudiant',$info['id'])->get('etudiant_ensa');
                 $final_filiere = $n_final_filiere->row_array();

                 if ($final_filiere['final_filiere']=="I") {
                        $final_filiere['final_filiere']="Informatique";
                 }
                 if ($final_filiere['final_filiere']=="D") {
                        $final_filiere['final_filiere']="Industriel";
                 }
                 if ($final_filiere['final_filiere']=="T") {
                         $final_filiere['final_filiere']="Télécom";
                 }
                 if ($final_filiere['final_filiere']=="P") {
                        $final_filiere['final_filiere']="Procédés";

                 }

                 $color = array('Informatique' =>'info'  ,
                                'Industriel' => 'danger', 
                                'Télécom' => 'success' ,
                                'Procédés' => 'warning'
                                );

                 $row=array(  'nom'   	 	   =>  $value->nom,
                              'prenom'    	 =>   $value->prenom,
                              'moyen'   	   =>   $value->moyen ,
                              'choix'  		    => $filiere['choix1'].$filiere['choix2'].$filiere['choix3'], // example : IDP
                              'final_filiere' => $final_filiere['final_filiere'], //example : informatique
                              'color'        => $color[$final_filiere['final_filiere']]);
                 $data['information'][$i]=$row;
                 $i++;


        }



        //$data['information'][0]=$array1;
        return $data;
    }

       private function noChoise()
        {

        }
		/*

		return array of number
		each number indicates how muche places are possible for each filiere
	
		*/
		private function place_number($data=array())
		{

			$A = ($this->count(array('choix2 !=' =>'NONE')))%$this->filiere_number; // tous les choix / 4 : ex 18/4 : A=2
			$B = ($this->count(array('choix2 !=' =>'NONE')))-$A; // tous les choix - a, B= 18 - 2 = 16

			$place_number['industriel']=$B/$this->filiere_number; // chaque filière a droit au moins à 4 places
			$place_number['informatique']=$B/$this->filiere_number;
			$place_number['GTR']=$B/$this->filiere_number;
			$place_number['GPMC']=$B/$this->filiere_number;
			$i = -1;
			foreach ($data as $key => $value) {
				
				if($i<0)
				{
					$i=0; //first element in $data is total, we need to skip this loop
				}
				else if($i<$A) // on affecte une place suplémentaire aux filières les plus demandées
				{
					$i++;
					$place_number[$key]+=1;
				}
			}

			return $place_number;
		}
    
        /* this fct insert students in db */
        public function insertStudentsFromExcelFile($students){
            foreach($students as $student){
                $this->db->set('nom',$student['B'])
                               ->set('prenom',$student['C'])
                               ->set('cne',$student['E'])
                               ->set('cin',$student['D'])
                               ->insert('etudiant'); 
            }
        }
        
        /* this fct insert notes in db */
        public function insertNotesFromExcelFile($notes){
         $this->db->empty_table('notes');
            foreach($notes as $note){
                $this->db->set('nom',$note['B'])
                               ->set('prenom',$note['C'])
                               ->set('moyen',$note['E'])
                               ->set('cin',$note['D'])
                               ->insert('notes'); 
            }
        }
        
    public function login($username,$password){
        if($password == "" || $username == ""){
            return false;
        }
        
        $query = $this->db->select("id")
                    ->from("admin")
                    ->where('password',$password)
                    ->where('username',strtolower($username))
                    ->where('deleted',0)
                    ->get();
        if ( $query->num_rows() > 0 )
        {
            return true;
        }else{
            return false;
        }
    }
    
    public function getId($username)
    {
        $query = $this->db->select("*")
                    ->from("admin")
                    ->where('username',$username)
                    ->limit( 1)
                    ->get();
                    
        $row = $query->row_array();
                   
        return $row['id'];
    }

}




?>