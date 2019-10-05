<?php

require $_SERVER['DOCUMENT_ROOT'] . '/app/config/ConexionDB.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/estPoligono.php';

extract($_POST);
$estPoligono = new estPoligono();
$estPoligono->set('codigo_acumulado', $claveCatastral);
echo $estPoligono->validarClaveCatastral();




