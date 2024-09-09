<?php
// Conexión a la base de datos
include("../../../conexion/conexion.php");

// Obtener la lista de fechas distintas en la tabla Asistencias
if (isset($_GET['fecha_busqueda'])) {
    $fecha_busqueda = $_GET['fecha_busqueda'];

    // Filtrar la lista de fechas de asistencia para mostrar solo la fecha de búsqueda
    $sqlFechas = "SELECT DISTINCT fecha FROM Asistencias WHERE fecha = :fecha_busqueda ORDER BY fecha ASC";
    $stmtFechas = $conexion->prepare($sqlFechas);
    $stmtFechas->bindParam(':fecha_busqueda', $fecha_busqueda, PDO::PARAM_STR);
    $stmtFechas->execute();
    $fechas = $stmtFechas->fetchAll(PDO::FETCH_COLUMN);

    // Filtrar la lista de alumnos y sus asistencias para mostrar solo la fecha de búsqueda
    $sql = "SELECT a.id, a.nombres, a.apellidos, g.nombre_grado AS grado, asistencia.fecha, IFNULL(asistencia.estado, 0) AS estado
            FROM Alumnos a
            LEFT JOIN Asistencias asistencia ON a.id = asistencia.id_alumno
            LEFT JOIN Grados g ON asistencia.id_grado = g.id
            LEFT JOIN Matriculas m ON a.id = m.id_alumno AND m.id_grado = g.id
            WHERE g.id = '5' AND asistencia.fecha = :fecha_busqueda
            ORDER BY a.apellidos, a.nombres, asistencia.fecha";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':fecha_busqueda', $fecha_busqueda, PDO::PARAM_STR);
    $stmt->execute();
    $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Si no se ha enviado una solicitud de búsqueda, obtén todas las fechas y asistencias
    $sqlFechas = "SELECT DISTINCT fecha FROM Asistencias ORDER BY fecha ASC";
    $stmtFechas = $conexion->prepare($sqlFechas);
    $stmtFechas->execute();
    $fechas = $stmtFechas->fetchAll(PDO::FETCH_COLUMN);

    $sql = "SELECT a.id, a.nombres, a.apellidos, g.nombre_grado AS grado, asistencia.fecha, IFNULL(asistencia.estado, 0) AS estado
            FROM Alumnos a
            LEFT JOIN Asistencias asistencia ON a.id = asistencia.id_alumno
            LEFT JOIN Grados g ON asistencia.id_grado = g.id
            LEFT JOIN Matriculas m ON a.id = m.id_alumno AND m.id_grado = g.id
            WHERE g.id = '5'
            ORDER BY a.apellidos, a.nombres, asistencia.fecha";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<?php include("../../template/header.php"); ?>

<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-search zmdi-hc-fw"></i> RESULTADOS DE LA BÚSQUEDA: <small>4TO GRADO</small></h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">        
        <?php foreach ($fechas as $fecha) { ?>
            <div class="text-right">
                        <a href="pdfC.php?fecha=<?php echo $fecha; ?>" target="_blank" class="btn btn-success" style="border: 2px solid #808080; background-color: #808080; color: #fff;">
                            <i class="fas fa-file-pdf"></i> Exportar a PDF
                        </a>
                    </div>
        <?php } ?>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="list">
                    
                    <div class="table-responsive">
                        
                        <!-- Mostrar la tabla con las asistencias de cada alumno en cada fecha -->
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Nombres</th>
                                    <th class="text-center">Apellidos</th>
                                    <th class="text-center">Grado</th>
                                    <?php foreach ($fechas as $fecha) { ?>
                                        <th class="text-center" colspan="1"><?php echo $fecha; ?></th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($alumnos as $alumno) { ?>
                                    <tr>
                                        <td scope="row"><?php echo $alumno['id']; ?></td>
                                        <td><?php echo $alumno['nombres']; ?></td>
                                        <td><?php echo $alumno['apellidos']; ?></td>
                                        <td><?php echo $alumno['grado']; ?></td>
                                        <?php foreach ($fechas as $fecha) { ?>
                                            <?php
                                            // Busca la asistencia del alumno en la fecha actual
                                            $asistencia = null;
                                            foreach ($alumnos as $att) {
                                                if ($att['fecha'] == $fecha && $att['id'] == $alumno['id']) {
                                                    $asistencia = $att['estado'];
                                                    break;
                                                }
                                            }
                                            ?>
                                            <td class="text-center">
                                                <?php
                                                if ($asistencia) {
                                                    echo $asistencia;
                                                } else {
                                                    echo '&nbsp;';
                                                }
                                                ?>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <br>
            </div>
        </div>
    </div>
</div>

<?php include("../../template/footer.php"); ?>
