<?php

require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/usuariosLogin.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/config/Util.php';

$login = new usuariosLogin();
$login->set('usuario', '');
$login->set('contrasena', '');
echo $login->login();


echo '<br>';
echo password_hash('digitador', PASSWORD_DEFAULT);
        
