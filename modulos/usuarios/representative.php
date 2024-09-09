
<?php
include("../../conexion/conexion.php");

$stm = $conexion->prepare("SELECT r.id, r.nombres, r.apellidos, r.dni, r.direccion, r.telefono, r.correo_electronico, a.nombres AS representado
FROM representantes r INNER JOIN alumnos a 
ON r.id_alumno = a.id");

$stm->execute(); // Ejecutar la consulta preparada
$colegionacional = $stm->fetchAll(PDO::FETCH_ASSOC); // Obtener los resultados


// METODO PARA ELIMINAR
if (isset($_GET['id'])) {
    $txtid = (isset($_GET['id']) ? $_GET['id'] : "");
    $stm = $conexion->prepare("DELETE FROM representantes WHERE id=:txtid");
    $stm->bindParam(":txtid", $txtid);
    $stm->execute();
    header("location:representative.php");
}

?>


<?php




// METODO PARA AGREGAR
if ($_POST) {
 

	// Validar usuario único
	$usuario = $_POST['dni'];

	$query = "SELECT COUNT(*) as total FROM representantes WHERE dni = ?";
	$stmt = $conexion->prepare($query); 
	$stmt->execute([$usuario]);
	$result = $stmt->fetch();

	if($result['total'] > 0) {
	echo "El Representante ya existe";
	return;
	}

    $nombres=(isset($_POST['nombres'])?$_POST['nombres']:"");
    $apellidos=(isset($_POST['apellidos'])?$_POST['apellidos']:"");
    $dni=(isset($_POST['dni'])?$_POST['dni']:"");
    $direccion=(isset($_POST['direccion'])?$_POST['direccion']:"");
    $telefono=(isset($_POST['telefono'])?$_POST['telefono']:"");
	$correo=(isset($_POST['correo'])?$_POST['correo']:"");
	$apoderado=(isset($_POST['apoderado'])?$_POST['apoderado']:"");


    $stm=$conexion-> prepare("INSERT INTO representantes(id, nombres, apellidos, dni,
	 direccion, telefono, correo_electronico, id_alumno)
	  VALUES (null,:nombres,:apellidos,:dni,:direccion,:telefono,:correo_electronico,:id_alumno)");

    $stm->bindParam(":nombres",$nombres);
    $stm->bindParam(":apellidos",$apellidos);
    $stm->bindParam(":dni",$dni);
    $stm->bindParam(":direccion",$direccion);
    $stm->bindParam(":telefono",$telefono);
	$stm->bindParam(":correo_electronico",$correo);
	$stm->bindParam(":id_alumno",$apoderado);

    $stm->execute();

    header("location:representative.php");
}


?>

<?php include("../../template/header.php");  ?>

		<!-- Content page -->
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Users <small>Representantes</small></h1>
			</div>
			<p class="lead">Administrar Representantes</p>
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
												<label class="control-label">Nombres</label>
												<input class="form-control" type="text" name="nombres" required>
												</div>
												<div class="form-group label-floating">
												<label class="control-label">Apellidos</label>
												<input class="form-control" type="text" name="apellidos" required>
												</div>
												<div class="form-group label-floating">
												<label class="control-label">Dni</label>
												<input class="form-control" type="text" name="dni" required>
												</div>
												
												<div class="form-group label-floating">
												<label class="control-label">Direccion</label>
												<input class="form-control" type="text" name="direccion" required>
												</div>
												<div class="form-group label-floating">
												<label class="control-label">Telefono</label>
												<input class="form-control" type="text" name="telefono" required>
												</div>
												<div class="form-group">
												<label class="control-label">Email</label>
												<input class="form-control" type="email" name="correo" required>
												</div>
												
												<div class="form-group">
													<label class="control-label">Representado</label>
													<select class="form-control" name="apoderado" required>
														<option value="">Seleccionar Representado</option> <!-- Opción predeterminada vacía -->
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
												
												<p class="text-center">
													<button href="#!" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
												</p>
											</form>
										</div>
									</div>
								</div>
						</div>
						
					  	<div class="tab-pane fade active in" id="list">
							<div class="table-responsive">
								<table class="table table-hover text-center">
									<thead>
										<tr>
											<th class="text-center">ID</th>
											<th class="text-center">Nombres</th>
											<th class="text-center">Apellidos</th>
											<th class="text-center">DNI</th>			
											<th class="text-center">Direccion</th>
											<th class="text-center">Telefono</th>
											<th class="text-center">Email</th>
											<th class="text-center">Representado</th>
											<th class="text-center">Update</th>
											<th class="text-center">Delete</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach($colegionacional as $colegio)     {  ?>
												<tr>
												<td scope="row"><?php  echo $colegio['id']; ?></td>
												<td><?php  echo $colegio['nombres']; ?></td>
												<td><?php  echo $colegio['apellidos']; ?></td>
												<td><?php  echo $colegio['dni']; ?></td>
												<td><?php  echo $colegio['direccion']; ?></td>
												<td><?php  echo $colegio['telefono']; ?></td>
												<td><?php  echo $colegio['correo_electronico']; ?></td>
												<td><?php  echo $colegio['representado']; ?></td>

												<td>
													<a href="editarapoderado.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-success btn-raised btn-xs zmdi zmdi-refresh"></a>
												</td>
												<td>
													<a href="representative.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-danger btn-raised btn-xs zmdi zmdi-delete"></a>
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
