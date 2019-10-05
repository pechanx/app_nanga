<?php
require $_SERVER['DOCUMENT_ROOT'] . '/app/controlador/contadores.php';
?>

<div class="row tile_count">
    <!--    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="glyphicon glyphicon-user"></i> Total Users</span>
            <div class="count txtContador"><?= $numeroUsuarios ?></div>
        </div>-->

    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="glyphicon glyphicon-home"></i> Unipropiedades</span>
        <div class="count txtContador"><?= $numeroUnipropiedades ?></div>
    </div>

    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="glyphicon glyphicon-flash"></i> Lotes en conflicto</span>
        <div class="count lote_conflicto"><?= $numeroLotesConflicto ?></div>
    </div>

    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="glyphicon glyphicon-road"></i> Vías</span>
        <div class="count txtContador"><?= $numeroVias ?></div>
    </div>

</div>

<div class="col-md-12" style="margin-top: 2em">
    <div class="panel <?= CLASE_PANELES ?>">
        <div class="panel-heading">Predios</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-hover" >
                        <table class="table" id="datatable-predios">
                            <thead>
                                <tr>
                                    <th>Clave Catastral</th>
                                    <th>Zona</th>
                                    <th>Sector</th>
                                    <th>Manzana</th>
                                    <th>Predio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($listaPrediosAlmacenados != 0) {
                                    foreach ($listaPrediosAlmacenados as $_listaPrediosAlmacenados) {
                                        echo '<tr>'
                                        . '<td>' . $_listaPrediosAlmacenados['codigo_acumulado'] . '</td>'
                                        . '<td>' . $_listaPrediosAlmacenados['zona'] . '</td>'
                                        . '<td>' . $_listaPrediosAlmacenados['sector'] . '</td>'
                                        . '<td>' . $_listaPrediosAlmacenados['manzana'] . '</td>'
                                        . '<td>' . $_listaPrediosAlmacenados['codigo'] . '</td>'
                                        . '</tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>