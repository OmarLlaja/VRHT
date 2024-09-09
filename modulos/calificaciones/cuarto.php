<?php
include("../../conexion/conexion.php");

// Obtener el año de búsqueda del formulario o usar el año actual por defecto
$año_busqueda = isset($_GET['año_busqueda']) ? $_GET['año_busqueda'] : date("Y");

$stm = $conexion->prepare("SELECT n.id,a.nombres AS Alumno,c.nombre_curso AS Curso,p.nombres Profesor,g.nombre_grado AS Grado, n.unidad1,n.unidad2,n.unidad3,n.promedio, n.anio AS año
FROM calificaciones n
INNER JOIN cursos c ON n.id_curso = c.id
INNER JOIN alumnos a ON n.id_alumno = a.id
INNER JOIN profesores p ON n.id_profesor = p.id
INNER JOIN grados g ON n.id_grado = g.id
WHERE  id_grado = '5' AND n.anio = $año_busqueda");
$stm->execute(); // Ejecutar la consulta preparada
$colegionacional = $stm->fetchAll(PDO::FETCH_ASSOC); // Obtener los resultados

$stm = $conexion->prepare("SELECT n.id,a.nombres AS Alumno,c.nombre_curso AS Curso,p.nombres Profesor,g.nombre_grado AS Grado, n.unidad1,n.unidad2,n.unidad3,n.promedio, n.anio AS año
FROM calificaciones n
INNER JOIN cursos c ON n.id_curso = c.id
INNER JOIN alumnos a ON n.id_alumno = a.id
INNER JOIN profesores p ON n.id_profesor = p.id
INNER JOIN grados g ON n.id_grado = g.id
WHERE c.id = '1' and g.id = '5' AND n.anio = $año_busqueda");
$stm->execute(); // Ejecutar la consulta preparada
$cma = $stm->fetchAll(PDO::FETCH_ASSOC); // Obtener los resultados

$stm = $conexion->prepare("SELECT n.id,a.nombres AS Alumno,c.nombre_curso AS Curso,p.nombres Profesor,g.nombre_grado AS Grado, n.unidad1,n.unidad2,n.unidad3,n.promedio, n.anio AS año
FROM calificaciones n
INNER JOIN cursos c ON n.id_curso = c.id
INNER JOIN alumnos a ON n.id_alumno = a.id
INNER JOIN profesores p ON n.id_profesor = p.id
INNER JOIN grados g ON n.id_grado = g.id
WHERE c.id = '2' and g.id = '5' AND n.anio = $año_busqueda");
$stm->execute(); // Ejecutar la consulta preparada
$cco = $stm->fetchAll(PDO::FETCH_ASSOC); // Obtener los resultados

$stm = $conexion->prepare("SELECT n.id,a.nombres AS Alumno,c.nombre_curso AS Curso,p.nombres Profesor,g.nombre_grado AS Grado, n.unidad1,n.unidad2,n.unidad3,n.promedio, n.anio AS año
FROM calificaciones n
INNER JOIN cursos c ON n.id_curso = c.id
INNER JOIN alumnos a ON n.id_alumno = a.id
INNER JOIN profesores p ON n.id_profesor = p.id
INNER JOIN grados g ON n.id_grado = g.id
WHERE c.id = '3' and g.id = '5' AND n.anio = $año_busqueda");
$stm->execute(); // Ejecutar la consulta preparada
$cer = $stm->fetchAll(PDO::FETCH_ASSOC); // Obtener los resultados

$stm = $conexion->prepare("SELECT n.id,a.nombres AS Alumno,c.nombre_curso AS Curso,p.nombres Profesor,g.nombre_grado AS Grado, n.unidad1,n.unidad2,n.unidad3,n.promedio, n.anio AS año
FROM calificaciones n
INNER JOIN cursos c ON n.id_curso = c.id
INNER JOIN alumnos a ON n.id_alumno = a.id
INNER JOIN profesores p ON n.id_profesor = p.id
INNER JOIN grados g ON n.id_grado = g.id
WHERE c.id = '6' and g.id = '5' AND n.anio = $año_busqueda");
$stm->execute(); // Ejecutar la consulta preparada
$cac = $stm->fetchAll(PDO::FETCH_ASSOC); // Obtener los resultados

$stm = $conexion->prepare("SELECT n.id,a.nombres AS Alumno,c.nombre_curso AS Curso,p.nombres Profesor,g.nombre_grado AS Grado, n.unidad1,n.unidad2,n.unidad3,n.promedio, n.anio AS año
FROM calificaciones n
INNER JOIN cursos c ON n.id_curso = c.id
INNER JOIN alumnos a ON n.id_alumno = a.id
INNER JOIN profesores p ON n.id_profesor = p.id
INNER JOIN grados g ON n.id_grado = g.id
WHERE c.id = '8' and g.id = '5' AND n.anio = $año_busqueda");
$stm->execute(); // Ejecutar la consulta preparada
$cef = $stm->fetchAll(PDO::FETCH_ASSOC); // Obtener los resultados

$stm = $conexion->prepare("SELECT n.id,a.nombres AS Alumno,c.nombre_curso AS Curso,p.nombres Profesor,g.nombre_grado AS Grado, n.unidad1,n.unidad2,n.unidad3,n.promedio, n.anio AS año
FROM calificaciones n
INNER JOIN cursos c ON n.id_curso = c.id
INNER JOIN alumnos a ON n.id_alumno = a.id
INNER JOIN profesores p ON n.id_profesor = p.id
INNER JOIN grados g ON n.id_grado = g.id
WHERE c.id = '9' and g.id = '5' AND n.anio = $año_busqueda");
$stm->execute(); // Ejecutar la consulta preparada
$cdp = $stm->fetchAll(PDO::FETCH_ASSOC); // Obtener los resultados


$stm = $conexion->prepare("SELECT n.id,a.nombres AS Alumno,c.nombre_curso AS Curso,p.nombres Profesor,g.nombre_grado AS Grado, n.unidad1,n.unidad2,n.unidad3,n.promedio, n.anio AS año
FROM calificaciones n
INNER JOIN cursos c ON n.id_curso = c.id
INNER JOIN alumnos a ON n.id_alumno = a.id
INNER JOIN profesores p ON n.id_profesor = p.id
INNER JOIN grados g ON n.id_grado = g.id
WHERE c.id = '10' and g.id = '5' AND n.anio = $año_busqueda");
$stm->execute(); // Ejecutar la consulta preparada
$ccc = $stm->fetchAll(PDO::FETCH_ASSOC); // Obtener los resultados

$stm = $conexion->prepare("SELECT n.id,a.nombres AS Alumno,c.nombre_curso AS Curso,p.nombres Profesor,g.nombre_grado AS Grado, n.unidad1,n.unidad2,n.unidad3,n.promedio, n.anio AS año
FROM calificaciones n
INNER JOIN cursos c ON n.id_curso = c.id
INNER JOIN alumnos a ON n.id_alumno = a.id
INNER JOIN profesores p ON n.id_profesor = p.id
INNER JOIN grados g ON n.id_grado = g.id
WHERE c.id = '11' and g.id = '5' AND n.anio = $año_busqueda");
$stm->execute(); // Ejecutar la consulta preparada
$ccs = $stm->fetchAll(PDO::FETCH_ASSOC); // Obtener los resultados

$stm = $conexion->prepare("SELECT n.id,a.nombres AS Alumno,c.nombre_curso AS Curso,p.nombres Profesor,g.nombre_grado AS Grado, n.unidad1,n.unidad2,n.unidad3,n.promedio, n.anio AS año
FROM calificaciones n
INNER JOIN cursos c ON n.id_curso = c.id
INNER JOIN alumnos a ON n.id_alumno = a.id
INNER JOIN profesores p ON n.id_profesor = p.id
INNER JOIN grados g ON n.id_grado = g.id
WHERE c.id = '12' and g.id = '5' AND n.anio = $año_busqueda");
$stm->execute(); // Ejecutar la consulta preparada
$cin = $stm->fetchAll(PDO::FETCH_ASSOC); // Obtener los resultados

$stm = $conexion->prepare("SELECT n.id,a.nombres AS Alumno,c.nombre_curso AS Curso,p.nombres Profesor,g.nombre_grado AS Grado, n.unidad1,n.unidad2,n.unidad3,n.promedio, n.anio AS año
FROM calificaciones n
INNER JOIN cursos c ON n.id_curso = c.id
INNER JOIN alumnos a ON n.id_alumno = a.id
INNER JOIN profesores p ON n.id_profesor = p.id
INNER JOIN grados g ON n.id_grado = g.id
WHERE c.id = '13' and g.id = '5' AND n.anio = $año_busqueda");
$stm->execute(); // Ejecutar la consulta preparada
$cct = $stm->fetchAll(PDO::FETCH_ASSOC); // Obtener los resultados

$stm = $conexion->prepare("SELECT n.id,a.nombres AS Alumno,c.nombre_curso AS Curso,p.nombres Profesor,g.nombre_grado AS Grado, n.unidad1,n.unidad2,n.unidad3,n.promedio, n.anio AS año
FROM calificaciones n
INNER JOIN cursos c ON n.id_curso = c.id
INNER JOIN alumnos a ON n.id_alumno = a.id
INNER JOIN profesores p ON n.id_profesor = p.id
INNER JOIN grados g ON n.id_grado = g.id
WHERE c.id = '14' and g.id = '5' AND n.anio = $año_busqueda");
$stm->execute(); // Ejecutar la consulta preparada
$cet = $stm->fetchAll(PDO::FETCH_ASSOC); // Obtener los resultados


// METODO PARA ELIMINAR
if (isset($_GET['id'])) {
    $txtid = (isset($_GET['id']) ? $_GET['id'] : "");
    $stm = $conexion->prepare("DELETE FROM calificaciones WHERE id=:txtid");
    $stm->bindParam(":txtid", $txtid);
    $stm->execute();
    header("location:cuarto.php");
}

?>


<?php


//METODO PARA AGREGAR NOTAASSS
if ($_POST) {
    // Validar si el estudiante ya tiene calificaciones para el curso
    $period = $_POST['anio'];
	$usuario = $_POST['alumno'];
    $curso = $_POST['curso'];

    $query = "SELECT COUNT(*) as total 
              FROM calificaciones n
              INNER JOIN cursos c ON n.id_curso = c.id
              INNER JOIN alumnos a ON n.id_alumno = a.id
              WHERE a.id = ? AND c.id = ? AND n.anio = ?";
    $stmt = $conexion->prepare($query); 
    $stmt->execute([$usuario, $curso, $period]);
    $result = $stmt->fetch();

    if($result['total'] > 0) {
		echo "<script>alert('El estudiante ya tiene calificaciones para este curso este año');</script>";
		echo "<script>window.location.href = 'cuarto.php';</script>";
		return;
        }else {
			$anio = (isset($_POST['anio']) ? $_POST['anio'] : "");
			$alumno = (isset($_POST['alumno']) ? $_POST['alumno'] : "");
			$curso = (isset($_POST['curso']) ? $_POST['curso'] : "");
			$profesor = (isset($_POST['profesor']) ? $_POST['profesor'] : "");
			$grado = (isset($_POST['grado']) ? $_POST['grado'] : "");
			$nota1 = (isset($_POST['nota1']) ? $_POST['nota1'] : "");
			$nota2 = (isset($_POST['nota2']) ? $_POST['nota2'] : "");
			$nota3 = (isset($_POST['nota3']) ? $_POST['nota3'] : "");    
			$promedio = (isset($_POST['promedio']) ? $_POST['promedio'] : "");

			$stm = $conexion->prepare("INSERT INTO calificaciones(id, id_alumno, id_curso, id_profesor,
				id_grado, unidad1, unidad2, unidad3, promedio, anio)
				VALUES (null, :id_alumno, :id_curso, :id_profesor, :id_grado, :unidad1, :unidad2, :unidad3, :promedio, :anio)");

			$stm->bindParam(":id_alumno", $alumno);
			$stm->bindParam(":id_curso", $curso);
			$stm->bindParam(":id_profesor", $profesor);
			$stm->bindParam(":id_grado", $grado);
			$stm->bindParam(":unidad1", $nota1);
			$stm->bindParam(":unidad2", $nota2);
			$stm->bindParam(":unidad3", $nota3);
			$stm->bindParam(":promedio", $promedio);
			$stm->bindParam(":anio", $anio);

			$stm->execute();

			header("location: cuarto.php");
	
	}
}



?>

<?php include("../../template/header.php");  ?>

<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i> Calificaciones <small>Alumnos</small></h1>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#notas" data-toggle="tab"><i class="zmdi zmdi-graduation-cap"></i> Notas</a></li>
					  	<li><a href="#dp" data-toggle="tab"><i class="zmdi zmdi-trending-up"></i> Desarrollo Personal</a></li>
					  	<li><a href="#cc" data-toggle="tab"><i class="zmdi zmdi-shield-check"></i> Ciudadania y Civica</a></li>
					  	<li><a href="#ac" data-toggle="tab"><i class="zmdi zmdi-palette"></i> Arte y Cultura</a></li>
					  	<li><a href="#cs" data-toggle="tab"><i class="zmdi zmdi-globe-alt"></i> Ciencias Sociales</a></li>
					  	<li><a href="#co" data-toggle="tab"><i class="zmdi zmdi-comments"></i> Comunicacion</a></li>
                          <li><a href="#in" data-toggle="tab"><i class="zmdi zmdi-translate"></i> Ingles</a></li>
					  	<li><a href="#ct" data-toggle="tab"><i class="zmdi zmdi-laptop"></i> Ciencia y Tecnologia</a></li>
					  	<li><a href="#ef" data-toggle="tab"><i class="zmdi zmdi-directions-run"></i> Edudacion Fisica</a></li>
					  	<li><a href="#et" data-toggle="tab"><i class="zmdi zmdi-book"></i> Educacion para el Trabajo</a></li>
					  	<li><a href="#er" data-toggle="tab"><i class="zmdi zmdi-library"></i> Educacion Religiosa</a></li>
					  	<li><a href="#ma" data-toggle="tab"><i class="zmdi zmdi-edit"></i> Matematica</a></li>

					</ul>
					<div class="tab-content">						
                        <!-- NOTAS TODO -->
					  	<div class="tab-pane fade active in" id="notas">
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
								<div class="row">
									<div class="col-md-6">
										<button id="btn-todo" class="btn btn-success btn-raised btn-xs" onclick="mostrarFormulario('todo')">Agregar</button>
									</div>
									<div class="col-md-6 text-right">
										<a href="cuarto/pdfCTd.php?año_busqueda=<?php echo $año_busqueda; ?>" target="_blank" class="btn btn-success custom-button" style="background-color: #808080; color: #fff;">
											<i class="fas fa-file-pdf"></i> Exportar a PDF
										</a>
									</div>
								</div>
                                <table class="table table-hover text-center">                              
                                    
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
											<th class="text-center">Periodo</th>
                                            <th class="text-center">Alumno</th>
                                            <th class="text-center">curso</th>
                                            <th class="text-center">Profesor</th>
                                            <th class="text-center">Grado</th>
                                            <th class="text-center">Unidad 1</th>
                                            <th class="text-center">Unidad 2</th>
                                            <th class="text-center">Unidad 3</th>
                                            <th class="text-center">Promedio</th>
                                            <th class="text-center">Actualizar</th>
                                            <th class="text-center">Eliminar</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($colegionacional as $colegio)     {  ?>
                                        <tr>
                                        <td scope="row"><?php  echo $colegio['id']; ?></td>
										<td><?php  echo $colegio['año']; ?></td>
                                        <td><?php  echo $colegio['Alumno']; ?></td>
                                        <td><?php  echo $colegio['Curso']; ?></td>
                                        <td><?php  echo $colegio['Profesor']; ?></td>
                                        <td><?php  echo $colegio['Grado']; ?></td>
                                        <td><?php  echo $colegio['unidad1']; ?></td>
                                        <td><?php  echo $colegio['unidad2']; ?></td>
                                        <td><?php  echo $colegio['unidad3']; ?></td>
                                        <td><?php  echo $colegio['promedio']; ?></td>

                                        
                                        <td>
                                            <a href="edc
											.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-success btn-raised btn-xs">Editar</a>
                                        </td>
                                        <td>
                                            <a href="cuarto.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-danger btn-raised btn-xs">Elimninar</a>
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
                                </ul>
                            </div>
                       </div>                                             
                        <!-- Formulario flotante 1-->
                        <div id="formularioFlotante" class="formulario-flotante" style="display: none;">
                         <span class="cerrar" onclick="cerrarFormulario()"><i class="zmdi zmdi-close-circle"></i></span>
                            <h2>Formulario para agregar notas generales</h2>
                            <!-- Aquí puedes agregar los campos del formulario -->

								<div class="container-fluid">
									<div class="row">
										<form action="" method="POST" >
												<div class="form-group">
													<label class="control-label">Periodo</label>
													<input class="form-control" type="number" name="anio" id="anio" value="<?php echo date("Y"); ?>" min="2000" max="2200" required>
												</div>
                                                <div class="form-group">
													<label class="control-label">Alumno</label>
													<select class="form-control" name="alumno" required>
														<option value="">Seleccionar Alumno</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de alumnos
														$query = "SELECT a.id,a.nombres FROM matriculas m
														INNER JOIN alumnos a ON m.id_alumno = a.id
														WHERE m.id_grado='5'";
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
														<option value="">Seleccionar Curso</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de cursos
														$query = "SELECT id, nombre_curso FROM cursos  ";
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
													<label class="control-label">Profesor</label>
													<select class="form-control" name="profesor" required>
														<option value="">Seleccionar Profesor</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de profesores
														$query = "SELECT id, nombres FROM profesores";
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
													<label class="control-label">Grado</label>
													<select class="form-control" name="grado" required>
														<option value="">Seleccionar Grado</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de grados
														$query = "SELECT id, nombre_grado FROM grados WHERE id='5'" ;
														$stmt = $conexion->prepare($query);
														$stmt->execute();
														$alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

														// Iterar sobre los resultados y construir las opciones del menú desplegable
														foreach ($alumnos as $alumno) {
														echo "<option value='" . $alumno['id'] . "'>" . $alumno['nombre_grado'] . "</option>";
														}
														?>
													</select>
												</div>

												<div class="form-group label-floating">
												<label class="control-label">Unidad 1</label>
												<input class="form-control" type="text" name="nota1" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Unidad 2</label>
												<input class="form-control" type="text" name="nota2" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Unidad 3</label>
												<input class="form-control" type="text" name="nota3" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Promedio</label>
												<input class="form-control" type="text" name="promedio" >
												</div>
																																												
												
												<p class="text-center">
													<button href="#!" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
												</p>
											</form>
										
									</div>
								
						        </div>


                        </div>

                        
                        <!-- DESARROLLO PERSONAL -->
					  	<div class="tab-pane fade" id="dp">
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
								<div class="row">
									<div class="col-md-6">
										<button id="btn-todo" class="btn btn-success btn-raised btn-xs custom-button" onclick="mostrarFormulario('dp')">Agregar</button>
									</div>
									<div class="col-md-6 text-right">
										<a href="cuarto/pdfCDp.php?año_busqueda=<?php echo $año_busqueda; ?>" target="_blank" class="btn btn-success custom-button" style="background-color: #808080; color: #fff;">
											<i class="fas fa-file-pdf"></i> Exportar a PDF
										</a>
									</div>
								</div>
                                <table class="table table-hover text-center">
                                
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
											<th class="text-center">Periodo</th>
                                            <th class="text-center">Alumno</th>
                                            <th class="text-center">curso</th>
                                            <th class="text-center">Profesor</th>
                                            <th class="text-center">Grado</th>
                                            <th class="text-center">Unidad 1</th>
                                            <th class="text-center">Unidad 2</th>
                                            <th class="text-center">Unidad 3</th>
                                            <th class="text-center">Promedio</th>
                                            <th class="text-center">Actualizar</th>
                                            <th class="text-center">Eliminar</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($cdp as $colegio)     {  ?>
                                        <tr>
                                        <td scope="row"><?php  echo $colegio['id']; ?></td>
										<td><?php  echo $colegio['año']; ?></td>
                                        <td><?php  echo $colegio['Alumno']; ?></td>
                                        <td><?php  echo $colegio['Curso']; ?></td>
                                        <td><?php  echo $colegio['Profesor']; ?></td>
                                        <td><?php  echo $colegio['Grado']; ?></td>
                                        <td><?php  echo $colegio['unidad1']; ?></td>
                                        <td><?php  echo $colegio['unidad2']; ?></td>
                                        <td><?php  echo $colegio['unidad3']; ?></td>
                                        <td><?php  echo $colegio['promedio']; ?></td>                                                                                  
                                        <td>
                                            <a href="edc
											.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-success btn-raised btn-xs">EDITAR</a>
                                        </td>
                                        <td>
                                            <a href="cuarto.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-danger btn-raised btn-xs">ELIMINAR</a>
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
                                </ul>
                            </div>
                        </div>
                         <!-- Formulario flotante 2-->
                         <div id="formularioFlotantedp" class="formulario-flotante" style="display: none;">
                          <span class="cerrar" onclick="cerrarFormulario()"><i class="zmdi zmdi-close-circle"></i></span>
                            <h2>Formulario para agregar notas generales</h2>
                            <!-- Aquí puedes agregar los campos del formulario -->

								<div class="container-fluid">
									<div class="row">
										<form action="" method="POST" >
													<div class="form-group">
														<div class="form-group">
														<label class="control-label">Periodo</label>
														<input class="form-control" type="number" name="anio" id="anio" value="<?php echo date("Y"); ?>" min="2000" max="2200" required>
													</div>
													<label class="control-label">Alumno</label>
													<select class="form-control" name="alumno" required>
														<option value="">Seleccionar Alumno</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de alumnos
														$query = "SELECT a.id, a.nombres FROM matriculas m
														INNER JOIN alumnos a ON m.id_alumno = a.id
														WHERE m.id_grado='5'";
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
														<option value="">Seleccionar Curso</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de cursos
														$query = "SELECT id, nombre_curso FROM cursos WHERE id='9' ";
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
													<label class="control-label">Profesor</label>
													<select class="form-control" name="profesor" required>
														<option value="">Seleccionar Profesor</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de profesores
														$query = "SELECT id, nombres FROM profesores";
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
													<label class="control-label">Grado</label>
													<select class="form-control" name="grado" required>
														<option value="">Seleccionar Grado</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de grados
														$query = "SELECT id, nombre_grado FROM grados WHERE id='5'" ;
														$stmt = $conexion->prepare($query);
														$stmt->execute();
														$alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

														// Iterar sobre los resultados y construir las opciones del menú desplegable
														foreach ($alumnos as $alumno) {
														echo "<option value='" . $alumno['id'] . "'>" . $alumno['nombre_grado'] . "</option>";
														}
														?>
													</select>
												</div>

												<div class="form-group label-floating">
												<label class="control-label">Unidad 1</label>
												<input class="form-control" type="text" name="nota1" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Unidad 2</label>
												<input class="form-control" type="text" name="nota2" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Unidad 3</label>
												<input class="form-control" type="text" name="nota3" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Promedio</label>
												<input class="form-control" type="text" name="promedio" >
												</div>
																																												
												
												<p class="text-center">
													<button href="#!" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
												</p>
											</form>
										
									</div>
								
						        </div>


                        </div>

                        
                        <!--  Ciudadania y Civica -->
					  	<div class="tab-pane fade" id="cc">
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
								<div class="row">
									<div class="col-md-6">
										<button id="btn-cc" class="btn btn-success btn-raised btn-xs" onclick="mostrarFormulario('cc')">Agregar</button>
									</div>
									<div class="col-md-6 text-right">
										<a href="cuarto/pdfCCc.php?año_busqueda=<?php echo $año_busqueda; ?>" target="_blank" class="btn btn-success custom-button" style="background-color: #808080; color: #fff;">
											<i class="fas fa-file-pdf"></i> Exportar a PDF
										</a>
									</div>
								</div>
                                <table class="table table-hover text-center">

                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
											<th class="text-center">Periodo</th>
                                            <th class="text-center">Alumno</th>
                                            <th class="text-center">curso</th>
                                            <th class="text-center">Profesor</th>
                                            <th class="text-center">Grado</th>
                                            <th class="text-center">Unidad 1</th>
                                            <th class="text-center">Unidad 2</th>
                                            <th class="text-center">Unidad 3</th>
                                            <th class="text-center">Promedio</th>
                                            <th class="text-center">Actualizar</th>
                                            <th class="text-center">Eliminar</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($ccc as $colegio)     {  ?>
                                        <tr>
                                        <td scope="row"><?php  echo $colegio['id']; ?></td>
										<td><?php  echo $colegio['año']; ?></td>
                                        <td><?php  echo $colegio['Alumno']; ?></td>
                                        <td><?php  echo $colegio['Curso']; ?></td>
                                        <td><?php  echo $colegio['Profesor']; ?></td>
                                        <td><?php  echo $colegio['Grado']; ?></td>
                                        <td><?php  echo $colegio['unidad1']; ?></td>
                                        <td><?php  echo $colegio['unidad2']; ?></td>
                                        <td><?php  echo $colegio['unidad3']; ?></td>
                                        <td><?php  echo $colegio['promedio']; ?></td>                                        
                                        <td>
                                            <a href="edc
											.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-success btn-raised btn-xs">EDITAR</a>
                                        </td>
                                        <td>
                                            <a href="cuarto.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-danger btn-raised btn-xs">ELIMINAR</a>
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
                                </ul>
                            </div>
                       </div>
                        <!-- Formulario flotante 3-->
                        <div id="formularioFlotantecc" class="formulario-flotante" style="display: none;">
                         <span class="cerrar" onclick="cerrarFormulario()"><i class="zmdi zmdi-close-circle"></i></span>
                            <h2>Formulario para agregar notas generales</h2>
                            <!-- Aquí puedes agregar los campos del formulario -->

								<div class="container-fluid">
									<div class="row">
										<form action="" method="POST" >
												<div class="form-group">
													<label class="control-label">Periodo</label>
													<input class="form-control" type="number" name="anio" id="anio" value="<?php echo date("Y"); ?>" min="2000" max="2200" required>
												</div>
                                                <div class="form-group">
													<label class="control-label">Alumno</label>
													<select class="form-control" name="alumno" required>
														<option value="">Seleccionar Alumno</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de alumnos
														$query = "SELECT a.id,a.nombres FROM matriculas m
														INNER JOIN alumnos a ON m.id_alumno = a.id
														WHERE m.id_grado='5'";
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
														<option value="">Seleccionar Curso</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de cursos
														$query = "SELECT id, nombre_curso FROM cursos WHERE id='10' ";
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
													<label class="control-label">Profesor</label>
													<select class="form-control" name="profesor" required>
														<option value="">Seleccionar Profesor</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de profesores
														$query = "SELECT id, nombres FROM profesores";
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
													<label class="control-label">Grado</label>
													<select class="form-control" name="grado" required>
														<option value="">Seleccionar Grado</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de grados
														$query = "SELECT id, nombre_grado FROM grados WHERE id='5'" ;
														$stmt = $conexion->prepare($query);
														$stmt->execute();
														$alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

														// Iterar sobre los resultados y construir las opciones del menú desplegable
														foreach ($alumnos as $alumno) {
														echo "<option value='" . $alumno['id'] . "'>" . $alumno['nombre_grado'] . "</option>";
														}
														?>
													</select>
												</div>

												<div class="form-group label-floating">
												<label class="control-label">Unidad 1</label>
												<input class="form-control" type="text" name="nota1" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Unidad 2</label>
												<input class="form-control" type="text" name="nota2" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Unidad 3</label>
												<input class="form-control" type="text" name="nota3" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Promedio</label>
												<input class="form-control" type="text" name="promedio" >
												</div>
																																												
												
												<p class="text-center">
													<button href="#!" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
												</p>
											</form>
										
									</div>
								
						        </div>


                        </div>


                        <!-- Arte y Cultura -->
					  	<div class="tab-pane fade" id="ac">
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
								<div class="row">
									<div class="col-md-6">
										<button id="btn-ac" class="btn btn-success btn-raised btn-xs" onclick="mostrarFormulario('ac')">Agregar</button>
									</div>
									<div class="col-md-6 text-right">
										<a href="cuarto/pdfCAc.php?año_busqueda=<?php echo $año_busqueda; ?>" target="_blank" class="btn btn-success custom-button" style="background-color: #808080; color: #fff;">
											<i class="fas fa-file-pdf"></i> Exportar a PDF
										</a>
									</div>
								</div>
                                <table class="table table-hover text-center">
                                
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
											<th class="text-center">Periodo</th>
                                            <th class="text-center">Alumno</th>
                                            <th class="text-center">curso</th>
                                            <th class="text-center">Profesor</th>
                                            <th class="text-center">Grado</th>
                                            <th class="text-center">Unidad 1</th>
                                            <th class="text-center">Unidad 2</th>
                                            <th class="text-center">Unidad 3</th>
                                            <th class="text-center">Promedio</th>
                                            <th class="text-center">Actualizar</th>
                                            <th class="text-center">Eliminar</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($cac as $colegio)     {  ?>
                                        <tr>
                                        <td scope="row"><?php  echo $colegio['id']; ?></td>
										<td><?php  echo $colegio['año']; ?></td>
                                        <td><?php  echo $colegio['Alumno']; ?></td>
                                        <td><?php  echo $colegio['Curso']; ?></td>
                                        <td><?php  echo $colegio['Profesor']; ?></td>
                                        <td><?php  echo $colegio['Grado']; ?></td>
                                        <td><?php  echo $colegio['unidad1']; ?></td>
                                        <td><?php  echo $colegio['unidad2']; ?></td>
                                        <td><?php  echo $colegio['unidad3']; ?></td>
                                        <td><?php  echo $colegio['promedio']; ?></td>

                                        <td>
                                            <a href="edc
											.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-success btn-raised btn-xs">EDITAR</a>
                                        </td>
                                        <td>
                                            <a href="cuarto.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-danger btn-raised btn-xs">ELIMINAR</a>
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
                                </ul>
                            </div>
                        </div>
                        <!-- Formulario flotante 4 -->
                        <div id="formularioFlotanteac" class="formulario-flotante" style="display: none;">
                         <span class="cerrar" onclick="cerrarFormulario()"><i class="zmdi zmdi-close-circle"></i></span>
                            <h2>Formulario Arte y cultura</h2>
                            <!-- Aquí puedes agregar los campos del formulario -->

								<div class="container-fluid">
									<div class="row">
										<form action="" method="POST" >
												<div class="form-group">
													<label class="control-label">Periodo</label>
													<input class="form-control" type="number" name="anio" id="anio" value="<?php echo date("Y"); ?>" min="2000" max="2200" required>
												</div>
                                                <div class="form-group">
													<label class="control-label">Alumno</label>
													<select class="form-control" name="alumno" required>
														<option value="">Seleccionar Alumno</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de alumnos
														$query = "SELECT a.id,a.nombres FROM matriculas m
														INNER JOIN alumnos a ON m.id_alumno = a.id
														WHERE m.id_grado='5'";
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
														<option value="">Seleccionar Curso</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de cursos
														$query = "SELECT id, nombre_curso FROM cursos WHERE id='6' ";
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
													<label class="control-label">Profesor</label>
													<select class="form-control" name="profesor" required>
														<option value="">Seleccionar Profesor</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de profesores
														$query = "SELECT id, nombres FROM profesores";
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
													<label class="control-label">Grado</label>
													<select class="form-control" name="grado" required>
														<option value="">Seleccionar Grado</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de grados
														$query = "SELECT id, nombre_grado FROM grados WHERE id='5'" ;
														$stmt = $conexion->prepare($query);
														$stmt->execute();
														$alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

														// Iterar sobre los resultados y construir las opciones del menú desplegable
														foreach ($alumnos as $alumno) {
														echo "<option value='" . $alumno['id'] . "'>" . $alumno['nombre_grado'] . "</option>";
														}
														?>
													</select>
												</div>

												<div class="form-group label-floating">
												<label class="control-label">Unidad 1</label>
												<input class="form-control" type="text" name="nota1" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Unidad 2</label>
												<input class="form-control" type="text" name="nota2" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Unidad 3</label>
												<input class="form-control" type="text" name="nota3" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Promedio</label>
												<input class="form-control" type="text" name="promedio" >
												</div>
																																												
												
												<p class="text-center">
													<button href="#!" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
												</p>
											</form>
										
									</div>
								
						        </div>


                        </div>
                        

                        <!-- Ciencias Sociales -->
                        <div class="tab-pane fade" id="cs">
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
								<div class="row">
									<div class="col-md-6">
										<button id="btn-cs" class="btn btn-success btn-raised btn-xs" onclick="mostrarFormulario('cs')">Agregar</button>
									</div>
									<div class="col-md-6 text-right">
										<a href="cuarto/pdfCCs.php?año_busqueda=<?php echo $año_busqueda; ?>" target="_blank" class="btn btn-success custom-button" style="background-color: #808080; color: #fff;">
											<i class="fas fa-file-pdf"></i> Exportar a PDF
										</a>
									</div>
								</div>
                                <table class="table table-hover text-center">

                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
											<th class="text-center">Periodo</th>
                                            <th class="text-center">Alumno</th>
                                            <th class="text-center">curso</th>
                                            <th class="text-center">Profesor</th>
                                            <th class="text-center">Grado</th>
                                            <th class="text-center">Unidad 1</th>
                                            <th class="text-center">Unidad 2</th>
                                            <th class="text-center">Unidad 3</th>
                                            <th class="text-center">Promedio</th>
                                            <th class="text-center">Actualizar</th>
                                            <th class="text-center">Eliminar</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($ccs as $colegio)     {  ?>
                                        <tr>
                                        <td scope="row"><?php  echo $colegio['id']; ?></td>
										<td><?php  echo $colegio['año']; ?></td>
                                        <td><?php  echo $colegio['Alumno']; ?></td>
                                        <td><?php  echo $colegio['Curso']; ?></td>
                                        <td><?php  echo $colegio['Profesor']; ?></td>
                                        <td><?php  echo $colegio['Grado']; ?></td>
                                        <td><?php  echo $colegio['unidad1']; ?></td>
                                        <td><?php  echo $colegio['unidad2']; ?></td>
                                        <td><?php  echo $colegio['unidad3']; ?></td>
                                        <td><?php  echo $colegio['promedio']; ?></td>                                        
                                        <td>
                                            <a href="edc
											.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-success btn-raised btn-xs">EDITAR</a>
                                        </td>
                                        <td>
                                            <a href="cuarto.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-danger btn-raised btn-xs">ELIMINAR</a>
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
                                </ul>
                            </div>
                        </div>
                         <!-- Formulario flotante 5 -->
                         <div id="formularioFlotantecs" class="formulario-flotante" style="display: none;">
                          <span class="cerrar" onclick="cerrarFormulario()"><i class="zmdi zmdi-close-circle"></i></span>
                            <h2>Formulario para agregar notas generales</h2>
                            <!-- Aquí puedes agregar los campos del formulario -->

								<div class="container-fluid">
									<div class="row">
										<form action="" method="POST" >
												<div class="form-group">
													<label class="control-label">Periodo</label>
													<input class="form-control" type="number" name="anio" id="anio" value="<?php echo date("Y"); ?>" min="2000" max="2200" required>
												</div>
                                                <div class="form-group">
													<label class="control-label">Alumno</label>
													<select class="form-control" name="alumno" required>
														<option value="">Seleccionar Alumno</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de alumnos
														$query = "SELECT a.id,a.nombres FROM matriculas m
														INNER JOIN alumnos a ON m.id_alumno = a.id
														WHERE m.id_grado='5'";
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
														<option value="">Seleccionar Curso</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de cursos
														$query = "SELECT id, nombre_curso FROM cursos WHERE id='11' ";
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
													<label class="control-label">Profesor</label>
													<select class="form-control" name="profesor" required>
														<option value="">Seleccionar Profesor</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de profesores
														$query = "SELECT id, nombres FROM profesores";
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
													<label class="control-label">Grado</label>
													<select class="form-control" name="grado" required>
														<option value="">Seleccionar Grado</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de grados
														$query = "SELECT id, nombre_grado FROM grados WHERE id='5'" ;
														$stmt = $conexion->prepare($query);
														$stmt->execute();
														$alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

														// Iterar sobre los resultados y construir las opciones del menú desplegable
														foreach ($alumnos as $alumno) {
														echo "<option value='" . $alumno['id'] . "'>" . $alumno['nombre_grado'] . "</option>";
														}
														?>
													</select>
												</div>

												<div class="form-group label-floating">
												<label class="control-label">Unidad 1</label>
												<input class="form-control" type="text" name="nota1" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Unidad 2</label>
												<input class="form-control" type="text" name="nota2" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Unidad 3</label>
												<input class="form-control" type="text" name="nota3" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Promedio</label>
												<input class="form-control" type="text" name="promedio" >
												</div>
																																												
												
												<p class="text-center">
													<button href="#!" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
												</p>
											</form>
										
									</div>
								
						        </div>


                        </div>


                        <!-- Comunicacion -->
                        <div class="tab-pane fade" id="co">
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
								<div class="row">
									<div class="col-md-6">
										<button id="btn-co" class="btn btn-success btn-raised btn-xs" onclick="mostrarFormulario('co')">Agregar</button>
									</div>
									<div class="col-md-6 text-right">
										<a href="cuarto/pdfCCo.php?año_busqueda=<?php echo $año_busqueda; ?>" target="_blank" class="btn btn-success custom-button" style="background-color: #808080; color: #fff;">
											<i class="fas fa-file-pdf"></i> Exportar a PDF
										</a>
									</div>
								</div>
                                <table class="table table-hover text-center">

                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
											<th class="text-center">Periodo</th>
                                            <th class="text-center">Alumno</th>
                                            <th class="text-center">curso</th>
                                            <th class="text-center">Profesor</th>
                                            <th class="text-center">Grado</th>
                                            <th class="text-center">Unidad 1</th>
                                            <th class="text-center">Unidad 2</th>
                                            <th class="text-center">Unidad 3</th>
                                            <th class="text-center">Promedio</th>
                                            <th class="text-center">Actualizar</th>
                                            <th class="text-center">Eliminar</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($cco as $colegio)     {  ?>
                                        <tr>
                                        <td scope="row"><?php  echo $colegio['id']; ?></td>
										<td><?php  echo $colegio['año']; ?></td>
                                        <td><?php  echo $colegio['Alumno']; ?></td>
                                        <td><?php  echo $colegio['Curso']; ?></td>
                                        <td><?php  echo $colegio['Profesor']; ?></td>
                                        <td><?php  echo $colegio['Grado']; ?></td>
                                        <td><?php  echo $colegio['unidad1']; ?></td>
                                        <td><?php  echo $colegio['unidad2']; ?></td>
                                        <td><?php  echo $colegio['unidad3']; ?></td>
                                        <td><?php  echo $colegio['promedio']; ?></td>

                                        <td>
                                            <a href="edc
											.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-success btn-raised btn-xs">EDITAR</a>
                                        </td>
                                        <td>
                                            <a href="cuarto.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-danger btn-raised btn-xs">ELIMINAR</a>
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
                                </ul>
                            </div>
                        </div>
                         <!-- Formulario flotante 6 -->
                         <div id="formularioFlotanteco" class="formulario-flotante" style="display: none;">
                          <span class="cerrar" onclick="cerrarFormulario()"><i class="zmdi zmdi-close-circle"></i></span>
                            <h2>Formulario para agregar notas generales</h2>
                            <!-- Aquí puedes agregar los campos del formulario -->

								<div class="container-fluid">
									<div class="row">
										<form action="" method="POST" >
												<div class="form-group">
													<label class="control-label">Periodo</label>
													<input class="form-control" type="number" name="anio" id="anio" value="<?php echo date("Y"); ?>" min="2000" max="2200" required>
												</div>
                                                <div class="form-group">
													<label class="control-label">Alumno</label>
													<select class="form-control" name="alumno" required>
														<option value="">Seleccionar Alumno</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de alumnos
														$query = "SELECT a.id,a.nombres FROM matriculas m
														INNER JOIN alumnos a ON m.id_alumno = a.id
														WHERE m.id_grado='5'";
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
														<option value="">Seleccionar Curso</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de cursos
														$query = "SELECT id, nombre_curso FROM cursos WHERE id='2' ";
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
													<label class="control-label">Profesor</label>
													<select class="form-control" name="profesor" required>
														<option value="">Seleccionar Profesor</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de profesores
														$query = "SELECT id, nombres FROM profesores";
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
													<label class="control-label">Grado</label>
													<select class="form-control" name="grado" required>
														<option value="">Seleccionar Grado</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de grados
														$query = "SELECT id, nombre_grado FROM grados WHERE id='5'" ;
														$stmt = $conexion->prepare($query);
														$stmt->execute();
														$alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

														// Iterar sobre los resultados y construir las opciones del menú desplegable
														foreach ($alumnos as $alumno) {
														echo "<option value='" . $alumno['id'] . "'>" . $alumno['nombre_grado'] . "</option>";
														}
														?>
													</select>
												</div>

												<div class="form-group label-floating">
												<label class="control-label">Unidad 1</label>
												<input class="form-control" type="text" name="nota1" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Unidad 2</label>
												<input class="form-control" type="text" name="nota2" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Unidad 3</label>
												<input class="form-control" type="text" name="nota3" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Promedio</label>
												<input class="form-control" type="text" name="promedio" >
												</div>
																																												
												
												<p class="text-center">
													<button href="#!" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
												</p>
											</form>
										
									</div>
								
						        </div>


                        </div>

                        
                        <!-- Ingles -->
                        <div class="tab-pane fade" id="in">
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
								<div class="row">
									<div class="col-md-6">
										<button id="btn-in" class="btn btn-success btn-raised btn-xs" onclick="mostrarFormulario('in')">Agregar</button>
									</div>
									<div class="col-md-6 text-right">
										<a href="cuarto/pdfCIn.php?año_busqueda=<?php echo $año_busqueda; ?>" target="_blank" class="btn btn-success custom-button" style="background-color: #808080; color: #fff;">
											<i class="fas fa-file-pdf"></i> Exportar a PDF
										</a>
									</div>
								</div>
                                <table class="table table-hover text-center">

                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
											<th class="text-center">Periodo</th>
                                            <th class="text-center">Alumno</th>
                                            <th class="text-center">curso</th>
                                            <th class="text-center">Profesor</th>
                                            <th class="text-center">Grado</th>
                                            <th class="text-center">Unidad 1</th>
                                            <th class="text-center">Unidad 2</th>
                                            <th class="text-center">Unidad 3</th>
                                            <th class="text-center">Promedio</th>
                                            <th class="text-center">Actualizar</th>
                                            <th class="text-center">Eliminar</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($cin as $colegio)     {  ?>
                                        <tr>
                                        <td scope="row"><?php  echo $colegio['id']; ?></td>
										<td><?php  echo $colegio['año']; ?></td>
                                        <td><?php  echo $colegio['Alumno']; ?></td>
                                        <td><?php  echo $colegio['Curso']; ?></td>
                                        <td><?php  echo $colegio['Profesor']; ?></td>
                                        <td><?php  echo $colegio['Grado']; ?></td>
                                        <td><?php  echo $colegio['unidad1']; ?></td>
                                        <td><?php  echo $colegio['unidad2']; ?></td>
                                        <td><?php  echo $colegio['unidad3']; ?></td>
                                        <td><?php  echo $colegio['promedio']; ?></td>

                                        <td>
                                            <a href="edc
											.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-success btn-raised btn-xs">EDITAR</a>
                                        </td>
                                        <td>
                                            <a href="cuarto.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-danger btn-raised btn-xs">ELIMINAR</a>
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
                                </ul>
                            </div>
                        </div>
                         <!-- Formulario flotante 7-->
                         <div id="formularioFlotantein" class="formulario-flotante" style="display: none;">
                          <span class="cerrar" onclick="cerrarFormulario()"><i class="zmdi zmdi-close-circle"></i></span>
                            <h2>Formulario para agregar notas generales</h2>
                            <!-- Aquí puedes agregar los campos del formulario -->

								<div class="container-fluid">
									<div class="row">
										<form action="" method="POST" >
												<div class="form-group">
													<label class="control-label">Periodo</label>
													<input class="form-control" type="number" name="anio" id="anio" value="<?php echo date("Y"); ?>" min="2000" max="2200" required>
												</div>
                                                <div class="form-group">
													<label class="control-label">Alumno</label>
													<select class="form-control" name="alumno" required>
														<option value="">Seleccionar Alumno</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de alumnos
														$query = "SELECT a.id,a.nombres FROM matriculas m
														INNER JOIN alumnos a ON m.id_alumno = a.id
														WHERE m.id_grado='5'";
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
														<option value="">Seleccionar Curso</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de cursos
														$query = "SELECT id, nombre_curso FROM cursos WHERE id='12' ";
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
													<label class="control-label">Profesor</label>
													<select class="form-control" name="profesor" required>
														<option value="">Seleccionar Profesor</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de profesores
														$query = "SELECT id, nombres FROM profesores";
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
													<label class="control-label">Grado</label>
													<select class="form-control" name="grado" required>
														<option value="">Seleccionar Grado</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de grados
														$query = "SELECT id, nombre_grado FROM grados WHERE id='5'" ;
														$stmt = $conexion->prepare($query);
														$stmt->execute();
														$alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

														// Iterar sobre los resultados y construir las opciones del menú desplegable
														foreach ($alumnos as $alumno) {
														echo "<option value='" . $alumno['id'] . "'>" . $alumno['nombre_grado'] . "</option>";
														}
														?>
													</select>
												</div>

												<div class="form-group label-floating">
												<label class="control-label">Unidad 1</label>
												<input class="form-control" type="text" name="nota1" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Unidad 2</label>
												<input class="form-control" type="text" name="nota2" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Unidad 3</label>
												<input class="form-control" type="text" name="nota3" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Promedio</label>
												<input class="form-control" type="text" name="promedio" >
												</div>
																																												
												
												<p class="text-center">
													<button href="#!" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
												</p>
											</form>
										
									</div>
								
						        </div>


                        </div>


                         <!-- Ciencia y Tecnologia -->
					  	<div class="tab-pane fade" id="ct">
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
								<div class="row">
									<div class="col-md-6">
										<button id="btn-ct" class="btn btn-success btn-raised btn-xs" onclick="mostrarFormulario('ct')">Agregar</button>
									</div>
									<div class="col-md-6 text-right">
										<a href="cuarto/pdfCCt.php?año_busqueda=<?php echo $año_busqueda; ?>" target="_blank" class="btn btn-success custom-button" style="background-color: #808080; color: #fff;">
											<i class="fas fa-file-pdf"></i> Exportar a PDF
										</a>
									</div>
								</div>
                                <table class="table table-hover text-center">

                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
											<th class="text-center">Periodo</th>
                                            <th class="text-center">Alumno</th>
                                            <th class="text-center">curso</th>
                                            <th class="text-center">Profesor</th>
                                            <th class="text-center">Grado</th>
                                            <th class="text-center">Unidad 1</th>
                                            <th class="text-center">Unidad 2</th>
                                            <th class="text-center">Unidad 3</th>
                                            <th class="text-center">Promedio</th>
                                            <th class="text-center">Actualizar</th>
                                            <th class="text-center">Eliminar</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($cct as $colegio)     {  ?>
                                        <tr>
                                        <td scope="row"><?php  echo $colegio['id']; ?></td>
										<td><?php  echo $colegio['año']; ?></td>
                                        <td><?php  echo $colegio['Alumno']; ?></td>
                                        <td><?php  echo $colegio['Curso']; ?></td>
                                        <td><?php  echo $colegio['Profesor']; ?></td>
                                        <td><?php  echo $colegio['Grado']; ?></td>td>
                                        <td><?php  echo $colegio['unidad1']; ?></td>
                                        <td><?php  echo $colegio['unidad2']; ?></td>
                                        <td><?php  echo $colegio['unidad3']; ?></td>
                                        <td><?php  echo $colegio['promedio']; ?></td>

                                        <td>
                                            <a href="edc
											.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-success btn-raised btn-xs">EDITAR</a>
                                        </td>
                                        <td>
                                            <a href="cuarto.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-danger btn-raised btn-xs">ELIMINAR</a>
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
                                </ul>
                            </div>
                        </div>
                         <!-- Formulario flotante 8-->
                         <div id="formularioFlotantect" class="formulario-flotante" style="display: none;">
                          <span class="cerrar" onclick="cerrarFormulario()"><i class="zmdi zmdi-close-circle"></i></span>
                            <h2>Formulario para agregar notas generales</h2>
                            <!-- Aquí puedes agregar los campos del formulario -->

								<div class="container-fluid">
									<div class="row">
										<form action="" method="POST" >
												<div class="form-group">
													<label class="control-label">Periodo</label>
													<input class="form-control" type="number" name="anio" id="anio" value="<?php echo date("Y"); ?>" min="2000" max="2200" required>
												</div>
                                                <div class="form-group">
													<label class="control-label">Alumno</label>
													<select class="form-control" name="alumno" required>
														<option value="">Seleccionar Alumno</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de alumnos
														$query = "SELECT a.id,a.nombres FROM matriculas m
														INNER JOIN alumnos a ON m.id_alumno = a.id
														WHERE m.id_grado='5'";
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
														<option value="">Seleccionar Curso</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de cursos
														$query = "SELECT id, nombre_curso FROM cursos WHERE id='13' ";
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
													<label class="control-label">Profesor</label>
													<select class="form-control" name="profesor" required>
														<option value="">Seleccionar Profesor</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de profesores
														$query = "SELECT id, nombres FROM profesores";
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
													<label class="control-label">Grado</label>
													<select class="form-control" name="grado" required>
														<option value="">Seleccionar Grado</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de grados
														$query = "SELECT id, nombre_grado FROM grados WHERE id='5'" ;
														$stmt = $conexion->prepare($query);
														$stmt->execute();
														$alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

														// Iterar sobre los resultados y construir las opciones del menú desplegable
														foreach ($alumnos as $alumno) {
														echo "<option value='" . $alumno['id'] . "'>" . $alumno['nombre_grado'] . "</option>";
														}
														?>
													</select>
												</div>

												<div class="form-group label-floating">
												<label class="control-label">Unidad 1</label>
												<input class="form-control" type="text" name="nota1" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Unidad 2</label>
												<input class="form-control" type="text" name="nota2" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Unidad 3</label>
												<input class="form-control" type="text" name="nota3" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Promedio</label>
												<input class="form-control" type="text" name="promedio" >
												</div>
																																												
												
												<p class="text-center">
													<button href="#!" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
												</p>
											</form>
										
									</div>
								
						        </div>


                        </div>


                        <!-- Edudacion Fisica -->
                        <div class="tab-pane fade" id="ef">
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
								<div class="row">
									<div class="col-md-6">
										<button id="btn-ef" class="btn btn-success btn-raised btn-xs" onclick="mostrarFormulario('ef')">Agregar</button>
									</div>
									<div class="col-md-6 text-right">
										<a href="cuarto/pdfCEf.php?año_busqueda=<?php echo $año_busqueda; ?>" target="_blank" class="btn btn-success custom-button" style="background-color: #808080; color: #fff;">
											<i class="fas fa-file-pdf"></i> Exportar a PDF
										</a>
									</div>
								</div>
                                <table class="table table-hover text-center">

                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
											<th class="text-center">Periodo</th>
                                            <th class="text-center">Alumno</th>
                                            <th class="text-center">curso</th>
                                            <th class="text-center">Profesor</th>
                                            <th class="text-center">Grado</th>
                                            <th class="text-center">Unidad 1</th>
                                            <th class="text-center">Unidad 2</th>
                                            <th class="text-center">Unidad 3</th>
                                            <th class="text-center">Promedio</th>
                                            <th class="text-center">Actualizar</th>
                                            <th class="text-center">Eliminar</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($cef as $colegio)     {  ?>
                                        <tr>
                                        <td scope="row"><?php  echo $colegio['id']; ?></td>
										<td><?php  echo $colegio['año']; ?></td>
                                        <td><?php  echo $colegio['Alumno']; ?></td>
                                        <td><?php  echo $colegio['Curso']; ?></td>
                                        <td><?php  echo $colegio['Profesor']; ?></td>
                                        <td><?php  echo $colegio['Grado']; ?></td>
                                        <td><?php  echo $colegio['unidad1']; ?></td>
                                        <td><?php  echo $colegio['unidad2']; ?></td>
                                        <td><?php  echo $colegio['unidad3']; ?></td>
                                        <td><?php  echo $colegio['promedio']; ?></td>                                    
                                        <td>
                                            <a href="edc
											.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-success btn-raised btn-xs">EDITAR</a>
                                        </td>
                                        <td>
                                            <a href="cuarto.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-danger btn-raised btn-xs">ELIMINAR</a>
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
                                </ul>
                            </div>
                        </div>
                         <!-- Formulario flotante 9 -->
                         <div id="formularioFlotanteef" class="formulario-flotante" style="display: none;">
                          <span class="cerrar" onclick="cerrarFormulario()"><i class="zmdi zmdi-close-circle"></i></span>
                            <h2>Formulario para agregar notas generales</h2>
                            <!-- Aquí puedes agregar los campos del formulario -->

								<div class="container-fluid">
									<div class="row">
										<form action="" method="POST" >
												<div class="form-group">
													<label class="control-label">Periodo</label>
													<input class="form-control" type="number" name="anio" id="anio" value="<?php echo date("Y"); ?>" min="2000" max="2200" required>
												</div>
                                                <div class="form-group">
													<label class="control-label">Alumno</label>
													<select class="form-control" name="alumno" required>
														<option value="">Seleccionar Alumno</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de alumnos
														$query = "SELECT a.id,a.nombres FROM matriculas m
														INNER JOIN alumnos a ON m.id_alumno = a.id
														WHERE m.id_grado='5'";
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
														<option value="">Seleccionar Curso</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de cursos
														$query = "SELECT id, nombre_curso FROM cursos WHERE id='8' ";
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
													<label class="control-label">Profesor</label>
													<select class="form-control" name="profesor" required>
														<option value="">Seleccionar Profesor</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de profesores
														$query = "SELECT id, nombres FROM profesores";
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
													<label class="control-label">Grado</label>
													<select class="form-control" name="grado" required>
														<option value="">Seleccionar Grado</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de grados
														$query = "SELECT id, nombre_grado FROM grados WHERE id='5'" ;
														$stmt = $conexion->prepare($query);
														$stmt->execute();
														$alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

														// Iterar sobre los resultados y construir las opciones del menú desplegable
														foreach ($alumnos as $alumno) {
														echo "<option value='" . $alumno['id'] . "'>" . $alumno['nombre_grado'] . "</option>";
														}
														?>
													</select>
												</div>

												<div class="form-group label-floating">
												<label class="control-label">Unidad 1</label>
												<input class="form-control" type="text" name="nota1" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Unidad 2</label>
												<input class="form-control" type="text" name="nota2" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Unidad 3</label>
												<input class="form-control" type="text" name="nota3" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Promedio</label>
												<input class="form-control" type="text" name="promedio" >
												</div>
																																												
												
												<p class="text-center">
													<button href="#!" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
												</p>
											</form>
										
									</div>
								
						        </div>


                        </div>


                        <!-- Educacion para el Trabajo -->
                        <div class="tab-pane fade" id="et">
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
								<div class="row">
									<div class="col-md-6">
										<button id="btn-et" class="btn btn-success btn-raised btn-xs" onclick="mostrarFormulario('et')">Agregar</button>
									</div>
									<div class="col-md-6 text-right">
										<a href="cuarto/pdfCEt.php?año_busqueda=<?php echo $año_busqueda; ?>" target="_blank" class="btn btn-success custom-button" style="background-color: #808080; color: #fff;">
											<i class="fas fa-file-pdf"></i> Exportar a PDF
										</a>
									</div>
								</div>
                                <table class="table table-hover text-center">

                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
											<th class="text-center">Periodo</th>
                                            <th class="text-center">Alumno</th>
                                            <th class="text-center">curso</th>
                                            <th class="text-center">Profesor</th>
                                            <th class="text-center">Grado</th>
                                            <th class="text-center">Unidad 1</th>
                                            <th class="text-center">Unidad 2</th>
                                            <th class="text-center">Unidad 3</th>
                                            <th class="text-center">Promedio</th>
                                            <th class="text-center">Actualizar</th>
                                            <th class="text-center">Eliminar</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($cet as $colegio)     {  ?>
                                        <tr>
                                        <td scope="row"><?php  echo $colegio['id']; ?></td>
										<td><?php  echo $colegio['año']; ?></td>
                                        <td><?php  echo $colegio['Alumno']; ?></td>
                                        <td><?php  echo $colegio['Curso']; ?></td>
                                        <td><?php  echo $colegio['Profesor']; ?></td>
                                        <td><?php  echo $colegio['Grado']; ?></td>
                                        <td><?php  echo $colegio['unidad1']; ?></td>
                                        <td><?php  echo $colegio['unidad2']; ?></td>
                                        <td><?php  echo $colegio['unidad3']; ?></td>
                                        <td><?php  echo $colegio['promedio']; ?></td>                                        
                                        <td>
                                            <a href="edc
											.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-success btn-raised btn-xs">EDITAR</a>
                                        </td>
                                        <td>
                                            <a href="cuarto.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-danger btn-raised btn-xs">ELIMINAR</a>
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
                                </ul>
                            </div>
                        </div>
                         <!-- Formulario flotante 10 -->
                         <div id="formularioFlotanteet" class="formulario-flotante" style="display: none;">
                          <span class="cerrar" onclick="cerrarFormulario()"><i class="zmdi zmdi-close-circle"></i></span>
                            <h2>Formulario para agregar notas generales</h2>
                            <!-- Aquí puedes agregar los campos del formulario -->

								<div class="container-fluid">
									<div class="row">
										<form action="" method="POST" >
												<div class="form-group">
													<label class="control-label">Periodo</label>
													<input class="form-control" type="number" name="anio" id="anio" value="<?php echo date("Y"); ?>" min="2000" max="2200" required>
												</div>
                                                <div class="form-group">
													<label class="control-label">Alumno</label>
													<select class="form-control" name="alumno" required>
														<option value="">Seleccionar Alumno</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de alumnos
														$query = "SELECT a.id,a.nombres FROM matriculas m
														INNER JOIN alumnos a ON m.id_alumno = a.id
														WHERE m.id_grado='5'";
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
														<option value="">Seleccionar Curso</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de cursos
														$query = "SELECT id, nombre_curso FROM cursos WHERE id='14' ";
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
													<label class="control-label">Profesor</label>
													<select class="form-control" name="profesor" required>
														<option value="">Seleccionar Profesor</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de profesores
														$query = "SELECT id, nombres FROM profesores";
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
													<label class="control-label">Grado</label>
													<select class="form-control" name="grado" required>
														<option value="">Seleccionar Grado</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de grados
														$query = "SELECT id, nombre_grado FROM grados WHERE id='5'" ;
														$stmt = $conexion->prepare($query);
														$stmt->execute();
														$alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

														// Iterar sobre los resultados y construir las opciones del menú desplegable
														foreach ($alumnos as $alumno) {
														echo "<option value='" . $alumno['id'] . "'>" . $alumno['nombre_grado'] . "</option>";
														}
														?>
													</select>
												</div>

												<div class="form-group label-floating">
												<label class="control-label">Unidad 1</label>
												<input class="form-control" type="text" name="nota1" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Unidad 2</label>
												<input class="form-control" type="text" name="nota2" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Unidad 3</label>
												<input class="form-control" type="text" name="nota3" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Promedio</label>
												<input class="form-control" type="text" name="promedio" >
												</div>
																																												
												
												<p class="text-center">
													<button href="#!" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
												</p>
											</form>
										
									</div>
								
						        </div>


                        </div>


                        <!-- Educacion Religiosa -->
                        <div class="tab-pane fade" id="er">
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
								<div class="row">
									<div class="col-md-6">
										<button id="btn-er" class="btn btn-success btn-raised btn-xs" onclick="mostrarFormulario('er')">Agregar</button>
									</div>
									<div class="col-md-6 text-right">
										<a href="cuarto/pdfCEr.php?año_busqueda=<?php echo $año_busqueda; ?>" target="_blank" class="btn btn-success custom-button" style="background-color: #808080; color: #fff;">
											<i class="fas fa-file-pdf"></i> Exportar a PDF
										</a>
									</div>
								</div>
                                <table class="table table-hover text-center">

                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
											<th class="text-center">Periodo</th>
                                            <th class="text-center">Alumno</th>
                                            <th class="text-center">curso</th>
                                            <th class="text-center">Profesor</th>
                                            <th class="text-center">Grado</th>
                                            <th class="text-center">Unidad 1</th>
                                            <th class="text-center">Unidad 2</th>
                                            <th class="text-center">Unidad 3</th>
                                            <th class="text-center">Promedio</th>
                                            <th class="text-center">Actualizar</th>
                                            <th class="text-center">Eliminar</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($cer as $colegio)     {  ?>
                                        <tr>
                                        <td scope="row"><?php  echo $colegio['id']; ?></td>
										<td><?php  echo $colegio['año']; ?></td>
                                        <td><?php  echo $colegio['Alumno']; ?></td>
                                        <td><?php  echo $colegio['Curso']; ?></td>
                                        <td><?php  echo $colegio['Profesor']; ?></td>
                                        <td><?php  echo $colegio['Grado']; ?></td>
                                        <td><?php  echo $colegio['unidad1']; ?></td>
                                        <td><?php  echo $colegio['unidad2']; ?></td>
                                        <td><?php  echo $colegio['unidad3']; ?></td>
                                        <td><?php  echo $colegio['promedio']; ?></td>

                                        <td>
                                            <a href="edc
											.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-success btn-raised btn-xs">EDITAR</a>
                                        </td>
                                        <td>
                                            <a href="cuarto.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-danger btn-raised btn-xs">ELIMINAR</a>
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
                                </ul>
                            </div>
                        </div>
                         <!-- Formulario flotante 11 -->
                         <div id="formularioFlotanteer" class="formulario-flotante" style="display: none;">
                          <span class="cerrar" onclick="cerrarFormulario()"><i class="zmdi zmdi-close-circle"></i></span>
                            <h2>Formulario para agregar notas generales</h2>
                            <!-- Aquí puedes agregar los campos del formulario -->

								<div class="container-fluid">
									<div class="row">
										<form action="" method="POST" >
												<div class="form-group">
													<label class="control-label">Periodo</label>
													<input class="form-control" type="number" name="anio" id="anio" value="<?php echo date("Y"); ?>" min="2000" max="2200" required>
												</div>
                                                <div class="form-group">
													<label class="control-label">Alumno</label>
													<select class="form-control" name="alumno" required>
														<option value="">Seleccionar Alumno</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de alumnos
														$query = "SELECT a.id,a.nombres FROM matriculas m
														INNER JOIN alumnos a ON m.id_alumno = a.id
														WHERE m.id_grado='5'";
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
														<option value="">Seleccionar Curso</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de cursos
														$query = "SELECT id, nombre_curso FROM cursos WHERE id='3' ";
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
													<label class="control-label">Profesor</label>
													<select class="form-control" name="profesor" required>
														<option value="">Seleccionar Profesor</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de profesores
														$query = "SELECT id, nombres FROM profesores";
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
													<label class="control-label">Grado</label>
													<select class="form-control" name="grado" required>
														<option value="">Seleccionar Grado</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de grados
														$query = "SELECT id, nombre_grado FROM grados WHERE id='5'" ;
														$stmt = $conexion->prepare($query);
														$stmt->execute();
														$alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

														// Iterar sobre los resultados y construir las opciones del menú desplegable
														foreach ($alumnos as $alumno) {
														echo "<option value='" . $alumno['id'] . "'>" . $alumno['nombre_grado'] . "</option>";
														}
														?>
													</select>
												</div>

												<div class="form-group label-floating">
												<label class="control-label">Unidad 1</label>
												<input class="form-control" type="text" name="nota1" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Unidad 2</label>
												<input class="form-control" type="text" name="nota2" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Unidad 3</label>
												<input class="form-control" type="text" name="nota3" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Promedio</label>
												<input class="form-control" type="text" name="promedio" >
												</div>
																																												
												
												<p class="text-center">
													<button href="#!" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
												</p>
											</form>
										
									</div>
								
						        </div>


                        </div>


                        <!-- Matematica -->
                        <div class="tab-pane fade" id="ma">
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
								<div class="row">
									<div class="col-md-6">
										<button id="btn-ma" class="btn btn-success btn-raised btn-xs" onclick="mostrarFormulario('ma')">Agregar</button>
									</div>
									<div class="col-md-6 text-right">
										<a href="cuarto/pdfCMa.php?año_busqueda=<?php echo $año_busqueda; ?>" target="_blank" class="btn btn-success custom-button" style="background-color: #808080; color: #fff;">
											<i class="fas fa-file-pdf"></i> Exportar a PDF
										</a>
									</div>
								</div>
                                <table class="table table-hover text-center">

                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
											<th class="text-center">Periodo</th>
                                            <th class="text-center">Alumno</th>
                                            <th class="text-center">curso</th>
                                            <th class="text-center">Profesor</th>
                                            <th class="text-center">Grado</th>
                                            <th class="text-center">Unidad 1</th>
                                            <th class="text-center">Unidad 2</th>
                                            <th class="text-center">Unidad 3</th>
                                            <th class="text-center">Promedio</th>
                                            <th class="text-center">Actualizar</th>
                                            <th class="text-center">Eliminar</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($cma as $colegio)     {  ?>
                                        <tr>
                                        <td scope="row"><?php  echo $colegio['id']; ?></td>
										<td><?php  echo $colegio['año']; ?></td>
                                        <td><?php  echo $colegio['Alumno']; ?></td>
                                        <td><?php  echo $colegio['Curso']; ?></td>
                                        <td><?php  echo $colegio['Profesor']; ?></td>
                                        <td><?php  echo $colegio['Grado']; ?></td>
                                        <td><?php  echo $colegio['unidad1']; ?></td>
                                        <td><?php  echo $colegio['unidad2']; ?></td>
                                        <td><?php  echo $colegio['unidad3']; ?></td>
                                        <td><?php  echo $colegio['promedio']; ?></td>

                                        <td>
                                            <a href="edc
											.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-success btn-raised btn-xs">EDITAR</a>
                                        </td>
                                        <td>
                                            <a href="cuarto.php?id=<?php  echo $colegio['id']; ?>" class="btn btn-danger btn-raised btn-xs">ELIMINAR</a>
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
                                </ul>
                            </div>
                        </div>
                         <!-- Formulario flotante 12 -->
                         <div id="formularioFlotantema" class="formulario-flotante" style="display: none;">
                          <span class="cerrar" onclick="cerrarFormulario()"><i class="zmdi zmdi-close-circle"></i></span>
                            <h2>Formulario para agregar notas generales</h2>
                            <!-- Aquí puedes agregar los campos del formulario -->

								<div class="container-fluid">
									<div class="row">
										<form action="" method="POST" >
												<div class="form-group">
													<label class="control-label">Periodo</label>
													<input class="form-control" type="number" name="anio" id="anio" value="<?php echo date("Y"); ?>" min="2000" max="2200" required>
												</div>
                                                <div class="form-group">
													<label class="control-label">Alumno</label>
													<select class="form-control" name="alumno" required>
														<option value="">Seleccionar Alumno</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de alumnos
														$query = "SELECT a.id,a.nombres FROM matriculas m
														INNER JOIN alumnos a ON m.id_alumno = a.id
														WHERE m.id_grado='5'";
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
														<option value="">Seleccionar Curso</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de cursos
														$query = "SELECT id, nombre_curso FROM cursos WHERE id='1' ";
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
													<label class="control-label">Profesor</label>
													<select class="form-control" name="profesor" required>
														<option value="">Seleccionar Profesor</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de profesores
														$query = "SELECT id, nombres FROM profesores";
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
													<label class="control-label">Grado</label>
													<select class="form-control" name="grado" required>
														<option value="">Seleccionar Grado</option> <!-- Opción predeterminada vacía -->
														<?php
														// Realizar una consulta para obtener la lista de grados
														$query = "SELECT id, nombre_grado FROM grados WHERE id='5'" ;
														$stmt = $conexion->prepare($query);
														$stmt->execute();
														$alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

														// Iterar sobre los resultados y construir las opciones del menú desplegable
														foreach ($alumnos as $alumno) {
														echo "<option value='" . $alumno['id'] . "'>" . $alumno['nombre_grado'] . "</option>";
														}
														?>
													</select>
												</div>

												<div class="form-group label-floating">
												<label class="control-label">Unidad 1</label>
												<input class="form-control" type="text" name="nota1" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Unidad 2</label>
												<input class="form-control" type="text" name="nota2" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Unidad 3</label>
												<input class="form-control" type="text" name="nota3" >
												</div>
                                                <div class="form-group label-floating">
												<label class="control-label">Promedio</label>
												<input class="form-control" type="text" name="promedio" >
												</div>
																																												
												
												<p class="text-center">
													<button href="#!" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
												</p>
										</form>
										
									</div>
								
						        </div>


                        </div>



						

					  	
					</div>
				</div>
			</div>
		</div>



<?php include("../../template/footer.php");  ?>