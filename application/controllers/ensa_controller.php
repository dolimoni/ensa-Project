<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ensa_controller extends CI_Controller {
    
    public function index(){
            $this->load->model('etudiant_model') ;
            $this->connexion();
        }
    public function inscription_ensa(){
            $this->load->view('form_ensa.php');
    }
	

    private  function connexion( ){
        $this->load->library('form_validation');
        if( $this->form_validation->run('ensa_rules')) //remove the ! to enable form validation
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

            $info['note_1er_annee']=$this->input->post('note_1er_annee');
            $info['classement']=$this->input->post('classement');


            $info['choix1']=$this->input->post('choix1');
            $info['choix2']=$this->input->post('choix2');
            $info['choix3']=$this->input->post('choix3');

        
                $info['who']= $this->input->post('who');


                $config['upload_path'] = './assets/img';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '3024';
                $config['max_width']  = '2024';
                $config['max_height']  = '2000';
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('photo')) // verify image errors
                {
                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('form_ensa.php', $error);
                }
                else if($this->etudiant_model->isRegistredUser($info['nom'],$info['prenom'],$info['cin'],$info['cne']))
                {
                    $error = array('error' => "L'inscription a été déja effectuée");
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
        
    public function editProfile(){
        $this->load->model("etudiant_model");
        if( $this->form_validation->run('ensa_rules_edit')) //remove the ! to enable form validation
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

            $info['note_1er_annee']=$this->input->post('note_1er_annee');
            $info['classement']=$this->input->post('classement');

            $info['choix1']=$this->input->post('choix1');
            $info['choix2']=$this->input->post('choix2');
            $info['choix3']=$this->input->post('choix3');

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
