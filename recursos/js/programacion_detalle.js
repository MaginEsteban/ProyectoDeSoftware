
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



        $('#menu_reserva').on('click',function (event) {

            event.preventDefault();

             console.log("reserva");


        });


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

      
      


      //renderiza un menu
      function render_menu(id,nombre,dia,turno) {

          htmlMenu =
              `<div class="row menu" id="menu-container" >

                    <!-- Informacion de menu -->
                        <div class="col-9 text-center text-white">
                            ${nombre}
                        </div>
                        <div class="col-3">
                            <button id="menu_reserva btn btn-primary">
                                <i class="fa fa-shopping-cart text-white" aria-hidden="true" id="${id}"></i>
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
              url: "http://localhost/proyectodesoftware/detalle_comedores/findAllMenuByTurnos",
              data: {
                  comedor: idComedor
              },
              method: "POST",
              success: function(response) {
                 
                var menus = JSON.parse(response);
                  //limpiar el dashboard
                console.log( menus ); 

                  for (var i = 0; i < menus.length; i++) {
                      render_menu(menus[i].id_menu,menus[i].nombre,menus[i].dia,menus[i].id_turno);
                  }
                  return false;
              },
              complete: function() {
                  $('#loading').hide();
              }
          });

      }