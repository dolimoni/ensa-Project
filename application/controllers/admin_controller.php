<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller
{


	public function statistics(){


		$this->load->model('admin_model');
		
		#choix contains for each filiere how many student choosed this filiere
		#example : $choix['GPMC'] = 5 : 5 students choosed GPMC as first choise
		$choix = $this->admin_model->statistics();
				
		
		$this->load->view('statistics.php',$choix);
	}

	# this function makes changes in the database, it will update "final_filiere" in the table "etudiant_ensa"
	public function attribution()
	{
		$this->load->model('admin_model');
		 $this->admin_model->attribution();
	}
}

?>