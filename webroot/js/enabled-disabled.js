$( function() {
    $("#rol").change( function() {
        if ($(this).val() == 4) {
            $("#s").prop("disabled", false);
        } else {
            $("#s").prop("disabled", true);
        }
    });
});