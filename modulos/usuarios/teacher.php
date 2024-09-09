
<?php
include("../../conexion/conexion.php");

$stm = $conexion->prepare("SELECT * FROM profesores");
$stm->execute(); // Ejecutar la consulta preparada
$colegionacional = $stm->fetchAll(PDO::FETCH_ASSOC); // Obtener los resultados

// METODO PARA ELIMINAR
if (isset($_GET['id'])) {
    $txtid = (isset($_GET['id']) ? $_GET['id'] : "");
    $stm = $conexion->prepare("DELETE FROM profesores WHERE id=:txtid");
    $stm->bindParam(":txtid", $txtid);
    $stm->execute();
    header("location:teacher.php");
}

?>


<?php




// METODO PARA AGREGAR
if ($_POST) {

	  

	// Validar usuario único
	$usuario = $_POST['dni'];

	$query = "SELECT COUNT(*) as total FROM profesores WHERE dni = ?";
	$stmt = $conexion->prepare($query); 
	$stmt->execute([$usuario]);
	$result = $stmt->fetch();

	if($result['total'] > 0) {
	echo "El profesor ya existe";
	return;
	}

    $nombres=(isset($_POST['nombres'])?$_POST['nombres']:"");
    $apellidos=(isset($_POST['apellidos'])?$_POST['apellidos']:"");
    $dni=(isset($_POST['dni'])?$_POST['dni']:"");
	$nacimiento=(isset($_POST['nacimiento'])?$_POST['nacimiento']:"");
    $direccion=(isset($_POST['direccion'])?$_POST['direccion']:"");
    $telefono=(isset($_POST['telefono'])?$_POST['telefono']:"");
	$correo=(isset($_POST['correo'])?$_POST['correo']:"");


    $stm=$conexion-> prepare("INSERT INTO profesores(id, nombres, apellidos, dni, fecha_nacimiento,
	 direccion, telefono, correo_electronico)
	  VALUES (null,:nombres,:apellidos,:dni,:fecha_nacimiento,:direccion,:telefono,:correo_electronico)");

    $stm->bindParam(":nombres",$nombres);
    $stm->bindParam(":apellidos",$apellidos);
    $stm->bindParam(":dni",$dni);
	$stm->bindParam(":fecha_nacimiento",$nacimiento);
    $stm->bindParam(":direccion",$direccion);
    $stm->bindParam(":telefono",$telefono);
	$stm->bindParam(":correo_electronico",$correo);

    $stm->execute();

    header("location:teacher.php");
}


?>

<?php include("../../template/header.php");  ?>

		<!-- Content page -->
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i> Usuarios <small>Profesores</small></h1>
			</div>
			<p class="lead">Administrar profesores</p>
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
									    <form action="">
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
											  <label class="control-label">Fecha Nacimiento</label>
											  <input class="form-control" type="date" name="nacimiento" required>
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
											<th class="text-center">Fecha Nacimiento</th>
											<th class="text-center">Direccion</th>
											<th class="text-center">Telefono</th>
											<th class="text-center">Email</th>
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
											<td><?php  echo $colegio['fecha_nacimiento']; ?></td>
											<td><?php  echo $colegio['direccion']; ?></td>
											<td><?php  echo $colegio['telefono']; ?></td>
											<td><?php  echo $colegio['correo_electronico']; ?></td>
											<td>
												<a href="editarteacher.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-success btn-raised btn-xs zmdi zmdi-refresh"></a>
											</td>
											<td>
												<a href="teacher.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-danger btn-raised btn-xs zmdi zmdi-delete"></a>
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
