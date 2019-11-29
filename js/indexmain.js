jQuery(document).on('submit','#formLg',function(event){
            event.preventDefault();
            jQuery.ajax({
                url:'PHP/validar.php',
                type:'POST',
                dataType:'json',
                data:$(this).serialize(),
                beforeSend:function(){
                  $('#btnlg').val('Validando...');
                }
              })
              .done(function(respuesta){
                console.log(respuesta);
                if (!respuesta.error) {
                  if (respuesta.tipo=='Admin') {
                    location='admin/InicioAdmin.php';
                  }else if (respuesta.tipo=='Usuario') {
                    location='usuario/InicioU.php';
                  }else if (respuesta.tipo == 'Baneado') {
                    $('.ban').slideDown('slow');
                    setTimeout(function(){
                    $('.ban').slideUp('slow');
                    },3000);
                    $('.botonlg').val('Iniciar Sesion');
                  } 
                } else {
                  $('.error').slideDown('slow');
                  setTimeout(function(){
                  $('.error').slideUp('slow');
                },3000);
                $('.botonlg').val('Iniciar Sesion');
                } 
              })
              .fail(function(resp){
                console.log(resp.responseText);
              })
              .always(function(){
                console.log("complete");
            });
      });
