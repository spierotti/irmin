$(document).ready(function () {

    //$("#btn_limpiar").
    //document.getElementById("btn_limpiar").style.display = "none";

    var getUrl = window.location;
    var cant = getUrl.pathname.split('/');
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

    if ($("#c_id").val().length > 0 && $("#c_id").val() > 0 &&  $("#s").val().length > 0){
        $( "#s" ).prop( "disabled", true );
        if (cant.length == 4) {
            $("#cliente_div").removeClass("col-sm-8");
            $("#cliente_div").addClass("col-sm-7");
            document.getElementById("btn_limpiar").style.display = "block";
        }
    }

    $("#s").autocomplete({
        minLength: 2,
        select: function(event, ui){
            $("#s").val(ui.item.label);
            $("#cliente_div").removeClass("col-sm-8");
            $("#cliente_div").addClass("col-sm-7");
            $("#c_id").val(ui.item.id);
            $( "#s" ).prop( "disabled", true );
            document.getElementById("btn_limpiar").style.display = "block";
        },
        source: function(request, response) {
            $.ajax({
                //url: "http://localhost/irmin/clientes/buscarclientes",
                url: baseUrl + "/clientes/buscarclientes",
                data: {
                    term: request.term
                },
                dataType: "json",
                success: function(data){
                    response($.map(data, function(el, index){
                        return{
                            value: el.name + " ( " + el.cuit + " ) ",
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
                //$('<li id="add-cliente"><a href="http://localhost/irmin/clientes/add">Nuevo Cliente.. </a></li>').appendTo('ul.ui-autocomplete');
                $('<li id="add-cliente"><a href="./clientes/add"> - Nuevo Cliente.. </a></li>').appendTo('ul.ui-autocomplete');
            }
        }
    }).data("ui-autocomplete")._renderItem = function(ul, item){
        return $("<li></li>")
        .data("item.autocomplete", item)
        .append(" - " + item.nombre + " ( " + item.cuit + " ) " )
        //.append(" " + item.id + " - " + item.cuit + " - " + item.nombre)
        .appendTo(ul)
    };

    $("#btn_limpiar").click(function () {
        
        $("#s").val("");
        $("#c_id").val("");
        if ($('#s').prop('disabled') == true) {
            $( "#s" ).prop( "disabled", false );
        }
        $("#cliente_div").removeClass("col-sm-7");
        $("#cliente_div").addClass("col-sm-8");
        document.getElementById("btn_limpiar").style.display = "none";
    });
    
    /*$("#fecha_inicio").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        //if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
           //display error message
           //$("#errmsg").html("Digits Only").show().fadeOut("slow");
                  return false;
       //}
      });*/
});