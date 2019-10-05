<?php

class perTipoDireccion{
    private $id;
    private $nombre;
    private $id_sinat;
    private $es_activo;
    private $descripcion;
    
    private $db;
    private $conn;
    private $nombreTabla = 'per_tipo_direccion';

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
        $sql = 'SELECT id, nombre FROM ' . $this->nombreTabla . ' ORDER BY id ASC';
        $cons = $this->conn->prepare($sql);
        $cons->execute();
        return $datos = $cons->fetchAll(PDO::FETCH_ASSOC);
    }
}

