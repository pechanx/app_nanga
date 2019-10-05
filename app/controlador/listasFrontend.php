<?php

require $_SERVER['DOCUMENT_ROOT'] . '/app/config/ConexionDB.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/estParroquia.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/estCanton.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/lotBarrio.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/preUsoPredio.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/genUnidadMedida.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/lotListaValores.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/lotLoteOcupacion.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/preListaValores.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/genServicioBasicoDet.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/proFormaAdquisicion.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/munTipoCondicion.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/proTipoPoseedor.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/proPuebloEtnia.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/perTipoDireccion.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/perPersona.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/levTipoInformante.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/estPec.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/viaTipoCaracteristica.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/viaViaTotal.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/prePredio.php';

//require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/preListaValores.php';
//require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/preListaValores.php';
//require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/preListaValores.php';
//require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/preListaValores.php';
//require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/preListaValores.php';

class listasFrontend {

    public function listarParroquias() {
        $estParroquia = new estParroquia();
        $estParroquia->set('est_canton_id', '196');
        return $estParroquia->listarPorCanton();
    }
    
    public function listarParroquiasOrdenadas(){
        $estParroquia = new estParroquia();
        return $estParroquia->listarOrdenadoNombre();
    }
    
    public function listarTodasParroquias() {
        $estParroquia = new estParroquia();
        return $estParroquia->listar();
    }
    
    public function listarCantones(){
        $estCanton = new estCanton();
        return $estCanton->listar();
    }

    public function listarUrbZonaSector() {
        $lotBarrio = new lotBarrio();
        return $lotBarrio->listar();
    }

    public function usoDelPredio() {
        $preUsoPredio = new preUsoPredio();
        return $preUsoPredio->listar();
    }

    public function genUnidadMedida() {
        $genUnidadMedida = new genUnidadMedida();
        return $genUnidadMedida->listar();
    }

    public function lotListaValores($caracteristica) {
        $lotListaValores = new lotListaValores();
        $lotListaValores->set('lot_tipo_caracteristica_id', $caracteristica);
        return $lotListaValores->listarPorTipoCaracteristica();
    }

    public function lotLoteOcupacion() {
        $lotLoteOcupacion = new lotLoteOcupacion();
        return $lotLoteOcupacion->listar();
    }

    public function preListaValores($caracteristica) {
        $preListaValores = new preListaValores();
        $preListaValores->set('pre_tipo_caracteristica_id', $caracteristica);
        return $preListaValores->listarPorTipoCaracteristica();
    }

    public function genServicioBasicoDet($servicioBasico) {
        $genServicioBasicoDet = new genServicioBasicoDet();
        $genServicioBasicoDet->set('gen_servicio_basico_id', $servicioBasico);
        return $genServicioBasicoDet->listarPorServicioBasico();
    }

    public function proFormaAdquisicion(){
        $proFormAdquisicion = new proFormaAdquisicion();
        return $proFormAdquisicion->listar();
    }
    
    public function munTipoCondicion() {
        $munTipoCondicion = new munTipoCondicion();
        return $munTipoCondicion->listar();
    }
    
    public function proTipoPoseedor() {
        $proTipoPoseedor = new proTipoPoseedor();
        return $proTipoPoseedor->listar();
    }
    
    public function proPuebloEtnia() {
        $proPuebloEtnia = new proPuebloEtnia();
        return $proPuebloEtnia->listar();
    }
    
    public function perTipoDireccion(){
        $perTipoDireccion = new perTipoDireccion();
        return $perTipoDireccion->listar();
    }
    
    public function perPersonaResponsables($tipoPersona){
        $perPersona = new perPersona();
        $perPersona->set('descripcion', $tipoPersona);
        return $perPersona->listarResponsablesRelevadores();
    }
    
    public function levTipoInformante(){
        $levTipoInformante = new levTipoInformante();
        return $levTipoInformante->listar();
    }
    
    public function estPecVias(){
        $estPec = new estPec();
        $estPec->set('tipo_ficha', 'via_via');
        return $estPec->listarPorTipoFicha();
    }
    
    public function viaTipoCaracteristica($idCaracteristica){
        $viaTipoCaracteristica = new viaTipoCaracteristica();
        $viaTipoCaracteristica->set('via_tipo_caracteristica_id', $idCaracteristica);
        return $viaTipoCaracteristica->listar();
    }
    
    public function listarNombreViasIngresadas(){
        $viaViaTotal = new viaViaTotal();
        return $viaViaTotal->listarNombresVias();
    }
}
