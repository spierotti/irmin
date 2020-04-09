$(document).ready(function() {

    $('#buscar').keyup(function(){

        var searchkey = $(this).val()
        var activo = $('#activo:checked').val()

        if(activo != true){
            activo = 0
        }

        searchTags(searchkey,activo)
    });

    $('#activo').change(function() {

        var searchkey = $('#buscar').val()
        var activo = $('#activo:checked').val()

        if(activo != true){
            activo = 0
        }

        searchTags(searchkey, activo)
        
    });

    function searchTags( keyword, activo){
        
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
    }
});