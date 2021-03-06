<?php if(!defined ('BASEPATH')) exit ('No direct script access allowed');
class Model_RI extends CI_Model
{
	private $table = 'etudiant';
	function __construct()
	{
		parent::__construct();

		$this->load->database('ensa_project');
		$this->load->helper('url');
	}

//par l'eleve
public function down($name,$origin)
{
$this->load->helper('download');
$pth    =   file_get_contents($origin."/".$name);

force_download($name, $pth);    
}	
 

//par l'admin
public function do_upload($fichier)
{
// load codeigniter helpers
$this->load->helper(array('form','url'));
// set path to store uploaded files
$config['upload_path'] = 'telechargements/';
// set allowed file types

$config['allowed_types'] = 'pdf';
// set upload limit, set 0 for no limit
$config['max_size']	= 0;
//spécifier le nom
$config['file_name'] =$fichier['fichier'];

//s'il existe un ficher de mm nom supp le et remplacer le par le nv fichier 
if(file_exists("telechargements/".$config['file_name'].".pdf")) {
unlink("telechargements/".$config['file_name'].".pdf");
}
// load upload library with custom config settings
$this->load->library('upload', $config);
// if upload failed , display errors
if (!$this->upload->do_upload())
{

	 
	 $this->load->view('erreur_admin.php');
}
else
{
	//echo 'bien ajouté';
	$this->load->view('ajout_file_admin.php');

}
}

///supprimer un fichier 
public function supprimerFichier($file)
{
unlink('telechargements/'.$file);
}

//afficher le contenu d'un repertoire et des ss repertoire

function ScanDirectory($Directory){

  $MyDirectory = opendir($Directory) or die('Erreur');
 while($Entry = @readdir($MyDirectory)) {
  if(is_dir($Directory.'/'.$Entry)&& $Entry != '.' && $Entry != '..') {
                         echo '<ul>'.$Directory;
   ScanDirectory($Directory.'/'.$Entry);
                        echo '</ul>';
  }
  else {
   echo '<li>'.$Entry.'</li>';
                }
 }
  closedir($MyDirectory);
}

//ScanDirectory('.');
	
}