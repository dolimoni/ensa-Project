<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class My_controllerpdf extends CI_Controller
{
	
	public function __construct()
		{
		parent::__construct();
		} 

//********************************* ensas*****************

public function pdfensasprepa()
{
    $this->load->model('my_modelpdf');

	$results= array(
	'matricule'	=> 'q123489q',
	'nom' => 'aaaaaaa',
	'prenom' => 'bbbbbbb',
	'date_naissance' => '03-08-1992',
	'lieu_naissance' => 'kéch',
	'nationalite' => 'Marocaine',
	'cin' => 'w021365',
	'tel' => '06 70 37 12 46',
	'gsm' => 'gsm 06 70 37 12 46' ,
	'email' => 'jkjkj@lk.fr',
	'adresse' => 'hhhdhddjfjfh settat',
	'ville' => 'settat',
	'cne' => '1215',
	'type_bac' => 'PC',
	'note_bac' => '14',
	'note_1er_annee' => '13',
	'note_2eme_annee' => '14',
	'classement_1er_annee' => '11',
	'id_choix' => '1',
	'create_at' => '12-12-2015'
	);
	
	
    $this->my_modelpdf->EnsasPDF($results); 
    //$this->load->view('my_viewpdf', $data);   
}

//********************************* cnc*****************

public function pdfelevescnc()
{
    $this->load->model('my_modelpdf');
  
  
   
 $results= array(
	'matricule'	=> 'q123489q',
	'nom' => 'xxxxxxx',
	'prenom' => 'yyyyyyy',
	'date_naissance' => '31-07-1994',
	'lieu_naissance' => 'Fès',
	'nationalite' => 'Marocaine',
	'cin' => 'w021365',
	'tel' => '06 77 77 77 77',
	'gsm' => 'gsm 06 66 37 66 46' ,
	'email' => 'jkjkj@lk.fr',
	'adresse' => 'hhhdhddjfjfh settat',
	'ville' => 'settat',
	'cne' => '1215',
	'filiere_cp' => 'TSI',
	'etablissement_cp' => 'tariq ibnou ziyad',
	'ville' => 'Laayoun',
	'rang_cnc' => '14',
	'classement_1er_annee' => '11',
	'filiere_aff' => 'G info',
	'create_at' => '12-12-2015'
);
    $this->my_modelpdf->cncPDF($results); 
    //$this->load->view('my_viewpdf', $data);   
}


//********************** concours ******************

public function pdfconcours()
{
    $this->load->model('my_modelpdf');
  

$results= array(
	'matricule'	=> 'q123489q',
	'nom' => 'qqqqqqqq',
	'prenom' => 'xxxxxxx',
	'date_naissance' => '25-08-1995',
	'lieu_naissance' => 'Rabat',
	'nationalite' => 'Marocaine',
	'cin' => 'w021365',
	'tel' => '06 99 22 12 12',
	'gsm' => '06 70 37 12 46' ,
	'email' => 'jkjkj@lk.fr',
	'adresse' => 'hhhdhddjfjfh settat',
	'ville' => 'settat',
	'cne' => '1215',
	'type_bac' => 'Science Math A',
	'note_bac' => '15',
	'type_diplome' => 'DEUST',
	'etablissement_diplome' => 'Université HASAN I',
	'create_at' => '12-12-2015'
);
	$this->my_modelpdf->concoursPDF($results); 	
}

}
?>