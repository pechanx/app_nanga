<?php

require $_SERVER['DOCUMENT_ROOT'] . '/app/config/ConexionDB.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/prePredio.php';

extract($_POST);

$prePredio = new prePredio();
$prePredio->set('claveCatastral', $claveCatastral);
echo $prePredio->obtenerNumeroPredio();


