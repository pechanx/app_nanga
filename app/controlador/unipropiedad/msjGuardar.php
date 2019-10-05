<?php
//require $_SERVER['DOCUMENT_ROOT'] . '/app/config/Constantes.php';

@$idLotLote != 0 ? $msjLotLote = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Lote creado </li>' : $msjLotLote = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando lote </li>';
@$idLotBarrio != 0 ? $msjLotBarrio = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Barrio creado </li>' : $msjLotBarrio = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando barrio </li>';
@$idLotCaracteristica != 0 ? $msjLotCaracteristica = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Caracteristicas del Lote creadas </li>' : $msjLotCaracteristica = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando caracteristicas del lote </li>';
@$idLotLoteServicio != 0 ? $msjLotLoteServicio = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Servicios básicos del Lote creados </li>' : $msjLotLoteServicio = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando servicios basicos del lote </li>';
@$idLotLoteVia != 0 ? $msjLotLoteVia = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Vias del lote creadas </li>' : $msjLotLoteVia = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando vias del lote </li>';
@$idJefeHogar != 0 ? $msjJefeHogar = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Jefe de hogar creado </li>' : $msjJefeHogar = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando jefe de hogar </li>';
@$idLevLevantamiento != 0 ? $msjLevLevantamiento = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Informante creado </li>' : $msjLevLevantamiento = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando informante </li>';
@$idPrePredio != 0 ? $msjPrePredio = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Predio creado </li>' : $msjPrePredio = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando predio </li>';
@$idPreCaracteristica != 0 ? $msjPreCaracteristica = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Caracteristicas del predio creadas </li>' : $msjPreCaracteristica = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando caracteristicas del predio </li>';
@$idEscProtocolizacion != 0 ? $msjEscProtocolizacion = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Protocolizacion de escritura creada </li>' : $msjEscProtocolizacion = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando protocolización </li>';
@$idEscInscripcion != 0 ? $msjEscInscripcion = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Inscripción de escritura creada </li>' : $msjEscInscripcion = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando inscripción </li>';
@$idProPropietarioNatural != 0 ? $msjProPropietarioNatural = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Propietario natural creado </li>' : $msjProPropietarioNatural = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando propietario natural </li>';
@$idProPropietarioConyugueNatural != 0 ? $msjProPropietarioConyugueNatural = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Cónyugue de propietario natural creado </li>' : $msjProPropietarioConyugueNatural = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando cónyugue de propietario natural </li>';
@$idProPropietarioNaturalDireccion != 0 ? $msjPropietarioNaturalDireccion = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Dirección para notificación de propietario creada </li>' : $msjPropietarioNaturalDireccion = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando dirección propietario natural para notificación </li>';
@$idPersonaNaturalNotificacion != 0 ? $msjPersonaNaturalNotificacion = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Persona para notificación creada </li>' : $msjPersonaNaturalNotificacion = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando Persona para notificación </li>';
@$idPersonaNaturalDireccionNotificacion != 0 ? $msjPersonaNaturalDireccionNotificacion = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Dirección de persona para notificación creada </li>' : $msjPersonaNaturalDireccionNotificacion = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando Dirección de persona para notificación </li>';
@$idProPropietario != 0 ? $msjProPropietario = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Propietario creado </li>' : $msjProPropietario = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando Propietario </li>';
@$idCopropietario != 0 ? $msjCopropietario = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> CoPropietarios creados </li>' : $msjCopropietario = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando CoPropietarios </li>';
@$idProPropietarioJuridico != 0 ? $msjProPropietarioJuridico = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Propietario juridico creado </li>' : $msjProPropietarioJuridico = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando Propietario juridico </li>';
@$idProPropietarioJuridicoDireccion != 0 ? $msjProPropietarioJuridicoDireccion = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Dirección Propietario juridico para notificación creado </li>' : $msjProPropietarioJuridicoDireccion = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando Dirección Propietario juridico para notificación </li>';

@$idPersonaJuridicaNotificacion != 0 ? $msjPersonaJuridicaNotificacion = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Persona para notificación creada </li>' : $msjPersonaJuridicaNotificacion = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando Persona para notificación </li>';
@$idPersonaJuridicaDireccionNotificacion != 0 ? $msjPersonaJuridicaDireccionNotificacion = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Dirección de Persona para notificación creada </li>' : $msjPersonaJuridicaDireccionNotificacion = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando Dirección de Persona para notificación </li>';

@$idEscProtocolizacionDominioMunicipal != 0 ? $msjEscProtocolizacionDominioMunicipal = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Protocolización de escritura de dominio municipal creada </li>' : $msjEscProtocolizacionDominioMunicipal = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando Protocolización de escritura de dominio municipal </li>';
@$idEscInscripcionDominioMunicipal != 0 ? $msjEscInscripcionDominioMunicipal = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Inscripción de escritura de dominio municipal creada </li>' : $msjEscInscripcionDominioMunicipal = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando Inscripción de escritura de dominio municipal </li>';

@$idPersonaNaturalBeneficiaria != 0 ? $msjPersonaNaturalBeneficiaria = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Beneficiario natural creado </li>' : $msjPersonaNaturalBeneficiaria = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando Beneficiario natural </li>';
@$idPersonaJuridicaBeneficiaria != 0 ? $msjPersonaJuridicaBeneficiaria = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Beneficiario juridico creado </li>' : $msjPersonaJuridicaBeneficiaria = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando Beneficiario juridico </li>';
@$idMunMunicipal != 0 ? $msjMunMunicipal = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Dominio municipal creado </li>' : $msjMunMunicipal = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando dominio municipal </li>';

@$idProPropietarioNaturalPosesionario != 0 ? $msjProPropietarioNaturalPosesionario = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Posesionario creado </li>' : $msjProPropietarioNaturalPosesionario = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando posesionario </li>';
@$idProPropietarioConyugueNaturalPosesionario != 0 ? $msjProPropietarioConyugueNaturalPosesionario = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Cónyugue Posesionario creado </li>' : $msjProPropietarioConyugueNaturalPosesionario = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando Cónyugue Posesionario </li>';
@$idProPropietarioNaturalDireccionPosesionario != 0 ? $msjProPropietarioNaturalDireccionPosesionario = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Dirección Posesionario para notificación creada </li>' : $msjProPropietarioNaturalDireccionPosesionario = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando Dirección Posesionario para notificación </li>';
@$idPersonaNaturalNotificacionPosesionario != 0 ? $msjPersonaNaturalNotificacionPosesionario = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Persona para notificación creada </li>' : $msjPersonaNaturalNotificacionPosesionario = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando Persona para notificación </li>';
@$idPersonaNaturalDireccionNotificacionPosesionario != 0 ? $msjPersonaNaturalDireccionNotificacionPosesionario = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Dirección de Persona para notificación creada </li>' : $msjPersonaNaturalDireccionNotificacionPosesionario = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando Dirección de Persona para notificación </li>';
@$idProPropietarioPosesionario != 0 ? $msjProPropietarioPosesionario = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Posesionario creado </li>' : $msjProPropietarioPosesionario = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando Posesionario </li>';

@$idEstUnidad != 0 ? $msjEstUnidad = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Unidad creada </li>' : $msjEstUnidad = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando Unidad </li>';
@$idEdiEdificacion != 0 ? $msjEdiEdificacion = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Edificación creada </li>' : $msjEdiEdificacion = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando Edificación </li>';
@$idEdiEdificacionEstructura != 0 ? $msjEdiEdificacionEstructura = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Estructura de edificación creada </li>' : $msjEdiEdificacionEstructura = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando Estructura de edificación </li>';
@$idEdiEdificacionAcabados != 0 ? $msjEdiEdificacionAcabados = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Acabados de edificación creados </li>' : $msjEdiEdificacionAcabados = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando Acabados de edificación </li>';
@$idEdiEdificacionInstalaciones != 0 ? $msjEdiEdificacionInstalaciones = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Instalaciones de edificación creada </li>' : $msjEdiEdificacionInstalaciones = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando Instalaciones de edificación </li>';
@$idMejMejora != 0 ? $msjMejMejora = '<li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Mejoras creadas </li>' : $msjMejMejora = '<li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando Mejoras </li>';
?>

<html lang="es">
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/app/vista/templates/head.php'; ?>
    <body>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/app/vista/templates/menuInterno.php'; ?>

        <div class="container">
            <div style="max-width: 40%;margin: 0 auto">
                <h1 style="color:white;text-align: center">Ficha <?= $claveCatastral; ?></h1>
                <ul class="list-group">

<!--                    <li class="list-group-item list-group-item-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Unidad creada </li>
                    <li class="list-group-item list-group-item-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Error creando Unidad </li>-->

                    <?php
                    if (!empty($caracteristicasDelLote)) {
                        if (!empty($lotListaValoresId)) {
                            echo $msjLotCaracteristica;
                        }
                    }
                    if (!empty($servicioBasico)) {
                        if (!empty($genServicioBasicoDetId)) {
                            echo $msjLotLoteServicio;
                        }
                    }
                    echo $msjLotLoteVia;
                    if (!empty($caracteristicasPredio[1])) {
                        if ($caracteristicasPredio[1] == '1' || $caracteristicasPredio[1] == '3') {
                            echo $msjJefeHogar;
                        }
                    }
                    echo $msjLevLevantamiento;
                    echo $msjPrePredio;
                    echo $msjPreCaracteristica;
                    if ($propietarioTitulo == 'TRUE') {
                        if ($sinPerfeccionar == 'TRUE') {
                            echo $msjEscProtocolizacion;
                        } else {
                            echo $msjEscProtocolizacion;
                            echo $msjEscInscripcion;
                        }
                        if ($personeriaPropietario == 'natural') {
                            if (($propietarioNaturalEstadoCivil == 'casado') || ($propietarioNaturalEstadoCivil == 'union de hecho')) {
                                echo $msjProPropietarioNatural;
                                echo $msjProPropietarioConyugueNatural;
                                if ($notificacionCuandoEsPropietario == 'TRUE') {
                                    echo $msjPropietarioNaturalDireccion;
                                } else {
                                    echo $msjPersonaNaturalNotificacion;
                                    echo $msjPersonaNaturalDireccionNotificacion;
                                }
                            } else {
                                echo $msjProPropietarioNatural;
                                if ($notificacionCuandoEsPropietario == 'TRUE') {
                                    echo $msjPropietarioNaturalDireccion;
                                } else {
                                    echo $msjPersonaNaturalNotificacion;
                                    echo $msjPersonaNaturalDireccionNotificacion;
                                }
                            }
                            echo $msjProPropietario;
                            if (!empty($copropietario)) {
                                echo $msjCopropietario;
                            }
                        } elseif ($personeriaPropietario == 'juridica') {
                            if ($propietarioJuridicoDominio !== 'municipal') {
                                echo $msjProPropietarioJuridico;

                                if ($notificacionCuandoEsPropietario == 'TRUE') {
                                    echo $msjProPropietarioJuridicoDireccion;
                                } else {
                                    echo $msjPersonaJuridicaNotificacion;
                                    echo $msjPersonaJuridicaDireccionNotificacion;
                                }
                                echo $msjProPropietario;
                            } else {
                                echo $msjProPropietarioJuridico;

                                if ($notificacionCuandoEsPropietario == 'TRUE') {
                                    echo $msjProPropietarioJuridicoDireccion;
                                } else {
                                    echo $msjPersonaJuridicaNotificacion;
                                    echo $msjPersonaJuridicaDireccionNotificacion;
                                }
                                echo $msjProPropietario;

                                if ($propietarioJuridicoCondicionMunicipal == 1) {
                                    if ($propietarioJuridicoMunicipalSinPerfeccionar == 'TRUE') {
                                        echo $msjEscProtocolizacionDominioMunicipal;
                                    } else {
                                        echo $msjEscProtocolizacionDominioMunicipal;
                                        echo $msjEscInscripcionDominioMunicipal;
                                    }
                                } else {
                                    if ($propietarioJuridicoMunicipalSinPerfeccionar == 'TRUE') {
                                        echo $msjEscProtocolizacionDominioMunicipal;
                                    } else {
                                        echo $msjEscProtocolizacionDominioMunicipal;
                                        echo $msjEscInscripcionDominioMunicipal;
                                    }
                                    if ($municipalBeneficiarioPersoneria == 'natural') {
                                        echo $msjPersonaNaturalBeneficiaria;
                                    } else {
                                        echo $msjPersonaJuridicaBeneficiaria;
                                    }
                                    echo $msjMunMunicipal;
                                }
                            }
                        }
                    } else {
                        if (($propietarioNaturalEstadoCivil == 'casado') || ($propietarioNaturalEstadoCivil == 'union de hecho')) {
                            echo $msjProPropietarioNaturalPosesionario;
                            echo $msjProPropietarioConyugueNaturalPosesionario;
                            if ($notificacionCuandoEsPropietario == 'TRUE') {
                                echo $msjProPropietarioNaturalDireccionPosesionario;
                            } else {
                                echo $msjPersonaNaturalNotificacionPosesionario;
                                echo $msjPersonaNaturalDireccionNotificacionPosesionario;
                            }
                        } else {
                            echo $msjProPropietarioNaturalPosesionario;
                            if ($notificacionCuandoEsPropietario == 'TRUE') {
                                echo $msjProPropietarioNaturalDireccionPosesionario;
                            } else {
                                echo $msjPersonaNaturalNotificacionPosesionario;
                                echo $msjPersonaNaturalDireccionNotificacionPosesionario;
                            }
                        }
                        echo $msjProPropietarioPosesionario;
                    }

                    if ($numeroBloques != 0) {
                        echo $msjEstUnidad;
                        echo $msjEdiEdificacion;
                        echo $msjEdiEdificacionEstructura;
                        echo $msjEdiEdificacionAcabados;
                        if (array_key_exists('instalacionesElectricas', $edificacion)) {
                            echo $msjEdiEdificacionInstalaciones;
                        }
                        if (!empty($mejora)) {
                            echo $msjMejMejora;
                        }
                    }
                    ?>
                </ul>
                <a href="/index.php?q=unipropiedad#" class="btn btn-success btn-lg" role="button" style="width: 100%;">Regresar</a>
            </div>
        </div>

        <script src="<?= BASE_URL ?>public/app/ajax/unipropiedad.js"></script>

        <?php require $_SERVER['DOCUMENT_ROOT'] . '/app/vista/templates/scripts.php'; ?>
    </body>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/app/vista/templates/footer.php'; ?>
</html>

