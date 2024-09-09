<?php
include("../../conexion/conexion.php");
include("../../template/header.php");

// Obtener el año de búsqueda del formulario o usar el año actual por defecto
$año_busqueda = isset($_GET['año_busqueda']) ? $_GET['año_busqueda'] : date("Y");

?>
<?php
// Verificar si se ha recibido un ID válido para eliminar
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Obtener el ID del horario a eliminar
    $id = $_GET['id'];

    // Realizar la eliminación del horario en la base de datos
    $sql = "DELETE FROM horario WHERE id = $id";
    if ($conexion->query($sql) === TRUE) {
        echo "El horario ha sido eliminado exitosamente";
    } else {
        $error_message = "Error al intentar eliminar el horario: ";
        echo "<script>document.getElementById('error-message').innerText = '$error_message';</script>";
    }
}
?>


<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid #dddddd;
        text-align: center;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2; /* Color de fondo diferente para la cabecera */
    }

    .edit-btn, .delete-btn {
        padding: 6px 12px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        margin: 2px;
        cursor: pointer;
    }

    .edit-btn {
        background-color: #4CAF50; /* Color verde para el botón de editar */
        color: white;
    }

    .delete-btn {
        background-color: #f44336; /* Color rojo para el botón de eliminar */
        color: white;
    }
    
.tab-pane form {
    margin-top: 20px;
}

.tab-pane .form-group {
    margin-bottom: 15px;
}

.tab-pane .form-control {
    border-radius: 0;
    box-shadow: none;
    border-color: #ddd;
}

.tab-pane .btn {
    border-radius: 0;
    box-shadow: none;
}

.tab-pane .btn:hover {
    background-color: #2196F3;
    border-color: #2196F3;
}

.tab-pane .zmdi {
    margin-right: 5px;
}
</style>


<!-- Content page -->
<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> HORARIOS: <small>QUINTO</small></h1>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#list" data-toggle="tab">Lista</a></li>
					  	<li><a href="#new" data-toggle="tab">Nuevo</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						
					  	<div class="tab-pane fade active in" id="list">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="" method="GET">
                                        <label for="fecha_busqueda">Buscar por Año:</label>
                                        <input type="number" name="año_busqueda" id="año_busqueda" value="<?php echo $año_busqueda; ?>" min="2000" max="2200" required>
                                        <input type="submit" value="Buscar">
                                    </form>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="pdfQuinto.php?año_busqueda=<?php echo $año_busqueda; ?>" target="_blank" class="btn btn-success" style="border: 2px solid #808080; background-color: #808080; color: #fff;">
                                        <i class="fas fa-file-pdf"></i> Exportar a PDF
                                    </a>
                                </div>
                            </div>
							<div class="table-responsive">
								<table class="table table-hover text-center">
                                
                                    <tr>
                                        <th>Hora</th>
                                        <th>Lunes</th>
                                        <th>Martes</th>
                                        <th>Miércoles</th>
                                        <th>Jueves</th>
                                        <th>Viernes</th>
                                        <th>Acciones</th>
                                    </tr>
                                    <?php
                                    // Consultar la base de datos para obtener el horario
                                    $sql = "SELECT  id,hora_inicio, hora_fin, lunes, martes, miercoles, jueves, viernes
                                    FROM horario
                                    WHERE id_grado='6' AND anio = $año_busqueda
                                    GROUP BY hora_inicio, hora_fin ";
                                    $result = $conexion->query($sql);

                                    if ($result->rowCount() > 0) {
                                        // Mostrar los datos en una tabla HTML
                                        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<tr>";
                                            echo "<td>" . $row["hora_inicio"] . " - " . $row["hora_fin"] . "</td>";
                                            echo "<td>" . $row["lunes"] . "</td>";
                                            echo "<td>" . $row["martes"] . "</td>";
                                            echo "<td>" . $row["miercoles"] . "</td>";
                                            echo "<td>" . $row["jueves"] . "</td>";
                                            echo "<td>" . $row["viernes"] . "</td>";
                                            echo "<td>
                                                        <a href='ehq.php?id=" . $row["id"] . "' class='edit-btn'>Editar</a> 
                                                        <a href='hquinto.php?id=" . $row["id"] . "' class='delete-btn'>Eliminar</a>
                                                 </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>No se encontraron resultados</td></tr>";
                                    }
                                    ?>

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
                        <div class="tab-pane fade" id="new">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12 col-md-10 col-md-offset-1">
                                        <form action="ghq.php" method="POST">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Grados</label>
                                                <select class="form-control" name="grado" required>
                                                    <option value="">Seleccionar Grado</option>
                                                    <?php
                                                    // Realizar una consulta para obtener la lista de cursos
                                                    $query = "SELECT id, nombre_grado FROM grados WHERE id='6'";
                                                    $stmt = $conexion->prepare($query);
                                                    $stmt->execute();
                                                    $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                    // Iterar sobre los resultados y construir las opciones del menú desplegable
                                                    foreach ($cursos as $curso) {
                                                        echo "<option value='" . $curso['id'] . "'>" . $curso['nombre_grado'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Hora de inicio</label>
                                                <input class="form-control" type="time" name="hora_inicio" required>
                                            </div>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Hora de fin</label>
                                                <input class="form-control" type="time" name="hora_fin" required>
                                            </div>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Lunes</label>
                                                <select class="form-control" name="lunes" required>
                                                    <option value="">Seleccionar Curso</option>
                                                    <?php
                                                    // Realizar una consulta para obtener la lista de cursos
                                                    $query = "SELECT id, nombre_curso FROM cursos";
                                                    $stmt = $conexion->prepare($query);
                                                    $stmt->execute();
                                                    $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                    // Iterar sobre los resultados y construir las opciones del menú desplegable
                                                    foreach ($cursos as $curso) {
                                                        echo "<option value='" . $curso['nombre_curso'] . "'>" . $curso['nombre_curso'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Martes</label>
                                                <select class="form-control" name="martes" required>
                                                    <option value="">Seleccionar Curso</option>
                                                    <?php
                                                    // Realizar una consulta para obtener la lista de cursos
                                                    $query = "SELECT id, nombre_curso FROM cursos";
                                                    $stmt = $conexion->prepare($query);
                                                    $stmt->execute();
                                                    $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                    // Iterar sobre los resultados y construir las opciones del menú desplegable
                                                    foreach ($cursos as $curso) {
                                                        echo "<option value='" . $curso['nombre_curso'] . "'>" . $curso['nombre_curso'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Miércoles</label>
                                                <select class="form-control" name="miercoles" required>
                                                    <option value="">Seleccionar Curso</option>
                                                    <?php
                                                    // Realizar una consulta para obtener la lista de cursos
                                                    $query = "SELECT id, nombre_curso FROM cursos";
                                                    $stmt = $conexion->prepare($query);
                                                    $stmt->execute();
                                                    $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                    // Iterar sobre los resultados y construir las opciones del menú desplegable
                                                    foreach ($cursos as $curso) {
                                                        echo "<option value='" . $curso['nombre_curso'] . "'>" . $curso['nombre_curso'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                                                <div class="form-group label-floating">
                                                <label class="control-label">Jueves</label>
                                                <select class="form-control" name="jueves" required>
                                                    <option value="">Seleccionar Curso</option>
                                                    <?php
                                                    // Realizar una consulta para obtener la lista de cursos
                                                    $query = "SELECT id, nombre_curso FROM cursos";
                                                    $stmt = $conexion->prepare($query);
                                                    $stmt->execute();
                                                    $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                    // Iterar sobre los resultados y construir las opciones del menú desplegable
                                                    foreach ($cursos as $curso) {
                                                        echo "<option value='" . $curso['nombre_curso'] . "'>" . $curso['nombre_curso'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Viernes</label>
                                                <select class="form-control" name="viernes" required>
                                                    <option value="">Seleccionar Curso</option>
                                                    <?php
                                                    // Realizar una consulta para obtener la lista de cursos
                                                    $query = "SELECT id, nombre_curso FROM cursos";
                                                    $stmt = $conexion->prepare($query);
                                                    $stmt->execute();
                                                    $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                    // Iterar sobre los resultados y construir las opciones del menú desplegable
                                                    foreach ($cursos as $curso) {
                                                        echo "<option value='" . $curso['nombre_curso'] . "'>" . $curso['nombre_curso'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <p class="text-center">
                                                <button type="submit" class="btn btn-info btn-raised btn-sm">
                                                    <i class="zmdi zmdi-floppy"></i> Guardar
                                                </button>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
					</div>
				</div>
			</div>
		</div>
<?php include("../../template/footer.php"); ?>
