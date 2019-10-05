<?php

require $_SERVER['DOCUMENT_ROOT'] . '/app/config/ConexionDB.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/estBloque.php';

extract($_POST);
$estBloque = new estBloque();
$estBloque->set('claveCatastral', $claveCatastral);
echo $estBloque->obtenerNumeroBloques();


