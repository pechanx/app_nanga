<div class="panel <?= CLASE_PANELES ?>">
    <div class="panel-heading">Responsables</div>
    <div class="panel-body">
        <div class="row">
            
            <div class="col-md-12">
                <div class="form-group">
                    <label for="responsablesLevantamientoFecha" class="label label-success">Fecha en que se realizó el levantamiento</label>
                    <input type="date" class="form-control" id="responsablesLevantamientoFecha" name="responsablesLevantamientoFecha" >
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="responsablesFiscalizador" class="label label-success">Fiscalizador *</label>
                    <select class="form-control" id="responsablesFiscalizador" name="responsablesFiscalizador" data-error="Campo obligatorio" required>
                        <option ></option>
                        <?php foreach ($perPersonaFiscalizador as $_perPersonaFiscalizador) { ?>
                            <option value="<?= $_perPersonaFiscalizador['id']; ?>" selected><?= $_perPersonaFiscalizador['nombres'] . " " . $_perPersonaFiscalizador['apellidos'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="responsablesSupervisor" class="label label-success">Supervisor *</label>
                    <select class="form-control" id="responsablesSupervisor" name="responsablesSupervisor" data-error="Campo obligatorio" required>
                        <option ></option>
                        <?php foreach ($perPersonaSupervisor as $_perPersonaSupervisor) { ?>
                            <option value="<?= $_perPersonaSupervisor['id']; ?>" selected><?= $_perPersonaSupervisor['nombres'] . " " . $_perPersonaSupervisor['apellidos'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="responsablesRelevador" class="label label-success">Relevador *</label>
                    <select class="form-control" id="responsablesRelevador" name="responsablesRelevador" data-error="Campo obligatorio" required>
                        <option ></option>
                        <?php foreach ($perPersonaRelevador as $perPersonaRelevador) { ?>
                            <option value="<?= $perPersonaRelevador['id']; ?>"><?= $perPersonaRelevador['nombres'] . " " . $perPersonaRelevador['apellidos'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
            </div>

        </div>
    </div>
</div>