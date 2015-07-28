<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	
	 
	public function inscription()
	{
		$this->load->view('inscription.html.twig');
	}
}
