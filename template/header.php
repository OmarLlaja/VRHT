<?php
// Iniciar la sesión
session_start();

// Obtener el nombre de usuario de la sesión
$nombre_usuario = $_SESSION['nombre_usuario'];
$foto_usuario = $_SESSION['foto_usuario'];

// Obtener el nivel de usuario de la sesión
$nivel = $_SESSION['nivel_usuario'];



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
	<title>Admin</title>
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
					<a href="http://localhost/Colegio1.0/home.php">
						<i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Dashboard
					</a>
				</li>

				<?php if (isset($nivel) && $nivel == 1 && $nivel != 2 && $nivel != 3) : ?>
					<li>
						<a href="#!" class="btn-sideBar-SubMenu">
							<i class="zmdi zmdi-case zmdi-hc-fw"></i> Matriculas <i class="zmdi zmdi-caret-down pull-right"></i>
						</a>
						<ul class="list-unstyled full-box">
							<li>
								<a href="http://localhost/Colegio1.0/modulos/matriculas/matriculas.php"><i class="zmdi zmdi-assignment -box zmdi-hc-fw"></i> Matriculas </a>
							</li>
							<li>
								<a href="http://localhost/Colegio1.0/modulos/matriculas/grados.php"><i class="zmdi zmdi-timer zmdi-hc-fw"></i> Grados</a>
							</li>
							<li>
								<a href="http://localhost/Colegio1.0/modulos/matriculas/subject.php"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Cursos</a>
							</li>
							<li>
								<a href="http://localhost/Colegio1.0/modulos/matriculas/section.php"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i> Secciones</a>
							</li>
						</ul>
					</li>
				<?php endif ?>

				<?php if (isset($nivel) && $nivel == 1 && $nivel != 2 && $nivel != 3) : ?>

					<li>
						<a href="#!" class="btn-sideBar-SubMenu">
							<i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Usuarios <i class="zmdi zmdi-caret-down pull-right"></i>
						</a>
						<ul class="list-unstyled full-box">
							<li>
								<a href="http://localhost/Colegio1.0/modulos/usuarios/usuarios.php"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Usuarios</a>
							</li>
							<li>
								<a href="http://localhost/Colegio1.0/modulos/usuarios/administradores.php"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Administradores</a>
							</li>
							<li>
								<a href="http://localhost/Colegio1.0/modulos/usuarios/teacher.php"><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i> Profesores</a>
							</li>
							<li>
								<a href="http://localhost/Colegio1.0/modulos/usuarios/student.php"><i class="zmdi zmdi-face zmdi-hc-fw"></i> Estudiantes</a>
							</li>
							<li>
								<a href="http://localhost/Colegio1.0/modulos/usuarios/representative.php"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Representantes</a>
							</li>
						</ul>
					</li>
				<?php endif ?>

				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-graduation-cap  zmdi-hc-fw"></i> Calificaciones <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="http://localhost/Colegio1.0/modulos/calificaciones/primero.php"><i class="zmdi zmdi-numeric-1 zmdi-hc-fw"></i> Primer Grado</a>
						</li>
						<li>
							<a href="http://localhost/Colegio1.0/modulos/calificaciones/segundo.php"><i class="zmdi zmdi-numeric-2 zmdi-hc-fw"></i> Segundo Grado</a>
						</li>
						<li>
							<a href="http://localhost/Colegio1.0/modulos/calificaciones/tercero.php"><i class="zmdi zmdi-numeric-3 zmdi-hc-fw"></i> Tercero Grado</a>
						</li>
						<li>
							<a href="http://localhost/Colegio1.0/modulos/calificaciones/cuarto.php"><i class="zmdi zmdi-numeric-4 zmdi-hc-fw"></i> Cuarto Grado</a>
						</li>
						<li>
							<a href="http://localhost/Colegio1.0/modulos/calificaciones/quinto.php"><i class="zmdi zmdi-numeric-5 zmdi-hc-fw"></i> Quinto Grado</a>
						</li>

					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-check-circle zmdi-hc-fw"></i> Asistencias<i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="http://localhost/Colegio1.0/modulos/asistencias/asprimero.php"><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> PRIMER GRADO </a>
						</li>
						<li>
							<a href="http://localhost/Colegio1.0/modulos/asistencias/assegundo.php"><i class="zmdi zmdi-money zmdi-hc-fw"></i> SEGUNDO GRADO</a>
						</li>
						<li>
							<a href="http://localhost/Colegio1.0/modulos/asistencias/astercero.php"><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> TERCERO GRADO</a>
						</li>
						<li>
							<a href="http://localhost/Colegio1.0/modulos/asistencias/ascuarto.php"><i class="zmdi zmdi-money zmdi-hc-fw"></i> CUARTO GRADO</a>
						</li>
						<li>
							<a href="http://localhost/Colegio1.0/modulos/asistencias/asquinto.php"><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> QUINTO GRADO</a>
						</li>

					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-time zmdi-hc-fw"></i> Horarios <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="http://localhost/Colegio1.0/modulos/horarios/hprimero.php"><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> PRIMER GRADO </a>
						</li>
						<li>
							<a href="http://localhost/Colegio1.0/modulos/horarios/hsegundo.php"><i class="zmdi zmdi-money zmdi-hc-fw"></i> SEGUNDO GRADO</a>
						</li>
						<li>
							<a href="http://localhost/Colegio1.0/modulos/horarios/htercero.php"><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> TERCERO GRADO</a>
						</li>
						<li>
							<a href="http://localhost/Colegio1.0/modulos/horarios/hcuarto.php"><i class="zmdi zmdi-money zmdi-hc-fw"></i> CUARTO GRADO</a>
						</li>
						<li>
							<a href="http://localhost/Colegio1.0/modulos/horarios/hquinto.php"><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> QUINTO GRADO</a>
						</li>

					</ul>
				</li>
				<!-- esta parte se tendra que configurar en una version 2.0 cuando el alcance del proyecto lo amerite
					<?php if (isset($nivel) && $nivel == 1 && $nivel != 2 && $nivel != 3) : ?>

						<li>
							<a href="#!" class="btn-sideBar-SubMenu">
								<i class="zmdi zmdi-shield-security zmdi-hc-fw"></i> Configuracion de sitio web <i class="zmdi zmdi-caret-down pull-right"></i>
							</a>
							<ul class="list-unstyled full-box">
								<li>
									<a href="http://localhost/Colegio1.0/modulos/escuela/school.php"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> Sitio web</a>
								</li>
							</ul>
						</li>
					<?php endif ?>
				-->

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