<?php
// Incluir el archivo de conexión a la base de datos
include("conexion/conexion.php");

include "encriptar.php";

if ($_POST) {
	$usuario = isset($_POST['UserEmail']) ? $_POST['UserEmail'] : "";
	$contrasenia = isset($_POST['UserPass']) ? $_POST['UserPass'] : "";
	$nivel = isset($_POST['nivel']) ? $_POST['nivel'] : "";

	if ($usuario === "" || $contrasenia === "" || $nivel === "") {
		echo "<script>alert('Por favor, completa todos los campos del formulario.');</script>";
		header("location:index.php");
		exit;
	} else {
		$contrasenia_encriptada = $encriptar($contrasenia);

		// Verificar en la tabla de usuarios
		$stmtUsuario = $conexion->prepare("SELECT * FROM usuarios WHERE nombre_usuario = :usuario AND contrasenia = :contrasenia AND tipo_usuario = :nivel");
		$stmtUsuario->bindParam(':usuario', $usuario);
		$stmtUsuario->bindParam(':contrasenia', $contrasenia_encriptada);
		$stmtUsuario->bindParam(':nivel', $nivel);

		$stmtUsuario->execute();
		$usuarioInfo = $stmtUsuario->fetch(PDO::FETCH_ASSOC);

		if ($usuarioInfo) {
			// Establecer sesiones
			session_start();
			$_SESSION['nombre_usuario'] = $usuarioInfo['nombre_usuario'];
			$_SESSION['nivel_usuario'] = $usuarioInfo['tipo_usuario'];
			$_SESSION['foto_usuario'] = $usuarioInfo['foto']; // Almacenar la ruta de la foto

			// Redireccionar según el nivel de usuario
			switch ($nivel) {
				case '1':
					header("location: home.php");
					exit;
				case '2':
					header("location: home1.php");
					exit;
				case '3':
					header("location: home2.php");
					exit;
				case '4':
					header("location: home2.php");
					exit;
				default:
					// En caso de un nivel de usuario no reconocido, redirigir a una página de error
					header("location: error_page.php");
					exit;
			}
		} else {
			// Si las credenciales son incorrectas, mostrar mensaje de error
			echo "<script>alert('Credenciales incorrectas');</script>";
			header("location: index.php");
			exit;
		}
	}
}
?>




<!DOCTYPE html>
<html lang="es">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="http://localhost/COLEGIO1.0/css/main.css">

</head>

<body class="cover" style="background-image: url(./assets/img/fondo1.jpg);">
	<form action="" method="POST" autocomplete="off" class="full-box logInForm">
		<p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
		<p class="text-center text-muted text-uppercase">Inicia sesión con tu cuenta</p>
		<div class="form-group label-floating">
			<label class="control-label" for="UserEmail">Usuario</label>
			<input class="form-control" id="UserEmail" type="text" name="UserEmail" required>
			<p class="help-block">Escribe tu Usuario</p>
		</div>
		<div class="form-group label-floating">
			<label class="control-label" for="UserPass">Contraseña</label>
			<input class="form-control" id="UserPass" type="text" name="UserPass" required>
			<p class="help-block">Escribe tu contraseña</p>
			<br>
			<input type="checkbox" id="mostrar_contrasena" onclick="mostrarContrasena()"> Mostrar Contraseña
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

		<div class="form-group text-center">
			<input type="submit" value="Iniciar sesión" class="btn btn-raised btn-danger">
		</div>
	</form>

	<!--====== Scripts -->
	<script src="http://localhost/COLEGIO1.0/js/jquery-3.1.1.min.js"></script>
	<script src="http://localhost/COLEGIO1.0/js/bootstrap.min.js"></script>
	<script src="http://localhost/COLEGIO1.0/js/material.min.js"></script>
	<script src="http://localhost/COLEGIO1.0/js/ripples.min.js"></script>
	<script src="http://localhost/COLEGIO1.0/js/sweetalert2.min.js"></script>
	<script src="http://localhost/COLEGIO1.0/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="http://localhost/COLEGIO1.0/js/main.js"></script>
	<script>
		$.material.init();

		// Restablecer los valores de los campos al cargar la página
		window.addEventListener('DOMContentLoaded', (event) => {
			document.getElementById('UserEmail').value = '';
			document.getElementById('UserPass').value = '';
			document.getElementById('nivel').value = '';
		});

		// Mostrar y ocultar la contraseña al hacer clic en el checkbox
		function mostrarContrasena() {
			var campoContrasena = document.getElementById("UserPass");
			if (campoContrasena.type === "password") {
				campoContrasena.type = "text"; // Mostrar la contraseña
			} else {
				campoContrasena.type = "password"; // Ocultar la contraseña
			}
		}
	</script>
</body>

</html>