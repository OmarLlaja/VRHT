<?php
require('../../../fpdf/fpdf.php');
include("../../../conexion/conexion.php");

// Suponiendo que la fecha de filtro se pasa como parámetro GET llamado 'fecha'
$fecha_filtro = $_GET['fecha'];

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Carga la imagen
        $image_path = '../../../fpdf/logo.png';
        $original_width = 30; // ancho original de la imagen
        $original_height = 60; // alto original de la imagen

        // Calcula el factor de escala
        $factor_x = 0.25 * $this->w;
        $factor_y = ($original_height / $original_width) * $factor_x;

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
        $this->Cell(100, 10, utf8_decode("ASISTENCIAS - 3RO GRADO"), 0, 1, 'C', 0);
        $this->Ln(7);
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

// Crear una instancia de la clase PDF
$pdf = new PDF();
$pdf->AddPage('L'); // 'L' para orientación horizontal, 'P' para orientación vertical

// Establecer el color de fondo de la cabecera y la fuente
$pdf->SetX(30);
$pdf->SetFillColor(0, 0, 0); //colorFondo
$pdf->SetTextColor(255, 255, 255); //colorTexto
$pdf->SetDrawColor(163, 163, 163); //colorBorde

// Obtener la lista de alumnos y sus asistencias
$sql = "SELECT a.id, a.nombres, a.apellidos, g.nombre_grado AS grado
        FROM Alumnos a
        LEFT JOIN Matriculas m ON a.id = m.id_alumno
        LEFT JOIN Grados g ON m.id_grado = g.id
        WHERE g.id = '4'
        GROUP BY a.id
        ORDER BY a.apellidos, a.nombres";
$stm = $conexion->prepare($sql);
$stm->execute();
$alumnos = $stm->fetchAll(PDO::FETCH_ASSOC);

// Obtener las fechas distintas de las asistencias
$sqlFechas = "SELECT DISTINCT fecha FROM Asistencias ORDER BY fecha ASC";
$stmtFechas = $conexion->prepare($sqlFechas);
$stmtFechas->execute();
$fechas = $stmtFechas->fetchAll(PDO::FETCH_COLUMN);

// Filtrar las fechas según la fecha de filtro
if ($fecha_filtro) {
    $fechas = array_filter($fechas, function ($fecha) use ($fecha_filtro) {
        return $fecha == $fecha_filtro;
    });
}

// Títulos de las columnas
$header = array('Nombres', 'Apellidos', 'Grado');
$pdf->SetFont('Arial', 'B', 10);
$w = array(50, 50, 50); // Ancho de las columnas

// Agregar las columnas para cada fecha
foreach ($fechas as $fecha) {
    $header[] = $fecha;
    $w[] = 50;
}

// Imprimir la cabecera
for ($i = 0; $i < count($header); $i++) {
    $pdf->Cell($w[$i], 10, $header[$i], 1, 0, 'C', true);
}
$pdf->Ln();

// Imprimir los datos de los alumnos y su asistencia por cada fecha
foreach ($alumnos as $alumno) {
    $pdf->SetX(30);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFillColor(192, 192, 192); // Establecer el color de la celda en gris
    $pdf->Cell($w[0], 10, utf8_decode($alumno['nombres']), 1, 0, 'C', 1);
    $pdf->Cell($w[1], 10, utf8_decode($alumno['apellidos']), 1, 0, 'C', 1);
    $pdf->Cell($w[2], 10, utf8_decode($alumno['grado']), 1, 0, 'C', 1);

    // Obtener la asistencia del alumno para cada fecha
    foreach ($fechas as $fecha) {
        $sqlAsistencia = "SELECT IFNULL(estado, '-') AS asistencia FROM Asistencias WHERE id_alumno = :id_alumno AND fecha = :fecha";
        $stmtAsistencia = $conexion->prepare($sqlAsistencia);
        $stmtAsistencia->bindParam(':id_alumno', $alumno['id'], PDO::PARAM_INT);
        $stmtAsistencia->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $stmtAsistencia->execute();
        $asistencia = $stmtAsistencia->fetchColumn();

        $pdf->Cell($w[3], 10, utf8_decode($asistencia), 1, 0, 'C', 1);
    }
    $pdf->Ln();
}

// Salida del PDF
$pdf->Output();
?>
