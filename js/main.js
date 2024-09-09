$(document).ready(function(){
	$('.btn-sideBar-SubMenu').on('click', function(){
		var SubMenu=$(this).next('ul');
		var iconBtn=$(this).children('.zmdi-caret-down');
		if(SubMenu.hasClass('show-sideBar-SubMenu')){
			iconBtn.removeClass('zmdi-hc-rotate-180');
			SubMenu.removeClass('show-sideBar-SubMenu');
		}else{
			iconBtn.addClass('zmdi-hc-rotate-180');
			SubMenu.addClass('show-sideBar-SubMenu');
		}
	});
	$('.btn-exit-system').on('click', function(){
		swal({
		  	title: '¿Está seguro?',
		  	text: "La sesión actual se cerrará.",
		  	type: 'warning',
		  	showCancelButton: true,
		  	confirmButtonColor: '#03A9F4',
		  	cancelButtonColor: '#F44336',
		  	confirmButtonText: '<i class="zmdi zmdi-run"></i> Sí, Salir!',
		  	cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, Cancelar!'
		}).then(function () {
			window.location.href="http://localhost/Colegio1.0/index.php";
		});
	});
	$('.btn-menu-dashboard').on('click', function(){
		var body=$('.dashboard-contentPage');
		var sidebar=$('.dashboard-sideBar');
		if(sidebar.css('pointer-events')=='none'){
			body.removeClass('no-paddin-left');
			sidebar.removeClass('hide-sidebar').addClass('show-sidebar');
		}else{
			body.addClass('no-paddin-left');
			sidebar.addClass('hide-sidebar').removeClass('show-sidebar');
		}
	});
	$('.btn-Notifications-area').on('click', function(){
		var NotificationsArea=$('.Notifications-area');
		if(NotificationsArea.css('opacity')=="0"){
			NotificationsArea.addClass('show-Notification-area');
		}else{
			NotificationsArea.removeClass('show-Notification-area');
		}
	});

	$('.btn-search').on('click', function(){
		swal({
		  title: '¿Qué estás buscando?',
		  confirmButtonText: '<i class="zmdi zmdi-search"></i>  Buscar',
		  confirmButtonColor: '#03A9F4',
		  showCancelButton: true,
		  cancelButtonColor: '#F44336',
		  cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> Cancelar',
		  html: '<div class="form-group label-floating">'+
			  		'<label class="control-label" for="InputSearch">Escribe aqui</label>'+
			  		'<input class="form-control" id="InputSearch" type="text">'+
				'</div>'
		}).then(function () {
		  swal(
		    'You wrote',
		    ''+$('#InputSearch').val()+'',
		    'success'
		  )
		});
	});
	$('.btn-modal-help').on('click', function(){
		$('#Dialog-Help').modal('show');
	});
});

(function($){
    $(window).on("load",function(){
        $(".dashboard-sideBar-ct").mCustomScrollbar({
        	theme:"light-thin",
        	scrollbarPosition: "inside",
        	autoHideScrollbar: true,
        	scrollButtons: {enable: true}
        });
        $(".dashboard-contentPage, .Notifications-body").mCustomScrollbar({
        	theme:"dark-thin",
        	scrollbarPosition: "inside",
        	autoHideScrollbar: true,
        	scrollButtons: {enable: true}
        });
    });
})(jQuery);


// metodo de inciar sesion



document.getElementById('loginForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada
  iniciarSesion();
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


function mostrarContenido(contenido) {
				document.getElementById("contenido").style.display = "flex";
				// Aquí puedes agregar la lógica para mostrar el contenido correspondiente al botón seleccionado
			}

	
	

function mostrarFormulario(parametro) {
				
				if (parametro === "todo") {					
					var formulario = document.getElementById("formularioFlotante");
					formulario.style.display = "block";
				  } 
				if(parametro==="dp") {
					var formulario = document.getElementById("formularioFlotantedp");
					formulario.style.display = "block";
				  }
				if(parametro==="cc") {
					var formulario = document.getElementById("formularioFlotantecc");
					formulario.style.display = "block";
				  }
				if(parametro==="ac") {
					var formulario = document.getElementById("formularioFlotanteac");
					formulario.style.display = "block";
				  }
				if(parametro==="cs") {
					var formulario = document.getElementById("formularioFlotantecs");
					formulario.style.display = "block";
				  }
				if(parametro==="co") {
					var formulario = document.getElementById("formularioFlotanteco");
					formulario.style.display = "block";
				  }
				if(parametro==="in") {
					var formulario = document.getElementById("formularioFlotantein");
					formulario.style.display = "block";
				  }
				if(parametro==="ct") {
					var formulario = document.getElementById("formularioFlotantect");
					formulario.style.display = "block";
				  }
				if(parametro==="ef") {
					var formulario = document.getElementById("formularioFlotanteef");
					formulario.style.display = "block";
				  }
				if(parametro==="et") {
					var formulario = document.getElementById("formularioFlotanteet");
					formulario.style.display = "block";
				  }
				if(parametro==="er") {
					var formulario = document.getElementById("formularioFlotanteer");
					formulario.style.display = "block";
				  }
				if(parametro==="ma") {
					var formulario = document.getElementById("formularioFlotantema");
					formulario.style.display = "block";
				  }
				
				}
function editar(){
	var formulario = document.getElementById("formularioFlotantema");
	formulario.style.display = "block";

}
				


function cerrarFormulario() {
						var formularios = document.getElementsByClassName('cerrar');
						for (var i = 0; i < formularios.length; i++) {
						  formularios[i].parentNode.style.display = 'none';
						}
					  }

 function marcarDesmarcarTodos() {
						var checkboxes = document.querySelectorAll('input[type="checkbox"]');
						checkboxes.forEach(function(checkbox) {
							checkbox.checked = !checkbox.checked;
						});
					}


// Funcion para obtener el ID del año seleccionado para filtrar el contenido
// Esta función captura el valor del año seleccionado y lo muestra en un elemento debajo del select
$(document).ready(function() {
	// Asignar el valor seleccionado a la variable anio
	var anio = $('#periodo').val();

	// Agregar un evento change al select
	$('#periodo').change(function() {
		anio = $(this).val();
	});
});