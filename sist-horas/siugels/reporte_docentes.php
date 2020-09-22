<?php

if (isset($_POST['verificar'])) {
    // echo 'se envio el for';
    if (empty($_POST['SeleccInst'])) {
        // echo 'seleccione';
        $msj = 'escoga_colegio';
        header("location: view_docentes.php?error=$msj");

    } else {

        $id = $_POST['SeleccInst'];
        require('libreria_fpdf/fpdf.php');
        require_once '../class/conexionDB.php';

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
                $this->Cell(80);
                // Title
                $this->Cell(30, 10, 'Listado de Docentes', 0, 0, 'C');
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
            $query = "SELECT d.dni, d.nombre, d.ape_paterno, d.ape_materno, inst.nombre as nom_inst, d.nombre_grado, d.nombre_seccion   
            from docentes d
            inner JOIN instituciones inst
            on d.IdInstitucion = inst.IdInstitucion
            where d.IdInstitucion = $id
            ORDER by d.ape_paterno";
            $data = $conn->query($query);
            $data->execute();
        } catch (PDOException $e) {
            echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
        }
        $docentes = $data->fetchAll(PDO::FETCH_ASSOC);

        // Instanciation of inherited class
        $pdf = new PDF(); //'L','mm','A4' para horizontal
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times', 'B', 12);
        // $pdf->SetFillColor(232,232,232);//Fondo verde de celda
        // $pdf->SetTextColor(2,157,116); //Letra color blanco
        $pdf->Cell(6, 6, utf8_decode('N°'), 1, 0, 'C');
        $pdf->Cell(20, 6, 'DNI', 1, 0, 'C');
        $pdf->Cell(60, 6, 'APELLIDOS y NOMBRES', 1, 0, 'C');
        $pdf->Cell(50, 6, 'INSTITUCION', 1, 0, 'C');
        $pdf->Cell(25, 6, 'GRADO', 1, 0, 'C');
        $pdf->Cell(28, 6, 'SECCION', 1, 1, 'C');
        // $pdf->SetFillColor(2,157,116);
        $i = 1;
        foreach($docentes as $row){
            $pdf->SetFont('Times', '', 11);

            $pdf->Cell(6, 6, $i, 1, 0, 'C');
            $pdf->Cell(20, 6, $row['dni'], 1, 0, 'C');
            $pdf->Cell(60, 6, utf8_decode($row['ape_paterno']) . ' ' . utf8_decode($row['ape_materno']) . ' ' . utf8_decode($row['nombre']), 1, 0, 'C');
            $pdf->Cell(50, 6, utf8_decode($row['nom_inst']), 1, 0, 'C');
            $pdf->Cell(25, 6, utf8_decode($row['nombre_grado']), 1, 0, 'C');
            $pdf->Cell(28, 6, utf8_decode($row['nombre_seccion']), 1, 1, 'C');
            $i++;
        }

        // $pdf->Output();
        $pdf->Output('lista_docentes.pdf', 'D');
    }
}
?>
