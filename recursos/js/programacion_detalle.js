$(document).ready(function () {
	// llamar a la funcion para actualizar la table
	var comedores = [];
	comedores = $('.comedor').each(
		function () {
			var comedor = $(this).attr('id');

			comedores.push(comedor);
		}
	);

	$.each(comedores, function (index, value) {
		actualizarDashboard(value.id);
	});

	//   actualizarDashboard();

	$('.slider-for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: '.slider-nav'
	});

	$('.slider-nav').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		asNavFor: '.slider-for',
		dots: true,
		centerMode: true,
		focusOnSelect: true
	});

});




function reservaTicket(menu,dia,turno) {

	event.preventDefault();

	var Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 3000
	});


	Swal.fire({
		title: '¿Estas seguro de reservar el ticket?',
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, reservar!',
		cancelButtonText: 'Cancelar'

	}).then((result) => {
		if (result.value) {

			//realiza la peticion
			$.ajax({
				url: "http://localhost/ProyectoDeSoftware/ticket/add/",
				data: {
					menu: menu,
					dia: dia,
					turno: turno
				},
				method: 'POST',
				success: function (respuesta) {
					setTimeout(function () {
						Toast.fire({
							type: 'success',
							title: 'Ticket Reservado...'
						})
					}, 1500);
				},
				error: function (error) {
					Swal.fire({
						type: 'error',
						title: 'Oops...',
						text: 'No se ha podido reservar el ticket'
					});
				}
			});
		}
	});
	return true;
}






//renderiza un menu
function render_menu(id, nombre, dia, dianombre, turno,idComedor) {

	htmlMenu =
		`<div class="row menu mb-3" id="menu-container" >

                    <!-- Informacion de menu -->
                        <div class="col-8 text-center text-white mr-n1 text-truncate">
                            ${nombre}
						</div>

							<div class="col-2">
								<button class="btn btn-info m-n1 menu_reserva rounded-circle">
									<i class="fa fa-shopping-cart text-white" aria-hidden="true" onclick="reservaTicket(${id},'${dianombre}',${turno},${idComedor})"></i>
								</button>
							</div>
                </div>
                
          `;

	$('#turno_' + turno + "_dia_" + dia).append(htmlMenu);

}

function actualizarDashboard(idComedor) {

	var menus;


	$('#loading').show();

	//peticon ajax para obtener todo los menus de un comedor dado
	$.ajax({
		url: "http://localhost/ProyectoDeSoftware/detalle_comedores/findAllMenuByTurnos",
		data: {
			comedor: idComedor
		},
		method: "POST",
		success: function (response) {

			var menus = JSON.parse(response);
			//limpiar el dashboard
			for (var i = 0; i < menus.length; i++) {
				render_menu(menus[i].id_menu, menus[i].nombre, menus[i].dia,menus[i].nombre_dia, menus[i].id_turno,idComedor);
			}
			return false;
		},
		complete: function () {
			$('#loading').hide();
		}
	});

}

function agregarFavorito(usuario,comedor){

	var Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 3000
	});

	console.log(usuario+'/'+comedor);
	Swal.fire({
		title: '¿Estas seguro de marcar este comedor como favorito?',
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, agregar!',
		cancelButtonText: 'Cancelar'

	}).then((result) => {
		if (result.value) {

			//realiza la peticion
			$.ajax({
				url: "http://localhost/ProyectoDeSoftware/detalle_comedores/add_favorito/",
				data: {
					usuario: usuario,
					comedor: comedor
				},
				method: 'POST',
				success: function (respuesta) {
					setTimeout(function () {
						Toast.fire({
							type: 'success',
							title: 'Comedor agregado a Favoritos...'
						})
					}, 1500);
				},
				error: function (error) {
					Swal.fire({
						type: 'error',
						title: 'Oops...',
						text: 'No se ha podido agregar a Favoritos'
					});
				}
			});
		}
	});
}
