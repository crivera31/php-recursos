<?php
require('../fpdf.php');
class PDF extends FPDF
{
// Cabecera de p�gina
function Header()
{
	// Logo
	$this->Image('logo.png',10,8,70,20);
	$this->Image('logo.png',250,8,33);
	// $this->Image('logo.png' , 80 ,22, 35 , 38,'PNG', 'http://www.desarrolloweb.com');
	// Arial bold 15
	$this->SetFont('Arial','B',10);
	// Movernos a la derecha
	$this->Cell(130);
	// Titulo
	$title1 = 'UNIDAD DE GESTION EDUCATIVA LOCAL SANTA - UGELS';
	$this->Cell(30,10,$title1,0,0,'C');
	// Salto de linea

	$this->Ln(5);
	$this->SetFont('Times','IB',8);
	$this->Cell(120);
	$title2 = 'FORMATO 02';
	$this->Cell(50,10,$title2,0,0,'C');

	$this->Ln(5);
	$this->SetFont('Arial','B',8);
	$this->Cell(120);
	$title3 = 'INFORME DE HORAS EFECTIVAS DE TRABAJO PEDAGOGICO EN LAS INSTITUCIONES EDUCATIVAS';
	$this->Cell(50,10,$title3,0,0,'C');

	$this->Ln(4);
	$this->SetFont('Arial','B',8);
	$this->Cell(120);
	$title4 = 'PUBLICAS';
	$this->Cell(50,10,$title4,0,0,'C');

	$this->Ln(5);
	$this->SetFont('Arial','B',10);
	$this->Cell(120);
	$title5 = '2019';
	$this->Cell(50,10,$title5,0,0,'C');

	$this->Ln(7);
}

// Pie de p�gina
function Footer()
{
	// Posici�n: a 1,5 cm del final
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// N�mero de p�gina
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

function TablaBasica($header)
   {
		 //fuente en negrita
		$this->SetFont('Arial','B',8);
    //Cabecera
		foreach($header as $col)
		$this->Cell(40,7,$col,1);
		
    $this->Ln();
		
		$this->SetFont('Arial','',8);
      $this->Cell(40,5,"hola",1);
      $this->Cell(40,5,"hola2",1);
      $this->Cell(40,5,"hola3",1);
			$this->Cell(40,5,"hola4",1);
			$this->Cell(40,5,"hola5",1);
			$this->Cell(40,5,"hola6",1);
			$this->Cell(40,5,"hola7",1);
      $this->Ln();
      $this->Cell(40,5,"linea ",1);
      $this->Cell(40,5,"linea 2",1);
      $this->Cell(40,5,"linea 3",1);
			$this->Cell(40,5,"linea 4",1);
			$this->Cell(40,5,"linea 5",1);
			$this->Cell(40,5,"linea 6",1);
			$this->Cell(40,5,"linea 7",1);
	 }
}

// Creaci�n del objeto de la clase heredada
$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$title='Reporte en PDF'; 
$pdf->SetTitle($title); 

$pdf->SetFont('Arial','B',8);
$pdf->Cell(0,10,'INSTITUCION EDUCATIVA :',0,0);

$pdf->SetFont('Arial','',8);
$pdf->SetXY(48, 36);  //X , Y
$pdf->Cell(0,10,'GRAN MAESTRO',0,1);

$pdf->Ln(-6);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(0,10,'NIVEL :',0,1);

$pdf->SetFont('Arial','',8);
$pdf->SetXY(21, 40);  //X , Y
$pdf->Cell(0,10,'INICIAL - PRIMARIA - SECUNDARIA',0,0);

$pdf->SetFont('Arial','B',8);
$pdf->SetXY(75, 40);  //X , Y
$pdf->Cell(0,10,'MODALIDAD :',0,1);

$pdf->SetFont('Arial','',8);
$pdf->SetXY(95, 40);  //X , Y
$pdf->Cell(0,10,'EDUCACION BASICA REGULAR - EBR',0,1);

$pdf->Output();
?>
