function ctrlNombreVia() {
    var txtNombreDeLaVia = $("input[name*='nombreDeLaVia']");
    var cbCodigoVia = $('#codigoAcumuladoVia');
    var controlador = BASE_URL + 'app/controlador/ajax/obtenerDatosVia.php';
    console.log(txtNombreDeLaVia.val());
    if (txtNombreDeLaVia.val() !== null){
        if ($.isNumeric(txtNombreDeLaVia.val())) {
            $.ajax({
                type: "POST",
                data: "codigoVia=" + txtNombreDeLaVia.val(),
                url: controlador,
                dataType: "html",
                success: function (data) {

                    console.log(data);

                },
                error: function () {
                    console.log('Error de petición AJAX - validar clave catastral');
                }
            });
        }
    }

}