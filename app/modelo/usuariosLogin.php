<?php

class usuariosLogin {

    private $usuario;
    private $contrasena;
    private $util;
    private $usuariosPersonas = array(
        1 => array(
            'nombres' => 'Super',
            'apellidos' => 'Administrador',
            'datosAcceso' => array(
                'usuario' => 'racorrea',
                'contrasena' => '$2y$10$E46u93cD52u4HyLYst4W3.iSFOMW3Rbs7Yh4TvE9ZoOpAUbbm8BQm', //admin
                'rol' => '1' //Administrador
            ),
        ),
        2 => array(
            'nombres' => 'Digitador',
            'apellidos' => 'Prueba',
            'datosAcceso' => array(
                'usuario' => 'digitador',
                'contrasena' => '$2y$10$UJS4cohAgFfqIFB9Zvuzy.kB.XOFD3/aCNR.RS3qGjXKcgFuIOV52', //digitador
                'rol' => '2' //Digitador
            ),
        )
    );

    function __construct() {
        $this->util = new Util();
    }

    function get($atributo) {
        return $this->$atributo;
    }

    function set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    public function login() {
        foreach ($this->usuariosPersonas as $numPersona => $datosValidar) {
            $usuarioSistema = $datosValidar['datosAcceso']['usuario'];
            $contrasenaSistema = $datosValidar['datosAcceso']['contrasena'];
            if (!empty($this->usuario) || !empty($this->contrasena)) {
                if ($usuarioSistema == $this->usuario) {
                    $validarContrasena = $this->util->validarContrasena($this->contrasena, $datosValidar['datosAcceso']['contrasena']);
                    if ($validarContrasena == TRUE) {
                        session_start();
                        $_SESSION['usuario'] = $datosValidar['datosAcceso']['usuario'];
                        $_SESSION['rolUsuario'] = $datosValidar['datosAcceso']['rol'];
                        return 1; //Sesión inciada
                    } else {
                        return 0; //Error al iniciar Sesión
                    }
                }else{
                    return 2; //Usuario o contrasenia inválida
                }
            }else{
                return 3;//DatosVacíos
            }
        }
    }
    
    public function retornarNumeroUsuarios(){
        return count($this->usuariosPersonas);
    }

}
