<?php
    // Incluir el archivo de conexión
    include("../../conexion/conexion.php");

    // Iniciar la sesión
    session_start();
    
    // Obtener el nombre de usuario de la sesión
    $codigo = $_SESSION['nombre_usuario'];

    // Obtener el ID del alumno basado en el código
    $sql_alumno = "SELECT id FROM alumnos WHERE dni = :codigo";
    $stmt_alumno = $conexion->prepare($sql_alumno);
    $stmt_alumno->bindParam(':codigo', $codigo, PDO::PARAM_STR);
    $stmt_alumno->execute();

    // Verificar si la consulta se ejecutó correctamente
    if (!$stmt_alumno) {
        die("Error en la consulta SQL para obtener el ID del alumno: ");
    }


    //Cerrar la conexión (si es necesario, dependiendo de cómo esté implementada en tu archivo de conexión)
    // $conexion->close();

    

    // Consultar las asistencias y faltas del alumno
    $sql_asistencias = "SELECT COUNT(*) as asistencias FROM asistencias WHERE id_alumno=:id_alumno AND estado='A'";
    $stmt_asistencias = $conexion->prepare($sql_asistencias);
    $stmt_asistencias->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
    $stmt_asistencias->execute();
    $row_asistencias = $stmt_asistencias->fetch(PDO::FETCH_ASSOC);

    $sql_faltas = "SELECT COUNT(*) as faltas FROM asistencias WHERE id_alumno=:id_alumno AND estado='F'";
    $stmt_faltas = $conexion->prepare($sql_faltas);
    $stmt_faltas->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
    $stmt_faltas->execute();
    $row_faltas = $stmt_faltas->fetch(PDO::FETCH_ASSOC);
   
?>

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
      $this->Cell(50); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE MIS ASISTENCIAS "), 0, 1, 'C', 0);
      $this->Ln(7);

         
   

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetX(70);
      $this->SetFillColor(0, 0, 0); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(55, 10, utf8_decode('FECHA'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('ESTADO'), 1, 1, 'C', 1);
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


    // Verificar si se encontraron resultados
    if ($stmt_alumno->rowCount() > 0) {
      // Obtener el ID del alumno
      $row = $stmt_alumno->fetch(PDO::FETCH_ASSOC);
      $id_alumno = $row['id'];
  
      // Consultar las notas del alumno usando el ID obtenido
      $sql_asist= "SELECT fecha, estado from asistencias WHERE id_alumno=:id_alumno";
      $stmt_asist= $conexion->prepare($sql_asist);
      $stmt_asist->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
      $stmt_asist->execute();
  
      // Verificar si la consulta se ejecutó correctamente
      if ($sql_asist) {
          // Recorre los resultados de la consulta y muestra los datos en la tabla del PDF
          while ($datos_reporte = $stmt_asist->fetch(PDO::FETCH_OBJ)) {
              $i = $i + 1;
              $pdf->SetX(70);
              $pdf->Cell(55, 10, utf8_decode($datos_reporte->fecha), 1, 0, 'C', 0);
              $pdf->Cell(20, 10, utf8_decode($datos_reporte->estado), 1, 1, 'C', 0);
          }
      } else {
          echo "Error en la consulta SQL para obtener las notas del alumno.";
      }
  } else {
      echo "No se encontró ningún alumno con el código proporcionado.";
  }

$pdf->Output('Asistencias.pdf','I');