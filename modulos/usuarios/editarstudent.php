<?php
include("../../conexion/conexion.php");

if (isset($_GET['id'])) {

    


    $txtid = (isset($_GET['id']) ? $_GET['id'] : "");
    $stm = $conexion->prepare("SELECT * FROM alumnos WHERE id=:txtid");
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
    $procedencia = $registro['colegio_procedencia'];

    if ($_POST) {

         // Validar campos vacios
     
         
	if(empty($_POST['nombres'])) {
		echo "El/Los nombres de alumno son requeridos";	
		return;
	}
	
	if(empty($_POST['apellidos'])) {
		echo "Los apellidos son requeridos"; 
		return;
	}
	if(empty($_POST['dni'])) {
		echo "El DNI de alumno es requerido";	
		return;
	}
	
	if(empty($_POST['nacimiento'])) {
		echo "La fecha de nacimiento es requerida"; 
		return;
	}
	if(empty($_POST['direccion'])) {
		echo "La direccion de alumno es requerido";	
		return;
	}
	
	if(empty($_POST['telefono'])) {
		echo "El telefono de alumno es requerida"; 
		return;
	}
	if(empty($_POST['correo'])) {
		echo "El correo de alumno es requerido";	
		return;
	}
	if(empty($_POST['procedencia'])) {
		echo "La procedencia de alumno es requerido";	
		return;
	}

        
        $nombres = (isset($_POST['nombres']) ? $_POST['nombres'] : "");
        $apellidos = (isset($_POST['apellidos']) ? $_POST['apellidos'] : "");
        $dni = (isset($_POST['dni']) ? $_POST['dni'] : "");
        $nacimiento = (isset($_POST['nacimiento']) ? $_POST['nacimiento'] : "");
        $direccion = (isset($_POST['direccion']) ? $_POST['direccion'] : "");
        $telefono = (isset($_POST['telefono']) ? $_POST['telefono'] : "");
        $correo = (isset($_POST['correo']) ? $_POST['correo'] : "");
        $procedencia = (isset($_POST['procedencia']) ? $_POST['procedencia'] : "");

        $stm = $conexion->prepare("UPDATE alumnos SET nombres=:nombres, apellidos=:apellidos, dni=:dni, fecha_nacimiento=:nacimiento, 
        direccion=:direccion, telefono=:telefono, correo_electronico=:correo, colegio_procedencia=:procedencia  WHERE id=:txtid");

        $stm->bindParam(":nombres", $nombres);
        $stm->bindParam(":apellidos", $apellidos);
        $stm->bindParam(":dni", $dni);
        $stm->bindParam(":nacimiento", $nacimiento);
        $stm->bindParam(":direccion", $direccion);
        $stm->bindParam(":telefono", $telefono);
        $stm->bindParam(":correo", $correo);
        $stm->bindParam(":procedencia", $procedencia);
        $stm->bindParam(":txtid", $txtid);

        $stm->execute();

        header("location:student.php");
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
											  <input class="form-control" type="text" name="nombres" placeholder="Ingrese nombre del profesor" value="<?php echo $nombres; ?>">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Apellidos</label>
											  <input class="form-control" type="text" name="apellidos"placeholder="Ingrese apellidos del profesor" value="<?php echo $apellidos; ?>">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Dni</label>
											  <input class="form-control" type="text" name="dni" placeholder="Ingrese DNI del profesor" value="<?php echo $dni; ?>">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Fecha Nacimiento</label>
											  <input class="form-control" type="date" name="nacimiento" placeholder="Ingrese Fecha de nacimiento del profesor" value="<?php echo $nacimiento; ?>">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Direccion</label>
											  <input class="form-control" type="text" name="direccion" placeholder="Ingrese direccion del profesor" value="<?php echo $direccion; ?>">
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Telefono</label>
											  <input class="form-control" type="text" name="telefono" placeholder="Ingrese telefono del profesor" value="<?php echo $telefono; ?>">
											</div>
											<div class="form-group">
											  <label class="control-label">Email</label>
											  <input class="form-control" type="email" name="correo" placeholder="Ingrese Email del profesor" value="<?php echo $correo; ?>">
											</div>											
											<div class="form-group">
											  <label class="control-label"> Colegio Procedencia</label>
											  <input class="form-control" type="text" name="procedencia" placeholder="Ingrese colegio de procedencia del alumno" value="<?php echo $procedencia; ?>">
											</div>
                                            <div class="form-group">
                                                <td><a href="student.php" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-close"></i> CERRAR</a></td>
                                                <button type="submit" class="btn btn-success btn-raised btn-xs zmdi zmdi-refresh"> REFRESCAR</button>
                                            </div>
									    </form>
                                    </div>
								</div>
							</div>
                            
		</div>


 </body>
</html>