<div class="panel <?= CLASE_PANELES ?> ">
    <div class="panel-heading">
        <h3 class="panel-title">Caracteristicas del terreno</h3>
    </div>
    <div class="panel-body">
        <div class="col-md-3">
            <div class="form-group">
                <label for="areaTerrenoSegunEscritura" class="label label-success">Área de terreno según escritura</label>
                <input type="number" step="0.01" class="form-control" min="0" id="areaTerrenoSegunEscritura" name="areaTerrenoSegunEscritura" >
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="areaTerrenoUnidad" class="label label-success">Unidad de medida</label>
                <select class="form-control " id="areaTerrenoUnidad" name="areaTerrenoUnidad" title="Seleccionar">
                    <option></option>
                    <?php foreach ($genUnidadMedida as $_genUnidadMedida) { ?>
                        <option value="<?= $_genUnidadMedida['id']; ?>" selected><?= $_genUnidadMedida['nombre'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="col-md-2">
            <div class="checkbox">
                <label >
                    <input type="checkbox" name="loteEnConflicto" id="loteEnConflicto" value="TRUE" onchange="ctrlLoteConflicto()"> Lote en conflicto 
                </label>
            </div>
        </div>

        <div class="col-md-5">
            <div class="form-group">
                <label for="observacionesLoteConflicto" class="label label-success">Observaciones Lote en conflicto</label>
                <input type="text" class="form-control" id="observacionesLoteConflicto" name="observacionesLoteConflicto" onblur="convertirMayusculas(event, this)" onkeyup="convertirMayusculas(event, this)" disabled>
            </div>
        </div>

        <div class="col-md-12"><br></div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="ocupacionDelTerreno" class="label label-success">Ocupación del terreno</label>
                <select class="form-control " id="ocupacionDelTerreno" name="ocupacionDelTerreno" title="Seleccionar">
                    <option></option>
                    <?php foreach ($lotLoteOcupacion as $_lotLoteOcupacion) { ?>
                        <option value="<?= $_lotLoteOcupacion['id']; ?>"><?= $_lotLoteOcupacion['nombre'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="nivelDelTerreno" class="label label-success">Nivel del terreno</label>
                <select class="form-control " id="nivelDelTerreno" name="caracteristicasDelLote[1]" title="Seleccionar" >
                    <option></option>
                    <?php foreach ($nivelDelTerreno as $_nivelDelTerreno) { ?>
                        <option value="<?= $_nivelDelTerreno['id']; ?>"><?= $_nivelDelTerreno['nombre'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="formaDelTerreno" class="label label-success">Forma del terreno</label>
                <select class="form-control " id="formaDelTerreno" name="caracteristicasDelLote[2]" title="Seleccionar" >
                    <option></option>
                    <?php foreach ($formaDelTerreno as $_formaDelTerreno) { ?>
                        <option value="<?= $_formaDelTerreno['id']; ?>"><?= $_formaDelTerreno['nombre'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="tipoDelTerreno" class="label label-success">Tipo del terreno</label>
                <select class="form-control " id="tipoDelTerreno" name="caracteristicasDelLote[3]" title="Seleccionar" >
                    <option></option>
                    <?php foreach ($tipoDelTerreno as $_tipoDelTerreno) { ?>
                        <option value="<?= $_tipoDelTerreno['id']; ?>"><?= $_tipoDelTerreno['nombre'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="localizacionDeLaManzana" class="label label-success">Localizacion de la manzana</label>
                <select class="form-control " id="localizacionDeLaManzana" name="caracteristicasDelLote[4]"  title="Seleccionar">
                    <option></option>
                    <?php foreach ($localizacionDeLaManzana as $_localizacionDeLaManzana) { ?>
                        <option value="<?= $_localizacionDeLaManzana['id']; ?>"><?= $_localizacionDeLaManzana['nombre'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="topografia" class="label label-success">Topografía</label>
                <select class="form-control " id="topografia" name="caracteristicasDelLote[5]"  title="Seleccionar">
                    <option></option>
                    <?php foreach ($topografia as $_topografia) { ?>
                        <option value="<?= $_topografia['id']; ?>"><?= $_topografia['nombre'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="permisoConstruccion" class="label label-success">Permiso de construcción</label>
                <select class="form-control " id="permisoConstruccion" name="caracteristicasDelLote[6]" title="Seleccionar" >
                    <option></option>
                    <?php foreach ($permisoDeConstruccion as $_permisoDeConstruccion) { ?>
                        <option value="<?= $_permisoDeConstruccion['id']; ?>"><?= $_permisoDeConstruccion['nombre'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="adosamientoConRetiros" class="label label-success">Adosamiento con retiros</label>
                <select class="form-control " id="adosamientoConRetiros" name="caracteristicasDelLote[7]" title="Seleccionar" >
                    <option></option>
                    <?php foreach ($adosamientoConRetiros as $_adosamientoConRetiros) { ?>
                        <option value="<?= $_adosamientoConRetiros['id']; ?>"><?= $_adosamientoConRetiros['nombre'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
</div>