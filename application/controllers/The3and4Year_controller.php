<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class The3and4Year_controller extends CI_Controller {

	
	 
	public function index()
	{


		$this->load->model('etudiant_model') ;
		$this->connexion();
		
	}
	public function inscription_3and4Year()
	{
		$this->load->view('form_3and4Year.php');
	}

	private  function connexion( )
		{
			



			if( !$this->form_validation->run('3and4Year_rules')) //remove the ! to enable form validation
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

				//information diplome
				$info['note_bac']=$this->input->post('note_bac');
				$info['type_bac']=$this->input->post('type_bac');
				$info['type_diplome']=$this->input->post('type_diplome');
				$info['etablissement_diplome']=$this->input->post('etablissement_diplome');

				//filière
				$info['filiere']=$this->input->post('filiere');	

				$info['who']= $this->input->post('who');
				$this->etudiant_model->inscription($info);
				$this->load->view('index');
			}
			else
			{
				$this->load->view('form_3and4Year.php');
			}
		
			
		}
                
    private  function editProfile( )
    {
        $this->load->model("etudiant_model");
        if( !$this->form_validation->run('3and4Year_rules_edit')) //remove the ! to enable form validation
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
                $info['date_naissance']=$this->input->post('date_naissance_year')
                                    ."-".$this->input->post('date_naissance_month')
                                    ."-".$this->input->post('date_naissance_day');
                $info['tel']=$this->input->post('tel');

                $info['gsm']=$this->input->post('gsm');
                $info['email']=$this->input->post('email');
                $info['adresse']=$this->input->post('adresse');
                $info['ville']=$this->input->post('ville');
                $info['profession_pere']=$this->input->post('profession_pere');
                $info['profession_mere']=$this->input->post('profession_mere');
                $info['matricule']=$this->input->post('1');

                //information diplome
                $info['note_bac']=$this->input->post('note_bac');
                $info['type_bac']=$this->input->post('type_bac');
                $info['type_diplome']=$this->input->post('type_diplome');
                $info['etablissement_diplome']=$this->input->post('etablissement_diplome');

                //filière
                $info['filiere']=$this->input->post('filiere');	

                $info['who']= $this->input->post('who');
                $this->etudiant_model->editProfile($info);
                $this->load->view('index');
        }
        else
        {
            $id = $this->session->userdata("id");
            $data = $this->etudiant_model->getProfile($id);
            $this->load->view('edit_profile',$data);
        }
    }
}
