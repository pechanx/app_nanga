<nav class="navbar navbar-default">
    <div class="container">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Menú</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><?= NOMBRE_APP ?></a>

            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Inicio <span class="caret" ></span>
                        </a>
                        <ul class="dropdown-menu dropdown-user">

                            <li><a href = "?q=inicio"><span class = "glyphicon glyphicon-home" aria-hidden = "true"></span> Escritorio</a>
                            </li>

                            <!--<li class="divider"></li>-->
<!--                            <li><a href="<?= BASE_URL ?>app/controlador/ajax/cerrarSesionSistema.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Cerrar sesión</a>
                            </li>-->
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Fichas <span class="caret" ></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="?q=unipropiedad"><span class="glyphicon glyphicon-stop" aria-hidden="true"></span> Unipropiedad</a></li>
                            <li><a href="?q=vias"><span class="glyphicon glyphicon-road" aria-hidden="true"></span> Vías</a></li>
                        </ul>
                    </li>
                    
<!--                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Gestionar <span class="caret" ></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="?q=gesUnipropiedad"><span class="glyphicon glyphicon-stop" aria-hidden="true"></span> Unipropiedad</a></li>
                            <li><a href="?q=vias"><span class="glyphicon glyphicon-road" aria-hidden="true"></span> Vías</a></li>
                        </ul>
                    </li>-->

                </ul>

<!--                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?= BASE_URL ?>app/controlador/ajax/cerrarSesionSistema.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></a></li>
                </ul>-->
            </div>
        </div>
    </div>
</nav>