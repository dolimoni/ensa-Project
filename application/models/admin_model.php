<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Admin_model extends CI_model{

		
		protected $filiere_number = 4;

		/*
		
		retrun array of numbers
		example $choix['informatique']=3 : 3 students choosed informatique as first choice

		*/

		public function statistics()
		
		{
			$choix = array();

			$choix['total']=$this->count();// total number of chosen filiere
			$choix['industriel'] = $this->count($arrayName = array('choix1' => 'Génie industriel'));
			$choix['informatique'] = $this->count($arrayName = array('choix1' => 'Génie informatique'));
			
			$choix['GTR'] = $this->count($arrayName = array('choix1' => 'Génie télécommunication et réseau'));
			$choix['GPMC'] = $this->count($arrayName = array('choix1' => 'Génie des procédés et M.C'));

			return $choix;
			

		}


		public function count($where=array())
		{
			return (int) $this->db->where($where)->count_all_results("filiere_choix");
		}



		
		# this function makes changes in the database, it will update "final_filiere" in the table "etudiant_ensa"
		
		public function attribution()
		{

			$data=$this->statistics();
			arsort($data);


			$place_number=array() ;
			$query = $this->db->order_by("moyen","desc")->get('notes'); // getting student's name ordred by thier marks
			$place_number=$this->place_number($data);//using place_number that find for each filiere how much place are available

				foreach ($query->result() as $row)// for each student : row->nom, row->prenom etc
				{
					
				    $query1=$this->db->select('id_choix,id')->where('nom',$row->nom)->where('prenom',$row->prenom)->get('etudiant');
				    $result = $query1->row_array();//result may be $result['id'] which is the id of a student or $result['id_choix'] of filiere choices

				    $chosen_filere=$this->db->where('id',$result['id_choix'])->get('filiere_choix');

				    foreach ($chosen_filere->result() as $filiere_choix) {
				    	 // $filiere_choix->choix1 can be "GTR", which mean : if there is more available places in GTR
				    	if($place_number[$filiere_choix->choix1]>0)
				    	{
				    		$this->db->set('final_filiere',$filiere_choix->choix1)->where('id_etudiant',$result['id'])->update('etudiant_ensa');
				    		
				    		$place_number[$filiere_choix->choix1]=$place_number[$filiere_choix->choix1]-1;
				    	

				    	}elseif ($place_number[$filiere_choix->choix2]>0) {
				    		$this->db->set('final_filiere',$filiere_choix->choix2)->where('id_etudiant',$result['id'])->update('etudiant_ensa');
				    		$place_number[$filiere_choix->choix2]=$place_number[$filiere_choix->choix2]-1;
				    	

				    		
				    	}elseif ($place_number[$filiere_choix->choix3]>0) {
				    		$this->db->set('final_filiere',$filiere_choix->choix3)->where('id_etudiant',$result['id'])->update('etudiant_ensa');
				    		$place_number[$filiere_choix->choix3]=$place_number[$filiere_choix->choix3]-1;




				    	}else{
				    		foreach ($place_number as $key => $value) {
				    			if($value>0)
				    			{
				    				$this->db->set('final_filiere',$key)->where('id_etudiant',$result['id'])->update('etudiant_ensa');
				    				$place_number[$key]=$place_number[$key]-1;
				    				echo "choix4";

				    			}
				    		}
				    	}
				    }
				}
			
			
		}


		/*

		return array of number
		each number indicates how muche places are possible for each filiere
	
		*/
		private function place_number($data=array())
		{
			$a = ($this->count())%$this->filiere_number;
			$b = ($this->count())-$a;

			$place_number['Génie informatique']=$b/$this->filiere_number;
			$place_number['Génie industriel']=$b/$this->filiere_number;
			$place_number['Génie télécommunication et réseau']=$b/$this->filiere_number;
			$place_number['Génie des procédés et M.C']=$b/$this->filiere_number;
			$i = -1;
			foreach ($data as $key => $value) {
				
				if($i<0)
				{
					$i=0; //first element in $data is total, we need to skip this loop
				}
				else if($i<$a)
				{
					$i++;
					$place_number[$key]=$b/$this->filiere_number+1;
				}
			}
			return $place_number;
		}

}




?>