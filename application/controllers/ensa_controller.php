<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ensa_controller extends CI_Controller {

	
	 
	public function index()
	{


		$this->load->model('etudiant_model') ;
		$this->connexion();
		
	}

	public function inscription_ensa()
	{
		$this->load->view('form_ensa.html.twig');
	}
	

	private  function connexion( )
		{
			
			//form verification

			$this->form_validation->set_rules('nom','nom','required|encode_php_tags');
			$this->form_validation->set_rules('prenom','prenom','required|encode_php_tags');
			$this->form_validation->set_rules('cne','CNE','required|encode_php_tags');
			$this->form_validation->set_rules('cin','CIN','required|encode_php_tags');
			$this->form_validation->set_rules('nationalite','nationalité','required|alpha_dash|encode_php_tags');
			$this->form_validation->set_rules('lieu_naissance','Lieu de naissance','required|alpha|encode_php_tags');
			$this->form_validation->set_rules('date_naissance','Date de naissance','required|encode_php_tags');
			$this->form_validation->set_rules('tel','téléphone','required|integer|exact_length[10]|encode_php_tags');
			$this->form_validation->set_rules('gsm','gsm','encode_php_tags');
			$this->form_validation->set_rules('email','email','required|valid_email|encode_php_tags');
			$this->form_validation->set_rules('adresse','adresse','required|alpha_dash|encode_php_tags');
			$this->form_validation->set_rules('ville','ville','required|alpha_dash|encode_php_tags');
			$this->form_validation->set_rules('profession_pere','profession de père','required|alpha_dash|encode_php_tags');
			$this->form_validation->set_rules('profession_mere','profession de mère','required|alpha_dash|encode_php_tags');
			$this->form_validation->set_rules('note_bac','Note de bac','is_numeric|encode_php_tags');
			$this->form_validation->set_rules('note_1er_annee','note 1er année','is_numeric|encode_php_tags');
			$this->form_validation->set_rules('classement','classement','integer|encode_php_tags');

			if( !$this->form_validation->run( )) //remove the ! to enable form validation
			{
				$info['nom']=$this->input->post('nom');
				$info['prenom']=$this->input->post('prenom');
				$info['photo']=$_FILES['photo'];
				$info['civilite']=$this->input->post('civilite');
				$info['password']=$this->input->post('password');
				$info['cne']=$this->input->post('cne');
				$info['cin']=$this->input->post('cin');
				$info['nationalite']=$this->input->post('nationalite');
				$info['lieu_naissance']=$this->input->post('lieu_naissance');
				$info['date_naissance']=$this->input->post('date_naissance');
				$info['tel']=$this->input->post('tel');

				$info['gsm']=$this->input->post('gsm');
				$info['email']=$this->input->post('email');
				$info['adresse']=$this->input->post('adresse');
				$info['ville']=$this->input->post('ville');
				$info['profession_pere']=$this->input->post('profession_pere');
				$info['profession_mere']=$this->input->post('profession_mere');
				$info['matricule']=$this->input->post('1');
				$info['note_bac']=$this->input->post('note_bac');
				$info['type_bac']=$this->input->post('type_bac');

				$info['note_1er_annee']=$this->input->post('note_1er_annee');
				$info['classement']=$this->input->post('classement');
				
				$info['filiere_cp']=$this->input->post('filiere_cp');
				$info['etablissement_cp']=$this->input->post('etablissement_cp');
				$info['ville_cp']=$this->input->post('ville_cp');
				$info['range_cnc']=$this->input->post('range_cnc');

				$info['diplome']=$this->input->post('diplome');
				$info['filiere']=$this->input->post('filiere');				
				$info['type_diplome']=$this->input->post('type_diplome');
				$info['etablissement_diplome']=$this->input->post('etablissement_diplome');

				$info['who']= $this->input->post('who');
				$this->etudiant_model->inscription($info);
				$this->load->view('index');
			}
			else
			{
				$this->load->view('form_ensa.html.twig');
			}
		
			
		}
}
