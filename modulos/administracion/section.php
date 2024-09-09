
<?php
include("../../conexion/conexion.php");

$stm = $conexion->prepare("SELECT * FROM secciones");
$stm->execute(); // Ejecutar la consulta preparada
$colegionacional = $stm->fetchAll(PDO::FETCH_ASSOC); // Obtener los resultados

// METODO PARA ELIMINAR
if (isset($_GET['id'])) {
    $txtid = (isset($_GET['id']) ? $_GET['id'] : "");
    $stm = $conexion->prepare("DELETE FROM secciones WHERE id=:txtid");
    $stm->bindParam(":txtid", $txtid);
    $stm->execute();
    header("location:section.php");
}

?>


<?php
// METODO PARA AGREGAR
if ($_POST) {

	 // Validar campos vacios
	 if(empty($_POST['nombre'])) {
		echo "El nombre de seccion es requerido";	
		return;
	}
	
	if(empty($_POST['aula'])) {
		echo "El aula de seccion es requerido"; 
		return;
	}

	if(empty($_POST['turno'])) {
		echo "El turno de seccion es requerido"; 
		return;
	}

	// Validar usuario único
	$usuario = $_POST['nombre'];

	$query = "SELECT COUNT(*) as total FROM secciones WHERE nombre_seccion = ?";
	$stmt = $conexion->prepare($query); 
	$stmt->execute([$usuario]);
	$result = $stmt->fetch();

	if($result['total'] > 0) {
	echo "El curso ya existe";
	return;
	}
	// Guardando ...
    $nombre=(isset($_POST['nombre'])?$_POST['nombre']:"");
    $aula=(isset($_POST['aula'])?$_POST['aula']:"");
    $turno=(isset($_POST['turno'])?$_POST['turno']:"");

    $stm=$conexion-> prepare("INSERT INTO secciones(id,nombre_seccion,aula,turno)
    values(null,:nombre_seccion,:aula,:turno)");

    $stm->bindParam(":nombre_seccion",$nombre);
    $stm->bindParam(":aula",$aula);
    $stm->bindParam(":turno",$turno);

    $stm->execute();

    header("location:section.php");
}


?>


<?php include("../../template/header.php");  ?>

		<!-- Content page -->
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i> Administration <small>Section</small></h1>
			</div>
			<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse voluptas reiciendis tempora voluptatum eius porro ipsa quae voluptates officiis sapiente sunt dolorem, velit quos a qui nobis sed, dignissimos possimus!</p>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#new" data-toggle="tab">Nuevo</a></li>
					  	<li><a href="#list" data-toggle="tab">Lista</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade active in" id="new">
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-12 col-md-10 col-md-offset-1">
									    <form action="" method="POST">
									    	<div class="form-group label-floating">
											  <label class="control-label">Nombre Seccion</label>
											  <input class="form-control" type="text" name="nombre">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Aula</label>
											  <input class="form-control" type="text" name="aula">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Turno</label>
											  <input class="form-control" type="text" name="turno">
											</div>
											
											
										    <p class="text-center">
										    	<button href="#!" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
										    </p>
									    </form>
									</div>
								</div>
							</div>
						</div>
					  	<div class="tab-pane fade" id="list">
							<div class="table-responsive">
								<table class="table table-hover text-center">
									<thead>
										<tr>
											<th class="text-center">ID</th>
											<th class="text-center">Seccion</th>
											<th class="text-center">Aula</th>
											<th class="text-center">Turno</th>
											<th class="text-center">Update</th>
											<th class="text-center">Delete</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach($colegionacional as $colegio)     {  ?>
											<tr>
											<td scope="row"><?php  echo $colegio['id']; ?></td>
											<td><?php  echo $colegio['nombre_seccion']; ?></td>
											<td><?php  echo $colegio['aula']; ?></td>
											<td><?php  echo $colegio['turno']; ?></td>
											<td>
												<a href="editarseccion.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-success btn-raised btn-xs">EDITAR</a>
											</td>
											<td>
												<a href="section.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-danger btn-raised btn-xs">ELIMINAR</a>
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
