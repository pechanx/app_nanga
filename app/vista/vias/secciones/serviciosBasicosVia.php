<div class="panel <?= CLASE_PANELES ?>" id="contServiciosBasicos">  
    <div class="panel-heading">Servicios básicos de la vía</div>
    <div class="panel-body">
        <div class="row">

            <div class="col-md-12">
                <div class="btn-group" role="group">
                    <a class="btn btn-default" href="#contServiciosBasicos" role="button" onclick="ctrlSeleccionarTodosChkServiciosBasicosVias()" id="btnSeleccionarTodosCheckServiciosVias">Seleccionar todos</a>
                    <a class="btn btn-default" href="#contServiciosBasicos" role="button" onclick="ctrlDeSeleccionarTodosChkServiciosBasicosVias()" id="btnDeSeleccionarTodosCheckServiciosVias">Eliminar selecciones</a>
                </div>
            </div>


            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <input class="check" type="checkbox" name="serviciosBasicosVia[1]" id="agua" value="TRUE"> Agua Potable
                    </label>
                </div>

                <div class="checkbox">
                    <label>
                        <input class="check" type="checkbox" name="serviciosBasicosVia[2]" id="eliminacionExcretas"  value="TRUE">Eliminación de excretas
                    </label>
                </div>

                <div class="checkbox">
                    <label>
                        <input class="check" type="checkbox" name="serviciosBasicosVia[3]" id="energiaElectrica"  value="TRUE"> Energía eléctrica
                    </label>
                </div>
            </div>

            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <input class="check" type="checkbox" name="serviciosBasicosVia[5]" id="aseoCalles"  value="TRUE"> Aseo de calles
                    </label>
                </div>

                <div class="checkbox">
                    <label>
                        <input class="check" type="checkbox" name="serviciosBasicosVia[6]" id="recoleccionBasura"  value="TRUE"> Recolección de basura
                    </label>
                </div>
            </div>

            <div class="col-md-4">
                <div class="checkbox">
                    <label>
                        <input class="check" type="checkbox" name="serviciosBasicosVia[7]" id="alumbrado"  value="TRUE"> Alumbrado
                    </label>
                </div>

                <div class="checkbox">
                    <label>
                        <input class="check" type="checkbox" name="serviciosBasicosVia[4]" id="telefonia"  value="TRUE"> Telefonía
                    </label>
                </div>

            </div>

        </div>
    </div>
</div>