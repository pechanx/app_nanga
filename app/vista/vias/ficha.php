<?php
require 'app/controlador/listasFrontend.php';

$listas = new listasFrontend();
$viasPec = $listas->estPecVias();
$tipoVia = $listas->viaTipoCaracteristica(1);
$orientacionVia = $listas->viaTipoCaracteristica(6);
$materialVia = $listas->viaTipoCaracteristica(2);
$aceras = $listas->viaTipoCaracteristica(4);
$tipoMaterialAcera = $listas->viaTipoCaracteristica(10);
$estadoConservacionAcera = $listas->viaTipoCaracteristica(11);
$bordillos = $listas->viaTipoCaracteristica(3);
$nombresViasIngresadas = $listas->listarNombreViasIngresadas();
?>
<form action = "app/controlador/vias/guardar.php" method = "post" id="formVias" role = "form" data-toggle = "validator">
    <div id = "contFichaVias" style = "display: block">
        <?php
        require 'secciones/identificacionVia.php';
        require 'secciones/caracteristicasVia.php';
        require 'secciones/serviciosBasicosVia.php';
        ?>
        <button type="submit" class="btn btn-success" style="width: 100%;" id="btnGuardarFichaVias" onclick="ctrlCheckSubmit('btnGuardarFichaVias', 'formVias')">Guardar</button>
    </div>
</form>

