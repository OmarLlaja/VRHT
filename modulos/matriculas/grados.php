


<?php
include("../../conexion/conexion.php");

$stm = $conexion->prepare("SELECT * FROM grados");
$stm->execute(); // Ejecutar la consulta preparada
$colegionacional = $stm->fetchAll(PDO::FETCH_ASSOC); // Obtener los resultados

// METODO PARA ELIMINAR
if (isset($_GET['id'])) {
    $txtid = (isset($_GET['id']) ? $_GET['id'] : "");
    $stm = $conexion->prepare("DELETE FROM grados WHERE id=:txtid");
    $stm->bindParam(":txtid", $txtid);
    $stm->execute();
    header("location:grados.php");
}

?>


<?php
// METODO PARA AGREGAR
if ($_POST) {


	// Validar usuario único
	$usuario = $_POST['nombre'];

	$query = "SELECT COUNT(*) as total FROM grados WHERE nombre_grado = ?";
	$stmt = $conexion->prepare($query); 
	$stmt->execute([$usuario]);
	$result = $stmt->fetch();

	if($result['total'] > 0) {
	echo "El curso ya existe";
	return;
	}

    $nombre=(isset($_POST['nombre'])?$_POST['nombre']:"");
    $descripcion=(isset($_POST['descripcion'])?$_POST['descripcion']:"");

    $stm=$conexion-> prepare("INSERT INTO grados(id,nombre_grado,descripcion)
    values(null,:nombre_grado,:descripcion)");

    $stm->bindParam(":nombre_grado",$nombre);
    $stm->bindParam(":descripcion",$descripcion);

    $stm->execute();

    header("location:grados.php");
}


?>


<?php include("../../template/header.php");  ?>


	
		<!-- Content page -->
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Administracion: <small>Grados</small></h1>
			</div>
			<p class="lead"> Pagina donde administrara los grados</p>
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
									    <form action="" method="POST">
									    												
									    	<div class="form-group label-floating">
											  <label class="control-label">Nombre</label>
											  <input class="form-control" type="text"  name="nombre" requerid>
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Descripcion</label>
											  <input class="form-control" type="text"  name="descripcion" requerid>
											</div>
											
										    <p class="text-center">
										    	<button href="#!" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar </button>
										    </p>
									    </form>
									</div>
								</div>
							</div>
						</div>
					  	<div class="tab-pane fade active in" id="list">
							<div class="table-responsive">
								<div class="text-right">
									<a href="reporteGrados.php" target="-blanck" class="btn btn-success">
										<i class="fas fa-file-pdf"></i> Exportar a PDF
									</a>
									
								</div>

								<table class="table table-hover text-center">
									<thead>
										<tr>
											<th class="text-center">ID</th>
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
											<td><?php  echo $colegio['nombre_grado']; ?></td>
											<td><?php  echo $colegio['descripcion']; ?></td>
											<td>
												<a href="editargrado.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-success btn-raised btn-xs">EDITAR</a>
											</td>
											<td>
												<a href="grados.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-danger btn-raised btn-xs">ELIMINAR</a>
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




		<?php include("../../template/footer.php");  ?>
