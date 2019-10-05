
<div class="panel <?= CLASE_PANELES ?> ">
    <div class="panel-heading">
        <h3 class="panel-title">Clave Catastral</h3>
    </div>
    <div class="panel-body">

        <div class="col-md-1">
            <div class="form-group">
                <label for="clvProvincia" class="label label-warning">Provincia</label>
                <input type="number" class="form-control" id="clvProvincia" name="clvProvincia" value="<?= NUM_PROVINCIA ?>" readonly="">
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <label for="clvCanton" class="label label-success">Cantón</label>
                <input type="number" class="form-control" id="clvCanton" name="clvCanton" value="<?= NUM_CANTON_CLV_CATASTRAL ?>" readonly="">
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <label for="clvParroquia" class="label label-success">Parroquia</label>
                <select class="form-control selectpicker" id="clvParroquia" name="clvParroquia" required>
                    <?php foreach ($datosParroquias as $parroquias) { ?>
                        <option value="<?= $parroquias['codigo']; ?>"><?= $parroquias['codigo'] ?></option>
                        <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <label for="clvZona" class="label label-success">Zona</label>
                <input type="text" class="form-control" id="clvZona" name="clvZona" maxlength="2" size="2" placeholder="00" required onkeypress="return soloNumeros(event);">
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <label for="clvSector" class="label label-success">Sector</label>
                <input type="text" class="form-control" id="clvSector" name="clvSector" maxlength="2" placeholder="00" required onkeypress="return soloNumeros(event);">
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <label for="clvManzana"class="label label-success">Manzana</label>
                <input type="text" class="form-control" id="clvManzana" name="clvManzana" maxlength="3" placeholder="000" required onkeypress="return soloNumeros(event);">
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <label for="clvLote" class="label label-success">Lote</label>
                <input type="text" class="form-control" id="clvLote" name="clvLote" maxlength="3" placeholder="000" required onkeypress="return soloNumeros(event);">
            </div>
        </div>
        <div class="col-md-2 btnSinLabel">
            <a class="btn btn-success" id="btnValidarClaveCatastral" href="#" role="button">Validar <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
        </div>
        
        <div class="col-md-2">
            <div class="form-group">
                <label for="codigoPredio" class="label label-success">Nro. predio</label>
                <input type="text" class="form-control" id="codigoPredio" name="codigoPredio" maxlength="4" placeholder="0000" required onkeypress="return soloNumeros(event);" readonly>
            </div>
        </div>

    </div>
</div>