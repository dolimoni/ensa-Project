<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cnc_controller extends CI_Controller {

	
	 
	public function index()
	{


		$this->load->model('etudiant_model') ;
		$this->connexion();
		
	}

	
	public function inscription_cnc()
	{
		$this->load->view('form_cnc.php');

	}
	

	private  function connexion( )
		{
			
			$this->load->library('form_validation');


			if( $this->form_validation->run('cnc_rules')) //remove the ! to enable form validation
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
				$info['note_bac']=$this->input->post('note_bac');
				$info['type_bac']=$this->input->post('type_bac');


				//information cp
				$info['filiere_cp']=$this->input->post('filiere_cp');
				$info['etablissement_cp']=$this->input->post('etablissement_cp');
				$info['ville_cp']=$this->input->post('ville_cp');
				$info['range_cnc']=$this->input->post('range_cnc');

				//filière
				$info['choix1']=$this->input->post('choix1');


				$info['who']= $this->input->post('who');

                $config['upload_path'] 	= './assets/img';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '1024';
                $config['max_width']  = '1024';
                $config['max_height']  = '768';
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('photo')) // verify image errors
                {
                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('form_cnc.php', $error);
                }
                else if($this->etudiant_model->isRegistredUser($info['nom'],$info['prenom'],$info['cin'],$info['cne']))
                {
                    $error = array('error' => "L'inscription a été déja effectuée");
                    $this->load->view('form_cnc.php', $error);
                }
                else if($this->etudiant_model->inscription($info))
                    $this->load->view('index');
                else
                {
                    $message = array('inexistant' =>  true );
                    $this->load->view('form_cnc.php',$message);
                }
			}
			else
			{
				$this->load->view('form_cnc.php');
			}
		
			
		}
    private  function editProfile( )
    {
        $this->load->library('form_validation');
        $this->load->model("etudiant_model");
        if( !$this->form_validation->run('cnc_rules_edit')) //remove the ! to enable form validation
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
                $info['note_bac']=$this->input->post('note_bac');
                $info['type_bac']=$this->input->post('type_bac');


                //information cp
                $info['filiere_cp']=$this->input->post('filiere_cp');
                $info['etablissement_cp']=$this->input->post('etablissement_cp');
                $info['ville_cp']=$this->input->post('ville_cp');
                $info['range_cnc']=$this->input->post('range_cnc');

                //filière
                $info['filiere']=$this->input->post('filiere');


                $info['who']= $this->input->post('who');
                $this->etudiant_model->editProfile($info);
                
                $message = "Votre profile a été modifié avec succés, Vous ouver le conulter içi";
                sendEmail($info['email'], "Modification du profile - Administration ENSA Safi", $message);
                redirect("welcome");
        }
        else
        {
            $id = $this->session->userdata("id");
            $data = $this->etudiant_model->getProfile($id);
            $this->load->view('edit_profile',$data);
        }
    }
}
