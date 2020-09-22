<?php
        require_once '../class/conexionDB.php';
        require('libreria_fpdf/fpdf.php');
        $db = new conexionDB();
        $conn = $db->getConexion();
        class PDF extends FPDF
        {
            // Page header
            function Header()
            {
                // Logo
                // $this->Image('libreria/tutorial/logo.png',10,6,30);
                // Arial bold 15
                $this->SetFont('Arial', 'B', 15);
                // Move to the right
                $this->Cell(120);
                // Title
                $this->Cell(30, 10, 'Listado de Instituciones', 0, 0, 'C');
                // Line break
                $this->Ln(20);
            }
            // Page footer
            function Footer()
            {
                // Position at 1.5 cm from bottom
                $this->SetY(-15);
                // Arial italic 8
                $this->SetFont('Arial', 'I', 8);
                // Page number
                $this->Cell(0, 10, utf8_decode('Pág. ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
            }
        }
        try {
            $query = "SELECT d.nombre, d.ape_paterno,d.ape_materno, 
            inst.nombre as nom_inst, 
            inst.direccion, inst.niveles, inst.telefono
            from instituciones inst
            INNER JOIN directores d
            where inst.IdDirector = d.IdDirector";
            $data = $conn->query($query);
            $data->execute();
        } catch (PDOException $e) {
            die("¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine());
        }
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        // Instanciation of inherited class
        $pdf = new PDF('L','mm','A4'); //'L','mm','A4' para horizontal
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times', 'B', 12);
        $pdf->SetX(25);
        $pdf->Cell(6, 6, utf8_decode('N°'), 1, 0, 'C');
        $pdf->Cell(52, 6, 'DIRECTOR', 1, 0, 'C');
        $pdf->Cell(50, 6, 'NOMBRE', 1, 0, 'C');
        $pdf->Cell(54, 6, 'NIVELES', 1, 0, 'C');
        $pdf->Cell(50, 6, 'DIRECCION', 1, 0, 'C');
        $pdf->Cell(28, 6, 'TELEFONO', 1, 1, 'C');
        $i = 1;
        foreach($result as $row) { 
          $pdf->SetFont('Arial', '', 9);
          $pdf->SetX(25);
          $pdf->Cell(6, 6, $i, 1, 0, 'C');
          $pdf->Cell(52, 6, utf8_decode($row['ape_paterno'].' '.$row['ape_materno'].' '.$row['nombre']), 1, 0, 'C');
          $pdf->Cell(50, 6, utf8_decode($row['nom_inst']), 1, 0, 'C');
          $pdf->Cell(54, 6, utf8_decode($row['niveles']), 1, 0, 'C');
          $pdf->Cell(50, 6, utf8_decode($row['direccion']), 1, 0, 'C');
          $pdf->Cell(28, 6, utf8_decode($row['telefono']), 1, 1, 'C');
          $i++;
        }
        $pdf->Output('listado_instituciones.pdf', 'D');
?>