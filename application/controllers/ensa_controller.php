<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ensa_controller extends CI_Controller {

	
	 function __construct()
	{
		parent::__construct();
	}

	public function index()
	{


		$this->load->model('etudiant_model') ;
		$this->connexion();
		
	}

	public function inscription_ensa()
	{
		

		$this->load->view('form_ensa.php');
	}
	

	private  function connexion( )
		{
			
		
	 	if( $this->form_validation->run('ensa_rules'))
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
				
				$info['choix1']=$this->input->post('choix1');
				$info['choix2']=$this->input->post('choix2');
				$info['choix3']=$this->input->post('choix3');

				$info['who']= $this->input->post('who');


				$config['upload_path'] = './assets/img';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '100';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('photo')) // verify image errors
				{
					$error = array('error' => $this->upload->display_errors());

					$this->load->view('form_ensa.php', $error);
				}
				else if($this->etudiant_model->inscription($info))
					$this->load->view('index');
				else
				{
					$message = array('inexistant' =>  true );
					$this->load->view('form_ensa.php',$message);
				}
				
			}
			else
			{
				
				$this->load->view('form_ensa.php');
			}
		
			
		}
}
