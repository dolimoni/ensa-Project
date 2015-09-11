<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller
{

    public function index(){
        if(isAdmin()){
            $this->load->view("admin");
        }else{
            $this->load->view("admin_login");
        }
    }
    
    public function login()
    {
        $this->load->model('admin_model') ;

        $password=$this->input->post('password');
        $username =$this->input->post('username');
       
        if($this->admin_model->login($username,$password)){
            $this->session->set_userdata("admin_username",$username);
            $this->session->set_userdata("id",$this->admin_model->getId($username));
            redirect('/admin_controller');
        }else{
            redirect('/admin_controller');
        }
    }
	public function statistics(){


		$this->load->model('admin_model');
		
		#choix contains for each filiere how many student choosed this filiere
		#example : $choix['GPMC'] = 5 : 5 students choosed GPMC as first choise
		$choix = $this->admin_model->statistics();
				
		
		$this->load->view('statistics.php',$choix);
	}

	# this function makes changes in the database, it will update "final_filiere" in the table "etudiant_ensa"
	public function attribution()
	{
		$this->load->model('admin_model');
		
		$this->load->view('classement', $this->admin_model->attribution("moyen"));

		
	}
        
        public function attributionUpload()
	{
            $this->load->view('attribution');
	}
        
        public function importExcelAttribution(){
            $filename = 'files/classement/'.date("Ymd").'.xlsx';
            copy($_FILES['excelfile']['tmp_name'], $filename);

            //load the excel library
            $this->load->library('excel');
            //read file from path
            $objPHPExcel = PHPExcel_IOFactory::load(FCPATH.$filename);
            //get only the Cell Collection
            $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
            //extract to a PHP readable array format
            foreach ($cell_collection as $cell) {
                $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
                //header will/should be in row 1 only. of course this can be modified to suit your need.
                if ($row == 1) {
                    $header[$row][$column] = $data_value;
                } else {
                    $arr_data[$row][$column] = $data_value;
                }
            }
            //send the data in an array format
            $data['header'] = $header;
            $data['values'] = $arr_data;
            $this->load->model('admin_model') ;
            $this->admin_model->insertNotesFromExcelFile($arr_data);
            redirect("admin_controller/attribution");
        }

	public function sort()
	{
		 $order=$this->input->post('name');
		  $this->load->model('admin_model');
		$this->load->view('array.php', $this->admin_model->attribution($order));

	}

    /* this fct opens a view that contains a browse button, where admin can choose the EXCEL file */
    public function administration(){
        $this->load->view('admin-import');
    }
    
    /* this fct uploads the excel file & sends data to model in order to insert it in db */
    public function importExcel(){
        $filename = 'files/'.date("Ymd").'.xlsx';
        copy($_FILES['excelfile']['tmp_name'], $filename);
        
        //load the excel library
        $this->load->library('excel');
        //read file from path
        $objPHPExcel = PHPExcel_IOFactory::load(FCPATH.$filename);
        //get only the Cell Collection
        $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
        //extract to a PHP readable array format
        foreach ($cell_collection as $cell) {
            $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
            $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
            $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
            //header will/should be in row 1 only. of course this can be modified to suit your need.
            if ($row == 1) {
                $header[$row][$column] = $data_value;
            } else {
                $arr_data[$row][$column] = $data_value;
            }
        }
        //send the data in an array format
        $data['header'] = $header;
        $data['values'] = $arr_data;
        $this->load->model('admin_model') ;
        $this->admin_model->insertStudentsFromExcelFile($arr_data);
        
        $this->load->view('vue', $data);
    }
    
    public function gestionEtudiants(){
        $this->load->model("etudiant_model");
        $data = $this->etudiant_model->getListEtudiants();
        $this->load->view('gestionEtudiants',$data);
    }

    
    public function editProfile($id){
        $this->load->model('etudiant_model') ;
        
        if(!empty($this->session->userdata("cin"))){
            if(isset($_POST["submit"])){
                
            }else{
                $data = $this->etudiant_model->getProfile($id);
                //$data["who"] = $this->etudiant_model->getEtudiantWho($id);
                $this->load->view('edit_profile',$data);
            }
        }else{
            redirect();
        }
    }
    
    public function supprimerEtudiant($id){
        $this->load->model('etudiant_model') ;
        $this->etudiant_model->delete($id);
        redirect('admin_controller/gestionEtudiants');
    }

}

?>