<?php
// Conexión a la base de datos
include("../../conexion/conexion.php");

// Obtener la fecha de búsqueda del formulario o usar la fecha actual por defecto
$fecha_busqueda = isset($_GET['fecha_busqueda']) ? $_GET['fecha_busqueda'] : date("Y-m-d");
$dia = date("d", strtotime($fecha_busqueda));
$mes_numero = date("m", strtotime($fecha_busqueda));

$meses = [
    "01" => "Enero",
    "02" => "Febrero",
    "03" => "Marzo",
    "04" => "Abril",
    "05" => "Mayo",
    "06" => "Junio",
    "07" => "Julio",
    "08" => "Agosto",
    "09" => "Septiembre",
    "10" => "Octubre",
    "11" => "Noviembre",
    "12" => "Diciembre"
];

$mes_nombre = $meses[$mes_numero];

// Obtener la lista de fechas distintas en la tabla Asistencias
$sql = "SELECT a.id, a.nombres, a.apellidos, g.nombre_grado AS grado, asistencia.fecha, IFNULL(asistencia.estado, 0) AS estado
        FROM Alumnos a
        LEFT JOIN Asistencias asistencia ON a.id = asistencia.id_alumno
        LEFT JOIN Grados g ON asistencia.id_grado = g.id
        LEFT JOIN Matriculas m ON a.id = m.id_alumno AND m.id_grado = g.id
        WHERE g.id = '6' AND asistencia.fecha = :fecha_busqueda
        ORDER BY a.apellidos, a.nombres, asistencia.fecha;";

$stm = $conexion->prepare($sql);
$stm->bindParam(':fecha_busqueda', $fecha_busqueda);
$stm->execute();
$alumnos = $stm->fetchAll(PDO::FETCH_ASSOC);


// Obtener la lista de alumnos para la pestaña "Nuevo"
$sqlNuevo = "SELECT a.id, a.nombres, a.apellidos, g.nombre_grado AS grado
FROM matriculas m
INNER JOIN Alumnos a ON m.id_alumno = a.id
INNER JOIN Grados g ON m.id_grado = g.id
where m.id_grado ='6'";

$stmtNuevo = $conexion->prepare($sqlNuevo);
$stmtNuevo->execute();
$alumnosNuevo = $stmtNuevo->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include("../../template/header.php"); ?>

<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Asistencias: <small>5TO GRADO</small></h1>
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
                                <label for="fecha_busqueda">Buscar por Fecha:</label>
                                <input type="date" name="fecha_busqueda" value="<?php echo $fecha_busqueda; ?>" id="fecha_busqueda" required>
                                <input type="submit" value="Buscar">
                            </form>
                            <a href="quinto/pdfQ.php?fecha=<?php echo $fecha_busqueda; ?>" target="_blank" class="btn btn-success" style="border: 2px solid #808080; background-color: #808080; color: #fff;">
                                <i class="fas fa-file-pdf"></i> Exportar a PDF
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <?php
                        $sqlFechas = "SELECT DISTINCT fecha FROM Asistencias ORDER BY fecha ASC";
                        $stmtFechas = $conexion->prepare($sqlFechas);
                        $stmtFechas->execute();
                        $fechas = $stmtFechas->fetchAll(PDO::FETCH_COLUMN);
                        ?>

                        <!-- Mostrar la tabla con las asistencias de cada alumno en cada fecha -->
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Nombres</th>
                                    <th class="text-center">Apellidos</th>
                                    <th class="text-center">Grado</th>
                                    <th class="text-center"><?php echo "$dia de $mes_nombre"; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($alumnos as $alumno) : ?>
                                    <tr>
                                        <td scope="row"><?php echo $alumno['id']; ?></td>
                                        <td><?php echo $alumno['nombres']; ?></td>
                                        <td><?php echo $alumno['apellidos']; ?></td>
                                        <td><?php echo $alumno['grado']; ?></td>
                                        <td class="text-center"><?php echo $alumno['estado'] ? $alumno['estado'] : '&nbsp;'; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="tab-pane fade" id="new">
                    <div class="table-responsive">

                        <form action="gaq.php" method="POST">
                            <label for="fecha">Fecha:</label>
                            <input type="date" name="fecha" id="fecha" value="<?php echo date('Y-m-d'); ?>" required><br>
                            <button type="button" onclick="marcarDesmarcarTodos()">Marcar/Desmarcar Todos</button>
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Apellidos</th>
                                        <th class="text-center">Nombres</th>
                                        <th class="text-center">Grado</th>
                                        <th class="text-center">Asistencia</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($alumnosNuevo as $alumno) : ?>
                                        <tr>
                                            <td scope="row"><?php echo $alumno['id']; ?></td>
                                            <td><?php echo $alumno['apellidos']; ?></td>
                                            <td><?php echo $alumno['nombres']; ?></td>
                                            <td><?php echo $alumno['grado']; ?></td>
                                            <td>
                                                <input type="checkbox" name="asistencia_<?php echo $alumno['id']; ?>" value="asistio" <?php if (isset($alumno['estado']) && $alumno['estado'] == 'asistio') echo 'checked'; ?>>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                            <input type="submit" value="Guardar Asistencia">
                        </form>
                    </div>
                </div>

                <br>
            </div>
        </div>
    </div>
</div>
<script>
    function marcarDesmarcarTodos() {
        var checkboxes = document.querySelectorAll('#new input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = !checkbox.checked;
        });
    }
</script>

<?php include("../../template/footer.php"); ?>