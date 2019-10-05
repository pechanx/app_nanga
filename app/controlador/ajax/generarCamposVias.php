<?php
require $_SERVER['DOCUMENT_ROOT'] . '/app/config/ConexionDB.php';
require $_SERVER['DOCUMENT_ROOT'] . '/app/modelo/viaVia.php';

extract($_POST);

$vias = new viaVia();
$listaVias = $vias->listarVias();

for ($i = 1; $i <= $numeroVias; $i++) {
    ?>
    <div class="col-md-12">    
        <div class="col-md-3">
            <div class="form-group">
                <label for="via_<?= $i ?>" class="label label-success">Nombre de la vía</label>
                <select class="form-control" id="via_<?= $i ?>" name="via[<?= $i ?>][viaViaId]" required>
                    <option></option>
                    <?php foreach ($listaVias as $via) { ?>
                        <option value="<?= $via['id'] ?>"><?= $via['codigo'] ?> | <?= $via['nombre'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="via_<?= $i ?>_frente" class="label label-success">Frente</label>
                <input type="number" min="0" step="0.01" class="form-control" id="via_<?= $i ?>_frente" name="via[<?= $i ?>][frente]" >
            </div>
        </div>

        <div class = "col-md-3">
            <div class = "form-group">
                <label for = "via_<?= $i ?>_numeroCasa" class = "label label-success">Número de casa</label>
                <input type = "text" class = "form-control" id = "via_<?= $i ?>_numeroCasa" name = "via[<?= $i ?>][numeroCasa]" onblur = "convertirMayusculas(event, this)" onkeyup = "convertirMayusculas(event, this)" >
            </div>
        </div>

        <?php if ($i == 1) { ?>
            <div class="col-md-3">
                <div class="checkbox">
                    <label >
                        <input type="checkbox" value="TRUE" name="via[<?= $i ?>][acceso]" id="via_<?= $i ?>_acceso" checked="true"> Vía principal
                    </label>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}
?>

