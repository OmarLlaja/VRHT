<?php
include("../../conexion/conexion.php");

if (isset($_GET['id'])) {

    


    $txtid = (isset($_GET['id']) ? $_GET['id'] : "");
    $stm = $conexion->prepare("SELECT * FROM representantes WHERE id=:txtid");
    $stm->bindParam(":txtid", $txtid);
    $stm->execute();
    $registro = $stm->fetch(PDO::FETCH_ASSOC);
    $nombres = $registro['nombres'];
    $apellidos = $registro['apellidos'];
    $dni = $registro['dni'];
    $direccion = $registro['direccion'];
    $telefono = $registro['telefono'];
    $correo = $registro['correo_electronico'];
    $apoderado = $registro['id_alumno'];

    if ($_POST) {

         
        
        $nombres = (isset($_POST['nombres']) ? $_POST['nombres'] : "");
        $apellidos = (isset($_POST['apellidos']) ? $_POST['apellidos'] : "");
        $dni = (isset($_POST['dni']) ? $_POST['dni'] : "");
        $direccion = (isset($_POST['direccion']) ? $_POST['direccion'] : "");
        $telefono = (isset($_POST['telefono']) ? $_POST['telefono'] : "");
        $correo = (isset($_POST['correo']) ? $_POST['correo'] : "");
        $apoderado = (isset($_POST['apoderado']) ? $_POST['apoderado'] : "");

        $stm = $conexion->prepare("UPDATE representantes SET nombres=:nombres, apellidos=:apellidos, dni=:dni, 
        direccion=:direccion, telefono=:telefono, correo_electronico=:correo, id_alumno=:apoderado  WHERE id=:txtid");

        $stm->bindParam(":nombres", $nombres);
        $stm->bindParam(":apellidos", $apellidos);
        $stm->bindParam(":dni", $dni);
        $stm->bindParam(":direccion", $direccion);
        $stm->bindParam(":telefono", $telefono);
        $stm->bindParam(":correo", $correo);
        $stm->bindParam(":apoderado", $apoderado);
        $stm->bindParam(":txtid", $txtid);

        $stm->execute();

        header("location:representative.php");
    }
}
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Editar</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"   />
            
        <link rel="stylesheet" type="text/css" href="../../css/material-design-iconic-font.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/main.css">      
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
            body {
                max-height: 100vh;
                overflow-y: auto;
                padding: 20px;
            }
        </style>
    </head>

    <body>
    
        <div class="tab-pane fade active in" id="new">
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-12 col-md-10 col-md-offset-1">
									    <form action="" method="POST" class="formulario">
                                        
                            <div class="form-group label-floating">
                                                      
                              <label class="control-label">Nombres</label>
                              <input class="form-control" type="text" name="nombres" placeholder="Ingrese nombre del apoderado" value="<?php echo $nombres; ?>">
                            </div>
                            <div class="form-group label-floating">
                              <label class="control-label">Apellidos</label>
                              <input class="form-control" type="text" name="apellidos"placeholder="Ingrese apellidos del apoderado" value="<?php echo $apellidos; ?>">
                            </div>
                            <div class="form-group label-floating">
                              <label class="control-label">Dni</label>
                              <input class="form-control" type="text" name="dni" placeholder="Ingrese DNI del apoderado" value="<?php echo $dni; ?>">
                            </div>
                            
                            <div class="form-group label-floating">
                              <label class="control-label">Direccion</label>
                              <input class="form-control" type="text" name="direccion" placeholder="Ingrese direccion del apoderado" value="<?php echo $direccion; ?>">
                            </div>
                            <div class="form-group label-floating">
                              <label class="control-label">Telefono</label>
                              <input class="form-control" type="text" name="telefono" placeholder="Ingrese telefono del apoderado" value="<?php echo $telefono; ?>">
                            </div>
                            <div class="form-group">
                              <label class="control-label">Email</label>
                              <input class="form-control" type="email" name="correo" placeholder="Ingrese Email del apoderado" value="<?php echo $correo; ?>">
                            </div>											
                            <!-- Dentro del formulario de representante -->
                            <div class="form-group">
                              <label class="control-label">Representado</label>
                              <select class="form-control" name="apoderado">
                                <option value="">Seleccionar Representado</option> <!-- Opción predeterminada vacía -->
                                <?php
                                // Realizar una consulta para obtener la lista de alumnos
                                $query = "SELECT id, nombres FROM Alumnos";
                                $stmt = $conexion->prepare($query);
                                $stmt->execute();
                                $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                // Iterar sobre los resultados y construir las opciones del menú desplegable
                                foreach ($alumnos as $alumno) {
                                  $selected = ($alumno['id'] == $apoderado) ? "selected" : ""; // Verificar si el alumno es el representado
                                  echo "<option value='" . $alumno['id'] . "' $selected>" . $alumno['nombres'] . "</option>"; // Establecer el atributo "selected" si es el representado
                                }
                                ?>
                              </select>
                            </div>



                            <div class="form-group">
                              <td><a href="representative.php" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-close"></i> CERRAR</a></td>
                              <button type="submit" class="btn btn-success btn-raised btn-xs zmdi zmdi-refresh"> REFRESCAR</button>
                            </div>
									    </form>
                  </div>
								</div>
							</div>
                            
		</div>


 </body>
</html>