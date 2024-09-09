<?php
include("../../conexion/conexion.php");

$stm = $conexion->prepare("SELECT * FROM usuarios");
$stm->execute(); // Ejecutar la consulta preparada
$colegionacional = $stm->fetchAll(PDO::FETCH_ASSOC); // Obtener los resultados

// METODO PARA ELIMINAR
if (isset($_GET['id'])) {
    $txtid = (isset($_GET['id']) ? $_GET['id'] : "");
    $stm = $conexion->prepare("DELETE FROM usuarios WHERE ID=:txtid");
    $stm->bindParam(":txtid", $txtid);
    $stm->execute();
    header("location:usuarios.php");
}

?>
<?php
include("../../conexion/conexion.php");

$stm = $conexion->prepare("SELECT * FROM usuarios");
$stm->execute(); // Ejecutar la consulta preparada
$colegionacional = $stm->fetchAll(PDO::FETCH_ASSOC); // Obtener los resultados

// METODO PARA ELIMINAR
if (isset($_GET['id'])) {
    $txtid = (isset($_GET['id']) ? $_GET['id'] : "");
    $stm = $conexion->prepare("DELETE FROM usuarios WHERE ID=:txtid");
    $stm->bindParam(":txtid", $txtid);
    $stm->execute();
    header("location:usuarios.php");
}

?>

<?php

include("../../conexion/conexion.php");

include "../../encriptar.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    if (empty($_POST['usuario']) || empty($_POST['contrasenia']) || empty($_POST['nivel'])) {
        echo "Todos los campos son requeridos";
        exit;
    }

    $usuario = trim($_POST['usuario']);
    $contrasenia = trim($_POST['contrasenia']);
    $nivel = (int)$_POST['nivel'];

    $contrasenia_encriptada = $encriptar($contrasenia);

    // Process the image
    if ($_FILES['foto']['error'] !== UPLOAD_ERR_OK) {
        echo "Error al subir la foto de perfil.";
        exit;
    }

    $foto_size = $_FILES['foto']['size'];
    $max_upload_size = 1000000; // Set the maximum allowed file size in bytes

    if ($foto_size > $max_upload_size) {
        echo "La foto de perfil no debe exceder el tamaño de $max_upload_size bytes.";
        exit;
    }

    // Read and store the image in a variable
    $foto_temp = $_FILES['foto']['tmp_name'];
    $foto_content = file_get_contents($foto_temp);

    // Prepare and execute the INSERT query
    $query = "INSERT INTO usuarios (foto, nombre_usuario, contrasenia, tipo_usuario) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($query);
    $stmt->execute([$foto_content, $usuario, $contrasenia_encriptada, $nivel]);

    if ($stmt->rowCount() > 0) {
        header("location:usuarios.php");
        exit;
    } else {
        echo "Error al agregar el usuario";
    }
}
?>


<?php include("../../template/header.php"); ?>

<!-- Content page -->
<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i>ADMINISTRACION <small>Usuarios</small></h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                <li><a href="#new" data-toggle="tab">Nuevo</a></li>
                <li class="active"><a href="#list" data-toggle="tab">Lista</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade" id="new">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-md-10 col-md-offset-1">
                                <form id="formularioUsuario" action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" class="form-control" name="txtid" value="">
                                    <div>
                                        <label for="foto">Foto de Perfil:</label>
                                        <input type="file" id="foto" name="foto" accept="image/*" required>
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Usuario (DNI)</label>
                                        <input class="form-control" name="usuario" type="number" value="">
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Contraseña</label>
                                        <input class="form-control" name="contrasenia" type="text" value="">
                                    </div>
                                    <div class="form-group label-floating">
                                        <label for="nivel" class="control-label">NIVEL ACCESO</label>
                                        <select class="form-control" type="nivel" id="nivel" name="nivel" required>
                                            <option value="">Seleccionar</option> <!-- Opción predeterminada vacía -->
                                            <?php
                                            // Realizar una consulta para obtener la lista de alumnos
                                            $query = "SELECT id, nivel FROM nivelAcceso";
                                            $stmt = $conexion->prepare($query);
                                            $stmt->execute();
                                            $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            // Iterar sobre los resultados y construir las opciones del menú desplegable
                                            foreach ($alumnos as $alumno) {
                                                echo "<option value='" . $alumno['id'] . "'>" . $alumno['nivel'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                        <p class="help-block">Elige tu nivel de acceso</p>
                                    </div>
                                    <p class="text-center">
                                        <a href="usuarios.php" class="btn btn-success btn-raised btn-xs">CANCELAR</a>
                                        <button type="submit" class="btn btn-danger btn-raised btn-xs">Guardar</button>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    document.getElementById('formularioUsuario').addEventListener('submit', function(event) {
                        var archivo = document.querySelector('input[type="file"]').files[0];
                        var maxTamano = 1000000; // El máximo tamaño permitido en bytes
                        
                        if (archivo && archivo.size > maxTamano) {
                            event.preventDefault(); // Detiene el envío del formulario
                            alert('La foto de perfil no debe exceder el tamaño de ' + maxTamano + ' bytes.');
                        }
                    });
                </script>
                <!-- Lista -->
                <div class="tab-pane fade active in" id="list">
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Foto</th>
                                    <th class="text-center">Usuario</th>
                                    <th class="text-center">Contraseña</th>
                                    <th class="text-center">Nivel Acceso</th>
                                    <th class="text-center">Editar</th>
                                    <th class="text-center">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($colegionacional as $colegio) { ?>
                                    <tr>
                                        <td scope="row"><?php echo $colegio['ID']; ?></td>
										<td><img src="data:image/jpg;base64,<?php echo base64_encode($colegio['foto']); ?>" width="50" height="50"></td>
                                        <td><?php echo $colegio['nombre_usuario']; ?></td>
                                        <td><?php echo $desencriptar($colegio['contrasenia']); ?></td>
                                        <td><?php echo $colegio['tipo_usuario']; ?></td>
                                        <td>
                                            <a href="editar.php?id=<?php echo $colegio['ID']; ?>" class="btn btn-success btn-raised btn-xs">EDITAR</a>
                                        </td>
                                        <td>
                                            <a href="usuarios.php?id=<?php echo $colegio['ID']; ?>" class="btn btn-danger btn-raised btn-xs">ELIMINAR</a>
                                        </td>
                                    </tr>
                                <?php } ?>
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
            </div>
        </div>
    </div>
</div>
<?php include("../../template/footer.php"); ?>
