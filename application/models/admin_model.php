<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Admin_model extends CI_model{

		public function statistics()
		
		{
			$choix = array();

			$choix['total']=$this->count();// total number of chosen filiere
			$choix['industriel'] = $this->count($arrayName = array('choix1' => 'Génie industriel'));
			$choix['informatique'] = $this->count($arrayName = array('choix1' => 'Génie informatique'));
			$choix['GPMC'] = $this->count($arrayName = array('choix1' => 'Génie des procédés et M.C'));
			$choix['GTR'] = $this->count($arrayName = array('choix1' => 'Génie télécommunication et réseau'));

			return $choix;
			

		}
		public function count($where=array())
		{
			return (int) $this->db->where($where)->count_all_results("filiere_choix");
		}

}




?>