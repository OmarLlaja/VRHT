<?php

    // Incluir la conexión a la base de datos
    include("../../conexion/conexion.php");

        // Obtener los datos del formulario
        $id_grado = $_POST['grado'];
        $hora_inicio = $_POST['hora_inicio'];
        $hora_fin = $_POST['hora_fin'];
        $lunes = $_POST['lunes'];
        $martes = $_POST['martes'];
        $miercoles = $_POST['miercoles'];
        $jueves = $_POST['jueves'];
        $viernes = $_POST['viernes'];
        $anio = date("Y");

        // Verificar que los campos no estén vacíos
        if (!empty($id_grado) &&!empty($hora_inicio) && !empty($hora_fin) && !empty($lunes) && !empty($martes) && !empty($miercoles) && !empty($jueves) && !empty($viernes)) {
            // Preparar la consulta INSERT
            $stmt = $conexion->prepare("INSERT INTO horario (id_grado, hora_inicio, hora_fin, lunes, martes, miercoles, jueves, viernes, anio)
                                        VALUES (:id_grado,:hora_inicio, :hora_fin, :lunes, :martes, :miercoles, :jueves, :viernes, :anio)");
            
            // Asignar los valores a los parámetros de la consulta
            $stmt->bindParam(':id_grado', $id_grado);
            $stmt->bindParam(':hora_inicio', $hora_inicio);
            $stmt->bindParam(':hora_fin', $hora_fin);
            $stmt->bindParam(':lunes', $lunes);
            $stmt->bindParam(':martes', $martes);
            $stmt->bindParam(':miercoles', $miercoles);
            $stmt->bindParam(':jueves', $jueves);
            $stmt->bindParam(':viernes', $viernes);
            $stmt->bindParam(':anio', $anio);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                echo "El horario ha sido agregado exitosamente.";
                header("location:hprimero.php");

            } else {
                echo "Error al agregar el horario: " . $stmt->errorInfo()[2];
            }

            // Cerrar el statement
            $stmt = null;
        } else {
            echo "Por favor complete todos los campos.";
    }



?>