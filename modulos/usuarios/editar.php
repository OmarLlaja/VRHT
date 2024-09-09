<?php
include("../../conexion/conexion.php");

if (isset($_GET['id'])) {
    $txtid = (isset($_GET['id']) ? $_GET['id'] : "");

    $stm = $conexion->prepare("SELECT * FROM usuarios WHERE ID=:txtid");
    $stm->bindParam(":txtid", $txtid);
    $stm->execute();
    $registro = $stm->fetch(PDO::FETCH_ASSOC);

    $ft = $registro['foto'];
    $uss = $registro['nombre_usuario'];
    $pss = $registro['contrasenia'];
    $niv = $registro['tipo_usuario'];


    if ($_POST) {
     // Validar campos vacios

      $ft = (isset($_POST['foto']) ? $_POST['foto'] : "");
      $uss = (isset($_POST['usuario']) ? $_POST['usuario'] : "");
      $pss = (isset($_POST['contrasenia']) ? $_POST['contrasenia'] : "");
      $niv = (isset($_POST['nivel']) ? $_POST['nivel'] : "");

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
  $ft = file_get_contents($foto_temp);
  
      $stm = $conexion->prepare("UPDATE usuarios SET foto=:foto, nombre_usuario=:usuario, contrasenia=:contrasenia, tipo_usuario=:nivel WHERE ID=:txtid");
  
      // Enlazar parámetros, incluyendo la foto
        $stm->bindParam(":foto", $ft);
        $stm->bindParam(":usuario", $uss);
        $stm->bindParam(":contrasenia", $pss);
        $stm->bindParam(":nivel", $niv);
        $stm->bindParam(":txtid", $txtid);
      
        $stm->execute();
  
      header("location:usuarios.php");
  }

}
?>
<?php include("../../template/header.php"); ?>

  


              <div class="tab-pane fade active in" id="new">
							  <div class="container-fluid">
								  <div class="row">
									  <div class="col-xs-12 col-md-10 col-md-offset-1">
                      <form action="" method="post" class="formulario" enctype="multipart/form-data">
                        <div>
                          <br><br>
                            <label for="foto">Foto de Perfil:</label>
                            <?php if (!empty($ft)): ?>
                                <img src="data:image/jpg;base64,<?php echo base64_encode($ft); ?>" width="60" height="90">
                            <?php endif; ?>
                            <input type="file" id="foto" name="foto" accept="image/*" required>                            

                        </div>                        
                        <div class="form-group">
                          <label for="usuario">Nombre de Usuario</label>
                          <input type="text" class="form-control" name="usuario" placeholder="Ingrese el nombre de usuario" value="<?php echo $uss; ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="contrasenia">Contraseña</label>
                          <input type="text" class="form-control" name="contrasenia" placeholder="Ingrese la contraseña" value="<?php echo $pss; ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="nivel">Nivel de Acceso</label>
                          <select class="form-control" name="nivel" id="nivel" required>
                            <option value="1" <?php if ($niv == '1') echo 'selected'; ?>>Administrador</option>
                            <option value="2" <?php if ($niv == '2') echo 'selected'; ?>>Profesor</option>
                            <option value="3" <?php if ($niv == '3') echo 'selected'; ?>>Estudiante</option>
                            <option value="4" <?php if ($niv == '4') echo 'selected'; ?>>Representante</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <td><a href="usuarios.php" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-close"></i> CANCELAR</a></td>
                          <button type="submit" class="btn btn-success btn-raised btn-xs zmdi zmdi-refresh"> GUARDAR</button>
                         </div>
                      </form>
                    </div>
								  </div>
							  </div>
              </div>



              <?php include("../../template/footer.php"); ?>