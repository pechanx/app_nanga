function ctrlLoteConflicto() {
    var chkLoteConlicto = $('#loteEnConflicto');
    var txtObsLoteConflicto = $('#observacionesLoteConflicto');

    if (chkLoteConlicto.is(':checked')) {
        txtObsLoteConflicto.prop('disabled', false);
        txtObsLoteConflicto.focus();
    } else {
        txtObsLoteConflicto.prop('disabled', true);
    }
}

function ctrlCondicionOcupacion() {
    var cbCondicionOcupacion = $('#condicionDeOcupacion').val();
    var txtNumeroHabitantes = $('#numeroHabitantes');
    var txtNumeroMedidoresAgua = $('#numeroMedidoresAgua');
    var divJefeHogar = $('#contenedorJefeHogar');
    var cbTipoIdentificacionJefeHogar = $('#tipoIdentificacionJefeHogar');
    var txtNumeroIdentificacionJefeHogar = $('#numeroIdentificacionJefeHogar');

    if (cbCondicionOcupacion === '1' || cbCondicionOcupacion === '3') {
        divJefeHogar.show();
        txtNumeroHabitantes.prop('disabled', false);
        txtNumeroHabitantes.focus();
        cbTipoIdentificacionJefeHogar.prop('required', true);
        cbTipoIdentificacionJefeHogar.attr('data-error', 'Seleccione una opción');
        txtNumeroIdentificacionJefeHogar.prop('required', true);
        txtNumeroIdentificacionJefeHogar.attr('data-error', 'Ingrese la identificación');
    } else {
        divJefeHogar.hide();
        txtNumeroHabitantes.prop('disabled', true);
        txtNumeroMedidoresAgua.focus();
        cbTipoIdentificacionJefeHogar.prop('required', false);
        cbTipoIdentificacionJefeHogar.removeAttr('data-error');
        txtNumeroIdentificacionJefeHogar.prop('required', false);
        txtNumeroIdentificacionJefeHogar.removeAttr('data-error');
    }

}

function ctrlFormaAdquisicionChkSinPerfeccionar() {
    var chkSinPerfeccionar = $('#sinPerfeccionar');
    var divContInscripcionFormaAdquisicion = $('#contInscripcionFormaAdquisicion');
    var cbFormAdquisicionInscripcionCanton = $('#formAdquisicionInscripcionCanton');
    var txtFormAdquisicionInscripcionMatricula = $('#formAdquisicionInscripcionMatricula');
    var txtFormAdquisicionInscripcionLibro = $('#formAdquisicionInscripcionLibro');
    var txtFormAdquisicionInscripcionFoja = $('#formAdquisicionInscripcionFoja');
    var txtFormAdquisicionInscripcionFecha = $('#formAdquisicionInscripcionFecha');
    var classCtrlBloqError = $('.ctrlInscripcionBloqError');

    if (chkSinPerfeccionar.is(':checked')) {
        divContInscripcionFormaAdquisicion.hide();
        cbFormAdquisicionInscripcionCanton.prop('required', false);
        txtFormAdquisicionInscripcionMatricula.prop('required', false);
        txtFormAdquisicionInscripcionLibro.prop('required', false);
        txtFormAdquisicionInscripcionFoja.prop('required', false);
        txtFormAdquisicionInscripcionFecha.prop('required', false);

        cbFormAdquisicionInscripcionCanton.removeAttr('data-error');
        txtFormAdquisicionInscripcionMatricula.removeAttr('data-error');
        txtFormAdquisicionInscripcionLibro.removeAttr('data-error');
        txtFormAdquisicionInscripcionFoja.removeAttr('data-error');
        txtFormAdquisicionInscripcionFecha.removeAttr('data-error');
    } else {
        divContInscripcionFormaAdquisicion.show();
        cbFormAdquisicionInscripcionCanton.prop('required', true);
        txtFormAdquisicionInscripcionMatricula.prop('required', true);
        txtFormAdquisicionInscripcionLibro.prop('required', true);
        txtFormAdquisicionInscripcionFoja.prop('required', true);
        txtFormAdquisicionInscripcionFecha.prop('required', true);

        cbFormAdquisicionInscripcionCanton.attr('data-error', 'Por favor seleccione una opción');
        txtFormAdquisicionInscripcionMatricula.attr('data-error', 'Por favor ingrese el campo obligatorio');
        txtFormAdquisicionInscripcionLibro.attr('data-error', 'Por favor ingrese el campo obligatorio');
        txtFormAdquisicionInscripcionFoja.attr('data-error', 'Por favor ingrese el campo obligatorio');
        txtFormAdquisicionInscripcionFecha.attr('data-error', 'Por favor ingrese el campo obligatorio');

    }

}

function ctrlPropietarioPoseedor() {
    var divContenedorFormaAdquisicion = $('#contenedorFormaAdquisicion');
    var divContenedorPersoneria = $('#contPersoneria');
    var divContNumeroPropietarios = $('#contNumeroPropietarios');
    var divContPropietarioAlicuota = $('#contPropietarioAlicuota');
    var divContPropietarioPrecioCompra = $('#contPropietarioPrecioCompraComercial');
    var divContenedorPoseedor = $('#contenedorPoseedor');
    //var divContPropietarioNatural = $('#contenedorPropietarioNatural');
    var rdPropietarioConTitulo = $('#propietarioConTitulo');
    var rdPropietarioDesconocido = $('#propietarioDesconocido');
    var cbPersoneriaPropietario = $('#personeriaPropietario');
    var cbFormAdquisicionInscripcionCanton = $('#formAdquisicionInscripcionCanton');
    var txtFormAdquisicionInscripcionMatricula = $('#formAdquisicionInscripcionMatricula');
    var txtFormAdquisicionInscripcionLibro = $('#formAdquisicionInscripcionLibro');
    var txtFormAdquisicionInscripcionFoja = $('#formAdquisicionInscripcionFoja');
    var txtFormAdquisicionInscripcionFecha = $('#formAdquisicionInscripcionFecha');
    var cbFormaAdquisicionProtocolizacionCelebradoAnte = $('#formaAdquisicionProtocolizacionCelebradoAnte');
    var txtFormaAdquisicionProtocolizacionCanton = $('#formaAdquisicionProtocolizacionCanton');
    var txtFormaAdquisicionProtocolizacionNotaria = $('#formaAdquisicionProtocolizacionNotaria');
    var txtformaAdquisicionProtocolizacionFecha = $('#formaAdquisicionProtocolizacionFecha');
    var txtPropietarioAlicuota = $('#propietarioAlicuota');
    var txtPropietarioPrecioCompraComercial = $('#propietarioPrecioCompraComercial');
    var cbTipoPoseedor = $('#tipoPoseedor');
    
    var divContenedorPropietarioNatural = $('#contenedorPropietarioNatural');
    var cbPropietarioNaturalTipoIdentificacion = $('#propietarioNaturalTipoIdentificacion');
    var txtPropietarioNaturalNumeroIdentificacion = $('#propietarioNaturalNumeroIdentificacion');

    if (rdPropietarioConTitulo.is(':checked')) {
        divContenedorFormaAdquisicion.show();
        divContenedorPersoneria.show();
        divContNumeroPropietarios.show();
        divContPropietarioAlicuota.show();
        divContPropietarioPrecioCompra.show();
        divContenedorPoseedor.hide();
        divContenedorPropietarioNatural.hide();
        //divContPropietarioNatural.show();

        cbPersoneriaPropietario.prop('required', true);
        cbFormaAdquisicionProtocolizacionCelebradoAnte.prop('required', true);
        txtFormaAdquisicionProtocolizacionCanton.prop('required', true);
        txtFormaAdquisicionProtocolizacionNotaria.prop('required', true);
        txtformaAdquisicionProtocolizacionFecha.prop('required', true);
        cbFormAdquisicionInscripcionCanton.prop('required', true);
        txtFormAdquisicionInscripcionMatricula.prop('required', true);
        txtFormAdquisicionInscripcionLibro.prop('required', true);
        txtFormAdquisicionInscripcionFoja.prop('required', true);
        txtFormAdquisicionInscripcionFecha.prop('required', true);
        cbTipoPoseedor.prop('required', false);
        cbPropietarioNaturalTipoIdentificacion.prop('required', false);
        txtPropietarioNaturalNumeroIdentificacion.prop('required', false);

        cbPersoneriaPropietario.val();

        cbPersoneriaPropietario.attr('data-error', 'Por favor seleccione una opción');
        cbFormaAdquisicionProtocolizacionCelebradoAnte.attr('data-error', 'Por favor seleccione una opción');
        txtFormaAdquisicionProtocolizacionCanton.attr('data-error', 'Por favor ingrese el campo obligatorio');
        txtFormaAdquisicionProtocolizacionNotaria.attr('data-error', 'Por favor ingrese el campo obligatorio');
        txtformaAdquisicionProtocolizacionFecha.attr('data-error', 'Por favor ingrese el campo obligatorio');
        cbTipoPoseedor.removeAttr('data-error');

        cbPersoneriaPropietario.focus();

    } else if (rdPropietarioDesconocido.is(':checked')) {
        divContenedorFormaAdquisicion.hide();
        divContenedorPersoneria.show();
        
        $("#contPersoneria option[value='juridica']").attr('disabled', true);
        
        divContNumeroPropietarios.hide();
        divContPropietarioAlicuota.hide();
        divContPropietarioPrecioCompra.hide();
        divContenedorPoseedor.show();
        divContenedorPropietarioNatural.hide();
        //divContPropietarioNatural.hide();

        cbPersoneriaPropietario.prop('required', false);
        cbFormaAdquisicionProtocolizacionCelebradoAnte.prop('required', false);
        txtFormaAdquisicionProtocolizacionCanton.prop('required', false);
        txtFormaAdquisicionProtocolizacionNotaria.prop('required', false);
        txtformaAdquisicionProtocolizacionFecha.prop('required', false);
        cbFormAdquisicionInscripcionCanton.prop('required', false);
        txtFormAdquisicionInscripcionMatricula.prop('required', false);
        txtFormAdquisicionInscripcionLibro.prop('required', false);
        txtFormAdquisicionInscripcionFoja.prop('required', false);
        txtFormAdquisicionInscripcionFecha.prop('required', false);
        cbTipoPoseedor.prop('required', true);
        cbTipoPoseedor.focus();
        
        cbPropietarioNaturalTipoIdentificacion.prop('required', true);
        txtPropietarioNaturalNumeroIdentificacion.prop('required', true);

        cbPersoneriaPropietario.val();

        cbPersoneriaPropietario.removeAttr('data-error');
        cbFormaAdquisicionProtocolizacionCelebradoAnte.removeAttr('data-error');
        txtFormaAdquisicionProtocolizacionCanton.removeAttr('data-error');
        txtFormaAdquisicionProtocolizacionNotaria.removeAttr('data-error');
        txtformaAdquisicionProtocolizacionFecha.removeAttr('data-error');
        cbTipoPoseedor.attr('data-error', 'Por favor ingrese el campo obligatorio');
    }
}

function ctrlPersoneriaPropietario() { // Pendiente los campos obligatorios de persona juridica y poseedor
    var divContPersonaNatural = $('#contenedorPropietarioNatural');
    var divContPersonaJuridica = $('#contenedorPropietarioJuridico');
    var divContPoseedor = $('#contenedorPoseedor');
    var cbPropietarioPersoneria = $('#personeriaPropietario');
    var cbPropietarioNaturalTipoIdentificacion = $('#propietarioNaturalTipoIdentificacion');
    var txtPropietarioNaturalNumeroIdentificacion = $('#propietarioNaturalNumeroIdentificacion');
    var cbPropietarioJuridicoTipoIdentificacion = $('#propietarioJuridicoTipoIdentificacion');
    var txtPropietarioJuridicoNroIdentificacion = $('#propietarioJuridicoNroIdentificacion');
    
    var chkPropietarioDesconocido = $('#propietarioDesconocido');

    var divContNumeroPropietarios = $('#contNumeroPropietarios');

    if (cbPropietarioPersoneria.val() === 'natural') {
        divContPersonaNatural.show();
        divContPersonaJuridica.hide();

        cbPropietarioNaturalTipoIdentificacion.prop('required', true);
        txtPropietarioNaturalNumeroIdentificacion.prop('required', true);

        cbPropietarioNaturalTipoIdentificacion.attr('data-error', 'Por favor seleccione una opción');
        txtPropietarioNaturalNumeroIdentificacion.attr('data-error', 'Por favor ingrese el campo obligatorio');

        cbPropietarioJuridicoTipoIdentificacion.prop('required', false);
        txtPropietarioJuridicoNroIdentificacion.prop('required', false);
        cbPropietarioJuridicoTipoIdentificacion.removeAttr('data-error');
        txtPropietarioJuridicoNroIdentificacion.removeAttr('data-error');

        divContNumeroPropietarios.show();
        
        if(chkPropietarioDesconocido.is(':checked')){
            divContNumeroPropietarios.hide();
        }else{
            divContNumeroPropietarios.show();
        }

    } else {
        divContPersonaNatural.hide();
        divContPersonaJuridica.show();
        divContNumeroPropietarios.hide();

        cbPropietarioNaturalTipoIdentificacion.prop('required', false);
        txtPropietarioNaturalNumeroIdentificacion.prop('required', false);
        cbPropietarioNaturalTipoIdentificacion.removeAttr('data-error');
        txtPropietarioNaturalNumeroIdentificacion.removeAttr('data-error');

        cbPropietarioJuridicoTipoIdentificacion.prop('required', true);
        txtPropietarioJuridicoNroIdentificacion.prop('required', true);
        cbPropietarioJuridicoTipoIdentificacion.attr('data-error', 'Por favor seleccione una opción');
        txtPropietarioJuridicoNroIdentificacion.attr('data-error', 'Por favor ingrese el campo obligatorio');
    }

}

function ctrlPropietarioNaturalTipoIdentificacion() {
    var txtPropietarioNaturalApellidos = $('#propietarioNaturalApellidos');
    var txtPropietarioNaturalNombre = $('#propietarioNaturalNombre');
    var txtPropietarioNaturalFechaNacimiento = $('#propietarioNaturalFechaNacimiento');
    var cbPropietarioNaturalEstadoCivil = $('#propietarioNaturalEstadoCivil');
    var chkPropietarioNaturalTieneDiscapacidad = $('#propietarioNaturalTieneDiscapacidad');
    var chkPropietarioNaturalDefuncion = $('#propietarioNaturalDefuncion');
    var cbPropietarioNaturalTipoIdentificacion = $('#propietarioNaturalTipoIdentificacion');
    var divContBtnValPropNaturalNroIdentificacion = $('#contBtnValPropNaturalNroIdentificacion');

    if ((cbPropietarioNaturalTipoIdentificacion.val() === 'cedula') || (cbPropietarioNaturalTipoIdentificacion.val() === 'pasaporte')) {
        txtPropietarioNaturalApellidos.prop('readonly', true);
        txtPropietarioNaturalNombre.prop('readonly', true);
        txtPropietarioNaturalFechaNacimiento.prop('readonly', true);
        cbPropietarioNaturalEstadoCivil.prop('disabled', true);
        chkPropietarioNaturalDefuncion.prop('disabled', true);
        chkPropietarioNaturalTieneDiscapacidad.prop('disabled', true);
        divContBtnValPropNaturalNroIdentificacion.show();
    } else {
        txtPropietarioNaturalApellidos.prop('readonly', false);
        txtPropietarioNaturalNombre.prop('readonly', false);
        txtPropietarioNaturalFechaNacimiento.prop('readonly', false);
        cbPropietarioNaturalEstadoCivil.prop('disabled', false);
        chkPropietarioNaturalDefuncion.prop('disabled', false);
        chkPropietarioNaturalTieneDiscapacidad.prop('disabled', false);
        divContBtnValPropNaturalNroIdentificacion.hide();
    }


}

function ctrlTieneDiscapacidad() {
    var chkTieneDiscapacidad = $('#propietarioNaturalTieneDiscapacidad');
    var txtNroCarnet = $('#propietarioNaturalDiscapacidadNroCarnet');
    var divContDatosDiscapacidad = $('#contDatosDiscapacidad');

    if (chkTieneDiscapacidad.is(':checked')) {
        divContDatosDiscapacidad.show();
        txtNroCarnet.focus();
    } else {
        divContDatosDiscapacidad.hide();
        chkTieneDiscapacidad.focus();
    }
}

function ctrlTieneDefuncion() {
    var chkTieneDefuncion = $('#propietarioNaturalDefuncion');
    var divContFechaDefuncionPropietario = $('#contFechaDefuncionPropietario');
    var txtPropietarioNaturalFechaDefuncion = $('#propietarioNaturalFechaDefuncion');

    if (chkTieneDefuncion.is(':checked')) {
        divContFechaDefuncionPropietario.show();
        txtPropietarioNaturalFechaDefuncion.focus();
    } else {
        divContFechaDefuncionPropietario.hide();
        chkTieneDefuncion.focus();
    }
}

function ctrlTipoIdentificacionJefeHogar() {
    var cbTipoIdentificacion = $('#tipoIdentificacionJefeHogar');
    var txtApellidosJefeHogar = $('#apellidosJefeHogar');
    var txtNombresJefeHogar = $('#nombresJefeHogar');
    var divConBtnValidarJefeHogar = $('#conBtnValidarJefeHogar');
    
    if(cbTipoIdentificacion.val() == 'cedula' || cbTipoIdentificacion.val() == 'pasaporte'){
        txtApellidosJefeHogar.prop('readonly', true);
        txtNombresJefeHogar.prop('readonly', true);
        divConBtnValidarJefeHogar.show();
    }else{
         txtApellidosJefeHogar.prop('readonly', false);
        txtNombresJefeHogar.prop('readonly', false);
        divConBtnValidarJefeHogar.hide();
    }
}

function ctrlEstadoCivilPropietario() {
    var cbPropietarioNaturalEstadoCivil = $('#propietarioNaturalEstadoCivil');
    var divContDatosConyugue = $('#contDatosConyugue');
    var cbConyugueTipoIdentificacion = $('#conyuguePropietarioNaturalTipoIdentificacion');
    var txtConyugueNumeroIdentificacion = $('#conyuguePropietarioNaturalNumeroIdentificacion');

    if (cbPropietarioNaturalEstadoCivil.val() === 'casado' || cbPropietarioNaturalEstadoCivil.val() === 'union de hecho') {
        divContDatosConyugue.show();

        cbConyugueTipoIdentificacion.prop('required', true);
        txtConyugueNumeroIdentificacion.prop('required', true);

        cbConyugueTipoIdentificacion.attr('data-error', 'Por favor seleccione una opción');
        txtConyugueNumeroIdentificacion.attr('data-error', 'Por favor ingrese el campo obligatorio');
    } else {
        divContDatosConyugue.hide();

        cbConyugueTipoIdentificacion.prop('required', false);
        txtConyugueNumeroIdentificacion.prop('required', false);

        cbConyugueTipoIdentificacion.removeAttr('data-error');
        txtConyugueNumeroIdentificacion.removeAttr('data-error');
    }

}

function ctrlConyugueDefuncion() {
    var chkConyugueDefuncion = $('#conyuguePropietarioTieneDefuncion');
    var txtConyugueFechaDefuncion = $('#conyuguePropietarioFechaDefuncion');
    var divContConyugueFechaDefuncion = $('#contConyugueFechaDefuncion');

    if (chkConyugueDefuncion.is(':checked')) {
        divContConyugueFechaDefuncion.show();
        txtConyugueFechaDefuncion.focus();
    } else {
        divContConyugueFechaDefuncion.hide();
        chkConyugueDefuncion.focus();
    }
}

function ctrlConyugueTipoIdentificacion() {
    var cbConyuguePropietarioNaturalTipoIdentificacion = $('#conyuguePropietarioNaturalTipoIdentificacion');
    var txtConyuguePropietarioNaturalApellidos = $('#conyuguePropietarioNaturalApellidos');
    var txtConyuguePropietarioNaturalNombres = $('#conyuguePropietarioNaturalNombres');
    var txtConyuguePropietarioNaturalFechaNacimiento = $('#conyuguePropietarioNaturalFechaNacimiento');
    var chkConyuguePropietarioTieneDefuncion = $('#conyuguePropietarioTieneDefuncion');
    var divContValidarIdentificacionConyugue = $('#contValidarIdentificacionConyugue');
    
    if ((cbConyuguePropietarioNaturalTipoIdentificacion.val() === 'cedula') || (cbConyuguePropietarioNaturalTipoIdentificacion.val() === 'pasaporte')) {
        txtConyuguePropietarioNaturalApellidos.prop('readonly', true);
        txtConyuguePropietarioNaturalNombres.prop('readonly', true);
        txtConyuguePropietarioNaturalFechaNacimiento.prop('readonly', true);
        chkConyuguePropietarioTieneDefuncion.prop('disabled', true);
        divContValidarIdentificacionConyugue.show();
    } else {
        txtConyuguePropietarioNaturalApellidos.prop('readonly', false);
        txtConyuguePropietarioNaturalNombres.prop('readonly', false);
        txtConyuguePropietarioNaturalFechaNacimiento.prop('readonly', false);
        chkConyuguePropietarioTieneDefuncion.prop('disabled', false);
        divContValidarIdentificacionConyugue.hide();
    }

}

function ctrlPropietarioJuridicoTipoIdentificacion() {
    var cbPropietarioJuridicoTipoIdentificacion = $('#propietarioJuridicoTipoIdentificacion');
    var txtPropietarioJuridicoNroIdentificacion = $('#propietarioJuridicoNroIdentificacion');
    var txtPropietarioJuridicoRazonSocial = $('#propietarioJuridicoRazonSocial');
    var cbPropietarioJuridicoDominio = $('#propietarioJuridicoDominio');
    var divContValPropietarioJuridicoNroIdentificacion = $('#contValBtnPropietarioJuridicoNroIdentificacion');

    if (cbPropietarioJuridicoTipoIdentificacion.val() === 'otro') {
        divContValPropietarioJuridicoNroIdentificacion.hide();

        txtPropietarioJuridicoRazonSocial.prop('readonly', false);
        cbPropietarioJuridicoDominio.prop('disabled', false);
    } else {
        divContValPropietarioJuridicoNroIdentificacion.show();

        txtPropietarioJuridicoRazonSocial.prop('readonly', true);
        cbPropietarioJuridicoDominio.prop('disabled', true);
    }
}

function ctrlDominioPersonaJuridica() {
    var cbPropietarioJuridicoDominio = $('#propietarioJuridicoDominio');
    var divContDominioMunicipal = $('#contDominioMunicipal');
    var cbPropietarioJuridicoCondicionMunicipal = $('#propietarioJuridicoCondicionMunicipal');
    var cbMunicipalProtocolizacionCelebradoAnte = $('#municipalProtocolizacionCelebradoAnte');
    var cbMunicipalProtocolizacionCanton = $('#municipalProtocolizacionCanton');
    var txtMunicipalProtocolizacionNotaria = $('#municipalProtocolizacionNotaria');
    var txtMunicipalProtocolizacionFecha = $('#municipalProtocolizacionFecha');
    var txtMunicipalInscripcionCanton = $('#municipalInscripcionCanton');
    var cbMunicipalInscripcionMatricula = $('#municipalInscripcionMatricula');
    var txtMunicipalInscripcionLibro = $('#municipalInscripcionLibro');
    var txtMunicipalInscripcionFoja = $('#municipalInscripcionFoja');
    var txtMunicipalInscripcionFecha = $('#municipalInscripcionFecha');


    if ((cbPropietarioJuridicoDominio.val() === 'privado') || (cbPropietarioJuridicoDominio.val() === 'publico')) {
        divContDominioMunicipal.hide();
        cbPropietarioJuridicoCondicionMunicipal.removeAttr('data-error');

        cbMunicipalProtocolizacionCelebradoAnte.prop('required', false);
        cbMunicipalProtocolizacionCanton.prop('required', false);
        txtMunicipalProtocolizacionNotaria.prop('required', false);
        txtMunicipalProtocolizacionFecha.prop('required', false);
        txtMunicipalInscripcionCanton.prop('required', false);
        cbMunicipalInscripcionMatricula.prop('required', false);
        txtMunicipalInscripcionLibro.prop('required', false);
        txtMunicipalInscripcionFoja.prop('required', false);
        txtMunicipalInscripcionFecha.prop('required', false);

        cbMunicipalProtocolizacionCelebradoAnte.removeAttr('data-error');
        cbMunicipalProtocolizacionCanton.removeAttr('data-error');
        txtMunicipalProtocolizacionNotaria.removeAttr('data-error');
        txtMunicipalProtocolizacionFecha.removeAttr('data-error');
        txtMunicipalInscripcionCanton.removeAttr('data-error');
        cbMunicipalInscripcionMatricula.removeAttr('data-error');
        txtMunicipalInscripcionLibro.removeAttr('data-error');
        txtMunicipalInscripcionFoja.removeAttr('data-error');
        txtMunicipalInscripcionFecha.removeAttr('data-error');
    } else {
        divContDominioMunicipal.show();
        cbPropietarioJuridicoCondicionMunicipal.attr('data-error', 'Por favor seleccione una opción');

        cbMunicipalProtocolizacionCelebradoAnte.prop('required', true);
        cbMunicipalProtocolizacionCanton.prop('required', true);
        txtMunicipalProtocolizacionNotaria.prop('required', true);
        txtMunicipalProtocolizacionFecha.prop('required', true);
        txtMunicipalInscripcionCanton.prop('required', true);
        cbMunicipalInscripcionMatricula.prop('required', true);
        txtMunicipalInscripcionLibro.prop('required', true);
        txtMunicipalInscripcionFoja.prop('required', true);
        txtMunicipalInscripcionFecha.prop('required', true);

        cbMunicipalProtocolizacionCelebradoAnte.attr('data-error', 'Por favor seleccione una opción');
        cbMunicipalProtocolizacionCanton.attr('data-error', 'Por favor seleccione una opción');
        txtMunicipalProtocolizacionNotaria.attr('data-error', 'Por favor ingrese el campo obligatorio');
        txtMunicipalProtocolizacionFecha.attr('data-error', 'Por favor ingrese el campo obligatorio');
        txtMunicipalInscripcionCanton.attr('data-error', 'Por favor ingrese el campo obligatorio');
        cbMunicipalInscripcionMatricula.attr('data-error', 'Por favor seleccione una opción');
        txtMunicipalInscripcionLibro.attr('data-error', 'Por favor ingrese el campo obligatorio');
        txtMunicipalInscripcionFoja.attr('data-error', 'Por favor ingrese el campo obligatorio');
        txtMunicipalInscripcionFecha.attr('data-error', 'Por favor ingrese el campo obligatorio');

    }
}

function ctrlPropietarioJuridicoCondicionMunicipal() {
    var cbPropietarioJuridicoCondicionMunicipal = $('#propietarioJuridicoCondicionMunicipal');
    var divContBeneficiaro = $('#contBeneficiaro');
    var cbMunicipalBeneficiarioPersoneria = $('#municipalBeneficiarioPersoneria');

    if ((cbPropietarioJuridicoCondicionMunicipal.val() === '2') || (cbPropietarioJuridicoCondicionMunicipal.val() === '3')) { //Arrendatario o comodato
        divContBeneficiaro.show();
        cbMunicipalBeneficiarioPersoneria.prop('required', true);
        cbMunicipalBeneficiarioPersoneria.attr('data-error', 'Por favor seleccione una opción');
    } else {
        divContBeneficiaro.hide();
        cbMunicipalBeneficiarioPersoneria.prop('required', false);
        cbMunicipalBeneficiarioPersoneria.removeAttr('data-error');
    }
}

function ctrlMunicipalBeneficiarioPersoneria() {
    var cbMunicipalBeneficiarioPersoneria = $('#municipalBeneficiarioPersoneria');
    var cbMunicipalBeneficiarioJuridicaTipoIdentificacion = $('#municipalBeneficiarioJuridicaTipoIdentificacion');
    var txtMunicipalBeneficiarioJuridicaNroIdentificacion = $('#municipalBeneficiarioJuridicaNroIdentificacion');
    var cbMunicipalBeneficiarioNaturalTipoIdentificacion = $('#municipalBeneficiarioNaturalTipoIdentificacion');
    var txtMunicipalBeneficiarioNaturalNroIdentificacion = $('#municipalBeneficiarioNaturalNroIdentificacion');
    var divContMunicipalBeneficiarioJuridica = $('#contMunicipalBeneficiarioJuridica');
    var divContMunicipalBeneficiarioNatural = $('#contMunicipalBeneficiarioNatural');

    if (cbMunicipalBeneficiarioPersoneria.val() === 'natural') {
        cbMunicipalBeneficiarioNaturalTipoIdentificacion.prop('required', true);
        txtMunicipalBeneficiarioNaturalNroIdentificacion.prop('required', true);
        cbMunicipalBeneficiarioJuridicaTipoIdentificacion.prop('required', false);
        txtMunicipalBeneficiarioJuridicaNroIdentificacion.prop('required', false);
        divContMunicipalBeneficiarioNatural.show();
        divContMunicipalBeneficiarioJuridica.hide();

        cbMunicipalBeneficiarioNaturalTipoIdentificacion.attr('data-error', 'Por favor seleccione una opción');
        txtMunicipalBeneficiarioNaturalNroIdentificacion.attr('data-error', 'Por favor ingrese el campo obligatorio');
        cbMunicipalBeneficiarioJuridicaTipoIdentificacion.removeAttr('data-error');
        txtMunicipalBeneficiarioJuridicaNroIdentificacion.removeAttr('data-error');

    } else {
        cbMunicipalBeneficiarioNaturalTipoIdentificacion.prop('required', false);
        txtMunicipalBeneficiarioNaturalNroIdentificacion.prop('required', false);
        cbMunicipalBeneficiarioJuridicaTipoIdentificacion.prop('required', true);
        txtMunicipalBeneficiarioJuridicaNroIdentificacion.prop('required', true);
        divContMunicipalBeneficiarioNatural.hide();
        divContMunicipalBeneficiarioJuridica.show();

        cbMunicipalBeneficiarioNaturalTipoIdentificacion.removeAttr('data-error');
        txtMunicipalBeneficiarioNaturalNroIdentificacion.removeAttr('data-error');
        cbMunicipalBeneficiarioJuridicaTipoIdentificacion.attr('data-error', 'Por favor seleccione una opción');
        txtMunicipalBeneficiarioJuridicaNroIdentificacion.attr('data-error', 'Por favor ingrese el campo obligatorio');
    }
}

function ctrlMunicipalSinPerfeccionar() {
    var chkPropietarioJuridicoMunicipalSinPerfeccionar = $('#propietarioJuridicoMunicipalSinPerfeccionar');
    var cbMunicipalProtocolizacionCelebradoAnte = $('#municipalProtocolizacionCelebradoAnte');
    var cbMunicipalProtocolizacionCanton = $('#municipalProtocolizacionCanton');
    var txtMunicipalProtocolizacionNotaria = $('#municipalProtocolizacionNotaria');
    var txtMunicipalProtocolizacionFecha = $('#municipalProtocolizacionFecha');
    var cbMunicipalInscripcionCanton = $('#municipalInscripcionCanton');
    var txtMunicipalInscripcionMatricula = $('#municipalInscripcionMatricula');
    var txtMunicipalInscripcionLibro = $('#municipalInscripcionLibro');
    var txtMunicipalInscripcionFoja = $('#municipalInscripcionFoja');
    var txtMunicipalInscripcionFecha = $('#municipalInscripcionFecha');
    var divContMunicipalInscripcion = $('#contMunicipalInscripcion');

    if (chkPropietarioJuridicoMunicipalSinPerfeccionar.is(':checked')) {
        cbMunicipalProtocolizacionCelebradoAnte.prop('required', true);
        cbMunicipalProtocolizacionCanton.prop('required', true);
        txtMunicipalProtocolizacionNotaria.prop('required', true);
        txtMunicipalProtocolizacionFecha.prop('required', true);

        cbMunicipalInscripcionCanton.prop('required', false);
        txtMunicipalInscripcionMatricula.prop('required', false);
        txtMunicipalInscripcionLibro.prop('required', false);
        txtMunicipalInscripcionFoja.prop('required', false);
        txtMunicipalInscripcionFecha.prop('required', false);

        cbMunicipalProtocolizacionCelebradoAnte.attr('data-error', 'Por favor seleccione una opción');
        cbMunicipalProtocolizacionCanton.attr('data-error', 'Por favor seleccione una opción');
        txtMunicipalProtocolizacionNotaria.attr('data-error', 'Por favor ingrese el campo obligatorio');
        txtMunicipalProtocolizacionFecha.attr('data-error', 'Por favor ingrese el campo obligatorio');

        cbMunicipalInscripcionCanton.removeAttr('data-error');
        txtMunicipalInscripcionMatricula.removeAttr('data-error');
        txtMunicipalInscripcionLibro.removeAttr('data-error');
        txtMunicipalInscripcionFoja.removeAttr('data-error');
        txtMunicipalInscripcionFecha.removeAttr('data-error');

        divContMunicipalInscripcion.hide();

    } else {
        cbMunicipalProtocolizacionCelebradoAnte.attr('data-error', 'Por favor seleccione una opción');
        cbMunicipalProtocolizacionCanton.attr('data-error', 'Por favor seleccione una opción');
        txtMunicipalProtocolizacionNotaria.attr('data-error', 'Por favor ingrese el campo obligatorio');
        txtMunicipalProtocolizacionFecha.attr('data-error', 'Por favor ingrese el campo obligatorio');

        cbMunicipalInscripcionCanton.attr('data-error', 'Por favor seleccione una opción');
        txtMunicipalInscripcionMatricula.attr('data-error', 'Por favor ingrese el campo obligatorio');
        txtMunicipalInscripcionLibro.attr('data-error', 'Por favor ingrese el campo obligatorio');
        txtMunicipalInscripcionFoja.attr('data-error', 'Por favor ingrese el campo obligatorio');
        txtMunicipalInscripcionFecha.attr('data-error', 'Por favor ingrese el campo obligatorio');

        divContMunicipalInscripcion.show();
    }


}

function ctrlMunicipalBeneficiarioJuridicaTipoIdentificacion() {
    var cbMunicipalBeneficiarioJuridicaTipoIdentificacion = $('#municipalBeneficiarioJuridicaTipoIdentificacion');
    var txtMunicipalBeneficiarioJuridicaRazonSocial = $('#municipalBeneficiarioJuridicaRazonSocial');
    var divContBtnValMunBeneficiarioJuridica = $('#contBtnValMunBeneficiarioJuridica');

    if (cbMunicipalBeneficiarioJuridicaTipoIdentificacion.val() === 'ruc') {
        divContBtnValMunBeneficiarioJuridica.show();
        txtMunicipalBeneficiarioJuridicaRazonSocial.prop('readonly', true);
    } else {
        divContBtnValMunBeneficiarioJuridica.hide();
        txtMunicipalBeneficiarioJuridicaRazonSocial.prop('readonly', false);
    }
}

function ctrlMunicipalBeneficiarioNaturalTipoIdentificacion() {
    var cbMunicipalBeneficiarioNaturalTipoIdentificacion = $('#municipalBeneficiarioNaturalTipoIdentificacion');
    var txtMunicipalBeneficiarioNaturalNroIdentificacion = $('#municipalBeneficiarioNaturalNroIdentificacion');
    var txtMunicipalBeneficiarioNaturalApellidos = $('#municipalBeneficiarioNaturalApellidos');
    var txtMunicipalBeneficiarioNaturalNombres = $('#municipalBeneficiarioNaturalNombres');
    var divContBtnValMunBeneficiarioNatural = $('#contBtnValMunBeneficiarioNatural');

    if ((cbMunicipalBeneficiarioNaturalTipoIdentificacion.val() === 'cedula') || (cbMunicipalBeneficiarioNaturalTipoIdentificacion.val() === 'pasaporte')) {
        divContBtnValMunBeneficiarioNatural.show();
        txtMunicipalBeneficiarioNaturalApellidos.prop('readonly', true);
        txtMunicipalBeneficiarioNaturalNombres.prop('readonly', true);
    } else {
        divContBtnValMunBeneficiarioNatural.hide();
        txtMunicipalBeneficiarioNaturalApellidos.prop('readonly', false);
        txtMunicipalBeneficiarioNaturalNombres.prop('readonly', false);
    }

}
function ctrlTipoPoseedor() {
    var cbTipoPoseedor = $('#tipoPoseedor');
    var divContPuebloEtnia = $('#contPuebloEtnia');
    var cbTipoPoseedorPuebloEtnia = $('#tipoPoseedorPuebloEtnia');
    var txtPoseedorAnio = $('#poseedorAnio');

    if (cbTipoPoseedor.val() === '4') {
        divContPuebloEtnia.show();
        cbTipoPoseedorPuebloEtnia.prop('required', true);
        cbTipoPoseedorPuebloEtnia.attr('data-error', 'Por favor seleccione una opción');
        cbTipoPoseedorPuebloEtnia.focus();
    } else {
        divContPuebloEtnia.hide();
        cbTipoPoseedorPuebloEtnia.prop('required', false);
        cbTipoPoseedorPuebloEtnia.removeAttr('data-error');
        txtPoseedorAnio.focus();
    }

}

function ctrlNotificacionPropietario() {
    var txtPropietarioNaturalApellidos = $('#propietarioNaturalApellidos');
    var txtPropietarioNaturalNombre = $('#propietarioNaturalNombre');
    var cbPersoneriaPropietario = $('#personeriaPropietario');
    var chkNotificacionCuandoEsPropietario = $('#notificacionCuandoEsPropietario');
    var txtNotificacionApellidos = $('#notificacionApellidos');
    var txtNotificacionNombres = $('#notificacionNombres');

    if (chkNotificacionCuandoEsPropietario.is(':checked')) {
        if (cbPersoneriaPropietario.val() === 'natural') {
            txtNotificacionNombres.val(txtPropietarioNaturalNombre.val());
            txtNotificacionApellidos.val(txtPropietarioNaturalApellidos.val());
        } else {
            txtNotificacionNombres.val('');
            txtNotificacionApellidos.val('');
        }
    } else {
        txtNotificacionNombres.val('');
        txtNotificacionApellidos.val('');

    }
}

function ctrlTipoInformante() {
    var cbInformanteTipo = $('#informanteTipo');
    var divContenedorDatosInformante = $('#contenedorDatosInformante');
    var cbInformanteTipoIdentificacion = $('#informanteTipoIdentificacion');
    var txtInformanteNumeroIdentificacion = $('#informanteNumeroIdentificacion');
    var cbPersoneriaPropietario = $('#personeriaPropietario');
    var cbPropietarioNaturalTipoIdentificacion = $('#propietarioNaturalTipoIdentificacion');
    var txtPropietarioNaturalNumeroIdentificacion = $('#propietarioNaturalNumeroIdentificacion');
    var cbPropietarioJuridicoTipoIdentificacion = $('#propietarioJuridicoTipoIdentificacion');
    var txtPropietarioJuridicoNroIdentificacion = $('#propietarioJuridicoNroIdentificacion');
//    var personeriaPosesionario;
    
//    if(cbInformanteTipo.val() == ''){
//        personeriaPosesionario = 'natural';
//    }

    if (cbInformanteTipo.val() === '4') { //Sin informante
        divContenedorDatosInformante.hide();
        cbInformanteTipoIdentificacion.prop('required', false);
        txtInformanteNumeroIdentificacion.prop('required', false);

        cbInformanteTipoIdentificacion.val('');
        txtInformanteNumeroIdentificacion.val('');

        cbInformanteTipoIdentificacion.removeAttr('data-error');
        txtInformanteNumeroIdentificacion.removeAttr('data-error');
    } else {
        divContenedorDatosInformante.show();
        cbInformanteTipoIdentificacion.prop('required', true);
        txtInformanteNumeroIdentificacion.prop('required', true);

        cbInformanteTipoIdentificacion.attr('data-error', 'Por favor seleccione una opción');
        txtInformanteNumeroIdentificacion.attr('data-error', 'Por favor ingrese el campo obligatorio');

        if (cbInformanteTipo.val() === '1') { // Propietario posesionario
            if (cbPersoneriaPropietario.val() === 'natural') {
                cbInformanteTipoIdentificacion.find('option').each(function (i, e) {
                    if ($(e).val() === cbPropietarioNaturalTipoIdentificacion.val()) {
                        cbInformanteTipoIdentificacion.prop('selectedIndex', i);
                    }
                });
                txtInformanteNumeroIdentificacion.val(txtPropietarioNaturalNumeroIdentificacion.val());
            } else {
                cbInformanteTipoIdentificacion.find('option').each(function (i, e) {
                    if ($(e).val() === cbPropietarioJuridicoTipoIdentificacion.val()) {
                        cbInformanteTipoIdentificacion.prop('selectedIndex', i);
                    }
                });
                txtInformanteNumeroIdentificacion.val(txtPropietarioJuridicoNroIdentificacion.val());
            }
        } else {
            divContenedorDatosInformante.show();
            cbInformanteTipoIdentificacion.prop('required', true);
            txtInformanteNumeroIdentificacion.prop('required', true);

            cbInformanteTipoIdentificacion.val('');
            txtInformanteNumeroIdentificacion.val('');

            cbInformanteTipoIdentificacion.attr('data-error', 'Por favor seleccione una opción');
            txtInformanteNumeroIdentificacion.attr('data-error', 'Por favor ingrese el campo obligatorio');
        }
    }

}

function ctrlSeleccionarTodosChkServiciosBasicosVias() {
    var chkClass = $('.check');

    chkClass.each(function () {
        $(this).prop('checked', true);
    });
}

function ctrlDeSeleccionarTodosChkServiciosBasicosVias() {
    var chkClass = $('.check');

    chkClass.each(function () {
        $(this).prop('checked', false);
    });
}

function ctrlAceras() {
    var cbAceras = $('#aceras');
    var divContAceras = $('#contCaracteristicasAcera');

    var txtPorcentajeAceraConstruidoIzq = $('#porcentajeAceraConstruidoIzq');
    var txtPorcentajeAceraConstruidoDer = $('#porcentajeAceraConstruidoDer');
    var txtEstadoConservacionAcera = $('#estadoConservacionAcera');
    var cbtipoMaterialAcera = $('#tipoMaterialAcera');

    if (cbAceras.val() === '13') {
        divContAceras.show();
        txtPorcentajeAceraConstruidoIzq.prop('required', true);
        txtPorcentajeAceraConstruidoIzq.attr('data-error', 'Por favor ingrese el campo obligatorio');

        txtPorcentajeAceraConstruidoDer.prop('required', true);
        txtPorcentajeAceraConstruidoDer.attr('data-error', 'Por favor ingrese el campo obligatorio');

        txtEstadoConservacionAcera.prop('required', true);
        txtEstadoConservacionAcera.attr('data-error', 'Por favor ingrese el campo obligatorio');

        cbtipoMaterialAcera.prop('required', true);
        cbtipoMaterialAcera.attr('data-error', 'Por favor ingrese el campo obligatorio');
    } else {
        divContAceras.hide();
        txtPorcentajeAceraConstruidoIzq.prop('required', false);
        txtPorcentajeAceraConstruidoIzq.removeAttr('data-error');

        txtPorcentajeAceraConstruidoDer.prop('required', false);
        txtPorcentajeAceraConstruidoDer.removeAttr('data-error');

        txtEstadoConservacionAcera.prop('required', false);
        txtEstadoConservacionAcera.removeAttr('data-error');

        cbtipoMaterialAcera.prop('required', false);
        cbtipoMaterialAcera.removeAttr('data-error');
    }
}

function ctrlBordillos() {
    var divCaracteristicasBordillos = $('#conCaracteristicasBordillos');
    var txtBordillos = $('#bordillos');
    var txtPorcentajeBordilloConstruidoIzq = $('#porcentajeBordilloConstruidoIzq');
    var txtPorcentajeBordilloConstruidoDer = $('#porcentajeBordilloConstruidoDer');

    if (txtBordillos.val() === '11') {
        divCaracteristicasBordillos.show();
        txtPorcentajeBordilloConstruidoIzq.prop('required', true);
        txtPorcentajeBordilloConstruidoIzq.attr('data-error', 'Por favor ingrese el campo obligatorio');

        txtPorcentajeBordilloConstruidoDer.prop('required', true);
        txtPorcentajeBordilloConstruidoDer.attr('data-error', 'Por favor ingrese el campo obligatorio');
    } else {
        divCaracteristicasBordillos.hide();
        txtPorcentajeBordilloConstruidoIzq.prop('required', false);
        txtPorcentajeBordilloConstruidoIzq.removeAttr('data-error');

        txtPorcentajeBordilloConstruidoDer.prop('required', false);
        txtPorcentajeBordilloConstruidoDer.removeAttr('data-error');
    }
}

function ctrlCheckSubmit(id, formulario) {
    var btnValidar = $('#' + id);
    var formulario = $('#' + formulario);
    btnValidar.empty();
    btnValidar.append('Guardando ...');
    btnValidar.attr('disabled', true);
    formulario.submit();
    return true;
}