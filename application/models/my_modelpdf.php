<?php if(!defined ('BASEPATH')) exit ('No direct script access allowed');
class My_modelpdf extends CI_Model
{
function __construct()
{
    parent::__construct();

	$this->load->database('ensa_project');
}
//generer le pdf de la Fiche de choix de fili�re pr les �tudiants de l'ensas 

/***************************** ensas****************************/

public function EnsasPDF($results)
{   
 
 
	ob_start();
	//define('FPDF_FONTPATH',$this->config->item('fonts_path'));
	define('FPDF_FONTPATH','fonts/');
	
	$this->load->library(array('fpdf','fpdf_rotate','pdf'));
	$pdf = new FPDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Arial','',12);

	//recup�rer l'URL de l'image  
	$pdf->Image('C:\PROGRA~2\EASYPH~1.1VC\data\localweb\projects\ensa-Project\assets\img\HH157571.jpg',10,6,30,34);
	
    // Titre
    $pdf->Cell(200,5,'Universit� Cadi Ayyad',0,1,'C');
	
	$pdf->Cell(200,5,'Ecole Nationale des Sciences Appliqu�es de Safi (ENSAS)',0,1,'C');
	$pdf->Ln();
	
	$pdf->SetFont('Arial','B',14);
	$pdf->Cell(200,5,'Fiche de choix de fili�re',0,1,'C');

	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(200,5,'Destin�e aux �tudiants internes de l\'ENSAS',0,1,'C');
	
	// Saut de ligne
    $pdf->Ln();
	

/*if(!empty($results))
{

 foreach($results as $row)
       {
		*/   
			$pdf->SetFont('','',12);
			$pdf->Cell(150,10,' Matricule : ',0,0,'R');
			//mettre en gras
			$pdf->SetFont('','B',10);
			$pdf->Cell(30,10,''.$results['matricule'],0,0,'L');
			
			$pdf->Ln();
		//****** info perso*****
        
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(0,8,'Informations personnelles',0,1);
			
		$pdf->Line(10, 58, 200, 58);
				$pdf->SetFont('Arial','',10);
				
				
				$pdf->Cell(60,8,'Nom & Pr�nom ',0,0);
		$pdf->Cell(80,8,': '.$results['nom'].' '.$results['prenom'] ,0,1);
		
				$pdf->Cell(60,10,'Date et lieu de naissance  ',0,0);
		$pdf->Cell(80,8,': '.$results['date_naissance'].' � '.$results['lieu_naissance'] ,0,1);
		
			$pdf->Cell(60,8,'Nationalit� ',0,0);
		$pdf->Cell(80,8,': '.$results['nationalite'] ,0,1);
		
			$pdf->Cell(60,8,'CIN ',0,0);
		$pdf->Cell(80,8,': '.$results['cin'] ,0,1);
		
			$pdf->Cell(60,8,'Tel ',0,0);
		$pdf->Cell(80,8,': '.$results['tel'] ,0,1);
		
			$pdf->Cell(60,8,'GSM ',0,0);
		$pdf->Cell(80,8,': '.$results['gsm'] ,0,1);
		
			$pdf->Cell(60,8,'Email ',0,0);
		$pdf->Cell(80,8,': '.$results['email'] ,0,1);
		
			 $pdf->Cell(60,8,'Adresse ',0,0);
		$pdf->Cell(80,8,': '.$results['adresse'] ,0,1);
		 
			$pdf->Cell(60,8,'Ville ',0,0);
		$pdf->Cell(80,8,': '.$results['ville'] ,0,1);
		
			 
		//*************bac
	      $pdf->Ln();
               $pdf->SetFont('Arial','B',12);		
			    $pdf->Cell(0,8,'Baccalaur�at : ',0,1);
		$pdf->Line(10, 146, 200, 146);
				
			$pdf->SetFont('Arial','',10);
			
			$pdf->Cell(60,8,'CNE ',0,0);
		$pdf->Cell(80,8,': '.$results['cne'] ,0,1);
		
				$pdf->Cell(60,8,'Type de BAC ',0,0);
		$pdf->Cell(80,8,': '.$results['type_bac'] ,0,1);
		
			$pdf->Cell(60,8,'Note de BAC ',0,0);
		$pdf->Cell(80,8,': '.$results['note_bac'] ,0,1);
		
				
		
		//****** cycle pr�pa	
		$pdf->Ln();
				$pdf->SetFont('Arial','B',12);		
				$pdf->Cell(0,8,'Notes au Cycle Pr�paratoire : ',0,1);
		$pdf->Line(10, 186, 200, 186);
				
				$pdf->SetFont('Arial','',10);
				
				$pdf->Cell(90,8,'Note 1ere ann�e ',0,0,'C');//C pr centrer
				$pdf->Cell(60,8,' Note 2eme ann�e',0,1,'C');
				
				$pdf->SetFont('Arial','B',10);
			    $pdf->Cell(90,8,' '.$results['note_1er_annee'],0,0,'C');
				$pdf->Cell(60,8,' '.$results['note_2eme_annee'],0,1,'C'); 
				
				$pdf->SetFont('Arial','B',10);
				$pdf->Cell(40,8,'Classement : ',0,0);
			   $pdf->Cell(80,8,' '.$results['classement_1er_annee'],0,1,'C');
			   
			   
			   
			   //cette partie � refaire pr extraire les choix 
			   $pdf->Ln();
			   $pdf->SetFont('Arial','B',12);
			   $pdf->Cell(0,8,'Choix de fili�re ',0,1);
			   $pdf->Line(10, 226, 200, 226);
		
			   $pdf->SetFont('Arial','',10);
			   $pdf->Cell(60,8,' Choix1 ',0,0,'C');
			   $pdf->Cell(60,8,' Choix2 ',0,0,'C');
			   $pdf->Cell(60,8,' Choix3 ',0,1,'C');
			   
			   $pdf->SetFont('Arial','B',10);
			   $pdf->Cell(60,8,' � selectionner de la bdd',0,0,'C');
			  
			  //je suppose que le choix 1 qui est s�l�ctionn� 
			   //il faut ins�rer l'image � c�t� du choix qui est s�l�ctionn� 'selon l'algo
			   $pdf->Image('C:\PROGRA~2\EASYPH~1.1VC\data\localweb\projects\ensa-Project\assets\img\HH157571.jpg',48,228,0);
			
			   
			   $pdf->Cell(60,8,' � selectionner de la bdd ',0,0,'C');
			   $pdf->Cell(60,8,' � selectionner de la bdd ',0,1,'C');
			   
			    $pdf->Line(10, 248, 200, 248);
				$pdf->Ln();
		       $pdf->SetFont('Arial','',10);
			   
			   $pdf->Cell(50,8,' Date de cr�ation du compte :',0,0);
			   $pdf->SetFont('Arial','B',10);

			$array = explode(" ", $results['created_at']);
			$pdf->Cell(60,8,$array[0],0,0);
			$pdf->Cell(40,8,'  Signature  ',0,0);
			//inserer l'inmage de la signature
			
			$pdf->Image('C:\PROGRA~2\EASYPH~1.1VC\data\localweb\projects\ensa-Project\assets\img\HH157571.jpg',120,250,0);
			
	
			$pdf->Output();
			ob_end_flush ();	
/*} 
}
$pdf->Output();
ob_end_flush ();
*/ 
}


//***** etudiants convoqu�s au concours d'acces **********


public function concoursPDF($results)
{ 
	ob_start();
	//define('FPDF_FONTPATH',$this->config->item('fonts_path'));
	define('FPDF_FONTPATH','fonts/');
	
	$this->load->library(array('fpdf','fpdf_rotate','pdf'));
	$pdf = new FPDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Arial','',12);

	//recup�rer l'URL de l'image  
	$pdf->Image('C:\wamp\www\ensa-Project\assets\img\a.jpg',10,6,30,34);
    // Titre
    $pdf->Cell(200,5,'Universit� Cadi Ayyad',0,1,'C');
	
	$pdf->Cell(200,5,'Ecole Nationale des Sciences Appliqu�es de Safi (ENSAS)',0,1,'C');
	$pdf->Ln();
	
	$pdf->SetFont('Arial','B',14);
	$pdf->Cell(200,5,'Fiche d\'enregistrement ',0,1,'C');

	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(200,5,'Destin�e aux �tudiants convoqu�s au concours d\'acc�s-3eme ann�e',0,1,'C');
	
	// Saut de ligne
    $pdf->Ln();
	
/*if(!empty($results))
{

 foreach($results as $row)
        {  */
			$pdf->SetFont('','',12);
			$pdf->Cell(150,10,' Matricule : ',0,0,'R');
			//mettre en gras
			$pdf->SetFont('','B',10);
			$pdf->Cell(30,10,''.$results['matricule'],0,0,'L');
			
			$pdf->Ln();
		//****** info perso*****
        
			$pdf->SetFont('Arial','B',14);
			$pdf->Cell(0,8,'Informations personnelles','B',1);
		
				$pdf->SetFont('Arial','',12);
				
				
				$pdf->Cell(60,8,'Nom & Pr�nom ',0,0);
		$pdf->Cell(80,8,': '.$results['nom'].' '.$results['prenom'] ,0,1);
		
				$pdf->Cell(60,10,'Date et lieu de naissance  ',0,0);
		$pdf->Cell(80,8,': '.$results['date_naissance'].' � '.$results['lieu_naissance'] ,0,1);
		
			$pdf->Cell(60,8,'Nationalit� ',0,0);
		$pdf->Cell(80,8,': '.$results['nationalite'] ,0,1);
		
			$pdf->Cell(60,8,'CIN ',0,0);
		$pdf->Cell(80,8,': '.$results['cin'] ,0,1);
		
			$pdf->Cell(60,8,'Tel ',0,0);
		$pdf->Cell(80,8,': '.$results['tel'] ,0,1);
		
			$pdf->Cell(60,8,'GSM ',0,0);
		$pdf->Cell(80,8,': '.$results['gsm'] ,0,1);
		
			$pdf->Cell(60,8,'Email ',0,0);
		$pdf->Cell(80,8,': '.$results['email'] ,0,1);
		
			 $pdf->Cell(60,8,'Adresse ',0,0);
		$pdf->Cell(80,8,': '.$results['adresse'] ,0,1);
		 
			$pdf->Cell(60,8,'Ville ',0,0);
		$pdf->Cell(80,8,': '.$results['ville'] ,0,1);
		
			 
		//*************bac 
	      $pdf->Ln();
               $pdf->SetFont('Arial','B',14);		
			    $pdf->Cell(0,8,'Baccalaur�at : ','B',1);
		
				
			$pdf->SetFont('Arial','',12);
			
			$pdf->Cell(60,8,'CNE :',0,0);
		$pdf->Cell(80,8,': '.$results['cne'] ,0,1);
		
			$pdf->Cell(60,8,'Type de bac ',0,0);
		$pdf->Cell(80,8,': '.$results['type_bac'] ,0,1);
		
				$pdf->Cell(60,8,'Note de bac ',0,0);
		$pdf->Cell(80,8,': '.$results['note_bac'] ,0,1);
		
		//*******diplome
		$pdf->Ln();
               $pdf->SetFont('Arial','B',14);		
			    $pdf->Cell(0,8,'Dipl�me : ','B',1);
		
				
			$pdf->SetFont('Arial','',12);
			
			$pdf->Cell(60,8,'Type du dipl�me :',0,0);
		$pdf->Cell(80,8,': '.$results['type_diplome'] ,0,1);
		
			$pdf->Cell(60,8,'Etablissement du dipl�me ',0,0);
		$pdf->Cell(80,8,': '.$results['etablissement_diplome'] ,0,1);
		
				
		
	  //cette partie � refaire pr extraire la fili�re choisie
			   $pdf->Ln();
			   $pdf->Ln();
			   $pdf->SetFont('Arial','B',14);
			   
			$pdf->Cell(0,8,'Fili�re � l\'ENSAS','B',1);
		
			   $pdf->SetFont('Arial','B',12);
			   $pdf->Cell(190,8,$results['choix1'],0,0,'C');
			  
				$pdf->Ln();
				$pdf->Ln();
				$pdf->Ln();
				$pdf->Ln();
				
		       $pdf->SetFont('Arial','',12);
			   
			   $pdf->Cell(60,8,' Date d\'enregistrement en ligne :',0,0);
			   $pdf->SetFont('Arial','B',10);
        
			$array = explode(" ", $results['created_at']);
			$pdf->Cell(60,8,$array[0],0,0);
			$pdf->Line(10, 210, 200, 210);
			$pdf->Cell(40,8,'  Signature  ',0,0);
			
			
			//inserer l'inmage de la signature
			
			$pdf->Image('C:\wamp\www\ensa-Project\assets\img\signature.png',150,250,0);
			
	
			$pdf->Output();
			ob_end_flush ();	
/*} 
}
$pdf->Output();
 ob_end_flush ();

*/ 
}


//***********************************************CNC************************

//generer le pdf de la Fiche d'enregistrement pr les �tudiants issus du CNC


public function cncPDF($results)
{   

	ob_start();
	//define('FPDF_FONTPATH',$this->config->item('fonts_path'));
	define('FPDF_FONTPATH','fonts/');
	
	$this->load->library(array('fpdf','fpdf_rotate','pdf'));
	$pdf = new FPDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Arial','',12);

	//recup�rer l'URL de l'image  
	$pdf->Image('C:\wamp\www\ensa-Project\assets\img\1.jpg',10,6,30,34);
	
    // Titre
    $pdf->Cell(200,5,'Universit� Cadi Ayyad',0,1,'C');
	
	$pdf->Cell(200,5,'Ecole Nationale des Sciences Appliqu�es de Safi (ENSAS)',0,1,'C');
	$pdf->Ln();
	
	$pdf->SetFont('Arial','B',14);
	$pdf->Cell(200,5,'Fiche d\'enregistrement ',0,1,'C');

	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(200,5,'Destin�e aux �tudiants issus du CNC',0,1,'C');
	
	// Saut de ligne
    $pdf->Ln();
	

/*if(!empty($results))
{
*/
  //foreach($results as $row)
       // {
			$pdf->SetFont('','',12);
			$pdf->Cell(150,10,' Matricule : ',0,0,'R');
			//mettre en gras
			$pdf->SetFont('','B',10);
			$pdf->Cell(30,10,''.$results['matricule'],0,0,'L');
			$pdf->Ln();
			
		//****** info perso*****
        
			$pdf->SetFont('Arial','B',14);
			$pdf->Cell(0,8,'Informations personnelles','B',1);
	
			$pdf->SetFont('Arial','',12);
				
				
				$pdf->Cell(60,8,'Nom & Pr�nom ',0,0);
		$pdf->Cell(80,8,': '.$results['nom'].' '.$results['prenom'] ,0,1);
		
				$pdf->Cell(60,10,'Date et lieu de naissance  ',0,0);
		$pdf->Cell(80,8,': '.$results['date_naissance'].' � '.$results['lieu_naissance'] ,0,1);
		
			$pdf->Cell(60,8,'Nationalit� ',0,0);
		$pdf->Cell(80,8,': '.$results['nationalite'] ,0,1);
		
			$pdf->Cell(60,8,'CIN ',0,0);
		$pdf->Cell(80,8,': '.$results['cin'] ,0,1);
		
			$pdf->Cell(60,8,'Tel ',0,0);
		$pdf->Cell(80,8,': '.$results['tel'] ,0,1);
		
			$pdf->Cell(60,8,'GSM ',0,0);
		$pdf->Cell(80,8,': '.$results['gsm'] ,0,1);
		
			$pdf->Cell(60,8,'Email ',0,0);
		$pdf->Cell(80,8,': '.$results['email'] ,0,1);
		
			 $pdf->Cell(60,8,'Adresse ',0,0);
		$pdf->Cell(80,8,': '.$results['adresse'] ,0,1);
		 
			$pdf->Cell(60,8,'Ville ',0,0);
		$pdf->Cell(80,8,': '.$results['ville'] ,0,1);
		
			 
		//*************Classes prepa. et cnc
	      $pdf->Ln();
               $pdf->SetFont('Arial','B',14);		
			    $pdf->Cell(0,8,'Classes prepa. et cnc : ','B',1);
		//$pdf->Line(10, 146, 200, 146);
				
			$pdf->SetFont('Arial','',12);
			
			$pdf->Cell(60,8,'Fili�re CP ',0,0);
		$pdf->Cell(80,8,': '.$results['filiere_cp'] ,0,1);
		
				$pdf->Cell(60,8,'Etablissement CP ',0,0);
		$pdf->Cell(80,8,': '.$results['etablissement_cp'] ,0,1);
		
			$pdf->Cell(60,8,'Ville ',0,0);
		$pdf->Cell(80,8,': '.$results['ville'] ,0,1);
		
			$pdf->Cell(60,8,'Rang CNC ',0,0);
		$pdf->Cell(80,8,': '.$results['range_cnc'] ,0,1);
		
	  //cette partie � refaire pr extraire les choix 
			   $pdf->Ln();
			   $pdf->SetFont('Arial','B',14);
			   
			$pdf->Cell(0,8,'Fili�re d\'affectation � l\'ENSAS','B',1);

		 $pdf->SetFont('Arial','B',12);
		$pdf->Cell(190,8,$results['choix1'],0,0,'C');

		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Ln();
				
		    $pdf->SetFont('Arial','',12);
			   
			$pdf->Cell(60,8,' Date d\'enregistrement en ligne :',0,0);
			$pdf->SetFont('Arial','B',10);
        	
        	$array = explode(" ", $results['created_at']);
			$pdf->Cell(60,8,$array[0],0,0);
			$pdf->Line(10, 210, 200, 210);
			
			$pdf->Cell(40,8,'  Signature  ',0,0);
			
			
			//inserer l'inmage de la signature
			
			$pdf->Image('C:\wamp\www\ensa-Project\assets\img\signature.png',150,230,0);
			
	
			$pdf->Output();
			ob_end_flush ();	
/*} 
}
$pdf->Output();
ob_end_flush ();
*/ 
}


}
?>