<?php
require $_SERVER['DOCUMENT_ROOT'] . '/app/config/ConexionDB.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/config/Constantes.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/genEstadoConservacion.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/genEtapaConstruccion.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/genTipoMejora.php';

extract($_POST);

$genEstadoConservacion = new genEstadoConservacion();
$genEtapaConstruccion = new genEtapaConstruccion();
$genTipoMejora = new genTipoMejora();

$estadoConservacion = $genEstadoConservacion->listar();
$etapaConstruccion = $genEtapaConstruccion->listar();
$tipoMejora = $genTipoMejora->listar();
?>
<div class="col-md-12">
    <div class="panel <?= CLASE_SUB_PANELES ?> ">
        <div class="panel-heading">
            <h3 class="panel-title">Mejoras</h3>
        </div>
        <div class="panel-body">
            <?php
            for ($i = 1; $i <= $numeroMejoras; $i++) {
                ?>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="edificacionesMejoraTipoMejoraBloque_<?= $i ?>" class="label label-success">Mejora</label>
                        <select class="form-control" id="edificacionesMejoraTipoMejoraBloque_<?= $i ?>" name="mejora[<?= $i ?>][tipoMejora]" >
                            <option></option>
                            <?php foreach ($tipoMejora as $_tipoMejora) { ?>
                                <option value="<?= $_tipoMejora['id']; ?>" ><?= $_tipoMejora['nombre'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="edificacionesMejoraDimensionBloque_<?= $i ?>" class="label label-success">Dimensión</label>
                        <input type="number" step="0.01" class="form-control" min="0" id="edificacionesMejoraDimensionBloque_<?= $i ?>" name="mejora[<?= $i ?>][dimension]" >
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="edificacionesMejoraEstadoConservacionBloque_<?= $i ?>" class="label label-success">Estado de la conservación</label>
                        <select class="form-control " id="edificacionesMejoraEstadoConservacionBloque_<?= $i ?>" name="mejora[<?= $i ?>][estadoConservacion]" >
                            <option></option>
                            <?php foreach ($estadoConservacion as $_estadoConservacion) { ?>
                                <option value="<?= $_estadoConservacion['id']; ?>" ><?= $_estadoConservacion['nombre'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="edificacionesMejoraEtapaConstruccionBloque_<?= $i ?>" class="label label-success">Etapa de construcción</label>
                        <select class="form-control " id="edificacionesMejoraEtapaConstruccionBloque_<?= $i ?>" name="mejora[<?= $i ?>][etapaConstruccion]" >
                            <option></option>
                            <?php foreach ($etapaConstruccion as $_etapaConstruccion) { ?>
                                <option value="<?= $_etapaConstruccion['id']; ?>" ><?= $_etapaConstruccion['nombre'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="edificacionesMejoraAnioInstalacionBloque_<?= $i ?>" class="label label-success">Anio de instalación</label>
                        <input type="number" step="1" class="form-control" min="1501" max="2020" id="edificacionesMejoraAnioInstalacionBloque_<?= $i ?>" name="mejora[<?= $i ?>][anioInstalacion]" >
                    </div>
                </div>

                
                <?php
            }
            ?>
        </div>
    </div>
</div>


