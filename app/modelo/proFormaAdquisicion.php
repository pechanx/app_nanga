<?php

class proFormaAdquisicion {

    private $id;
    private $id_sinat;
    private $nombre;
    private $es_activo;
    private $descripcion;
    private $db;
    private $conn;
    private $nombreTabla = 'pro_forma_adquisicion';

    function __construct() {
        $this->db = new ConexionDB();
        $this->conn = $this->db->conectar();
    }

    function get($atributo) {
        return $this->$atributo;
    }

    function set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    function listar() {
        $sql = 'SELECT id, nombre
            FROM 
            ' . $this->nombreTabla . ' 
            ORDER BY id ASC';
        $consulta = $this->conn->prepare($sql);
        $consulta->execute();
        return $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

}
