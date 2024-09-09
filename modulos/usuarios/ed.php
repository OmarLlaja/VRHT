
<?php
include("../../conexion/conexion.php");

$stm = $conexion->prepare("SELECT m.id,m.año,a.nombres AS Alumno,c.nombre_curso AS Curso,s.nombre_seccion AS Seccion, m.fecha_matricula AS Fecha
FROM matriculas m 
INNER JOIN alumnos a ON m.id_alumno = a.id
INNER JOIN cursos c On m.id_curso = c.id
INNER JOIN secciones s ON m.id_seccion = s.id");

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
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Matriculas</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="http://localhost/COLEGIO1.0/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    
	
</head>
<body>
	<!-- SideBar -->
	<section class="full-box cover dashboard-sideBar">
		<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
		<div class="full-box dashboard-sideBar-ct">
			<!--SideBar Title -->
			<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
				VRHT <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
			</div>
			<!-- SideBar User info -->
			<div class="full-box dashboard-sideBar-UserInfo">
				<figure class="full-box">
					<img src="../../assets/img/omar1.jpg" alt="UserIcon">
					<figcaption class="text-center text-titles">User Name</figcaption>
				</figure>
				<ul class="full-box list-unstyled text-center">
					<li>
						<a href="#!">
							<i class="zmdi zmdi-settings"></i>
						</a>
					</li>
					<li>
						<a href="#!" class="btn-exit-system">
							<i class="zmdi zmdi-power"></i>
						</a>
					</li>
				</ul>
			</div>
			<!-- SideBar Menu -->
			<ul class="list-unstyled full-box dashboard-sideBar-Menu">
				<li>
					<a href="../../home.php">
						<i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Dashboard
					</a>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-case zmdi-hc-fw"></i> Administracion <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="../administracion/period.php"><i class="zmdi zmdi-timer zmdi-hc-fw"></i> Periodo</a>
						</li>
						<li>
							<a href="../administracionsubject.php"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Cursos</a>
						</li>
						<li>
							<a href="../administracionsection.php"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i> Seccion</a>
						</li>
						<li>
							<a href="../administracionsalon.php"><i class="zmdi zmdi-font zmdi-hc-fw"></i> Salon</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Usuarios <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="admin.php"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Administrador</a>
						</li>
						<li>
							<a href="teacher.php"><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i> Profesor</a>
						</li>
						<li>
							<a href="student.php"><i class="zmdi zmdi-face zmdi-hc-fw"></i> Estudiante</a>
						</li>
						<li>
							<a href="representative.php"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Representante</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-card zmdi-hc-fw"></i> Pagos <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="../pagos/registration.php"><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> Registrar</a>
						</li>
						<li>
							<a href="../pagos/payments.php"><i class="zmdi zmdi-money zmdi-hc-fw"></i> Pagos</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-shield-security zmdi-hc-fw"></i> Configuracion Escuela <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="../escuela/school.php"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> Informacion Escolar</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</section>

	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		<!-- NavBar -->
		<nav class="full-box dashboard-Navbar">
			<ul class="full-box list-unstyled text-right">
				<li class="pull-left">
					<a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
				</li>
				<li>
					<a href="#!" class="btn-Notifications-area">
						<i class="zmdi zmdi-notifications-none"></i>
						<span class="badge">7</span>
					</a>
				</li>
				<li>
					<a href="#!" class="btn-search">
						<i class="zmdi zmdi-search"></i>
					</a>
				</li>
				<li>
					<a href="#!" class="btn-modal-help">
						<i class="zmdi zmdi-help-outline"></i>
					</a>
				</li>
			</ul>
		</nav>
		<!-- Content page -->
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Usuarios <small>Matriculas</small></h1>
			</div>
			<p class="lead">Administrar Matriculas</p>
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
                                        <form action="" method="POST" >
												<div class="form-group label-floating">
												    <label class="control-label">Año</label>
												    <input class="form-control" type="text" name="nombres" required>
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
													<label class="control-label">Curso</label>
													<select class="form-control" name="curso" required>
														<option value="">Seleccionar Alumno</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de alumnos
														$query = "SELECT id, nombre_curso FROM cursos";
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
													<label class="control-label">Seccion</label>
													<select class="form-control" name="seccion" required>
														<option value="">Seleccionar Seccion</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de alumnos
														$query = "SELECT id, nombre_seccion FROM seccion";
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
						
					  	<div class="tab-pane fade" id="list">
							<div class="table-responsive">
								<table class="table table-hover text-center">
									<thead>
										<tr>
											<th class="text-center">ID</th>
                                            <th class="text-center">Año</th>
											<th class="text-center">Alumno</th>
											<th class="text-center">Curso</th>
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
                                                <td><?php  echo $colegio['año']; ?></td>
												<td><?php  echo $colegio['Alumno']; ?></td>
												<td><?php  echo $colegio['Curso']; ?></td>
												<td><?php  echo $colegio['Seccion']; ?></td>
                                                <td><?php  echo $colegio['Fecha']; ?></td>

												<td>
													<a href="?id=<?php  echo $colegio['id']; ?>" class="btn btn-success btn-raised btn-xs zmdi zmdi-refresh"></a>
												</td>
												<td>
													<a href=".php?id=<?php  echo $colegio['id']; ?>" class="btn btn-danger btn-raised btn-xs zmdi zmdi-delete"></a>
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

	<!-- Notifications area -->
	<section class="full-box Notifications-area">
		<div class="full-box Notifications-bg btn-Notifications-area"></div>
		<div class="full-box Notifications-body">
			<div class="Notifications-body-title text-titles text-center">
				Notifications <i class="zmdi zmdi-close btn-Notifications-area"></i>
			</div>
			<div class="list-group">
			  	<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-alert-triangle"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">17m</div>
				      	<h4 class="list-group-item-heading">Tile with a label</h4>
				      	<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus.</p>
				    </div>
			  	</div>
			  	<div class="list-group-separator"></div>
			  	<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-alert-octagon"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">15m</div>
				      	<h4 class="list-group-item-heading">Tile with a label</h4>
				      	<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus.</p>
				    </div>
			  	</div>
			  	<div class="list-group-separator"></div>
				<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-help"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">10m</div>
				      	<h4 class="list-group-item-heading">Tile with a label</h4>
				      	<p class="list-group-item-text">Maecenas sed diam eget risus varius blandit.</p>
				    </div>
				</div>
			  	<div class="list-group-separator"></div>
			  	<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-info"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">8m</div>
				      	<h4 class="list-group-item-heading">Tile with a label</h4>
				      	<p class="list-group-item-text">Maecenas sed diam eget risus varius blandit.</p>
				    </div>
			  	</div>
			</div>

		</div>
	</section>

	<!-- Dialog help -->
	<div class="modal fade" tabindex="-1" role="dialog" id="Dialog-Help">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    	<h4 class="modal-title">Help</h4>
			    </div>
			    <div class="modal-body">
			        <p>
			        	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt beatae esse velit ipsa sunt incidunt aut voluptas, nihil reiciendis maiores eaque hic vitae saepe voluptatibus. Ratione veritatis a unde autem!
			        </p>
			    </div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-primary btn-raised" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> Ok</button>
		      	</div>
		    </div>
	  	</div>
	</div>
	<!--====== Scripts -->
	<script src="http://localhost/COLEGIO1.0/js/jquery-3.1.1.min.js"></script>
	<script src="http://localhost/COLEGIO1.0/js/sweetalert2.min.js"></script>
	<script src="http://localhost/COLEGIO1.0/js/bootstrap.min.js"></script>
	<script src="http://localhost/COLEGIO1.0/js/material.min.js"></script>
	<script src="http://localhost/COLEGIO1.0/js/ripples.min.js"></script>
	<script src="http://localhost/COLEGIO1.0/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="http://localhost/COLEGIO1.0/js/main.js"></script>
	<script>
		$.material.init();
	</script>
</body>
</html>