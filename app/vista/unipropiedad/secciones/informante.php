<div class="panel <?= CLASE_PANELES ?>">
    <div class="panel-heading">Informante</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="informanteTipo" class="label label-success">Tipo de informante </label>
                    <select class="form-control" id="informanteTipo" name="informanteTipo" onchange="ctrlTipoInformante();" data-error="Campo obligatorio" required>
                        <option ></option>
                        <?php foreach ($levTipoInformante as $_levTipoInformante) { ?>
                            <option value="<?= $_levTipoInformante['id']; ?>"><?= $_levTipoInformante['nombre'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>

            </div>

            <div class="col-md-12" id="contenedorDatosInformante" style="display: none">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="informanteTipoIdentificacion" class="label label-success">Tipo de identificación</label>
                        <select class="form-control" id="informanteTipoIdentificacion" name="informanteTipoIdentificacion">
                            <option ></option>
                            <option value="ruc">RUC</option>
                            <option value="cedula">CEDULA</option>
                            <option value="pasaporte">PASAPORTE</option>
                            <option value="otro">OTRO</option>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group" >
                        <label for="informanteNumeroIdentificacion" class="label label-success">Nro. Identificación</label>
                        <input type="text" class="form-control" id="informanteNumeroIdentificacion" name="informanteNumeroIdentificacion" >
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>