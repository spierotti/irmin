$(document).ready(function() {
    $('.eliminar').click(function(e) {
        e.preventDefault();
        var resp = confirm("¿Seguro que desea eliminar?");
        if (resp != true) {
            return false;    
        } 
    })
});