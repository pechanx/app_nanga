<div class="panel <?= CLASE_PANELES ?> " id="edificaciones">
    <div class="panel-heading">
        <h3 class="panel-title">EDIFICACIONES</h3>
    </div>
    <div class="panel-body">
        <div class="col-md-12">
            <div class="col-md-12" id="msjLoteVacio"></div>

            <div class="col-md-6" id="contGenerarBloques" style="display: none">
                <div class="form-group">
                    <div class="col-lg-12">
                        <div class="input-group">
                            <input type="number" class="form-control" id="numeroBloques" name="numeroBloques" min="1" max="4" step="1" data-error="<?= MSJ_VALIDATOR_TXT_GENERAR ?>" readonly>
                            <span class="input-group-btn">
                                <a class="btn btn-success" href="#edificaciones" id="btnGenerarBloques" role="button"> Número de bloques</a>
                            </span>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-6" id="contGenerarMejoras"  style="display: none">
                <div class="form-group">
                    <div class="col-lg-12">
                        <div class="input-group">
                            <input type="number" class="form-control" id="numeroMejoras" name="numeroMejoras" min="1" step="1" >
                            <span class="input-group-btn">
                                <a class="btn btn-success" href="#edificaciones" id="btnGenerarMejoras" role="button"> Número de mejoras</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-8">
            <div class="form-group">
                <label for="edificacionesAreaTotal" class="label label-success">Área total</label>
                <input type="text" class="form-control" id="edificacionesAreaTotal" name="edificacionesAreaTotal">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="edificacionesAreaTotalUnidad" class="label label-success">Unidad de medida</label>
                <select class="form-control selectpicker" id="edificacionesAreaTotalUnidad" name="edificacionesAreaTotalUnidad" >
                    <option>Seleccionar</option>
                    <?php foreach ($genUnidadMedida as $_genUnidadMedida) { ?>
                        <option value="<?= $_genUnidadMedida['id']; ?>" selected><?= $_genUnidadMedida['nombre'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        
        <div class="col-md-12" id="contBloquesGenerados"></div>
        
        <div class="col-md-12" id="contMejorasGeneradas"></div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="edificacionesObservaciones" class="label label-success">Observaciones</label>
                <input type="text" class="form-control" min="0" id="edificacionesObservaciones" name="edificacionesObservaciones" onblur="convertirMayusculas(event, this)" onkeyup="convertirMayusculas(event, this)" >
            </div>
        </div>


    </div>
</div>