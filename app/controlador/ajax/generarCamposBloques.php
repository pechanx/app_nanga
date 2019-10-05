<?php
require $_SERVER['DOCUMENT_ROOT'] . '/app/config/ConexionDB.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/config/Constantes.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/genEstadoConservacion.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/genEtapaConstruccion.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/genTipoAcabado.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/genClaseEstructuraMaterial.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/genClaseAcabadoMaterial.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/genUsoConstruccion.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/estBloque.php';

extract($_POST);
//$numeroBloques = 2;
//$claveCatastral = '1109010101001001';


$genEstadoConservacion = new genEstadoConservacion();
$genEtapaConstruccion = new genEtapaConstruccion();
$genTipoAcabado = new genTipoAcabado();
$genClaseEstructuraMaterial = new genClaseEstructuraMaterial();
$genClaseAcabadoMaterial = new genClaseAcabadoMaterial();
$genUsoConstruccion = new genUsoConstruccion();
$estBloque = new estBloque();


$estadoConservacion = $genEstadoConservacion->listar();
$etapaConstruccion = $genEtapaConstruccion->listar();
$tipoAcabado = $genTipoAcabado->listar();
$usoConstruccion = $genUsoConstruccion->listar();

$genClaseEstructuraMaterial->set('gen_clase_estructura_id', 1);
$estructuraColumnas = $genClaseEstructuraMaterial->listar();
$genClaseEstructuraMaterial->set('gen_clase_estructura_id', 2);
$estructuraParedes = $genClaseEstructuraMaterial->listar();
$genClaseEstructuraMaterial->set('gen_clase_estructura_id', 3);
$estructuraEntrepiso = $genClaseEstructuraMaterial->listar();
$genClaseEstructuraMaterial->set('gen_clase_estructura_id', 4);
$estructuraCubierta = $genClaseEstructuraMaterial->listar();
$genClaseEstructuraMaterial->set('gen_clase_estructura_id', 5);
$estructuraVigas = $genClaseEstructuraMaterial->listar();

$genClaseAcabadoMaterial->set('gen_clase_acabado_id', 1);
$acabadosPisos = $genClaseAcabadoMaterial->listar();
$genClaseAcabadoMaterial->set('gen_clase_acabado_id', 2);
$acabadosPuertas = $genClaseAcabadoMaterial->listar();
$genClaseAcabadoMaterial->set('gen_clase_acabado_id', 3);
$acabadosVentanas = $genClaseAcabadoMaterial->listar();
$genClaseAcabadoMaterial->set('gen_clase_acabado_id', 4);
$acabadosRevestimientos = $genClaseAcabadoMaterial->listar();
$genClaseAcabadoMaterial->set('gen_clase_acabado_id', 5);
$acabadosTumbados = $genClaseAcabadoMaterial->listar();

if ($numeroBloques <= 5) {
    for ($i = 1; $i <= $numeroBloques; $i++) {
        $codigoBloque = '00' . $i;
        $codigoAcumuladoBloque = $claveCatastral . $codigoBloque;
        ?>

        <div class="col-md-12">
            <div class="panel <?= CLASE_SUB_PANELES ?> ">
                <div class="panel-heading">
                    <h3 class="panel-title">Bloque Nro. <?= $codigoBloque ?> código:  <?= $codigoAcumuladoBloque ?></h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                        
                        <input type="hidden" name="edificacion[<?= $i ?>][codAcumuladoBloque]" value="<?= $codigoAcumuladoBloque ?>">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edificacionesAreaBloque_<?= $i ?>" class="label label-success">Área</label>
                                <input type="number" step="0.01" min="1" class="form-control" id="edificacionesAreaBloque_<?= $i ?>" name="edificacion[<?= $i ?>][areaBloque]" >
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="edificacionesNroPisosBloque_<?= $i ?>" class="label label-success">Nro. pisos</label>
                                <input type="number" step="1" min="0" class="form-control" id="edificacionesNroPisosBloque_<?= $i ?>" name="edificacion[<?= $i ?>][nroPisosBloque]" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="edificacionesUsoContruccionBloque_<?= $i ?>" class="label label-success">Uso de la construcción</label>
                                <select class="form-control" id="edificacionesUsoContruccionBloque_<?= $i ?>" name="edificacion[<?= $i ?>][usoContruccionBloque]" title="Seleccionar">
                                    <option></option>
                                    <?php foreach ($usoConstruccion as $_usoConstruccion) { ?>
                                        <option value="<?= $_usoConstruccion['id']; ?>" ><?= $_usoConstruccion['nombre'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" id="caracteristicasEdificacion">

                        <div class="panel <?= CLASE_SUB_PANELES ?> ">
                            <div class="panel-heading">
                                <h3 class="panel-title">Caracteristicas de la edificación</h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="edificacionesEstadoDeLaConservacionBloque_<?= $i ?>" class="label label-success">Estado de la conservación</label>
                                        <select class="form-control" id="edificacionesEstadoDeLaConservacionBloque_<?= $i ?>" name="edificacion[<?= $i ?>][estadoDeLaConservacionBloque]"  title="Seleccionar">
                                            <option ></option>
                                            <?php foreach ($estadoConservacion as $_estadoConservacion) { ?>
                                                <option value="<?= $_estadoConservacion['id'] ?>" ><?= $_estadoConservacion['id'] . ' - ' . $_estadoConservacion['nombre'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="edificacionesAnioConstruccionBloque_<?= $i ?>" class="label label-success">Anio de construcción</label>
                                        <input type="number" step="1" min="1501" max="2020" class="form-control" id="edificacionesAnioConstruccionBloque_<?= $i ?>" name="edificacion[<?= $i ?>][anioConstruccionBloque]" >
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="edificacionesEtapaConstruccionBloque_<?= $i ?>" class="label label-success">Etapa de construcción</label>
                                        <select class="form-control" id="edificacionesEtapaConstruccionBloque_<?= $i ?>" name="edificacion[<?= $i ?>][etapaConstruccionBloque]"  title="Seleccionar">
                                            <option ></option>
                                            <?php foreach ($etapaConstruccion as $_etapaConstruccion) { ?>
                                                <option value="<?= $_etapaConstruccion['id'] ?>" ><?= $_etapaConstruccion['id'] . ' - ' . $_etapaConstruccion['nombre'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="edificacionesAnioRemodelacionBloque_<?= $i ?>" class="label label-success">Anio de remodelación</label>
                                        <input type="number" step="1" min="1501" max="2020" class="form-control" id="edificacionesAnioRemodelacionBloque_<?= $i ?>" name="edificacion[<?= $i ?>][anioRemodelacionBloque]" >
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="edificacionesTipoAcabadoBloque_<?= $i ?>" class="label label-success">Tipo de acabado</label>
                                        <select class="form-control" id="edificacionesTipoAcabadoBloque_<?= $i ?>" name="edificacion[<?= $i ?>][tipoAcabadoBloque]"  title="Seleccionar">
                                            <option ></option>
                                            <?php foreach ($tipoAcabado as $_tipoAcabado) { ?>
                                                <option value="<?= $_tipoAcabado['id'] ?>" ><?= $_tipoAcabado['id'] . ' - ' . $_tipoAcabado['nombre'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4" id="contEdificacionEstructura">
                        <div class="panel <?= CLASE_SUB_PANELES ?> ">
                            <div class="panel-heading">
                                <h3 class="panel-title">Estructura</h3>
                            </div>
                            <div class="panel-body">
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="edificacionesEstructuraColumnasBloque_<?= $i ?>" class="label label-success">Columnas</label>
                                        <select class="form-control" id="edificacionesEstructuraColumnasBloque_<?= $i ?>" name="edificacion[<?= $i ?>][estructuraBloque][1]"  title="Seleccionar">
                                            <option ></option>
                                            <?php foreach ($estructuraColumnas as $_estructuraColumnas) { ?>
                                                <option value="<?= $_estructuraColumnas['id']; ?>" ><?= $_estructuraColumnas['id'] . ' - ' . $_estructuraColumnas['nombre'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="edificacionesEstructuraParedesBloque_<?= $i ?>" class="label label-success">Paredes</label>
                                        <select class="form-control" id="edificacionesEstructuraParedesBloque_<?= $i ?>" name="edificacion[<?= $i ?>][estructuraBloque][2]"  title="Seleccionar">
                                            <option ></option>
                                            <?php foreach ($estructuraParedes as $_estructuraParedes) { ?>
                                                <option value="<?= $_estructuraParedes['id'] ?>" ><?= $_estructuraParedes['id'] . ' - ' . $_estructuraParedes['nombre'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="edificacionesEstructuraEntrepisoBloque_<?= $i ?>" class="label label-success">Entrepiso</label>
                                        <select class="form-control" id="edificacionesEstructuraEntrepisoBloque_<?= $i ?>" name="edificacion[<?= $i ?>][estructuraBloque][3]"  title="Seleccionar">
                                            <option ></option>
                                            <?php foreach ($estructuraEntrepiso as $_estructuraEntrepiso) { ?>
                                                <option value="<?= $_estructuraEntrepiso['id']; ?>" ><?= $_estructuraEntrepiso['id'] . ' - ' . $_estructuraEntrepiso['nombre'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="edificacionesEstructuraCubiertaBloque_<?= $i ?>" class="label label-success">Cubierta</label>
                                        <select class="form-control" id="edificacionesEstructuraCubiertaBloque_<?= $i ?>" name="edificacion[<?= $i ?>][estructuraBloque][4]"  title="Seleccionar">
                                            <option ></option>
                                            <?php foreach ($estructuraCubierta as $_estructuraCubierta) { ?>
                                                <option value="<?= $_estructuraCubierta['id']; ?>" ><?= $_estructuraCubierta['id'] . ' - ' . $_estructuraCubierta['nombre'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="edificacionesEstructuraVigasBloque_<?= $i ?>" class="label label-success">Vigas</label>
                                        <select class="form-control" id="edificacionesEstructuraVigasBloque_<?= $i ?>" name="edificacion[<?= $i ?>][estructuraBloque][5]"  title="Seleccionar">
                                            <option ></option>
                                            <?php foreach ($estructuraVigas as $_estructuraVigas) { ?>
                                                <option value="<?= $_estructuraVigas['id']; ?>" ><?= $_estructuraVigas['id'] . ' - ' . $_estructuraVigas['nombre'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="panel <?= CLASE_SUB_PANELES ?> ">
                            <div class="panel-heading">
                                <h3 class="panel-title">Acabados</h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="edificacionesAcabadosPisosBloque_<?= $i ?>" class="label label-success">Pisos</label>
                                        <select class="form-control" id="edificacionesAcabadosPisosBloque_<?= $i ?>" name="edificacion[<?= $i ?>][acabadosBloque][1]"  title="Seleccionar">
                                            <option ></option>
                                            <?php foreach ($acabadosPisos as $_acabadosPisos) { ?>
                                                <option value="<?= $_acabadosPisos['id'] ?>" ><?= $_acabadosPisos['id'] . ' - ' . $_acabadosPisos['nombre'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="edificacionesAcabadosPuertasBloque_<?= $i ?>" class="label label-success">Puertas</label>
                                        <select class="form-control" id="edificacionesAcabadosPuertasBloque_<?= $i ?>" name="edificacion[<?= $i ?>][acabadosBloque][2]"  title="Seleccionar">
                                            <option ></option>
                                            <?php foreach ($acabadosPuertas as $_acabadosPuertas) { ?>
                                                <option value="<?= $_acabadosPuertas['id'] ?>" ><?= $_acabadosPuertas['id'] . ' - ' . $_acabadosPuertas['nombre'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="edificacionesAcabadosVentanasBloque_<?= $i ?>" class="label label-success">Ventanas</label>
                                        <select class="form-control" id="edificacionesAcabadosVentanasBloque_<?= $i ?>" name="edificacion[<?= $i ?>][acabadosBloque][3]"  title="Seleccionar">
                                            <option ></option>
                                            <?php foreach ($acabadosVentanas as $_acabadosVentanas) { ?>
                                                <option value="<?= $_acabadosVentanas['id'] ?>" ><?= $_acabadosVentanas['id'] . ' - ' . $_acabadosVentanas['nombre'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="edificacionesAcabadosRevestimientosBloque_<?= $i ?>" class="label label-success">Revestimientos</label>
                                        <select class="form-control" id="edificacionesAcabadosRevestimientosBloque_<?= $i ?>" name="edificacion[<?= $i ?>][acabadosBloque][4]"  title="Seleccionar">
                                            <option ></option>
                                            <?php foreach ($acabadosRevestimientos as $_acabadosRevestimientos) { ?>
                                                <option value="<?= $_acabadosRevestimientos['id'] ?>" ><?= $_acabadosRevestimientos['id'] . ' - ' . $_acabadosRevestimientos['nombre'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="edificacionesAcabadosTumbadosBloque_<?= $i ?>" class="label label-success">Tumbados</label>
                                        <select class="form-control" id="edificacionesAcabadosTumbadosBloque_<?= $i ?>" name="edificacion[<?= $i ?>][acabadosBloque][5]"  title="Seleccionar" >
                                            <option ></option>
                                            <?php foreach ($acabadosTumbados as $_acabadosTumbados) { ?>
                                                <option value="<?= $_acabadosTumbados['id'] ?>" ><?= $_acabadosTumbados['id'] . ' - ' . $_acabadosTumbados['nombre'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="panel <?= CLASE_SUB_PANELES ?> ">
                            <div class="panel-heading">
                                <h3 class="panel-title">Instalaciones</h3>
                            </div>
                            <div class="panel-body">

                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="edificacion[<?= $i ?>][instalacionesElectricas][1]" id="edificacionesInstalacionesElectricasSobrepuestasBloque_<?= $i ?>" value="instSobrepuestas"> Instalaciones Eléctricas Sobrepuestas
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="edificacion[<?= $i ?>][instalacionesElectricas][2]" id="edificacionesInstalacionesElectricasEmpotradasBloque_<?= $i ?>" value="instEmpotradas"> Instalaciones Eléctricas Empotradas
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="edificacionesInstalacionesSanitariasBanioCompletoBloque_<?= $i ?>" class="label label-success">Instalaciones Sanitarias Banio Completo</label>
                                        <input type="number" step="1" class="form-control" min="0" id="edificacionesInstalacionesSanitariasBanioCompletoBloque_<?= $i ?>" name="edificacion[<?= $i ?>][instalacionesSanitariasBanioCompleto][3]" >
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="edificacionesInstalacionesSanitariasMedioBanioBloque_<?= $i ?>" class="label label-success">Instalaciones Sanitarias Medio Banio</label>
                                        <input type="number" step="1" class="form-control" min="0" id="edificacionesInstalacionesSanitariasMedioBanioBloque_<?= $i ?>" name="edificacion[<?= $i ?>][instalacionesSanitariasMedioBanio][4]" >
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php
    }
}
?>





