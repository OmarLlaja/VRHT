<?php
include("../../conexion/conexion.php");

if (isset($_GET['id'])) {

    


    $txtid = (isset($_GET['id']) ? $_GET['id'] : "");
    $stm = $conexion->prepare("SELECT * FROM cursos WHERE id=:txtid");
    $stm->bindParam(":txtid", $txtid);
    $stm->execute();
    $registro = $stm->fetch(PDO::FETCH_ASSOC);
    $codigo = $registro['codigo'];
    $nombre = $registro['nombre_curso'];
    $descripcion = $registro['descripcion'];

    if ($_POST) {
         // Validar campos vacios
        if(empty($_POST['codigo'])) {
            echo "El codigo de curso es requerido";	
            return;
        }
        
        if(empty($_POST['nombre'])) {
            echo "El nombre de curso es requerido"; 
            return;
        }

        if(empty($_POST['descripcion'])) {
            echo "La descripcion de curso es requerido"; 
            return;
        }

        
        $codigo = (isset($_POST['codigo']) ? $_POST['codigo'] : "");
        $nombre = (isset($_POST['nombre']) ? $_POST['nombre'] : "");
        $descripcion = (isset($_POST['descripcion']) ? $_POST['descripcion'] : "");

        $stm = $conexion->prepare("UPDATE cursos SET codigo=:codigo, nombre_curso=:nombre, descripcion=:descripcion WHERE id=:txtid");

        $stm->bindParam(":codigo", $codigo);
        $stm->bindParam(":nombre", $nombre);
        $stm->bindParam(":descripcion", $descripcion);
        $stm->bindParam(":txtid", $txtid);

        $stm->execute();

        header("location:subject.php");
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
        <link rel="stylesheet" type="text/css" href="../../css/eu.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    </head>

    <body>

<div class="form-container">
  <form action="" method="post" class="formulario">
    
    <div class="form-group">
      <label for="codigo">Codigo</label>
      <input type="text" class="form-control" name="codigo" placeholder="Ingrese codigo del curso" value="<?php echo $codigo; ?>">
    </div>
    <div class="form-group">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" name="nombre" placeholder="Ingrese nombre del curso" value="<?php echo $nombre; ?>">
    </div>

    <div class="form-group">
      <label for="descripcion">Descripcion</label>
      <input type="text" class="form-control" name="descripcion" placeholder="Ingrese descripcion del curso" value="<?php echo $descripcion; ?>">
    </div>
    
    <div class="button-container">
      <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-3">
          <a href="subject.php" class="btn btn-success btn-block"><i class="fas fa-times"> Cancelar</i></a>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3">
          <button type="submit" class="btn btn-danger btn-block"><i class="fas fa-save"> Guardar</i></button>
        </div>
      </div>
    </div>
  </form>
</div>


 </body>
</html>