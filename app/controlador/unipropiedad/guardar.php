<?php

require $_SERVER['DOCUMENT_ROOT'] . '/app/config/ConexionDB.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/config/Constantes.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/config/Util.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/lotLote.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/estPoligono.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/lotBarrio.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/genServicioBasicoDet.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/lotLoteServicio.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/lotCaracteristica.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/lotLoteVia.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/perPersona.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/levLevantamiento.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/perDireccion.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/prePredio.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/preCaracteristica.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/escInscripcion.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/escProtocolizacion.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/estUnidad.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/estPiso.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/ediEdificacion.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/ediInstalacion.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/ediEstructura.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/ediAcabado.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/mejMejora.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/munMunicipal.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/proPropietario.php';

extract($_POST);

$util = new Util();
$estPoligono = new estPoligono();
$lotLote = new lotLote();
$lotBarrio = new lotBarrio();
$genServicioBasicoDet = new genServicioBasicoDet();
$lotLoteServicio = new lotLoteServicio();
$lotCaracteristica = new lotCaracteristica();
$lotLoteVia = new lotLoteVia();
$perPersona = new perPersona();
$levLevantamiento = new levLevantamiento();
$perDireccion = new perDireccion();
$prePredio = new prePredio();
$preCaracteristica = new preCaracteristica();
$escInscripcion = new escInscripcion();
$escProtocolizacion = new escProtocolizacion();
$estUnidad = new estUnidad();
$estPiso = new estPiso();
$ediEdificacion = new ediEdificacion();
$ediEstructura = new ediEstructura();
$ediInstalacion = new ediInstalacion();
$ediAcabado = new ediAcabado();
$mejMejora = new mejMejora();
$munMunicipal = new munMunicipal();
$proPropietario = new proPropietario();

require 'reset.php';

$claveCatastral = $clvProvincia . $clvCanton . $clvParroquia . $clvZona . $clvSector . $clvManzana . $clvLote;
$tipoInmueble = UNIPROPIEDAD;
$codigoAcumuladoPredio = $claveCatastral . $codigoPredio;

/*
 * Obtenemos el ID del Poligono
 */
$estPoligono->set('codigo_acumulado', $claveCatastral);
$idEstPoligono = $estPoligono->obtenerIdPoligono();

/*
 * Validamos si el barrio está ingresado, sino creamos uno nuevo
 */
$lotBarrio->set('nombre', $urbZonaSector);
$idLotBarrio = $lotBarrio->validarBarrioIngresado();
if ($idLotBarrio == 0) {
    $idLotBarrio = $lotBarrio->guardar();
}
/*
 * Creamos el lote
 */
$lotLote->set('area_escritura', $areaTerrenoSegunEscritura);
$lotLote->set('gen_unidad_medida_id', $areaTerrenoUnidad);
$lotLote->set('descripcion', NULL);
$lotLote->set('est_poligono_id', $idEstPoligono);
$lotLote->set('tipo_inmueble', $tipoInmueble);
$lotLote->set('lote_conflicto', $loteEnConflicto);
$lotLote->set('es_activo', ES_ACTIVO);
$lotLote->set('descripcion_lote_conflicto', $observacionesLoteConflicto);
$lotLote->set('lot_barrio_id', $idLotBarrio);
$lotLote->set('lot_lote_ocupacion_id', $ocupacionDelTerreno);
$idLotLote = $lotLote->guardar();
/*
 * Creamos las caracteristicas del lote
 */

if (!empty($caracteristicasDelLote)) {
    foreach ($caracteristicasDelLote as $lotTipoCaracteristicaId => $lotListaValoresId) {
        if (!empty($lotListaValoresId)) {
            $lotCaracteristica->set('lot_lista_valores_id', $lotListaValoresId);
            $lotCaracteristica->set('valor_alfanumerico', null);
            $lotCaracteristica->set('lot_lote_id', $idLotLote);
            $lotCaracteristica->set('lot_tipo_caracteristica_id', $lotTipoCaracteristicaId);
            $idLotCaracteristica = $lotCaracteristica->guardar();
        }
    }
}

/*
 * Creamos los Servicios básicos del lote
 */

if (!empty($servicioBasico)) {
    foreach ($servicioBasico as $genServicioBasicoId => $tipoServicioBasicoId) {
        $genServicioBasicoDet->set('servicioBasicoId', $genServicioBasicoId);
        $genServicioBasicoDet->set('tipoServicioBasicoId', $tipoServicioBasicoId);
        $genServicioBasicoDetId = $genServicioBasicoDet->retornarId();
        if (!empty($genServicioBasicoDetId)) {
            $lotLoteServicio->set('gen_servicio_basico_det_id', $genServicioBasicoDetId);
            $lotLoteServicio->set('es_activo', ES_ACTIVO);
            $lotLoteServicio->set('lot_lote_id', $idLotLote);
            $lotLoteServicio->set('gen_servicio_basico_id', $genServicioBasicoId);
            $idLotLoteServicio = $lotLoteServicio->guardar();
        }
    }
}

if (!empty($servicioBasicoComunicaciones)) {
    foreach ($servicioBasicoComunicaciones as $tipoServicioBasicoIdComunicaciones) {
        $genServicioBasicoDet->set('servicioBasicoId', 4);
        $genServicioBasicoDet->set('tipoServicioBasicoId', $tipoServicioBasicoIdComunicaciones);
        $genServicioBasicoDetIdComunicaciones = $genServicioBasicoDet->retornarId();
        if (!empty($genServicioBasicoDetIdComunicaciones)) {
            $lotLoteServicio->set('gen_servicio_basico_det_id', $genServicioBasicoDetIdComunicaciones);
            $lotLoteServicio->set('es_activo', ES_ACTIVO);
            $lotLoteServicio->set('lot_lote_id', $idLotLote);
            $lotLoteServicio->set('gen_servicio_basico_id', 4);
            $idLotLoteServicioComunicaciones = $lotLoteServicio->guardar();
        }
    }
}

/*
 * Guardamos las vías del Lote
 */

$viasDelLote = array();

if (!empty($via)) {
    foreach ($via as $numVia => $viaDatos) {
        empty($viaDatos['acceso']) ? $viaDatos['acceso'] = "FALSE" : $viaDatos['acceso'] != "TRUE";
        empty($viaDatos['numeroCasa']) ? $viaDatos['numeroCasa'] = NUM_CASA_SN : NULL;
        empty($viaDatos['frente']) ? $viaDatos['frente'] = NULL : NULL;
        $lotLoteVia->set('es_activo', ES_ACTIVO);
        $lotLoteVia->set('lot_lote_id', $idLotLote);
        $lotLoteVia->set('via_via_id', $viaDatos['viaViaId']);
        $lotLoteVia->set('acceso', $viaDatos['acceso']);
        $lotLoteVia->set('placa_inmueble', $viaDatos['numeroCasa']);
        $lotLoteVia->set('frente', $viaDatos['frente']);
        $idLotLoteVia = $lotLoteVia->guardar();
        array_push($viasDelLote, $idLotLoteVia);
    }
}

/*
 * Guardamos el Jefe de hogar si la condición de ocupación en ocupado
 */

if (!empty($caracteristicasPredio[1])) {
    if ($caracteristicasPredio[1] == '1' || $caracteristicasPredio[1] == '3') { //Condición de ocupación: Ocupada o Temporal
        $validarIdentificacion = $util->validarCedula($numeroIdentificacionJefeHogar);
        $perPersona->set('numero_identificacion', $numeroIdentificacionJefeHogar);
        $personaEstaCreada = $perPersona->validarPersonaCreada();
        if ($personaEstaCreada == 0) {
            $perPersona->set('tipo_identificacion', $tipoIdentificacionJefeHogar);
            $perPersona->set('numero_identificacion', $numeroIdentificacionJefeHogar);
            $perPersona->set('personeria', 'natural');
            $perPersona->set('dominio', NULL);
            $perPersona->set('nombres', $nombresJefeHogar);
            $perPersona->set('apellidos', $apellidosJefeHogar);
            $perPersona->set('razon_social', NULL);
            $perPersona->set('estado_civil', NULL);
            $perPersona->set('fecha_nacimiento', NULL);
            $perPersona->set('carnet_discapacidad', NULL);
            $perPersona->set('porcentaje_discapacidad', NULL);
            $perPersona->set('tipo_discapacidad', NULL);
            $perPersona->set('descripcion', NULL);
            if ($validarIdentificacion == 1) {
                $perPersona->set('es_validado', ES_VALIDADO);
            } else {
                $perPersona->set('es_validado', NO_ES_VALIDADO);
            }
            $perPersona->set('es_activo', ES_ACTIVO);
            $perPersona->set('rep_per_persona_id', NULL);
            $perPersona->set('fecha_defuncion', NULL);
            $idJefeHogar = $perPersona->guardar();
        } else {
            $idJefeHogar = $personaEstaCreada;
        }
    } else { // Condición de ocupación: Desocupado
        $idJefeHogar = NULL;
    }
}

/*
 * Guardamos el levantamiento
 */

if ($informanteTipo != '4') { //Si es diferente del tipo de informate: Sin informante
    $perPersona->set('numero_identificacion', $informanteNumeroIdentificacion);
    $personaEstaCreada = $perPersona->validarPersonaCreada();

    if ($personaEstaCreada == 0) {
        //Validamos el número de identificación dependiendo del tipo de identificación
        if (($informanteTipoIdentificacion == 'cedula') || ($informanteTipoIdentificacion == 'pasaporte')) {
            $validarIdentificacion = $util->validarCedula($numeroIdentificacionJefeHogar);
        } elseif ($informanteTipoIdentificacion == 'ruc') {
            $validarIdentificacion = $util->validarRuc($numeroIdentificacionJefeHogar);
        } else {
            $validarIdentificacion = 0;
        }

        //Creamos la persona
        $perPersona->set('tipo_identificacion', $informanteTipoIdentificacion);
        $perPersona->set('numero_identificacion', $informanteNumeroIdentificacion);
        $perPersona->set('personeria', 'natural');
        $perPersona->set('dominio', null);
        $perPersona->set('nombres', null);
        $perPersona->set('apellidos', null);
        $perPersona->set('razon_social', null);
        $perPersona->set('estado_civil', null);
        $perPersona->set('fecha_nacimiento', null);
        $perPersona->set('carnet_discapacidad', null);
        $perPersona->set('porcentaje_discapacidad', null);
        $perPersona->set('tipo_discapacidad', null);
        $perPersona->set('descripcion', null);
        $perPersona->set('es_validado', NO_ES_VALIDADO);
//        if ($validarIdentificacion == 1) {
//            $perPersona->set('es_validado', ES_VALIDADO);
//        } else {
//            $perPersona->set('es_validado', NO_ES_VALIDADO);
//        }
        $perPersona->set('es_activo', ES_ACTIVO);
        $perPersona->set('rep_per_persona_id', null);
        $perPersona->set('fecha_defuncion', null);
        $idPersonaInformante = $perPersona->guardar();

        //Creamos el levantamiento
        $levLevantamiento->set('inf_persona_id', $idPersonaInformante);
        $levLevantamiento->set('lev_persona_id', $responsablesRelevador);
        $levLevantamiento->set('fecha_levantamiento', $responsablesLevantamientoFecha); //Ojo especificar fecha
        $levLevantamiento->set('sup_persona_id', $responsablesSupervisor);
        $levLevantamiento->set('fecha_supervisor', $responsablesLevantamientoFecha); //Ojo especificar fecha
        $levLevantamiento->set('fis_persona_id', $responsablesFiscalizador);
        $levLevantamiento->set('fecha_fiscalizar', $responsablesLevantamientoFecha);
        $levLevantamiento->set('rel_tipo_informante_id', $informanteTipo);
        $levLevantamiento->set('descripcion', NULL); //Ojo validar!
        $idLevLevantamiento = $levLevantamiento->guardar();
    } else { //Cuando no existe informante
        //Creamos el levantamiento
        $idPersonaInformante = $personaEstaCreada;
        $levLevantamiento->set('inf_persona_id', $idPersonaInformante);
        $levLevantamiento->set('lev_persona_id', $responsablesRelevador);
        $levLevantamiento->set('fecha_levantamiento', $responsablesLevantamientoFecha); //Ojo especificar fecha
        $levLevantamiento->set('sup_persona_id', $responsablesSupervisor);
        $levLevantamiento->set('fecha_supervisor', $responsablesLevantamientoFecha); //Ojo especificar fecha
        $levLevantamiento->set('fis_persona_id', $responsablesFiscalizador);
        $levLevantamiento->set('fecha_fiscalizar', $responsablesLevantamientoFecha);
        $levLevantamiento->set('rel_tipo_informante_id', $informanteTipo);
        $levLevantamiento->set('descripcion', NULL); //Ojo validar!
        $idLevLevantamiento = $levLevantamiento->guardar();
    }
} else {
    $idPersonaInformante = NULL;
    $levLevantamiento->set('inf_persona_id', $idPersonaInformante);
    $levLevantamiento->set('lev_persona_id', $responsablesRelevador);
    $levLevantamiento->set('fecha_levantamiento', $responsablesLevantamientoFecha); //Ojo especificar fecha
    $levLevantamiento->set('sup_persona_id', $responsablesSupervisor);
    $levLevantamiento->set('fecha_supervisor', $responsablesLevantamientoFecha); //Ojo especificar fecha
    $levLevantamiento->set('fis_persona_id', $responsablesFiscalizador);
    $levLevantamiento->set('fecha_fiscalizar', $responsablesLevantamientoFecha);
    $levLevantamiento->set('rel_tipo_informante_id', $informanteTipo);
    $levLevantamiento->set('descripcion', NULL); //Ojo validar!
    $idLevLevantamiento = $levLevantamiento->guardar();
}

/*
 * Guardamos el predio en DB
 */

$numeroPropietarios = + 1;

$prePredio->set('pre_uso_predio_id', $usoDelPredio);
$prePredio->set('descripcion', $descripcionDelPredio);
$prePredio->set('nombre', NULL);
$prePredio->set('lot_lote_id', $idLotLote);
$prePredio->set('codigo', $codigoPredio);
$prePredio->set('codigo_acumulado', $codigoAcumuladoPredio);
$prePredio->set('alicuota_ph', NULL);
$prePredio->set('numero_propietarios', $numeroPropietarios);
$prePredio->set('lev_levantamiento_id', $idLevLevantamiento);
$prePredio->set('clave_catastral_anterior', $claveAnterior);
$prePredio->set('es_activo', ES_ACTIVO);
$prePredio->set('cen_persona_id', $idJefeHogar);
$prePredio->set('alicuota_declaratoria', 100);
if(!empty($viasDelLote[0])){
    $prePredio->set('lot_lote_via_id', $viasDelLote[0]);
}else{
    $prePredio->set('lot_lote_via_id', NULL);
}

$idPrePredio = $prePredio->guardar();

/*
 * Creamos las caracteristicas del predio
 */

foreach ($caracteristicasPredio as $preTipoCaracteristicaId => $preListaValoresId) {
    $valor_entero = 0;

    if (($preTipoCaracteristicaId == '2') || ($preTipoCaracteristicaId == '4') || $preTipoCaracteristicaId == '5') {//Condición de ocupación || Medidores de agua || Medidores eléctricos
        if (!empty($preListaValoresId)) {
            $valorEntero = $preListaValoresId;
            $preCaracteristica->set('pre_tipo_caracteristica_id', $preTipoCaracteristicaId);
            $preCaracteristica->set('pre_lista_valores_id', NULL);
            $preCaracteristica->set('valor_entero', $valorEntero);
            $preCaracteristica->set('valor_alfanumerico', NULL);
            $preCaracteristica->set('valor_fecha', NULL);
            $preCaracteristica->set('valor_decimal', NULL);
            $preCaracteristica->set('pre_predio_id', $idPrePredio);
            $preCaracteristica->set('tipo', 'normal');
            $idPreCaracteristica = $preCaracteristica->guardar();
        }
    } elseif ($preTipoCaracteristicaId == '6') { //Propietario anterior
        if (!empty($preListaValoresId)) {
            $valorAlfanumerico = $preListaValoresId;
            $preCaracteristica->set('pre_tipo_caracteristica_id', $preTipoCaracteristicaId);
            $preCaracteristica->set('pre_lista_valores_id', NULL);
            $preCaracteristica->set('valor_entero', NULL);
            $preCaracteristica->set('valor_alfanumerico', $valorAlfanumerico);
            $preCaracteristica->set('valor_fecha', NULL);
            $preCaracteristica->set('valor_decimal', NULL);
            $preCaracteristica->set('pre_predio_id', $idPrePredio);
            $preCaracteristica->set('tipo', 'normal');
            $idPreCaracteristica = $preCaracteristica->guardar();
        }
    } else {
        if (!empty($preListaValoresId)) {
            $valorAlfanumerico = $preListaValoresId;
            $preCaracteristica->set('pre_tipo_caracteristica_id', $preTipoCaracteristicaId);
            $preCaracteristica->set('pre_lista_valores_id', $preListaValoresId);
            $preCaracteristica->set('valor_entero', NULL);
            $preCaracteristica->set('valor_alfanumerico', NULL);
            $preCaracteristica->set('valor_fecha', NULL);
            $preCaracteristica->set('valor_decimal', NULL);
            $preCaracteristica->set('pre_predio_id', $idPrePredio);
            $preCaracteristica->set('tipo', 'normal');
            $idPreCaracteristica = $preCaracteristica->guardar();
        }
    }
}

//return 0;

/*
 * Creamos la información del propietario
 */

//Vlidar a partir de aqui ******************************
if ($propietarioTitulo == 'TRUE') { //Propietario
    //Validamos y guardamos la información de las escrituras
    if ($sinPerfeccionar == 'TRUE') {
        $escProtocolizacion->set('celebrado_ante', $formaAdquisicionProtocolizacionCelebradoAnte);
        $escProtocolizacion->set('est_canton_id', $formaAdquisicionProtocolizacionCanton);
        $escProtocolizacion->set('notaria', $formaAdquisicionProtocolizacionNotaria);
        $escProtocolizacion->set('fecha', $formaAdquisicionProtocolizacionFecha);
        $escProtocolizacion->set('es_activo', ES_ACTIVO);
        $idEscProtocolizacion = $escProtocolizacion->guardar();
        $idEscInscripcion = NULL;
    } else {
        $escProtocolizacion->set('celebrado_ante', $formaAdquisicionProtocolizacionCelebradoAnte);
        $escProtocolizacion->set('est_canton_id', $formaAdquisicionProtocolizacionCanton);
        $escProtocolizacion->set('notaria', $formaAdquisicionProtocolizacionNotaria);
        $escProtocolizacion->set('fecha', $formaAdquisicionProtocolizacionFecha);
        $escProtocolizacion->set('es_activo', ES_ACTIVO);
        $idEscProtocolizacion = $escProtocolizacion->guardar();

        $escInscripcion->set('est_canton_id', $formAdquisicionInscripcionCanton);
        $escInscripcion->set('matricula', $formAdquisicionInscripcionMatricula);
        $escInscripcion->set('libro', $formAdquisicionInscripcionLibro);
        $escInscripcion->set('foja', $formAdquisicionInscripcionFoja);
        $escInscripcion->set('fecha', $formAdquisicionInscripcionFecha);
        $escInscripcion->set('es_activo', ES_ACTIVO);
        $idEscInscripcion = $escInscripcion->guardar();
    }

    if ($personeriaPropietario == 'natural') {
        if (($propietarioNaturalEstadoCivil == 'casado') || ($propietarioNaturalEstadoCivil == 'union de hecho')) {

            //Se valida que el número de identificación sea correcto
            $validarIdentificacionPropietario = $util->validarCedula($propietarioNaturalNumeroIdentificacion);
            $validarIdentificacionConyuguePropietario = $util->validarCedula($conyuguePropietarioNaturalNumeroIdentificacion);

            //Se valida que la persona exista en Base de Datos
            $perPersona->set('numero_identificacion', $propietarioNaturalNumeroIdentificacion);
            $propietarioNaturalEstaCreado = $perPersona->validarPersonaCreada();
            $perPersona->set('numero_identificacion', $conyuguePropietarioNaturalNumeroIdentificacion);
            $conyuguePropietarioNaturalEstaCreado = $perPersona->validarPersonaCreada();

            //Si el propietario Natural no está creado
            if ($propietarioNaturalEstaCreado == 0) {
                //Creamos la persona
                $perPersona->set('tipo_identificacion', $propietarioNaturalTipoIdentificacion);
                $perPersona->set('numero_identificacion', $propietarioNaturalNumeroIdentificacion);
                $perPersona->set('personeria', 'natural');
                $perPersona->set('dominio', null);
                $perPersona->set('nombres', $propietarioNaturalNombre);
                $perPersona->set('apellidos', $propietarioNaturalApellidos);
                $perPersona->set('razon_social', null);
                $perPersona->set('estado_civil', $propietarioNaturalEstadoCivil);
                $perPersona->set('fecha_nacimiento', $propietarioNaturalFechaNacimiento);
                $perPersona->set('carnet_discapacidad', $propietarioNaturalDiscapacidadNroCarnet);
                $perPersona->set('porcentaje_discapacidad', $propietarioNaturalDiscapacidadPorcentaje);
                $perPersona->set('tipo_discapacidad', $propietarioNaturalDiscapacidadTipo);
                $perPersona->set('descripcion', null);
                if ($validarIdentificacionPropietario == 1) {
                    $perPersona->set('es_validado', ES_VALIDADO);
                } else {
                    $perPersona->set('es_validado', NO_ES_VALIDADO);
                }
                $perPersona->set('es_activo', ES_ACTIVO);
                $perPersona->set('rep_per_persona_id', null);
                $perPersona->set('fecha_defuncion', $propietarioNaturalFechaDefuncion);
                $idProPropietarioNatural = $perPersona->guardar();
            } else {
                // Se actualzian los datos de la persona
                $perPersona->set('tipo_identificacion', $propietarioNaturalTipoIdentificacion);
                $perPersona->set('numero_identificacion', $propietarioNaturalNumeroIdentificacion);
                $perPersona->set('personeria', 'natural');
                $perPersona->set('dominio', null);
                $perPersona->set('nombres', $propietarioNaturalNombre);
                $perPersona->set('apellidos', $propietarioNaturalApellidos);
                $perPersona->set('razon_social', null);
                $perPersona->set('estado_civil', $propietarioNaturalEstadoCivil);
                $perPersona->set('fecha_nacimiento', $propietarioNaturalFechaNacimiento);
                $perPersona->set('carnet_discapacidad', $propietarioNaturalDiscapacidadNroCarnet);
                $perPersona->set('porcentaje_discapacidad', $propietarioNaturalDiscapacidadPorcentaje);
                $perPersona->set('tipo_discapacidad', $propietarioNaturalDiscapacidadTipo);
                $perPersona->set('descripcion', null);
                if ($validarIdentificacionPropietario == 1) {
                    $perPersona->set('es_validado', ES_VALIDADO);
                } else {
                    $perPersona->set('es_validado', NO_ES_VALIDADO);
                }
                $perPersona->set('es_activo', ES_ACTIVO);
                $perPersona->set('rep_per_persona_id', null);
                $perPersona->set('fecha_defuncion', $propietarioNaturalFechaDefuncion);
                $perPersona->set('id', $propietarioNaturalEstaCreado);
                $idProPropietarioNatural = $perPersona->actualizar();
            }

            //Guardamos el conyugué del propietario
            if ($conyuguePropietarioNaturalEstaCreado == 0) {
                $perPersona->set('tipo_identificacion', $conyuguePropietarioNaturalTipoIdentificacion);
                $perPersona->set('numero_identificacion', $conyuguePropietarioNaturalNumeroIdentificacion);
                $perPersona->set('personeria', 'natural');
                $perPersona->set('dominio', null);
                $perPersona->set('nombres', $conyuguePropietarioNaturalNombres);
                $perPersona->set('apellidos', $conyuguePropietarioNaturalApellidos);
                $perPersona->set('razon_social', null);
                $perPersona->set('estado_civil', $propietarioNaturalEstadoCivil);
                $perPersona->set('fecha_nacimiento', $conyuguePropietarioNaturalFechaNacimiento);
                $perPersona->set('carnet_discapacidad', NULL);
                $perPersona->set('porcentaje_discapacidad', NULL);
                $perPersona->set('tipo_discapacidad', NULL);
                $perPersona->set('descripcion', null);
                if ($validarIdentificacionConyuguePropietario == 1) {
                    $perPersona->set('es_validado', ES_VALIDADO);
                } else {
                    $perPersona->set('es_validado', NO_ES_VALIDADO);
                }
                $perPersona->set('es_activo', ES_ACTIVO);
                $perPersona->set('rep_per_persona_id', null);
                $perPersona->set('fecha_defuncion', $conyuguePropietarioFechaDefuncion);
                $idProPropietarioConyugueNatural = $perPersona->guardar();
            } else {
                $perPersona->set('tipo_identificacion', $conyuguePropietarioNaturalTipoIdentificacion);
                $perPersona->set('numero_identificacion', $conyuguePropietarioNaturalNumeroIdentificacion);
                $perPersona->set('personeria', 'natural');
                $perPersona->set('dominio', null);
                $perPersona->set('nombres', $conyuguePropietarioNaturalNombres);
                $perPersona->set('apellidos', $conyuguePropietarioNaturalApellidos);
                $perPersona->set('razon_social', null);
                $perPersona->set('estado_civil', $propietarioNaturalEstadoCivil);
                $perPersona->set('fecha_nacimiento', $conyuguePropietarioNaturalFechaNacimiento);
                $perPersona->set('carnet_discapacidad', NULL);
                $perPersona->set('porcentaje_discapacidad', NULL);
                $perPersona->set('tipo_discapacidad', NULL);
                $perPersona->set('descripcion', null);
                if ($validarIdentificacionConyuguePropietario == 1) {
                    $perPersona->set('es_validado', ES_VALIDADO);
                } else {
                    $perPersona->set('es_validado', NO_ES_VALIDADO);
                }
                $perPersona->set('es_activo', ES_ACTIVO);
                $perPersona->set('rep_per_persona_id', null);
                $perPersona->set('fecha_defuncion', $conyuguePropietarioFechaDefuncion);
                $perPersona->set('id', $conyuguePropietarioNaturalEstaCreado);
                $idProPropietarioConyugueNatural = $perPersona->actualizar();
            }

            //Si la notificacion es al mismo propietario, creamos la notificacion
            if ($notificacionCuandoEsPropietario == 'TRUE') {
                $perDireccion->set('per_persona_id', $idProPropietarioNatural);
                $perDireccion->set('per_tipo_direccion_id', $notificacionTipoDireccion);
                $perDireccion->set('pais', $notificacionPais);
                $perDireccion->set('est_canton_id', $notificacionCanton);
                $perDireccion->set('est_parroquia_id', $notificacionParroquia);
                $perDireccion->set('telefono', $notificacionConvencional);
                $perDireccion->set('direccion', $notificacionDireccion);
                $perDireccion->set('correo_electronico', $notificacionEmail);
                $perDireccion->set('telefono_celular', $notificacionCelular);
                $idProPropietarioNaturalDireccion = $perDireccion->guardar();
            } else {

                $idProPropietarioNaturalDireccion = null;

                $nroIdentificacionRandomica = mt_rand();
                $perPersona->set('tipo_identificacion', 'otro');
                $perPersona->set('numero_identificacion', $nroIdentificacionRandomica);
                $perPersona->set('personeria', 'natural');
                $perPersona->set('dominio', null);
                $perPersona->set('nombres', $notificacionNombres);
                $perPersona->set('apellidos', $notificacionApellidos);
                $perPersona->set('razon_social', null);
                $perPersona->set('estado_civil', null);
                $perPersona->set('fecha_nacimiento', null);
                $perPersona->set('carnet_discapacidad', null);
                $perPersona->set('porcentaje_discapacidad', null);
                $perPersona->set('tipo_discapacidad', null);
                $perPersona->set('descripcion', null);
                $perPersona->set('es_validado', NO_ES_VALIDADO);
                $perPersona->set('es_activo', 'TRUE');
                $perPersona->set('rep_per_persona_id', null);
                $perPersona->set('fecha_defuncion', null);
                $idPersonaNaturalNotificacion = $perPersona->guardar();

                $perDireccion->set('per_persona_id', $idPersonaNaturalNotificacion);
                $perDireccion->set('per_tipo_direccion_id', $notificacionTipoDireccion);
                $perDireccion->set('pais', $notificacionPais);
                $perDireccion->set('est_canton_id', $notificacionCanton);
                $perDireccion->set('est_parroquia_id', $notificacionParroquia);
                $perDireccion->set('telefono', $notificacionConvencional);
                $perDireccion->set('direccion', $notificacionDireccion);
                $perDireccion->set('correo_electronico', $notificacionEmail);
                $perDireccion->set('telefono_celular', $notificacionCelular);
                $idPersonaNaturalDireccionNotificacion = $perDireccion->guardar();
            }
        } else { //si el propietario no tiene conyugue
            //Se valida que el número de identificación sea correcto
            $validarIdentificacionPropietario = $util->validarCedula($propietarioNaturalNumeroIdentificacion);

            //Se valida que la persona exista en Base de Datos
            $perPersona->set('numero_identificacion', $propietarioNaturalNumeroIdentificacion);
            $propietarioNaturalEstaCreado = $perPersona->validarPersonaCreada();

            //Si el propietario Natural no está creado
            if ($propietarioNaturalEstaCreado == 0) {
                //Creamos la persona
                $perPersona->set('tipo_identificacion', $propietarioNaturalTipoIdentificacion);
                $perPersona->set('numero_identificacion', $propietarioNaturalNumeroIdentificacion);
                $perPersona->set('personeria', 'natural');
                $perPersona->set('dominio', null);
                $perPersona->set('nombres', $propietarioNaturalNombre);
                $perPersona->set('apellidos', $propietarioNaturalApellidos);
                $perPersona->set('razon_social', null);
                $perPersona->set('estado_civil', $propietarioNaturalEstadoCivil);
                $perPersona->set('fecha_nacimiento', $propietarioNaturalFechaNacimiento);
                $perPersona->set('carnet_discapacidad', $propietarioNaturalDiscapacidadNroCarnet);
                $perPersona->set('porcentaje_discapacidad', $propietarioNaturalDiscapacidadPorcentaje);
                $perPersona->set('tipo_discapacidad', $propietarioNaturalDiscapacidadTipo);
                $perPersona->set('descripcion', null);
                if ($validarIdentificacionPropietario == 1) {
                    $perPersona->set('es_validado', ES_VALIDADO);
                } else {
                    $perPersona->set('es_validado', NO_ES_VALIDADO);
                }
                $perPersona->set('es_activo', ES_ACTIVO);
                $perPersona->set('rep_per_persona_id', null);
                $perPersona->set('fecha_defuncion', $propietarioNaturalFechaDefuncion);
                $idProPropietarioNatural = $perPersona->guardar();
            } else {
                // Se actualzian los datos de la persona
                $perPersona->set('tipo_identificacion', $propietarioNaturalTipoIdentificacion);
                $perPersona->set('numero_identificacion', $propietarioNaturalNumeroIdentificacion);
                $perPersona->set('personeria', 'natural');
                $perPersona->set('dominio', null);
                $perPersona->set('nombres', $propietarioNaturalNombre);
                $perPersona->set('apellidos', $propietarioNaturalApellidos);
                $perPersona->set('razon_social', null);
                $perPersona->set('estado_civil', $propietarioNaturalEstadoCivil);
                $perPersona->set('fecha_nacimiento', $propietarioNaturalFechaNacimiento);
                $perPersona->set('carnet_discapacidad', $propietarioNaturalDiscapacidadNroCarnet);
                $perPersona->set('porcentaje_discapacidad', $propietarioNaturalDiscapacidadPorcentaje);
                $perPersona->set('tipo_discapacidad', $propietarioNaturalDiscapacidadTipo);
                $perPersona->set('descripcion', null);
                if ($validarIdentificacionPropietario == 1) {
                    $perPersona->set('es_validado', ES_VALIDADO);
                } else {
                    $perPersona->set('es_validado', NO_ES_VALIDADO);
                }
                $perPersona->set('es_activo', ES_ACTIVO);
                $perPersona->set('rep_per_persona_id', null);
                $perPersona->set('fecha_defuncion', $propietarioNaturalFechaDefuncion);
                $perPersona->set('id', $propietarioNaturalEstaCreado);
                $idProPropietarioNatural = $perPersona->actualizar();
            }

            //Si la notificacion es al mismo propietario, creamos la notificacion
            if ($notificacionCuandoEsPropietario == 'TRUE') {
                $perDireccion->set('per_persona_id', $idProPropietarioNatural);
                $perDireccion->set('per_tipo_direccion_id', $notificacionTipoDireccion);
                $perDireccion->set('pais', $notificacionPais);
                $perDireccion->set('est_canton_id', $notificacionCanton);
                $perDireccion->set('est_parroquia_id', $notificacionParroquia);
                $perDireccion->set('telefono', $notificacionConvencional);
                $perDireccion->set('direccion', $notificacionDireccion);
                $perDireccion->set('correo_electronico', $notificacionEmail);
                $perDireccion->set('telefono_celular', $notificacionCelular);
                $idProPropietarioNaturalDireccion = $perDireccion->guardar();
            } else {

                $idProPropietarioNaturalDireccion = null;

                $nroIdentificacionRandomica = mt_rand();
                $perPersona->set('tipo_identificacion', 'otro');
                $perPersona->set('numero_identificacion', $nroIdentificacionRandomica);
                $perPersona->set('personeria', 'natural');
                $perPersona->set('dominio', null);
                $perPersona->set('nombres', $notificacionNombres);
                $perPersona->set('apellidos', $notificacionApellidos);
                $perPersona->set('razon_social', null);
                $perPersona->set('estado_civil', null);
                $perPersona->set('fecha_nacimiento', null);
                $perPersona->set('carnet_discapacidad', null);
                $perPersona->set('porcentaje_discapacidad', null);
                $perPersona->set('tipo_discapacidad', null);
                $perPersona->set('descripcion', null);
                $perPersona->set('es_validado', NO_ES_VALIDADO);
                $perPersona->set('es_activo', 'TRUE');
                $perPersona->set('rep_per_persona_id', null);
                $perPersona->set('fecha_defuncion', null);
                $idPersonaNaturalNotificacion = $perPersona->guardar();

                $perDireccion->set('per_persona_id', $idPersonaNaturalNotificacion);
                $perDireccion->set('per_tipo_direccion_id', $notificacionTipoDireccion);
                $perDireccion->set('pais', $notificacionPais);
                $perDireccion->set('est_canton_id', $notificacionCanton);
                $perDireccion->set('est_parroquia_id', $notificacionParroquia);
                $perDireccion->set('telefono', $notificacionConvencional);
                $perDireccion->set('direccion', $notificacionDireccion);
                $perDireccion->set('correo_electronico', $notificacionEmail);
                $perDireccion->set('telefono_celular', $notificacionCelular);
                $idPersonaNaturalDireccionNotificacion = $perDireccion->guardar();
            }
            $idProPropietarioConyugueNatural = NULL;
        }

        $proPropietario->set('per_persona_id', $idProPropietarioNatural);
        $proPropietario->set('per_direccion_id', $idProPropietarioNaturalDireccion);
        $proPropietario->set('tiene_titulo', $propietarioTitulo);
        $proPropietario->set('numero', 1);
        $proPropietario->set('representante', 'TRUE');
        $proPropietario->set('porcentaje_copropiedad', $propietarioAlicuota);
        $proPropietario->set('pro_forma_adquisicion_id', $formaAdquisicion);
        $proPropietario->set('esc_protocolizacion_id', $idEscProtocolizacion);
        $proPropietario->set('sin_perfeccionar', $sinPerfeccionar);
        $proPropietario->set('esc_inscripcion_id', $idEscInscripcion);
        $proPropietario->set('estado_civil_compra', NULL);
        $proPropietario->set('con_persona_id', $idProPropietarioConyugueNatural);
        $proPropietario->set('pro_tipo_poseedor_id', NULL);
        $proPropietario->set('anio_posesion', NULL);
        $proPropietario->set('descripcion', NULL);
        $proPropietario->set('pre_predio_id', $idPrePredio);
        $proPropietario->set('precio_compra_comercial', $propietarioPrecioCompraComercial);
        $proPropietario->set('pro_pueblo_etnia', NULL);
        $idProPropietario = $proPropietario->guardar();

        //Para copropietarios
        if (!empty($copropietario)) {
            for ($i = 1; $i <= count($copropietario); $i++) {
                $validarIdentificacion = $util->validarCedula($copropietario[$i]['cedula']);
                $perPersona->set('numero_identificacion', $copropietario[$i]['cedula']);
                $idCopropietarioExiste = $perPersona->validarPersonaCreada();
                $numeroCoPropietario = $copropietario[$i]['numero'];
                $porcentajeCopropiedad = $copropietario[$i]['alicuota'];

                if ($idCopropietarioExiste == 0) {
                    $perPersona->set('tipo_identificacion', 'cedula');
                    $perPersona->set('numero_identificacion', $copropietario[$i]['cedula']);
                    $perPersona->set('personeria', 'natural');
                    $perPersona->set('dominio', null);
                    $perPersona->set('nombres', $copropietario[$i]['nombres']);
                    $perPersona->set('apellidos', $copropietario[$i]['apellidos']);
                    $perPersona->set('razon_social', null);
                    $perPersona->set('estado_civil', null);
                    $perPersona->set('fecha_nacimiento', null);
                    $perPersona->set('carnet_discapacidad', null);
                    $perPersona->set('porcentaje_discapacidad', null);
                    $perPersona->set('tipo_discapacidad', null);
                    $perPersona->set('descripcion', null);
                    if ($validarIdentificacion == 1) {
                        $perPersona->set('es_validado', ES_VALIDADO);
                    } else {
                        $perPersona->set('es_validado', NO_ES_VALIDADO);
                    }
                    $perPersona->set('es_activo', ES_ACTIVO);
                    $perPersona->set('rep_per_persona_id', null);
                    $perPersona->set('fecha_defuncion', null);
                    $copropietario = $perPersona->guardar();
                } else {
                    $copropietario = $idCopropietarioExiste;
                }

                $proPropietario->set('per_persona_id', $copropietario);
                $proPropietario->set('per_direccion_id', null);
                $proPropietario->set('tiene_titulo', $propietarioTitulo);
                $proPropietario->set('numero', $numeroCoPropietario);
                $proPropietario->set('representante', 'TRUE');
                $proPropietario->set('porcentaje_copropiedad', $porcentajeCopropiedad);
                $proPropietario->set('pro_forma_adquisicion_id', $formaAdquisicion);
                $proPropietario->set('esc_protocolizacion_id', $idEscProtocolizacion);
                $proPropietario->set('sin_perfeccionar', $sinPerfeccionar);
                $proPropietario->set('esc_inscripcion_id', $idEscInscripcion);
                $proPropietario->set('estado_civil_compra', null);
                $proPropietario->set('con_persona_id', null);
                $proPropietario->set('pro_tipo_poseedor_id', null);
                $proPropietario->set('anio_posesion', null);
                $proPropietario->set('descripcion', null);
                $proPropietario->set('pre_predio_id', $idPrePredio);
                $proPropietario->set('precio_compra_comercial', null);
                $proPropietario->set('pro_pueblo_etnia', null);
                $idCopropietario = $proPropietario->guardar();
            }
        } else {
            $idCopropietario = NULL;
        }
    } elseif ($personeriaPropietario == 'juridica') {

        if ($propietarioJuridicoDominio !== 'municipal') { //si el dominio es diferente de municipal
            //Se valida que el número de identificación sea correcto
            $validarIdentificacionPropietario = $util->validarRuc($propietarioJuridicoNroIdentificacion);
            //Se valida que la persona exista en Base de Datos
            $perPersona->set('numero_identificacion', $propietarioJuridicoNroIdentificacion);
            $propietarioJuridicaEstaCreado = $perPersona->validarPersonaCreada();

            if ($propietarioJuridicaEstaCreado == 0) {
                //Creamos la persona
                $perPersona->set('tipo_identificacion', $propietarioJuridicoTipoIdentificacion);
                $perPersona->set('numero_identificacion', $propietarioJuridicoNroIdentificacion);
                $perPersona->set('personeria', 'juridica');
                $perPersona->set('dominio', $propietarioJuridicoDominio);
                $perPersona->set('nombres', NULL);
                $perPersona->set('apellidos', NULL);
                $perPersona->set('razon_social', $propietarioJuridicoRazonSocial);
                $perPersona->set('estado_civil', NULL);
                $perPersona->set('fecha_nacimiento', NULL);
                $perPersona->set('carnet_discapacidad', NULL);
                $perPersona->set('porcentaje_discapacidad', NULL);
                $perPersona->set('tipo_discapacidad', NULL);
                $perPersona->set('descripcion', null);
                if ($validarIdentificacionPropietario == 1) {
                    $perPersona->set('es_validado', ES_VALIDADO);
                } else {
                    $perPersona->set('es_validado', NO_ES_VALIDADO);
                }
                $perPersona->set('es_activo', ES_ACTIVO);
                $perPersona->set('rep_per_persona_id', NULL);
                $perPersona->set('fecha_defuncion', NULL);
                $idProPropietarioJuridico = $perPersona->guardar();
            } else {
                // Se actualzian los datos de la persona
                $perPersona->set('tipo_identificacion', $propietarioJuridicoTipoIdentificacion);
                $perPersona->set('numero_identificacion', $propietarioJuridicoNroIdentificacion);
                $perPersona->set('personeria', 'juridica');
                $perPersona->set('dominio', $propietarioJuridicoDominio);
                $perPersona->set('nombres', NULL);
                $perPersona->set('apellidos', NULL);
                $perPersona->set('razon_social', $propietarioJuridicoRazonSocial);
                $perPersona->set('estado_civil', NULL);
                $perPersona->set('fecha_nacimiento', NULL);
                $perPersona->set('carnet_discapacidad', NULL);
                $perPersona->set('porcentaje_discapacidad', NULL);
                $perPersona->set('tipo_discapacidad', NULL);
                $perPersona->set('descripcion', null);
                if ($validarIdentificacionPropietario == 1) {
                    $perPersona->set('es_validado', ES_VALIDADO);
                } else {
                    $perPersona->set('es_validado', NO_ES_VALIDADO);
                }
                $perPersona->set('es_activo', ES_ACTIVO);
                $perPersona->set('rep_per_persona_id', NULL);
                $perPersona->set('fecha_defuncion', NULL);
                $perPersona->set('id', $propietarioJuridicaEstaCreado);
                $idProPropietarioJuridico = $perPersona->actualizar();
            }

            //Si la notificacion es al mismo propietario, creamos la notificacion
            if ($notificacionCuandoEsPropietario == 'TRUE') {
                $perDireccion->set('per_persona_id', $idProPropietarioJuridico);
                $perDireccion->set('per_tipo_direccion_id', $notificacionTipoDireccion);
                $perDireccion->set('pais', $notificacionPais);
                $perDireccion->set('est_canton_id', $notificacionCanton);
                $perDireccion->set('est_parroquia_id', $notificacionParroquia);
                $perDireccion->set('telefono', $notificacionConvencional);
                $perDireccion->set('direccion', $notificacionDireccion);
                $perDireccion->set('correo_electronico', $notificacionEmail);
                $perDireccion->set('telefono_celular', $notificacionCelular);
                $idProPropietarioJuridicoDireccion = $perDireccion->guardar();
            } else {

                $idProPropietarioJuridicoDireccion = null;

                $nroIdentificacionRandomica = mt_rand();
                $perPersona->set('tipo_identificacion', 'otro');
                $perPersona->set('numero_identificacion', $nroIdentificacionRandomica);
                $perPersona->set('personeria', 'natural');
                $perPersona->set('dominio', null);
                $perPersona->set('nombres', $notificacionNombres);
                $perPersona->set('apellidos', $notificacionApellidos);
                $perPersona->set('razon_social', null);
                $perPersona->set('estado_civil', null);
                $perPersona->set('fecha_nacimiento', null);
                $perPersona->set('carnet_discapacidad', null);
                $perPersona->set('porcentaje_discapacidad', null);
                $perPersona->set('tipo_discapacidad', null);
                $perPersona->set('descripcion', null);
                $perPersona->set('es_validado', NO_ES_VALIDADO);
                $perPersona->set('es_activo', 'TRUE');
                $perPersona->set('rep_per_persona_id', null);
                $perPersona->set('fecha_defuncion', null);
                $idPersonaJuridicaNotificacion = $perPersona->guardar();

                $perDireccion->set('per_persona_id', $idPersonaJuridicaNotificacion);
                $perDireccion->set('per_tipo_direccion_id', $notificacionTipoDireccion);
                $perDireccion->set('pais', $notificacionPais);
                $perDireccion->set('est_canton_id', $notificacionCanton);
                $perDireccion->set('est_parroquia_id', $notificacionParroquia);
                $perDireccion->set('telefono', $notificacionConvencional);
                $perDireccion->set('direccion', $notificacionDireccion);
                $perDireccion->set('correo_electronico', $notificacionEmail);
                $perDireccion->set('telefono_celular', $notificacionCelular);
                $idPersonaJuridicaDireccionNotificacion = $perDireccion->guardar();
            }
            $proPropietario->set('per_persona_id', $idProPropietarioJuridico);
            $proPropietario->set('per_direccion_id', $idProPropietarioJuridicoDireccion);
            $proPropietario->set('tiene_titulo', $propietarioTitulo);
            $proPropietario->set('numero', 1);
            $proPropietario->set('representante', 'TRUE');
            $proPropietario->set('porcentaje_copropiedad', 100);
            $proPropietario->set('pro_forma_adquisicion_id', $formaAdquisicion);
            $proPropietario->set('esc_protocolizacion_id', $idEscProtocolizacion);
            $proPropietario->set('sin_perfeccionar', $sinPerfeccionar);
            $proPropietario->set('esc_inscripcion_id', $idEscInscripcion);
            $proPropietario->set('estado_civil_compra', NULL);
            $proPropietario->set('con_persona_id', NULL);
            $proPropietario->set('pro_tipo_poseedor_id', NULL);
            $proPropietario->set('anio_posesion', NULL);
            $proPropietario->set('descripcion', NULL);
            $proPropietario->set('pre_predio_id', $idPrePredio);
            $proPropietario->set('precio_compra_comercial', $propietarioPrecioCompraComercial);
            $proPropietario->set('pro_pueblo_etnia', NULL);
            $idProPropietario = $proPropietario->guardar();
        } else {
            //Se valida que el número de identificación sea correcto
            $validarIdentificacionPropietario = $util->validarRuc($propietarioJuridicoNroIdentificacion);
            //Se valida que la persona exista en Base de Datos
            $perPersona->set('numero_identificacion', $propietarioJuridicoNroIdentificacion);
            $propietarioJuridicaEstaCreado = $perPersona->validarPersonaCreada();

            if ($propietarioJuridicaEstaCreado == 0) {
                //Creamos la persona
                $perPersona->set('tipo_identificacion', $propietarioJuridicoTipoIdentificacion);
                $perPersona->set('numero_identificacion', $propietarioJuridicoNroIdentificacion);
                $perPersona->set('personeria', 'juridica');
                $perPersona->set('dominio', $propietarioJuridicoDominio);
                $perPersona->set('nombres', NULL);
                $perPersona->set('apellidos', NULL);
                $perPersona->set('razon_social', $propietarioJuridicoRazonSocial);
                $perPersona->set('estado_civil', NULL);
                $perPersona->set('fecha_nacimiento', NULL);
                $perPersona->set('carnet_discapacidad', NULL);
                $perPersona->set('porcentaje_discapacidad', NULL);
                $perPersona->set('tipo_discapacidad', NULL);
                $perPersona->set('descripcion', null);
                if ($validarIdentificacionPropietario == 1) {
                    $perPersona->set('es_validado', ES_VALIDADO);
                } else {
                    $perPersona->set('es_validado', NO_ES_VALIDADO);
                }
                $perPersona->set('es_activo', ES_ACTIVO);
                $perPersona->set('rep_per_persona_id', NULL);
                $perPersona->set('fecha_defuncion', NULL);
                $idProPropietarioJuridico = $perPersona->guardar();
            } else {
                // Se actualzian los datos de la persona
                $perPersona->set('tipo_identificacion', $propietarioJuridicoTipoIdentificacion);
                $perPersona->set('numero_identificacion', $propietarioJuridicoNroIdentificacion);
                $perPersona->set('personeria', 'juridica');
                $perPersona->set('dominio', $propietarioJuridicoDominio);
                $perPersona->set('nombres', NULL);
                $perPersona->set('apellidos', NULL);
                $perPersona->set('razon_social', $propietarioJuridicoRazonSocial);
                $perPersona->set('estado_civil', NULL);
                $perPersona->set('fecha_nacimiento', NULL);
                $perPersona->set('carnet_discapacidad', NULL);
                $perPersona->set('porcentaje_discapacidad', NULL);
                $perPersona->set('tipo_discapacidad', NULL);
                $perPersona->set('descripcion', null);
                if ($validarIdentificacionPropietario == 1) {
                    $perPersona->set('es_validado', ES_VALIDADO);
                } else {
                    $perPersona->set('es_validado', NO_ES_VALIDADO);
                }
                $perPersona->set('es_activo', ES_ACTIVO);
                $perPersona->set('rep_per_persona_id', NULL);
                $perPersona->set('fecha_defuncion', NULL);
                $perPersona->set('id', $propietarioJuridicaEstaCreado);
                $idProPropietarioJuridico = $perPersona->actualizar();
            }

            //Si la notificacion es al mismo propietario, creamos la notificacion
            if ($notificacionCuandoEsPropietario == 'TRUE') {
                $perDireccion->set('per_persona_id', $idProPropietarioJuridico);
                $perDireccion->set('per_tipo_direccion_id', $notificacionTipoDireccion);
                $perDireccion->set('pais', $notificacionPais);
                $perDireccion->set('est_canton_id', $notificacionCanton);
                $perDireccion->set('est_parroquia_id', $notificacionParroquia);
                $perDireccion->set('telefono', $notificacionConvencional);
                $perDireccion->set('direccion', $notificacionDireccion);
                $perDireccion->set('correo_electronico', $notificacionEmail);
                $perDireccion->set('telefono_celular', $notificacionCelular);
                $idProPropietarioJuridicoDireccion = $perDireccion->guardar();
            } else {

                $idProPropietarioJuridicoDireccion = NULL;

                $nroIdentificacionRandomica = mt_rand();
                $perPersona->set('tipo_identificacion', 'otro');
                $perPersona->set('numero_identificacion', $nroIdentificacionRandomica);
                $perPersona->set('personeria', 'natural');
                $perPersona->set('dominio', null);
                $perPersona->set('nombres', $notificacionNombres);
                $perPersona->set('apellidos', $notificacionApellidos);
                $perPersona->set('razon_social', null);
                $perPersona->set('estado_civil', null);
                $perPersona->set('fecha_nacimiento', null);
                $perPersona->set('carnet_discapacidad', null);
                $perPersona->set('porcentaje_discapacidad', null);
                $perPersona->set('tipo_discapacidad', null);
                $perPersona->set('descripcion', null);
                $perPersona->set('es_validado', NO_ES_VALIDADO);
                $perPersona->set('es_activo', 'TRUE');
                $perPersona->set('rep_per_persona_id', null);
                $perPersona->set('fecha_defuncion', null);
                $idPersonaJuridicaNotificacion = $perPersona->guardar();

                $perDireccion->set('per_persona_id', $idPersonaJuridicaNotificacion);
                $perDireccion->set('per_tipo_direccion_id', $notificacionTipoDireccion);
                $perDireccion->set('pais', $notificacionPais);
                $perDireccion->set('est_canton_id', $notificacionCanton);
                $perDireccion->set('est_parroquia_id', $notificacionParroquia);
                $perDireccion->set('telefono', $notificacionConvencional);
                $perDireccion->set('direccion', $notificacionDireccion);
                $perDireccion->set('correo_electronico', $notificacionEmail);
                $perDireccion->set('telefono_celular', $notificacionCelular);
                $idPersonaJuridicaDireccionNotificacion = $perDireccion->guardar();
            }
            $proPropietario->set('per_persona_id', $idProPropietarioJuridico);
            $proPropietario->set('per_direccion_id', $idProPropietarioJuridicoDireccion);
            $proPropietario->set('tiene_titulo', $propietarioTitulo);
            $proPropietario->set('numero', 1);
            $proPropietario->set('representante', 'TRUE');
            $proPropietario->set('porcentaje_copropiedad', 100);
            $proPropietario->set('pro_forma_adquisicion_id', $formaAdquisicion);
            $proPropietario->set('esc_protocolizacion_id', $idEscProtocolizacion);
            $proPropietario->set('sin_perfeccionar', $sinPerfeccionar);
            $proPropietario->set('esc_inscripcion_id', $idEscInscripcion);
            $proPropietario->set('estado_civil_compra', NULL);
            $proPropietario->set('con_persona_id', NULL);
            $proPropietario->set('pro_tipo_poseedor_id', NULL);
            $proPropietario->set('anio_posesion', NULL);
            $proPropietario->set('descripcion', NULL);
            $proPropietario->set('pre_predio_id', $idPrePredio);
            $proPropietario->set('precio_compra_comercial', NULL);
            $proPropietario->set('pro_pueblo_etnia', NULL);
            $idProPropietario = $proPropietario->guardar();

            if ($propietarioJuridicoCondicionMunicipal == 1) { // Cuando es Uso Propio
                //Validamos y guardamos la información de las escrituras
                if ($propietarioJuridicoMunicipalSinPerfeccionar == 'TRUE') {
                    $escProtocolizacion->set('celebrado_ante', $municipalProtocolizacionCelebradoAnte);
                    $escProtocolizacion->set('est_canton_id', $municipalProtocolizacionCanton);
                    $escProtocolizacion->set('notaria', $municipalProtocolizacionNotaria);
                    $escProtocolizacion->set('fecha', $municipalProtocolizacionFecha);
                    $escProtocolizacion->set('es_activo', ES_ACTIVO);
                    $idEscProtocolizacionDominioMunicipal = $escProtocolizacion->guardar();
                    $idEscInscripcionDominioMunicipal = NULL;
                } else {
                    $escProtocolizacion->set('celebrado_ante', $municipalProtocolizacionCelebradoAnte);
                    $escProtocolizacion->set('est_canton_id', $municipalProtocolizacionCanton);
                    $escProtocolizacion->set('notaria', $municipalProtocolizacionNotaria);
                    $escProtocolizacion->set('fecha', $municipalProtocolizacionFecha);
                    $escProtocolizacion->set('es_activo', ES_ACTIVO);
                    $idEscProtocolizacionDominioMunicipal = $escProtocolizacion->guardar();

                    $escInscripcion->set('est_canton_id', $municipalInscripcionCanton);
                    $escInscripcion->set('matricula', $municipalInscripcionMatricula);
                    $escInscripcion->set('libro', $municipalInscripcionLibro);
                    $escInscripcion->set('foja', $municipalInscripcionFoja);
                    $escInscripcion->set('fecha', $municipalInscripcionFecha);
                    $escInscripcion->set('es_activo', ES_ACTIVO);
                    $idEscInscripcionDominioMunicipal = $escInscripcion->guardar();
                }
            } else {
                //Validamos y guardamos la información de las escrituras
                if ($propietarioJuridicoMunicipalSinPerfeccionar == 'TRUE') {
                    $escProtocolizacion->set('celebrado_ante', $municipalProtocolizacionCelebradoAnte);
                    $escProtocolizacion->set('est_canton_id', $municipalProtocolizacionCanton);
                    $escProtocolizacion->set('notaria', $municipalProtocolizacionNotaria);
                    $escProtocolizacion->set('fecha', $municipalProtocolizacionFecha);
                    $escProtocolizacion->set('es_activo', ES_ACTIVO);
                    $idEscProtocolizacionDominioMunicipal = $escProtocolizacion->guardar();
                    $idEscInscripcionDominioMunicipal = NULL;
                } else {
                    $escProtocolizacion->set('celebrado_ante', $municipalProtocolizacionCelebradoAnte);
                    $escProtocolizacion->set('est_canton_id', $municipalProtocolizacionCanton);
                    $escProtocolizacion->set('notaria', $municipalProtocolizacionNotaria);
                    $escProtocolizacion->set('fecha', $municipalProtocolizacionFecha);
                    $escProtocolizacion->set('es_activo', ES_ACTIVO);
                    $idEscProtocolizacionDominioMunicipal = $escProtocolizacion->guardar();

                    $escInscripcion->set('est_canton_id', $municipalInscripcionCanton);
                    $escInscripcion->set('matricula', $municipalInscripcionMatricula);
                    $escInscripcion->set('libro', $municipalInscripcionLibro);
                    $escInscripcion->set('foja', $municipalInscripcionFoja);
                    $escInscripcion->set('fecha', $municipalInscripcionFecha);
                    $escInscripcion->set('es_activo', ES_ACTIVO);
                    $idEscInscripcionDominioMunicipal = $escInscripcion->guardar();
                }

                if ($municipalBeneficiarioPersoneria == 'natural') {
                    $validarIdentificacion = $util->validarCedula($municipalBeneficiarioNaturalNroIdentificacion);
                    $perPersona->set('numero_identificacion', $municipalBeneficiarioNaturalNroIdentificacion);
                    $idPersonaNaturalBeneficiariaEstaCreada = $perPersona->validarPersonaCreada();

                    if ($idPersonaNaturalBeneficiariaEstaCreada == 0) {
                        $perPersona->set('tipo_identificacion', $municipalBeneficiarioNaturalTipoIdentificacion);
                        $perPersona->set('numero_identificacion', $municipalBeneficiarioNaturalNroIdentificacion);
                        $perPersona->set('personeria', 'natural');
                        $perPersona->set('dominio', NULL);
                        $perPersona->set('nombres', $municipalBeneficiarioNaturalNombres);
                        $perPersona->set('apellidos', $municipalBeneficiarioNaturalApellidos);
                        $perPersona->set('razon_social', NULL);
                        $perPersona->set('estado_civil', NULL);
                        $perPersona->set('fecha_nacimiento', NULL);
                        $perPersona->set('carnet_discapacidad', NULL);
                        $perPersona->set('porcentaje_discapacidad', NULL);
                        $perPersona->set('tipo_discapacidad', NULL);
                        $perPersona->set('descripcion', null);
                        if ($validarIdentificacion == 1) {
                            $perPersona->set('es_validado', ES_VALIDADO);
                        } else {
                            $perPersona->set('es_validado', NO_ES_VALIDADO);
                        }
                        $perPersona->set('es_activo', ES_ACTIVO);
                        $perPersona->set('rep_per_persona_id', NULL);
                        $perPersona->set('fecha_defuncion', NULL);
                        $idPersonaNaturalBeneficiaria = $perPersona->guardar();
                    } else {
                        $idPersonaNaturalBeneficiaria = $idPersonaNaturalBeneficiariaEstaCreada;
                    }
                } else {
                    $validarIdentificacion = $util->validarRuc($municipalBeneficiarioJuridicaNroIdentificacion);
                    $perPersona->set('numero_identificacion', $municipalBeneficiarioJuridicaNroIdentificacion);
                    $idPersonaJuridicaBeneficiariaEstaCreada = $perPersona->validarPersonaCreada();

                    if ($idPersonaNaturalBeneficiariaEstaCreada == 0) {
                        $perPersona->set('tipo_identificacion', $municipalBeneficiarioJuridicaTipoIdentificacion);
                        $perPersona->set('numero_identificacion', $municipalBeneficiarioJuridicaNroIdentificacion);
                        $perPersona->set('personeria', 'natural');
                        $perPersona->set('dominio', NULL);
                        $perPersona->set('nombres', NULL);
                        $perPersona->set('apellidos', NULL);
                        $perPersona->set('razon_social', $municipalBeneficiarioJuridicaRazonSocial);
                        $perPersona->set('estado_civil', NULL);
                        $perPersona->set('fecha_nacimiento', NULL);
                        $perPersona->set('carnet_discapacidad', NULL);
                        $perPersona->set('porcentaje_discapacidad', NULL);
                        $perPersona->set('tipo_discapacidad', NULL);
                        $perPersona->set('descripcion', null);
                        if ($validarIdentificacion == 1) {
                            $perPersona->set('es_validado', ES_VALIDADO);
                        } else {
                            $perPersona->set('es_validado', NO_ES_VALIDADO);
                        }
                        $perPersona->set('es_activo', ES_ACTIVO);
                        $perPersona->set('rep_per_persona_id', NULL);
                        $perPersona->set('fecha_defuncion', NULL);
                        $idPersonaJuridicaBeneficiaria = $perPersona->guardar();
                    } else {
                        $idPersonaJuridicaBeneficiaria = $idPersonaJuridicaBeneficiariaEstaCreada;
                    }
                }
                $munMunicipal->set('pro_propietario_id', $idProPropietario);
                $munMunicipal->set('mun_tipo_condicion_id', $propietarioJuridicoCondicionMunicipal);
                $munMunicipal->set('anios_documento', $propietarioJuridicoMunicipalTiempoEnAnios);
                $munMunicipal->set('per_persona_id', $idProPropietarioJuridico);
                $munMunicipal->set('per_direccion_id', $idProPropietarioJuridicoDireccion);
                $munMunicipal->set('esc_protocolizacion_id', $idEscProtocolizacionDominioMunicipal);
                $munMunicipal->set('esc_inscripcion_id', $idEscInscripcionDominioMunicipal);
                $munMunicipal->set('es_activo', ES_ACTIVO);
                $munMunicipal->set('descripcion', NULL);
                $idMunMunicipal = $munMunicipal->guardar();
            }
        }
    }
} else { //Posesionario
    if (($propietarioNaturalEstadoCivil == 'casado') || ($propietarioNaturalEstadoCivil == 'union de hecho')) {

        //Se valida que el número de identificación sea correcto
        $validarIdentificacionPropietario = $util->validarCedula($propietarioNaturalNumeroIdentificacion);
        $validarIdentificacionConyuguePropietario = $util->validarCedula($conyuguePropietarioNaturalNumeroIdentificacion);

        //Se valida que la persona exista en Base de Datos
        $perPersona->set('numero_identificacion', $propietarioNaturalNumeroIdentificacion);
        $propietarioNaturalEstaCreado = $perPersona->validarPersonaCreada();
        $perPersona->set('numero_identificacion', $conyuguePropietarioNaturalNumeroIdentificacion);
        $conyuguePropietarioNaturalEstaCreado = $perPersona->validarPersonaCreada();

        //Si el propietario Natural no está creado
        if ($propietarioNaturalEstaCreado == 0) {
            //Creamos la persona
            $perPersona->set('tipo_identificacion', $propietarioNaturalTipoIdentificacion);
            $perPersona->set('numero_identificacion', $propietarioNaturalNumeroIdentificacion);
            $perPersona->set('personeria', 'natural');
            $perPersona->set('dominio', null);
            $perPersona->set('nombres', $propietarioNaturalNombre);
            $perPersona->set('apellidos', $propietarioNaturalApellidos);
            $perPersona->set('razon_social', null);
            $perPersona->set('estado_civil', $propietarioNaturalEstadoCivil);
            $perPersona->set('fecha_nacimiento', $propietarioNaturalFechaNacimiento);
            $perPersona->set('carnet_discapacidad', $propietarioNaturalDiscapacidadNroCarnet);
            $perPersona->set('porcentaje_discapacidad', $propietarioNaturalDiscapacidadPorcentaje);
            $perPersona->set('tipo_discapacidad', $propietarioNaturalDiscapacidadTipo);
            $perPersona->set('descripcion', null);
            if ($validarIdentificacionPropietario == 1) {
                $perPersona->set('es_validado', ES_VALIDADO);
            } else {
                $perPersona->set('es_validado', NO_ES_VALIDADO);
            }
            $perPersona->set('es_activo', ES_ACTIVO);
            $perPersona->set('rep_per_persona_id', null);
            $perPersona->set('fecha_defuncion', $propietarioNaturalFechaDefuncion);
            $idProPropietarioNaturalPosesionario = $perPersona->guardar();
        } else {
            // Se actualzian los datos de la persona
            $perPersona->set('tipo_identificacion', $propietarioNaturalTipoIdentificacion);
            $perPersona->set('numero_identificacion', $propietarioNaturalNumeroIdentificacion);
            $perPersona->set('personeria', 'natural');
            $perPersona->set('dominio', null);
            $perPersona->set('nombres', $propietarioNaturalNombre);
            $perPersona->set('apellidos', $propietarioNaturalApellidos);
            $perPersona->set('razon_social', null);
            $perPersona->set('estado_civil', $propietarioNaturalEstadoCivil);
            $perPersona->set('fecha_nacimiento', $propietarioNaturalFechaNacimiento);
            $perPersona->set('carnet_discapacidad', $propietarioNaturalDiscapacidadNroCarnet);
            $perPersona->set('porcentaje_discapacidad', $propietarioNaturalDiscapacidadPorcentaje);
            $perPersona->set('tipo_discapacidad', $propietarioNaturalDiscapacidadTipo);
            $perPersona->set('descripcion', null);
            if ($validarIdentificacionPropietario == 1) {
                $perPersona->set('es_validado', ES_VALIDADO);
            } else {
                $perPersona->set('es_validado', NO_ES_VALIDADO);
            }
            $perPersona->set('es_activo', ES_ACTIVO);
            $perPersona->set('rep_per_persona_id', null);
            $perPersona->set('fecha_defuncion', $propietarioNaturalFechaDefuncion);
            $perPersona->set('id', $propietarioNaturalEstaCreado);
            $idProPropietarioNaturalPosesionario = $perPersona->actualizar();
        }

        //Guardamos el conyugué del propietario
        if ($conyuguePropietarioNaturalEstaCreado == 0) {
            $perPersona->set('tipo_identificacion', $conyuguePropietarioNaturalTipoIdentificacion);
            $perPersona->set('numero_identificacion', $conyuguePropietarioNaturalNumeroIdentificacion);
            $perPersona->set('personeria', 'natural');
            $perPersona->set('dominio', null);
            $perPersona->set('nombres', $conyuguePropietarioNaturalNombres);
            $perPersona->set('apellidos', $conyuguePropietarioNaturalApellidos);
            $perPersona->set('razon_social', null);
            $perPersona->set('estado_civil', $propietarioNaturalEstadoCivil);
            $perPersona->set('fecha_nacimiento', $conyuguePropietarioNaturalFechaNacimiento);
            $perPersona->set('carnet_discapacidad', NULL);
            $perPersona->set('porcentaje_discapacidad', NULL);
            $perPersona->set('tipo_discapacidad', NULL);
            $perPersona->set('descripcion', null);
            if ($validarIdentificacionConyuguePropietario == 1) {
                $perPersona->set('es_validado', ES_VALIDADO);
            } else {
                $perPersona->set('es_validado', NO_ES_VALIDADO);
            }
            $perPersona->set('es_activo', ES_ACTIVO);
            $perPersona->set('rep_per_persona_id', null);
            $perPersona->set('fecha_defuncion', $conyuguePropietarioFechaDefuncion);
            $idProPropietarioConyugueNaturalPosesionario = $perPersona->guardar();
        } else {
            $perPersona->set('tipo_identificacion', $conyuguePropietarioNaturalTipoIdentificacion);
            $perPersona->set('numero_identificacion', $conyuguePropietarioNaturalNumeroIdentificacion);
            $perPersona->set('personeria', 'natural');
            $perPersona->set('dominio', null);
            $perPersona->set('nombres', $conyuguePropietarioNaturalNombres);
            $perPersona->set('apellidos', $conyuguePropietarioNaturalApellidos);
            $perPersona->set('razon_social', null);
            $perPersona->set('estado_civil', $propietarioNaturalEstadoCivil);
            $perPersona->set('fecha_nacimiento', $conyuguePropietarioNaturalFechaNacimiento);
            $perPersona->set('carnet_discapacidad', NULL);
            $perPersona->set('porcentaje_discapacidad', NULL);
            $perPersona->set('tipo_discapacidad', NULL);
            $perPersona->set('descripcion', null);
            if ($validarIdentificacionConyuguePropietario == 1) {
                $perPersona->set('es_validado', ES_VALIDADO);
            } else {
                $perPersona->set('es_validado', NO_ES_VALIDADO);
            }
            $perPersona->set('es_activo', ES_ACTIVO);
            $perPersona->set('rep_per_persona_id', null);
            $perPersona->set('fecha_defuncion', $conyuguePropietarioFechaDefuncion);
            $perPersona->set('id', $conyuguePropietarioNaturalEstaCreado);
            $idProPropietarioConyugueNaturalPosesionario = $perPersona->actualizar();
        }

        //Si la notificacion es al mismo propietario, creamos la notificacion
        if ($notificacionCuandoEsPropietario == 'TRUE') {
            $perDireccion->set('per_persona_id', $idProPropietarioNaturalPosesionario);
            $perDireccion->set('per_tipo_direccion_id', $notificacionTipoDireccion);
            $perDireccion->set('pais', $notificacionPais);
            $perDireccion->set('est_canton_id', $notificacionCanton);
            $perDireccion->set('est_parroquia_id', $notificacionParroquia);
            $perDireccion->set('telefono', $notificacionConvencional);
            $perDireccion->set('direccion', $notificacionDireccion);
            $perDireccion->set('correo_electronico', $notificacionEmail);
            $perDireccion->set('telefono_celular', $notificacionCelular);
            $idProPropietarioNaturalDireccionPosesionario = $perDireccion->guardar();
        } else {

            $idProPropietarioNaturalDireccionPosesionario = null;

            $nroIdentificacionRandomica = mt_rand();
            $perPersona->set('tipo_identificacion', 'otro');
            $perPersona->set('numero_identificacion', $nroIdentificacionRandomica);
            $perPersona->set('personeria', 'natural');
            $perPersona->set('dominio', null);
            $perPersona->set('nombres', $notificacionNombres);
            $perPersona->set('apellidos', $notificacionApellidos);
            $perPersona->set('razon_social', null);
            $perPersona->set('estado_civil', null);
            $perPersona->set('fecha_nacimiento', null);
            $perPersona->set('carnet_discapacidad', null);
            $perPersona->set('porcentaje_discapacidad', null);
            $perPersona->set('tipo_discapacidad', null);
            $perPersona->set('descripcion', null);
            $perPersona->set('es_validado', NO_ES_VALIDADO);
            $perPersona->set('es_activo', 'TRUE');
            $perPersona->set('rep_per_persona_id', null);
            $perPersona->set('fecha_defuncion', null);
            $idPersonaNaturalNotificacionPosesionario = $perPersona->guardar();

            $perDireccion->set('per_persona_id', $idPersonaNaturalNotificacion);
            $perDireccion->set('per_tipo_direccion_id', $notificacionTipoDireccion);
            $perDireccion->set('pais', $notificacionPais);
            $perDireccion->set('est_canton_id', $notificacionCanton);
            $perDireccion->set('est_parroquia_id', $notificacionParroquia);
            $perDireccion->set('telefono', $notificacionConvencional);
            $perDireccion->set('direccion', $notificacionDireccion);
            $perDireccion->set('correo_electronico', $notificacionEmail);
            $perDireccion->set('telefono_celular', $notificacionCelular);
            $idPersonaNaturalDireccionNotificacionPosesionario = $perDireccion->guardar();
        }
    } else { //si el propietario no tiene conyugue
        //Se valida que el número de identificación sea correcto
        $validarIdentificacionPropietario = $util->validarCedula($propietarioNaturalNumeroIdentificacion);

        //Se valida que la persona exista en Base de Datos
        $perPersona->set('numero_identificacion', $propietarioNaturalNumeroIdentificacion);
        $propietarioNaturalEstaCreado = $perPersona->validarPersonaCreada();

        //$idProPropietarioConyugueNaturalPosesionario = null;
        //Si el propietario Natural no está creado
        if ($propietarioNaturalEstaCreado == 0) {
            //Creamos la persona
            $perPersona->set('tipo_identificacion', $propietarioNaturalTipoIdentificacion);
            $perPersona->set('numero_identificacion', $propietarioNaturalNumeroIdentificacion);
            $perPersona->set('personeria', 'natural');
            $perPersona->set('dominio', null);
            $perPersona->set('nombres', $propietarioNaturalNombre);
            $perPersona->set('apellidos', $propietarioNaturalApellidos);
            $perPersona->set('razon_social', null);
            $perPersona->set('estado_civil', $propietarioNaturalEstadoCivil);
            $perPersona->set('fecha_nacimiento', $propietarioNaturalFechaNacimiento);
            $perPersona->set('carnet_discapacidad', $propietarioNaturalDiscapacidadNroCarnet);
            $perPersona->set('porcentaje_discapacidad', $propietarioNaturalDiscapacidadPorcentaje);
            $perPersona->set('tipo_discapacidad', $propietarioNaturalDiscapacidadTipo);
            $perPersona->set('descripcion', null);
            if ($validarIdentificacionPropietario == 1) {
                $perPersona->set('es_validado', ES_VALIDADO);
            } else {
                $perPersona->set('es_validado', NO_ES_VALIDADO);
            }
            $perPersona->set('es_activo', ES_ACTIVO);
            $perPersona->set('rep_per_persona_id', null);
            $perPersona->set('fecha_defuncion', $propietarioNaturalFechaDefuncion);
            $idProPropietarioNaturalPosesionario = $perPersona->guardar();
        } else {
            // Se actualzian los datos de la persona
            $perPersona->set('tipo_identificacion', $propietarioNaturalTipoIdentificacion);
            $perPersona->set('numero_identificacion', $propietarioNaturalNumeroIdentificacion);
            $perPersona->set('personeria', 'natural');
            $perPersona->set('dominio', null);
            $perPersona->set('nombres', $propietarioNaturalNombre);
            $perPersona->set('apellidos', $propietarioNaturalApellidos);
            $perPersona->set('razon_social', null);
            $perPersona->set('estado_civil', $propietarioNaturalEstadoCivil);
            $perPersona->set('fecha_nacimiento', $propietarioNaturalFechaNacimiento);
            $perPersona->set('carnet_discapacidad', $propietarioNaturalDiscapacidadNroCarnet);
            $perPersona->set('porcentaje_discapacidad', $propietarioNaturalDiscapacidadPorcentaje);
            $perPersona->set('tipo_discapacidad', $propietarioNaturalDiscapacidadTipo);
            $perPersona->set('descripcion', null);
            if ($validarIdentificacionPropietario == 1) {
                $perPersona->set('es_validado', ES_VALIDADO);
            } else {
                $perPersona->set('es_validado', NO_ES_VALIDADO);
            }
            $perPersona->set('es_activo', ES_ACTIVO);
            $perPersona->set('rep_per_persona_id', null);
            $perPersona->set('fecha_defuncion', $propietarioNaturalFechaDefuncion);
            $perPersona->set('id', $propietarioNaturalEstaCreado);
            $idProPropietarioNaturalPosesionario = $perPersona->actualizar();
        }

        //Si la notificacion es al mismo propietario, creamos la notificacion
        if ($notificacionCuandoEsPropietario == 'TRUE') {
            $perDireccion->set('per_persona_id', $idProPropietarioNaturalPosesionario);
            $perDireccion->set('per_tipo_direccion_id', $notificacionTipoDireccion);
            $perDireccion->set('pais', $notificacionPais);
            $perDireccion->set('est_canton_id', $notificacionCanton);
            $perDireccion->set('est_parroquia_id', $notificacionParroquia);
            $perDireccion->set('telefono', $notificacionConvencional);
            $perDireccion->set('direccion', $notificacionDireccion);
            $perDireccion->set('correo_electronico', $notificacionEmail);
            $perDireccion->set('telefono_celular', $notificacionCelular);
            $idProPropietarioNaturalDireccionPosesionario = $perDireccion->guardar();
        } else {

            $idProPropietarioNaturalDireccionPosesionario = null;

            $nroIdentificacionRandomica = mt_rand();
            $perPersona->set('tipo_identificacion', 'otro');
            $perPersona->set('numero_identificacion', $nroIdentificacionRandomica);
            $perPersona->set('personeria', 'natural');
            $perPersona->set('dominio', null);
            $perPersona->set('nombres', $notificacionNombres);
            $perPersona->set('apellidos', $notificacionApellidos);
            $perPersona->set('razon_social', null);
            $perPersona->set('estado_civil', null);
            $perPersona->set('fecha_nacimiento', null);
            $perPersona->set('carnet_discapacidad', null);
            $perPersona->set('porcentaje_discapacidad', null);
            $perPersona->set('tipo_discapacidad', null);
            $perPersona->set('descripcion', null);
            $perPersona->set('es_validado', NO_ES_VALIDADO);
            $perPersona->set('es_activo', 'TRUE');
            $perPersona->set('rep_per_persona_id', null);
            $perPersona->set('fecha_defuncion', null);
            $idPersonaNaturalNotificacionPosesionario = $perPersona->guardar();

            $perDireccion->set('per_persona_id', $idPersonaNaturalNotificacionPosesionario);
            $perDireccion->set('per_tipo_direccion_id', $notificacionTipoDireccion);
            $perDireccion->set('pais', $notificacionPais);
            $perDireccion->set('est_canton_id', $notificacionCanton);
            $perDireccion->set('est_parroquia_id', $notificacionParroquia);
            $perDireccion->set('telefono', $notificacionConvencional);
            $perDireccion->set('direccion', $notificacionDireccion);
            $perDireccion->set('correo_electronico', $notificacionEmail);
            $perDireccion->set('telefono_celular', $notificacionCelular);
            $idPersonaNaturalDireccionNotificacionPosesionario = $perDireccion->guardar();
        }
        $idProPropietarioConyugueNaturalPosesionario = NULL;
    }

    $proPropietario->set('per_persona_id', $idProPropietarioNaturalPosesionario);
    $proPropietario->set('per_direccion_id', $idProPropietarioNaturalDireccionPosesionario);
    $proPropietario->set('tiene_titulo', $propietarioTitulo);
    $proPropietario->set('numero', 1);
    $proPropietario->set('representante', 'TRUE');
    $proPropietario->set('porcentaje_copropiedad', $propietarioAlicuota);
    $proPropietario->set('pro_forma_adquisicion_id', NULL);
    $proPropietario->set('esc_protocolizacion_id', NULL);
    $proPropietario->set('sin_perfeccionar', NULL);
    $proPropietario->set('esc_inscripcion_id', NULL);
    $proPropietario->set('estado_civil_compra', NULL);
    $proPropietario->set('con_persona_id', $idProPropietarioConyugueNatural);
    $proPropietario->set('pro_tipo_poseedor_id', $tipoPoseedor);
    $proPropietario->set('anio_posesion', $poseedorAnio);
    $proPropietario->set('descripcion', $tipoPoseedorPuebloEtniaObservaciones);
    $proPropietario->set('pre_predio_id', $idPrePredio);
    $proPropietario->set('precio_compra_comercial', $propietarioPrecioCompraComercial);
    $proPropietario->set('pro_pueblo_etnia', $tipoPoseedorPuebloEtnia);
    $idProPropietarioPosesionario = $proPropietario->guardar();
}

if ($numeroBloques != 0) {
    $estPiso->set('est_poligono_id', $idEstPoligono);
    $datosPisos = $estPiso->obtenerPisos(); // => pendiente de crear el modelo

    for ($i = 0; $i < count($datosPisos); $i++) {
        $cod = $i + 1;
        $codigo = '00' . $cod;
        $codigoAcumulado = $datosPisos[$i]['codigo_acumulado'] . $codigo;
        if (!empty($datosPisos[$i]['id'])) {
            //valido si la unidad esta ingresada
            $estUnidad->set('codigo_acumulado', $codigoAcumulado);
            $idEstUnidadCreada = $estUnidad->validarUnidadIngresada();

            if ($idEstUnidadCreada == 0) {
                $estUnidad->set('es_activo', 'TRUE');
                $estUnidad->set('codigo', $codigo);
                $estUnidad->set('codigo_acumulado', $codigoAcumulado);
                $estUnidad->set('est_piso_id', $datosPisos[$i]['id']);
                $estUnidad->set('area', NULL);
                $estUnidad->set('tipo_ficha', 'edi_edificacion');
                $idEstUnidad = $estUnidad->guardar();
            } else {
                $idEstUnidad = $idEstUnidadCreada;
            }
        }
    }

    //guardo los datos de la edificacion 
    for ($i = 1; $i <= count($edificacion); $i++) {
        $numeroPisosEdificacion = $edificacion[$i]['nroPisosBloque'];
        empty($edificacion[$i]['anioRemodelacionBloque']) ? $edificacion[$i]['anioRemodelacionBloque'] = null : null;

        $estUnidad->set('cod_acumulado_bloque', $edificacion[$i]['codAcumuladoBloque']);
        $estUnidadAux = $estUnidad->obtenerUnidadPorCodBloque();

        if ($estUnidadAux != 0) {
            $idEstUnidad = $estUnidadAux;
        }

        $ediEdificacion->set('est_unidad_id', $idEstUnidad);
        $ediEdificacion->set('denominacion', null);
        $ediEdificacion->set('aumento_constructivo', null);
        $ediEdificacion->set('gen_uso_construccion_id', $edificacion[$i]['usoContruccionBloque']);
        $ediEdificacion->set('gen_estado_conservacion_id', $edificacion[$i]['estadoDeLaConservacionBloque']);
        $ediEdificacion->set('gen_etapa_construccion_id', $edificacion[$i]['etapaConstruccionBloque']);
        $ediEdificacion->set('gen_tipo_acabado_id', $edificacion[$i]['tipoAcabadoBloque']);
        $ediEdificacion->set('anio_construccion', $edificacion[$i]['anioConstruccionBloque']);
        $ediEdificacion->set('anio_restauracion', $edificacion[$i]['anioRemodelacionBloque']);
        $ediEdificacion->set('es_activo', ES_ACTIVO);
        $ediEdificacion->set('pre_predio_id', $idPrePredio);
        $ediEdificacion->set('area_declaratoria', null);
        $ediEdificacion->set('inventario_patrimonial', 'FALSE'); // Ojo determinar ********OJO**********
        $ediEdificacion->set('area_ingresada', $edificacion[$i]['areaBloque']);
        $ediEdificacion->set('numero_pisos', $edificacion[$i]['nroPisosBloque']);
        $ediEdificacion->set('descripcion', $edificacionesObservaciones);
        $idEdiEdificacion = $ediEdificacion->guardar();

        foreach ($edificacion[$i]['estructuraBloque'] as $genClaseEstructuraId => $genMaterialId) {
            $ediEstructura->set('gen_clase_estructura_id', $genClaseEstructuraId);
            $ediEstructura->set('gen_material_id', $genMaterialId);
            $ediEstructura->set('es_activo', ES_ACTIVO);
            $ediEstructura->set('edi_edificacion_id', $idEdiEdificacion);
            $idEdiEdificacionEstructura = $ediEstructura->guardar();
        }

        foreach ($edificacion[$i]['acabadosBloque'] as $genClaseAcabadoId => $genMaterialId) {
            $ediAcabado->set('gen_clase_acabado_id', $genClaseAcabadoId);
            $ediAcabado->set('gen_material_id', $genMaterialId);
            $ediAcabado->set('es_activo', ES_ACTIVO);
            $ediAcabado->set('edi_edificacion_id', $idEdiEdificacion);
            $idEdiEdificacionAcabados = $ediAcabado->guardar();
        }

        if (array_key_exists('instalacionesElectricas', $edificacion)) {
            foreach ($edificacion[$i]['instalacionesElectricas'] as $genTipoInstalacionId => $cantidad) {
                if (!empty($cantidad)) { // probar que funcione
                    if ($cantidad == 'instSobrepuestas') {
                        $ediInstalacion->set('gen_tipo_instalacion_id', 1);
                        $ediInstalacion->set('edi_edificacion_id', $idEdiEdificacion);
                        $ediInstalacion->set('cantidad', 1);
                        $ediInstalacion->set('es_activo', ES_ACTIVO);
                        $idEdiEdificacionInstalaciones = $ediInstalacion->guardar();
                    } elseif ($cantidad == 'instEmpotradas') {
                        $ediInstalacion->set('gen_tipo_instalacion_id', 2);
                        $ediInstalacion->set('edi_edificacion_id', $idEdiEdificacion);
                        $ediInstalacion->set('cantidad', 1);
                        $ediInstalacion->set('es_activo', ES_ACTIVO);
                        $idEdiEdificacionInstalaciones = $ediInstalacion->guardar();
                    } elseif (($genTipoInstalacionId == 3) || ($genTipoInstalacionId == 4)) {
                        if ($cantidad !== '' && $cantidad != 0) {
                            $ediInstalacion->set('gen_tipo_instalacion_id', $genTipoInstalacionId);
                            $ediInstalacion->set('edi_edificacion_id', $idEdiEdificacion);
                            $ediInstalacion->set('cantidad', $cantidad);
                            $ediInstalacion->set('es_activo', ES_ACTIVO);
                            $idEdiEdificacionInstalaciones = $ediInstalacion->guardar();
                        }
                    }
                }
            }
        }
    }

    //GUARDO LOS DATOS DE LAS MEJORAS - 
    if (!empty($mejora)) {
        foreach ($mejora as $mejora => $valor) {
            $mejMejora->set('gen_tipo_mejora_id', $valor['tipoMejora']);
            $mejMejora->set('dimension', $valor['dimension']);
            $mejMejora->set('gen_estado_conservacion_id', $valor['estadoConservacion']);
            $mejMejora->set('anio_instalacion', $valor['anioInstalacion']);
            $mejMejora->set('est_unidad_id', null);
            $mejMejora->set('pre_predio_id', $idPrePredio);
            $mejMejora->set('es_activo', ES_ACTIVO);
            $mejMejora->set('inventario_patrimonial', 'FALSE'); //-> REIVSAR
            $mejMejora->set('descripcion', null);
            $mejMejora->set('numero_pisos', $numeroPisosEdificacion);
            $mejMejora->set('tipo', 'no_graficada');
            $mejMejora->set('gen_etapa_construccion_id', $valor['etapaConstruccion']);
            $idMejMejora = $mejMejora->guardar();
        }
    }
}


include 'msjGuardar.php';
