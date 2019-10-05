<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'app/controlador/listasFrontend.php';
$listas = new listasFrontend();
$datosParroquias = $listas->listarParroquias();
$datosParroquiasOrdenadas = $listas->listarParroquiasOrdenadas();
$datosCantones = $listas->listarCantones();
$urbZonaSector = $listas->listarUrbZonaSector();
$usoDelPredio = $listas->usoDelPredio();
$genUnidadMedida = $listas->genUnidadMedida();
$lotLoteOcupacion = $listas->lotLoteOcupacion();
$nivelDelTerreno = $listas->lotListaValores(1);
$formaDelTerreno = $listas->lotListaValores(2);
$tipoDelTerreno = $listas->lotListaValores(3);
$localizacionDeLaManzana = $listas->lotListaValores(4);
$topografia = $listas->lotListaValores(5);
$permisoDeConstruccion = $listas->lotListaValores(6);
$adosamientoConRetiros = $listas->lotListaValores(7);
$condicionOcupacion = $listas->preListaValores(1);
$servicioAgua = $listas->genServicioBasicoDet(1);
$servicioExcretas = $listas->genServicioBasicoDet(2);
$servicioElectrico = $listas->genServicioBasicoDet(3);
$servicioComunicaciones = $listas->genServicioBasicoDet(4);
$formaAdquisicion = $listas->proFormaAdquisicion();
$munTipoCondicion = $listas->munTipoCondicion();
$proTipoPoseedor = $listas->proTipoPoseedor();
$proPuebloEtnia = $listas->proPuebloEtnia();
$perTipoDireccion = $listas->perTipoDireccion();
$levTipoInformante = $listas->levTipoInformante();
$perPersonaFiscalizador = $listas->perPersonaResponsables('FISCALIZADOR');
$perPersonaSupervisor = $listas->perPersonaResponsables('SUPERVISOR');
$perPersonaRelevador = $listas->perPersonaResponsables('RELEVADOR');
?>


<form action="app/controlador/unipropiedad/guardar.php" method="post" id="formUnipropiedad"  enctype="multipart/form-data" role="form" data-toggle="validator">
    <div id="contClaveCatastral" class="centrado">
        <?php require 'secciones/claveCatastral.php'; ?>
    </div>

    <div id="contFicha" style="display: none">
        <?php
        require 'secciones/identificacion.php';
        require 'secciones/caracteristicasDelTerreno.php';
        require 'secciones/caracteristicasDelPredio.php';
        require 'secciones/descripcionDelPredio.php';
        require 'secciones/serviciosBasicosDelLote.php';
        require 'secciones/viasDelLote.php';
        require 'secciones/propietario.php';
        require 'secciones/notificacion.php';
        require 'secciones/edificaciones.php';
        require 'secciones/informante.php';
        require 'secciones/responsables.php';
        ?>

        <button type="submit" class="btn btn-success" style="width: 100%" id="btn_guardar_ficha">Guardar Ficha</button>
    </div>

</form>


