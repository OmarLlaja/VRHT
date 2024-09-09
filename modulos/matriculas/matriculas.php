
<?php
include("../../conexion/conexion.php");

// Obtener el año de búsqueda del formulario o usar el año actual por defecto
$año_busqueda = isset($_GET['año_busqueda']) ? $_GET['año_busqueda'] : date("Y");

$stm = $conexion->prepare("SELECT m.id,m.anio,a.nombres AS alumno,g.nombre_grado AS grado,s.nombre_seccion AS seccion, m.fecha_matricula AS fecha
FROM matriculas m
INNER JOIN alumnos a ON m.id_alumno = a.id
INNER JOIN grados g On m.id_grado = g.id
INNER JOIN secciones s ON m.id_seccion = s.id
WHERE m.anio = $año_busqueda");

$stm->execute(); // Ejecutar la consulta preparada
$colegionacional = $stm->fetchAll(PDO::FETCH_ASSOC); // Obtener los resultados


// METODO PARA ELIMINAR
if (isset($_GET['id'])) {
    $txtid = (isset($_GET['id']) ? $_GET['id'] : "");
    $stm = $conexion->prepare("DELETE FROM matriculas WHERE id=:txtid");
    $stm->bindParam(":txtid", $txtid);
    $stm->execute();
    header("location:matriculas.php");
}

?>


<?php


//METODO PARA AGGREGARRR

if ($_POST) {
    $anio = isset($_POST['anio']) ? $_POST['anio'] : "";
    $alumno = isset($_POST['alumno']) ? $_POST['alumno'] : "";
    $grado = isset($_POST['grado']) ? $_POST['grado'] : "";
    $seccion = isset($_POST['seccion']) ? $_POST['seccion'] : "";
    $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : "";

    // Verificar si el alumno ya está matriculado en el mismo año
    $consulta = $conexion->prepare("SELECT COUNT(*) FROM matriculas WHERE id_alumno = :id_alumno AND anio = :anio");
    $consulta->bindParam(":id_alumno", $alumno);
    $consulta->bindParam(":anio", $anio);
    $consulta->execute();
    $cantidad = $consulta->fetchColumn();

    if ($cantidad > 0) {
        // El alumno ya está matriculado en el mismo año, mostrar mensaje de error o realizar alguna acción
        echo "<script>alert('El estudiante ya esta matriculado en ese año');</script>";
		echo "<script>window.location.href = 'matriculas.php';</script>";
		return;
    } else {
        // Insertar los datos en la base de datos
        $stm = $conexion->prepare("INSERT INTO matriculas(id, anio, id_alumno, id_grado, id_seccion, fecha_matricula)
            VALUES (null, :anio, :id_alumno, :id_grado, :id_seccion, :fecha_matricula)");

        $stm->bindParam(":anio", $anio);
        $stm->bindParam(":id_alumno", $alumno);
        $stm->bindParam(":id_grado", $grado);
        $stm->bindParam(":id_seccion", $seccion);
        $stm->bindParam(":fecha_matricula", $fecha);
        $stm->execute();

        header("location: matriculas.php");
    }
}

?>

<?php include("../../template/header.php");  ?>


		<!-- Content page -->
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Administrar <small>Matriculas</small></h1>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li ><a href="#new" data-toggle="tab">Nuevo</a></li>
					  	<li class="active"><a href="#list" data-toggle="tab">Lista</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						
						<div class="tab-pane fade " id="new">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-12 col-md-10 col-md-offset-1">
                                        <form action="" method="POST" >
												<div class="form-group label-floating">
												    <label class="control-label">Año</label>
												    <input class="form-control" type="text" name="anio" required>
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
														// Realizar una consulta para obtener la lista de alumnos
														$query = "SELECT id, nombre_grado FROM grados";
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
														foreach ($alumnos as $alumno) {
														echo "<option value='" . $alumno['id'] . "'>" . $alumno['nombre_seccion'] . "</option>";
														}
														?>
													</select>
												</div>	
                                                <div class="form-group label-floating">
												    <label class="control-label">Fecha de Matricula</label>
												    <input class="form-control" type="Date" name="fecha" required>
												</div>
                                                								
												
												<p class="text-center">
													<button href="#!" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
												</p>
										</form>
										
										</div>
									</div>
								</div>
						</div>
						
					  	<div class="tab-pane fade active in" id="list">
							<div class="row">
                                <div class="col-md-6">
                                    <form action="" method="GET">
                                        <label for="fecha_busqueda">Buscar por Año:</label>
                                        <input type="number" name="año_busqueda" id="año_busqueda" value="<?php echo $año_busqueda; ?>" min="2000" max="2200" required>
                                        <input type="submit" value="Buscar">
                                    </form>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="pdfMatriculas.php?año_busqueda=<?php echo $año_busqueda; ?>" target="_blank" class="btn btn-success" style="border: 2px solid #808080; background-color: #808080; color: #fff;">
                                        <i class="fas fa-file-pdf"></i> Exportar a PDF
                                    </a>
                                </div>
                            </div>
							<div class="table-responsive">
								<table class="table table-hover text-center">
									<thead>
										<tr>
											<th class="text-center">ID</th>
                                            <th class="text-center">Año</th>
											<th class="text-center">Alumno</th>
											<th class="text-center">Grado</th>
											<th class="text-center">Seccion</th>			
											<th class="text-center">Fecha</th>
											<th class="text-center">Update</th>
											<th class="text-center">Delete</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($colegionacional as $colegio)     {  ?>
												<tr>
												<td scope="row"><?php  echo $colegio['id']; ?></td>
                                                <td><?php  echo $colegio['anio']; ?></td>
												<td><?php  echo $colegio['alumno']; ?></td>
												<td><?php  echo $colegio['grado']; ?></td>
												<td><?php  echo $colegio['seccion']; ?></td>
                                                <td><?php  echo $colegio['fecha']; ?></td>

												<td>
													<a href="editarmatriculas.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-success btn-raised btn-xs zmdi zmdi-refresh"></a>
												</td>
												<td>
													<a href="matriculas.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-danger btn-raised btn-xs zmdi zmdi-delete"></a>
												</td>
												</tr>
											<?php }  ?>
										
									</tbody>
								</table>
								<ul class="pagination pagination-sm">
								  	<li class="disabled"><a href="#!">«</a></li>
								  	<li class="active"><a href="#!">1</a></li>
								  	<li><a href="#!">2</a></li>
								  	<li><a href="#!">3</a></li>
								  	<li><a href="#!">4</a></li>
								  	<li><a href="#!">5</a></li>
								  	<li><a href="#!">»</a></li>
								</ul>
							</div>
					  	</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php include("../../template/footer.php");  ?>
