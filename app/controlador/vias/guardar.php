<?php

require $_SERVER['DOCUMENT_ROOT'] . '/app/config/ConexionDB.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/config/Constantes.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/config/Util.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/estPec.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/viaVia.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/viaViaTotal.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/viaCaracteristica.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/viaViaServicio.php';

extract($_POST);

$viaVia = new viaVia();
$viaViaTotal = new viaViaTotal();
$estPect = new estPec();
$viaCaracteristica = new viaCaracteristica();
$viaViaServicio = new viaViaServicio();
$idEstPec = $codigoAcumuladoVia; //Obtengo el ID del pec

/*
 * Valido si la vía ya a sido creada, sino se crea
 */
$viaViaTotal->set('nombre', $nombreDeLaVia);
$idViaTotalExiste = $viaViaTotal->validarViaIngresada();

if ($idViaTotalExiste !== 0) {
    $idViaTotal = $idViaTotalExiste;
} else {
    $viaViaTotal->set('nombre', $nombreDeLaVia);
    $viaViaTotal->set('es_activo', ES_ACTIVO);
    $idViaTotal = $viaViaTotal->guardar();
}

/*
 * Creo la relación entre la parte gráfica y alfanumérica en la tabla via_via
 */
if ($idViaTotal != 0) {
    $viaVia->set('via_via_total_id', $idViaTotal);
    $viaVia->set('es_activo', ES_ACTIVO);
    $viaVia->set('est_pec_id', $idEstPec);
    $idViaVia = $viaVia->guardar();
}

/*
 * Se guarda las caracteristicas de la vía
 */

foreach ($caracteristicasVia as $tipoDato => $valor) {
    foreach ($valor as $idViaTipoCaracteristica => $caracteristica) {
        // Valido el tipo de dato y guardo
        if ($tipoDato == 'lista') {
            if (!empty($caracteristica)) {
                $viaCaracteristica->set('via_lista_valores_id', $caracteristica);
                $viaCaracteristica->set('valor_entero', null);
                $viaCaracteristica->set('valor_alfanumerico', null);
                $viaCaracteristica->set('valor_fecha', null);
                $viaCaracteristica->set('valor_decimal', null);
                $viaCaracteristica->set('via_via_id', $idViaVia);
                $viaCaracteristica->set('via_tipo_caracteristica_id', $idViaTipoCaracteristica);
                $viaCaracteristica->set('valor_booleano', null);
                $idViaCaracteristica = $viaCaracteristica->guardar();
            }
        } elseif ($tipoDato == 'decimal') {
            if (!empty($caracteristica)) {
                $viaCaracteristica->set('via_lista_valores_id', null);
                $viaCaracteristica->set('valor_entero', null);
                $viaCaracteristica->set('valor_alfanumerico', null);
                $viaCaracteristica->set('valor_fecha', null);
                $viaCaracteristica->set('valor_decimal', $caracteristica);
                $viaCaracteristica->set('via_via_id', $idViaVia);
                $viaCaracteristica->set('via_tipo_caracteristica_id', $idViaTipoCaracteristica);
                $viaCaracteristica->set('valor_booleano', null);
                $idViaCaracteristica = $viaCaracteristica->guardar();
            }
        }
    }
}

/*
 * Se guardan los servicios básicos de la vía
 */
if (count($serviciosBasicosVia) != 0) {
    foreach ($serviciosBasicosVia as $idServicioBasico => $valor) {
        if (!empty($valor)) {
            $viaViaServicio->set('gen_servicio_basico_id', $idServicioBasico);
            $viaViaServicio->set('via_via_id', $idViaVia);
            $viaViaServicio->set('es_activo', 'TRUE');
            $idViaServicio = $viaViaServicio->guardar();
        }
    }
}

/*
 * Se realizan las validaciones
 */

//Si la vía tiene todos los datos completos
if (($idViaTotal != 0) && ($idViaVia != 0) && ($idViaCaracteristica != 0) && ($idViaServicio != 0)) {
    echo '<script>alert("Vía guardada correctamente")</script>';
    echo '<script>location.href="/inicio.php?q=vias"</script>';
} else if (($idViaTotal != 0) && ($idViaVia != 0) && ($idViaCaracteristica != 0)) { // Si la vía no tiene servicios básicos
    echo '<script>alert("Vía guardanda correctamente")</script>';
    echo '<script>location.href="/inicio.php?q=vias"</script>';
} else {
    echo '<script>alert("Error")</script>';
    echo '<script>location.href="/inicio.php?q=vias"</script>';
}




