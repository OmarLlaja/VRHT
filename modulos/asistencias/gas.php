<?php
session_start();
// Conexión a la base de datos
include("../../conexion/conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $fecha = trim($_POST['fecha']);

    // Validar y procesar los datos
    if (!empty($fecha)) {
        // Comprobar que no se haya registrado la asistencia en la misma fecha
        $sql = "SELECT COUNT(*) FROM Asistencias WHERE id_alumno = :id_alumno AND id_grado = :id_grado AND fecha = :fecha ";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id_alumno', $idAlumno);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':id_grado', $idGrado);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            echo "<script>alert('La asistencia para esta fecha ya ha sido registrada.');</script>";
        } else {
            // Realizar la inserción de las asistencias en la base de datos
            $sql = "SELECT a.id, a.apellidos, a.nombres, g.id AS id_grado FROM Alumnos a
                    INNER JOIN matriculas m ON a.id = m.id_alumno
                    INNER JOIN Grados g ON g.id = m.id_grado
                    WHERE m.id_grado = '3'
                    ORDER BY a.apellidos, a.nombres";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($alumnos as $alumno) {
                $idAlumno = $alumno['id'];
                $idGrado = $alumno['id_grado'];
                // Verificar si el checkbox de asistencia está marcado
                $asistencia = isset($_POST['asistencia_' . $alumno['id']]) && $_POST['asistencia_' . $alumno['id']] == 'asistio' ? 'A' : 'F';


                

                // Insertar la asistencia en la base de datos
                insertarAsistencia($conexion, $idAlumno, $idGrado, $fecha, $asistencia);
            }

            // Mostrar mensaje de éxito
            echo "<script>alert('Asistencias agregadas correctamente.');</script>";
            header("location:assegundo.php");
        }
    } else {
        // Mostrar mensaje de error si falta la fecha
        echo "<script>alert('Por favor, ingrese la fecha.');</script>";
    }
}

// Función insertarAsistencia

function insertarAsistencia($conexion, $idAlumno, $idGrado, $fecha, $asistencia) {
    // Comprobar si la asistencia ya ha sido registrada para el alumno y la fecha específicos
    $sql = "SELECT COUNT(*) FROM Asistencias WHERE id_alumno = :id_alumno AND id_grado = :id_grado AND fecha = :fecha ";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id_alumno', $idAlumno);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':id_grado', $idGrado);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if ($count == 0) {
        $sql = "INSERT INTO Asistencias (id_alumno, id_grado, fecha, estado) VALUES (:id_alumno, :id_grado, :fecha, :estado)";

        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(':id_alumno', $idAlumno, PDO::PARAM_INT);
        $stmt->bindValue(':id_grado', $idGrado, PDO::PARAM_INT);
        $stmt->bindValue(':fecha', $fecha, PDO::PARAM_STR);
        $stmt->bindValue(':estado', $asistencia, PDO::PARAM_STR);

        return $stmt->execute();
    }

    return false;
}
?>
