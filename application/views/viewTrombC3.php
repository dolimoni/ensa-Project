
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(count($results)==0)
{
	$this->load->view('aucunResultat.php');
}
else
{
//*****************Generation des pdf**************

ob_start();
	//define('FPDF_FONTPATH',$this->config->item('fonts_path'));
	define('FPDF_FONTPATH','fonts/');
	
	$this->load->library(array('fpdf','fpdf_rotate','pdf'));
	$pdf = new FPDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();  
//le w et le h de tte la page pdf
	$pdf_larg = $pdf->w;
	$pdf_long = $pdf->h;
// definir la couleur de remplissage selon la filiere
	if($results[0]->titre=='F')
	{
	$pdf->SetFillColor(153,217,234);
	}
	if($results[0]->titre=='D')
	{
	$pdf->SetFillColor(255,166,166);
	}
	if($results[0]->titre=='P')
	{
	$pdf->SetFillColor(200,191,231);
	}
	if($results[0]->titre=='T')
	{
	$pdf->SetFillColor(165, 209, 82);
	}
// on dessine un grand rectangle coloré (cf le DF)
	$pdf->Rect(0,0, $pdf_larg, $pdf_long,'DF');
	
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(200,5,'Trombinoscope',0,1,'C');
	$pdf->Ln();
	$pdf->SetFont('Arial','',12);
	
	$pdf->Cell(200,7,'des élèves réussis dans le concours d\'acces à la 3ème année de l\'ENSAS',0,1,'C');
	//verifier la date
	$annee=explode('-',$results[0]->created_at);
	$an=((int)$annee[0])+1;
	$pdf->Cell(200,7,' A.U : '.$annee[0].' - '.$an.' ',0,1,'C');
	
	$pdf->Ln();
	//bleu
	$pdf->SetTextColor(63,72,204);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(60,7,''.count($results).'',0,0,'R');
	
	//noir
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(20,7,' Elèves .',0,0,'R');
	$pdf->Cell(20,7,' Filière :',0,0,'R');
	$pdf->SetFont('Arial','B',12);
	
	//changer le titre selon la filiere choisie
	if($results[0]->titre=='F')
	{
	$pdf->Cell(50,7,'Génie Informatique',0,1,'L');
	}
	if($results[0]->titre=='D')
	{
	$pdf->Cell(50,7,'Génie Industriel',0,1,'L');
	}
	if($results[0]->titre=='P')
	{
	$pdf->Cell(50,7,'Génie des Procédés et M.C',0,1,'L');
	}
	if($results[0]->titre=='T')
	{
	$pdf->Cell(50,7,'Génie Télécom et Réseaux',0,1,'L');
	}

    $pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	
	$i=1;
	$j=1;
	$saut=0;
	$pdf->SetFont('Times','B',10);

	/* ----------------les corr du rect----*/
	
	//augmenter la valeur de x et y(selon w et h du rect precedent) du rect apres chache affichage pr obtenir un rect pr chaque personne 
	$xrect=4;
	$yrect=50;
	//à ne pas changer ds la boucle pr garder  ls mêmes valeurs pr ts les rect
	$wrect=39;
	$hrect=55;
	
	/* ----------------les corr du texte----*/
	$xtxt=5;
	$ytxt=90;
	
	/* ----------------les corr des images ----*/
	      //changer ds l boucle pr passer d'un rect à un autre
	$ximg=9;
	$yimg=52;
	      //à ne pas changer ds la boucle pr garder les mm val pr ttes les img
	$wimg=30;
	$himg=34;

	
	if(!empty($results))
	{
        foreach($results as $row)
        {
	
	  //rect blan 
	  
	  $pdf->SetFillColor(255,255,255);
	  $pdf->RoundedRect($xrect, $yrect,$wrect,$hrect, 5, '13', 'DF');
	  $pdf->Image($row->photo,$ximg,$yimg,$wimg,$himg);
	  $pdf->SetFont('Times','B',8);
	  $pdf->Text($xtxt,$ytxt,$i.'-'.strtoupper($row->nom).' '.strtolower($row->prenom).'('.$row->titre.')');
	  $pdf->SetFont('Times','',8);
	  $pdf->Text($xtxt,$ytxt+3,$row->cin.'/'.$row->matricule);
	  $pdf->Text($xtxt,$ytxt+6,$row->email);
	  $pdf->Text($xtxt,$ytxt+9,$row->tel.'/ '.$row->gsm);
	  $pdf->Text($xtxt,$ytxt+12,'( '.$row->ville.' )');
	 
    //augmenter les x (paser au rect suivant) 
	 $xtxt=$xtxt+$wrect+1;
	  $xrect=$xrect+$wrect+1;
	  $ximg=$xrect+4;
	  
		if($i%5==0)
		{$saut=1;
	     //retour à la ligne
		 $yrect=$yrect+$hrect+2;
		 $xrect=4;
		
		 $ytxt=$ytxt+57;
		 $xtxt=5;
		 
		 $ximg=9;
		 $yimg=$yrect+2;
		 
		}	
		$i++;
		$j++;
		if($j==21)
		{   
			//ajouter une nvlle page
			$pdf->SetAutoPageBreak(true,60);
			$pdf->AddPage();

	// definir la couleur de remplissage selon la filiere
	if($results[0]->titre=='F')
	{
	$pdf->SetFillColor(153,217,234);
	}
	if($results[0]->titre=='D')
	{
	$pdf->SetFillColor(255,166,166);
	}
	if($results[0]->titre=='P')
	{
	$pdf->SetFillColor(200,191,231);
	}
	if($results[0]->titre=='T')
	{
	$pdf->SetFillColor(165, 209, 82);
	}
	// on dessine un grand rectangle coloré (cf le DF)
	$pdf->Rect(0,0, $pdf_larg, $pdf_long,'DF');
	
			//reinitialiser les coord
			
			/* ----------------les corr du rect----*/
	
	//augmenter la valeur de x et y(selon w et h du rect precedent) du rect apres chaque affichage pr obtenir un rect pr chaque personne 
	$xrect=4;
	$yrect=10;

	/* ----------------les corr du texte----*/
	$xtxt=5;
	$ytxt=50;
	
	/* ----------------les corr des images ----*/
	$ximg=9;
	$yimg=12;
	
	$j=1;
			
		}
		}	
	}
	$pdf->Output();
	ob_end_flush();
}

?>
