<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller
{


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

	public function sort()
	{
		 $order=$this->input->post('name');
		  $this->load->model('admin_model');
		$this->load->view('array.php', $this->admin_model->attribution($order));

	}
<<<<<<< HEAD
=======
    
    /*By Essaidi : this fct opens a view that contains a browse button, where admin can choose the EXCEL file */
    public function administration(){
        $this->load->view('admin-import');
    }
    
    /*By Essaidi : this fct uploads the excel file & sends data to model in order to insert it in db */
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
>>>>>>> 61f98b4778601eb824906adb708c2eeac930fcb2
}

?>