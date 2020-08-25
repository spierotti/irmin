$(document).ready(function() {

    /*$('#contenedor-tabla').on('click', '.eliminar', function(e) {
        e.preventDefault();
        var link= $('.eliminar').attr('href');
        var resp = confirm("¿Seguro que desea eliminar?");
        if (resp = true) {
            document.location.href = link;
        }
        return false;
    });

    $('#contenedor-tabla').on('click', '.activar', function(e) {
        e.preventDefault();
        var link= $('.activar').attr('href');
        var resp = confirm("¿Seguro que desea activar?");
        if (resp = true) {
            document.location.href = link;
        }
        return false;
    });*/

    $('#buscar').keyup(function(){
        obtenerParametros("")
    });

    $('#activo').change(function() {
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

    function obtenerParametros(link){

        var parametros = {};

        // desc parcial nombre cliente
        var searchkey = $('#buscar').val(); //var searchkey = $(this).val()
        parametros.keyword = searchkey;

        // estado de pedidos
        var estado = $('#activo:checked').val()
        if(estado != true){
            estado = 0
        }
        parametros.activo = estado;

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
            //url: "http://localhost/irmin/clientes/filtrarclientes",
            //url: "http://test2.local/clientes/filtrarclientes",
            url: "./clientes/filtrarclientes",
            data: parametros,
            success: function(response){
                $('.table-content').html(response);
            }
        });
    }
});