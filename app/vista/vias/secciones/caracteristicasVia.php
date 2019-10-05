<div class="panel <?= CLASE_PANELES ?>">  
    <div class="panel-heading">Caracteristicas de la vía</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="tipo_via" class="label label-success">Tipo de vía</label>
                    <select class="form-control" id="tipo_via" name="caracteristicasVia[lista][1]" required data-error="<?= MSJ_VALIDATOR_SELECT ?>">
                        <option></option>
                        <?php foreach ($tipoVia as $_tipoVia) { ?>
                            <option value="<?= $_tipoVia['id']; ?>"><?= $_tipoVia['nombre'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="orientacion_via" class="label label-success">Orientación de la vía</label>
                    <select class="form-control" id="orientacion_via" name="caracteristicasVia[lista][6]" required data-error="<?= MSJ_VALIDATOR_SELECT ?>">
                        <option></option>
                        <?php foreach ($orientacionVia as $_orientacionVia) { ?>
                            <option value="<?= $_orientacionVia['id']; ?>"><?= $_orientacionVia['nombre'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="material_via" class="label label-success">Material de la vía</label>
                    <select class="form-control" id="material_via" name="caracteristicasVia[lista][2]" required data-error="<?= MSJ_VALIDATOR_SELECT ?>">
                        <option></option>
                        <?php foreach ($materialVia as $_materialVia) { ?>
                            <option value="<?= $_materialVia['id']; ?>"><?= $_materialVia['nombre'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="aceras" class="label label-success">Aceras</label>
                    <select class="form-control" id="aceras" name="caracteristicasVia[lista][4]" onchange="ctrlAceras()" required data-error="<?= MSJ_VALIDATOR_SELECT ?>">
                        <option></option>
                        <?php foreach ($aceras as $_aceras) { ?>
                            <option value="<?= $_aceras['id']; ?>"><?= $_aceras['nombre'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
            </div>



            <div class="col-md-3">
                <div class="form-group">
                    <label for="bordillos" class="label label-success">Bordillos</label>
                    <select class="form-control" id="bordillos" name="caracteristicasVia[lista][3]" onchange="ctrlBordillos()" required data-error="<?= MSJ_VALIDATOR_SELECT ?>">
                        <option></option>
                        <?php foreach ($bordillos as $_bordillos) { ?>
                            <option value="<?= $_bordillos['id']; ?>"><?= $_bordillos['nombre'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-12"></div><br>
            <div class="col-md-6" id="contCaracteristicasAcera" style="display: none">

                <div class="panel <?= CLASE_SUB_PANELES ?>">  
                    <div class="panel-heading">Caracteristicas de las Aceras</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12" style="padding-bottom: 1em;">

                                <div class="form-group">
                                    <label for="porcentajeAceraConstruidoIzq" class="label label-success">Izquierda</label>
                                    <input type="number" class="form-control" id="porcentajeAceraConstruidoIzq" placeholder="% de acera construida Izquierda" name="caracteristicasVia[decimal][17]" min="0" max="100" step="0.01">
                                    <div class="help-block with-errors"></div>
                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="form-group" style="padding-bottom: 1em;">
                                    <label for="porcentajeAceraConstruidoDer" class="label label-success">Derecha</label>
                                    <input type="number" class="form-control" id="porcentajeAceraConstruidoDer" placeholder="% de acera construida Derecha" name="caracteristicasVia[decimal][16]" min="0" max="100" step="0.01">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-12" style="padding-bottom: 1em;">
                                <div class="form-group">
                                    <label for="tipoMaterialAcera" class="label label-success">Tipo de material de la acera</label>
                                    <select class="form-control" id="tipoMaterialAcera" name="caracteristicasVia[lista][10]" >
                                        <option></option>
                                        <?php foreach ($tipoMaterialAcera as $_tipoMaterialAcera) { ?>
                                            <option value="<?= $_tipoMaterialAcera['id']; ?>"><?= $_tipoMaterialAcera['nombre'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-12" style="padding-bottom: 1em;">
                                <div class="form-group">
                                    <label for="estadoConservacionAcera" class="label label-success">Estado de conservación de la Acera</label>
                                    <select class="form-control" id="estadoConservacionAcera" name="caracteristicasVia[lista][11]" >
                                        <option></option>
                                        <?php foreach ($estadoConservacionAcera as $_estadoConservacionAcera) { ?>
                                            <option value="<?= $_estadoConservacionAcera['id']; ?>"><?= $_estadoConservacionAcera['nombre'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-6" id="conCaracteristicasBordillos" style="display: none">

                <div class="panel <?= CLASE_SUB_PANELES ?>">  
                    <div class="panel-heading">Caracteristicas de los Bordillos</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12" style="padding-bottom: 1em;">
                                <div class="form-group">
                                    <label for="porcentajeBordilloConstruidoIzq" class="label label-success">Izquierda</label>
                                    <input type="number" class="form-control" id="porcentajeBordilloConstruidoIzq" placeholder="% de bordillo construido Izquierda" name="caracteristicasVia[decimal][15]" min="0" max="100" step="0.01">
                                    <div class="help-block with-errors"></div>
                                </div>

                            </div>

                            <div class="col-md-12" style="padding-bottom: 1em;">
                                <div class="form-group">
                                    <label for="porcentajeBordilloConstruidoDer" class="label label-success">Derecha</label>
                                    <input type="number" class="form-control" id="porcentajeBordilloConstruidoDer" placeholder="% de bordillo construido Derecha" name="caracteristicasVia[decimal][14]" min="0" max="100" step="0.01">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>