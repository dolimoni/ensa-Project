<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Filiere_controller extends CI_Controller
{
	
	public function __construct()
		{
		parent::__construct();
		$this->load->database('ensa_project');
		$this->load->helper('url');
		}
public function gestionFiliere(){
        
		$this->load->model("filiere_model");
        $data['results'] = $this->filiere_model->getListFiliere();
        $this->load->view('Gestion_filiere',$data);
		
		
    }

	  public function supprimerFiliere($idFil){
        $this->load->model('filiere_model') ;
        $this->filiere_model->deleteById($idFil);
        redirect('Filiere_controller/gestionFiliere');
		
    }
	
	// ajouter une nvlle filiere
	public function ajouterFiliere(){
        $this->load->model('filiere_model') ;
		//validation du formulaire
		$this->load->library('form_validation');
		
		
		$this->form_validation->set_rules('titre', '"Symbole"','trim|required');
		$this->form_validation->set_rules('abreviation', '" abreviation "','trim|required');
		$this->form_validation->set_rules('signification', '"signification de la filière"','trim|required');

		if($this->form_validation->run())
		{
			// Le formulaire est valide
			
			$filiere['titre']=$this->input->post('titre');
			$filiere['abreviation']=$this->input->post('abreviation');
			$filiere['signification']=$this->input->post('signification');
		
		
		$this->filiere_model->addfiliere($filiere);
        redirect('Filiere_controller/gestionFiliere');
		       
		}
		else
		{
			// Le formulaire est invalide ou vide
		//redirect('Filiere_controller/editFiliere/'.$filiere['id']);
		$this->load->view('add_filiere.php');
		}
        
		
    }
	
// marche
	public function editFiliere($idFil){
        $this->load->model('filiere_model');
     
        $data['results'] = $this->filiere_model->getFiliereById($idFil);
                
        $this->load->view('edit_Filiere',$data);
	}
	
	public function editFiliereConf(){
       
	   $this->load->model('filiere_model') ;
	/*
		$filiere['id']=$this->input->post('id');
		$filiere['titre']=$this->input->post('titre');
		$filiere['abreviation']=$this->input->post('abreviation');
		$filiere['signification']=$this->input->post('signification');
		
		*/
		/*
		echo '<br>id est '.$filiere['id'];
		echo '<br>titre est '.$filiere['titre'];
        echo '<br>abr est '.$filiere['abreviation'];
		 echo '<br>signification est '.$filiere['signification'];
		 
		 */
		 $filiere['id']=$this->input->post('id');
	
	//validation du formulaire
		$this->load->library('form_validation');
		
		
		$this->form_validation->set_rules('titre', '"Symbole"','trim|required');
		$this->form_validation->set_rules('abreviation', '" abreviation "','trim|required');
		$this->form_validation->set_rules('signification', '"signification de la filière"','trim|required');

		if($this->form_validation->run())
		{
				// Le formulaire est valide
				
				$filiere['titre']=$this->input->post('titre');
				$filiere['abreviation']=$this->input->post('abreviation');
				$filiere['signification']=$this->input->post('signification');
				
			
			$this->filiere_model->editFiliere($filiere);
				   
			redirect('Filiere_controller/gestionFiliere');
				   
		}
		else
		{
			// Le formulaire est invalide ou vide
			redirect('Filiere_controller/editFiliere/'.$filiere['id']);
		}
		
 }
		//ajouter une nvlle filiere
    }
	?>