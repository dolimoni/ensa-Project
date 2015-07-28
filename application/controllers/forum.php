<?php

class Forum extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		//	« Décommenter » cette ligne pour charger le helper url
	$this->load->helper('url');
	}
	
	public function accueil()
	{
		//	On inclut la vue ./application/views/test/accueil.php
		//$this->load->view('formulaire');
		$this->output->enable_profiler(true);
		echo "dolimoni";

	}
	public function index()
	{
		$this->output->enable_profiler(true);
		echo "dolimoni";
	}

	public function connexion()
	{
		//	Chargement de la bibliothèque
		$this->load->library('form_validation');
	 
	 	
		$this->form_validation->set_rules('pseudo', '"Nom d\'utilisateur"', 'trim|required|min_length[5]|max_length[52]|alpha_dash|encode_php_tags|xss_clean');
		$this->form_validation->set_rules('mdp',    '"Mot de passe"',       'trim|required|min_length[5]|max_length[52]|alpha_dash|encode_php_tags|xss_clean');

		if($this->form_validation->run())
		{
			//	Le formulaire est valide
			$this->load->view('connexion_reussie');
		}
		else
		{
			//	Le formulaire est invalide ou vide
			$this->load->view('formulaire');
		}
	}
}