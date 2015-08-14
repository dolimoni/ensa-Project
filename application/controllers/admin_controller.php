<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller{


	public function statistics(){
		$this->load->model('admin_model');

		
		$choix = $this->admin_model->statistics();
				
		
		$this->load->view('statistics.php',$choix);
	}
}

?>