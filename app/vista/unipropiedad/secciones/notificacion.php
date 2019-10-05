<div class="panel <?= CLASE_PANELES ?>" id="cont_notificacion">  
    <div class="panel-heading">Notificación</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-1">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="notificacionCuandoEsPropietario" id="notificacionCuandoEsPropietario" onclick="ctrlNotificacionPropietario()" value="TRUE"> Propietario
                    </label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="notificacionTipoDireccion" class="label label-success">Tipo de dirección</label>
                    <select class="form-control" id="notificacionTipoDireccion" name="notificacionTipoDireccion"  data-error="<?= MSJ_VALIDATOR_SELECT ?>" title="Seleccionar" required>
                        <option disabled></option>
                        <?php foreach ($perTipoDireccion as $_perTipoDireccion) { ?>
                            <option value="<?= $_perTipoDireccion['id']; ?>"><?= $_perTipoDireccion['nombre']; ?></option>
                        <?php } ?>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="notificacionApellidos" class="label label-success">Apellidos</label>
                    <input type="text" class="form-control" id="notificacionApellidos" name="notificacionApellidos"  onblur="convertirMayusculas(event, this)" onkeyup="convertirMayusculas(event, this)">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="notificacionNombres" class="label label-success">Nombres</label>
                    <input type="text" class="form-control" id="notificacionNombres" name="notificacionNombres"  onblur="convertirMayusculas(event, this)" onkeyup="convertirMayusculas(event, this)">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="notificacionEmail" class="label label-success">Correo Eléctronico</label>
                    <input type="email" class="form-control" id="notificacionEmail" name="notificacionEmail"  onblur="convertirMayusculas(event, this)" onkeyup="convertirMayusculas(event, this)">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="notificacionCelular" class="label label-success">Teléfono Celular</label>
                    <input type="text" class="form-control" id="notificacionCelular" name="notificacionCelular" >
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="notificacionConvencional" class="label label-success">Teléfono Convencional</label>
                    <input type="text" class="form-control" id="notificacionConvencional" name="notificacionConvencional" >
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="notificacionPais" class="label label-success">País</label>
                    <input type="text" class="form-control" id="notificacionPais" name="notificacionPais"  onblur="convertirMayusculas(event, this)" onkeyup="convertirMayusculas(event, this)" value="ECUADOR">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="notificacionCanton" class="label label-success">Cantón</label>
                    <select class="form-control selectpicker" id="notificacionCanton" name="notificacionCanton"  data-live-search="true" title="Seleccionar">
                        <option disabled></option>
                        <?php foreach ($datosCantones as $_datosCantones) {
                            if ($_datosCantones['id'] == NUM_CANTON) {
                                echo '<option value="' . $_datosCantones['id'] . '" selected>' . $_datosCantones['nombre'] . '</option>';
                            } else { ?>
                                <option value="<?= $_datosCantones['id']; ?>"  data-tokens="<?= $_datosCantones['nombre'] ?>"><?= $_datosCantones['nombre'] ?></option>
                                <?php }
                        } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="notificacionParroquia" class="label label-success">Parroquia</label>
                    <select class="form-control selectpicker" id="notificacionParroquia" name="notificacionParroquia"  data-live-search="true" title="Seleccionar">
                        <option disabled></option>
                        <?php foreach ($datosParroquiasOrdenadas as $_datosParroquiasOrdenadas) { ?>
                            <option value="<?= $_datosParroquiasOrdenadas['id']; ?>" data-tokens="<?= $_datosParroquiasOrdenadas['nombre'] ?>"><?= $_datosParroquiasOrdenadas['nombre'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="notificacionDireccion" class="label label-success">Dirección</label>
                    <input type="text" class="form-control" id="notificacionDireccion" name="notificacionDireccion"  onblur="convertirMayusculas(event, this)" onkeyup="convertirMayusculas(event, this)">
                </div>
            </div>
        </div>
    </div>
</div>