/* template ajax
 $.ajax({
 type: "POST",
 data: "claveCatastral=" + claveCatastral,
 url: controlador,
 dataType: "html",
 success: function (data) {
 
 },
 error: function () {
 console.log('Error de petición AJAX - validar clave catastral');
 }
 });
 
 */

$(document).ready(function () {

    $('#formUnipropiedad').validator();

    $('#formUnipropiedad input').on('keypress', function (e) {
        return e.which !== 13;
    });


    $('#btnValidarClaveCatastral').click(function () {
        var provincia = $('#clvProvincia').val();
        var canton = $('#clvCanton').val();
        var parroquia = $('#clvParroquia').val();
        var zona = $('#clvZona').val();
        var sector = $('#clvSector').val();
        var manzana = $('#clvManzana').val();
        var lote = $('#clvLote').val();
        var divContClaveCatastral = $('#contClaveCatastral');
        var divContenedorFicha = $('#contFicha');
        var claveCatastral = provincia + canton + parroquia + zona + sector + manzana + lote;
        var controlador = BASE_URL + 'app/controlador/ajax/validarClaveCatastral.php';
        $.ajax({
            type: "POST",
            data: "claveCatastral=" + claveCatastral,
            url: controlador,
            dataType: "html",
            success: function (data) {
                console.log(data);
                if (data == '1') {
                    $.toaster({priority: 'success', title: 'Clave catastral', message: 'Clave catastral válida'});
                    divContenedorFicha.show();
                    divContClaveCatastral.removeClass('centrado');
                    obtenerNumeroPredio();
                    obtenerNumeroBloques();
                    $('#ubicacion').focus();
                } else {
                    $.toaster({priority: 'danger', title: 'Clave catastral', message: 'Poligono no creado!'});
                    divContenedorFicha.hide();
                }
            },
            error: function () {
                console.log('Error de petición AJAX - validar clave catastral');
            }
        });
    });

    $('#btnValJefeHogar').click(function () {
        var cbTipoIdentificacion = $('#tipoIdentificacionJefeHogar');
        var txtNumeroIdentificacionJefeHogar = $('#numeroIdentificacionJefeHogar');
        var txtApellidosJefeHogar = $('#apellidosJefeHogar');
        var txtNombresJefeHogar = $('#nombresJefeHogar');
        var valorValidacion = 0;

        if ((cbTipoIdentificacion.val() === 'cedula') || cbTipoIdentificacion.val() === 'pasaporte') {
            valorValidacion = validarCedula(txtNumeroIdentificacionJefeHogar.val());
            if (valorValidacion === 1) {
                txtApellidosJefeHogar.prop('readonly', false);
                txtNombresJefeHogar.prop('readonly', false);

                txtApellidosJefeHogar.focus();
                $.toaster({priority: 'success', title: 'Jefe de Hogar', message: 'Identificación correcta'});
            } else {
                txtApellidosJefeHogar.prop('readonly', true);
                txtNombresJefeHogar.prop('readonly', true);

                txtNumeroIdentificacionJefeHogar.focus();
                $.toaster({priority: 'warning', title: 'Jefe de Hogar', message: 'Identificación correcta'});
            }
        }

    });


    $('#btnGenerarCopropietarios').click(function () {
        var numeroCopropietarios = $('#numeroPropietarios');
        var divContenedorCopropietarios = $('#contenedorCopropietarios');
        var divMostrarCopropietarios = $('#mostrarCopropietarios');
        console.log(numeroCopropietarios.val());
        if (numeroCopropietarios.val() <= 3) {
            divContenedorCopropietarios.show();
            divMostrarCopropietarios.empty();
            for (var i = 1; i <= numeroCopropietarios.val(); i++) {
                var cont = 1;
                var num = cont + i;
                divMostrarCopropietarios.append('<div class="panel panel-default">  \n\
                    <div class="panel-heading">CoPropietario ' + i + '</div>\n\
                    <div class="panel-body">\n\
                        <div class="row"><div class="col-md-12"><div class="col-md-1">\n\
                <div class="form-group">\n\
                    <label for="prop_numero_' + i + '" class="label label-success">Nº</label>\n\
                    <input type="number" min="1" class="form-control" id="copropietario_' + i + '" name="copropietario[' + i + '][numero]" value="' + num + '" readonly>\n\
                </div>\n\
            </div>\n\
            <div class="col-md-1">\n\
            <div class="input-group">\n\
            <label for="prop_alicuota_' + i + '" class="label label-success">% Alícuota</label>\n\
              <br><input type="number" min="1" max="100" class="form-control" id="copropietarioAlicuota_' + i + '" name="copropietario[' + i + '][alicuota]" required >\n\
            </div>\n\
            </div>\n\
\n\         <div class="col-md-3">\n\
            <div class="input-group">\n\
            <label for="prop_alicuota_' + i + '" class="label label-success">Cédula</label>\n\
              <br><input type="text" class="form-control" id="copropietarioNroIdentificacion_' + i + '" name="copropietario[' + i + '][cedula]" >\n\
            </div>\n\
            </div>\n\
            <div class="col-md-3">\n\
                <div class="form-group">\n\
                    <label for="prop_apellidos_' + i + '" class="label label-success">Apellidos</label>\n\
                    <input type="text" class="form-control" id="copropietarioApellidos_' + i + '" name="copropietario[' + i + '][apellidos]" onblur="convertirMayusculas(event, this)" onkeyup="convertirMayusculas(event, this)">\n\
                </div>\n\
            </div>\n\
            <div class="col-md-3">\n\
                <div class="form-group">\n\
                    <label for="prop_nombres_' + i + '" class="label label-success">Nombres</label>\n\
                    <input type="text" class="form-control" id="copropietarioNombres_' + i + '" name="copropietario[' + i + '][nombres]" onblur="convertirMayusculas(event, this)" onkeyup="convertirMayusculas(event, this)">\n\
                </div>\n\
            </div>\n\
</div></div></div></div>');
            }
        } else {
            divContenedorCopropietarios.hide();
            divMostrarCopropietarios.empty();
            $.toaster({priority: 'danger', title: 'Copropietarios', message: 'No se pueden generar más de 3 copropietarios'});
        }

    });

    $('#btnGenerarVias').click(function () {
        var txtNumeroVias = $('#numeroVias').val();
        var divContViasGeneradas = $('#contenedorViasGeneradas');
        var controlador = BASE_URL + '/app/controlador/ajax/generarCamposVias.php';
        if (txtNumeroVias <= 4) {
            $.ajax({
                type: "POST",
                data: "numeroVias=" + txtNumeroVias,
                url: controlador,
                dataType: "html",
                success: function (data) {
                    divContViasGeneradas.append(data);
                    $('#via_1').focus();
                },
                error: function () {
                    console.log('Error de petición AJAX - validar clave catastral');
                }
            });
        } else {
            $('#numeroVias').focus();
            $.toaster({priority: 'danger', title: 'Vías', message: 'Solo se permite generar 4 vías'});
        }
    });

    $('#btnValPropNaturalNroIdentificacion').click(function () {
        var cbTipoIdentificacion = $('#propietarioNaturalTipoIdentificacion');
        var txtPropietarioNaturalNumeroIdentificacion = $('#propietarioNaturalNumeroIdentificacion');
        var txtPropietarioNaturalApellidos = $('#propietarioNaturalApellidos');
        var txtPropietarioNaturalNombre = $('#propietarioNaturalNombre');
        var txtPropietarioNaturalFechaNacimiento = $('#propietarioNaturalFechaNacimiento');
        var cbPropietarioNaturalEstadoCivil = $('#propietarioNaturalEstadoCivil');
        var chkPropietarioNaturalTieneDiscapacidad = $('#propietarioNaturalTieneDiscapacidad');
        var chkPropietarioNaturalDefuncion = $('#propietarioNaturalDefuncion');
        var valorValidacion = 0;

        if ((cbTipoIdentificacion.val() === 'cedula') || cbTipoIdentificacion.val() === 'pasaporte') {
            valorValidacion = validarCedula(txtPropietarioNaturalNumeroIdentificacion.val());
            if (valorValidacion === 1) {
                txtPropietarioNaturalApellidos.prop('readonly', false);
                txtPropietarioNaturalNombre.prop('readonly', false);
                txtPropietarioNaturalFechaNacimiento.prop('readonly', false);
                cbPropietarioNaturalEstadoCivil.prop('disabled', false);
                chkPropietarioNaturalDefuncion.prop('disabled', false);
                chkPropietarioNaturalTieneDiscapacidad.prop('disabled', false);

                $.toaster({priority: 'success', title: 'Propietario Natural', message: 'Identificación correcta'});
                txtPropietarioNaturalApellidos.focus();
            } else {
                txtPropietarioNaturalApellidos.prop('readonly', true);
                txtPropietarioNaturalNombre.prop('readonly', true);
                txtPropietarioNaturalFechaNacimiento.prop('readonly', true);
                cbPropietarioNaturalEstadoCivil.prop('disabled', true);
                chkPropietarioNaturalDefuncion.prop('disabled', true);
                chkPropietarioNaturalTieneDiscapacidad.prop('disabled', true);

                $.toaster({priority: 'warning', title: 'Propietario Natural', message: 'Identificación no válida'});
                txtPropietarioNaturalNumeroIdentificacion.focus();
            }
        }

    });

    $('#btnValidarIdentificacionConyugue').click(function () {
        var cbConyugueTipoIdentificacion = $('#conyuguePropietarioNaturalTipoIdentificacion');
        var txtConyugueNumeroIdentificacion = $('#conyuguePropietarioNaturalNumeroIdentificacion');
        var txtConyuguePropietarioNaturalApellidos = $('#conyuguePropietarioNaturalApellidos');
        var txtConyuguePropietarioNaturalNombres = $('#conyuguePropietarioNaturalNombres');
        var txtConyuguePropietarioNaturalFechaNacimiento = $('#conyuguePropietarioNaturalFechaNacimiento');
        var txtConyuguePropietarioTieneDefuncion = $('#conyuguePropietarioTieneDefuncion');
        var valorValidacion = 0;

        if ((cbConyugueTipoIdentificacion.val() === 'cedula') || cbConyugueTipoIdentificacion.val() === 'pasaporte') {
            valorValidacion = validarCedula(txtConyugueNumeroIdentificacion.val());
            if (valorValidacion === 1) {
                txtConyuguePropietarioNaturalApellidos.prop('readonly', false);
                txtConyuguePropietarioNaturalNombres.prop('readonly', false);
                txtConyuguePropietarioNaturalFechaNacimiento.prop('readonly', false);
                txtConyuguePropietarioTieneDefuncion.prop('disabled', false);

                $.toaster({priority: 'success', title: 'Cónyugue Propietario Natural', message: 'Identificación correcta'});
                txtConyuguePropietarioNaturalApellidos.focus();
            } else {
                txtConyuguePropietarioNaturalApellidos.prop('readonly', true);
                txtConyuguePropietarioNaturalNombres.prop('readonly', true);
                txtConyuguePropietarioNaturalFechaNacimiento.prop('readonly', true);
                txtConyuguePropietarioTieneDefuncion.prop('disabled', true);

                $.toaster({priority: 'warning', title: 'Cónyugue Propietario Natural', message: 'Identificación incorrecta'});
                cbConyugueTipoIdentificacion.focus();
            }
        }
    });

    $('#btnPropietarioJuridicoNroIdentificacion').click(function () {
        var cbPropietarioJuridicoTipoIdentificacion = $('#propietarioJuridicoTipoIdentificacion');
        var txtPropietarioJuridicoNroIdentificacion = $('#propietarioJuridicoNroIdentificacion');
        var txtPropietarioJuridicoRazonSocial = $('#propietarioJuridicoRazonSocial');
        var cbPropietarioJuridicoDominio = $('#propietarioJuridicoDominio');
        var valorValidacion = 0;

        if (cbPropietarioJuridicoTipoIdentificacion.val() === 'ruc') {
            valorValidacion = validarRuc(txtPropietarioJuridicoNroIdentificacion.val());
            if (valorValidacion === 1) {
                txtPropietarioJuridicoRazonSocial.prop('readonly', false);
                cbPropietarioJuridicoDominio.prop('disabled', false);
                cbPropietarioJuridicoDominio.prop('required', true);
                cbPropietarioJuridicoDominio.attr('data-error', 'Por favor seleccione una opción');
                txtPropietarioJuridicoRazonSocial.focus();
                $.toaster({priority: 'success', title: 'Propietario Jurídico', message: 'Identificación correcta'});

            } else {
                txtPropietarioJuridicoRazonSocial.prop('readonly', true);
                cbPropietarioJuridicoDominio.prop('disabled', true);
                cbPropietarioJuridicoDominio.prop('required', false);
                cbPropietarioJuridicoDominio.removeAttr('data-error');
                txtPropietarioJuridicoNroIdentificacion.focus();
                $.toaster({priority: 'warning', title: 'Cónyugue Propietario Natural', message: 'Identificación incorrecta'});

            }
        }


    });

    $('#btnValBeneficiarioNaturalIdentificacion').click(function () {
        var cbMunicipalBeneficiarioNaturalTipoIdentificacion = $('#municipalBeneficiarioNaturalTipoIdentificacion');
        var txtMunicipalBeneficiarioNaturalNroIdentificacion = $('#municipalBeneficiarioNaturalNroIdentificacion');
        var txtMunicipalBeneficiarioNaturalApellidos = $('#municipalBeneficiarioNaturalApellidos');
        var txtMunicipalBeneficiarioNaturalNombres = $('#municipalBeneficiarioNaturalNombres');
        var valorValidacion = 0;
        if ((cbMunicipalBeneficiarioNaturalTipoIdentificacion.val() === 'cedula') || (cbMunicipalBeneficiarioNaturalTipoIdentificacion.val() === 'pasaporte')) {
            valorValidacion = validarCedula(txtMunicipalBeneficiarioNaturalNroIdentificacion.val());
            if (valorValidacion === 1) {
                txtMunicipalBeneficiarioNaturalApellidos.prop('readonly', false);
                txtMunicipalBeneficiarioNaturalNombres.prop('readonly', false);
                txtMunicipalBeneficiarioNaturalApellidos.focus();
                $.toaster({priority: 'success', title: 'Beneficiario Natural', message: 'Identificación correcta'});
            } else {
                txtMunicipalBeneficiarioNaturalApellidos.prop('readonly', true);
                txtMunicipalBeneficiarioNaturalNombres.prop('readonly', true);
                txtMunicipalBeneficiarioNaturalNroIdentificacion.focus();
                $.toaster({priority: 'warning', title: 'Beneficiario Natural', message: 'Identificación incorrecta'});
            }
        }
    });

    $('#btnValBeneficiarioJuridicaIdentificacion').click(function () {
        var cbMunicipalBeneficiarioJuridicaTipoIdentificacion = $('#municipalBeneficiarioJuridicaTipoIdentificacion');
        var txtMunicipalBeneficiarioJuridicaNroIdentificacion = $('#municipalBeneficiarioJuridicaNroIdentificacion');
        var txtMunicipalBeneficiarioJuridicaRazonSocial = $('#municipalBeneficiarioJuridicaRazonSocial');
        var valorValidacion = 0;
        if (cbMunicipalBeneficiarioJuridicaTipoIdentificacion.val() === 'ruc') {
            valorValidacion = validarRuc(txtMunicipalBeneficiarioJuridicaNroIdentificacion.val());
            if (valorValidacion === 1) {
                txtMunicipalBeneficiarioJuridicaRazonSocial.prop('readonly', false);
                txtMunicipalBeneficiarioJuridicaRazonSocial.focus();
                $.toaster({priority: 'success', title: 'Beneficiario Natural', message: 'Identificación correcta'});
            } else {
                txtMunicipalBeneficiarioJuridicaRazonSocial.prop('readonly', true);
                txtMunicipalBeneficiarioJuridicaRazonSocial.focus();
                $.toaster({priority: 'warning', title: 'Beneficiario Natural', message: 'Identificación incorrecta'});
            }
        }
    });

    $('#btnGenerarBloques').click(function () {
        var provincia = $('#clvProvincia').val();
        var canton = $('#clvCanton').val();
        var parroquia = $('#clvParroquia').val();
        var zona = $('#clvZona').val();
        var sector = $('#clvSector').val();
        var manzana = $('#clvManzana').val();
        var lote = $('#clvLote').val();
        var claveCatastral = provincia + canton + zona + sector + manzana + lote;
        var divContBloquesGenerados = $('#contBloquesGenerados');
        var numeroBloques = $('#numeroBloques').val();
        var txtEdificacionesAreaBloque_1 = $('#edificacionesAreaBloque_1');

        var controlador = BASE_URL + '/app/controlador/ajax/generarCamposBloques.php';

        console.log(numeroBloques);

        if (numeroBloques <= 5) {
            $.ajax({
                type: "POST",
                data: "numeroBloques=" + numeroBloques + "&claveCatastral=" + claveCatastral,
                url: controlador,
                dataType: "html",
                success: function (data) {
                    divContBloquesGenerados.html(data);
                    divContBloquesGenerados.validator(); //ojo validar
                    txtEdificacionesAreaBloque_1.focus();

                    for (i = 1; i <= numeroBloques; i++) {
                        $('#edificacionesAreaBloque_' + i).prop('required', true);
                        $('#edificacionesNroPisosBloque_' + i).prop('required', true);
                        $('#edificacionesUsoContruccionBloque_' + i).prop('required', true);
                        $('#edificacionesEstadoDeLaConservacionBloque_' + i).prop('required', true);
                        $('#edificacionesAnioConstruccionBloque_' + i).prop('required', true);
                        $('#edificacionesEtapaConstruccionBloque_' + i).prop('required', true);
                    }
                },
                error: function () {
                    divContBloquesGenerados.empty();
                    console.log('Error de petición AJAX - generar bloques');
                }
            });
        } else {
            divContBloquesGenerados.empty();
            $.toaster({priority: 'warning', title: 'Generar bloques', message: 'El número de bloques supera el límite permitido: 5'});
        }


    });

    $('#btnGenerarMejoras').click(function () {
        var divContMejorasGeneradas = $('#contMejorasGeneradas');
        var numeroMejoras = $('#numeroMejoras').val();
        var cbEdificacionesMejoraTipoMejoraBloque_1 = $('#edificacionesMejoraTipoMejoraBloque_1');

        var controlador = BASE_URL + '/app/controlador/ajax/generarCamposMejoras.php';

        $.ajax({
            type: "POST",
            data: "numeroMejoras=" + numeroMejoras,
            url: controlador,
            dataType: "html",
            success: function (data) {
                divContMejorasGeneradas.append(data);
                divContMejorasGeneradas.validator();
                cbEdificacionesMejoraTipoMejoraBloque_1.focus();
            },
            error: function () {
                divContMejorasGeneradas.empty();
                console.log('Error de petición AJAX - generar mejoras');
            }
        });
    });

});

function obtenerNumeroPredio() {
    var provincia = $('#clvProvincia').val();
    var canton = $('#clvCanton').val();
    var parroquia = $('#clvParroquia').val();
    var zona = $('#clvZona').val();
    var sector = $('#clvSector').val();
    var manzana = $('#clvManzana').val();
    var lote = $('#clvLote').val();
    var txtNroPredio = $('#codigoPredio');
    var claveCatastral = provincia + canton + parroquia + zona + sector + manzana + lote;
    var controlador = BASE_URL + 'app/controlador/ajax/obtenerNumeroPredio.php';

    $.ajax({
        type: "POST",
        data: "claveCatastral=" + claveCatastral,
        url: controlador,
        dataType: "html",
        error: function () {
            console.log(claveCatastral + " ERROR ");
        },
        success: function (data) {
            var nuevoNumPredio = parseInt(data) + 1;
            var predioUno = parseInt('1');
            if (data !== 0) {
                txtNroPredio.val('000' + nuevoNumPredio);
            } else if (data === 0) {
                txtNroPredio.val('000' + predioUno);
            }
        }
    });
}

function obtenerNumeroBloques() {

    var provincia = $('#clvProvincia').val();
    var canton = $('#clvCanton').val();
    var parroquia = $('#clvParroquia').val();
    var zona = $('#clvZona').val();
    var sector = $('#clvSector').val();
    var manzana = $('#clvManzana').val();
    var lote = $('#clvLote').val();
    var txtNroBloques = $('#numeroBloques');
    var divContGenerarBloques = $('#contGenerarBloques');
    var divContGenerarMejoras = $('#contGenerarMejoras');
    var divMsjLoteVacio = $('#msjLoteVacio');
    var claveCatastral = provincia + canton + parroquia + zona + sector + manzana + lote;
    var controlador = BASE_URL + 'app/controlador/ajax/obtenerNumeroBloques.php';
    $.ajax({
        type: "POST",
        data: "claveCatastral=" + claveCatastral,
        url: controlador,
        dataType: "html",
        error: function () {
            console.log('error consultando numero de bloques');
        },
        success: function (data) {
            if (parseInt(data) !== 0) {
                txtNroBloques.val(data);
                txtNroBloques.prop("readonly", true);
                divMsjLoteVacio.empty();
                divContGenerarBloques.show();
                divContGenerarMejoras.show();
            } else if (parseInt(data) === 0) {
                divMsjLoteVacio.empty();
                divMsjLoteVacio.append('<center><h4>No existen bloques. Lote vacío<h4></center>');
                divContGenerarBloques.hide();
                divContGenerarMejoras.hide();
            }
        }
    });

}
