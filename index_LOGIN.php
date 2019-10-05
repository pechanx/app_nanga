<?php
require $_SERVER['DOCUMENT_ROOT'] . '/app/config/Util.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/config/Constantes.php';
//$util = new Util();
!empty($_GET['q']) ? $vista = $_GET['q'] : $vista = null;
//$util->__set('vista', $vista);

?>
<html lang="es">
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/app/vista/templates/head.php'; ?>
    <body>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/app/vista/templates/barraLogin.php'; ?>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/app/vista/templates/header.php'; ?>
        <div class="container">
            <?php // $util->renderVistas(); ?>    
        </div>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/app/vista/templates/scripts.php'; ?>
        <?php
        //if ($vista == 'unipropiedad') {
        echo '<script src="' . BASE_URL . 'public/app/ajax/login.js"></script>';
//        echo '<script src="' . BASE_URL . 'public/app/ajax/unipropiedad.js"></script>';
        //}
        ?>
    </body>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/app/vista/templates/footer.php'; ?>
</html>
