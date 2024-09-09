<?php
// Incluir el archivo de conexión
include("../../conexion/conexion.php");

// Iniciar la sesión
session_start();

// Obtener el nombre de usuario de la sesión
$codigo = $_SESSION['nombre_usuario'];

// Obtener el ID del alumno basado en el código
$sql_alumno = "SELECT id FROM alumnos WHERE dni = :codigo";
$stmt_alumno = $conexion->prepare($sql_alumno);
$stmt_alumno->bindParam(':codigo', $codigo, PDO::PARAM_STR);
$stmt_alumno->execute();

// Verificar si la consulta se ejecutó correctamente
if (!$stmt_alumno) {
	die("Error en la consulta SQL para obtener el ID del alumno: ");
}



//Cerrar la conexión (si es necesario, dependiendo de cómo esté implementada en tu archivo de conexión)
// $conexion->close();
?>
<?php

// Obtener el nombre de usuario de la sesión
$nombre_usuario = $_SESSION['nombre_usuario'];
$foto_usuario = $_SESSION['foto_usuario'];

// Consulta para obtener nombres y apellidos de administradores relacionados con el nombre de usuario
$stmt = $conexion->prepare("
        SELECT nombres, apellidos 
        FROM administradores 
        WHERE dni = :nombre_usuario
        UNION
        SELECT nombres, apellidos 
        FROM profesores 
        WHERE dni = :nombre_usuario
        UNION
        SELECT nombres, apellidos 
        FROM alumnos 
        WHERE dni = :nombre_usuario
        UNION
        SELECT nombres, apellidos 
        FROM representantes 
        WHERE dni = :nombre_usuario
    ");
$stmt->bindParam(':nombre_usuario', $nombre_usuario);
$stmt->execute();

// Obtener el resultado de la consulta
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar si se encontró un usuario con el nombre de usuario proporcionado
if ($usuario) {
	// Almacenar nombres y apellidos en variables separadas
	$nombres = $usuario['nombres'];
	$apellidos = $usuario['apellidos'];
} else {
	// Manejar el caso en que no se encuentre un usuario
	// Cerrar la sesión
	session_destroy();

	// Redirigir al usuario a la página de inicio
	header('Location: index.php');
	exit; // Detener la ejecución del script
}
?>



<!DOCTYPE html>
<html lang="es">

<head>
	<title> Alumnos</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="http://localhost/COLEGIO1.0/css/main.css">

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
					<?php if (!empty($foto_usuario)) : ?>
						<img src="data:image/jpg;base64,<?php echo base64_encode($foto_usuario); ?>" width="50" height="50" alt="Foto de perfil">
					<?php else : ?>
						<img src="ruta/a/imagen-predeterminada.jpg" width="50" height="50" alt="Imagen predeterminada">
					<?php endif; ?>
					<figcaption class="text-center text-titles">
						<br>
						<span><?php echo $nombres . ' ' . $apellidos; ?></span>
					</figcaption>
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
					<a href="http://localhost/Colegio1.0/home2.php">
						<i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Dashboard
					</a>
				</li>

				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-graduation-cap  zmdi-hc-fw"></i> Calificaciones <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="http://localhost/Colegio1.0/modulos/alumnos/notas.php"><i class="zmdi zmdi-numeric-1 zmdi-hc-fw"></i> Mis notas</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-check-circle zmdi-hc-fw"></i> Asistencias<i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="http://localhost/Colegio1.0/modulos/alumnos/asistencias.php"><i class="zmdi zmdi-numeric-1 zmdi-hc-fw"></i> Mis asistencias</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-time zmdi-hc-fw"></i> Horarios <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="http://localhost/Colegio1.0/modulos/alumnos/horarios.php"><i class="zmdi zmdi-numeric-1 zmdi-hc-fw"></i> Mi horario</a>
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
						<span class="badge">0</span>
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
				<h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Mis <small>Notas</small></h1>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label">Periodos</label>
			<select class="form-control" name="apoderado" id="periodo" required>
				<option value="">Seleccionar Periodo</option> <!-- Opción predeterminada vacía -->
				<?php
				// Realizar una consulta para obtener la lista de alumnos
				$query = "SELECT id, anio FROM periodo";
				$stmt = $conexion->prepare($query);
				$stmt->execute();
				$periodos = $stmt->fetchAll(PDO::FETCH_ASSOC);

				// Iterar sobre los resultados y construir las opciones del menú desplegable
				foreach ($periodos as $periodo) {
					echo "<option value='" . $periodo['id'] . "'>" . $periodo['anio'] . "</option>";
				}
				?>
			</select>
		</div>



		<!-- Mostrar el contenido del if solo cuando se haya seleccionado un valor en el select -->
		<div class="container-fluid">
			<div class="row">

				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
						<li class="active"><a href="#list" data-toggle="tab">Notas</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">

						<div class="tab-pane fade active in" id="list">
							<div class="table-responsive">
								<div class="text-right">
									<a href="reportNotas.php" target="-blanck" class="btn btn-success">
										<i class="fas fa-file-pdf"></i> Exportar a PDF
									</a>

								</div>

								<?php if (!empty($anio)) : ?>



									<?php
									// Verificar si se encontraron resultados
									if ($stmt_alumno->rowCount() > 0) {
										// Obtener el ID del alumno
										$row = $stmt_alumno->fetch(PDO::FETCH_ASSOC);
										$id_alumno = $row['id'];


										// Consultar las notas del alumno usando el ID obtenido
										$sql_notas = "SELECT cu.nombre_curso as cursos, ca.unidad1,ca.unidad2, ca.unidad3,ca.promedio

														FROM calificaciones ca
														INNER JOIN cursos cu
														ON ca.id_curso = cu.id 
														WHERE ca.id_alumno = :id_alumno 
														
														and ca.id_periodo=2";


										$stmt_notas = $conexion->prepare($sql_notas);
										$stmt_notas->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
										$stmt_notas->execute();

										// Verificar si la consulta se ejecutó correctamente

									} else {
										echo "No se encontró ningún alumno con el código proporcionado.";
									}
									?>

									<table class="table table-hover text-center">
										<thead>
											<tr>
												<th class="text-center">CURSO</th>
												<th class="text-center">Unid. 1</th>
												<th class="text-center">Unid. 2</th>
												<th class="text-center">Unid. 3</th>
												<th class="text-center">Promedio</th>
											</tr>
										</thead>

										<tbody>

											<?php while ($row_notas = $stmt_notas->fetch(PDO::FETCH_ASSOC)) {
												echo "<tr>";
												echo "<td>" . htmlspecialchars($row_notas['cursos']) . "</td>";
												echo "<td>" . htmlspecialchars($row_notas['unidad1']) . "</td>";
												echo "<td>" . htmlspecialchars($row_notas['unidad2']) . "</td>";
												echo "<td>" . htmlspecialchars($row_notas['unidad3']) . "</td>";
												echo "<td>" . htmlspecialchars($row_notas['promedio']) . "</td>";

												echo "</tr>";
											}  ?>
										</tbody>


									</table>
								<?php endif ?>

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