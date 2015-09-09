<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CntrTrombino extends CI_Controller
{
	
	public function __construct()
		{
		parent::__construct();
		$this->load->helper('url');
		}
		
	public function index()
	{
		$this->load->model('ModelTrombino') ;
		$this->connexion();
		
	}
public function connexion()
	{ $this->load->model('ModelTrombino') ;
		// Chargement de la bibliothèque
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('et', '"Choix de type d etudiants"','trim|required');
		$this->form_validation->set_rules('AU', '"Année universitaire"','trim|required');
		$this->form_validation->set_rules('choix1', '"Choix de filiere"','trim|required');

		if($this->form_validation->run())
		{
			// Le formulaire est valide
			$info['et']=$this->input->post('et');
			$info['AU']=$this->input->post('AU');
			$info['choix1']=$this->input->post('choix1');
			
			if($info['et']=='ensas')
			{
				$data['results'] = $this->ModelTrombino->TrombinoensasTab($info);
		       $this->load->view('viewTrombEnsas',$data);
			}
			if($info['et']=='cnc')
			{
				$data['results'] = $this->ModelTrombino->TrombinocncTab($info);
		        $this->load->view('viewTrombCnc',$data);
			}
			if($info['et']=='concours3')
			{ 
				$data['results'] = $this->ModelTrombino->TrombinoConcours3Tab4($info);
		        $this->load->view('viewTrombC3',$data);
			}
			if($info['et']=='concours4')
			{
				$data['results'] = $this->ModelTrombino->TrombinoConcours3Tab4($info);
		        $this->load->view('viewTrombC4',$data);
			}
			if($info['et']=='ts')
			{
				$data['results'] = $this->ModelTrombino->TrombinoTsTab($info);
				
		        $this->load->view('viewTrombTs',$data);
			}
		}
		else
		{
			// Le formulaire est invalide ou vide
			$this->load->view('Generation_trombino.php');
			//redirect('cntrTrombino/connexion');
			
		}
	}	
	
}

?>
		