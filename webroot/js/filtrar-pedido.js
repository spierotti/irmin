$(document).ready(function() {

    $('#buscar').keyup(function(){

        var searchkey = $(this).val()
        var estado = $('input:radio[name=estado]:checked').val()

        searchTags(searchkey,estado)
    });

    $('input:radio[name=estado]').change(function() {

        var searchkey = $('#buscar').val()
        var estado = $('input:radio[name=estado]:checked').val()

        searchTags(searchkey, estado)
    });

    function searchTags( keyword, estado){
        
        var data1 = keyword;
        var data2 = estado;

        $.ajax({
            method: 'get',
            //url: "<?php echo $this->Url->build(['controller' => 'Clientes', 'action' => 'filtrarclientes']); ?>",
            url: "http://localhost/irmin/pedidos/filtrarpedidos",
            data: {
                keyword: data1,
                estado: data2
            },
            success: function(response){
                $('.table-content').html(response);
            }
        });
    }
});