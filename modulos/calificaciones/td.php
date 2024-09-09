

<link rel="stylesheet" href="http://localhost/COLEGIO1.0/css/main.css">
	<link rel="stylesheet" href="http://localhost/COLEGIO1.0/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">


<?php
include("../../conexion/conexion.php");
   

		if (isset($_GET['id'])) {

			


		$txtid = (isset($_GET['id']) ? $_GET['id'] : "");
		$stm = $conexion->prepare("SELECT * FROM calificaciones WHERE id=:txtid");
		$stm->bindParam(":txtid", $txtid);
		$stm->execute();
		$registro = $stm->fetch(PDO::FETCH_ASSOC);
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

$stm = $conexion->prepare("UPDATE calificaciones SET nombres=:nombres, apellidos=:apellidos, dni=:dni, 
direccion=:direccion, telefono=:telefono, correo_electronico=:correo, id_alumno=:apoderado  WHERE id=:txtid");

$stm->bindParam(":nombres", $nombres);
$stm->bindParam(":apellidos", $apellidos);
$stm->bindParam(":dni", $dni);
$stm->bindParam(":direccion", $direccion);
$stm->bindParam(":telefono", $telefono);
$stm->bindParam(":correo", $correo);
$stm->bindParam(":apoderado", $apoderado);
$stm->bindParam(":txtid", $txtid);

$stm->execute();

header("location:representative.php");
}
}
?>


						 <!-- Formulario EDITAR -->
                         <div id="formularioFlotanteeditar" class="formulario-flotante" style="display: none;">
                          <span class="cerrar" onclick="cerrarFormulario()"><i class="zmdi zmdi-close-circle"></i></span>
                            <h2>Formulario Para Editar Calificaciones</h2>
                            <!-- Aquí puedes agregar los campos del formulario -->

								<div class="container-fluid">
									<div class="row">
										<form action="" method="POST" >

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
														foreach ($alumnos as $alumno) {
															$selected = ($alumno['id'] == $alumnoSeleccionado) ? "selected" : ""; // Verificar si el alumno es el representado
															echo "<option value='" . $alumno['id'] . "' $selected>" . $alumno['nombres'] . "</option>"; // Establecer el atributo "selected" si es el representado
														}
														?>
													</select>
												</div>
                                                <div class="form-group">
													<label class="control-label">Curso</label>
													<select class="form-control" name="curso" required>
														<option value="">Seleccionar Curso</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de cursos
														$query = "SELECT id, nombre_curso FROM cursos WHERE id='1' ";
														$stmt = $conexion->prepare($query);
														$stmt->execute();
														$alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

														// Iterar sobre los resultados y construir las opciones del menú desplegable
														foreach ($alumnos as $alumno) {
														echo "<option value='" . $alumno['id'] . "'>" . $alumno['nombre_curso'] . "</option>";
														}
														?>
													</select>
												</div>
                                                <div class="form-group">
													<label class="control-label">Profesor</label>
													<select class="form-control" name="profesor" required>
														<option value="">Seleccionar Profesor</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de profesores
														$query = "SELECT id, nombres FROM profesores";
														$stmt = $conexion->prepare($query);
														$stmt->execute();
														$alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

														// Iterar sobre los resultados y construir las opciones del menú desplegable
														foreach ($alumnos as $alumno) {
														echo "<option value='" . $alumno['id'] . "'>" . $alumno['nombres'] . "</option>";
														}
														?>
													</select>
												</div>
                                                <div class="form-group">
													<label class="control-label">Grado</label>
													<select class="form-control" name="grado" required>
														<option value="">Seleccionar Grado</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de grados
														$query = "SELECT id, nombre_grado FROM grados WHERE id='1'" ;
														$stmt = $conexion->prepare($query);
														$stmt->execute();
														$alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

														// Iterar sobre los resultados y construir las opciones del menú desplegable
														foreach ($alumnos as $alumno) {
														echo "<option value='" . $alumno['id'] . "'>" . $alumno['nombre_grado'] . "</option>";
														
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
													<button href="#!" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
												</p>
											</form>
										
									</div>
								
						        </div>


                        </div>

<!--====== Scripts -->
<script src="../../js/jquery-3.1.1.min.js"></script>
<script src="../../js/sweetalert2.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/material.min.js"></script>
<script src="../../js/ripples.min.js"></script>
<script src="../../js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="http://localhost/COLEGIO1.0/js/main.js"></script>
<script>
    $.material.init();
</script>					  	