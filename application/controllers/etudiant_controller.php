<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Etudiant_controller extends CI_Controller {

	
	 
    public function login()
    {
        $this->load->model('etudiant_model') ;

        $password=$this->input->post('password');
        $cne=$this->input->post('cne');
        $cin=$this->input->post('cin');
        if($this->etudiant_model->login($cin,$cne,$password)){
            $this->session->set_userdata("cin",$cin);
            $this->session->set_userdata("cne",$cne);
            $this->session->set_userdata("id",$this->etudiant_model->getId($cin));
            $this->load->view('profil.php',$this->etudiant_model->getProfile($this->session->userdata("id")));

        }else{

             $error = array('inexistant' =>  true );
             $this->load->view('index.php',$error);
        }
    }
        
    public function deconnexion()
    {
        //	Détruit la session
        $this->session->sess_destroy();

        //	Redirige vers la page d'accueil
        redirect();
    }
    public function editProfile(){
        $this->load->model('etudiant_model') ;
        $id = $this->session->userdata("id");
        $cin = $this->session->userdata("cin");
        if(!empty($cin)){
            $data = $this->etudiant_model->getProfile($id);
            $this->load->view('edit_profile',$data);
        }else{
            redirect();
        }
    }
}
