<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Etudiant_controller extends CI_Controller {

	
	 
	public function login()
	{

		$this->load->model('etudiant_model') ;

				$password=$this->input->post('password');
				$cne=$this->input->post('cne');
				$cin=$this->input->post('cin');
				if($this->etudiant_model->login($cin,$cne,$password))
				{
					$this->load->view('admin.php');

				}else
				{
					$this->load->view('index.php');
				}
			
		
	}
    
    
	
}
