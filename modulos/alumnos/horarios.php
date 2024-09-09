
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
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Mi <small>horario</small></h1>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">				
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#list" data-toggle="tab">horario</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						
					  	<div class="tab-pane fade active in" id="list">
							<div class="table-responsive">
								<div class="text-right">
									<a href="reportHorario.php" target="_blank" class="btn btn-success" style="border: 2px solid #808080; background-color: #808080; color: #fff;">
										<i class="fas fa-file-pdf"></i> Exportar a PDF
									</a>
									
								</div>


                                
                                <?php
                                    // Verificar si se encontraron resultados
                                    if ($stmt_alumno->rowCount() > 0) {
                                        // Obtener el ID del alumno
                                        $row = $stmt_alumno->fetch(PDO::FETCH_ASSOC);
                                        $id_alumno = $row['id'];

                                        // Consultar las notas del alumno usando el ID obtenido
                                        $sql_grado = "SELECT id_grado FROM matriculas WHERE id_alumno=:id_alumno";
                                        $stmt_grado = $conexion->prepare($sql_grado);
                                        $stmt_grado->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
                                        $stmt_grado->execute();


                                         // Obtener el ID del de grado
                                         $row = $stmt_grado->fetch(PDO::FETCH_ASSOC);
                                         $id_gradomatricula = $row['id_grado'];
                                        // Consultar el horario del alumno usando el ID obtenido
                                        $sql_horario = "SELECT hora_inicio, hora_fin, lunes, martes, miercoles, jueves, viernes 
                                        FROM horario 
                                        WHERE id_grado = :id_grado
                                        ORDER BY hora_inicio ASC";
                                        $stmt_horario = $conexion->prepare($sql_horario);
                                        $stmt_horario->bindParam(':id_grado', $id_gradomatricula, PDO::PARAM_INT);
                                        $stmt_horario->execute();

                                        // Verificar si la consulta se ejecutó correctamente
                                            
                                    } else {
                                        echo "No se encontró ningún alumno con el código proporcionado.";
                                    }
                                ?>

								<table class="table table-hover text-center">
									<thead>
										<tr>
											<th class="text-center">H. inico</th>
											<th class="text-center">H. fin</th>
											<th class="text-center">Lunes</th>
											<th class="text-center">Martes</th>
											<th class="text-center">Miercoles</th>
                                            <th class="text-center">Jueves</th>
											<th class="text-center">Viernes</th>
										</tr>
									</thead>
									<tbody>
										<?php while ($row_notas = $stmt_horario->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($row_notas['hora_inicio']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row_notas['hora_fin']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row_notas['lunes']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row_notas['martes']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row_notas['miercoles']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row_notas['jueves']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row_notas['viernes']) . "</td>";

                                            echo "</tr>";
                                            
                                        }  ?>	
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