


<!DOCTYPE html>
<html lang="es">
<head>
	<title>Administracion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="http://localhost/COLEGIO1.0/css/main.css">
	<link rel="stylesheet" href="http://localhost/COLEGIO1.0/css/material-design-iconic-font.min.css">
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
							<a href="../administracion/grados.php"><i class="zmdi zmdi-timer zmdi-hc-fw"></i> Grados</a>
						</li>
						<li>
							<a href="../administracion/subject.php"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Cursos</a>
						</li>
						<li>
							<a href="../administracion/section.php"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i> Seccion</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Usuarios <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="../usuarios/admin.php"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Administrador</a>
						</li>
						<li>
							<a href="../usuarios/teacher.php"><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i> Profesor</a>
						</li>
						<li>
							<a href="../usuarios/student.php"><i class="zmdi zmdi-face zmdi-hc-fw"></i> Estudiante</a>
						</li>
						<li>
							<a href="../usuarios/representative.php"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Representante</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-assignment  zmdi-hc-fw"></i> Matriculas <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="../matriculas/matriculas.php"><i class="zmdi zmdi-assignment -box zmdi-hc-fw"></i> Matriculas	</a>
						</li>
												
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-graduation-cap  zmdi-hc-fw"></i> Calificaciones <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="../calificaciones/primero.php"><i class="zmdi zmdi-numeric-1 zmdi-hc-fw"></i> Primer Grado</a>
						</li>
						<li>
							<a href="../calificaciones/segundo.php"><i class="zmdi zmdi-numeric-2 zmdi-hc-fw"></i> Segundo Grado</a>
						</li>
						<li>
							<a href="../calificaciones/tercero.php"><i class="zmdi zmdi-numeric-3 zmdi-hc-fw"></i> Tercero Grado</a>
						</li>
						<li>
							<a href="../calificaciones/cuarto.php"><i class="zmdi zmdi-numeric-4 zmdi-hc-fw"></i> Cuarto Grado</a>
						</li>
						<li>
							<a href="../calificaciones/quinto.php"><i class="zmdi zmdi-numeric-5 zmdi-hc-fw"></i> Quinto Grado</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-check-circle zmdi-hc-fw"></i> Asistencias<i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="../asistencias/asprimero.php"><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> PRIMER GRADO	</a>
						</li>
						<li>
							<a href="../asistencias/assegundo.php"><i class="zmdi zmdi-money zmdi-hc-fw"></i> SEGUNDO GRADO</a>
						</li>
						<li>
							<a href="../asistencias/astercero.php"><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> TERCERO GRADO</a>
						</li>
						<li>
							<a href="../asistencias/ascuarto.php"><i class="zmdi zmdi-money zmdi-hc-fw"></i> CUARTO GRADO</a>
						</li>
						<li>
							<a href="../asistencias/asquinto.php"><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> QUINTO GRADO</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-time zmdi-hc-fw"></i> Horarios <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="hprimero.php"><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> PRIMER GRADO	</a>
						</li>
						<li>
							<a href="hsegundo.php"><i class="zmdi zmdi-money zmdi-hc-fw"></i> SEGUNDO GRADO</a>
						</li>
						<li>
							<a href="htercero.php"><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> TERCERO GRADO</a>
						</li>
						<li>
							<a href="hcuarto.php"><i class="zmdi zmdi-money zmdi-hc-fw"></i> CUARTO GRADO</a>
						</li>
						<li>
							<a href="hquinto.php"><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> QUINTO GRADO</a>
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

