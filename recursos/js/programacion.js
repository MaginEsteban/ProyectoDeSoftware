

//permite seleccionar una coleccion checkbox

function chech() {
	console.log("aasdasd");
	$('.check').each(function () { this.checked = !this.checked; });
}


//renderiza un menu
function render_menu(menu) {
	
	htmlMenu = 
	`<div class="row menu" id="menu-container" >
	
		<!-- Informacion de menu -->
			<div class="col-9">
				${menu.nombre}				
			</div>

			<!-- acciones del menu -->
			<div class="col-3">
				<button type="button">
					<i class="fa fa-times text-danger" id="delete-${menu.id_programacion_menu}" onclick="eliminarMenu(${menu.id_programacion_menu})" 
						aria-hidden="true"></i>
				</button>
			</div>
		</div>
	`;

	$('#turno_'+menu.id_turno+"_dia_"+menu.id_dia_programacion).append(htmlMenu);

}

function actualizarDashboard(idComedor) {

	var menus;


	$('#loading').show();

	//peticon ajax para obtener todo los menus de un comedor dado
	$.ajax({
		url: "http://localhost/proyectodesoftware/programacion/menusAllTurnos",
		data: {	comedor: idComedor	},
		method: "POST",
		success: function (response) {
			var menus = JSON.parse(response);
			//limpiar el dashboard
			
			for (var i = 0; i < menus.length; i++) {
				render_menu(menus[i]);
			}
			return false;	
		},
		complete: function(){
			$('#loading').hide();
		  }
	});

}




//funcion para eliminar un menu
function eliminarMenu(idProgramacionMenu) {

	var Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 3000
	});

	$("#delete-" + idProgramacionMenu).closest("#menu-container").remove();

	//abre el modal_alert
	Swal.fire({
		title: '¿Estas seguro de eliminar ese menu?',
		text: "No podrás revertir esto!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, eliminar!',
		cancelButtonText: 'Cancelar'

	}).then((result) => {
		if (result.value) {

			//realiza la peticion
			$.ajax({
				url: "http://localhost/proyectodesoftware/programacion/delete_menu_programacion",
				data: {		programacion_menu: idProgramacionMenu	},
				method: 'POST',
				success: function (respuesta) {
					setTimeout(function () {
						Toast.fire({
							type: 'success',
							title: 'Menu eliminado...'
						})
					}, 1500);
				},
				error: function () {
					Swal.fire({
						type: 'error',
						title: 'Oops...',
						text: 'Something went wrong!',
						footer: '<a href>Why do I have this issue?</a>'
					})
				}
			});
		}
	})
}





function agregarMenu(idComedor) {

	event.preventDefault();

	//realiza una peticion para obtener  de la programacion
	$.when(
		$.ajax("http://localhost/proyectodesoftware/programacion/days"),
		$.ajax({
			url: "http://localhost/proyectodesoftware/programacion/menus",
			data: {
				comedor: idComedor
			},
			method: 'POST'
		})
	).done(function (htmlMenusResult, htmlDaysResult) {
		// una ves que se realiza las dos peticiones

		var Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000
		});


		Swal.mixin({
			confirmButtonText: 'Siguiente &rarr;',
			showCancelButton: true,
			cancelButtonText: 'Cancelar',
			progressSteps: ['1', '2']
		}).queue([{
				title: 'Menus',
				html: htmlDaysResult[0]
			},
			{
				title: 'Dias de la Programacion',
				text: 'Seleccione los dias...',
				html: htmlMenusResult[0]
			}
		]).then((result) => {
			if (result.value) {
				Swal.fire({
					title: 'Datos Ingresados',
					confirmButtonText: 'Confirmar',
				}).then(() => {
					//mensaje add menu

					setTimeout(function () {
						Toast.fire({
							type: 'success',
							title: 'Menu agregado...'
						})

					}, 1250);

					//renderiza la informacion del nuevo menu

				})
			}
		});

	});
}
