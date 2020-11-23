function validarFechas()
{
    var fechaD = document.forms["verImagenes"]["fecha_inicio"].value;
    var fechaH = document.forms["verImagenes"]["fecha_fin"].value;

    var diaDesde = fechaD[0] + fechaD[1];
    var diaHasta = fechaH[0] + fechaH[1];

    var mesDesde = fechaD[3] + fechaD[4];
    var mesHasta = fechaH[3] + fechaH[4];

    var anioDesde = fechaD[6] + fechaD[7] + fechaD[8] + fechaD[9];
    var anioHasta = fechaH[6] + fechaH[7] + fechaH[8] + fechaH[9];

    //Año, mes, día. Al mes se le resta 1 porque va de 0 a 11, siendo 0: enero y 11: diciembre.
    var dateDesde = new Date(anioDesde, mesDesde-1, diaDesde);
    var dateHasta = new Date(anioHasta, mesHasta-1, diaHasta);

    if (dateDesde > dateHasta)
    {
        alert("La fecha desde debe ser igual o anterior a la fecha hasta.");
        event.preventDefault();
    }
}