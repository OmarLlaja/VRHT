<?php
include("../../conexion/conexion.php");

if (isset($_GET['id'])) {
    $txtid = (isset($_GET['id']) ? $_GET['id'] : "");
    $stm = $conexion->prepare("SELECT * FROM calificaciones WHERE id=:txtid");
    $stm->bindParam(":txtid", $txtid);
    $stm->execute();
    $registro = $stm->fetch(PDO::FETCH_ASSOC);

    $año = $registro['anio'];
    $alumno = $registro['id_alumno'];
    $curso = $registro['id_curso'];
    $profesor = $registro['id_profesor'];
    $grado = $registro['id_grado'];
    $nota1 = $registro['unidad1'];
    $nota2 = $registro['unidad2'];
    $nota3 = $registro['unidad3'];
    $promedio = $registro['promedio'];

    if ($_POST) {
        $alumno = (isset($_POST['alumno']) ? $_POST['alumno'] : "");
        $curso = (isset($_POST['curso']) ? $_POST['curso'] : "");
        $profesor = (isset($_POST['profesor']) ? $_POST['profesor'] : "");
        $grado = (isset($_POST['grado']) ? $_POST['grado'] : "");
        $nota1 = (isset($_POST['nota1']) ? $_POST['nota1'] : "");
        $nota2 = (isset($_POST['nota2']) ? $_POST['nota2'] : "");
        $nota3 = (isset($_POST['nota3']) ? $_POST['nota3'] : "");
        $promedio = (isset($_POST['promedio']) ? $_POST['promedio'] : "");
        $anio = (isset($_POST['anio']) ? $_POST['anio'] : "");

        $stm = $conexion->prepare("UPDATE calificaciones SET id_alumno=:alumno, id_curso=:curso, id_profesor=:profesor, 
        id_grado=:grado, unidad1=:nota1, unidad2=:nota2, unidad3=:nota3, promedio=:promedio, anio=:anio   WHERE id=:txtid");

        $stm->bindParam(":alumno", $alumno); 
        $stm->bindParam(":curso", $curso);
        $stm->bindParam(":profesor", $profesor);
        $stm->bindParam(":grado", $grado);
        $stm->bindParam(":nota1", $nota1);
        $stm->bindParam(":nota2", $nota2);
        $stm->bindParam(":nota3", $nota3);
        $stm->bindParam(":promedio", $promedio);
        $stm->bindParam(":txtid", $txtid);
        $stm->bindParam(":anio", $anio);

        $stm->execute();

        header("location:quinto.php");
    }
}
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Editar</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"   />
            
        <link rel="stylesheet" type="text/css" href="../../css/material-design-iconic-font.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/main.css">      
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
            body {
                max-height: 100vh;
                overflow-y: auto;
                padding: 20px;
            }
        </style>
    </head>

    <body>
    
        <div class="tab-pane fade active in" id="">
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-12 col-md-10 col-md-offset-1">
                                        <form action="" method="POST" >
                                            <div class="form-group">
                                                <label class="control-label">Periodo</label>
                                                <input class="form-control" type="number" name="anio" id="anio" value="<?php echo $año; ?>" min="2000" max="2200" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Alumno</label>
                                                <select class="form-control" name="alumno" required >
                                                    <option value="">Seleccionar Alumno</option> <!-- Opción predeterminada vacía -->
                                                    <?php
                                                    // Realizar una consulta para obtener la lista de alumnos
                                                    $query = "SELECT id, nombres FROM alumnos";
                                                    $stmt = $conexion->prepare($query);
                                                    $stmt->execute();
                                                    $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                    // Iterar sobre los resultados y construir las opciones del menú desplegable
                                                    foreach ($alumnos as $alum) {
                                                        $selected = ($alum['id'] == $alumno) ? "selected" : ""; // Verificar si el alumno es el representado
                                                        echo "<option value='" . $alum['id'] . "' $selected>" . $alum['nombres']."</option>"; // Establecer el atributo "selected" si es el representado
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            

                                            <div class="form-group">
                                                <label class="control-label">Curso</label>
                                                <select class="form-control" name="curso" required >
                                                    <option value="">Seleccionar Curso</option> <!-- Opción predeterminada vacía -->
                                                    <?php
                                                    // Realizar una consulta para obtener la lista de cursos
                                                    $query = "SELECT id, nombre_curso FROM cursos";
                                                    $stmt = $conexion->prepare($query);
                                                    $stmt->execute();
                                                    $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                    // Iterar sobre los resultados y construir las opciones del menú desplegable
                                                    foreach ($alumnos as $curs) {
                                                        $selected = ($curs['id'] == $curso) ? "selected" : ""; // Verificar si el curso es el representado
                                                        echo "<option value='" . $curs['id'] . "' $selected>" . $curs['nombre_curso'] . "</option>"; // Establecer el atributo "selected"
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Profesor</label>
                                                <select class="form-control" name="profesor" required >
                                                    <option value="">Seleccionar Profesor</option> <!-- Opción predeterminada vacía -->
                                                    <?php
                                                    // Realizar una consulta para obtener la lista de profesores
                                                    $query = "SELECT id, nombres FROM profesores";
                                                    $stmt = $conexion->prepare($query);
                                                    $stmt->execute();
                                                    $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                    // Iterar sobre los resultados y construir las opciones del menú desplegable
                                                    foreach ($alumnos as $prof) {
                                                        $selected = ($prof['id'] == $profesor) ? "selected" : ""; // Verificar profesor
                                                        echo "<option value='" . $prof['id'] . "' $selected>" . $prof['nombres']."</option>"; // Establecer el atributo "selected"
                                                    }                                                  
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Grado</label>
                                                <select class="form-control" name="grado" required >
                                                    <option value="">Seleccionar Grado</option> <!-- Opción predeterminada vacía -->
                                                    <?php
                                                    // Realizar una consulta para obtener la lista de grados
                                                    $query = "SELECT id, nombre_grado FROM grados WHERE id='6'" ;
                                                    $stmt = $conexion->prepare($query);
                                                    $stmt->execute();
                                                    $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                    // Iterar sobre los resultados y construir las opciones del menú desplegable
                                                    foreach ($alumnos as $grd) {
                                                        $selected = ($grd['id'] == $grado) ? "selected" : ""; // Verificar grado
                                                        echo "<option value='" . $grd['id'] . "' $selected>" . $grd['nombre_grado']."</option>"; // Establecer el atributo "selected"
                                                   }
                                                    ?>
                                                </select>
                                            </div>

                                                <div class="form-group label-floating">
												    <label class="control-label">Unidad 1</label>
												    <input class="form-control" type="text" name="nota1" value="<?php echo $nota1; ?>">
												</div>
                                                <div class="form-group label-floating">
												    <label class="control-label">Unidad 2</label>
												    <input class="form-control" type="text" name="nota2" value="<?php echo $nota2; ?>">
												</div>
                                                <div class="form-group label-floating">
												    <label class="control-label">Unidad 3</label>
												    <input class="form-control" type="text" name="nota3" value="<?php echo $nota3; ?>" >
												</div>
                                                <div class="form-group label-floating">
												    <label class="control-label">Promedio</label>
												    <input class="form-control" type="text" name="promedio" value="<?php echo $promedio; ?>">
												</div>
													
                                                                                                                                                                            

                                            <p class="text-center">
                                                   
                                                <td><a href="quinto.php" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-close"></i> CERRAR</a></td>
                                                <button type="submit" class="btn btn-success btn-raised btn-xs zmdi zmdi-floppy"> GUARDAR</button>
                           
                                            </p>
                                        </form>
						
                                     </div>
								</div>
							</div>
                            
		</div>


 </body>
</html>