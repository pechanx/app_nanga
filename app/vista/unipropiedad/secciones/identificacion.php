<div class="panel <?= CLASE_PANELES ?> ">
    <div class="panel-heading">
        <h3 class="panel-title">Identificación</h3>
    </div>
    <div class="panel-body">

        <!--        <div class="col-md-12">
                    <div class="form-group">
                        <label for="ubicacion" class="label label-success">Ubicación</label>
                        <input type="text" class="form-control" id="ubicacion" name="ubicacion" onblur="convertirMayusculas(event, this)" onkeyup="convertirMayusculas(event, this)" >
                    </div>
                </div>-->

        <div class="col-md-4" >
            <div class="form-group">
                <label for="urbZonaSector" class="label label-success">Urbanización / Cooperativa / Lotización / Barrio / Sector *</label>
                <input class="form-control" list="urbZonaSector" name="urbZonaSector" onblur="convertirMayusculas(event, this)" onkeyup="convertirMayusculas(event, this)" data-error="<?= MSJ_VALIDATOR_DATALIST ?>" required>
                <datalist id="urbZonaSector">
                    <?php foreach ($urbZonaSector as $barrios) { ?>
                        <option value="<?= $barrios['id']; ?>" label="<?= $barrios['nombre']; ?>">
                        <?php } ?>
                </datalist>
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="claveAnterior" class="label label-success">Clave anterior</label>
                <input type="text" class="form-control" id="claveAnterior" name="claveAnterior" >
            </div>
        </div>

        <!--        <div class="col-md-3">
                    <div class="form-group">
                        <label for="codigoUnicoPredial" class="label label-success">Código único predial</label>
                        <input type="text" class="form-control" id="codigoUnicoPredial" name="codigoUnicoPredial" >
                    </div>
                </div>-->

        <div class="col-md-4" >
            <div class="form-group">
                <label for="usoDelPredio" class="label label-success">Uso del predio</label>
                <select class="form-control selectpicker" id="usoDelPredio" name="usoDelPredio" data-error="<?= MSJ_VALIDATOR_SELECT ?>" data-live-search="true" title="Seleccionar" required>
                    <option disbaled></option>
                    <?php foreach ($usoDelPredio as $uso_predio) { ?>
                        <option value="<?= $uso_predio['id']; ?>" data-tokens="<?= $uso_predio['nombre'] ?>"><?= $uso_predio['nombre'] ?></option>
                    <?php } ?>
                </select>
                <div class="help-block with-errors"></div>
            </div>
        </div>



    </div>
</div>