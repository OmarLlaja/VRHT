<?php
include("../../conexion/conexion.php");
// Obtener el ID del registro a editar desde la URL
$id = $_GET['id'];

// Consultar la base de datos para obtener los datos del registro a editar
$sql = "SELECT * FROM horario WHERE id = $id";
$result = $conexion->query($sql);
$registro = $result->fetch(PDO::FETCH_ASSOC);

// Verificar si se envió el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fin = $_POST['hora_fin'];
    $lunes = $_POST['lunes'];
    $martes = $_POST['martes'];
    $miercoles = $_POST['miercoles'];
    $jueves = $_POST['jueves'];
    $viernes = $_POST['viernes'];

    // Actualizar el registro en la base de datos
    $sql = "UPDATE horario SET hora_inicio = '$hora_inicio', hora_fin = '$hora_fin', lunes = '$lunes', martes = '$martes', miercoles = '$miercoles', jueves = '$jueves', viernes = '$viernes' WHERE id = $id";
    $conexion->query($sql);

    // Redireccionar a la página de lista
    header("Location: hprimero.php");
}
ob_start(); // Iniciar el buffer de salida
include("../../template/header.php"); // Incluir el archivo header.php
$header = ob_get_clean(); // Obtener el contenido del buffer de salida y limpiarlo

// Mostrar el contenido de la variable $header después de la redirección
echo $header;
?>

<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> HORARIOS: <small>EDITAR</small></h1>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="edit">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12 col-md-10 col-md-offset-1">
                                    <form action="ehp.php?id=<?php echo $registro['id']; ?>" method="POST">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Hora de inicio</label>
                                            <input class="form-control" type="time" name="hora_inicio" value="<?php echo $registro['hora_inicio']; ?>" required>
                                        </div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Hora de fin</label>
                                            <input class="form-control" type="time" name="hora_fin" value="<?php echo $registro['hora_fin']; ?>" required>
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
                                                    if ($curso['nombre_curso'] == $registro['lunes']) {
                                                        echo "<option value='" . $curso['nombre_curso'] . "' selected>" . $curso['nombre_curso'] . "</option>";
                                                    } else {
                                                        echo "<option value='" . $curso['nombre_curso'] . "'>" . $curso['nombre_curso'] . "</option>";
                                                    }
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
                                                    if ($curso['nombre_curso'] == $registro['martes']) {
                                                        echo "<option value='" . $curso['nombre_curso'] . "' selected>" . $curso['nombre_curso'] . "</option>";
                                                    } else {
                                                        echo "<option value='" . $curso['nombre_curso'] . "'>" . $curso['nombre_curso'] . "</option>";
                                                    }
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
                                                    if ($curso['nombre_curso'] == $registro['miercoles']) {
                                                        echo "<option value='" . $curso['nombre_curso'] . "' selected>" . $curso['nombre_curso'] . "</option>";
                                                    } else {
                                                        echo "<option value='" . $curso['nombre_curso'] . "'>" . $curso['nombre_curso'] . "</option>";
                                                    }
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
                                                    if ($curso['nombre_curso'] == $registro['jueves']) {
                                                        echo "<option value='" . $curso['nombre_curso'] . "' selected>" . $curso['nombre_curso'] . "</option>";
                                                    } else {
                                                        echo "<option value='" . $curso['nombre_curso'] . "'>" . $curso['nombre_curso'] . "</option>";
                                                    }
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
                                                    if ($curso['nombre_curso'] == $registro['viernes']) {
                                                        echo "<option value='" . $curso['nombre_curso'] . "' selected>" . $curso['nombre_curso'] . "</option>";
                                                    } else {
                                                        echo "<option value='" . $curso['nombre_curso'] . "'>" . $curso['nombre_curso'] . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <p class="text-center">
                                        <a href="hprimero.php" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-close"></i> CERRAR</a>
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
</div>

<?php include("../../template/footer.php"); ?>