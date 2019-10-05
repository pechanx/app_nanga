<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?= NOMBRE_APP ?></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <!--      <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                      </ul>
                    </li>
                  </ul>-->

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <b>Login</b> <span class="caret"></span></a>
                    <ul id="login-dp" class="dropdown-menu">
                        <li>
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                                        Ingreso al Sistema
                                        <div class="form-group">
                                            <label class="sr-only" for="usuario">Usuario</label>
                                            <input type="text" class="form-control" id="txtUsuario" placeholder="Usuario" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="contrasena">Contrasena</label>
                                            <input type="password" class="form-control" id="txtContrasena" placeholder="Contrasena" required>
                                        </div>
                                        <div class="form-group">
                                            <a class="btn btn-success" id="btnHacerLogin" href="#">Ingresar</a>
                                            <!--<button type="submit" class="btn btn-primary btn-block" id="btnHacerLogin" >Ingresar</button>-->
                                        </div>
                                       
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>