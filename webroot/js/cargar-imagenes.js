$(document).ready(function(){

    var enproceso = false;

    $('#descargar').click(function(){

        if (!enproceso){

            enproceso = true;

            iniciar_barra_progreso();

            $.ajax({
                url:"http://localhost/irmin/images/ejecutar",
                success:function(data) {
                    enproceso = false;
                    if (data['fecha_hora_actualizacion'] == null){
                        actualizar_pantalla("-","-");
                        alert(data['error']); 
                    }else{
                        actualizar_pantalla(data['fecha_hora_actualizacion'],data['salida']);
                        alert('¡El proceso ha fnalizado!')
                    }
                }, 
                error:function(data) {
                   enproceso = false;
                   actualizar_pantalla("-","-");
                   alert(data['error']); 
                }
            });

            setTimeout(get_progreso,10000);
        }
    });

    function iniciar_barra_progreso(){
        
        // muestra la barra de proceso y la inicializa
        $('#proceso').css('display', 'inherit');
        $('.progress-bar').css('width', 0 + '%');
        $('#progressbar').html(0 + '%');

        // setea labels a "En proceso.."
        $('#fecha_actualizacion').html("En proceso...");
        $('#resultado').html("En proceso...");

        // deshabilita el boton de comienzo
        $('#descargar').attr('disabled', true);
    }

    // consulta porcentaje de progreso de la descarga de imagenes
    function get_progreso(){

        $.ajax({
            url:"http://localhost/irmin/images/get-progreso",  
            success:function(data) {

                var porcentaje = data['porcentaje'];

                if (enproceso == true){

                    actualizar_barra_progreso(porcentaje); 

                    if (porcentaje < 100){
                        setTimeout(get_progreso,10000);
                    }
                }
            }, 
            error: function(data) {
               setTimeout(get_progreso,10000)
            }
        });
    }

    function actualizar_barra_progreso(porcentaje){

        $('.progress-bar').css('width', porcentaje + '%');
        $('#progressbar').html(porcentaje + '%');
    }

    function actualizar_pantalla($fecha, $salida){

        $('#fecha_actualizacion').html($fecha);
        $('#resultado').html($salida);

        $('#proceso').css('display', 'none');
        $('.progress-bar').css('width', 0 + '%');
        $('#progressbar').html(0 + '%');

        $('#descargar').attr('disabled', false);
    };

});