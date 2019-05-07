<?php

require_once '../../lib/fpdf/fpdf.php';
require_once '../../core/commandeC.php';
	
class myPDF extends FPDF
{


	function header_page($date,$idCommande)
	{    
		$this->Image('../front/images/eye.jpg',10,6);
		$this->SetFont('Arial','B',14);
		$this->Cell(276,5,'EYE ZONE',0,0,'C');
		$this->Ln(20);
		$this->SetFont('Times','',12);

		$this->Text(8,60,'Nemuro de facture:'.$idCommande);
		$this->Text(8,65,'Date :'.$date);
		$this->Text(8,70,'Mode de reglement : paypal');
		$this->Text(230,60,'Ayadi Yassine');
		$this->Text(230,65,'19 rue khrouba bellevue');
		$this->Text(230,70,'1009 el ouardia');
		$this->Ln(50);


	}
	function footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial','',0);
		$this->Cell(196,5,'Adress: Manar City 3th floor, Tunis - TEL:+21655996989' ,0,0,'C');
				$this->LN();

		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');

	}
	function headerTable(){

		
		$this->SetFont('Times','B',12);
		$this->Cell(46,10,'Reference',1,0,'C');
		$this->Cell(46,10,'Marque',1,0,'C');
		$this->Cell(46,10,'Qunatite',1,0,'C'); 
		$this->Cell(46,10,'TVA',1,0,'C');
		$this->Cell(46,10,'Prix Unitaire HT',1,0,'C');
		$this->Cell(46,10,'Prix NET',1,0,'C');
		$this->LN();



	}
	function viewTable($listeproduits,$prixTotal)
	{
		$this->SetFont('times','',12);
			foreach($listeproduits as $produit):

		$this->Cell(46,10, $produit->refe,1,0,'C');
	 	$this->Cell(46,10,$produit->mar,1,0,'L');
	 	$this->Cell(46,10,$produit->quantiteCommandee,1,0,'L');
	 	$this->Cell(46,10,'18%',1,0,'L');
	 	$this->Cell(46,10,$produit->prix,1,0,'L');
		$this->Cell(46,10,$produit->prix*1.18,1,0,'L');
		
		$this->LN();

			endforeach; 
		$this->LN();
        $this->Cell(46,10,'Prix Total HT',1,0,'C');
		$this->Cell(46,10,$prixTotal,1,0,'L');
		$this->LN();
        $this->Cell(46,10,'TVA ',1,0,'C');
		$this->Cell(46,10,$prixTotal*0.18,1,0,'L');
		$this->LN();
        $this->Cell(46,10,'Total ',1,0,'C');
		$this->Cell(46,10,$prixTotal*1.18." DT",1,0,'L');
	}
	

}
/*
$pdf=new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->header_page($date,$idCommande);
$pdf->headerTable();
$pdf->viewTable($listeproduits,$prixTotal);
$pdf->Output();
*/
?>	
				
