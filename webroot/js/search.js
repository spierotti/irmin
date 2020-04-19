$(document).ready(function () {
    $("#s").autocomplete({
        minLength: 2,
        select: function(event, ui){
            $("#s").val(ui.item.label);
            $("#c_id").val(ui.item.id);
        },
        source: function(request, response) {
            $.ajax({
                url: "http://localhost/irmin/clientes/buscarclientes",
                data: {
                    term: request.term
                },
                dataType: "json",
                success: function(data){
                    response($.map(data, function(el, index){
                        return{
                            value: el.name,
                            nombre: el.name,
                            id: el.id,
                            cuit: el.cuit
                        };
                    }));
                }
            });
        },
        open: function () {
            // If it's not already added
            if (!$('#add-cliente').length) {
                // Add it
                $('<li id="add-cliente"><a href="http://localhost/irmin/clientes/add">Nuevo Cliente.. </a></li>').appendTo('ul.ui-autocomplete');
            }
        }
    }).data("ui-autocomplete")._renderItem = function(ul, item){
        return $("<li></li>")
        .data("item.autocomplete", item)
        .append(" " + item.id + " - " + item.cuit + " - " + item.nombre)
        .appendTo(ul)
    };
});