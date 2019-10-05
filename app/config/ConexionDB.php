<?php

class ConexionDB extends PDO {

    private $DB_NOMBRE = 'gad';
    private $DB_HOST = 'localhost';
    private $DB_USUARIO = 'postgres';
    private $DB_CONTRASENA = 'postgres';
    private $DB_PUERTO = '5432';
    private $DRIVER = 'pgsql';
    private $SCHEMA = 'sch_catastro_urbano';
    private $CONEXION;

    function __construct() {
        $this->conectar();
    }

    public function conectar() {
        try {
            $dsn = $this->DRIVER . ':host=' . $this->DB_HOST . ';dbname=' . $this->DB_NOMBRE;
            $this->CONEXION = new PDO($dsn, $this->DB_USUARIO, $this->DB_CONTRASENA);
            $this->CONEXION->exec('SET search_path TO ' . $this->SCHEMA);
        } catch (PDOException $ex) {
            echo 'Error de conexión' . $ex->getMessage();
        }
        return $this->CONEXION;
        //return true;
    }

    public function obtenerId($nombreTabla) {
        $nombreTabla == 'per_direccion' ? $sql = 'SELECT MAX("Id") as id FROM per_direccion' : $sql = 'SELECT MAX(id) as id FROM ' . $nombreTabla;
        $consulta = $this->CONEXION->prepare($sql);
        $consulta->execute();
        $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $datos[0]['id'];
    }

    public function desconectar() {
        $this->CONEXION = null;
    }

}
