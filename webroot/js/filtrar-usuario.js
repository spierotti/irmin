$(document).ready(function() {

    $('#buscar').keyup(function(){
        obtenerParametros("")
    });

    $('#activo').change(function() {
        obtenerParametros("")

        /*var searchkey = $('#buscar').val()
        var activo = $('#activo:checked').val()

        if(activo != true){
            activo = 0
        }

        searchTags(searchkey,activo)*/
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
            //url: "http://test2.local/users/filtrarusuarios",
            url: "./users/filtrarusuarios",
            data: parametros,
            success: function(response){
                $('.table-content').html(response);
            }
        });
    }

    /*function searchTags( keyword, activo){
        
        var data1 = keyword;
        var data2 = activo;

        $.ajax({
            method: 'get',
            //url: "<?php echo $this->Url->build(['controller' => 'Clientes', 'action' => 'filtrarclientes']); ?>",
            url: "http://localhost/irmin/users/filtrarusuarios",
            data: {
                keyword: data1,
                activo: data2
            },
            success: function(response){
                $('.table-content').html(response);
            }
        });
    }*/
});