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

// Obtener el año de búsqueda de la ruta
$año_busqueda = $_GET['año_busqueda'];

// Dibuja la imagen
$this->Image($image_path, 0, 0, $factor_x, $factor_y);

$this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
$this->Cell(80); // Movernos a la derecha
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
$this->Cell(59, 10, utf8_decode("Teléfono : +51 989 557 073 "), 0, 0, '', 0);
$this->Ln(5);

/* COREEO */
$this->Cell(110);  // mover a la derecha
$this->SetFont('Arial', 'B', 10);
$this->Cell(85, 10, utf8_decode("Correo : VRHT@GMAIL.EDU.PE"), 0, 1, 0, '', 0);
$this->Ln(5);



/* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(0, 0, 0);
      $this->Cell(90); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE HORARIOS 5TO GRADO "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetX(30);
      $this->SetFillColor(0, 0, 0); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(20, 10, utf8_decode('H. INICIO'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('H. FIN'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('LUNES'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('MARTES'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('MIERCOLES'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('JUEVES'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('VIERNES'), 1, 1, 'C', 1);
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
$pdf->AddPage('landscape'); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

// Realiza la consulta a la base de datos para obtener los datos de los grados
$resultado = $conexion->query("SELECT  id,hora_inicio, hora_fin, lunes, martes, miercoles, jueves, viernes
FROM horario
WHERE id_grado='6' AND anio = $año_busqueda
GROUP BY hora_inicio, hora_fin");

// Recorre los resultados de la consulta y muestra los datos en la tabla del PDF
while ($datos_reporte = $resultado->fetch(PDO::FETCH_OBJ)) {
   $i = $i + 1;
   $pdf->SetX(30);
   $pdf->SetFillColor(192, 192, 192); // Establecer el color de la celda en gris
   $pdf->Cell(20, 10, utf8_decode($datos_reporte->hora_inicio), 1, 0, 'C', 1);
   $pdf->Cell(20, 10, utf8_decode($datos_reporte->hora_fin), 1, 0, 'C', 1);
   $pdf->Cell(40, 10, utf8_decode($datos_reporte->lunes), 1, 0, 'C', 1);
   $pdf->Cell(40, 10, utf8_decode($datos_reporte->martes), 1, 0, 'C', 1);
   $pdf->Cell(40, 10, utf8_decode($datos_reporte->miercoles), 1, 0, 'C', 1);
   $pdf->Cell(40, 10, utf8_decode($datos_reporte->jueves), 1, 0, 'C', 1);
   $pdf->Cell(40, 10, utf8_decode($datos_reporte->viernes), 1, 1, 'C', 1);
}


$pdf->Output('Horario.pdf','I');