<?php

require $_SERVER['DOCUMENT_ROOT'] . '/app/config/ConexionDB.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/config/Constantes.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/viaVia.php';

extract($_POST);

$codigoVia = 0;
$viaVia = new viaVia();
$viaVia->set('codigo', $codigoVia);
$datosVia = $viaVia->obtenerDatosViasPorNombreVia();
$codigoViaDB = $datosVia[0]['codigo'];
$nombreVia = $datosVia[0]['nombre'];

echo $codigoViaDB . ' - ' . $nombreVia;
