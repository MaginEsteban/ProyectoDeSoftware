//permite limpiar el dashboard

function clean_dashboard() {
    $('#turno').siblings('td').empty();
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

    $('#turno_' + menu.id_turno + "_dia_" + menu.id_dia_programacion).append(htmlMenu);

}

function actualizarDashboard(idComedor) {

    var menus;


    $('#loading').show();

    //peticon ajax para obtener todo los menus de un comedor dado
    $.ajax({
        url: "http://localhost/proyectodesoftware/programacion/menusAllTurnos",
        data: {
            comedor: idComedor
        },
        method: "POST",
        success: function (response) {
            var menus = JSON.parse(response);
            //limpiar el dashboard

            for (var i = 0; i < menus.length; i++) {
                render_menu(menus[i]);
            }
            return false;
        },
        complete: function () {
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
                url: "http://localhost/proyectodesoftware/programacion/delete_menu_programacion/",
                data: {
                    programacion_menu: idProgramacionMenu
                },
                method: 'POST',
                success: function (respuesta) {
                    $("#delete-" + idProgramacionMenu).closest("#menu-container").remove();
                    setTimeout(function () {
                        Toast.fire({
                            type: 'success',
                            title: 'Menu eliminado...'
                        })
                    }, 1500);
                },
                error: function (error) {
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'No se ha podido eliminar el menu'
                    })
                }
            });
        }
    })
}





function agregarMenu(idComedor, idTurno) {

    var menu_seleccionados = [];
    var dias = [];

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
    ).done(function (htmlDaysResult, htmlMenusResult) {
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
            progressSteps: ['1', '2'],

        }).queue([{
            title: 'Menus',
            html: htmlMenusResult[0],
            preConfirm: () => {
                id_menu = $('#menus_comedor').find(":selected").val();
                nombre_menu = $('#menus_comedor').find(":selected").text();

                menu_seleccionados.push(id_menu, nombre_menu);
                console.log(menu_seleccionados);
            }
        },
        {
            title: 'Dias de la Programacion',
            text: 'Seleccione los dias...',
            html: htmlDaysResult[0],
            preConfirm: () => {

                $("input[type=checkbox]:checked").each(function () {

                    //text del checkbox
                    var nombre = $(this).siblings('label').text();

                    dias.push(this.value);
                });

                console.log(dias);
            }
        }
        ]).then((result) => {

            if (result.value) {
                Swal.fire({
                    title: 'Datos Ingresados',
                    confirmButtonText: 'Confirmar',
                    html: `
    nombre menu :${menu_seleccionados[1]} <br>    
    `
                }).then((data) => {
                    //mensaje add menu

                    $.ajax({
                        url: "http://localhost/proyectodesoftware/programacion/add_programacion_menu/",
                        method: "POST",
                        data: { menu: menu_seleccionados[0], turno: idTurno, dias: dias },
                        success: () => {

                            //limpia el dashboard
                            clean_dashboard();

                            //vuelve a renderizar los datos
                            actualizarDashboard(idComedor);

                            setTimeout(function () {
                                Toast.fire({
                                    type: 'success',
                                    title: 'Menu agregado...'
                                })

                            }, 1250);

                        },
                        error: (response) => {
                            Swal.fire({
                                type: 'error',
                                title: 'Oops...',
                                text: 'No se ha podido agregar el menu'
                            })
                            console.log(response.responseText);
                        }

                    });



                })
            }
        });

    });
}