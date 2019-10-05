<div class="panel <?= CLASE_PANELES ?> ">
    <div class="panel-heading">
        <h3 class="panel-title">Servicios Básicos del Lote</h3>
    </div>
    <div class="panel-body">
        <div class="col-md-3">
            <div class="form-group">
                <label for="servicioBasicoAgua" class="label label-success">Abastecimiento de agua</label>
                <select class="form-control selectpicker" id="servicioBasicoAgua" name="servicioBasico[1]" >
                    <option></option>
                    <?php foreach ($servicioAgua as $_servicioAgua) { ?>
                        <option value="<?= $_servicioAgua['id']; ?>"><?= $_servicioAgua['nombre']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="servicioBasicoExcretas" class="label label-success">Eliminación de excretas</label>
                <select class="form-control selectpicker" id="servicioBasicoExcretas" name="servicioBasico[2]">
                    <option></option>
                    <?php foreach ($servicioExcretas as $_servicioExcretas) { ?>
                        <option value="<?= $_servicioExcretas['id']; ?>"><?= $_servicioExcretas['nombre']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="servicioBasicoElectrica" class="label label-success">Energía eléctrica</label>
                <select class="form-control selectpicker" id="servicioBasicoElectrica" name="servicioBasico[3]">
                    <option></option>
                    <?php foreach ($servicioElectrico as $_servicioElectrico) { ?>
                        <option value="<?= $_servicioElectrico['id']; ?>"><?= $_servicioElectrico['nombre']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="servicioBasicoComunicaciones" class="label label-success">Comunicaciones</label>
                <select class="form-control selectpicker" id="servicioBasicoComunicaciones" name="servicioBasicoComunicaciones[]" multiple>
                    <option></option>
                    <?php foreach ($servicioComunicaciones as $_servicioComunicaciones) { ?>
                        <option value="<?= $_servicioComunicaciones['id']; ?>"><?= $_servicioComunicaciones['nombre']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
</div>