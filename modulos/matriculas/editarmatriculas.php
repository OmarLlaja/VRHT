<?php
include("../../conexion/conexion.php");
if (isset($_GET['id'])) {

    


    $txtid = (isset($_GET['id']) ? $_GET['id'] : "");
    $stm = $conexion->prepare("SELECT * FROM matriculas WHERE id=:txtid");
    $stm->bindParam(":txtid", $txtid);
    $stm->execute();
    $registro = $stm->fetch(PDO::FETCH_ASSOC);
    $anio = $registro['anio'];
    $alumno = $registro['id_alumno'];
    $grado = $registro['id_grado'];
    $seccion = $registro['id_seccion'];
    $fecha = $registro['fecha_matricula'];

    if ($_POST) {

         
        
        $anio = (isset($_POST['anio']) ? $_POST['anio'] : "");
        $alumno = (isset($_POST['alumno']) ? $_POST['alumno'] : "");
        $grado = (isset($_POST['grado']) ? $_POST['grado'] : "");
        $seccion = (isset($_POST['seccion']) ? $_POST['seccion'] : "");
        $fecha = (isset($_POST['fecha']) ? $_POST['fecha'] : "");

        $stm = $conexion->prepare("UPDATE matriculas SET anio=:anio, id_alumno=:alumno, id_grado=:grado, 
        id_seccion=:seccion, fecha_matricula=:fecha WHERE id=:txtid");

        $stm->bindParam(":anio", $anio);
        $stm->bindParam(":alumno", $alumno);
        $stm->bindParam(":grado", $grado);
        $stm->bindParam(":seccion", $seccion);
        $stm->bindParam(":fecha", $fecha);
        $stm->bindParam(":txtid", $txtid);

        $stm->execute();

        header("location:matriculas.php");
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
            
        <link rel="stylesheet" type="text/css" href="http://localhost/COLEGIO1.0/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" type="text/css" href="http://localhost/COLEGIO1.0/css/main.css">      
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
    
        <div class="tab-pane fade active in" id="new">
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-12 col-md-10 col-md-offset-1">
                                    <form action="" method="POST" class="formulario" >
												<div class="form-group label-floating">
												    <label class="control-label">Año</label>
												    <input class="form-control" type="text" name="anio"  value="<?php echo $anio; ?>" required>
												</div>
																								
												<div class="form-group">
													<label class="control-label">Alumno</label>
													<select class="form-control" name="alumno" required>
														<option value="">Seleccionar Alumno</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de alumnos
														$query = "SELECT id, nombres FROM Alumnos";
														$stmt = $conexion->prepare($query);
														$stmt->execute();
														$alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

														// Iterar sobre los resultados y construir las opciones del menú desplegable
														foreach ($alumnos as $alm) {
                                                            $selected = ($alm['id'] == $seccion) ? "selected" : ""; // Verificar si el alumno es el representado
                                                            echo "<option value='" . $alm['id'] . "' $selected>" . $alm['nombres'] . "</option>"; // Establecer el atributo "selected" si es el representado
                                                         }
														?>
													</select>
												</div>	
                                                <div class="form-group">
													<label class="control-label">Grado</label>
													<select class="form-control" name="grado" required>
														<option value="">Seleccionar Grado</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de alumnos
														$query = "SELECT id, nombre_grado FROM grados";
														$stmt = $conexion->prepare($query);
														$stmt->execute();
														$alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

														// Iterar sobre los resultados y construir las opciones del menú desplegable
														foreach ($alumnos as $grad) {
                                                            $selected = ($grad['id'] == $seccion) ? "selected" : ""; // Verificar si el alumno es el representado
                                                            echo "<option value='" . $grad['id'] . "' $selected>" . $grad['nombre_grado'] . "</option>"; // Establecer el atributo "selected" si es el representado
                                                         }
														?>
													</select>
												</div>	
                                                <div class="form-group">
													<label class="control-label">Seccion</label>
													<select class="form-control" name="seccion" required>
														<option value="">Seleccionar Seccion</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de alumnos
														$query = "SELECT id, nombre_seccion FROM secciones";
														$stmt = $conexion->prepare($query);
														$stmt->execute();
														$alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

														// Iterar sobre los resultados y construir las opciones del menú desplegable
														foreach ($alumnos as $secc) {
                                                            $selected = ($secc['id'] == $seccion) ? "selected" : ""; // Verificar si el alumno es el representado
                                                            echo "<option value='" . $secc['id'] . "' $selected>" . $secc['nombre_seccion'] . "</option>"; // Establecer el atributo "selected" si es el representado
                                                         
                                                        }
														?>
													</select>
												</div>	
                                                <div class="form-group label-floating">
												    <label class="control-label">Fecha de Matricula</label>
												    <input class="form-control" type="Date" name="fecha"  value="<?php echo $fecha; ?>" required>
												</div>
                                                								
												
												<div class="form-group">
                                                    <td><a href="matriculas.php" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-close"></i> CERRAR</a></td>
                                                    <button type="submit" class="btn btn-success btn-raised btn-xs zmdi zmdi-refresh"> REFRESCAR</button>
                                                </div>
										</form>
						
                                     </div>
								</div>
							</div>
                            
		</div>


 </body>
</html>