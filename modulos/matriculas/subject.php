
<?php
include("../../conexion/conexion.php");

// Obtener el año de búsqueda del formulario o usar el año actual por defecto
$año_busqueda = isset($_GET['año_busqueda']) ? $_GET['año_busqueda'] : date("Y");

$stm = $conexion->prepare("SELECT * FROM cursos wHERE anio = $año_busqueda");
$stm->execute(); // Ejecutar la consulta preparada
$colegionacional = $stm->fetchAll(PDO::FETCH_ASSOC); // Obtener los resultados

// METODO PARA ELIMINAR
if (isset($_GET['id'])) {
    $txtid = (isset($_GET['id']) ? $_GET['id'] : "");
    $stm = $conexion->prepare("DELETE FROM cursos WHERE id=:txtid");
    $stm->bindParam(":txtid", $txtid);
    $stm->execute();
    header("location:subject.php");
}

?>


<?php
// METODO PARA AGREGAR
if ($_POST) {

	 // Validar campos vacios
	

	// Validar usuario único
	$usuario = $_POST['codigo'];

	$query = "SELECT COUNT(*) as total FROM cursos WHERE codigo = ?";
	$stmt = $conexion->prepare($query); 
	$stmt->execute([$usuario]);
	$result = $stmt->fetch();

	if($result['total'] > 0) {
	echo "El curso ya existe";
	return;
	}

    $codigo=(isset($_POST['codigo'])?$_POST['codigo']:"");
    $nombre=(isset($_POST['nombre'])?$_POST['nombre']:"");
    $descripcion=(isset($_POST['descripcion'])?$_POST['descripcion']:"");
	$anio=date("Y");
	$profesor=(isset($_POST['profesor'])?$_POST['profesor']:"");

    $stm=$conexion-> prepare("INSERT INTO cursos(ID,codigo,nombre_curso,descripcion,anio,id_profesor)
    values(null,:codigo,:nombre_curso,:descripcion,:anio,:id_profesor)");

    $stm->bindParam(":codigo",$codigo);
    $stm->bindParam(":nombre_curso",$nombre);
    $stm->bindParam(":descripcion",$descripcion);
	$stm->bindParam(":anio",$anio);
	$stm->bindParam(":id_profesor",$profesor);

    $stm->execute();

    header("location:subject.php");
}


?>


<?php include("../../template/header.php");  ?>

		<!-- Content page -->
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Administration <small>Cursos</small></h1>
			</div>
			<p class="lead"> Pagina donde administrara los cursos</p>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#list" data-toggle="tab">Lista</a></li>
					  	<li><a href="#new" data-toggle="tab">Nuevo</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
					  	<div class="tab-pane fade active in" id="list">
							<div class="row">
                                <div class="col-md-12">
                                    <form action="" method="GET">
                                        <label for="fecha_busqueda">Buscar por Año:</label>
                                        <input type="number" name="año_busqueda" id="año_busqueda" value="<?php echo $año_busqueda; ?>" min="2000" max="2200" required>
                                        <input type="submit" value="Buscar">
                                    </form>
                                </div>
                            </div>
							<div class="table-responsive">
								<table class="table table-hover text-center">
									<thead>
										<tr>
											<th class="text-center">ID</th>
											<th class="text-center">Codigo</th>
											<th class="text-center">Nombre</th>
											<th class="text-center">Descripcion</th>
											<th class="text-center">Update</th>
											<th class="text-center">Delete</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($colegionacional as $colegio)     {  ?>
											<tr>
											<td scope="row"><?php  echo $colegio['id']; ?></td>
											<td><?php  echo $colegio['codigo']; ?></td>
											<td><?php  echo $colegio['nombre_curso']; ?></td>
											<td><?php  echo $colegio['descripcion']; ?></td>
											<td>
												<a href="editarcursos.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-success btn-raised btn-xs">EDITAR</a>
											</td>
											<td>
												<a href="subject.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-danger btn-raised btn-xs">ELIMINAR</a>
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

						<div class="tab-pane fade" id="new">
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-12 col-md-10 col-md-offset-1">
									    <form action="" method="POST">
									    	<div class="form-group label-floating">
											  <label class="control-label">Codigo</label>
											  <input class="form-control" type="number"  name="codigo" required> 
											</div>
											
									    	<div class="form-group label-floating">
											  <label class="control-label">Nombre</label>
											  <input class="form-control" type="text"  name="nombre" required>
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Descripcion</label>
											  <input class="form-control" type="text"  name="descripcion" required>
											</div>
											<div class="form-group label-floating">
											  

											  <select class="form-control" name="profesor" required>
														<option value="">Seleccionar Profesor</option>
														<?php
														$query = "SELECT id, nombres FROM profesores";
														$stmt = $conexion->prepare($query);
														$stmt->execute();
														$alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

														foreach ($alumnos as $alumno) {
															echo "<option value='" . $alumno['id'] . "'>" . $alumno['nombres'] . "</option>";
														}
														?>
													</select>
											</div>
											
										    <p class="text-center">
										    	<button href="#!" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar </button>
										    </p>
									    </form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php include("../../template/footer.php");  ?>
