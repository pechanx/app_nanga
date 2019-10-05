<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


require $_SERVER['DOCUMENT_ROOT'] . '/app/config/Util.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/config/Constantes.php';
//require $_SERVER['DOCUMENT_ROOT'] . '/app/controlador/listasFrontend.php';
//require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/prePredio.php';

$util = new Util();

!empty($_GET['q']) ? $vista = $_GET['q'] : $vista = null;
$util->__set('vista', $vista);
//session_start();
//$session = $util->validarIngreso();
//if ($session === TRUE) {
?>
<html lang="es">
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/app/vista/templates/head.php'; ?>
    <body>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/app/vista/templates/menuInterno.php'; ?>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/app/vista/templates/header.php'; ?>
        <div class="container">
            <?php $util->renderVistas(); ?>    
        </div>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/app/vista/templates/scripts.php'; ?>
        <?php
        if ($vista == 'unipropiedad') {
            echo '<script src="' . BASE_URL . 'public/app/ajax/unipropiedad.js"></script>';
        } elseif ($vista == 'vias') {
            echo '<script src="' . BASE_URL . 'public/app/ajax/vias.js"></script>';
        }
        ?>
    </body>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/app/vista/templates/footer.php'; ?>
</html>

<?php
//} else {
//    echo '<script>alert(\'Por favor ingrese al sistema\')</script>';
//    echo '<script>location.href="' . BASE_URL . 'index.php"</script>';
//}
?>
