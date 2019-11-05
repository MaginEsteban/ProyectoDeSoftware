
      $(document).ready(function() {
          // llamar a la funcion para actualizar la table
          var comedores = [];
          comedores = $('.comedor').each(
              function(){
                  var comedor =  $(this).attr('id');

              comedores.push(comedor );
            }
          );
      
          $.each(comedores,function(index,value){
            actualizarDashboard(value.id);
          });
         
        //   actualizarDashboard();
      });
      
      //renderiza un menu
      function render_menu(menu) {

          htmlMenu =
              `<div class="row menu" id="menu-container" >

          <!-- Informacion de menu -->
          <div class="col text-center text-white">
          ${menu.nombre}
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
              success: function(response) {
                  var menus = JSON.parse(response);
                  //limpiar el dashboard

                  for (var i = 0; i < menus.length; i++) {
                      render_menu(menus[i]);
                  }
                  return false;
              },
              complete: function() {
                  $('#loading').hide();
              }
          });

      }