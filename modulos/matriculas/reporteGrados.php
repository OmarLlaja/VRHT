<?php
require('../../fpdf/fpdf.php');
include("../../conexion/conexion.php");

class PDF extends FPDF
{
   // Cabecera de página
   function Header()
   {
      // Carga la imagen
$image_path = '../../fpdf/logo.png';
$original_width = 30; // ancho original de la imagen
$original_height = 60; // alto original de la imagen

// Calcula el factor de escala
$factor_x = 0.25 * $this->w;
$factor_y = ($original_height / $original_width) * $factor_x;

// Dibuja la imagen
$this->Image($image_path, 0, 0, $factor_x, $factor_y);

$this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
$this->Cell(45); // Movernos a la derecha
$this->SetTextColor(0, 0, 0); //color
$this->Cell(110, 15, utf8_decode('VICTOR RAUL HAYA DE LA TORRE'), 0, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
$this->Ln(3); // Salto de línea
$this->SetTextColor(103); //color
/* UBICACION */
$this->Cell(110);  // mover a la derecha
$this->SetFont('Arial', 'B', 10);
$this->Cell(96, 10, utf8_decode("Ubicación : Santa Clara "), 0, 0, '', 0);
$this->Ln(5);

/* TELEFONO */
$this->Cell(110);  // mover a la derecha
$this->SetFont('Arial', 'B', 10);
$this->Cell(59, 10, utf8_decode("Teléfono : 929633735 "), 0, 0, '', 0);
$this->Ln(5);

/* COREEO */
$this->Cell(110);  // mover a la derecha
$this->SetFont('Arial', 'B', 10);
$this->Cell(85, 10, utf8_decode("Correo : VRHT@GMAIL.EDU.PE"), 0, 1, 0, '', 0);
$this->Ln(5);



/* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(0, 0, 0);
      $this->Cell(50); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE GRADOS "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetX(50);
      $this->SetFillColor(0, 0, 0); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(20, 10, utf8_decode('N°'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('GRADO'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('DESCRIPCION'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

$pdf = new PDF();
$pdf->AddPage(); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

// Realiza la consulta a la base de datos para obtener los datos de los grados
$resultado = $conexion->query("SELECT id, nombre_grado, descripcion FROM grados");

// Recorre los resultados de la consulta y muestra los datos en la tabla del PDF
while ($datos_reporte = $resultado->fetch(PDO::FETCH_OBJ)) {
   $i = $i + 1;
   $pdf->SetX(50);
   $pdf->Cell(20, 10, utf8_decode($i), 1, 0, 'C', 0);
   $pdf->Cell(40, 10, utf8_decode($datos_reporte->nombre_grado), 1, 0, 'C', 0);
   $pdf->Cell(40, 10, utf8_decode($datos_reporte->descripcion), 1, 1, 'C', 0);
}

$pdf->Output('Grados.pdf','I');