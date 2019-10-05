<div class="panel <?= CLASE_PANELES ?> ">
    <div class="panel-heading">
        <h3 class="panel-title">Descripcion del predio</h3>
    </div>
    <div class="panel-body">
        <div class="col-md-12">
            <div class="form-group">
                <label for="descripcionDelPredio" class="label label-success">Descripción del predio</label>
                <input type="text" class="form-control" id="descripcionDelPredio" name="descripcionDelPredio" onblur="convertirMayusculas(event, this)" onkeyup="convertirMayusculas(event, this)" >
            </div>
        </div>
    </div>
</div>