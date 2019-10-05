<div class="panel <?= CLASE_PANELES ?> ">
    <div class="panel-heading">
        <h3 class="panel-title">Caracteristicas del predio</h3>
    </div>
    <div class="panel-body">

        <div class="col-md-3">
            <div class="form-group">
                <label for="condicionDeOcupacion" class="label label-success">Condición de ocupación</label>
                <select class="form-control selectpicker" id="condicionDeOcupacion" name="caracteristicasPredio[1]" onchange="ctrlCondicionOcupacion()" title="Seleccionar">
                    <option disabled></option>
                    <?php foreach ($condicionOcupacion as $_condicionOcupacion) { ?>
                        <option value="<?= $_condicionOcupacion['id']; ?>"><?= $_condicionOcupacion['nombre'] ?></option>
                        <?php } ?>
                </select>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="numeroHabitantes" class="label label-success">Nro. de habitantes</label>
                <input type="number" step="1" class="form-control" min="0" id="numeroHabitantes" name="caracteristicasPredio[2]" disabled>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="numeroMedidoresAgua" class="label label-success">Nro. de medidores de agua</label>
                <input type="number" step="1" class="form-control" min="0" id="numeroMedidoresAgua" name="caracteristicasPredio[4]" >
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="numeroMedidoresElectricos" class="label label-success">Nro. de medidores eléctricos</label>
                <input type="number" step="1" class="form-control" min="0" id="numeroMedidoresElectricos" name="caracteristicasPredio[5]" >
            </div>
        </div>

        <div class="col-md-12" id="contenedorJefeHogar" style="display:none">
            <div class="panel <?= CLASE_SUB_PANELES ?> ">
                <div class="panel-heading">
                    <h3 class="panel-title">Jefe de Hogar</h3>
                </div>

                <div class="panel-body">

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="tipoIdentificacionJefeHogar" class="label label-success">Tipo de identificación</label>
                            <select class="form-control selectpicker" id="tipoIdentificacionJefeHogar" name="tipoIdentificacionJefeHogar" onchange="ctrlTipoIdentificacionJefeHogar()" title="Seleccionar">
                                <option disabled></option>
                                <option value="cedula">CEDULA</option>
                                <option value="pasaporte">PASAPORTE</option>
                                <option value="otro">OTRO</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="numeroIdentificacionJefeHogar" class="label label-success">Nro. de identificación</label>
                            <input type="number" step="1" class="form-control" min="0" id="numeroIdentificacionJefeHogar" name="numeroIdentificacionJefeHogar" >
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-md-1 btnSinLabel" id="conBtnValidarJefeHogar">
                        <a class="btn btn-success" href="#contenedorJefeHogar" id="btnValJefeHogar" role="button" >  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="apellidosJefeHogar" class="label label-success">Apellidos</label>
                            <input type="text" step="1" class="form-control" id="apellidosJefeHogar" name="apellidosJefeHogar" onblur="convertirMayusculas(event, this)" onkeyup="convertirMayusculas(event, this)" readonly>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="nombresJefeHogar" class="label label-success">Nombres</label>
                            <input type="text" step="1" class="form-control" id="nombresJefeHogar" name="nombresJefeHogar" onblur="convertirMayusculas(event, this)" onkeyup="convertirMayusculas(event, this)" readonly>
                        </div>
                    </div>


                </div>


            </div>
        </div>
    </div>
</div>