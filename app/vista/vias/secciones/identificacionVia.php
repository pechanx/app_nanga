<div class="panel <?= CLASE_PANELES ?>">  
    <div class="panel-heading">Identificación de la vía</div>
    <div class="panel-body">
        <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                    <label for="codigoAcumuladoVia" class="label label-success">Código de la vía</label>
                    <select class="form-control selectpicker" id="codigoAcumuladoVia" name="codigoAcumuladoVia" data-error="Por favor seleccione una opción" data-live-search="true" required>
                        <option>Seleccionar</option>
                        <?php foreach ($viasPec as $_viasPec) { ?>
                            <option value="<?= $_viasPec['id']; ?>" data-tokens="<?= $_viasPec['codigo_acumulado'] ?>"><?= $_viasPec['codigo_acumulado'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="col-md-6" >
                <div class="form-group">
                    <label for="nombreDeLaVia" class="label label-success">Nombre de la vía</label>
                    <input class="form-control" list="nombreDeLaVia" name="nombreDeLaVia" onblur="convertirMayusculas(event, this)" onkeyup="convertirMayusculas(event, this)" data-error="<?= MSJ_VALIDATOR_DATALIST ?>" required>
                    <datalist id="nombreDeLaVia">
                        <?php foreach ($nombresViasIngresadas as $_nombresViasIngresadas) { ?>
                            <option value="<?= $_nombresViasIngresadas['id'] ?>" label="<?= $_nombresViasIngresadas['nombre'] ?>">
                            <?php } ?>
                    </datalist>
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="anchoVia" class="label label-success">Ancho de la Vía</label>
                    <input type="number" step="0.01" min="1" class="form-control" id="anchoVia" name="caracteristicasVia[decimal][5]" >
                </div>
            </div>

        </div>
    </div>
</div>