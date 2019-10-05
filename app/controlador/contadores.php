<?php
require $_SERVER['DOCUMENT_ROOT'] . '/app/config/ConexionDB.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/usuariosLogin.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/prePredio.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/lotLote.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/viaVia.php';

$usuarios = new usuariosLogin();
$numeroUsuarios = $usuarios->retornarNumeroUsuarios();

$prePredio = new prePredio();
$numeroUnipropiedades = $prePredio->obtenerNumeroUnipropiedadesIngresados();
$listaPrediosAlmacenados = $prePredio->listarPrediosInicio();

$lotLote = new lotLote();
$numeroLotesConflicto = $lotLote->obtenerNumeroLotesClonflicto();

$viaVia = new viaVia();
$numeroVias = $viaVia->obtenerNumeroViasIngresadas();

