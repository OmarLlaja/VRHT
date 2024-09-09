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
      global $año_busqueda;
      if (isset($_GET['año_busqueda'])) {
         $año_busqueda = $_GET['año_busqueda'];
      } else {
         $año_busqueda = date('Y'); // default to the current year if not set
      }

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

      /* CORREO */
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Correo : VRHT@GMAIL.EDU.PE"), 0, 1, 0, '', 0);
      $this->Ln(5);

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(0, 0, 0);
      $this->Cell(50); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE MATRICULAS "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetX(30);
      $this->SetFillColor(0, 0, 0); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(15, 10, utf8_decode('AÑO'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('ALUMNO'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('GRADO'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('SECCION'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('FECHA'), 1, 1, 'C', 1);
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
global $año_busqueda;
$año_busqueda = isset($_GET['año_busqueda']) ? $_GET['año_busqueda'] : date('Y');

try {
   $stmt = $conexion->prepare("SELECT m.id, m.anio, a.nombres AS alumno, g.nombre_grado AS grado, s.nombre_seccion AS seccion, m.fecha_matricula AS fecha
                                FROM matriculas m
                                INNER JOIN alumnos a ON m.id_alumno = a.id
                                INNER JOIN grados g ON m.id_grado = g.id
                                INNER JOIN secciones s ON m.id_seccion = s.id
                                WHERE m.anio = :anio");
   $stmt->bindParam(':anio', $año_busqueda, PDO::PARAM_INT);
   $stmt->execute();

   // Recorre los resultados de la consulta y muestra los datos en la tabla del PDF
   while ($datos_reporte = $stmt->fetch(PDO::FETCH_OBJ)) {
      $i = $i + 1;
      $pdf->SetX(30);
      $pdf->SetFillColor(192, 192, 192); // Establecer el color de la celda en gris
      $pdf->Cell(15, 10, utf8_decode($datos_reporte->anio), 1, 0, 'C', 1);
      $pdf->Cell(30, 10, utf8_decode($datos_reporte->alumno), 1, 0, 'C', 1);
      $pdf->Cell(30, 10, utf8_decode($datos_reporte->grado), 1, 0, 'C', 1);
      $pdf->Cell(30, 10, utf8_decode($datos_reporte->seccion), 1, 0, 'C', 1);
      $pdf->Cell(30, 10, utf8_decode($datos_reporte->fecha), 1, 1, 'C', 1);
   }
} catch (PDOException $e) {
   echo "Error: " . $e->getMessage();
}

$pdf->Output('matriculas.pdf', 'I');
