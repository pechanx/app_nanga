<div class="panel <?= CLASE_PANELES ?> ">
    <div class="panel-heading">
        <h3 class="panel-title">Propietario</h3>
    </div>
    <div class="panel-body">

        <div class="panel <?= CLASE_SUB_PANELES ?>">  
            <div class="panel-heading">Propietario / Poseedor</div>
            <div class="panel-body">
                <div class="row">

                    <div class="col-md-3">
                        <div class="radio">
                            <label>
                                <input type="radio" name="propietarioTitulo" id="propietarioConTitulo" onclick="ctrlPropietarioPoseedor()" value="TRUE" required> Propietario con título
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="radio">
                            <label>
                                <input type="radio" name="propietarioTitulo" id="propietarioDesconocido" onclick="ctrlPropietarioPoseedor()" value="FALSE" required> Propietario desconocido
                            </label>
                        </div>
                    </div>

                    <div class="col-md-6" id="contPersoneria" style="display: none">
                        <div class="form-group">
                            <label for="personeriaPropietario"  class="label label-success">Personería</label>
                            <select class="form-control"  id="personeriaPropietario" name="personeriaPropietario" onchange="ctrlPersoneriaPropietario()" title="Seleccionar">
                                <option></option>
                                <option value="natural">NATURAL</option>
                                <option value="juridica">JURIDICA</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-2" id="contPropietarioAlicuota" style="display: none">
                            <div class="form-group">
                                <label for="propietarioAlicuota" class="label label-success">Alícuota</label>
                                <input type="number" min="0" max="100" class="form-control" id="propietarioAlicuota" name="propietarioAlicuota" value="100">
                            </div>
                        </div>

                        <div class="col-md-2" id="contPropietarioPrecioCompraComercial" style="display: none">
                            <div class="form-group">
                                <label for="propietarioPrecioCompraComercial" class="label label-success">Precio compra comercial</label>
                                <input type="number" step="0.01" class="form-control" id="propietarioPrecioCompraComercial" name="propietarioPrecioCompraComercial" >
                            </div>
                        </div>

                        <div class="col-md-6" id="contNumeroPropietarios" style="display: none">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="numeroPropietarios" class="label label-warning">Escriba aquí el número de propietarios adicionales al representante</label>
                                    <div class="col-lg-12">
                                        <div class="input-group">

                                            <input type="number" class="form-control" id="numeroPropietarios" name="numeroPropietarios" min="0" step="1">
                                            <span class="input-group-btn">
                                                <a class="btn btn-success" href="#contNumeroPropietarios" id="btnGenerarCopropietarios" role="button"> Número de propietarios</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="panel <?= CLASE_SUB_PANELES ?>" id="contenedorFormaAdquisicion"  style="display: none">  
            <div class="panel-heading">Forma de adquisición</div>
            <div class="panel-body">
                <div class="row">

                    <div class="col-md-12">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="formaAdquisicion" class="label label-success">Forma de adquisición</label>
                                <select class="form-control selectpicker" id="formaAdquisicion" name="formaAdquisicion"  title="Seleccionar">
                                    <option></option>
                                    <?php foreach ($formaAdquisicion as $_formaAdquisicion) { ?>
                                        <option value="<?= $_formaAdquisicion['id']; ?>"><?= $_formaAdquisicion['nombre'] ?></option>
                                        <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="sinPerfeccionar" id="sinPerfeccionar" value="TRUE" onchange="ctrlFormaAdquisicionChkSinPerfeccionar()"> Sin perfeccionar
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12">Protocolización</div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="formaAdquisicionProtocolizacionCelebradoAnte" class="label label-success">Celebrado ante</label>
                                <select class="form-control selectpicker" id="formaAdquisicionProtocolizacionCelebradoAnte" name="formaAdquisicionProtocolizacionCelebradoAnte"  title="Seleccionar">
                                    <option></option>
                                    <option value="notario" selected>NOTARIO</option>
                                    <option value="juez">JUEZ</option>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="formaAdquisicionProtocolizacionCanton" class="label label-success">Cantón</label>
                                <select class="form-control selectpicker" id="formaAdquisicionProtocolizacionCanton" name="formaAdquisicionProtocolizacionCanton" data-live-search="true"  title="Seleccionar">
                                    <option></option>
                                    <?php
                                    foreach ($datosCantones as $_datosCantones) {
                                        if ($_datosCantones['id'] == NUM_CANTON) {
                                            echo '<option value="' . $_datosCantones['id'] . '" data-tokens="' . $_datosCantones['nombre'] . '" selected>' . $_datosCantones['nombre'] . '</option>';
                                        } else {
                                            ?>
                                            <option value="<?= $_datosCantones['id']; ?>" data-tokens="<?= $_datosCantones['nombre'] ?>"><?= $_datosCantones['nombre'] ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="formaAdquisicionProtocolizacionNotaria" class="label label-success">Notaría</label>
                                <input type="number" min="1" class="form-control" id="formaAdquisicionProtocolizacionNotaria" name="formaAdquisicionProtocolizacionNotaria" >
                                <div class="help-block with-errors"></div>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="formaAdquisicionProtocolizacionFecha" class="label label-success">Fecha</label>
                                <input type="date" class="form-control" id="formaAdquisicionProtocolizacionFecha" name="formaAdquisicionProtocolizacionFecha" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" id="contInscripcionFormaAdquisicion">
                        <div class="col-md-12">Inscripción</div>
                        <div class="col-md-3">
                            <div class="form-group ctrlInscripcionBloqError">
                                <label for="formAdquisicionInscripcionCanton" class="label label-success">Cantón</label>
                                <select class="form-control selectpicker" id="formAdquisicionInscripcionCanton" name="formAdquisicionInscripcionCanton"  data-live-search="true"  title="Seleccionar">
                                    <option></option>
                                    <?php
                                    foreach ($datosCantones as $_datosCantones) {
                                        if ($_datosCantones['id'] == NUM_CANTON) {
                                            echo '<option value="' . $_datosCantones['id'] . '" data-tokens="' . $_datosCantones['nombre'] . '"  selected>' . $_datosCantones['nombre'] . '</option>';
                                        } else {
                                            ?>
                                            <option value="<?= $_datosCantones['id']; ?>"  data-tokens="<?= $_datosCantones['nombre'] ?>"><?= $_datosCantones['nombre'] ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="formAdquisicionInscripcionMatricula" class="label label-success">Matrícula</label>
                                <input type="text" class="form-control" id="formAdquisicionInscripcionMatricula" name="formAdquisicionInscripcionMatricula" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="formAdquisicionInscripcionLibro" class="label label-success">Libro</label>
                                <input type="text" class="form-control" id="formAdquisicionInscripcionLibro" name="formAdquisicionInscripcionLibro" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="formAdquisicionInscripcionFoja" class="label label-success">Foja</label>
                                <input type="text" class="form-control" id="formAdquisicionInscripcionFoja" name="formAdquisicionInscripcionFoja" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="formAdquisicionInscripcionFecha" class="label label-success">Fecha</label>
                                <input type="date" class="form-control" id="formAdquisicionInscripcionFecha" name="formAdquisicionInscripcionFecha" >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel <?= CLASE_SUB_PANELES ?>" id="contenedorPropietarioNatural"  style="display: none">  
            <div class="panel-heading">Propietario Natural</div>
            <div class="panel-body">
                <div class="row">

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="propietarioNaturalTipoIdentificacion" class="label label-success">Tipo de identificación</label>
                            <select class="form-control" id="propietarioNaturalTipoIdentificacion" name="propietarioNaturalTipoIdentificacion" onchange="ctrlPropietarioNaturalTipoIdentificacion()">
                                <option></option>
                                <option value="cedula">CEDULA</option>
                                <option value="pasaporte">PASAPORTE</option>
                                <option value="otro">OTRO</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="label label-success" for="propietarioNaturalNumeroIdentificacion">Nº Identificación</label>
                            <input type="text" class="form-control" id="propietarioNaturalNumeroIdentificacion" name="propietarioNaturalNumeroIdentificacion">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-md-1" id="contBtnValPropNaturalNroIdentificacion">
                        <label for="btnValPropNaturalNroIdentificacion" class="label label-success">Validar</label>
                        <a class="btn btn-success" href="#contenedorPropietarioNatural" id="btnValPropNaturalNroIdentificacion" role="button"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="propietarioNaturalApellidos" class="label label-success">Apellidos</label>
                            <input type="text" class="form-control" id="propietarioNaturalApellidos" name="propietarioNaturalApellidos"   onblur="convertirMayusculas(event, this)" onkeyup="convertirMayusculas(event, this)" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="propietarioNaturalNombre" class="label label-success">Nombres</label>
                            <input type="text" class="form-control" id="propietarioNaturalNombre" name="propietarioNaturalNombre"   onblur="convertirMayusculas(event, this)" onkeyup="convertirMayusculas(event, this)" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="propietarioNaturalFechaNacimiento" class="label label-success">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="propietarioNaturalFechaNacimiento" name="propietarioNaturalFechaNacimiento" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="propietarioNaturalEstadoCivil" class="label label-success">Estado Civil</label>
                            <select class="form-control " id="propietarioNaturalEstadoCivil" name="propietarioNaturalEstadoCivil" onchange="ctrlEstadoCivilPropietario()" disabled>
                                <option></option>
                                <option value="soltero">Soltero</option>
                                <option value="casado">Casado</option>
                                <option value="divorciado">Divorciado</option>
                                <option value="viudo">Viudo</option>
                                <option value="union de hecho">Unión de hecho</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="propietarioNaturalTieneDiscapacidad" id="propietarioNaturalTieneDiscapacidad" onclick="ctrlTieneDiscapacidad()" value="TRUE" disabled> Discapacidad
                            </label>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="propietarioNaturalDefuncion" id="propietarioNaturalDefuncion" onclick="ctrlTieneDefuncion()" value="TRUE" disabled> Defunción
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2" style="display: none" id="contFechaDefuncionPropietario">
                        <div class="form-group">
                            <label for="propietarioNaturalFechaDefuncion" class="label label-success">Fecha de defunción</label>
                            <input type="date" class="form-control" id="propietarioNaturalFechaDefuncion" name="propietarioNaturalFechaDefuncion" >
                        </div>
                    </div>

                    <div id="contDatosDiscapacidad" style="display: none" class="col-md-12">
                        <div class="panel panel-default">  
                            <div class="panel-heading">Discapacidad</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="propietarioNaturalDiscapacidadNroCarnet" class="label label-success">Nº de carnet</label>
                                            <input type="text" class="form-control" id="propietarioNaturalDiscapacidadNroCarnet" name="propietarioNaturalDiscapacidadNroCarnet"  onblur="convertirMayusculas(event, this)" onkeyup="convertirMayusculas(event, this)">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="propietarioNaturalDiscapacidadPorcentaje" class="label label-success">Porcentaje</label>
                                            <input type="number" class="form-control" id="propietarioNaturalDiscapacidadPorcentaje" name="propietarioNaturalDiscapacidadPorcentaje" min="1" max="100">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="propietarioNaturalDiscapacidadTipo" class="label label-success">Tipo de discapacidad</label>
                                            <select class="form-control selectpicker" id="propietarioNaturalDiscapacidadTipo" name="propietarioNaturalDiscapacidadTipo"  title="Seleccionar">
                                                <option value="" disabled selected></option>
                                                <option value="permanente">PERMANENTE</option>
                                                <option value="temporal">TEMPORAL</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="contDatosConyugue" style="display:none" class="col-md-12">

                        <div class="panel panel-default">  
                            <div class="panel-heading">Datos conyúgue</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="conyuguePropietarioNaturalTipoIdentificacion" class="label label-success">Tipo de identificación</label>
                                            <select class="form-control selectpicker" name="conyuguePropietarioNaturalTipoIdentificacion"  id="conyuguePropietarioNaturalTipoIdentificacion" onchange="ctrlConyugueTipoIdentificacion()"  title="Seleccionar">
                                                <option value="" disabled selected></option>
                                                <option value="cedula">CEDULA</option>
                                                <option value="pasaporte">PASAPORTE</option>
                                                <option value="otro">OTRO</option>
                                            </select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group has-feedback" id="cont_txt_ident_conyugue">
                                            <label class="label label-success" for="conyuguePropietarioNaturalNumeroIdentificacion">Nº Identificación</label>
                                            <input type="text" class="form-control" id="conyuguePropietarioNaturalNumeroIdentificacion" name="conyuguePropietarioNaturalNumeroIdentificacion" >
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-1" id="contValidarIdentificacionConyugue">
                                        <label for="btnValidarIdentificacionConyugue" class="label label-success">Validar</label>
                                        <a class="btn btn-success" href="#contDatosConyugue" id="btnValidarIdentificacionConyugue" role="button" ><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="conyuguePropietarioNaturalApellidos" class="label label-success">Apellidos</label>
                                            <input type="text" class="form-control" id="conyuguePropietarioNaturalApellidos" name="conyuguePropietarioNaturalApellidos"  onblur="convertirMayusculas(event, this)" onkeyup="convertirMayusculas(event, this)" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="conyuguePropietarioNaturalNombres" class="label label-success">Nombres</label>
                                            <input type="text" class="form-control" id="conyuguePropietarioNaturalNombres" name="conyuguePropietarioNaturalNombres"  onblur="convertirMayusculas(event, this)" onkeyup="convertirMayusculas(event, this)" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="conyuguePropietarioNaturalFechaNacimiento" class="label label-success">Fecha de nacimiento</label>
                                            <input type="date" class="form-control" id="conyuguePropietarioNaturalFechaNacimiento" name="conyuguePropietarioNaturalFechaNacimiento" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="conyuguePropietarioTieneDefuncion" id="conyuguePropietarioTieneDefuncion" onclick="ctrlConyugueDefuncion()" value="conyugue_defuncion" disabled> Defunción
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="display: none" id="contConyugueFechaDefuncion">
                                        <div class="form-group">
                                            <label for="conyuguePropietarioFechaDefuncion" class="label label-success">Fecha de defunción</label>
                                            <input type="date" class="form-control" id="conyuguePropietarioFechaDefuncion" name="conyuguePropietarioFechaDefuncion" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel <?= CLASE_SUB_PANELES ?>" id="contenedorCopropietarios"  style="display: none">  
            <div class="panel-heading">Copropietarios</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12" id="mostrarCopropietarios"></div>
                </div>
            </div>
        </div>

        <div class="panel <?= CLASE_SUB_PANELES ?>" id="contenedorPropietarioJuridico"  style="display: none">  
            <div class="panel-heading">Propietario Jurídico</div>
            <div class="panel-body">
                <div class="row">

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="propietarioJuridicoTipoIdentificacion" class="label label-success">Tipo de identificación</label>
                            <select class="form-control selectpicker" name="propietarioJuridicoTipoIdentificacion" id="propietarioJuridicoTipoIdentificacion" onchange="ctrlPropietarioJuridicoTipoIdentificacion()" title="Seleccionar">
                                <option></option>
                                <option value="ruc">RUC</option>
                                <option value="otro">OTRO</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" >
                            <label class="label label-success" for="propietarioJuridicoNroIdentificacion">Nº Identificación</label>
                            <input type="text" class="form-control" id="propietarioJuridicoNroIdentificacion" name="propietarioJuridicoNroIdentificacion">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-1" id="contValBtnPropietarioJuridicoNroIdentificacion">
                        <label for="btnPropietarioJuridicoNroIdentificacion" class="label label-success">Validar</label>
                        <a class="btn btn-success" href="#contenedorPropietarioJuridico" id="btnPropietarioJuridicoNroIdentificacion" role="button" ><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="propietarioJuridicoRazonSocial" class="label label-success">Razón Social</label>
                            <input type="text" class="form-control" id="propietarioJuridicoRazonSocial" name="propietarioJuridicoRazonSocial"  onblur="convertirMayusculas(event, this)" onkeyup="convertirMayusculas(event, this)" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="propietarioJuridicoDominio" class="label label-success">Dominio</label>
                            <select class="form-control " name="propietarioJuridicoDominio" id="propietarioJuridicoDominio"  onchange="ctrlDominioPersonaJuridica()" disabled>
                                <option></option>
                                <option value="privado">Privado</option>
                                <option value="publico">Público</option>
                                <option value="municipal">Municipal</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div id="contDominioMunicipal" style="display: none"  class="col-md-12">

                        <div class="panel <?= CLASE_SUB_PANELES ?>">  
                            <div class="panel-heading">Dominio: Municipal</div>
                            <div class="panel-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="propietarioJuridicoCondicionMunicipal" class="label label-success">Condición municipal</label>
                                            <select class="form-control selectpicker" id="propietarioJuridicoCondicionMunicipal" name="propietarioJuridicoCondicionMunicipal" onchange="ctrlPropietarioJuridicoCondicionMunicipal()"  title="Seleccionar">
                                                <option></option>
                                                <?php foreach ($munTipoCondicion as $_munTipoCondicion) { ?>
                                                    <option value="<?= $_munTipoCondicion['id']; ?>"><?= $_munTipoCondicion['nombre'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="propietarioJuridicoMunicipalTiempoEnAnios" class="label label-success">Tiempo en años</label>
                                            <input type="number" class="form-control" id="propietarioJuridicoMunicipalTiempoEnAnios" name="propietarioJuridicoMunicipalTiempoEnAnios" min="1">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="propietarioJuridicoMunicipalSinPerfeccionar" id="propietarioJuridicoMunicipalSinPerfeccionar" onclick="ctrlMunicipalSinPerfeccionar()" value="TRUE"> Sin perfeccionar
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="panel <?= CLASE_SUB_PANELES ?>">  
                                            <div class="panel-heading">Información: Condición municipal</div>
                                            <div class="panel-body">
                                                <div class="row">

                                                    <div class="col-md-12" id="contMunicipalProtocolizacion">
                                                        <div class="col-md-12">PROTOCOLIZACIÓN</div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="municipalProtocolizacionCelebradoAnte" class="label label-success">Celebrado ante</label>
                                                                <select class="form-control selectpicker" id="municipalProtocolizacionCelebradoAnte" name="municipalProtocolizacionCelebradoAnte" title="">
                                                                    <option></option>
                                                                    <option value="notario" selected>NOTARIO</option>
                                                                    <option value="juez">JUEZ</option>
                                                                </select>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="municipalProtocolizacionCanton" class="label label-success">Cantón</label>
                                                                <select class="form-control selectpicker selectpicker" id="municipalProtocolizacionCanton" name="municipalProtocolizacionCanton" data-live-search="true"  title="">
                                                                    <option></option>
                                                                    <?php foreach ($datosCantones as $_datosCantones) { ?>
                                                                        <option value="<?= $_datosCantones['id']; ?>" data-tokens="<?= $_datosCantones['nombre'] ?>"><?= $_datosCantones['nombre'] ?></option>
                                                                        <?php } ?>
                                                                </select>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="municipalProtocolizacionNotaria" class="label label-success">Notaría</label>
                                                                <input type="number" min="1" class="form-control" id="municipalProtocolizacionNotaria" name="municipalProtocolizacionNotaria"   onblur="convertirMayusculas(event, this)" onkeyup="convertirMayusculas(event, this)">
                                                                <div class="help-block with-errors"></div>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="municipalProtocolizacionFecha" class="label label-success">Fecha</label>
                                                                <input type="date" class="form-control" id="municipalProtocolizacionFecha" name="municipalProtocolizacionFecha" >
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12" id="contMunicipalInscripcion">
                                                        <div class="col-md-12">INSCRIPCIÓN</div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="municipalInscripcionCanton" class="label label-success">Cantón</label>
                                                                <select class="form-control selectpicker" id="municipalInscripcionCanton" name="municipalInscripcionCanton" data-live-search="true"  title="Seleccionar">
                                                                    <option></option>
                                                                    <?php foreach ($datosCantones as $_datosCantones) { ?>
                                                                        <option value="<?= $_datosCantones['id']; ?>"  data-tokens="<?= $_datosCantones['nombre'] ?>"><?= $_datosCantones['nombre'] ?></option>
                                                                        <?php } ?>
                                                                </select>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="municipalInscripcionMatricula" class="label label-success">Matrícula</label>
                                                                <input type="text" class="form-control" id="municipalInscripcionMatricula" name="municipalInscripcionMatricula"   onblur="convertirMayusculas(event, this)" onkeyup="convertirMayusculas(event, this)">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="municipalInscripcionLibro" class="label label-success">Libro</label>
                                                                <input type="text" class="form-control" id="municipalInscripcionLibro" name="municipalInscripcionLibro"   onblur="convertirMayusculas(event, this)" onkeyup="convertirMayusculas(event, this)">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="municipalInscripcionFoja" class="label label-success">Foja</label>
                                                                <input type="text" class="form-control" id="municipalInscripcionFoja" name="municipalInscripcionFoja"   onblur="convertirMayusculas(event, this)" onkeyup="convertirMayusculas(event, this)">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="municipalInscripcionFecha" class="label label-success">Fecha</label>
                                                                <input type="date" class="form-control" id="municipalInscripcionFecha" name="municipalInscripcionFecha" >
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" id="contBeneficiaro" style="display: none">
                                            <div class="panel <?= CLASE_SUB_PANELES ?>">  
                                                <div class="panel-heading">Información: Beneficiario</div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="municipalBeneficiarioPersoneria" class="label label-success">Personería</label>
                                                                <select class="form-control selectpicker" id="municipalBeneficiarioPersoneria" name="municipalBeneficiarioPersoneria" onchange="ctrlMunicipalBeneficiarioPersoneria()"  title="Seleccionar">
                                                                    <option></option>
                                                                    <option value="natural">NATURAL</option>
                                                                    <option value="juridica">JURIDICA</option>
                                                                </select>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>

                                                        <div id="contMunicipalBeneficiarioJuridica" style="display: none" class="col-md-12">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="municipalBeneficiarioJuridicaTipoIdentificacion" class="label label-success">Tipo de identificación</label>
                                                                    <select class="form-control selectpicker" name="municipalBeneficiarioJuridicaTipoIdentificacion" id="municipalBeneficiarioJuridicaTipoIdentificacion" onchange="ctrlMunicipalBeneficiarioJuridicaTipoIdentificacion()" title="Seleccionar">
                                                                        <option></option>
                                                                        <option value="ruc">RUC</option>
                                                                        <option value="otro">OTRO</option>
                                                                    </select>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="label label-success" for="municipalBeneficiarioJuridicaNroIdentificacion">Nº Identificación</label>
                                                                    <input type="text" class="form-control" id="municipalBeneficiarioJuridicaNroIdentificacion" name="municipalBeneficiarioJuridicaNroIdentificacion" aria-describedby="mensaje_ben_juridico_identificacion" placeholder="">
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1" id="contBtnValMunBeneficiarioJuridica">
                                                                <label for="btnValBeneficiarioJuridicaIdentificacion" class="label label-success">Validar</label>
                                                                <a class="btn btn-primary" href="#btnValBeneficiarioJuridicaIdentificacion" id="btnValBeneficiarioJuridicaIdentificacion" role="button" ><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                                            </div>

                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="municipalBeneficiarioJuridicaRazonSocial" class="label label-success">Razón Social</label>
                                                                    <input type="text" class="form-control" id="municipalBeneficiarioJuridicaRazonSocial" name="municipalBeneficiarioJuridicaRazonSocial"   onblur="convertirMayusculas(event, this)" onkeyup="convertirMayusculas(event, this)" readonly>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div id="contMunicipalBeneficiarioNatural" style="display: none" class="col-md-12">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="municipalBeneficiarioNaturalTipoIdentificacion" class="label label-success">Tipo de identificación</label>
                                                                    <select class="form-control selectpicker" name="municipalBeneficiarioNaturalTipoIdentificacion" id="municipalBeneficiarioNaturalTipoIdentificacion" onchange="ctrlMunicipalBeneficiarioNaturalTipoIdentificacion()" title="Seleccionar">
                                                                        <option value="" disabled selected></option>
                                                                        <option value="cedula">CEDULA</option>
                                                                        <option value="pasaporte">PASAPORTE</option>
                                                                        <option value="otro">OTRO</option>
                                                                    </select>
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="label label-success" for="municipalBeneficiarioNaturalNroIdentificacion">Nº Identificación</label>
                                                                    <input type="text" class="form-control" id="municipalBeneficiarioNaturalNroIdentificacion" name="municipalBeneficiarioNaturalNroIdentificacion">
                                                                    <div class="help-block with-errors"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1" id="contBtnValMunBeneficiarioNatural">
                                                                <label for="btnValBeneficiarioNaturalIdentificacion" class="label label-success">Validar</label>
                                                                <a class="btn btn-success" href="#beneficiario_personeria_natural_cont" id="btnValBeneficiarioNaturalIdentificacion" role="button" ><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="municipalBeneficiarioNaturalApellidos" class="label label-success">Apellidos</label>
                                                                    <input type="text" class="form-control" id="municipalBeneficiarioNaturalApellidos" name="municipalBeneficiarioNaturalApellidos"  onblur="convertirMayusculas(event, this)" onkeyup="convertirMayusculas(event, this)" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="municipalBeneficiarioNaturalNombres" class="label label-success">Nombres</label>
                                                                    <input type="text" class="form-control" id="municipalBeneficiarioNaturalNombres" name="municipalBeneficiarioNaturalNombres"   onblur="convertirMayusculas(event, this)" onkeyup="convertirMayusculas(event, this)" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div> <!-- MUNICIPAL BENEFICIARIO -->

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="panel <?= CLASE_SUB_PANELES ?>" id="contenedorPoseedor"  style="display: none">  
            <div class="panel-heading">Poseedor</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tipoPoseedor" class="label label-success">Tipo de poseedor</label>
                            <select class="form-control selectpicker" id="tipoPoseedor" name="tipoPoseedor" onchange="ctrlTipoPoseedor()" title="Seleccionar">
                                <option></option>
                                <?php foreach ($proTipoPoseedor as $_proTipoPoseedor) { ?>
                                    <option value="<?= $_proTipoPoseedor['id'] ?>"><?= $_proTipoPoseedor['nombre'] ?></option>
                                <?php } ?>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="poseedorAnio" class="label label-success">Año de posesión</label>
                            <input type="number" class="form-control" id="poseedorAnio" name="poseedorAnio" min="1501" max="2020">
                        </div>
                    </div>
                    <div class="col-md-4" style="display: none" id="contPuebloEtnia">
                        <div class="form-group">
                            <label for="tipoPoseedorPuebloEtnia" class="label label-success">Pueblo / Etnia</label>
                            <select class="form-control selectpicker" id="tipoPoseedorPuebloEtnia" name="tipoPoseedorPuebloEtnia"  title="Seleccionar">
                                <option></option>
                                <?php foreach ($proPuebloEtnia as $_proPuebloEtnia) { ?>
                                    <option value="<?= $_proPuebloEtnia['id']; ?>"><?= $_proPuebloEtnia['nombre'] ?></option>
                                <?php } ?>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="tipoPoseedorPuebloEtniaObservaciones" class="label label-success">Observaciones</label>
                            <input type="text" class="form-control" id="tipoPoseedorPuebloEtniaObservaciones" name="tipoPoseedorPuebloEtniaObservaciones"   onblur="convertirMayusculas(event, this)" onkeyup="convertirMayusculas(event, this)">
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>