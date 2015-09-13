<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Fcntr extends CI_Controller
{
	
	public function __construct()
		{
		parent::__construct();
		//$this->load->database('ensa_project');
		$this->load->helper('url');
		}
public function index()
{/*upload
$this->load->view('f.php');
*/
//download
//$this->load->view('download.php');
//$this->load->view('Gestion_reinscription_sdt.php');
/* admin */
$this->load->view('Gestion_reinscription_admin.php');
}
public function reinscription_std()
{
$this->load->view('Gestion_reinscription_sdt.php');

}
public function down($name,$origin)
{
//test avec un autre fichier
$this->load->helper('download');
$pth    =   file_get_contents($origin."/".$name);

force_download($name, $pth);    
}	
 


public function do_upload()
{
// load codeigniter helpers
$this->load->helper(array('form','url'));
// set path to store uploaded files
$config['upload_path'] = 'telechargements/';
// set allowed file types
$typefile=$this->input->post('fichier');
$config['allowed_types'] = 'pdf';
// set upload limit, set 0 for no limit
$config['max_size']	= 0;
//spécifier le nom
$config['file_name'] =$typefile;

//s'il existe un ficher de mm nom supp le et remplacer le par le nv fichier 
if(file_exists("telechargements/".$config['file_name'].".pdf")) {
unlink("telechargements/".$config['file_name'].".pdf");
}
// load upload library with custom config settings
$this->load->library('upload', $config);
// if upload failed , display errors
if (!$this->upload->do_upload())
{

	 echo "action échouée";
	 $this->load->view('Gestion_reinscription_admin.php');
}
else
{
	echo 'bien ajouté';

}
}

///supprimer un fichier 
public function supprimerFichier($file)
{
//$file = "telechargements/11.pdf";
unlink($file);

}
}