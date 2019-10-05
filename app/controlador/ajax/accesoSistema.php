<?php

require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/usuariosLogin.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/config/Util.php';

extract($_POST);
$login = new usuariosLogin();
$login->set('usuario', $txtUsuario);
$login->set('contrasena', $txtContrasena);
echo $login->login();

