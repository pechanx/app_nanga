<?php

class preUsoPredio {

    private $id;
    private $nombre;
    private $id_sinat;
    private $es_activo;
    private $descripcion;
    private $db;
    private $conn;
    private $nombreTabla = 'pre_uso_predio';

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
        $sql = 'SELECT * FROM ' . $this->nombreTabla . ' ORDER BY nombre ASC';
        $cons = $this->conn->prepare($sql);
        $cons->execute();
        $datos = $cons->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }

}
