<div class="panel <?= CLASE_PANELES ?> ">
    <div class="panel-heading">
        <h3 class="panel-title">Vías del Lote</h3>
    </div>
    <div class="panel-body">

        <div class="col-md-6">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-lg-12">
                        <div class="input-group">
                            <input type="number" class="form-control" id="numeroVias" name="numeroVias" min="1" max="4" step="1" data-error="<?= MSJ_VALIDATOR_TXT_GENERAR ?>" required>
                            <span class="input-group-btn">
                                <a class="btn btn-success" href="#" id="btnGenerarVias" role="button"> Número de vías</a>
                            </span>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12" id="contenedorViasGeneradas"></div>

    </div>
</div>