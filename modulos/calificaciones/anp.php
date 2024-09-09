<!DOCTYPE html>
<html>
<head>
  <script>
    function mostrarFormulario(curso) {
      // Oculta todos los formularios
      var formularios = document.getElementsByClassName('formulario-curso');
      for (var i = 0; i < formularios.length; i++) {
        formularios[i].style.display = 'none';
      }

      // Muestra el formulario correspondiente al curso seleccionado
      var formulario = document.getElementById('formulario-' + curso);
      formulario.style.display = 'block';
    }
  </script>
</head>
<body>
  <button onclick="mostrarFormulario('matematicas')">Agregar Matemáticas</button>
  <button onclick="mostrarFormulario('ingles')">Agregar Inglés</button>

  <div id="formulario-matematicas" class="formulario-curso" style="display: none;">
    <!-- Aquí va el formulario de matemáticas -->
    <h2>Formulario de Matemáticas</h2>
    <!-- Agrega aquí los campos del formulario de matemáticas -->
  </div>

  <div id="formulario-ingles" class="formulario-curso" style="display: none;">
    <!-- Aquí va el formulario de inglés -->
    <h2>Formulario de Inglés</h2>
    <!-- Agrega aquí los campos del formulario de inglés -->
  </div>
</body>
</html>
