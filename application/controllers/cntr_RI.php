<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cntr_RI extends CI_Controller
{
	
	public function __construct()
		{
		parent::__construct();
		$this->load->database('ensa_project');
		$this->load->helper('url');
		$this->load->model('Model_RI') ;
		}
		
		
public function supp_fichier($file){
		$this->Model_RI->supprimerFichier($file);
		//redirect('cntr_RI/');
		$this->load->view('ajout_admin.php');
}
public function gestionRI_admin(){
        
		//$this->load->model("filiere_model");
        //$data['results'] = $this->filiere_model->getListFiliere();
        $this->load->view('Gestion_reinscription_admin.php');
		
		
    }
	//partie d'ajout des fichiers par l'admin	
public function RI_admin()
{
	$this->load->model('Model_RI') ;
		// Chargement de la bibliothèque
		$this->load->library('form_validation');
		
		//$this->form_validation->set_rules('userfile', '"Choix de fichier"','trim|required');
		$this->form_validation->set_rules('fichier', '"Type de fichier"','trim|required');
	
		if($this->form_validation->run())
		{
			// Le formulaire est valide
			//$fichier['userfile']=$this->input->post('userfile');
			$fichier['fichier']=$this->input->post('fichier');
			
			$this->Model_RI->do_upload($fichier);
			//revenir à la mm page apres l'upload
			//redirect('Cntr_RI/gestionRI_admin');
		}
		else
		{
			// Le formulaire est invalide ou vide
			$this->load->view('Gestion_reinscription_admin.php');
            
		}
	
}


//partie de telechargement des fichiers par les eleves
	public function reinscription_std()
{
$this->load->view('Gestion_reinscription_sdt.php');
}

public function downCntr($name,$origin)
{$this->load->model('Model_RI') ;


$this->Model_RI->down($name,$origin);


}
		
}