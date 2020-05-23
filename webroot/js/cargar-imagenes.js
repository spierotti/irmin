$(document).ready(function(){

    $("#img").hide();
    var enproceso = false;

    $('#descargar').click(function(){

        if (!enproceso){

            $("#img").show();
            enproceso = true;

            $.ajax({
                url:"http://localhost/irmin/images/ejecutar",  
                success:function(data) {
                    enproceso = false;
                    $("#img").hide();
                    alert(data); 
                }, 
                error: function(data) {
                   enproceso = false;
                   $("#img").hide();
                   alert(data); 
                }
            });

        }else{
            alert('Descarga en ejecucion... Por favor espere.');
        }
    });

});