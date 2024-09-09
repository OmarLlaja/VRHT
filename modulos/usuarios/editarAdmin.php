<?php
include("../../conexion/conexion.php");

if (isset($_GET['id'])) {

    


    $txtid = (isset($_GET['id']) ? $_GET['id'] : "");
    $stm = $conexion->prepare("SELECT * FROM administradores WHERE id=:txtid");
    $stm->bindParam(":txtid", $txtid);
    $stm->execute();
    $registro = $stm->fetch(PDO::FETCH_ASSOC);
    $nombres = $registro['nombres'];
    $apellidos = $registro['apellidos'];
    $dni = $registro['dni'];
    $nacimiento = $registro['fecha_nacimiento'];
    $direccion = $registro['direccion'];
    $telefono = $registro['telefono'];
    $correo = $registro['correo_electronico'];

    if ($_POST) {
              
        $nombres = (isset($_POST['nombres']) ? $_POST['nombres'] : "");
        $apellidos = (isset($_POST['apellidos']) ? $_POST['apellidos'] : "");
        $dni = (isset($_POST['dni']) ? $_POST['dni'] : "");
        $nacimiento = (isset($_POST['nacimiento']) ? $_POST['nacimiento'] : "");
        $direccion = (isset($_POST['direccion']) ? $_POST['direccion'] : "");
        $telefono = (isset($_POST['telefono']) ? $_POST['telefono'] : "");
        $correo = (isset($_POST['correo']) ? $_POST['correo'] : "");

        $stm = $conexion->prepare("UPDATE administradores SET nombres=:nombres, apellidos=:apellidos, dni=:dni, fecha_nacimiento=:nacimiento, 
        direccion=:direccion, telefono=:telefono, correo_electronico=:correo  WHERE id=:txtid");

        $stm->bindParam(":nombres", $nombres);
        $stm->bindParam(":apellidos", $apellidos);
        $stm->bindParam(":dni", $dni);
        $stm->bindParam(":nacimiento", $nacimiento);
        $stm->bindParam(":direccion", $direccion);
        $stm->bindParam(":telefono", $telefono);
        $stm->bindParam(":correo", $correo);
        $stm->bindParam(":txtid", $txtid);

        $stm->execute();

        header("location:administradores.php");
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
                                                <input class="form-control" type="text" name="nombres" placeholder="Ingrese nombre del administrador" value="<?php echo $nombres; ?>">
                                                </div>
                                                <div class="form-group label-floating">
                                                <label class="control-label">Apellidos</label>
                                                <input class="form-control" type="text" name="apellidos"placeholder="Ingrese apellidos del administrador" value="<?php echo $apellidos; ?>">
                                                </div>
                                                <div class="form-group label-floating">
                                                <label class="control-label">Dni</label>
                                                <input class="form-control" type="text" name="dni" placeholder="Ingrese DNI del administrador" value="<?php echo $dni; ?>">
                                                </div>
                                                <div class="form-group label-floating">
                                                <label class="control-label">Fecha Nacimiento</label>
                                                <input class="form-control" type="date" name="nacimiento" placeholder="Ingrese Fecha de nacimiento del administrado" value="<?php echo $nacimiento; ?>">
                                                </div>
                                                <div class="form-group label-floating">
                                                <label class="control-label">Direccion</label>
                                                <input class="form-control" type="text" name="direccion" placeholder="Ingrese direccion del administrado" value="<?php echo $direccion; ?>">
                                                </div>
                                                <div class="form-group label-floating">
                                                <label class="control-label">Telefono</label>
                                                <input class="form-control" type="text" name="telefono" placeholder="Ingrese telefono del administrador" value="<?php echo $telefono; ?>">
                                                </div>
                                                <div class="form-group">
                                                <label class="control-label">Email</label>
                                                <input class="form-control" type="email" name="correo" placeholder="Ingrese Email del administrador" value="<?php echo $correo; ?>">
                                                </div>											
                                                
                                                <td><a href="administradores.php" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-close"></i> CERRAR</a></td>
                                                                        
                                                <button type="submit" class="btn btn-success btn-raised btn-xs zmdi zmdi-refresh"> REFRESCAR</button>
                                                                        
                                            </form>
                                        </div>
                                    </div>
                                </div>
        </div>
    </body>
</html>