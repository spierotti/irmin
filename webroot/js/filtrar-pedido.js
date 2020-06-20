$(document).ready(function() {

    $('#buscar').keyup(function(){
        obtenerParametros("")
    });

    $('input:radio[name=estado]').change(function() {
        obtenerParametros("")
    });

    $('#contenedor-tabla').on('click', '.page-link', function(e) {
        e.preventDefault();
        var link= $(this).attr('href');
        if(link!="")
        {
            obtenerParametros(link);
        }
        return false;
    });

    $('#tabla').on('click', '#sort-item', function(e) {
        e.preventDefault();
        var link= $(this).attr('href');
        if(link!="")
        {
            obtenerParametros(link);
        }
        return false;
    });

    function obtenerParametros(link){

        var parametros = {};

        // desc parcial nombre cliente
        var searchkey = $('#buscar').val(); //var searchkey = $(this).val()
        parametros.keyword = searchkey;

        // estado de pedidos
        var estado = $('input:radio[name=estado]:checked').val();
        parametros.estado = estado;

        //otrs parametros (ej: nro pagina)
        if(link!="")
        {
            var p = link.split("?")[1];
            var arrayParams = p.split("&");
            for(i = 0; i < arrayParams.length; i++){

                var parametro = arrayParams[i].split("=");

                switch(parametro[0]) {
                    case "page":
                        parametros.page = parametro[1];
                        break;
                    case "sort":
                        parametros.sort = parametro[1];
                        break;
                    case "direction":
                        parametros.direction = parametro[1];
                        break;
                } 
            }
        }

        $.ajax({
            method: 'get',
            url: "http://localhost/irmin/pedidos/filtrarpedidos",
            data: parametros,
            success: function(response){
                $('.table-content').html(response);
            }
        });
    }
});